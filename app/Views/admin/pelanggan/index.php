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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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

    <aside class="main-sidebar">
        <a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
            <i class="fa-solid fa-store me-2"></i>
            TECH STORE
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
            <li>
                <a href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/produk'); ?>">
                    <i class="fa-solid fa-box me-2"></i> Produk
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/pelanggan'); ?>" class="active">
                    <i class="fa-solid fa-users me-2"></i> Pelanggan
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/transaksi'); ?>">
                    <i class="fa-solid fa-cart-shopping me-2"></i> Transaksi
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/logout'); ?>">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                </a>
            </li>
        </ul>
    </aside>

    <div class="main-content">

        <nav class="main-header">
            <h6 class="mb-0 fw-semibold">Manajemen Pelanggan</h6>

            <a href="<?= base_url('admin/logout'); ?>" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-right-from-bracket me-1"></i>
                Logout
            </a>
        </nav>

        <main class="content-wrapper">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
                <div>
                    <h3 class="fw-semibold mb-1">Data Pelanggan</h3>
                    <p class="text-muted mb-0">Kelola data pelanggan toko elektronik.</p>
                </div>

                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin/dashboard'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Pelanggan</li>
                    </ol>
                </nav>
            </div>

            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header bg-white">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-users me-2 text-primary"></i>
                            Daftar Pelanggan
                        </h5>

                        <a href="<?= base_url('admin/pelanggan/create'); ?>" class="btn btn-primary">
                            <i class="fa-solid fa-plus me-1"></i>
                            Tambah Pelanggan
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (empty($pelanggan)) : ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="fa-solid fa-inbox fs-1 d-block mb-2"></i>
                                        Belum ada data pelanggan.
                                    </td>
                                </tr>
                                <?php else : ?>
                                <?php $i = 1; ?>
                                <?php foreach ($pelanggan as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><strong><?= esc($p['nama_pelanggan']); ?></strong></td>
                                    <td><?= esc($p['no_hp']); ?></td>
                                    <td><?= esc($p['alamat']); ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="<?= base_url('admin/pelanggan/edit/' . $p['id_pelanggan']); ?>"
                                                class="btn btn-warning btn-sm btn-action" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form
                                                action="<?= base_url('admin/pelanggan/delete/' . $p['id_pelanggan']); ?>"
                                                method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">

                                                <button type="submit" class="btn btn-danger btn-sm btn-action"
                                                    title="Hapus"
                                                    onclick="return confirm('Yakin ingin menghapus data pelanggan ini?');">
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
            </div>

        </main>

        <footer class="main-footer">
            <div class="d-flex flex-column flex-md-row justify-content-between gap-1">
                <span>&copy; <?= date('Y'); ?> Tech Store Admin Panel.</span>
                <span><strong>AdminLTE Style</strong> with Bootstrap 5</span>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>