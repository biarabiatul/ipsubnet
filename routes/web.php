<?php

use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankSoalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProgresController;
use App\Models\BankSoal;
use Illuminate\Support\Facades\Route;

// landing page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftarmateri', function () {
    return view('landingpage.daftarmateri');
});

Route::get('/', function () {
    return view('landingpage.landing');
});

Route::get('/daftarmateri', function () {
    return view('landingpage.daftarmateri');
});

Route::get('/layout', function () {
    return view('landingpage.layout');
});

Route::get('/petunjuk', function () {
    return view('landingpage.petunjuk');
});

Route::get('/tentang', function () {
    return view('landingpage.tentang');
});

Route::get('/mahasiswa', function () {
    return view('mahasiswa.mahasiswa');
});



// Dosen
Route::get('/dosen', function () {
    return view('dosen.dosen');
});

Route::get('/test-soal', function () {
    return BankSoal::all();
});

// kelas
Route::post('/kelas', [KelasController::class, 'store'])
    ->name('kelas.store');

// register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    Route::get('/peta-konsep', function () {
        return view('mahasiswa.peta-konsep');
    });

    Route::get('/dashboard', [DashboardController::class, 'dashboardMahasiswa']);

    Route::get('/bab1/rangkuman-bab1', function () {
        return view('mahasiswa.bab1.rangkuman-bab1');
    });

    Route::get('/bab1/petunjuk-kuis-bab1', [KuisController::class, 'petunjukKuis1']);

    Route::get('/bab1/kuis-bab1', function () {
        return view('mahasiswa.bab1.kuis-bab1');
    });

    Route::get('/api/kuis/bab1', [KuisController::class, 'soalBab1']);

    Route::post('/kuis/submit', [KuisController::class, 'submit']);

    Route::get('/kuis/hasil/{id}', [KuisController::class, 'hasil']);

    Route::get('/kuis/review/{id}', [KuisController::class, 'review']);

    Route::get('/review-jawaban/{id}', [KuisController::class, 'reviewAjax']);

    // bab2
    Route::get('/bab2/tujuan-pembelajaran-bab2', function () {
        return view('mahasiswa.bab2.tujuan-pembelajaran-bab2');
    });

    Route::get('/bab2/ip-addressing', function () {
        return view('mahasiswa.bab2.ip-addressing');
    });

    Route::get('/bab2/publik-privat', function () {
        return view('mahasiswa.bab2.publik-privat');
    });

    Route::get('/bab2/network-host', function () {
        return view('mahasiswa.bab2.network-host');
    });

    Route::get('/bab2/petunjuk-kuis-bab2', function () {
        return view('mahasiswa.bab2.petunjuk-kuis-bab2');
    });

    Route::get('/bab1/tujuan-pembelajaran-bab1', function () {
        return view('mahasiswa.bab1.tujuan-pembelajaran-bab1');
    });

    Route::get('/bab1/biner-desimal', [MateriController::class, 'sistemBilanganBiner']);

    Route::post('/progres/selesai/{bab}/{subbab}', [ProgresController::class, 'selesai']);

    Route::get('/progres/cek/{bab}/{subbab}', [ProgresController::class, 'cek']);

    Route::get('/bab1/desimal-biner', [MateriController::class, 'sistemBilanganDesimal']);

    // ip publik dan privat
    Route::get('/bab2/publik-privat/data', [MateriController::class, 'getSoalPublikPrivat']);

    // subnet mask
    Route::get('/bab2/subnet-mask', [MateriController::class, 'subnetMask']);
    Route::post('/subnet-mask/cek', [MateriController::class, 'cekSubnetMask']);

    // anding default
    Route::get('/anding-default/soal', [MateriController::class, 'getSoalAnding']);
    Route::post('/anding-default/cek', [MateriController::class, 'cekAnding']);

    // aktivitas subnet mask
    Route::get(
        '/aktivitas/subnet-mask/soal',
        [AktivitasController::class, 'getSoalSubnetMask']
    );

    Route::post(
        '/aktivitas/subnet-mask/cek',
        [AktivitasController::class, 'cekJawabanSubnetMask']
    );

    // cidr
    Route::get('/bab2/cidr', function () {
        return view('mahasiswa.bab2.cidr');
    });
    Route::get('/cidr/soal', [MateriController::class, 'getSoalCIDR']);
    Route::post('/cidr/cek', [MateriController::class, 'cekCIDR']);

    Route::get('/aktivitas/cidr/soal', [AktivitasController::class, 'getSoalCIDR']);
    Route::post('/aktivitas/cidr/cek', [AktivitasController::class, 'cekJawabanCIDR']);

    Route::get('/bab2/rangkuman-bab2', function () {
        return view('mahasiswa.bab2.rangkuman-bab2');
    });

    Route::get('/bab2/kuis-bab2', function () {
        return view('mahasiswa.bab2.kuis-bab2');
    });

    Route::get('/kuis/bab2', [KuisController::class, 'soalBab2']);

    Route::get('/bab2/petunjuk-kuis-bab2', [KuisController::class, 'petunjukKuis2']);

    // bab 3
    Route::get('/bab3/tujuan-pembelajaran-bab3', function () {
        return view('mahasiswa.bab3.tujuan-pembelajaran-bab3');
    });

    // pengenalan subnetting
    Route::get('/bab3/subnetting', function () {
        return view('mahasiswa.bab3.subnetting');
    });

    Route::get('/aktivitas/subnetting/soal', [AktivitasController::class, 'getSoalSubnetting']);
    Route::post('/aktivitas/subnetting/cek', [AktivitasController::class, 'cekJawabanSubnetting']);

    // perhitungan subnetting
    Route::get('/bab3/perhitungan-subnetting', function () {
        return view('mahasiswa.bab3.perhitungan-subnetting');
    });

    Route::get('/bab3/perhitungan-subnetting', [MateriController::class, 'subnetting']);

    Route::get(
        '/aktivitas/perhitungan-subnetting/soal',
        [AktivitasController::class, 'getSoalPerhitunganSubnetting']
    );

    Route::post(
        '/aktivitas/perhitungan-subnetting/cek',
        [AktivitasController::class, 'cekJawabanPerhitunganSubnetting']
    );

    Route::get('/bab3/vlsm', function () {
        return view('mahasiswa.bab3.vlsm');
    });

    Route::get('/bab3/vlsm', [MateriController::class, 'vlsm']);

    // aktivitas VLSM
    Route::get('/aktivitas/vlsm/soal', [AktivitasController::class, 'getSoalVLSM']);

    Route::post('/aktivitas/vlsm/cek', [AktivitasController::class, 'cekJawabanVLSM']);

    // rangkuman bab 3
    Route::get('/bab3/rangkuman-bab3', function () {
        return view('mahasiswa.bab3.rangkuman-bab3');
    });

    // kuis bab 3
    Route::get('/bab3/petunjuk-kuis-bab3', function () {
        return view('mahasiswa.bab3.petunjuk-kuis-bab3');
    });

    Route::get('/bab3/kuis-bab3', function () {
        return view('mahasiswa.bab3.kuis-bab3');
    });

    Route::get('/bab3/petunjuk-kuis-bab3', [KuisController::class, 'petunjukKuis3']);

    Route::get('/kuis/bab3', [KuisController::class, 'soalBab3']);

    // evaluasi
    Route::get('/evaluasi/soal', [KuisController::class, 'soalEvaluasi']);

    // supaya ga keliatan jawaban biner
    Route::post('/cek-latihan-biner', [MateriController::class, 'cekLatihanBiner']);

    // ajax biner
    Route::get('/aktivitas/soal', [AktivitasController::class, 'getSoal']);
    Route::post('/aktivitas/cek', [AktivitasController::class, 'cekJawaban']);

    // ajax desimal
    Route::get('/aktivitas/desimal/soal', [AktivitasController::class, 'getSoalDesimal']);
    Route::post('/aktivitas/desimal/cek', [AktivitasController::class, 'cekJawabanDesimal']);

    // BAB 2
    // ajax ip address
    Route::get('/aktivitas/ip/soal', [AktivitasController::class, 'getSoalIp']);
    Route::post('/aktivitas/ip/cek', [AktivitasController::class, 'cekJawabanIp']);

    // ajax kelas ip
    Route::get('/aktivitas/kelas-ip/soal', [AktivitasController::class, 'getSoalKelasIP']);
    Route::post('/aktivitas/kelas-ip/cek', [AktivitasController::class, 'cekJawabanKelasIP']);

    Route::get('/bab2/kelas-ip', [MateriController::class, 'kelasIp']);

    // supaya ga keliatan jawaban kelas ip
    Route::post('/kelas-ip/cek', [MateriController::class, 'cekKelasIp']);

    // network dan host
    Route::get('/network-host/soal', [MateriController::class, 'getSoalNetworkHost']);

    Route::post('/network-host/cek', [MateriController::class, 'cekJawabanNetworkHost']);

    Route::get(
        '/aktivitas/network-host/soal',
        [AktivitasController::class, 'getSoalNetworkHost']
    );

    Route::post(
        '/aktivitas/network-host/cek',
        [AktivitasController::class, 'cekJawabanNetworkHost']
    );

    // evaluasi
    Route::get('/evaluasi', function () {
        return view('mahasiswa.evaluasi');
    });

    Route::get('/mulai-evaluasi', function () {
        return view('mahasiswa.mulai-evaluasi');
    });

    Route::get('/evaluasi', [KuisController::class, 'petunjukEvaluasi']);

    // IP publik dan privat
    Route::get('/aktivitas/ip-publik-privat/soal', [AktivitasController::class, 'getSoalIpPublikPrivat']);
    Route::post('/aktivitas/ip-publik-privat/cek', [AktivitasController::class, 'cekJawabanIpPublikPrivat']);

});

Route::middleware(['auth', 'role:dosen'])->group(function () {

    Route::get('/dashboard-dosen', [DashboardController::class, 'index']);

    Route::get('/data-nilai', function () {
        return view('dosen.data-nilai');
    });

    Route::get('/data-progres', function () {
        return view('dosen.data-progres');
    });

    Route::get('/data-nilai', [NilaiController::class, 'index']);
    Route::get('/detail-jawaban/{id}', [NilaiController::class, 'detailJawaban']);
    Route::get('/data-progres', [ProgresController::class, 'index']);
    Route::get('/progres-detail/{id}', [ProgresController::class, 'detail']);
    Route::get('/riwayat/{id}', [NilaiController::class, 'riwayat']);
    Route::get('/export-excel', [NilaiController::class, 'exportExcel']);

    Route::get('/data-kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('/data-kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::put('/data-kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/data-kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::post('/data-kelas/join', [KelasController::class, 'join'])->name('kelas.join');
    Route::put('/data-kelas/{id}/update-kkm',[KelasController::class, 'updateKKM'])->name('kelas.updateKKM');

    Route::get('/data-mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
    Route::post('/mahasiswa/tambah-ke-kelas', [MahasiswaController::class, 'tambahKeKelas']);

    Route::get('/export-mahasiswa', [MahasiswaController::class, 'exportMahasiswa']);

    Route::get('/bank-soal', [BankSoalController::class, 'index']);
    Route::put('/bank-soal/update/{id}', [BankSoalController::class, 'update']);
    Route::delete('/bank-soal/delete/{id}', [BankSoalController::class, 'destroy']);
    Route::post('/bank-soal/store', [BankSoalController::class, 'store']);
});


Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});
