@extends('dosen.dosen')

@section('title', 'Detail Jawaban')

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

        .table-wrapper {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
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
            text-align: center;
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

        .badge-benar {
            background: #16a34a;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-salah {
            background: #dc2626;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-kembali {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #6b7280;
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s;
            margin-top: -8px;
            margin-bottom: 18px;
        }

        .btn-kembali:hover {
            background: #4b5563;
        }
    </style>

    <div class="page-header-box">

        <div class="page-title">
            Detail Jawaban Mahasiswa
        </div>

        <div class="page-sub">
            Analisis jawaban per nomor soal.
        </div>

    </div>

    <div style="margin-top:-10px;">
        <a href="/data-nilai" class="btn-kembali">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>
    </div>

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>

                    <th>Kuis / Evaluasi</th>

                    @php
                        $maxSoal = 0;

                        foreach ($data as $item) {
                            $jumlah = count($item['jawaban']);

                            if ($jumlah > $maxSoal) {
                                $maxSoal = $jumlah;
                            }
                        }
                    @endphp

                    @for($i = 1; $i <= $maxSoal; $i++)

                        <th>No {{ $i }}</th>

                    @endfor

                </tr>
            </thead>

            <tbody>

                @foreach($data as $item)

                    <tr>

                        <td style="font-weight:700;">

                            @if(str_contains(strtolower($item['judul']), 'bab 1'))

                                Kuis 1

                            @elseif(str_contains(strtolower($item['judul']), 'bab 2'))

                                Kuis 2

                            @elseif(str_contains(strtolower($item['judul']), 'bab 3'))

                                Kuis 3

                            @elseif(str_contains(strtolower($item['judul']), 'evaluasi'))

                                Evaluasi

                            @else

                                {{ $item['judul'] }}

                            @endif

                        </td>

                        @foreach($item['jawaban'] as $jawaban)

                            <td>

                                @if($jawaban->status == 'benar')

                                    <span class="badge-benar">
                                        Benar
                                    </span>

                                @else

                                    <span class="badge-salah">
                                        Salah
                                    </span>

                                @endif

                            </td>

                        @endforeach

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection