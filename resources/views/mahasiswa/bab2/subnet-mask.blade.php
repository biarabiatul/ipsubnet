@extends('mahasiswa.mahasiswa')

@section('title', 'Subbab - Subnet Mask')

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

        /* HEADER */
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

        /* CONTOH & LATIHAN */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
            margin-top: 18px;
        }

        .subnet-drill {
            margin-top: 20px;
        }

        .drill-row {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 14px;
        }

        .ip-text {
            width: 180px;
            font-weight: 600;
        }

        .mask-input {
            width: 180px;
            border: none;
            border-bottom: 3px solid #111;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            outline: none;
            background: transparent;
            padding-bottom: 4px;
            margin-left: 120px;
        }

        .inner-drill-box {
            background: transparent;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 16px 20px;
            margin-top: 14px;
        }

        .mask-input.correct {
            color: #15803d;
            border-bottom-color: #15803d;
        }

        .mask-input.wrong {
            color: #b91c1c;
            border-bottom-color: #b91c1c;
        }

        /* BOX (CONTOH SOAL) */
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
            font-size: 18px;
        }

        .binary-text {
            font-size: 16px;
            font-weight: 700;
            background: #fff7ed;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
            border: 1px solid #f59e0b;
        }

        /* Box kesimpulan */
        .kesimpulan-box {
            margin-top: 14px;
            padding: 10px 14px;
            background: #fef3c7;
            border: 1px solid #f59e0b;
            font-weight: 700;
            display: inline-block;
            border-radius: 6px;
        }

        /* TABEL */
        .table-wrapper {
            overflow-x: auto;
            margin-top: 16px;
        }

        .ip-table {
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 15px;
            width: 50%;
        }

        .ip-table th,
        .ip-table td {
            border: 1px solid #d6c3b2;
            padding: 8px 14px;
            text-align: center;
        }

        .ip-table th {
            background: #f3ebe6;
            ;
            font-weight: 700;
        }

        .conversion-title {
            font-size: 18px;
            font-weight: 700;
            color: #89471e;
            margin-top: 0;
            margin-bottom: 10px;
            text-align: center;
        }

        .ip-block {
            width: 180px;
            display: flex;
            flex-direction: column;
        }

        .subnet-text {
            font-size: 13px;
            color: #6b7280;
            margin-top: 2px;
        }

        /* TOMBOL CEK */
        .btn-cek-modern {
            background: linear-gradient(135deg, #89471e, #b45309);
            color: #ffffff;
            border: none;
            padding: 10px 28px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 999px;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .btn-cek-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(137, 71, 30, 0.45);
        }

        .btn-cek-modern:active {
            transform: scale(0.96);
        }

        .cek-wrapper {
            display: flex;
            justify-content: flex-start;
            ;
            margin-top: 26px;
            margin-left: 80px;
        }

        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 20px;
            margin-top: 10px;
        }

        .question-number {
            font-size: 14px;
            font-weight: 600;
            color: #89471e;
            margin-bottom: 8px;
        }

        .question-text {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #1f2937;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .option {
            border: 1.5px solid #d6c3b2;
            border-radius: 6px;
            padding: 10px 14px;
            cursor: pointer;
            background: #ffffff;
            transition: all 0.15s ease;
            display: flex;
            align-items: center;
        }

        .option:hover {
            background: #fdf6f1;
        }

        .option input[type="radio"] {
            display: none;
        }

        .option-text {
            font-size: 15px;
            color: #1f2937;
        }

        .option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
        }

        .fill-input {
            width: 100px;
            padding: 6px;
            font-size: 15px;
            text-align: center;
            border: 1.5px solid #89471e;
            border-radius: 4px;
            background: #ffffff;
            color: #111827;
            transition: 0.2s;
        }

        .quiz-feedback {
            margin-top: 14px;
            font-weight: 600;
        }

        .quiz-nav-left {
            display: flex;
            justify-content: flex-start;
            gap: 12px;
            margin-top: 20px;
        }

        .prev-btn {
            background: #6b7280;
            color: #ffffff;
            border: none;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
        }

        .next-btn {
            background: #b45309;
            color: #ffffff;
            border: none;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
        }

        .prev-btn:disabled,
        .next-btn:disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
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

        .btn-reset-modern {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: #ffffff;
            border: none;
            padding: 10px 26px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 999px;
            cursor: pointer;
            margin-left: 12px;
            transition: all 0.25s ease;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .btn-reset-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.35);
        }

        .btn-reset-modern:active {
            transform: scale(0.96);
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

        .highlight-box {
            background: #f3ebe6;
            border-left: 5px solid #89471e;
            padding: 14px 18px;
            border-radius: 6px;
            margin: 14px 0;
            font-weight: 500;

        }

        /* ANDING */
        .anding-box {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 18px;
            margin-top: 16px;
        }

        .anding-title {
            font-weight: 700;
            color: #89471e;
            margin-bottom: 10px;
            font-size: 17px;
        }

        .anding-grid {
            display: flex;
            gap: 20px;
            margin-top: 18px;
        }

        .anding-grid .anding-box {
            flex: 1;
            margin-top: 0;
        }

        .img-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .img-modal img {
            margin: auto;
            display: block;
            max-width: 80%;
            max-height: 80%;
            border-radius: 10px;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 32px;
            font-weight: bold;
            cursor: pointer;
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
            margin-top: 12px;
        }

        .swal-radio-option {
            display: flex;
            justify-content: flex-start;
            font-size: 14px;
            text-align: left;
            align-items: left;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1.5px solid #d6c3b2;
            margin-bottom: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #fff;
        }

        .swal-radio-option:hover {
            background: #fdf6f1;
            border-color: #f59e0b;
        }

        .swal-radio-option input {
            display: none;
        }

        .swal-radio-option span {
            flex: 1;
        }

        .swal-radio-option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
        }

        @media (max-width: 768px) {

            .popup-img {
                width: 100% !important;
                max-width: 100% !important;
                height: auto;
                display: block;
                margin: 0 auto;
            }

            .inner-drill-box {
                overflow: hidden;
                padding: 14px;
            }

            .drill-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
                width: 100%;
            }

            .ip-text {
                width: auto;
                flex: 1;
                min-width: 0;
                font-size: 14px;
                word-break: break-word;
            }

            .mask-input {
                width: 95px !important;
                min-width: 95px;
                margin-left: 0 !important;
                font-size: 13px;
                padding-bottom: 2px;
                flex-shrink: 0;
            }

            .anding-grid {
                flex-direction: column;
            }
        }
    </style>

    <!-- PENGERTIAN SUBNET MASK -->
    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-mask"></i>
                </div>
                Subnet Mask
            </div>

            <div class="box-body">
                Pernahkah diperhatikan bahwa ketika sebuah perangkat memiliki alamat <i>IP</i>, <strong>selalu terdapat
                    subnet mask yang menyertainya</strong>? Perhatikan gambar berikut!

                <!-- GAMBAR -->
                <div style="text-align:center; margin:18px 0;">
                    <img src="{{ asset('assets/img/subnet-mask.png') }}" class="popup-img"
                        style="max-width:70%; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                    <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                        Gambar 2.14 <i>IP Address</i> dan <i>Subnet Mask</i> pada komputer
                    </div>
                </div>

                <!-- GAMBAR -->
                <div style="text-align:center; margin:18px 0;">
                    <img src="{{ asset('assets/img/subnet-mask2.png') }}" class="popup-img"
                        alt="Ilustrasi IP Address dalam Jaringan"
                        style="max-width:25%; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                    <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                        Gambar 2.15 <i>IP Address</i> dan <i>Subnet Mask</i> pada handphone
                    </div>
                </div>

                IP address pada komputer atau perangkat jaringan tidak pernah berdiri sendiri, melainkan selalu dipasangkan
                dengan subnet mask tertentu.

                <div class="highlight-box">
                    <i>Subnet mask</i> berfungsi sebagai <strong>penanda</strong> untuk membedakan bagian mana yang
                    menunjukkan jaringan (<i>network</i>) dan bagian mana yang menunjukkan perangkat (<i>host</i>) dalam
                    sebuah alamat <i>IP</i>.
                </div>

                <br>
                Subnet mask direpresentasikan dalam bentuk bilangan biner yang terdiri dari <strong>angka 1 dan 0</strong>.
                <ul style="margin-left:18px;">
                    <li><strong style="color:#15803d;">Bit 1</strong><i class="bi bi-arrow-right-short"></i>menunjukkan
                        bagian <strong>Network</strong></li>
                    <li><strong style="color:#b91c1c;">Bit 0</strong><i class="bi bi-arrow-right-short"></i>menunjukkan
                        bagian <strong>Host</strong></li>
                </ul>
                Agar lebih mudah dibaca, biasanya ditulis dalam bentuk desimal bertitik (<i>dotted decimal</i>), seperti
                255.255.255.0.

                <br><br>
                Dalam pengalamatan <i>IP</i>, terdapat dua pendekatan, yaitu <i>Classful Addressing</i> dan <i>Classless
                    Addressing</i>. Pada <i>Classful Addressing</i>, alamat <i>IP</i> dibagi menjadi beberapa kelas (A, B,
                dan C), yang masing-masing memiliki <i>subnet mask default</i> untuk menentukan batas antara bagian
                <i>network</i> dan <i>host</i>.

                <br><br>
                Tabel berikut menunjukkan <i>subnet mask default</i> untuk setiap kelas. Subnet mask ini merupakan
                pengaturan standar yang digunakan sesuai dengan kelas IP, sehingga tidak dapat digunakan secara sembarangan.
                <br>
                <div class="table-wrapper">
                    <table class="ip-table">
                        <tr>
                            <th>Kelas</th>
                            <th>Format</th>
                            <th>Subnet Mask Default</th>
                        </tr>
                        <tr>
                            <td>Kelas A</td>
                            <td>N.H.H.H</td>
                            <td>255.0.0.0</td>
                        </tr>
                        <tr>
                            <td>Kelas B</td>
                            <td>N.N.H.H</td>
                            <td>255.255.0.0</td>
                        </tr>
                        <tr>
                            <td>Kelas C</td>
                            <td>N.N.N.H</td>
                            <td>255.255.255.0</td>
                        </tr>
                    </table>

                    <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align:center;">
                        Tabel 2.6 <i>Subnet Mask</i> Default Kelas <i>IP</i>
                    </div>
                </div>

                <br>
                Sebagai contoh, untuk alamat <i>IP</i> 192.168.1.10 dengan <i>subnet mask</i> 255.255.255.0, berarti
                <i>network address</i> dari <i>IP</i> tersebut adalah <strong>192.168.1.0</strong>, sedangkan <i>host
                    address</i>-nya adalah <strong>0.0.0.10</strong>.

                <br>
                <div class="info-box">
                    <div class="info-title">Contoh Soal</div>
                    Sebuah komputer pada jaringan sekolah memiliki alamat <p class="binary-text">150.10.5.1
                    </p>. Tentukan default subnet mask dari alamat IP tersebut.

                    <br>
                    <strong>Penyelesaian:</strong>

                    <ol style="margin-left:18px; margin-top:10px;">
                        <li>
                            Perhatikan oktet pertama dari alamat IP tersebut, yaitu
                            <span class="binary-text">150</span>
                        </li>

                        <li>
                            Tentukan kelas IP berdasarkan rentang oktet pertama.
                            <br>
                            Karena 150 berada pada rentang <strong>128 – 191</strong>, maka termasuk
                            <strong>Kelas B</strong>.
                        </li>

                        <li>
                            Default subnet mask untuk <strong>Kelas B</strong> adalah:
                            <br>
                            <span class="binary-text">255.255.0.0</span>
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
                        Kesimpulan: Default subnet mask untuk
                        <strong>150.10.5.1</strong> adalah
                        <strong>255.255.0.0</strong>

                    </div>
                </div>

                <div class="question-box ayo-berlatih-subnet">
                    <h4 class="conversion-title">Ayo Berlatih!</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>
                        <ol>
                            <li>Perhatikan alamat IP pada setiap baris.</li>
                            <li>Tentukan kelas IP berdasarkan nilai <b>oktet pertama</b>.</li>
                            <li>Gunakan tabel <i>subnet mask default</i> untuk mengetahui subnet mask yang sesuai dengan
                                kelas tersebut.</li>
                            <li>Tuliskan default subnet mask pada kolom jawaban yang tersedia.</li>
                            <li>Klik tombol <b>"Cek Jawaban"</b> untuk memeriksa hasil.</li>
                        </ol>
                    </div>

                    <div class="subnet-drill">

                        <div class="inner-drill-box">

                            <div class="drill-row">
                                <span class="ip-text">177.100.18.4</span>
                                <span class="mask-input">255.255.0.0</span>
                            </div>

                            @foreach($soal as $item)
                                <div class="drill-row">
                                    <span class="ip-text">{{ $item->soal }}</span>
                                    <input class="mask-input" data-id="{{ $item->id_soal }}" placeholder="..."
                                        inputmode="numeric">
                                </div>
                            @endforeach

                        </div>

                    </div>

                    <div class="cek-wrapper">
                        <button class="btn-cek-modern" onclick="cekSubnet()">
                            Cek Jawaban
                        </button>

                        <button class="btn-reset-modern" onclick="resetSubnet()">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ANDING -->
    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-book"></i>
                </div>
                Operasi AND dengan <i>Default Subnet Mask</i>
            </div>

            <div class="box-body">

                Setiap alamat <i>IP</i> harus disertai <i>Subnet Mask</i>. Secara konsep, alamat <i>IP</i> dapat dikenali
                kelasnya untuk menentukan <i>network address</i>, namun komputer tidak menggunakan cara tersebut. Komputer
                menentukan <i>network address</i> dengan melakukan operasi logika <i>AND</i> antara alamat <i>IP</i> dan
                <i>Subnet Mask</i>.

                <!-- RULE -->
                <div class="anding-grid">
                    <div class="anding-box">
                        <div class="anding-title"><i>Default Subnet Mask</i></div>
                        <ul style="margin-left:18px;">
                            <li>Kelas A 255.0.0.0 </li>
                            <li>Kelas B 255.255.0.0 </li>
                            <li>Kelas C 255.255.255.0</li>
                        </ul>
                    </div>

                    <!-- RULE -->
                    <div class="anding-box">
                        <div class="anding-title">Aturan Operasi AND</div>
                        <ul style="margin-left:18px;">
                            <li>1 AND 1 = 1</li>
                            <li>1 AND 0 = 0</li>
                            <li>0 AND 1 = 0</li>
                            <li>0 AND 0 = 0</li>
                        </ul>
                    </div>
                </div>

                <!-- CONTOH STEP -->
                <div class="anding-box">

                    <div class="anding-title">Contoh Perhitungan</div>

                    Yang dapat kamu tentukan secara langsung: <br>
                    IP Address:<span class="binary-text">192.100.10.33</span>

                    <br><br>

                    Yang dapat kamu tentukan secara logika: <br>

                    <ul style="margin-left:18px; margin-top:6px;">
                        <li>Kelas IP : <strong>Kelas C</strong></li>
                        <li>Bagian Network : <strong>192.100.10</strong></li>
                        <li>Bagian Host : <strong>33</strong></li>
                    </ul>

                    <br>
                    Namun, agar komputer dapat memperoleh informasi yang sama, alamat <i>IP</i> tersebut
                    harus diubah ke dalam bentuk biner dan kemudian dilakukan operasi <strong>AND</strong> dengan <i>Subnet
                        Mask</i> default.

                    <!-- GAMBAR -->
                    <div style="text-align:center; margin:20px 0;">
                        <img src="{{ asset('assets/img/anding.png') }}" style="max-width:70%; border-radius:8px;">
                    </div>
                </div>

                <br>
                Hasil operasi AND menunjukkan bahwa seluruh bit <i>host</i> <strong>berubah menjadi 0</strong>, sehingga
                diperoleh <i>network address</i> 192.100.10.0. Sementara itu, nilai <i>host</i> tetap mengidentifikasi
                perangkat dalam jaringan tersebut, yaitu 33. Dengan melakukan operasi AND menggunakan <i>Subnet Mask
                    default</i>, komputer dapat menentukan bagian <i>network</i> dari alamat <i>IP</i> tersebut secara
                otomatis.

                <br>
                <div class="info-box">
                    <div class="info-title">Contoh Soal</div>

                    Saat menyambungkan laptop ke <i>Wi-Fi</i> kampus, perangkat memperoleh alamat IP
                    <strong>192.100.10.33</strong> dengan subnet mask <strong>255.255.255.0</strong>. Tentukan network
                    address menggunakan <strong>operasi logika AND</strong>.

                    <br><br>

                    <div class="info-title">Penyelesaian</div>

                    <ol style="margin-left:18px; margin-top:10px;">
                        <li>
                            Ubah IP Address dan Subnet Mask ke dalam bentuk biner.
                        </li>

                        <li>
                            Lakukan operasi AND pada setiap bit.
                        </li>
                    </ol>

                    <div style="margin-left:40px;">
                        <table style="
                                                background:#f3ebe6;
                                                padding:12px;
                                                border-radius:6px;
                                                border-collapse:collapse;
                                                font-family: monospace;
                                            ">
                            <tr>
                                <td style="padding:4px 12px;">IP Address</td>
                                <td style="padding:4px 12px;">:</td>
                                <td style="padding:4px 12px;">
                                    11000000 . 01100100 . 00001010 . 00100001 <i
                                        class="bi bi-arrow-right-short"></i>(192.100.10.33)
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:4px 12px;">Default Subnet Mask</td>
                                <td style="padding:4px 12px;">:</td>
                                <td style="padding:4px 12px;">
                                    11111111 . 11111111 . 11111111 . 00000000 <i class="bi bi-arrow-right-short"></i>
                                    (255.255.255.0)
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:4px 12px;">AND</td>
                                <td style="padding:4px 12px;">:</td>
                                <td style="padding:4px 12px;">
                                    11000000 . 01100100 . 00001010 . 00000000 <i class="bi bi-arrow-right-short"></i>
                                    (192.100.10.0)
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:4px 12px;">Network Address</td>
                                <td style="padding:4px 12px;">:</td>
                                <td style="padding:4px 12px;">
                                    192 . 100 . 10 . 0
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="kesimpulan-box">
                        <i class="bi bi-check-circle-fill" style="color:#16a34a;"></i>
                        Sehingga didapat Network Address = <strong>192.100.10.0</strong>
                    </div>
                </div>

                <div class="question-box">
                    <h4 class="conversion-title">Ayo Berlatih!</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>
                        <ol>
                            <li>Perhatikan alamat <i>IP</i> dan <i>subnet mask</i> yang diberikan.</li>
                            <li>Tentukan <i>network address</i> dengan melakukan operasi logika <b><i>AND</i></b> antara
                                <i>IP Address</i> dan <i>Subnet Mask</i>.
                            </li>
                            <li>Ingat bahwa pada <i>subnet mask</i>, <i>bit</i> bernilai <b>1</b> menunjukkan bagian
                                <i>network</i> dan <i>bit</i> <b>0</b> menunjukkan bagian <i>host</i>.
                            </li>
                            <li>Tuliskan hasil <i>network address</i> pada kolom jawaban yang tersedia.</li>
                            <li>Klik tombol <b>"Cek Jawaban"</b> untuk memeriksa hasil.</li>
                        </ol>
                    </div>

                    <div class="subnet-drill">

                        <div class="inner-drill-box">

                            <div class="drill-row">
                                <div class="ip-block">
                                    <div class="ip-text">188.10.18.2</div>
                                    <div class="subnet-text">Subnet Mask : 255.255.0.0</div>
                                </div>
                                <span class="mask-input">188.10.0.0</span>
                            </div>

                            <div id="andingContainer"></div>

                        </div>

                    </div>

                    <div class="cek-wrapper">
                        <button class="btn-cek-modern" onclick="cekAND()">
                            Cek Jawaban
                        </button>

                        <button class="btn-reset-modern" onclick="resetAND()">
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
                Aktivitas 2.5
            </div>

            <div class="box-body">

                <p class="activity-intro-title">
                    Kerjakan aktivitas berikut untuk mengukur pemahaman dan menambah progress belajarmu.
                </p>

                <p class="activity-intro-desc">
                    Pilih satu jawaban benar dari lima pilihan yang tersedia.
                </p>

                <div id="quizContainer"></div>

                <p id="quizFeedback" class="quiz-feedback"></p>

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
        <a href="/bab2/publik-privat" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="bab2/cidr" class="nav-btn nav-next" onclick="konfirmasiLanjut(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <!-- MODAL GAMBAR -->
    <div id="imgModal" class="img-modal">
        <span class="close-btn">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script>

        let startTime = Date.now();

        let sudahBaca = false;
        let sudahLulusPemahaman = false;

        let sudahSubnet = false;
        let sudahAND = false;
        let sudahAktivitas = false;

        function sudahBacaMinimal() {
            if (sudahBaca) return true;

            let waktu = (Date.now() - startTime) / 1000;

            return waktu >= 120; // 2 menit
        }

        // ayo berlatih ANDING
        const keyAndingLatihan = "jawaban_anding_default";
        let jawabanAndingUser = JSON.parse(sessionStorage.getItem(keyAndingLatihan)) || {};

        fetch("/anding-default/soal")
            .then(res => res.json())
            .then(data => {

                const container = document.getElementById("andingContainer");
                container.innerHTML = "";

                data.forEach(item => {

                    const [ip, mask] = item.soal.split("|");

                    container.innerHTML += `
                                            <div class="drill-row">

                                                <div class="ip-block">

                                                    <div class="ip-text">
                                                        ${ip}
                                                    </div>

                                                    <div class="subnet-text">
                                                        Subnet Mask : ${mask}
                                                    </div>

                                                </div>

                                                <input
                                                    class="mask-input"
                                                    data-id="${item.id_soal}"
                                                    placeholder="..."
                                                    inputmode="numeric"
                                                >

                                            </div>
                                        `;
                });

                // restore jawaban setelah input selesai dibuat
                document.querySelectorAll('#andingContainer input.mask-input').forEach(input => {
                    const id = input.dataset.id;
                    if (!id) return;

                    if (jawabanAndingUser[id]) {
                        input.value = jawabanAndingUser[id];
                    }
                });

            });

        document.addEventListener("input", function (e) {

            if (!e.target.matches('#andingContainer input.mask-input')) return;

            const id = e.target.dataset.id;
            if (!id) return;

            jawabanAndingUser[id] = e.target.value;

            sessionStorage.setItem(
                keyAndingLatihan,
                JSON.stringify(jawabanAndingUser)
            );

        });

        // ayo Berlatih
        const keySubnetLatihan = "jawaban_subnet_default";
        let jawabanSubnetUser = JSON.parse(sessionStorage.getItem(keySubnetLatihan)) || {};

        document.addEventListener("input", function (e) {

            if (!e.target.matches('.ayo-berlatih-subnet input.mask-input')) return;

            const id = e.target.dataset.id;
            if (!id) return;

            jawabanSubnetUser[id] = e.target.value;
            sessionStorage.setItem(
                keySubnetLatihan,
                JSON.stringify(jawabanSubnetUser)
            );

        });

        window.addEventListener("DOMContentLoaded", function () {

            const data = JSON.parse(sessionStorage.getItem(keySubnetLatihan)) || {};
            jawabanSubnetUser = data;

            document.querySelectorAll('.ayo-berlatih-subnet input.mask-input').forEach(input => {

                const id = input.dataset.id;
                if (!id) return;

                if (data[id]) {
                    input.value = data[id];
                }

            });

        });

        function cekSubnet() {

            const inputs = document.querySelectorAll(
                '.ayo-berlatih-subnet input.mask-input'
            );

            let total = 0;
            let benar = 0;
            let adaKosong = false;

            const promises = [];

            inputs.forEach(input => {

                const id = input.dataset.id;
                const jawaban = input.value.trim();

                if (!id) return;

                total++;

                input.classList.remove("correct", "wrong");

                if (jawaban === "") {
                    input.classList.add("wrong");
                    adaKosong = true;
                    return;
                }

                const request = fetch("/subnet-mask/cek", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id_soal: id,
                        jawaban_user: jawaban
                    })
                })
                    .then(res => res.json())
                    .then(res => {

                        if (res.benar) {
                            input.classList.add("correct");
                            benar++;
                        } else {
                            input.classList.add("wrong");
                        }

                    });

                promises.push(request);
            });

            Promise.all(promises).then(() => {

                if (adaKosong) {
                    Swal.fire({
                        icon: "warning",
                        title: "Masih Ada Jawaban Kosong",
                        text: `Jawaban benar: ${benar} dari ${total}. Coba periksa kembali.`,
                    });
                    return;
                }

                if (benar === total && total > 0) {

                    sudahSubnet = true;

                    Swal.fire({
                        icon: "success",
                        title: "Mantap",
                        text: "Semua jawaban default subnet mask benar! Mau kerjakan kembali atau lanjut?",
                        showDenyButton: true,
                        confirmButtonText: "Lanjut",
                        denyButtonText: "Kerjakan Kembali",
                        allowOutsideClick: false
                    }).then((result) => {

                        if (result.isDenied) {
                            resetSubnetLangsung();
                        }

                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Masih Ada yang Salah",
                        text: `Jawaban benar: ${benar} dari ${total}.`,
                    });
                }

            });

        }

        function resetSubnet() {

            Swal.fire({
                title: "Reset Jawaban?",
                text: "Semua jawaban yang sudah diisi akan dihapus.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: "Ya, Reset",
                cancelButtonText: "Batal",
            }).then((result) => {

                if (result.isConfirmed) {

                    const inputs = document.querySelectorAll(
                        '.ayo-berlatih-subnet input.mask-input'
                    );

                    inputs.forEach(input => {
                        input.value = "";
                        input.classList.remove("correct", "wrong");
                    });

                    jawabanSubnetUser = {};
                    sessionStorage.removeItem(keySubnetLatihan);

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Jawaban berhasil direset.",
                    });

                }

            });

        }

        function resetSubnetLangsung() {

            const inputs = document.querySelectorAll(
                '.ayo-berlatih-subnet input.mask-input'
            );

            inputs.forEach(input => {
                input.value = "";
                input.classList.remove("correct", "wrong");
            });

            jawabanSubnetUser = {};
            sessionStorage.removeItem(keySubnetLatihan);
        }

        function cekAND() {

            const inputs = document.querySelectorAll(
                '#andingContainer input.mask-input'
            );

            let total = 0;
            let benar = 0;
            let adaKosong = false;

            const promises = [];

            inputs.forEach(input => {

                const id = input.dataset.id;
                const jawaban = input.value.trim();

                if (!id) return;

                total++;

                input.classList.remove("correct", "wrong");

                if (jawaban === "") {
                    input.classList.add("wrong");
                    adaKosong = true;
                    return;
                }

                const request = fetch("/anding-default/cek", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id_soal: id,
                        jawaban_user: jawaban
                    })
                })
                    .then(res => res.json())
                    .then(res => {

                        if (res.benar) {
                            input.classList.add("correct");
                            benar++;
                        } else {
                            input.classList.add("wrong");
                        }

                    });

                promises.push(request);

            });

            Promise.all(promises).then(() => {

                if (adaKosong) {
                    Swal.fire({
                        icon: "warning",
                        title: "Belum Lengkap",
                        text: `Jawaban benar: ${benar} dari ${total}. Masih ada jawaban yang kosong.`,
                    });
                    return;
                }

                if (benar === total && total > 0) {

                    sudahAND = true;

                    Swal.fire({
                        icon: "success",
                        title: "Mantap",
                        text: "Semua jawaban benar! Mau kerjakan kembali atau lanjut?",
                        showDenyButton: true,
                        confirmButtonText: "Lanjut",
                        denyButtonText: "Kerjakan Kembali",
                        allowOutsideClick: false
                    }).then((result) => {

                        if (result.isDenied) {
                            resetANDLangsung();
                        }

                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Masih Ada yang Salah",
                        text: `Jawaban benar: ${benar} dari ${total}.`,
                        confirmButtonColor: "#b91c1c"
                    });
                }

            });

        }

        function resetAND() {

            Swal.fire({
                title: "Reset Jawaban?",
                text: "Semua jawaban operasi AND akan dihapus.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Reset",
                cancelButtonText: "Batal",
                confirmButtonColor: "#b91c1c",
                cancelButtonColor: "#6b7280"
            }).then((result) => {

                if (result.isConfirmed) {

                    const inputs = document.querySelectorAll(
                        '#andingContainer input.mask-input'
                    );

                    inputs.forEach(input => {
                        input.value = "";
                        input.classList.remove("correct", "wrong");
                    });

                    jawabanAndingUser = {};
                    sessionStorage.removeItem(keyAndingLatihan);

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Jawaban berhasil direset.",
                    });

                }

            });

        }

        function resetANDLangsung() {

            const inputs = document.querySelectorAll(
                '#andingContainer input.mask-input'
            );

            inputs.forEach(input => {
                input.value = "";
                input.classList.remove("correct", "wrong");
            });

            jawabanAndingUser = {};
            sessionStorage.removeItem(keyAndingLatihan);
        }

        // aktivitas
        let soal = [];
        let indexSoal = 0;
        let statusTerkunci = [];

        const quizContainer = document.getElementById("quizContainer");
        const feedback = document.getElementById("quizFeedback");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");

        // LOAD SOAL DARI CONTROLLER
        fetch("/aktivitas/subnet-mask/soal")
            .then(res => res.json())
            .then(data => {
                soal = data;
                statusTerkunci = Array(soal.length).fill(false);
                renderSoal();
            });

        function renderSoal() {

            const data = soal[indexSoal];
            const terkunci = statusTerkunci[indexSoal];

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
                                            <label class="option">

                                                <input
                                                    type="radio"
                                                    name="jawaban"
                                                    value="${i}"
                                                    ${terkunci ? "disabled" : ""}
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
                                            ${terkunci ? "disabled" : ""}
                                        >
                                    `;
            }

            html += `</div>`;

            quizContainer.innerHTML = html;

            prevBtn.disabled = indexSoal === 0;
            nextBtn.disabled = !terkunci;
            feedback.innerHTML = "";

            if (!terkunci) {
                document.querySelectorAll("input").forEach(el => {
                    el.addEventListener("change", cekJawaban);
                    el.addEventListener("input", cekJawaban);
                });
            }
        }

        function cekJawaban() {

            const data = soal[indexSoal];
            let jawabanUser;

            if (data.tipe === "pilgan") {
                const pilih = document.querySelector("input[name=jawaban]:checked");
                if (!pilih) return;
                jawabanUser = parseInt(pilih.value);
            }

            if (data.tipe === "isian") {
                const input = document.getElementById("jawabanIsian");
                if (!input.value.trim()) return;
                jawabanUser = input.value.trim();
            }

            fetch("/aktivitas/subnet-mask/cek", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id_soal: data.id,
                    jawaban_user: jawabanUser
                })
            })
                .then(res => res.json())
                .then(res => {

                    if (res.benar) {

                        feedback.innerHTML =
                            '<i class="bi bi-check-circle-fill"></i> Jawaban benar';
                        feedback.style.color = "#15803d";

                        statusTerkunci[indexSoal] = true;
                        nextBtn.disabled = false;

                        document.querySelectorAll("input").forEach(el => el.disabled = true);

                    } else {

                        feedback.innerHTML =
                            '<i class="bi bi-x-circle-fill"></i> Jawaban salah, silakan coba lagi';
                        feedback.style.color = "#b91c1c";
                    }
                });
        }

        function nextSoal() {

            if (!statusTerkunci[indexSoal]) return;

            indexSoal++;

            if (indexSoal < soal.length) {
                renderSoal();
            } else {
                tampilkanHasil();
            }
        }

        function prevSoal() {
            if (indexSoal === 0) return;
            indexSoal--;
            renderSoal();
        }

        function tampilkanHasil() {

            sudahAktivitas = true;

            statusTerkunci = Array(soal.length).fill(true);

            const subnetInputs = document.querySelectorAll('.ayo-berlatih-subnet input.mask-input');
            const andInputs = document.querySelectorAll('#andingContainer input.mask-input');

            let subnetBelumDikerjakan = false;
            let andBelumDikerjakan = false;

            subnetInputs.forEach(input => {
                if (input.value.trim() === "") {
                    subnetBelumDikerjakan = true;
                }
            });

            andInputs.forEach(input => {
                if (input.value.trim() === "") {
                    andBelumDikerjakan = true;
                }
            });

            // // KALAU BELUM NGERJAIN AYO BERLATIH
            // if (!sudahSubnet || !sudahAND) {

            //     Swal.fire({
            //         icon: "warning",
            //         title: "Aktivitas Selesai",
            //         html: `
            //             Semua soal aktivitas telah dijawab dengan benar.<br><br>
            //             Namun kamu <b>belum mengerjakan bagian "Ayo Berlatih"</b>.<br><br>
            //             Latihan tersebut membantu memperkuat pemahaman konsep
            //             sebelum melanjutkan ke materi berikutnya.
            //         `,
            //         showCancelButton: true,
            //         confirmButtonText: "Tetap Lanjut",
            //         cancelButtonText: "Kembali ke Latihan",
            //         allowOutsideClick: false
            //     }).then((result) => {

            //         if (result.isConfirmed) {
            //             window.location.href = "/bab2/cidr";
            //         }

            //     });

            //     return;
            // }

            Swal.fire({
                icon: "success",
                title: "Mantap!",
                text: "Semua aktivitas dan latihan telah dikerjakan dengan baik. Silakan lanjut ke materi berikutnya.",
                confirmButtonText: "Lanjut",
                allowOutsideClick: false
            }).then(() => {

                fetch(`/progres/selesai/${encodeURIComponent("IP Addressing")}/${encodeURIComponent("Subnet Mask")}`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                }).then(() => {

                    window.location.href = "/bab2/cidr";

                });

            });
        }

        // renderSoal();

        function konfirmasiLanjut(event) {
            event.preventDefault();

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
                                                Tentukan subnet mask default dari IP berikut:
                                                <br><br>
                                                <b>172.16.5.4</b>
                                            </div>

                                            <div class="swal-radio-group">

                                                <label class="swal-radio-option">
                                                    <input type="radio" name="jawaban" value="a">
                                                    <span>255.0.0.0</span>
                                                </label>

                                                <label class="swal-radio-option">
                                                    <input type="radio" name="jawaban" value="b">
                                                    <span>255.255.0.0</span>
                                                </label>

                                                <label class="swal-radio-option">
                                                    <input type="radio" name="jawaban" value="c">
                                                    <span>255.255.255.0</span>
                                                </label>

                                                <label class="swal-radio-option">
                                                    <input type="radio" name="jawaban" value="d">
                                                    <span>255.255.255.255</span>
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

                        if (result.value === "b") {

                            sudahLulusPemahaman = true;

                            Swal.fire({
                                icon: "success",
                                title: "Benar!",
                                text: "Subnet mask 255.255.0.0"
                            });

                        } else {

                            Swal.fire({
                                icon: "error",
                                title: "Salah",
                                text: "Perhatikan kembali kelas IP dan subnet mask."
                            });

                        }

                    }

                });

                return false;
            }

            // =====================
            // 3,4,5. CEK SEMUA LATIHAN + AKTIVITAS
            // =====================

            let belum = "";

            // =====================
            // CEK SUBNET
            // =====================
            let subnetBelum = !sudahSubnet;

            if (subnetBelum) {
                belum += "<b>Ayo berlatih Default Subnet Mask<br></b>";
            }

            // =====================
            // CEK AND
            // =====================
            let andBelum = !sudahAND;

            if (andBelum) {
                belum += "<b>Ayo berlatih Operasi AND<br></b>";
            }

            // =====================
            // CEK AKTIVITAS
            // =====================
            if (!sudahAktivitas) {
                belum += "<b>Aktivitas<br><br></b>";
            }

            // kalau masih ada yang belum
            if (belum !== "") {

                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                                            <div style="text-align:center; line-height:1.7;">
                                                Tapi, kamu belum menyelesaikan:<br><br>

                                                <div style="text-align:center; display:inline-block;">
                                                    ${belum}
                                                </div>

                                                <br>
                                                Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                                            </div>
                                        `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu",
                    confirmButtonColor: "#7c6ee6",
                    cancelButtonColor: "#6b7280",
                    allowOutsideClick: false
                }).then((result) => {

                    // kalau tetap lanjut
                    if (result.isConfirmed) {
                        window.location.href = "/bab2/cidr";
                    }

                    // kalau kerjakan dulu
                    if (result.dismiss === Swal.DismissReason.cancel) {

                        // auto arahkan ke bagian yang belum
                        if (subnetBelum) {
                            showStep(1);
                            document.querySelector('.ayo-berlatih-subnet')
                                ?.scrollIntoView({ behavior: "smooth" });

                        } else if (andBelum) {
                            showStep(2);
                            document.querySelector('#andingContainer')
                                ?.scrollIntoView({ behavior: "smooth" });

                        } else {
                            showStep(3);
                        }
                    }

                });

                return false;
            }

            // =====================
            // 6. KIRIM PROGRES + LANJUT
            // =====================
            fetch(`/progres/selesai/${encodeURIComponent("IP Addressing")}/${encodeURIComponent("Subnet Mask")}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(() => {

                Swal.fire({
                    icon: "success",
                    title: "Aktivitas Selesai",
                    text: "Semua soal telah dijawab dengan benar. Silakan lanjut ke materi berikutnya.",
                    confirmButtonText: "Lanjut",
                    allowOutsideClick: false
                }).then(() => {
                    window.location.href = "/bab2/cidr";
                });

            });

            return false;
        }

        // pop up modal
        // POPUP GAMBAR (LANGSUNG JALAN)
        const modal = document.getElementById("imgModal");
        const modalImg = document.getElementById("modalImage");
        const closeBtn = document.querySelector(".close-btn");

        document.querySelectorAll(".popup-img").forEach(img => {

            img.addEventListener("click", function () {
                modal.style.display = "block";
                modalImg.src = this.src;
            });

        });

        closeBtn.onclick = function () {
            modal.style.display = "none";
        };

        modal.onclick = function (e) {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        };

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

        document.addEventListener("DOMContentLoaded", function () {
            showStep(1);
        });

        window.addEventListener("DOMContentLoaded", async () => {

            const bab = encodeURIComponent("IP Addressing");
            const subbab = encodeURIComponent("Subnet Mask");

            const res = await fetch(`/progres/cek/${bab}/${subbab}`);
            const data = await res.json();

            if (data.selesai) {

                console.log("SUDAH SELESAI");

                sudahBaca = true;
                sudahLulusPemahaman = true;
                sudahSubnet = true;
                sudahAND = true;
                sudahAktivitas = true;

                startTime = 0;
            }

        });

        document.addEventListener("input", function (e) {

            if (e.target.matches(".mask-input")) {

                // hanya angka dan titik
                e.target.value = e.target.value.replace(/[^0-9.]/g, '');

            }

        });
    </script>

@endsection