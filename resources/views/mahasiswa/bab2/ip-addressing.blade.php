@extends('mahasiswa.mahasiswa')

@section('title', 'Bab II - IP Addressing')

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

        .materi-box .box-body {
            padding: 18px;
            line-height: 1.8;
            text-align: justify;
            color: #1f2937;
        }

        @media (max-width: 768px) {

            .materi-box img {
                width: 100%;
                height: auto;
            }

            .ip-input-group {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 8px;
                width: 100%;
            }

            .ip-input-group input {
                width: 70px;
                min-width: 0;
            }

            .materi-box {
                overflow-x: hidden;
            }

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

        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px 20px;
        }

        /* nomor soal */
        .question-number {
            font-size: 14px;
            font-weight: 600;
            color: #89471e;
            margin-bottom: 6px;
        }

        /* teks soal */
        .question-text {
            font-size: 16px;
            font-weight: 600;
            margin: 12px 0 18px;
            color: #1f2937;
        }

        /* container opsi */
        .options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* opsi */
        .option {
            border: 1.5px solid #d6c3b2;
            border-radius: 6px;
            padding: 10px 14px;
            cursor: pointer;
            background: #ffffff;
            transition: background 0.15s ease, border-color 0.15s ease;
            display: flex;
            align-items: center;
        }

        /* hover */
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

        .quiz-nav-left {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 20px;
        }

        /* tombol kembali */
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

        /* tombol next */
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
            max-width: 520px;
            text-align: center;
        }

        /* SECTION KONVERSI */
        .conversion-section {
            margin-top: 28px;
            padding: 20px 22px;
            background: #fdf6ee;
            border: 1px solid #e7d9cc;
            border-radius: 10px;
        }

        /* Judul kecil */
        .conversion-title {
            font-size: 18px;
            font-weight: 700;
            color: #89471e;
            margin-bottom: 6px;
        }

        .conversion-section pre {
            width: fit-content;
            margin: 8px auto;
            padding: 6px 14px;
            font-size: 13px;
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

        .modal-content {
            margin: auto;
            display: block;
            max-width: 80%;
            max-height: 80%;
            border-radius: 8px;
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }

        /* efek zoom */
        .modal-content.zoomed {
            transform: scale(1.5);
            cursor: zoom-out;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 40px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .conversion-desc {
            font-size: 14px;
            margin-bottom: 14px;
            color: #374151;
        }

        .ip-input-group {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .ip-octet {
            width: 70px;
            padding: 8px;
            text-align: center;
            border: 1.5px solid #c8b6a6;
            border-radius: 6px;
            font-size: 14px;
        }

        .ip-input-group span {
            font-weight: bold;
            color: #6b7280;
        }

        .result-box {
            margin-top: 16px;
            text-align: center;
            font-family: monospace;
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            background: #f3ebe6;
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
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

        /* IP BESAR */
        .ip-highlight-box {
            background: #f97316;
            color: white;
            font-weight: 800;
            font-size: 20px;
            padding: 8px 18px;
            border-radius: 8px;
            display: inline-block;
            margin: 10px auto;
        }

        .ip-highlight-box {
            display: block;
            width: fit-content;
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

        .video-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .video-container iframe {
            width: 70%;
            height: 400px;
            border-radius: 5px;
            border: none;
        }

        .swal-radio-group {
            text-align: left;
            margin-top: 10px;
        }

        /* OPTION */
        .swal-radio-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1.5px solid #e5e7eb;
            margin-bottom: 8px;
            cursor: pointer;
            transition: 0.2s;
            font-size: 14px;
        }

        /* HOVER */
        .swal-radio-option:hover {
            background: #fef3c7;
            border-color: #f59e0b;
        }

        /* RADIO */
        .swal-radio-option input {
            accent-color: #b45309;
        }

        /* SELECTED */
        .swal-radio-option:has(input:checked) {
            background: #fde68a;
            border-color: #d97706;
            font-weight: 600;
        }

        .result-info {
            color: #16a34a;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .binary-result {
            background: #efe5dd;
            padding: 14px 18px;
            border-radius: 10px;
            font-size: 1.2rem;
            font-weight: 700;
            color: #0f172a;
            display: inline-block;
        }
    </style>

    <!-- PENGERTIAN IP ADDRESS -->
    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-globe"></i>
                </div>
                IP Address
            </div>

            <br>
            <!-- PERTANYAAN PEMANTIK -->
            <div class="pemantik-box">

                <div class="pemantik-box-ip">

                    <div class="pemantik-title">
                        <i class="bi bi-lightbulb"></i>
                        Pertanyaan Pemantik
                    </div>

                    <div class="ip-highlight-box">
                        192.168.1.1
                    </div>

                    <p class="pemantik-text"> Perhatikan angka di atas! <br><br>Pernahkah kalian melihat deretan angka
                        seperti itu sebelumnya?<br> Menurutmu, di mana biasanya angka-angka tersebut dapat ditemukan? </p>

                    <textarea id="jawabanPemantikIP" class="pemantik-input"
                        placeholder="Tuliskan jawabanmu sebelum melanjutkan ke materi berikut."></textarea>

                    <button onclick="tampilkanMateriIP()" class="pemantik-btn">
                        Kirim
                    </button>

                    <div id="feedbackPemantikIP" class="pemantik-feedback"></div>

                </div>

            </div>

            <div id="materiIP" style="display:none;">
                <div class="box-body">

                    Perhatikan video berikut untuk memahami <i>IP Address</i> secara sederhana.<br>
                    <div class="video-container">
                        <iframe src="https://drive.google.com/file/d/1yydH9YG2R5h52oTZ4pablkMIF1ck_3sk/preview"
                            allow="autoplay">
                        </iframe>
                    </div>
                    <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align:center;">
                        Sumber: YouTube - Deni Kurnia
                    </div>

                    <br>
                    Tanpa disadari, deretan angka seperti <strong>192.168.1.1</strong> sering kita jumpai dalam kehidupan
                    sehari-hari, misalnya pada pengaturan <i>Wi-Fi</i>, pengecekan koneksi internet, atau konfigurasi
                    <i>router</i>. Angka-angka tersebut bukan sekadar angka biasa, melainkan berperan penting dalam
                    komunikasi data pada jaringan komputer.

                    <!-- GAMBAR -->
                    <div id="gambar-ip-address" style="text-align:center; margin:18px 0;">
                        <img src="{{ asset('assets/img/ip-address.png') }}" style="max-width:45%; cursor:pointer;"
                            onclick="openImage(this.src)">

                        <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                            Gambar 2.1 <i>IP Address</i><br>
                            Sumber:
                            <a href="https://www.adjust.com/glossary/ip-address/" target="_blank">
                                www.adjust.com/glossary/IP-address/
                            </a>
                        </div>
                    </div>

                    Pada gambar diatas, terlihat beberapa perangkat, seperti laptop, komputer, ponsel, dan printer,
                    terhubung dalam satu jaringan yang sama. Masing-masing perangkat memiliki deretan angka yang berbeda,
                    misalnya <strong>184.19.243.1, 184.19.243.2, dan seterusnya</strong>. Angka-angka tersebut menunjukkan
                    bahwa setiap perangkat dalam jaringan memiliki alamat tersendiri.

                    <br><br>
                    Jika dalam satu jaringan terdapat banyak perangkat yang terhubung secara bersamaan,
                    muncul pertanyaan penting berikut.


                    <div class="highlight-question">
                        “Bagaimana jaringan dapat mengenali dan membedakan setiap perangkat tersebut
                        agar data yang dikirim tidak salah tujuan?”
                    </div>

                    <br>
                    Untuk itu, setiap perangkat harus memiliki alamat unik sebagai identitasnya, yang disebut <i>IP
                        Address</i> (<i>Internet Protocol Address</i>).

                    <br><br> <strong><i>IP Address</i> (<i>Internet Protocol Address</i>)</strong> adalah alamat unik yang
                    dimiliki oleh setiap perangkat dalam jaringan agar perangkat tersebut dapat dikenali dan saling
                    berkomunikasi dengan perangkat lain. Komunikasi tersebut berlangsung melalui protokol
                    <strong><i>TCP/IP</i></strong>, yaitu sekumpulan aturan yang mengatur pertukaran data dalam jaringan dan
                    internet. Secara umum, <i>IP Address</i> terdiri dari dua bagian, yaitu <strong><i>Network
                            ID</i></strong> dan <strong><i>Host ID</i></strong>. <i>Network ID</i> menunjukkan jaringan,
                    sedangkan <i>Host ID</i> mengidentifikasi perangkat dalam jaringan tersebut. Pembahasan lebih lanjut
                    mengenai <i>Network ID</i> dan <i>Host ID</i> akan dijelaskan pada subbab berikutnya.

                    <br><br>
                    IP Address berdasarkan perkembangannya dibagi menjadi dua jenis, yaitu:
                    <ul style="margin-left:20px; margin-top:8px;">
                        <li>
                            <strong>IPv4 (<em>Internet Protocol version 4</em>)</strong>, terdiri dari 32 bit yang dibagi
                            menjadi 4 oktet (8 bit)
                        </li>

                        <li>
                            <strong>IPv6 (<em>Internet Protocol version 6</em>)</strong>, terdiri dari 128 bit untuk
                            mengatasi keterbatasan alamat IPv4.
                        </li>
                    </ul>

                    <br>
                    <i>IPv4</i> menggunakan notasi biner sebesar 32 bit yang dibagi atas 4 kelompok, masing- masing terdiri
                    dari 8 bit atau disebut <i>oktet</i> (<i>byte</i>). Setiap kelompok dipisahkan oleh tanda titik
                    (<i>dotted decimal notation</i>). Contoh penulisan alamat <i>IPv4</i> dapat dilihat pada gambar berikut.

                    <!-- GAMBAR -->
                    <div style="text-align:center; margin:18px 0;">
                        <img src="{{ asset('assets/img/formatip.jpg') }}" alt="Format Penulisan IPv4"
                            style="max-width:120%; cursor:pointer;" onclick="openImage(this.src)">
                        <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                            Gambar 2.2 Format Penulisan IPv4
                        </div>
                    </div>

                    <div class="conversion-section">
                        <h4 class="conversion-title">Mari Mencoba</h4>

                        <p class="conversion-desc">
                            Masukkan alamat IP <strong>192.168.10.25</strong> pada setiap oktet, kemudian amati hasil
                            konversinya ke bentuk biner.
                        </p>

                        <div class="ip-input-group">
                            <input type="number" class="ip-octet" id="oct1" placeholder="0-255">
                            <span>.</span>
                            <input type="number" class="ip-octet" id="oct2" placeholder="0-255">
                            <span>.</span>
                            <input type="number" class="ip-octet" id="oct3" placeholder="0-255">
                            <span>.</span>
                            <input type="number" class="ip-octet" id="oct4" placeholder="0-255">
                        </div>

                        <div style="text-align:center; margin-top:12px;">
                            <button onclick="convertIP()" class="next-btn">
                                Konversi
                            </button>
                        </div>

                        <div id="hasilBiner" class="result-box"></div>
                    </div>
                    <br>
                    <i>IP Address</i> dapat ditulis dalam bentuk biner maupun desimal. Dalam 1 <i>byte</i>, nilai biner
                    terkecil yang dapat dibentuk adalah <strong>00000000</strong> (0), sedangkan nilai biner terbesar adalah
                    <strong>11111111</strong> (255). Oleh karena itu, setiap bagian alamat <i>IPv4</i> selalu berada pada
                    rentang 0–255.

                    <div style="text-align:center; margin:18px 0;">
                        <img src="{{ asset('assets/img/format-ip3.jpg') }}" alt="Struktur IP Address"
                            style="max-width:110%;">
                        <div style="font-size:13px; color:#6b7280; margin-top:6px;">
                            Gambar 2. 3 Struktur dasar <i>IP Address</i><br>
                            Sumber: Cisco Systems, 2003
                        </div>
                    </div>

                    <br>
                    Sebagai contoh, alamat <i>IP</i> 131.108.122.204 jika dinyatakan dalam bentuk biner menjadi
                    <strong>10000011.01101100.01111010.11001100</strong>. Karena <i>IPv4</i> terdiri dari <strong>32
                        bit</strong> dan setiap <i>bit</i> memiliki dua kemungkinan nilai (0 atau 1), maka jumlah maksimum
                    alamat <i>IPv4</i> yang dapat dibentuk adalah <strong>2<sup>32</sup></strong>, yaitu sebanyak
                    <strong>4.294.967.296 alamat</strong>.

                    <div class="conversion-section">
                        <h4 class="conversion-title">Ayo Berlatih!</h4>

                        <p>
                            Coba identifikasi alamat <i>IP</i> yang sedang digunakan oleh perangkatmu saat ini.
                        </p>

                        <p>

                            <strong>Petunjuk:</strong>
                        <ul>
                            <li>
                                Jika menggunakan <b>Windows</b>, buka <em>Command Prompt</em> lalu ketik:
                                <pre style="background:#f3ebe6; border-radius:6px; font-size:16px;">ipconfig</pre>
                            </li>

                            <li>
                                Jika menggunakan <b>Linux atau macOS</b>, buka <em>Terminal</em> lalu ketik:
                                <pre style="background:#f3ebe6; border-radius:6px; font-size:16px;">ifconfig</pre>
                                <div style="text-align:center; margin:6px 0;">atau</div>
                                <pre style="background:#f3ebe6; border-radius:6px; font-size:16px;">ip addr</pre>
                            </li>

                            <li> Jika menggunakan <b>HP (Android/iOS)</b>, buka pengaturan <i>Wi-Fi</i> dan lihat informasi
                                jaringan yang sedang terhubung. </li>
                        </ul>
                        </p>

                        <p style="margin-top:14px;">
                            Setelah itu, tuliskan alamat <i>IP</i> yang kamu temukan pada perangkatmu!
                        </p>

                        <!-- INPUT + TOMBOL -->
                        <div style="
                                                                    display:flex;
                                                                    justify-content:center;
                                                                    gap:10px;
                                                                    margin-top:10px;
                                                                    flex-wrap:wrap;
                                                                ">
                            <input type="text" id="ipUser" placeholder="Contoh: 192.168.1.17" style="
                                                                        padding:8px 12px;
                                                                        width:220px;
                                                                        border:1.5px solid #c8b6a6;
                                                                        border-radius:6px;
                                                                        font-size:14px;
                                                                        font-family:Fira Sans;
                                                                    ">

                            <button onclick="cekIP()" style="
                                                                        background:#89471e;
                                                                        color:white;
                                                                        border:none;
                                                                        padding:8px 18px;
                                                                        border-radius:999px;
                                                                        font-weight:600;
                                                                        cursor:pointer;
                                                                        font-family:Fira Sans;
                                                                    ">
                                Kirim
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AKTIVITAS -->
    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <span>Aktivitas 2.1</span>
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

    <div class="step-pagination" id="stepPagination" style="display:none;">

        <button class="page-btn nav-arrow" onclick="prevStep()">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="page-btn active" onclick="goToStep(1)" id="stepBtn1">1</button>
        <button class="page-btn" onclick="goToStep(2)" id="stepBtn2" style="display:none;">
            2
        </button>

        <button class="page-btn nav-arrow" onclick="nextStep()">
            <i class="bi bi-chevron-right"></i>
        </button>

    </div>

    <div class="nav-bottom">
        <a href="/bab2/tujuan-pembelajaran-bab2" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab2/kelas-ip" class="nav-btn nav-next" onclick="return cekLatihanIP(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <div id="imageModal" class="img-modal">
        <span class="close-modal">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

    <script>

        let aktivitasSelesai = false;
        let latihanIPSelesai = false;

        let startTime = Date.now();
        let sudahLulusPemahaman = false;

        function sudahBacaMinimal() {

            // kalau sudah pernah selesai, langsung lolos
            if (sudahLulusPemahaman) return true;

            let waktu = (Date.now() - startTime) / 1000;
            return waktu >= 100;
        }

        function tampilkanMateriIP() {

            const input = document.getElementById("jawabanPemantikIP");
            const feedback = document.getElementById("feedbackPemantikIP");

            if (input.value.trim() === "") {
                feedback.innerHTML = "Jawaban belum diisi";
                feedback.style.color = "#b91c1c";
                return;
            }

            feedback.innerHTML = "Jawaban berhasil disimpan! Sekarang mari kita lihat penjelasannya.";
            feedback.style.color = "#15803d";

            pemantikSudahDijawab = true;
            document.getElementById("stepPagination").style.display = "flex";

            document.getElementById("stepBtn2").style.display = "inline-block";

            document.getElementById("materiIP").style.display = "block";

            document.getElementById("materiIP").scrollIntoView({
                behavior: "smooth"
            });
        }

        const keyIP = "ip_latihan_user";
        // ayo berlatih
        function cekIP() {
            const ip = document.getElementById("ipUser").value.trim();

            if (!ip) {
                Swal.fire({
                    icon: "warning",
                    title: "Input Kosong",
                    text: "Silakan masukkan alamat IP terlebih dahulu",
                });
                return;
            }

            // regex IPv4 sederhana
            const ipPattern = /^(\d{1,3}\.){3}\d{1,3}$/;

            if (!ipPattern.test(ip)) {
                Swal.fire({
                    icon: "error",
                    title: "Format Salah",
                    text: "Format IP Address tidak valid",
                });
                return;
            }

            latihanIPSelesai = true;

            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: `Alamat IP ${ip} merupakan alamat IP perangkatmu.`,
            });
        }

        // simpan IP yang diketik user
        document.addEventListener("input", function (e) {

            if (e.target.id === "ipUser") {

                sessionStorage.setItem(keyIP, e.target.value);

            }

        });

        // load ulang jawaban saat refresh
        window.addEventListener("DOMContentLoaded", function () {

            const ipTersimpan = sessionStorage.getItem(keyIP);

            if (ipTersimpan) {
                document.getElementById("ipUser").value = ipTersimpan;
            }

        });

        let soal = [];
        let indexSoal = 0;
        let soalTerkunci = [];

        const quizContainer = document.getElementById("quizContainer");
        const feedback = document.getElementById("quizFeedback");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");

        // ambil soal dari backend
        fetch("/aktivitas/ip/soal")
            .then(res => res.json())
            .then(data => {
                soal = data;
                soalTerkunci = Array(soal.length).fill(false);
                renderSoal(); //
            });


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

            // PILGAN
            if (data.tipe === "pilgan") {
                html += `<div class="options">`;
                data.opsi.forEach((o, i) => {
                    html += `
                                                            <label class="option ${terkunci ? 'locked' : ''}">
                                                                <input type="radio" name="jawaban" value="${i}" ${terkunci ? 'disabled' : ''}>
                                                                <span class="option-text">${o}</span>
                                                            </label>
                                                            `;
                });
                html += `</div>`;
            }

            // ===== ISIAN =====
            if (data.tipe === "isian") {
                html += `
                                                            <input
                                                            type="text"
                                                            id="jawabanIsian"
                                                            placeholder="Contoh: 1,2,3"
                                                            style="
                                                                padding:8px 12px;
                                                                width:200px;
                                                                border:1.5px solid #c8b6a6;
                                                                border-radius:6px;
                                                                font-size:14px;
                                                                display:block;
                                                                margin:10px auto;
                                                                text-align:center;
                                                            "
                                                            ${terkunci ? 'disabled' : ''}
                                                            >
                                                            <div style="text-align:center; margin-top:10px;">
                                                            <button class="next-btn" onclick="cekJawabanIsian()">
                                                                Cek Jawaban
                                                            </button>
                                                            </div>
                                                        `;
            }

            html += `</div>`;

            quizContainer.innerHTML = html;
            feedback.textContent = "";

            nextBtn.disabled = !terkunci;
            prevBtn.disabled = indexSoal === 0;

            if (data.tipe === "pilgan" && !terkunci) {
                document.querySelectorAll("input[type=radio]").forEach(el => {
                    el.addEventListener("change", cekJawaban);
                });
            }
        }

        function cekJawabanIsian() {
            const input = document.getElementById("jawabanIsian");
            if (!input) return;

            const jawabanUser = input.value.trim();
            if (!jawabanUser) return;

            fetch("/aktivitas/ip/cek", {
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
                        input.disabled = true;
                        nextBtn.disabled = false;
                    } else {
                        feedback.textContent = "Jawaban salah, silakan coba kembali";
                        feedback.style.color = "#b91c1c";
                    }
                });
        }


        function cekJawaban() {
            const pilih = document.querySelector("input[name=jawaban]:checked");
            if (!pilih) return;

            fetch("/aktivitas/ip/cek", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id_soal: soal[indexSoal].id,
                    jawaban_user: pilih.value
                })
            })
                .then(res => res.json())
                .then(res => {
                    if (res.benar) {
                        soalTerkunci[indexSoal] = true;
                        feedback.textContent = "Jawaban benar";
                        feedback.style.color = "#15803d";

                        document.querySelectorAll('input[name="jawaban"]').forEach(r => {
                            if (!r.checked) r.disabled = true;
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

                aktivitasSelesai = true;

                // jika latihan IP belum selesai
                if (!latihanIPSelesai) {

                    Swal.fire({
                        icon: "warning",
                        title: "Aktivitas Selesai",
                        html: `
                                        Semua soal aktivitas telah dijawab dengan benar.<br><br>
                                        Namun kamu <b>belum mengisi alamat IP pada bagian "Ayo Berlatih"</b>.<br><br>
                                        Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                                    `,
                        showCancelButton: true,
                        confirmButtonText: "Tetap Lanjut",
                        cancelButtonText: "Kerjakan Dulu",
                        reverseButtons: true
                    }).then((result) => {

                        if (result.dismiss === Swal.DismissReason.cancel) {
                            document.querySelector(".conversion-section").scrollIntoView({
                                behavior: "smooth"
                            });
                        }

                        if (result.isConfirmed) {
                            window.location.href = "/bab2/kelas-ip";
                        }

                    });
                }

                // jika sudah mengisi IP
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
        }

        function prevSoal() {
            if (indexSoal === 0) return;
            indexSoal--;
            renderSoal();
        }

        function cekLatihanIP(e) {

            e.preventDefault();

            // ===== 1. CEK WAKTU BACA =====
            if (!sudahBacaMinimal()) {

                Swal.fire({
                    icon: "warning",
                    title: "Belum Membaca",
                    text: "Silakan baca materi terlebih dahulu."
                });

                return false;
            }

            // ===== 2. CEK PEMAHAMAN =====
            if (!sudahLulusPemahaman) {

                Swal.fire({
                    title: "Cek Pemahaman",
                    html: `
                                                                <div style="text-align:center; margin-bottom:12px; font-size:16px;">
                                                                Apa fungsi utama IP Address?</div>
                                                                <div class="swal-radio-group">
                                                                <label class="swal-radio-option">
                                                                <input type="radio" name="ip" value="a">
                                                                Sebagai alamat unik perangkat dalam jaringan</label>
                                                                <label class="swal-radio-option">
                                                                <input type="radio" name="ip" value="b">
                                                                Untuk mempercepat koneksi internet</label>
                                                                <label class="swal-radio-option">
                                                                <input type="radio" name="ip" value="c">
                                                                Untuk menyimpan data di komputer</label>
                                                                <label class="swal-radio-option">
                                                                <input type="radio" name="ip" value="d">
                                                                Untuk menghubungkan listrik ke perangkat</label></div>
                                                                `,
                    showCancelButton: true,
                    confirmButtonText: "Kirim",

                    preConfirm: () => {
                        const selected = document.querySelector('input[name="ip"]:checked');

                        if (!selected) {
                            Swal.showValidationMessage("Pilih salah satu jawaban!");
                            return false;
                        }

                        return selected.value;
                    }
                }).then((result) => {

                    if (result.isConfirmed) {

                        if (result.value === "a") {

                            sudahLulusPemahaman = true;

                            Swal.fire({
                                icon: "success",
                                title: "Benar!",
                                text: "IP Address adalah alamat unik perangkat dalam jaringan."
                            });

                        } else {

                            Swal.fire({
                                icon: "error",
                                title: "Salah",
                                text: "Coba pahami kembali fungsi IP Address."
                            });

                        }

                    }

                });
                return false;
            }

            // ===== 3. CEK LATIHAN IP =====
            const ip = document.getElementById("ipUser").value.trim();

            if (!latihanIPSelesai || !aktivitasSelesai) {

                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                                                                <div style="text-align:center; line-height:1.6;">
                                                                Tapi, kamu belum menyelesaikan:<br><br>

                                                                ${!latihanIPSelesai ? "<b>Ayo Berlatih</b><br>" : ""}
                                                                ${!aktivitasSelesai ? "<b>Aktivitas</b><br>" : ""}

                                                                <br>
                                                                Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                                                            </div>
                                                        `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu",
                    reverseButtons: true
                }).then((result) => {

                    // kalau pilih "Kerjakan Dulu"
                    if (result.dismiss === Swal.DismissReason.cancel) {

                        if (!latihanIPSelesai) {
                            document.querySelector(".conversion-section").scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                        else if (!aktivitasSelesai) {
                            showStep(2); // pindah ke halaman aktivitas
                        }

                    }

                    // kalau pilih "Tetap Lanjut"
                    if (result.isConfirmed) {
                        window.location.href = "/bab2/kelas-ip";
                    }

                });

                return false;
            }

            // 5. KIRIM KE PROGRES (INI YANG KAMU BUTUH)

            fetch("/progres/selesai/IP Addressing/Apa Itu IP Address", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                credentials: "same-origin"
            })
                .then(res => {
                    if (!res.ok) throw new Error("Gagal kirim progres");
                    return res.text();
                })
                .then(() => {
                    window.location.href = "/bab2/kelas-ip";
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire("Error", "Progres gagal disimpan", "error");
                });

            return false;

        }

        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImg");

        // fungsi buka modal
        function openImage(src) {
            modal.style.display = "block";
            modalImg.src = src;
            modalImg.classList.remove("zoomed");
        }

        // klik close
        document.querySelector(".close-modal").onclick = function () {
            modal.style.display = "none";
        };

        // klik luar → close
        modal.onclick = function (e) {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        };

        // klik gambar → zoom
        modalImg.onclick = function () {
            this.classList.toggle("zoomed");
        };

        function convertIP() {

            const octets = [
                document.getElementById("oct1").value,
                document.getElementById("oct2").value,
                document.getElementById("oct3").value,
                document.getElementById("oct4").value
            ];

            let hasil = [];

            for (let i = 0; i < octets.length; i++) {

                let num = parseInt(octets[i]);

                if (isNaN(num) || num < 0 || num > 255) {
                    Swal.fire("Error", "Setiap oktet harus diisi 0–255", "error");
                    return;
                }

                let binary = num.toString(2).padStart(8, "0");
                hasil.push(binary);
            }

            const binaryIP = hasil.join(".");

            document.getElementById("hasilBiner").innerHTML = `
                            <div class="result-info">
                                ✓ Hasil konversi alamat IP ${octets.join(".")} ke bentuk biner:
                            </div>

                            <div class="binary-result">
                                ${binaryIP}
                            </div>
                        `;
        }

        // pagination
        let currentStep = 1;
        const totalStep = 2;

        function showStep(step) {
            currentStep = step;

            document.querySelectorAll(".step-section").forEach(el => {
                el.classList.remove("active");
            });

            document.getElementById("step" + step).classList.add("active");

            updatePagination();

            const content = document.querySelector("main.content");

            if (content) {
                content.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }
        }

        function nextStep() {

            if (currentStep === 1 && !pemantikSudahDijawab) {
                alert("Jawab pertanyaan pemantik terlebih dahulu!");
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

        // klo semua sdh selesai kebuka semua
        window.addEventListener("DOMContentLoaded", function () {

            fetch("/progres/cek/IP Addressing/Apa Itu IP Address")
                .then(res => res.json())
                .then(res => {

                    if (res.selesai) {

                        // buka semua
                        aktivitasSelesai = true;
                        latihanIPSelesai = true;
                        sudahLulusPemahaman = true;

                        pemantikSudahDijawab = true;

                        // tampilkan pagination
                        document.getElementById("stepPagination").style.display = "flex";
                        document.getElementById("stepBtn2").style.display = "inline-block";

                        // tampilkan materi langsung
                        document.getElementById("materiIP").style.display = "block";

                        // lompat ke step aktivitas
                        showStep(1);

                    }

                });
        });
    </script>

@endsection