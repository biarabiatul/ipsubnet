@extends('mahasiswa.mahasiswa')

@section('title', 'Subbab - Perhitungan Subnetting')

<title>BAB 3 : Subnetting</title>

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

        /* CONTOH SOAL */
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

        /* langkah subnetting */
        .step-box {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            padding: 12px 16px;
            margin: 16px 0;
        }

        .section-title {
            color: #a0522d;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 18px;
        }

        .step-list {
            padding-left: 25px;
            font-size: 16px;
        }

        .formula-text {
            display: inline-block;
            background: #e8d7b5;
            border: 1px solid #333;
            padding: 3px 10px;
            font-weight: bold;
            font-size: 13px;
            margin-left: 6px;
        }

        .formula-number {
            float: right;
            font-size: 15px;
            margin-top: 4px;
            font-weight: 600;
            color: #374151;
        }

        /* TABEL */
        .table-wrapper {
            margin-top: 16px;
        }

        .subnet-table {
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 15px;
        }

        .subnet-table th,
        .subnet-table td {
            border: 1px solid #d6c3b2;
            padding: 8px 14px;
            text-align: center;
        }

        .subnet-table th {
            background: #8b5e3c;
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: 700;
            border: 1px solid #c9b29d;
        }

        /* INPUT */
        .fill-input {
            width: 120px;
            padding: 6px;
            font-size: 15px;
            text-align: center;
            border: 1.5px solid #89471e;
            border-radius: 4px;
            background: #ffffff;
            color: #111827;
            transition: 0.2s;
        }

        .fill-input.correct {
            border-color: #15803d;
            background: #ecfdf5;
            color: #065f46;
        }

        .fill-input.wrong {
            border-color: #b91c1c;
            background: #fef2f2;
            color: #7f1d1d;
        }

        .formula-box {
            background: #fff7ed;
            border: 1px dashed #d97706;
            border-radius: 8px;
            padding: 16px 18px;
            margin: 18px 0;
        }

        .formula-title {
            font-weight: 700;
            color: #92400e;
            margin-bottom: 8px;
            font-size: 16px;
        }

        .formula {
            background: #ffffff;
            border: 1px solid #f59e0b;
            border-radius: 6px;
            padding: 10px 14px;
            font-weight: 700;
            color: #78350f;
            margin: 8px 0;
            display: inline-block;
        }

        .formula-desc {
            font-size: 14px;
            color: #374151;
            margin-top: 6px;
        }

        .formula-note {
            font-size: 13px;
            color: #6b7280;
            margin-top: 6px;
            font-style: italic;
        }

        /* IP HIGHLIGHT */
        .ip-highlight {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 700;
            margin: 8px 0;
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
            margin-bottom: 16px;
            color: #1f2937;
            font-weight: 700;
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
        }

        /* navigasi */
        .nav-bottom {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

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

        .formula {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
            font-weight: 600;
            margin: 10px 0 16px 0;
            background: #fafafa;
        }

        .formula-desc {
            margin-bottom: 12px;
            line-height: 1.7;
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

        /* CONTOH & LATIHAN */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
            margin-top: 18px;
        }

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

        .latihan-subnet {
            text-align: center;
            margin-top: 10px;
        }

        /* versi teks (tanpa input) */
        .input-line.static {
            justify-content: flex-start;
        }

        /* angka */
        .input-line .value {
            font-size: 15px;
            font-weight: 600;
            color: #111;
        }

        /* form tengah */
        .latihan-form {
            width: 70%;
            margin: 0 auto;
        }

        /* tiap baris */
        .latihan-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        /* label */
        .latihan-row span:first-child {
            text-align: left;
            min-width: 220px;
        }

        /* titik */
        .dots {
            margin: 0 10px;
        }

        /* garis input */
        .latihan-row input {
            flex: 1;
            border: none;
            border-bottom: 2px solid #111;
            outline: none;
            background: transparent;
            font-size: 15px;
        }

        /* FORM */
        .latihan-form {
            width: 75%;
            margin: 0 auto;
        }

        /* ROW */
        .latihan-row {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }

        /* label kiri */
        .latihan-row label {
            width: 300px;
            text-align: right;
            padding-right: 20px;
        }

        /* garis + isi */
        .input-line {
            flex: 1;
            display: flex;
            align-items: center;
            border-bottom: 2px solid #111;
            padding-bottom: 4px;
        }

        /* FEEDBACK WARNA */
        .input-line.correct {
            border-bottom: 3px solid #16a34a;
            /* hijau */
        }

        .input-line.wrong {
            border-bottom: 3px solid #dc2626;
            /* merah */
        }

        /* warna teks ikut berubah */
        .input-line.correct input {
            color: #15803d;
        }

        .input-line.wrong input {
            color: #b91c1c;
        }

        /* titik tengah */
        .input-line span {
            width: 40px;
            text-align: center;
            color: #6b7280;
        }

        /* input (jawaban user)*/
        .input-line input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 15px;
            background: transparent;
            padding-left: 6px;
            font-weight: 600;
        }

        .input-line input::placeholder {
            font-size: 18px;
            letter-spacing: 2px;
            color: #6b7280;
        }

        .input-line input:focus {
            font-weight: 600;
        }

        /* LAYOUT SCRATCH */
        .scratch-layout {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        /* kanan (whiteboard) */
        .scratch-area {
            flex: 2;
            position: relative;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            overflow: hidden;
            flex: none;
            width: 100%;
            margin: 0 auto;
        }

        /* iframe */
        .scratch-area iframe {
            width: 100%;
            height: 400px;
            border: none;
        }

        .scratch-title {
            font-weight: 700;
            margin-bottom: 8px;
            color: #92400e;
            text-align: center;
        }

        .scratch-header {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 10px 12px;
        }

        .latihan-row.long-text label {
            width: 220px;
            text-align: left;
            padding-right: 10px;
        }

        .step-section {
            display: none;
        }

        .step-section.active {
            display: block;
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

        /* navigasi */
        .nav-bottom {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

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

        /* FEEDBACK */
        #cs3-feedback {
            font-weight: 600;
            font-size: 14px;
        }

        .info-box input {
            display: inline-block;
        }

        /* biar sejajar sama teks */
        .info-box li {
            line-height: 1.8;
        }

        .ip-switch {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .ip-btn {
            padding: 8px 14px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            background: #f1f5f9;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            font-family: 'Fira Sans', sans-serif;
            font-size: 18px;
        }

        /* hover */
        .ip-btn:hover {
            background: #fde68a;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .ip-btn.active {
            background: #facc15;
            border-color: #eab308;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
            transform: scale(0.95);
        }

        .ip-content {
            display: none;
        }

        .ip-content.active {
            display: block;
        }

        .btn-cek {
            background-color: #b45309;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        /* hover */
        .btn-cek:hover {
            background-color: #92400e;
        }

        /* klik */
        .btn-cek:active {
            transform: scale(0.96);
        }

        /* disabled */
        .btn-cek:disabled {
            background-color: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
        }

        #hot {
            width: 100%;
            height: 400px;
        }

        #hot2 {
            width: 100%;
            height: 400px;
        }

        .table-guide {
            background: #fff7ed;
            border: 1px solid #f59e0b;
            border-radius: 8px;
            padding: 14px 18px;
            margin-bottom: 12px;
            font-size: 14px;
            text-align: left;
        }

        .cek-floating {
            position: fixed;
            right: 77px;
            bottom: 40px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            display: none;
        }

        /* tombol cek */
        .btn-cek {
            background: #b45309;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-cek:hover {
            background: #92400e;
        }

        .btn-reset {
            background: #6b7280;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-reset:hover {
            background: #4b5563;
        }

        /* OPSI DI SWEETALERT */
        .swal-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .swal-option {
            border: 1.5px solid #d6c3b2;
            border-radius: 8px;
            padding: 10px 14px;
            cursor: pointer;
            background: #ffffff;
            transition: 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
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

        .table-subnet-input {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 16px;
        }

        .table-subnet-input th,
        .table-subnet-input td {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
        }

        .table-subnet-input th {
            background: #d9c7a7;
            font-weight: bold;
        }

        .table-input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #bbb;
            border-radius: 6px;
            outline: none;
            font-size: 14px;
            text-align: center;
        }

        .table-input:focus {
            border-color: #8b5e3c;
            box-shadow: 0 0 4px rgba(139, 94, 60, 0.4);
        }

        .table-input.correct {
            border: 2px solid #16a34a;
            background: #ecfdf5;
            color: #166534;
        }

        .table-input.wrong {
            border: 2px solid #dc2626;
            background: #fef2f2;
            color: #991b1b;
        }

        @media (max-width: 768px) {

            .ip-switch {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 8px;
                width: 100%;
                overflow: hidden;
            }

            .ip-btn {
                flex: 1 1 30%;
                min-width: 90px;
                max-width: 110px;
                padding: 8px 10px;
                font-size: 14px;
                line-height: 1.2;
                text-align: center;
                white-space: normal;
                word-break: break-word;
                box-sizing: border-box;
            }

            .box-body {
                overflow: hidden;
            }

            .table-wrapper {
                width: 100%;
                overflow: hidden;
            }

            .subnet-table {
                width: 100%;
                table-layout: fixed;
                border-collapse: collapse;
                font-size: 10px;
            }

            .subnet-table th,
            .subnet-table td {
                padding: 6px 4px;
                font-size: 10px;
                line-height: 1.3;
                word-break: break-word;
                overflow-wrap: break-word;
            }

            .subnet-table th {
                font-size: 10px;
            }

            .formula-box {
                overflow: hidden;
                padding: 12px 4px;
            }

            .latihan-table {
                width: 100% !important;
                table-layout: fixed;
                border-collapse: collapse;
                font-size: 8px;
                transform: scale(0.78);
                transform-origin: top center;
            }

            .latihan-table th,
            .latihan-table td {
                padding: 2px 1px;
                font-size: 8px;
                word-break: break-word;
            }

            .latihan-table input {
                width: 100% !important;
                min-width: 0 !important;
                font-size: 8px;
                padding: 2px 1px;
                box-sizing: border-box;
            }

            .latihan-form {
                width: 100% !important;
            }

            .latihan-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
                width: 100%;
            }

            .latihan-row label {
                width: 100% !important;
                min-width: 0 !important;
                text-align: left !important;
                padding-right: 0 !important;
                font-size: 14px;
                line-height: 1.4;
            }

            .input-line {
                width: 100%;
                min-width: 0;
                overflow: hidden;
                box-sizing: border-box;
            }

            .input-line input {
                width: 100%;
                min-width: 0;
                font-size: 14px;
                box-sizing: border-box;
            }

            .input-line.static {
                width: 100%;
            }

            .step-pagination {
                gap: 6px;
                flex-wrap: nowrap;
                overflow-x: auto;
                padding: 0 6px;
                justify-content: center;
                scrollbar-width: none;
            }

            .step-pagination::-webkit-scrollbar {
                display: none;
            }

            .page-btn {
                min-width: 34px;
                width: 34px;
                height: 34px;
                font-size: 13px;
                padding: 0;
                border-radius: 8px;
                flex-shrink: 0;
            }

            .nav-arrow {
                min-width: 30px;
                width: 30px;
                height: 34px;
                font-size: 16px;
            }

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

    <!-- PENGANTAR -->
    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-calculator"></i>
                </div>
                Perhitungan Subnetting
            </div>
            <div class="box-body">
                Perhitungan subnetting pada subbab ini menggunakan metode <strong><i>Fixed Length
                        Subnet Mask</i> (FLSM)</strong> atau <strong>subnetting klasik</strong>. Pada metode ini, setiap
                subnet
                menggunakan subnet mask yang sama sehingga seluruh subnet memiliki jumlah host
                yang sama.

                <br>
                <div class="step-box">
                    <div class="section-title">
                        Langkah-Langkah Perhitungan Subnetting:
                    </div>

                    Dalam menyelesaikan perhitungan subnetting, gunakan langkah-langkah berikut:

                    <ol class="step-list">
                        <li>
                            Tentukan kelas <i>IP address</i> berdasarkan nilai oktet pertama alamat IP.
                        </li>

                        <li>
                            Tentukan <i>subnet mask default</i> sesuai kelas <i>IP address</i>.
                        </li>

                        <li>
                            Tentukan jumlah bit host yang dipinjam untuk <i>subnetting</i>.
                        </li>

                        <li>
                            Hitung jumlah subnet yang dihasilkan menggunakan rumus:

                            <span class="formula-text">
                                Jumlah Subnet = 2<sup>n</sup>
                            </span>

                            <span class="formula-number">(3.1)</span>
                        </li>

                        <li>
                            Hitung jumlah host valid pada setiap subnet menggunakan rumus:

                            <span class="formula-text">
                                Jumlah Host = 2<sup>h</sup> − 2
                            </span>

                            <span class="formula-number">(3.2)</span>
                        </li>

                        <li>
                            Tentukan <i>subnet mask</i> baru setelah proses <i>subnetting</i>.
                        </li>

                        <li>
                            Tentukan nilai blok subnet menggunakan rumus:

                            <span class="formula-text">
                                256 − Nilai Oktet Terakhir <i>Subnet mask</i>
                            </span>

                            <span class="formula-number">(3.3)</span>
                        </li>

                        <li>
                            Tentukan <i>network address</i>, <i>host valid</i>, dan <i>broadcast address</i> pada setiap
                            subnet.
                        </li>
                    </ol>
                </div>

                <br>

                Pilih contoh soal berdasarkan alamat IP berikut:

                <br>
                <div class="ip-switch">
                    <button class="ip-btn active" onclick="switchIP('ip1', event)">
                        192.168.1.0/24
                    </button>
                    <button class="ip-btn" onclick="switchIP('ip2', event)">
                        172.16.10.0/25
                    </button>
                    <button class="ip-btn" onclick="switchIP('ip3', event)">
                        10.10.0.0/22
                    </button>
                </div>

                <br>
                <div id="ip1" class="ip-content active">

                    Sebuah laboratorium komputer memiliki jaringan dengan alamat:
                    <br>
                    <span class="ip-highlight">192.168.1.0/24</span>

                    <br><br>

                    Jika dilakukan subnetting dengan <strong>meminjam 3 bit</strong> dari bagian host, tentukan:
                    <ul>
                        <li>Jumlah subnet yang dihasilkan</li>
                        <li>Jumlah host yang dapat digunakan pada setiap subnet</li>
                        <li>Blok subnet</li>
                        <li>Alamat subnet, host, dan broadcast yang valid</li>
                    </ul>

                    <div class="formula-title">
                        Penyelesaian :
                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            a. Menentukan Jumlah Subnet
                        </div>

                        <div class="formula">
                            Jumlah Subnet = 2<sup>n</sup>
                        </div>

                        <div class="formula-desc">
                            dimana:<br>
                            n = jumlah bit yang dipinjam dari bagian host untuk dijadikan bit network.
                        </div>

                        <div class="formula-desc">
                            Karena meminjam <strong>3 bit</strong> dari bagian host, maka:
                            <div style="text-align:center; font-weight:600; margin:10px 0;">
                                2<sup>3</sup> = 8
                            </div>

                            Artinya jumlah subnet yang dapat dibuat adalah <strong>8 subnet</strong>.
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            b. Menentukan Jumlah Host Per Subnet
                        </div>

                        <div class="formula">
                            Jumlah Host = 2<sup>h</sup> - 2
                        </div>

                        <div class="formula-desc">
                            dimana:<br>
                            h = jumlah bit host yang tersisa setelah dilakukan subnetting.<br>
                            - 2 = dikurang 2 karena 1 alamat network dan 1 alamat broadcast.
                        </div>

                        <div class="formula-desc">
                            Karena meminjam <strong>3 bit</strong> dari bagian host, maka tersisa <strong>5 bit</strong>:
                            <div style="text-align:center; font-weight:600; margin:10px 0;">
                                2<sup>5</sup> - 2 = 32 - 30 = 30
                            </div>

                            Artinya setiap subnet memiliki <strong>30 host yang dapat digunakan.</strong>.
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            c. Menentukan Blok Subnet
                        </div>

                        <div class="formula">
                            256 - Nilai Oktet Terakhir Subnet Mask
                        </div>

                        <div class="formula-desc">
                            Subnet mask awal /24 (255.255.255.0)<br>
                            Karena meminjam 3 bit dari host, maka prefix menjadi:<br>
                            /24 + 3 = <strong>/27</strong><br>
                            Subnet mask baru: <strong>255.255.255.224</strong>
                        </div>

                        <div class="formula-desc">
                            <div style="text-align:center; font-weight:600; margin:10px 0;">
                                256 - 224 = 32
                            </div>

                            Artinya subnet bertambah dengan <strong>kelipatan 32</strong>, yaitu:
                            <br>
                            <strong>0, 32, 64, 96, 128, 160, 192, 224</strong>
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            d. Menentukan Subnet, Host dan Broadcast yang Valid
                        </div>

                        <div class="formula-desc">
                            Untuk setiap blok subnet:<br>
                            <ul style="margin-left:20px; margin-top:8px;">
                                <li><i>Network address</i> = angka awal pada blok <i>subnet</i></li>
                                <li><i>Broadcast address</i> = angka terakhir sebelum <i>subnet</i> berikutnya</li>
                                <li><i>Host</i> valid = alamat di antara <i>network</i> dan <i>broadcast</i></li>
                            </ul>
                        </div>

                        <div class="formula-title">
                            Hasil Perhitungan
                        </div>
                        <div class="table-wrapper">
                            <table class="subnet-table">
                                <tr>
                                    <th>Subnet</th>
                                    <th>Network Address</th>
                                    <th>Host Valid</th>
                                    <th>Broadcast Address</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>192.168.1.<strong>0</strong></td>
                                    <td>192.168.1.<strong>1</strong> – 192.168.1.<strong>30</strong></td>
                                    <td>192.168.1.<strong>31</strong></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>192.168.1.<strong>32</strong></td>
                                    <td>192.168.1.<strong>33</strong> – 192.168.1.<strong>62</strong></td>
                                    <td>192.168.1.<strong>63</strong></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>192.168.1.<strong>64</strong></td>
                                    <td>192.168.1.<strong>65</strong>–192.168.1.<strong>94</strong></td>
                                    <td>192.168.1.<strong>95</strong></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>192.168.1.<strong>96</strong></td>
                                    <td>192.168.1.<strong>97</strong>–192.168.1.<strong>126</strong></td>
                                    <td>192.168.1.<strong>127</strong></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>192.168.1.<strong>128</strong></td>
                                    <td>192.168.1.<strong>129</strong>–192.168.1.<strong>158</strong></td>
                                    <td>192.168.1.<strong>159</strong></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>192.168.1.<strong>160</strong></td>
                                    <td>192.168.1.<strong>161</strong>–192.168.1.<strong>190</strong></td>
                                    <td>192.168.1.<strong>191</strong></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>192.168.1.<strong>192</strong></td>
                                    <td>192.168.1.<strong>193</strong>–192.168.1.<strong>222</strong></td>
                                    <td>192.168.1.<strong>223</strong></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>192.168.1.<strong>224</strong></td>
                                    <td>192.168.1.<strong>225</strong>–192.168.1.<strong>254</strong></td>
                                    <td>192.168.1.<strong>255</strong></td>
                                </tr>
                            </table>
                            <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                                Tabel 3.1<i> Subnet</i>, <i>network</i>, <i>host</i>, dan <i>Broadcast</i> contoh soal
                            </div>
                        </div>

                    </div>
                </div>
                <div id="ip2" class="ip-content">

                    Sebuah gedung perkantoran menggunakan jaringan dengan alamat:
                    <br>
                    <span class="ip-highlight">172.16.10.0/25</span>

                    <br><br>

                    Akan dibagi menjadi <strong>4 subnet</strong>, tentukan:
                    <ul>
                        <li>Jumlah bit yang dipinjam</li>
                        <li>Jumlah host yang dapat digunakan pada setiap subnet</li>
                        <li>Blok subnet</li>
                        <li>Alamat subnet, host, dan broadcast yang valid</li>
                    </ul>

                    <div class="formula-box">

                        <div class="formula-title">
                            a. Menentukan Jumlah Bit yang Dipinjam
                        </div>

                        <div class="formula">
                            Jumlah Subnet = 2<sup>n</sup>
                        </div>

                        <div class="formula-desc">
                            Jumlah subnet yang dibutuhkan = 4<br>
                            Maka:
                            <br>
                            Jumlah Subnet = 2<sup>n</sup>
                            <br><br>
                            2<sup>n</sup> = 4
                            <br>
                            n = 2
                            <br><br>
                            Artinya kita perlu meminjam <strong>2 bit</strong> dari bagian host.
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            b. Menentukan Jumlah Host Per Subnet
                        </div>

                        <div class="formula">
                            Jumlah Host = 2<sup>h</sup> – 2
                        </div>

                        <div class="formula-desc">
                            Jumlah bit host awal = 7 (prefix /25)<br>
                            Karena meminjam 2 bit dari bagian host, maka terdapat 5 bit host yang tersisa, sehingga:
                            <br><br>

                            2<sup>5</sup> - 2 = 32 - 2 = 30
                            <br><br>
                            Artinya setiap subnet memiliki <strong>30 host yang dapat digunakan.</strong>.
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            c. Menentukan Blok Subnet
                        </div>

                        <div class="formula">
                            256 – Nilai Oktet Terakhir Subnet Mask
                        </div>

                        <div class="formula-desc">
                            Subnet mask awal /25 (255.255.255.128)
                            <br>
                            Karena meminjam 2 bit dari host, maka prefix menjadi:<br>
                            /25 + 2 = /27

                            <br><br>
                            Subnet mask baru:
                            <strong>255.255.255.224</strong>
                        </div>

                        <div class="formula-desc">
                            <div style="text-align:center; font-weight:600; margin:10px 0;">
                                256 - 224 = 32
                            </div>

                            Artinya subnet bertambah dengan kelIPatan <strong>32</strong>, yaitu:
                            <br>
                            <strong>0, 32, 64, 96</strong>
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            d. Menentukan Subnet, Host dan Broadcast
                        </div>

                        <div class="formula-desc">
                            Untuk setiap blok subnet:<br>
                            <ul style="margin-left:20px; margin-top:8px;">
                                <li><i>Network address</i> = angka awal pada blok <i>subnet</i></li>
                                <li><i>Broadcast address</i> = angka terakhir sebelum <i>subnet</i> berikutnya</li>
                                <li><i>Host</i> valid = alamat di antara <i>network</i> dan <i>broadcast</i></li>
                            </ul>
                        </div>

                        <div class="formula-title">
                            Hasil Perhitungan
                        </div>

                        <div class="table-wrapper">
                            <table class="subnet-table">
                                <tr>
                                    <th>Subnet</th>
                                    <th>Network Address</th>
                                    <th>Host Valid</th>
                                    <th>Broadcast Address</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>172.16.10.<strong>0</strong></td>
                                    <td>172.16.10.<strong>1</strong>–172.16.10.<strong>30</strong></td>
                                    <td>172.16.10.<strong>31</strong></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>172.16.10.<strong>32</strong></td>
                                    <td>172.16.10.<strong>33</strong>–172.16.10.<strong>62</strong></td>
                                    <td>172.16.10.<strong>63</strong></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>172.16.10.<strong>64</strong></td>
                                    <td>172.16.10.<strong>65</strong>–172.16.10.<strong>94</strong></td>
                                    <td>172.16.10.<strong>95</strong></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>172.16.10.<strong>96</strong></td>
                                    <td>172.16.10.<strong>97</strong>–172.16.10.<strong>126</strong></td>
                                    <td>172.16.10.<strong>127</strong></td>
                                </tr>
                            </table>
                            <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                                Tabel 3.2 <i>Subnet</i>, <i>network</i>, <i>host</i>, dan <i>Broadcast</i> contoh soal 2
                            </div>
                        </div>

                    </div>
                </div>

                <div id="ip3" class="ip-content">

                    Sebuah perusahaan penyedia layanan internet menggunakan jaringan dengan alamat:
                    <br>
                    <span class="ip-highlight">10.10.0.0/22</span>

                    <br><br>

                    Akan dibagi menjadi <strong>8 subnet</strong>, tentukan:
                    <ul>
                        <li>Jumlah bit yang dipinjam</li>
                        <li>Jumlah host yang dapat digunakan pada setiap subnet</li>
                        <li>Blok subnet</li>
                        <li>Alamat subnet, host, dan broadcast yang valid</li>
                    </ul>

                    <div class="formula-box">

                        <div class="formula-title">
                            a. Menentukan Jumlah Bit yang Dipinjam
                        </div>

                        <div class="formula">
                            Jumlah Subnet = 2<sup>n</sup>
                        </div>

                        <div class="formula-desc">
                            Jumlah subnet yang dibutuhkan = 8
                            <br>
                            Maka:
                            <br><br>
                            Jumlah Subnet = 2<sup>n</sup><br>
                            2<sup>n</sup> = 8
                            <br>
                            n = 3
                            <br><br>
                            Artinya kita perlu meminjam <strong>3 bit</strong> dari bagian host.
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            b. Menentukan Jumlah Host Per Subnet
                        </div>

                        <div class="formula">
                            Jumlah Host = 2<sup>h</sup> – 2
                        </div>

                        <div class="formula-desc">
                            Jumlah bit host awal = 10 (prefix /22)<br>
                            Karena meminjam 3 bit dari bagian host, maka terdapat 7 bit host yang tersisa, sehingga:
                            <br><br>

                            2<sup>7</sup> - 2 = 128 - 2 = <strong>126</strong>
                            <br><br>
                            Artinya setiap subnet memiliki <strong>126 host yang dapat digunakan.</strong>.
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            c. Menentukan Blok Subnet
                        </div>

                        <div class="formula">
                            256 – Nilai Oktet Terakhir Subnet Mask
                        </div>

                        <div class="formula-desc">
                            Subnet mask awal <strong>/22</strong> (255.255.252.0)

                            Karena meminjam 3 bit dari host, maka prefix menjadi:<br>
                            /22 + 3 = <strong>/25</strong>
                            <br><br>

                            Subnet mask baru:
                            <strong>255.255.255.128</strong>
                        </div>

                        <div class="formula-desc">
                            <div style="text-align:center; font-weight:600; margin:10px 0;">
                                256 - 128 = 128
                            </div>

                            Artinya subnet bertambah dengan kelipatan <strong>128</strong>, yaitu:
                            <br>
                            <strong>0, 128</strong>
                        </div>

                    </div>

                    <div class="formula-box">

                        <div class="formula-title">
                            d. Menentukan Subnet, Host dan Broadcast
                        </div>

                        <div class="formula-desc">
                            Untuk setiap blok subnet:<br>
                            <ul style="margin-left:20px; margin-top:8px;">
                                <li><i>Network address</i> = angka awal pada blok <i>subnet</i></li>
                                <li><i>Broadcast address</i> = angka terakhir sebelum <i>subnet</i> berikutnya</li>
                                <li><i>Host</i> valid = alamat di antara <i>network</i> dan <i>broadcast</i></li>
                            </ul>
                        </div>

                        <div class="formula-title">
                            Hasil Perhitungan
                        </div>

                        <div class="table-wrapper">
                            <table class="subnet-table">
                                <tr>
                                    <th>Subnet</th>
                                    <th>Network Address</th>
                                    <th>Host Valid</th>
                                    <th>Broadcast Address</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>10.10.0.<strong>0</strong></td>
                                    <td>10.10.0.<strong>1</strong>–10.10.0.<strong>126</strong></td>
                                    <td>10.10.0.<strong>127</strong></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>10.10.0.<strong>128</strong></td>
                                    <td>10.10.0.<strong>129</strong>–10.10.0.<strong>254</strong></td>
                                    <td>10.10.0.<strong>255</strong></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>10.10.1.<strong>0</strong></td>
                                    <td>10.10.1.<strong>1</strong>–10.10.1.<strong>126</strong></td>
                                    <td>10.10.1.<strong>127</strong></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>10.10.1.<strong>128</strong></td>
                                    <td>10.10.1.<strong>129</strong>–10.10.1.<strong>254</strong></td>
                                    <td>10.10.1.<strong>255</strong></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>10.10.2.<strong>0</strong></td>
                                    <td>10.10.2.<strong>1</strong>–10.10.2.<strong>126</strong></td>
                                    <td>10.10.2.<strong>127</strong></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>10.10.2.<strong>128</strong></td>
                                    <td>10.10.2.<strong>129</strong>–10.10.2.<strong>254</strong></td>
                                    <td>10.10.2.<strong>255</strong></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>10.10.3.<strong>0</strong></td>
                                    <td>10.10.3.<strong>1</strong>–10.10.3.<strong>126</strong></td>
                                    <td>10.10.3.<strong>127</strong></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>10.10.3.<strong>128</strong></td>
                                    <td>10.10.3.<strong>129</strong>–10.10.3.<strong>254</strong></td>
                                    <td>10.10.3.<strong>255</strong></td>
                                </tr>
                            </table>
                            <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                                Tabel 3.3 <i>Subnet</i>, <i>network</i>, <i>host</i>, dan <i>Broadcast</i> contoh soal 3
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-calculator"></i>
                </div>
                Latihan
            </div>
            <div class="box-body">

                <div class="info-box">

                    <div class="info-title">
                        Latihan
                    </div>

                    Diketahui sebuah jaringan dengan alamat:

                    <br>
                    <span class="ip-highlight">192.10.10.0/24</span>

                    <br>

                    Jika dilakukan subnetting dengan <strong>meminjam 2 bit</strong> dari bagian host, tentukan:

                    <ul>
                        <li>Jumlah subnet yang dihasilkan</li>
                        <li>Jumlah host yang dapat digunakan pada setiap subnet</li>
                        <li>Blok subnet</li>
                        <li>Alamat subnet, host, dan broadcast yang valid</li>
                    </ul>

                    <div class="formula-title">
                        Penyelesaian (isi langkah berikut):
                    </div>

                    <!-- a -->
                    <div class="formula-box">

                        <div class="formula-title">
                            a. Menentukan Jumlah Subnet
                        </div>

                        <div class="formula">
                            Jumlah Subnet = 2<sup>n</sup>
                        </div>

                        <div class="formula-desc">
                            Karena meminjam <strong>2 bit</strong> dari bagian host, maka:
                            <br><br>

                            <strong>2<sup>2</sup></strong> =
                            <input class="fill-input" id="cs3-subnet" placeholder="...">

                        </div>

                        <div style="margin-top:10px;">
                            <button class="btn-cek" onclick="cekA()">
                                Cek Jawaban
                            </button>
                        </div>
                    </div>

                    <!-- b -->
                    <div class="formula-box">

                        <div class="formula-title">
                            b. Menentukan Jumlah Host Per Subnet
                        </div>

                        <div class="formula">
                            Jumlah Host = 2<sup>h</sup> - 2
                        </div>

                        <div class="formula-desc">
                            Karena meminjam 2 bit dari bagian host, maka jumlah bit host tersisa = 8 - 2 = 6
                            <br><br>

                            <strong>2<sup>6</sup> - 2</strong> =
                            <input class="fill-input" id="cs3-host" placeholder="...">
                        </div>

                        <div style="margin-top:10px;">
                            <button class="btn-cek" onclick="cekB()">
                                Cek Jawaban
                            </button>
                        </div>
                    </div>

                    <!-- c -->
                    <div class="formula-box">

                        <div class="formula-title">
                            c. Menentukan Blok Subnet
                        </div>

                        <div class="formula">
                            256 - Nilai Oktet Terakhir Subnet Mask
                        </div>

                        <div class="formula-desc">
                            <strong>/24 + 2</strong> =
                            <input class="fill-input" id="cs3-prefix" placeholder="...">

                            <br><br>

                            <strong>Subnet mask baru</strong>=
                            <input class="fill-input" id="cs3-mask" placeholder="...">
                        </div>

                        <div class="formula-desc">
                            <strong>Blok subnet = 256 - 192</strong> =
                            <input class="fill-input" id="cs3-blok" placeholder="...">
                        </div>

                        <div style="margin-top:10px;">
                            <button class="btn-cek" onclick="cekC()">
                                Cek Jawaban
                            </button>
                        </div>
                    </div>

                    <!-- d -->
                    <div class="formula-box">

                        <div class="formula-title">
                            d. Menentukan Network, Host, dan Broadcast yang Valid
                        </div>

                        <div class="table-responsive">
                            <table class="table-subnet-input">

                                <thead>
                                    <tr>
                                        <th>Subnet</th>
                                        <th><i>Network Address</i></th>
                                        <th>Host Valid</th>
                                        <th><i>Broadcast Address</i></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>1</td>

                                        <td>
                                            <input type="text" class="table-input" id="subnet1-network" placeholder="...">
                                        </td>

                                        <td class="host-col">
                                            <input type="text" class="table-input" id="subnet1-host"
                                                placeholder="... - ...">
                                        </td>

                                        <td>
                                            <input type="text" class="table-input" id="subnet1-broadcast" placeholder="...">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>

                                        <td>
                                            <input type="text" class="table-input" id="subnet2-network" placeholder="...">
                                        </td>

                                        <td class="host-col">
                                            <input type="text" class="table-input" id="subnet2-host"
                                                placeholder="... - ...">
                                        </td>

                                        <td>
                                            <input type="text" class="table-input" id="subnet2-broadcast" placeholder="...">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>

                                        <td>
                                            <input type="text" class="table-input" id="subnet3-network" placeholder="...">
                                        </td>

                                        <td class="host-col">
                                            <input type="text" class="table-input" id="subnet3-host"
                                                placeholder="... - ...">
                                        </td>

                                        <td>
                                            <input type="text" class="table-input" id="subnet3-broadcast" placeholder="...">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4</td>

                                        <td>
                                            <input type="text" class="table-input" id="subnet4-network" placeholder="...">
                                        </td>

                                        <td class="host-col">
                                            <input type="text" class="table-input" id="subnet4-host"
                                                placeholder="... - ...">
                                        </td>

                                        <td>
                                            <input type="text" class="table-input" id="subnet4-broadcast" placeholder="...">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                                Tabel 3. 4 Subnet, network, host dan broadcast latihan!
                            </div>
                        </div>

                        <div style="margin-top:15px;">
                            <button class="btn-cek" onclick="cekD()">
                                Cek Jawaban
                            </button>
                        </div>

                    </div>

                    <p id="cs3-feedback" style="text-align:center; margin-top:10px;"></p>

                </div>
            </div>
        </div>
    </div>

    <div class="step-section" id="step3">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-calculator"></i>
                </div>
                Ayo Berlatih
            </div>
            <div class="box-body">

                <div class="question-box">

                    <h4 class="conversion-title">Ayo Berlatih!</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>
                        <ol>
                            <li>Perhatikan data yang diberikan.</li>
                            <li>Tentukan kelas IP dan <i>subnet mask default</i>.</li>
                            <li>Hitung bit yang dipinjam <strong>(2<sup>n</sup>)</strong>.</li>
                            <li>Tentukan <i>subnet mask</i> baru.</li>
                            <li>Hitung jumlah subnet <strong>(2<sup>n</sup>)</strong>.</li>
                            <li>Hitung jumlah host per subnet <strong>(2<sup>h</sup> - 2)</strong>.</li>
                            <li>Tentukan blok subnet <strong>(256 - nilai subnet mask terakhir)</strong>.</li>
                            <li>Isi jawaban pada kolom yang tersedia dengan tepat.</li>
                            <li>Jika kolom berwarna <span style="color:#15803d; font-weight:600;"> hijau </span>, maka
                                jawaban benar. Jika kolom berwarna <span style="color:#b91c1c; font-weight:600;"> merah
                                </span>, maka jawaban salah. </li>
                            <li>Gunakan <em>Scratch Area</em> untuk membantu proses perhitungan. Klik ikon
                                <i class="bi bi-info-circle"></i>
                                untuk melihat petunjuk penggunaan canvas.
                            </li>
                        </ol>
                    </div>

                    <div class="question-box network-host-layout">
                        <div class="latihan-subnet">

                            <div class="latihan-form">

                                @php
                                    $data = json_decode($mudah->soal);
                                    $jawaban = json_decode($mudah->jawaban_benar);
                                @endphp

                                <div class="latihan-row">
                                    <label>Jumlah subnet yang dibutuhkan</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data->subnet }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah host yang dibutuhkan per subnet</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data->host_kebutuhan }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Alamat IP</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data->ip }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Kelas IP</label>
                                    <div class="input-line">
                                        <input type="text" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Subnet Mask Default</label>
                                    <div class="input-line">
                                        <input type="text" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Subnet Mask Baru</label>
                                    <div class="input-line">
                                        <input type="text" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah Subnet</label>
                                    <div class="input-line">
                                        <input type="text" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah Host yang Valid</label>
                                    <div class="input-line">
                                        <input type="text" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah bit yang dipinjam</label>
                                    <div class="input-line">
                                        <input type="text" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Blok Subnet</label>
                                    <div class="input-line">
                                        <input type="text" placeholder="...">
                                    </div>
                                </div>

                            </div>

                            <div class="scratch-layout">

                                <div class="scratch-area">

                                    <div class="scratch-header">

                                        <div class="scratch-title">
                                            <em>Scratch Area</em>
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

        </div>
    </div>

    <div class="step-section" id="step4">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-calculator"></i>
                </div>
                Ayo Berlatih
            </div>
            <div class="box-body">

                <div class="question-box">

                    <h4 class="conversion-title">Ayo Berlatih 2</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>
                        <ol>
                            <li>Perhatikan data yang diberikan.</li>
                            <li>Tentukan kelas IP dan <i>subnet mask default</i>.</li>
                            <li>Hitung bit yang dipinjam <strong>(2<sup>n</sup>)</strong>.</li>
                            <li>Tentukan <i>subnet mask</i> baru.</li>
                            <li>Hitung jumlah subnet <strong>(2<sup>n</sup>)</strong>.</li>
                            <li>Hitung jumlah host per subnet <strong>(2<sup>h</sup> - 2)</strong>.</li>
                            <li>Tentukan blok subnet <strong>(256 - nilai subnet mask terakhir)</strong>.</li>
                            <li>Isi jawaban pada kolom yang tersedia dengan tepat.</li>
                            <li>Jika kolom berwarna <span style="color:#15803d; font-weight:600;"> hijau </span>, maka
                                jawaban benar. Jika kolom berwarna <span style="color:#b91c1c; font-weight:600;"> merah
                                </span>, maka jawaban salah. </li>
                            <li>Gunakan tabel di bawah untuk membantu perhitungan.</li>
                        </ol>
                    </div>

                    <div class="question-box network-host-layout">
                        <div class="latihan-subnet">

                            <div class="latihan-form">

                                @php
                                    $data2 = json_decode($sedang->soal);
                                    $jawaban2 = json_decode($sedang->jawaban_benar);
                                @endphp

                                <div class="latihan-row">
                                    <label>Jumlah subnet yang dibutuhkan</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data2->subnet }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah host yang dibutuhkan per subnet</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data2->host_kebutuhan }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Alamat IP</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data2->ip }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Kelas IP</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-kelas" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Subnet Mask Default</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-default" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Subnet Mask Baru</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-baru" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah Subnet</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-subnet" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah Host yang Valid</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-host" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah bit yang dipinjam</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-bit" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Blok Subnet</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-blok" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row long-text">
                                    <label>Berapakah rentang subnet ke-{{ $jawaban2->target->range }}?</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-range4" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row long-text">
                                    <label> Berapakah network address untuk subnet
                                        ke-{{ $jawaban2->target->network }}?</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-net8" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row long-text">
                                    <label>Berapakah alamat broadcast untuk subnet
                                        ke-{{ $jawaban2->target->broadcast }}?</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-bc13" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row long-text">
                                    <label>Berapakah alamat host yang dapat digunakan pada subnet
                                        ke-{{ $jawaban2->target->host }}?</label>
                                    <div class="input-line">
                                        <input type="text" id="l2-host9" placeholder="...">
                                    </div>
                                </div>

                            </div>

                            <div class="scratch-layout">

                                <div class="scratch-area">

                                    <!-- PETUNJUK -->
                                    <div class="table-guide">
                                        <div class="instruction-title">Cara Menggunakan Tabel</div>
                                        <ol>
                                            <li>Klik sel untuk mengetik</li>
                                            <li>Isi nomor Subnet, Network, Host Range, dan Broadcast</li>
                                            <li>Klik kanan untuk tambah baris maupun hapus baris</li>
                                        </ol>
                                    </div>

                                    <div id="hot"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="step-section" id="step5">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-calculator"></i>
                </div>
                Ayo Berlatih
            </div>
            <div class="box-body">

                <div class="question-box">

                    <h4 class="conversion-title">Ayo Berlatih 3</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>
                        <ol>
                            <li>Perhatikan data yang diberikan.</li>
                            <li>Tentukan kelas IP dan <i>subnet mask default</i>.</li>
                            <li>Hitung bit yang dipinjam <strong>(2<sup>n</sup>)</strong>.</li>
                            <li>Tentukan <i>subnet mask</i> baru.</li>
                            <li>Hitung jumlah subnet <strong>(2<sup>n</sup>)</strong>.</li>
                            <li>Hitung jumlah host per subnet <strong>(2<sup>h</sup> - 2)</strong>.</li>
                            <li>Tentukan blok subnet <strong>(256 - nilai subnet mask terakhir)</strong>.</li>
                            <li>Isi jawaban pada kolom yang tersedia dengan tepat.</li>
                            <li>Jika kolom berwarna <span style="color:#15803d; font-weight:600;"> hijau </span>, maka
                                jawaban benar. Jika kolom berwarna <span style="color:#b91c1c; font-weight:600;"> merah
                                </span>, maka jawaban salah. </li>
                            <li>Gunakan tabel di bawah untuk membantu perhitungan.</li>
                        </ol>
                    </div>

                    <div class="question-box network-host-layout">
                        <div class="latihan-subnet">

                            <div class="latihan-form">

                                @php
                                    $data3 = json_decode($sulit->soal);
                                    $jawaban3 = json_decode($sulit->jawaban_benar);
                                @endphp

                                <div class="latihan-row">
                                    <label>Jumlah subnet yang dibutuhkan</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data3->subnet }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah host yang dibutuhkan per subnet</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data3->host_kebutuhan }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Alamat IP</label>
                                    <div class="input-line static">
                                        <span class="value">{{ $data3->ip }}</span>
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Kelas IP</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-kelas" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Subnet Mask Default</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-default" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Subnet Mask Baru</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-baru" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah Subnet</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-subnet" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah Host yang Valid</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-host" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Jumlah bit yang dipinjam</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-bit" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row">
                                    <label>Blok Subnet</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-blok" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row long-text">
                                    <label>Berapakah rentang subnet ke-{{ $jawaban3->target->range ?? '?' }}?</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-range4" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row long-text">
                                    <label>Berapakah network address untuk subnet
                                        ke-{{ $jawaban3->target->network ?? '?' }}?</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-net8" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row long-text">
                                    <label>Berapakah alamat broadcast untuk subnet
                                        ke-{{ $jawaban3->target->broadcast ?? '?' }}?</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-bc13" placeholder="...">
                                    </div>
                                </div>

                                <div class="latihan-row long-text">
                                    <label>Berapakah alamat host yang dapat digunakan pada subnet
                                        ke-{{ $jawaban3->target->host ?? '?' }}?</label>
                                    <div class="input-line">
                                        <input type="text" id="l3-host9" placeholder="...">
                                    </div>
                                </div>

                            </div>

                            <div class="scratch-layout">

                                <div class="scratch-area">

                                    <!-- PETUNJUK -->
                                    <div class="table-guide">
                                        <div class="instruction-title">Cara Menggunakan Tabel</div>
                                        <ol>
                                            <li>Klik sel untuk mengetik</li>
                                            <li>Isi nomor Subnet, Network, Host Range, dan Broadcast</li>
                                            <li>Klik kanan untuk tambah baris maupun hapus baris</li>
                                        </ol>
                                    </div>

                                    <div id="hot2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="step-section" id="step6">
        <!-- aktivitas -->
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Aktivitas 3.2
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

        <button class="page-btn nav-arrow" onclick="prevStep()">‹</button>

        <button class="page-btn" onclick="goToStep(1)" id="stepBtn1">1</button>
        <button class="page-btn" onclick="goToStep(2)" id="stepBtn2">2</button>
        <button class="page-btn" onclick="goToStep(3)" id="stepBtn3">3</button>
        <button class="page-btn" onclick="goToStep(4)" id="stepBtn4">4</button>
        <button class="page-btn" onclick="goToStep(5)" id="stepBtn5">5</button>
        <button class="page-btn" onclick="goToStep(6)" id="stepBtn6">6</button>

        <button class="page-btn nav-arrow" onclick="nextStep()">›</button>

    </div>

    <div class="nav-bottom">
        <a href="/bab3/subnetting" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab3/rangkuman-bab3" class="nav-btn nav-next" onclick="konfirmasiLanjut(event)">
            Halaman Selanjutnya
        </a>
    </div>
    </div>

    <div class="cek-floating" id="cekBtn">
        <button class="btn-cek" onclick="handleCek()">Cek Jawaban</button>
        <button class="btn-reset" onclick="handleReset()">Reset</button>
    </div>

    <script>

        const kunci = @json($jawaban);
        const kunci2 = @json($jawaban2);
        const kunci3 = @json($jawaban3);

        let startTime = Date.now();
        let sudahLulusPemahaman = false;
        let progressState = {
            membaca: false,
            pemahaman: false,
            mencoba: false,
            latihan1: false,
            latihan2: false,
            latihan3: false,
            aktivitas: false
        };

        function sudahBacaMinimal() {
            let waktu = (Date.now() - startTime) / 1000;

            if (waktu >= 120) {
                progressState.membaca = true;
                return true;
            }
            return false;
        }

        function konfirmasiLanjut(event) {
            if (event) event.preventDefault();

            // =====================
            // 1. CEK BACA
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
            if (!progressState.pemahaman) {
                Swal.fire({
                    title: "Cek Pemahaman",
                    html: `
                                                                            <div style="text-align:left">

                                                                                <p style="text-align:center; font-weight:700; margin-bottom:16px;">
                                                                                    Fungsi dari rumus 2<sup>h</sup> - 2 adalah?
                                                                                </p>

                                                                                <div class="swal-options">

                                                                                    <label class="swal-option">
                                                                                        <input type="radio" name="jawaban" value="a">
                                                                                        <span>Menentukan jumlah subnet</span>
                                                                                    </label>

                                                                                    <label class="swal-option">
                                                                                        <input type="radio" name="jawaban" value="b">
                                                                                        <span>Menentukan jumlah host</span>
                                                                                    </label>

                                                                                    <label class="swal-option">
                                                                                        <input type="radio" name="jawaban" value="c">
                                                                                        <span>Menentukan subnet mask</span>
                                                                                    </label>

                                                                                    <label class="swal-option">
                                                                                        <input type="radio" name="jawaban" value="d">
                                                                                        <span>Menentukan network address</span>
                                                                                    </label>

                                                                                </div>

                                                                            </div>
                                                                        `,
                    confirmButtonText: "Kirim",
                    showCancelButton: true,
                    cancelButtonText: "Cancel",

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

                            progressState.pemahaman = true;

                            Swal.fire({
                                icon: "success",
                                title: "Benar!"
                            }).then(() => {
                                konfirmasiLanjut();
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
            let belum = [];

            if (!progressState.mencoba) belum.push("Ayo Mencoba");
            if (!progressState.latihan1) belum.push("Latihan 1");
            if (!progressState.latihan2) belum.push("Latihan 2");
            if (!progressState.latihan3) belum.push("Latihan 3");
            if (!progressState.aktivitas) belum.push("Aktivitas");

            if (belum.length > 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                                                                            Tapi, kamu belum menyelesaikan:<br><br>
                                                                            <b>${belum.join("<br>")}</b><br><br>
                                                                            Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                                                                        `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu",
                    reverseButtons: true,
                    allowOutsideClick: false
                }).then((result) => {

                    // kalau tetap lanjut
                    if (result.isConfirmed) {
                        window.location.href = "/bab3/vlsm";
                    }

                    // kalau kerjakan dulu → scroll ke latihan
                    if (result.dismiss === Swal.DismissReason.cancel) {

                        // cari step pertama yang belum selesai
                        if (!progressState.mencoba) {
                            goToStep(2);
                        } else if (!progressState.latihan1) {
                            goToStep(3);
                        } else if (!progressState.latihan2) {
                            goToStep(4);
                        } else if (!progressState.latihan3) {
                            goToStep(5);
                        } else if (!progressState.aktivitas) {
                            goToStep(6);
                        }

                    }

                });
                return;
            }

            // =====================
            // 4. KIRIM PROGRESS
            // =====================
            fetch(`/progres/selesai/${encodeURIComponent("Subnetting")}/${encodeURIComponent("Perhitungan Subnetting")}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(() => {
                window.location.href = "/bab3/vlsm";
            });
        }

        let hot = null;
        let hot2 = null;

        function showStep(step) {
            document.querySelectorAll(".step-section").forEach(el => {
                el.classList.remove("active");
            });

            document.getElementById("step" + step).classList.add("active");

            // TAMBAHKAN INI
            if (step === 4 && !hot) {
                setTimeout(() => {
                    const container = document.getElementById('hot');

                    hot = new Handsontable(container, {
                        data: [
                            ['', '', '', ''],
                            ['', '', '', ''],
                            ['', '', '', ''],
                            ['', '', '', '']
                        ],

                        colHeaders: ['Subnet', 'Network', 'Host Range', 'Broadcast'],
                        rowHeaders: true,

                        columns: [
                            {},
                            {},
                            {},
                            {}
                        ],

                        colWidths: [80, 150, 300, 150],
                        stretchH: 'all',
                        width: '100%',
                        manualColumnResize: true,
                        manualColumnMove: true,
                        contextMenu: true,

                        contextMenu: true,

                        licenseKey: 'non-commercial-and-evaluation',
                        width: '100%',
                        height: 400
                    });
                }, 100);
            }

            // STEP 5
            if (step === 5 && !hot2) {
                setTimeout(() => {
                    const container = document.getElementById('hot2');

                    hot2 = new Handsontable(container, {
                        data: [
                            ['', '', '', ''],
                            ['', '', '', ''],
                            ['', '', '', ''],
                            ['', '', '', '']
                        ],

                        colHeaders: ['Subnet', 'Network', 'Host Range', 'Broadcast'],
                        rowHeaders: true,

                        columns: [
                            {},
                            {},
                            {},
                            {}
                        ],

                        colWidths: [80, 150, 300, 150],
                        stretchH: 'all',
                        width: '100%',
                        height: 400,

                        contextMenu: true,
                        minSpareRows: 1,
                        manualColumnResize: true,

                        licenseKey: 'non-commercial-and-evaluation'
                    });
                }, 100);
            }

            // kontrol tombol cek
            const cekBtn = document.getElementById("cekBtn");

            if (step === 3 || step === 4 || step === 5) {
                cekBtn.style.display = "flex";
            } else {
                cekBtn.style.display = "none";
            }

            updatePagination();
        }

        function switchIP(id, event) {
            // sembunyikan semua konten
            document.querySelectorAll('.ip-content').forEach(function (el) {
                el.classList.remove('active');
            });

            // reset semua button
            document.querySelectorAll('.ip-btn').forEach(function (btn) {
                btn.classList.remove('active');
            });

            // tampilkan konten yang dipilih
            document.getElementById(id).classList.add('active');

            // aktifkan button yang diklik
            event.target.classList.add('active');
        }


        let soal = [];
        let indexSoal = 0;
        let statusTerkunci = [];

        fetch("/aktivitas/perhitungan-subnetting/soal")
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
                                                                        <div class="question-text">${data.q}</div>
                                                                `;

            if (data.tipe === "pilgan") {

                html += `<div class="options">`;

                data.opsi.forEach((o, i) => {
                    html += `
                                                                            <label class="option">
                                                                                <input type="radio" name="jawaban" value="${i}" ${terkunci ? "disabled" : ""}>
                                                                                <span class="option-text">${o}</span>
                                                                            </label>
                                                                        `;
                });

                html += `</div>`;
            }

            if (data.tipe === "isian") {
                html += `
                                                                        <input type="text"
                                                                                id="jawabanIsian"
                                                                                class="fill-input"
                                                                                placeholder="Jawaban"
                                                                                ${terkunci ? "disabled" : ""}
                                                                        >
                                                                    `;
            }

            html += `</div>`;

            quizContainer.innerHTML = html;

            if (window.MathJax) {
                MathJax.typesetPromise();
            }

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
            let jawabanUser = null;

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

            fetch("/aktivitas/perhitungan-subnetting/cek", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id_soal: soal[indexSoal].id,
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
                            '<i class="bi bi-x-circle-fill"></i> Jawaban salah, coba lagi';
                        feedback.style.color = "#b91c1c";
                    }

                });
        }

        function nextSoal() {

            if (!statusTerkunci[indexSoal]) return;

            if (indexSoal === soal.length - 1) {
                tampilkanHasil();
                return;
            }

            indexSoal++;
            renderSoal();
        }


        function prevSoal() {
            if (indexSoal === 0) return;
            indexSoal--;
            renderSoal();
        }

        function tampilkanHasil() {

            progressState.aktivitas = true;

            Swal.fire({
                icon: "success",
                title: "Aktivitas Selesai",
                text: "Semua soal telah dijawab dengan benar!",
                confirmButtonText: "Lanjut"
            }).then(() => {
                konfirmasiLanjut(); // lanjut ke validasi utama
            });
        }

        function semuaSelesai() {
            return Object.values(progressState).every(v => v === true);
        }

        function kirimProgress() {

            if (!semuaSelesai()) {
                console.log("Belum lengkap:", progressState);
                return;
            }

            const bab = encodeURIComponent("Subnetting");
            const subbab = encodeURIComponent("Perhitungan Subnetting");

            fetch(`/progres/selesai/${bab}/${subbab}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(() => {
                    console.log("Progress berhasil dikirim");
                })
                .catch(() => {
                    console.log("Gagal kirim progress");
                });
        }

        let currentStep = 1;
        const totalStep = 6;

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
            showStep(currentStep);
            updatePagination();
        }

        updatePagination();

        function updatePagination() {
            for (let i = 1; i <= totalStep; i++) {
                const btn = document.getElementById("stepBtn" + i);
                btn.classList.remove("active");

                if (i === currentStep) {
                    btn.classList.add("active");
                }
            }
        }

        function normal(val) {
            return val.replace(/\s+/g, "").toLowerCase();
        }

        function tandai(el, benar) {

            let parent = el.closest(".input-line");

            // reset class input
            el.classList.remove("correct", "wrong");

            // reset parent kalau ada
            if (parent) {
                parent.classList.remove("correct", "wrong");
            }

            if (benar) {

                // warna parent
                if (parent) {
                    parent.classList.add("correct");
                }

                // warna input
                el.classList.add("correct");

            } else {

                // warna parent
                if (parent) {
                    parent.classList.add("wrong");
                }

                // warna input
                el.classList.add("wrong");
            }
        }

        /* ===== A ===== */
        function cekA() {
            let el = document.getElementById("cs3-subnet");
            let benar = normal(el.value) === "4";

            tandai(el, benar);
            showAlert(benar);
        }

        /* ===== B ===== */
        function cekB() {
            let el = document.getElementById("cs3-host");
            let benar = normal(el.value) === "62";

            tandai(el, benar);
            showAlert(benar);
        }

        /* ===== C ===== */
        function cekC() {

            let prefix = document.getElementById("cs3-prefix");
            let mask = document.getElementById("cs3-mask");
            let blok = document.getElementById("cs3-blok");

            let b1 = normal(prefix.value) === "/26";
            let b2 = normal(mask.value) === "255.255.255.192";
            let b3 = normal(blok.value) === "64";

            tandai(prefix, b1);
            tandai(mask, b2);
            tandai(blok, b3);

            let semuaBenar = b1 && b2 && b3;
            showAlert(semuaBenar);
        }

        /* ===== D ===== */
        function cekD() {

            const jawaban = {

                subnet1: {
                    network: "192.10.10.0",
                    host: "192.10.10.1-192.10.10.62",
                    broadcast: "192.10.10.63"
                },

                subnet2: {
                    network: "192.10.10.64",
                    host: "192.10.10.65-192.10.10.126",
                    broadcast: "192.10.10.127"
                },

                subnet3: {
                    network: "192.10.10.128",
                    host: "192.10.10.129-192.10.10.190",
                    broadcast: "192.10.10.191"
                },

                subnet4: {
                    network: "192.10.10.192",
                    host: "192.10.10.193-192.10.10.254",
                    broadcast: "192.10.10.255"
                }
            };

            let semuaBenar = true;

            function cekInput(id, jawabanBenar) {

                let el = document.getElementById(id);

                let val = normal(el.value);
                let benar = normal(jawabanBenar);

                /* reset */
                el.classList.remove("correct", "wrong");

                if (val === benar) {

                    el.classList.add("correct");

                } else {

                    el.classList.add("wrong");
                    semuaBenar = false;
                }
            }

            /* subnet 1 */
            cekInput("subnet1-network", jawaban.subnet1.network);
            cekInput("subnet1-host", jawaban.subnet1.host);
            cekInput("subnet1-broadcast", jawaban.subnet1.broadcast);

            /* subnet 2 */
            cekInput("subnet2-network", jawaban.subnet2.network);
            cekInput("subnet2-host", jawaban.subnet2.host);
            cekInput("subnet2-broadcast", jawaban.subnet2.broadcast);

            /* subnet 3 */
            cekInput("subnet3-network", jawaban.subnet3.network);
            cekInput("subnet3-host", jawaban.subnet3.host);
            cekInput("subnet3-broadcast", jawaban.subnet3.broadcast);

            /* subnet 4 */
            cekInput("subnet4-network", jawaban.subnet4.network);
            cekInput("subnet4-host", jawaban.subnet4.host);
            cekInput("subnet4-broadcast", jawaban.subnet4.broadcast);

            /* hasil */
            if (semuaBenar) {
                progressState.mencoba = true;
            }

            showAlert(semuaBenar);
        }

        function showAlert(benar, pesan = "") {
            Swal.fire({
                icon: benar ? "success" : "error",
                title: benar ? "Benar!" : "Masih Salah",
                text: benar
                    ? "Jawaban kamu sudah tepat"
                    : "Coba perhatikan lagi ya!",
                confirmButtonText: "OK",
            });
        }

        function cekLatihan1() {

            let benarSemua = true;

            function cekInput(el, jawaban) {
                let val = normal(el.value);

                let cocok = Array.isArray(jawaban)
                    ? jawaban.map(j => normal(j)).includes(val)
                    : val === normal(jawaban);

                tandai(el, cocok);

                if (!cocok) benarSemua = false;
            }

            let inputs = document.querySelectorAll("#step3 input");

            cekInput(inputs[0], [kunci.kelas_ip]);
            cekInput(inputs[1], [kunci.subnet_mask_default]);
            cekInput(inputs[2], [kunci.subnet_mask_baru]);
            cekInput(inputs[3], [kunci.jumlah_subnet.toString()]);
            cekInput(inputs[4], [kunci.host_valid.toString()]);
            cekInput(inputs[5], [kunci.bit_dipinjam.toString()]);
            cekInput(inputs[6], [kunci.blok_subnet.toString()]);

            if (benarSemua) {

                progressState.latihan1 = true;

                Swal.fire({
                    icon: "success",
                    title: "Mantap!",
                    text: "Semua jawaban kamu benar",
                    showCancelButton: true,
                    confirmButtonText: "Lanjut",
                    cancelButtonText: "Kerjakan Kembali",
                    reverseButtons: true
                }).then((result) => {

                    if (result.isConfirmed) {
                        goToStep(4);
                    } else {
                        resetLatihan1();
                    }

                });

            } else {

                Swal.fire({
                    icon: "error",
                    title: "Masih ada yang salah",
                    text: "Coba cek lagi ya"
                });
            }
        }

        function cekLatihan2() {

            let benarSemua = true;

            function cek(id, jawaban) {
                let el = document.getElementById(id);
                let val = normal(el.value);

                let cocok = Array.isArray(jawaban)
                    ? jawaban.map(j => normal(j)).includes(val)
                    : val === normal(jawaban);

                tandai(el, cocok);

                if (!cocok) benarSemua = false;
            }

            // ===== CEK DASAR =====
            cek("l2-kelas", [kunci2.kelas_ip]);
            cek("l2-default", [kunci2.subnet_mask_default]);
            cek("l2-baru", [kunci2.subnet_mask_baru]);
            cek("l2-subnet", [kunci2.jumlah_subnet.toString()]);
            cek("l2-host", [kunci2.host_valid.toString()]);
            cek("l2-bit", [kunci2.bit_dipinjam.toString()]);
            cek("l2-blok", [kunci2.blok_subnet.toString()]);

            // ===== CEK LANJUT =====
            cek("l2-range4", [kunci2.range_target]);
            cek("l2-net8", [kunci2.network_target]);
            cek("l2-bc13", [kunci2.broadcast_target]);
            cek("l2-host9", [kunci2.host_target]);

            // ===== ALERT =====
            if (benarSemua) {

                progressState.latihan2 = true;

                Swal.fire({
                    icon: "success",
                    title: "Mantap!",
                    text: "Semua jawaban kamu benar",
                    showCancelButton: true,
                    confirmButtonText: "Lanjut",
                    cancelButtonText: "Kerjakan Kembali",
                    reverseButtons: true
                }).then((result) => {

                    if (result.isConfirmed) {
                        goToStep(5);
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        resetLatihan2();
                    }

                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Masih ada yang salah",
                    text: "Coba cek lagi ya",
                });
            }
        }

        function resetLatihan1() {

            let inputs = document.querySelectorAll("#step3 input");

            inputs.forEach(input => {
                input.value = "";

                let parent = input.closest(".input-line");
                if (parent) {
                    parent.classList.remove("correct", "wrong");
                }
            });

            Swal.fire({
                icon: "success",
                title: "Di-reset!",
                text: "Jawaban sudah dikosongkan",
                timer: 1500,
                showConfirmButton: false
            });
        }

        function resetLatihan2() {

            // ambil semua input di latihan 2
            let inputs = document.querySelectorAll("#step4 input");

            inputs.forEach(input => {
                input.value = "";

                // hapus warna (parent .input-line)
                let parent = input.closest(".input-line");
                if (parent) {
                    parent.classList.remove("correct", "wrong");
                }
            });

            // kalau mau sekalian reset tabel handsontable
            if (hot) {
                hot.loadData([
                    ['', '', '', ''],
                    ['', '', '', ''],
                    ['', '', '', ''],
                    ['', '', '', '']
                ]);
            }

            // alert optional
            Swal.fire({
                icon: "success",
                title: "Di-reset!",
                text: "Semua jawaban sudah dikosongkan",
                timer: 1500,
                showConfirmButton: false
            });
        }

        function cekLatihan3() {

            let benarSemua = true;

            function cek(id, jawaban) {
                let el = document.getElementById(id);
                let val = normal(el.value);

                let cocok = Array.isArray(jawaban)
                    ? jawaban.map(j => normal(j)).includes(val)
                    : val === normal(jawaban);

                tandai(el, cocok);

                if (!cocok) benarSemua = false;
            }

            // ===== DATA LATIHAN 3 =====
            cek("l3-kelas", [kunci3.kelas_ip]);
            cek("l3-default", [kunci3.subnet_mask_default]);
            cek("l3-baru", [kunci3.subnet_mask_baru]);
            cek("l3-subnet", [kunci3.jumlah_subnet.toString()]);
            cek("l3-host", [kunci3.host_valid.toString()]);
            cek("l3-bit", [kunci3.bit_dipinjam.toString()]);
            cek("l3-blok", [kunci3.blok_subnet.toString()]);

            // lanjut
            cek("l3-range4", [kunci3.range_target]);
            cek("l3-net8", [kunci3.network_target]);
            cek("l3-bc13", [kunci3.broadcast_target]);
            cek("l3-host9", [kunci3.host_target]);

            // ===== ALERT =====
            if (benarSemua) {

                progressState.latihan3 = true;

                Swal.fire({
                    icon: "success",
                    title: "Mantap!",
                    text: "Semua jawaban kamu benar",
                    showCancelButton: true,
                    confirmButtonText: "Lanjut",
                    cancelButtonText: "Kerjakan Kembali",
                    reverseButtons: true
                }).then((result) => {

                    if (result.isConfirmed) {
                        goToStep(6);
                    } else {
                        resetLatihan3();
                    }

                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Masih ada yang salah",
                    text: "Coba cek lagi ya",
                });
            }
        }

        function resetLatihan3() {

            let inputs = document.querySelectorAll("#step5 input");

            inputs.forEach(input => {
                input.value = "";

                let parent = input.closest(".input-line");
                if (parent) {
                    parent.classList.remove("correct", "wrong");
                }
            });

            if (hot2) {
                hot2.loadData([
                    ['', '', '', ''],
                    ['', '', '', ''],
                    ['', '', '', ''],
                    ['', '', '', '']
                ]);
            }

            Swal.fire({
                icon: "success",
                title: "Di-reset!",
                text: "Semua jawaban sudah dikosongkan",
                timer: 1500,
                showConfirmButton: false
            });
        }

        function handleCek() {
            if (currentStep === 3) {
                cekLatihan1();
            } else if (currentStep === 4) {
                cekLatihan2();
            } else if (currentStep === 5) {
                cekLatihan3();
            }
        }

        function handleReset() {

            Swal.fire({
                icon: "warning",
                title: "Reset Jawaban?",
                text: "Semua jawaban yang sudah diisi akan dikosongkan.",
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: "Ya, Reset",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    if (currentStep === 3) {
                        resetLatihan1();

                    } else if (currentStep === 4) {
                        resetLatihan2();

                    } else if (currentStep === 5) {
                        resetLatihan3();
                    }

                }

            });
        }

        function normal(val) {
            return val
                .replace(/\s+/g, "")
                .replace(/–/g, "-")
                .toLowerCase();
        }
        showStep(1);

        window.addEventListener("DOMContentLoaded", async () => {

            const res = await fetch(
                `/progres/cek/${encodeURIComponent("Subnetting")}/${encodeURIComponent("Perhitungan Subnetting")}`
            );

            const data = await res.json();

            if (data.selesai) {

                console.log("SUDAH PERNAH SELESAI PERHITUNGAN");

                progressState = {
                    membaca: true,
                    pemahaman: true,
                    mencoba: true,
                    latihan1: true,
                    latihan2: true,
                    latihan3: true,
                    aktivitas: true
                };

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