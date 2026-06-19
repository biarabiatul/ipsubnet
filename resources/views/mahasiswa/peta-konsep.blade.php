@extends('mahasiswa.mahasiswa')

@section('title', 'Peta Konsep')

<title>Peta Konsep</title>

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
            text-align: center;
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

        /* GAMBAR */
        .peta-img {
            max-width: 900px;
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .materi-box .box-body {
                padding: 12px;
            }
        }

        @media (max-width: 768px) {
            .nav-bottom {
                justify-content: center;
            }

            .nav-btn {
                width: auto;
                padding: 10px 18px;
            }
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
    </style>

    <div class="materi-box">
        <div class="box-header">
            <div class="icon-circle">
                <i class="bi bi-diagram-3"></i>
            </div>
            Peta Konsep
        </div>

        <div class="box-body">
            <img src="{{ asset('assets/img/peta-konsep.png') }}" class="peta-img" alt="Peta Konsep">
        </div>
    </div>

    <div class="nav-bottom">
        <a href="/bab1/tujuan-pembelajaran-bab1" class="nav-btn">Halaman Selanjutnya</a>
    </div>

@endsection