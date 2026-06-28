@extends('landingpage.layout')

@section('title', 'Beranda')

<title>IPSubnet</title>

@section('footer-class', 'footer-naik')

@section('content')


    <style>
        /* ===== FONT & WARNA ===== */
        body {
            font-family: 'Fira Sans', sans-serif;
            color: #222222;
        }

        .hero-subtitle {
            color: #89471e;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .hero-image img {
            animation: floating 4s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
                /* naik */
            }

            100% {
                transform: translateY(0);
                /* turun */
            }
        }


        .hero-title {
            font-weight: 800;
            line-height: 1.7;
            margin-bottom: 0px;
        }

        .hero-desc {
            line-height: 1.7;
            max-width: 520px;
            text-align: justify;
            margin-bottom: 30px;
            /* dorong tombol turun */
        }

        .hero-section {
            padding-top: 85px;
            padding-bottom: 40px;
        }

        .hero-image img {
            max-width: 85%;
            height: auto;
        }


        .btn-main:hover {
            background: #462c1d;
            color: #fff;
        }

        .footer-naik {
            margin-top: 45px;
        }

        @media (max-width: 768px) {
            .hero-text {
                margin-top: 20px;
                /* bisa 20–40px sesuai selera */
            }
        }
    </style>

    <section class="container hero-section">
        <div class="row align-items-center">
            <div class="col-lg-6 order-2 order-lg-1 hero-text">
                <h3 class="hero-subtitle">Media Pembelajaran Interaktif</h3>

                <h1 class="hero-title">
                    <i>IP Addressing</i> & <i>Subnetting</i>
                </h1>

                <p class="hero-desc mt-3">
                    Media pembelajaran ini dirancang untuk membantu mahasiswa memahami konsep dasar <i>IP Addressing</i> dan <i>Subnetting</i>, mulai dari pengalamatan IP, <i>subnet mask</i>, CIDR, hingga perhitungan <i>subnetting</i> dan VLSM dalam jaringan komputer.
                </p>

                <a href="/login" class="btn-main">
                    Mulai Belajar
                </a>
            </div>

            <div class="col-lg-6 text-center hero-image order-1 order-lg-2">
                <img src="{{ asset('assets/img/hero/hero-2/hero-img.png') }}" class="img-fluid"
                    alt="Ilustrasi IP Addressing">
            </div>

        </div>
    </section>

@endsection