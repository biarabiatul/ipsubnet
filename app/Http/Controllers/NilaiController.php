<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KuisHasil;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class NilaiController extends Controller
{

    public function index(Request $request)
    {
        $dosen = auth()->user();

        // hanya kelas yang diajar dosen
        $kelas = $dosen->kelasYangDiajar;

        // ambil id kelas
        $kelasIds = $kelas->pluck('id');

        // query mahasiswa
        $query = User::with(['kelas', 'kuisHasil'])
            ->where('role', 'mahasiswa')
            ->whereIn('kelas_id', $kelasIds);

        // filter kelas
        if ($request->kelas_id) {
            $query->where('kelas_id', $request->kelas_id);
        }

        // search nama
        if ($request->search) {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
        }

        $perPage = $request->get('per_page', 10);

        $data = $query
            ->paginate($perPage)
            ->withQueryString();

        return view('dosen.data-nilai', compact('data', 'kelas'));
    }

    public function riwayat($id)
    {
        $riwayat = KuisHasil::with(['kuis', 'user.kelas'])
            ->where('id_pengguna', $id)
            ->orderBy('end_time', 'desc')
            ->get();

        $hasil = $riwayat->map(function ($item) use ($riwayat) {

            // ambil KKM
            $kkm = $item->id_kuis == 4
                ? ($item->user->kelas->kkm_evaluasi ?? 70)
                : ($item->user->kelas->kkm_kuis ?? 75);

            // cek apakah sebelumnya pernah remedial
            $pernahRemedial = $riwayat
                ->where('id_kuis', $item->id_kuis)
                ->where('created_at', '<', $item->created_at)
                ->where('nilai_akhir', '<', $kkm)
                ->count() > 0;

            // default nilai asli
            $nilaiTampil = $item->nilai_akhir;

            // kalau remedial lalu lulus → tampilkan KKM
            if ($pernahRemedial && $item->nilai_akhir >= $kkm) {
                $nilaiTampil = $kkm;
            }

            // tambahkan field baru
            $item->nilai_tampil = $nilaiTampil;

            return $item;
        });

        return response()->json($hasil);
    }

    public function exportExcel(Request $request)
    {
        $dosen = auth()->user();

        // hanya kelas dosen
        $kelasIds = $dosen->kelasYangDiajar->pluck('id');

        $query = User::with(['kelas', 'kuisHasil'])
            ->where('role', 'mahasiswa')
            ->whereIn('kelas_id', $kelasIds);

        // filter kelas
        if ($request->kelas_id) {
            $query->where('kelas_id', $request->kelas_id);
        }

        // filter search
        if ($request->search) {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
        }

        $data = $query->get();

        $tanggal = date('d-m-Y');
        $filename = "Nilai_Mahasiswa_" . $tanggal . ".xls";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");

        echo "<table border='1'>";
        echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Kuis 1</th>
        <th>Kuis 2</th>
        <th>Kuis 3</th>
        <th>Evaluasi</th>
      </tr>";

        $no = 1;

        foreach ($data as $item) {

            $kuis1 = $item->kuisHasil->where('id_kuis', 1)->max('nilai_akhir');
            $kuis2 = $item->kuisHasil->where('id_kuis', 2)->max('nilai_akhir');
            $kuis3 = $item->kuisHasil->where('id_kuis', 3)->max('nilai_akhir');
            $evaluasi = $item->kuisHasil->where('id_kuis', 4)->max('nilai_akhir');

            echo "<tr>
            <td>{$no}</td>
            <td>{$item->nama_lengkap}</td>
            <td>" . ($item->kelas->nama_kelas ?? '-') . "</td>
            <td>{$kuis1}</td>
            <td>{$kuis2}</td>
            <td>{$kuis3}</td>
            <td>{$evaluasi}</td>
          </tr>";

            $no++;
        }

        echo "</table>";
        exit;
    }

    public function detailJawaban($id)
    {
        // ambil user
        $user = \App\Models\User::findOrFail($id);

        // ambil nilai tertinggi kuis user
        $hasilKuis = KuisHasil::with('kuis')
            ->where('id_pengguna', $id)
            ->get()
            ->groupBy('id_kuis')
            ->map(function ($items) {

                return $items->sort(function ($a, $b) {

                    // prioritas nilai tertinggi
                    if ($a->nilai_akhir != $b->nilai_akhir) {
                        return $b->nilai_akhir <=> $a->nilai_akhir;
                    }

                    // kalau nilai sama → durasi tercepat
                    return $a->waktu_mengerjakan <=> $b->waktu_mengerjakan;

                })->first();

            });

        $data = [];

        foreach ($hasilKuis as $hasil) {

            $jawaban = DB::table('kuis_jawaban as kj')
                ->join('bank_soal as s', 'kj.id_soal', '=', 's.id_soal')
                ->where('kj.id_hasil', $hasil->id)
                ->select(
                    'kj.status'
                )
                ->get();

            $data[] = [
                'judul' => $hasil->kuis->judul,
                'jawaban' => $jawaban
            ];
        }

        return view('dosen.detail-jawaban', compact('data', 'user'));
    }
}