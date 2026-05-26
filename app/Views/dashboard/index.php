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

    <!-- Link CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <!-- 1. NAVBAR (Menu Atas) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                <i class="bi bi-shop me-2"></i>Toko Elektronik
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produk">Daftar Produk</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-danger btn-sm mt-1" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 2. KONTEN UTAMA DASHBOARD -->
    <div class="container mt-5">

        <!-- Banner Selamat Datang -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div>
                            <h3 class="fw-bold">Selamat datang, <?= session()->get('name'); ?>!</h3>
                            <p class="mb-0">Ini adalah pusat kendali sistem informasi Toko Elektronik. Anda dapat
                                memonitor dan mengelola data inventaris melalui panel di bawah ini.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid Menu (Fitur-fitur) -->
        <div class="row g-4">

            <!-- Menu 1: Mengarah ke CRUD Produk -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <i class="bi bi-box-seam display-4 text-primary mb-3"></i>
                        <h5 class="card-title fw-bold">Manajemen Produk</h5>
                        <p class="card-text text-muted">Lihat dan kelola daftar barang elektronik, harga, beserta stok
                            barang yang tersedia.</p>
                        <!-- Tombol yang mengarah ke route /produk -->
                        <a href="/produk" class="btn btn-outline-primary w-100">Buka Daftar Produk</a>
                    </div>
                </div>
            </div>

            <!-- Menu 2: Kategori (Opsional / Segera Hadir) -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <i class="bi bi-tags display-4 text-success mb-3"></i>
                        <h5 class="card-title fw-bold">Kategori Barang</h5>
                        <p class="card-text text-muted">Kelola jenis kategori seperti Laptop, Smartphone, Kamera, dan
                            Aksesoris lainnya.</p>
                        <button class="btn btn-outline-success w-100" disabled>Segera Hadir</button>
                    </div>
                </div>
            </div>

            <!-- Menu 3: Transaksi (Opsional / Segera Hadir) -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <i class="bi bi-cart-check display-4 text-warning mb-3"></i>
                        <h5 class="card-title fw-bold">Data Transaksi</h5>
                        <p class="card-text text-muted">Pantau rekap transaksi, faktur pelanggan, dan laporan hasil
                            penjualan toko.</p>
                        <button class="btn btn-outline-warning w-100" disabled>Segera Hadir</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Script Javascript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>