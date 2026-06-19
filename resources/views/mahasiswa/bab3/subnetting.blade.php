@extends('mahasiswa.mahasiswa')

@section('title', 'Subbab - Pengenalan Subnetting')

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

        /* ===== INFO BOX ===== */
        .info-box {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            padding: 12px 16px;
            margin: 16px 0;
        }

        /* ===== TABEL ===== */
        .table-wrapper {
            margin-top: 16px;
        }

        /* ===== AKTIVITAS ===== */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 18px;
            margin-top: 18px;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .option {
            border: 1.5px solid #d6c3b2;
            padding: 10px 14px;
            cursor: pointer;
        }

        .option:hover {
            background: #f3ebe6;
        }

        /* aktivitas */
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
            font-weight: 600;
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

        .section-title {
            margin-top: 18px;
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 19px;
            color: #92400e;
        }

        .image-box {
            text-align: center;
            margin: 16px 0;
        }

        .image-box img {
            max-width: 80%;
            border-radius: 6px;
        }

        .custom-list {
            list-style: none;
            margin: 10px 0 10px 18px;
            padding: 0;
        }

        .custom-list li {
            margin-bottom: 6px;
            position: relative;
            padding-left: 14px;
            line-height: 1.7;
        }

        .custom-list li::before {
            content: "•";
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .highlight-box {
            background: #fff7ed;
            border-left: 5px solid #b45309;
            padding: 12px 16px;
            margin: 16px 0;
            font-weight: 600;
            border-radius: 6px;
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

        .subnet-visual-box {
            background: #fffaf5;
            border: 1px solid #f1e0d6;
            border-radius: 10px;
            padding: 18px;
            margin-top: 15px;
        }

        .visual-header {
            margin-bottom: 12px;
        }

        .visual-desc {
            font-size: 14px;
            color: #6b7280;
        }

        .slider-box {
            margin: 15px 0;
        }

        .ip-container {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }

        .ip-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            margin-bottom: 10px;
        }

        .octet {
            background: #b45309;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: bold;
        }

        .octet-bit {
            display: flex;
            gap: 4px;
        }

        .bit-box {
            width: 30px;
            height: 30px;
            border-radius: 6px;
            text-align: center;
            line-height: 30px;
            font-size: 12px;
            font-weight: bold;
            transition: all 0.2s ease;
        }

        .subnet-bit {
            background: #f59e0b;
            color: white;
        }

        .host-bit {
            background: #e5e7eb;
        }

        .legend {
            margin-top: 10px;
            font-size: 13px;
            display: flex;
            justify-content: center;
            gap: 10px;
            align-items: center;
        }

        .legend-box {
            width: 14px;
            height: 14px;
            display: inline-block;
            border-radius: 3px;
        }

        .legend-box.network {
            background: #b45309;
        }

        .legend-box.subnet {
            background: #f59e0b;
        }

        .legend-box.host {
            background: #e5e7eb;
        }

        .fullscreen-img {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw !important;
            height: 100vh !important;
            object-fit: contain;
            background: rgba(0, 0, 0, 0.95);
            z-index: 99999;
            cursor: zoom-out;
            padding: 40px;
        }

        .swal-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* CARD OPSI */
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

        /* hover */
        .swal-option:hover {
            background: #fdf6f1;
        }

        /* sembunyikan radio */
        .swal-option input {
            display: none;
        }

        /* selected */
        .swal-option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
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

        .pemantik-feedback {
            margin-top: 8px;
            font-size: 15px;
            font-style: italic;
        }

        .gambar-subnet {
            text-align: center;
            margin: 18px 0;
            width: 100%;
            overflow: hidden;
        }

        .gambar-subnet img {
            max-width: 450px;
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .caption-gambar {
            font-size: 13px;
            color: #6b7280;
            margin-top: 8px;
        }

        @media (max-width:768px) {

            .gambar-subnet img {
                width: 100%;
                max-width: 100%;
                border-radius: 6px;
            }

            .subnet-visual {
                width: 100%;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 8px 4px;
                box-sizing: border-box;
            }

            .ip-visual {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 2px;
                width: auto;
                max-width: 100%;
                transform: scale(0.78);
                transform-origin: center center;
            }

            .octet-box {
                width: 34px !important;
                min-width: 34px !important;
                height: 34px !important;
                font-size: 11px !important;
            }

            .bit-box {
                width: 18px !important;
                min-width: 18px !important;
                height: 22px !important;
                font-size: 9px !important;
            }

            .dot {
                font-size: 12px !important;
                margin: 0 1px !important;
            }

        }
    </style>


    <!-- PENGERTIAN SUBNETTING -->
    <div class="step-section active" id="step1">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-diagram-3"></i>
                </div>
                Pengertian Subnetting
            </div>

            <br>
            <!-- PERTANYAAN PEMANTIK -->
            <div class="pemantik-box">

                <div class="pemantik-box-ip">

                    <div class="pemantik-title">
                        <i class="bi bi-lightbulb"></i>
                        Pertanyaan Pemantik
                    </div>

                    <p class="pemantik-text">
                        Coba pikirkan, jika sebuah jaringan komputer memiliki terlalu banyak perangkat dalam satu jaringan besar, apa masalah yang paling mungkin terjadi?
                    </p>

                    <textarea id="jawabanPemantikIP" class="pemantik-input"
                        placeholder="Tuliskan jawabanmu sebelum melanjutkan ke materi berikut."></textarea>

                    <button onclick="tampilkanMateriIP()" class="pemantik-btn">
                        Kirim
                    </button>

                    <div id="feedbackPemantikIP" class="pemantik-feedback"></div>

                </div>

            </div>

            <div id="materiSubnetting" class="box-body" style="display:none;">
                Perhatikan video berikut untuk memahami konsep subnetting secara sederhana.
                <div class="video-container">
                    <iframe src="https://drive.google.com/file/d/1xa-HPwGNZqtVhHbBA3RLhY2Pkpi4TcMq/preview"
                        allow="autoplay">
                    </iframe>
                </div>
                <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align:center;">
                    Sumber: YouTube - Deni Kurnia
                </div>

                <br>
                Melalui ilustrasi pada video tersebut, dapat dipahami bahwa pengelolaan jaringan yang terlalu besar tanpa pembagian akan menjadi kurang efektif dan sulit dikendalikan. Oleh karena itu, diperlukan suatu teknik untuk membagi jaringan menjadi bagian yang lebih kecil, yaitu <i>subnetting</i>.

                <div class="highlight-box"> Subnetting adalah proses membagi sebuah jaringan IP yang besar menjadi beberapa jaringan yang lebih kecil (subnet), sehingga jaringan menjadi lebih efisien, terstruktur, dan mudah dikelola. </div>

                Subnetting merupakan salah satu metode yang digunakan untuk menghemat penggunaan alamat IP, selain teknik lain seperti CIDR, IPv6, dan penggunaan alamat IP privat.

                <br><br>

                Dalam jaringan komputer, perangkat dengan <i>network address</i> yang sama berada dalam satu <i>subnet</i>. <i>Subnetting</i> digunakan untuk membagi jaringan besar menjadi <i>subnet</i> yang lebih kecil sesuai kebutuhan. Teknik ini penting terutama pada jaringan berskala besar, meskipun pada jaringan kecil tidak selalu diperlukan.

                <br><br>

                <!-- SUBTITLE -->
                <div class="section-title">Ilustrasi Subnetting</div>

                Gambar berikut menunjukkan contoh pembagian sebuah jaringan besar menjadi beberapa subnet yang lebih kecil.

                <div class="image-box">
                    <img src="{{ asset('assets/img/contoh_subnetting.png') }}" class="popup-img" alt="Ilustrasi Subnetting">
                </div>
                <div style="font-size:13px; color:#6b7280; margin-top:6px; text-align: center;">
                    Gambar 3. 1 Pembagian jaringan menjadi beberapa subnet<br>
                    Sumber : Cisco Systems, 2003
                </div>

                <br>
                Pada gambar tersebut terlihat bahwa satu jaringan utama (131.108.0.0) dibagi menjadi beberapa subnet yang lebih kecil, seperti 131.108.1.0, 131.108.2.0, dan 131.108.3.0.

                <br>
                <div class="info-box">
                    <div class="section-title">Manfaat Subnetting</div>
                    <i>Subnetting</i> memberikan beberapa keuntungan, antara lain:
                    <ol>
                        <ul class="custom-list">
                            <li>Mengurangi lalu lintas jaringan</li>
                            <li>Meningkatkan performa jaringan</li>
                            <li>Mempermudah pengelolaan jaringan</li>
                            <li>Mendukung pengembangan jaringan</li>
                        </ul>
                </div>
                </ol>

                <br>
                <div class="section-title">Bagaimana Subnetting Bekerja?</div> <i>Subnetting</i> bekerja <strong>dengan cara meminjam</strong> beberapa <i>bit</i> dari bagian <i>host</i> untuk dijadikan bagian <i>network</i> tambahan (<i>subnet</i>). Dalam sebuah alamat <i>IP:</i>

                <ul class="custom-list">
                    <li>Awalnya terdiri dari <strong>Network + Host</strong></li>
                    <li>Setelah subnetting menjadi <strong>Network + Subnet + Host</strong></li>
                </ul>

                <div class="subnet-visual-box">

                    <div class="visual-header">
                        <div class="section-title">Simulasi Subnetting</div>
                        <p class="visual-desc">
                            Geser slider untuk melihat bagaimana bit host dipinjam menjadi subnet.
                        </p>
                    </div>

                    <div class="slider-box">
                        <label>Pinjam bit: <strong id="bitNow2">0</strong></label>
                        <input type="range" min="0" max="6" value="0" id="sliderBitOktet">
                    </div>

                    <div class="ip-container">

                        <div class="ip-row">
                            <div class="octet">192</div>
                            <span>.</span>
                            <div class="octet">168</div>
                            <span>.</span>
                            <div class="octet">10</div>
                            <span>.</span>
                            <div class="octet-bit" id="bitOktet"></div>
                        </div>

                        <div class="legend">
                            <span class="legend-box network"></span> Network
                            <span class="legend-box subnet"></span> Subnet
                            <span class="legend-box host"></span> Host
                        </div>

                    </div>

                    <div id="subnetInfo"></div>

                </div>
                <div class="info-box">
                    Semakin banyak bit host yang dipinjam, maka:
                    <ul class="custom-list">
                        <li>Jumlah subnet akan <strong>semakin banyak</strong></li>
                        <li>Jumlah host dalam setiap subnet akan <strong>semakin sedikit</strong></li>
                    </ul>
                </div>

                Dalam proses subnetting, terdapat beberapa batasan:
                <ul class="custom-list">
                    <li>Minimal bit yang dipinjam adalah <strong>1 bit</strong></li>
                    <li>Harus menyisakan minimal <strong>2 bit untuk host</strong> (<i>network</i> dan <i>broadcast
                            address</i>)</li>
                </ul>

                <br>
                Ilustrasi berikut menunjukkan pembagian alamat subnet serta hubungan antar jaringan.

                <!-- GAMBAR -->
                <div class="gambar-subnet">

                    <img src="{{ asset('assets/img/contoh_subnetting2.png') }}" alt="Ilustrasi subnetting">

                    <div class="caption-gambar">
                        Gambar 3.2 Ilustrasi subnetting dan komunikasi antar subnet <br>
                        Sumber : Cisco Systems, 2003
                    </div>

                </div>

                <br>
                Ilustrasi tersebut menunjukkan bahwa sebuah jaringan besar dapat dibagi menjadi beberapa subnet yang lebih kecil, seperti 131.108.1.0, 131.108.2.0, dan 131.108.0.0. Setiap subnet memiliki kelompok host dengan rentang alamat IP masing-masing, dan komunikasi antar subnet dilakukan melalui router

                <br>
                <div class="info-box">
                    <div class="section-title">Peran Administrator Jaringan</div>

                    Dalam melakukan subnetting, seorang administrator jaringan harus menentukan:

                    <ol class="custom-list">
                        <li>Berapa jumlah subnet yang dihasilkan? </li>
                        <li>Berapa jumlah host yang dapat digunakan pada setiap subnet?</li>
                        <li>Berapa rentang alamat host yang valid pada setiap subnet?</li>
                        <li>Apa saja network dan broadcast address pada setiap subnet?</li>
                    </ol>
                    <br>
                    Pertanyaan-pertanyaan tersebut akan dijawab melalui proses perhitungan subnetting pada subbab berikutnya.
                </div>

            </div>
        </div>
    </div>

    <!-- aktivitas -->
    <div class="step-section" id="step2">
        <div class="materi-box">
            <div class="box-header">
                <div class="icon-circle">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Aktivitas 3.1
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
        <button class="page-btn nav-arrow" onclick="nextStep()">
            <i class="bi bi-chevron-right"></i>
        </button>

    </div>

    <div class="nav-bottom">
        <a href="/bab3/tujuan-pembelajaran-bab3" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab3/perhitungan-subnetting" class="nav-btn nav-next" onclick="konfirmasiLanjut(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <!-- MODAL GAMBAR -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="imgModal">
    </div>

    <script>
        let startTime = Date.now();
        let sudahLulusPemahaman = false;
        let aktivitasSelesai = false;

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
                    title: "Cek Pemahaman",
                    html: `
                        <div style="text-align:left">

                            <p style="text-align:center; font-weight:600; margin-bottom:16px;">
                                Apa tujuan utama subnetting?
                            </p>

                            <div class="swal-options">

                                <label class="swal-option">
                                    <input type="radio" name="jawaban" value="a">
                                    <span>Membuat jaringan lebih lambat</span>
                                </label>

                                <label class="swal-option">
                                    <input type="radio" name="jawaban" value="b">
                                    <span>Membagi jaringan menjadi bagian lebih kecil</span>
                                </label>

                                <label class="swal-option">
                                    <input type="radio" name="jawaban" value="c">
                                    <span>Menghapus alamat IP</span>
                                </label>

                                <label class="swal-option">
                                    <input type="radio" name="jawaban" value="d">
                                    <span>Menambah bandwidth otomatis</span>
                                </label>

                            </div>

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
                                // LANJUT OTOMATIS TANPA KLIK LAGI
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
            // 3. CEK AKTIVITAS
            // =====================
            if (!aktivitasSelesai) {
                Swal.fire({
                    icon: "warning",
                    title: "Latihan Belum Lengkap",
                    html: `
                        Tapi, kamu belum menyelesaikan:<br><br>
                        <b>Aktivitas</b><br><br>
                        Kamu tetap bisa lanjut, tetapi progres belum dihitung selesai.
                    `,
                    showCancelButton: true,
                    confirmButtonText: "Tetap Lanjut",
                    cancelButtonText: "Kerjakan Dulu",
                    reverseButtons: true,
                    allowOutsideClick: false
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.href = "/bab3/perhitungan-subnetting";
                    }

                    if (result.dismiss === Swal.DismissReason.cancel) {
                        document.getElementById("step3").scrollIntoView({
                            behavior: "smooth"
                        });
                    }

                });

                return;
            }

            // =====================
            // 4. KIRIM PROGRESS
            // =====================
            fetch(`/progres/selesai/${encodeURIComponent("Subnetting")}/${encodeURIComponent("Pengenalan Subnetting")}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).then(() => {

                // PINDAH HALAMAN DI SINI
                window.location.href = "/bab3/perhitungan-subnetting";

            });
        }

        let soal = [];
        let indexSoal = 0;
        let statusTerkunci = [];

        fetch("/aktivitas/subnetting/soal")
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

                    <div class="question-text">
                        ${data.q}
                    </div>
            `;

            // ===== PILGAN =====
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

            // ===== ISIAN =====
            if (data.tipe === "isian") {
                html += `
                    <input
                        type="text"
                        id="jawabanIsian"
                        class="option-text"
                        style="
                            width:100%;
                            padding:10px;
                            border:1px solid #d6c3b2;
                            border-radius:6px;
                        "
                        placeholder="Ketik jawaban..."
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
            let jawabanUser = null;

            // ===== PILGAN =====
            if (data.tipe === "pilgan") {
                const pilih = document.querySelector("input[name=jawaban]:checked");
                if (!pilih) return;
                jawabanUser = parseInt(pilih.value);
            }

            // ===== ISIAN =====
            if (data.tipe === "isian") {
                const input = document.getElementById("jawabanIsian");
                if (!input.value.trim()) return;

                jawabanUser = input.value.trim().toLowerCase();
            }

            fetch("/aktivitas/subnetting/cek", {
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
                            '<i class="bi bi-x-circle-fill"></i> Jawaban salah, silakan coba lagi';
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

            aktivitasSelesai = true;

            Swal.fire({
                icon: "success",
                title: "Aktivitas Selesai",
                text: "Semua soal telah dijawab dengan benar. Silakan lanjut ke materi berikutnya.",
                confirmButtonText: "Lanjut",
                allowOutsideClick: false
            }).then(() => {

                konfirmasiLanjut();

            });

        }

        let currentStep = 1;
        const totalStep = 2;

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

        function renderOktet() {

            const n = parseInt(sliderOktet.value);
            bitNow2.innerText = n;

            bitOktet.innerHTML = "";

            for (let i = 0; i < 8; i++) {

                const div = document.createElement("div");
                div.classList.add("bit-box");

                if (i < n) {
                    div.classList.add("subnet-bit");
                    div.innerText = "S";
                } else {
                    div.classList.add("host-bit");
                    div.innerText = "H";
                }

                bitOktet.appendChild(div);
            }

            const subnet = Math.pow(2, n);
            const host = Math.pow(2, (8 - n)) - 2;

            subnetInfo.innerHTML = `
                <div class="highlight-box">

                    Jumlah Subnet:
                    <strong>${subnet}</strong>

                    <br>

                    Host per Subnet:
                    <strong>${host}</strong>

                </div>
            `;
        }

        const sliderOktet = document.getElementById("sliderBitOktet");
        const bitOktet = document.getElementById("bitOktet");
        const subnetInfo = document.getElementById("subnetInfo");
        const bitNow2 = document.getElementById("bitNow2");

        // event saat slider digeser
        sliderOktet.addEventListener("input", renderOktet);

        // render pertama kali
        renderOktet();

        // pop up gambar
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("imgModal");
        const closeBtn = document.querySelector(".close");

        // ambil semua gambar yg bisa di klik
        document.querySelectorAll(".popup-img").forEach(img => {
            img.addEventListener("click", function () {

                const fullImg = document.createElement("img");
                fullImg.src = this.src;
                fullImg.classList.add("fullscreen-img");

                document.body.appendChild(fullImg);

                fullImg.addEventListener("click", () => {
                    fullImg.remove();
                });
            });
        });

        window.addEventListener("DOMContentLoaded", async () => {

            const res = await fetch(
                `/progres/cek/${encodeURIComponent("Subnetting")}/${encodeURIComponent("Pengenalan Subnetting")}`
            );

            const data = await res.json();

            if (data.selesai) {

                console.log("SUDAH PERNAH SELESAI SUBNETTING");

                // skip validasi
                sudahLulusPemahaman = true;
                aktivitasSelesai = true;

                // skip waktu baca
                startTime = 0;

                // buka materi otomatis
                document.getElementById("materiSubnetting").style.display = "block";

                // JANGAN sembunyikan pemantik
                // document.querySelector(".pemantik-box").style.display = "none";

                showStep(1);
            }

        });

        function tampilkanMateriIP() {

            const input = document.getElementById("jawabanPemantikIP");
            const feedback = document.getElementById("feedbackPemantikIP");
            const materi = document.getElementById("materiSubnetting");

            // kalau kosong
            if (input.value.trim() === "") {

                feedback.innerHTML = "Jawaban belum diisi";
                feedback.style.color = "#b91c1c";

                return;
            }

            // feedback jawaban
            feedback.innerHTML =
                "Menarik! Sekarang mari kita lihat penjelasannya.";

            feedback.style.color = "#15803d";

            // tampilkan materi
            materi.style.display = "block";

            // disable input & tombol
            input.disabled = true;

            document.querySelector(".pemantik-btn").disabled = true;

            // scroll
            materi.scrollIntoView({
                behavior: "smooth"
            });
        }
    </script>

@endsection