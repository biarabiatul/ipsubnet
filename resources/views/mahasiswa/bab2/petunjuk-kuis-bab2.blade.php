@extends('mahasiswa.mahasiswa')

@section('title', 'Petunjuk & Riwayat Kuis')

<title>BAB 2 : IP Addressing</title>

@section('content')

    <style>
        /* ===== CARD ===== */
        .card-box {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            overflow: hidden;
        }

        /* HEADER */
        .card-header-green {
            background: #977c6bff;
            color: #ffffff;
            padding: 14px 18px;
            font-weight: 700;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* BODY */
        .card-body-custom {
            padding: 24px 28px;
        }

        /* ===== LIST ICON CHECK ===== */
        .rule-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .rule-list li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .rule-list i {
            color: #22c55e;
            font-size: 14px;
            margin-top: 3px;
        }

        /* ===== TOMBOL BESAR ===== */
        .btn-mulai {
            display: inline-block;
            margin-top: 18px;
            padding: 8px 20px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 8px;
            border: none;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 14px rgba(59, 130, 246, 0.4);
        }

        .btn-mulai:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.5);
        }

        /* ===== TABEL ===== */
        .table-custom {
            width: 100%;
            border-collapse: collapse;
        }

        .table-custom th,
        .table-custom td {
            padding: 12px;
            text-align: center;
        }

        .table-custom th {
            background: #f3f4f6;
            font-weight: 600;
        }

        .table-custom tbody tr {
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        /* BADGE */
        .badge-lulus {
            background: #22c55e;
            color: #ffffff;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge-tidak {
            background: #ef4444;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
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

        .btn-review {
            background: #f9fafb;
            border: 1px solid #d1d5db;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-review i {
            font-size: 15px;
            color: #374151;
            /* lebih gelap biar keliatan */
        }

        .btn-review:hover {
            background: #e5e7eb;
            border-color: #9ca3af;
        }

        .modal-custom {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content-custom {
            background: #fff;
            width: 90%;
            /* hampir full */
            max-width: 1000px;
            /* batas maksimal biar ga terlalu lebar */
            height: 85vh;
            /* tinggi besar */
            margin: 3% auto;
            padding: 30px 40px;
            border-radius: 12px;
            position: relative;
            overflow-y: auto;
        }

        .close-modal {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 28px;
            /* 🔥 BESAR */
            font-weight: bold;
            cursor: pointer;
            color: #374151;
            transition: 0.2s;

            /* optional biar bulat */
            background: #f3f4f6;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1150px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 26px;
            margin-bottom: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        .question-number {
            font-size: 13px;
            color: #6b7280;
            font-weight: 600;
        }

        .question {
            font-size: 17px;
            font-weight: 600;
            margin: 10px 0 20px 0;
        }

        .label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .option {
            padding: 14px 16px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            font-size: 15px;
        }

        .user {
            background: #fff7ed;
            border: 1px solid #f59e0b;
        }

        .status {
            margin-top: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
        }

        .status.benar {
            color: #16a34a;
        }

        .status.salah {
            color: #dc2626;
        }
    </style>


    {{-- ================= ATURAN ================= --}}
    <div class="card-box">
        <div class="card-header-green">
            <i class="bi bi-clipboard-check"></i>
            Petunjuk Pengerjaan Kuis
        </div>

        <div class="card-body-custom">

            <ul class="rule-list">
                <li><i class="bi bi-check-circle-fill"></i>
                    Kuis terdiri dari <strong>10 soal pilihan ganda</strong> untuk menguji pemahaman materi sebelumnya.
                </li>

                <li><i class="bi bi-check-circle-fill"></i>
                    Nilai kelulusan minimal adalah
                    <strong>
                        {{ auth()->user()->kelas->kkm_kuis }}
                    </strong>.
                </li>

                <li><i class="bi bi-check-circle-fill"></i>
                    Durasi pengerjaan adalah <strong>15 menit</strong>. Waktu ditampilkan di bagian kiri atas halaman.
                </li>

                <li><i class="bi bi-check-circle-fill"></i>
                    Navigasi soal berada di sisi kiri, dan pertanyaan serta jawaban berada di sisi kanan.
                </li>

                <li><i class="bi bi-check-circle-fill"></i>
                    Gunakan tombol <strong>SELESAI</strong> untuk mengakhiri kuis.
                </li>

                <li><i class="bi bi-check-circle-fill"></i>
                    Jika waktu habis, kuis akan tertutup otomatis dan diarahkan ke halaman hasil.
                </li>

                <li><i class="bi bi-check-circle-fill"></i>
                    Keluar dari halaman saat kuis berlangsung akan menyebabkan semua jawaban hilang.
                </li>
            </ul>

            <button class="btn-mulai" onclick="mulaiKuis()">
                Mulai Kuis
            </button>

        </div>
    </div>

    {{-- ================= RIWAYAT ================= --}}
    <div class="card-box">
        <div class="card-header-green">
            <i class="bi bi-clock-history"></i>
            Riwayat
        </div>

        <div class="card-body-custom" style="padding:0;">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jumlah Benar</th>
                        <th>Jumlah Salah</th>
                        <th>Nilai</th>
                        <th>Status</th>
                        <th>Review</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($riwayat as $item)

                        @php

                            $kkm = auth()->user()->kelas->kkm_kuis;

                            // cek apakah sebelumnya pernah remedial
                            $pernahRemedial = $riwayat
                                ->where('created_at', '<', $item->created_at)
                                ->where('nilai_akhir', '<', $kkm)
                                ->count() > 0;

                            // default nilai asli
                            $nilaiTampil = $item->nilai_akhir;

                            // kalau remedial lalu sekarang lulus
                            if ($pernahRemedial && $item->nilai_akhir >= $kkm) {

                                $nilaiTampil = $kkm;

                            }

                        @endphp

                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y H:i') }}
                            </td>

                            <td>{{ $item->total_benar }}</td>

                            <td>{{ $item->total_salah }}</td>

                            <td>{{ round($nilaiTampil) }}</td>

                            <td>
                                @if($nilaiTampil >= auth()->user()->kelas->kkm_kuis)
                                    <span class="badge-lulus">Lulus</span>
                                @else
                                    <span class="badge-tidak">Tidak Lulus</span>
                                @endif
                            </td>

                            <td>
                                <button class="btn-review" onclick="openReview({{ $item->id }})">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5">Belum ada riwayat kuis</td>
                        </tr>

                    @endforelse
                </tbody>
            </table>

            <div id="modalReview" class="modal-custom">
                <div class="modal-content-custom">
                    <span class="close-modal" onclick="closeReview()">&times;</span>
                    <h3>Review Jawaban</h3>

                    <div id="isiReview">
                        <p>Loading...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-bottom">
        <a href="/bab2/rangkuman-bab2" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="/bab3/tujuan-pembelajaran-bab3" class="nav-btn nav-next">
            Halaman Selanjutnya
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function mulaiKuis() {
            Swal.fire({
                title: "Mulai Kuis?",
                text: "Waktu akan langsung berjalan setelah Anda menekan tombol Mulai.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2563eb",
                cancelButtonColor: "#9ca3af",
                confirmButtonText: "Ya, Mulai",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/bab2/kuis-bab2";
                }
            });
        }

        function openReview(id) {
            document.getElementById("modalReview").style.display = "block";
            document.getElementById("isiReview").innerHTML = "Loading...";

            fetch(`/review-jawaban/${id}`)
                .then(res => res.json())
                .then(data => {
                    let html = "";

                    if (data.length === 0) {
                        html = "<p>Tidak ada data jawaban.</p>";
                    } else {
                        data.forEach((item, index) => {

                            let opsi = {};
                            try {
                                opsi = JSON.parse(item.pilgan_opsi);
                            } catch (e) { }

                            let user = item.jawaban_pengguna;
                            let key = user ? user.toLowerCase() : null;

                            let isiJawaban = user
                                ? user.toUpperCase() + '. ' + (opsi[key] || '')
                                : '-';

                            html += `
                                        <div class="card">
                                            <div class="question-number">
                                                Soal ${index + 1}
                                            </div>

                                            <div class="question">
                                                ${item.soal}
                                            </div>

                                            <div class="label">Jawaban kamu</div>

                                            <div class="option user">
                                                ${isiJawaban}
                                            </div>

                                            <div class="status ${item.status}">
                                                ${item.status === 'benar'
                                    ? '<i class="bi bi-check-circle-fill"></i> Jawaban benar'
                                    : '<i class="bi bi-x-circle-fill"></i> Jawaban salah'
                                }
                                            </div>
                                        </div>
                                    `;
                        });
                    }

                    document.getElementById("isiReview").innerHTML = html;
                });
        }

        function closeReview() {
            document.getElementById("modalReview").style.display = "none";
        }

        window.onclick = function (event) {
            let modal = document.getElementById("modalReview");

            if (event.target === modal) {
                closeReview();
            }
        }
    </script>
@endsection