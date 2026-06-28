@extends('mahasiswa.mahasiswa')

@section('title', 'Subbab - VLSM')

<title>BAB 3 : VLSM</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

    <style>
        /* ===== JUDUL ===== */
        .subbab-title {
            font-weight: 800;
            font-size: 28px;
            color: #89471e;
            margin-bottom: 20px;
        }

        /* ===== CARD ===== */
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
            color: #1f2937;
            text-align: justify;
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
        }

        /* INFO BOX */
        .info-box {
            background: #fef9f6;
            border-left: 5px solid #89471e;
            padding: 16px 20px;
            margin: 18px 0;
            border-radius: 6px;
        }

        .info-title {
            font-weight: 700;
            color: #89471e;
            margin-bottom: 10px;
        }

        /* TABLE */
        .subnet-table {
            border-collapse: collapse;
            margin: 10px auto;
            width: 60%;
        }

        .subnet-table th,
        .subnet-table td {
            border: 1px solid #d6c3b2;
            padding: 8px;
            text-align: center;
        }

        .subnet-table th {
            background: #f9f5f2;
        }

        /* FORMULA */
        .formula {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            max-width: 350px;
            background: #f3f4f6;
            border: 1px solid #6b7280;
            border-radius: 8px;
            padding: 6px 10px;
            font-weight: 700;
            color: #7c2d12;
            font-size: 16px;
            text-align: center;
        }

        /* STEP */
        .step-box {
            background: #fffaf5;
            border: 1px solid #f3d5b5;
            border-radius: 8px;
            padding: 14px;
            margin: 14px 0;
        }

        .step-title {
            font-weight: 700;
            color: #92400e;
        }

        /* TITLE */
        .section-title {
            font-weight: 800;
            color: #7c2d12;
            border-left: 5px solid #89471e;
            padding-left: 10px;
            margin: 10px 0;
        }

        /* IP */
        .ip-highlight {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 700;
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
            /* coklat muda soft */
            background: #fffaf5;
            /* cream biar hangat */
            color: #7c3f1d;
            /* coklat tua */
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

        .vlsm-steps {
            margin-left: 20px;
            padding-left: 10px;
            line-height: 1.8;
        }

        .vlsm-steps li {
            margin-bottom: 6px;
        }

        .vlsm-box {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            padding: 12px 16px;
            margin: 16px 0;
            border-radius: 8px;
        }

        /* biar judulnya lebih nyatu */
        .vlsm-box .info-title {
            color: #92400e;
            margin-bottom: 6px;
        }

        /* list lebih rapi */
        .vlsm-steps {
            margin-left: 18px;
        }

        .room-section {
            margin: 16px 0;
        }

        .room-title {
            font-weight: 700;
            color: #92400e;
            margin-bottom: 6px;
        }

        .table-room {
            width: 60%;
            margin-left: 0;
            /* biar nempel kiri */
        }

        .room-detail p {
            margin: 6px 0;
        }

        .badge {
            background: #b45309;
            color: #fff;
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 13px;
        }

        .highlight {
            background: #fef3c7;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
        }

        .note {
            font-style: italic;
            color: #6b7280;
        }

        .result-title {
            font-weight: 700;
            margin-top: 10px;
            color: #92400e;
        }

        .room-box {
            background: #fffaf5;
            border: 1px solid #f3d5b5;

            border-radius: 10px;
            padding: 16px;
            margin: 24px 0;
            /* ⬅️ INI YANG BIKIN GA MEPET */
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

        .prev-btn:disabled,
        .next-btn:disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
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
        }

        .option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
        }

        /* ================= INPUT + BUTTON ================= */
        .input-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 4px 0 10px 0;
        }

        .input-row input {
            flex: unset;
            width: 220px;
            /* ⬅️ ini kuncinya */

            padding: 6px 8px;
            border: 1px solid #d6c3b2;
            border-radius: 6px;
            font-size: 14px;
        }

        /* ================= BUTTON CEK ================= */
        .input-row button,
        .formula button {
            background: #b45309;
            color: #fff;
            border: none;
            padding: 6px 12px;
            font-size: 13px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .input-row button:hover,
        .formula button:hover {
            background: #92400e;
        }

        /* ================= FORMULA ================= */
        .formula {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
            margin-top: 6px;
        }

        .formula input {
            width: 70px;
            padding: 5px;
            border: 1px solid #d6c3b2;
            border-radius: 6px;
            text-align: center;
        }

        /* ================= TABLE INPUT ================= */
        .table-room input {
            width: 100%;
            padding: 5px;
            border: 1px solid #d6c3b2;
            border-radius: 6px;
            font-size: 13px;
        }

        /* ================= ROOM SPACING ================= */
        .room-box {
            margin-bottom: 28px;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {

            .input-row {
                flex-direction: column;
                align-items: stretch;
            }

            .input-row button {
                width: 100%;
            }

            .formula {
                flex-direction: column;
                align-items: flex-start;
            }

            .formula input {
                width: 100%;
            }

            .table-room {
                width: 100%;
            }
        }

        .room-selector {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
            flex-wrap: wrap;
        }

        .room-btn {
            padding: 8px 14px;
            border: 1px solid #d6c3b2;
            background: #fffaf5;
            color: #7c2d12;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .room-btn:hover {
            background: #fdf3ea;
        }

        .room-btn.active {
            background: #b45309;
            color: #fff;
        }

        /* SEMBUNYIKAN SEMUA ROOM */
        .room-content {
            display: none;
        }

        /* YANG AKTIF */
        .room-content.active {
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

        .scratch-box {
            border: 1px solid #d6c3b2;
            border-radius: 10px;
            overflow: hidden;
            background: #fffaf5;
            padding: 10px;
        }

        .scratch-header {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }

        .scratch-title {
            font-weight: 700;
            margin-bottom: 8px;
            color: #92400e;
            text-align: center;
        }

        .scratch-box iframe {
            width: 100%;
            height: 420px;
            border: none;
            border-radius: 6px;
        }

        /* ===== TOMBOL CEK MODERN ===== */
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
            justify-content: center;
            margin-top: 26px;
            margin-left: 80px;

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

        /* ===== PLACEHOLDER STYLE ===== */
        .subnet-table input {
            text-align: center;
            font-weight: 500;
        }

        /* placeholder */
        .subnet-table input::placeholder {
            text-align: center;
            color: #000000;
            font-size: 13px;
        }

        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
            margin-top: 18px;
        }

        input.benar {
            border: 2px solid #16a34a;
            background: #ecfdf5;
        }

        input.salah {
            border: 2px solid #dc2626;
            background: #fef2f2;
        }

        .swal-question {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 16px;
            text-align: center;
        }

        .swal-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: left;
        }

        .swal-option {
            border: 1.5px solid #d6c3b2;
            border-radius: 8px;
            padding: 10px 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            transition: 0.2s ease;
            font-size: 14px;
        }

        .swal-option:hover {
            background: #fdf6f1;
        }

        .swal-option input {
            display: none;
        }

        .swal-option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
        }

        @media (max-width: 768px) {

            /* tabel full lebar */
            .subnet-table {
                width: 100% !important;
                table-layout: fixed;
            }

            /* semua cell */
            .subnet-table th,
            .subnet-table td {
                font-size: 11px;
                padding: 4px;
                white-space: normal;
                word-break: break-word;
            }

            /* input diperkecil */
            .subnet-table input {
                width: 100% !important;
                max-width: 100%;
                box-sizing: border-box;
                font-size: 11px;
                padding: 4px;
            }

            /* kolom pertama (Bagian) jangan terlalu makan tempat */
            .subnet-table td:first-child,
            .subnet-table th:first-child {
                width: 70px;
            }

            .step-pagination {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 5px;
                margin-top: 20px;
                flex-wrap: nowrap;
                overflow-x: auto;
                padding: 0 6px;
                scrollbar-width: none;
            }

            .step-pagination::-webkit-scrollbar {
                display: none;
            }

            .page-btn {
                min-width: 32px;
                width: 32px;
                height: 32px;
                font-size: 12px;
                padding: 0;
                border-radius: 8px;
                flex-shrink: 0;
            }

            .nav-arrow {
                min-width: 28px;
                width: 28px;
                height: 32px;
                font-size: 14px;
            }

        }

        /* ===== WRAPPER ===== */
        .vlsm-table-wrapper {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        /* ===== TABLE ===== */
        .vlsm-table {
            border-collapse: collapse;
            font-size: 14px;
            min-width: 320px;
        }

        /* ===== CELL ===== */
        .vlsm-table th,
        .vlsm-table td {
            border: 1px solid #444;
            padding: 8px 16px;
            text-align: center;
        }

        /* ===== HEADER ===== */
        .vlsm-table th {
            background: #d8c7a8;
            font-weight: 700;
        }

        /* ===== BODY ===== */
        .vlsm-table td {
            background: #f8f8f8;
        }

        .vlsm-caption {
            text-align: center;
            font-size: 13px;
            color: #6b7280;
            margin-top: 8px;
        }

        .canvas-info-btn {
            border: none;
            background: #f3e9dc;
            color: #89471e;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.2s ease;
            font-size: 14px;
        }

        .canvas-info-btn:hover {
            background: #89471e;
            color: #ffffff;
        }

        .custom-modal {
            display: none;
            position: fixed;
            z-index: 99999;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            justify-content: center;
            align-items: center;
        }

        .custom-modal-content {
            width: 90%;
            max-width: 650px;
            max-height: 90vh;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            animation: fadeIn 0.2s ease;
        }

        /* HEADER */
        .custom-modal-header {
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            background: #ffffff;
        }

        .custom-modal-header h3 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #111827;
        }

        /* CLOSE */
        .close-modal {
            border: none;
            background: none;
            font-size: 30px;
            color: #6b7280;
            cursor: pointer;
        }

        .custom-modal-body {
            padding: 24px;
            overflow-y: auto;
        }

        .guide-image {
            width: 85%;
            max-width: 320px;
            display: block;
            margin: 0 auto 20px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .guide-caption {
            margin-top: 16px;
        }

        .guide-caption h4 {
            margin-bottom: 12px;
            font-size: 18px;
            font-weight: 700;
            color: #111827;
        }

        .guide-caption ol {
            padding-left: 22px;
            margin: 0;
        }

        .guide-caption li {
            margin-bottom: 10px;
            line-height: 1.7;
            color: #374151;
            font-size: 15px;
        }

        .guide-caption b {
            color: #111827;
        }

        /* ANIMASI */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-diagram-3"></i>
                </div>
                <i>VLSM (Variable Length Subnet Mask)</i>
            </div>

            <div class="box-body">

                Pada pembahasan sebelumnya, <i>subnetting</i> dilakukan menggunakan satu <i>Subnet Mask</i> yang sama untuk
                semua subnet. Teknik ini dikenal sebagai <strong><i>Fixed Length Subnet Mask (FLSM)</i></strong> atau
                <strong><i>Subnetting</i> klasik</strong>. Metode ini mudah digunakan karena setiap subnet memiliki jumlah
                host yang sama, namun kurang efisien karena kebutuhan host pada jaringan nyata biasanya berbeda-beda,
                misalnya 60, 30, 12, dan 6 host. Jika menggunakan <i>FLSM</i>, semua subnet harus memiliki kapasitas yang
                sama sehingga banyak alamat IP terbuang.

                <br><br>
                Untuk mengatasi hal tersebut digunakan <strong><i>VLSM (Variable Length Subnet Mask)</i></strong>, yaitu
                teknik yang memungkinkan setiap subnet memiliki ukuran berbeda sesuai kebutuhan. Dengan demikian, penggunaan
                alamat IP menjadi lebih efisien dan optimal.

                <br><br>
                <div class="vlsm-box">
                    <div class="info-title">Langkah-langkah VLSM</div>

                    <p>
                        Langkah-langkah dalam melakukan VLSM adalah sebagai berikut:
                    </p>

                    <ol class="vlsm-steps">
                        <li>Mengurutkan kebutuhan host dari yang terbesar ke yang terkecil</li>
                        <li>Menentukan jumlah bit host (h) untuk setiap kebutuhan</li>
                        <li>Menentukan prefix atau subnet mask masing-masing</li>
                        <li>Mengalokasikan alamat IP dimulai dari kebutuhan terbesar</li>
                        <li>Mengulangi hingga semua subnet terpenuhi</li>
                    </ol>
                </div>

                Berikut tabel sebagai acuan dalam menentukan ukuran subnet sesuai kebutuhan jumlah
                host pada metode <strong>VLSM</strong>.

                <div class="vlsm-table-wrapper">

                    <!-- TABEL KIRI -->
                    <table class="vlsm-table">
                        <thead>
                            <tr>
                                <th>Prefix</th>
                                <th>Jml bit host</th>
                                <th>Jml alamat <i>IP</i></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>/8</td>
                                <td>2<sup>24</sup></td>
                                <td>16,777,216</td>
                            </tr>

                            <tr>
                                <td>/9</td>
                                <td>2<sup>23</sup></td>
                                <td>8,388,608</td>
                            </tr>

                            <tr>
                                <td>/10</td>
                                <td>2<sup>22</sup></td>
                                <td>4,194,304</td>
                            </tr>

                            <tr>
                                <td>/11</td>
                                <td>2<sup>21</sup></td>
                                <td>2,097,152</td>
                            </tr>

                            <tr>
                                <td>/12</td>
                                <td>2<sup>20</sup></td>
                                <td>1,048,576</td>
                            </tr>

                            <tr>
                                <td>/13</td>
                                <td>2<sup>19</sup></td>
                                <td>524,288</td>
                            </tr>

                            <tr>
                                <td>/14</td>
                                <td>2<sup>18</sup></td>
                                <td>262,144</td>
                            </tr>

                            <tr>
                                <td>/15</td>
                                <td>2<sup>17</sup></td>
                                <td>131,072</td>
                            </tr>

                            <tr>
                                <td>/16</td>
                                <td>2<sup>16</sup></td>
                                <td>65,536</td>
                            </tr>

                            <tr>
                                <td>/17</td>
                                <td>2<sup>15</sup></td>
                                <td>32,768</td>
                            </tr>

                            <tr>
                                <td>/18</td>
                                <td>2<sup>14</sup></td>
                                <td>16,384</td>
                            </tr>

                            <tr>
                                <td>/19</td>
                                <td>2<sup>13</sup></td>
                                <td>8,192</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- TABEL KANAN -->
                    <table class="vlsm-table">
                        <thead>
                            <tr>
                                <th>Prefix</th>
                                <th>Jml bit host</th>
                                <th>Jml alamat <i>IP</i></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>/20</td>
                                <td>2<sup>12</sup></td>
                                <td>4,096</td>
                            </tr>

                            <tr>
                                <td>/21</td>
                                <td>2<sup>11</sup></td>
                                <td>2,048</td>
                            </tr>

                            <tr>
                                <td>/22</td>
                                <td>2<sup>10</sup></td>
                                <td>1,024</td>
                            </tr>

                            <tr>
                                <td>/23</td>
                                <td>2<sup>9</sup></td>
                                <td>512</td>
                            </tr>

                            <tr>
                                <td>/24</td>
                                <td>2<sup>8</sup></td>
                                <td>256</td>
                            </tr>

                            <tr>
                                <td>/25</td>
                                <td>2<sup>7</sup></td>
                                <td>128</td>
                            </tr>

                            <tr>
                                <td>/26</td>
                                <td>2<sup>6</sup></td>
                                <td>64</td>
                            </tr>

                            <tr>
                                <td>/27</td>
                                <td>2<sup>5</sup></td>
                                <td>32</td>
                            </tr>

                            <tr>
                                <td>/28</td>
                                <td>2<sup>4</sup></td>
                                <td>16</td>
                            </tr>

                            <tr>
                                <td>/29</td>
                                <td>2<sup>3</sup></td>
                                <td>8</td>
                            </tr>

                            <tr>
                                <td>/30</td>
                                <td>2<sup>2</sup></td>
                                <td>4</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="vlsm-caption">
                        Tabel 3.5 Acuan prefix, bit host, dan jumlah alamat IP pada VLSM
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-title">Contoh Soal</div>

                    Sebuah sekolah memiliki jaringan dengan alamat <strong>222.168.0.0/24</strong> yang akan dibagi untuk
                    beberapa laboratorium komputer dengan jumlah perangkat berbeda-beda, yaitu:

                    <ul>
                        <li>Laboratorium 1 : 5 PC</li>
                        <li>Laboratorium 2 : 15 PC</li>
                        <li>Laboratorium 3 : 25 PC</li>
                        <li>Laboratorium 4 : 35 PC</li>
                    </ul>

                    <div class="info-title">Penyelesaian</div>


                    <div class="step-title">1. Urutkan kebutuhan host dari yang terbesar ke yang terkecil</div>

                    <table class="subnet-table">
                        <tr>
                            <th>Ruang</th>
                            <th>PC</th>
                        </tr>
                        <tr>
                            <td>Laboratorium 4</td>
                            <td>35</td>
                        </tr>
                        <tr>
                            <td>Laboratorium 3</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>Laboratorium 2</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <td>Laboratorium 1</td>
                            <td>5</td>
                        </tr>
                    </table>

                    <br>
                    <div class="step-title">2. Tentukan kebutuhan bit host</div>

                    Menentukan jumlah bit host dilakukan menggunakan rumus:<br>
                    <div class="formula">
                        Jumlah Host = 2<sup>h</sup> − 2
                    </div>

                    <br>
                    Nilai h ditentukan dengan mencari nilai terkecil yang memenuhi kebutuhan host pada setiap bagian
                    jaringan. Lihat tabel 3.5 untuk melihat nilai prefix.

                    <table class="subnet-table">
                        <tr>
                            <th>Laboratorium</th>
                            <th>Kebutuhan Host</th>
                            <th>Percobaan h</th>
                            <th>Perhitungan host<br>(2<sup>h</sup> - 2)</th>
                            <th>Host tersedia</th>
                            <th>Prefix</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Laboratorium 4</td>
                            <td rowspan="2">35</td>
                            <td>h = 5</td>
                            <td>2<sup>5</sup> − 2 = 30</td>
                            <td style="color:#dc2626; font-weight:600;">
                                <i class="bi bi-x-circle-fill"></i> Tidak cukup
                            </td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>h = 6</td>
                            <td>2<sup>6</sup> − 2 = 62</td>
                            <td style="color:#16a34a; font-weight:600;">
                                <i class="bi bi-check-circle-fill"></i> Cukup
                            </td>
                            <td>/26</td>
                        </tr>

                        <tr>
                            <td rowspan="2">Laboratorium 3</td>
                            <td rowspan="2">25</td>
                            <td>h = 4</td>
                            <td>2<sup>4</sup> − 2 = 14</td>
                            <td style="color:#dc2626; font-weight:600;">
                                <i class="bi bi-x-circle-fill"></i> Tidak cukup
                            </td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>h = 5</td>
                            <td>2<sup>5</sup> − 2 = 30</td>
                            <td style="color:#16a34a; font-weight:600;">
                                <i class="bi bi-check-circle-fill"></i> Cukup
                            </td>
                            <td>/27</td>
                        </tr>

                        <tr>
                            <td rowspan="2">Laboratorium 2</td>
                            <td rowspan="2">15</td>
                            <td>h = 4</td>
                            <td>2<sup>4</sup> − 2 = 14</td>
                            <td style="color:#dc2626; font-weight:600;">
                                <i class="bi bi-x-circle-fill"></i> Tidak cukup
                            </td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>h = 5</td>
                            <td>2<sup>5</sup> − 2 = 30</td>
                            <td style="color:#16a34a; font-weight:600;">
                                <i class="bi bi-check-circle-fill"></i> Cukup
                            </td>
                            <td>/27</td>
                        </tr>

                        <tr>
                            <td rowspan="2">Laboratorium 1</td>
                            <td rowspan="2">5</td>
                            <td>h = 2</td>
                            <td>2<sup>2</sup> − 2 = 2</td>
                            <td style="color:#dc2626; font-weight:600;">
                                <i class="bi bi-x-circle-fill"></i> Tidak cukup
                            </td>
                            <td>-</td>
                        </tr>

                        <tr>
                            <td>h = 3</td>
                            <td>2<sup>3</sup> − 2 = 6</td>
                            <td style="color:#16a34a; font-weight:600;">
                                <i class="bi bi-check-circle-fill"></i> Cukup
                            </td>
                            <td>/29</td>
                        </tr>
                    </table>

                    <br>
                    <div class="step-title">3. Menentukan Subnet</div>

                    Setelah diperoleh <i>prefix</i> masing-masing <i>subnet</i>, langkah selanjutnya adalah menentukan
                    <strong><i>network address</i></strong>, <strong><i>host</i></strong>, dan <strong><i>broadcast
                            address</i></strong>. Dengan rumus blok <i>subnet</i> sebagai berikut:

                    <br>
                    <div class="formula">
                        256 – Nilai Oktet Terakhir Subnet Mask
                    </div>
                    <br>
                    <div class="room-box">
                        <div class="room-title">a. Laboratorium 4 (35 PC)</div>

                        <div class="room-detail">
                            <p><b>Prefix</b> : <span class="badge">/26</span></p>
                            <p><b>Subnet Mask</b> : 255.255.255.192</p>

                            <p><b>Blok Subnet</b> :</p>
                            <div class="formula">256 − 192 = 64</div>

                        </div>

                        <div class="result-title">Hasil Perhitungan</div>

                        <table class="subnet-table table-room">
                            <tr>
                                <th>Network</th>
                                <th>Host</th>
                                <th>Broadcast</th>
                            </tr>
                            <tr>
                                <td>222.168.0.0</td>
                                <td>222.168.0.1 – 222.168.0.62</td>
                                <td>222.168.0.63</td>
                            </tr>
                        </table>
                    </div>

                    <div class="room-box">
                        <div class="room-title">b. Laboratorium 3 (25 PC)</div>

                        <div class="room-detail">
                            <p><b>Prefix</b> : <span class="badge">/27</span></p>
                            <p><b>Subnet Mask</b> : 255.255.255.224</p>

                            <p><b>Blok Subnet</b> :</p>
                            <div class="formula">256 − 224 = 32</div>

                        </div>

                        <div class="result-title">Hasil Perhitungan</div>

                        <table class="subnet-table table-room">
                            <tr>
                                <th>Network</th>
                                <th>Host</th>
                                <th>Broadcast</th>
                            </tr>
                            <tr>
                                <td>222.168.0.64</td>
                                <td>222.168.0.65 – 222.168.0.94</td>
                                <td>222.168.0.95</td>
                            </tr>
                        </table>
                    </div>

                    <div class="room-box">
                        <div class="room-title">c. Laboratorium 2 (15 PC)</div>

                        <div class="room-detail">
                            <p><b>Prefix</b> : <span class="badge">/27</span></p>
                            <p><b>Subnet Mask</b> : 255.255.255.224</p>

                            <p><b>Blok Subnet</b> :</p>
                            <div class="formula">256 − 224 = 32</div>

                        </div>

                        <div class="result-title">Hasil Perhitungan</div>

                        <table class="subnet-table table-room">
                            <tr>
                                <th>Network</th>
                                <th>Host</th>
                                <th>Broadcast</th>
                            </tr>
                            <tr>
                                <td>222.168.0.96</td>
                                <td>222.168.0.97 – 222.168.0.126</td>
                                <td>222.168.0.127</td>
                            </tr>
                        </table>
                    </div>

                    <div class="room-box">
                        <div class="room-title">d. Laboratorium 1 (5 PC)</div>

                        <div class="room-detail">
                            <p><b>Prefix</b> : <span class="badge">/29</span></p>
                            <p><b>Subnet Mask</b> : 255.255.255.248</p>

                            <p><b>Blok Subnet</b> :</p>
                            <div class="formula">256 − 248 = 8</div>

                        </div>

                        <div class="result-title">Hasil Perhitungan</div>

                        <table class="subnet-table table-room">
                            <tr>
                                <th>Network</th>
                                <th>Host</th>
                                <th>Broadcast</th>
                            </tr>
                            <tr>
                                <td>222.168.0.128</td>
                                <td>222.168.0.129 – 222.168.0.134</td>
                                <td>222.168.0.135</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Latihan
            </div>

            <div class="box-body">

                <div class="info-box">
                    <div class="info-title">Latihan</div>

                    Diketahui jaringan:
                    <br>
                    <span class="ip-highlight">10.10.20.0/24</span>

                    <br><br>

                    Akan dibagi menjadi beberapa subnet:
                    <ul>
                        <li>Lab Komputer : 30 host</li>
                        <li>Ruang Dosen : 14 host</li>
                        <li>Administrasi : 6 host</li>
                    </ul>
                </div>

                <div class="step-box">
                    <div class="step-title">Urutkan kebutuhan host</div>

                    <p class="note">Hint: dari terbesar ke terkecil</p>

                    <div class="input-row">
                        <input type="text" placeholder="Contoh: 50,25,10,5">
                        <button onclick="cekUrutan(this)">Cek</button>
                    </div>
                </div>

                <div id="roomSection" style="display:none;">

                    <div class="room-selector">
                        <button onclick="pilihRuangan('lab', event)" class="room-btn">Lab Komputer</button>
                        <button onclick="pilihRuangan('dosen', event)" class="room-btn">Ruang Dosen</button>
                        <button onclick="pilihRuangan('admin', event)" class="room-btn">Administrasi</button>
                    </div>

                    <!-- ================= LAB ================= -->
                    <div class="room-box room-content" id="lab">
                        <div class="room-title">a. Lab Komputer (30 Host)</div>

                        <!-- STEP 1 -->
                        <p><b>1. Tentukan nilai h</b></p>
                        <p class="note">
                            Hint: cari <i>h</i> sehingga 2<sup>h</sup> - 2 &ge; 30
                        </p>

                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'h','lab')">Cek</button>
                        </div>

                        <!-- STEP 2 -->
                        <p><b>2. Hitung jumlah host</b></p>
                        <div class="formula">
                            2<sup>h</sup> - 2 =
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'hostcalc','lab')">Cek</button>
                        </div>

                        <!-- STEP 3 -->
                        <p><b>3. Tentukan prefix</b></p>
                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'prefix','lab')">Cek</button>
                        </div>

                        <!-- STEP 4 -->
                        <p><b>4. Subnet Mask</b></p>
                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'subnet','lab')">Cek</button>
                        </div>

                        <!-- STEP 5 -->
                        <p><b>5. Blok Subnet</b></p>
                        <div class="formula">
                            256 − <input type="text" placeholder="..."> =
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'blok','lab')">Cek</button>
                        </div>

                        <!-- HASIL -->
                        <div class="result-title">Hasil Perhitungan</div>

                        <div class="input-row">
                            <input type="text" placeholder="Network Address">
                            <button onclick="cekStep(this,'network','lab')">Cek</button>
                        </div>

                        <div class="input-row">
                            <input type="text" placeholder="Host Valid">
                            <button onclick="cekStep(this,'host','lab')">Cek</button>
                        </div>

                        <div class="input-row">
                            <input type="text" placeholder="Broadcast Address">
                            <button onclick="cekStep(this,'broadcast','lab')">Cek</button>
                        </div>

                    </div>

                    <div class="room-box room-content" id="dosen">
                        <div class="room-title">b. Ruang Dosen (14 Host)</div>

                        <p><b>1. Tentukan nilai h</b></p>
                        <p class="note">
                            Hint: cari <i>h</i> sehingga 2<sup>h</sup> - 2 &ge; 14
                        </p>

                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'h','dosen')">Cek</button>
                        </div>

                        <p><b>2. Hitung jumlah host</b></p>
                        <div class="formula">
                            2<sup>h</sup> - 2 =
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'hostcalc','dosen')">Cek</button>
                        </div>

                        <p><b>3. Tentukan prefix</b></p>
                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'prefix','dosen')">Cek</button>
                        </div>

                        <p><b>4. Tentukan Subnet Mask</b></p>
                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'subnet','dosen')">Cek</button>
                        </div>

                        <p><b>5. Tentukan Blok subnet</b></p>
                        <div class="formula">
                            256 − <input type="text" placeholder="..."> =
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'blok','dosen')">Cek</button>
                        </div>

                        <div class="result-title">Hasil Perhitungan</div>

                        <div class="input-row">
                            <input type="text" placeholder="Network Address">
                            <button onclick="cekStep(this,'network','dosen')">Cek</button>
                        </div>

                        <div class="input-row">
                            <input type="text" placeholder="Host Valid">
                            <button onclick="cekStep(this,'host','dosen')">Cek</button>
                        </div>

                        <div class="input-row">
                            <input type="text" placeholder="Broadcast Address">
                            <button onclick="cekStep(this,'broadcast','dosen')">Cek</button>
                        </div>
                    </div>

                    <div class="room-box room-content" id="admin">
                        <div class="room-title">c. Administrasi (6 Host)</div>

                        <p><b>1. Tentukan nilai h</b></p>
                        <p class="note">
                            Hint: cari <i>h</i> sehingga 2<sup>h</sup> - 2 &ge; 6
                        </p>

                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'h','admin')">Cek</button>
                        </div>

                        <p><b>2. Hitung jumlah host</b></p>
                        <div class="formula">
                            2<sup>h</sup> - 2 =
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'hostcalc','admin')">Cek</button>
                        </div>

                        <p><b>3. Tentukan Prefix</b></p>
                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'prefix','admin')">Cek</button>
                        </div>

                        <p><b>4. Tentukan Subnet Mask</b></p>
                        <div class="input-row">
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'subnet','admin')">Cek</button>
                        </div>

                        <p><b>5. Tentukan Blok subnet</b></p>
                        <div class="formula">
                            256 − <input type="text" placeholder="..."> =
                            <input type="text" placeholder="...">
                            <button onclick="cekStep(this,'blok','admin')">Cek</button>
                        </div>

                        <div class="result-title">Hasil Perhitungan</div>

                        <div class="input-row">
                            <input type="text" placeholder="Network Address">
                            <button onclick="cekStep(this,'network','admin')">Cek</button>
                        </div>

                        <div class="input-row">
                            <input type="text" placeholder="Host Valid">
                            <button onclick="cekStep(this,'host','admin')">Cek</button>
                        </div>

                        <div class="input-row">
                            <input type="text" placeholder="Broadcast Address">
                            <button onclick="cekStep(this,'broadcast','admin')">Cek</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== AYO BERLATIH ===================== -->
    <div class="step-section" id="step3">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Ayo Berlatih!
            </div>

            <div class="box-body">

                <div class="instruction-box">
                    <div class="instruction-title">Petunjuk Pengerjaan</div>
                    <ol>
                        <li>Perhatikan kebutuhan host pada setiap ruangan</li>
                        <li>Tentukan nilai <i>h</i> yang sesuai menggunakan rumus 2<sup>h</sup> − 2</li>
                        <li>Tentukan prefix masing-masing subnet</li>
                        <li>Hitung network, host, dan broadcast address</li>
                        <li>Gunakan <em>Scratch Area</em> untuk membantu proses perhitungan. Klik ikon
                            <i class="bi bi-info-circle"></i>
                            untuk melihat petunjuk penggunaan canvas.
                        </li>
                    </ol>
                </div>

                <div class="row">

                    <!-- KIRI = SOAL -->
                    <div class="col-md-6">

                        <div class="step-box">
                            Diketahui jaringan:
                            <br>
                            @php
                                $data = json_decode($mudah->soal, true);
                                $jawabanMudah = json_decode($mudah->jawaban_benar, true);
                                $kebutuhan = $data['kebutuhan'];

                                $ip = $data['ip'];
                                $kebutuhan = $data['kebutuhan'];
                            @endphp

                            <span class="ip-highlight">{{ $ip }}</span>

                            <br><br>

                            Akan dibagi menjadi beberapa subnet:
                            <ul>
                                @foreach($kebutuhan as $nama => $jumlah)
                                    <li>{{ $nama }} : {{ $jumlah }} host</li>
                                @endforeach
                            </ul>
                        </div>

                        <table class="subnet-table">
                            <tr>
                                <th>Bagian</th>
                                <th>Prefix</th>
                                <th>Network</th>
                                <th>Host Range</th>
                                <th>Broadcast</th>
                            </tr>

                            @foreach($kebutuhan as $nama => $jumlah)
                                @php
                                    $key = strtolower(str_replace(' ', '', $nama));
                                @endphp

                                <tr>
                                    <td>{{ $nama }}</td>
                                    <td><input type="text" placeholder="..." id="{{ $key }}_prefix"></td>
                                    <td><input type="text" placeholder="..." id="{{ $key }}_network"></td>
                                    <td><input type="text" placeholder="..." id="{{ $key }}_host"></td>
                                    <td><input type="text" placeholder="..." id="{{ $key }}_broadcast"></td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="cek-wrapper">
                            <button class="btn-cek-modern" onclick="cekAyoBerlatih()">
                                Cek Jawaban
                            </button>

                            <button class="btn-reset-modern" onclick="resetAyoBerlatih()">
                                Reset
                            </button>
                        </div>
                    </div>

                    <br>
                    <!-- KANAN = CORETAN -->
                    <div class="col-md-6">

                        <div class="scratch-box">

                            <div class="scratch-header">

                                <div class="scratch-title">
                                    <i>Scratch Area</i>
                                </div>

                                <button type="button" class="canvas-info-btn" onclick="openCanvasGuide()">

                                    <i class="bi bi-info-circle"></i>
                                </button>

                            </div>

                            <iframe src="https://excalidraw.com"></iframe>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- ===================== AYO BERLATIH ===================== -->
    <div class="step-section" id="step4">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Ayo Berlatih 2
            </div>

            <div class="box-body">

                <div class="instruction-box">
                    <div class="instruction-title">Petunjuk Pengerjaan</div>
                    <ol>
                        <li>Perhatikan kebutuhan host pada setiap ruangan</li>
                        <li>Tentukan nilai <i>h</i> yang sesuai menggunakan rumus 2<sup>h</sup> − 2
                        </li>
                        <li>Tentukan prefix masing-masing subnet</li>
                        <li>Hitung network, host, dan broadcast address</li>
                        <li>Gunakan <em>Scratch Area</em> untuk membantu proses perhitungan. Klik ikon
                            <i class="bi bi-info-circle"></i>
                            untuk melihat petunjuk penggunaan canvas.
                        </li>
                    </ol>
                </div>

                <div class="row">

                    <!-- KIRI = SOAL -->
                    <div class="col-md-6">

                        <div class="step-box">
                            @php
                                $data2 = json_decode($sedang->soal, true);
                                $jawabanSedang = json_decode($sedang->jawaban_benar, true);
                                $kebutuhanSedang = $data2['kebutuhan'];

                                $ipSedang = $data2['ip'];
                                $kebutuhanSedang = $data2['kebutuhan'];
                            @endphp

                            Diketahui jaringan:
                            <br>
                            <span class="ip-highlight">{{ $ipSedang }}</span>
                            <ul>
                                @foreach($kebutuhanSedang as $nama => $jumlah)
                                    <li>{{ $nama }} : {{ $jumlah }} host</li>
                                @endforeach
                            </ul>
                        </div>

                        <table class="subnet-table">
                            <tr>
                                <th>Bagian</th>
                                <th>Prefix</th>
                                <th>Network</th>
                                <th>Host Range</th>
                                <th>Broadcast</th>
                            </tr>

                            @foreach($kebutuhanSedang as $nama => $jumlah)
                                @php
                                    $key = strtolower(str_replace(' ', '', $nama));
                                @endphp

                                <tr>
                                    <td>{{ $nama }}</td>
                                    <td><input type="text" placeholder="..." id="sedang_{{ $key }}_prefix"></td>
                                    <td><input type="text" placeholder="..." id="sedang_{{ $key }}_network"></td>
                                    <td><input type="text" placeholder="..." id="sedang_{{ $key }}_host"></td>
                                    <td><input type="text" placeholder="..." id="sedang_{{ $key }}_broadcast"></td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="cek-wrapper">
                            <button class="btn-cek-modern" onclick="cekAyoBerlatih2()">
                                Cek Jawaban
                            </button>

                            <button class="btn-reset-modern" onclick="resetAyoBerlatih2()">
                                Reset
                            </button>
                        </div>
                    </div>

                    <br>
                    <!-- KANAN = CORETAN -->
                    <div class="col-md-6">

                        <div class="scratch-box">

                            <div class="scratch-header">

                                <div class="scratch-title">
                                    <i>Scratch Area</i>
                                </div>

                                <button type="button" class="canvas-info-btn" onclick="openCanvasGuide()">

                                    <i class="bi bi-info-circle"></i>
                                </button>

                            </div>

                            <iframe src="https://excalidraw.com"></iframe>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- ===================== AYO BERLATIH ===================== -->
    <div class="step-section" id="step5">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Ayo Berlatih 3
            </div>

            <div class="box-body">

                <div class="instruction-box">
                    <div class="instruction-title">Petunjuk Pengerjaan</div>
                    <ol>
                        <li>Perhatikan kebutuhan host pada setiap ruangan</li>
                        <li>Tentukan nilai <i>h</i> yang sesuai menggunakan rumus 2<sup>h</sup> − 2
                        </li>
                        <li>Tentukan prefix masing-masing subnet</li>
                        <li>Hitung network, host, dan broadcast address</li>
                        <li>Gunakan <em>Scratch Area</em> untuk membantu proses perhitungan. Klik ikon
                            <i class="bi bi-info-circle"></i>
                            untuk melihat petunjuk penggunaan canvas.
                        </li>
                    </ol>
                </div>

                <div class="row">

                    <!-- KIRI = SOAL -->
                    <div class="col-md-6">

                        <div class="step-box">
                            @php
                                $dataSulit = json_decode($sulit->soal, true);
                                $jawabanSulit = json_decode($sulit->jawaban_benar, true);

                                $ipSulit = $dataSulit['ip'];
                                $kebutuhanSulit = $dataSulit['kebutuhan'];
                            @endphp

                            Diketahui jaringan:
                            <br>
                            <span class="ip-highlight">{{ $ipSulit }}</span>

                            <ul>
                                @foreach($kebutuhanSulit as $nama => $jumlah)
                                    <li>{{ $nama }} : {{ $jumlah }} host</li>
                                @endforeach
                            </ul>
                        </div>

                        <table class="subnet-table">
                            <tr>
                                <th>Bagian</th>
                                <th>Prefix</th>
                                <th>Network</th>
                                <th>Host Range</th>
                                <th>Broadcast</th>
                            </tr>
                            @foreach($kebutuhanSulit as $nama => $jumlah)
                                @php
                                    $key = strtolower(str_replace(' ', '', $nama));
                                @endphp

                                <tr>
                                    <td>{{ $nama }}</td>
                                    <td><input type="text" placeholder="..." id="sulit_{{ $key }}_prefix"></td>
                                    <td><input type="text" placeholder="..." id="sulit_{{ $key }}_network"></td>
                                    <td><input type="text" placeholder="..." id="sulit_{{ $key }}_host"></td>
                                    <td><input type="text" placeholder="..." id="sulit_{{ $key }}_broadcast"></td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="cek-wrapper">
                            <button class="btn-cek-modern" onclick="cekAyoBerlatih3()">
                                Cek Jawaban
                            </button>

                            <button class="btn-reset-modern" onclick="resetAyoBerlatih3()">
                                Reset
                            </button>
                        </div>
                    </div>

                    <br>
                    <!-- KANAN = CORETAN -->
                    <div class="col-md-6">

                        <div class="scratch-box">

                            <div class="scratch-header">

                                <div class="scratch-title">
                                    <i>Scratch Area</i>
                                </div>

                                <button type="button" class="canvas-info-btn" onclick="openCanvasGuide()">

                                    <i class="bi bi-info-circle"></i>
                                </button>

                            </div>

                            <iframe src="https://excalidraw.com"></iframe>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- ===================== AKTIVITAS ===================== -->
    <div class="step-section" id="step6">
        <!-- aktivitas -->
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Aktivitas 3.3
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
        <button class="page-btn" onclick="goToStep(4)" id="stepBtn4">4</button>
        <button class="page-btn" onclick="goToStep(5)" id="stepBtn5">5</button>
        <button class="page-btn" onclick="goToStep(6)" id="stepBtn6">6</button>

        <button class="page-btn nav-arrow" onclick="nextStep()">
            <i class="bi bi-chevron-right"></i>
        </button>

    </div>

    <div class="nav-bottom">
        <a href="/bab3/perhitungan-subnetting" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab3/rangkuman-bab3" class="nav-btn nav-next" onclick="konfirmasiLanjut(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const kebutuhan = @json(array_keys($kebutuhan));
        const kebutuhanSedang = @json(array_keys($kebutuhanSedang));
        const kebutuhanSulit = @json(array_keys($kebutuhanSulit));
        const jawabanMudah = @json($jawabanMudah);
        const jawabanSedang = @json($jawabanSedang);
        const jawabanSulit = @json($jawabanSulit);

        let startTime = Date.now();
        let sudahLulusPemahaman = false;
        let sudahMencoba = false;
        let progressRuangan = {
            lab: false,
            dosen: false,
            admin: false
        };
        let sudahLatihan1 = false;
        let sudahLatihan2 = false;
        let sudahLatihan3 = false;
        let sudahAktivitas = false;

        function sudahBacaMinimal() {
            let waktu = (Date.now() - startTime) / 1000;
            return waktu >= 120; // 2 menit
        }

        function konfirmasiLanjut(event) {
            if (event) event.preventDefault();

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
                    title: "Cek Pemahaman VLSM",
                    html: `
                        <div class="swal-question">
                            Apa tujuan utama VLSM?
                        </div>

                        <div class="swal-options">
                            <label class="swal-option">
                                <input type="radio" name="jawaban" value="a">
                                <span>Semua subnet harus sama besar</span>
                            </label>

                            <label class="swal-option">
                                <input type="radio" name="jawaban" value="b">
                                <span>Membagi subnet sesuai kebutuhan host</span>
                            </label>

                            <label class="swal-option">
                                <input type="radio" name="jawaban" value="c">
                                <span>Menghapus subnet</span>
                            </label>

                            <label class="swal-option">
                                <input type="radio" name="jawaban" value="d">
                                <span>Menambah IP tanpa batas</span>
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
                                title: "Benar!"
                            }).then(() => {
                                // 🔥 lanjut otomatis
                                konfirmasiLanjut(new Event('click'));
                            });

                        } else {

                            Swal.fire({
                                icon: "error",
                                title: "Salah, coba lagi"
                            });

                        }

                    }

                });

                return;
            }

            // =====================
            // 3. CEK SEMUA LATIHAN
            // =====================
            if (!sudahMencoba || !sudahLatihan1 || !sudahLatihan2 || !sudahLatihan3 || !sudahAktivitas) {

                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                                                                                                                                                                    <div style="margin-top:10px;">
                                                                                                                                                                        Tapi, kamu belum menyelesaikan:
                                                                                                                                                                        <br><br>

                                                                                                                                                                        <div style="font-weight:600; line-height:1.8;">
                                                                                                                                                                            ${!sudahMencoba ? "Ayo Mencoba<br>" : ""}
                                                                                                                                                                            ${!sudahLatihan1 ? "Ayo Berlatih 1<br>" : ""}
                                                                                                                                                                            ${!sudahLatihan2 ? "Ayo Berlatih 2<br>" : ""}
                                                                                                                                                                            ${!sudahLatihan3 ? "Ayo Berlatih 3<br>" : ""}
                                                                                                                                                                            ${!sudahAktivitas ? "Aktivitas<br>" : ""}
                                                                                                                                                                        </div>

                                                                                                                                                                        <br>
                                                                                                                                                                        Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                                                                                                                                                                    </div>
                                                                                                                                                                `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu",

                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.href = "/bab3/rangkuman-bab3";
                    }

                });

                return;
            }

            // =====================
            // 4. KIRIM PROGRESS
            // =====================
            const bab = encodeURIComponent("Subnetting");
            const subbab = encodeURIComponent("VLSM");

            fetch(`/progres/selesai/${bab}/${subbab}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(() => {
                    window.location.href = "/bab3/rangkuman-bab3";
                });
        }

        let quizData = [];
        let currentQuiz = 0;
        let userAnswers = {};
        let lockedQuestions = {};

        async function fetchSoal() {
            const res = await fetch('/aktivitas/vlsm/soal');
            quizData = await res.json();
            loadQuiz();
        }

        document.addEventListener("DOMContentLoaded", fetchSoal);

        async function cekJawaban(selected) {

            const res = await fetch('/aktivitas/vlsm/cek', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    id_soal: quizData[currentQuiz].id,
                    jawaban_user: selected
                })
            });

            const data = await res.json();
            const feedback = document.getElementById("quizFeedback");

            if (data.benar) {

                feedback.innerHTML = '<i class="bi bi-check-circle-fill"></i> Jawaban benar';
                feedback.style.color = "#16a34a";

                document.getElementById("nextBtn").disabled = false;

                lockedQuestions[currentQuiz] = true;

                document.querySelectorAll('input[name="answer"]').forEach(r => r.disabled = true);

            } else {

                feedback.innerHTML = '<i class="bi bi-x-circle-fill"></i> Jawaban salah';
                feedback.style.color = "#dc2626";

                document.getElementById("nextBtn").disabled = true;
            }
        }

        let currentStep = 1;
        const totalSteps = 6;

        function showStep(step) {
            // sembunyikan semua step
            document.querySelectorAll(".step-section").forEach(el => {
                el.classList.remove("active");
            });

            // tampilkan step aktif
            document.getElementById("step" + step).classList.add("active");

            // update tombol aktif
            document.querySelectorAll(".page-btn").forEach(btn => {
                btn.classList.remove("active");
            });

            const activeBtn = document.getElementById("stepBtn" + step);
            if (activeBtn) activeBtn.classList.add("active");

            currentStep = step;

            // kembali ke bagian paling atas
            requestAnimationFrame(() => {
                document.querySelector("main.content").scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        }

        function goToStep(step) {
            showStep(step);
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                showStep(currentStep + 1);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        }

        function loadQuiz() {
            const container = document.getElementById("quizContainer");
            if (!quizData.length) return;

            const q = quizData[currentQuiz];

            let html = `
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="question-box">
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="question-number">Soal ${currentQuiz + 1} dari ${quizData.length}</div>
                                                                                                                                                                                                                                                                                                                                                                                                        <div class="question-text">${q.q}</div>
                                                                                                                                                                                                                                                                                                                                                                                                `;

            if (q.tipe === "pilgan") {

                html += `<div class="options">`;

                q.opsi.forEach((opt, i) => {

                    const isChecked = userAnswers[currentQuiz] == i ? "checked" : "";
                    const isDisabled = lockedQuestions[currentQuiz] ? "disabled" : "";

                    html += `
                                                                                <label class="option">
                                                                                    <input type="radio" name="answer" value="${i}" ${isChecked} ${isDisabled}>
                                                                                    <span class="option-text">${opt}</span>
                                                                                </label>
                                                                            `;
                });

                html += `</div>`;

            } else if (q.tipe === "isian") {

                const value = userAnswers[currentQuiz] ?? "";
                const disabled = lockedQuestions[currentQuiz] ? "disabled" : "";

                html += `
                                                                            <div class="input-row">
                                                                                <input type="text" id="isianInput" value="${value}" ${disabled} placeholder="...">
                                                                            </div>
                                                                        `;
            }

            html += `</div>`;
            container.innerHTML = html;

            document.getElementById("quizFeedback").innerHTML = "";

            // 🔥 TAMBAH INI
            document.getElementById("prevBtn").disabled = (currentQuiz === 0);

            document.querySelectorAll('input[name="answer"]').forEach(radio => {
                radio.addEventListener("change", async (e) => {

                    if (lockedQuestions[currentQuiz]) return;

                    const selected = parseInt(e.target.value);
                    userAnswers[currentQuiz] = selected;

                    await cekJawaban(selected);
                });
            });

            document.getElementById("nextBtn").disabled = true;

            const input = document.getElementById("isianInput");

            if (input) {
                input.addEventListener("input", async function () {

                    if (lockedQuestions[currentQuiz]) return;

                    const value = this.value.trim();
                    if (!value) return;

                    userAnswers[currentQuiz] = value;

                    const res = await fetch('/aktivitas/vlsm/cek', {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            id_soal: quizData[currentQuiz].id,
                            jawaban_user: value
                        })
                    });

                    const data = await res.json();
                    const feedback = document.getElementById("quizFeedback");

                    if (data.benar) {

                        feedback.innerHTML = "Jawaban benar";
                        feedback.style.color = "#16a34a";

                        document.getElementById("nextBtn").disabled = false;

                        lockedQuestions[currentQuiz] = true;
                        input.disabled = true;

                    } else {

                        feedback.innerHTML = "Jawaban salah";
                        feedback.style.color = "#dc2626";

                        document.getElementById("nextBtn").disabled = true;
                    }
                });
            }

        }

        function nextSoal() {
            if (currentQuiz < quizData.length - 1) {
                currentQuiz++;
                loadQuiz();
            } else {

                sudahAktivitas = true;

                Swal.fire({
                    icon: 'success',
                    title: 'Aktivitas Selesai',
                    text: 'Silakan lanjut ke halaman berikutnya'
                }).then(() => {
                    konfirmasiLanjut(); // 🔥 INI YANG KURANG
                });

            }
        }

        function prevSoal() {
            if (currentQuiz > 0) {
                currentQuiz--;
                loadQuiz();
            }
        }

        function cekUrutan(btn) {
            const input = btn.parentElement.querySelector("input");
            const val = input.value.replace(/\s/g, "");

            if (val === "30,14,6") {
                kasihFeedback(btn, true, "Urutan benar!", "");

                // tampilkan section
                document.getElementById("roomSection").style.display = "block";

                // 🔥 AKTIFKAN LAB OTOMATIS
                document.getElementById("lab").classList.add("active");

                // 🔥 AKTIFKAN BUTTON LAB
                document.querySelectorAll(".room-btn").forEach(b => b.classList.remove("active"));
                document.querySelector(".room-btn").classList.add("active");

            } else {
                kasihFeedback(btn, false, "", "Urutkan dari terbesar");
            }
        }

        function kasihFeedback(btn, benar, pesanBenar, pesanSalah) {
            if (benar) {
                btn.innerText = "✔ Benar";
                btn.style.background = "green";
            } else {
                btn.innerText = "✖ Salah";
                btn.style.background = "red";
            }
        }

        const kunci = {
            lab: {
                h: "5",
                hostcalc: "30",
                prefix: "/27",
                subnet: "255.255.255.224",
                blokA: "224",
                blokB: "32",
                network: "10.10.20.0",
                host: "10.10.20.1-10.10.20.30",
                broadcast: "10.10.20.31"
            },
            dosen: {
                h: "4",
                hostcalc: "14",
                prefix: "/28",
                subnet: "255.255.255.240",
                blokA: "240",
                blokB: "16",
                network: "10.10.20.32",
                host: "10.10.20.33-10.10.20.46",
                broadcast: "10.10.20.47"
            },
            admin: {
                h: "3",
                hostcalc: "6",
                prefix: "/29",
                subnet: "255.255.255.248",
                blokA: "248",
                blokB: "8",
                network: "10.10.20.48",
                host: "10.10.20.49-10.10.20.54",
                broadcast: "10.10.20.55"
            },
        };

        function pilihRuangan(id, event) {

            // sembunyikan semua konten
            document.querySelectorAll(".room-content").forEach(el => {
                el.classList.remove("active");
            });

            // tampilkan yg dipilih
            document.getElementById(id).classList.add("active");

            // reset tombol
            document.querySelectorAll(".room-btn").forEach(btn => {
                btn.classList.remove("active");
            });

            // aktifkan tombol yg diklik
            event.target.classList.add("active");
        }

        function cekStep(btn, tipe, ruang) {

            const container = btn.parentElement;
            const inputs = container.querySelectorAll("input");

            let jawabanUser;

            // ambil nilai input
            if (inputs.length === 1) {
                jawabanUser = inputs[0].value.trim();
            } else if (inputs.length === 2) {
                // untuk blok: 256 - 192 = 64
                jawabanUser = {
                    a: inputs[0].value.trim(),
                    b: inputs[1].value.trim()
                };
            }

            let benar = false;

            // ================= CEK =================
            if (tipe === "h") {
                benar = jawabanUser === kunci[ruang].h;
            }

            if (tipe === "hostcalc") {
                benar = jawabanUser === kunci[ruang].hostcalc;
            }

            if (tipe === "prefix") {
                benar = jawabanUser === kunci[ruang].prefix;
            }

            if (tipe === "subnet") {
                benar = jawabanUser === kunci[ruang].subnet;
            }

            if (tipe === "blok") {
                benar =
                    jawabanUser.a === kunci[ruang].blokA &&
                    jawabanUser.b === kunci[ruang].blokB;
            }

            if (tipe === "network") {
                benar = jawabanUser === kunci[ruang].network;
            }

            if (tipe === "host") {
                benar = jawabanUser === kunci[ruang].host;
            }

            if (tipe === "broadcast") {
                benar = jawabanUser === kunci[ruang].broadcast;
            }

            // ================= FEEDBACK =================
            if (benar) {
                btn.innerText = "✔ Benar";
                btn.style.background = "green";
            } else {
                btn.innerText = "✖ Salah";
                btn.style.background = "red";
            }

            if (benar) {
                progressRuangan[ruang] = true;
            }

            if (inputs.length === 1) {
                tandaiInput(inputs[0], benar);
            } else {
                inputs.forEach(i => tandaiInput(i, benar));
            }

            // CEK apakah semua sudah selesai
            if (semuaStepMencobaSelesai()) {
                sudahMencoba = true;
            }

        }

        function semuaStepMencobaSelesai() {
            return Object.values(progressRuangan).every(v => v === true);
        }

        function tandaiInput(input, benar) {
            input.classList.remove("benar", "salah");

            if (benar) {
                input.classList.add("benar");
            } else {
                input.classList.add("salah");
            }
        }

        function cekAyoBerlatih() {

            let skor = 0;
            let total = kebutuhan.length * 4;

            function cek(input, kunci) {
                let user = normalize(input.value);
                let benar = normalize(kunci);

                let hasil = user === benar;

                tandaiInput(input, hasil);
                return hasil;
            }

            kebutuhan.forEach((nama, index) => {

                let key = nama.toLowerCase().replace(/\s/g, "");
                let dataKunci = jawabanMudah[index];

                const hasil = [
                    cek(document.getElementById(`${key}_prefix`), dataKunci.prefix),
                    cek(document.getElementById(`${key}_network`), dataKunci.network),
                    cek(document.getElementById(`${key}_host`), dataKunci.range),
                    cek(document.getElementById(`${key}_broadcast`), dataKunci.broadcast),
                ];

                skor += hasil.filter(v => v).length;
            });

            if (skor === total) {

                sudahLatihan1 = true;

                Swal.fire({
                    icon: 'success',
                    title: 'Mantap!',
                    text: 'Semua jawaban kamu benar!',
                    showCancelButton: true,
                    confirmButtonText: 'Lanjut',
                    cancelButtonText: 'Kerjakan Lagi'
                }).then((result) => {

                    if (result.isConfirmed) {
                        nextStep();
                    } else {
                        resetAyoBerlatih();
                    }

                });

            } else {

                Swal.fire({
                    icon: 'warning',
                    title: 'Masih ada yang salah',
                    html: `Skor kamu <b>${skor} / ${total}</b>`
                });

            }
        }

        function resetAyoBerlatih() {

            Swal.fire({
                title: "Yakin mau reset?",
                text: "Semua jawaban akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: "Ya, reset!",
                cancelButtonText: "Batal"
            }).then((result) => {

                if (result.isConfirmed) {

                    document.querySelectorAll('#step3 input').forEach(input => {
                        input.value = "";
                        input.classList.remove("benar", "salah");
                    });

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Jawaban berhasil direset"
                    });

                }

            });
        }

        function cekAyoBerlatih2() {

            let skor = 0;
            let total = kebutuhanSedang.length * 4;

            function cek(input, kunci) {
                if (!input) return false;

                let user = normalize(input.value);
                let benar = normalize(kunci);

                let hasil = user === benar;

                tandaiInput(input, hasil);
                return hasil;
            }

            kebutuhanSedang.forEach((nama, index) => {

                let key = nama.toLowerCase().replace(/\s/g, "");

                let dataKunci = jawabanSedang[index];

                const hasil = [
                    cek(document.getElementById(`sedang_${key}_prefix`), dataKunci.prefix),
                    cek(document.getElementById(`sedang_${key}_network`), dataKunci.network),
                    cek(document.getElementById(`sedang_${key}_host`), dataKunci.range),
                    cek(document.getElementById(`sedang_${key}_broadcast`), dataKunci.broadcast),
                ];

                skor += hasil.filter(v => v).length;
            });

            if (skor === total) {
                sudahLatihan2 = true;

                Swal.fire({
                    icon: 'success',
                    title: 'Mantap!',
                    text: 'Semua jawaban kamu benar!',
                    showCancelButton: true,
                    confirmButtonText: 'Lanjut',
                    cancelButtonText: 'Kerjakan Lagi'
                }).then((result) => {

                    if (result.isConfirmed) {

                        // lanjut ke step berikutnya
                        nextStep();

                    } else {

                        // reset biar bisa kerjakan ulang
                        resetAyoBerlatih();

                    }

                });

            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Masih ada yang salah',
                    html: `Skor kamu <b>${skor} / ${total}</b>`
                });
            }
        }

        function resetAyoBerlatih2() {

            Swal.fire({
                title: "Yakin mau reset?",
                text: "Semua jawaban akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: "Ya, reset!",
                cancelButtonText: "Batal"
            }).then((result) => {

                if (result.isConfirmed) {

                    document.querySelectorAll('#step4 input').forEach(input => {
                        input.value = "";
                        input.classList.remove("benar", "salah");
                    });

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Jawaban berhasil direset"
                    });

                }

            });
        }

        function cekAyoBerlatih3() {

            let skor = 0;
            let total = kebutuhanSulit.length * 4;

            function cek(input, kunci) {
                if (!input) return false;

                let user = normalize(input.value);
                let benar = normalize(kunci);

                let hasil = user === benar;

                tandaiInput(input, hasil);
                return hasil;
            }

            kebutuhanSulit.forEach((nama, index) => {

                let key = nama.toLowerCase().replace(/\s/g, "");

                let dataKunci = jawabanSulit[index];

                const hasil = [
                    cek(document.getElementById(`sulit_${key}_prefix`), dataKunci.prefix),
                    cek(document.getElementById(`sulit_${key}_network`), dataKunci.network),
                    cek(document.getElementById(`sulit_${key}_host`), dataKunci.range),
                    cek(document.getElementById(`sulit_${key}_broadcast`), dataKunci.broadcast),
                ];

                skor += hasil.filter(v => v).length;
            });

            if (skor === total) {
                sudahLatihan3 = true;

                Swal.fire({
                    icon: 'success',
                    title: 'Mantap!',
                    text: 'Semua jawaban kamu benar!',
                    showCancelButton: true,
                    confirmButtonText: 'Lanjut',
                    cancelButtonText: 'Kerjakan Lagi'
                }).then((result) => {

                    if (result.isConfirmed) {

                        // 👉 lanjut ke step berikutnya
                        nextStep();

                    } else {

                        // 👉 reset biar bisa kerjakan ulang
                        resetAyoBerlatih();

                    }

                });

            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Masih ada yang salah',
                    html: `Skor kamu <b>${skor} / ${total}</b>`
                });
            }
        }

        function resetAyoBerlatih3() {

            Swal.fire({
                title: "Yakin mau reset?",
                text: "Semua jawaban akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: "Ya, reset!",
                cancelButtonText: "Batal"
            }).then((result) => {

                if (result.isConfirmed) {

                    document.querySelectorAll('#step5 input').forEach(input => {
                        input.value = "";
                        input.classList.remove("benar", "salah");
                    });

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Jawaban berhasil direset"
                    });

                }

            });
        }

        function normalize(val) {
            return val
                .replace(/\s+/g, "")
                .replace(/–/g, "-")
                .toLowerCase();
        }

        window.addEventListener("DOMContentLoaded", async () => {

            const bab = encodeURIComponent("Subnetting");
            const subbab = encodeURIComponent("VLSM"); // 🔥 HARUS VLSM

            const res = await fetch(`/progres/cek/${bab}/${subbab}`);
            const data = await res.json();

            if (data.selesai) {

                console.log("SUDAH PERNAH SELESAI VLSM");

                // skip validasi
                sudahLulusPemahaman = true;
                sudahMencoba = true;
                sudahLatihan1 = true;
                sudahLatihan2 = true;
                sudahLatihan3 = true;
                sudahAktivitas = true;

                // skip waktu baca
                startTime = 0;
            }

        });

        function openCanvasGuide() {
            document.getElementById("canvasGuideModal")
                .style.display = "flex";
        }

        function closeCanvasGuide() {
            document.getElementById("canvasGuideModal")
                .style.display = "none";
        }

        // klik luar modal = tutup
        window.addEventListener("click", function (e) {

            const modal = document.getElementById("canvasGuideModal");

            if (e.target === modal) {
                closeCanvasGuide();
            }

        });
    </script>

    <!-- MODAL PETUNJUK -->
    <div id="canvasGuideModal" class="custom-modal">

        <div class="custom-modal-content">

            <!-- HEADER -->
            <div class="custom-modal-header">

                <h3>Petunjuk <em>Scratch Area</em></h3>

                <button class="close-modal" onclick="closeCanvasGuide()">
                    &times;
                </button>

            </div>

            <!-- BODY -->
            <div class="custom-modal-body">

                <!-- GAMBAR -->
                <img src="/assets/img/petunjuk-canvas.png" class="guide-image">

                <div class="guide-caption">

                    <h4>Keterangan:</h4>

                    <ol>
                        <li><b>Hand Tool</b> digunakan untuk menggeser tampilan canvas.</li>

                        <li><b>Selection Tool</b> digunakan untuk memilih dan memindahkan objek.</li>

                        <li><b>Draw Tool</b> digunakan untuk menulis atau menggambar bebas.</li>

                        <li><b>Eraser Tool</b> digunakan untuk menghapus tulisan atau gambar.</li>

                        <li><b>Rectangle Tool</b> digunakan untuk membuat kotak sederhana.</li>

                        <li><b>Arrow Tool</b> digunakan untuk membuat panah atau alur.</li>

                        <li><b>Text Tool</b> digunakan untuk menambahkan teks atau angka.</li>

                        <li><b>Image Tool</b> digunakan untuk menambahkan gambar ke canvas.</li>

                        <li><b>Shapes Tool</b> digunakan untuk menambahkan berbagai bentuk diagram.</li>

                        <li><b>Undo</b> digunakan untuk membatalkan tindakan sebelumnya.</li>

                        <li><b>Redo</b> digunakan untuk mengembalikan tindakan sebelumnya.</li>

                        <li><b>Menu</b> digunakan untuk membuka fitur tambahan canvas.</li>

                        <li><b>Library Panel</b> digunakan untuk membuka panel aset dan komponen tambahan pada canvas.</li>
                    </ol>

                </div>

            </div>

        </div>

    </div>
@endsection