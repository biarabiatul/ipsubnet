@extends('mahasiswa.mahasiswa')

@section('title', 'Subbab - Network ID dan Host ID')

<title>BAB 2 : IP Addressing</title>

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .materi-box {
            background: #ffffff;
            border-radius: 8px;
            margin-bottom: 24px;
            border: 1px solid #d6c3b2;
            overflow: hidden;
        }

        .materi-box .box-header {
            background: #977c6b;
            color: #ffffff;
            padding: 12px 16px;
            font-weight: 700;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* BODY */
        .materi-box .box-body {
            padding: 18px;
            line-height: 1.8;
            text-align: justify;
            color: #1f2937;
        }

        /* ICON */
        .icon-circle {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        /* ILUSTRASI IP */
        .ip-illustration {
            position: relative;
            margin: 30px auto 10px;
            max-width: 600px;
        }

        .ip-illustration img {
            width: 100%;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }

        /* CONTOH & LATIHAN */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
            margin-top: 18px;
        }

        /* AKTIVITAS */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
        }

        /* ayo berlatih */
        .ip-chunk {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            cursor: pointer;
        }

        /* BELUM DINILAI */
        .ip-chunk.selected {
            border: 2px solid #9ca3af;
            background: #f3f4f6;
        }

        /* HASIL */
        .ip-chunk.correct {
            border: 2px solid #16a34a;
            background: #ecfdf5;
        }

        .ip-chunk.wrong {
            border: 2px solid #b91c1c;
            background: #fef2f2;
        }

        .network-host-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        .nh-col strong {
            display: block;
            margin-bottom: 12px;
        }

        /* Judul kecil */
        .conversion-title {
            font-size: 18px;
            font-weight: 700;
            color: #89471e;
            margin-top: 0;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Deskripsi */
        .conversion-desc {
            font-size: 14px;
            color: #374151;
            margin-bottom: 18px;
        }

        /* cek jawban ayo berlatih */
        .btn-cek {
            background: linear-gradient(135deg, #89471e, #b45309);
            color: #ffffff;
            border: none;
            padding: 10px 26px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 999px;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);

            margin-top: 10px;
            display: block;
        }

        .btn-cek:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(137, 71, 30, 0.45);
        }

        .btn-cek:active {
            transform: scale(0.96);
        }

        /* BOX SOAL */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
        }

        /* NOMOR SOAL */
        .question-number {
            font-size: 14px;
            font-weight: 600;
            color: #89471e;
            margin-bottom: 6px;
        }

        /* TEKS SOAL */
        .question-text {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 14px;
        }

        /* OPSI */
        .options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* container opsi */
        .option {
            border: 1.5px solid #d6c3b2;
            border-radius: 6px;
            padding: 10px 14px;
            cursor: pointer;
            background: #ffffff;
            transition: background 0.15s ease;
            display: flex;
            align-items: center;
        }

        /* hover halus */
        .option:hover {
            background: #f9f5f2;
        }

        /* sembunyikan radio */
        .option input[type="radio"] {
            display: none;
        }

        /* teks opsi */
        .option-text {
            font-size: 15px;
            color: #1f2937;
        }

        /* saat dipilih */
        .option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
        }

        /* ISIAN */
        .fill-input {
            width: 100%;
            padding: 10px;
            border: 1.5px solid #d6c3b2;
            border-radius: 6px;
        }

        /* FEEDBACK */
        .quiz-feedback {
            margin-top: 14px;
            font-weight: 600;
        }

        /* INFO BOX CONTOH SOAL */
        .info-box {
            background: #fef9f6;
            border-left: 5px solid #89471e;
            padding: 16px 20px;
            margin: 18px 0;
            border-radius: 6px;
        }

        .info-box .info-title {
            font-weight: 700;
            color: #89471e;
            margin-bottom: 10px;
        }

        /* teks contoh khusus */
        .binary-text {
            font-size: 16px;
            font-weight: 700;
            background: #fff7ed;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
            border: 1px solid #f59e0b;
        }

        /* container tombol */
        .quiz-nav-left {
            display: flex;
            justify-content: flex-start;
            gap: 12px;
            margin-top: 20px;
        }

        /* tombol kembali */
        .prev-btn {
            background: #6b7280;
            color: #ffffff;
            border: none;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease;
        }

        /* tombol next */
        .next-btn {
            background: #b45309;
            color: #ffffff;
            border: none;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease;
        }

        /* hover */
        .prev-btn:hover:not(:disabled) {
            background: #4b5563;
            transform: translateY(-1px);
        }

        .next-btn:hover:not(:disabled) {
            background: #92400e;
            transform: translateY(-1px);
        }

        /* disabled */
        .prev-btn:disabled,
        .next-btn:disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
            transform: none;
        }

        /* navigasi */
        .nav-bottom {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* style umum */
        .nav-btn {
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: 0.3s ease;
            color: #ffffff;
        }

        .nav-prev {
            background-color: #6b7280;
        }

        .nav-prev:hover {
            background-color: #4b5563;
        }

        .nav-next {
            background-color: #b45309;
        }

        .nav-next:hover {
            background-color: #6f3717;
            color: #ffffff;
        }

        .box-body p {
            margin-bottom: 14px;
        }

        /* highlight penting */
        .key-point {
            background: #fff7ed;
            border-left: 4px solid #f59e0b;
            padding: 10px 14px;
            border-radius: 6px;
            margin: 14px 0;
        }

        /* contoh list IP */
        .ip-list {
            margin-top: 10px;
            padding-left: 20px;
            line-height: 1.9;
        }

        /* sub highlight */
        .soft-box {
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            border: 1px solid #f59e0b;
            padding: 14px 16px;
            border-radius: 10px;
            margin: 14px 0;
        }

        .soft-box strong {
            display: inline-block;
            margin-bottom: 10px;
            color: #9a3412;
            background: #fed7aa;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 13px;
        }

        .highlight-question {
            background: #f3ebe6;
            border-left: 4px solid #89471e;
            padding: 8px 12px;
            margin: 14px auto;
            font-weight: 500;
            color: #4b2e1f;
            border-radius: 6px;
            font-style: italic;
            font-size: 15px;
            max-width: 700px;
            text-align: center;
        }

        /* IP STATIC STYLE */
        .ip-animate {
            display: inline-flex;
            border-radius: 10px;
            overflow: hidden;
            margin: 8px 6px;
            border: 1px solid #e5e7eb;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* NETWORK */
        .ip-animate .net {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1d4ed8;
            padding: 8px 14px;
        }

        .ip-animate .host {
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            color: #15803d;
            padding: 8px 14px;
            border-left: 2px solid #ffffff;
        }

        /* efek hover biar ga kaku */
        .ip-animate:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
        }

        .section-title {
            font-size: 17px;
            font-weight: 700;
            color: #9a3412;
            margin-top: 20px;
            margin-bottom: 8px;
        }

        .clean-list {
            margin-top: 10px;
            padding-left: 20px;
        }

        .clean-list li {
            margin-bottom: 12px;
            line-height: 1.7;
        }

        .rule-list {
            margin-top: 10px;
            padding-left: 20px;
        }

        .rule-list li {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .activity-intro-title {
            margin-top: 0;
            margin-bottom: 6px;
            font-weight: 700;
            font-size: 16px;
            color: #1f2937;
        }

        .activity-intro-desc {
            margin-top: 0;
            margin-bottom: 18px;
            font-size: 14px;
            line-height: 1.7;
            color: #374151;
        }

        .interactive-ip {
            background: #fffaf5;
            border: 1px solid #f59e0b;
            padding: 16px;
            border-radius: 10px;
            text-align: center;
        }

        .ip-class-buttons {
            margin-bottom: 12px;
        }

        .ip-class-buttons button {
            margin: 4px;
            padding: 8px 16px;
            border: none;
            background: #b45309;
            color: #fff;
            border-radius: 999px;
            cursor: pointer;
        }

        .class-btn {
            font-family: inherit;
            padding: 8px 18px;
            border-radius: 999px;
            border: 1.5px solid #b45309;
            background: #fff7ed;
            color: #9a3412;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .class-btn:hover {
            background: #fbbf24;
            color: #78350f;
        }

        .class-btn.active {
            background: linear-gradient(135deg, #b45309, #fbbf24; );
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .bit-visual {
            display: flex;
            height: 40px;
            border-radius: 6px;
            overflow: hidden;
            margin: 12px 0;
        }

        .net-bar {
            background: #3b82f6;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .host-bar {
            background: #22c55e;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .desc-box {
            background: #fff7ed;
            border: 1px solid #f59e0b;
            border-left: 5px solid #b45309;
            padding: 10px 14px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #78350f;
            margin-top: 10px;
            display: inline-block;
        }

        .step-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
        }

        /* tombol angka */
        .page-btn {
            min-width: 42px;
            height: 42px;
            border-radius: 10px;
            border: 1px solid #d97706;
            background: #fffaf5;
            color: #7c3f1d;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        /* hover */
        .page-btn:hover {
            background: #fdf3ea;
            border-color: #e6c7b8;
            transform: translateY(-2px);
        }

        /* aktif */
        .page-btn.active {
            background: #b45309;
            color: #ffffff;
            border-color: #b45309;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        /* tombol panah */
        .nav-arrow {
            background: #fffaf5;
            border: 1px solid #e6c7b8;
            color: #7c3f1d;
            font-size: 18px;
        }

        .nav-arrow:hover {
            background: #fdf3ea;
        }

        .step-section {
            display: none;
        }

        .step-section.active {
            display: block;
        }

        .instruction-box {
            background: #fdf6ef;
            border: 1px solid #f59e0b;
            border-radius: 12px;
            padding: 18px 22px;
            margin: 16px 0 22px;
            font-size: 14px;
        }

        .instruction-title {
            font-weight: 700;
            color: #92400e;
            margin-bottom: 8px;
        }

        .swal-radio-group {
            text-align: left;
            margin-top: 12px;
        }

        /* CARD OPTION */
        .swal-radio-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1.5px solid #e5e7eb;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 14px;
            background: #ffffff;
        }

        /* HOVER */
        .swal-radio-option:hover {
            background: #fff7ed;
            border-color: #f59e0b;
            transform: translateY(-1px);
        }

        /* RADIO */
        .swal-radio-option input {
            accent-color: #b45309;
            transform: scale(1.2);
        }

        /* SELECTED */
        .swal-radio-option:has(input:checked) {
            background: #fde68a;
            border-color: #d97706;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .broadcast-img {
            text-align: center;
            margin: 18px 0;
        }

        .broadcast-img img {
            width: 60%;
            max-width: 60%;
            height: auto;
        }

        .caption-broadcast {
            font-size: 13px;
            color: #6b7280;
            margin-top: 10px;
        }

        @media (max-width:768px) {

            .broadcast-img img {

                width: 100%;
                max-width: 100%;

                height: auto;
            }

        }
    </style>

    <!-- NETWORK ID & HOST ID -->
    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-diagram-3-fill"></i>
                </div>
                Network ID dan Host ID
            </div>

            <div class="box-body">
                Pada subbab sebelumnya telah dijelaskan bahwa <i>IP Address</i> terdiri dari dua bagian, yaitu
                <strong><i>Network ID</i></strong> dan <strong><i>Host ID</i></strong>. <strong><i>Network ID</i></strong>
                menunjukkan <strong>jaringan tempat perangkat berada</strong>, sedangkan <strong><i>Host ID</i></strong>
                menunjukkan <strong>identitas perangkat dalam jaringan tersebut</strong>.

                <div class="highlight-question">
                    Dua alamat IP berada dalam jaringan yang sama jika memiliki Network ID yang sama. Namun, setiap
                    perangkat harus memiliki Host ID yang berbeda agar tidak terjadi konflik alamat.
                </div>

                <br>
                Untuk mempermudah pemahaman, <i>IP Address</i> dapat dianalogikan seperti <strong>alamat rumah</strong>.
                <i>Network ID</i> diibaratkan sebagai nama jalan, sedangkan <i>Host ID</i> sebagai nomor rumah. Jika nama
                jalannya sama, maka rumah berada dalam satu lingkungan, tetapi setiap rumah harus memiliki nomor yang
                berbeda.

                <!-- ===== ILUSTRASI NETWORK & HOST ID ===== -->
                <div class="ip-illustration">
                    <div class="img-wrapper">
                        <img src="{{ asset('assets/img/rumah.png') }}" alt="Ilustrasi IP">
                    </div>
                    <div style="font-size:13px; color:#6b7280; margin-top:6px; margin-left:200px;">
                        Gambar 2.9 Analogi Network dan Host
                    </div>
                </div>

                <br>
                <div class="soft-box">
                    Sebagai contoh, perhatikan tiga <i>IP address</i> berikut:

                    <!-- GAMBAR -->
                    <div style="text-align:center; margin:18px 0;">
                        <img src="{{ asset('assets/img/network-hostt.png') }}" alt="Ilustrasi IP Address dalam Jaringan"
                            style="max-width:30%;">
                        <div style="font-size:13px; color:#6b7280; margin-top:10px;">
                            Gambar 2.10 Ilustrasi Network ID dan Host ID
                        </div>
                    </div>

                    <i>IP address</i>
                    <div class="ip-animate">
                        <span class="net">192.168.5</span>
                        <span class="host">.10</span>
                    </div>
                    dan
                    <div class="ip-animate">
                        <span class="net">192.168.5</span>
                        <span class="host">.200</span>
                    </div>
                    memiliki <i>Network ID</i> yang sama, yaitu
                    <div class="ip-animate">
                        <span class="net">192.168.5</span>
                    </div>
                    , sehingga keduanya
                    berada dalam satu jaringan. Sedangkan <i>IP address</i>
                    <div class="ip-animate">
                        <span class="net">192.168.10</span>
                        <span class="host">.15</span>
                    </div>
                    memiliki <i>Network ID</i> yang berbeda, sehingga
                    berada pada jaringan yang berbeda.
                </div>

                <br>
                Selain itu, ada juga yang disebut dengan <strong><i>Broadcast Address</i></strong>. Jika <i>network</i>
                diibaratkan sebagai nama jalan dan <i>host</i> sebagai nomor rumah, maka <strong><i>Broadcast
                        Address</i></strong> dapat dianalogikan seperti <strong>pengumuman dari ketua RT</strong> kepada
                seluruh warga di satu jalan, sehingga semua rumah menerima informasi yang sama.

                <!-- GAMBAR -->
                <div class="broadcast-img">
                    <img src="{{ asset('assets/img/broadcast.png') }}" alt="Ilustrasi IP Address dalam Jaringan">
                    <div class="caption-broadcast">
                        Gambar 2.11 <i>Broadcast Address</i>
                    </div>
                </div>

                <br>
                Sehingga dapat disimpulkan, <strong><i>Broadcast Address</i></strong> yaitu alamat terakhir dalam suatu
                jaringan yang digunakan untuk mengirim data ke seluruh perangkat dalam jaringan tersebut. Oleh karena itu,
                alamat ini tidak dapat digunakan sebagai alamat perangkat.

                <br><br>
                <i>IP Address</i> berfungsi sebagai alamat unik yang memungkinkan perangkat saling berkomunikasi dalam
                jaringan maupun internet. Setiap penghubung jaringan, seperti <i>LAN</i> atau <i>WiFi</i>, harus memiliki
                <i>IP Address</i> masing-masing.
            </div>
        </div>
    </div>

    <!-- PENENTUAN -->
    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-lightbulb-fill"></i>
                </div>
                Penentuan Network dan Host ID Berdasarkan Kelas
            </div>

            <div class="box-body">
                Kelas alamat <i>IP</i> tidak hanya menentukan rentang alamat yang dapat digunakan, tetapi juga menentukan
                pembagian antara <i>Network ID</i> dan <i>Host ID</i>. Setiap kelas <i>IP</i> memiliki pembagian <i>Network
                    ID</i> dan <i>Host ID</i> yang berbeda. Untuk memahami perbedaannya, pilih salah satu kelas <i>IP</i>
                dengan cara klik kelas IP di bawah ini, kemudian perhatikan pembagian <i>bit</i> antara <i>Network ID</i> dan <i>Host
                    ID</i> yang ditampilkan.

                <br><br>
                <div class="interactive-ip">

                    <div class="ip-class-buttons">
                        <button class="class-btn active" onclick="setClass('A', this)">Kelas A</button>
                        <button class="class-btn" onclick="setClass('B', this)">Kelas B</button>
                        <button class="class-btn" onclick="setClass('C', this)">Kelas C</button>
                    </div>

                    <div class="bit-visual">
                        <div id="netBar" class="net-bar">Network</div>
                        <div id="hostBar" class="host-bar">Host</div>
                    </div>

                    <div id="descBox" class="desc-box">
                        <span id="descText"></span>
                    </div>

                </div>

                <br>
                <div class="section-title">Aturan Dasar Pemilihan <i>Network ID</i> dan <i>Host ID</i></div>

                <ul class="rule-list">
                    <li><strong><i>Network ID</i></strong> tidak boleh bernilai 127 (digunakan sebagai <i>loopback</i> yaitu
                        alamat yang digunakan oleh komputer untuk mengakses dirinya sendiri).</li>
                    <li><strong><i>Network ID</i> dan <i>Host ID</i> tidak boleh bernilai 255</strong>
                        (<i>broadcast</i>yaitu alamat yang mewakili seluruh <i>host</i> dalam suatu <i>network</i>).</li>
                    <li><strong><i>Network ID</i> dan <i>Host ID</i> tidak boleh bernilai 0</strong> (alamat <i>network</i>
                        yaitu alamat yang digunakan untuk merepresentasikan suatu jaringan, bukan perangkat).</li>
                    <li><strong><i>Host ID</i> harus unik</strong> dalam satu <i>network</i>.</li>
                </ul>

                <div class="info-box">
                    <div class="info-title">
                        Contoh Soal
                    </div>

                    Saat melakukan konfigurasi jaringan di laboratorium komputer, seorang mahasiswa menemukan alamat IP
                    <strong>192.10.10.18</strong>. Tentukan <i>Network ID</i> dan <i>Host ID</i> dari alamat IP tersebut.

                    <br><br>
                    <strong>Penyelesaian:</strong>

                    <ol style="margin-left:18px; margin-top:10px;">
                        <li>
                            Tentukan kelas IP berdasarkan oktet pertama.
                            <br>
                            Oktet pertama = <span class="binary-text">192</span> <i class="bi bi-arrow-right"></i> termasuk
                            <strong>Kelas C</strong>
                        </li>

                        <li>
                            Pada Kelas C:
                            <ul>
                                <li>Network ID = 3 oktet pertama</li>
                                <li>Host ID = 1 oktet terakhir</li>
                            </ul>
                            Maka:
                            <ul>
                                <li>Network ID = <strong>192.10.10</strong></li>
                                <li>Host ID = <strong>18</strong></li>
                            </ul>
                        </li>
                    </ol>

                    <div style="
                                margin-top:14px;
                                padding:10px 14px;
                                background:#fef3c7;
                                border:1px solid #f59e0b;
                                font-weight:700;
                                display:inline-block;
                                border-radius:6px;">

                        <i class="bi bi-check-circle-fill" style="color:#16a34a;"></i>
                        Network ID = <strong>192.10.10</strong> &nbsp; | &nbsp;
                        Host ID = <strong>18</strong>
                    </div>
                </div>

                <!-- ayo berlatih -->
                <div class="question-box">
                    <h4 class="conversion-title">Ayo Berlatih!</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>
                        <ol>
                            <li>Perhatikan setiap alamat <i>IP</i> yang ditampilkan.</li>

                            <li>Tentukan kelas <i>IP</i> berdasarkan nilai oktet pertama.</li>

                            <li>Berdasarkan kelas tersebut, tentukan bagian yang termasuk <b><i>Network ID</i></b> dan
                                <b><i>Host ID</i></b>.
                            </li>

                            <li>Klik (<i>circle</i>) oktet yang merupakan <i>Network ID</i> atau <i>Host ID</i> sesuai
                                dengan instruksi pada soal.</li>

                            <li>Klik tombol <b>"Cek Jawaban"</b> untuk memeriksa hasil pilihanmu.</li>
                        </ol>
                    </div>

                    <div class="question-box network-host-layout">

                        <!-- NETWORK -->
                        <div class="nh-col">
                            <strong><i>Circle the Network ID</i></strong>

                            <!-- CONTOH 1 -->
                            <div class="ip-line contoh">
                                <span class="ip-chunk correct locked">177</span>.
                                <span class="ip-chunk correct locked">100</span>.
                                <span class="ip-chunk">18</span>.
                                <span class="ip-chunk">4</span>
                            </div>

                            <!-- CONTOH 2 -->
                            <div class="ip-line contoh">
                                <span class="ip-chunk correct locked">192</span>.
                                <span class="ip-chunk correct locked">168</span>.
                                <span class="ip-chunk correct locked">1</span>.
                                <span class="ip-chunk">10</span>
                            </div>

                        </div>

                        <!-- HOST -->
                        <div class="nh-col">
                            <strong><i>Circle the Host ID</i></strong>

                            <!-- CONTOH 1 -->
                            <div class="ip-line contoh">
                                <span class="ip-chunk">10</span>.
                                <span class="ip-chunk correct locked">15</span>.
                                <span class="ip-chunk correct locked">123</span>.
                                <span class="ip-chunk correct locked">50</span>
                            </div>

                            <!-- CONTOH 2 -->
                            <div class="ip-line contoh">
                                <span class="ip-chunk">171</span>.
                                <span class="ip-chunk">2</span>.
                                <span class="ip-chunk correct locked">199</span>.
                                <span class="ip-chunk correct locked">31</span>
                            </div>

                        </div>
                    </div>

                    <div style="display:flex; justify-content:center; gap:10px; margin-top:10px;">
                        <button class="btn-cek" onclick="cekJawabanKlik()">Cek Jawaban</button>

                        <button class="btn-cek" style="background:#6b7280;" onclick="resetLatihan()">
                            Reset
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- AKTIVITAS -->
    <div class="step-section" id="step3">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <span id="levelTitle">Aktivitas 2.3</span>
            </div>

            <div class="box-body">

                <p class="activity-intro-title">
                    Kerjakan aktivitas berikut untuk mengukur pemahaman dan menambah progress belajarmu.
                </p>

                <p class="activity-intro-desc">
                    Pilih satu jawaban benar dari lima pilihan yang tersedia.
                </p>

                <div id="quizContainer"></div>

                <p id="quizFeedback" style="margin-top:12px; font-weight:600;"></p>

                <div class="quiz-nav-left">
                    <button class="prev-btn" id="prevBtn" onclick="prevSoal()" disabled>
                        Kembali
                    </button>

                    <button class="next-btn" id="nextBtn" onclick="nextSoal()" disabled>
                        Lanjut
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="step-pagination">

        <button class="page-btn nav-arrow" onclick="prevStep()">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="page-btn active" onclick="goToStep(1)" id="stepBtn1">1</button>
        <button class="page-btn" onclick="goToStep(2)" id="stepBtn2">2</button>
        <button class="page-btn" onclick="goToStep(3)" id="stepBtn3">3</button>

        <button class="page-btn nav-arrow" onclick="nextStep()">
            <i class="bi bi-chevron-right"></i>
        </button>

    </div>

    <div class="nav-bottom">
        <a href="/bab2/kelas-ip" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab2/publik-privat" class="nav-btn nav-next" onclick="return cekLanjut(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <script>
        let startTime = Date.now();
        let sudahSelesaiMateri = false;

        let sudahLulusPemahaman = false;
        let aktivitasSelesai = false;

        function sudahBacaMinimal() {

            // bypass kalau sudah pernah selesai
            if (sudahSelesaiMateri) return true;

            let waktu = (Date.now() - startTime) / 1000;

            return waktu >= 120; //2 menit
        }

        function cekLanjut(e) {

            if (sudahSelesaiMateri) {
                window.location.href = "/bab2/publik-privat";
                return false;
            }

            e.preventDefault();

            // =====================
            // 1. CEK WAKTU BACA
            // =====================
            if (!sudahBacaMinimal()) {

                Swal.fire({
                    icon: "warning",
                    title: "Belum Membaca",
                    text: "Silakan baca materi terlebih dahulu sebelum lanjut."
                });

                return false;
            }

            // =====================
            // 2. CEK PEMAHAMAN
            // =====================
            if (!sudahLulusPemahaman) {

                Swal.fire({
                    title: "Cek Pemahaman",
                    html: `
                            <div style="text-align:center; margin-bottom:12px; font-size:16px;">
                                Manakah Network ID dari IP berikut?
                                <br><br>
                                <b>192.168.10.5</b>
                            </div>

                            <div class="swal-radio-group">

                                <label class="swal-radio-option">
                                    <input type="radio" name="jawaban" value="a">
                                    192
                                </label>

                                <label class="swal-radio-option">
                                    <input type="radio" name="jawaban" value="b">
                                    192.168
                                </label>

                                <label class="swal-radio-option">
                                    <input type="radio" name="jawaban" value="c">
                                    192.168.10
                                </label>

                                <label class="swal-radio-option">
                                    <input type="radio" name="jawaban" value="d">
                                    10.5
                                </label>

                            </div>
                        `,
                    confirmButtonText: "Kirim",
                    showCancelButton: true,

                    preConfirm: () => {
                        const selected = document.querySelector('input[name="jawaban"]:checked');

                        if (!selected) {
                            Swal.showValidationMessage("Pilih jawaban dulu!");
                            return false;
                        }

                        return selected.value;
                    }

                }).then((result) => {

                    if (result.isConfirmed) {

                        if (result.value === "c") {

                            sudahLulusPemahaman = true;

                            Swal.fire({
                                icon: "success",
                                title: "Benar!",
                                text: "Network ID untuk kelas C adalah 3 oktet pertama."
                            });

                        } else {

                            Swal.fire({
                                icon: "error",
                                title: "Salah",
                                text: "Perhatikan kembali pembagian Network dan Host ID."
                            });

                        }

                    }

                });

                return false;
            }

            // =====================
            // 3 & 4. CEK LATIHAN + AKTIVITAS (DIGABUNG)
            // =====================
            if (!latihanSelesai() || !aktivitasSelesai) {

                let belum = "";

                if (!latihanSelesai()) {
                    belum += "<b>Ayo Berlatih</b><br>";
                }

                if (!aktivitasSelesai) {
                    belum += "<b>Aktivitas</b><br>";
                }

                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                                Tapi, kamu belum menyelesaikan:<br><br>
                                ${belum}
                                <br>
                                Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                            `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu",
                    reverseButtons: true
                }).then((result) => {

                    // kalau klik "Kerjakan Dulu"
                    if (result.dismiss === Swal.DismissReason.cancel) {

                        if (!latihanSelesai()) {
                            document.querySelector(".conversion-title")
                                ?.scrollIntoView({ behavior: "smooth" });
                        } else if (!aktivitasSelesai) {
                            document.getElementById("quizContainer")
                                ?.scrollIntoView({ behavior: "smooth" });
                        }

                    }

                    // kalau klik "Tetap Lanjut"
                    if (result.isConfirmed) {
                        window.location.href = "/bab2/publik-privat";
                    }

                });

                return false;
            }

            // =====================
            // 5. KIRIM PROGRES
            // =====================
            fetch("/progres/selesai/IP Addressing/Network ID dan Host ID", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(() => {
                window.location.href = "/bab2/publik-privat";
            });

            return false;
        }

        function latihanSelesai() {

            const semua = document.querySelectorAll(".ip-line:not(.contoh)");

            if (semua.length === 0) return false;

            let semuaBenar = true;

            semua.forEach(line => {

                const adaWrong = line.querySelector(".wrong");
                const adaCorrect = line.querySelector(".correct");

                if (adaWrong || !adaCorrect) {
                    semuaBenar = false;
                }

            });

            return semuaBenar;
        }

        // RESET SETIAP MASUK HALAMAN (TANPA SYARAT)
        sessionStorage.removeItem("networkhost_jawaban");
        sessionStorage.removeItem("networkhost_terkunci");
        sessionStorage.removeItem("networkhost_index");
        sessionStorage.removeItem("latihan_networkhost");

        function cekJawaban() {
            const net = document.getElementById("netID");
            const host = document.getElementById("hostID");
            const hasil = document.getElementById("hasil");

            const netBenar = "172.16";
            const hostBenar = "5.20";

            net.classList.remove("correct", "wrong");
            host.classList.remove("correct", "wrong");

            let benar = true;

            if (net.value.trim() === netBenar) {
                net.classList.add("correct");
            } else {
                net.classList.add("wrong");
                benar = false;
            }

            if (host.value.trim() === hostBenar) {
                host.classList.add("correct");
            } else {
                host.classList.add("wrong");
                benar = false;
            }

            if (benar) {
                hasil.textContent = "Jawaban benar";
                hasil.style.color = "#15803d";
            } else {
                hasil.textContent = "Masih ada jawaban yang salah";
                hasil.style.color = "#b91c1c";
            }
        }

        // ayo berlatih
        // klik oktet (kecuali contoh)
        document.addEventListener("click", function (e) {

            if (!e.target.classList.contains("ip-chunk")) return;
            if (e.target.classList.contains("locked")) return;

            e.target.classList.remove("correct", "wrong");
            e.target.classList.toggle("selected");

            // simpan pilihan user
            const data = document.querySelector(".network-host-layout").innerHTML;
            sessionStorage.setItem("latihan_networkhost", data);

        });

        function renderNetwork(data) {
            const container = document.querySelector(".nh-col:first-child");

            // hapus semua soal kecuali contoh
            container.querySelectorAll(".ip-line:not(.contoh)")
                .forEach(el => el.remove());

            data.forEach(item => {
                const parts = item.soal.split(".");
                let html = `<div class="ip-line" data-id="${item.id_soal}">`;

                parts.forEach((p, i) => {
                    html += `<span class="ip-chunk">${p}</span>`;
                    if (i < 3) html += ".";
                });

                html += `</div>`;
                container.insertAdjacentHTML("beforeend", html);
            });
        }

        function renderHost(data) {
            const container = document.querySelector(".nh-col:last-child");

            // Hapus semua soal kecuali contoh
            container.querySelectorAll(".ip-line:not(.contoh)")
                .forEach(el => el.remove());

            data.forEach(item => {
                const parts = item.soal.split(".");
                let html = `<div class="ip-line" data-id="${item.id_soal}">`;

                parts.forEach((p, i) => {
                    html += `<span class="ip-chunk">${p}</span>`;
                    if (i < 3) html += ".";
                });

                html += `</div>`;
                container.insertAdjacentHTML("beforeend", html);
            });
        }

        function cekJawabanKlik() {

            let totalSoal = 0;
            let totalBenar = 0;

            const lines = document.querySelectorAll(".ip-line");

            const promises = [];

            lines.forEach(line => {

                const id = line.dataset.id;
                if (!id) return;

                totalSoal++;

                const selected = [...line.querySelectorAll(".selected")]
                    .map(e => e.textContent)
                    .join(".");

                const request = fetch("/network-host/cek", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id_soal: id,
                        jawaban_user: selected
                    })
                })
                    .then(res => res.json())
                    .then(res => {

                        line.querySelectorAll(".ip-chunk")
                            .forEach(c => c.classList.remove("correct", "wrong"));

                        line.querySelectorAll(".selected")
                            .forEach(c => {
                                c.classList.add(res.benar ? "correct" : "wrong");
                            });

                        if (res.benar) totalBenar++;

                    });

                promises.push(request);
            });

            Promise.all(promises).then(() => {

                if (totalBenar === totalSoal && totalSoal > 0) {

                    Swal.fire({
                        icon: "success",
                        title: "Latihan Selesai",
                        text: "Semua Network ID dan Host ID sudah benar. Mau ulang latihan atau lanjut?",
                        showCancelButton: true,
                        confirmButtonText: "Ulangi",
                        cancelButtonText: "Lanjut",
                        allowOutsideClick: false
                    }).then((result) => {

                        // ULANGI LATIHAN
                        if (result.isConfirmed) {

                            sessionStorage.removeItem("latihan_networkhost");

                            document.querySelectorAll(".ip-chunk").forEach(el => {
                                if (!el.classList.contains("locked")) {
                                    el.classList.remove("selected", "correct", "wrong");
                                }
                            });

                        }

                        // LANJUT KE AKTIVITAS
                        else {

                            document.getElementById("quizContainer").scrollIntoView({
                                behavior: "smooth"
                            });

                        }

                    });

                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Masih Ada yang Salah",
                        text: `Jawaban benar: ${totalBenar} dari ${totalSoal}. Coba periksa kembali.`,
                    });

                }
            });
        }

        fetch("/network-host/soal")
            .then(res => res.json())
            .then(data => {

                renderNetwork(data.network);
                renderHost(data.host);

                // setelah render baru restore pilihan
                const savedLatihan = sessionStorage.getItem("latihan_networkhost");

                if (savedLatihan) {
                    document.querySelector(".network-host-layout").innerHTML = savedLatihan;
                }

            });

        function resetLatihan() {

            Swal.fire({
                icon: "warning",
                title: "Reset Latihan?",
                text: "Semua jawaban pada bagian Ayo Berlatih akan dihapus.",
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: "Reset",
                cancelButtonText: "Batal"
            }).then((result) => {

                if (!result.isConfirmed) return;

                // hapus hanya latihan
                sessionStorage.removeItem("latihan_networkhost");

                // hapus pilihan di tampilan
                document.querySelectorAll(".ip-chunk").forEach(el => {
                    el.classList.remove("selected", "correct", "wrong");
                });

            });

        }

        // aktivitas
        let soal = [];
        let indexSoal = 0;
        let soalTerkunci = [];
        let jawabanUser = [];

        fetch("/aktivitas/network-host/soal")
            .then(res => res.json())
            .then(data => {

                soal = data;
                const savedJawaban = sessionStorage.getItem("networkhost_jawaban");
                const savedTerkunci = sessionStorage.getItem("networkhost_terkunci");
                const savedIndex = sessionStorage.getItem("networkhost_index");

                jawabanUser = savedJawaban ? JSON.parse(savedJawaban) : Array(soal.length).fill(null);
                soalTerkunci = savedTerkunci ? JSON.parse(savedTerkunci) : Array(soal.length).fill(false);
                indexSoal = savedIndex ? parseInt(savedIndex) : 0;

                if (indexSoal >= soal.length) {
                    indexSoal = 0;
                }

                renderSoal();
            });


        const quizContainer = document.getElementById("quizContainer");
        const feedback = document.getElementById("quizFeedback");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");

        function renderSoal() {
            const data = soal[indexSoal];
            const terkunci = soalTerkunci[indexSoal];

            let html = `
                        <div class="question-box">
                            <p class="question-number">
                                Soal ${indexSoal + 1} dari ${soal.length}
                            </p>

                            <p class="question-text">
                                ${data.q}
                            </p>
                    `;

            if (data.tipe === "pilgan") {
                html += `<div class="options">`;
                data.opsi.forEach((o, i) => {
                    html += `
                                <label class="option ${terkunci ? 'locked' : ''}">
                                    <input 
                                        type="radio" 
                                        name="jawaban" 
                                        value="${i}" 
                                        ${terkunci ? 'disabled' : ''}
                                    >

                                    <span class="option-text">
                                        ${o}
                                    </span>
                                </label>
                            `;
                });
                html += `</div>`;
            }

            if (data.tipe === "isian") {
                html += `
                            <input
                                id="jawabanIsian"
                                class="fill-input"
                                placeholder="Jawaban"
                                ${terkunci ? 'disabled' : ''}
                            >
                        `;
            }

            html += `</div>`;
            quizContainer.innerHTML = html;

            if (jawabanUser[indexSoal] !== null) {

                if (data.tipe === "pilgan") {

                    const radio = document.querySelector(
                        `input[name="jawaban"][value="${jawabanUser[indexSoal]}"]`
                    );

                    if (radio) {
                        radio.checked = true;
                        radio.closest(".option").classList.add("selected");
                    }

                } else {

                    const input = document.getElementById("jawabanIsian");
                    if (input) input.value = jawabanUser[indexSoal];

                }

            }

            feedback.textContent = "";
            nextBtn.disabled = !terkunci;
            prevBtn.disabled = indexSoal === 0;

            // jika soal sudah pernah dijawab benar
            if (terkunci) {

                feedback.textContent = "Jawaban benar";
                feedback.style.color = "#15803d";

                document.querySelectorAll('input[name="jawaban"]')
                    .forEach(r => r.disabled = true);

                const input = document.getElementById("jawabanIsian");
                if (input) input.setAttribute("disabled", true);

                nextBtn.disabled = false;

            }

            if (!terkunci) {
                document.querySelectorAll("input").forEach(el => {
                    el.addEventListener("change", cekJawaban);
                    el.addEventListener("input", cekJawaban);
                });
            }
        }

        function cekJawaban() {
            if (soalTerkunci[indexSoal]) return;

            const data = soal[indexSoal];
            let jawabanUserVal = "";

            if (data.tipe === "pilgan") {
                const pilih = document.querySelector("input[name=jawaban]:checked");
                if (!pilih) return;

                jawabanUserVal = pilih.value;
            } else {
                const isi = document.getElementById("jawabanIsian")
                    .value.trim().toLowerCase();
                if (!isi) return;

                jawabanUserVal = isi;
            }

            fetch("/aktivitas/network-host/cek", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id_soal: soal[indexSoal].id,
                    jawaban_user: jawabanUserVal
                })
            })
                .then(res => res.json())
                .then(res => {

                    if (res.benar) {
                        soalTerkunci[indexSoal] = true;

                        jawabanUser[indexSoal] = jawabanUserVal;

                        sessionStorage.setItem("networkhost_jawaban", JSON.stringify(jawabanUser));
                        sessionStorage.setItem("networkhost_terkunci", JSON.stringify(soalTerkunci));
                        sessionStorage.setItem("networkhost_index", indexSoal);

                        feedback.textContent = "Jawaban benar";
                        feedback.style.color = "#15803d";

                        document.querySelectorAll('input[name="jawaban"]')
                            .forEach(r => r.disabled = true);

                        document.getElementById("jawabanIsian")
                            ?.setAttribute("disabled", true);

                        nextBtn.disabled = false;

                    } else {
                        feedback.textContent = "Jawaban salah, silakan coba lagi";
                        feedback.style.color = "#b91c1c";
                    }

                });
        }

        function prevSoal() {
            if (indexSoal === 0) return;

            indexSoal--;

            sessionStorage.setItem("networkhost_index", indexSoal);

            renderSoal();
        }

        function nextSoal() {

            // kalau progress sudah selesai
            if (sudahSelesaiMateri) {

                indexSoal++;

                if (indexSoal < soal.length) {

                    sessionStorage.setItem("networkhost_index", indexSoal);
                    renderSoal();

                } else {

                    Swal.fire({
                        icon: "success",
                        title: "Aktivitas Selesai",
                        text: "Semua soal telah dijawab dengan benar. Silakan lanjut ke materi berikutnya.",
                        confirmButtonText: "Lanjut",
                        allowOutsideClick: false
                    }).then(() => {

                        window.location.href = "/bab2/publik-privat";

                    });

                }

                return;
            }

            if (!soalTerkunci[indexSoal]) return;

            indexSoal++;

            sessionStorage.setItem("networkhost_index", indexSoal);

            if (indexSoal < soal.length) {
                renderSoal();
            } else {
                tampilkanHasil();
            }
        }

        function tampilkanHasil() {
            console.log("tampilkanHasil dipanggil");
            aktivitasSelesai = true;
            adaJawabanLatihan = false; // RESET DULU

            const latihan = document.querySelectorAll(".ip-line:not(.contoh)");
            let semuaBenar = latihanSelesai();

            latihan.forEach(line => {
                const selected = line.querySelector(".selected");
                if (selected) {
                    adaJawabanLatihan = true;
                }
            });

            // jika belum mengerjakan Ayo Berlatih
            if (!adaJawabanLatihan) {

                Swal.fire({
                    icon: "warning",
                    title: "Aktivitas Selesai",
                    html: `
                                Semua soal aktivitas telah dijawab dengan benar.<br><br>

                                Namun kamu 
                                <b>belum mengerjakan bagian "Ayo Berlatih"</b>.<br><br>
                            `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kembali ke Latihan"
                }).then((result) => {

                    if (result.isConfirmed) {

                        window.location.href = "/bab2/publik-privat";

                    } else {

                        document.querySelector(".conversion-title")
                            .scrollIntoView({ behavior: "smooth" });

                    }

                });

            }

            // jika sudah mengerjakan Ayo Berlatih
            else {

                Swal.fire({
                    icon: "success",
                    title: "Aktivitas Selesai",
                    text: "Semua soal telah dijawab dengan benar. Silakan lanjut ke materi berikutnya.",
                    confirmButtonText: "Lanjut",
                    allowOutsideClick: false
                }).then(() => {
                    document.querySelector(".nav-next").click();
                });

            }

        }

        function cekLatihanNetwork(e) {

            const latihan = document.querySelectorAll(".ip-line:not(.contoh)");

            let adaJawaban = false;

            latihan.forEach(line => {
                if (line.querySelector(".selected")) {
                    adaJawaban = true;
                }
            });

            // jika belum mengerjakan latihan
            if (!adaJawaban) {

                e.preventDefault();

                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Dikerjakan",
                    text: "Kamu belum mengerjakan 'Ayo Berlatih'. Jika dilewati, kamu mungkin kehilangan kesempatan untuk memperkuat pemahaman materi. Latihan ini juga membantu meningkatkan progress belajar kamu.",
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Latihan"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.href = "/bab2/publik-privat";
                    } else {
                        document.querySelector(".conversion-title")
                            .scrollIntoView({ behavior: "smooth" });
                    }

                });

                return false;
            }

            return true;
        }


        function setClass(type) {

            const net = document.getElementById("netBar");
            const host = document.getElementById("hostBar");
            const desc = document.getElementById("descText");

            if (type === "A") {
                net.style.flex = "1";
                host.style.flex = "3";

                net.textContent = "Network (8 bit)";
                host.textContent = "Host (24 bit)";

                desc.textContent = "Kelas A memiliki jumlah host sangat besar.";
            }

            if (type === "B") {
                net.style.flex = "2";
                host.style.flex = "2";

                net.textContent = "Network (16 bit)";
                host.textContent = "Host (16 bit)";

                desc.textContent = "Kelas B memiliki pembagian seimbang.";
            }

            if (type === "C") {
                net.style.flex = "3";
                host.style.flex = "1";

                net.textContent = "Network (24 bit)";
                host.textContent = "Host (8 bit)";

                desc.textContent = "Kelas C memiliki jumlah host lebih sedikit.";
            }
        }

        // default awal
        setClass("C");

        let currentStep = 1;
        const totalStep = 3;

        function showStep(step) {

            document.querySelectorAll(".step-section").forEach(el => {
                el.classList.remove("active");
            });

            document.getElementById("step" + step).classList.add("active");

            currentStep = step;

            updatePagination();
        }

        function nextStep() {
            if (currentStep < totalStep) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        function goToStep(step) {
            currentStep = step;
            showStep(step);
        }

        function updatePagination() {
            for (let i = 1; i <= totalStep; i++) {
                const btn = document.getElementById("stepBtn" + i);
                btn.classList.remove("active");

                if (i === currentStep) {
                    btn.classList.add("active");
                }
            }
        }

        window.addEventListener("DOMContentLoaded", function () {

            fetch("/progres/cek/IP Addressing/Network ID dan Host ID")
                .then(res => res.json())
                .then(res => {

                    if (res.selesai) {

                        sudahSelesaiMateri = true;

                        sudahLulusPemahaman = true;
                        aktivitasSelesai = true;

                        // bypass waktu baca
                        startTime = Date.now() - 60000;

                        window.latihanSudahSelesai = true;

                    }

                });

        });
    </script>

@endsection