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
    <title><?= esc($title) ?></title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f8f9fa;
    }

    .product-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
    }

    .card {
        border: 1px solid #ddd;
        padding: 15px;
        width: 240px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .price {
        font-weight: bold;
        color: #e44d26;
        font-size: 1.1em;
    }

    .category {
        color: #6c757d;
        font-size: 0.9em;
        margin-bottom: 10px;
    }

    .btn {
        display: inline-block;
        padding: 8px 12px;
        margin-top: 10px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 0.9em;
        text-align: center;
    }

    .btn-detail {
        background: #007bff;
        color: white;
    }

    .btn-cart {
        background: #28a745;
        color: white;
        margin-left: 5px;
    }
    </style>
</head>

<body>

    <header>
        <h1>TechStore - Toko Komputer</h1>
        <nav>
            <a href="<?= base_url('user/shop') ?>">Katalog Produk</a> |
            <a href="#">Keranjang Belanja</a>
        </nav>
    </header>
    <hr>

    <main>
        <h2>Semua Produk Elektronik & Komputer</h2>

        <div class="product-grid">
            <?php if (empty($produk)): ?>
            <p>Maaf, saat ini belum ada produk yang tersedia.</p>
            <?php else: ?>
            <?php foreach ($produk as $item): ?>
            <div class="card">
                <h3><?= esc($item['nama_produk']) ?></h3>

                <p class="category">Kategori: <strong><?= esc($item['nama_kategori']) ?></strong></p>

                <p class="price">Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
                <p>Stok tersedia: <?= esc($item['stok']) ?></p>

                <a href="<?= base_url('user/shop/detail/' . $item['id_produk']) ?>" class="btn btn-detail">Detail</a>
                <a href="#" class="btn btn-cart">+ Keranjang</a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

</body>

</html>