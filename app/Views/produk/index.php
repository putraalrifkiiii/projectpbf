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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2><?= $title; ?></h2>
            <div>
                <span class="me-3">Halo, <strong><?= user()->username; ?></strong></span>
                <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>

        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Data Produk
        </button>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
foreach ($produk as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['nama_produk']; ?></td>
                            <td><?= $p['nama_kategori']; ?></td>
                            <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
                            <td><?= $p['stok']; ?></td>
                            <td>
                                <a href="/produk/edit/<?= $p['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>

                                <form action="/produk/delete/<?= $p['id_produk']; ?>" method="post" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?= $this->include('produk/create'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>