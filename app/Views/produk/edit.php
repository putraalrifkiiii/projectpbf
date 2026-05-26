<?php
/**
 * @var string $title
 * @var array $kategori
 * @var array $produk
 */
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container bg-light mt-5 w-50 p-5 rounded-4 position-relative">
        <div class="text-center">
            <h2><?= $title; ?></h2>
            <form action="/produk/update/<?= $produk['id_produk']; ?>" method="post">
                <label>Nama Produk:</label><br>
                <input type="text" name="nama_produk" value="<?= $produk['nama_produk']; ?>" required><br><br>

                <label>Kategori:</label><br>
                <select name="id_kategori" required>
                    <?php foreach ($kategori as $k) : ?>
                    <option value="<?= $k['id_kategori']; ?>"
                        <?= ($k['id_kategori'] == $produk['id_kategori']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option>
                    <?php endforeach; ?>
                </select><br><br>

                <label>Harga:</label><br>
                <input type="number" name="harga" value="<?= $produk['harga']; ?>" required><br><br>

                <label>Stok:</label><br>
                <input type="number" name="stok" value="<?= $produk['stok']; ?>" required><br><br>

                <button type="submit">Ubah Data</button>
                <a href="/produk">Batal</a>
            </form>
        </div>
    </div>
    <script>

    </script>
</body>

</html>