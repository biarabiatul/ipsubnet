<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kuis Bab 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --primary: #89471e;
            --bg: #f7f7f7;
            --card: #ffffff;
            --border: #e5e7eb;
        }

        body {
            margin: 0;
            font-family: 'Fira Sans', sans-serif;
            background: var(--bg);
        }

        /* =====================
   LAYOUT
===================== */
        .quiz-layout {
            display: flex;
            min-height: 100vh;
        }

        /* =====================
   SIDEBAR KUIS
===================== */
        .quiz-sidebar {
            width: 280px;
            background: #ffffff;
            padding: 24px;
            border-right: 1px solid var(--border);
        }

        .quiz-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 20px;
        }

        /* TIMER */
        .timer-box {
            background: #fef9f6;
            padding: 16px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            border: 1px solid #e7d9cc;
            font-weight: 600;
        }

        .timer-box span {
            color: #b91c1c;
            font-weight: 700;
        }

        /* NAVIGATION */
        .number-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .number-grid button {
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #d6c3b2;
            background: #ffffff;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
        }

        .number-grid button:hover {
            background: #f9f5f2;
        }

        .number-grid button.active {
            background: var(--primary);
            color: #ffffff;
            border: none;
        }

        /* LEGEND */
        .legend {
            font-size: 14px;
            color: #374151;
        }

        .legend div {
            margin-bottom: 6px;
        }

        .legend {
            font-size: 14px;
            color: #374151;
        }

        .legend div {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
        }

        .legend-box {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid #d6c3b2;
        }

        .legend-box.answered {
            background: #16a34a;
            /* hijau */
        }

        .legend-box.unanswered {
            background: #ffffff;
            /* putih */
        }

        .legend-box.doubt {
            background: #f59e0b;
            /* kuning */
        }

        /* =====================
   CONTENT AREA
===================== */
        .quiz-content {
            flex: 1;
            padding: 40px;
        }

        /* BOX SOAL */
        .question-box {
            background: #ffffff;
            padding: 24px;
            border-radius: 8px;
            border: 1px solid #d6c3b2;
            margin-bottom: 24px;
            line-height: 1.7;
        }

        /* OPTION */
        .option {
            display: block;
            background: #ffffff;
            padding: 14px 16px;
            border-radius: 8px;
            border: 1.5px solid #d6c3b2;
            margin-bottom: 12px;
            cursor: pointer;
            transition: 0.2s;
            font-weight: 500;
        }

        .option:hover {
            background: #f9f5f2;
        }

        /* ================================
   STYLE SOAL (SAMA SEPERTI AKTIVITAS)
================================ */

        /* BOX SOAL */
        .question-box {
            background: #f9f5f2;
            border: 1px solid #d6c3b2;
            border-radius: 8px;
            padding: 20px;
        }

        /* NOMOR SOAL */
        .question-number {
            font-size: 14px;
            font-weight: 600;
            color: #89471e;
            margin-bottom: 6px;
        }

        /* TEKS SOAL */
        .question-text {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 14px;
        }

        /* CONTAINER OPSI */
        .options {
            display: flex;
            flex-direction: column;
            gap: 1px;
            margin-top: 10px;
        }

        /* OPSI */
        .option {
            border: 1.5px solid #d6c3b2;
            border-radius: 6px;
            padding: 8px 12px;
            cursor: pointer;
            background: #ffffff;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
        }

        /* Hover */
        .option:hover {
            background: #f9f5f2;
        }

        /* Hide radio */
        .option input[type="radio"] {
            display: none;
        }

        /* Teks opsi */
        .option-text {
            font-size: 15px;
            color: #1f2937;
        }

        /* Saat dipilih */
        .option:has(input:checked) {
            background: #fef3c7;
            border-color: #f59e0b;
            font-weight: 600;
        }


        /* STYLE UMUM BUTTON */
        .nav-btn {
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .nav-bottom {
            position: relative;
            display: flex;
            align-items: center;
            margin-top: 28px;
        }

        /* SEBELUMNYA */
        .nav-prev {
            background: #6b7280;
            color: #ffffff;
        }

        .nav-prev:hover {
            background: #4b5563;
        }

        /* SELANJUTNYA */
        .nav-next {
            margin-left: auto;
            background: linear-gradient(135deg, #89471e, #b45309);
            color: #ffffff;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .nav-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* DISABLED */
        .nav-btn:disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
            box-shadow: none;
        }

        /* RAGU-RAGU */
        .nav-doubt {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            background: #f59e0b;
            color: #ffffff;
        }

        .nav-doubt:hover {
            background: #d97706;
        }

        /* =====================
   BUTTON SELESAI (SIDEBAR)
===================== */

        .finish-sidebar-btn {
            width: 100%;
            margin-top: 20px;
            padding: 12px 0;
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .finish-sidebar-btn:hover {
            box-shadow: 0 10px 18px rgba(0, 0, 0, 0.2);
        }

        .finish-sidebar-btn:active {
            transform: scale(0.97);
        }

        /* =====================
   STATUS NOMOR SOAL
===================== */

        /* default (belum dijawab) */
        .number-grid button {
            background: #ffffff;
            border: 1px solid #d6c3b2;
        }

        /* sudah dijawab */
        .number-grid button.answered {
            background: #16a34a;
            color: #ffffff;
            border: none;
        }

        /* ragu-ragu */
        .number-grid button.doubt {
            background: #f59e0b;
            color: #ffffff;
            border: none;
        }
    </style>
</head>

<body>

    <div class="quiz-layout">

        <!-- SIDEBAR -->
        <div class="quiz-sidebar">

            <div class="quiz-title">
                <i class="bi bi-patch-question"></i> Kuis Bab 3
            </div>

            <div class="timer-box">
                Sisa Waktu: <span>15:00</span>
            </div>

            <div class="number-grid">
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>
                <button>6</button>
                <button>7</button>
                <button>8</button>
                <button>9</button>
                <button>10</button>
            </div>

            Keterangan :

            <br><br>

            <div class="legend">
                <div><span class="legend-box answered"></span> Sudah dijawab</div>
                <div><span class="legend-box unanswered"></span> Belum dijawab</div>
                <div><span class="legend-box doubt"></span> Ragu-ragu</div>
            </div>

            <button class="finish-sidebar-btn">
                Selesai
            </button>

        </div>

        <!-- CONTENT -->
        <div class="quiz-content">
            <div class="question-box"></div>

            <div class="nav-bottom">
                <button class="nav-btn nav-prev">
                    Sebelumnya
                </button>

                <button class="nav-btn nav-doubt">
                    Ragu-ragu
                </button>

                <button class="nav-btn nav-next">
                    Selanjutnya
                </button>
            </div>

        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let soalList = [];
    let waktu = 0;
    let startTime = null;

    fetch('/kuis/bab3')
        .then(res => res.json())
        .then(data => {
            soalList = data.soal;
            waktu = data.durasi * 60;

            userAnswers = Array(soalList.length).fill(null);

            startTime = new Date().toISOString(); // ✅ TAMBAH INI

            startTimer();
            renderQuestion();
        });

    const quizContainer = document.querySelector(".question-box");
    const numberButtons = document.querySelectorAll(".number-grid button");
    const doubtBtn = document.querySelector(".nav-doubt");
    const nextBtn = document.querySelector(".nav-next");
    const prevBtn = document.querySelector(".nav-prev");

    let currentQuestion = 0;
    let userAnswers = [];

    function renderQuestion() {
        const data = soalList[currentQuestion];

        // reset active semua nomor
        numberButtons.forEach(btn => btn.classList.remove("active"));

        // aktifkan nomor yang sedang dibuka
        numberButtons[currentQuestion].classList.add("active");

        let html = `
        <p class="question-number">
            Soal ${currentQuestion + 1} dari ${soalList.length}
        </p>
        <div class="question-text">${data.question}</div>
        <div class="options">
    `;

        Object.values(data.options).forEach((opt, i) => {
            const checked = userAnswers[currentQuestion] === i ? "checked" : "";

            html += `
            <label class="option">
                <input type="radio" name="jawaban" value="${i}" ${checked}>
                <span class="option-text">
                    ${String.fromCharCode(65 + i)}. ${opt}
                </span>
            </label>
        `;
        });

        html += `</div>`;
        quizContainer.innerHTML = html;

        document.querySelectorAll('input[name="jawaban"]').forEach(radio => {
            radio.addEventListener("change", pilihJawaban);
        });
    }

    function pilihJawaban(e) {
        userAnswers[currentQuestion] = parseInt(e.target.value);

        numberButtons[currentQuestion].classList.remove("doubt");
        numberButtons[currentQuestion].classList.add("answered");
    }

    doubtBtn.addEventListener("click", function () {
        const currentBtn = numberButtons[currentQuestion];

        // hanya bisa ragu kalau sudah dijawab
        if (userAnswers[currentQuestion] === null) return;

        if (currentBtn.classList.contains("doubt")) {
            // kalau sudah kuning → balik jadi hijau
            currentBtn.classList.remove("doubt");
            currentBtn.classList.add("answered");
        } else {
            // kalau hijau → jadi kuning
            currentBtn.classList.remove("answered");
            currentBtn.classList.add("doubt");
        }
    });

    nextBtn.addEventListener("click", function () {
        if (currentQuestion < soalList.length - 1) {
            currentQuestion++;
            renderQuestion();
        }
    });

    prevBtn.addEventListener("click", function () {
        if (currentQuestion > 0) {
            currentQuestion--;
            renderQuestion();
        }
    });

    numberButtons.forEach((btn, index) => {
        btn.addEventListener("click", function () {
            currentQuestion = index;
            renderQuestion();
        });
    });

    const finishBtn = document.querySelector(".finish-sidebar-btn");

    finishBtn.addEventListener("click", function () {

        const belumJawab = userAnswers.filter(j => j === null).length;

        let pesan = "Apakah Anda yakin ingin menyelesaikan ujian?";

        if (belumJawab > 0) {
            pesan = `Masih ada ${belumJawab} soal yang belum dijawab.\nTetap ingin selesai?`;
        }

        Swal.fire({
            title: "Hentikan Ujian?",
            text: pesan,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, selesai",
            cancelButtonText: "Batal",
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280'
        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({
                    icon: "success",
                    title: "Ujian selesai",
                    text: "Jawaban Anda sedang diproses...",
                    timer: 1500,
                    showConfirmButton: false
                });

                setTimeout(() => {
                    submitQuiz();
                }, 1000);
            }

        });
    });

    function startTimer() {
        const timerEl = document.querySelector(".timer-box span");

        const interval = setInterval(() => {

            let minutes = Math.floor(waktu / 60);
            let seconds = waktu % 60;

            timerEl.textContent =
                String(minutes).padStart(2, '0') + ':' +
                String(seconds).padStart(2, '0');

            waktu--;

            if (waktu < 0) {
                clearInterval(interval);

                alert("Waktu habis!");
                window.location.href = "/bab3/petunjuk-kuis-bab3";
            }

        }, 1000);
    }

    async function submitQuiz() {

        let answers = [];

        soalList.forEach((soal, i) => {
            answers.push({
                soal_id: soal.id,
                jawaban: userAnswers[i] !== null
                    ? String.fromCharCode(97 + userAnswers[i]) // a,b,c,d,e
                    : null
            });
        });

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const res = await fetch("/kuis/submit", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify({
                kuis_id: 3,
                answers: answers,
                start_time: startTime
            })
        });

        const data = await res.json();

        window.location.href = data.redirect;
    }
</script>

</html>