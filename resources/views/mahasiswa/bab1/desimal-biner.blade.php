@extends('mahasiswa.mahasiswa')

@section('title', 'Bab I - Sistem Bilangan Desimal')

<title>BAB 1 : Sistem Bilangan</title>

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

    /* ISI MATERI */
    .materi-box .box-body {
      padding: 18px;
      line-height: 1.8;
      text-align: justify;
      color: #1f2937;
    }

    /* teks soal */
    .question-text {
      font-size: 16px;
      font-weight: 600;
      margin: 12px 0 18px;
      color: #1f2937;
    }

    /* BOX RUMUS DESIMAL */
    .formula-box {
      background: #fef9f6;
      border-left: 5px solid #89471e;
      padding: 16px 20px;
      margin: 18px 0;
      border-radius: 6px;
    }

    .formula-box .formula-title {
      font-weight: 700;
      color: #89471e;
      margin-bottom: 10px;
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

    /* BOX CONTOH */
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

    /* tabel contoh soal */
    .simple-convert-table {
      width: auto;
      margin: 0 auto;
      border-collapse: collapse;
      text-align: center;
      font-size: 15px;
    }

    .simple-convert-table th,
    .simple-convert-table td {
      border-bottom: 2px solid #111;
      padding: 8px 14px;
    }

    .simple-convert-table th {
      font-weight: 700;
    }

    .simple-convert-table td:last-child {
      padding-left: 20px;
      padding-right: 20px;
      font-weight: 700;
    }

    /* LAYOUT UTAMA */
    .scratch-layout {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      align-items: start;
      padding-top: 10px;
    }

    /* TABLE */
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
      border-bottom: 3px solid #111;
      font-weight: 700;
      font-size: 15px;
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

    /* SCRATCH AREA */
    .scratch-title {
      padding-left: 12px;
      white-space: nowrap;
      font-weight: 800;
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

    /* kolom kanan */
    .scratch-side {
      position: sticky;
      top: 20px;
    }

    /* scratch box */
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

    /* MOBILE */
    @media (max-width: 768px) {

      /* layout jadi 1 kolom */
      .scratch-layout {
        grid-template-columns: 1fr;
        gap: 14px;
      }

      .scratch-area {
        margin-left: 0 !important;
        margin-top: 10px;
      }

      .scratch-row .bits,
      .scratch-header .bits {
        gap: 3px;
      }

      .bit-input {
        width: 100%;
        font-size: 12px;
        padding: 3px 0;
      }

      .bits span {
        font-size: 11px;
      }

      .scratch-header,
      .scratch-row {
        grid-template-columns: 1fr auto;
      }

      /* HEADER jadi stack */
      .scratch-header {
        display: flex !important;
        flex-direction: column;
        align-items: center;
        gap: 4px;
      }

      .scratch-header .bits {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 4px;
        font-size: 12px;
      }

      .answer-header {
        font-size: 12px;
      }

      /* ROW */
      .scratch-row {
        grid-template-columns: 1fr auto;
        gap: 6px;
        margin-bottom: 6px;
      }

      .scratch-row .bits {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 4px !important;
      }

      /* TEXT BIT */
      .bits span {
        font-size: 12px;
      }

      /* INPUT BIT */
      .bit-input {
        width: 100%;
        font-size: 13px;
        padding: 4px 0;
      }

      /* ANSWER */
      .answer {
        padding-left: 0;
        font-size: 13px;
        text-align: center;
      }

      .answer::after {
        left: 0;
        width: 100%;
        height: 2px;
      }

      /* tombol */
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
    }

    /* FIX RUMUS MOBILE */
    @media (max-width: 768px) {

      /* semua block rumus */
      .formula-box,
      .info-box {
        overflow-x: auto;
      }

      /* khusus MathJax / latex */
      .formula-box mjx-container,
      .info-box mjx-container {
        display: inline-block !important;
        min-width: max-content;
      }

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

    @media (max-width: 1024px) {
      .scratch-layout {
        grid-template-columns: 1fr;
      }

      .scratch-side {
        position: static;
      }

      .scratch-area iframe {
        height: 350px;
      }
    }

    /* ===== SECTION KONVERSI ===== */
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

    .bit-input {
      text-align: center;
      font-size: 15px;
      font-weight: 500;
    }

    .bit-input::placeholder {
      color: #d1d5db;
      font-size: 16px;
      font-weight: 600;
      opacity: 1;
      text-align: center;
    }

    .bit-input.correct {
      border-color: #15803d;
      background: #ecfdf5;
      color: #065f46;
      font-weight: 700;
    }

    .bit-input.wrong {
      border-color: #b91c1c;
      background: #fef2f2;
      color: #7f1d1d;
      font-weight: 700;
    }

    /* TOMBOL CEK JAWABAN */
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
      margin: 12px 0 16px;
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

    /* terkunci (sudah benar) */
    .option.locked {
      opacity: 0.65;
      cursor: not-allowed;
    }

    /* NAVIGASI QUIZ (KIRI) */
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

    /* ===== NAVIGATION BUTTON ===== */
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

    .reset-btn {
      background: #6b7280;
    }

    .reset-btn:hover {
      background: #4b5563;
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

    /* teks */
    .mini-text {
      margin: 6px 0;
    }

    .latihan-wrapper {
      max-width: 900px;
      margin: 32px auto;
      padding: 28px 24px 34px;
      border: 2px dashed #b45309;
      border-radius: 16px;
      background: #fffaf5;
      text-align: center;
      position: relative;
    }

    /* BADGE */
    .badge-title {
      position: absolute;
      top: -12px;
      left: 50%;
      transform: translateX(-50%);
      background: #b45309;
      color: white;
      padding: 6px 16px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 700;
    }

    /* PETUNJUK */
    .instruction-inner {
      background: #fff7ed;
      border: 1.5px solid #f59e0b;
      border-radius: 10px;
      padding: 14px 16px;
      text-align: left;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .instruction-title {
      font-weight: 700;
      margin-bottom: 6px;
      color: #92400e;
    }

    /* DRAG ITEM */
    .drag-container {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin-bottom: 26px;
    }

    .drag-item {
      padding: 10px 16px;
      background: linear-gradient(135deg, #fef3c7, #fde68a);
      border: 1.5px solid #f59e0b;
      border-radius: 999px;
      font-weight: 700;
      cursor: grab;
      transition: all 0.2s ease;

      -webkit-user-drag: element;
    }

    .drag-item:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
    }

    .drag-item:active {
      cursor: grabbing;
      transform: scale(0.95);
    }

    /* ===== EQUATION ===== */
    .equation-line {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin: 14px 0;
      flex-wrap: wrap;
      font-size: 16px;
    }

    /* DROP */
    .drop-box {
      width: 80px;
      height: 40px;
      border: 2px dashed #fb923c;
      border-radius: 10px;
      background: #fff7ed;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      transition: 0.2s;
    }

    .drop-box.filled {
      border-style: solid;
      background: #ffedd5;
    }

    /* INPUT (BARIS 2 & 3) */
    .mini-input {
      width: 90px;
      height: 40px;
      border: 1.5px solid #b4ada7;
      border-radius: 7px;
      text-align: center;
      font-weight: 800;
      transition: 0.2s;
    }

    .mini-input::placeholder {
      color: #aaaaaa;
      font-weight: 600;
    }

    .mini-input:focus {
      border-color: #b45309;
      background: #fff7ed;
    }

    /* FEEDBACK */
    .correct {
      border-color: #16a34a !important;
      background: #ecfdf5 !important;
      color: #065f46;
    }

    .wrong {
      border-color: #dc2626 !important;
      background: #fef2f2 !important;
      color: #7f1d1d;
    }

    .power-group {
      display: inline-flex;
      align-items: flex-start;
      gap: 2px;
    }

    .power-input {
      width: 26px;
      height: 18px;
      font-size: 11px;
      text-align: center;
      border: 1.5px solid #b4ada7;
      border-radius: 5px;
      background: #fff;

      transform: translateY(-8px);
    }

    .power-input:focus {
      border-color: #b45309;
      background: #fff7ed;
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

    /* BENAR */
    .fill-input.correct {
      border-color: #15803d;
      background: #ecfdf5;
      color: #065f46;
    }

    /* SALAH */
    .fill-input.wrong {
      border-color: #b91c1c;
      background: #fef2f2;
      color: #7f1d1d;
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

  <!-- SISTEM BILANGAN DESIMAL -->
  <div class="step-section active" id="step1">
    <div class="materi-box">
      <div class="box-header">
        <div class="icon-circle">
          <i class="bi bi-calculator"></i>
        </div>
        Sistem Bilangan Desimal
      </div>

      <div class="box-body">

        <strong>Sistem bilangan desimal</strong> merupakan sistem bilangan dengan <strong>basis 10</strong> yang
        menggunakan digit <strong>0-9</strong>. Sistem ini yang paling umum digunakan dalam kehidupan sehari-hari. Dalam
        jaringan komputer, alamat <em>IP</em> biasanya ditampilkan dalam bentuk bilangan desimal agar mudah dibaca oleh
        manusia, meskipun diproses dalam bentuk biner oleh komputer.

        <br><br>

        Secara umum, bilangan desimal dapat dituliskan dalam bentuk matematis
        sebagai berikut:

        <!-- RUMUS -->
        <div class="formula-box">
          <div class="formula-title">Rumus Bilangan Desimal</div>

          <div class="formula-equation">
            <div>
              $$
              D = (d_n \times 10^n) + (d_{n-1} \times 10^{n-1})
              + \dots + (d_0 \times 10^0)
              $$
            </div>
            <div class="formula-number">(1.2)</div>
          </div>

          <div style="margin-top:10px; font-size:14px;">
            <strong>Keterangan:</strong>
            <ul>
              <li><strong>d</strong> = digit desimal (0–9)</li>
              <li><strong>n</strong> = posisi digit (dihitung dari kanan)</li>
              <li><strong>10<sup>n</sup></strong> = bobot nilai digit</li>
            </ul>
          </div>
        </div>

        <div class="info-box">
          <div class="info-title">Contoh Soal</div>

          <p>
            Perhatikan bilangan desimal
            <strong>$5346_{10}$</strong>.
            Bilangan tersebut dapat diuraikan berdasarkan nilai setiap digit
            dan posisi bobotnya sebagai berikut:
          </p>

          $$
          5346_{10} = 5 \times 10^3 + 3 \times 10^2 + 4 \times 10^1 + 6 \times 10^0
          $$

          $$
          = 5000 + 300 + 40 + 6
          $$

          $$
          = 5346_{10}
          $$

          <div class="latihan-wrapper">

            <div class="badge-title">Latihan</div>

            <!-- PETUNJUK DI DALAM -->
            <div class="instruction-inner">
              <div class="instruction-title">Petunjuk Pengerjaan</div>
              <ol>
                <li>
                  Perhatikan kembali contoh uraian bilangan desimal di atas.
                </li>
                <li>
                  Seret (<em>drag</em>) setiap digit ke posisi yang sesuai berdasarkan nilai tempatnya,
                  kemudian tentukan pangkat 10 yang tepat pada masing-masing digit.
                </li>
                <li>
                  Selanjutnya, hitung hasil dari setiap operasi dan jumlahkan untuk memperoleh hasil akhir.
                </li>
                <li>
                  Klik tombol <strong>"Cek Jawaban"</strong> untuk mengetahui hasil pekerjaanmu.
                </li>
              </ol>
            </div>

            <p class="mini-text">
              Perhatikan bilangan desimal berikut <strong>\(327_{10}\)</strong> dan uraikan berdasarkan nilai tempatnya:
            </p>

            <!-- DRAG (DIGIT) -->
            <div class="drag-container">
              <div class="drag-item" draggable="true">7</div>
              <div class="drag-item" draggable="true">3</div>
              <div class="drag-item" draggable="true">2</div>
            </div>

            <!-- BARIS 1 (REVISI) -->
            <div class="equation-line">
              =
              <span class="drop-box"></span>
              ×
              <span class="power-group">
                10
                <input class="power-input number-only" id="p1" placeholder="...">
              </span>
              +
              <span class="drop-box"></span>
              ×
              <span class="power-group">
                10
                <input class="power-input number-only" id="p2" placeholder="...">
              </span>
              +
              <span class="drop-box"></span>
              ×
              <span class="power-group">
                10
                <input class="power-input number-only" id="p3" placeholder="...">
              </span>
            </div>

            <!-- BARIS 2 -->
            <div class="equation-line">
              =
              <input class="mini-input number-only" id="r1" placeholder="..."> +
              <input class="mini-input number-only" id="r2" placeholder="..."> +
              <input class="mini-input number-only" id="r3" placeholder="...">
            </div>

            <!-- BARIS 3 -->
            <div class="equation-line">
              =
              <input class="mini-input number-only" id="hasil" placeholder="...">
              <sub>10</sub>
            </div>

            <div style="margin-top:20px; display:flex; justify-content:center; gap:12px;">

              <button type="button" class="mini-btn" onclick="cekDragFinal()">
                Cek Jawaban
              </button>

              <button type="button" class="mini-btn reset-btn" onclick="resetDragLatihan()">
                Reset
              </button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- KONVERSI DESIMAL KE BINER -->
  <div class="step-section" id="step2">
    <div class="materi-box">
      <div class="box-header">
        <div class="icon-circle">
          <i class="bi bi-arrow-left-right"></i>
        </div>
        Konversi Bilangan Desimal ke Biner
      </div>

      <div class="box-body">

        Konversi bilangan desimal ke biner dilakukan dengan menggunakan pangkat dari bilangan dua ($2^n$) sebagai bobot
        setiap bit. Umumnya digunakan 8 bit (1 <em>byte</em>) dengan rentang nilai 0–255.

        <br><br>

        <strong>Langkah-langkah konversi bilangan desimal ke biner adalah sebagai berikut:</strong>
        <ol style="margin-left:18px; margin-top:10px;">
          <li>
            Tentukan pangkat dua terbesar yang nilainya tidak melebihi bilangan desimal.
          </li>
          <li>
            Isi bit dengan:
            <ul style="margin-left:18px;">
              <li>1 jika nilai pangkat digunakan</li>
              <li>0 jika tidak digunakan</li>
            </ul>
          </li>
          <li>
            Kurangi nilai desimal dengan nilai pangkat dua yang digunakan, lalu lanjutkan ke pangkat dua berikutnya
          </li>
          <li>
            Ulangi langkah 2 dan 3 sampai sisa nilai menjadi 0
          </li>
          <li>
            Susun bit dari pangkat terbesar ke terkecil.
          </li>
        </ol>

        <div class="info-box">
          <div class="info-title">Contoh Soal</div>

          <p>
            Konversi bilangan desimal <strong>\(238_{10}\)</strong> ke bilangan biner.
          </p>

          <p><strong>Penyelesaian:</strong></p>

          <ol style="margin-left:18px;">
            <li>
              Karena \(238 \le 255\), maka digunakan <strong>8 bit</strong> dengan bobot: <strong>128, 64, 32, 16, 8, 4,
                2, dan 1</strong>
            </li>

            <li style="margin-top:8px;">
              Tentukan pangkat dua terbesar yang masih muat dalam bilangan desimal tersebut, kemudian
              tentukan nilai bit dan sisa hasil pengurangan.
            </li>
          </ol>

          <!-- TABEL PERHITUNGAN -->
          <table class="simple-convert-table" style="margin-top:14px;">
            <tr>
              <th>Posisi Pangkat</th>
              <th>Nilai Posisi</th>
              <th>Biner</th>
              <th>Sisa</th>
            </tr>
            <tr>
              <td>\(2^7\)</td>
              <td>128</td>
              <td>1</td>
              <td>238 - 128 = 110</td>
            </tr>
            <tr>
              <td>\(2^6\)</td>
              <td>64</td>
              <td>1</td>
              <td>110 - 64 = 46</td>
            </tr>
            <tr>
              <td>\(2^5\)</td>
              <td>32</td>
              <td>1</td>
              <td>46 - 32 = 14</td>
            </tr>
            <tr>
              <td>\(2^4\)</td>
              <td>16</td>
              <td>0</td>
              <td>14</td>
            </tr>
            <tr>
              <td>\(2^3\)</td>
              <td>8</td>
              <td>1</td>
              <td>14 - 8 = 6</td>
            </tr>
            <tr>
              <td>\(2^2\)</td>
              <td>4</td>
              <td>1</td>
              <td>6 - 4 = 2</td>
            </tr>
            <tr>
              <td>\(2^1\)</td>
              <td>2</td>
              <td>1</td>
              <td>2 - 2 = 0</td>
            </tr>
            <tr>
              <td>\(2^0\)</td>
              <td>1</td>
              <td>0</td>
              <td>0</td>
            </tr>
          </table>
          <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
            Tabel 1. 3 Konversi bilangan desimal ke biner
          </div>

          <br>
          <ol style="margin-left:18px; margin-top:14px;">
            <li value="3">
              Susun nilai bit dari pangkat terbesar ke pangkat terkecil sehingga diperoleh:
            </li>
          </ol>

          <p style="text-align:center; font-weight:700;">
            \[
            238_{10} = 11101110_2\]
          </p>
        </div>


        <div class="conversion-section">
          <h4 class="conversion-title">Ayo Berlatih!</h4>

          <div class="instruction-box">
            <div class="instruction-title">Petunjuk Pengerjaan</div>

            <ol>
              <li>Perhatikan nilai desimal yang tersedia pada kolom <b><em>Answers</em></b>.</li>
              <li>Ubah setiap nilai desimal tersebut ke dalam bentuk bilangan biner menggunakan bobot
                bit <b>128, 64, 32, 16, 8, 4, 2, dan 1.</b></li>
              <li>Isi setiap kolom bit dengan <b>1</b> atau <b>0</b> sesuai hasil konversi.
              </li>
              <li>Gunakan <em>Scratch Area</em> untuk membantu proses perhitungan. Klik ikon
                <i class="bi bi-info-circle"></i>
                untuk melihat petunjuk penggunaan canvas.
              </li>
              <li>Klik tombol <b>"Cek Jawaban"</b> untuk memeriksa hasil.</li>
            </ol>
          </div>

          <div class="scratch-layout">

            <!-- HEADER -->
            <div class="scratch-table">

              <!-- HEADER -->
              <div class="scratch-header">
                <div class="bits">
                  <span>128</span><span>64</span><span>32</span><span>16</span>
                  <span>8</span><span>4</span><span>2</span><span>1</span>
                </div>

                <div class="answer-header"><em>Answers</em></div>

              </div>

              <!-- ROWS -->

              <!-- BARIS 1 (CONTOH) -->
              <div class="scratch-row">
                <div class="bits">
                  <span>1</span><span>1</span><span>1</span><span>0</span>
                  <span>1</span><span>1</span><span>1</span><span>0</span>
                </div>
                <div class="answer">238</div>
              </div>

              <!-- BARIS 2 (CONTOH) -->
              <div class="scratch-row">
                <div class="bits">
                  <span>0</span><span>0</span><span>1</span><span>0</span>
                  <span>0</span><span>0</span><span>1</span><span>0</span>
                </div>
                <div class="answer">34</div>
              </div>

              @foreach($soalLatihan as $soal)
                <div class="scratch-row" data-id="{{ $soal->id_soal }}" data-kunci="{{ $soal->soal }}">
                  <div class="bits">
                    @foreach(str_split($soal->jawaban_benar) as $bit)
                      <input class="bit-input" maxlength="1" placeholder="..." oninput="onlyBinary(this)">
                    @endforeach
                  </div>
                  <div class="answer">{{ $soal->soal }}</div>
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

            <div style="text-align:center; margin-top:16px; display:flex; justify-content:center; gap:12px;">
              <button type="button" class="check-btn" onclick="cekJawabanKonversi()">
                Cek Jawaban
              </button>
              <button type="button" class="check-btn reset-btn" onclick="resetLatihan()">
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

  <!-- aktivitas -->
  <div class="step-section" id="step3">
    <div class="materi-box">
      <div class="box-header">
        <div class="icon-circle">
          <i class="bi bi-pencil-square"></i>
        </div>
        <span id="levelTitle">Aktivitas 1.2</span>
      </div>

      <div class="box-body">

        <p class="activity-intro-title">
          Kerjakan aktivitas berikut untuk mengukur pemahaman dan menambah <em>progress</em> belajarmu.
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
    <a href="/bab1/biner-desimal" class="nav-btn nav-prev">
      Halaman Sebelumnya
    </a>

    <a href="/bab1/rangkuman-bab1" class="nav-btn nav-next" onclick="return cekLatihanDesimal(event)">
      Halaman Selanjutnya
    </a>
  </div>

  <script>

    let startTime = Date.now();
    let sudahLulusPemahaman = false;
    let sudahLatihanDrag = false;
    let sudahLatihanKonversi = false;
    let sudahSelesaiQuiz = false;

    function onlyBinary(el) {
      // hapus selain 0 dan 1
      el.value = el.value.replace(/[^01]/g, '');
    }

    function cekJawabanKonversi() {
      let semuaTerisi = true;
      let semuaBenar = true;

      document.querySelectorAll(".scratch-row[data-kunci]").forEach(row => {
        const kunci = parseInt(row.dataset.kunci);
        const inputs = row.querySelectorAll(".bit-input");

        let nilaiDesimal = 0;
        const bobot = [128, 64, 32, 16, 8, 4, 2, 1];

        // reset warna
        inputs.forEach(i => i.classList.remove("correct", "wrong"));

        inputs.forEach((input, idx) => {
          const val = input.value.trim();

          if (val === "") {
            semuaTerisi = false;
            semuaBenar = false;
            return;
          }

          if (val === "1") {
            nilaiDesimal += bobot[idx];
          }
        });

        if (nilaiDesimal === kunci) {
          inputs.forEach(i => i.classList.add("correct"));
        } else {
          inputs.forEach(i => i.classList.add("wrong"));
          semuaBenar = false;
        }
      });

      // SWEET ALERT
      if (!semuaTerisi) {
        Swal.fire({
          icon: "warning",
          title: "Belum Lengkap",
          text: "Masih ada bit yang belum diisi.",

        });
        return;
      }

      if (semuaBenar) {

        sudahLatihanKonversi = true;

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

            // ulangi latihan
            document.querySelectorAll(".bit-input").forEach(input => {
              input.value = "";
              input.classList.remove("correct", "wrong");
            });

            localStorage.removeItem(keyKonversiDesimal);

          } else {

            // scroll ke aktivitas
            document.getElementById("levelTitle").scrollIntoView({
              behavior: "smooth"
            });

          }
        });

        return;
      }
      else {
        Swal.fire({
          icon: "error",
          title: "Masih Salah",
          text: "Periksa kembali bit yang berwarna merah.",
        });
      }
    }

    let soal = [];
    let indexSoal = 0;
    let soalTerkunci = [];

    fetch("/aktivitas/desimal/soal")
      .then(res => res.json())
      .then(data => {
        soal = data;
        soalTerkunci = Array(soal.length).fill(false);
        renderSoal();
      });


    const quizContainer = document.getElementById("quizContainer");
    const feedback = document.getElementById("quizFeedback");
    const nextBtn = document.getElementById("nextBtn");
    const title = document.getElementById("levelTitle");
    const prevBtn = document.getElementById("prevBtn");

    function renderSoal() {
      const data = soal[indexSoal];
      const terkunci = soalTerkunci[indexSoal];

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
                    <label class="option ${terkunci ? 'locked' : ''}">
                      <input
                        type="radio"
                        name="jawaban"
                        value="${i}"
                        ${terkunci ? 'disabled' : ''}
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
                    placeholder="Jawaban"
                    ${terkunci ? 'disabled' : ''}
                  >
                `;
      }

      html += `</div>`;
      quizContainer.innerHTML = html;

      feedback.textContent = "";
      nextBtn.disabled = !terkunci;
      prevBtn.disabled = indexSoal === 0;


      if (!terkunci) {
        document.querySelectorAll("input").forEach(el => {
          el.addEventListener("change", cekJawaban);
          el.addEventListener("input", cekJawaban);
        });
      }

      if (window.MathJax) {
        MathJax.typeset();
      }
    }

    function cekJawaban() {
      let jawabanUser = "";

      if (soal[indexSoal].tipe === "pilgan") {
        const pilih = document.querySelector("input[name=jawaban]:checked");
        if (!pilih) return;
        jawabanUser = pilih.value;
      } else {
        jawabanUser = document.getElementById("jawabanIsian").value.trim();
        if (!jawabanUser) return;
      }

      fetch("/aktivitas/desimal/cek", {
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
            soalTerkunci[indexSoal] = true;

            feedback.textContent = "Jawaban benar";
            feedback.style.color = "#15803d";

            const checked = document.querySelector(
              'input[name="jawaban"]:checked'
            );

            document.querySelectorAll('input[name="jawaban"]').forEach(radio => {
              if (radio !== checked) {
                radio.disabled = true;
              }
            });

            nextBtn.disabled = false;
          } else {
            feedback.textContent = "Jawaban salah, silakan coba kembali";
            feedback.style.color = "#b91c1c";
          }
        });
    }

    function nextSoal() {
      if (!soalTerkunci[indexSoal]) return;

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

      sudahSelesaiQuiz = true;

      quizContainer.innerHTML = "";
      feedback.textContent = "";

      const rows = document.querySelectorAll(".scratch-row[data-kunci]");
      let adaJawabanLatihan = false;

      rows.forEach(row => {
        const inputs = row.querySelectorAll(".bit-input");

        inputs.forEach(input => {
          if (input.value.trim() !== "") {
            adaJawabanLatihan = true;
          }
        });
      });

      // JIKA BELUM MENGERJAKAN AYO BERLATIH 
      if (!adaJawabanLatihan) {

        Swal.fire({
          icon: "warning",
          title: "Aktivitas Selesai",
          html: `
                    Semua soal aktivitas telah dijawab dengan benar.<br><br>
                    Namun kamu <b>belum mengerjakan bagian "Ayo Berlatih"</b>.<br><br>
                    Latihan tersebut membantu memperkuat pemahaman konsep
                    sebelum melanjutkan materi berikutnya.
                  `,
          showCancelButton: true,
          confirmButtonText: "Tetap Lanjut",
          cancelButtonText: "Kembali ke Ayo Berlatih",
          allowOutsideClick: false
        }).then((result) => {

          if (result.isConfirmed) {

            window.location.href = "/bab1/rangkuman-bab1";

          } else {

            // scroll kembali ke latihan
            document.querySelector(".conversion-title").scrollIntoView({
              behavior: "smooth"
            });

          }

        });

      }

      // JIKA SUDAH MENGERJAKAN LATIHAN 
      else {

        Swal.fire({
          icon: "success",
          title: "Aktivitas Selesai",
          text: "Semua soal telah dijawab dengan benar. Silakan lanjut ke materi berikutnya.",
          confirmButtonText: "Lanjut",
          allowOutsideClick: false
        }).then(() => {
          kirimProgressDesimal();

        });

      }

    }

    function resetLatihan() {

      Swal.fire({
        icon: "info",
        title: "Latihan Direset",
        text: "Semua jawaban telah dikosongkan.",
        timer: 1200,
        showConfirmButton: false
      }).then(() => {

        document.querySelectorAll(".bit-input").forEach(input => {
          input.value = "";
          input.classList.remove("correct", "wrong");
        });

      });

    }

    const keyKonversiDesimal = "jawaban_konversi_desimal";

    document.addEventListener("input", function (e) {

      if (e.target.classList.contains("bit-input")) {

        const row = e.target.closest(".scratch-row");
        const id = row.dataset.id;

        const inputs = row.querySelectorAll(".bit-input");

        let nilai = "";

        inputs.forEach(i => {
          nilai += i.value || "";
        });

        let data = JSON.parse(localStorage.getItem(keyKonversiDesimal)) || {};

        data[id] = nilai;

        localStorage.setItem(keyKonversiDesimal, JSON.stringify(data));

      }

    });

    // load jawaban
    window.addEventListener("DOMContentLoaded", function () {

      let data = JSON.parse(localStorage.getItem(keyKonversiDesimal)) || {};

      document.querySelectorAll(".scratch-row[data-id]").forEach(row => {

        const id = row.dataset.id;

        if (data[id]) {

          const bits = data[id].split("");
          const inputs = row.querySelectorAll(".bit-input");

          inputs.forEach((input, index) => {
            if (bits[index]) {
              input.value = bits[index];
            }
          });

        }

      });

    });


    function cekLatihanDesimal(e) {

      let waktu = (Date.now() - startTime) / 1000;

      // JIKA SUDAH PERNAH SELESAI MAKA LANGSUNG LEWAT
      if (sudahSelesaiQuiz && sudahLatihanDrag && sudahLatihanKonversi) {
        kirimProgressDesimal();
        return true;
      }

      // ===== 1. CEK MEMBACA =====
      if (waktu < 120) {
        e.preventDefault();
        Swal.fire({
          icon: "warning",
          title: "Belum Membaca Materi",
          text: "Silakan baca materi terlebih dahulu.",
        });
        return false;
      }

      // ===== 2. CEK PEMAHAMAN =====
      if (!sudahLulusPemahaman) {
        e.preventDefault();
        tampilkanPertanyaanPemahaman();
        return false;
      }

      // ===== 3. CEK LATIHAN =====
      let belum = [];

      if (!sudahLatihanDrag) {
        belum.push("Latihan Rumus");
      }

      if (!sudahLatihanKonversi) {
        belum.push("Ayo Berlatih");
      }

      if (!sudahSelesaiQuiz) {
        belum.push("Aktivitas");
      }

      // ===== JIKA LATIHAN BELUM =====
      if (belum.length > 0) {
        e.preventDefault();

        Swal.fire({
          icon: "warning",
          title: "Latihan Belum Lengkap",
          html: `
                    Tapi, kamu belum menyelesaikan:<br><br>
                    <b style="line-height:1.8;">
                      ${belum.join("<br>")}
                    </b><br><br>
                    Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                  `,
          showCancelButton: true,
          confirmButtonText: "Tetap Lanjut",
          cancelButtonText: "Kerjakan Dulu"
        }).then((result) => {

          if (result.isConfirmed) {
            kirimProgressDesimal();
          }

        });

        return false;
      }

      // ===== SEMUA SELESAI =====
      kirimProgressDesimal();

    }

    function tampilkanPertanyaanPemahaman() {

      Swal.fire({
        title: "Pertanyaan Pemahaman",
        html: `
                  Sistem bilangan desimal memiliki basis berapa?<br><br>
                  <button class="swal2-cancel swal2-styled" onclick="jawabPemahaman(2)">2</button>
                  <button class="swal2-cancel swal2-styled" onclick="jawabPemahaman(8)">8</button>
                  <button class="swal2-cancel swal2-styled" onclick="jawabPemahaman(10)">10</button>
                `,
        showConfirmButton: false,
        allowOutsideClick: false
      });
    }

    function jawabPemahaman(jawaban) {

      if (jawaban === 10) {

        sudahLulusPemahaman = true;

        Swal.fire({
          icon: "success",
          title: "Benar!",
          text: "Kamu sudah memahami materi.",
        });

      } else {

        Swal.fire({
          icon: "error",
          title: "Salah",
          text: "Coba baca materi lagi ya.",
        });

      }
    }

    function kirimProgressDesimal() {

      fetch("/progres/selesai/Sistem Bilangan/Bilangan Desimal", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
      })
        .then(res => {
          if (!res.ok) throw new Error("Gagal simpan");

          // PINDAH HALAMAN SETELAH BERHASIL
          window.location.href = "/bab1/rangkuman-bab1";
        })
        .catch(() => {
          Swal.fire("Error", "Progress gagal disimpan", "error");
        });
    }

    let currentStep = 1;
    const totalStep = 3;

    function showStep(step) {
      document.querySelectorAll(".step-section").forEach(el => {
        el.classList.remove("active");
      });

      document.getElementById("step" + step).classList.add("active");

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

    let draggedItem = null;

    // ambil semua drag item
    document.querySelectorAll(".drag-item").forEach(item => {
      item.addEventListener("dragstart", function () {
        draggedItem = this;
      });
    });

    // drop box
    document.querySelectorAll(".drop-box").forEach(box => {

      box.addEventListener("dragover", function (e) {
        e.preventDefault();
      });

      box.addEventListener("drop", function (e) {

        e.preventDefault();

        if (!draggedItem) return;

        this.textContent = draggedItem.textContent;
        this.dataset.filled = draggedItem.textContent;

      });

    });

    function cekDragFinal() {

      // reset semua warna dulu
      document.querySelectorAll(".drop-box, .power-input, .mini-input").forEach(el => {
        el.classList.remove("correct", "wrong");
      });

      const boxes = document.querySelectorAll(".drop-box");

      const p1 = document.getElementById("p1");
      const p2 = document.getElementById("p2");
      const p3 = document.getElementById("p3");

      const r1 = document.getElementById("r1");
      const r2 = document.getElementById("r2");
      const r3 = document.getElementById("r3");

      const hasil = document.getElementById("hasil");

      const digitBenar = ["3", "2", "7"];
      const pangkatBenar = ["2", "1", "0"];
      const hasilBaris2 = ["300", "20", "7"];

      let benar = true;

      // cek drag digit
      boxes.forEach((box, i) => {
        if (box.textContent === digitBenar[i]) {
          box.classList.add("correct");
        } else {
          box.classList.add("wrong");
          benar = false;
        }
      });

      // cek pangkat
      [p1, p2, p3].forEach((input, i) => {
        if (input.value === pangkatBenar[i]) {
          input.classList.add("correct");
        } else {
          input.classList.add("wrong");
          benar = false;
        }
      });

      // cek hasil baris 2
      [r1, r2, r3].forEach((input, i) => {
        if (input.value === hasilBaris2[i]) {
          input.classList.add("correct");
        } else {
          input.classList.add("wrong");
          benar = false;
        }
      });

      // cek hasil akhir
      if (hasil.value === "327") {
        hasil.classList.add("correct");
      } else {
        hasil.classList.add("wrong");
        benar = false;
      }

      if (benar) {

        sudahLatihanDrag = true;

        Swal.fire({
          icon: "success",
          title: "Semua Jawaban Benar!",
          html: "Kamu sudah berhasil menguraikan bilangan desimal berdasarkan nilai tempat.",
          showCancelButton: true,
          confirmButtonText: "Kerjakan Kembali",
          cancelButtonText: "Lanjut",
          allowOutsideClick: false
        }).then((result) => {

          if (result.isConfirmed) {

            // ulangi latihan
            resetDragLatihan();

          } else {

            // lanjut ke bagian berikutnya
            document.querySelector(".conversion-title").scrollIntoView({
              behavior: "smooth"
            });

          }

        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Coba lagi",
          text: "Masih ada yang belum tepat",
        });
      }
    }

    function resetDragLatihan() {

      Swal.fire({
        title: 'Reset Jawaban?',
        text: "Semua jawaban latihan akan dihapus.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b91c1c',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, reset',
        cancelButtonText: 'Batal'

      }).then((result) => {

        if (result.isConfirmed) {

          // reset drop box
          document.querySelectorAll('.drop-box').forEach(box => {
            box.innerHTML = "";
          });

          // reset input
          document.querySelectorAll('.mini-input, .power-input').forEach(input => {
            input.value = "";
            input.classList.remove("correct", "wrong");
          });

          // kembalikan angka drag
          document.querySelectorAll('.digit').forEach(digit => {
            document.querySelector('.digit-container').appendChild(digit);
          });

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

    window.addEventListener("DOMContentLoaded", function () {

      fetch("/progres/cek/Sistem Bilangan/Bilangan Desimal")
        .then(res => res.json())
        .then(res => {

          if (res.selesai) {

            sudahLulusPemahaman = true;
            sudahLatihanDrag = true;
            sudahLatihanKonversi = true;
            sudahSelesaiQuiz = true;

            console.log("Sudah selesai sebelumnya");
          }

        });

    });

    document.querySelectorAll(".number-only").forEach(input => {

      input.addEventListener("input", function () {

        // hanya angka
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