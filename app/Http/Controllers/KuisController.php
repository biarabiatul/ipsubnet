<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use App\Models\Kuis;
use App\Models\KuisHasil;
use App\Models\Kelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\KuisJawaban;


class KuisController extends Controller
{
    public function soalBab1()
    {
        $kuis = Kuis::find(1); // kuis bab 1

        $soal = DB::table('kuis_soal')
            ->join('bank_soal', 'kuis_soal.soal_id', '=', 'bank_soal.id_soal')
            ->where('kuis_soal.kuis_id', $kuis->id)
            ->select('bank_soal.*')
            ->get();

        $result = [];

        foreach ($soal as $s) {

            $opsi = json_decode($s->pilgan_opsi, true);

            $result[] = [
                "id" => $s->id_soal,
                "question" => $s->soal,
                "options" => $opsi,
                "answer" => $s->jawaban_benar
            ];
        }

        return response()->json([
            "durasi" => $kuis->durasi,
            "soal" => $result
        ]);
    }

    public function submit(Request $request)
    {
        $user = Auth::user();
        // 🔒 Pastikan user punya kelas
        if (!$user || !$user->kelas_id) {
            return response()->json([
                'error' => 'Kamu belum tergabung dalam kelas'
            ], 403);
        }

        $answers = $request->answers;
        $kuis_id = $request->kuis_id;

        // 🔒 Validasi basic
        if (!$answers || count($answers) === 0) {
            return response()->json([
                'error' => 'Jawaban tidak ditemukan'
            ], 400);
        }

        $benar = 0;
        $salah = 0;

        foreach ($answers as $ans) {

            $soal = BankSoal::find($ans['soal_id']);

            if (!$soal)
                continue;

            if (isset($ans['jawaban']) && $ans['jawaban'] == $soal->jawaban_benar) {
                $benar++;
            } else {
                $salah++;
            }
        }

        $total = count($answers);
        $nilai = $total > 0 ? ($benar / $total) * 100 : 0;

        $kelas = Kelas::find($user->kelas_id);

        // =====================
// BATAS EVALUASI
// =====================

        if ($kuis_id == 4) {

            // hitung percobaan evaluasi
            $jumlahPercobaan = KuisHasil::where('id_pengguna', $user->id)
                ->where('id_kuis', 4)
                ->where('kelas_id', $user->kelas_id)
                ->count();

            // kalau sudah 3x
            if ($jumlahPercobaan >= 3) {

                return response()->json([
                    'error' => 'Kesempatan evaluasi telah habis'
                ], 403);

            }

            // cek apakah sudah lulus
            $sudahLulus = KuisHasil::where('id_pengguna', $user->id)
                ->where('id_kuis', 4)
                ->where('kelas_id', $user->kelas_id)
                ->where('nilai_akhir', '>=', $kelas->kkm_evaluasi)
                ->exists();

            // kalau sudah lulus
            if ($sudahLulus) {

                return response()->json([
                    'error' => 'Evaluasi sudah dinyatakan lulus'
                ], 403);

            }

        }

        if ($kuis_id == 4) {

            $kkm = $kelas->kkm_evaluasi;

        } else {

            $kkm = $kelas->kkm_kuis;

        }

        // cek apakah pernah remedial
        $pernahRemedial = KuisHasil::where('id_pengguna', $user->id)
            ->where('id_kuis', $kuis_id)
            ->where('kelas_id', $user->kelas_id)
            ->where('nilai_akhir', '<', $kkm)
            ->exists();

        // nilai final
        $nilaiFinal = $nilai;

        // kalau pernah remedial dan sekarang lulus
        $nilaiFinal = $nilai;

        $start = Carbon::parse($request->start_time);
        $end = now();
        $waktu = abs($end->diffInSeconds($start));

        // ✅ SIMPAN HASIL (pakai Auth langsung, bukan find)
        $hasil = KuisHasil::create([
            'id_pengguna' => $user->id,
            'id_kuis' => $kuis_id,
            'nilai_akhir' => $nilaiFinal,
            'total_benar' => $benar,
            'total_salah' => $salah,
            'waktu_mengerjakan' => $waktu,
            'start_time' => $start,
            'end_time' => $end,
            'kelas_id' => $user->kelas_id
        ]);

        // 🔒 Simpan jawaban detail
        foreach ($answers as $ans) {

            $soal = BankSoal::find($ans['soal_id']);

            if (!$soal)
                continue;

            $jawabanUser = $ans['jawaban'] ?? null;

            $status = ($jawabanUser == $soal->jawaban_benar) ? 'benar' : 'salah';

            KuisJawaban::create([
                'id_hasil' => $hasil->id,
                'id_soal' => $ans['soal_id'],
                'jawaban_pengguna' => $jawabanUser,
                'status' => $status
            ]);
        }

        // =====================
        // CEK KKM + TAMBAH PROGRES
        // =====================
        $kelas = Kelas::find($user->kelas_id);

        if ($kuis_id == 4) {
            $kkm = $kelas->kkm_evaluasi;
        } else {
            $kkm = $kelas->kkm_kuis;
        }

        if ($nilaiFinal >= $kkm) {

            $bab = "";
            $subbab = "";

            if ($kuis_id == 1) {
                $bab = "Sistem Bilangan";
                $subbab = "Kuis Bab 1";
            } elseif ($kuis_id == 2) {
                $bab = "IP Addressing";
                $subbab = "Kuis Bab 2";
            } elseif ($kuis_id == 3) {
                $bab = "Subnetting";
                $subbab = "Kuis Bab 3";
            } elseif ($kuis_id == 4) {
                $bab = "Evaluasi";
                $subbab = "Evaluasi Akhir";
            }

            if ($bab && $subbab) {
                app(\App\Http\Controllers\ProgresController::class)
                    ->selesai($bab, $subbab);
            }
        }

        return response()->json([
            'nilai' => round($nilaiFinal),
            'redirect' => '/kuis/hasil/' . $hasil->id,

        ]);
    }
    public function hasil($id)
    {
        $hasil = KuisHasil::findOrFail($id);

        $kuis = Kuis::find($hasil->id_kuis);

        return view('mahasiswa.bab1.hasil-kuis', compact('hasil', 'kuis'));
    }

    public function review($id)
    {
        $hasil = KuisHasil::findOrFail($id);

        $review = DB::table('kuis_jawaban')
            ->join('bank_soal', 'kuis_jawaban.id_soal', '=', 'bank_soal.id_soal')
            ->where('kuis_jawaban.id_hasil', $id)
            ->select(
                'bank_soal.soal',
                'bank_soal.pilgan_opsi',
                'bank_soal.jawaban_benar',
                'kuis_jawaban.jawaban_pengguna',
                'kuis_jawaban.status'
            )
            ->get();

        return view('mahasiswa.bab1.review-kuis', compact('review', 'hasil'));
    }

    public function petunjukKuis1()
    {
        $user = Auth::user();

        if (!$user->kelas_id) {
            $riwayat = collect(); // kosong
        } else {
            $riwayat = KuisHasil::where('id_pengguna', $user->id)
                ->where('id_kuis', 1)
                ->where('kelas_id', $user->kelas_id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('mahasiswa.bab1.petunjuk-kuis-bab1', compact('riwayat'));
    }

    private function getDataReview($id)
    {
        return DB::table('kuis_jawaban as kj')
            ->join('bank_soal as s', 'kj.id_soal', '=', 's.id_soal')
            ->where('kj.id_hasil', $id)
            ->select(
                's.soal as soal',
                's.pilgan_opsi',
                's.jawaban_benar',
                'kj.jawaban_pengguna',
                'kj.status'
            )
            ->get();
    }

    public function reviewAjax($id)
    {
        return response()->json($this->getDataReview($id));
    }

    // bab 2
    public function soalBab2()
    {
        $kuis = Kuis::find(2); // kuis bab 2

        $soal = DB::table('kuis_soal')
            ->join('bank_soal', 'kuis_soal.soal_id', '=', 'bank_soal.id_soal')
            ->where('kuis_soal.kuis_id', $kuis->id)
            ->select('bank_soal.*')
            ->get();

        $result = [];

        foreach ($soal as $s) {

            $opsi = json_decode($s->pilgan_opsi, true);

            $result[] = [
                "id" => $s->id_soal,
                "question" => $s->soal,
                "options" => $opsi,
                "answer" => $s->jawaban_benar
            ];
        }

        return response()->json([
            "durasi" => $kuis->durasi,
            "soal" => $result
        ]);
    }

    public function petunjukKuis2()
    {
        $user = Auth::user();

        if (!$user->kelas_id) {
            $riwayat = collect(); // kosong kalau belum punya kelas
        } else {
            $riwayat = KuisHasil::where('id_pengguna', $user->id)
                ->where('id_kuis', 2)
                ->where('kelas_id', $user->kelas_id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('mahasiswa.bab2.petunjuk-kuis-bab2', compact('riwayat'));
    }

    public function soalBab3()
    {
        $kuis = Kuis::find(3); // kuis bab 3

        $soal = DB::table('kuis_soal')
            ->join('bank_soal', 'kuis_soal.soal_id', '=', 'bank_soal.id_soal')
            ->where('kuis_soal.kuis_id', $kuis->id)
            ->select('bank_soal.*')
            ->get();

        $result = [];

        foreach ($soal as $s) {

            $opsi = json_decode($s->pilgan_opsi, true);

            $result[] = [
                "id" => $s->id_soal,
                "question" => $s->soal,
                "options" => $opsi,
                "answer" => $s->jawaban_benar
            ];
        }

        return response()->json([
            "durasi" => $kuis->durasi, // ⬅️ TAMBAH INI
            "soal" => $result
        ]);
    }

    public function petunjukKuis3()
    {
        $user = Auth::user();

        if (!$user->kelas_id) {
            $riwayat = collect(); // kosong kalau belum punya kelas
        } else {
            $riwayat = KuisHasil::where('id_pengguna', $user->id)
                ->where('id_kuis', 3)
                ->where('kelas_id', $user->kelas_id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('mahasiswa.bab3.petunjuk-kuis-bab3', compact('riwayat'));
    }

    public function soalEvaluasi()
    {
        $kuis = Kuis::find(4); // evaluasi

        $soal = DB::table('kuis_soal')
            ->join('bank_soal', 'kuis_soal.soal_id', '=', 'bank_soal.id_soal')
            ->where('kuis_soal.kuis_id', $kuis->id)
            ->select('bank_soal.*')
            ->get();

        $result = [];

        foreach ($soal as $s) {

            $opsi = json_decode($s->pilgan_opsi, true);

            $result[] = [
                "id" => $s->id_soal,
                "question" => $s->soal,
                "options" => $opsi,
                "answer" => $s->jawaban_benar
            ];
        }

        return response()->json([
            "durasi" => $kuis->durasi,
            "soal" => $result
        ]);
    }

    public function petunjukEvaluasi()
    {
        $user = Auth::user();

        if (!$user->kelas_id) {
            $riwayat = collect(); // kosong kalau belum punya kelas
        } else {
            $riwayat = KuisHasil::where('id_pengguna', $user->id)
                ->where('id_kuis', 4)
                ->where('kelas_id', $user->kelas_id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('mahasiswa.evaluasi', compact('riwayat'));
    }

}

