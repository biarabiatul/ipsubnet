@extends('mahasiswa.mahasiswa')

@section('title', 'Bab II - Rangkuman')

<title>BAB 2 : IP Addressing</title>

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

    <!-- rangkuman -->
    <div class="materi-box">
        <div class="box-header">
            <div class="icon-circle">
                <i class="bi bi-journal-text"></i>
            </div>
            Rangkuman
        </div>

        <div class="box-body">

            <strong class="highlight-title">1. Apa Itu IP Address</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li><i>IP Address</i> adalah <strong>alamat unik</strong> yang dimiliki setiap perangkat dalam jaringan.
                </li>
                <li>Digunakan untuk <strong>identifikasi dan komunikasi antar perangkat</strong>.</li>
                <li>Bekerja menggunakan <strong>protokol <i>TCP/IP</i></strong>.</li>
                <li>Terdiri dari dua bagian yaitu <i>network</i> dan <i>host</i>.</li>
                <li><i>IPv4</i> terdiri dari 32 <i>bit</i> (4 oktet) dengan nilai 0–255.</li>
                <li>Jumlah maksimum <i>IPv4</i> adalah 2<sup>32</sup> atau <strong>4.294.967.296 alamat</strong>.</li>
            </ul>

            <br>

            <strong class="highlight-title">2. Kelas IP Address</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li>Kelas <i>IP</i> digunakan untuk mengelompokkan alamat <i>IP</i> berdasarkan ukuran jaringan.</li>
                <li><i>IP Address</i> dibagi menjadi beberapa kelas, yaitu kelas A hingga E.</li>
                <li>Penentuan kelas <i>IP</i> didasarkan pada nilai <strong>oktet (<i>byte</i>) pertama</strong>.</li>
                <li>Setiap kelas memiliki ukuran jaringan dan jumlah <i>host</i> yang berbeda.</li>
            </ul>

            <br>

            <strong class="highlight-title">3. <i>Network ID</i> dan <i>Host ID</i></strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li><i>IP Address</i> terdiri dari dua bagian, yaitu <strong><i>Network ID</i></strong> dan <strong><i>Host
                            ID</i></strong>.</li>
                <li><strong><i>Network ID</i></strong> menunjukkan identitas jaringan, sedangkan <strong><i>Host
                            ID</i></strong> menunjukkan identitas perangkat dalam jaringan.</li>
                <li>Dua <i>IP Address</i> berada dalam satu jaringan jika memiliki <strong><i>Network ID</i> yang
                        sama</strong>.</li>
                <li><strong><i>Host ID</i></strong> harus bersifat unik dalam satu jaringan.</li>
                <li>Dalam setiap jaringan terdapat alamat khusus yang tidak dapat digunakan sebagai <i>host</i>, yaitu
                    <i>network address</i> dan <i>broadcast address</i>.
                </li>
            </ul>

            <br>

            <strong class="highlight-title">4. IP Publik dan IP Privat</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li><i>IP Address</i> dibedakan menjadi <i>IP</i> Publik dan <i>IP</i> Privat.</li>
                <li><i>IP</i> Publik digunakan pada jaringan internet dan bersifat global (tidak boleh sama).</li>
                <li><i>IP</i> Privat digunakan pada jaringan lokal (<i>LAN</i>) dan tidak dapat diakses secara langsung dari
                    internet. </li>
                <li><i>IP</i> Privat dapat mengakses internet melalui mekanisme <i>NAT</i> (<i>Network Address
                        Translation</i>).</li>
            </ul>

            <br>

            <strong class="highlight-title">5. Subnet Mask</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li><i>Subnet mask</i> digunakan untuk memisahkan bagian <strong><i>network</i></strong> dan <strong><i>host</i></strong> pada suatu <i>IP
                        Address</i>.</li>
                <li><i>Bit</i> bernilai 1 menunjukkan bagian <i>network</i>, sedangkan <i>bit</i> bernilai 0 menunjukkan
                    bagian <i>host</i>.</li>
                <li>Setiap kelas <i>IP</i> memiliki <i>subnet mask</i> default masing-masing.</li>
            </ul>

            <br>

            <strong class="highlight-title">6. CIDR (<i>Classless Inter-Domain Routing</i>)</strong>
            <ul style="margin-left:18px; margin-top:8px;">
                <li>CIDR menggunakan format penulisan IP dengan <i>prefix</i> (/n).</li>
                <li>Angka pada CIDR menunjukkan jumlah <i>bit</i> yang digunakan sebagai <i>Network ID</i>.</li>
                <li>CIDR digunakan oleh <i>Internet Service Provider</i> (ISP) untuk mengalokasikan alamat IP.</li>
                <li>CIDR memungkinkan pembagian alamat IP menjadi lebih efisien.</li>
            </ul>

        </div>
    </div>

    <div class="nav-bottom">
        <a href="/bab2/cidr" class="nav-btn nav-prev">
            Halaman Sebelumnya
        </a>

        <a href="#" class="nav-btn nav-next" onclick="lanjutRangkuman(event)">
            Halaman Selanjutnya
        </a>
    </div>

    <script>
        fetch("/progres/buka/IP Addressing/Rangkuman Bab 2");

        function lanjutRangkuman(e) {
            e.preventDefault();

            fetch("/progres/selesai/IP Addressing/Rangkuman Bab 2", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
                .then(res => {
                    if (!res.ok) throw new Error();

                    window.location.href = "/bab2/petunjuk-kuis-bab2";
                })
                .catch(() => {
                    alert("Gagal menyimpan progres");
                });
        }
    </script>

@endsection