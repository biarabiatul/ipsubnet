@extends('landingpage.layout')

@section('title', 'Petunjuk Penggunaan')

<title>Petunjuk</title>

@section('content')

    <style>
        /* ===== PETUNJUK ===== */
        .petunjuk-section {
            padding-top: 40px;
            padding-bottom: 60px;
        }

        .petunjuk-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.05);
            border: 1.5px solid #d1d5db;
            margin-bottom: 40px;
        }

        .main-title {
            text-align: center;
            font-size: 24px;
            font-weight: 800;
            color: #89471e;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            color: #89471e;
            margin-bottom: 20px;
            text-align:center;
        }

        .petunjuk-preview {
            text-align: center;
            margin-bottom: 24px;
        }

        .petunjuk-preview img {
            width: 100%;
            border-radius: 12px;
        }

        .keterangan-content h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .keterangan-content ol {
            padding-left: 20px;
        }

        .keterangan-content li {
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 10px;
            color: #374151;
        }

        @media (max-width:768px) {

            .petunjuk-section {
                padding: 30px 0 50px;
            }

            .petunjuk-card {
                padding: 22px;
                border-radius: 16px;
            }

            .petunjuk-title {
                font-size: 24px;
            }

            .keterangan-content li {
                font-size: 15px;
                line-height: 1.8;
            }

        }
    </style>

    <section class="container petunjuk-section">

        <!-- CARD 1 -->
        <div class="petunjuk-card">

            <h1 class="main-title">
                Petunjuk Penggunaan Aplikasi
            </h1>

            <div class="section-title">
                Halaman Beranda
            </div>

            <div class="petunjuk-preview">
                <img src="{{ asset('assets/img/petunjuk1.png') }}" alt="Petunjuk">
            </div>

            <div class="keterangan-content">

                <h3>Keterangan:</h3>

                <ol>
                    <li>
                        Informasi nama media pembelajaran.
                    </li>

                    <li>
                        Navigasi untuk berpindah ke halaman
                        <strong>Beranda</strong>,
                        <strong>Daftar Materi</strong>,
                        <strong>Petunjuk</strong>,
                        dan <strong>Tentang</strong>.
                    </li>

                    <li>
                        Tombol <strong>"Masuk"</strong> digunakan untuk masuk ke akun,
                        sedangkan tombol <strong>"Daftar"</strong>
                        digunakan untuk registrasi pengguna baru.
                    </li>

                    <li>
                        Tombol <strong>"Mulai Belajar"</strong>
                        digunakan untuk memulai pembelajaran.
                    </li>

                </ol>

            </div>

        </div>

        <!-- CARD 2 -->
        <div class="petunjuk-card">

            <div class="section-title">
                Halaman Materi
            </div>

            <div class="petunjuk-preview">
                <img src="{{ asset('assets/img/petunjuk2.png') }}" alt="Petunjuk">
            </div>

            <div class="keterangan-content">

                <h3>Keterangan:</h3>

                <ol>
                    <li>
                        <strong>Sidebar</strong> berisi daftar subbab materi
                        yang dapat dipilih pengguna.
                    </li>

                    <li>
                        Informasi <strong>progress belajar</strong>
                        yang menunjukkan persentase materi
                        yang telah diselesaikan.
                    </li>

                    <li>
                        Navigasi bagian materi yang digunakan
                        untuk menampilkan pembelajaran secara bertahap
                        dalam satu subbab.
                    </li>

                    <li>
                        Tombol <strong>"Halaman Selanjutnya"</strong>
                        digunakan untuk melanjutkan ke materi berikutnya.
                    </li>

                    <li>
                        Menu akun pengguna dan tombol
                        <strong>"Keluar"</strong>
                        untuk keluar dari sistem.
                    </li>

                </ol>

            </div>

        </div>

    </section>

@endsection