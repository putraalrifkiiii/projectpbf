<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Toko Elektronik' ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <style>
    /* GLOBAL STYLES */
    body {
        background-color: #0a0a0a;
        color: #ffffff;
        font-family: 'Roboto', sans-serif;
    }

    /* NAVBAR STYLES */
    .navbar {
        background-color: #000000 !important;
        border-bottom: 2px solid #ed1c24;
        /* Aksen merah ala MSI */
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .navbar-brand {
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        font-size: 1.5rem;
        letter-spacing: 2px;
        color: #ffffff !important;
        text-transform: uppercase;
    }

    .navbar-brand .brand-accent {
        color: #ed1c24;
        /* Warna merah */
    }

    .navbar-toggler {
        border-color: #333333;
        border-radius: 0;
    }

    .navbar-toggler-icon {
        filter: invert(1);
        /* Memastikan icon burger menu berwarna putih */
    }

    .nav-link {
        color: #aaaaaa !important;
        font-family: 'Orbitron', sans-serif;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-link:hover,
    .nav-link.active {
        color: #ffffff !important;
    }

    /* Efek garis bawah merah saat hover/aktif */
    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #ed1c24;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }

    /* FOOTER STYLES */
    footer {
        background-color: #050505 !important;
        border-top: 1px solid #1a1a1a;
        font-family: 'Orbitron', sans-serif;
        letter-spacing: 1px;
        font-size: 0.8rem;
    }

    footer .text-accent {
        color: #ed1c24;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top shadow-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
                <i class="bi bi-motherboard-fill me-2 brand-accent fs-3"></i>
                <span>Tech<span class="brand-accent">Store</span></span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">

                    <li class="nav-item">
                        <a class="nav-link <?= (url_is('/')) ? 'active' : '' ?>" href="<?= base_url('/') ?>">
                            <i class="bi bi-grid-fill me-1"></i> Katalog
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (url_is('riwayat')) ? 'active' : '' ?>"
                            href="<?= base_url('/riwayat') ?>">
                            <i class="bi bi-clock-history me-1"></i> Riwayat
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main style="min-height: 80vh;">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0 text-white">
                &copy; <?= date('Y') ?> <span class="text-white fw-bold">TECH<span class="text-accent">STORE</span> All
                    rights reserved.</span>
            </p>
        </div>
    </footer>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>