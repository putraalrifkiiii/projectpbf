<?php
/**
 * @var string $title
 * @var array $pelanggan
 */
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>

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

    /* Tables */
    .table {
        margin-bottom: 0;
        color: #0f172a;
        /* Warna teks gelap tegas agar terbaca jelas */
    }

    .table thead th {
        background-color: #f8fafc;
        color: #475569;
        font-weight: 600;
        font-size: 0.9rem;
        border-bottom: 2px solid #e2e8f0;
        white-space: nowrap;
        padding: 12px 16px;
    }

    .table tbody td {
        vertical-align: middle;
        font-size: 0.9rem;
        border-bottom: 1px solid #f1f5f9;
        padding: 12px 16px;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
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

    .btn-action {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border-radius: 8px;
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

        .table-responsive {
            font-size: 0.85rem;
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
                    <a href="<?= base_url('admin/pelanggan'); ?>" class="nav-link active">
                        <i class="fa-solid fa-users"></i>
                        <span>Data Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/transaksi'); ?>" class="nav-link">
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
                    <h6 class="navbar-title d-none d-sm-block">Basis Data Klien</h6>
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
                        <h1 class="page-title">Data Pelanggan</h1>
                        <p class="text-muted mb-0">Kelola basis data klien, kontak, dan alamat pelanggan.</p>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('admin/dashboard'); ?>">
                                    <i class="fa-solid fa-house me-1"></i> Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Data Pelanggan</li>
                        </ol>
                    </nav>
                </div>

                <!-- Alert Message -->
                <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm border-0" role="alert"
                    style="background-color: #d1e7dd; color: #0f5132;">
                    <i class="fa-solid fa-circle-check me-2"></i>
                    <strong>Berhasil!</strong> <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>

                <!-- Table Card -->
                <div class="card card-accent-top">
                    <div class="card-header">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                            <h5 class="card-title mb-0">
                                <i class="fa-solid fa-users me-2" style="color: var(--tech-primary);"></i>
                                Daftar Pelanggan Aktif
                            </h5>

                            <a href="<?= base_url('admin/pelanggan/create'); ?>" class="btn btn-primary shadow-sm">
                                <i class="fa-solid fa-plus me-1"></i>
                                Tambah Pelanggan Baru
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;" class="text-center">No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No Handphone</th>
                                        <th>Alamat Lengkap</th>
                                        <th style="width: 120px;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (empty($pelanggan)) : ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-5">
                                            <i class="fa-solid fa-user-xmark fs-1 d-block mb-3 text-secondary"
                                                style="opacity: 0.5;"></i>
                                            <h6 class="fw-semibold">Belum ada data pelanggan.</h6>
                                            <p class="mb-0 fs-6">Silakan klik "Tambah Pelanggan Baru" untuk memasukkan
                                                data.</p>
                                        </td>
                                    </tr>
                                    <?php else : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pelanggan as $p) : ?>
                                    <tr>
                                        <td class="text-center fw-medium text-muted"><?= $i++; ?></td>
                                        <td>
                                            <strong class="text-dark"><?= esc($p['nama_pelanggan']); ?></strong>
                                        </td>
                                        <td class="fw-medium text-primary">
                                            <i class="fa-solid fa-phone fa-xs me-1 text-muted"></i>
                                            <?= esc($p['no_hp']); ?>
                                        </td>
                                        <td class="text-muted">
                                            <i class="fa-solid fa-location-dot fa-xs me-1"></i>
                                            <?= esc($p['alamat']); ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="<?= base_url('admin/pelanggan/edit/' . $p['id_pelanggan']); ?>"
                                                    class="btn btn-warning btn-sm btn-action text-white"
                                                    title="Edit Data">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                <form
                                                    action="<?= base_url('admin/pelanggan/delete/' . $p['id_pelanggan']); ?>"
                                                    method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <button type="submit" class="btn btn-danger btn-sm btn-action"
                                                        title="Hapus Data"
                                                        onclick="return confirm('Peringatan: Anda yakin ingin menghapus data pelanggan ini secara permanen?');">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
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