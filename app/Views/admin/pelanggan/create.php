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
    <title><?= esc($title ?? 'Tambah Pelanggan'); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
    }

    .main-sidebar {
        width: 250px;
        min-height: 100vh;
        background: #343a40;
        position: fixed;
        top: 0;
        left: 0;
    }

    .brand-link {
        height: 57px;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 0 20px;
        font-weight: 600;
        border-bottom: 1px solid rgba(255, 255, 255, .1);
    }

    .sidebar-menu {
        list-style: none;
        padding: 12px;
        margin: 0;
    }

    .sidebar-menu a {
        color: #c2c7d0;
        text-decoration: none;
        display: block;
        padding: 10px 14px;
        border-radius: 6px;
    }

    .sidebar-menu a:hover,
    .sidebar-menu a.active {
        background: #0d6efd;
        color: #fff;
    }

    .main-content {
        margin-left: 250px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .main-header {
        height: 57px;
        background: #fff;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 24px;
    }

    .content-wrapper {
        flex: 1;
        padding: 24px;
    }

    .card {
        border: none;
        box-shadow: 0 0 1px rgba(0, 0, 0, .12), 0 1px 3px rgba(0, 0, 0, .15);
    }

    .main-footer {
        background: #fff;
        border-top: 1px solid #dee2e6;
        padding: 14px 24px;
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .main-sidebar {
            position: relative;
            width: 100%;
            min-height: auto;
        }

        .main-content {
            margin-left: 0;
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
            <h6 class="mb-0 fw-semibold">Tambah Pelanggan</h6>

            <a href="<?= base_url('admin/logout'); ?>" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
            </a>
        </nav>

        <main class="content-wrapper">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h3 class="fw-semibold mb-1">Tambah Data Pelanggan</h3>
                    <p class="text-muted mb-0">Masukkan data pelanggan baru.</p>
                </div>

                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin/dashboard'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin/pelanggan'); ?>">Pelanggan</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </nav>
            </div>

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fa-solid fa-user-plus me-2 text-primary"></i>
                        Form Tambah Pelanggan
                    </h5>
                </div>

                <form action="<?= base_url('admin/pelanggan/store'); ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control"
                                placeholder="Masukkan nama pelanggan" value="<?= old('nama_pelanggan'); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                placeholder="Masukkan nomor HP" value="<?= old('no_hp'); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="4"
                                placeholder="Masukkan alamat pelanggan" required><?= old('alamat'); ?></textarea>
                        </div>

                    </div>

                    <div class="card-footer bg-white d-flex justify-content-end gap-2">
                        <a href="<?= base_url('admin/pelanggan'); ?>" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left me-1"></i>
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-1"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </main>

        <footer class="main-footer">
            <div class="d-flex justify-content-between">
                <span>&copy; <?= date('Y'); ?> Tech Store Admin Panel.</span>
                <span><strong>AdminLTE Style</strong></span>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>