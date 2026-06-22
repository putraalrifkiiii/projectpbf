<?= $this->extend('layout') ?>

<?php
/**
 * @var array $produk
 */
?>

<?= $this->section('content') ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;800&family=Poppins:wght@300;400;500;600&display=swap');

body{
    background: linear-gradient(
        135deg,
        #f8fafc 0%,
        #dbeafe 35%,
        #ede9fe 70%,
        #fce7f3 100%
    );
    font-family:'Poppins',sans-serif;
    min-height:100vh;
}

/* HEADER */
.catalog-title{
    font-family:'Orbitron',sans-serif;
    font-size:2.8rem;
    font-weight:800;
    background:linear-gradient(
        90deg,
        #2563eb,
        #7c3aed,
        #ec4899
    );
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.catalog-subtitle{
    color:#64748b;
    font-size:1rem;
}

/* CARD */
.card{
    border:none;
    border-radius:24px;
    overflow:hidden;
    background:rgba(255,255,255,.75);
    backdrop-filter:blur(15px);
    transition:.3s ease;

    box-shadow:
        0 10px 25px rgba(0,0,0,.08);
}

.card:hover{
    transform:
        translateY(-8px)
        scale(1.02);

    box-shadow:
        0 20px 35px rgba(37,99,235,.15);
}

.card-img-top{
    background:white;
    height:220px !important;
    object-fit:contain !important;
    padding:15px;
}

.card-title{
    color:#111827;
    font-weight:700;
}

.card-subtitle{
    font-size:1.2rem;
    font-weight:700;

    background:linear-gradient(
        90deg,
        #ef4444,
        #f97316
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

/* BADGE */
.badge{
    border:none !important;
    border-radius:50px;
    padding:8px 12px;

    background:linear-gradient(
        90deg,
        #3b82f6,
        #8b5cf6
    ) !important;

    color:white !important;
}

/* BUTTON */
.btn-outline-secondary{
    border:none;
    background:#f1f5f9;
    color:#334155;
}

.btn-outline-secondary:hover{
    background:#3b82f6;
    color:white;
}

.btn-primary{
    border:none;
    background:linear-gradient(
        90deg,
        #2563eb,
        #7c3aed
    );
}

.btn-primary:hover{
    transform:scale(1.03);
}

.btn-outline-primary{
    border:none;
    background:linear-gradient(
        90deg,
        #10b981,
        #06b6d4
    );
    color:white;
}

.btn-outline-primary:hover{
    color:white;
}

.dropdown-menu{
    border:none;
    border-radius:16px;
    box-shadow:
        0 15px 35px rgba(0,0,0,.12);
}

.alert-success{
    border:none;
    background:#dcfce7;
}

.alert-danger{
    border:none;
    background:#fee2e2;
}

.badge.rounded-pill{
    background:#ef4444 !important;
}

.stock-text{
    color:#64748b;
}
</style>

<div class="container py-5">

    <div class="row mb-5 align-items-center">

        <div class="col">
            <h2 class="catalog-title">
                Katalog Produk
            </h2>

            <p class="catalog-subtitle">
                Temukan Laptop, Smartphone, dan Aksesoris Terbaik Dengan Harga Terjangkau
            </p>
        </div>

        <div class="col-auto d-flex gap-2 align-items-center">

            <?php if (logged_in()): ?>

            <div class="dropdown">
                <button class="btn btn-light border dropdown-toggle d-flex align-items-center gap-2"
                    type="button"
                    data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle"></i>

                    <span class="d-none d-sm-inline">
                        <?= esc(user()->username) ?>
                    </span>

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="<?= base_url('profil') ?>">
                            <i class="bi bi-person me-2"></i>
                            Profil Saya
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="<?= base_url('riwayat') ?>">
                            <i class="bi bi-clock-history me-2"></i>
                            Riwayat Belanja
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item text-danger"
                            href="<?= base_url('logout') ?>">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </a>
                    </li>

                </ul>
            </div>

            <?php else: ?>

            <a href="<?= base_url('login') ?>"
                class="btn btn-outline-secondary">

                <i class="bi bi-box-arrow-in-right"></i>
                Login

            </a>

            <?php endif; ?>

            <a href="<?= base_url('cart') ?>"
                class="btn btn-outline-primary position-relative">

                <i class="bi bi-cart-fill"></i>

                <span class="d-none d-sm-inline">
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
    <div class="alert alert-success alert-dismissible fade show">
        <?= session()->getFlashdata('success') ?>
        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <?= session()->getFlashdata('error') ?>
        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

        <?php foreach ($produk as $p): ?>

        <div class="col">

            <div class="card h-100">

                <img
                    src="<?= !empty($p['gambar'])
                        ? base_url('uploads/produk/' . $p['gambar'])
                        : base_url('assets/images/placeholder.jpg') ?>"
                    class="card-img-top"
                    alt="<?= esc($p['nama_produk']) ?>">

                <div class="card-body d-flex flex-column">

                    <div class="mb-3">
                        <span class="badge">
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
                        Stok :
                        <?php if ($p['stok'] > 0): ?>
                            <?= $p['stok'] ?>
                        <?php else: ?>
                            <span class="text-danger fw-bold">
                                Habis
                            </span>
                        <?php endif; ?>
                    </p>

                    <div class="mt-auto d-flex gap-2">

                        <a href="<?= base_url('shop/detail/' . $p['id_produk']) ?>"
                            class="btn btn-outline-secondary w-50">
                            Detail
                        </a>

                        <?php if ($p['stok'] > 0): ?>

                        <form action="<?= base_url('cart/add') ?>"
                            method="POST"
                            class="w-50">

                            <input type="hidden"
                                name="id_produk"
                                value="<?= $p['id_produk'] ?>">

                            <input type="hidden"
                                name="qty"
                                value="1">

                            <button type="submit"
                                class="btn btn-primary w-100">

                                <i class="bi bi-bag-fill me-1"></i>
                                Beli

                            </button>

                        </form>

                        <?php else: ?>

                        <button class="btn btn-secondary w-50"
                            disabled>
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