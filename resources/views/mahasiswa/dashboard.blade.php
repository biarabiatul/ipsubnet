@extends('mahasiswa.mahasiswa')

@section('title', 'Dashboard Mahasiswa')

@section('content')

    <style>
        .greeting-section {
            background: #ffffff;
            border-radius: 18px;
            padding: 22px 26px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        }

        /* kiri (text) */
        .greeting-text {
            max-width: 70%;
        }

        .greeting-title {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
        }

        .greeting-sub {
            font-size: 14px;
            color: #64748b;
            margin-top: 4px;
        }

        .box-ui {
            background: #ffffff;
            border-radius: 18px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
            transition: 0.25s ease;
        }

        .box-ui:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 26px rgba(0, 0, 0, 0.08);
        }

        /* ===== PROGRESS BOX ===== */
        .progress-box {
            background: #ffffff;
            border-radius: 18px;
            padding: 20px 22px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        }

        /* HEADER */
        .progress-header {
            font-size: 17px;
            font-weight: 700;
        }

        .progress-sub {
            font-size: 14px;
            color: #64748b;
            margin-top: 4px;
        }

        /* ATAS */
        .progress-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        /* PERSEN */
        .progress-percent {
            font-size: 28px;
            font-weight: 800;
            color: #16a34a;
        }

        /* TRACK */
        .progress-track {
            height: 12px;
            background: #e5e7eb;
            border-radius: 999px;
            margin-top: 14px;
            overflow: hidden;
        }

        /* FILL */
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #22c55e, #4ade80);
            border-radius: 999px;
            transition: width 0.8s ease-in-out;
        }

        /* MOBILE */
        @media(max-width: 576px) {
            .progress-percent {
                font-size: 22px;
                margin-top: 8px;
            }
        }

        /* ===== PROFILE ===== */
        .profile-box {
            text-align: center;
        }

        .profile-avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px auto;
            font-size: 45px;
            color: #9ca3af;
            border: 5px solid #f1f5f9;
        }

        .profile-name {
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 18px;
            color: #1e293b;
        }

        .profile-info {
            text-align: left;
            font-size: 14px;
            margin-top: 10px;
        }

        .profile-info div {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .profile-info span:first-child {
            font-weight: 600;
            color: #374151;
        }

        /* ===== TABLE ===== */
        .table-modern {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .table-modern thead {
            background: #e0ecff;
        }

        .table-modern th {
            padding: 14px;
            text-align: left;
            font-weight: 600;
            color: #1e293b;
        }

        .table-modern td {
            padding: 14px;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-modern tbody tr:hover {
            background: #f8fafc;
        }

        /* ===== BADGE ===== */
        .badge-pass {
            background: #16a34a;
            color: white;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-remedial {
            background: #dc2626;
            color: white;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width: 950px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .page-title {
            font-size: 34px;
            font-weight: 1000;
            color: #92400e;
            font-family: 'Fira Sans', sans-serif;
        }

        /* ganti warna Subnet */
        .page-title span {
            color: #92400e;
            /* coklat elegan (match navbar) */
            font-style: italic;
        }

        .page-sub {
            font-size: 16px;
            color: #64748b;
            font-family: 'Fira Sans', sans-serif;
        }

        .badge-belum {
            background: #6b7280;
            color: white;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .table-note {
            margin-top: 12px;
            font-size: 13px;
            color: #6b7280;
            line-height: 1.6;
        }

        .lihat-semua-container {
            text-align: right;
            margin-top: 10px;
        }

        .lihat-semua-link {
            font-size: 14px;
            color: #92400e;
            font-weight: 600;
            cursor: pointer;
        }

        .lihat-semua-link:hover {
            text-decoration: none !important;
            opacity: 0.8;
        }

        .modal-riwayat {
            display: none;
            position: fixed;
            z-index: 999;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #ffffff;
            width: 90%;
            max-width: 950px;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.25s ease;

            max-height: 80vh;
            /* penting */
            overflow-y: auto;
            /* ini bikin scroll */
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .modal-header h3 {
            font-size: 22px;
            font-weight: 700;
        }

        .close-btn {
            font-size: 22px;
            cursor: pointer;
            color: #374151;
        }

        /* SEARCH */
        .modal-search {
            margin-bottom: 12px;
        }

        .modal-search input {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            width: 250px;
            font-size: 14px;
        }

        /* TABLE */
        .modal-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .modal-table thead {
            background: #cbd5e1;
        }

        .modal-table th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }

        .modal-table td {
            padding: 12px;
        }

        /* zebra */
        .modal-table tbody tr:nth-child(odd) {
            background: #f3f4f6;
        }

        .modal-table tbody tr:nth-child(even) {
            background: #ffffff;
        }

        /* badge */
        .badge-selesai {
            background: #16a34a;
            color: white;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
        }

        /* animasi */
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

        /* ===== TITLE ICON ===== */
        .title-section {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 18px;
        }

        /* ICON */
        .title-section i {
            font-size: 20px;
            color: #92400e;
            background: #fef3c7;
            padding: 8px;
            border-radius: 10px;
        }

        @media (max-width: 768px) {

            .sidebar {
                position: fixed;
                top: 60px;
                left: -260px !important;
                /* PAKSA HILANG */
                width: 260px;
                height: 100%;
                z-index: 999;
                transition: left 0.3s ease;
            }

            .sidebar.show {
                left: 0 !important;
            }

        }

        .dashboard-flex {
            display: flex;
            gap: 24px;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .profile-column {
            flex: 1;
            min-width: 320px;
            max-width: 380px;
        }

        .nilai-column {
            flex: 2;
            min-width: 500px;
        }

        @media (max-width: 992px) {
            .dashboard-flex {
                flex-direction: column;
            }

            .profile-column,
            .nilai-column {
                max-width: 100%;
                min-width: 100%;
            }
        }

        /* @media (max-width: 768px) {
                .topbar .logo {
                    display: none;
                }
            } */
    </style>

    <div class="container-fluid py-3 px-3">

        <!-- GREETING -->
        <div class="greeting-section">

            <div class="page-title">
                IP<span>Subnet</span>
            </div>

            <div class="page-sub">
                Halo, <strong>{{ auth()->user()->nama_lengkap }}</strong>.
                Pantau <em>progress</em> belajarmu di sini.
            </div>

        </div>

        <!-- PROGRESS -->
        <div class="progress-box">

            <div class="progress-top">
                <div>
                    <div class="progress-header"><em>Progress</em> Belajar</div>
                    <div class="progress-sub">
                        Teruskan belajarmu <i class="bi bi-rocket-takeoff"></i>
                    </div>
                </div>

                <div class="progress-percent">
                    {{ $progress->persen ?? 0 }}%
                </div>
            </div>

            <div class="progress-track">
                <div class="progress-fill" style="width: {{ $progress->persen ?? 0 }}%"></div>
            </div>

            <div class="lihat-semua-container">
                <span onclick="showModalProgres()" class="lihat-semua-link">
                    Lihat Detail
                    <i class="bi bi-arrow-right"></i>
                </span>
            </div>

        </div>

        <div class="dashboard-flex">

            <!-- PROFILE -->
            <div class="profile-column">
                <div class="box-ui profile-box">
                    <div class="profile-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="profile-name">
                        {{ auth()->user()->nama_lengkap }}
                    </div>

                    <br>
                    <div class="profile-info">
                        <div>
                            <span>NIM</span>
                            <span>{{ auth()->user()->nim ?? '-' }}</span>
                        </div>
                        <div>
                            <span>Email</span>
                            <span>{{ auth()->user()->email }}</span>
                        </div>
                        <div>
                            <span>Status</span>
                            <span>{{ ucfirst(auth()->user()->role) }}</span>
                        </div>
                        <div>
                            <span>Kelas</span>
                            <span>{{ auth()->user()->kelas->nama_kelas ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- NILAI -->
            <div class="nilai-column">
                <div class="box-ui">
                    <div class="title-section">
                        <i class="bi bi-bar-chart-line-fill"></i>
                        <span>Daftar Nilai</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-modern">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe</th>
                                    <th>Subbab</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Kuis</td>
                                    <td>Sistem Bilangan</td>
                                    <td>
                                        @if(auth()->user()->kelas_id && isset($nilai[1]))
                                            {{ $nilai[1] }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if(auth()->user()->kelas_id && isset($nilai[1]))
                                            @if($nilai[1] >= auth()->user()->kelas->kkm_kuis)
                                                <span class="badge-pass">Lulus</span>
                                            @else
                                                <span class="badge-remedial">Remedial</span>
                                            @endif
                                        @else
                                            <span class="badge-belum">Belum</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kuis</td>
                                    <td><em>IP Addressing</em></td>
                                    <td>
                                        @if(auth()->user()->kelas_id && isset($nilai[2]))
                                            {{ $nilai[2] }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if(auth()->user()->kelas_id && isset($nilai[2]))
                                            @if($nilai[2] >= auth()->user()->kelas->kkm_kuis)
                                                <span class="badge-pass">Lulus</span>
                                            @else
                                                <span class="badge-remedial">Remedial</span>
                                            @endif
                                        @else
                                            <span class="badge-belum">Belum</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Kuis</td>
                                    <td><em>Subnetting</em></td>
                                    <td>
                                        @if(auth()->user()->kelas_id && isset($nilai[3]))
                                            {{ $nilai[3] }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if(auth()->user()->kelas_id && isset($nilai[3]))
                                            @if($nilai[3] >= auth()->user()->kelas->kkm_kuis)
                                                <span class="badge-pass">Lulus</span>
                                            @else
                                                <span class="badge-remedial">Remedial</span>
                                            @endif
                                        @else
                                            <span class="badge-belum">Belum</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Evaluasi</td>
                                    <td>Evaluasi</td>
                                    <td>
                                        @if(auth()->user()->kelas_id && isset($nilai[4]))
                                            {{ $nilai[4] }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if(auth()->user()->kelas_id && isset($nilai[4]))
                                            @if($nilai[4] >= auth()->user()->kelas->kkm_evaluasi)
                                                <span class="badge-pass">Lulus</span>
                                            @else
                                                <span class="badge-remedial">Remedial</span>
                                            @endif
                                        @else
                                            <span class="badge-belum">Belum</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-note">
                        * Nilai yang ditampilkan adalah <strong>nilai tertinggi</strong> dari setiap pengerjaan. <br>
                        * KKM Kuis adalah
                        <strong>
                            {{ auth()->user()->kelas->kkm_kuis ?? 70 }}
                        </strong>

                        dan KKM Evaluasi adalah

                        <strong>
                            {{ auth()->user()->kelas->kkm_evaluasi ?? 70 }}
                        </strong>.
                        <!-- * Kriteria Ketuntasan Minimal (KKM) adalah <strong>70</strong>. -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="modalProgres" class="modal-riwayat">
        <div class="modal-content">

            <div class="modal-header">
                <h3>Detail</h3>
                <span class="close-btn" onclick="closeModalProgres()">✕</span>
            </div>

            <div class="modal-search">
                <input type="text" placeholder="Cari bab / subbab..." onkeyup="filterDetail()">
            </div>

            <table class="modal-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bab</th>
                        <th>Subbab</th>
                        <th>Status</th>
                        <th>Waktu</th>
                    </tr>
                </thead>

                <tbody id="detailContent">
                    @foreach($finalProgres as $index => $item)
                                <tr class="row-detail">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item['bab'] }}</td>
                                    <td>{{ $item['subbab'] }}</td>

                                    <td>
                                        @if($item['status'] == 'selesai')
                                            <span class="badge-selesai">Selesai</span>
                                        @else
                                            <span class="badge-belum">Belum</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $item['waktu']
                        ? \Carbon\Carbon::parse($item['waktu'])->format('d M Y H:i')
                        : '-' 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }}
                                    </td>
                                </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        function showModalProgres() {
            document.getElementById('modalProgres').style.display = 'flex';
        }

        function closeModalProgres() {
            document.getElementById('modalProgres').style.display = 'none';
        }

        function filterDetail() {
            let input = document.querySelector('.modal-search input').value.toLowerCase();
            let rows = document.querySelectorAll('#detailContent .row-detail');

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();

                if (text.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        window.onclick = function (event) {
            let modal = document.getElementById('modalProgres');

            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
@endsection