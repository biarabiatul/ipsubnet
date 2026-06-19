<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Review Jawaban</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Fira Sans', sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 40px 20px;
        }

        /* CONTAINER */

        .container {
            width: 100%;
            max-width: 1150px;
            margin: auto;
        }

        /* HEADER */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 26px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* BUTTON */

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-back {
            background: #4b5563;
            color: white;
        }

        .btn-back:hover {
            background: #374151;
        }

        /* CARD SOAL */

        .card {
            background: white;
            border-radius: 14px;
            padding: 26px;
            margin-bottom: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        /* NOMOR SOAL */

        .question-number {
            font-size: 13px;
            color: #6b7280;
            font-weight: 600;
        }

        /* TEKS SOAL */

        .question {
            font-size: 17px;
            font-weight: 600;
            margin: 10px 0 20px 0;
        }

        /* LABEL */

        .label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        /* OPSI */

        .option {
            padding: 14px 16px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            font-size: 15px;
        }

        /* USER ANSWER */

        .user {
            background: #fff7ed;
            border: 1px solid #f59e0b;
        }

        /* STATUS */

        .status {
            margin-top: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
        }

        .status.benar {
            color: #16a34a;
        }

        .status.salah {
            color: #dc2626;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="header">

            <div class="title">
                <i class="bi bi-journal-check"></i>
                Review Jawaban
            </div>

            <a href="/kuis/hasil/{{ $hasil->id }}" class="btn btn-back">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

        </div>

        @foreach($review as $item)

            @php
                $opsi = json_decode($item->pilgan_opsi, true);
            @endphp

            <div class="card">

                <div class="question-number">
                    Soal {{ $loop->iteration }}
                </div>

                <div class="question">
                    {!! $item->soal !!}
                </div>

                <div class="label">Jawaban kamu</div>

                <div class="option user">
                    {{ strtoupper($item->jawaban_pengguna) }}.
                    {{ $opsi[$item->jawaban_pengguna] ?? '' }}
                </div>

                <div class="status {{ $item->status }}">

                    @if($item->status == 'benar')

                        <i class="bi bi-check-circle-fill"></i>
                        Jawaban benar

                    @else

                        <i class="bi bi-x-circle-fill"></i>
                        Jawaban salah

                    @endif

                </div>

            </div>

        @endforeach

    </div>

</body>

</html>