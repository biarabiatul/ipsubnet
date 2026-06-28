@extends('mahasiswa.mahasiswa')

@section('title', 'Subbab 1 - Pendahuluan')
<title>BAB 1 : Sistem Bilangan</title>
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .subbab-title {
            font-weight: 800;
            font-size: 28px;
            color: #89471e;
            margin-bottom: 20px;
        }

        .materi-box {
            background: #ffffff;
            border-radius: 8px;
            margin-bottom: 24px;
            border: 1px solid #d6c3b2;
            overflow: hidden;
        }

        .materi-box .box-header {
            background: #977c6bff;
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

        /* tabel biner */
        .table-wrapper {
            overflow-x: auto;
            margin-top: 16px;
        }

        .biner-table-wrapper {
            display: flex;
            justify-content: center;
            gap: 10px;
            /* atur jarak antar tabel */
        }

        .biner-table {
            border-collapse: collapse;
        }

        /* tabel contoh soal */
        .biner-table.small {
            font-size: 14px;
        }

        .biner-table.small th,
        .biner-table.small td {
            padding: 6px 10px;
        }

        /* HEADER */
        .biner-table th {
            background: #f9f5f2;
            color: #000000;
            padding: 12px 48px;
            font-weight: 600;
            border: 1px solid #d6c3b2;
        }

        /* ISI TABEL */
        .biner-table td {
            padding: 10px 28px;
            border: 1px solid #d6c3b2;
            background: #ffffff;
            color: #000000;
        }

        .biner-table tr:nth-child(even) td {
            background: #f9f5f2;
        }

        .fill-input {
            width: 90px;
            padding: 6px;
            font-size: 15px;
            text-align: center;
            border: 1.5px solid #89471e;
            border-radius: 4px;
            background: #ffffff;
            color: #111827;
            transition: 0.2s;
        }

        /* benar */
        .fill-input.correct {
            border-color: #15803d;
            background: #ecfdf5;
            color: #065f46;
        }

        /* salah */
        .fill-input.wrong {
            border-color: #b91c1c;
            background: #fef2f2;
            color: #7f1d1d;
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

        /* navigasi kuis di kiri */
        .quiz-nav-left {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 20px;
        }

        /* kembali */
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

        /* next */
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

        .options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .option {
            border: 1.5px solid #d6c3b2;
            border-radius: 6px;
            padding: 12px 14px;
            cursor: pointer;
            background: #ffffff;
            display: flex;
            align-items: center;
            transition: background 0.15s ease, border-color 0.15s ease;
        }

        /* sembunyikan radio asli */
        .option input[type="radio"] {
            display: none !important;
        }

        /* teks */
        .option-text {
            font-size: 15px;
            color: #1f2937;
        }

        /* hover */
        .option:hover {
            background: #f9f5f2;
        }

        /* dipilih */
        .option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
        }

        /* terkunci */
        .option.locked {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* bobot tidak aktif */
        .op-box.inactive {
            opacity: 0.35;
        }

        /* box rumus */
        .formula-box {
            background: #fef9f6;
            border-left: 5px solid #89471e;
            padding: 16px 20px;
            margin: 18px 0;
            border-radius: 6px;
            overflow-x: auto;
        }

        .MathJax {
            display: inline-block !important;
            min-width: max-content;
        }

        mjx-container[display="true"] {
            display: block !important;
            text-align: center !important;
            margin: 10px auto !important;
        }

        .formula-equation {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin: 20px 0;
        }

        .formula-number {
            position: absolute;
            right: 0;
            font-weight: 600;
            color: #374151;
        }

        @media (max-width: 768px) {
            .formula-box {
                padding: 12px;
                font-size: 14px;
            }

            .info-box {
                padding: 12px;
            }
        }

        .formula-box .formula-title {
            font-weight: 700;
            color: #89471e;
            margin-bottom: 8px;
        }

        /* box contoh */
        .info-box {
            background: #fef9f6;
            border-left: 5px solid #89471e;
            padding: 16px 20px;
            margin: 18px 0;
            border-radius: 6px;
            overflow-x: auto;
        }

        .info-box .info-title {
            font-weight: 700;
            color: #89471e;
            margin-bottom: 10px;
        }

        /* teks contoh khusus */
        .binary-text {
            font-size: 18px;
            font-weight: 700;
            background: #fff7ed;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
            border: 1px solid #f59e0b;
        }

        .biner-image {
            display: flex;
            justify-content: center;
            margin: 16px 0;
        }

        .biner-image img {
            max-width: 60%;
            height: auto;
        }

        .bit-input {
            width: 40px;
            padding: 4px;
            text-align: center;
            font-size: 14px;
            border: 1.5px solid #89471e;
            border-radius: 4px;
            outline: none;
            background: #ffffff;
        }

        /* feedback bit input */
        .bit-input.correct {
            border-color: #15803d;
            background: #ecfdf5;
            color: #065f46;
            font-weight: 600;
        }

        .bit-input.wrong {
            border-color: #b91c1c;
            background: #fef2f2;
            color: #7f1d1d;
            font-weight: 600;
        }

        /* button cek jawaban */
        .check-btn {
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

        .check-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .check-btn:active {
            transform: scale(0.97);
        }

        /* navigasi kuis kiri */
        .quiz-nav-left {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 20px;
        }

        /* kembali */
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

        /* lanjut */
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

        /* hover simpel */
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

        /* LAYOUT UTAMA */
        .scratch-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            align-items: start;
            padding-top: 10px;
        }

        /* tabel */
        .scratch-table {
            width: 100%;
        }

        /* HEADER */
        .scratch-header {
            display: grid;
            grid-template-columns: 520px 140px 1fr;
            align-items: end;
            width: 100%;
            box-sizing: border-box;
            padding-bottom: 8px;
            margin-bottom: 14px;
            font-weight: 700;
            font-size: 15px;
        }

        /* GARIS PANJANG */
        .scratch-header-wrapper {
            width: 100%;
            position: relative;
            margin-bottom: 4px;
        }

        .scratch-header-wrapper::after {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            bottom: 0;
            height: 3px;
            background: #111;
        }

        /* ANGKA 128–1 */
        .scratch-header .bits {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            text-align: center;
        }

        .scratch-header .bits span {
            border-bottom: none;
        }

        /* ANSWERS */
        .answer-header {
            text-align: center;
        }

        /* ROW */
        .scratch-row {
            display: grid;
            grid-template-columns: max-content 100px;
            align-items: center;
            margin-bottom: 14px;
        }

        /* BIT */
        .bits {
            display: grid;
            grid-template-columns: repeat(8, 28px);
            gap: 42px;
            text-align: center;
        }

        .bits span {
            font-size: 15px;
            padding: -10px 0;
        }


        /* ANSWER */
        .answer {
            position: relative;
            text-align: center;
            font-weight: 700;
            padding-left: 35px;
            /* ⬅️ geser teks */
        }

        /* GARIS */
        .answer::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 30px;
            width: 80px;
            height: 3px;
            background: #111;
        }

        .answer.correct {
            color: #15803d;
        }

        /* SCRATCH */
        .scratch-area {
            border: 1px dashed #89471e;
            border-radius: 6px;
            padding: 10px;
            margin-top: 30px;
            margin-left: -30px;
        }

        .scratch-area iframe {
            width: 100%;
            height: 440px;
            border: none;
        }

        .answer-input {
            width: 80px;
            text-align: center;
            font-weight: 700;
            font-size: 15px;
            border: none;
            border-bottom: 3px solid #111;
            outline: none;
            background: transparent;
            padding-bottom: 4px;
            margin-left: 30px;
        }

        /* BENAR */
        .answer-input.correct {
            color: #15803d;
            border-bottom-color: #15803d;
        }

        /* SALAH */
        .answer-input.wrong {
            color: #b91c1c;
            border-bottom-color: #b91c1c;
        }

        /* ===== SECTION KONVERSI ===== */
        .conversion-section {
            margin-top: 0px;
            padding: 26px 30px;
            background: #fffaf5;
            border: 1px solid #e7d9cc;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
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

        /* cek jawaban */
        .answer-input.correct {
            color: #15803d;
            border-bottom-color: #15803d;
        }

        .answer-input.wrong {
            color: #b91c1c;
            border-bottom-color: #b91c1c;
        }

        /* tabel bit */
        .bit-weight-wrapper {
            margin: 24px 0;
            overflow-x: auto;
        }

        .bit-weight {
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 12px;
            text-align: center;
            white-space: nowrap;
        }

        .bit-weight th,
        .bit-weight td {
            border: 1px solid #89471e;
            padding: 6px 8px;
            min-width: 46px;
        }

        /* baris pangkat */
        .bit-weight .power {
            background: #7c3f1d;
            color: #ffffff;
            font-weight: 700;
        }

        /* baris nilai */
        .bit-weight .value {
            background: #ffffff;
            color: #000000;
            font-weight: 600;
        }

        /* label */
        .bit-label {
            text-align: center;
            font-size: 13px;
            margin-top: 8px;
            color: #374151;
            font-weight: 600;
        }

        /* 8 bit */
        .bit-group-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin: 10px 0 6px 535px;
            width: fit-content;
        }

        .bit-group-label::before,
        .bit-group-label::after {
            content: "";
            width: 120px;
            height: 2px;
            background: #111;
        }

        .bit-group-label span {
            font-size: 14px;
            font-weight: 600;
            color: #111;
            white-space: nowrap;
        }

        /* GARIS LABEL 16 BIT */
        .bit-group-16 {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin: 10px auto 6px;
            width: max-content;
        }

        .bit-group-16::before,
        .bit-group-16::after {
            content: "";
            height: 2px;
            background: #111;
            flex: 1;
            min-width: 315px;
        }

        .bit-group-16 span {
            font-size: 14px;
            font-weight: 600;
            color: #111;
            white-space: nowrap;
        }

        /* NAVIGATION BUTTON */
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

        /* BOX ANALOGI KAOS */
        .analogy-box {
            background: #fffaf5;
            border: 1px solid #e7d9cc;
            border-left: 6px solid #89471e;
            padding: 20px 24px;
            margin: 24px 0;
            border-radius: 12px;
        }

        .analogy-title {
            font-size: 17px;
            font-weight: 700;
            color: #89471e;
            margin-bottom: 12px;
        }

        .analogy-text {
            font-size: 16px;
            line-height: 1.8;
            color: #374151;
            margin-bottom: 12px;
            margin-top: 12px;
        }

        .analogy-formula {
            display: inline-block;
            background: #fdf3ea;
            border: 1px solid #e6c7b8;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 600;
            font-size: 16px;
            color: #7c3f1d;
            margin: 8px 0;
        }

        .reset-btn {
            background: #6b7280 !important;
        }

        .reset-btn:hover {
            background: #4b5563 !important;
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

        .legend-jawaban {
            display: flex;
            gap: 28px;
            margin-top: 14px;
            margin-left: 0;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            flex-wrap: wrap;
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
            box-sizing: border-box;
        }

        .legend-box.benar {
            background: #ecfdf5;
            border: 2px solid #15803d;
        }

        .legend-box.salah {
            background: #fef2f2;
            border: 2px solid #dc2626;
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

        .mini-drill p {
            margin: 6px 0;
        }

        .mini-drill input {
            width: 120px;
            padding: 8px;
            font-size: 15px;
            text-align: center;
            border: 1.5px solid #d6c3b2;
            border-radius: 6px;
            margin-top: 8px;
        }

        .mini-drill input.correct {
            border-color: #16a34a;
            background: #ecfdf5;
            color: #065f46;
            font-weight: 600;
        }

        .mini-drill input.wrong {
            border-color: #dc2626;
            background: #fef2f2;
            color: #7f1d1d;
            font-weight: 600;
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


        .mini-feedback {
            margin-top: 10px;
            font-weight: 600;
            font-size: 14px;
        }

        .mini-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }

        .mini-table th,
        .mini-table td {
            border: 1px solid #d6c3b2;
            padding: 8px;
            text-align: center;
        }

        .mini-table th {
            background: #f9f5f2;
        }

        .latihan-center {
            text-align: center;
        }

        /* judul biner */
        .latihan-biner {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        /* setiap baris */
        .step-line {
            margin: 10px 0;
            line-height: 2.2;
        }

        /* input kecil */
        .mini-input {
            width: 30px;
            padding: 4px;
            font-size: 14px;
            text-align: center;
            border: 1.5px solid #d6c3b2;
            border-radius: 4px;
        }

        .mini-input::placeholder {
            color: #aaaaaa;
            font-weight: 600;
        }

        .mini-table td input.mini-input {
            width: 30px !important;
            display: inline-block;
        }

        /* hasil akhir sedikit lebih lebar */
        .result-input {
            width: 50px;
        }

        /* feedback */
        .mini-input.correct {
            border-color: #16a34a;
            background: #ecfdf5;
        }

        .mini-input.wrong {
            border-color: #dc2626;
            background: #fef2f2;
        }

        .math-like {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 18px;
            line-height: 2.4;
        }

        .step-line {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 6px;
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

        .pemantik-box {
            background: #f3e9dc;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 14px 16px;
            width: 70%;
            margin: 0 auto 16px;
        }

        .pemantik-title {
            font-weight: 700;
            color: #89471e;
            font-size: 16px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pemantik-text {
            font-size: 15px;
            color: #1f2937;
            margin-bottom: 10px;
        }

        /* INPUT FIX */
        .pemantik-input {
            width: 100%;
            height: 70px;
            padding: 8px 10px;
            font-size: 14px;
            font-family: 'Fira Sans', sans-serif;
            border-radius: 6px;
            border: 1px solid #d6c3b2;
            background: #ffffff;
            outline: none;
            resize: none;
        }

        /* FOCUS */
        .pemantik-input:focus {
            border-color: #89471e;
            box-shadow: 0 0 0 2px rgba(137, 71, 30, 0.15);
        }

        /* BUTTON */
        .pemantik-btn {
            margin-top: 10px;
            background: #b45309;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .pemantik-btn:hover {
            background: #92400e;
        }

        /* FEEDBACK */
        .pemantik-feedback {
            margin-top: 8px;
            font-size: 15px;
            font-style: italic;
        }

        /* MOBILE */
        @media (max-width: 768px) {

            .scratch-layout {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            /* scratch area */
            .scratch-area {
                margin-left: 0;
                margin-top: 10px;
            }

            /* tombol */
            .scratch-layout>div:last-child {
                flex-direction: column !important;
                gap: 10px !important;
            }

            .check-btn {
                width: 100%;
                padding: 12px;
                font-size: 14px;
            }

            /* legend */
            .legend-jawaban {
                margin-left: 0;
                justify-content: center;
                text-align: center;
                gap: 14px;
            }

            /* header */
            .scratch-header {
                display: flex !important;
                flex-direction: column;
                align-items: center;
                gap: 0 !important;
            }

            .scratch-title {
                display: none;
            }

            .answer-header {
                margin-top: -6px;
                font-size: 12px;
            }

            .scratch-header .bits {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(8, 1fr);
                gap: 2px;
            }

            .scratch-row {
                grid-template-columns: 1fr auto;
                gap: 2px;
                margin-top: 0 !important;
                margin-bottom: 2px !important;
            }

            .scratch-row .bits {
                grid-template-columns: repeat(8, 1fr);
                gap: 1px !important;
            }

            .bits span {
                font-size: 12px;
            }

            /* jawaban */
            .answer-input {
                margin-left: 0;
                margin-top: -2px;
            }

            .answer {
                margin-top: -2px;
                padding-left: 0;
                text-align: center;
            }

            .answer::after {
                left: 0;
                width: 100%;
                bottom: -2px;
            }

            .scratch-header-wrapper {
                width: 100% !important;
                margin-bottom: 2px !important;
            }

            .scratch-header-wrapper::after {
                bottom: 0;
            }
        }

        .btn-group-konversi {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 16px;
        }

        @media (max-width:768px) {
            .btn-group-konversi {
                flex-direction: column;
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

        .scratch-title {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 8px;
            margin-bottom: 10px;
        }
    </style>

    <!-- SISTEM BILANGAN BINER -->
    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-123"></i>
                </div>
                Sistem Bilangan Biner
            </div>

            <br>
            <!-- PERTANYAAN PEMANTIK -->
            <div class="pemantik-box">

                <div class="pemantik-title">
                    <i class="bi bi-lightbulb"></i>
                    Pertanyaan Pemantik
                </div>

                <p class="pemantik-text">
                    Jika kamu menyimpan data di HP atau laptop, menurutmu dalam bentuk apa data tersebut disimpan di dalam
                    komputer?
                </p>

                <textarea id="jawabanPemantik" class="pemantik-input"
                    placeholder="Tuliskan jawabanmu sebelum melanjutkan ke materi berikut."></textarea>

                <button onclick="tampilkanMateri()" class="pemantik-btn">
                    Kirim
                </button>

                <div id="feedbackPemantik" class="pemantik-feedback"></div>

            </div>

            <div id="materiContent" style="display:none;">
                <div class="box-body">

                    Perhatikan gambar dibawah ini!
                    <div class="biner-image">
                        <img src="{{ asset('assets/img/biner.png') }}" alt="Data Dunia Nyata ke Data Biner">
                    </div>
                    <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                        Gambar 1.1 Dunia Nyata vs Komputer
                    </div>

                    <br> Data seperti <strong>gambar, suara, video, dan data jaringan</strong> tidak dapat dipahami langsung
                    oleh komputer. Komputer hanya mengenali dua angka, yaitu <strong>0 dan 1</strong>, bukan 0–9 seperti
                    manusia. Oleh karena itu, komputer menggunakan sistem bilangan biner yaitu <strong>basis 2</strong> yang
                    terdiri dari dua digit, yaitu 0 dan 1. Setiap digit disebut bit (<em>binary digit</em>) yaitu satuan
                    data terkecil.

                    <br><br>

                    Dalam komputer <strong>8 bit</strong> digabungkan menjadi satu kelompok yang disebut <strong>1
                        <em>byte</em></strong> atau 1 oktet. Karena setiap bit hanya memiliki dua nilai, yaitu 0 atau 1,
                    maka 8 bit dapat membentuk 2<sup>8</sup> atau <strong>256 kombinasi</strong> yang berbeda. Bingung
                    kenapa jadi 256? Perhatikan analogi berikut:

                    <br>
                    <div class="analogy-box">
                        <div class="analogy-text">
                            Bayangkan kamu hanya punya <strong>2 warna kaos</strong>, yaitu biru (nilai 0) dan merah (nilai
                            1).
                        </div>

                        <div class="biner-image">
                            <img src="{{ asset('assets/img/analogi-kaos.png') }}" alt="Analogi Kaos"
                                style="width: 380px; height: auto;">
                        </div>
                        <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                            Gambar 1.2 Analogi Kaos
                        </div>

                        <br>
                        <div class="analogy-text"> Setiap hari kamu hanya bisa memilih salah satu dari dua warna tersebut.
                            Artinya, dalam 1 hari terdapat 2 kemungkinan pilihan. Setiap penambahan hari akan membuat jumlah
                            kemungkinan menjadi <strong>dua kali lipat</strong>, karena setiap kombinasi sebelumnya bisa
                            dipasangkan lagi dengan 2 pilihan di hari berikutnya. </div>

                        <div class="mini-drill">
                            <p>Lengkapi pola perkalian dan hasil jumlah kombinasi berikut berdasarkan pola 2<sup>n</sup>
                            <p>

                            <table class="mini-table">
                                <tr>
                                    <th>Hari</th>
                                    <th>Pola</th>
                                    <th>Jumlah</th>
                                </tr>

                                <tr>
                                    <td>1 hari</td>
                                    <td>2</td>
                                    <td>2</td>
                                </tr>

                                <tr>
                                    <td>2 hari</td>
                                    <td>2 × 2</td>
                                    <td>4</td>
                                </tr>

                                <!-- 3 -->
                                <tr>
                                    <td>3 hari</td>
                                    <td>
                                        2 × 2 ×
                                        <input type="text" id="p3" class="mini-input pola-input number-only"
                                            placeholder="...">
                                    </td>
                                    <td>
                                        <input type="text" id="h3" class="number-only" placeholder="...">
                                    </td>
                                </tr>

                                <!-- 4 -->
                                <tr>
                                    <td>4 hari</td>
                                    <td>2 × 2 × 2 × 2</td>
                                    <td>16</td>
                                </tr>

                                <!-- 5 -->
                                <tr>
                                    <td>5 hari</td>
                                    <td>
                                        2 × 2 × 2 × 2 ×
                                        <input type="text" id="p5" class="mini-input pola-input number-only"
                                            placeholder="...">
                                    </td>
                                    <td>
                                        <input type="text" id="h5" class="number-only" placeholder="...">
                                    </td>
                                </tr>

                                <!-- 6 -->
                                <tr>
                                    <td>6 hari</td>
                                    <td>2 × 2 × 2 × 2 × 2 × 2</td>
                                    <td>64</td>
                                </tr>

                                <!-- 7 -->
                                <tr>
                                    <td>7 hari</td>
                                    <td>
                                        2 × 2 × 2 × 2 × 2 × 2 ×
                                        <input type="text" id="p7" class="mini-input pola-input number-only"
                                            placeholder="...">
                                    </td>
                                    <td>
                                        <input type="text" id="h7" class="number-only" placeholder="...">
                                    </td>
                                </tr>

                                <tr>
                                    <td>8 hari</td>
                                    <td>
                                        2 ×
                                        <input type="text" id="p8_1" placeholder="..."
                                            class="mini-input pola-input number-only"> ×
                                        2 ×
                                        <input type="text" id="p8_2" placeholder="..."
                                            class="mini-input pola-input number-only"> ×
                                        2 × 2 ×
                                        <input type="text" id="p8_3" placeholder="..."
                                            class="mini-input pola-input number-only"> × 2
                                    </td>
                                    <td>
                                        <input type="text" id="h8" class="number-only" placeholder="...">
                                    </td>
                                </tr>
                            </table>

                            <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                                Tabel 1.1 Pola Perkalian dan Jumlah Kombinasi Berdasarkan 2<sup>n</sup>
                            </div>

                            <button class="mini-btn" onclick="cekKombinasi()">Cek Jawaban</button>

                            <button class="mini-btn reset-btn" onclick="resetKombinasi()">Reset</button>
                            <p id="feedbackKomb" class="mini-feedback"></p>

                        </div>

                        <div class="analogy-text">
                            Seperti ilustrasi diatas dapat diketahui bahwa apabila dipakai selama 8 hari (8 bit), maka
                            jumlah
                            kombinasinya adalah:
                        </div>

                        <div class="analogy-formula">
                            <strong>2 x 2 x 2 x 2 x 2 x 2 x 2 x 2 = \( 2^8 \) = 256 kombinasi</strong>
                        </div>

                        <div class="analogy-text">
                            Artinya, terdapat <strong>256 susunan</strong> warna kaos yang berbeda selama 8 hari. Hal inilah
                            yang terjadi pada 8 bit dalam komputer, sehingga 1 <em>byte</em> dapat membentuk 256 kombinasi
                            nilai.
                        </div>

                    </div>

                    Perhatikan lagi gambar dibawah ini!

                    <br>
                    <div class="biner-image">
                        <img src="{{ asset('assets/img/biner2.png') }}" alt="Data Dunia Nyata ke Data Biner">
                    </div>
                    <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                        Gambar 1. 3 Struktur bilangan biner dalam satuan <em>byte</em>
                    </div>

                    <br>
                    1 <em>byte</em>/oktet (8 bit) mampu membentuk <strong>2<sup>8</sup></strong> atau 256 kombinasi,
                    sehingga dapat merepresentasikan nilai desimal dari 0 sampai 255. Kenapa dimulai dari 0? Karena dalam
                    sistem biner, kombinasi terkecil adalah semua bit bernilai 0 (00000000) yang merepresentasikan
                    <strong>nilai 0</strong>. Dengan total 256 kombinasi, maka nilai yang dapat direpresentasikan adalah
                    dari 0 hingga 255.

                    <br><br>
                    Jika menjadi 2 <em>byte</em> (16 bit), jumlah kombinasinya adalah <strong>2<sup>16</sup></strong> atau
                    65.536, dengan rentang nilai 0 - 65.535. Pada 3 <em>byte</em> (24 bit), jumlah kombinasinya adalah
                    <strong>2<sup>24</sup></strong>, dengan rentang nilai yang lebih besar lagi. Konsep ini banyak digunakan
                    dalam sistem komputer dan jaringan. Untuk memahami nilai setiap bit dalam bilangan biner, perhatikan
                    tabel bobot bilangan biner berikut.

                    <div class="bit-weight-wrapper">

                        <div class="bit-group-label">
                            <span>8 bit = 2<sup>8</sup> = 256</span>
                        </div>

                        <table class="bit-weight">
                            <tr class="power">
                                <td>2<sup>15</sup></td>
                                <td>2<sup>14</sup></td>
                                <td>2<sup>13</sup></td>
                                <td>2<sup>12</sup></td>
                                <td>2<sup>11</sup></td>
                                <td>2<sup>10</sup></td>
                                <td>2<sup>9</sup></td>
                                <td>2<sup>8</sup></td>
                                <td></td>
                                <td>2<sup>7</sup></td>
                                <td>2<sup>6</sup></td>
                                <td>2<sup>5</sup></td>
                                <td>2<sup>4</sup></td>
                                <td>2<sup>3</sup></td>
                                <td>2<sup>2</sup></td>
                                <td>2<sup>1</sup></td>
                                <td>2<sup>0</sup></td>
                            </tr>

                            <tr class="value">
                                <td>32768</td>
                                <td>16384</td>
                                <td>8192</td>
                                <td>4096</td>
                                <td>2048</td>
                                <td>1024</td>
                                <td>512</td>
                                <td>256</td>
                                <td></td>
                                <td>128</td>
                                <td>64</td>
                                <td>32</td>
                                <td>16</td>
                                <td>8</td>
                                <td>4</td>
                                <td>2</td>
                                <td>1</td>
                            </tr>
                        </table>

                        <!-- GARIS 16 BIT (DI BAWAH TABEL) -->
                        <div class="bit-group-16">
                            <span>16 bit = 2<sup>16</sup> = 65.536</span>
                        </div>

                        <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                            Tabel 1. 2 Bobot bilangan biner
                        </div>

                    </div>

                    <br>
                    Setiap bit pada bilangan biner memiliki bobot berupa pangkat dari bilangan dua ($2^n$) sesuai dengan
                    posisinya. Secara umum, bilangan biner dapat dituliskan dalam bentuk matematis sebagai berikut:

                    <br><br>

                    <div class="formula-box">
                        <div class="formula-title">Rumus Bilangan Biner</div>

                        <div class="formula-equation">
                            <div>
                                $$
                                B = (b_n \times 2^n) + (b_{n-1} \times 2^{n-1}) + (b_{n-2} \times 2^{n-2})
                                + \dots + (b_0 \times 2^0)
                                $$
                            </div>
                            <div class="formula-number">(1.1)</div>
                        </div>

                        <div style="margin-top:10px; font-size:14px;">
                            <strong>Keterangan:</strong>
                            <ul>
                                <li><strong>b</strong> = digit biner (0 atau 1)</li>
                                <li><strong>n</strong> = posisi bit (dihitung dari kanan)</li>
                                <li><strong>2<sup>n</sup></strong> = bobot nilai setiap bit</li>
                            </ul>
                        </div>
                    </div>


                    <div class="info-box">
                        <div class="info-title">Contoh Soal</div>

                        <p>
                            Perhatikan bilangan biner
                            <strong>$11001010_2$</strong>.
                            Bilangan tersebut dapat diuraikan berdasarkan nilai setiap digit dan posisi bobotnya sebagai
                            berikut:
                        </p>

                        $$
                        11001010_2 = (1 \times 2^7) + (1 \times 2^6) + (0 \times 2^5) + (0 \times 2^4) + (1 \times 2^3) + (0
                        \times
                        2^2) + (1 \times 2^1) + (0 \times 2^0)
                        $$

                        $$
                        = 128 + 64 + 0 + 0 + 8 + 0 + 2 + 0
                        $$

                        $$
                        = 202_{10}
                        $$

                        <br><br>
                        <div class="info-title">Latihan</div>

                        <p>
                            Perhatikan bilangan biner
                            <strong>$10101100_2$</strong>.
                            Lengkapi langkah berikut:
                        </p>

                        <div class="math-like">

                            <div class="step-line">
                                $10101100_2$ = ( <input class="mini-input bit-only" id="b1" placeholder="..."> ×
                                2<sup><input class="mini-input power-only" id="ps1" placeholder="..."></sup>) +

                                ( <input class="mini-input bit-only" id="b2" placeholder="..."> × 2<sup><input
                                        class="mini-input power-only" id="ps2" placeholder="..."></sup>) +

                                (<input class="mini-input bit-only" id="b3" placeholder="..."> × 2<sup><input
                                        class="mini-input power-only" id="ps3" placeholder="..."></sup>) +

                                (<input class="mini-input bit-only" id="b4" placeholder="..."> × 2<sup><input
                                        class="mini-input power-only" id="ps4" placeholder="..."></sup>)
                            </div>

                            <div class="step-line">
                                +
                                (
                                <input class="mini-input bit-only" id="b5" placeholder="..."> × 2<sup><input
                                        class="mini-input power-only" id="ps5" placeholder="..."></sup>
                                ) +
                                (
                                <input class="mini-input bit-only" id="b6" placeholder="..."> × 2<sup><input
                                        class="mini-input power-only" id="ps6" placeholder="..."></sup>
                                ) +
                                (
                                <input class="mini-input bit-only" id="b7" placeholder="..."> × 2<sup><input
                                        class="mini-input power-only" id="ps7" placeholder="..."></sup>
                                ) +
                                (
                                <input class="mini-input bit-only" id="b8" placeholder="..."> × 2<sup><input
                                        class="mini-input power-only" id="ps8" placeholder="..."></sup>
                                )
                            </div>

                            <div class="step-line">
                                =
                                <input class="mini-input number-only" id="hs1" placeholder="..."> +
                                <input class="mini-input number-only" id="hs2" placeholder="..."> +
                                <input class="mini-input number-only" id="hs3" placeholder="..."> +
                                <input class="mini-input number-only" id="hs4" placeholder="..."> +
                                <input class="mini-input number-only" id="hs5" placeholder="..."> +
                                <input class="mini-input number-only" id="hs6" placeholder="..."> +
                                <input class="mini-input number-only" id="hs7" placeholder="..."> +
                                <input class="mini-input number-only" id="hs8" placeholder="...">
                            </div>

                            <div class="step-line">
                                =
                                <input class="mini-input result-input number-only" id="hasilAkhir" placeholder="...">
                                <sub>10</sub>
                            </div>

                        </div>

                        <div style="text-align:center;">
                            <button class="mini-btn" onclick="cekLatihanStep()">Cek Jawaban</button>
                            <button class="mini-btn reset-btn" onclick="resetLatihanStep()">Reset
                            </button>
                        </div>

                        <p id="feedbackStep" class="mini-feedback"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- KONVERSI BINER KE DESIMAL -->
    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-arrow-left-right"></i>
                </div>
                Konversi Bilangan Biner ke Desimal
            </div>

            <div class="box-body">

                <strong>Langkah-langkah konversi bilangan biner ke desimal adalah sebagai berikut:</strong>

                <ol style="margin-left:18px; margin-top:10px;">
                    <li>
                        Tentukan bobot nilai setiap bit dengan menggunakan urutan kolom
                        <strong>128, 64, 32, 16, 8, 4, 2, dan 1</strong>.
                    </li>
                    <li>
                        Periksa nilai setiap bit pada bilangan biner pada bilangan biner:
                        <ul style="margin-left:18px;">
                            <li>Jika bit bernilai <strong>1</strong>, maka nilai kolom tersebut dihitung</li>
                            <li>Jika bit bernilai <strong>0</strong>, maka nilai kolom tersebut diabaikan.</li>
                        </ul>
                    </li>
                    <li>
                        Jumlahkan seluruh nilai kolom yang memiliki bit bernilai <strong>1</strong>.
                    </li>
                    <li>
                        Tuliskan hasil penjumlahan tersebut sebagai nilai bilangan desimal.
                    </li>
                </ol>

                <div class="info-box">
                    <div class="info-title">Contoh Soal</div>

                    <p>
                        Konversi bilangan biner
                        <strong>$10010010_2$</strong>
                        ke dalam bentuk bilangan desimal.
                    </p>

                    <p><strong>Penyelesaian:</strong></p>

                    <ol style="margin-left:18px; margin-top:10px;">
                        <li>
                            Tentukan bobot nilai setiap bit:
                        </li>

                        <div class="table-wrapper">
                            <table class="biner-table small">
                                <tr>
                                    <th>Bobot</th>
                                    <th>128</th>
                                    <th>64</th>
                                    <th>32</th>
                                    <th>16</th>
                                    <th>8</th>
                                    <th>4</th>
                                    <th>3</th>
                                    <th>1</th>
                                </tr>
                                <tr>
                                    <th>Bit</th>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                </tr>
                            </table>
                        </div>

                        <br>
                        <li>
                            Tentukan nilai kolom yang dihitung:
                        </li>

                        $$
                        10010010_2 =
                        (1 \times 128) + (0 \times 64) + (0 \times 32) + (1 \times 16) +
                        (0 \times 8) + (0 \times 4) + (1 \times 2) + (0 \times 1)
                        $$

                        $$
                        = 128 + 0 + 0 + 16 + 0 + 0 + 2 + 0
                        $$

                        $$
                        = 146_{10}
                        $$

                </div>

                <div class="conversion-section">
                    <h4 class="conversion-title">Ayo Berlatih!</h4>

                    <div class="instruction-box">
                        <div class="instruction-title">Petunjuk Pengerjaan</div>

                        <ol>
                            <li>Amati setiap bilangan biner pada tabel.</li>
                            <li>Tentukan nilai desimal menggunakan bobot bit 128, 64, 32, 16, 8, 4, 2, dan 1.</li>
                            <li>Gunakan <em>Scratch Area</em> untuk membantu proses perhitungan. Klik ikon
                                <i class="bi bi-info-circle"></i>
                                untuk melihat petunjuk penggunaan canvas.
                            </li>
                            <li>Klik tombol <b>"Cek Jawaban"</b> untuk melihat hasil.</li>
                        </ol>
                    </div>

                    <div class="scratch-layout">

                        <div class="scratch-table">

                            <!-- HEADER -->
                            <div class="scratch-header-wrapper">
                                <div class="scratch-header">
                                    <div class="bits">
                                        <span>128</span><span>64</span><span>32</span><span>16</span>
                                        <span>8</span><span>4</span><span>2</span><span>1</span>
                                    </div>

                                    <div class="answer-header"><em>Answers</em></div>

                                </div>
                            </div>

                            <!-- ROWS -->

                            <div class="scratch-row">
                                <div class="bits">
                                    <span>1</span><span>0</span><span>0</span><span>1</span>
                                    <span>0</span><span>0</span><span>1</span><span>0</span>
                                </div>
                                <div class="answer">146</div>
                            </div>

                            <div class="scratch-row">
                                <div class="bits">
                                    <span>0</span><span>1</span><span>1</span><span>1</span>
                                    <span>0</span><span>1</span><span>1</span><span>1</span>
                                </div>
                                <div class="answer">119</div>
                            </div>
                            @foreach($soalLatihan as $index => $soal)
                                <div class="scratch-row">

                                    <div class="bits">
                                        @foreach(str_split($soal->soal) as $bit)
                                            <span>{{ $bit }}</span>
                                        @endforeach
                                    </div>

                                    <input class="answer-input" data-id="{{ $soal->id_soal }}" placeholder="..." type="number"
                                        min="0" max="255">

                                </div>
                            @endforeach
                        </div>

                        <!-- SCRATCH AREA -->
                        <div class="scratch-right">

                            <div class="scratch-title">
                                <strong><em>Scratch Area</em></strong>

                                <button type="button" class="canvas-info-btn" onclick="openCanvasGuide()">

                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <div class="scratch-area">
                                <iframe src="https://excalidraw.com" loading="lazy"></iframe>
                            </div>

                        </div>

                        <div class="btn-group-konversi">
                            <button class="check-btn" onclick="cekJawabanKonversi()">
                                Cek Jawaban
                            </button>
                            <button class="check-btn reset-btn" onclick="resetKonversi()">
                                Reset
                            </button>
                        </div>
                    </div>
                    <div class="legend-jawaban">
                        <div class="legend-item">
                            <span class="legend-box benar"></span>
                            <span>Jawaban Benar</span>
                        </div>

                        <div class="legend-item">
                            <span class="legend-box salah"></span>
                            <span>Jawaban Salah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LATIHAN / AKTIVITAS -->
    <div class="step-section" id="step3">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <span id="levelTitle">Aktivitas 1.1</span>
            </div>

            <div class="box-body">

                <p class="activity-intro-title">
                    Kerjakan aktivitas berikut untuk mengukur pemahaman dan menambah <em>progress</em> belajarmu.
                </p>

                <p class="activity-intro-desc">
                    Pilih satu jawaban benar dari lima pilihan yang
                    tersedia.
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

    <div class="step-pagination" id="stepPagination" style="display:none;">

        <button class="page-btn nav-arrow" onclick="prevStep()">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="page-btn active" onclick="goToStep(1)" id="stepBtn1">
            1
        </button>

        <button class="page-btn" onclick="goToStep(2)" id="stepBtn2" style="display:none;">
            2
        </button>

        <button class="page-btn" onclick="goToStep(3)" id="stepBtn3" style="display:none;">
            3
        </button>

        <button class="page-btn nav-arrow" onclick="nextStep()" id="nextStepBtn">
            <i class="bi bi-chevron-right"></i>
        </button>

    </div>

    <div class="nav-bottom">
        <a href="/bab1/tujuan-pembelajaran-bab1" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab1/desimal-biner" class="nav-btn nav-next" onclick="return cekLatihan(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <script>
        function tampilkanMateri() {

            const input = document.getElementById("jawabanPemantik");
            const feedback = document.getElementById("feedbackPemantik");
            const materi = document.getElementById("materiContent");

            const jawaban = input.value.trim();

            if (jawaban === "") {
                feedback.innerHTML = "Jawaban masih kosong.";
                feedback.style.color = "#b91c1c";
                return;
            }

            pemantikSelesai = true;

            document.getElementById("stepPagination").style.display = "flex";
            document.getElementById("stepBtn2").style.display = "inline-block";
            document.getElementById("stepBtn3").style.display = "inline-block";

            // FEEDBACK
            feedback.innerHTML = "Jawaban berhasil disimpan! Sekarang mari kita lihat penjelasannya.";
            feedback.style.color = "#15803d";

            // tampilkan materi
            materi.style.display = "block";

            materi.scrollIntoView({
                behavior: "smooth"
            });
        }

        // aktivitas
        let soal = [];
        let indexSoal = 0;
        let jawabanBenar = [];

        let aktivitasSelesai = false;
        let kombinasiSelesai = false;
        let rumusSelesai = false;
        let konversiSelesai = false;

        async function loadSoal() {
            const res = await fetch('/aktivitas/soal');
            soal = await res.json();
            jawabanBenar = Array(soal.length).fill(false);
            renderSoal();
        }


        const quizContainer = document.getElementById("quizContainer");
        const feedback = document.getElementById("quizFeedback");
        const nextBtn = document.getElementById("nextBtn");

        function renderSoal() {
            const data = soal[indexSoal];

            let html = `<div class="question-box"> <p class="question-number"> Soal ${indexSoal + 1} dari ${soal.length}</p>
                                                                                                                        <p class="question-text">${data.q}</p>
                                                                                                                        `;

            if (data.tipe === "pilgan") {
                html += `<div class="options">`;
                data.opsi.forEach((o, i) => {
                    const disabled = jawabanBenar[indexSoal] ? "disabled" : "";
                    html += `
                                <label class="option ${jawabanBenar[indexSoal] ? 'locked' : ''}">
                                    <input type="radio" name="jawaban" value="${i}" ${disabled}>
                                    <span class="option-text">${o}</span>
                                </label>
                            `;
                });
                html += `</div>`;
            }

            if (data.tipe === "isian") {
                const disabled = jawabanBenar[indexSoal] ? "disabled" : "";
                html += `
                            <input id="jawabanIsian" class="fill-input" placeholder="Jawaban" ${disabled}>
                        `;
            }

            html += `</div>`;
            quizContainer.innerHTML = html;

            if (window.MathJax) {
                MathJax.typesetPromise();
            }

            feedback.textContent = "";
            feedback.style.color = "";

            // tombol navigasi
            document.getElementById("prevBtn").disabled = indexSoal === 0;
            document.getElementById("nextBtn").disabled = !jawabanBenar[indexSoal];

            if (!jawabanBenar[indexSoal]) {

                // PILGAN
                document.querySelectorAll('.option input[name="jawaban"]').forEach(el => {
                    el.addEventListener("change", cekJawaban);
                });

                // ISIAN
                const isian = document.getElementById("jawabanIsian");
                if (isian) {
                    isian.addEventListener("keyup", cekJawaban);
                    isian.addEventListener("blur", cekJawaban);
                }
            }
        }

        async function cekJawaban() {
            const data = soal[indexSoal];
            let jawabanUser = "";

            if (data.tipe === "pilgan") {
                const pilih = document.querySelector('input[name="jawaban"]:checked');
                if (!pilih) return;
                jawabanUser = pilih.value;
            } else {
                jawabanUser = document.getElementById("jawabanIsian").value.trim();
            }

            const res = await fetch('/aktivitas/cek', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id_soal: data.id,
                    jawaban_user: jawabanUser
                })
            });

            const hasil = await res.json();

            if (hasil.benar) {
                jawabanBenar[indexSoal] = true;
                feedback.textContent = "Jawaban benar";
                feedback.style.color = "#15803d";

                document.querySelectorAll("#quizContainer input").forEach(el => {
                    el.disabled = true;
                });
                nextBtn.disabled = false;
            } else {
                feedback.textContent = "Jawaban salah, silakan coba kembali";
                feedback.style.color = "#b91c1c";
            }
        }

        function nextSoal() {
            if (!jawabanBenar[indexSoal]) return;

            indexSoal++;

            if (indexSoal < soal.length) {

                renderSoal();

            } else {

                if (jawabanBenar.every(j => j)) {
                    aktivitasSelesai = true;
                }

                // kembali ke soal terakhir
                indexSoal = soal.length - 1;
                renderSoal();

                tampilkanSelesai();
            }
        }

        function tampilkanSelesai() {

            // quizContainer.innerHTML = "";
            feedback.textContent = "";

            const inputs = document.querySelectorAll(".answer-input");

            let belum = [];

            if (!kombinasiSelesai) belum.push("Latihan Kombinasi");
            if (!rumusSelesai) belum.push("Latihan Rumus");
            if (!konversiSelesai) belum.push("Ayo Berlatih");

            // jika belum mengerjakan Ayo Berlatih
            if (belum.length > 0) {

                Swal.fire({
                    icon: "warning",
                    title: "Aktivitas Selesai",
                    html: `
                    Semua soal aktivitas telah dijawab dengan benar.<br><br>Namun kamu belum menyelesaikan:<br><br><b>${belum.join("<br>")}</b><br><br>Selesaikan terlebih dahulu untuk pemahaman maksimal.`,

                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kembali ke Latihan"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.href = "/bab1/desimal-biner";
                    } else {

                        // arahkan ke latihan pertama yang belum
                        if (!kombinasiSelesai) {
                            document.querySelector(".mini-drill").scrollIntoView({ behavior: "smooth" });
                        } else if (!rumusSelesai) {
                            document.querySelector(".info-box").scrollIntoView({ behavior: "smooth" });
                        } else if (!konversiSelesai) {
                            document.querySelector(".conversion-section").scrollIntoView({ behavior: "smooth" });
                        }

                    }

                });
            }

            // jika sudah mengerjakan latihan
            else {

                Swal.fire({
                    title: "Aktivitas Selesai",
                    text: "Semua soal telah dijawab dengan benar. Silakan lanjut ke materi berikutnya.",
                    icon: "success",
                    confirmButtonText: "Lanjut"
                }).then(() => {
                    kirimProgress();
                });

            }

        }

        function prevSoal() {
            if (indexSoal > 0) {
                indexSoal--;
                renderSoal();
            }
        }

        // konversi
        async function cekJawabanKonversi() {
            const inputs = document.querySelectorAll(".answer-input");

            let semuaTerisi = true;
            let semuaBenar = true;

            for (const input of inputs) {
                const idSoal = input.dataset.id;
                const jawaban = input.value.trim();

                input.classList.remove("correct", "wrong");

                // CEK KOSONG
                if (jawaban === "") {
                    semuaTerisi = false;
                    input.classList.add("wrong");
                    continue;
                }

                const res = await fetch("/cek-latihan-biner", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id_soal: idSoal,
                        jawaban_user: jawaban
                    })
                });

                const data = await res.json();

                if (data.benar) {
                    input.classList.add("correct");
                } else {
                    input.classList.add("wrong");
                    semuaBenar = false;
                }
            }

            // ===== SWEET ALERT =====
            if (!semuaTerisi) {
                Swal.fire({
                    icon: "warning",
                    title: "Belum Lengkap",
                    text: "Masih ada jawaban yang belum diisi.",
                });
                return;
            }

            if (semuaBenar) {

                konversiSelesai = true;

                Swal.fire({
                    icon: "success",
                    text: "Semua konversi sudah benar. Mau mengulang latihan atau lanjut?",
                    showCancelButton: true,
                    confirmButtonText: "Ulangi",
                    cancelButtonText: "Lanjut",
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then((result) => {

                    if (result.isConfirmed) {

                        konversiSelesai = false; // reset kalau ulang

                        inputs.forEach(input => {
                            input.value = "";
                            input.classList.remove("correct", "wrong");
                        });

                    } else {
                        document.getElementById("levelTitle")
                            .scrollIntoView({ behavior: "smooth" });
                    }

                });

                return;

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Masih Salah",
                    text: "Periksa kembali jawaban yang berwarna merah.",
                });
            }
        }

        loadSoal();

        const keyKonversi = "jawaban_konversi_biner";

        function resetKonversi() {

            Swal.fire({
                title: 'Reset Jawaban?',
                text: "Semua jawaban konversi akan dihapus.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, reset',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {

                    const inputs = document.querySelectorAll(".answer-input");

                    inputs.forEach(input => {
                        input.value = "";
                        input.classList.remove("correct", "wrong");
                    });

                    sessionStorage.removeItem(keyKonversi);

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Direset",
                        text: "Semua jawaban telah dikosongkan.",
                        timer: 1200,
                        showConfirmButton: false
                    });

                }

            });
        }

        // SIMPAN JAWABAN KONVERSI
        document.addEventListener("input", function (e) {

            if (e.target.classList.contains("answer-input")) {

                const id = e.target.dataset.id;

                let data = JSON.parse(sessionStorage.getItem(keyKonversi)) || {};

                data[id] = e.target.value;

                sessionStorage.setItem(keyKonversi, JSON.stringify(data));
            }

        });

        // LOAD ULANG JAWABAN SAAT REFRESH
        window.addEventListener("DOMContentLoaded", function () {

            let data = JSON.parse(sessionStorage.getItem(keyKonversi)) || {};

            document.querySelectorAll(".answer-input").forEach(input => {
                const id = input.dataset.id;

                if (data[id] !== undefined) {
                    input.value = data[id];
                }
            });

        });

        let sudahLulusPemahaman = false;
        let startTime = Date.now();

        function cekLatihan(e) {

            e.preventDefault();

            let waktu = (Date.now() - startTime) / 1000;

            // ===== 1. CEK SUDAH BACA MATERI =====
            if (waktu < 120 && !sudahLulusPemahaman) {
                Swal.fire({
                    icon: "warning",
                    title: "Belum Membaca Materi",
                    text: "Silakan baca materi terlebih dahulu sebelum melanjutkan.",
                });
                return false;
            }

            // ===== 2. CEK PEMAHAMAN DASAR =====
            if (!sudahLulusPemahaman) {
                cekPemahaman(e);
                return false;
            }

            // ===== 3. CEK SEMUA LATIHAN =====
            let belum = [];

            if (!kombinasiSelesai) belum.push("Latihan Kombinasi");
            if (!rumusSelesai) belum.push("Latihan Rumus");
            if (!konversiSelesai) belum.push("Ayo Berlatih");
            if (!aktivitasSelesai) belum.push("Aktivitas");

            // ===== 4. JIKA MASIH ADA YANG BELUM =====
            if (belum.length > 0) {

                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                                                                                                                                    Tapi, kamu belum menyelesaikan:<br><br><b>${belum.join("<br>")}</b><br><br>Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.`,

                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu"
                }).then((result) => {

                    if (!result.isConfirmed) {

                        // arahkan ke latihan pertama yang belum
                        if (!kombinasiSelesai) {
                            document.querySelector(".mini-drill").scrollIntoView({ behavior: "smooth" });
                        } else if (!rumusSelesai) {
                            document.querySelector(".info-box").scrollIntoView({ behavior: "smooth" });
                        } else if (!konversiSelesai) {
                            document.querySelector(".conversion-section").scrollIntoView({ behavior: "smooth" });
                        } else if (!aktivitasSelesai) {
                            document.getElementById("step3").scrollIntoView({ behavior: "smooth" });
                        }

                    } else {
                        window.location.href = "/bab1/desimal-biner";
                    }

                });

                return false;
            }

            // ===== 5. SEMUA SUDAH → LANJUT + SIMPAN PROGRESS =====
            kirimProgress();
        }

        function cekPemahaman(e) {

            Swal.fire({
                title: "Cek Pemahaman",
                text: "Dalam sistem bilangan biner, angka apa saja yang digunakan?",
                input: "text",
                inputPlaceholder: "Contoh: ...",
                showCancelButton: true,
                confirmButtonText: "Kirim",
            }).then((result) => {

                if (result.isConfirmed) {

                    let jawaban = result.value.replace(/\s/g, "");

                    // validasi ketat
                    if (
                        jawaban === "01" ||
                        jawaban === "10" ||
                        jawaban === "0dan1" ||
                        jawaban === "1dan0"
                    ) {

                        sudahLulusPemahaman = true;

                        Swal.fire({
                            icon: "success",
                            title: "Benar",
                            text: "Sistem bilangan biner hanya menggunakan 0 dan 1"
                        }).then(() => {
                            cekLatihan(e);
                        });

                    } else {

                        Swal.fire({
                            icon: "error",
                            title: "Belum Tepat",
                            text: "Coba perhatikan kembali konsep dasar sistem bilangan biner pada materi sebelumnya."
                        });

                    }

                }

            });
        }

        function cekLatihanLangsung() {

            const inputs = document.querySelectorAll(".answer-input");

            let adaJawaban = false;

            inputs.forEach(input => {
                if (input.value.trim() !== "") {
                    adaJawaban = true;
                }
            });

            // BELUM LATIHAN → kasih notif dulu
            if (!adaJawaban) {

                Swal.fire({
                    icon: "info",
                    title: "Latihan Belum Dikerjakan",
                    text: "Tapi kamu belum mengerjakan latihan. Jika lanjut, progres tidak akan dihitung.",
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Latihan"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.href = "/bab1/desimal-biner";
                    } else {
                        document.querySelector(".conversion-section").scrollIntoView({
                            behavior: "smooth"
                        });
                    }

                });

            } else {
                // kalau ada latihan maka kirim progress
                kirimProgress();
            }
        }

        function kirimProgress() {

            fetch("/progres/selesai/Sistem Bilangan/Bilangan Biner", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(() => {
                    window.location.href = "/bab1/desimal-biner";
                });

        }

        function cekKombinasi() {

            let benar = true;

            // ===== CEK POLA =====
            const polaInputs = document.querySelectorAll(".pola-input");

            polaInputs.forEach(input => {
                const val = input.value.trim();

                input.classList.remove("correct", "wrong");

                if (val === "2") {
                    input.classList.add("correct");
                } else {
                    input.classList.add("wrong");
                    benar = false;
                }
            });

            // ===== CEK HASIL =====
            const kunci = {
                h3: "8",
                h5: "32",
                h7: "128",
                h8: "256"
            };

            for (let id in kunci) {
                const input = document.getElementById(id);
                const val = input.value.trim();

                input.classList.remove("correct", "wrong");

                if (val === kunci[id]) {
                    input.classList.add("correct");
                } else {
                    input.classList.add("wrong");
                    benar = false;
                }
            }

            console.log("STATUS BENAR:", benar);

            // ===== FEEDBACK =====
            if (benar) {

                kombinasiSelesai = true;

                Swal.fire({
                    icon: "success",
                    title: "Semua Jawaban Benar!",
                    html: "Kamu sudah memahami pola 2<sup>n</sup> dengan baik.",
                    showCancelButton: true,
                    confirmButtonText: "Kerjakan Kembali",
                    cancelButtonText: "Lanjut",
                    allowOutsideClick: false
                }).then((result) => {

                    if (result.isConfirmed) {

                        kombinasiSelesai = false; //reset kalau ulang
                        resetKombinasi();

                    } else {

                        document.querySelector(".conversion-section")
                            .scrollIntoView({ behavior: "smooth" });

                    }

                });

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Masih Ada yang Salah",
                    text: "Perhatikan bahwa setiap langkah selalu dikali 2."
                });
            }
        }

        let pemantikSelesai = false;
        let currentStep = 1;
        const totalStep = 3;

        function showStep(step) {

            document.querySelectorAll(".step-section").forEach(el => {
                el.classList.remove("active");
            });

            document.getElementById("step" + step).classList.add("active");

            updatePagination();

            scrollKeAtas();
        }

        function nextStep() {

            if (currentStep === 1 && !pemantikSelesai) {

                Swal.fire({
                    icon: "warning",
                    title: "Jawab Pertanyaan Pemantik",
                    text: "Silakan jawab pertanyaan pemantik terlebih dahulu."
                });

                return;
            }

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

            if (step > 1 && !pemantikSelesai) {

                Swal.fire({
                    icon: "warning",
                    title: "Jawab Pertanyaan Pemantik",
                    text: "Silakan jawab pertanyaan pemantik terlebih dahulu."
                });

                return;
            }

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

        function resetKombinasi() {

            Swal.fire({
                title: 'Reset Jawaban?',
                text: "Semua jawaban pada latihan ini akan dihapus.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, reset',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {

                    const semuaInput = document.querySelectorAll(
                        "#p3, #p5, #p7, #p8_1, #p8_2, #p8_3, #h3, #h5, #h7, #h8"
                    );

                    semuaInput.forEach(input => {
                        input.value = "";
                        input.classList.remove("correct", "wrong");
                    });

                    document.getElementById("feedbackKomb").innerText = "";

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Direset",
                        text: "Semua jawaban telah dikosongkan.",
                        timer: 1200,
                        showConfirmButton: false
                    });

                }

            });
        }

        function cekLatihanStep() {

            let benar = true;

            const kunci = {
                // bit
                b1: "1", b2: "0", b3: "1", b4: "0",
                b5: "1", b6: "1", b7: "0", b8: "0",

                // pangkat
                ps1: "7", ps2: "6", ps3: "5", ps4: "4",
                ps5: "3", ps6: "2", ps7: "1", ps8: "0",

                // hasil
                hs1: "128", hs2: "0", hs3: "32", hs4: "0",
                hs5: "8", hs6: "4", hs7: "0", hs8: "0",

                // hasil akhir
                hasilAkhir: "172"
            };

            for (let id in kunci) {
                const input = document.getElementById(id);
                const val = input.value.trim();

                input.classList.remove("correct", "wrong");

                if (val === kunci[id]) {
                    input.classList.add("correct");
                } else {
                    input.classList.add("wrong");
                    benar = false;
                }
            }

            // ===== SWEET ALERT =====
            if (benar) {

                rumusSelesai = true;

                Swal.fire({
                    icon: "success",
                    title: "Semua Jawaban Benar!",
                    html: "Kamu sudah berhasil menyelesaikan konversi biner ke desimal.",
                    showCancelButton: true,
                    confirmButtonText: "Kerjakan Kembali",
                    cancelButtonText: "Lanjut",
                    allowOutsideClick: false
                }).then((result) => {

                    if (result.isConfirmed) {

                        rumusSelesai = false; // reset status kalau ulang
                        // ulangi latihan
                        resetLatihanStep();

                    } else {

                        // scroll ke bagian berikutnya
                        document.querySelector(".conversion-section")
                            .scrollIntoView({ behavior: "smooth" });

                    }

                });

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Masih Salah",
                    text: "Periksa kembali bagian yang berwarna merah!",
                });
            }
        }

        function resetLatihanStep() {

            Swal.fire({
                title: 'Reset Jawaban?',
                text: "Semua jawaban pada latihan ini akan dihapus.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, reset',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {

                    const semuaInput = document.querySelectorAll(
                        "#b1, #b2, #b3, #b4, #b5, #b6, #b7, #b8, " +
                        "#ps1, #ps2, #ps3, #ps4, #ps5, #ps6, #ps7, #ps8, " +
                        "#hs1, #hs2, #hs3, #hs4, #hs5, #hs6, #hs7, #hs8, " +
                        "#hasilAkhir"
                    );

                    semuaInput.forEach(input => {
                        input.value = "";
                        input.classList.remove("correct", "wrong");
                    });

                    document.getElementById("feedbackStep").innerText = "";

                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Direset",
                        text: "Silakan kerjakan kembali dari awal.",
                        timer: 1200,
                        showConfirmButton: false
                    });

                }

            });
        }

        window.addEventListener("DOMContentLoaded", async () => {

            const res = await fetch(`/progres/cek/${encodeURIComponent("Sistem Bilangan")}/${encodeURIComponent("Bilangan Biner")}`);
            const data = await res.json();

            if (data.selesai) {

                document.getElementById("stepPagination").style.display = "flex";

                document.getElementById("stepBtn2").style.display = "inline-block";
                document.getElementById("stepBtn3").style.display = "inline-block";

                pemantikSelesai = true;

                console.log("SUDAH PERNAH SELESAI");

                // LANGSUNG BUKA MATERI
                document.getElementById("materiContent").style.display = "block";

                // MATIKAN VALIDASI
                sudahLulusPemahaman = true;
                kombinasiSelesai = true;
                rumusSelesai = true;
                konversiSelesai = true;
                aktivitasSelesai = true;

            }

        });

        document.querySelectorAll(".answer-input").forEach(input => {

            input.addEventListener("input", function () {

                // hapus selain angka
                this.value = this.value.replace(/\D/g, '');

                // batasi maksimal 255
                if (this.value !== "" && parseInt(this.value) > 255) {
                    this.value = 255;
                }

            });

        });

        // BIT ONLY (0 atau 1)
        document.querySelectorAll(".bit-only").forEach(input => {

            input.addEventListener("input", function () {

                this.value = this.value.replace(/[^01]/g, '');

                // maksimal 1 digit
                if (this.value.length > 1) {
                    this.value = this.value.charAt(0);
                }

            });

        });

        // PANGKAT ONLY (0 - 7)
        document.querySelectorAll(".power-only").forEach(input => {

            input.addEventListener("input", function () {

                this.value = this.value.replace(/\D/g, '');

                if (this.value !== "" && parseInt(this.value) > 7) {
                    this.value = 7;
                }

            });

        });

        // ANGKA BIASA
        document.querySelectorAll(".number-only").forEach(input => {

            input.addEventListener("input", function () {

                this.value = this.value.replace(/\D/g, '');

            });

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

        function scrollKeAtas() {
            document.querySelector("main.content").scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
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