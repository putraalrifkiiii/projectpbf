<?php
/**
 * @var string $title
 * @var array $produk

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
        margin: 30px;
        line-height: 1.6;
    }

    .container {
        max-width: 600px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .price {
        font-size: 1.5em;
        color: #e44d26;
        font-weight: bold;
    }

    .btn-back {
        background: #6c757d;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-add {
        background: #28a745;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        margin-top: 15px;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1><?= esc($produk['nama_produk']) ?></h1>
        <p>Kategori: <strong><?= esc($produk['nama_kategori']) ?></strong></p>
        <hr>

        <p class="price">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
        <p>Sisa Stok di Toko: <?= esc($produk['stok']) ?> unit</p>

        <p><strong>Deskripsi Produk:</strong><br>
            Dapatkan perangkat terbaik untuk kebutuhan gaming, editing, maupun kerja harian Anda hanya di TechStore.</p>

        <a href="#" class="btn-add">Tambah ke Keranjang Belanja</a>
        <br><br>
        <a href="<?= base_url('user/shop') ?>" class="btn-back">&larr; Kembali ke Katalog</a>
    </div>

</body>

</html>