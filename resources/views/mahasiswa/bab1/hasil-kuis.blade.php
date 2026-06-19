<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Kuis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Fira Sans', sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        /* CARD */

        .card {
            background: white;
            padding: 45px;
            border-radius: 14px;
            text-align: center;
            width: 520px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        /* TITLE */

        h2 {
            margin-bottom: 6px;
        }

        /* NILAI */

        .nilai {
            font-size: 70px;
            font-weight: 800;
            color: #dc2626;
            margin: 10px 0 25px 0;
        }

        /* STATISTIK */

        .stats {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-box {
            flex: 1;
            background: #f9fafb;
            border-radius: 10px;
            padding: 16px;
            text-align: center;
        }

        .stat-box i {
            font-size: 18px;
            margin-bottom: 6px;
        }

        .stat-box span {
            font-size: 22px;
            font-weight: 700;
            display: block;
        }

        .stat-box p {
            margin: 0;
            font-size: 13px;
            color: #6b7280;
        }

        /* warna */

        .stat-box.benar i {
            color: #16a34a;
        }

        .stat-box.salah i {
            color: #dc2626;
        }

        /* ALERT */

        .alert {
            background: #fde8e8;
            color: #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            background: #e7f8ef;
            color: #065f46;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* BUTTON */

        .actions {
            margin-top: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 11px 20px;
            margin: 6px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        /* primary */

        .btn-primary {
            background: #89471e;
        }

        .btn-primary:hover {
            background: #6f3817;
        }

        /* secondary */

        .btn-secondary {
            background: #4b5563;
        }

        .btn-secondary:hover {
            background: #374151;
        }

        /* review */

        .btn-review {
            background: #2563eb;
        }

        .btn-review:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

    <div class="card">

        <h2>{{ $kuis->judul }} Telah Selesai</h2>

        @php

            $kkm = $hasil->id_kuis == 4
                ? auth()->user()->kelas->kkm_evaluasi
                : auth()->user()->kelas->kkm_kuis;

            // cek pernah remedial sebelumnya
            $pernahRemedial = \App\Models\KuisHasil::where('id_pengguna', $hasil->id_pengguna)
                ->where('id_kuis', $hasil->id_kuis)
                ->where('created_at', '<', $hasil->created_at)
                ->where('nilai_akhir', '<', $kkm)
                ->exists();

            // default nilai asli
            $nilaiTampil = $hasil->nilai_akhir;

            // kalau remedial lalu lulus
            if ($pernahRemedial && $hasil->nilai_akhir >= $kkm) {

                $nilaiTampil = $kkm;

            }

        @endphp

        <div class="nilai">
            {{ round($nilaiTampil) }}
        </div>

        <div class="stats">

            <div class="stat-box benar">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ $hasil->total_benar }}</span>
                <p>Jawaban Benar</p>
            </div>

            <div class="stat-box salah">
                <i class="bi bi-x-circle-fill"></i>
                <span>{{ $hasil->total_salah }}</span>
                <p>Jawaban Salah</p>
            </div>

        </div>

        @php

            $kkm = $hasil->id_kuis == 4
                ? auth()->user()->kelas->kkm_evaluasi
                : auth()->user()->kelas->kkm_kuis;

        @endphp

        @if($nilaiTampil < $kkm)

            <div class="alert">
                Maaf, nilai kamu belum memenuhi KKM. Progres belum dapat ditambahkan.<br>
                Silakan pelajari kembali materi dan coba lagi.
            </div>

            <div class="actions">

                <a href="{{ $hasil->id_kuis == 1 ? '/bab1/kuis-bab1' :
            ($hasil->id_kuis == 2 ? '/bab2/kuis-bab2' :
                ($hasil->id_kuis == 3 ? '/bab3/kuis-bab3' : '/mulai-evaluasi'))}}" class="btn btn-primary">
                    <i class="bi bi-arrow-repeat"></i> Coba Lagi
                </a>

                <a href="{{ $hasil->id_kuis == 1 ? '/bab1/biner-desimal' :
            ($hasil->id_kuis == 2 ? '/bab2/ip-addressing' :
                ($hasil->id_kuis == 3 ? '/bab3/subnetting' : '/dashboard'))}}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Materi
                </a>

                <a href="/kuis/review/{{ $hasil->id }}" class="btn btn-review">
                    <i class="bi bi-search"></i> Review Jawaban
                </a>

            </div>

        @else

            @php
                $nilaiAsli = ($hasil->total_benar / ($hasil->total_benar + $hasil->total_salah)) * 100;
            @endphp

            <div class="success">

                <strong>Selamat!</strong> Kamu bisa melanjutkan ke materi berikutnya.

                @if(round($nilaiAsli) > round($nilaiTampil))

                    <br><br>

                    Karena ini merupakan pengerjaan remedial, maka nilai akhir disesuaikan
                    dengan batas KKM yaitu <strong>{{ $kkm }}</strong>.

                @endif

            </div>

            <div class="actions">

                <a href="{{ $hasil->id_kuis == 1 ? '/bab2/ip-addressing' : ($hasil->id_kuis == 2 ? '/bab3/subnetting' : '/dashboard')}}"
                    class="btn btn-primary">
                    <i class="bi bi-arrow-right"></i> Lanjut Materi
                </a>

                <a href="/kuis/review/{{ $hasil->id }}" class="btn btn-review">
                    <i class="bi bi-search"></i> Review Jawaban
                </a>

            </div>
        @endif
    </div>
</body>

</html>