<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  <script>
    MathJax = {
      tex: {
        inlineMath: [['$', '$'], ['\\(', '\\)']]
      }
    };
  </script>

  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js" async></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
      font-family: 'Fira Sans', sans-serif !important;
    }

    body {
      margin: 0;
      font-family: 'Fira Sans', sans-serif;
      font-size: 16px;
      background: var(--bg);
    }

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
      font-family: 'Shrikhand', cursive !important;
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

    .layout {
      display: flex;
      height: calc(100vh - 60px);
    }


    .sidebar {
      width: 260px;
      background: #ffffff;
      /* PUTIH */
      padding: 20px;
      overflow-y: auto;
      border-right: 1px solid #e5e7eb;
      /* garis pemisah halus */
    }

    /* MENU */
    .menu-item {
      background: #89471e;
      padding: 10px 14px;
      border-radius: 10px;
      margin-bottom: 8px;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: #fff;
    }

    .menu-item.active {
      background: var(--primary);
      color: #fff;
    }

    /* SUBMENU */
    .submenu {
      display: none;
      margin-left: 10px;
      margin-bottom: 10px;
    }

    .submenu a {
      display: block;
      font-size: 15px;
      padding: 8px 12px;
      margin-bottom: 6px;
      color: #222222;
      text-decoration: none;
      border-radius: 8px;
    }

    .submenu a.active {
      background: var(--primary);
      color: #fff;
    }

    .submenu a:hover {
      color: var(--primary);
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

    /* MENU INDUK AKTIF */
    .menu-item.active {
      background: #89471e;
      color: #ffffff;
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

    .sidebar-progress {
      background: #f3ede8;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 16px;
    }

    .progress-title {
      font-size: 13px;
      font-weight: 600;
      margin-bottom: 6px;
      color: #333;
    }

    .progress-bar {
      height: 16px;
      background: #e5e7eb;
      border-radius: 999px;
      overflow: hidden;
      position: relative;
    }

    .progress-fill {
      height: 100%;
      background: #22c55e;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      border-radius: 999px;
      transition: width 0.5s ease;
      padding-right: 6px;
    }

    /* TEKS PERSEN */
    .progress-label {
      font-size: 11px;
      color: #ffffff;
      font-weight: 600;
    }

    @media (max-width: 768px) {
      .topbar .logo {
        display: none !important;
      }
    }

    @media (max-width: 768px) {
      .layout {
        position: relative;
      }

      .sidebar {
        position: absolute;
        left: -260px;
        top: 0;
        height: 100%;
        z-index: 10;
        background: #fff;
      }

      .sidebar.show {
        left: 0;
      }

      /* INI PENTING */
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

      <div class="sidebar-progress">
        <div class="progress-title">Progress belajar:</div>

        <div class="progress-bar">
          <div class="progress-fill" style="width: {{ $progress->persen ?? 0 }}%">
            <span class="progress-label">
              {{ $progress->persen ?? 0 }}%
            </span>
          </div>
        </div>
      </div>

      <a href="/dashboard" class="menu-item">
        <span><i class="bi bi-speedometer2"></i> Dashboard</span>
      </a>

      <a href="/peta-konsep" class="menu-item">
        <span><i class="bi bi-lightbulb"></i> Peta Konsep</span>
      </a>

      <!-- BAB I -->
      <div class="menu-item" onclick="toggleMenu(this)">
        <span><i class="bi bi-123"></i> Sistem Bilangan</span>
        <i class="bi bi-caret-down-fill"></i>
      </div>
      <div class="submenu" style="display:block">
        <a href="/bab1/tujuan-pembelajaran-bab1"><i class="bi bi-bookmark-check"></i> Tujuan Pembelajaran</a>
        <a href="/bab1/biner-desimal"><i class="bi bi-code"></i> Bilangan Biner</a>
        <a href="/bab1/desimal-biner"><i class="bi bi-calculator"></i> Bilangan Desimal</a>
        <a href="/bab1/rangkuman-bab1"><i class="bi bi-journal-text"></i> Rangkuman</a>
        <a href="/bab1/petunjuk-kuis-bab1"><i class="bi bi-patch-question"></i> Kuis 1</a>
      </div>

      <!-- BAB II -->
      <div class="menu-item" onclick="toggleMenu(this)">
        <span><i class="bi bi-router"></i> IP Addressing</span>
        <i class="bi bi-caret-down-fill"></i>
      </div>
      <div class="submenu">
        <a href="/bab2/tujuan-pembelajaran-bab2"><i class="bi bi-bookmark-check"></i> Tujuan Pembelajaran</a>
        <a href="/bab2/ip-addressing"><i class="bi bi-info-circle"></i> Apa itu IP Address? </a>
        <a href="/bab2/kelas-ip"><i class="bi bi-layers"></i> Kelas IP Address</a>
        <a href="/bab2/network-host"><i class="bi bi-diagram-2"></i> Network & Host ID</a>
        <a href="/bab2/publik-privat"><i class="bi bi-shield-lock"></i> IP Publik & Privat</a>
        <a href="/bab2/subnet-mask"><i class="bi bi-mask"></i> Subnet Mask</a>
        <a href="/bab2/cidr"><i class="bi bi-slash-circle"></i> CIDR</a>
        <a href="/bab2/rangkuman-bab2"><i class="bi bi-journal-text"></i> Rangkuman</a>
        <a href="/bab2/petunjuk-kuis-bab2"><i class="bi bi-patch-question"></i> Kuis 2</a>
      </div>


      <!-- BAB III -->
      <div class="menu-item" onclick="toggleMenu(this)">
        <span><i class="bi bi-diagram-3"></i> Subnetting</span>
        <i class="bi bi-caret-down-fill"></i>
      </div>
      <div class="submenu">
        <a href="/bab3/tujuan-pembelajaran-bab3"><i class="bi bi-bookmark-check"></i> Tujuan Pembelajaran</a>
        <a href="/bab3/subnetting"><i class="bi bi-lightbulb"></i> Pengenalan Subnetting</a>
        <a href="/bab3/perhitungan-subnetting"><i class="bi bi-calculator-fill"></i> Perhitungan Subnetting</a>
        <a href="/bab3/vlsm"><i class="bi bi-diagram-3-fill"></i> VLSM</a>
        <a href="/bab3/rangkuman-bab3"><i class="bi bi-journal-text"></i> Rangkuman</a>
        <a href="/bab3/petunjuk-kuis-bab3"><i class="bi bi-patch-question"></i> Kuis 3</a>
      </div>

      <!-- EVALUASI -->
      <a href="/evaluasi" class="menu-item">
        <span><i class="bi bi-clipboard-check"></i> Evaluasi</span>
      </a>
    </aside>

    <!-- CONTENT AREA -->
    <main class="content">
      @yield('content')
    </main>

  </div>

  <script>
    // ===== SIDEBAR DROPDOWN (BAB) =====
    function toggleMenu(el) {
      const submenu = el.nextElementSibling;
      const open = submenu.style.display === "block";

      document.querySelectorAll(".submenu").forEach(s => {
        s.style.display = "none";
      });

      submenu.style.display = open ? "none" : "block";
    }


    // ===== USER DROPDOWN (LOGOUT) =====
    function toggleUserMenu() {
      const menu = document.getElementById("userDropdown");
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    }

    // Tutup dropdown user kalau klik di luar
    document.addEventListener("click", function (e) {
      const userMenu = document.querySelector(".user-menu");
      const dropdown = document.getElementById("userDropdown");

      if (userMenu && !userMenu.contains(e.target)) {
        dropdown.style.display = "none";
      }
    });

    function toggleSidebar() {
      const layout = document.querySelector(".layout");

      if (window.innerWidth <= 768) {
        layout.classList.toggle("sidebar-open");
        document.querySelector(".sidebar").classList.toggle("show");
      } else {
        layout.classList.toggle("collapsed");
      }
    }

    function setActiveMenu(el) {
      // hapus semua active submenu
      document.querySelectorAll(".submenu a").forEach(a => {
        a.classList.remove("active");
      });

      // hapus active menu induk
      document.querySelectorAll(".menu-item").forEach(m => {
        m.classList.remove("active");
      });

      // aktifkan submenu yang diklik
      el.classList.add("active");

      // aktifkan menu induknya
      const submenu = el.closest(".submenu");
      const menuItem = submenu.previousElementSibling;
      if (menuItem) {
        menuItem.classList.add("active");
      }
    }

    document.addEventListener("DOMContentLoaded", function () {
      const currentPath = window.location.pathname;

      // tutup semua submenu dulu
      document.querySelectorAll(".submenu").forEach(s => {
        s.style.display = "none";
      });

      let opened = false;

      // cek submenu berdasarkan URL
      document.querySelectorAll(".submenu a").forEach(link => {
        const href = link.getAttribute("href");
        if (!href || href === "#") return;

        if (currentPath.startsWith(href)) {
          link.classList.add("active");

          const submenu = link.closest(".submenu");
          submenu.style.display = "block";

          const parentMenu = submenu.previousElementSibling;
          if (parentMenu) {
            parentMenu.classList.add("active");
          }

          opened = true;
        }
      });
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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable@12.3.3/dist/handsontable.min.css">
  <script src="https://cdn.jsdelivr.net/npm/handsontable@12.3.3/dist/handsontable.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>