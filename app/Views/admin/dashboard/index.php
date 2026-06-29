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
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
        color: #343a40;
        overflow-x: hidden;
    }

    .app-wrapper {
        min-height: 100vh;
        display: flex;
    }

    /* Sidebar */
    .main-sidebar {
        width: 250px;
        min-height: 100vh;
        background: #343a40;
        color: #c2c7d0;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1030;
        transition: all 0.3s ease;
    }

    .brand-link {
        height: 57px;
        display: flex;
        align-items: center;
        padding: 0 20px;
        color: #ffffff;
        text-decoration: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-weight: 600;
        font-size: 1.05rem;
    }

    .brand-link i {
        color: #0d6efd;
        margin-right: 10px;
    }

    .sidebar-user {
        padding: 18px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .sidebar-user .user-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #0d6efd;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sidebar-user .user-name {
        color: #ffffff;
        font-size: 0.95rem;
        font-weight: 500;
        margin-bottom: 2px;
    }

    .sidebar-user .user-role {
        font-size: 0.78rem;
        color: #adb5bd;
    }

    .sidebar-menu {
        list-style: none;
        padding: 12px;
        margin: 0;
    }

    .sidebar-menu .nav-item {
        margin-bottom: 5px;
    }

    .sidebar-menu .nav-link {
        color: #c2c7d0;
        border-radius: 6px;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        text-decoration: none;
        transition: 0.2s;
        font-size: 0.92rem;
    }

    .sidebar-menu .nav-link i {
        width: 24px;
        margin-right: 8px;
        text-align: center;
    }

    .sidebar-menu .nav-link:hover,
    .sidebar-menu .nav-link.active {
        background: #0d6efd;
        color: #ffffff;
    }

    /* Main */
    .main-content {
        margin-left: 250px;
        width: calc(100% - 250px);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* Navbar */
    .main-header {
        height: 57px;
        background: #ffffff;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 24px;
        position: sticky;
        top: 0;
        z-index: 1020;
    }

    .navbar-title {
        font-weight: 600;
        color: #343a40;
        margin: 0;
        font-size: 1rem;
    }

    .navbar-actions a {
        text-decoration: none;
    }

    /* Content */
    .content-wrapper {
        flex: 1;
        padding: 24px;
    }

    .content-header {
        margin-bottom: 22px;
    }

    .page-title {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 6px;
        color: #343a40;
    }

    .breadcrumb {
        margin-bottom: 0;
        font-size: 0.9rem;
    }

    .breadcrumb a {
        text-decoration: none;
    }

    .info-box {
        background: #ffffff;
        border-radius: 8px;
        padding: 18px;
        display: flex;
        align-items: center;
        box-shadow: 0 0 1px rgba(0, 0, 0, 0.12), 0 1px 3px rgba(0, 0, 0, 0.15);
        height: 100%;
    }

    .info-box-icon {
        width: 58px;
        height: 58px;
        border-radius: 8px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin-right: 15px;
    }

    .info-box-content span {
        display: block;
    }

    .info-box-text {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .info-box-number {
        font-size: 1.25rem;
        font-weight: 600;
        color: #343a40;
    }

    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 0 1px rgba(0, 0, 0, 0.12), 0 1px 3px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background: #ffffff;
        border-bottom: 1px solid #e9ecef;
        padding: 16px 20px;
    }

    .card-title {
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
        color: #343a40;
    }

    .card-body {
        padding: 20px;
    }

    .menu-card {
        height: 100%;
        transition: 0.2s ease;
    }

    .menu-card:hover {
        transform: translateY(-4px);
    }

    .menu-icon {
        width: 62px;
        height: 62px;
        border-radius: 8px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        margin-bottom: 16px;
    }

    .menu-title {
        font-weight: 600;
        margin-bottom: 8px;
        color: #343a40;
    }

    .menu-desc {
        color: #6c757d;
        font-size: 0.9rem;
        min-height: 42px;
    }

    .main-footer {
        background: #ffffff;
        border-top: 1px solid #dee2e6;
        padding: 14px 24px;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .btn {
        border-radius: 6px;
        font-size: 0.9rem;
    }

    .bg-primary-custom {
        background: #0d6efd;
    }

    .bg-success-custom {
        background: #198754;
    }

    .bg-warning-custom {
        background: #ffc107;
    }

    .bg-danger-custom {
        background: #dc3545;
    }

    .bg-info-custom {
        background: #0dcaf0;
    }

    /* Mobile */
    .sidebar-toggle {
        display: none;
        border: none;
        background: transparent;
        font-size: 1.2rem;
        color: #343a40;
    }

    @media (max-width: 768px) {
        .main-sidebar {
            left: -250px;
        }

        .main-sidebar.show {
            left: 0;
        }

        .main-content {
            margin-left: 0;
            width: 100%;
        }

        .sidebar-toggle {
            display: inline-block;
        }

        .content-wrapper {
            padding: 18px;
        }

        .main-header {
            padding: 0 16px;
        }

        .page-title {
            font-size: 1.35rem;
        }
    }
    </style>
</head>

<body>

    <div class="app-wrapper">

        <!-- Sidebar -->
        <aside class="main-sidebar" id="sidebar">
            <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
                <i class="fa-solid fa-store"></i>
                <span>TECH STORE</span>
            </a>

            <div class="sidebar-user">
                <div class="user-icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div>
                    <div class="user-name"><?= session()->get('name'); ?></div>
                    <div class="user-role">Administrator</div>
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
                        <i class="fa-solid fa-box"></i>
                        <span>Produk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Pelanggan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/transaksi') ?>" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Transaksi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/logout') ?>" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
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
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <h6 class="navbar-title">
                        Admin Dashboard
                    </h6>
                </div>

                <div class="navbar-actions">
                    <a href="<?= base_url('admin/logout') ?>" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-right-from-bracket me-1"></i>
                        Logout
                    </a>
                </div>
            </nav>

            <!-- Content Wrapper -->
            <main class="content-wrapper">

                <!-- Content Header -->
                <section class="content-header">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                        <div>
                            <h1 class="page-title">Dashboard</h1>
                            <p class="text-muted mb-0">
                                Selamat datang di halaman admin Tech Store.
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

                <!-- Info Box -->
                <!-- Info Box Statistik -->
                <section class="row g-3 mb-4">

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-primary-custom">
                                <i class="fa-solid fa-box"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Produk</span>
                                <span class="info-box-number"><?= $totalProduk ?? 0; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-info-custom">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Pelanggan</span>
                                <span class="info-box-number"><?= $totalPelanggan ?? 0; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-success-custom">
                                <i class="fa-solid fa-receipt"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Transaksi</span>
                                <span class="info-box-number"><?= $totalTransaksi ?? 0; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-warning-custom">
                                <i class="fa-solid fa-money-bill-wave"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Penjualan</span>
                                <span class="info-box-number">
                                    Rp <?= number_format($totalPenjualan ?? 0, 0, ',', '.'); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl">
                        <div class="info-box">
                            <div class="info-box-icon bg-danger-custom">
                                <i class="fa-solid fa-calendar-day"></i>
                            </div>
                            <div class="info-box-content">
                                <span class="info-box-text">Pendapatan Hari Ini</span>
                                <span class="info-box-number">
                                    Rp <?= number_format($pendapatanHariIni ?? 0, 0, ',', '.'); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                </section>

                <!-- Welcome Card -->
                <section class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-solid fa-circle-info me-2 text-primary"></i>
                            Ringkasan Dashboard
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h4 class="fw-semibold mb-3">
                                    Selamat Datang, <?= session()->get('name'); ?>
                                </h4>

                                <p class="text-muted mb-0">
                                    Gunakan halaman dashboard ini untuk mengelola data produk,
                                    memantau transaksi, dan mengakses fitur administrasi toko elektronik.
                                    Tampilan ini dibuat lebih rapi dengan gaya AdminLTE agar mudah digunakan
                                    pada desktop maupun perangkat mobile.
                                </p>
                            </div>

                            <div class="col-lg-4 text-center d-none d-lg-block">
                                <i class="fa-solid fa-desktop text-primary" style="font-size: 6rem;"></i>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Menu Card -->
                <section class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">
                            <i class="fa-solid fa-list me-2 text-primary"></i>
                            Menu Utama
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="row g-4">

                            <!-- Produk -->
                            <div class="col-md-4">
                                <div class="card menu-card">
                                    <div class="card-body">
                                        <div class="menu-icon bg-primary-custom">
                                            <i class="fa-solid fa-box-open"></i>
                                        </div>

                                        <h5 class="menu-title">
                                            Manajemen Produk
                                        </h5>

                                        <p class="menu-desc">
                                            Kelola data produk, stok, harga, dan informasi barang elektronik.
                                        </p>

                                        <a href="<?= base_url('admin/produk') ?>" class="btn btn-primary w-100">
                                            <i class="fa-solid fa-arrow-right me-1"></i>
                                            Buka Produk
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Pelanggan -->
                            <div class="col-md-4">
                                <div class="card menu-card">
                                    <div class="card-body">

                                        <div class="menu-icon bg-warning-custom">
                                            <i class="fa-solid fa-users"></i>
                                        </div>

                                        <h5 class="menu-title">
                                            Data Pelanggan
                                        </h5>

                                        <p class="menu-desc">
                                            Kelola data pelanggan yang digunakan pada transaksi penjualan.
                                        </p>

                                        <a href="<?= base_url('admin/pelanggan') ?>" class="btn btn-warning w-100">
                                            <i class="fa-solid fa-arrow-right me-1"></i>
                                            Buka Pelanggan
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="col-md-4">
                                <div class="card menu-card">
                                    <div class="card-body">
                                        <div class="menu-icon bg-info-custom">
                                            <i class="fa-solid fa-tags"></i>
                                        </div>

                                        <h5 class="menu-title">
                                            Kategori Barang
                                        </h5>

                                        <p class="menu-desc">
                                            Atur kategori produk agar data barang lebih terstruktur.
                                        </p>

                                        <button class="btn btn-secondary w-100" disabled>
                                            <i class="fa-solid fa-clock me-1"></i>
                                            Segera Hadir
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Transaksi -->
                            <div class="col-md-4">
                                <div class="card menu-card">
                                    <div class="card-body">
                                        <div class="menu-icon bg-success-custom">
                                            <i class="fa-solid fa-receipt"></i>
                                        </div>

                                        <h5 class="menu-title">
                                            Data Transaksi
                                        </h5>

                                        <p class="menu-desc">
                                            Pantau data transaksi dan laporan penjualan toko.
                                        </p>

                                        <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-success w-100">
                                            <i class="fa-solid fa-arrow-right me-1"></i>
                                            Buka Transaksi
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
                <div class="d-flex flex-column flex-md-row justify-content-between gap-1">
                    <span>
                        &copy; <?= date('Y'); ?> Tech Store Admin Panel.
                    </span>
                    <span>
                        <strong>AdminLTE Style</strong> with Bootstrap 5
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