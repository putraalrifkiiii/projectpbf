<?php
/**
 * @var string $title
 * @var array $transaksi
 */
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
    body {
        background: #050816;
        font-family: 'Poppins', sans-serif;
        color: white;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        width: 500px;
        height: 500px;
        background: rgba(0, 255, 255, 0.08);
        top: -200px;
        left: -100px;
        border-radius: 50%;
        filter: blur(100px);
        z-index: -1;
    }

    body::after {
        content: '';
        position: fixed;
        width: 400px;
        height: 400px;
        background: rgba(255, 0, 255, 0.08);
        bottom: -150px;
        right: -100px;
        border-radius: 50%;
        filter: blur(100px);
        z-index: -1;
    }

    .navbar {
        background: rgba(10, 10, 20, 0.85);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(0, 255, 255, 0.2);
    }

    .navbar-brand {
        font-family: 'Orbitron', sans-serif;
        font-weight: 700;
        color: #00ffff !important;
        text-shadow: 0 0 10px #00ffff;
    }

    .hero-card {
        background: linear-gradient(135deg,
                rgba(0, 255, 255, 0.12),
                rgba(255, 0, 255, 0.10));

        border: 1px solid rgba(0, 255, 255, 0.25);
        border-radius: 25px;
        padding: 40px;
        backdrop-filter: blur(20px);

        box-shadow:
            0 0 20px rgba(0, 255, 255, 0.15),
            0 0 50px rgba(255, 0, 255, 0.08);
    }

    .hero-title {
        font-family: 'Orbitron', sans-serif;
        color: #00ffff;
        font-size: 2rem;

        text-shadow:
            0 0 10px #00ffff,
            0 0 25px #00ffff;
    }

    .hero-title span {
        color: #ff00ff;

        text-shadow:
            0 0 10px #ff00ff,
            0 0 25px #ff00ff;
    }

    .hero-text {
        color: #cbd5e1;
    }

    .table-card {
        background: rgba(15, 23, 42, 0.8);
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(15px);
        overflow: hidden;
    }

    .table {
        color: white;
        margin-bottom: 0;
    }

    .table thead {
        background: rgba(0, 255, 255, 0.08);
    }

    .table thead th {
        border: none;
        color: #00ffff;
        font-family: 'Orbitron', sans-serif;
        padding: 18px;
    }

    .table tbody tr {
        border-color: rgba(255, 255, 255, 0.05);
        transition: 0.3s;
    }

    .table tbody tr:hover {
        background: rgba(0, 255, 255, 0.05);
    }

    .table td {
        padding: 18px;
        vertical-align: middle;
        color: #e2e8f0;
        background: transparent !important;
    }

    .btn-cyber {
        background: transparent;
        border: 1px solid #00ffff;
        color: #00ffff;
        border-radius: 12px;
        transition: 0.3s;
        font-weight: 500;
    }

    .btn-cyber:hover {
        background: #00ffff;
        color: black;
        box-shadow: 0 0 15px #00ffff;
    }

    .btn-edit {
        background: rgba(255, 193, 7, 0.12);
        border: 1px solid #ffc107;
        color: #ffc107;
        border-radius: 10px;
    }

    .btn-edit:hover {
        background: #ffc107;
        color: black;
        box-shadow: 0 0 15px #ffc107;
    }

    .btn-delete {
        background: rgba(255, 0, 90, 0.12);
        border: 1px solid #ff0055;
        color: #ff0055;
        border-radius: 10px;
    }

    .btn-delete:hover {
        background: #ff0055;
        color: white;
        box-shadow: 0 0 15px #ff0055;
    }

    .status-success {
        background: rgba(0, 255, 140, 0.15);
        color: #00ff99;
        padding: 8px 14px;
        border-radius: 10px;
        font-size: 0.85rem;
    }

    .status-pending {
        background: rgba(255, 193, 7, 0.15);
        color: #ffc107;
        padding: 8px 14px;
        border-radius: 10px;
        font-size: 0.85rem;
    }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark py-3">

        <div class="container">

            <a class="navbar-brand" href="/dashboard">
                <i class="bi bi-cpu-fill me-2"></i>
                CYBER ELECTRO
            </a>

            <div class="ms-auto">

                <a href="/dashboard" class="btn btn-cyber">
                    <i class="bi bi-arrow-left me-2"></i>
                    Dashboard
                </a>

            </div>

        </div>

    </nav>

    <div class="container py-5">

        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show"
            style="background: rgba(0,255,140,0.15); border-color: #00ff99; color: #00ff99;" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <div class="hero-card mb-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h1 class="hero-title">
                        DATA <span>TRANSAKSI</span>
                    </h1>

                    <p class="hero-text mt-4">
                        Monitor seluruh transaksi penjualan,
                        status pembayaran, dan aktivitas toko
                        cyberpunk Anda secara realtime.
                    </p>

                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">

                    <i class="bi bi-cart-check-fill" style="
                            font-size: 8rem;
                            color: #00ffff;
                            text-shadow:
                                0 0 20px #00ffff,
                                0 0 40px #00ffff;
                        ">
                    </i>

                </div>

            </div>

        </div>

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>

                <h3 style="
                    font-family: Orbitron;
                    color: #00ffff;
                    text-shadow: 0 0 10px #00ffff;
                ">
                    LIST TRANSAKSI
                </h3>

                <p style="color:#94a3b8;">
                    Kelola transaksi pelanggan cyber store.
                </p>

            </div>

            <button class="btn btn-cyber px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalTambah">

                <i class="bi bi-plus-circle me-2"></i>
                Tambah Transaksi

            </button>

        </div>

        <div class="table-card p-3">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php if (empty($transaksi)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5" style="color: #64748b;">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada data transaksi yang masuk ke sistem.
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php $i = 1; ?>
                        <?php foreach ($transaksi as $t) : ?>

                        <tr>

                            <td><?= $i++; ?></td>

                            <td>
                                <strong>
                                    <?= esc($t['nama_pelanggan']); ?>
                                </strong>
                            </td>

                            <td>
                                <?= date('d M Y, H:i', strtotime($t['tanggal'])); ?> WIB
                            </td>

                            <td>
                                Rp <?= number_format($t['total'], 0, ',', '.'); ?>
                            </td>

                            <td>
                                <?php
                                        $status = strtolower($t['status']);
                            if ($status == 'selesai' || $status == 'sukses') :
                                ?>
                                <span class="status-success">
                                    <?= esc($t['status']); ?>
                                </span>
                                <?php else : ?>
                                <span class="status-pending">
                                    <?= esc($t['status']); ?>
                                </span>
                                <?php endif; ?>
                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="/transaksi/edit/<?= $t['id']; ?>" class="btn btn-edit btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="/transaksi/delete/<?= $t['id']; ?>" method="post">

                                        <?= csrf_field() ?>

                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="btn btn-delete btn-sm"
                                            onclick="return confirm('Yakin menghapus data transaksi <?= esc($t['nama_pelanggan']) ?>?')">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <?= $this->include('transaksi/create'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>