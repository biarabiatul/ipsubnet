@extends('mahasiswa.mahasiswa')

@section('title', 'Bab I - Rangkuman')
<title>BAB 1 : Sistem Bilangan</title>
@section('content')

    <style>
        .subbab-title {
            font-weight: 800;
            font-size: 28px;
            color: #89471e;
            margin-bottom: 20px;
        }

        .materi-box {
            background: #ffffff;
            border-radius: 8px;
            margin-bottom: 24px;
            border: 1px solid #d6c3b2;
            overflow: hidden;
        }

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

        .materi-box .box-body {
            padding: 18px;
            line-height: 1.8;
            color: #1f2937;
        }

        .icon-circle {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .highlight-title {
            color: #89471e;
            font-weight: 700;
        }

        .nav-bottom {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* style umum */
        .nav-btn {
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: 0.3s ease;
            color: #ffffff;
        }

        .nav-prev {
            background-color: #6b7280;
        }

        .nav-prev:hover {
            background-color: #4b5563;
        }

        .nav-next {
            background-color: #b45309;
        }

        .nav-next:hover {
            background-color: #6f3717;
            color: #ffffff;
        }
    </style>

    <!-- RANGKUMAN -->
    <div class="materi-box">
        <div class="box-header">
            <div class="icon-circle">
                <i class="bi bi-journal-text"></i>
            </div>
            Rangkuman
        </div>

        <div class="box-body">

            <strong class="highlight-title">Sistem Bilangan Biner</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li>
                    Sistem bilangan biner adalah sistem bilangan dengan <strong>basis 2</strong> yang hanya
                    menggunakan digit 0 dan 1.
                </li>
                <li>
                    Komputer tidak memahami angka desimal seperti manusia (0–9), melainkan hanya mengenali
                    angka <strong>0</strong> dan <strong>1</strong>.
                </li>
                <li>
                    Setiap digit dalam bilangan biner disebut <em>bit (binary digit)</em> dan merupakan
                    satuan data terkecil dalam komputer.
                </li>
                <li>
                    8 bit digabungkan menjadi <strong>1 <em>byte</em> (1 oktet)</strong> yang mampu
                    merepresentasikan nilai desimal dari <strong>0 sampai 255</strong>.
                </li>
                <li>
                    16 bit (2 <em>byte</em>) dapat merepresentasikan nilai desimal dari
                    <strong>0 sampai 65.535</strong>, sedangkan 24 bit (3 <em>byte</em>) dapat
                    merepresentasikan nilai yang lebih besar.
                </li>
                <li>
                    Setiap bit memiliki bobot berupa pangkat dua (2<sup>n</sup>) sesuai
                    posisinya dari kanan ke kiri.
                </li>
            </ul>

            <br>

            <strong class="highlight-title">Sistem Bilangan Desimal</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li>
                    Sistem bilangan desimal adalah sistem bilangan dengan <strong>basis 10</strong> yang
                    menggunakan digit 0–9.
                </li>
                <li>
                    Sistem bilangan desimal merupakan sistem bilangan yang paling umum digunakan dalam
                    kehidupan sehari-hari.
                </li>
                <li>
                    Dalam jaringan komputer, bilangan desimal digunakan agar alamat IP mudah dibaca
                    oleh manusia, meskipun data tersebut tetap diproses oleh komputer dalam bentuk
                    bilangan biner.
                </li>
            </ul>

        </div>
    </div>

    <div class="nav-bottom">
        <a href="/bab1/desimal-biner" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="#" class="nav-btn nav-next" onclick="lanjutRangkuman(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <script>
        fetch("/progres/buka/Sistem Bilangan/Rangkuman Bab 1");

        function lanjutRangkuman(e) {
            e.preventDefault();

            fetch("/progres/selesai/Sistem Bilangan/Rangkuman Bab 1", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(res => {
                    if (!res.ok) throw new Error();

                    window.location.href = "/bab1/petunjuk-kuis-bab1";
                })
                .catch(() => {
                    alert("Gagal menyimpan progres");
                });
        }
    </script>

@endsection