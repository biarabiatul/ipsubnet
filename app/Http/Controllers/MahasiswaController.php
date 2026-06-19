<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
{
    $dosen = auth()->user();

    // ambil semua kelas yang diajar dosen
    $kelas = $dosen->kelasYangDiajar;

    // ambil id kelas
    $kelasIds = $kelas->pluck('id');

    // query mahasiswa
    $query = User::with('kelas')
        ->where('role', 'mahasiswa')
        ->whereIn('kelas_id', $kelasIds);

    // filter berdasarkan kelas
    if ($request->kelas_id) {
        $query->where('kelas_id', $request->kelas_id);
    }

    // search
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('nim', 'like', '%' . $request->search . '%');
        });
    }

    $mahasiswa = $query->paginate(10)->withQueryString();

    return view('dosen.data-mahasiswa', compact('mahasiswa', 'kelas'));
}

    public function show($id)
    {
        $m = User::with('kelas')->findOrFail($id);

        return response()->json($m);
    }

    public function update(Request $request, $id)
    {
        $m = User::findOrFail($id);

        $m->update([
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $m = User::findOrFail($id);

        $m->kelas_id = null;
        $m->save();

        return redirect()->back()->with('success', 'Mahasiswa berhasil dikeluarkan dari kelas');
    }

    public function tambahKeKelas(Request $request)
    {
        // cari mahasiswa berdasarkan NIM
        $m = User::where('nim', $request->nim)->first();

        // kalau tidak ditemukan
        if (!$m) {
            return back()->with('error', 'Mahasiswa tidak ditemukan');
        }

        // kalau sudah punya kelas
        if ($m->kelas_id != null) {
            return back()->with('error', 'Mahasiswa sudah masuk kelas lain');
        }

        // kalau valid → masukkan ke kelas
        $m->kelas_id = $request->kelas_id;
        $m->save();

        return back()->with('success', 'Mahasiswa berhasil ditambahkan ke kelas');
    }

    // export excell data mahasiswa
    public function exportMahasiswa(Request $request)
    {
        $query = User::with('kelas')
            ->where('role', 'mahasiswa');

        // filter kelas
        if ($request->kelas_id) {
            $query->where('kelas_id', $request->kelas_id);
        }

        // search
        if ($request->search) {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
        }

        $data = $query->get();

        $tanggal = date('d-m-Y');
        $filename = "Data_Mahasiswa_" . $tanggal . ".xls";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");

        echo "<table border='1'>";
        echo "<tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
          </tr>";

        $no = 1;

        foreach ($data as $mhs) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$mhs->nim}</td>
                <td>{$mhs->nama_lengkap}</td>
                <td>{$mhs->email}</td>
                <td>" . ($mhs->kelas->nama_kelas ?? '-') . "</td>
              </tr>";

            $no++;
        }

        echo "</table>";
        exit;
    }
}
