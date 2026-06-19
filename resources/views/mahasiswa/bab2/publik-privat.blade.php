@extends('mahasiswa.mahasiswa')

@section('title', 'Bab II - IP Publik dan Privat')

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

    /* aktivitas */
    .question-box {
      background: #f9f5f2;
      border: 1px solid #d6c3b2;
      border-radius: 8px;
      padding: 20px;
      margin-top: 10px;
    }

    /* nomor soal */
    .question-number {
      font-size: 14px;
      font-weight: 600;
      color: #89471e;
      margin-bottom: 8px;
    }

    /* teks soal */
    .question-text {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 16px;
      color: #1f2937;
    }

    .question-text ul,
    .question-text li {
      font-weight: 600;
    }

    /* opsi */
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
      transition: all 0.15s ease;
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

    /* isian */
    .fill-input {
      width: 100%;
      padding: 10px;
      border: 1.5px solid #d6c3b2;
      border-radius: 6px;
      font-size: 14px;
    }

    /* feedback */
    #quizFeedback {
      margin-top: 14px;
      font-weight: 600;
    }

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
      transition: all 0.2s ease;
    }

    .prev-btn:hover:not(:disabled) {
      background: #4b5563;
      transform: translateY(-1px);
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
      transition: all 0.2s ease;
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


    .fill-input {
      width: 100%;
      padding: 10px;
      border: 1.5px solid #d6c3b2;
      border-radius: 6px;
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

    /* penamaan ip */
    .section-line-title {
      border-left: 5px solid #89471e;
      padding-left: 12px;
      font-size: 20px;
      font-weight: 700;
      color: #89471e;
      margin: 18px 0;
    }

    .key-box {
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

    .soft-box {
      background: linear-gradient(135deg, #fff7ed, #ffedd5);
      border: 1px solid #f59e0b;
      padding: 14px 16px;
      border-radius: 10px;
      margin: 14px 0;
    }

    .sub-section {
      font-weight: 700;
      margin-top: 14px;
      font-size: 18px;
      color: #9a3412;
    }

    @media (max-width: 768px) {

      .latihan-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
      }

      /* pilihan jawaban */
      .latihan-pilihan {
        display: flex;
        flex-direction: row !important;
        justify-content: center;
        align-items: center;
        gap: 8px;
        width: 100%;
        margin-top: 10px;
        flex-wrap: nowrap;
      }

      .choice-box {
        width: 72px;
        height: 38px;
        font-size: 11px;
        padding: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        text-align: center;
        line-height: 1.1;
        margin: 0 !important;
      }

      /* box materi */
      .question-box {
        overflow: hidden;
        padding: 16px;
      }
    }

    /* LAYOUT */
    .latihan-container {
      display: flex;
      gap: 40px;
      justify-content: flex-start;
      align-items: flex-start;
      flex-wrap: wrap;
    }

    /* LIST */
    .latihan-list {
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    /* ROW */
    .latihan-row {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    /* IP */
    .ip-text {
      font-weight: 600;
      min-width: 160px;
      color: #1f2937;
    }

    /* DROP BOX */
    .drop-box {
      width: 120px;
      height: 38px;
      border: 2px dashed #d6c3b2;
      border-radius: 6px;
      background: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
    }

    /* PILIHAN */
    .latihan-pilihan {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    /* BOX PILIHAN */
    .choice-box {
      background: #89471e;
      color: white;
      padding: 10px;
      text-align: center;
      font-weight: 600;
      width: 100px;
      margin-left: 0;
      cursor: grab;
    }

    .choice-box:active {
      cursor: grabbing;
    }

    /* BUTTON */
    .latihan-action {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 12px;
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

    .question-box {
      background: #f9f5f2;
      border: 1px solid #d6c3b2;
      border-radius: 8px;
      padding: 18px;
      margin-top: 18px;
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

    /* GROUP */
    .swal-radio-group {
      margin-top: 12px;
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
  </style>

  <!-- MATERI -->
  <div class="step-section active" id="step1">
    <div class="materi-box">
      <div class="box-header">
        <div class="icon-circle">
          <i class="bi bi-globe2"></i>
        </div>
        <i>IP</i> Publik dan IP Privat
      </div>

      <div class="box-body">
        Setiap perangkat dalam jaringan membutuhkan alamat <i>IP</i> sebagai identitas unik agar dapat dikenali dan
        berkomunikasi. Karena jumlah perangkat sangat banyak, penggunaan alamat <i>IP</i> perlu diatur agar tidak terjadi
        konflik. Oleh karena itu, alamat <i>IP</i> dibedakan menjadi dua jenis, yaitu <i>IP publik</i> dan <i>IP
          privat</i>.

        <br><br>
        <h4 class="section-line-title">Alamat <i>IP</i> Publik</h4>
        <strong>Alamat <i>IP</i> publik</strong> adalah alamat yang digunakan untuk berkomunikasi secara langsung di
        internet dan bersifat unik secara global, sehingga setiap perangkat <strong>tidak boleh memiliki alamat yang
          sama</strong>. Alamat <i>IP</i> publik biasanya digunakan oleh <i>server</i>, <i>website</i>, atau perangkat
        yang terhubung langsung ke internet, dan diperoleh dari <i>Internet Service Provider</i> (<i>ISP</i>).

        <br>
        <div class="soft-box">
          <strong>Karakteristik IP Publik :</strong>
          <ul style="margin-left:18px;">
            <li>Bersifat unik secara global</li>
            <li>Digunakan untuk komunikasi internet</li>
            <li>Dapat diakses dari luar jaringan</li>
            <li>Jumlahnya terbatas</li>
            <li>Digunakan oleh server, website, atau router yang terhubung ke internet</li>
          </ul>
        </div>

        Perhatikan gambar dibawah ini!

        <!-- GAMBAR -->
        <div style="text-align:center; margin:18px 0;">
          <img src="{{ asset('assets/img/ip-publik.png') }}" alt="Ilustrasi IP Address dalam Jaringan"
            style="max-width:90%; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
          <div style="font-size:13px; color:#6b7280; margin-top:6px;">
            Gambar 2. 12 Ilustrasi konflik IP Publik <br>
            Sumber : Cisco Systems, 2003
          </div>
        </div>

        <br>
        Gambar tersebut menunjukkan <strong>dua jaringan</strong> yang menggunakan alamat <i>IP</i> dalam <i>network</i>
        yang sama, yaitu 198.150.11.x (misalnya 198.150.11.15 dan 198.150.11.16). Hal ini menyebabkan <i>router</i> tidak
        dapat membedakan tujuan pengiriman data, sehingga dapat menimbulkan kesalahan komunikasi.

        <div class="key-box">
          Oleh karena itu, alamat <i>IP</i> publik harus <strong>bersifat unik</strong> secara global. Pengelolaan
          alamat <i>IP</i> ini dilakukan oleh organisasi seperti <i>Internet Assigned Numbers Authority</i>
          (<i>IANA</i>).

        </div>

        <br>
        <h4 class="section-line-title">Alamat <i>IP</i> Privat</h4>
        <strong>Alamat IP privat</strong> adalah alamat IP yang digunakan dalam jaringan lokal, seperti jaringan rumah,
        sekolah, kantor, atau laboratorium. Berbeda dengan IP publik, alamat IP privat tidak digunakan untuk komunikasi
        langsung di internet. Alamat IP privat hanya perlu bersifat unik dalam satu jaringan lokal dan dapat digunakan
        kembali oleh jaringan lain tanpa menimbulkan konflik.

        <br><br>
        Penggunaan alamat IP privat diatur dalam <strong>RFC 1918</strong>, yang menetapkan tiga rentang alamat IP privat
        sebagai berikut :

        <table style="width:50%; margin:12px auto; border-collapse:collapse;">
          <tr style="background:#f3ebe6;">
            <th style="border:1px solid #d6c3b2; padding:8px;">Kelas</th>
            <th style="border:1px solid #d6c3b2; padding:8px;">Rentang IP Privat</th>
          </tr>
          <tr>
            <td style="border:1px solid #d6c3b2; padding:8px;">A</td>
            <td style="border:1px solid #d6c3b2; padding:8px;">10.0.0.0 – 10.255.255.255</td>
          </tr>
          <tr>
            <td style="border:1px solid #d6c3b2; padding:8px;">B</td>
            <td style="border:1px solid #d6c3b2; padding:8px;">172.16.0.0 – 172.31.255.255</td>
          </tr>
          <tr>
            <td style="border:1px solid #d6c3b2; padding:8px;">C</td>
            <td style="border:1px solid #d6c3b2; padding:8px;">192.168.0.0 – 192.168.255.255</td>
          </tr>
        </table>

        <br>
        Alamat dalam rentang ini tidak dirutekan di internet, sehingga <i>router</i> akan mengabaikan paket yang
        menggunakan <i>IP</i> privat.

        <br><br>
        <div class="sub-section">Hubungan <i>IP</i> Privat dan Internet</div>

        Gambar berikut menunjukkan penggunaan alamat IP privat pada jaringan internal dan alamat IP publik untuk terhubung
        ke internet.
        <br>
        <!-- GAMBAR -->
        <div style="text-align:center; margin:18px 0;">
          <img src="{{ asset('assets/img/ip-privat.png') }}" alt="Ilustrasi IP Address dalam Jaringan"
            style="max-width:80%; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
          <div style="font-size:13px; color:#6b7280; margin-top:6px;">
            Gambar 2. 13 Penggunaan IP Privat dan NAT <br>
            Sumber : Cisco Systems, 2003
          </div>
        </div>

        <br>
        Meskipun tidak dapat digunakan secara langsung di internet, perangkat dengan <i>IP</i> privat tetap dapat
        mengakses internet melalui mekanisme <i>Network Address Translation</i> (<i>NAT</i>). <i>NAT</i> berfungsi untuk
        menerjemahkan alamat <i>IP</i> privat menjadi alamat <i>IP</i> publik. Dengan <i>NAT</i>, alamat <i>IP</i> privat
        akan diterjemahkan menjadi alamat <i>IP</i> publik saat data dikirim ke internet. Proses ini biasanya dilakukan
        oleh <i>router</i>.

        <div class="question-box">
          <h4 class="conversion-title">Ayo Berlatih!</h4>

          <div class="instruction-box">
            <div class="instruction-title">Petunjuk Pengerjaan</div>
            <ol>
              <li>Perhatikan setiap alamat IP pada daftar soal.</li>
              <li>Tentukan apakah alamat IP tersebut termasuk <b>IP Publik</b>, <b>IP Privat</b>, atau <b>Tidak Valid</b>.
              </li>
              <li>Seret pilihan jawaban yang sesuai ke kotak di samping alamat IP.</li>
              <li>Klik tombol <b>"Cek Jawaban"</b> untuk memeriksa hasil.</li>
            </ol>
          </div>

          <div class="question-box network-host-layout">
            <div class="latihan-container">

              <!-- LIST SOAL -->
              <div class="latihan-list" id="latihanList">
                <div class="latihan-row">
                  <span class="ip-text">192.168.1.10</span>

                  <div class="drop-box static" data-answer="Privat" data-value="Privat"
                    style="background:#dcfce7;border-color:#16a34a;">
                    Privat
                  </div>
                </div>
              </div>

              <!-- PILIHAN -->
              <div class="latihan-pilihan">
                <div class="choice-box" draggable="true" data-value="Publik">Publik</div>
                <div class="choice-box" draggable="true" data-value="Privat">Privat</div>
                <div class="choice-box" draggable="true" data-value="Tidak Valid">Tidak Valid</div>
              </div>
            </div>
          </div>

          <div class="latihan-action">
            <button class="btn-cek">Cek Jawaban</button>
            <button class="btn-cek" style="background:#6b7280;">Reset</button>
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
        <span id="levelTitle">Aktivitas 2.4</span>
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

    <button class="page-btn nav-arrow" onclick="nextStep()">
      <i class="bi bi-chevron-right"></i>
    </button>

  </div>

  <div class="nav-bottom">
    <a href="/bab2/network-host" class="nav-btn nav-prev">
      Halaman Sebelumnya
    </a>

    <a href="/bab2/subnet-mask" class="nav-btn nav-next" onclick="return cekLanjut(event)">
      Halaman Selanjutnya
    </a>
  </div>

  <script>

    let startTime = Date.now();
    let sudahLulusPemahaman = false;
    let sudahSelesaiMateri = false;
    let latihanDragSelesai = false;
    let aktivitasSelesai = false;

    function sudahBacaMinimal() {

      // bypass kalau sudah pernah selesai
      if (sudahSelesaiMateri) return true;

      let waktu = (Date.now() - startTime) / 1000;
      return waktu >= 120; // 2 MENIT
    }

    function cekLanjut(e) {

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
                            Manakah alamat IP yang <b>bukan termasuk IP privat</b>?
                        </div>

                        <div class="swal-radio-group">

                            <label class="swal-radio-option">
                                <input type="radio" name="jawaban" value="a">
                                10.10.5.1
                            </label>

                            <label class="swal-radio-option">
                                <input type="radio" name="jawaban" value="b">
                                172.16.8.2
                            </label>

                            <label class="swal-radio-option">
                                <input type="radio" name="jawaban" value="c">
                                192.168.2.100
                            </label>

                            <label class="swal-radio-option">
                                <input type="radio" name="jawaban" value="d">
                                8.8.8.8
                            </label>

                        </div>
                    `,
          showCancelButton: true,
          confirmButtonText: "Kirim",

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

            if (result.value === "d") {

              sudahLulusPemahaman = true;

              Swal.fire({
                icon: "success",
                title: "Benar!",
                text: "8.8.8.8 adalah IP publik."
              });

            } else {

              Swal.fire({
                icon: "error",
                title: "Salah",
                text: "Perhatikan kembali rentang IP privat."
              });

            }

          }

        });

        return false;
      }

      // =====================
      // 3 & 4. CEK LATIHAN + AKTIVITAS
      // =====================
      if (!latihanDragSelesai || !aktivitasSelesai) {

        let belum = "";

        if (!latihanDragSelesai) {
          belum += "<b>Ayo Berlatih</b><br>";
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
          reverseButtons: true
        }).then((result) => {

          // kalau pilih kerjakan dulu
          if (result.dismiss === Swal.DismissReason.cancel) {

            if (!latihanDragSelesai) {

              document.querySelector(".conversion-title").scrollIntoView({
                behavior: "smooth",
                block: "center"
              });

            } else if (!aktivitasSelesai) {

              document.getElementById("quizContainer").scrollIntoView({
                behavior: "smooth",
                block: "center"
              });

            }

          }

          // kalau tetap lanjut
          if (result.isConfirmed) {
            window.location.href = "/bab2/subnet-mask";
          }

        });

        return false;
      }

      // =====================
      // 5. KIRIM PROGRES
      // =====================
      fetch("/progres/selesai/IP Addressing/IP Publik dan Privat", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
      }).then(() => {
        window.location.href = "/bab2/subnet-mask";
      });

      return false;
    }

    fetch('/bab2/publik-privat/data')
      .then(res => res.json())
      .then(data => {

        const container = document.getElementById("latihanList");
        container.innerHTML += "";

        data.forEach(item => {
          container.innerHTML += `
                          <div class="latihan-row">
                            <span class="ip-text">${item.soal}</span>
                            <div class="drop-box" data-answer="${item.jawaban_benar}"></div>
                          </div>
                        `;
        });

        initDragDrop(); // WAJIB
      });

    let isDragging = false;

    function initDragDrop() {
      document.querySelectorAll(".choice-box").forEach(item => {
        item.addEventListener("dragstart", function (e) {

          isDragging = true;

          e.dataTransfer.setData("text/plain", this.dataset.value);

        });

        item.addEventListener("dragend", function () {
          isDragging = false;
        });
      });

      document.querySelectorAll(".drop-box").forEach(box => {
        box.addEventListener("dragover", e => e.preventDefault());

        box.addEventListener("drop", function (e) {
          e.preventDefault();
          const data = e.dataTransfer.getData("text/plain");

          this.textContent = data;
          this.dataset.value = data;
        });
      });
    }

    window.addEventListener('dragover', function (e) {

      if (!isDragging) return;

      const batas = 60;

      if (e.clientY > window.innerHeight - batas) {
        window.scrollBy(0, 15);
      }

      if (e.clientY < batas) {
        window.scrollBy(0, -15);
      }

    });

    let soal = [];

    fetch("/aktivitas/ip-publik-privat/soal")
      .then(res => res.json())
      .then(data => {
        soal = data;
        renderSoal();
      });


    let indexSoal = 0;
    let skor = 0;
    let statusTerkunci = Array(soal.length).fill(false);
    let jawabanUser = Array(soal.length).fill(null);


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

      if (data.tipe === "pilgan") {
        html += `<div class="options">`;
        data.opsi.forEach((o, i) => {
          html += `
                        <label class="option">

                            <input 
                                type="radio"
                                name="jawaban"
                                value="${i}"
                                ${jawabanUser[indexSoal] == i ? "checked" : ""}
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
                          value="${jawabanUser[indexSoal] ?? ""}"
                          ${terkunci ? "disabled" : ""}
                          placeholder="Jawaban"
                      >
                  `;
      }

      html += `</div>`;
      quizContainer.innerHTML = html;

      prevBtn.disabled = indexSoal === 0;
      nextBtn.disabled = !terkunci;

      if (terkunci) {
        feedback.innerHTML =
          '<i class="bi bi-check-circle-fill"></i> Jawaban benar';
        feedback.style.color = "#15803d";
      } else {
        feedback.innerHTML = "";
      }

      if (!terkunci) {
        document.querySelectorAll("input").forEach(el => {
          el.addEventListener("change", cekJawaban);
          el.addEventListener("input", cekJawaban);
        });
      }
    }

    function cekJawaban() {

      const data = soal[indexSoal];
      const pilih = document.querySelector("input[name=jawaban]:checked");
      if (!pilih) return;

      fetch("/aktivitas/ip-publik-privat/cek", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
          id_soal: data.id,
          jawaban_user: parseInt(pilih.value)
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

      aktivitasSelesai = true;

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

    // renderSoal();

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

    // cek jawaban drag and drop
    document.querySelectorAll(".btn-cek")[0].addEventListener("click", function () {

      let benar = 0;
      let total = document.querySelectorAll(".drop-box:not(.static)").length;

      document.querySelectorAll(".drop-box:not(.static)").forEach(box => {

        const user = box.dataset.value;
        const benarJawaban = box.dataset.answer;

        if (!user) {
          box.style.background = "#fee2e2";
          return;
        }

        if (user === benarJawaban) {
          box.style.background = "#dcfce7";
          benar++;
        } else {
          box.style.background = "#fee2e2";
        }

      });

      if (benar === total) {
        latihanDragSelesai = true;

        Swal.fire({
          icon: "success",
          title: "Benar Semua!",
          html: `
                      Latihan berhasil diselesaikan.<br><br>
                      Mau mengulang latihan atau lanjut?
                    `,
          showCancelButton: true,
          confirmButtonText: "Ulangi",
          cancelButtonText: "Lanjut",
          reverseButtons: true,
          allowOutsideClick: false
        }).then((result) => {

          // ULANGI LATIHAN
          if (result.isConfirmed) {

            document.querySelectorAll(".drop-box").forEach(box => {
              box.textContent = "";
              box.dataset.value = "";
              box.style.background = "#ffffff";
              box.style.borderColor = "#d6c3b2";
            });

            latihanDragSelesai = false;

          }

          // LANJUT KE AKTIVITAS
          else {

            document.getElementById("quizContainer").scrollIntoView({
              behavior: "smooth",
              block: "center"
            });

          }

        });

      } else {

        Swal.fire({
          icon: "error",
          title: "Masih Salah",
          text: `Benar ${benar} dari ${total}`
        });

      }

    });

    // reset drag and drop
    document.querySelectorAll(".btn-cek")[1].addEventListener("click", function () {

      Swal.fire({
        title: "Reset Jawaban?",
        text: "Semua jawaban drag and drop akan dihapus.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#b91c1c",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Ya, reset",
        cancelButtonText: "Batal"
      }).then((result) => {

        if (result.isConfirmed) {

          document.querySelectorAll(".drop-box:not(.static)").forEach(box => {
            box.textContent = "";
            box.dataset.value = "";

            box.style.background = "#ffffff";
            box.style.borderColor = "#d6c3b2";
          });

          Swal.fire({
            icon: "success",
            title: "Reset Berhasil",
            text: "Jawaban dikosongkan",
            timer: 1200,
            showConfirmButton: false
          });

        }

      });

    });

    window.addEventListener("DOMContentLoaded", function () {

      fetch("/progres/cek/IP Addressing/IP Publik dan Privat")
        .then(res => res.json())
        .then(res => {

          if (res.selesai) {

            sudahSelesaiMateri = true;
            sudahLulusPemahaman = true;
            latihanDragSelesai = true;
            aktivitasSelesai = true;

            startTime = Date.now() - 180000;

          }

        });

    });
  </script>

@endsection