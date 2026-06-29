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
    <title><?= esc($title); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

    .main-content {
        margin-left: 250px;
        width: calc(100% - 250px);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

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

    .table {
        margin-bottom: 0;
        color: #343a40;
    }

    .table thead th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: 600;
        font-size: 0.9rem;
        border-bottom: 1px solid #dee2e6;
        white-space: nowrap;
    }

    .table tbody td {
        vertical-align: middle;
        font-size: 0.9rem;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .btn {
        border-radius: 6px;
        font-size: 0.88rem;
    }

    .btn-action {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .badge-status {
        padding: 7px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .main-footer {
        background: #ffffff;
        border-top: 1px solid #dee2e6;
        padding: 14px 24px;
        font-size: 0.9rem;
        color: #6c757d;
    }

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
                    <div class="user-name">Admin</div>
                    <div class="user-role">Administrator</div>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
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

                    <h6 class="navbar-title">Manajemen Transaksi</h6>
                </div>

                <div>
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-gauge-high me-1"></i>
                        Dashboard
                    </a>
                </div>
            </nav>

            <!-- Content Wrapper -->
            <main class="content-wrapper">

                <!-- Content Header -->
                <section class="content-header">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                        <div>
                            <h1 class="page-title">Data Transaksi</h1>
                            <p class="text-muted mb-0">
                                Kelola data transaksi pelanggan dan status pembayaran.
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
                                    Transaksi
                                </li>
                            </ol>
                        </nav>
                    </div>
                </section>

                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <!-- Table Card -->
                <section class="card">
                    <div class="card-header">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                            <div>
                                <h3 class="card-title">
                                    <i class="fa-solid fa-receipt me-2 text-primary"></i>
                                    List Transaksi
                                </h3>
                                <small class="text-muted">
                                    Daftar transaksi yang tercatat pada sistem.
                                </small>
                            </div>

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="fa-solid fa-plus me-1"></i>
                                Tambah Transaksi
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th style="width: 120px;">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (empty($transaksi)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            <i class="fa-solid fa-inbox fs-1 d-block mb-2"></i>
                                            Belum ada data transaksi yang masuk ke sistem.
                                        </td>
                                    </tr>
                                    <?php else: ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>

                                        <td>
                                            <strong><?= esc($t['nama_pelanggan']); ?></strong>
                                        </td>

                                        <td>
                                            <?= date('d M Y, H:i', strtotime($t['tanggal'])); ?> WIB
                                        </td>

                                        <td>
                                            Rp <?= number_format($t['total'], 0, ',', '.'); ?>
                                        </td>

                                        <td>
                                            <?php
                                                    $status = strtolower($t['status']);
                                        if ($status == 'selesai' || $status == 'sukses') :
                                            ?>
                                            <span class="badge bg-success badge-status">
                                                <?= esc($t['status']); ?>
                                            </span>
                                            <?php else : ?>
                                            <span class="badge bg-warning text-dark badge-status">
                                                <?= esc($t['status']); ?>
                                            </span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2">

                                                <a href="<?= base_url('admin/transaksi/detail/' . $t['id']) ?>"
                                                    class="btn btn-info btn-sm btn-action" title="Detail">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="<?= base_url('admin/transaksi/edit/' . $t['id']) ?>"
                                                    class="btn btn-warning btn-sm btn-action" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                <form action="<?= base_url('admin/transaksi/delete/' . $t['id']) ?>"
                                                    method="post" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <button type="submit" class="btn btn-danger btn-sm btn-action"
                                                        title="Hapus"
                                                        onclick="return confirm('Yakin menghapus data transaksi <?= esc($t['nama_pelanggan']) ?>?')">
                                                        <i class="fa-solid fa-trash"></i>
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
                </section>

            </main>

            <!-- Footer -->
            <footer class="main-footer">
                <div class="d-flex flex-column flex-md-row justify-content-between gap-1">
                    <span>&copy; <?= date('Y'); ?> Tech Store Admin Panel.</span>
                    <span><strong>AdminLTE Style</strong> with Bootstrap 5</span>
                </div>
            </footer>

        </div>
    </div>

    <?= $this->include('admin/transaksi/create'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
    </script>

</body>

</html>