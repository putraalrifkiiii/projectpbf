<?php
/**
 * @var array $transaksi
 * @var array $items
 */
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Invoice TRX<?= str_pad($transaksi['id'], 5, '0', STR_PAD_LEFT); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: #f4f6f9;
        font-family: Arial, Helvetica, sans-serif;
        margin: 30px;
    }

    .invoice-box {
        max-width: 900px;
        margin: auto;
        background: #fff;
        padding: 35px;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
    }

    .invoice-title {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 5px;
    }

    .invoice-subtitle {
        text-align: center;
        color: #777;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
    }

    th {
        background: #f8f9fa;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }

    .footer {
        margin-top: 40px;
        text-align: center;
        color: #777;
    }

    @media print {

        .btn-print {
            display: none;
        }

        body {
            margin: 0;
            background: white;
        }

        .invoice-box {
            border: none;
            box-shadow: none;
        }

    }
    </style>

</head>

<body>

    <div class="invoice-box">

        <div class="d-flex justify-content-between mb-4">

            <div>
                <div class="invoice-title">
                    TECH STORE
                </div>

                <div class="invoice-subtitle">
                    Sistem Informasi Penjualan
                </div>
            </div>

            <div class="text-end">

                <button class="btn btn-primary btn-print mb-2" onclick="window.print()">
                    🖨 Cetak Invoice
                </button>

            </div>

        </div>

        <hr>

        <div class="row mb-4">

            <div class="col-md-6">

                <table class="table table-borderless table-sm">

                    <tr>
                        <th width="170">No Invoice</th>
                        <td>
                            : TRX<?= str_pad($transaksi['id'], 5, '0', STR_PAD_LEFT); ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Tanggal</th>
                        <td>
                            : <?= date('d-m-Y', strtotime($transaksi['tanggal'])); ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Kasir</th>
                        <td>
                            : <?= esc($transaksi['nama_kasir']); ?>
                        </td>
                    </tr>

                </table>

            </div>

            <div class="col-md-6">

                <table class="table table-borderless table-sm">

                    <tr>
                        <th width="170">Pelanggan</th>
                        <td>
                            : <?= esc($transaksi['nama_pelanggan_master']); ?>
                        </td>
                    </tr>

                    <tr>
                        <th>No HP</th>
                        <td>
                            : <?= esc($transaksi['no_hp']); ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            : <?= esc($transaksi['status']); ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Pembayaran</th>
                        <td>
                            : <?= esc($transaksi['metode_pembayaran']); ?>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th width="60">No</th>

                    <th>Produk</th>

                    <th width="120">Qty</th>

                    <th width="170">Harga</th>

                    <th width="170">Subtotal</th>

                </tr>

            </thead>

            <tbody>

                <?php
        $no = 1;
?>

                <?php foreach ($items as $item): ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= esc($item['nama_produk']); ?></td>

                    <td><?= $item['qty']; ?></td>

                    <td>
                        Rp <?= number_format($item['harga_satuan'], 0, ',', '.'); ?>
                    </td>

                    <td>
                        Rp <?= number_format($item['qty'] * $item['harga_satuan'], 0, ',', '.'); ?>
                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

            <tfoot>

                <tr>

                    <th colspan="4" class="text-end">

                        TOTAL

                    </th>

                    <th>

                        Rp <?= number_format($transaksi['total'], 0, ',', '.'); ?>

                    </th>

                </tr>

            </tfoot>

        </table>

        <div class="row mt-5">

            <div class="col-6 text-center">

                <br><br><br>

                _______________________

                <br>

                Kasir

            </div>

            <div class="col-6 text-center">

                <br><br><br>

                _______________________

                <br>

                Pelanggan

            </div>

        </div>

        <div class="footer">

            <hr>

            <small>

                Terima kasih telah berbelanja di <strong>TECH STORE</strong>.

            </small>

        </div>

    </div>

    <script>
    window.onload = function() {

        window.print();

    }
    </script>

</body>

</html>