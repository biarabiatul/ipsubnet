@extends('dosen.dosen')

@section('title', 'Data Nilai')

<title>Penilaian</title>

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

        .table-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        /* Zebra */
        tbody tr:nth-child(odd) {
            background-color: #f3f4f6;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* ===== STATUS BADGE ===== */
        .badge-lulus {
            background: #16a34a;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
        }

        .badge-remedial {
            background: #dc2626;
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
            color: #374151;
            padding: 6px 12px;
            border-radius: 10px;
            transition: 0.2s;
        }

        .best-row {
            background: #fef3c7 !important;
            font-weight: 600;
        }

        input,
        select,
        textarea {
            font-family: inherit;
        }

        @media (max-width:768px) {

            /* card putih */
            .table-wrapper {
                overflow: hidden;
            }

            /* filter */
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

            /* bagian tampilkan + export */
            .table-control {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }

            .btn-export {
                width: 100%;
                justify-content: center;
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

                min-width: 800px;
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

        <div class="page-header-left">
            <div class="page-title">Penilaian</div>
            <div class="page-sub">
                Rekap nilai mahasiswa berdasarkan kuis dan evaluasi.
            </div>
        </div>
    </div>

    <!-- ===== TABLE ===== -->
    <div class="table-wrapper">

        <form method="GET">
            <div class="filter-section">
                <div class="filter-left">

                    <label>Kelas:</label>
                    <select name="kelas_id" onchange="this.form.submit()">
                        <option value="">Semua</option>

                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="search" placeholder="Cari mahasiswa..." value="{{ request('search') }}"
                        onkeyup="this.form.submit()">

                </div>
            </div>
        </form>

        <div class="table-control">
            <div class="show-data">
                <form method="GET" id="perPageForm">

                    {{-- Supaya filter tidak hilang --}}
                    <input type="hidden" name="kelas_id" value="{{ request('kelas_id') }}">
                    <input type="hidden" name="search" value="{{ request('search') }}">

                    Tampilkan
                    <select name="per_page" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                    data

                </form>
            </div>
            <button class="btn-export"
                onclick="window.location.href='{{ url('/export-excel?kelas_id=' . request('kelas_id') . '&search=' . request('search')) }}'">
                <i class="bi bi-download"></i>
                Export Excel
            </button>

        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Kuis 1</th>
                        <th>Kuis 2</th>
                        <th>Kuis 3</th>
                        <th>Evaluasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @php

                        function ambilNilaiTampil($riwayat, $kkm)
                        {

                            $nilaiTertinggi = null;

                            foreach ($riwayat as $item) {

                                $pernahRemedial = $riwayat
                                    ->where('created_at', '<', $item->created_at)
                                    ->where('nilai_akhir', '<', $kkm)
                                    ->count() > 0;

                                $nilaiTampil = $item->nilai_akhir;

                                if ($pernahRemedial && $item->nilai_akhir >= $kkm) {
                                    $nilaiTampil = $kkm;
                                }

                                if ($nilaiTertinggi === null || $nilaiTampil > $nilaiTertinggi) {
                                    $nilaiTertinggi = $nilaiTampil;
                                }
                            }

                            return $nilaiTertinggi;
                        }

                    @endphp

                    @forelse($data as $index => $item)

                        @php

                            $kkmKuis = $item->kelas->kkm_kuis ?? 75;
                            $kkmEvaluasi = $item->kelas->kkm_evaluasi ?? 70;

                            $kuis1 = ambilNilaiTampil(
                                $item->kuisHasil->where('id_kuis', 1),
                                $kkmKuis
                            );

                            $kuis2 = ambilNilaiTampil(
                                $item->kuisHasil->where('id_kuis', 2),
                                $kkmKuis
                            );

                            $kuis3 = ambilNilaiTampil(
                                $item->kuisHasil->where('id_kuis', 3),
                                $kkmKuis
                            );

                            $evaluasi = ambilNilaiTampil(
                                $item->kuisHasil->where('id_kuis', 4),
                                $kkmEvaluasi
                            );

                        @endphp

                        <tr>
                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>

                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->kelas->nama_kelas ?? '-' }}</td>

                            <td>{{ $kuis1 ?? '-' }}</td>
                            <td>{{ $kuis2 ?? '-' }}</td>
                            <td>{{ $kuis3 ?? '-' }}</td>
                            <td>{{ $evaluasi ?? '-' }}</td>

                            <td>
                                <button class="btn-riwayat" onclick="showRiwayat({{ $item->id }})">
                                    <i class="bi bi-search"></i>
                                </button>

                                <a href="/detail-jawaban/{{ $item->id }}" class="btn-riwayat">

                                    <i class="bi bi-list-check"></i>

                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="8" style="text-align:center; padding:20px;">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

    <div id="modalRiwayat" class="modal-riwayat">
        <div class="modal-content">

            <div class="modal-header">
                <h3>Riwayat</h3>
                <span class="close-btn" onclick="closeModal()">&times;</span>
            </div>

            <div class="modal-body">
                <div style="margin-bottom: 10px;">
                    <input type="text" id="searchRiwayat" placeholder="Cari kuis..." onkeyup="filterRiwayat()"
                        style="padding:6px 10px; border-radius:6px; border:1px solid #ccc; width:200px;">
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kuis</th>
                            <th>Percobaan</th>
                            <th>Nilai</th>
                            <th>Benar</th>
                            <th>Salah</th>
                            <th>Durasi</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody id="riwayatContent"></tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        function showRiwayat(id) {

            fetch('/riwayat/' + id)
                .then(res => res.json())
                .then(data => {

                    let html = '';
                    let percobaanMap = {};

                    if (data.length === 0) {
                        html = `<tr><td colspan="8" style="text-align:center;">Tidak ada riwayat</td></tr>`;
                    } else {

                        let bestMap = {};

                        data.sort((a, b) => new Date(b.end_time) - new Date(a.end_time));

                        let totalMap = {};

                        data.forEach(item => {
                            let namaKuis = item.kuis?.judul ?? '-';

                            if (!totalMap[namaKuis]) {
                                totalMap[namaKuis] = 1;
                            } else {
                                totalMap[namaKuis]++;
                            }
                        });

                        data.forEach(item => {
                            let namaKuis = item.kuis?.judul ?? '-';

                            if (!bestMap[namaKuis]) {
                                bestMap[namaKuis] = item;
                            } else {
                                let current = bestMap[namaKuis];

                                // 1. nilai lebih tinggi
                                if (item.nilai_akhir > current.nilai_akhir) {
                                    bestMap[namaKuis] = item;
                                }
                                // 2. kalau sama → ambil durasi tercepat
                                else if (
                                    item.nilai_akhir == current.nilai_akhir &&
                                    item.waktu_mengerjakan < current.waktu_mengerjakan
                                ) {
                                    bestMap[namaKuis] = item;
                                }
                            }
                        });

                        data.forEach((item, index) => {

                            let namaKuis = item.kuis?.judul ?? '-';

                            // percobaan
                            if (!percobaanMap[namaKuis]) {
                                percobaanMap[namaKuis] = totalMap[namaKuis];
                            } else {
                                percobaanMap[namaKuis]--;
                            }

                            // cek apakah ini nilai tertinggi
                            let isBest = bestMap[namaKuis].id === item.id;

                            html += `
                                    <tr class="row-riwayat ${isBest ? 'best-row' : ''}">
                                        <td>${index + 1}</td>
                                        <td>
                                            ${namaKuis}
                                            ${isBest ? '<i class="bi bi-trophy-fill text-warning"></i>' : ''}
                                        </td>
                                        <td>${percobaanMap[namaKuis]}</td>
                                        <td>${item.nilai_tampil}</td>
                                        <td>${item.total_benar}</td>
                                        <td>${item.total_salah}</td>
                                        <td>${formatDurasi(item.waktu_mengerjakan)}</td>
                                        <td>${item.end_time ?? '-'}</td>
                                    </tr>
                                `;
                        });

                    }

                    document.getElementById('riwayatContent').innerHTML = html;
                    document.getElementById('modalRiwayat').style.display = 'block';
                });
        }

        function closeModal() {
            document.getElementById('modalRiwayat').style.display = 'none';
        }

        window.onclick = function (event) {
            let modal = document.getElementById('modalRiwayat');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        function filterRiwayat() {
            let input = document.getElementById('searchRiwayat').value.toLowerCase();
            let rows = document.querySelectorAll('.row-riwayat');

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();

                if (text.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function formatDurasi(detik) {
            if (!detik) return '-';

            let menit = Math.floor(detik / 60);
            let sisaDetik = detik % 60;

            if (menit > 0 && sisaDetik > 0) {
                return `${menit} m ${sisaDetik} d`;
            } else if (menit > 0) {
                return `${menit} menit`;
            } else {
                return `${sisaDetik} detik`;
            }
        }
    </script>
@endsection