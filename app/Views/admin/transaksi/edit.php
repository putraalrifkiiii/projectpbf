<?php
/**
 * @var string $title
 * @var array $transaksi
 */
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Update Transaksi'); ?></title>

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

    /* Cards */
    .card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        margin-bottom: 24px;
    }

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

    .card-footer {
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding: 20px 24px;
        border-radius: 0 0 14px 14px !important;
    }

    /* Form Controls */
    .form-label {
        font-weight: 500;
        color: #334155;
        font-size: 0.95rem;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
        padding: 10px 15px;
        border: 1px solid #cbd5e1;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--tech-primary);
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
    }

    .form-control[readonly] {
        background-color: #f8fafc;
        color: #64748b;
        font-weight: 600;
        cursor: not-allowed;
    }

    /* Buttons */
    .btn {
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        padding: 10px 18px;
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
            <a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
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
                    <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/produk'); ?>" class="nav-link">
                        <i class="fa-solid fa-laptop"></i>
                        <span>Katalog Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pelanggan'); ?>" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Data Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/transaksi'); ?>" class="nav-link active">
                        <i class="fa-solid fa-cart-flatbed"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a href="<?= base_url('admin/logout'); ?>" class="nav-link text-danger">
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
                    <h6 class="navbar-title d-none d-sm-block">Pembaruan Status Transaksi</h6>
                </div>

                <div class="navbar-actions">
                    <div class="dropdown">
                        <button class="btn btn-light border dropdown-toggle d-flex align-items-center gap-2"
                            type="button" data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff" alt="Avatar"
                                class="rounded-circle" width="28">
                            <span class="d-none d-sm-inline"><?= user()->username; ?></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user-gear me-2"></i> Profil</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-cog me-2"></i> Pengaturan</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="<?= base_url('admin/logout'); ?>"><i
                                        class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Content Wrapper -->
            <main class="content-wrapper">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-2">
                    <div>
                        <h1 class="page-title">Update Transaksi</h1>
                        <p class="text-muted mb-0">Perbarui status tagihan atau pesanan pelanggan.</p>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('admin/dashboard'); ?>">
                                    <i class="fa-solid fa-house me-1"></i> Home
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('admin/transaksi'); ?>">Transaksi</a>
                            </li>
                            <li class="breadcrumb-item active">Update Status</li>
                        </ol>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <div class="card card-accent-top">
                            <div class="card-header bg-white">
                                <h5 class="card-title mb-0">
                                    <i class="fa-solid fa-pen-to-square me-2" style="color: var(--tech-primary);"></i>
                                    Formulir Status Pesanan #TRX<?= str_pad($transaksi['id'], 5, '0', STR_PAD_LEFT); ?>
                                </h5>
                            </div>

                            <form action="<?= base_url('admin/transaksi/update/' . $transaksi['id']) ?>" method="post">
                                <?= csrf_field() ?>

                                <div class="card-body">

                                    <div class="mb-4">
                                        <label class="form-label">
                                            <i class="fa-solid fa-wallet text-muted me-1"></i> Total Pembayaran Tagihan
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary">Rp</span>
                                            <input type="text" class="form-control"
                                                value="<?= number_format($transaksi['total'] ?? 0, 0, ',', '.') ?>"
                                                readonly>
                                        </div>
                                        <small class="text-muted mt-1 d-block">*Total harga ini dihitung otomatis oleh
                                            sistem dan tidak dapat diubah di sini.</small>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">
                                            <i class="fa-solid fa-clipboard-check text-muted me-1"></i> Status Pemesanan
                                            Saat Ini
                                        </label>
                                        <select name="status" class="form-select form-select-lg fs-6" required>
                                            <option value="Pending"
                                                <?= ($transaksi['status'] == 'Pending') ? 'selected' : ''; ?>>
                                                ⏳ Pending (Menunggu Pembayaran / Diproses)
                                            </option>
                                            <option value="Selesai"
                                                <?= ($transaksi['status'] == 'Selesai' || $transaksi['status'] == 'Sukses') ? 'selected' : ''; ?>>
                                                ✅ Selesai (Pembayaran Diterima / Barang Terkirim)
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="card-footer bg-light d-flex justify-content-end gap-2">
                                    <a href="<?= base_url('admin/transaksi'); ?>"
                                        class="btn btn-light border text-secondary shadow-sm">
                                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                                    </a>

                                    <button type="submit" class="btn btn-primary shadow-sm">
                                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Status
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Panel Informasi Bantuan -->
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="card border-0 bg-primary text-white shadow-sm h-100"
                            style="background: linear-gradient(135deg, var(--tech-primary), #1e40af);">
                            <div class="card-body p-4 d-flex flex-column justify-content-center text-center">
                                <i class="fa-solid fa-money-check-dollar mb-3"
                                    style="font-size: 3.5rem; color: var(--tech-accent);"></i>
                                <h4 class="fw-bold mb-3">Informasi Pembaruan Status</h4>
                                <p class="mb-0" style="color: #cbd5e1; line-height: 1.6; font-size: 0.95rem;">
                                    Gunakan form ini untuk memperbarui status perjalanan transaksi. Jika pembayaran
                                    telah dilunasi dan barang elektronik sudah diterima oleh pelanggan, silakan ubah
                                    status menjadi <strong>"Selesai"</strong> agar tercatat dalam laporan pendapatan
                                    final sistem.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

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