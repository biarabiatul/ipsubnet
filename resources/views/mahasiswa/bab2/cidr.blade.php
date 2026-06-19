@extends('mahasiswa.mahasiswa')

@section('title', 'Subbab - CIDR')

<title>BAB 2 : IP Addressing</title>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content')

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

        .materi-box .box-body {
            padding: 18px;
            line-height: 1.8;
            text-align: justify;
            color: #1f2937;
        }

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

        .conversion-title {
            font-size: 18px;
            font-weight: 700;
            color: #89471e;
            margin-top: 0;
            margin-bottom: 10px;
            text-align: center;
        }

        /* tabel */
        .ip-table {
            border-collapse: collapse;
            margin: 16px auto;
            font-size: 15px;
        }

        .ip-table th,
        .ip-table td {
            border: 1px solid #d6c3b2;
            padding: 8px 14px;
            text-align: center;
        }

        .ip-table th {
            background: #f9f5f2;
            font-weight: 700;
        }

        /* latihan */
        .drill-row {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 14px;
        }

        .ip-text {
            width: 200px;
            font-weight: 600;
        }

        .mask-input {
            width: 200px;
            border: none;
            border-bottom: 3px solid #000;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            outline: none;
            background: transparent;
        }

        .mask-input.correct {
            color: #15803d;
            border-bottom-color: #15803d;
        }

        .mask-input.wrong {
            color: #b91c1c;
            border-bottom-color: #b91c1c;
        }

        /* TOMBOL CEK */
        .btn-cek-modern {
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
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-cek-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(137, 71, 30, 0.45);
        }

        .btn-cek-modern:active {
            transform: scale(0.96);
        }

        /* Wrapper tombol */
        .cek-wrapper {
            display: flex;
            justify-content: flex-start;
            margin-top: 26px;
            margin-left: 80px;
        }

        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
            margin-top: 18px;
        }

        /* ayo berlatih */
        .cidr-row {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 12px;
        }

        .cidr-ip {
            width: 220px;
            font-weight: 600;
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

        .binary-text {
            font-size: 16px;
            font-weight: 700;
            background: #fff7ed;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
            border: 1px solid #f59e0b;
        }

        .quiz-feedback {
            margin-top: 14px;
            font-weight: 600;
            font-size: 14px;
        }

        .quiz-nav-left {
            display: flex;
            justify-content: flex-start;
            gap: 12px;
            margin-top: 20px;
        }

        /* Tombol Prev */
        .prev-btn {
            background: #6b7280;
            color: #ffffff;
            border: none;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .prev-btn:hover {
            background: #4b5563;
        }

        /* Tombol Next */
        .next-btn {
            background: #b45309;
            color: #ffffff;
            border: none;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .next-btn:hover {
            background: #92400e;
        }

        /* Disabled state */
        .prev-btn:disabled,
        .next-btn:disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
        }

        /* Question Box */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 20px;
            margin-top: 10px;
        }

        /* Nomor soal */
        .question-number {
            font-size: 14px;
            font-weight: 600;
            color: #89471e;
            margin-bottom: 8px;
        }

        /* Teks soal */
        .question-text {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #1f2937;
        }

        /* Pilihan */
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

        /* Selected option */
        .option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
        }

        /* Isian */
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

        .fill-input:focus {
            border-color: #89471e;
            outline: none;
            box-shadow: 0 0 0 2px rgba(137, 71, 30, 0.15);
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

        .inner-drill-box {
            background: transparent;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 16px 20px;
            margin-top: 14px;
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

        .soft-box {
            background: linear-gradient(135deg, #fff7ed, #ffedd5);
            border: 1px solid #f59e0b;
            padding: 14px 16px;
            border-radius: 10px;
            margin: 14px 0;
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

        .mini-drill {
            background: #fffaf5;
            border: 2px dashed #b45309;
            border-radius: 12px;
            padding: 20px 24px;
            margin: 28px auto;
            max-width: 1000px;
            width: 100%;
            text-align: center;
            position: relative;
        }

        /* badge kecil di atas */
        .mini-drill::before {
            content: "LATIHAN";
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: #b45309;
            color: white;
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 999px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

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

        .and-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .and-table th,
        .and-table td {
            border: 1px solid #d6c3b2;
            padding: 8px;
        }

        .bin {
            width: 90px;
            text-align: center;
        }

        .dec {
            width: 60px;
            text-align: center;
        }

        .mini-btn {
            margin-top: 12px;
            padding: 8px 18px;
            background: #b45309;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .mini-btn:hover {
            background: #92400e;
        }

        .reset-btn {
            background: #6b7280 !important;
        }

        .reset-btn:hover {
            background: #4b5563 !important;
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

        /* GROUP */
        .swal-radio-group {
            margin-top: 12px;
        }

        /* OPTION BOX */
        .swal-radio-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1.5px solid #e5e7eb;
            margin-bottom: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 14px;
        }

        /* HOVER */
        .swal-radio-option:hover {
            background: #fff7ed;
            border-color: #f59e0b;
        }

        /* RADIO */
        .swal-radio-option input {
            accent-color: #b45309;
            transform: scale(1.1);
        }

        /* SELECTED */
        .swal-radio-option:has(input:checked) {
            background: #fde68a;
            border-color: #d97706;
            font-weight: 600;
        }

        @media (max-width: 768px) {

            .ip-table {
                width: 100%;
                font-size: 11px;
                table-layout: fixed;
            }

            .ip-table th,
            .ip-table td {
                padding: 6px 4px;
                word-break: break-word;
            }

            .cidr-row {
                display: grid;
                grid-template-columns: 1fr 120px;
                gap: 10px;
                align-items: center;
                width: 100%;
            }

            .cidr-ip {
                width: auto;
                font-size: 14px;
                word-break: break-word;
            }

            .mask-input {
                width: 100% !important;
                min-width: 0 !important;
                font-size: 13px;
                padding: 4px 6px;
                box-sizing: border-box;
            }

            .inner-drill-box {
                overflow: hidden;
            }

            .and-table {
                width: 100%;
                table-layout: fixed;
            }

            .and-table th,
            .and-table td {
                padding: 4px 2px;
                font-size: 11px;
                overflow: hidden;
            }

            .bin,
            .dec {
                width: 100% !important;
                max-width: 100%;
                min-width: 0;
                box-sizing: border-box;
                font-size: 10px;
                padding: 3px 2px;
            }

            .mini-drill {
                background: #fffaf5;
                border: 2px dashed #b45309;
                border-radius: 12px;
                padding: 20px 24px;
                margin: 28px auto;
                max-width: 1000px;
                width: 100%;
                text-align: center;
                position: relative;
                overflow: visible;
            }

        }
    </style>

    <!-- CIDR -->
    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-slash-circle"></i>
                </div>
                <i>CIDR</i> (<i>Classless Inter-Domain Routing</i>)
            </div>

            <div class="box-body">

                Penulisan alamat <i>IP</i> sering dijumpai dalam bentuk seperti 192.168.1.10/24 atau 10.0.0.1/8. Angka yang
                terletak setelah tanda garis miring (/) disebut sebagai <strong><i>prefix</i></strong>. <i>Prefix</i> ini
                digunakan dalam metode pengalamatan <i>IP</i> yang dikenal sebagai <strong><i>CIDR</i> (<i>Classless
                        Inter-Domain Routing</i>)</strong>.

                <br><br>

                <strong><i>CIDR</i> (<i>Classless Interdomain Routing</i>)</strong> adalah metode pengalamatan <i>IP</i>
                yang tidak lagi menggunakan sistem kelas (A, B, C). Sebagai gantinya, <i>CIDR</i> menggunakan
                <strong>panjang <i>prefix</i></strong> untuk menentukan bagian <i>network</i> dan <i>host</i> secara lebih
                fleksibel. Metode ini banyak digunakan oleh <strong><i>Internet Service Provider</i> (<i>ISP</i>)</strong>
                untuk mengalokasikan alamat <i>IP</i> kepada pelanggan, seperti rumah atau perusahaan.

                <br><br>

                Penulisan prefix pada alamat IP menggunakan tanda garis miring (slash) "/" lalu diikuti dengan angka yang
                menunjukkan panjang network prefix ini dalam bit.

                <br>

                <div class="soft-box">
                    <h4 class="conversion-title">Format CIDR</h4>

                    Penulisan CIDR menggunakan format:
                    <br>
                    <strong>IP Address / Prefix</strong>

                    <div class="binary-text" style="margin-top:8px;">
                        192.168.1.10/28
                    </div>

                    <br>
                    Artinya:
                    <ul style="margin-top:10px;">
                        <li>28 bit = Network</li>
                        <li>Sisa bit = Host</li>
                    </ul>

                    Karena IPv4 terdiri dari 32 bit, maka:
                    <br>
                    <strong>32 - 28 = 4 bit host</strong>

                    <br><br>

                    Dengan demikian, subnet mask dalam bentuk biner adalah: <br>

                    <div class="binary-text">
                        11111111.11111111.11111111.11110000 (atau /28)
                    </div>

                    <br><br>
                    Jika dikonversi ke bentuk desimal bertitik (<i>dotted decimal</i>), subnet mask tersebut menjadi: <br>
                    <div class="binary-text">
                        255.255.255.240
                    </div>
                </div>

                <br>

                <i>CIDR</i> dikembangkan karena sistem <i>classful addressing</i> membagi alamat <i>IP</i> dengan ukuran
                tetap sehingga alokasi alamat menjadi <strong>kurang efisien</strong>. Sebagai contoh, jika sebuah
                organisasi membutuhkan sekitar 1000 alamat <i>IP</i>, maka:
                <ul>
                    <li>Kelas C (maksimal 254 host) <i class="bi bi-arrow-right-short"></i> <strong>tidak mencukupi</strong>
                    </li>
                    <li>Kelas B (hingga 65.534 host) <i class="bi bi-arrow-right-short"></i> <strong>terlalu besar</strong>
                    </li>
                </ul>

                Untuk mengatasi permasalahan tersebut, CIDR memungkinkan penggunaan panjang prefix yang dapat disesuaikan
                dengan kebutuhan jaringan. Dengan demikian, pembagian network dan host tidak lagi bergantung pada kelas,
                melainkan dapat memanfaatkan seluruh bit alamat IP secara lebih fleksibel dan efisien.
                <br><br>

                Untuk mempermudah melihat hubungan antara panjang prefix dan Subnet mask, berikut
                disajikan tabel CIDR sebagai referensi.

                <br>

                <table class="ip-table">
                    <tr>
                        <th>Subnet Mask</th>
                        <th>CIDR</th>
                        <th>Subnet Mask</th>
                        <th>CIDR</th>
                    </tr>
                    <tr>
                        <td>255.128.0.0</td>
                        <td>/9</td>
                        <td>255.255.240.0</td>
                        <td>/20</td>
                    </tr>
                    <tr>
                        <td>255.192.0.0</td>
                        <td>/10</td>
                        <td>255.255.248.0</td>
                        <td>/21</td>
                    </tr>
                    <tr>
                        <td>255.224.0.0</td>
                        <td>/11</td>
                        <td>255.255.252.0</td>
                        <td>/22</td>
                    </tr>
                    <tr>
                        <td>255.240.0.0</td>
                        <td>/12</td>
                        <td>255.255.254.0</td>
                        <td>/23</td>
                    </tr>
                    <tr>
                        <td>255.248.0.0</td>
                        <td>/13</td>
                        <td>255.255.255.0</td>
                        <td>/24</td>
                    </tr>
                    <tr>
                        <td>255.252.0.0</td>
                        <td>/14</td>
                        <td>255.255.255.128</td>
                        <td>/25</td>
                    </tr>
                    <tr>
                        <td>255.254.0.0</td>
                        <td>/15</td>
                        <td>255.255.255.192</td>
                        <td>/26</td>
                    </tr>
                    <tr>
                        <td>255.255.0.0</td>
                        <td>/16</td>
                        <td>255.255.255.224</td>
                        <td>/27</td>
                    </tr>
                    <tr>
                        <td>255.255.128.0</td>
                        <td>/17</td>
                        <td>255.255.255.240</td>
                        <td>/28</td>
                    </tr>
                    <tr>
                        <td>255.255.192.0</td>
                        <td>/18</td>
                        <td>255.255.255.248</td>
                        <td>/29</td>
                    </tr>
                    <tr>
                        <td>255.255.224.0</td>
                        <td>/19</td>
                        <td>255.255.255.252</td>
                        <td>/30</td>
                    </tr>
                </table>
                <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align:center;">
                    Tabel 2. 7 Hubungan Subnet mask dan prefix (CIDR)
                </div>

                <div class="info-box">
                    <div class="info-title">
                        Contoh Soal
                    </div>

                    Sebuah network dengan prefix-length <strong>/26</strong> memiliki arti sebagai berikut:
                    <ul>
                        <li>Jumlah bit <strong>Network ID</strong> = 26 bit</li>
                        <li>Jumlah bit <strong>Host ID</strong> = 32 bit − 26 bit = <strong>6 bit</strong></li>
                    </ul>

                    Jumlah <strong>32 bit</strong> tersebut diperoleh karena alamat
                    <strong>IPv4</strong> terdiri dari 32 bit, sehingga dapat dituliskan:
                    <div style="margin:10px 0; font-weight:700;">
                        32 bit IP address = 26 bit Network ID + 6 bit Host ID
                    </div>

                    Untuk memahami bagaimana prefix tersebut membentuk subnet mask,
                    perhatikan contoh berikut.

                    <br><br>
                    Diketahui alamat IP :<br>
                    <span class="binary-text">
                        192.168.1.0/26
                    </span>

                    <br><br>
                    Perhatikan representasi alamat IP dan pembagian bit Network ID serta Host ID pada tabel berikut.

                    <table class="ip-table" style="margin-top:16px;">
                        <tr>
                            <td>192</td>
                            <td>168</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td style="color:red; font-weight:700;">11000000</td>
                            <td style="color:red; font-weight:700;">10101000</td>
                            <td style="color:red; font-weight:700;">00000001</td>
                            <td style="font-weight:700;">
                                <span style="color:red;">00</span><span style="color:#2563eb;">000000</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-weight:700;">
                                26 bit network-id
                            </td>
                            <td style="font-weight:700;">
                                6 bit host-id
                            </td>
                        </tr>
                        <tr>
                            <td style="color:red; font-weight:700;">11111111</td>
                            <td style="color:red; font-weight:700;">11111111</td>
                            <td style="color:red; font-weight:700;">11111111</td>
                            <td style="font-weight:700;">
                                <span style="color:red;">11</span><span style="color:#2563eb;">000000</span>
                            </td>
                        </tr>
                        <tr>
                            <td>255</td>
                            <td>255</td>
                            <td>255</td>
                            <td>192</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="font-weight:700;">
                                subnet mask
                            </td>
                        </tr>
                    </table>

                    <div style="margin-top:10px;">
                        Dengan demikian, subnet mask untuk prefix /26 adalah <strong>255.255.255.192</strong>
                    </div>

                    <div class="mini-drill">
                        <p><b>IP Address :</b> 172.16.10.5/22</p>
                        <p>Tentukan <b>Subnet Mask</b>:</p>

                        <table class="ip-table">
                            <tr>
                                <td>172</td>
                                <td>16</td>
                                <td>10</td>
                                <td>5</td>
                            </tr>

                            <tr>
                                <td>10101100</td>
                                <td>00010000</td>
                                <td>00001010</td>
                                <td>00000101</td>
                            </tr>

                            <tr>
                                <td colspan="3"><b>22 bit network-id</b></td>
                                <td><b>10 bit host-id</b></td>
                            </tr>

                            <!-- INPUT MASK BINER -->
                            <tr>
                                <td><input id="m1" class="bin" placeholder="..." inputmode="numeric"></td>
                                <td><input id="m2" class="bin" placeholder="..." inputmode="numeric"></td>
                                <td><input id="m3" class="bin" placeholder="..." inputmode="numeric"></td>
                                <td><input id="m4" class="bin" placeholder="..." inputmode="numeric"></td>
                            </tr>

                            <!-- INPUT DESIMAL -->
                            <tr>
                                <td><input id="d1" class="dec" placeholder="..." inputmode="numeric"></td>
                                <td><input id="d2" class="dec" placeholder="..." inputmode="numeric"></td>
                                <td><input id="d3" class="dec" placeholder="..." inputmode="numeric"></td>
                                <td><input id="d4" class="dec" placeholder="..." inputmode="numeric"></td>
                            </tr>

                            <tr>
                                <td colspan="4"><b>Subnet Mask</b></td>
                            </tr>
                        </table>

                        <button class="mini-btn" onclick="cekCIDRTable()">Cek Jawaban</button>
                        <button class="mini-btn reset-btn" onclick="resetCIDRTable()">Reset</button>
                    </div>
                </div>


                <div class="question-box">
                    <h4 class="conversion-title">Ayo Berlatih!</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>
                        <ol>
                            <li>Perhatikan alamat IP beserta nilai prefix (CIDR) pada setiap baris.</li>
                            <li>Tentukan jumlah bit <b>network</b> berdasarkan nilai prefix.</li>
                            <li>Ubah prefix tersebut menjadi subnet mask dalam bentuk <b>desimal bertitik</b>.</li>
                            <li>Tuliskan subnet mask yang sesuai pada kolom jawaban.</li>
                            <li>Klik tombol <b>"Cek Jawaban"</b> untuk memeriksa hasil.</li>
                        </ol>
                    </div>

                    <div class="inner-drill-box">
                        <!-- CONTOH -->
                        <div class="cidr-row">
                            <span class="cidr-ip">192.168.1.0/25</span>
                            <span class="mask-input">255.255.255.128</span>
                        </div>

                        <div id="cidrContainer"></div>
                    </div>

                    <div class="cek-wrapper">
                        <button class="btn-cek-modern" onclick="cekCIDR()">
                            Cek Jawaban
                        </button>

                        <button class="btn-reset-modern" onclick="resetCIDR()">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= NETWORK ADDRESS (AND) ================= -->
    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-diagram-3"></i>
                </div>
                Menentukan <i>Network Address</i> dengan Operasi AND
            </div>

            <div class="box-body">

                Untuk memahami bagaimana komputer menentukan network address secara sistematis,
                digunakan operasi logika <strong>AND</strong> antara IP Address dan subnet mask.

                <br>

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

                <div class="info-box">
                    <h4 class="info-title">Contoh Soal</h4>

                    Sebuah server <i>e-learning</i> SIMARI menggunakan alamat IP <strong>150.10.45.31/20</strong>. Tentukan
                    <i>network address</i> menggunakan <strong>operasi logika AND</strong>.

                    <br>
                    <div class="info-title">Penyelesaian</div>

                    <table class="ip-table">
                        <tr>
                            <td style="font-weight:700;">IP Address</td>
                            <td style="font-weight:700; color:red;">10010110</td>
                            <td style="font-weight:700; color:red;">00001010</td>
                            <td style="font-weight:700; color:red;">00101101</td>
                            <td style="font-weight:700; color:#2563eb;">00011111</td>
                        </tr>

                        <tr>
                            <td style="font-weight:700;">Subnet Mask</td>
                            <td style="font-weight:700; color:red;">11111111</td>
                            <td style="font-weight:700; color:red;">11111111</td>
                            <td style="font-weight:700;">
                                <span style="color:red;">1111</span><span style="color:#2563eb;">0000</span>
                            </td>
                            <td style="font-weight:700; color:#2563eb;">00000000</td>
                        </tr>

                        <tr>
                            <td style="font-weight:700;">AND</td>
                            <td style="font-weight:700; color:red;">10010110</td>
                            <td style="font-weight:700; color:red;">00001010</td>
                            <td style="font-weight:700; color:red;">00100000</td>
                            <td style="font-weight:700; color:#2563eb;">00000000</td>
                        </tr>

                        <tr>
                            <td style="font-weight:700;">Network Address</td>
                            <td>150</td>
                            <td>10</td>
                            <td>32</td>
                            <td>0</td>
                        </tr>
                    </table>

                    Sehingga diperoleh network address:
                    <div class="binary-text" style="margin-top:8px;">
                        150.10.32.0/20
                    </div>

                    <div class="mini-drill">
                        Saat melakukan praktikum jaringan komputer di kampus, mahasiswa menemukan <i>IP Address</i>
                        <strong>10.10.45.20/19</strong> pada salah satu perangkat. Tentukan <i>network address</i>
                        menggunakan <strong>operasi AND</strong>.

                        <br><br>
                        <table class="and-table">
                            <tr>
                                <th></th>
                                <th><strong>Oktet 1</strong></th>
                                <th><strong>Oktet 2</strong></th>
                                <th><strong>Oktet 3</strong></th>
                                <th><strong>Oktet 4</strong></th>
                            </tr>

                            <!-- IP -->
                            <tr>
                                <td><b>IP Address</b></td>
                                <td>00001010</td>
                                <td>00001010</td>
                                <td>00101101</td>
                                <td>00010100</td>
                            </tr>

                            <!-- SUBNET (INPUT USER) -->
                            <tr>
                                <td><b>Subnet Mask</b></td>
                                <td><input class="bin" id="mask1" placeholder="..." inputmode="numeric"></td>
                                <td><input class="bin" id="mask2" placeholder="..." inputmode="numeric"></td>
                                <td><input class="bin" id="mask3" placeholder="..." inputmode="numeric"></td>
                                <td><input class="bin" id="mask4" placeholder="..." inputmode="numeric"></td>
                            </tr>

                            <!-- AND -->
                            <tr>
                                <td><b>AND</b></td>
                                <td><input class="bin" id="and1" placeholder="..." inputmode="numeric"></td>
                                <td><input class="bin" id="and2" placeholder="..." inputmode="numeric"></td>
                                <td><input class="bin" id="and3" placeholder="..." inputmode="numeric"></td>
                                <td><input class="bin" id="and4" placeholder="..." inputmode="numeric"></td>
                            </tr>

                            <!-- NETWORK -->
                            <tr>
                                <td><b>Network Address</b></td>
                                <td><input class="dec" id="net1" placeholder="..." inputmode="numeric"></td>
                                <td><input class="dec" id="net2" placeholder="..." inputmode="numeric"></td>
                                <td><input class="dec" id="net3" placeholder="..." inputmode="numeric"></td>
                                <td><input class="dec" id="net4" placeholder="..." inputmode="numeric"></td>
                            </tr>
                        </table>

                        <br>
                        <button class="mini-btn" onclick="cekAND()">Cek Jawaban</button>

                        <button class="mini-btn reset-btn" onclick="resetAND()">Reset</button>
                        <p id="feedbackKomb" class="mini-feedback"></p>

                        <p id="feedbackAnd"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- aktivitas -->
    <div class="step-section" id="step3">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Aktivitas 2.6
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
        <a href="/bab2/subnet-mask" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab2/rangkuman-bab2" class="nav-btn nav-next" onclick="konfirmasiLanjut(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <script>

        let startTime = Date.now();
        let sudahLulusPemahaman = false;

        let latihan1Selesai = false; // tabel CIDR
        let latihan2Selesai = false; // ayo berlatih
        let latihan3Selesai = false; // AND
        let aktivitasSelesai = false;

        function sudahBacaMinimal() {
            let waktu = (Date.now() - startTime) / 1000;
            return waktu >= 100; // 3 menit
        }
        function cekCIDRTable() {

            const benarBiner = ["11111111", "11111111", "11111100", "00000000"];
            const benarDesimal = ["255", "255", "252", "0"];

            let benar = 0;
            let total = 8;

            // CEK BINER
            for (let i = 1; i <= 4; i++) {
                let el = document.getElementById("m" + i);
                let val = el.value.trim();

                if (val === benarBiner[i - 1]) {
                    el.style.borderColor = "#16a34a";
                    el.style.backgroundColor = "#dcfce7";
                    benar++;
                } else {
                    el.style.borderColor = "#dc2626";
                    el.style.backgroundColor = "#fee2e2";
                }
            }

            // CEK DESIMAL
            for (let i = 1; i <= 4; i++) {
                let el = document.getElementById("d" + i);
                let val = el.value.trim();

                if (val === benarDesimal[i - 1]) {
                    el.style.borderColor = "#16a34a";
                    el.style.backgroundColor = "#dcfce7";
                    benar++;
                } else {
                    el.style.borderColor = "#dc2626";
                    el.style.backgroundColor = "#fee2e2";
                }
            }

            if (benar === total) {

                latihan1Selesai = true;

                Swal.fire({

                    icon: "success",
                    title: "Semua Jawaban Benar!",
                    html: `
                                Subnet Mask yang benar adalah:<br><br>
                                <b>255.255.252.0 (/22)</b><br><br>
                                Apakah ingin mengerjakan kembali latihan ini?
                            `,
                    showCancelButton: true,
                    confirmButtonText: "Lanjut",
                    cancelButtonText: "Kerjakan Kembali",
                    allowOutsideClick: false
                }).then((result) => {

                    // jika pilih Kerjakan Kembali
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        resetCIDRTable();
                    }

                    // jika pilih Lanjut
                    if (result.isConfirmed) {
                        // tidak melakukan apa-apa (tetap di halaman)
                    }

                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Masih Salah",
                    text: `Jawaban benar ${benar} dari ${total}`,
                });
            }
        }

        function resetCIDRTable() {

            Swal.fire({
                title: "Reset Jawaban?",
                text: "Semua jawaban pada latihan ini akan dihapus.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#b91c1c",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, reset",
                cancelButtonText: "Batal"

            }).then((result) => {

                if (result.isConfirmed) {

                    for (let i = 1; i <= 4; i++) {

                        let m = document.getElementById("m" + i);
                        let d = document.getElementById("d" + i);

                        m.value = "";
                        d.value = "";

                        m.style.borderColor = "#d6c3b2";
                        d.style.borderColor = "#d6c3b2";

                        m.style.backgroundColor = "white";
                        d.style.backgroundColor = "white";
                    }

                    Swal.fire({
                        icon: "success",
                        title: "Jawaban Direset",
                        text: "Silakan kerjakan kembali latihan.",
                        timer: 1200,
                        showConfirmButton: false
                    });

                }

            });

        }

        function cekAND() {

            const benarMask = ["11111111", "11111111", "11100000", "00000000"];
            const benarAND = ["00001010", "00001010", "00100000", "00000000"];
            const benarNet = ["10", "10", "32", "0"];

            let benar = 0;
            let total = 12; // 4 mask + 4 and + 4 net

            // CEK MASK
            for (let i = 1; i <= 4; i++) {
                let el = document.getElementById("mask" + i);
                let val = el.value.trim();

                if (val === benarMask[i - 1]) {
                    el.style.borderColor = "#16a34a";
                    benar++;
                } else {
                    el.style.borderColor = "red";
                }
            }

            // CEK AND
            for (let i = 1; i <= 4; i++) {
                let el = document.getElementById("and" + i);
                let val = el.value.trim();

                if (val === benarAND[i - 1]) {
                    el.style.borderColor = "green";
                    benar++;
                } else {
                    el.style.borderColor = "red";
                }
            }

            // CEK NETWORK
            for (let i = 1; i <= 4; i++) {
                let el = document.getElementById("net" + i);
                let val = el.value.trim();

                if (val === benarNet[i - 1]) {
                    el.style.borderColor = "green";
                    benar++;
                } else {
                    el.style.borderColor = "red";
                }
            }

            // SWEET ALERT
            if (benar === total) {

                latihan2Selesai = true;

                Swal.fire({
                    icon: "success",
                    title: "Semua Jawaban Benar!",
                    html: `
                                Network Address yang benar adalah:<br><br>

                                <b>10.10.32.0/19</b><br><br>

                                Apakah ingin mengerjakan kembali latihan ini?
                            `,
                    showCancelButton: true,
                    confirmButtonText: "Lanjut",
                    cancelButtonText: "Kerjakan Kembali",
                    allowOutsideClick: false
                }).then((result) => {

                    // jika pilih Kerjakan Kembali
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        resetAND();
                    }

                    // jika pilih Lanjut
                    if (result.isConfirmed) {
                        // tetap di halaman saja (tidak pindah step)
                    }

                });
            } else {

                Swal.fire({
                    icon: "error",
                    title: "Masih Ada yang Salah",
                    text: `Jawaban benar ${benar} dari ${total}. Coba lagi ya!`,
                });

            }
        }

        function resetAND() {

            Swal.fire({
                title: "Reset Jawaban?",
                text: "Semua jawaban pada latihan ini akan dihapus.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#b91c1c",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, reset",
                cancelButtonText: "Batal"

            }).then((result) => {

                if (result.isConfirmed) {

                    // kosongkan semua input di step 2
                    const inputs = document.querySelectorAll('#step2 input');

                    inputs.forEach(input => {
                        input.value = "";
                        input.style.borderColor = "#d6c3b2";
                        input.style.backgroundColor = "white";
                    });

                    Swal.fire({
                        icon: "success",
                        title: "Jawaban Direset",
                        text: "Silakan kerjakan kembali latihan.",
                        timer: 1200,
                        showConfirmButton: false
                    });

                }

            });

        }

        // ayo berlatih
        const CIDR_STORAGE_KEY = "cidr_jawaban";

        function ambilJawabanCIDR() {
            return JSON.parse(sessionStorage.getItem(CIDR_STORAGE_KEY)) || {};
        }

        function simpanJawabanCIDR(idSoal, value) {
            const data = ambilJawabanCIDR();
            data[idSoal] = value;
            sessionStorage.setItem(CIDR_STORAGE_KEY, JSON.stringify(data));
        }

        function hapusJawabanCIDR() {
            sessionStorage.removeItem(CIDR_STORAGE_KEY);
        }

        fetch("/cidr/soal")
            .then(res => res.json())
            .then(data => {

                const container = document.getElementById("cidrContainer");
                const jawabanTersimpan = ambilJawabanCIDR();

                container.innerHTML = "";

                data.forEach(item => {
                    const savedValue = jawabanTersimpan[item.id_soal] || "";

                    container.innerHTML += `
                                <div class="cidr-row">
                                    <span class="cidr-ip">${item.soal}</span>

                                    <input
                                        class="mask-input"
                                        data-id="${item.id_soal}"
                                        placeholder="..."
                                        value="${savedValue}"
                                        inputmode="numeric"
                                    >
                                </div>
                            `;
                });

                const inputs = document.querySelectorAll('#cidrContainer input.mask-input');

                inputs.forEach(input => {

                    input.addEventListener("input", function () {

                        // hanya angka dan titik
                        this.value = this.value.replace(/[^0-9.]/g, '');

                        simpanJawabanCIDR(this.dataset.id, this.value);
                    });

                });
            });

        // cek jawaban
        function cekCIDR() {

            const inputs = document.querySelectorAll(
                '#cidrContainer input.mask-input'
            );

            let total = 0;
            let benar = 0;
            let adaKosong = false;

            const promises = [];

            inputs.forEach(input => {

                const id = input.dataset.id;
                const jawaban = input.value.trim();

                total++;

                input.classList.remove("correct", "wrong");

                if (jawaban === "") {
                    input.classList.add("wrong");
                    adaKosong = true;
                    return;
                }

                const request = fetch("/cidr/cek", {
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

                if (total === 0) {
                    Swal.fire({
                        icon: "info",
                        title: "Belum Ada Soal",
                        text: "Soal belum dimuat.",
                        confirmButtonColor: "#89471e"
                    });
                    return;
                }

                if (adaKosong) {
                    Swal.fire({
                        icon: "warning",
                        title: "Masih Ada Jawaban Kosong",
                        text: `Jawaban benar: ${benar} dari ${total}. Coba periksa kembali.`,
                    });
                    return;
                }

                if (benar === total) {
                    latihan3Selesai = true;
                    Swal.fire({
                        icon: "success",
                        title: "Mantap!",
                        text: "Semua jawaban CIDR benar. Apakah ingin mengerjakan kembali latihan ini?",
                        showCancelButton: true,
                        confirmButtonText: "Lanjut",
                        cancelButtonText: "Kerjakan Kembali",
                        reverseButtons: true
                    }).then((result) => {

                        if (result.dismiss === Swal.DismissReason.cancel) {
                            const inputs = document.querySelectorAll('#cidrContainer input.mask-input');

                            inputs.forEach(input => {
                                input.value = "";
                                input.classList.remove("correct", "wrong");
                            });

                            hapusJawabanCIDR();
                        }

                        if (result.isConfirmed) {
                            // tetap di halaman, cukup tutup alert
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
                return;
            }

            // =====================
            // 2. CEK PEMAHAMAN
            // =====================
            if (!sudahLulusPemahaman) {

                Swal.fire({
                    title: "Cek Pemahaman",
                    html: `
                            <div style="text-align:center; margin-bottom:14px; font-size:16px;">
                                CIDR /26 berarti:
                            </div>

                            <div class="swal-radio-group">

                                <label class="swal-radio-option">
                                    <input type="radio" name="jawaban" value="a">
                                    26 bit host
                                </label>

                                <label class="swal-radio-option">
                                    <input type="radio" name="jawaban" value="b">
                                    26 bit network
                                </label>

                                <label class="swal-radio-option">
                                    <input type="radio" name="jawaban" value="c">
                                    6 bit network
                                </label>

                                <label class="swal-radio-option">
                                    <input type="radio" name="jawaban" value="d">
                                    32 bit host
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
                                text: "/26 berarti 26 bit untuk network"
                            });

                        } else {

                            Swal.fire({
                                icon: "error",
                                title: "Salah",
                                text: "Coba pahami kembali konsep CIDR."
                            });

                        }

                    }

                });

                return;
            }

            if (!latihan1Selesai || !latihan2Selesai || !latihan3Selesai || !aktivitasSelesai) {

                let belum = "";

                if (!latihan1Selesai) {
                    belum += "<b>Latihan Subnet Mask (Tabel)</b><br>";
                }

                if (!latihan3Selesai) {
                    belum += "<b>Latihan AND (Network Address)</b><br>";
                }

                if (!latihan2Selesai) {
                    belum += "<b>Ayo Berlatih (CIDR)</b><br>";
                }

                if (!aktivitasSelesai) {
                    belum += "<b>Aktivitas</b><br>";
                }

                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                                <div style="text-align:center; line-height:1.6;">
                                    Tapi, kamu belum menyelesaikan:<br><br>
                                    ${belum}
                                    <br>
                                    Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                                </div>
                            `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu",
                    reverseButtons: true,
                    allowOutsideClick: false
                }).then((result) => {

                    if (result.dismiss === Swal.DismissReason.cancel) {

                        if (!latihan1Selesai) {
                            document.querySelector(".mini-drill").scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                        else if (!latihan2Selesai) {
                            document.querySelector("#cidrContainer").scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                        else if (!latihan3Selesai) {
                            document.querySelector("#step2").scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                        else if (!aktivitasSelesai) {
                            document.querySelector("#quizContainer").scrollIntoView({
                                behavior: "smooth"
                            });
                        }

                    }

                    if (result.isConfirmed) {
                        window.location.href = "/bab2/rangkuman-bab2";
                    }

                });

                return;
            }

            // =====================
            // 4. KIRIM PROGRES
            // =====================
            const bab = encodeURIComponent("IP Addressing");
            const subbab = encodeURIComponent("CIDR");

            fetch(`/progres/selesai/${bab}/${subbab}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(() => {
                window.location.href = "/bab2/rangkuman-bab2";
            });
        }

        // aktivitas
        let soal = [];
        let indexSoal = 0;
        let statusTerkunci = [];

        fetch("/aktivitas/cidr/soal")
            .then(res => res.json())
            .then(data => {
                soal = data;
                statusTerkunci = Array(soal.length).fill(false);
                renderSoal();
            });

        const quizContainer = document.getElementById("quizContainer");
        const feedback = document.getElementById("quizFeedback");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");

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

            fetch("/aktivitas/cidr/cek", {
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

                        document
                            .querySelector("#quizContainer")
                            .querySelectorAll("input")
                            .forEach(el => {
                                el.disabled = true;
                            });

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

            // kalau progress belum menyelesaikan latihan CIDR
            if (!latihan3Selesai) {

                Swal.fire({
                    icon: "warning",
                    title: "Hampir Selesai!",
                    html: `
                                Semua soal aktivitas telah dijawab dengan benar.<br><br>
                                Namun kamu <b>belum mengerjakan bagian "Ayo Berlatih"</b>.<br><br>
                                Latihan tersebut membantu memperkuat pemahaman konsep
                                sebelum melanjutkan ke materi berikutnya.
                            `,
                    confirmButtonText: "Kembali ke Latihan",
                    cancelButtonText: "Tetap Lanjut",
                    showCancelButton: true,
                    allowOutsideClick: false
                }).then((result) => {

                    if (result.isConfirmed) {

                        document.querySelector('#cidrContainer')
                            .scrollIntoView({
                                behavior: 'smooth'
                            });

                    } else {

                        window.location.href = "/bab2/rangkuman-bab2";

                    }

                });

                return;
            }

            // kalau sudah selesai
            Swal.fire({
                icon: "success",
                title: "Aktivitas Selesai",
                text: "Semua soal telah dijawab dengan benar.",
                confirmButtonText: "Lanjut",
                allowOutsideClick: false
            }).then(() => {

                aktivitasSelesai = true;

                document.querySelector(".nav-next").click();

            });
        }

        // renderSoal();

        function resetCIDR() {

            Swal.fire({
                title: "Reset Jawaban?",
                text: "Semua jawaban CIDR yang sudah diisi akan dihapus.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#b91c1c",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, Reset",
                cancelButtonText: "Batal",
            }).then((result) => {

                if (result.isConfirmed) {

                    const inputs = document.querySelectorAll(
                        '#cidrContainer input.mask-input'
                    );

                    inputs.forEach(input => {
                        input.value = "";
                        input.classList.remove("correct", "wrong");
                    });

                    hapusJawabanCIDR();

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Jawaban berhasil direset.",
                    });
                }

            });
        }

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

        window.addEventListener("DOMContentLoaded", async () => {

            const res = await fetch(`/progres/cek/${encodeURIComponent("IP Addressing")}/${encodeURIComponent("CIDR")}`);
            const data = await res.json();

            if (data.selesai) {

                console.log("SUDAH PERNAH SELESAI CIDR");

                // skip semua validasi
                sudahLulusPemahaman = true;

                latihan1Selesai = true;
                latihan2Selesai = true;
                latihan3Selesai = true;
                aktivitasSelesai = true;

                // langsung bisa lanjut tanpa tunggu waktu
                startTime = 0;
            }

        });

        document.querySelectorAll(".bin, .dec").forEach(input => {

            input.addEventListener("input", function () {

                this.value = this.value.replace(/\D/g, '');

            });

        });
    </script>

@endsection