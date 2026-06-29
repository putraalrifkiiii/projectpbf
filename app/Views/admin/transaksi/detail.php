<?php
/**
 * @var string $title
 * @var array $transaksi
 * @var array $items
 */
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
    body {
        background: #f4f6f9;
        color: #343a40;
        overflow-x: hidden;
    }

    .main-sidebar {
        width: 250px;
        min-height: 100vh;
        background: #343a40;
        position: fixed;
        top: 0;
        left: 0;
    }

    .brand-link {
        height: 57px;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 0 20px;
        font-weight: 600;
        border-bottom: 1px solid rgba(255, 255, 255, .1);
    }

    .sidebar-menu {
        list-style: none;
        padding: 12px;
        margin: 0;
    }

    .sidebar-menu a {
        color: #c2c7d0;
        text-decoration: none;
        display: block;
        padding: 10px 14px;
        border-radius: 6px;
        margin-bottom: 5px;
    }

    .sidebar-menu a:hover,
    .sidebar-menu a.active {
        background: #0d6efd;
        color: #fff;
    }

    .main-content {
        margin-left: 250px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .main-header {
        height: 57px;
        background: #fff;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 24px;
    }

    .content-wrapper {
        flex: 1;
        padding: 24px;
    }

    .card {
        border: none;
        box-shadow: 0 0 1px rgba(0, 0, 0, .12), 0 1px 3px rgba(0, 0, 0, .15);
    }

    .table thead th {
        background: #f8f9fa;
        font-weight: 600;
    }

    .invoice-title {
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .main-footer {
        background: #fff;
        border-top: 1px solid #dee2e6;
        padding: 14px 24px;
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .main-sidebar {
            position: relative;
            width: 100%;
            min-height: auto;
        }

        .main-content {
            margin-left: 0;
        }
    }
    </style>
</head>

<body>

    <aside class="main-sidebar">
        <a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
            <i class="fa-solid fa-store me-2"></i>
            TECH STORE
        </a>

        <ul class="sidebar-menu">
            <li>
                <a href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/produk'); ?>">
                    <i class="fa-solid fa-box me-2"></i> Produk
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/pelanggan'); ?>">
                    <i class="fa-solid fa-users me-2"></i> Pelanggan
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/transaksi'); ?>" class="active">
                    <i class="fa-solid fa-cart-shopping me-2"></i> Transaksi
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/logout'); ?>">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                </a>
            </li>
        </ul>
    </aside>

    <div class="main-content">

        <nav class="main-header">
            <h6 class="mb-0 fw-semibold">Detail Transaksi</h6>

            <a href="<?= base_url('admin/logout'); ?>" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-right-from-bracket me-1"></i>
                Logout
            </a>
        </nav>

        <main class="content-wrapper">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
                <div>
                    <h3 class="fw-semibold mb-1">Detail Transaksi</h3>
                    <p class="text-muted mb-0">Rincian transaksi penjualan toko elektronik.</p>
                </div>

                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin/dashboard'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin/transaksi'); ?>">Transaksi</a>
                        </li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </nav>
            </div>

            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fa-solid fa-file-invoice me-2 text-primary"></i>
                        Invoice #TRX<?= str_pad($transaksi['id'], 5, '0', STR_PAD_LEFT); ?>
                    </h5>

                    <div class="d-flex gap-2">
                        <a href="<?= base_url('admin/transaksi'); ?>" class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-arrow-left me-1"></i>
                            Kembali
                        </a>

                        <a href="<?= base_url('admin/transaksi/invoice/' . $transaksi['id']); ?>" target="_blank"
                            class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-print me-1"></i>
                            Cetak Invoice
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="invoice-title mb-3">Informasi Transaksi</h6>

                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th style="width: 180px;">No Invoice</th>
                                    <td>: TRX<?= str_pad($transaksi['id'], 5, '0', STR_PAD_LEFT); ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>: <?= date('d M Y, H:i', strtotime($transaksi['tanggal'])); ?> WIB</td>
                                </tr>
                                <tr>
                                    <th>Kasir</th>
                                    <td>: <?= esc($transaksi['nama_kasir'] ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:
                                        <?php if (strtolower($transaksi['status']) == 'selesai' || strtolower($transaksi['status']) == 'sukses') : ?>
                                        <span class="badge bg-success"><?= esc($transaksi['status']); ?></span>
                                        <?php else : ?>
                                        <span
                                            class="badge bg-warning text-dark"><?= esc($transaksi['status']); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tipe Transaksi</th>
                                    <td>: <?= esc($transaksi['tipe_transaksi'] ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Metode Pembayaran</th>
                                    <td>: <?= esc($transaksi['metode_pembayaran'] ?? '-'); ?></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <h6 class="invoice-title mb-3">Informasi Pelanggan</h6>

                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th style="width: 180px;">Nama Pelanggan</th>
                                    <td>:
                                        <?= esc($transaksi['nama_pelanggan_master'] ?? $transaksi['nama_pelanggan'] ?? '-'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <td>: <?= esc($transaksi['no_hp'] ?? '-'); ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: <?= esc($transaksi['alamat'] ?? '-'); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <h6 class="invoice-title mb-3">Rincian Produk</h6>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">No</th>
                                    <th>Nama Produk</th>
                                    <th style="width: 120px;">Qty</th>
                                    <th style="width: 180px;">Harga Satuan</th>
                                    <th style="width: 180px;">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (empty($items)) : ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Belum ada detail produk.
                                    </td>
                                </tr>
                                <?php else : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($items as $item) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= esc($item['nama_produk']); ?></td>
                                    <td><?= esc($item['qty']); ?></td>
                                    <td>Rp <?= number_format($item['harga_satuan'], 0, ',', '.'); ?></td>
                                    <td>
                                        Rp <?= number_format($item['qty'] * $item['harga_satuan'], 0, ',', '.'); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-end">Total Keseluruhan</th>
                                    <th>
                                        Rp <?= number_format($transaksi['total'], 0, ',', '.'); ?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>

        </main>

        <footer class="main-footer">
            <div class="d-flex flex-column flex-md-row justify-content-between gap-1">
                <span>&copy; <?= date('Y'); ?> Tech Store Admin Panel.</span>
                <span><strong>AdminLTE Style</strong> with Bootstrap 5</span>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>