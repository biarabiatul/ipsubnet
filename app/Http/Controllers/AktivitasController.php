<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class AktivitasController extends Controller
{
    // BINER
    public function getSoal()
    {
        $soal = [
            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Bilangan biner merupakan sistem bilangan dengan basis ....',
                'opsi' => ['A. 8', 'B. 10', 'C. 16', 'D. 2', 'E. 256'],
                'jawaban' => 3
            ],
            [
                'id' => 2,
                'tipe' => 'isian',
                'q' => 'Pada bilangan biner \\(00100000_2\\) (8-bit), bobot bit yang bernilai 1 adalah ....',
                'jawaban' => '32'
            ],
            [
                'id' => 3,
                'tipe' => 'isian',
                'q' => 'Diketahui bilangan biner \\(00111010_2\\) (8-bit). Nilai desimal dari bilangan tersebut adalah ....',
                'jawaban' => '58'
            ],
            [
                'id' => 4,
                'tipe' => 'pilgan',
                'q' => 'Bilangan biner \\(10101101_2\\) jika dikonversi ke desimal adalah ....',
                'opsi' => ['A. 165', 'B. 169', 'C. 173', 'D. 175', 'E. 181'],
                'jawaban' => 2
            ],
            [
                'id' => 5,
                'tipe' => 'pilgan',
                'q' => 'Perhatikan bilangan biner \\(01010100_2\\) (8-bit). Pernyataan yang benar adalah ....',
                'opsi' => [
                    'A. Terdapat 2 bit bernilai 1',
                    'B. Bit bernilai 1 terdapat pada bobot 64 dan 16',
                    'C. Bit bernilai 1 terdapat pada bobot 32, 8, dan 4',
                    'D. Terdapat 3 bit bernilai 1',
                    'E. Nilai desimalnya kurang dari 40'
                ],
                'jawaban' => 3
            ]
        ];

        // simpan jawaban di session
        Session::put(
            'jawaban_aktivitas',
            collect($soal)->pluck('jawaban', 'id')->toArray()
        );

        // kirim ke frontend TANPA jawaban
        $soalClient = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($soalClient);
    }

    public function cekJawaban(Request $request)
    {
        $jawaban = Session::get('jawaban_aktivitas', []);

        $benar = isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json(['benar' => $benar]);
    }

    // DESIMAL
    public function getSoalDesimal()
    {
        $soal = [
            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Dalam bilangan desimal 5346, angka 3 memiliki nilai ....',
                'opsi' => ['A. 3', 'B. 30', 'C. 300', 'D. 3000', 'E. 30000'],
                'jawaban' => 2
            ],
            [
                'id' => 2,
                'tipe' => 'isian',
                'q' => 'Ubah bilangan desimal \\(7_{10}\\) ke dalam bentuk bilangan biner 8-bit.',
                'jawaban' => '00000111'
            ],
            [
                'id' => 3,
                'tipe' => 'pilgan',
                'q' => 'Hasil konversi bilangan desimal \\(25_{10}\\) ke dalam bentuk bilangan biner 8-bit adalah ....',
                'opsi' => ['A. 00010101', 'B. 00011001', 'C. 00100101', 'D. 00011100', 'E. 00101001'],
                'jawaban' => 0
            ],
            [
                'id' => 4,
                'tipe' => 'pilgan',
                'q' => 'Bilangan desimal \\(128_{10}\\) jika dituliskan dalam bentuk bilangan biner 8-bit adalah ....',
                'opsi' => ['A. 01000000', 'B. 00100000', 'C. 01100000', 'D. 10000000', 'E. 11111111'],
                'jawaban' => 3
            ],
            [
                'id' => 5,
                'tipe' => 'isian',
                'q' => 'Konversi bilangan desimal \\(86_{10}\\) ke dalam bentuk bilangan biner 8-bit.',
                'jawaban' => '01010110'
            ]
        ];

        // SIMPAN JAWABAN DI SESSION (SERVER)
        session([
            'jawaban_desimal' => collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        // KIRIM KE CLIENT TANPA JAWABAN
        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }

    public function cekJawabanDesimal(Request $request)
    {
        $jawaban = session('jawaban_desimal', []);

        $benar = isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json([
            'benar' => $benar
        ]);
    }

    // IP ADDRESS
    public function getSoalIp()
    {
        $soal = [
            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'IP Address dalam jaringan komputer digunakan untuk ....',
                'opsi' => [
                    'A. Menyimpan data pengguna',
                    'B. Mengatur kecepatan koneksi internet',
                    'C. Mengamankan jaringan dari virus',
                    'D. Menghubungkan perangkat ke listrik',
                    'E. Mengidentifikasi setiap perangkat dalam jaringan'
                ],
                'jawaban' => 4
            ],
            [
                'id' => 2,
                'tipe' => 'pilgan',
                'q' => 'Sebuah kantor memiliki 20 komputer yang terhubung dalam satu jaringan. Agar tidak terjadi 
                konflik alamat IP, langkah yang tepat adalah ....',
                'opsi' => [
                    'A. Menggunakan alamat IP yang sama untuk semua komputer',
                    'B. Menggunakan alamat IP publik untuk semua perangkat',
                    'C. Memberikan alamat IP yang berbeda pada setiap komputer',
                    'D. Menggunakan gateway yang berbeda pada setiap komputer',
                    'E. Menggunakan subnet mask yang berbeda'
                ],
                'jawaban' => 2
            ],
            [
                'id' => 3,
                'tipe' => 'pilgan',
                'q' => 'Contoh penulisan IP Address yang benar adalah ....',
                'opsi' => [
                    'A. 192-168-10-5',
                    'B. 192.168.10.300',
                    'C. 192:168:10:5',
                    'D. 192.168.10.5',
                    'E. 256.168.0.1'
                ],
                'jawaban' => 3
            ],
            [
                'id' => 4,
                'tipe' => 'isian',
                'q' => 'Perhatikan beberapa alamat IP berikut: <br>1) 192.168.1.1<br>2) 172.16.10<br>
                3) 10.10.10.256<br>4) 8.8.8.8<br>5) 192.168.100.01<br><br>Alamat IPv4 yang valid secara 
                sintaks ditunjukkan oleh nomor ....',
                'jawaban' => '1,4'
            ],
            [
                'id' => 5,
                'tipe' => 'pilgan',
                'q' => 'Perhatikan alamat IP berikut:<br> 192.168.10.256 <br><br>
                Alamat tersebut tidak valid dikarenakan ....',
                'opsi' => [
                    'A. Jumlah oktet kurang',
                    'B. Setiap oktet tidak dIPisahkan oleh tanda titik',
                    'C. Menggunakan bilangan desimal',
                    'D. Salah satu oktet bernilai lebih dari 255',
                    'E. Memiliki nilai biner 32 bit'
                ],
                'jawaban' => 3
            ],
        ];

        // SIMPAN JAWABAN DI SESSION
        session([
            'jawaban_ip' => collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        // KIRIM KE CLIENT TANPA JAWABAN
        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }

    public function cekJawabanIp(Request $request)
    {
        $jawaban = session('jawaban_ip', []);

        $benar = isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json([
            'benar' => $benar
        ]);
    }


    // KELAS IP ADDRESS
    public function getSoalKelasIP()
    {
        $soal = [
            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Kelas IP yang dirancang untuk jaringan dengan kapasitas host besar dan memiliki panjang Network ID 8 bit adalah .... ',
                'opsi' => ['A. Kelas A', 'B. Kelas B', 'C. Kelas C', 'D. Kelas D', 'E. Kelas E'],
                'jawaban' => 0
            ],
            [
                'id' => 2,
                'tipe' => 'pilgan',
                'q' => 'Alamat IP berikut yang termasuk Kelas C adalah ....',
                'opsi' => [
                    'A.	126.10.10.1',
                    'B.	172.16.1.1',
                    'C.	10.10.10.10',
                    'D. 191.10.10.1',
                    'E. 193.10.10.1'
                ],
                'jawaban' => 4
            ],
            [
                'id' => 3,
                'tipe' => 'isian',
                'q' => 'Saat membuka pengaturan <i>Wi-Fi</i> di laptop, seorang mahasiswa menemukan alamat IP 224.10.10.5. <br>Tentukan kelas IP dari alamat tersebut. ',
                'jawaban' => 'D'
            ],
            [
                'id' => 4,
                'tipe' => 'pilgan',
                'q' => 'Perhatikan alamat IP berikut dalam bentuk biner:<br>01111111.00000001.00000001.00000001<br><br>Alamat IP tersebut termasuk ke dalam kelas ....',
                'opsi' => ['A. Kelas A', 'B. Kelas B', 'C. Kelas C', 'D. Kelas D', 'E. Kelas E'],
                'jawaban' => 0
            ],
            [
                'id' => 5,
                'tipe' => 'pilgan',
                'q' => 'Sebuah alamat IP memiliki byte pertama bernilai \\(10010110_2\\).<br>Jika ditulis dalam bentuk IPv4 desimal, maka alamat tersebut termasuk ke dalam ....',
                'opsi' => ['A. Kelas A', 'B. Kelas B', 'C. Kelas C', 'D. Kelas D', 'E. Kelas E'],
                'jawaban' => 1
            ],
        ];

        // simpan jawaban di session
        Session::put(
            'jawaban_kelas_ip',
            collect($soal)->pluck('jawaban', 'id')->toArray()
        );

        // kirim ke client TANPA jawaban
        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }

    public function cekJawabanKelasIP(Request $request)
    {
        $jawaban = Session::get('jawaban_kelas_ip', []);

        $benar = isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json([
            'benar' => $benar
        ]);
    }


    // NETWORK DAN HOST
    public function getSoalNetworkHost()
    {
        $soal = [
            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Bagian dari alamat IP yang digunakan untuk mengidentifikasi perangkat dalam suatu jaringan disebut ....',
                'opsi' => [
                    'A. Host ID',
                    'B. Network ID',
                    'C. Subnet Mask',
                    'D. Gateway',
                    'E. Broadcast ID'
                ],
                'jawaban' => 0
            ],
            [
                'id' => 2,
                'tipe' => 'pilgan',
                'q' => 'Dua alamat IP berada dalam satu jaringan yang sama apabila memiliki ... yang sama.',
                'opsi' => [
                    'A. Host ID',
                    'B. Network ID',
                    'C. Jumlah oktet',
                    'D. Gateway',
                    'E. Subnet mask berbeda'
                ],
                'jawaban' => 1
            ],

            [
                'id' => 3,
                'tipe' => 'isian',
                'q' => 'Saat melakukan konfigurasi jaringan di laboratorium komputer, seorang mahasiswa 
                        menemukan alamat IP 192.168.10.25. Tentukan Network ID dari alamat IP tersebut.',
                'jawaban' => '192.168.10'
            ],

            [
                'id' => 4,
                'tipe' => 'pilgan',
                'q' => 'Diberikan tiga alamat IP berikut:<br><br>
                        1) 192.168.5.10<br>
                        2) 192.168.5.200<br>
                        3) 192.168.10.15<br><br>
                        Alamat IP yang berada dalam satu jaringan yang sama adalah ....',
                'opsi' => [
                    'A. 1 dan 2',
                    'B. 1 dan 3',
                    'C. 2 dan 3',
                    'D. Semua berbeda jaringan',
                    'E. Semua satu jaringan'
                ],
                'jawaban' => 0
            ],

            [
                'id' => 5,
                'tipe' => 'pilgan',
                'q' => 'Perhatikan alamat IP berikut :
                 <br>192.168.4.7. <br><br>Pernyataan berikut yang BENAR terkait alamat IP yang berada dalam satu jaringan adalah ....',
                'opsi' => [
                    'A. 192.168.5.1 berada dalam satu jaringan karena memiliki jumlah oktet yang sama',
                    'B. 192.168.10.7 berada dalam satu jaringan karena memiliki kelas IP yang sama',
                    'C. 172.168.4.7 berada dalam satu jaringan karena memiliki Host ID yang mirip',
                    'D. 192.169.4.7 berada dalam satu jaringan karena hanya berbeda satu angka',
                    'E. 192.168.4.200 berada dalam satu jaringan karena memiliki Network ID yang sama'
                ],
                'jawaban' => 4
            ]
        ];


        // simpan jawaban di session (SERVER ONLY)
        session([
            'jawaban_network_host' =>
                collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        // kirim ke client TANPA jawaban
        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }


    public function cekJawabanNetworkHost(Request $request)
    {
        $jawaban = session('jawaban_network_host', []);

        $benar =
            isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json([
            'benar' => $benar
        ]);
    }

    // IP PUBLIK DAN PRIVAT
    public function getSoalIpPublikPrivat()
    {
        $soal = [
            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Saat menggunakan Wi-Fi kampus untuk mengakses internet, perangkat memerlukan alamat 
                        IP yang dapat dikenali secara unik di seluruh dunia agar dapat berkomunikasi langsung melalui internet. Jenis alamat IP tersebut disebut .... ',
                'opsi' => [
                    'A. IP Privat',
                    'B. IP Lokal',
                    'C. IP Loopback',
                    'D. IP Publik',
                    'E. IP Broadcast'
                ],
                'jawaban' => 3
            ],
            [
                'id' => 2,
                'tipe' => 'pilgan',
                'q' => 'Ketika memeriksa pengaturan jaringan pada komputer di laboratorium, muncul alamat   IP 192.168.10.5. Jenis alamat IP tersebut adalah ....',
                'opsi' => [
                    'A. IP Publik',
                    'B. IP Multicast',
                    'C. IP Privat',
                    'D. IP Loopback',
                    'E. IP Broadcast'
                ],
                'jawaban' => 2
            ],
            [
                'id' => 3,
                'tipe' => 'pilgan',
                'q' => 'Perhatikan alamat <i>IP</i> berikut:
                    <ul>
                        <li>10.1.5.8</li>
                        <li>8.8.8.8</li>
                        <li>172.20.10.4</li>
                        <li>192.168.1.25</li>
                    </ul>
                    Yang menunjukkan <i>IP</i> Publik adalah ....',
                'opsi' => [
                    'A. 10.1.5.8 dan 172.20.10.4',
                    'B. 172.20.10.4 dan 192.168.1.25',
                    'C. 8.8.8.8 saja',
                    'D. 10.1.5.8 dan 192.168.1.25',
                    'E. Semua termasuk IP publik'
                ],
                'jawaban' => 2
            ],
            [
                'id' => 4,
                'tipe' => 'pilgan',
                'q' => 'Sebuah kantor menggunakan alamat IP 10.0.0.15 pada jaringan internal. Agar dapat mengakses internet menggunakan satu IP publik yang sama dengan perangkat lain, maka diperlukan mekanisme ....',
                'opsi' => [
                    'A. DNS',
                    'B. RFC 1918',
                    'C. DHCP',
                    'D. CIDR',
                    'E. NAT'
                ],
                'jawaban' => 4
            ],
            [
                'id' => 5,
                'tipe' => 'pilgan',
                'q' => 'Alamat IP privat dapat digunakan oleh banyak jaringan berbeda tanpa menimbulkan konflik di internet karena ....',
                'opsi' => [
                    'A. IP privat tidak dirutekan di internet',
                    'B. IP privat selalu berubah secara otomatis',
                    'C. IP privat bersifat unik secara global ',
                    'D. IP privat hanya digunakan oleh ISP',
                    'E. IP privat jumlahnya tidak terbatas'
                ],
                'jawaban' => 0
            ],
        ];

        session([
            'jawaban_ip_publik_privat' =>
                collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }


    public function cekJawabanIpPublikPrivat(Request $request)
    {
        $jawaban = session('jawaban_ip_publik_privat', []);

        $benar =
            isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json([
            'benar' => $benar
        ]);
    }

    public function getSoalSubnetMask()
    {
        $soal = [
            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Saat menyambungkan laptop ke jaringan internet, subnet mask membantu perangkat menentukan ....',
                'opsi' => [
                    'A. Jumlah perangkat dalam jaringan',
                    'B. Bagian network dan host dari alamat IP',
                    'C. Alamat gateway',
                    'D. Kecepatan jaringan',
                    'E. Alamat DNS'
                ],
                'jawaban' => 1
            ],
            [
                'id' => 2,
                'tipe' => 'pilgan',
                'q' => '
                    Perhatikan pernyataan berikut:<br><br>
                    1) Subnet mask dengan bit 1 digunakan untuk menentukan bagian host<br>
                    2) Subnet mask dengan bit 0 digunakan untuk menentukan bagian network<br>
                    3) Bit 1 pada subnet mask menunjukkan bagian network address<br>
                    4) Bit 0 pada subnet mask menunjukkan bagian network address<br><br>
                    Pernyataan yang benar ditunjukkan oleh nomor ....
                ',
                'opsi' => [
                    'A. 1 dan 2',
                    'B. 1 dan 3',
                    'C. 2 dan 4',
                    'D. 3 dan 4',
                    'E. 3 saja'
                ],
                'jawaban' => 4
            ],
            [
                'id' => 3,
                'tipe' => 'pilgan',
                'q' => 'Saat bermain game online di warnet, sebuah komputer memperoleh alamat IP 188.10.182 
                dengan subnet mask 255.255.0.0. Network Address dari alamat IP tersebut adalah .... ',
                'opsi' => [
                    'A. 188.0.0.0',
                    'B. 188.10.0.0',
                    'C. 188.10.18.0',
                    'D. 188.255.0.0',
                    'E. 188.10.18.2'
                ],
                'jawaban' => 1
            ],
            [
                'id' => 4,
                'tipe' => 'pilgan',
                'q' => 'Sebuah printer jaringan di perpustakaan menggunakan IP Address 10.10.48.80 dengan 
                subnet mask 255.0.0.0. Network Address yang benar adalah ....',
                'opsi' => [
                    'A. 10.0.0.0',
                    'B. 10.10.0.0',
                    'C. 10.10.48.0',
                    'D. 0.0.0.0',
                    'E. 10.10.48.80'
                ],
                'jawaban' => 0
            ],
            [
                'id' => 5,
                'tipe' => 'isian',
                'q' => 'Sebuah Smart TV pada jaringan rumah memiliki IP Address 192.149.24.191 dengan subnet mask 255.255.255.0. Tentukan Network Address dari alamat IP tersebut.',
                'jawaban' => '192.149.24.0'
            ],

        ];

        // simpan jawaban di SESSION (server only)
        session([
            'jawaban_subnet_mask' =>
                collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        // kirim ke client TANPA jawaban
        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }

    public function cekJawabanSubnetMask(Request $request)
    {
        $jawaban = session('jawaban_subnet_mask', []);

        $benar =
            isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json([
            'benar' => $benar
        ]);
    }

    public function getSoalCIDR()
    {
        $soal = [

            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Sebuah <i>access point Wi-Fi</i> pada gedung kampus menggunakan alamat IP 192.168.1.0/27. Subnet mask dari alamat IP tersebut adalah .... ',
                'opsi' => [
                    'A. 255.255.255.0',
                    'B. 255.255.255.128',
                    'C. 255.255.255.192',
                    'D. 255.255.255.224',
                    'E. 255.255.255.240'
                ],
                'jawaban' => 3
            ],

            [
                'id' => 2,
                'tipe' => 'pilgan',
                'q' => 'Server Fakultas Ekonomi dan Bisnis Universitas Lambung Mangkurat menggunakan alamat IP 172.16.0.0/20. Subnet mask dari alamat IP tersebut adalah ....',
                'opsi' => [
                    'A. 255.255.0.0',
                    'B. 255.255.240.0',
                    'C. 255.255.255.0',
                    'D. 255.255.224.0',
                    'E. 255.240.0.0'
                ],
                'jawaban' => 1
            ],

            [
                'id' => 3,
                'tipe' => 'pilgan',
                'q' => 'Jaringan pada Fakultas Teknik Universitas Lambung Mangkurat menggunakan alamat IP 10.0.0.0/12. Subnet mask dari alamat IP tersebut adalah .... ',
                'opsi' => [
                    'A. 255.0.0.0',
                    'B. 255.255.0.0',
                    'C. 255.255.240.0',
                    'D. 255.248.0.0',
                    'E. 255.240.0.0'
                ],
                'jawaban' => 4
            ],

            [
                'id' => 4,
                'tipe' => 'isian',
                'q' => 'Sebuah komputer pada Laboratorium Komputer FKIP Universitas Lambung Mangkurat memiliki IP Address 192.168.40.31/20. Tentukan Network Address dari alamat IP tersebut.',
                'jawaban' => '192.168.32.0'
            ],

            [
                'id' => 5,
                'tipe' => 'isian',
                'q' => 'Access point Wi-Fi pada gedung Rektorat Universitas Lambung Mangkurat menggunakan IP Address 192.168.1.130/26. Tentukan Network Address dari alamat IP tersebut.',
                'jawaban' => '192.168.1.128'
            ],

        ];

        session([
            'jawaban_cidr' =>
                collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }

    public function cekJawabanCIDR(Request $request)
    {
        $jawaban = session('jawaban_cidr', []);

        $benar =
            isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json([
            'benar' => $benar
        ]);
    }

    // SUBNETTING (KONSEP)
    public function getSoalSubnetting()
    {
        $soal = [
            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Dalam sebuah jaringan komputer skala besar, administrator berencana menerapkan teknik subnetting untuk meningkatkan efisiensi dan mempermudah pengelolaan jaringan. <br><br>
                
                Proses yang dilakukan oleh administrator tersebut dikenal sebagai ....',
                'opsi' => [
                    'A. Menggabungkan beberapa jaringan kecil menjadi satu jaringan besar',
                    'B. Mengubah alamat IP menjadi alamat MAC',
                    'C. Membagi satu jaringan besar menjadi beberapa jaringan kecil',
                    'D. Menghubungkan jaringan tanpa menggunakan router',
                    'E. Menambah jumlah host dalam satu jaringan tanpa batas'
                ],
                'jawaban' => 2
            ],
            [
                'id' => 2,
                'tipe' => 'pilgan',
                'q' => 'Sebuah perusahaan memiliki jaringan besar dengan banyak perangkat. Setelah dilakukan subnetting, lalu lintas data menjadi lebih terkontrol dan kinerja jaringan meningkat.<br><br>
                
                Berdasarkan kondisi tersebut, manfaat utama dari subnetting adalah ....',
                'opsi' => [
                    'A. Menambah jumlah perangkat tanpa batas dalam satu jaringan',
                    'B. Mengurangi lalu lintas jaringan dan meningkatkan kinerja jaringan',
                    'C.	Menghilangkan kebutuhan perangkat jaringan seperti router',
                    'D.	Mengubah semua alamat IP menjadi lebih sederhana',
                    'E.	Menghubungkan semua subnet tanpa proses routing'
                ],
                'jawaban' => 1
            ],
            [
                'id' => 3,
                'tipe' => 'pilgan',
                'q' => 'Perhatikan pernyataan berikut:
                <ol style="margin-left:18px;">
                    <li>Mengurangi lalu lintas jaringan</li>
                    <li>Menambah jumlah host dalam satu subnet</li>
                    <li>Mempermudah pengelolaan jaringan</li>
                    <li>Semua perangkat harus melewati router meskipun dalam satu subnet</li>
                    <li>Meningkatkan efisiensi penggunaan alamat IP</li>
                </ol>
                Pernyataan yang benar tentang subnetting ditunjukkan oleh nomor ....
            ',
                'opsi' => [
                    'A. 1, 2, dan 4',
                    'B. 1, 3, dan 5',
                    'C. 2, 3, dan 4',
                    'D. 2, 4, dan 5',
                    'E. 1, 4, dan 5'
                ],
                'jawaban' => 1
            ],
            [
                'id' => 4,
                'tipe' => 'pilgan',
                'q' => 'Dalam proses subnetting, alamat IP mengalami perubahan struktur. Awalnya alamat IP terdiri dari network dan host, kemudian setelah subnetting ditambahkan bagian baru.
                Struktur alamat IP setelah dilakukan subnetting adalah ....',
                'opsi' => [
                    'A. Network + Host + Broadcast',
                    'B. Subnet + Host + Broadcast',
                    'C. Network + Subnet + Host',
                    'D. Host + Subnet + Network',
                    'E. Network + Broadcast + Subnet'
                ],
                'jawaban' => 2
            ],
            [
                'id' => 5,
                'tipe' => 'pilgan',
                'q' => 'Seorang administrator melakukan subnetting dengan meminjam bit dari bagian host. Ia menyadari bahwa hal ini memengaruhi jumlah subnet dan host.

                Jika semakin banyak bit host yang dipinjam, maka dampak yang terjadi adalah ....',
                'opsi' => [
                    'A.	Jumlah subnet berkurang dan jumlah host bertambah   ',
                    'B.	Jumlah subnet bertambah dan jumlah host tetap',
                    'C.	Jumlah subnet tetap dan jumlah host berkurang',
                    'D.	Jumlah subnet bertambah dan jumlah host berkurang',
                    'E.	Jumlah subnet dan host sama-sama bertambah'
                ],
                'jawaban' => 3
            ],
        ];

        session([
            'jawaban_subnetting' =>
                collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        // Kirim ke client TANPA jawaban
        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }

    public function cekJawabanSubnetting(Request $request)
    {
        $jawaban = session('jawaban_subnetting', []);

        $benar =
            isset($jawaban[$request->id_soal]) &&
            $jawaban[$request->id_soal] == $request->jawaban_user;

        return response()->json([
            'benar' => $benar
        ]);
    }

    public function getSoalPerhitunganSubnetting()
    {
        $soal = [

            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Sebuah perusahaan memiliki jaringan dengan alamat <strong>192.168.1.0/24</strong>. Untuk meningkatkan efisiensi jaringan, administrator melakukan <i>subnetting</i> dengan meminjam <strong>2 bit</strong> dari bagian host. Jumlah subnet yang dihasilkan adalah ....',
                'opsi' => [
                    'A. 4',
                    'B. 8',
                    'C. 16',
                    'D. 32',
                    'E. 64'
                ],
                'jawaban' => 0
            ],

            [
                'id' => 2,
                'tipe' => 'isian',
                'q' => 'Sebuah sekolah menggunakan jaringan dengan prefix /26 untuk setiap laboratorium komputer. Jumlah host valid yang dapat digunakan pada setiap subnet adalah ....',
                'jawaban' => '62'
            ],

            [
                'id' => 3,
                'tipe' => 'pilgan',
                'q' => 'Sebuah kantor mengatur jaringannya menggunakan alamat <strong>192.168.10.0/27</strong>. Nilai blok <i>subnet</i> yang dihasilkan adalah ....',
                'opsi' => [
                    'A. 2',
                    'B. 4',
                    'C. 8',
                    'D. 16',
                    'E. 32'
                ],
                'jawaban' => 4
            ],
            [
                'id' => 4,
                'tipe' => 'pilgan',
                'q' => 'Sebuah perusahaan memiliki jaringan dengan alamat <strong>192.168.1.0/24</strong>. Untuk membagi jaringan ke beberapa divisi, administrator meminjam <strong>4 bit</strong> untuk <i>subnetting</i>. Jumlah host yang dapat digunakan pada setiap subnet adalah ....',
                'opsi' => [
                    'A. 12',
                    'B. 13',
                    'C. 14',
                    'D. 16',
                    'E. 126'
                ],
                'jawaban' => 2
            ],
            [
                'id' => 5,
                'tipe' => 'isian',
                'q' => 'Diketahui jaringan 192.168.1.0/27. Tentukan alamat broadcast untuk subnet pertama.',
                'jawaban' => '192.168.1.31'
            ],
        ];

        session([
            'jawaban_perhitungan_subnetting' =>
                collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }
    public function cekJawabanPerhitunganSubnetting(Request $request)
    {
        $jawaban = session('jawaban_perhitungan_subnetting', []);

        $user = strtolower(trim($request->jawaban_user));
        $kunci = strtolower(trim($jawaban[$request->id_soal] ?? ''));

        $benar = $user == $kunci;

        return response()->json([
            'benar' => $benar
        ]);
    }

    public function getSoalVLSM()
    {
        $soal = [

            [
                'id' => 1,
                'tipe' => 'pilgan',
                'q' => 'Dalam metode VLSM, langkah pertama yang harus dilakukan adalah ....',
                'opsi' => [
                    'A.	Menentukan subnet mask',
                    'B.	Menghitung jumlah host',
                    'C.	Menentukan network address',
                    'D.	Menghitung broadcast address',
                    'E.	Mengurutkan kebutuhan host dari terbesar ke terkecil'
                ],
                'jawaban' => 4
            ],

            [
                'id' => 2,
                'tipe' => 'pilgan',
                'q' => 'Sebuah jaringan akan dibagi menggunakan metode <i>VLSM</i> dengan kebutuhan host sebagai berikut:<br><br>
                50, 25, 10, dan 5 host.<br><br>
                Agar penggunaan alamat <i>IP</i> efisien dan tidak terjadi pemborosan, urutan alokasi <i>subnet</i> yang paling tepat adalah ....',

                'opsi' => [
                    'A. 5 -> 10 -> 25 -> 50',
                    'B. 10 -> 5 -> 25 -> 50',
                    'C. 25 -> 50 -> 10 -> 5',
                    'D. 50 -> 25 -> 10 -> 5',
                    'E. 50 -> 10 -> 25 -> 5'
                ],
                'jawaban' => 3
            ],

            [
                'id' => 3,
                'tipe' => 'pilgan',
                'q' => 'Sebuah laboratorium komputer memiliki 50 perangkat yang terhubung dalam satu jaringan. Prefix yang paling sesuai adalah .... ',
                'opsi' => [
                    'A.	/27',
                    'B.	/28',
                    'C.	/26',
                    'D.	/29',
                    'E.	/30'
                ],
                'jawaban' => 2
            ],

            [
                'id' => 4,
                'tipe' => 'isian',
                'q' => 'Sebuah ruang kelas memiliki 25 komputer yang terhubung ke jaringan dengan alamat 
                192.168.20.0/24. Tentukan prefix yang sesuai. Tentukan prefix yang sesuai untuk subnet 
                tersebut.',
                'jawaban' => '/27'
            ],

            [
                'id' => 5,
                'tipe' => 'pilgan',
                'q' => 'Pada teknik VLSM, subnet dengan kebutuhan host terbesar akan dialokasikan terlebih dahulu karena ....',
                'opsi' => [
                    'a.	Agar mudah dihitung',
                    'b.	Agar semua subnet memiliki ukuran sama',
                    'c.	Agar subnet kecil lebih rapi',
                    'd.	Untuk menghindari kehabisan alamat IP pada subnet besar',
                    'e.	Untuk mempercepat proses routing'
                ],
                'jawaban' => 3
            ],
        ];

        session([
            'jawaban_vlsm' =>
                collect($soal)->pluck('jawaban', 'id')->toArray()
        ]);

        $client = collect($soal)
            ->map(fn($s) => collect($s)->except('jawaban'))
            ->values();

        return response()->json($client);
    }

    public function cekJawabanVLSM(Request $request)
    {
        $jawaban = session('jawaban_vlsm', []);

        $user = strtolower(trim($request->jawaban_user));
        $kunci = strtolower(trim($jawaban[$request->id_soal] ?? ''));

        $benar = $user == $kunci;

        return response()->json([
            'benar' => $benar
        ]);
    }
}
