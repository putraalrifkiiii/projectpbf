```php
<?= $this->extend('layout') ?>

<?php
/**
 * @var array $produk
 */
?>

<?= $this->section('content') ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800&display=swap');

body {
    font-family: 'Orbitron', sans-serif;
    background:
        radial-gradient(circle at top left, #4b4b4b 0%, #2d2d2d 40%, #171717 100%);
    min-height: 100vh;
}

/* Container */
.container {
    max-width: 1400px;
}

/* Back Button */
.btn-back {
    border: 1px solid rgba(255, 255, 255, .15);
    background: rgba(255, 255, 255, .05);
    color: white;
    border-radius: 12px;
    padding: 10px 18px;
    transition: .3s;
    text-decoration: none;
}

.btn-back:hover {
    background: #ff0000;
    color: white;
    transform: translateY(-2px);
}

/* Product Card */
.msi-card {
    background: rgba(25, 25, 25, .96);
    border: 1px solid rgba(255, 255, 255, .08);
    border-radius: 25px;
    overflow: hidden;
    backdrop-filter: blur(20px);
    box-shadow:
        0 0 30px rgba(0, 0, 0, .5),
        0 0 60px rgba(255, 0, 0, .08);
}

/* Product Image */
.product-image-section {
    background:
        linear-gradient(135deg,
            #3b3b3b,
            #1d1d1d);
    min-height: 500px;
}

.product-image-section img {
    transition: .4s;
}

.product-image-section img:hover {
    transform: scale(1.05);
}

/* Category */
.category-badge {
    background: linear-gradient(135deg,
            #ff0000,
            #990000);
    color: white;
    border: none;
    font-size: .9rem;
    letter-spacing: 1px;
}

/* Product Name */
.product-title {
    color: white;
    font-weight: 800;
    font-size: 2rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

/* Price */
.product-price {
    color: #ff2d2d;
    font-weight: 800;
    text-shadow:
        0 0 10px rgba(255, 0, 0, .5),
        0 0 20px rgba(255, 0, 0, .2);
}

/* Stock Badge */
.stock-success {
    background: #00c853;
}

.stock-warning {
    background: #ffab00;
    color: black;
}

.stock-danger {
    background: #d50000;
}

/* Description Box */
.info-box {
    background: rgba(255, 255, 255, .04);
    border: 1px solid rgba(255, 255, 255, .06);
    border-radius: 15px;
    padding: 15px;
    color: #d6d6d6;
}

/* Input */
.form-control {
    background: #2d2d2d;
    border: 1px solid rgba(255, 255, 255, .1);
    color: white;
    border-radius: 12px;
}

.form-control:focus {
    background: #2d2d2d;
    color: white;
    border-color: #ff0000;
    box-shadow: 0 0 10px rgba(255, 0, 0, .4);
}

/* Buy Button */
.btn-msi {
    background: linear-gradient(135deg,
            #ff0000,
            #9f0000);
    border: none;
    color: white;
    border-radius: 15px;
    font-weight: 700;
    padding: 15px;
    transition: .3s;
}

.btn-msi:hover {
    transform: translateY(-3px);
    box-shadow:
        0 0 20px rgba(255, 0, 0, .4),
        0 0 40px rgba(255, 0, 0, .2);
}

/* Alert */
.alert-success {
    background: rgba(0, 255, 100, .12);
    border: none;
    color: #79ffb0;
}

.alert-danger {
    background: rgba(255, 0, 0, .12);
    border: none;
    color: #ff9f9f;
}

.alert-secondary {
    background: rgba(255, 255, 255, .08);
    border: none;
    color: white;
}

/* Divider */
hr {
    border-color: rgba(255, 255, 255, .08);
}

/* Text */
.text-muted {
    color: #b8b8b8 !important;
}

.stock-text {
    color: white;
    font-size: 1.05rem;
}

/* Responsive */
@media(max-width:768px) {

    .product-title {
        font-size: 1.4rem;
    }

    .product-price {
        font-size: 1.6rem;
    }

}
</style>

<div class="container mt-5">

    <div class="mb-4">
        <a href="<?= base_url('/') ?>" class="btn-back">
            <i class="bi bi-arrow-left"></i> Kembali ke Katalog
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <div class="card msi-card">

        <div class="row g-0">

            <div class="col-lg-5 d-flex align-items-center justify-content-center product-image-section p-5">

                <img src="<?= base_url('uploads/' . $produk['gambar']) ?>" class="img-fluid"
                    alt="<?= esc($produk['nama_produk']) ?>" style="max-height:450px; object-fit:contain;">

            </div>

            <div class="col-lg-7">

                <div class="card-body p-5">

                    <span class="badge category-badge px-3 py-2 mb-3">
                        <?= esc($produk['nama_kategori']) ?>
                    </span>

                    <h1 class="product-title mb-3">
                        <?= esc($produk['nama_produk']) ?>
                    </h1>

                    <h2 class="product-price mb-4">
                        Rp <?= number_format($produk['harga'], 0, ',', '.') ?>
                    </h2>

                    <div class="info-box mb-4">

                        <p class="stock-text mb-2">
                            Status Stok :
                            <?php if ($produk['stok'] > 10): ?>
                            <span class="badge stock-success">
                                Tersedia (<?= $produk['stok'] ?>)
                            </span>

                            <?php elseif ($produk['stok'] > 0 && $produk['stok'] <= 10): ?>
                            <span class="badge stock-warning">
                                Sisa Sedikit (<?= $produk['stok'] ?>)
                            </span>

                            <?php else: ?>
                            <span class="badge stock-danger">
                                Habis
                            </span>
                            <?php endif; ?>
                        </p>

                        <small class="text-muted">
                            Barang yang sudah dibeli tidak dapat dikembalikan
                            kecuali terdapat cacat produksi dari pabrik.
                        </small>

                    </div>

                    <hr class="my-4">

                    <?php if ($produk['stok'] > 0): ?>

                    <form action="<?= base_url('cart/add') ?>" method="POST">

                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

                        <div class="row align-items-center g-3">

                            <div class="col-md-3">
                                <label for="qty" class="form-label text-white fw-bold">
                                    Kuantitas
                                </label>
                            </div>

                            <div class="col-md-3">
                                <input type="number" name="qty" id="qty" class="form-control" value="1" min="1"
                                    max="<?= $produk['stok'] ?>" required>
                            </div>

                            <div class="col-md-6">

                                <button type="submit" class="btn btn-msi btn-lg w-100">

                                    <i class="bi bi-cart-plus-fill"></i>
                                    MASUKKAN KE KERANJANG

                                </button>

                            </div>

                        </div>

                    </form>

                    <?php else: ?>

                    <div class="alert alert-secondary text-center">
                        <i class="bi bi-info-circle"></i>
                        Produk sedang tidak tersedia.
                    </div>

                    <button class="btn btn-secondary btn-lg w-100" disabled>
                        STOK HABIS
                    </button>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
```