@extends('dosen.dosen')

@section('title', 'Data Kelas')

<title>Manajemen Kelas</title>

@section('content')

    <style>
        .page-header-box {
            background: #ffffff;
            border-radius: 18px;
            padding: 22px 26px;
            margin-bottom: 26px;
            margin-top: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header-left {
            display: flex;
            flex-direction: column;
        }

        .page-title {
            font-size: 34px;
            font-weight: 800;
            color: #92400e;
            margin-bottom: 6px;
        }

        .page-sub {
            font-size: 16px;
            color: #64748b;
        }

        /* ===== GRID ===== */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        /* ===== CARD ===== */
        .card {
            background: #ffffff;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            transition: 0.25s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.08);
        }

        /* ===== HEADER CARD ===== */
        .class-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .class-title {
            font-weight: 700;
            font-size: 18px;
            color: #1f2937;
        }

        .class-badge {
            background: #ecfdf5;
            color: #15803d;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 999px;
        }

        /* ===== TOKEN BOX ===== */
        .token-box {
            background: #f8fafc;
            padding: 12px 14px;
            border-radius: 10px;
            margin-top: 10px;
            border: 1px dashed #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .token-text {
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 14px;
        }

        .kkm-wrapper {
            margin-top: 14px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .kkm-badge {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #334155;
            padding: 8px 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        .kkm-badge span {
            color: #b45309;
            font-weight: 800;
        }

        .btn-kkm {
            flex: 1;
            background: #fef3c7;
            color: #b45309;
            border: 1px solid #fde68a;
            padding: 9px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-kkm:hover {
            background: #fde68a;
        }

        /* ===== BUTTON ===== */
        .btn-detail {
            width: 100%;
            background: #b45309;
            color: #ffffff;
            border: none;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            margin-top: 18px;
            transition: 0.2s ease;
        }

        .btn-detail:hover {
            background: #92400e;
        }

        /* ===== BUTTON TAMBAH KELAS ===== */
        .btn-add-class {
            background: #3b82f6;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-add-class:hover {
            background: #2563eb;
        }

        /* ===== BUTTON TAMBAH TOKEN ===== */
        .btn-join-class {
            background: #10b981;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-join-class:hover {
            background: #059669;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 18px;
        }

        .delete-form {
            grid-column: span 2;
        }

        .btn-delete {
            width: 100%;
        }

        /* EDIT */
        .btn-edit {
            flex: 1;
            background: #e0edff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            border: none;
            padding: 9px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-edit:hover {
            background: #bfdbfe;
        }

        /* DELETE */
        .btn-delete {
            flex: 1;
            background: #fee2e2;
            color: #dc2626;
            border: 1px solid #fecaca;
            border: none;
            padding: 9px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        .btn-edit,
        .btn-kkm,
        .btn-delete {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        /* ===== COPY BUTTON ===== */
        .copy-btn {
            position: relative;
            background: #6b7280;
            color: #ffffff;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .copy-btn:hover {
            background: #4b5563;
        }

        /* ===== TOOLTIP ===== */
        .tooltip-text {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            bottom: 130%;
            left: 50%;
            transform: translateX(-50%);
            background: #111827;
            color: #ffffff;
            font-size: 12px;
            padding: 5px 8px;
            border-radius: 6px;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .copy-btn:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        /* ===== MODAL ===== */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .modal-box {
            background: #ffffff;
            width: 500px;
            max-width: 50%;
            border-radius: 14px;
            overflow: hidden;
            animation: fadeIn 0.2s ease;
        }

        /* header */
        .modal-header {
            padding: 16px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 18px;
        }

        .close-btn {
            cursor: pointer;
            font-size: 18px;
            color: #6b7280;
        }

        /* body */
        .modal-body {
            padding: 18px 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .modal-body label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
        }

        .modal-body input,
        .modal-body select,
        .modal-body textarea {
            padding: 8px 10px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        .modal-body textarea {
            resize: none;
            height: 70px;
        }

        /* footer */
        .modal-footer {
            padding: 14px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            border-top: 1px solid #eee;
        }

        .btn-cancel {
            background: #6b7280;
            color: #fff;
            border: none;
            padding: 7px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-save {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 7px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #1e4ed8;
        }

        /* animasi */
        @keyframes fadeIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .btn-add-class,
        .btn-join-class,
        .btn-edit,
        .btn-delete,
        .btn-save,
        .btn-cancel {
            font-family: 'Fira Sans', sans-serif;
        }
    </style>


    <div class="page-header-box">

        <div class="page-header-left">
            <div class="page-title">Manajemen Kelas</div>
            <div class="page-sub">
                Kelola kelas dan token untuk mahasiswa.
            </div>
        </div>

        <div style="display:flex; gap:10px;">
            <button type="button" class="btn-join-class" onclick="openJoinModal()">
                <i class="bi bi-box-arrow-in-right"></i>
                Tambah Token
            </button>

            <button type="button" class="btn-add-class" onclick="openModal()">
                <i class="bi bi-plus-circle"></i>
                Tambah Kelas
            </button>
        </div>

    </div>

    <!-- MODAL OVERLAY -->
    <div id="modalOverlay" class="modal-overlay">
        <div class="modal-box">

            <!-- HEADER -->
            <div class="modal-header">
                <h3>Tambah Kelas Baru</h3>
                <span class="close-btn" onclick="closeModal()">✕</span>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('kelas.store') }}">
                @csrf

                <!-- BODY -->
                <div class="modal-body">

                    <label>Nama Kelas</label>
                    <input type="text" name="nama_kelas" placeholder="Contoh: TI-3A" required>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal()">
                        Batal
                    </button>

                    <button type="submit" class="btn-save">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- MODAL EDIT -->
    <div id="editModal" class="modal-overlay">
        <div class="modal-box">

            <div class="modal-header">
                <h3>Edit Kelas</h3>
                <span class="close-btn" onclick="closeEditModal()">✕</span>
            </div>

            <!-- FORM -->
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <label>Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="editNamaKelas" required>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeEditModal()">
                        Batal
                    </button>

                    <button type="submit" class="btn-save">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT KKM -->
    <div id="kkmModal" class="modal-overlay">
        <div class="modal-box">

            <div class="modal-header">
                <h3>Edit KKM</h3>
                <span class="close-btn" onclick="closeKKMModal()">✕</span>
            </div>

            <!-- FORM -->
            <form method="POST" id="kkmForm">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <label>KKM Kuis</label>

                    <input type="number" name="kkm_kuis" id="editKKMKuis" min="0" max="100" required>

                    <label>KKM Evaluasi</label>

                    <input type="number" name="kkm_evaluasi" id="editKKMEvaluasi" min="0" max="100" required>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn-cancel" onclick="closeKKMModal()">

                        Batal

                    </button>

                    <button type="submit" class="btn-save">
                        Simpan KKM
                    </button>

                </div>

            </form>

        </div>
    </div>

    <!-- MODAL TAMBAH TOKEN -->
    <div id="joinModal" class="modal-overlay">
        <div class="modal-box">

            <div class="modal-header">
                <h3>Tambah Token</h3>
                <span class="close-btn" onclick="closeJoinModal()">✕</span>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('kelas.join') }}">
                @csrf

                <div class="modal-body">

                    <label>Token Kelas</label>
                    <input type="text" name="token" placeholder="Masukkan token kelas" required>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeJoinModal()">
                        Batal
                    </button>

                    <button type="submit" class="btn-save">
                        Tambahkan
                    </button>
                </div>

            </form>

        </div>
    </div>

    <div class="dashboard-grid">

        @forelse($kelas as $item)
            <div class="card">
                <div class="class-header">
                    <div class="class-title">{{ $item->nama_kelas }}</div>
                    <div style="display:flex; gap:6px;">
                        <div class="class-badge">
                            {{ $item->mahasiswa_count }} Mahasiswa
                        </div>

                        <div class="class-badge" style="background:#eff6ff; color:#2563eb;">
                            {{ $item->dosen_count }} Dosen
                        </div>
                    </div>
                </div>

                <small style="color:#6b7280;">Token Kelas</small>

                <div class="token-box">
                    <span class="token-text" id="token{{ $item->id }}">
                        {{ $item->token }}
                    </span>

                    <button class="copy-btn" onclick="copyToken('token{{ $item->id }}', this)">
                        Salin
                        <span class="tooltip-text">Salin token</span>
                    </button>
                </div>

                <div class="kkm-wrapper">

                    <div class="kkm-badge">
                        KKM Kuis:
                        <span>{{ $item->kkm_kuis }}</span>
                    </div>

                    <div class="kkm-badge">
                        KKM Evaluasi:
                        <span>{{ $item->kkm_evaluasi }}</span>
                    </div>

                </div>

                <div class="action-buttons">

                    <button class="btn-edit" onclick="openEditModal({{ $item->id }}, '{{ $item->nama_kelas }}')">
                        <i class="bi bi-pencil-square"></i>
                        Edit Kelas
                    </button>

                    <button class="btn-kkm" onclick="openKKMModal({{ $item->id }}, {{ $item->kkm_kuis }}, {{ $item->kkm_evaluasi }})">
                        <i class="bi bi-sliders"></i>
                        Edit KKM
                    </button>

                    <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" class="delete-form">

                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn-delete" onclick="confirmDelete(this)">
                            <i class="bi bi-trash3"></i>
                            Hapus Kelas
                        </button>

                    </form>

                </div>
            </div>

        @empty
            <div
                style="
                                                                                                                                                        grid-column: 1 / -1;
                                                                                                                                                        background:#ffffff;
                                                                                                                                                        padding:40px;
                                                                                                                                                        border-radius:18px;
                                                                                                                                                        text-align:center;
                                                                                                                                                        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
                                                                                                                                                    ">
                <div style="color:#6b7280; font-size:14px;">
                    Belum ada kelas
                </div>
            </div>
        @endforelse

    </div>

    <script>
        function copyToken(id, btn) {
            const token = document.getElementById(id).innerText;
            navigator.clipboard.writeText(token);

            // ubah tooltip jadi "Tersalin!"
            const tooltip = btn.querySelector('.tooltip-text');
            tooltip.innerText = "Tersalin";

            setTimeout(() => {
                tooltip.innerText = "Salin token";
            }, 1500);
        }


        function openModal() {
            document.getElementById('modalOverlay').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modalOverlay').style.display = 'none';
        }

        // klik area gelap untuk tutup
        document.getElementById('modalOverlay').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });

        function openEditModal(id, nama) {

            document.getElementById('editNamaKelas').value = nama;

            const form = document.getElementById('editForm');
            form.action = "/data-kelas/" + id;

            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // klik area gelap untuk tutup
        document.getElementById('editModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        function openKKMModal(id, kkmKuis, kkmEvaluasi) {

            document.getElementById('editKKMKuis').value = kkmKuis;

            document.getElementById('editKKMEvaluasi').value = kkmEvaluasi;

            const form = document.getElementById('kkmForm');

            form.action = "/data-kelas/" + id + "/update-kkm";

            document.getElementById('kkmModal').style.display = 'flex';
        }

        function closeKKMModal() {
            document.getElementById('kkmModal').style.display = 'none';
        }

        document.getElementById('kkmModal')
            .addEventListener('click', function (e) {

                if (e.target === this) {
                    closeKKMModal();
                }

            });

        function openJoinModal() {
            document.getElementById('joinModal').style.display = 'flex';
        }

        function closeJoinModal() {
            document.getElementById('joinModal').style.display = 'none';
        }

        document.getElementById('joinModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeJoinModal();
            }
        });

        function confirmDelete(button) {

            const form = button.closest('form');

            Swal.fire({
                title: 'Hapus Kelas?',
                text: "Kelas dan seluruh data terkait akan dihapus.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });
        }


    </script>

@endsection