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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #050816;
        font-family: 'Poppins', sans-serif;
        color: white;
        overflow-x: hidden;
    }

    /* Background Glow */
    body::before {
        content: "";
        position: fixed;
        width: 500px;
        height: 500px;
        background: rgba(0, 255, 255, 0.08);
        border-radius: 50%;
        top: -200px;
        left: -100px;
        filter: blur(100px);
        z-index: -1;
    }

    body::after {
        content: "";
        position: fixed;
        width: 400px;
        height: 400px;
        background: rgba(255, 0, 255, 0.08);
        border-radius: 50%;
        bottom: -150px;
        right: -100px;
        filter: blur(100px);
        z-index: -1;
    }

    /* Navbar */
    .navbar {
        background: rgba(10, 10, 20, 0.8);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(0, 255, 255, 0.2);
    }

    .navbar-brand {
        font-family: 'Orbitron', sans-serif;
        font-weight: 700;
        color: #00ffff !important;
        text-shadow: 0 0 10px #00ffff;
    }

    .nav-link {
        color: #cbd5e1 !important;
        transition: 0.3s;
    }

    .nav-link:hover {
        color: #00ffff !important;
        text-shadow: 0 0 10px #00ffff;
    }

    /* HERO CYBERPUNK */
    .hero-card {
        position: relative;
        background:
            linear-gradient(135deg,
                rgba(0, 255, 255, 0.12),
                rgba(255, 0, 255, 0.10));
        border: 1px solid rgba(0, 255, 255, 0.3);
        border-radius: 25px;
        overflow: hidden;
        backdrop-filter: blur(20px);
        box-shadow:
            0 0 20px rgba(0, 255, 255, 0.15),
            0 0 50px rgba(255, 0, 255, 0.1);
    }

    /* Neon Line */
    .hero-card::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 3px;
        top: 0;
        left: 0;
        background: linear-gradient(90deg,
                #00ffff,
                #ff00ff,
                #00ffff);
        animation: neonFlow 4s linear infinite;
    }

    @keyframes neonFlow {
        0% {
            background-position: 0%;
        }

        100% {
            background-position: 200%;
        }
    }

    /* Welcome Text */
    .welcome-title {
        font-family: 'Orbitron', sans-serif;
        font-size: 2.3rem;
        font-weight: 700;
        color: #00ffff;
        text-shadow:
            0 0 5px #00ffff,
            0 0 15px #00ffff,
            0 0 30px #00ffff;
    }

    .welcome-title span {
        color: #ff00ff;
        text-shadow:
            0 0 5px #ff00ff,
            0 0 15px #ff00ff,
            0 0 30px #ff00ff;
    }

    .hero-desc {
        color: #cbd5e1;
        font-size: 1rem;
        line-height: 1.8;
    }

    /* Card */
    .menu-card {
        background: rgba(15, 23, 42, 0.75);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        backdrop-filter: blur(10px);
        transition: all 0.4s ease;
        color: white;
    }

    .menu-card:hover {
        transform: translateY(-10px);
        border-color: #00ffff;
        box-shadow:
            0 0 15px rgba(0, 255, 255, 0.3),
            0 0 40px rgba(0, 255, 255, 0.1);
    }

    /* Icon */
    .menu-icon {
        width: 85px;
        height: 85px;
        margin: auto;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .icon-blue {
        color: #00ffff;
        text-shadow: 0 0 15px #00ffff;
    }

    .icon-pink {
        color: #ff00ff;
        text-shadow: 0 0 15px #ff00ff;
    }

    .icon-yellow {
        color: #ffd700;
        text-shadow: 0 0 15px #ffd700;
    }

    /* Button */
    .btn-cyber {
        border-radius: 12px;
        border: 1px solid #00ffff;
        background: transparent;
        color: #00ffff;
        transition: 0.3s;
        font-weight: 500;
    }

    .btn-cyber:hover {
        background: #00ffff;
        color: black;
        box-shadow: 0 0 20px #00ffff;
    }

    .section-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ffff;
        text-shadow: 0 0 10px #00ffff;
    }

    .text-muted-custom {
        color: #94a3b8;
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark py-3">
        <div class="container">

            <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">
                <i class="bi bi-cpu-fill me-2"></i>
                TECH STORE
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('admin/dashboard') ?>">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/produk') ?>">
                            Produk
                        </a>
                    </li>

                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a class="btn btn-danger rounded-pill px-4" href="<?= base_url('admin/logout') ?>">

                            Logout

                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container py-5">

        <!-- Hero Cyberpunk -->
        <div class="hero-card p-5 mb-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h1 class="welcome-title">
                        WELCOME,
                        <span><?= session()->get('name'); ?></span>
                    </h1>

                    <p class="hero-desc mt-4">
                        Selamat datang di pusat kendali digital
                        Cyber Electro Store.
                        Kelola inventaris elektronik, monitor transaksi,
                        dan optimalkan sistem toko dengan nuansa futuristik
                        cyberpunk.
                    </p>

                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">

                    <i class="bi bi-pc-display-horizontal" style="
                            font-size: 9rem;
                            color: #00ffff;
                            text-shadow:
                                0 0 20px #00ffff,
                                0 0 40px #00ffff;
                        ">
                    </i>

                </div>

            </div>

        </div>

        <!-- Menu -->
        <div class="mb-4">
            <h3 class="section-title">
                SYSTEM MENU
            </h3>
        </div>

        <div class="row g-4">

            <!-- Produk -->
            <div class="col-md-4">

                <div class="card menu-card h-100">

                    <div class="card-body text-center p-4">

                        <div class="menu-icon mb-4">
                            <i class="bi bi-box-seam icon-blue"></i>
                        </div>

                        <h5 class="fw-bold">
                            Manajemen Produk
                        </h5>

                        <p class="text-muted-custom">
                            Kelola stok, harga, dan data produk elektronik.
                        </p>

                        <a href="<?= base_url('admin/produk') ?>" class="btn btn-cyber w-100">

                            Buka Produk

                        </a>

                    </div>

                </div>

            </div>

            <!-- Kategori -->
            <div class="col-md-4">

                <div class="card menu-card h-100">

                    <div class="card-body text-center p-4">

                        <div class="menu-icon mb-4">
                            <i class="bi bi-tags icon-pink"></i>
                        </div>

                        <h5 class="fw-bold">
                            Kategori Barang
                        </h5>

                        <p class="text-muted-custom">
                            Atur kategori perangkat elektronik toko.
                        </p>

                        <button class="btn btn-cyber w-100" disabled>
                            Segera Hadir
                        </button>

                    </div>

                </div>

            </div>

            <!-- Transaksi -->
            <div class="col-md-4">

                <div class="card menu-card h-100">

                    <div class="card-body text-center p-4">

                        <div class="menu-icon mb-4">
                            <i class="bi bi-cart-check icon-yellow"></i>
                        </div>

                        <h5 class="fw-bold">
                            Data Transaksi
                        </h5>

                        <p class="text-muted-custom">
                            Pantau laporan transaksi dan penjualan toko.
                        </p>

                        <a href="<?= base_url('admin/transaksi') ?>" class="btn btn-cyber w-100">
                            Buka Transaksi
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>