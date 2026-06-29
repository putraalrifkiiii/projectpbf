```html
<?= $this->extend('layout') ?>

<?php
/**
 * @var array $produk
 */
?>

<?= $this->section('content') ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Roboto:wght@300;400;500;700&display=swap');

body {
    background-color: #0a0a0a;
    background-image: radial-gradient(circle at top right, #1a0505 0%, #0a0a0a 40%);
    color: #ffffff;
    font-family: 'Roboto', sans-serif;
    min-height: 100vh;
}

/* HEADER */
.catalog-title {
    font-family: 'Orbitron', sans-serif;
    font-size: 2.5rem;
    font-weight: 900;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 2px;
    border-left: 6px solid #ed1c24;
    /* Red Accent */
    padding-left: 15px;
    margin-bottom: 10px;
}

.catalog-subtitle {
    color: #888888;
    font-size: 1rem;
    font-weight: 300;
}

/* CARD */
.card {
    background-color: #111111;
    border: 1px solid #222222;
    border-radius: 0;
    /* Sharp corners */
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    border-color: #ed1c24;
    box-shadow: 0 10px 25px rgba(237, 28, 36, 0.15);
}

.card-img-top {
    background: #ffffff;
    height: 220px !important;
    object-fit: contain !important;
    padding: 20px;
    border-bottom: 1px solid #222222;
}

.card-title {
    color: #ffffff;
    font-weight: 700;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}

.card-subtitle {
    font-size: 1.3rem;
    font-family: 'Orbitron', sans-serif;
    font-weight: 700;
    color: #ed1c24;
    margin-top: 10px;
}

/* BADGE */
.badge-category {
    background-color: #1a1a1a;
    border: 1px solid #333333;
    color: #aaaaaa;
    border-radius: 0;
    padding: 6px 12px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* BUTTONS */
.btn {
    border-radius: 0;
    /* Sharp edges */
    text-transform: uppercase;
    font-family: 'Orbitron', sans-serif;
    font-weight: 700;
    font-size: 0.85rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #ed1c24;
    border: 1px solid #ed1c24;
    color: #ffffff;
}

.btn-primary:hover {
    background-color: #c81018;
    border-color: #c81018;
    box-shadow: 0 0 15px rgba(237, 28, 36, 0.4);
    color: #ffffff;
}

.btn-outline-secondary {
    border: 1px solid #444444;
    color: #ffffff;
    background: transparent;
}

.btn-outline-secondary:hover {
    background: #2a2a2a;
    border-color: #666666;
    color: #ffffff;
}

.btn-outline-primary {
    border: 1px solid #ed1c24;
    color: #ed1c24;
    background: transparent;
}

.btn-outline-primary:hover {
    background: #ed1c24;
    color: #ffffff;
}

/* DROPDOWN NAV */
.dropdown-menu {
    background-color: #111111;
    border: 1px solid #333333;
    border-radius: 0;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
}

.dropdown-item {
    color: #cccccc;
    font-weight: 400;
}

.dropdown-item:hover {
    background-color: #ed1c24;
    color: #ffffff;
}

.dropdown-divider {
    border-top-color: #333333;
}

/* ALERTS */
.alert {
    border-radius: 0;
    border: none;
    border-left: 4px solid;
    font-weight: 500;
}

.alert-success {
    background-color: #102a16;
    color: #4ade80;
    border-left-color: #4ade80;
}

.alert-danger {
    background-color: #2a1010;
    color: #f87171;
    border-left-color: #ed1c24;
}

/* UTILS */
.badge.rounded-pill {
    background: #ed1c24 !important;
    border-radius: 0 !important;
    /* Force sharp corner for pill */
    padding: 4px 8px;
}

.stock-text {
    color: #666666;
    font-size: 0.9rem;
    font-weight: 500;
}
</style>

<div class="container py-5">

    <div class="row mb-5 align-items-center">

        <div class="col">
            <h2 class="catalog-title">
                Katalog Produk
            </h2>

            <p class="catalog-subtitle">
                Temukan Perangkat High-Performance & Aksesoris Terbaik
            </p>
        </div>

        <div class="col-auto d-flex gap-2 align-items-center">

            <?php if (logged_in()): ?>

            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center gap-2" type="button"
                    data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle"></i>

                    <span class="d-none d-sm-inline text-capitalize">
                        <?= esc(user()->username) ?>
                    </span>

                </button>

                <ul class="dropdown-menu dropdown-menu-end mt-2">

                    <li>
                        <a class="dropdown-item py-2" href="<?= base_url('profil') ?>">
                            <i class="bi bi-person me-2"></i>
                            Profil Saya
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item py-2" href="<?= base_url('riwayat') ?>">
                            <i class="bi bi-clock-history me-2"></i>
                            Riwayat Belanja
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item py-2 text-danger" href="<?= base_url('logout') ?>">
                            <i class="bi bi-power me-2"></i>
                            Logout
                        </a>
                    </li>

                </ul>
            </div>

            <?php else: ?>

            <a href="<?= base_url('login') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-box-arrow-in-right me-1"></i>
                Login
            </a>

            <?php endif; ?>

            <a href="<?= base_url('cart') ?>" class="btn btn-outline-primary position-relative">

                <i class="bi bi-cart-fill"></i>

                <span class="d-none d-sm-inline ms-1">
                    Keranjang
                </span>

                <?php if (session()->get('cart')): ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                    <?= count(session()->get('cart')) ?>
                </span>
                <?php endif; ?>

            </a>

        </div>

    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm">
        <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

        <?php foreach ($produk as $p): ?>

        <div class="col">

            <div class="card h-100">

                <img src="<?= !empty($p['gambar'])
                        ? base_url('uploads/produk/' . $p['gambar'])
                        : base_url('assets/images/image.png') ?>" class="card-img-top"
                    alt="<?= esc($p['nama_produk']) ?>">

                <div class="card-body d-flex flex-column">

                    <div class="mb-3">
                        <span class="badge badge-category">
                            <?= esc($p['nama_kategori']) ?>
                        </span>
                    </div>

                    <h5 class="card-title">
                        <?= esc($p['nama_produk']) ?>
                    </h5>

                    <h6 class="card-subtitle mb-3">
                        Rp <?= number_format($p['harga'], 0, ',', '.') ?>
                    </h6>

                    <p class="stock-text mb-4">
                        <i class="bi bi-box-seam me-1"></i> Stok :
                        <?php if ($p['stok'] > 0): ?>
                        <span class="text-white"><?= $p['stok'] ?> Unit</span>
                        <?php else: ?>
                        <span class="text-danger fw-bold">
                            HABIS
                        </span>
                        <?php endif; ?>
                    </p>

                    <div class="mt-auto d-flex gap-2">

                        <a href="<?= base_url('shop/detail/' . $p['id_produk']) ?>"
                            class="btn btn-outline-secondary w-50">
                            Detail
                        </a>

                        <?php if ($p['stok'] > 0): ?>

                        <form action="<?= base_url('cart/add') ?>" method="POST" class="w-50">
                            <input type="hidden" name="id_produk" value="<?= $p['id_produk'] ?>">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" class="btn btn-primary w-100">
                                Beli
                            </button>
                        </form>

                        <?php else: ?>

                        <button class="btn btn-outline-secondary w-50" disabled>
                            Habis
                        </button>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>

<?= $this->endSection() ?>