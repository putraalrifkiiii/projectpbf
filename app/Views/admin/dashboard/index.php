<?php
/**
 * @var string $title
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
    :root {
        --tech-dark: #0f172a;
        /* Deep slate untuk sidebar */
        --tech-darker: #0b1120;
        /* Highlight sidebar */
        --tech-primary: #2563eb;
        /* Biru utama */
        --tech-accent: #00f2fe;
        /* Cyan/Neon */
        --tech-bg: #f1f5f9;
        /* Latar belakang konten */
        --text-muted: #64748b;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--tech-bg);
        color: #334155;
        overflow-x: hidden;
    }

    .app-wrapper {
        min-height: 100vh;
        display: flex;
    }

    /* Sidebar - Tech Style */
    .main-sidebar {
        width: 260px;
        min-height: 100vh;
        background: var(--tech-dark);
        color: #94a3b8;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1030;
        transition: all 0.3s ease;
        box-shadow: 4px 0 15px rgba(0, 0, 0, 0.05);
    }

    .brand-link {
        height: 65px;
        display: flex;
        align-items: center;
        padding: 0 24px;
        color: #ffffff;
        text-decoration: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        font-weight: 700;
        font-size: 1.15rem;
        letter-spacing: 0.5px;
    }

    .brand-link i {
        background: linear-gradient(135deg, var(--tech-accent), var(--tech-primary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 1.3rem;
        margin-right: 12px;
    }

    .sidebar-user {
        padding: 20px 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        display: flex;
        align-items: center;
        gap: 14px;
        background: var(--tech-darker);
    }

    .sidebar-user .user-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--tech-primary), #1e40af);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
    }

    .sidebar-user .user-name {
        color: #ffffff;
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .sidebar-user .user-role {
        font-size: 0.8rem;
        color: var(--tech-accent);
        font-weight: 500;
    }

    .sidebar-menu {
        list-style: none;
        padding: 16px 12px;
        margin: 0;
    }

    .sidebar-menu .nav-item {
        margin-bottom: 6px;
    }

    .sidebar-menu .nav-link {
        color: #94a3b8;
        border-radius: 10px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .sidebar-menu .nav-link i {
        width: 26px;
        margin-right: 10px;
        text-align: center;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .sidebar-menu .nav-link:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #ffffff;
    }

    .sidebar-menu .nav-link.active {
        background: linear-gradient(135deg, var(--tech-primary), #3b82f6);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
    }

    .sidebar-menu .nav-link.active i {
        color: #ffffff;
    }

    /* Main Content */
    .main-content {
        margin-left: 260px;
        width: calc(100% - 260px);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* Navbar */
    .main-header {
        height: 65px;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 28px;
        position: sticky;
        top: 0;
        z-index: 1020;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    }

    .navbar-title {
        font-weight: 600;
        color: #0f172a;
        margin: 0;
        font-size: 1.05rem;
    }

    /* Content */
    .content-wrapper {
        flex: 1;
        padding: 28px;
    }

    .page-title {
        font-size: 1.65rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: #0f172a;
    }

    .breadcrumb {
        margin-bottom: 0;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .breadcrumb a {
        text-decoration: none;
        color: var(--tech-primary);
    }

    /* Info Boxes - Modern Gradient */
    .info-box {
        background: #ffffff;
        border-radius: 14px;
        padding: 20px;
        display: flex;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        height: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .info-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }

    .info-box-icon {
        width: 64px;
        height: 64px;
        border-radius: 14px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        margin-right: 18px;
    }

    .info-box-text {
        color: var(--text-muted);
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-box-number {
        font-size: 1.4rem;
        font-weight: 700;
        color: #0f172a;
        margin-top: 2px;
    }

    /* Gradient Colors for Icons */
    .bg-grad-blue {
        background: linear-gradient(135deg, #0072ff 0%, #00c6ff 100%);
    }

    .bg-grad-purple {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .bg-grad-green {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .bg-grad-orange {
        background: linear-gradient(135deg, #f12711 0%, #f5af19 100%);
    }

    .bg-grad-red {
        background: linear-gradient(135deg, #ff0844 0%, #ffb199 100%);
    }

    /* Cards */
    .card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        margin-bottom: 24px;
    }

    /* Aksen Atas Card ala Dashboard Elektronik */
    .card-accent-top {
        border-top: 4px solid var(--tech-primary);
    }

    .card-header {
        background: #ffffff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 20px 24px;
        border-radius: 14px 14px 0 0 !important;
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
        color: #0f172a;
        display: flex;
        align-items: center;
    }

    .card-body {
        padding: 24px;
    }

    /* Menu Card */
    .menu-card {
        height: 100%;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border-color: rgba(37, 99, 235, 0.2);
    }

    .menu-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 18px;
    }

    .menu-title {
        font-weight: 700;
        margin-bottom: 8px;
        color: #0f172a;
        font-size: 1.1rem;
    }

    .menu-desc {
        color: var(--text-muted);
        font-size: 0.9rem;
        min-height: 45px;
        line-height: 1.5;
    }

    /* Buttons */
    .btn {
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 10px 16px;
        transition: all 0.2s ease;
    }

    .btn-primary {
        background: var(--tech-primary);
        border: none;
    }

    .btn-primary:hover {
        background: #1d4ed8;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .main-footer {
        background: #ffffff;
        padding: 18px 28px;
        font-size: 0.9rem;
        color: var(--text-muted);
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Mobile */
    .sidebar-toggle {
        display: none;
        border: none;
        background: rgba(37, 99, 235, 0.1);
        color: var(--tech-primary);
        width: 36px;
        height: 36px;
        border-radius: 8px;
        font-size: 1.1rem;
        align-items: center;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .main-sidebar {
            left: -260px;
        }

        .main-sidebar.show {
            left: 0;
        }

        .main-content {
            margin-left: 0;
            width: 100%;
        }

        .sidebar-toggle {
            display: flex;
        }

        .content-wrapper {
            padding: 20px;
        }

        .main-header {
            padding: 0 20px;
        }

        .page-title {
            font-size: 1.4rem;
        }
    }
    </style>
</head>

<body>

    <div class="app-wrapper">

        <!-- Sidebar -->
        <aside class="main-sidebar" id="sidebar">
            <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
                <i class="fa-solid fa-microchip"></i>
                <span>TECH STORE</span>
            </a>

            <div class="sidebar-user">
                <div class="user-icon">
                    <i class="fa-solid fa-user-astronaut"></i>
                </div>
                <div>
                    <div class="user-name"><?= user()->username; ?></div>
                    <div class="user-role">System Administrator</div>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link active">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/produk') ?>" class="nav-link">
                        <i class="fa-solid fa-laptop"></i>
                        <span>Katalog Produk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Data Pelanggan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/transaksi') ?>" class="nav-link">
                        <i class="fa-solid fa-cart-flatbed"></i>
                        <span>Transaksi</span>
                    </a>
                </li>

                <li class="nav-item mt-4">
                    <a href="<?= base_url('admin/logout') ?>" class="nav-link text-danger">
                        <i class="fa-solid fa-power-off"></i>
                        <span>Keluar Sistem</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">

            <!-- Navbar -->
            <nav class="main-header">
                <div class="d-flex align-items-center gap-3">
                    <button class="sidebar-toggle" type="button" onclick="toggleSidebar()">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </button>
                    <h6 class="navbar-title d-none d-sm-block">
                        Control Panel - Electronics Store
                    </h6>
                </div>

                <div class="navbar-actions">
                    <div class="dropdown">
                        <button class="btn btn-light border dropdown-toggle d-flex align-items-center gap-2"
                            type="button" data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff" alt="Avatar"
                                class="rounded-circle" width="28">
                            <span class="d-none d-sm-inline"><?= user()->username; ?></span> </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user-gear me-2"></i> Profil</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-cog me-2"></i> Pengaturan</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="<?= base_url('admin/logout') ?>"><i
                                        class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Content Wrapper -->
            <main class="content-wrapper">

                <!-- Content Header -->
                <section class="content-header mb-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                        <div>
                            <h1 class="page-title">Dashboard Overview</h1>
                            <p class="text-muted mb-0">
                                Pantau statistik dan kelola inventaris toko elektronik Anda.
                            </p>
                        </div>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url('admin/dashboard') ?>">
                                        <i class="fa-solid fa-house me-1"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                    </div>
                </section>

                <!-- Info Box Statistik -->
                <section class="row g-4 mb-4">

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-grad-blue">
                                <i class="fa-solid fa-microchip"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Produk</span>
                                <span class="info-box-number"><?= $totalProduk ?? 0; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-grad-purple">
                                <i class="fa-solid fa-users-viewfinder"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Pelanggan</span>
                                <span class="info-box-number"><?= $totalPelanggan ?? 0; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-grad-green">
                                <i class="fa-solid fa-boxes-packing"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Transaksi</span>
                                <span class="info-box-number"><?= $totalTransaksi ?? 0; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-grad-orange">
                                <i class="fa-solid fa-wallet"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Penjualan</span>
                                <span class="info-box-number">
                                    Rp <?= number_format($totalPenjualan ?? 0, 0, ',', '.'); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl d-xl-none d-xxl-block">
                        <div class="info-box">
                            <div class="info-box-icon bg-grad-red">
                                <i class="fa-solid fa-bolt"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Omzet Hari Ini</span>
                                <span class="info-box-number">
                                    Rp <?= number_format($pendapatanHariIni ?? 0, 0, ',', '.'); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                </section>

                <!-- Welcome Card -->
                <section class="card card-accent-top mb-4">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <span
                                    class="badge bg-primary text-uppercase mb-2 px-3 py-2 rounded-pill shadow-sm">System
                                    Online</span>
                                <h4 class="fw-bold mb-3 text-dark">
                                    Selamat Datang di Command Center, <?= session()->get('name') ?? 'Admin'; ?>!
                                </h4>

                                <p class="text-muted mb-0" style="line-height: 1.7;">
                                    Gunakan halaman dashboard ini untuk mengelola data *hardware*, memantau sirkulasi
                                    barang elektronik,
                                    dan menganalisa performa penjualan toko. Sistem diperbarui secara *real-time* untuk
                                    memastikan akurasi inventaris.
                                </p>
                            </div>

                            <div class="col-lg-4 text-center d-none d-lg-block">
                                <i class="fa-solid fa-server"
                                    style="font-size: 7rem; color: #f1f5f9; text-shadow: 2px 2px 10px rgba(37,99,235,0.2);"></i>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Menu Card -->
                <section class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">
                            <i class="fa-solid fa-layer-group me-2" style="color: var(--tech-primary);"></i>
                            Modul Sistem
                        </h3>
                    </div>

                    <div class="card-body bg-light rounded-bottom">
                        <div class="row g-4">

                            <!-- Produk -->
                            <div class="col-md-4">
                                <div class="card menu-card mb-0 shadow-sm">
                                    <div class="card-body text-center p-4">
                                        <div class="menu-icon bg-grad-blue mx-auto">
                                            <i class="fa-solid fa-laptop-code"></i>
                                        </div>
                                        <h5 class="menu-title">Manajemen Perangkat</h5>
                                        <p class="menu-desc">Kelola spesifikasi, stok, harga, dan SKU barang elektronik.
                                        </p>
                                        <a href="<?= base_url('admin/produk') ?>"
                                            class="btn btn-primary w-100 rounded-pill">
                                            Akses Modul <i class="fa-solid fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Pelanggan -->
                            <div class="col-md-4">
                                <div class="card menu-card mb-0 shadow-sm">
                                    <div class="card-body text-center p-4">
                                        <div class="menu-icon bg-grad-purple mx-auto">
                                            <i class="fa-solid fa-user-shield"></i>
                                        </div>
                                        <h5 class="menu-title">Basis Data Klien</h5>
                                        <p class="menu-desc">Pusat data pelanggan, riwayat servis, dan informasi kontak.
                                        </p>
                                        <a href="<?= base_url('admin/pelanggan') ?>"
                                            class="btn btn-primary w-100 rounded-pill" style="background: #764ba2;">
                                            Akses Modul <i class="fa-solid fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Transaksi -->
                            <div class="col-md-4">
                                <div class="card menu-card mb-0 shadow-sm">
                                    <div class="card-body text-center p-4">
                                        <div class="menu-icon bg-grad-green mx-auto">
                                            <i class="fa-solid fa-cash-register"></i>
                                        </div>
                                        <h5 class="menu-title">Point of Sales (POS)</h5>
                                        <p class="menu-desc">Catat transaksi penjualan, cetak struk, dan monitor omzet.
                                        </p>
                                        <a href="<?= base_url('admin/transaksi') ?>"
                                            class="btn btn-primary w-100 rounded-pill" style="background: #11998e;">
                                            Akses Modul <i class="fa-solid fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

            </main>

            <!-- Footer -->
            <footer class="main-footer">
                <div class="d-flex flex-column flex-md-row justify-content-between gap-1 align-items-center">
                    <span>
                        &copy; <?= date('Y'); ?> <strong>TechStore Enterprise</strong>. All rights reserved.
                    </span>
                    <span class="badge bg-light text-dark border">
                        <i class="fa-solid fa-circle text-success me-1" style="font-size: 8px;"></i> System Version 2.0
                    </span>
                </div>
            </footer>

        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
    </script>

</body>

</html>