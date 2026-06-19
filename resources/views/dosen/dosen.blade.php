<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script>
    MathJax = {
      tex: {
        inlineMath: [['$', '$'], ['\\(', '\\)']]
      }
    };
  </script>

  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js" async></script>

  <style>
    /* =====================
   ROOT & RESET
===================== */
    :root {
      --primary: #89471e;
      --secondary: #462c1d;
      --bg: #f7f7f7;
      --sidebar: #efe6dd;
      --card: #ffffff;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Fira Sans', sans-serif;
      background: var(--bg);
    }

    /* =====================
   TOPBAR
===================== */
    .topbar {
      height: 60px;
      background: #89471e;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 24px;
      border-bottom: 1px solid #ddd;
    }

    .topbar .logo {
      font-family: 'Shrikhand', cursive;
      color: #ffffff !important;
      font-weight: 800;
      letter-spacing: 2px;
      color: var(--primary);
      font-size: 20px;
    }

    .topbar .user {
      font-size: 14px;
      color: #ffffff;
      font-weight: 600;
    }


    /* =====================
   LAYOUT
===================== */
    .layout {
      display: flex;
      height: calc(100vh - 60px);
    }

    /* =====================
   SIDEBAR
===================== */
    .sidebar {
      width: 260px;
      background: #ffffff;
      /* PUTIH */
      padding: 20px;
      overflow-y: auto;
      border-right: 1px solid #e5e7eb;
      /* garis pemisah halus */
    }

    /* DEFAULT MENU */
    .menu-item {
      background: #89471e;
      /* coklat muda soft */
      color: #462c1d;
      padding: 10px 14px;
      border-radius: 10px;
      margin-bottom: 8px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: all 0.25s ease;
    }

    .menu-item:hover {
      background: #7a3f1d;
      /* sedikit lebih gelap dari default */
      color: #ffffff;
    }


    .menu-item.active {
      background: #5a2d15;
      color: #ffffff;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      transform: translateX(4px);
    }

    /* icon ikut putih kalau aktif */
    .menu-item.active i {
      color: #ffffff;
    }

    /* ===== USER DROPDOWN ===== */
    .user-menu {
      position: relative;
    }

    .user-trigger {
      color: #ffffff;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      padding: 6px 12px;
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.15);
    }

    .user-trigger:hover {
      background: rgba(255, 255, 255, 0.25);
    }

    /* DROPDOWN BOX */
    .user-dropdown {
      position: absolute;
      right: 0;
      top: 45px;
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
      min-width: 160px;
      display: none;
      overflow: hidden;
      z-index: 100;
      padding: 6px;
    }

    .user-dropdown a {
      display: block;
      padding: 10px 14px;
      text-decoration: none;
      color: #111827;
      font-size: 14px;
    }

    .user-dropdown a:hover {
      background: #f3f4f6;
      color: #89471e;
    }

    .content {
      flex: 1;
      padding: 24px;
      overflow-y: auto;
    }

    /* ===== TOGGLE BUTTON ===== */
    .sidebar-toggle {
      font-size: 28px;
      cursor: pointer;
      color: #ffffff;
      user-select: none;
      margin-left: 10px;
    }

    /* ===== SIDEBAR COLLAPSE ===== */
    .layout.collapsed .sidebar {
      width: 0;
      padding: 0;
      overflow: hidden;
      border-right: none;
    }

    .layout.collapsed .content {
      padding-left: 24px;
    }

    body.sidebar-collapsed .logo {
      display: none;
    }

    /* animasi halus */
    .sidebar,
    .content {
      transition: all 0.3s ease;
    }

    /* ===== SUBMENU AKTIF ===== */
    .submenu a.active {
      background: transparent;
      /* ⬅️ TIDAK ADA BACKGROUND */
      color: #89471e;
      /* ⬅️ SAMA DENGAN HOVER */
      font-weight: 700;
    }

    .topbar .logo i {
      margin-right: 6px;
    }

    /* MATIKAN GARIS BAWAH MENU UTAMA */
    .menu-item {
      text-decoration: none !important;
    }

    /* MATIKAN GARIS BAWAH SEMUA STATE LINK */
    .menu-item:link,
    .menu-item:visited,
    .menu-item:hover,
    .menu-item:active {
      text-decoration: none !important;
      color: #ffffff;
    }

    /* icon manusia */
    .user-trigger {
      display: flex;
      align-items: center;
      gap: 10px;
      /* jarak icon & teks */
    }

    .user-trigger i {
      font-size: 22px;
    }

    /* ITEM */
    .dropdown-item {
      width: 100%;
      border: none;
      background: none;
      padding: 10px 14px;
      text-align: left;
      cursor: pointer;
      border-radius: 8px;
      font-size: 14px;
      color: #374151;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    /* ICON */
    .dropdown-item i {
      font-size: 16px;
    }

    /* HOVER */
    .dropdown-item:hover {
      background: #f3f4f6;
    }

    /* KHUSUS LOGOUT */
    .logout-btn {
      font-weight: 600;
    }

    /* HOVER LOGOUT (biar beda & jelas) */
    .logout-btn:hover {
      background: #ffe5e0;
      color: #d62828;
    }

    @media (max-width: 768px) {

      .layout {
        position: relative;
      }

      /* SIDEBAR AWALNYA NGUMPET */
      .sidebar {
        position: fixed;
        left: -260px;
        top: 60px;
        width: 260px;
        height: calc(100vh - 60px);
        z-index: 999;
        background: #fff;
        transition: all 0.3s ease;
      }

      /* SAAT DIBUKA */
      .sidebar.show {
        left: 0;
      }

      /* OPTIONAL: CONTENT GESER DIKIT */
      .layout.sidebar-open .content {
        transform: translateX(0);
      }

      /* HILANGKAN LOGO DI HP */
      .topbar .logo {
        display: none;
      }

    }

    @media (max-width: 768px) {

      .layout.sidebar-open .content {
        margin-left: 260px;
      }

    }
  </style>
</head>

<body>

  <!-- TOPBAR -->
  <div class="topbar">
    <div style="display:flex; align-items:center; gap:16px;">

      <!-- TOGGLE SIDEBAR -->
      <div class="logo">
        <i class="bi bi-diagram-3-fill"></i> IPSubnet
      </div>

      <div class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
      </div>
    </div>

    <div class="user-menu">
      <div class="user-trigger" onclick="toggleUserMenu()">
        <i class="bi bi-person-circle"></i>
        Halo, {{ auth()->user()->nama_lengkap }}
      </div>

      <div class="user-dropdown" id="userDropdown">
        <form id="logoutForm" method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="button" onclick="confirmLogout()" class="dropdown-item logout-btn">
            <i class="bi bi-box-arrow-right"></i> Keluar
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- LAYOUT -->
  <div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

      <a href="{{ url('dashboard-dosen') }}" class="menu-item {{ request()->is('dashboard-dosen') ? 'active' : '' }}">
        <span><i class="bi bi-speedometer2"></i> Dashboard</span>
      </a>

      <a href="{{ url('data-kelas') }}" class="menu-item {{ request()->is('data-kelas*') ? 'active' : '' }}">
        <span><i class="bi bi-building"></i> Manajemen Kelas</span>
      </a>

      <a href="{{ url('data-mahasiswa') }}" class="menu-item {{ request()->is('data-mahasiswa*') ? 'active' : '' }}">
        <span><i class="bi bi-people-fill"></i> Data Mahasiswa</span>
      </a>

      <a href="/data-nilai" class="menu-item {{ request()->is('data-nilai*') ? 'active' : '' }}">
        <span><i class="bi bi-bar-chart-fill"></i> Penilaian</span>
      </a>

      <a href="/data-progres" class="menu-item {{ request()->is('data-progres*') ? 'active' : '' }}">
        <span><i class="bi bi-graph-up-arrow"></i> Progres Belajar</span>
      </a>

      <a href="{{ url('bank-soal') }}" class="menu-item {{ request()->is('bank-soal*') ? 'active' : '' }}">
        <span><i class="bi bi-journal-text"></i> Bank Soal</span>
      </a>


    </aside>
    <!-- CONTENT AREA -->
    <main class="content">
      @yield('content')
    </main>

  </div>

  <script>
    function toggleSidebar() {
      const layout = document.querySelector(".layout");
      const sidebar = document.querySelector(".sidebar");
      const body = document.body;

      if (window.innerWidth <= 768) {
        layout.classList.toggle("sidebar-open");
        sidebar.classList.toggle("show");
      } else {
        layout.classList.toggle("collapsed");
        body.classList.toggle("sidebar-collapsed");
      }
    }

    function toggleUserMenu() {
      const dropdown = document.getElementById('userDropdown');
      dropdown.style.display =
        dropdown.style.display === 'block' ? 'none' : 'block';
    }

    // klik di luar dropdown → nutup
    document.addEventListener('click', function (e) {
      const userMenu = document.querySelector('.user-menu');
      const dropdown = document.getElementById('userDropdown');

      if (!userMenu.contains(e.target)) {
        dropdown.style.display = 'none';
      }
    });

    function confirmLogout() {
      Swal.fire({
        title: 'Yakin ingin keluar?',
        text: "Sesi kamu akan berakhir.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, keluar',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logoutForm').submit();
        }
      });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>