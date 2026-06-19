@extends('dosen.dosen')

@section('title', 'Data Mahasiswa')

<title>Data Mahasiswa</title>

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

        select {
            font-family: 'Fira Sans', sans-serif;
        }

        .filter-left select,
        .filter-left input {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        .btn-export {
            background: #16a34a;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
            font-family: 'Fira Sans', sans-serif;
        }

        .btn-export:hover {
            background: #15803d;
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

        thead tr,
        thead th {
            background: #dbeafe !important;
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


        /* Baris ganjil */
        tbody tr:nth-child(odd) {
            background-color: #f3f4f6;
        }

        /* Baris genap */
        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* ===== EDIT BUTTON ===== */
        .btn-edit {
            background: #fbbf24;
            border: none;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-edit:hover {
            background: #f59e0b;
        }

        .btn-delete {
            background-color: #dc3545;
            /* merah */
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .aksi-btn {
            display: flex;
            gap: 6px;
            /* jarak antar tombol */
            justify-content: center;
            /* biar di tengah */
        }

        .btn-edit,
        .btn-delete {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-tambah {
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

        .btn-tambah:hover {
            background: #2563eb;
        }

        .header-aksi {
            display: flex;
            justify-content: flex-end;
            margin: 15px 0;
        }

        /* ===== PAGINATION ===== */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 15px;
        }

        .page-btn {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 13px;
            cursor: pointer;
            background: white;
        }

        .page-btn.active {
            background: #3b82f6;
            color: white;
            border: none;
        }

        /* ===== TABLE CONTROL ===== */
        .table-control {
            display: flex;
            justify-content: flex-start;
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

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 9999;
        }

        /* BOX */
        .modal-box {
            background: #fff;
            width: 400px;
            border-radius: 12px;
            margin: auto;
            margin-top: 100px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.2s ease;
            position: relative;
            z-index: 10000;
        }

        /* HEADER */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 18px;
        }

        .close {
            font-size: 26px;
            font-weight: bold;
            cursor: pointer;
            color: #666;
            transition: 0.2s;
        }

        /* BODY */
        .modal-body {
            padding: 20px;
        }

        .modal-body label {
            font-size: 13px;
            color: #555;
        }

        .modal-body input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        /* FOOTER */
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 15px 20px;
            border-top: 1px solid #eee;
        }

        /* BUTTON */
        .btn-simpan {
            background: #2563eb;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-family: 'Fira Sans', sans-serif;
        }

        .btn-batal {
            background: #6b7280;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-family: 'Fira Sans', sans-serif;
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

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: #fff;
            box-sizing: border-box;
        }

        input[readonly] {
            background-color: #f1f3f5;
            /* abu soft */
            color: #6c757d;
            cursor: not-allowed;
            border: 1px solid #ddd;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 42px;
            padding: 0 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        @media (max-width:768px) {

            .card-ui {
                overflow: hidden;
            }

            .table-responsive {
                width: 100%;
                max-width: 100%;
                overflow-x: scroll;
                overflow-y: hidden;
                display: block;
                box-sizing: border-box;
                -webkit-overflow-scrolling: touch;
            }

            .table-responsive table {
                width: max-content !important;
                min-width: 800px;
                margin: 0;
            }

            body {
                overflow-x: hidden;
            }

            .filter-section {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
                width: 100%;
            }

            .filter-left {
                display: flex;
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }

            .filter-left select,
            .filter-left input {
                width: 100%;
                box-sizing: border-box;
            }

            .btn-export {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <!-- ===== HEADER ===== -->
    <div class="page-header-box">

        <div class="page-header-left">
            <div class="page-title">Data Mahasiswa</div>
            <div class="page-sub">
                Kelola mahasiswa berdasarkan kelas.
            </div>
        </div>

    </div>

    <!-- ===== TABLE ===== -->
    <div class="table-wrapper">

        <!-- ===== FILTER ===== -->
        <div class="filter-section">

            <form method="GET" class="filter-left">

                <label>Pilih Kelas:</label>

                <select name="kelas_id" onchange="this.form.submit()">
                    <option value="">-- Pilih Nama Kelas --</option>

                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach

                </select>

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari...">

            </form>

            <button class="btn-export"
                onclick="window.location.href='{{ url('/export-mahasiswa?kelas_id=' . request('kelas_id') . '&search=' . request('search')) }}'">
                <i class="bi bi-download"></i>
                Export Excel
            </button>

        </div>

        <!-- ===== TABLE CONTROL ===== -->
        <div class="table-control">
            <div class="show-data">
                Tampilkan
                <select>
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                data
            </div>

        </div>

        <div class="header-aksi">
            <button class="btn-tambah" onclick="openTambahModal()">
                <i class="bi bi-plus-lg"></i>
                Tambah Mahasiswa
            </button>
        </div>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Email</th>
                        <th>Kelas</th>
                        <th style="width:100px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($mahasiswa as $index => $mhs)
                        <tr>
                            <td>
                                {{ ($mahasiswa->currentPage() - 1) * $mahasiswa->perPage() + $index + 1 }}
                            </td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama_lengkap }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td>{{ $mhs->kelas->nama_kelas ?? '-' }}</td>
                            <td>
                                <div class="aksi-btn">
                                    <button class="btn-edit" onclick="openEditModal({{ $mhs->id }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <button class="btn-delete"
                                        onclick="openDeleteModal({{ $mhs->id }}, '{{ $mhs->nama_lengkap }}')">
                                        <i class="bi bi-box-arrow-right"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:20px;">
                                Tidak ada data mahasiswa
                            </td>
                        </tr>
                    @endforelse
                </tbody>


            </table>
        </div>

        <!-- PAGINATION -->
        <div style="margin-top:15px;">
            {{ $mahasiswa->links() }}
        </div>

    </div>

    <div id="modalEdit" class="modal">
        <div class="modal-box">

            <div class="modal-header">
                <h3>Edit Mahasiswa</h3>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>

            <div class="modal-body">
                <label>Nama</label>
                <input type="text" id="editNama" readonly>

                <form method="POST" id="formEdit">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas_id" id="editKelas" class="form-control">
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button class="btn-batal" type="button" onclick="closeModal()">Batal</button>
                        <button type="submit" class="btn-simpan">Simpan Perubahan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div id="modalDelete" class="modal">
        <div class="modal-box">

            <!-- HEADER -->
            <div class="modal-header">
                <h3>Keluarkan Mahasiswa</h3>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>

            <!-- BODY -->
            <div class="modal-body">
                <p id="deleteText"></p>
                <small style="color: gray;">
                    Mahasiswa tidak akan dihapus dari sistem.
                </small>
            </div>

            <!-- FOOTER -->
            <form method="POST" id="formDelete">
                @csrf
                @method('DELETE')

                <div class="modal-footer">
                    <button type="button" class="btn-batal" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-delete">
                        Ya
                    </button>
                </div>
            </form>

        </div>
    </div>

    <div id="modalTambah" class="modal">
        <div class="modal-box">

            <!-- HEADER -->
            <div class="modal-header">
                <h3>Tambah Mahasiswa</h3>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>

            <!-- FORM -->
            <form method="POST" action="/mahasiswa/tambah-ke-kelas">
                @csrf

                <!-- BODY -->
                <div class="modal-body">

                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" placeholder="Masukkan NIM" required>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama_lengkap" placeholder="Masukkan Nama" required>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas_id" required>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn-batal" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-simpan">Tambah</button>
                </div>

            </form>

        </div>
    </div>

    <script>
        function openEditModal(id) {
            fetch('/mahasiswa/' + id)
                .then(res => res.json())
                .then(data => {

                    let modal = document.getElementById("modalEdit");

                    // tampilkan modal
                    modal.style.display = "flex";

                    // isi data
                    document.getElementById("editNama").value = data.nama_lengkap;
                    document.getElementById("editKelas").value = data.kelas_id;

                    // set action form
                    document.getElementById("formEdit").action = "/mahasiswa/" + data.id;
                });
        }

        function closeModal() {
            document.getElementById("modalTambah").style.display = "none";
            document.getElementById("modalEdit").style.display = "none";
            document.getElementById("modalDelete").style.display = "none";
        }

        function openDeleteModal(id, nama) {
            document.getElementById("modalDelete").style.display = "block";

            document.getElementById("deleteText").innerText =
                "Yakin mau mengeluarkan " + nama + " dari kelas ini?";

            document.getElementById("formDelete").action = "/mahasiswa/" + id;
        }

        function openTambahModal() {
            document.getElementById("modalTambah").style.display = "flex";
        }
    </script>

@endsection