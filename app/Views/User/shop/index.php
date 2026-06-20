<?= $this->extend('layout') ?>

<?php
/**
 * Mendeklarasikan variabel untuk Intelephense agar tidak muncul warning P1008
 * @var array $produk
 */
?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold">Katalog Produk Elektronik</h2>
            <p class="text-muted">Temukan berbagai pilihan Laptop, Smartphone, dan Aksesoris.</p>
        </div>

        <div class="col-auto d-flex gap-2 align-items-center">

            <?php if (logged_in()): ?>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-5"></i>
                    <span class="d-none d-sm-inline"><?= esc(user()->username) ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                    <li>
                        <a class="dropdown-item py-2" href="<?= base_url('profil') ?>">
                            <i class="bi bi-person me-2 text-primary"></i> Profil Saya
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="<?= base_url('riwayat') ?>">
                            <i class="bi bi-clock-history me-2 text-success"></i> Riwayat Belanja
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item py-2 text-danger" href="<?= base_url('logout') ?>">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
            <?php else: ?>
            <a href="<?= base_url('login') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
            <?php endif; ?>

            <a href="<?= base_url('cart') ?>" class="btn btn-outline-primary position-relative">
                <i class="bi bi-cart"></i> <span class="d-none d-sm-inline">Keranjang</span>
                <?php if (session()->get('cart')): ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= count(session()->get('cart')) ?>
                </span>
                <?php endif; ?>
            </a>

        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach ($produk as $p): ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="<?= base_url('assets/images/placeholder.jpg') ?>" class="card-img-top"
                    alt="<?= esc($p['nama_produk']) ?>" style="height: 200px; object-fit: cover;">

                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <span class="badge bg-secondary"><?= esc($p['nama_kategori']) ?></span>
                    </div>

                    <h5 class="card-title fw-bold text-truncate" title="<?= esc($p['nama_produk']) ?>">
                        <?= esc($p['nama_produk']) ?>
                    </h5>
                    <h6 class="card-subtitle mb-3 text-danger fw-bold">
                        Rp <?= number_format($p['harga'], 0, ',', '.') ?>
                    </h6>

                    <p class="card-text small text-muted mb-4">
                        Stok Tersedia:
                        <?= $p['stok'] > 0 ? $p['stok'] : '<span class="text-danger fw-bold">Habis</span>' ?>
                    </p>

                    <div class="mt-auto d-flex gap-2">
                        <a href="<?= base_url('shop/detail/' . $p['id_produk']) ?>"
                            class="btn btn-outline-secondary w-50">Detail</a>

                        <?php if ($p['stok'] > 0): ?>
                        <form action="<?= base_url('cart/add') ?>" method="POST" class="w-50">
                            <input type="hidden" name="id_produk" value="<?= $p['id_produk'] ?>">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" class="btn btn-primary w-100">Beli</button>
                        </form>
                        <?php else: ?>
                        <button class="btn btn-secondary w-50" disabled>Beli</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>