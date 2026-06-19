@extends('mahasiswa.mahasiswa')

@section('title', 'Subbab - Kelas IP Address')

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
            overflow-x: hidden;
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

        /* TABEL */
        .table-wrapper {
            overflow-x: auto;
            margin-top: 16px;
        }

        .ip-table {
            border-collapse: collapse;
            margin: 0 auto;

            font-size: 15px;
        }

        .ip-table th,
        .ip-table td {
            border: 1px solid #d6c3b2;
            padding: 8px 14px;
        }

        .ip-table th {
            background: #f9f5f2;
            font-weight: 700;
        }

        /* DRAG & DROP IP CLASS */
        .dd-container {
            display: grid;
            grid-template-columns: 1fr 120px;
            gap: 16px;
            margin-top: 20px;
            align-items: flex-start;
        }

        .dd-container>div:last-child {
            justify-self: start;
            margin-left: -200px;
        }

        .ip-list {
            display: grid;
            grid-template-columns: 180px 110px;
            column-gap: 12px;
            row-gap: 12px;
            align-items: center;
        }


        .ip-item {
            font-weight: 600;
        }

        .drop-zone {
            border: 2px dashed #d6c3b2;
            height: 38px;
            width: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            background: #ffffff;
            margin-left: 140px;
        }

        .drop-contoh {
            border: 2px dashed #d6c3b2;
            height: 38px;
            width: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            background: #ffffff;
            margin-left: 140px;
        }

        .drop-contoh.contoh {
            border-color: #15803d;
            background: #ecfdf5;
            color: #065f46;
        }

        .drop-zone.correct {
            border-color: #15803d;
            background: #ecfdf5;
            color: #065f46;
        }

        .drop-zone.wrong {
            border-color: #b91c1c;
            background: #fef2f2;
            color: #7f1d1d;
        }

        /* KOTAK KELAS */
        .class-box {
            background: #89471e;
            color: #ffffff;
            font-weight: 700;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 8px;
            width: 90px;
            cursor: grab;
            user-select: none;
            margin-top: 25px;
        }

        .gambar-materi {
            text-align: center;
            margin: 18px 0;
        }

        .gambar-materi img {
            max-width: 40%;
            height: auto;
        }

        @media (max-width: 768px) {

            .question-box {
                width: 100%;
                max-width: 100%;
                overflow-x: hidden;
                padding: 14px;
                box-sizing: border-box;
            }

            .dd-container {
                display: flex;
                flex-direction: column;
                gap: 18px;
                width: 100%;
            }

            .ip-list {
                width: 100%;
                display: grid;
                grid-template-columns: 1fr 70px;
                column-gap: 8px;
                row-gap: 14px;
                align-items: center;
            }

            .drop-zone,
            .drop-contoh {
                margin-left: 0 !important;
                width: 65px;
                height: 36px;
                box-sizing: border-box;
            }

            .ip-item {
                font-size: 13px;
                line-height: 1.5;
                word-break: break-all;
                overflow-wrap: break-word;
                min-width: 0;
            }

            /* pilihan jawaban */
            .dd-container>div:last-child {
                width: 100%;
                display: flex;
                justify-content: center;
                gap: 8px;
                flex-wrap: wrap;
                margin: 0;
                padding: 0;
            }

            .class-box {
                width: 55px;
                min-width: 55px;
                margin: 0;
                padding: 10px 0;
                flex-shrink: 0;
            }

            .gambar-materi {
                width: 100%;
                overflow: hidden;
            }

            .gambar-materi img {
                width: 90%;
                max-width: 100%;
                height: auto;
                display: block;
                margin: 0 auto;
            }

            .table-wrapper {
                overflow-x: hidden;
            }

            .ip-table {
                width: 100%;
                font-size: 12px;
                table-layout: fixed;
                word-wrap: break-word;
            }

            .ip-table th,
            .ip-table td {
                padding: 6px 8px;
                word-break: break-word;
            }

            .ip-table th {
                width: 35%;
            }

            .ip-table td {
                width: 65%;
            }
        }

        .class-box:active {
            cursor: grabbing;
        }

        /* cek jawaban */
        .cek-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 26px;
        }

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
        }

        .btn-cek:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(137, 71, 30, 0.45);
        }

        .btn-cek:active {
            transform: scale(0.96);
        }

        /* KETERANGAN WARNA JAWABAN */
        .legend-jawaban {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 14px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legend-box {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            display: inline-block;
        }

        .legend-box.benar {
            background: #ecfdf5;
            border: 2px solid #15803d;
        }

        .legend-box.salah {
            background: #fef2f2;
            border: 2px solid #b91c1c;
        }

        /* SOAL */
        .question-box {
            background: #ffffff;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
        }

        /* SECTION KONVERSI */
        .conversion-section {
            margin-top: 28px;
            padding: 20px 22px;
            background: #fdfaf7;
            border: 1px solid #e7d9cc;
            border-radius: 10px;
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

        /* penamaan kelas */
        .section-line-title {
            border-left: 5px solid #89471e;
            padding-left: 12px;
            font-size: 20px;
            font-weight: 700;
            color: #89471e;
            margin: 18px 0;
        }

        /* Deskripsi */
        .conversion-desc {
            font-size: 14px;
            color: #374151;
            margin-bottom: 18px;
        }

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

        /* aktivitas */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
        }

        .question-number {
            font-size: 14px;
            font-weight: 600;
            color: #89471e;
        }

        .question-text {
            font-size: 16px;
            font-weight: 600;
            margin: 12px 0 18px;
            color: #1f2937;
        }

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

        /* terkunci */
        .option.locked {
            opacity: 0.65;
            cursor: not-allowed;
        }

        /* NAVIGASI QUIZ */
        .quiz-nav-left {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 20px;
        }

        /* BACK */
        .prev-btn {
            background: #6b7280;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
        }

        /* NEXT */
        .next-btn {
            background: #b45309;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
        }

        /* hover */
        .prev-btn:hover:not(:disabled) {
            background: #4b5563;
        }

        .next-btn:hover:not(:disabled) {
            background: #92400e;
        }

        /* disabled */
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
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .swal-radio-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1.5px solid #e5e7eb;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 15px;
            background: #ffffff;
        }

        /* hover */
        .swal-radio-option:hover {
            background: #fef3c7;
            border-color: #f59e0b;
        }

        /* radio */
        .swal-radio-option input {
            accent-color: #b45309;
            transform: scale(1.1);
        }

        /* selected */
        .swal-radio-option:has(input:checked) {
            background: #fde68a;
            border-color: #d97706;
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
    </style>

    <!-- KELAS IP ADDRESS? -->
    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-box-seam"></i>
                </div>
                Kelas IP Address
            </div>
            <div class="box-body">
                Untuk mengakomodasi jaringan dengan ukuran yang berbeda serta mempermudah proses pengelompokan, alamat
                <i>IP</i> dibagi ke dalam beberapa kelas yang dikenal sebagai <strong>kelas <i>IP Address</i></strong>.

                <br><br>

                <h4 class="section-line-title">Kelas A</h4>
                Alamat <i>IP</i> Kelas A dirancang untuk mendukung jaringan yang sangat besar. Alamat <i>IP</i> Kelas A
                hanya menggunakan <strong>oktet/<i>byte</i> pertama</strong> untuk menunjukkan alamat <i>network</i>, tiga
                oktet sisanya digunakan untuk menomori alamat <strong><i>host</i></strong>.

                <!-- GAMBAR -->
                <div class="gambar-materi" style="margin:18px 0;">

                    <img src="{{ asset('assets/img/kelas-a.png') }}" alt="Ilustrasi IP Address dalam Jaringan">

                    <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                        Gambar 2.4 Kelas A<br>
                        Sumber : Cisco Systems, 2003
                    </div>

                </div>

                <br>
                <i>Bit</i> pertama pada alamat Kelas A selalu <strong>bernilai 0</strong>. Dengan <i>bit</i> pertama
                bernilai 0, nilai terendah yang dapat direpresentasikan adalah <strong>00000000</strong> (desimal 0), dan
                nilai tertingginya adalah <strong>01111111</strong> (desimal 127). Namun, kedua angka tersebut yaitu 0 dan
                127 <strong>dicadangkan</strong> dan tidak dapat digunakan sebagai alamat <i>network</i>. Setiap alamat yang
                memiliki nilai antara 1 dan 126 pada oktet pertama merupakan alamat Kelas A. Format alamat <i>IP</i> kelas A
                adalah <strong>0nnnnnnn.hhhhhhhh.hhhhhhhh.hhhhhhhh</strong>, angka <strong>0</strong>menunjukkan penanda
                kelas A, sedangkan <strong>n</strong> adalah <i>Network</i> dan <strong>h</strong> adalah <i>Host</i>.

                <div class="table-wrapper">
                    <table class="ip-table">
                        <tr>
                            <th>Format</th>
                            <td>0nnnnnnn.hhhhhhhh.hhhhhhhh.hhhhhhhh</td>
                        </tr>
                        <tr>
                            <th>Bit pertama</th>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th>Range</th>
                            <td>1 - 126</td>
                        </tr>
                        <tr>
                            <th>Panjang Network ID</th>
                            <td>8 bit</td>
                        </tr>
                        <tr>
                            <th>Panjang Host ID</th>
                            <td>24 bit</td>
                        </tr>
                        <tr>
                            <th>Jumlah Host Per Network</th>
                            <td>16.777.214</td>
                        </tr>
                        <tr>
                            <th>Jumlah Network</th>
                            <td>126</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                Cocok digunakan untuk jaringan dengan kebutuhan host yang
                                sangat banyak.
                            </td>
                        </tr>
                    </table>
                    <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                        Tabel 2.1 Kelas A
                    </div>
                </div>

                <br>
                Alamat <i>IP</i> Kelas A biasanya digunakan untuk IP publik, khususnya oleh
                penyedia layanan internet dan operator telekomunikasi yang membutuhkan
                jaringan dengan kapasitas <i>host</i> besar. Struktur alamatnya dapat dibagi menjadi
                <strong><i>net-id.host-id.host-id.host-id</i></strong>, contohnya pada alamat 10.14.17.15.

                <br><br>

                <h4 class="section-line-title">Kelas B</h4> Alamat <i>IP</i> Kelas B dirancang untuk memenuhi kebutuhan
                jaringan dengan ukuran menengah hingga besar. Alamat <i>IP</i> Kelas B menggunakan <strong>dua
                    oktet/<i>byte</i></strong> untuk menunjukkan alamat <strong><i>network</i></strong>, sedangkan dua oktet
                lainnya digunakan untuk menentukan alamat <strong><i>host</i></strong>.

                <!-- GAMBAR -->
                <div class="gambar-materi" style="margin:18px 0;">
                    <img src="{{ asset('assets/img/kelas-b.png') }}" alt="Ilustrasi IP Address dalam Jaringan">
                    <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                        Gambar 2.5 Kelas B<br>
                        Sumber : Cisco Systems, 2003
                    </div>
                </div>

                <br> Dua bit pertama pada oktet/<i>byte</i> pertama alamat Kelas B selalu <strong>bernilai 10</strong>. Enam
                bit sisanya dapat berisi angka 1 atau 0. Oleh karena itu, nilai terendah yang dapat direpresentasikan oleh
                alamat Kelas B adalah <strong>10000000</strong> (desimal 128), dan nilai tertingginya adalah
                <strong>10111111</strong> (desimal 191). Setiap alamat yang memiliki nilai pada kisaran <strong>128 hingga
                    191</strong> pada oktet pertamanya merupakan alamat Kelas B. Format alamat <i>IP</i> kelas B adalah
                <strong>10nnnnnn.hhhhhhhh.hhhhhhhh.hhhhhhhh</strong>, angka <strong>10</strong>menunjukkan penanda kelas B,
                sedangkan <strong>n</strong> adalah <i>Network</i> dan <strong>h</strong> adalah <i>Host</i>.

                <div class="table-wrapper">
                    <table class="ip-table">
                        <tr>
                            <th>Format</th>
                            <td>10nnnnnn.hhhhhhhh.hhhhhhhh.hhhhhhhh</td>
                        </tr>
                        <tr>
                            <th>Bit pertama</th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th>Range</th>
                            <td>128 - 191</td>
                        </tr>
                        <tr>
                            <th>Panjang Network ID</th>
                            <td>16 bit</td>
                        </tr>
                        <tr>
                            <th>Panjang Host ID</th>
                            <td>16 bit</td>
                        </tr>
                        <tr>
                            <th>Jumlah Host Per Network</th>
                            <td>65.534</td>
                        </tr>
                        <tr>
                            <th>Jumlah Network</th>
                            <td>16.384</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                Cocok digunakan untuk jaringan besar dan menengah.
                            </td>
                        </tr>
                    </table>
                    <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                        Tabel 2.2 Kelas B
                    </div>
                </div>

                <br>
                Alamat IP Kelas B banyak digunakan, baik untuk IP publik maupun IP privat,
                khususnya oleh perusahaan besar dan perguruan tinggi yang memiliki banyak
                gedung dan ruangan. Setiap gedung atau ruangan bisa berisi beberapa komputer
                atau bahkan banyak komputer. Struktur alamat Kelas B dapat dibagi menjadi
                <strong>net-id.net-id.host-id.host-id</strong>,
                contohnya 180.145.88.90.

                <br><br>

                <h4 class="section-line-title">Kelas C</h4>
                Kelas C pada pengalamatan <i>IPv4</i> merupakan jenis alamat <i>IP</i> yang dirancang
                untuk jaringan berskala kecil, seperti di rumah, kos, atau gedung kecil.

                <!-- GAMBAR -->
                <div class="gambar-materi" style="margin:18px 0;">
                    <img src="{{ asset('assets/img/kelas-c.png') }}" alt="Ilustrasi IP Address dalam Jaringan">
                    <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                        Gambar 2.6 Kelas C<br>
                        Sumber : Cisco Systems, 2003
                    </div>
                </div>

                <br>
                Alamat Kelas C selalu diawali dengan bit biner <strong>110</strong>. Oleh karena itu, nilai terendah yang
                dapat direpresentasikan adalah <strong>11000000</strong> (desimal 192), dan nilai tertingginya adalah
                <strong>11011111</strong> (desimal 223). Jika suatu alamat memiliki nilai pada kisaran <strong>192 hingga
                    223</strong> pada oktet pertama, maka alamat tersebut termasuk ke dalam Kelas C. Format alamat <i>IP</i>
                kelas C adalah <strong>110nnnnn.hhhhhhhh.hhhhhhhh.hhhhhhhh</strong>, angka <strong>110</strong> menunjukkan
                penanda kelas C, sedangkan <strong>n</strong> adalah Networkdan <strong><i>h</i></strong> adalah
                <i>Host</i>.

                <div class="table-wrapper">
                    <table class="ip-table">
                        <tr>
                            <th>Format</th>
                            <td>110nnnnn.hhhhhhhh.hhhhhhhh.hhhhhhhh</td>
                        </tr>
                        <tr>
                            <th>Bit pertama</th>
                            <td>110</td>
                        </tr>
                        <tr>
                            <th>Range</th>
                            <td>192 - 223</td>
                        </tr>
                        <tr>
                            <th>Panjang Network ID</th>
                            <td>24 bit</td>
                        </tr>
                        <tr>
                            <th>Panjang Host ID</th>
                            <td>8 bit</td>
                        </tr>
                        <tr>
                            <th>Jumlah Host Per Network</th>
                            <td>254</td>
                        </tr>
                        <tr>
                            <th>Jumlah Network</th>
                            <td>2.097.152 </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                Cocok digunakan untuk jaringan berukuran kecil.
                            </td>
                        </tr>
                    </table>
                    <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                        Tabel 2.3 Kelas C
                    </div>
                </div>

                <br>
                Alamat <i>IP</i> Kelas C jarang digunakan untuk <i>IP publik</i> (internet), tetapi sangat umum pada
                <i>intranet</i> (<i>IP privat</i>). Struktur alamatnya dapat digambarkan sebagai <strong><i>net-id.net-
                        id.net-id.host-id</i></strong>, misalnya 192.168.1.50. Secara teori, Kelas C memiliki kapasitas
                <i>host</i> yang terbatas, namun dengan penerapan <i>CIDR</i> (<i>Classless Inter-Domain Routing</i>),
                kapasitasnya dapat diperluas hingga mendekati jaringan Kelas A atau B. Pembahasan tentang <i>CIDR</i> akan
                dijelaskan pada bab selanjutnya.

                <br><br>
                <h4 class="section-line-title">Kelas D</h4> Alamat IP Kelas D digunakan untuk <em>multicast</em>, yaitu
                pengiriman data dari satu pengirim ke sekelompok penerima secara bersamaan melalui satu alamat grup.

                <!-- GAMBAR -->
                <div class="gambar-materi" style="margin:18px 0;">
                    <img src="{{ asset('assets/img/kelas-d.png') }}" alt="Ilustrasi IP Address dalam Jaringan">
                    <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                        Gambar 2.7 Kelas D <br>
                        Sumber : Cisco Systems, 2003
                    </div>
                </div>

                <br>
                Pada alamat Kelas D, empat bit pertama harus <strong>bernilai 1110</strong>. Pola bit ini digunakan untuk
                menandai bahwa alamat tersebut termasuk ke dalam Kelas D. Jika pola biner tersebut diubah ke bentuk desimal,
                maka nilai oktet pertama berada pada rentang <strong>11100000</strong> (desimal 224) sampai
                <strong>11101111</strong> (desimal 239). Oleh karena itu, setiap alamat <i>IP</i> yang memiliki angka
                <strong>224 hingga 239</strong> pada oktet pertamanya termasuk ke dalam Kelas D.

                <br><br>
                <h4 class="section-line-title">Kelas E</h4> Alamat <i>IP</i> Kelas E didefinisikan dalam sistem pengalamatan
                <i>IP</i>, namun tidak digunakan pada jaringan internet umum karena dicadangkan oleh <i>Internet Engineering
                    Task Force</i> (<i>IETF</i>) untuk keperluan penelitian dan pengembangan. Alamat Kelas E memiliki empat
                <i>bit</i> awal <strong>bernilai 1111</strong>, sehingga nilai oktet pertamanya berada pada rentang
                <strong>240 hingga 255</strong>.

                <!-- GAMBAR -->
                <div class="gambar-materi" style="margin:18px 0;">
                    <img src="{{ asset('assets/img/kelas-e.png') }}" alt="Ilustrasi IP Address dalam Jaringan">
                    <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                        Gambar 2.8 Kelas E <br>
                        Sumber : Cisco Systems, 2003
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-search"></i>
                </div>
                Penentuan Kelas IP Berdasarkan <i>Byte</i> Pertama
            </div>
            <div class="box-body">
                Kelas sebuah alamat dapat ditentukan dengan mudah dengan memeriksa oktet pertama dari alamat tersebut dan
                mencocokkan nilainya dengan rentang kelas pada tabel 2.4. Pada alamat <i>IP</i> <strong>172.31.1.2</strong>
                misalnya, <i>byte</i>/oktet pertamanya adalah 172. Jika dikonversi ke bentuk biner, nilai 172 adalah
                <strong>10101100</strong>. Karena pola <i>bit</i> awal <strong>10</strong> maka alamat
                <strong>172.31.1.2</strong> termasuk ke dalam <strong>Kelas B</strong>. <br><br> Tabel berikut merangkum
                rentang nilai yang mungkin untuk oktet pertama dari setiap kelas alamat.

                <br><br>

                <div class="table-wrapper">
                    <table class="ip-table">
                        <tr>
                            <th>Kelas IP</th>
                            <th>Range</th>
                            <th>Bit Pertama</th>
                        </tr>
                        <tr>
                            <td>Kelas A</td>
                            <td>1 – 126 (00000001 hingga 01111110)</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Kelas B</td>
                            <td>128 - 191 (10000000 hingga 10111111)</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>Kelas C</td>
                            <td>192 - 223 (11000000 hingga 11011111)</td>
                            <td>110</td>
                        </tr>
                        <tr>
                            <td>Kelas D</td>
                            <td>224 - 239 (11100000 hingga 11101111)</td>
                            <td>1110</td>
                        </tr>
                        <tr>
                            <td>Kelas E</td>
                            <td>240 - 254 (11110000 hingga 11111111)</td>
                            <td>1111</td>
                        </tr>
                    </table>
                    <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                        Tabel 2.4 Rentang Nilai Kelas <i>IP Address</i>
                    </div>
                </div>

                <br>
                <div class="info-box">
                    <div class="info-title">Contoh Soal</div>
                    Sebuah komputer pada laboratorium sekolah memiliki alamat IP <strong>192.168.10.5</strong>. Tentukan
                    kelas IP dari alamat tersebut.

                    <br><br>
                    <strong>Penyelesaian:</strong>

                    <ol style="margin-left:18px; margin-top:10px;">
                        <li>
                            Perhatikan oktet pertama dari alamat IP tersebut, yaitu
                            <span class="binary-text">192</span>
                        </li>

                        <li>
                            Konversi nilai oktet pertama ke bentuk biner:
                            <br>
                            <span class="binary-text">192 = 11000000</span>
                        </li>

                        <li>
                            Tentukan kelas IP berdasarkan pola bit awal.
                            <br>
                            Karena pola bit awalnya adalah <strong>110</strong>, maka alamat IP tersebut termasuk ke dalam
                            <strong>Kelas C</strong>.
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
                        Kesimpulan: IP Address <strong>192.168.10.5</strong> termasuk <strong>Kelas C</strong>

                    </div>
                </div>

                <div class="conversion-section">
                    <h4 class="conversion-title">Ayo Berlatih!</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>
                        <ol>
                            <li>Perhatikan alamat IP pada kolom sebelah kiri.</li>
                            <li>Amati nilai <b>oktet (byte) pertama</b> dari setiap alamat IP.</li>
                            <li>Cocokkan nilai tersebut dengan rentang kelas IP pada tabel (A, B, C, D, atau E).</li>
                            <li>Seret huruf kelas IP yang sesuai ke kotak jawaban di samping alamat IP.</li>
                            <li>Klik tombol <b>"Cek Jawaban"</b> untuk memeriksa hasil.</li>
                        </ol>
                    </div>

                    <div class="question-box network-host-layout">
                        <div class="dd-container">

                            <div class="ip-list">

                                <!-- CONTOH SOAL STATIS -->
                                <div class="ip-item">
                                    192.168.1.10 <small style="color:#6b7280"></small>
                                </div>

                                <div class="drop-contoh contoh"
                                    style="border-color:#15803d;background:#ecfdf5;color:#065f46;">
                                    C
                                </div>

                                <!-- SOAL DARI DATABASE -->
                                @foreach($soal as $item)
                                    <div class="ip-item">{{ $item->soal }}</div>
                                    <div class="drop-zone" data-id="{{ $item->id_soal }}"></div>
                                @endforeach

                            </div>

                            <!-- KOTAK KELAS -->
                            <div>
                                <div class="class-box" draggable="true" data-class="A">A</div>
                                <div class="class-box" draggable="true" data-class="B">B</div>
                                <div class="class-box" draggable="true" data-class="C">C</div>
                                <div class="class-box" draggable="true" data-class="D">D</div>
                                <div class="class-box" draggable="true" data-class="E">E</div>
                            </div>

                        </div>
                    </div>
                    <div class="cek-wrapper" style="gap:10px;">
                        <button id="cekJawabanBtn" class="btn-cek">
                            Cek Jawaban
                        </button>

                        <button id="resetJawabanBtn" class="btn-cek" style="background:#6b7280;">
                            Reset
                        </button>
                    </div>

                    <div class="legend-jawaban">
                        <div class="legend-item">
                            <span class="legend-box benar"></span>
                            Jawaban Benar
                        </div>
                        <div class="legend-item">
                            <span class="legend-box salah"></span>
                            Jawaban Salah
                        </div>
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
                <span>Aktivitas 2.2</span>
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
        <a href="/bab2/ip-addressing" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab2/network-host" class="nav-btn nav-next" onclick="return cekLatihanIP(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <script>

        let sudahLatihanDrag = false;
        let sudahAktivitas = false;

        let startTime = Date.now();
        let sudahLulusPemahaman = false;

        function sudahBacaMinimal() {

            // kalau sudah pernah selesai langsung true
            if (sudahLulusPemahaman) return true;

            let waktu = (Date.now() - startTime) / 1000;
            return waktu >= 120;
        }

        let soal = [];
        let indexSoal = 0;
        let terkunci = [];

        fetch('/aktivitas/kelas-ip/soal')
            .then(res => res.json())
            .then(data => {

                soal = data;
                terkunci = Array(soal.length).fill(false);
                renderSoal();

                // CEK PROGRES SETELAH SOAL SIAP
                const bab = encodeURIComponent("IP Addressing");
                const subbab = encodeURIComponent("Kelas IP Address");

                fetch(`/progres/cek/${bab}/${subbab}`)
                    .then(res => res.json())
                    .then(res => {

                        if (res.selesai) {

                            sudahLatihanDrag = true;
                            sudahAktivitas = true;
                            sudahLulusPemahaman = true;

                            // isi drag
                            document.querySelectorAll('.drop-zone').forEach(zone => {
                                zone.textContent = "";
                            });
                        }

                    });

            });

        const quizContainer = document.getElementById("quizContainer");
        const feedback = document.getElementById("quizFeedback");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");


        function renderSoal() {

            if (!soal || soal.length === 0) {
                return;
            }
            
            const data = soal[indexSoal];
            console.log(data);

            let html = `
                <div class="question-box">
                    <p class="question-number">
                    Soal ${indexSoal + 1} dari ${soal.length}
                    </p>
                    <p class="question-text">${data.q}</p>
                `;

            if (data.tipe === "pilgan") {
                html += `<div class="options">`;
                data.opsi.forEach((o, i) => {
                    html += `
                                                    <label class="option ${terkunci[indexSoal] ? 'locked' : ''}">
                                                        <input
                                                        type="radio"
                                                        name="jawaban"
                                                        value="${i}"
                                                        ${terkunci[indexSoal] ? 'disabled' : ''}
                                                        >
                                                        <span class="option-text">${o}</span>
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
                                                    placeholder="..."
                                                    ${terkunci[indexSoal] ? 'disabled' : ''}
                                                    >
                                                `;
            }

            html += `</div>`;
            quizContainer.innerHTML = html;

            if (window.MathJax) {
                MathJax.typeset();
            }

            feedback.textContent = "";
            nextBtn.disabled = !terkunci[indexSoal];
            prevBtn.disabled = indexSoal === 0;

            if (!terkunci[indexSoal]) {
                document.querySelectorAll("input").forEach(el => {
                    el.addEventListener("change", cekJawaban);
                    el.addEventListener("input", cekJawaban);
                });
            }
        }

        function cekJawaban() {
            const data = soal[indexSoal];
            let jawabanUser = "";

            if (data.tipe === "pilgan") {
                const pilih = document.querySelector('input[name="jawaban"]:checked');
                if (!pilih) return;
                jawabanUser = pilih.value;
            } else {
                jawabanUser = document.getElementById("jawabanIsian").value.trim().toUpperCase();
                if (!jawabanUser) return;
            }

            fetch('/aktivitas/kelas-ip/cek', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_soal: soal[indexSoal].id,
                    jawaban_user: jawabanUser
                })
            })
                .then(res => res.json())
                .then(res => {
                    if (res.benar) {
                        terkunci[indexSoal] = true;
                        feedback.textContent = "Jawaban benar";
                        feedback.style.color = "#15803d";

                        document.querySelectorAll("input").forEach(i => i.disabled = true);
                        nextBtn.disabled = false;
                    } else {
                        feedback.textContent = "Jawaban salah, silakan coba lagi";
                        feedback.style.color = "#b91c1c";
                    }
                });
        }

        const keyKelasIP = "jawaban_kelas_ip";
        jawabanUser = {};

        // DROP ZONE
        document.querySelectorAll('.drop-zone').forEach(zone => {

            // WAJIB ADA
            zone.addEventListener('dragover', e => {
                e.preventDefault(); // ⬅️ INI KUNCI UTAMA
            });

            zone.addEventListener('drop', e => {
                e.preventDefault();

                const kelas = e.dataTransfer.getData('class');
                if (!kelas) return;

                const idSoal = zone.dataset.id;

                zone.textContent = kelas;
                jawabanUser[idSoal] = kelas;

                // simpan ke session
                sessionStorage.setItem(keyKelasIP, JSON.stringify(jawabanUser));
            });

        });

        // cek jawaban
        document.getElementById('cekJawabanBtn').addEventListener('click', async () => {

            const zones = document.querySelectorAll('.drop-zone');
            let jumlahBenar = 0;
            let semuaTerisi = true;
            let semuaBenar = true;

            for (const zone of zones) {
                const idSoal = zone.dataset.id;
                const jawaban = jawabanUser[idSoal];

                zone.classList.remove('correct', 'wrong');

                // BELUM DIISI
                if (!jawaban) {
                    semuaTerisi = false;
                    zone.classList.add('wrong');
                    continue;
                }

                const res = await fetch('/kelas-ip/cek', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id_soal: idSoal,
                        jawaban_user: jawaban
                    })
                });

                const data = await res.json();

                if (data.benar) {
                    zone.classList.add('correct');
                    jumlahBenar++;
                } else {
                    zone.classList.add('wrong');
                    semuaBenar = false;
                }
            }

            if (!semuaTerisi) {
                Swal.fire({
                    icon: "warning",
                    title: "Belum Lengkap",
                    text: `Jawaban benar: ${jumlahBenar} dari ${zones.length}. Coba periksa kembali`,
                });
                return;
            }

            if (semuaBenar) {

                sudahLatihanDrag = true;

                sessionStorage.removeItem(keyKelasIP);

                Swal.fire({
                    icon: "success",
                    title: "Latihan Selesai",
                    text: "Semua alamat IP sudah dikelompokkan dengan benar. Mau mengulang latihan atau lanjut?",
                    showCancelButton: true,
                    confirmButtonText: "Ulangi",
                    cancelButtonText: "Lanjut",
                    allowOutsideClick: false
                }).then((result) => {

                    // jika pilih ulangi
                    if (result.isConfirmed) {

                        document.querySelectorAll('.drop-zone').forEach(zone => {
                            zone.textContent = "";
                            zone.classList.remove('correct', 'wrong');
                        });

                        jawabanUser = {};

                    }

                    // jika pilih lanjut
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
                    text: `Jawaban benar: ${jumlahBenar} dari ${zones.length}. Coba periksa kembali.`,
                });
            }

        });

        let isDragging = false;

        document.querySelectorAll('.class-box').forEach(box => {

            box.addEventListener('dragstart', e => {
                isDragging = true;
                e.dataTransfer.setData('class', box.dataset.class);
            });

            box.addEventListener('dragend', () => {
                isDragging = false;
            });

        });

        document.getElementById('resetJawabanBtn').addEventListener('click', () => {

            Swal.fire({
                icon: "warning",
                title: "Reset Jawaban?",
                text: "Semua jawaban yang sudah diisi akan dihapus.",
                showCancelButton: true,
                confirmButtonText: "Reset",
                cancelButtonText: "Batal",
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
            }).then((result) => {

                if (!result.isConfirmed) return;

                // hapus semua isi drop zone
                document.querySelectorAll('.drop-zone').forEach(zone => {
                    zone.textContent = "";
                    zone.classList.remove('correct', 'wrong');
                });

                // reset jawaban user
                jawabanUser = {};
                sessionStorage.removeItem(keyKelasIP);

            });

        });

        window.addEventListener("DOMContentLoaded", function () {

            const data = JSON.parse(sessionStorage.getItem(keyKelasIP)) || {};

            jawabanUser = data;

            document.querySelectorAll('.drop-zone').forEach(zone => {

                const id = zone.dataset.id;

                if (data[id]) {
                    zone.textContent = data[id];
                }

            });

        });

        function nextSoal() {

            if (!terkunci[indexSoal]) return;

            indexSoal++;

            if (indexSoal < soal.length) {

                renderSoal();

            } else {

                sudahAktivitas = true;

                Swal.fire({
                    icon: "success",
                    title: "Aktivitas Selesai",
                    text: "Semua soal telah dijawab dengan benar.",
                    confirmButtonText: "Lanjut"
                }).then(() => {

                    document.querySelector('.nav-next').click();

                });

            }
        }

        function prevSoal() {
            if (indexSoal === 0) return;
            indexSoal--;
            renderSoal();
        }

        renderSoal();

        function cekLatihanIP(e) {

            e.preventDefault();

            // =====================
            // 1. CEK WAKTU BACA
            // =====================
            if (!sudahBacaMinimal()) {

                Swal.fire({
                    icon: "warning",
                    title: "Belum Membaca",
                    text: "Silakan baca materi terlebih dahulu."
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
                                                        IP Address 150.10.1.1 termasuk kelas apa?
                                                    </div>

                                                    <div class="swal-radio-group">

                                                        <label class="swal-radio-option">
                                                            <input type="radio" name="kelas" value="A">
                                                            Kelas A
                                                        </label>

                                                        <label class="swal-radio-option">
                                                            <input type="radio" name="kelas" value="B">
                                                            Kelas B
                                                        </label>

                                                        <label class="swal-radio-option">
                                                            <input type="radio" name="kelas" value="C">
                                                            Kelas C
                                                        </label>

                                                        <label class="swal-radio-option">
                                                            <input type="radio" name="kelas" value="D">
                                                            Kelas D
                                                        </label>

                                                    </div>
                                                `,
                    confirmButtonText: "Kirim",
                    showCancelButton: true,

                    preConfirm: () => {
                        const selected = document.querySelector('input[name="kelas"]:checked');

                        if (!selected) {
                            Swal.showValidationMessage("Pilih jawaban dulu!");
                            return false;
                        }

                        return selected.value;
                    }

                }).then((result) => {

                    if (result.isConfirmed) {

                        // 150 → masuk range 128–191 → Kelas B
                        if (result.value === "B") {

                            sudahLulusPemahaman = true;

                            Swal.fire({
                                icon: "success",
                                title: "Benar!",
                                text: "150 termasuk range Kelas B (128–191)."
                            });

                        } else {

                            Swal.fire({
                                icon: "error",
                                title: "Salah",
                                text: "Coba perhatikan kembali range kelas IP."
                            });

                        }

                    }

                });

                return false;
            }

            // =====================
            // CEK LATIHAN + AKTIVITAS SEKALIGUS
            // =====================
            if (!sudahLatihanDrag || !sudahAktivitas) {

                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                                                    <div style="text-align:center; line-height:1.6;">

                                                        Tapi, kamu belum menyelesaikan:
                                                        <br><br>

                                                        ${!sudahLatihanDrag ? "<b>Ayo Berlatih</b><br>" : ""}
                                                        ${!sudahAktivitas ? "<b>Aktivitas</b><br>" : ""}

                                                        <br>

                                                        Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.

                                                    </div>
                                                `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu",
                    reverseButtons: true,
                    confirmButtonColor: "#6366f1",
                    cancelButtonColor: "#6b7280"
                }).then((result) => {

                    // kalau pilih "Kerjakan Dulu"
                    if (result.dismiss === Swal.DismissReason.cancel) {

                        if (!sudahLatihanDrag) {
                            document.querySelector(".conversion-title").scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                        else if (!sudahAktivitas) {
                            document.getElementById("quizContainer").scrollIntoView({
                                behavior: "smooth"
                            });
                        }

                    }

                    // kalau pilih "Tetap Lanjut"
                    if (result.isConfirmed) {
                        window.location.href = "/bab2/network-host";
                    }

                });

                return false;
            }

            // =====================
            // 5. KIRIM PROGRES
            // =====================
            const bab = encodeURIComponent("IP Addressing");
            const subbab = encodeURIComponent("Kelas IP Address");

            fetch(`/progres/selesai/${bab}/${subbab}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(() => {
                window.location.href = "/bab2/network-host";
            });

        }

        let currentStep = 1;
        const totalStep = 3;

        function showStep(step) {

            console.log("showStep:", step);

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

            // HANDLE PANAH
            const arrows = document.querySelectorAll(".nav-arrow");
            const prev = arrows[0];
            const next = arrows[1];

            prev.disabled = currentStep === 1;
            next.disabled = currentStep === totalStep;
        }

        document.addEventListener("DOMContentLoaded", function () {
            showStep(1);
        });

        window.addEventListener('dragover', function (e) {

            if (!isDragging) return;

            const batas = 50;

            if (e.clientY > window.innerHeight - batas) {
                window.scrollBy(0, 15);
            }

            if (e.clientY < batas) {
                window.scrollBy(0, -15);
            }

        });
    </script>

@endsection