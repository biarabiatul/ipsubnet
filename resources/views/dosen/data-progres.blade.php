@extends('dosen.dosen')

@section('title', 'Data Progres')

<title>Progres Belajar</title>

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

        tbody tr:nth-child(odd) {
            background-color: #f3f4f6;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .progress-bar {
            background: #e5e7eb;
            border-radius: 20px;
            overflow: hidden;
            height: 10px;
            width: 100%;
        }

        .progress-fill {
            height: 100%;
            background: #22c55e;
        }

        .badge-selesai {
            background: #16a34a;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
        }

        .badge-proses {
            background: #f59e0b;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
        }

        .badge-belum {
            background: #6b7280;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
        }

        .show-data select {
            margin: 0 6px;
            padding: 4px 8px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
        }

        .table-control {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .modal-riwayat {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background: white;
            width: 80%;
            margin: 60px auto;
            border-radius: 12px;
            padding: 20px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .close-btn {
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-riwayat {
            border: 1px solid #d1d5db;
            background: #f9fafb;
            padding: 6px 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-riwayat i {
            font-size: 14px;
            color: #374151;
        }

        .btn-riwayat:hover {
            background: #e5e7eb;
        }

        @media (max-width:768px) {

            /* card putih */
            .table-wrapper {
                overflow: hidden;
            }

            /* filter mobile */
            .filter-section {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
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

            /* bagian tampilkan */
            .table-control {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            /* scroll tabel */
            .table-responsive {

                width: 100%;
                overflow-x: auto;
                overflow-y: hidden;

                display: block;

                -webkit-overflow-scrolling: touch;
            }

            .table-responsive table {

                min-width: 900px;
                width: max-content;

                border-collapse: collapse;
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
    </style>

    <div class="page-header-box">
        <div>
            <div class="page-title">Progres Belajar</div>
            <div class="page-sub">
                Monitoring perkembangan belajar mahasiswa.
            </div>
        </div>
    </div>

    <div class="table-wrapper">

        <form method="GET">
            <div class="filter-section">
                <div class="filter-left">

                    <label>Kelas:</label>
                    <select name="kelas_id" onchange="this.form.submit()">
                        <option value="">Semua</option>

                        @foreach($kelasList as $k)
                            <option value="{{ $k->id }}" {{ $kelasId == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="search" placeholder="Cari mahasiswa..." value="{{ $search }}"
                        onkeyup="this.form.submit()">

                </div>
            </div>
        </form>

        <!-- CONTROL -->
        <div class="table-control">
            <div class="show-data">
                Tampilkan
                <select>
                    <option>10</option>
                    <option>25</option>
                </select>
                data
            </div>

        </div>

        <!-- TABLE -->
         <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Progres</th>
                    <th>Status</th>
                    <th>Terakhir Akses</th>
                    <th>Riwayat</th>
                </tr>
            </thead>

            <tbody>

                @forelse($data as $index => $item)

                    @php
                        $persen = optional($item->progres)->persen ?? 0;
                        $lastAccess = optional($item->progres)->updated_at;
                    @endphp

                    <tr>
                        <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>

                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->kelas->nama_kelas ?? '-' }}</td>

                        <!-- PROGRES -->
                        <td>
                            {{ $persen }}%
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $persen }}%"></div>
                            </div>
                        </td>

                        <!-- STATUS -->
                        <td>
                            @if($persen == 100)
                                <span class="badge-selesai">Selesai</span>
                            @elseif($persen > 0)
                                <span class="badge-proses">Proses</span>
                            @else
                                <span class="badge-belum">Belum</span>
                            @endif
                        </td>

                        <!-- TERAKHIR AKSES -->
                        <td>
                            {{ $lastAccess ? \Carbon\Carbon::parse($lastAccess)->format('d M Y H:i') : '-' }}
                        </td>

                        <!-- RIWAYAT -->
                        <td>
                            <button class="btn-riwayat" onclick="showDetail({{ $item->id }})">
                                <i class="bi bi-search"></i>
                            </button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" style="text-align:center; padding:20px;">
                            Tidak ada data
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        </div>

    </div>

    <!-- MODAL RIWAYAT PROGRES -->
    <div id="modalDetail" class="modal-riwayat">
        <div class="modal-content">

            <div class="modal-header">
                <h3>Riwayat Progres</h3>
                <span class="close-btn" onclick="closeModal()">&times;</span>
            </div>

            <div class="modal-body">

                <div style="margin-bottom: 10px;">
                    <input type="text" id="searchDetail" placeholder="Cari bab / subbab..." onkeyup="filterDetail()"
                        style="padding:6px 10px; border-radius:6px; border:1px solid #ccc; width:200px;">
                </div>

                <table>
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

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <script>

        function formatTanggal(datetime) {
            const bulan = [
                "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ];

            const date = new Date(datetime);

            const hari = String(date.getDate()).padStart(2, '0');
            const bulanText = bulan[date.getMonth()];
            const tahun = date.getFullYear();

            const jam = String(date.getHours()).padStart(2, '0');
            const menit = String(date.getMinutes()).padStart(2, '0');

            return `${hari} ${bulanText} ${tahun} ${jam}:${menit}`;
        }

        function showDetail(id) {

            document.getElementById('searchDetail').value = '';

            fetch('/progres-detail/' + id)
                .then(res => res.json())
                .then(data => {

                    let html = '';

                    if (data.length === 0) {
                        html = `<tr><td colspan="5" style="text-align:center;">Belum ada progres</td></tr>`;
                    } else {

                        data.forEach((item, index) => {

                            let statusBadge = '';

                            if (item.status === 'selesai') {
                                statusBadge = '<span class="badge-selesai">Selesai</span>';
                            } else {
                                statusBadge = '<span class="badge-belum">Belum</span>';
                            }

                            html += `
                                        <tr class="row-detail">
                                            <td>${index + 1}</td>
                                            <td>${item.bab}</td>
                                            <td>${item.subbab}</td>
                                            <td>${statusBadge}</td>
                                            <td>${item.updated_at ? formatTanggal(item.updated_at) : '-'}</td>
                                        </tr>
                                    `;
                        });
                    }

                    document.getElementById('detailContent').innerHTML = html;
                    document.getElementById('modalDetail').style.display = 'block';
                });
        }

        function closeModal() {
            document.getElementById('modalDetail').style.display = 'none';
        }

        function filterDetail() {
            let input = document.getElementById('searchDetail').value.toLowerCase();
            let rows = document.querySelectorAll('.row-detail');

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
            let modal = document.getElementById('modalDetail');

            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
@endsection