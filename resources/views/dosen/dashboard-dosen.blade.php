@extends('dosen.dosen')

@section('title', 'Dashboard Dosen')

@section('content')

    <style>
        /* ===== WRAPPER ===== */
        .dashboard-wrapper {
            width: 100%;
            padding: 20px 0px;
        }

        /* ===== GREETING ===== */
        .greeting-section {
            background: #ffffff;
            border-radius: 18px;
            padding: 22px 26px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .greeting-sub {
            font-size: 14px;
            color: #64748b;
            margin-top: 6px;
        }

        /* ===== CARD GLOBAL ===== */
        .card-ui {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            transition: 0.25s ease;
        }

        .card-ui:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        /* ===== GRID ===== */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 25px;
            align-items: start;
        }

        /* ===== MENU CARD ===== */
        .menu-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 30px 20px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.08);
        }

        .menu-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: white;
            margin-bottom: 14px;
        }

        .menu-title {
            font-weight: 700;
            font-size: 17px;
            margin-bottom: 6px;
            color: #1f2937;
        }

        .menu-desc {
            font-size: 13px;
            color: #6b7280;
        }

        .menu-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        /* ICON WARNA SOFT */
        .bg-blue {
            background: #2563eb;
        }

        .bg-green {
            background: #16a34a;
        }

        .bg-red {
            background: #dc2626;
        }

        /* TEXT */
        .menu-title {
            font-weight: 700;
            font-size: 16px;
            color: #1f2937;
        }

        .menu-desc {
            font-size: 14px;
            color: #6b7280;
        }

        /* ===== QUICK ACTION ===== */
        .quick-title {
            font-weight: 800;
            margin-bottom: 18px;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 18px;
        }

        .quick-card {
            padding: 20px;
            border-radius: 14px;
            background: #f8fafc;
            transition: 0.2s;
            cursor: pointer;
        }

        .quick-card:hover {
            background: #f1f5f9;
        }

        .quick-icon {
            font-size: 22px;
            margin-bottom: 10px;
            color: #2563eb;
        }

        /* RESPONSIVE */
        @media(max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ===== DOSEN PROFILE CARD ===== */
        .profile-card {
            text-align: center;
            padding: 30px 24px;
        }

        .profile-avatar {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px auto;
            font-size: 60px;
            color: #9ca3af;
            border: 6px solid #f1f5f9;
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

        .menu-link {
            text-decoration: none;
            color: inherit;
        }

        .menu-link:hover {
            text-decoration: none;
        }

        .page-title {
            font-size: 34px;
            font-weight: 800;
            color: #92400e;
            margin-bottom: 6px;
        }

        .page-title span {
            color: #92400e;
            font-style: italic;
        }

        .page-sub {
            font-size: 16px;
            color: #64748b;
            font-family: 'Fira Sans', sans-serif;
        }

        .stats-grid-custom {
            display: grid;
            grid-template-columns: 220px 220px 1fr;
            align-items: stretch;
            gap: 20px;
            margin-bottom: 25px;
        }

        /* CARD SIMPLE (angka aja) */
        .stat-simple {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .stat-big {
            font-size: 32px;
            font-weight: 800;
            color: #1f2937;
        }

        .stat-title {
            font-size: 14px;
            color: #6b7280;
            margin-top: 6px;
        }

        .stat-simple {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* garis aksen */
        .stat-simple::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #92400e;
        }

        .stat-big {
            font-size: 36px;
            font-weight: 800;
            color: #1f2937;
        }

        .stat-title {
            font-size: 13px;
            color: #6b7280;
            margin-top: 8px;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .progress-title {
            font-weight: 700;
            font-size: 16px;
            color: #1f2937;
        }

        /* dropdown */
        .filter-kelas {
            padding: 6px 10px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 13px;
            background: #fff;
            cursor: pointer;
            font-family: 'Fira Sans', sans-serif;
        }

        /* isi kosong */
        .progress-content.empty {
            text-align: center;
            color: #64748b;
            font-size: 14px;
            padding: 30px 0;
        }

        .stat-top {
            position: relative;
            overflow: hidden;
        }

        /* garis coklat atas */
        .stat-top::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #92400e;
        }

        .progress-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 12px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            transition: 0.2s;
        }

        .progress-item:hover {
            background: #f8fafc;
            border-radius: 8px;
        }

        /* ranking 1 (highlight) */
        .progress-item:nth-child(1) {
            background: #fef3c7;
            font-weight: 700;
            border-radius: 8px;
        }

        /* ranking 2 */
        .progress-item:nth-child(2) {
            background: #f1f5f9;
            border-radius: 8px;
        }

        .progress-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .progress-table thead th {
            text-align: left;
            font-weight: 600;
            padding: 10px;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
        }

        .progress-table tbody td {
            padding: 12px 10px;
            border-bottom: 1px solid #f1f5f9;
        }

        /* hover */
        .progress-table tbody tr:hover {
            background: #f8fafc;
        }

        /* ranking 1 highlight */
        .progress-table tbody tr:first-child {
            background: #fef3c7;
            font-weight: 600;
        }

        /* TOP GRID */
        .top-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 25px;
        }

        .greeting-section {
            margin-bottom: 26px;
        }

        /* MENU 4 BOX */
        .menu-container-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .menu-box {
            text-align: center;
            padding: 25px 20px;
        }

        .menu-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            margin: 0 auto 12px auto;
        }

        .menu-title {
            font-weight: 700;
            font-size: 15px;
            color: #1f2937;
        }

        .menu-big {
            font-size: 26px;
            font-weight: 800;
            margin: 6px 0;
        }

        .menu-desc {
            font-size: 13px;
            color: #6b7280;
        }

        .menu-action {
            margin-top: 10px;
            font-size: 13px;
            color: #92400e;
            font-weight: 600;
        }

        .lihat-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 12px;
        }

        .lihat-btn {
            font-size: 13px;
            font-weight: 600;
            color: #92400e;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .lihat-btn:hover {
            background: #fef3c7;
        }

        @media (max-width:768px) {
            /* PROFILE + PROGRESS */
            .top-grid {
                display: flex !important;
                flex-direction: column !important;
                gap: 16px;
                width: 100%;
            }

            .top-grid>* {
                width: 100% !important;
                max-width: 100% !important;
                flex: none !important;
            }

            /* MENU 4 CARD */
            .menu-container-4 {
                display: flex !important;
                flex-direction: column !important;
                gap: 16px;
                width: 100%;
            }

            .menu-container-4>* {
                width: 100% !important;
                max-width: 100% !important;
                flex: none !important;
            }

            /* CARD */
            .card-ui {
                width: 100%;
                overflow: hidden;
                margin-bottom: 0;
            }

            body,
            .dashboard-wrapper {
                overflow-x: hidden;
            }

        }
    </style>

    <div class="dashboard-wrapper">

        <!-- GREETING -->
        <div class="greeting-section">

            <div class="page-title">
                Dashboard Dosen
            </div>

            <div class="page-sub">
                Halo, <strong>{{ auth()->user()->nama_lengkap }}</strong>.
                Kelola kelas, mahasiswa, nilai dan bank soal dengan mudah.
            </div>

        </div>

        <div class="top-grid">

            <!-- PROFILE -->
            <div class="card-ui profile-card">

                <div class="profile-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div class="profile-name">
                    {{ auth()->user()->nama_lengkap }}
                </div>

                <div class="profile-info">
                    <div>
                        <span>NIP</span>
                        <span>{{ auth()->user()->nip ?? '-' }}</span>
                    </div>
                    <div>
                        <span>Email</span>
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                    <div>
                        <span>Total Kelas</span>
                        <span>{{ auth()->user()->kelasYangDiajar->count() }}</span>
                    </div>
                </div>

            </div>

            <!-- PROGRESS -->
            <div class="card-ui stat-top">

                <div class="progress-header">
                    <div class="progress-title">Progres Terbanyak (5 Mahasiswa)</div>

                    <form method="GET">
                        <select name="kelas_id" class="filter-kelas" onchange="this.form.submit()">

                            <option value="">Semua Kelas</option>

                            @foreach($kelasList as $kelas)
                                <option value="{{ $kelas->id }}" {{ $kelasId == $kelas->id ? 'selected' : '' }}>
                                    {{ $kelas->nama_kelas }}
                                </option>
                            @endforeach

                        </select>
                    </form>
                </div>

                <div class="progress-content">
                    <table class="progress-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topProgress as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->user->nama_lengkap ?? '-' }}</td>
                                    <td>{{ optional($item->user->kelas)->nama_kelas ?? '-' }}</td>
                                    <td>{{ $item->persen }}%</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="lihat-wrapper">
                    <a href="/data-progres" class="lihat-btn">
                        Lihat Semua
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="menu-container-4">

            <!-- MAHASISWA -->
            <a href="/data-mahasiswa" class="menu-link">
                <div class="card-ui menu-box">
                    <div class="menu-title">Mahasiswa</div>
                    <div class="menu-big">{{ $totalMahasiswa }}</div>
                    <div class="menu-desc">Total Mahasiswa</div>
                    <div class="menu-action">
                        Kelola <i class="bi bi-arrow-right"></i>
                    </div>
                </div>
            </a>

            <!-- KELAS -->
            <a href="/data-kelas" class="menu-link">
                <div class="card-ui menu-box">
                    <div class="menu-title">Kelas</div>
                    <div class="menu-big">{{ $totalKelas }}</div>
                    <div class="menu-desc">Kelas Terdaftar</div>
                    <div class="menu-action">
                        Kelola <i class="bi bi-arrow-right"></i>
                    </div>
                </div>
            </a>

            <!-- NILAI -->
            <a href="/data-nilai" class="menu-link">
                <div class="card-ui menu-box">
                    <div class="menu-icon bg-green">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>
                    <div class="menu-title">Data Nilai</div>
                    <div class="menu-desc">Kelola nilai mahasiswa</div>
                </div>
            </a>

            <!-- BANK SOAL -->
            <a href="/bank-soal" class="menu-link">
                <div class="card-ui menu-box">
                    <div class="menu-icon bg-red">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="menu-title">Bank Soal</div>
                    <div class="menu-desc">Kelola soal & evaluasi</div>
                </div>
            </a>

        </div>
    </div>

@endsection