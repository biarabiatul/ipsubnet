<?php

namespace App\Http\Controllers;

use App\Models\RiwayatProgres;
use App\Models\HasilProgres;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;

class ProgresController extends Controller
{
    public function bukaMateri($bab, $subbab)
    {
        RiwayatProgres::firstOrCreate(
            [
                'id_users' => Auth::id(),
                'bab' => $bab,
                'subbab' => $subbab
            ],
            [
                'status' => 'belum'
            ]
        );

        return back();
    }

    public function selesai($bab, $subbab)
    {
        $userId = Auth::id();

        RiwayatProgres::updateOrCreate(
            [
                'id_users' => $userId,
                'bab' => $bab,
                'subbab' => $subbab
            ],
            [
                'status' => 'selesai'
            ]
        );

        // hitung total subbab
        $total = 18;

        // hitung yang selesai
        $selesai = RiwayatProgres::where('id_users', $userId)
            ->where('status', 'selesai')
            ->count();

        // hitung persen
        $persen = $total > 0 ? round(($selesai / $total) * 100) : 0;

        // simpan ke hasil_progres
        HasilProgres::updateOrCreate(
            ['id_users' => $userId],
            ['persen' => $persen]
        );

        return back();
    }

    public function cek($bab, $subbab)
    {
        $bab = urldecode($bab);
        $subbab = urldecode($subbab);

        $data = RiwayatProgres::where('id_users', Auth::id())
            ->where('bab', $bab)
            ->where('subbab', $subbab)
            ->where('status', 'selesai')
            ->first();

        return response()->json([
            'selesai' => $data ? true : false
        ]);
    }

    public function index(Request $request)
    {
        $dosen = auth()->user();

        // hanya kelas yang diajar dosen
        $kelasList = $dosen->kelasYangDiajar;

        // ambil semua id kelas dosen
        $kelasIds = $kelasList->pluck('id');

        $kelasId = $request->kelas_id;
        $search = $request->search;

        // query mahasiswa
        $query = User::with(['kelas', 'progres'])
            ->where('role', 'mahasiswa')
            ->whereIn('kelas_id', $kelasIds);

        // filter kelas
        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }

        // search nama
        if ($search) {
            $query->where('nama_lengkap', 'like', '%' . $search . '%');
        }

        $perPage = $request->get('per_page', 10);

        $data = $query
            ->paginate($perPage)
            ->withQueryString();

        return view('dosen.data-progres', compact(
            'data',
            'kelasList',
            'kelasId',
            'search'
        ));
    }

    public function detail($id)
    {
        // ===== MASTER MATERI =====
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

        // ===== AMBIL DATA DB =====
        $riwayat = RiwayatProgres::where('id_users', $id)
            ->where('status', 'selesai')
            ->get()
            ->keyBy(function ($item) {
                return $item->bab . '|' . $item->subbab;
            });

        // ===== GABUNG =====
        $final = collect($materi)->map(function ($item) use ($riwayat) {

            $key = $item['bab'] . '|' . $item['subbab'];

            if (isset($riwayat[$key])) {
                return [
                    'bab' => $item['bab'],
                    'subbab' => $item['subbab'],
                    'status' => 'selesai',
                    'updated_at' => $riwayat[$key]->updated_at
                ];
            } else {
                return [
                    'bab' => $item['bab'],
                    'subbab' => $item['subbab'],
                    'status' => 'belum',
                    'updated_at' => null
                ];
            }
        });

        return response()->json($final);
    }
}