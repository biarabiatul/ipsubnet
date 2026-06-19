@extends('mahasiswa.mahasiswa')

@section('title', 'Tujuan Pembelajaran - IP Addressing')

<title>BAB 3 : Subnetting</title>

@section('content')

    <style>
        /* ===== JUDUL ===== */
        .subbab-title {
            font-weight: 800;
            font-size: 28px;
            color: #89471e;
            margin-bottom: 20px;
        }

        /* ===== CARD ===== */
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
            padding: 20px;
            line-height: 1.8;
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
        }

        /* ===== LIST TUJUAN ===== */
        .tujuan-list {
            margin-left: 18px;
        }

        .tujuan-list li {
            margin-bottom: 10px;
        }

        /* ===== BOX INFO ===== */
        .info-box {
            background: #fef9f6;
            border-left: 5px solid #89471e;
            padding: 16px 20px;
            margin-top: 20px;
            border-radius: 6px;
        }

        .info-box .info-title {
            font-weight: 700;
            color: #89471e;
            margin-bottom: 8px;
        }

        /* ===== NAVIGATION BUTTON ===== */
        .nav-bottom {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .nav-btn {
            background-color: #a0522d;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s ease;
            font-size: 14px;
        }

        .nav-btn:hover {
            background-color: #6f3717;
            color: #ffffff;
        }

        .nav-btn i {
            margin: 0 5px;
        }

        .catatan-box {
            margin-top: -10px;
            margin-bottom: 16px;
            background: #fff7f2;
            border: 1px solid #e5cfc0;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 13.5px;
            color: #5a3b2a;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-style: italic;
        }

        .catatan-box i {
            font-size: 16px;
            margin-top: 2px;
            color: #a0522d;
        }
    </style>

    <div class="materi-box">
        <div class="box-header">
            <div class="icon-circle">
                <i class="bi bi-bookmark-check"></i>
            </div>
            Tujuan Pembelajaran
        </div>

        <div class="box-body">

            Setelah menyelesaikan materi pada bab ini, mahasiswa diharapkan mampu :

            <ol class="tujuan-list">
                <li>
                    Memahami konsep <em>subnetting</em> dalam pembagian jaringan komputer melalui penjelasan materi dengan benar
                </li>
                <li>
                    Menerapkan teknik <em>subnetting</em> untuk membagi alamat IP sesuai kebutuhan jumlah host melalui latihan soal dengan tepat
                </li>
                <li>
                    Menerapkan metode VLSM dalam pembagian alamat IP secara efisien sesuai kebutuhan jaringan melalui latihan soal atau studi kasus dengan tepat.
                </li>
            </ol>
        </div>
    </div>
    <div class="catatan-box">
        <i class="bi bi-info-circle-fill"></i>
        <div>
            <strong>Catatan:</strong> Tujuan pembelajaran ini mengacu pada CPMK dalam RPS Mata Kuliah
            Jaringan dan Komunikasi Data Jurusan Pendidikan Komputer FKIP ULM Tahun 2025.
        </div>
    </div>

    <!-- ===== NAVIGASI BAWAH ===== -->
    <div class="nav-bottom">
        <a href="/bab3/subnetting" class="nav-btn">Halaman Selanjutnya</a>
    </div>

@endsection