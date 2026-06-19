<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = auth()->user()
            ->kelasYangDiajar()
            ->withCount(['mahasiswa', 'dosen'])
            ->get();

        return view('dosen.data-kelas', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        $kelas = Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'token' => strtoupper(Str::random(6)),
            'created_by' => auth()->id()
        ]);

        $kelas->dosen()->attach(auth()->id());

        return back()->with('success', 'Kelas berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        $kelas = Kelas::where('created_by', auth()->id())
            ->findOrFail($id);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas
        ]);

        return back()->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy($id)
    {
        $kelas = Kelas::where('created_by', auth()->id())
            ->findOrFail($id);

        // kosongkan mahasiswa dari kelas ini
        \App\Models\User::where('kelas_id', $id)
            ->update([
                'kelas_id' => null
            ]);

        // hapus relasi dosen
        $kelas->dosen()->detach();

        // hapus kelas
        $kelas->delete();

        return back()->with('success', 'Kelas berhasil dihapus');
    }

    public function join(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        $kelas = Kelas::where('token', $request->token)->first();

        if (!$kelas) {
            return back()->withErrors(['token' => 'Token kelas tidak valid']);
        }

        // cek sudah join atau belum
        if ($kelas->dosen()->where('dosen_id', auth()->id())->exists()) {
            return back()->withErrors(['token' => 'Anda sudah tergabung di kelas ini']);
        }

        $kelas->dosen()->attach(auth()->id());

        return back()->with('success', 'Berhasil gabung kelas');
    }

    public function updateKKM(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->kkm_kuis = $request->kkm_kuis;
        $kelas->kkm_evaluasi = $request->kkm_evaluasi;

        $kelas->save();

        return back()->with(
            'success',
            'KKM berhasil diperbarui'
        );
    }
}
