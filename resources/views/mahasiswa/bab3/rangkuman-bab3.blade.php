@extends('mahasiswa.mahasiswa')

@section('title', 'Bab II - Rangkuman')

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

        /* ===== CARD UMUM ===== */
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

        /* ISI */
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

        /* navigasi */
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

            <strong class="highlight-title">1. Pengenalan Subnetting</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li><i>Subnetting</i> adalah proses membagi jaringan <i>IP</i> besar menjadi beberapa jaringan kecil
                    (<i>subnet</i>) untuk memudahkan pengelolaan dan komunikasi. Tujuannya agar jaringan lebih efisien,
                    terstruktur, dan mudah dikelola.
                </li>

                <li>Alamat <i>IP</i> terdiri dari <strong><i>network</i></strong> dan <strong><i>host</i></strong>, yang
                    pada <i>subnetting</i> dibagi menjadi <strong><i>network</i></strong>, <strong><i>subnet</i></strong>,
                    dan <strong><i>host</i></strong>.
                </li>

                <li>Perangkat dengan network address yang sama berada dalam satu subnet.</li>

                <li>Semakin banyak bit host yang dipinjam, jumlah subnet bertambah, tetapi jumlah host per
                    subnet berkurang.</li>

                <li>
                    Dalam melakukan <i>subnetting</i>, seorang administrator jaringan harus menentukan <strong>jumlah
                        subnet</strong>, <strong>jumlah host pada setiap subnet</strong>, <strong>rentang alamat host yang
                        valid</strong> pada setiap subnet, dan <strong><i>network</i></strong> serta <strong><i>broadcast
                            address</i></strong> pada setiap subnet.
                </li>
            </ul>

            <br>

            <strong class="highlight-title">2. Perhitungan Subnetting</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li>Perhitungan <i>subnetting</i> digunakan untuk menentukan jumlah subnet, jumlah host, dan pembagian
                    alamat <i>IP</i>.</li>
                <li>Rumus jumlah subnet: 2<sup>n</sup>, (n = bit yang dipinjam).</li>
                <li>Jumlah host: 2<sup>h</sup> − 2, (h = sisa bit host, dikurangi <i>network</i> &amp; <i>Broadcast</i>).
                </li>
                <li>Blok subnet: 256 - nilai oktet terakhir <i>Subnet mask</i>.</li>
                <li>Langkah: tentukan bit -&gt; hitung subnet &amp; host -&gt; tentukan <i>Subnet mask</i> -&gt; blok subnet
                    -&gt; tentukan network, host valid, dan <i>Broadcast</i>.</li>
                <li>Prefix memengaruhi kapasitas host (prefix kecil -&gt; host lebih banyak).</li>
            </ul>

            <br>

            <strong class="highlight-title">3. VLSM (<em>Variable Length Subnet Mask</em>)</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li>VLSM adalah teknik <i>subnetting</i> dengan panjang <i>Subnet mask</i> berbeda sesuai kebutuhan.
                    Digunakan untuk menghindari pemborosan <i>IP</i>.</li>
                <li>Alamat <i>IP</i> dialokasikan dimulai dari kebutuhan terbesar hingga semua subnet terpenuhi.</li>
                <li>Cocok untuk jaringan nyata dengan kebutuhan berbeda.</li>
            </ul>

        </div>
    </div>

    <div class="nav-bottom">
        <a href="/bab3/vlsm" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="#" class="nav-btn nav-next" onclick="lanjutRangkuman(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <script>

        fetch("/progres/buka/Subnetting/Rangkuman Bab 3");

        function lanjutRangkuman(e) {
            e.preventDefault();

            fetch("/progres/selesai/Subnetting/Rangkuman Bab 3", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(res => {
                    if (!res.ok) throw new Error();

                    window.location.href = "/bab3/petunjuk-kuis-bab3";
                })
                .catch(() => {
                    alert("Gagal menyimpan progres");
                });
        }
    </script>
@endsection