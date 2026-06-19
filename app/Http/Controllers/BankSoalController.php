<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;

use Illuminate\Http\Request;


class BankSoalController extends Controller
{
    private function soalQuery($tipe, $kelasId = null)
    {
        return BankSoal::where(function ($q) use ($kelasId) {

            // soal sistem
            $q->whereNull('kelas_id');

            // soal kelas yg dipilih
            if ($kelasId) {
                $q->orWhere('kelas_id', $kelasId);
            }

        })
            ->where('tipe_soal', $tipe);
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $perPage = $request->perPage ?? 50;
        $kelasAktif = $request->kelas_id;

        // ================= KUIS =================
        $kuis = BankSoal::where(function ($q) use ($kelasAktif) {

            // soal sistem
            $q->whereNull('kelas_id');

            // soal kelas yg dipilih
            if ($kelasAktif) {
                $q->orWhere('kelas_id', $kelasAktif);
            }

        })
            ->whereIn('tipe_soal', ['pilgan', 'essai'])
            ->when($search, function ($q) use ($search) {

                $q->where(function ($qq) use ($search) {

                    $qq->where('soal', 'like', "%$search%")
                        ->orWhere('jawaban_benar', 'like', "%$search%");

                });

            })
            ->paginate($perPage, ['*'], 'kuis_page')
            ->withQueryString();

        // ================= TIPE LAIN =================
        $biner = $this->soalQuery('biner_ke_desimal', $kelasAktif)
            ->when(
                $search,
                fn($q) =>
                $q->where('soal', 'like', "%$search%")
            )
            ->paginate($perPage, ['*'], 'biner_page')
            ->withQueryString();

        $desimal = $desimal = $this->soalQuery('desimal_ke_biner', $kelasAktif)
            ->paginate($perPage, ['*'], 'desimal_page')
            ->withQueryString();

        $kelasIp = $kelasIp = $this->soalQuery('kelas_ip', $kelasAktif)
            ->paginate($perPage, ['*'], 'kelas_page')
            ->withQueryString();

        $network = $this->soalQuery('network_id', $kelasAktif)
            ->paginate($perPage, ['*'], 'network_page')
            ->withQueryString();

        $host = $this->soalQuery('host_id', $kelasAktif)
            ->paginate($perPage, ['*'], 'host_page')
            ->withQueryString();

        $publik = $this->soalQuery('publik_privat', $kelasAktif)
            ->paginate($perPage, ['*'], 'publik_page')
            ->withQueryString();

        $subnet = $this->soalQuery('subnet_mask', $kelasAktif)
            ->paginate($perPage, ['*'], 'subnet_page')
            ->withQueryString();

        $anding = $this->soalQuery('anding_default', $kelasAktif)
            ->paginate($perPage, ['*'], 'anding_page')
            ->withQueryString();

        $cidr = $this->soalQuery('cidr', $kelasAktif)
            ->paginate($perPage, ['*'], 'cidr_page')
            ->withQueryString();

        $subnetting = $this->soalQuery('subnetting', $kelasAktif)
            ->paginate($perPage, ['*'], 'subnetting_page')
            ->withQueryString();

        $vlsm = $this->soalQuery('vlsm', $kelasAktif)
            ->paginate($perPage, ['*'], 'vlsm_page')
            ->withQueryString();

        return view('dosen.bank-soal', compact(
            'kuis',
            'biner',
            'desimal',
            'kelasIp',
            'network',
            'host',
            'publik',
            'subnet',
            'anding',
            'cidr',
            'subnetting',
            'vlsm',
            'perPage'
        ));
    }

    public function update(Request $request, $id)
    {
        $soal = BankSoal::whereNotNull('created_by')
            ->findOrFail($id);

        $soal->update([
            'bab' => $request->bab,
            'subbab' => $request->subbab,
            'tingkat' => $request->tingkat,
            'soal' => $request->soal,
            'jawaban_benar' => $request->jawaban,
        ]);

        return redirect('/bank-soal')->with('success', 'Soal berhasil diupdate!');
    }

    public function destroy($id)
    {
        $soal = BankSoal::whereNotNull('created_by')
            ->findOrFail($id);
        $soal->delete();

        return redirect('/bank-soal')->with('success', 'Soal berhasil dihapus!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'bab' => 'required',
            'subbab' => 'required',
            'tingkat' => 'required',
            'tipe_soal' => 'required',
            'soal' => 'required',
            'jawaban' => 'required',
        ]);

        BankSoal::create([

            'kelas_id' => $request->kelas_id,
            'created_by' => auth()->id(),
            'bab' => $request->bab,
            'subbab' => $request->subbab,
            'tingkat' => $request->tingkat,
            'tipe_soal' => $request->tipe_soal,
            'soal' => $request->soal,
            'jawaban_benar' => $request->jawaban,
        ]);

        return redirect('/bank-soal')->with('success', 'Soal berhasil ditambahkan!');
    }
}