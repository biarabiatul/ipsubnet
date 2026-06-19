@extends('landingpage.layout')

@section('title', 'Masuk')

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

@section('content')

<style>
/* ===== LOGIN (SAMA DENGAN REGISTER) ===== */
.login-section {
    padding-top: 40px;
    padding-bottom: 40px;
}

.login-title {
    font-weight: 800;
    color: #89471e;
    margin-bottom: 10px;
}

.login-subtitle {
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

/* BUTTON */
.btn-login {
    background: #89471e;
    color: #fff;
    border-radius: 10px;
    padding: 10px 22px;
    border: none;
}

.btn-login:hover {
    background: #462c1d;
    color: #fff;
}

.btn-reset {
    background: #ffffff;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    padding: 10px 22px;
}
/* LINK REGISTER */
.register-link {
    margin-top: 18px;
    font-size: 14px;
    color: #475569;
}

.register-link a {
    color: #89471e;
    font-weight: 600;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
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
    margin-top: 6px;
}

</style>

<section class="container login-section">
  <div class="row align-items-center">

    <!-- ILUSTRASI (SAMA DENGAN REGISTER) -->
    <div class="col-lg-6 text-center mb-4 mb-lg-0">
        <img src="{{ asset('assets/img/hero/hero-2/sign-in.png') }}"
             class="img-fluid"
             style="max-width: 350px;"
             alt="Ilustrasi Login">
    </div>

    <!-- FORM LOGIN -->
    <div class="col-lg-6">
        <h2 class="login-title">Masuk</h2>
        <p class="login-subtitle">
            Masuk untuk melanjutkan pembelajaran di IPSubnet
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                    name="email"
                    class="form-control @error('email') input-error @enderror"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}">

                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
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
                <button type="submit" class="btn-login">
                    Masuk
                </button>
                <button type="button" onclick="resetForm()" class="btn-reset ms-2">
                    Reset
                </button>
            </div>
        </form>

        <div class="register-link">
            Belum punya akun?
            <a href="/register">Daftar</a>
        </div>
    </div>
  </div>
</section>

<script>
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

function resetForm() {
    const form = document.querySelector("form");
    form.reset();

    // hapus class error
    document.querySelectorAll(".input-error").forEach(el => {
        el.classList.remove("input-error");
    });

    // hapus pesan error
    document.querySelectorAll(".error-text").forEach(el => {
        el.remove();
    });
}

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Registrasi Berhasil',
        text: '{{ session('success') }}'
    });
</script>
@endif
@endsection
