@extends('landingpage.layout')

@section('title', 'Tentang Media')

<title>Tentang</title>

@section('footer-class', 'footer-naik')

@section('content')

    <style>
        /* ===== SECTION ===== */
        .tentang-section {
            padding-top: 40px;
            padding-bottom: 60px;
        }

        /* ===== CARD ===== */
        .info-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.07);
            overflow: hidden;
            border: 1.5px solid #d1d5db;
        }

        /* ===== HEADER STRIP ===== */
        .info-header {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(6px);
            color: #89471e;
            padding: 14px 25px;
            font-weight: 700;
            font-size: 19px;
            border-bottom: 1px solid #e5e7eb;
        }

        /* ===== BODY ===== */
        .info-body {
            padding: 20px 40px;
            min-height: 420px;
        }

        .info-body p {
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 20px;
            text-align: justify;
        }

        /* ===== JUDUL BESAR ===== */
        .info-title {
            font-weight: 800;
            text-align: center;
            font-size: 24px;
            margin: 20px 0 30px;
            color: #111827;
        }

        /* ===== TABLE STYLE ===== */
        .info-table {
            width: 100%;
        }

        .info-table td {
            padding: 8px 0;
            font-size: 14px;
            color: #374151;
        }

        .info-table td:first-child {
            width: 180px;
            font-weight: 600;
            color: #111827;
        }

        .info-table td:nth-child(2) {
            width: 15px;
        }

        .header-switch {
            font-size: 18px;
            font-weight: 600;
        }

        .switch-link {
            cursor: pointer;
            color: #6b7280;
            transition: 0.2s;
        }

        .switch-link.active {
            color: #89471e;
        }

        .switch-link:hover {
            color: #89471e;
        }

        .divider {
            margin: 0 6px;
            color: #9ca3af;
        }

        .footer-naik {
            margin-top: -30px;
        }
    </style>

    <section class="container tentang-section">

        <div class="info-card">

            <div class="info-header d-flex justify-content-between align-items-center">
                <div class="header-switch">
                    <span class="switch-link active" onclick="showTab('info', this)">Informasi Media</span>
                    <span class="divider">|</span>
                    <span class="switch-link" onclick="showTab('pustaka', this)">Daftar Pustaka</span>
                </div>
            </div>

            <div class="info-body">

                <!-- INFORMASI MEDIA -->
                <div id="info-content">
                    <p>
                        Media pembelajaran ini dikembangkan sebagai bagian dari
                        penyelesaian program Strata-1 Pendidikan Komputer dengan judul:
                    </p>

                    <div class="info-title">
                        PENGEMBANGAN MEDIA PEMBELAJARAN INTERAKTIF MENGGUNAKAN METODE DRILL AND PRACTICE
                        PADA MATERI <em>IP ADDRESSING</em> DAN <em>SUBNETTING</em>
                    </div>

                    <table class="info-table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>Rabiatul Adawiyah</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>2210131220011@mhs.ulm.ac.id</td>
                        </tr>
                        <tr>
                            <td>Dosen Pembimbing 1</td>
                            <td>:</td>
                            <td>Nuruddin Wiranda, S.Kom., M.Cs.</td>
                        </tr>
                        <tr>
                            <td>Dosen Pembimbing 2</td>
                            <td>:</td>
                            <td>Rizky Pamuji, S.Kom., M.Kom.</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td>S-1 Pendidikan Komputer</td>
                        </tr>
                        <tr>
                            <td>Fakultas</td>
                            <td>:</td>
                            <td>Fakultas Keguruan dan Ilmu Pendidikan (FKIP)</td>
                        </tr>
                        <tr>
                            <td>Instansi</td>
                            <td>:</td>
                            <td>Universitas Lambung Mangkurat</td>
                        </tr>
                    </table>

                </div>

                <!-- DAFPUS -->
                <div id="pustaka-content" style="display:none;">
                    <ul style="padding-left: 20px; color:#4b5563; line-height:1.9; font-size:15px;">

                        <li>
                            Cisco Systems, Inc. (2003).
                            <em>CCNA 1 and 2 Companion Guide</em> (3rd ed.).
                            Cisco Press.
                            <em>(Cisco Networking Academy Program)</em>.
                        </li>

                        <li>
                            <em>Ilustrasi pada media pembelajaran diadaptasi dari</em>
                            <a href="https://storyset.com/work" target="_blank">
                                storyset.com/work
                            </a>.
                        </li>

                        <li>
                            <em>IP Addressing and Subnetting Workbook</em>. (n.d.).
                            <em>Instructor’s edition</em> (Version 1.5).
                            Dari
                            <a href="https://dc.telkomuniversity.ac.id/wp-content/uploads/2014/09/49445184-IP-Addressing-and-Subnetting-Workbook-Instructors-Version-1-5.pdf"
                                target="_blank">
                                https://dc.telkomuniversity.ac.id/wp-content/uploads/2014/09/49445184-IP-Addressing-and-Subnetting-Workbook-Instructors-Version-1-5.pdf
                            </a>
                        </li>

                        <li>
                            Kurose, J. F., &amp; Ross, K. W. (2021).
                            <em>Computer networking: A top-down approach</em> (8th ed.).
                            Pearson.
                        </li>

                        <li>
                            MADCOMS. (2015).
                            <em>Membangun Sistem Jaringan Komputer untuk Pemula</em>.
                            ANDI Yogyakarta.
                        </li>

                        <li>
                            Muchlas. (2020).
                            <em>Buku Ajar Teknik Digital</em>.
                            Yogyakarta: Universitas Ahmad Dahlan.
                        </li>

                        <li>
                            Najwaini, E. (2022).
                            <em>Jaringan komputer</em>.
                            Banjarmasin: Poliban Press.
                        </li>

                    </ul>
                </div>

            </div>
        </div>

    </section>

    <script>
        function showTab(tab, el) {
            document.getElementById('info-content').style.display = 'none';
            document.getElementById('pustaka-content').style.display = 'none';

            document.querySelectorAll('.switch-link').forEach(link =>
                link.classList.remove('active')
            );

            if (tab === 'info') {
                document.getElementById('info-content').style.display = 'block';
            } else {
                document.getElementById('pustaka-content').style.display = 'block';
            }

            el.classList.add('active');
        }
    </script>

@endsection