@extends('landingpage.layout')

@section('title', 'Daftar')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

@section('content')

<style>
/* ===== REGISTER ===== */
.register-section {
    padding-top: 40px;
    padding-bottom: 40px;
}

.register-title {
    font-weight: 800;
    color: #89471e;
    margin-bottom: 10px;
}

.register-subtitle {
    color: #475569;
    margin-bottom: 30px;
}

/* FORM */
.form-group {
    margin-bottom: 18px;
}

.form-group label {
    font-weight: 600;
    margin-bottom: 6px;
    display: block;
    font-size: 14px;
}

.form-control {
    border-radius: 10px;
    padding: 6px 12px;
    font-size: 14px;
}

/* RADIO */
.role-group {
    display: flex;
    gap: 20px;
    margin-top: 6px;
}

.role-group label {
    font-weight: 500;
    font-size: 14px;
}

/* LINK LOGIN */
.login-link {
    margin-top: 18px;
    font-size: 14px;
    color: #475569;
}

.login-link a {
    color: #89471e;
    font-weight: 600;
    text-decoration: none;
    margin-left: 4px;
}

.login-link a:hover {
    text-decoration: underline;
    color: #462c1d;
}

/* BUTTON */
.btn-register {
    background: #89471e;
    color: #fff;
    border-radius: 10px;
    padding: 10px 22px;
    border: none;
}

.btn-register:hover {
    background: #462c1d;
    color: #fff;
}

.btn-reset {
    background: #ffffff;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    padding: 10px 22px;
}

.password-wrapper {
    position: relative;
}

.password-wrapper input {
    padding-right: 40px; /* kasih ruang buat icon */
}

.toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 16px;
    color: #6b7280;
}

/* ===== INVALID INPUT ===== */
.input-error {
    border: 1.5px solid #ef4444 !important;
    background-color: #fef2f2;
}

.error-text {
    color: #ef4444;
    font-size: 13px;
    margin-top: 5px;
}

/* ===== INFO KODE VERIFIKASI ===== */
.verification-info {
    margin-top: 8px;
    display: flex;
    align-items: center;
    gap: 6px;

    font-size: 13px;
    color: #b45309;
}

.verification-info i {
    font-size: 13px;
}

</style>

<section class="container register-section">
  <div class="row align-items-center">

    <!-- ILUSTRASI -->
    <div class="col-lg-6 text-center mb-4 mb-lg-0">
        <img src="{{ asset('assets/img/hero/hero-2/sign-up.png') }}"
             class="img-fluid"
             style="max-width: 350px;"
             alt="Ilustrasi Registrasi">
    </div>

    <!-- FORM -->
    <div class="col-lg-6">

        <h2 class="register-title">Daftar</h2>
        <p class="register-subtitle">
            Isi semua data di bawah ini dengan benar!
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Peran</label>
                <div class="role-group">
                    <label>
                        <input type="radio"
                            name="role"
                            value="dosen"
                            onclick="toggleRole()"
                            {{ old('role') == 'dosen' ? 'checked' : '' }}>
                        Dosen
                    </label>
                    <label>
                        <input type="radio"
                            name="role"
                            value="mahasiswa"
                            onclick="toggleRole()"
                            {{ old('role') == 'mahasiswa' ? 'checked' : '' }}>
                        Mahasiswa
                    </label>
                </div>

                @error('role')
                    <div class="error-text">{{ $message }}</div>
                @enderror

            </div>
            
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_lengkap"
                    class="form-control @error('nama_lengkap') input-error @enderror"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('nama_lengkap') }}">

                @error('nama_lengkap')
                    <div class="error-text">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                    class="form-control @error('email') input-error @enderror"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}">

                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror

            </div>

            <!-- KHUSUS MAHASISWA -->
            <div id="mahasiswaFields" style="display:none;">

                <div class="form-group">
                    <label>NIM</label>
                    <input type="text"
                        name="nim"
                        class="form-control @error('nim') input-error @enderror"
                        placeholder="Masukkan NIM"
                        value="{{ old('nim') }}">

                    @error('nim')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        Token
                    </label>
                    <input type="text"
                        name="token"
                        class="form-control @error('token') input-error @enderror"
                        placeholder="Masukkan token dari dosen"
                        value="{{ old('token') }}">

                    @error('token')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- KHUSUS DOSEN -->
            <div id="dosenFields" style="display:none;">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text"
                        name="nip"
                        class="form-control @error('nip') input-error @enderror"
                        placeholder="Masukkan NIP"
                        value="{{ old('nip') }}">

                    @error('nip')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kode Verifikasi</label>

                    <input type="text"
                        name="kode_dosen"
                        class="form-control @error('kode_dosen') input-error @enderror"
                        placeholder="Masukkan kode verifikasi dosen"
                        value="{{ old('kode_dosen') }}">

                    @error('kode_dosen')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                    <div class="verification-info">
                        <i class="bi bi-info-circle-fill"></i>
                        <span>
                            Silakan hubungi pengembang untuk mendapatkan kode verifikasi.
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>

                <div class="password-wrapper">
                    <input type="password" 
                        id="password"
                        name="password"
                        class="form-control @error('password') input-error @enderror"
                        placeholder="Masukkan password">

                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </span>
                </div>

                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn-register">
                    Daftar
                </button>

                <button type="button" class="btn-reset ms-2" onclick="clearForm()">
                    Reset
                </button>

            </div>

            <div class="login-link mt-3">
                <span>Sudah punya akun?</span>
                <a href="/login">Masuk</a>
            </div>
        </form>
    </div>

  </div>
</section>

<script>
function toggleRole() {
    const role = document.querySelector('input[name="role"]:checked')?.value;

    const mahasiswa = document.getElementById('mahasiswaFields');
    const dosen = document.getElementById('dosenFields');

    mahasiswa.style.display = 'none';
    dosen.style.display = 'none';

    if (role === 'mahasiswa') {
        mahasiswa.style.display = 'block';
    }

    if (role === 'dosen') {
        dosen.style.display = 'block';
    }
}

function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.querySelector(".toggle-password i");

    if (password.type === "password") {
        password.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        password.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}

document.addEventListener("DOMContentLoaded", function () {

    const oldRole = "{{ old('role') }}";

    if (oldRole === "mahasiswa") {
        document.getElementById("mahasiswaFields").style.display = "block";
    }

    if (oldRole === "dosen") {
        document.getElementById("dosenFields").style.display = "block";
    }

});

function clearForm() {
    document.querySelector("form").reset();

    // Sembunyikan field tambahan
    document.getElementById("mahasiswaFields").style.display = "none";
    document.getElementById("dosenFields").style.display = "none";
}

</script>

@endsection
