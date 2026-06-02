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
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/produk/store" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk:</label>
                            <input type="text" name="nama_produk" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori:</label>
                            <select name="id_kategori" class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga:</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stok:</label>
                            <input type="number" name="stok" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

    </script>
</body>

</html>