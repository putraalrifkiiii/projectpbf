<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Toko Elektronik' ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
    body {
        background-color: #f8f9fa;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">
                <i class="bi bi-cpu-fill text-primary me-2"></i>Toko Elektronik
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">

                    <li class="nav-item">
                        <a class="nav-link <?= (url_is('/')) ? 'active fw-bold' : '' ?>" href="<?= base_url('/') ?>">
                            <i class="bi bi-shop me-1"></i> Katalog
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (url_is('riwayat')) ? 'active fw-bold' : '' ?>"
                            href="<?= base_url('/riwayat') ?>">
                            <i class="bi bi-clock-history me-1"></i> Riwayat Transaksi
                        </a>
                    </li>

                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a href="<?= base_url('/cart') ?>" class="btn btn-outline-light position-relative">
                            <i class="bi bi-cart3"></i> Keranjang
                            <?php if (session()->get('cart')): ?>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= count(session()->get('cart')) ?>
                            </span>
                            <?php endif; ?>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main style="min-height: 80vh;">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y') ?> Toko Elektronik. All rights reserved.</p>
        </div>
    </footer>

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>