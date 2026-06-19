<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\HasilProgres;
use Illuminate\Http\Request;
use App\Models\RiwayatProgres;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'mahasiswa') {
            return redirect('/dashboard-mahasiswa');
        }

        // kelas yang diajar dosen
        $kelasList = $user->kelasYangDiajar;

        // ambil semua id kelas
        $kelasIds = $kelasList->pluck('id');

        $kelasId = $request->kelas_id;

        // total mahasiswa hanya di kelas dosen
        $totalMahasiswa = User::where('role', 'mahasiswa')
            ->whereIn('kelas_id', $kelasIds)
            ->count();

        // total kelas dosen
        $totalKelas = $kelasList->count();

        // progres mahasiswa
        $query = HasilProgres::with(['user.kelas'])
            ->whereHas('user', function ($q) use ($kelasIds) {
                $q->whereIn('kelas_id', $kelasIds);
            });

        // filter kelas
        if ($kelasId) {
            $query->whereHas('user', function ($q) use ($kelasId) {
                $q->where('kelas_id', $kelasId);
            });
        }

        // top progress
        $topProgress = $query
            ->orderByDesc('persen')
            ->take(5)
            ->get();

        return view('dosen.dashboard-dosen', compact(
            'totalMahasiswa',
            'totalKelas',
            'topProgress',
            'kelasList',
            'kelasId'
        ));
    }

    public function dashboardMahasiswa()
    {
        $user = Auth::user();

        // ===== NILAI =====
        if (!$user->kelas_id) {

            $nilai = collect();

        } else {

            $nilai = [];

            foreach ([1, 2, 3, 4] as $kuisId) {

                $riwayat = DB::table('kuis_hasil')
                    ->where('id_pengguna', $user->id)
                    ->where('kelas_id', $user->kelas_id)
                    ->where('id_kuis', $kuisId)
                    ->orderBy('created_at')
                    ->get();

                if ($riwayat->isEmpty()) {
                    continue;
                }

                $kkm = $kuisId == 4
                    ? $user->kelas->kkm_evaluasi
                    : $user->kelas->kkm_kuis;

                $nilaiTertinggi = 0;

                foreach ($riwayat as $item) {

                    // cek apakah sebelumnya pernah remedial
                    $pernahRemedial = $riwayat
                        ->where('created_at', '<', $item->created_at)
                        ->where('nilai_akhir', '<', $kkm)
                        ->count() > 0;

                    // default nilai asli
                    $nilaiTampil = $item->nilai_akhir;

                    // kalau remedial lalu lulus
                    if ($pernahRemedial && $item->nilai_akhir >= $kkm) {

                        $nilaiTampil = $kkm;

                    }

                    // ambil nilai tertinggi
                    if ($nilaiTampil > $nilaiTertinggi) {

                        $nilaiTertinggi = $nilaiTampil;

                    }
                }

                $nilai[$kuisId] = round($nilaiTertinggi);
            }

            $nilai = collect($nilai);
        }


        // ===== PROGRESS =====
        $progress = HasilProgres::where('id_users', $user->id)->first();

        // ===== MASTER MATERI (sementara statis dulu) =====
        $materi = [
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Bilangan Biner'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Bilangan Desimal'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Rangkuman Bab 1'],
            ['bab' => 'Sistem Bilangan', 'subbab' => 'Kuis Bab 1'],
            ['bab' => 'IP Addressing', 'subbab' => 'Apa Itu IP Address'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kelas IP Address'],
            ['bab' => 'IP Addressing', 'subbab' => 'Network ID dan Host ID'],
            ['bab' => 'IP Addressing', 'subbab' => 'IP Publik dan Privat'],
            ['bab' => 'IP Addressing', 'subbab' => 'Subnet Mask'],
            ['bab' => 'IP Addressing', 'subbab' => 'CIDR'],
            ['bab' => 'IP Addressing', 'subbab' => 'Rangkuman Bab 2'],
            ['bab' => 'IP Addressing', 'subbab' => 'Kuis Bab 2'],
            ['bab' => 'Subnetting', 'subbab' => 'Pengenalan Subnetting'],
            ['bab' => 'Subnetting', 'subbab' => 'Perhitungan Subnetting'],
            ['bab' => 'Subnetting', 'subbab' => 'VLSM'],
            ['bab' => 'Subnetting', 'subbab' => 'Rangkuman Bab 3'],
            ['bab' => 'Subnetting', 'subbab' => 'Kuis Bab 3'],
            ['bab' => 'Evaluasi', 'subbab' => 'Evaluasi Akhir']
        ];

        // ===== AMBIL RIWAYAT DARI DB =====
        $riwayat = RiwayatProgres::where('id_users', $user->id)
            ->where('status', 'selesai')
            ->get()
            ->keyBy(function ($item) {
                return $item->bab . '|' . $item->subbab;
            });

        $finalProgres = collect($materi)->map(function ($item) use ($riwayat) {

            $key = $item['bab'] . '|' . $item['subbab'];

            if (isset($riwayat[$key])) {
                return [
                    'bab' => $item['bab'],
                    'subbab' => $item['subbab'],
                    'status' => 'selesai',
                    'waktu' => $riwayat[$key]->updated_at
                ];
            } else {
                return [
                    'bab' => $item['bab'],
                    'subbab' => $item['subbab'],
                    'status' => 'belum',
                    'waktu' => null
                ];
            }
        });

        return view('mahasiswa.dashboard', compact(
            'nilai',
            'progress',
            'finalProgres'
        ));
    }

}