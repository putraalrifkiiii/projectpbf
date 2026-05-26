<?php
/**
 * @var string $title
 * @var array $kategori
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
        <div class="d-flex justify-content-end">
            <a href="/produk" class="btn btn-secondary position-absolute top-0 end-0 ">
                Kembali
            </a>
        </div>
        <div class="text-center">
            <h2 class="mb-3"><?= $title; ?></h2>
            <form action="/produk/store" method="post">
                <label>Nama Produk:</label><br>
                <input type="text" name="nama_produk" required><br><br>

                <label>Kategori:</label><br>
                <select name="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($kategori as $k) : ?>
                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>

                <label>Harga:</label><br>
                <input type="number" name="harga" required><br><br>

                <label>Stok:</label><br>
                <input type="number" name="stok" required><br><br>
                <div class="gap-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/produk" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <script>

    </script>
</body>

</html>