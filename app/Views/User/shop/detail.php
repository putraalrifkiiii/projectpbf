<?= $this->extend('layout') ?>

<?php
/**
 * Mendeklarasikan variabel untuk Intelephense agar tidak muncul warning P1008
 * @var array $produk
 */
?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="mb-4">
        <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali ke Katalog
        </a>
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

    <div class="card shadow-sm border-0">
        <div class="row g-0">
            <div class="col-md-5 d-flex align-items-center justify-content-center bg-light p-4 rounded-start">
                <img src="<?= base_url('assets/images/placeholder.jpg') ?>" class="img-fluid rounded"
                    alt="<?= esc($produk['nama_produk']) ?>" style="max-height: 400px; object-fit: contain;">
            </div>

            <div class="col-md-7">
                <div class="card-body p-5">
                    <span class="badge bg-secondary mb-3 px-3 py-2 fs-6">
                        <?= esc($produk['nama_kategori']) ?>
                    </span>

                    <h2 class="card-title fw-bold mb-3"><?= esc($produk['nama_produk']) ?></h2>

                    <h3 class="text-danger fw-bold mb-4">
                        Rp <?= number_format($produk['harga'], 0, ',', '.') ?>
                    </h3>

                    <div class="mb-4">
                        <p class="fs-5 mb-1">
                            Status Stok:
                            <?php if ($produk['stok'] > 10): ?>
                            <span class="badge bg-success">Tersedia (<?= $produk['stok'] ?>)</span>
                            <?php elseif ($produk['stok'] > 0 && $produk['stok'] <= 10): ?>
                            <span class="badge bg-warning text-dark">Sisa Sedikit (<?= $produk['stok'] ?>)</span>
                            <?php else: ?>
                            <span class="badge bg-danger">Habis</span>
                            <?php endif; ?>
                        </p>
                        <small class="text-muted">Barang yang sudah dibeli tidak dapat dikembalikan kecuali ada cacat
                            pabrik.</small>
                    </div>

                    <hr class="my-4">

                    <?php if ($produk['stok'] > 0): ?>
                    <form action="<?= base_url('cart/add') ?>" method="POST">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

                        <div class="row align-items-center">
                            <div class="col-auto">
                                <label for="qty" class="col-form-label fw-bold">Kuantitas:</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" name="qty" id="qty" class="form-control" value="1" min="1"
                                    max="<?= $produk['stok'] ?>" required style="width: 100px;">
                            </div>
                            <div class="col mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm">
                                    <i class="bi bi-cart-plus"></i> Masukkan Keranjang
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php else: ?>
                    <div class="alert alert-secondary text-center" role="alert">
                        <i class="bi bi-info-circle me-2"></i> Mohon maaf, produk ini sedang tidak tersedia.
                    </div>
                    <button class="btn btn-secondary btn-lg w-100" disabled>Stok Habis</button>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>