@extends('dosen.dosen')

@section('title', 'Bank Soal')

<title>Bank Soal</title>

@section('content')

    <style>
        .page-header-box {
            background: #ffffff;
            border-radius: 18px;
            padding: 22px 26px;
            margin-bottom: 26px;
            margin-top: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header-left {
            display: flex;
            flex-direction: column;
        }

        .page-title {
            font-size: 34px;
            font-weight: 800;
            color: #92400e;
            margin-bottom: 6px;
        }

        .page-sub {
            font-size: 16px;
            color: #64748b;
        }

        /* ===== FILTER SECTION ===== */
        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-left select,
        .filter-left input {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        /* ===== BUTTON TAMBAH KELAS ===== */
        .btn-add {
            background: #3b82f6;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-add:hover {
            background: #2563eb;
        }

        /* ===== TABLE ===== */
        .table-wrapper {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #e0ecff;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        th {
            font-weight: 600;
        }

        tbody tr:nth-child(odd) {
            background-color: #f3f4f6;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* ===== BUTTON AKSI ===== */
        .btn-edit {
            background: #fbbf24;
            border: none;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-edit:hover {
            background: #f59e0b;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        /* ===== TABLE CONTROL ===== */
        .table-control {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .show-data select {
            margin: 0 6px;
            padding: 4px 8px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            cursor: pointer;
        }

        /* ===== SEARCH INPUT ===== */
        .search-box {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .search-box input {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        /* ===== PAGINATION ===== */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 6px;
            margin-top: 18px;
        }

        .page-btn {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 13px;
            cursor: pointer;
            background: #ffffff;
            transition: 0.2s ease;
        }

        .page-btn:hover {
            background: #e5e7eb;
        }

        .page-btn.active {
            background: #0369a1;
            color: #ffffff;
            border: none;
        }

        .tab-wrapper {
            overflow-x: auto;
            white-space: nowrap;
            border-bottom: 1px solid #dee2e6;
        }

        .tab-wrapper .nav-tabs {
            flex-wrap: nowrap;
        }

        .tab-wrapper .nav-link {
            border: none;
            color: #6c757d;
            font-weight: 500;
            padding: 10px 16px;
            transition: all 0.2s ease;
        }

        .tab-wrapper .nav-link:hover {
            color: #0d6efd;
        }

        .tab-wrapper .nav-link.active {
            color: #0d6efd;
            border-bottom: 3px solid #0d6efd;
            background: transparent;
        }

        .btn-detail {
            background: #10b981;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-detail:hover {
            background: #059669;
        }

        .custom-modal {
            border-radius: 16px;
            padding: 12px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
        }

        /* input */
        .input-modern {
            border-radius: 10px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #e5e7eb;
            transition: 0.2s;
        }

        .input-modern:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        /* label */
        .form-label {
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 4px;
        }

        /* tombol */
        .btn-soft {
            border-radius: 10px;
            padding: 8px 18px;
        }

        .btn-save {
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 500;
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* table {
                                    width: 100%;
                                    table-layout: fixed;
                                }

                                td,
                                th {
                                    word-wrap: break-word;
                                    overflow-wrap: break-word;
                                    white-space: normal;
                                } */

        @media (max-width:768px) {

            .table-wrapper,
            .card-ui {
                overflow: hidden;
            }

            .header-action,
            .top-action {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .btn-tambah {
                width: 100%;
                justify-content: center;
            }

            /* tab menu */
            .nav-tabs {
                overflow-x: auto;
                flex-wrap: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .table-control {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            /* BAGIAN INI YANG DIGANTI */
            .table-responsive {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table-responsive table {
                min-width: 900px;
                border-collapse: collapse;
            }

            table th,
            table td {
                white-space: nowrap;
            }

            /* header biru */
            thead tr,
            thead th {
                background: #dbeafe !important;
            }

            body {
                overflow-x: hidden;
            }

        }

        /* informasi */
        .btn-info-bank {
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 50%;

            background: #dbeafe;
            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 16px;
            font-weight: 700;

            transition: 0.2s ease;
        }

        .btn-info-bank:hover {
            background: #2563eb;
            color: white;
            transform: scale(1.08);
        }

        .info-item {
            display: flex;
            gap: 14px;
            margin-bottom: 18px;
        }

        .info-item i {
            font-size: 20px;
            margin-top: 3px;
        }

        .info-item strong {
            display: block;
            margin-bottom: 4px;
            color: #1e293b;
        }

        .info-item p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }
    </style>

    <!-- ===== HEADER ===== -->
    <div class="page-header-box">

        <div class="page-header-left">
            <div class="d-flex align-items-center gap-2">

                <div class="page-title mb-0">
                    Bank Soal
                </div>

                <button type="button" class="btn-info-bank shadow-sm" data-bs-toggle="modal" data-bs-target="#infoBankSoal">

                    <i class="bi bi-info-lg"></i>

                </button>

            </div>
            <div class="page-sub">
                Kelola soal berdasarkan bab dan tipe soal.
            </div>
        </div>
    </div>

    <div class="table-wrapper">

        <form method="GET" class="d-flex align-items-center gap-3 mb-3 flex-wrap">

            <div class="d-flex align-items-center gap-2">

                <label class="mb-0">Kelas:</label>

                <select name="kelas_id" onchange="this.form.submit()" class="form-select" style="width: 140px;">

                    <option value="">Pilih Kelas</option>

                    @foreach(auth()->user()->kelasYangDiajar as $kelas)

                        <option value="{{ $kelas->id }}" {{ request('kelas_id') == $kelas->id ? 'selected' : '' }}>

                            {{ $kelas->nama_kelas }}

                        </option>

                    @endforeach

                </select>

            </div>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari soal..." class="form-control"
                style="max-width: 260px;" oninput="if(this.value === '') this.form.submit();">

        </form>

        <div class="d-flex justify-content-end mb-3">
            <button class="btn-add d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i>
                Tambah Soal
            </button>
        </div>

        <div class="tab-wrapper">
            <ul class="nav nav-tabs flex-nowrap" id="soalTab">

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#biner">Biner ke
                        Desimal</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#desimal">Desimal ke Biner</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kelas">Kelas IP</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#network">Network ID</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#host">Host ID</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#publik">IP Publik & Privat</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#subnet">Subnet Mask</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#anding">Anding Default</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#cidr">CIDR</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#subnetting">Subnetting</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vlsm">VLSM</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kuis">Kuis</button>
                </li>
            </ul>
        </div>

        <div class="tab-content mt-3">
            <div class="show-data">
                <form method="GET" class="d-flex align-items-center gap-2 mb-2">

                    <label>Tampilkan</label>

                    <select name="perPage" onchange="this.form.submit()" class="form-select form-select-sm"
                        style="width:80px;">
                        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                    </select>

                    <span>data</span>

                    <!-- biar search ga hilang -->
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <input type="hidden" name="kelas_id" value="{{ request('kelas_id') }}">

                </form>
            </div>

            {{-- ================= BINER ================= --}}
            <div class="tab-pane fade show" id="biner">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($biner as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>
                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= DESIMAL ================= --}}
            <div class="tab-pane fade" id="desimal">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($desimal as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>
                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= KELAS ================= --}}
            <div class="tab-pane fade" id="kelas">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelasIp as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>
                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= NETWORK ================= --}}
            <div class="tab-pane fade" id="network">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($network as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>

                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= HOST ================= --}}
            <div class="tab-pane fade" id="host">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($host as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>

                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= PUBLIK ================= --}}
            <div class="tab-pane fade" id="publik">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publik as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>

                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= SUBNET ================= --}}
            <div class="tab-pane fade" id="subnet">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subnet as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>

                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= ANDING ================= --}}
            <div class="tab-pane fade" id="anding">

                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anding as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>

                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= CIDR ================= --}}
            <div class="tab-pane fade" id="cidr">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cidr as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>

                                    <td>{{ $row->soal }}</td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= SUBNETTING ================= --}}
            <div class="tab-pane fade" id="subnetting">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subnetting as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>
                                    @php
                                        $soal = json_decode($row->soal, true);
                                        $jawaban = json_decode($row->jawaban_benar, true);
                                    @endphp

                                    <td>
                                        IP: {{ $soal['ip'] ?? '-' }} <br>
                                        Subnet: {{ $soal['subnet'] ?? '-' }} <br>
                                        Host: {{ $soal['host_kebutuhan'] ?? '-' }}
                                    </td>

                                    <td>
                                        Kelas IP: {{ $jawaban['kelas_ip'] ?? '-' }} <br>
                                        Subnet Default: {{ $jawaban['subnet_mask_default'] ?? '-' }} <br>
                                        Subnet Baru: {{ $jawaban['subnet_mask_baru'] ?? '-' }} <br>
                                        Bit Dipinjam: {{ $jawaban['bit_dipinjam'] ?? '-' }} <br>
                                        Jumlah Subnet: {{ $jawaban['jumlah_subnet'] ?? '-' }} <br>
                                        Host Valid: {{ $jawaban['host_valid'] ?? '-' }} <br>
                                        Blok Subnet: {{ $jawaban['blok_subnet'] ?? '-' }}
                                    </td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= VLSM ================= --}}
            <div class="tab-pane fade" id="vlsm">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vlsm as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>
                                    @php
                                        $soal = json_decode($row->soal, true);
                                        $jawaban = json_decode($row->jawaban_benar, true);
                                    @endphp

                                    <td>
                                        <b>IP:</b> {{ $soal['ip'] ?? '-' }} <br><br>

                                        <b>Kebutuhan Host:</b><br>

                                        @foreach($soal['kebutuhan'] as $nama => $host)
                                            • {{ $nama }} : {{ $host }} host <br>
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach($jawaban as $item)
                                            <div style="margin-bottom:10px;">
                                                <b>{{ $item['nama'] }}</b><br>

                                                Prefix : {{ $item['prefix'] }} <br>
                                                Network : {{ $item['network'] }} <br>
                                                Range : {{ $item['range'] }} <br>
                                                Broadcast : {{ $item['broadcast'] }}
                                            </div>
                                            <hr>
                                        @endforeach
                                    </td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>

                                        @if($row->created_by != null)

                                            <button type="button" class="btn-edit btnEdit" data-id="{{ $row->id_soal }}"
                                                data-bab="{{ e($row->bab) }}" data-subbab="{{ e($row->subbab) }}"
                                                data-tingkat="{{ e($row->tingkat) }}" data-soal="{{ e($row->soal) }}"
                                                data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit">

                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button type="button" class="btn-delete btnHapus" data-id="{{ $row->id_soal }}"
                                                data-soal="{{ e($row->soal) }}">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        @else

                                            <span class="badge bg-secondary">
                                                Soal Default
                                            </span>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= KUIS ================= --}}
            <div class="tab-pane fade" id="kuis">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bab</th>
                                <th>Subbab</th>
                                <th>Soal</th>
                                <th>Opsi</th>
                                <th>Jawaban</th>
                                <th>Tingkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kuis as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->bab }}</td>
                                    <td>{{ $row->subbab }}</td>
                                    <td>{{ $row->soal }}</td>
                                    <td style="max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                        {{ $row->pilgan_opsi }}
                                    </td>
                                    <td>{{ $row->jawaban_benar }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>
                                        <button type="button" class="btn-detail btnDetail" data-bab="{{ e($row->bab) }}"
                                            data-subbab="{{ e($row->subbab) }}" data-tingkat="{{ e($row->tingkat) }}"
                                            data-soal="{{ e($row->soal) }}" data-opsi='{{ $row->pilgan_opsi }}'
                                            data-jawaban="{{ e($row->jawaban_benar) }}" data-bs-toggle="modal"
                                            data-bs-target="#modalDetail">

                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content custom-modal">

                <form id="formEdit" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- HEADER -->
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold">
                            <i class="bi bi-pencil-square me-2 text-primary"></i>
                            Edit Soal
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- BODY -->
                    <div class="modal-body pt-0">

                        <input type="hidden" name="id" id="edit_id">

                        <div class="row g-3">

                            <!-- BAB -->
                            <div class="col-md-6">
                                <label class="form-label">Bab</label>
                                <input type="text" name="bab" id="edit_bab" class="form-control input-modern">
                            </div>

                            <!-- SUBBAB -->
                            <div class="col-md-6">
                                <label class="form-label">Subbab</label>
                                <input type="text" name="subbab" id="edit_subbab" class="form-control input-modern">
                            </div>

                            <!-- TINGKAT -->
                            <div class="col-md-6">
                                <label class="form-label">Tingkat</label>
                                <select name="tingkat" id="edit_tingkat" class="form-select input-modern">
                                    <option value="mudah">Mudah</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="sulit">Sulit</option>
                                </select>
                            </div>

                            <!-- SOAL -->
                            <div class="col-12">
                                <label class="form-label">Soal</label>
                                <textarea name="soal" id="edit_soal" rows="3" class="form-control input-modern"></textarea>
                            </div>

                            <!-- JAWABAN -->
                            <div class="col-12">
                                <label class="form-label">Jawaban</label>
                                <textarea name="jawaban" id="edit_jawaban" rows="3"
                                    class="form-control input-modern"></textarea>
                            </div>

                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer border-0 pt-2">
                        <button type="button" class="btn btn-light btn-soft" data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-primary btn-save">
                            <i class="bi bi-check-circle me-1"></i> Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- modal hapus -->
    <div class="modal fade" id="modalHapus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-modal">

                <form id="formHapus" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header border-0">
                        <h5 class="modal-title text-danger fw-semibold">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Hapus Soal
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center">

                        <p class="mb-2">Yakin mau hapus soal ini?</p>

                        <div class="p-2 bg-light rounded small" id="hapus_soal_preview"></div>

                    </div>

                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i> Hapus
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- modal tambah soal -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content custom-modal">

                <form method="POST" action="/bank-soal/store">
                    @csrf

                    <!-- HEADER -->
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold">
                            <i class="bi bi-plus-circle me-2 text-primary"></i>
                            Tambah Soal
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- BODY -->
                    <div class="modal-body pt-0">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Kelas</label>

                                <select name="kelas_id" class="form-select input-modern" required>

                                    <option value="">-- Pilih Kelas --</option>

                                    @foreach(auth()->user()->kelasYangDiajar as $kelas)

                                        <option value="{{ $kelas->id }}">
                                            {{ $kelas->nama_kelas }}
                                        </option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Bab</label>
                                <select name="bab" id="babSelect" class="form-select input-modern">
                                    <option value="">-- Pilih Bab --</option>
                                    <option value="Sistem Bilangan">Sistem Bilangan</option>
                                    <option value="IP Addressing">IP Addressing</option>
                                    <option value="Subnetting">Subnetting</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Subbab</label>
                                <select name="subbab" id="subbabSelect" class="form-select input-modern">
                                    <option value="">-- Pilih Subbab --</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tingkat</label>
                                <select name="tingkat" class="form-select input-modern">
                                    <option value="mudah">Mudah</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="sulit">Sulit</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tipe Soal</label>
                                <select name="tipe_soal" class="form-select input-modern">
                                    <option value="biner_ke_desimal">Biner ke Desimal</option>
                                    <option value="desimal_ke_biner">Desimal ke Biner</option>
                                    <option value="kelas_ip">Kelas IP</option>
                                    <option value="network_id">Network ID</option>
                                    <option value="host_id">Host ID</option>
                                    <option value="publik_privat">IP Publik & Privat</option>
                                    <option value="subnet_mask">Subnet Mask</option>
                                    <option value="anding_default">Anding Default</option>
                                    <option value="cidr">CIDR</option>
                                    <option value="subnetting">Subnetting</option>
                                    <option value="vlsm">VLSM</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Soal</label>
                                <textarea name="soal" rows="3" class="form-control input-modern"></textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Jawaban</label>
                                <textarea name="jawaban" rows="3" class="form-control input-modern"></textarea>
                            </div>

                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- modal lihat kuis -->
    <div class="modal fade" id="modalDetail" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content custom-modal">

                <!-- HEADER -->
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-semibold">
                        <i class="bi bi-eye me-2 text-success"></i>
                        Detail Soal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body pt-0">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Bab</label>
                            <input type="text" id="detail_bab" class="form-control input-modern" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Subbab</label>
                            <input type="text" id="detail_subbab" class="form-control input-modern" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tingkat</label>
                            <input type="text" id="detail_tingkat" class="form-control input-modern" readonly>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Soal</label>
                            <textarea id="detail_soal" rows="3" class="form-control input-modern" readonly></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Pilihan Jawaban</label>
                            <div id="detail_opsi" class="p-3 rounded" style="background:#f9fafb;"></div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Jawaban</label>
                            <textarea id="detail_jawaban" rows="3" class="form-control input-modern" readonly></textarea>
                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Informasi Bank Soal -->
    <div class="modal fade" id="infoBankSoal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 rounded-4 shadow">

                <!-- Header -->
                <div class="modal-header border-0 pb-0">

                    <h5 class="modal-title fw-bold text-primary">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        Informasi Bank Soal
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">

                    </button>

                </div>

                <!-- Body -->
                <div class="modal-body pt-2">

                    <div class="info-item">
                        <i class="bi bi-lock-fill text-secondary"></i>

                        <div>
                            <strong>Soal Default</strong>
                            <p>
                                Soal default merupakan soal bawaan sistem
                                dan tidak dapat diubah atau dihapus.
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-pencil-square text-warning"></i>

                        <div>
                            <strong>Soal Buatan Dosen</strong>
                            <p>
                                Dosen dapat mengedit atau menghapus
                                soal yang dibuat sendiri.
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-journal-text text-primary"></i>

                        <div>
                            <strong>Fungsi Bank Soal</strong>
                            <p>
                                Bank soal digunakan sebagai sumber soal
                                pada menu <b>Ayo Berlatih</b>
                                di halaman mahasiswa.
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-shuffle text-success"></i>

                        <div>
                            <strong>Sistem Pengacakan Soal</strong>
                            <p>
                                Sistem akan menampilkan 12 soal secara acak:
                                <br>
                                • 4 soal mudah
                                <br>
                                • 4 soal sedang
                                <br>
                                • 4 soal sulit
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer border-0 pt-0">

                    <button type="button" class="btn btn-primary rounded-3 px-4" data-bs-dismiss="modal">

                        Mengerti

                    </button>

                </div>

            </div>

        </div>

    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const buttons = document.querySelectorAll(".btnEdit");

            buttons.forEach(btn => {
                btn.addEventListener("click", function () {

                    document.getElementById("edit_id").value = this.dataset.id;
                    document.getElementById("edit_bab").value = this.dataset.bab;
                    document.getElementById("edit_subbab").value = this.dataset.subbab;
                    document.getElementById("edit_tingkat").value = this.dataset.tingkat;
                    let subbab = this.dataset.subbab;

                    if (subbab === "Perhitungan Subnetting") {

                        let soal = JSON.parse(this.dataset.soal);
                        let jawaban = JSON.parse(this.dataset.jawaban);

                        let soalText =
                            `IP: ${soal.ip}
                                                                                                        Subnet: ${soal.subnet}
                                                                                                        Host Kebutuhan: ${soal.host_kebutuhan}`;

                        let jawabanText =
                            `Kelas IP: ${jawaban.kelas_ip}
                                                                                                        Subnet Default: ${jawaban.subnet_mask_default}
                                                                                                        Subnet Baru: ${jawaban.subnet_mask_baru}
                                                                                                        Bit Dipinjam: ${jawaban.bit_dipinjam}
                                                                                                        Jumlah Subnet: ${jawaban.jumlah_subnet}
                                                                                                        Host Valid: ${jawaban.host_valid}
                                                                                                        Blok Subnet: ${jawaban.blok_subnet}`;

                        document.getElementById("edit_soal").value = soalText;
                        document.getElementById("edit_jawaban").value = jawabanText;

                    }

                    else if (subbab === "VLSM") {

                        let soal = JSON.parse(this.dataset.soal);
                        let jawaban = JSON.parse(this.dataset.jawaban);

                        let kebutuhanText = '';

                        Object.keys(soal.kebutuhan).forEach(function (key) {
                            kebutuhanText += `${key}: ${soal.kebutuhan[key]} host\n`;
                        });

                        let soalText =
                            `IP: ${soal.ip}

                                                                                                        Kebutuhan Host:
                                                                                                        ${kebutuhanText}`;

                        let jawabanText = '';

                        jawaban.forEach(function (item) {

                            jawabanText +=
                                `${item.nama}
                                                                                                        Prefix : ${item.prefix}
                                                                                                        Network : ${item.network}
                                                                                                        Range : ${item.range}
                                                                                                        Broadcast : ${item.broadcast}

                                                                                                        `;
                        });

                        document.getElementById("edit_soal").value = soalText.trim();
                        document.getElementById("edit_jawaban").value = jawabanText.trim();

                    }

                    else {

                        document.getElementById("edit_soal").value = this.dataset.soal;
                        document.getElementById("edit_jawaban").value = this.dataset.jawaban;

                    }

                    // set action form
                    document.getElementById("formEdit").action = "/bank-soal/update/" + this.dataset.id;

                });
            });

        });

        document.addEventListener("click", function (e) {

            let btn = e.target.closest(".btnDetail");
            if (!btn) return;

            document.getElementById("detail_bab").value = btn.getAttribute("data-bab");
            document.getElementById("detail_subbab").value = btn.getAttribute("data-subbab");
            document.getElementById("detail_tingkat").value = btn.getAttribute("data-tingkat");
            document.getElementById("detail_soal").value = btn.getAttribute("data-soal");
            document.getElementById("detail_jawaban").value = btn.getAttribute("data-jawaban");

            let opsiRaw = btn.getAttribute("data-opsi");

            let container = document.getElementById("detail_opsi");
            container.innerHTML = "";

            if (opsiRaw) {
                let opsi = JSON.parse(opsiRaw);

                Object.keys(opsi).forEach(key => {
                    container.innerHTML += `
                                                                                                                                                                            <div class="mb-1">
                                                                                                                                                                                ${key}. ${opsi[key]}
                                                                                                                                                                            </div>
                                                                                                                                                                        `;
                });
            }

        });

        const subbabData = {
            "Sistem Bilangan": [
                "Sistem Bilangan Biner",
                "Sistem Bilangan Desimal"
            ],
            "IP Addressing": [
                "Kelas IP Address",
                "Network & Host ID",
                "IP Publik dan Privat",
                "Subnet Mask",
                "CIDR"
            ],
            "Subnetting": [
                "Perhitungan Subnetting",
                "VLSM"
            ]
        };

        document.getElementById("babSelect").addEventListener("change", function () {
            const subbabSelect = document.getElementById("subbabSelect");
            const selectedBab = this.value;

            subbabSelect.innerHTML = '<option value="">-- Pilih Subbab --</option>';

            if (subbabData[selectedBab]) {
                subbabData[selectedBab].forEach(function (sub) {
                    let option = document.createElement("option");
                    option.value = sub;
                    option.text = sub;
                    subbabSelect.appendChild(option);
                });
            }
        });

        document.addEventListener("click", function (e) {

            let btn = e.target.closest(".btnDetail");
            if (!btn) return;

            document.getElementById("detail_bab").value = btn.getAttribute("data-bab");
            document.getElementById("detail_subbab").value = btn.getAttribute("data-subbab");
            document.getElementById("detail_tingkat").value = btn.getAttribute("data-tingkat");
            document.getElementById("detail_soal").value = btn.getAttribute("data-soal");
            document.getElementById("detail_jawaban").value = btn.getAttribute("data-jawaban");

        });

        document.querySelectorAll('.nav-link').forEach(tab => {
            tab.addEventListener('click', function () {
                let target = this.getAttribute('data-bs-target');
                localStorage.setItem('activeTab', target);
            });
        });

        document.addEventListener("DOMContentLoaded", function () {

            let activeTab = localStorage.getItem('activeTab');

            if (activeTab) {
                let trigger = document.querySelector(`[data-bs-target="${activeTab}"]`);
                if (trigger) {
                    new bootstrap.Tab(trigger).show();
                }
            } else {
                // default
                let firstTab = document.querySelector('[data-bs-target="#biner"]');
                if (firstTab) {
                    new bootstrap.Tab(firstTab).show();
                }
            }

        });

        document.addEventListener("click", function (e) {

            let btn = e.target.closest(".btnHapus");
            if (!btn) return;

            let id = btn.getAttribute("data-id");
            let soal = btn.getAttribute("data-soal");

            Swal.fire({
                title: 'Hapus Soal?',
                html: `
                                                <p>Yakin mau hapus soal ini?</p>
                                            `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {

                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/bank-soal/delete/' + id;

                    form.innerHTML = `
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                        `;

                    document.body.appendChild(form);
                    form.submit();
                }

            });

        });

    </script>
@endsection