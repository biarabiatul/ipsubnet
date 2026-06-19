<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MateriController extends Controller
{
    private function getSoalQuery($bab, $subbab, $tipe, $tingkat)
    {
        $kelasId = auth()->user()->kelas_id;

        return BankSoal::where(function ($q) use ($kelasId) {

            // soal default sistem
            $q->whereNull('kelas_id');

            // soal kelas mahasiswa
            if ($kelasId) {
                $q->orWhere('kelas_id', $kelasId);
            }

        })
            ->where('bab', $bab)
            ->where('subbab', $subbab)
            ->where('tipe_soal', $tipe)
            ->where('tingkat', $tingkat);
    }

    public function sistemBilanganBiner()
    {
        $sessionKey = 'biner_desimal_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'Sistem Bilangan',
                'Sistem Bilangan Biner',
                'biner_ke_desimal',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'Sistem Bilangan',
                'Sistem Bilangan Biner',
                'biner_ke_desimal',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'Sistem Bilangan',
                'Sistem Bilangan Biner',
                'biner_ke_desimal',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            // gabungkan
            $ids = array_merge($mudah, $sedang, $sulit);

            session([$sessionKey => $ids]);
        }

        $ids = session($sessionKey);

        $soalLatihan = BankSoal::whereIn('id_soal', $ids)->get();

        return view('mahasiswa.bab1.biner-desimal', compact('soalLatihan'));
    }

    public function cekLatihanBiner(Request $request)
    {
        $soal = BankSoal::find($request->id_soal);

        if (!$soal) {
            return response()->json(['benar' => false]);
        }

        return response()->json([
            'benar' => trim($request->jawaban_user) === trim($soal->jawaban_benar)
        ]);
    }

    public function sistemBilanganDesimal()
    {
        $sessionKey = 'desimal_biner_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'Sistem Bilangan',
                'Sistem Bilangan Desimal',
                'desimal_ke_biner',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'Sistem Bilangan',
                'Sistem Bilangan Desimal',
                'desimal_ke_biner',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'Sistem Bilangan',
                'Sistem Bilangan Desimal',
                'desimal_ke_biner',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $ids = array_merge($mudah, $sedang, $sulit);

            session([$sessionKey => $ids]);
        }

        $ids = session($sessionKey);

        $soalLatihan = BankSoal::whereIn('id_soal', $ids)
            ->orderByRaw("FIELD(id_soal, " . implode(',', $ids) . ")")
            ->get();

        return view('mahasiswa.bab1.desimal-biner', compact('soalLatihan'));
    }

    public function kelasIp()
    {
        $sessionKey = 'kelas_ip_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'IP Addressing',
                'Kelas IP Address',
                'kelas_ip',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'IP Addressing',
                'Kelas IP Address',
                'kelas_ip',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'IP Addressing',
                'Kelas IP Address',
                'kelas_ip',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $ids = array_merge($mudah, $sedang, $sulit);

            session([$sessionKey => $ids]);
        }

        $ids = session($sessionKey);

        $soal = BankSoal::whereIn('id_soal', $ids)
            ->orderByRaw("FIELD(id_soal, " . implode(',', $ids) . ")")
            ->get();

        return view('mahasiswa.bab2.kelas-ip', compact('soal'));
    }

    public function cekKelasIp(Request $request)
    {
        $soal = BankSoal::where('id_soal', $request->id_soal)->first();

        if (!$soal) {
            return response()->json(['benar' => false]);
        }

        return response()->json([
            'benar' => strtoupper($request->jawaban_user) === $soal->jawaban_benar
        ]);
    }

    public function getSoalNetworkHost()
    {
        $sessionKey = 'network_host_ids';

        if (!session()->has($sessionKey)) {

            // NETWORK
            $networkMudah = $this->getSoalQuery(
                'IP Addressing',
                'Network & Host ID',
                'network_id',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $networkSedang = $this->getSoalQuery(
                'IP Addressing',
                'Network & Host ID',
                'network_id',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $networkSulit = $this->getSoalQuery(
                'IP Addressing',
                'Network & Host ID',
                'network_id',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $hostMudah = $this->getSoalQuery(
                'IP Addressing',
                'Network & Host ID',
                'host_id',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $hostSedang = $this->getSoalQuery(
                'IP Addressing',
                'Network & Host ID',
                'host_id',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $hostSulit = $this->getSoalQuery(
                'IP Addressing',
                'Network & Host ID',
                'host_id',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $networkIds = array_merge($networkMudah, $networkSedang, $networkSulit);
            $hostIds = array_merge($hostMudah, $hostSedang, $hostSulit);

            session([
                $sessionKey => [
                    'network' => $networkIds,
                    'host' => $hostIds
                ]
            ]);
        }

        $ids = session($sessionKey);

        $network = BankSoal::whereIn('id_soal', $ids['network'])
            ->orderByRaw("FIELD(id_soal," . implode(',', $ids['network']) . ")")
            ->get();

        $host = BankSoal::whereIn('id_soal', $ids['host'])
            ->orderByRaw("FIELD(id_soal," . implode(',', $ids['host']) . ")")
            ->get();

        return response()->json([
            'network' => $network,
            'host' => $host
        ]);
    }

    public function cekJawabanNetworkHost(Request $request)
    {
        $soal = BankSoal::find($request->id_soal);

        if (!$soal) {
            return response()->json(['benar' => false]);
        }

        return response()->json([
            'benar' => trim($request->jawaban_user) === trim($soal->jawaban_benar)
        ]);
    }

    public function getSoalPublikPrivat()
    {
        $sessionKey = 'publik_privat_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'IP Addressing',
                'IP Publik dan Privat',
                'publik_privat',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'IP Addressing',
                'IP Publik dan Privat',
                'publik_privat',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'IP Addressing',
                'IP Publik dan Privat',
                'publik_privat',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $ids = array_merge($mudah, $sedang, $sulit);

            session([$sessionKey => $ids]);
        }

        $ids = session($sessionKey);

        $soal = BankSoal::whereIn('id_soal', $ids)
            ->orderByRaw("FIELD(id_soal," . implode(',', $ids) . ")")
            ->get();

        return response()->json($soal);
    }

    public function subnetMask()
    {
        $sessionKey = 'subnet_mask_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'IP Addressing',
                'Subnet Mask',
                'subnet_mask',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'IP Addressing',
                'Subnet Mask',
                'subnet_mask',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'IP Addressing',
                'Subnet Mask',
                'subnet_mask',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $ids = array_merge($mudah, $sedang, $sulit);

            session([$sessionKey => $ids]);
        }

        $ids = session($sessionKey);

        $soal = BankSoal::whereIn('id_soal', $ids)
            ->orderByRaw("FIELD(id_soal," . implode(',', $ids) . ")")
            ->get();

        return view('mahasiswa.bab2.subnet-mask', compact('soal'));
    }

    public function cekSubnetMask(Request $request)
    {
        $soal = BankSoal::find($request->id_soal);

        if (!$soal) {
            return response()->json(['benar' => false]);
        }

        return response()->json([
            'benar' => trim($request->jawaban_user) === trim($soal->jawaban_benar)
        ]);
    }

    public function getSoalAnding()
    {
        $sessionKey = 'anding_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'IP Addressing',
                'Subnet Mask',
                'anding_default',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'IP Addressing',
                'Subnet Mask',
                'anding_default',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'IP Addressing',
                'Subnet Mask',
                'anding_default',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $ids = array_merge($mudah, $sedang, $sulit);

            session([$sessionKey => $ids]);
        }

        $ids = session($sessionKey);

        $soal = BankSoal::whereIn('id_soal', $ids)
            ->orderByRaw("FIELD(id_soal," . implode(',', $ids) . ")")
            ->get();

        return response()->json($soal);
    }

    public function cekAnding(Request $request)
    {
        $soal = BankSoal::find($request->id_soal);

        if (!$soal) {
            return response()->json(['benar' => false]);
        }

        return response()->json([
            'benar' => trim($request->jawaban_user) === trim($soal->jawaban_benar)
        ]);
    }

    public function getSoalCIDR()
    {
        $sessionKey = 'cidr_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'IP Addressing',
                'CIDR',
                'cidr',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'IP Addressing',
                'CIDR',
                'cidr',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'IP Addressing',
                'CIDR',
                'cidr',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(4)
                ->pluck('id_soal')
                ->toArray();

            $ids = array_merge($mudah, $sedang, $sulit);

            session([$sessionKey => $ids]);
        }

        $ids = session($sessionKey);

        $soal = BankSoal::whereIn('id_soal', $ids)
            ->orderByRaw("FIELD(id_soal," . implode(',', $ids) . ")")
            ->get();

        return response()->json($soal);
    }

    public function cekCIDR(Request $request)
    {
        $soal = BankSoal::find($request->id_soal);

        if (!$soal) {
            return response()->json(['benar' => false]);
        }

        return response()->json([
            'benar' => trim($request->jawaban_user) === trim($soal->jawaban_benar)
        ]);
    }

    public function subnetting()
    {
        $sessionKey = 'subnetting_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'Subnetting',
                'Perhitungan Subnetting',
                'subnetting',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(1)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'Subnetting',
                'Perhitungan Subnetting',
                'subnetting',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(1)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'Subnetting',
                'Perhitungan Subnetting',
                'subnetting',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(1)
                ->pluck('id_soal')
                ->toArray();

            session([
                $sessionKey => [
                    'mudah' => $mudah,
                    'sedang' => $sedang,
                    'sulit' => $sulit
                ]
            ]);
        }

        $ids = session($sessionKey);

        return view('mahasiswa.bab3.perhitungan-subnetting', [
            'mudah' => BankSoal::find($ids['mudah'][0]),
            'sedang' => BankSoal::find($ids['sedang'][0]),
            'sulit' => BankSoal::find($ids['sulit'][0]),
        ]);
    }

    public function vlsm()
    {
        $sessionKey = 'vlsm_ids';

        if (!session()->has($sessionKey)) {

            $mudah = $this->getSoalQuery(
                'Subnetting',
                'VLSM',
                'vlsm',
                'mudah'
            )
                ->inRandomOrder()
                ->limit(1)
                ->pluck('id_soal')
                ->toArray();

            $sedang = $this->getSoalQuery(
                'Subnetting',
                'VLSM',
                'vlsm',
                'sedang'
            )
                ->inRandomOrder()
                ->limit(1)
                ->pluck('id_soal')
                ->toArray();

            $sulit = $this->getSoalQuery(
                'Subnetting',
                'VLSM',
                'vlsm',
                'sulit'
            )
                ->inRandomOrder()
                ->limit(1)
                ->pluck('id_soal')
                ->toArray();

            session([
                $sessionKey => [
                    'mudah' => $mudah,
                    'sedang' => $sedang,
                    'sulit' => $sulit
                ]
            ]);
        }

        $ids = session($sessionKey);

        return view('mahasiswa.bab3.vlsm', [
            'mudah' => BankSoal::find($ids['mudah'][0]),
            'sedang' => BankSoal::find($ids['sedang'][0]),
            'sulit' => BankSoal::find($ids['sulit'][0]),
        ]);
    }
}
