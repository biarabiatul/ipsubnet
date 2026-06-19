@extends('landingpage.layout')

@section('title', 'Daftar Materi')

<title>Daftar Materi</title>

@section('content')

<style>
/* ===== DAFTAR MATERI ===== */
.materi-section {
    padding-top: 40px;
    padding-bottom: 60px;
}

.materi-title {
    font-weight: 800;
    color: #111827;
    margin-bottom: 10px;
}

.materi-desc {
    color: #585978;
    max-width: 700px;
    line-height: 1.7;
    margin-bottom: 40px;
}

/* BOX BAB */
.bab-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 28px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.05);
    border: 1.5px solid #d1d5db;
    margin-bottom: 30px;
    transition: 0.3s ease;
}

.bab-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 35px rgba(0,0,0,0.08);
}

.bab-title {
    font-weight: 800;
    color: #89471e;
    margin-bottom: 15px;
    font-size: 23px;
}

.submateri-list {
    padding-left: 18px;
}

.submateri-list li {
    margin-bottom: 8px;
    font-size: 14px;
    color: #374151;
}

.highlight-box {
    background: #f9f5f2;
    border-left: 5px solid #89471e;
}

.materi-note {
    background: transparent;
    padding: 8px 0;
    font-size: 12px;
    color: #6b7280;
}

</style>

<section class="container materi-section">

    <div class="row">

        <!-- BAB I -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="bab-card h-100">
                <h4 class="bab-title">Bab 1 – Sistem Bilangan</h4>
                <ul class="submateri-list">
                    <li>Sistem Bilangan Biner</li>
                    <li>Sistem Bilangan Desimal</li>
                </ul>
            </div>
        </div>

        <!-- BAB II -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="bab-card h-100">
                <h4 class="bab-title">Bab 2 – IP Addressing</h4>
                <ul class="submateri-list">
                    <li>Apa Itu IP Address?</li>
                    <li>Kelas IP Address</li>
                    <li>Network ID dan Host ID</li>
                    <li>IP Publik dan Privat</li>
                    <li>Subnet Mask</li>
                    <li>CIDR (<em>Classless Inter-Domain Routing</em>)</li>
                </ul>
            </div>
        </div>

        <!-- BAB III -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="bab-card h-100">
                <h4 class="bab-title">Bab 3 – Subnetting</h4>
                <ul class="submateri-list">
                    <li>Pengenalan Subnetting</li>
                    <li>Perhitungan Subnetting</li>
                    <li>VLSM (<em>Variable Length Subnet Mask</em>)</li>
                </ul>
            </div>
        </div>

    </div>

<div class="materi-note">
    <strong>Penjelasan:</strong><br>
    Bab 1 merupakan pengantar yang membahas konsep dasar sebagai fondasi pemahaman. Bab 2 dan Bab 3 membahas konsep IP Addressing dan teknik Subnetting secara lebih mendalam.
</div>

</section>

@endsection
