<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.0.0-alpha-2.min.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700;800&display=swap" rel="stylesheet">


  <style>
    :root {
      --primary: #89471e;
      --secondary: #462c1d;
      --soft-bg: #ffffffff;
    }

    html {
      overflow-y: scroll;
    }

    /* RESET TAMBAHAN */
    body {
      margin: 0;
      font-family: 'Fira Sans', sans-serif;
      background: var(--soft-bg);
    }

    /* ===== NAVBAR ===== */
    .navbar {
      background: #fff;
      padding: 14px 0;
    }

    .navbar-brand {
      font-family: 'Shrikhand', cursive;
      color: var(--primary) !important;
      letter-spacing: 2px;
      font-size: 22px;
    }

    .navbar-nav {
      margin-left: 350px;
    }

    .navbar-nav .nav-link {
      color: #89471e !important;
      margin: 0 10px;
      position: relative;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: var(--primary) !important;
    }

    /* GARIS AKTIF COKLAT */
    .navbar-nav .nav-link::after {
      content: "";
      display: block;
      height: 3px;
      width: 0;
      background: var(--primary);
      transition: 0.3s;
      margin-top: 5px;
    }

    .navbar-nav .nav-link:hover::after,
    .navbar-nav .nav-link.active::after {
      width: 100%;
    }

    /* BUTTON */
    .btn-main {
      background: var(--primary);
      color: #fff;
      border-radius: 10px;
      padding: 10px 22px;
      text-decoration: none;
    }

    .btn-main:hover {
      background: var(--secondary);
      color: #fff;
    }

    /* ===== FOOTER ===== */
    footer {
      background: #fff;
      text-align: center;
      padding: 20px 0;
      color: var(--primary);
      /* margin-top: 55px; */
    }

    .navbar-toggler {
      border: none;
    }

    .navbar-toggler-icon {
      background-image: none;
      width: 25px;
      height: 2px;
      background-color: #89471e;
      display: block;
      position: relative;
    }

    .navbar-toggler-icon::before,
    .navbar-toggler-icon::after {
      content: "";
      width: 25px;
      height: 2px;
      background-color: #89471e;
      position: absolute;
      left: 0;
    }

    .navbar-toggler-icon::before {
      top: -7px;
    }

    .navbar-toggler-icon::after {
      top: 7px;
    }

    @media (max-width: 992px) {
      .navbar-nav {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="/">IPSubnet</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
              Beranda
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('daftarmateri') ? 'active' : '' }}" href="/daftarmateri">
              Daftar Materi
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('petunjuk') ? 'active' : '' }}" href="/petunjuk">
              Petunjuk
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="/tentang">
              Tentang
            </a>
          </li>
        </ul>

        <a href="/register" class="btn-main ms-3">Daftar</a>
        <a href="/login" class="btn-main" style="margin-left:12px;">Masuk</a>
      </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>

  <footer class="@yield('footer-class')">
    © {{ date('Y') }} <i>IP Addressing</i> & <i>Subnetting</i>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>