<?php
/**
 * @var string $title
 * @var array $kategori
 * @var array $produk
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5 w-50 bg-white p-5 rounded-4 shadow-sm position-relative">
        <div class="d-flex justify-content-end mb-3">
            <a href="/produk" class="btn btn-secondary btn-sm position-absolute top-0 end-0 m-3">Kembali</a>
        </div>

        <div class="text-center mb-4">
            <h2><?= $title; ?></h2>
        </div>

        <form action="/produk/update/<?= $produk['id_produk']; ?>" method="post">
            <div class="mb-3 text-start">
                <label class="form-label">Nama Produk:</label>
                <input type="text" name="nama_produk" class="form-control" value="<?= $produk['nama_produk']; ?>"
                    required>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Kategori:</label>
                <select name="id_kategori" class="form-select" required>
                    <?php foreach ($kategori as $k) : ?>
                    <option value="<?= $k['id_kategori']; ?>"
                        <?= ($k['id_kategori'] == $produk['id_kategori']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Harga:</label>
                <input type="number" name="harga" class="form-control" value="<?= $produk['harga']; ?>" required>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Stok:</label>
                <input type="number" name="stok" class="form-control" value="<?= $produk['stok']; ?>" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-4 me-2">Ubah Data</button>
                <a href="/produk" class="btn btn-danger px-4">Batal</a>
            </div>
        </form>
    </div>

</body>

</html>