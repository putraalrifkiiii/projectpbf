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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - TRX<?= str_pad($transaksi['id'], 5, '0', STR_PAD_LEFT); ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
    body {
        background-color: #f1f5f9;
        font-family: 'Poppins', Arial, sans-serif;
        color: #1e293b;
        margin: 0;
        padding: 40px 0;
    }

    .invoice-wrapper {
        max-width: 850px;
        margin: 0 auto;
        background: #ffffff;
        padding: 50px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    /* Header Section */
    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 20px;
        margin-bottom: 30px;
    }

    .brand-title {
        font-size: 2rem;
        font-weight: 800;
        color: #2563eb;
        letter-spacing: 1px;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
    }

    .brand-subtitle {
        font-size: 0.85rem;
        color: #64748b;
        line-height: 1.5;
    }

    .invoice-details {
        text-align: right;
    }

    .invoice-details h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* Info Section */
    .info-section {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        gap: 20px;
    }

    .info-box {
        flex: 1;
        padding: 15px 20px;
        background-color: #f8fafc;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .info-box h6 {
        font-size: 0.85rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
        border-bottom: 1px solid #cbd5e1;
        padding-bottom: 8px;
    }

    .info-box p {
        margin-bottom: 4px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Table Section */
    .table th {
        background-color: #f1f5f9;
        color: #475569;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        padding: 12px;
        border-bottom: 2px solid #cbd5e1;
    }

    .table td {
        padding: 12px;
        vertical-align: middle;
        font-size: 0.95rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .table-total th {
        font-size: 1.1rem;
        padding: 15px 12px;
        background-color: #f8fafc;
        border-top: 2px solid #94a3b8 !important;
    }

    /* Signatures */
    .signature-section {
        display: flex;
        justify-content: space-between;
        margin-top: 60px;
        padding: 0 40px;
    }

    .signature-box {
        text-align: center;
        width: 200px;
    }

    .signature-line {
        margin-top: 70px;
        border-bottom: 1px solid #0f172a;
        margin-bottom: 8px;
    }

    .signature-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: #334155;
    }

    /* Footer */
    .invoice-footer {
        margin-top: 50px;
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
        font-size: 0.85rem;
        color: #64748b;
    }

    /* Print Controls */
    .print-controls {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Print Media Query */
    @media print {
        body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .invoice-wrapper {
            box-shadow: none;
            border-radius: 0;
            padding: 20px;
            max-width: 100%;
        }

        .print-controls {
            display: none !important;
        }

        .info-box {
            background-color: transparent !important;
            border: 1px solid #000 !important;
        }

        .table th,
        .table-total th {
            background-color: transparent !important;
        }

        /* Force background colors on print if needed */
        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
    </style>
</head>

<body>

    <!-- Tombol Print (Sembunyi saat dicetak) -->
    <div class="print-controls">
        <button class="btn btn-primary shadow-sm px-4 rounded-pill" onclick="window.print()">
            <i class="fa-solid fa-print me-2"></i> Cetak Dokumen
        </button>
        <button class="btn btn-light border shadow-sm px-4 rounded-pill ms-2" onclick="window.close()">
            Tutup
        </button>
    </div>

    <!-- Area Kertas Invoice -->
    <div class="invoice-wrapper">

        <!-- Header -->
        <div class="invoice-header">
            <div>
                <div class="brand-title">
                    <i class="fa-solid fa-microchip me-2"></i> TECH STORE
                </div>
                <div class="brand-subtitle">
                    Jl. Teknologi Modern No. 123, Jakarta Selatan<br>
                    Telp: (021) 1234-5678 | Email: admin@techstore.com<br>
                    Website: www.techstore.com
                </div>
            </div>

            <div class="invoice-details">
                <h2>INVOICE</h2>
                <p class="mb-1 text-muted"><strong>No. Ref:</strong>
                    TRX<?= str_pad($transaksi['id'], 5, '0', STR_PAD_LEFT); ?></p>
                <p class="mb-0 text-muted"><strong>Tanggal:</strong>
                    <?= date('d F Y', strtotime($transaksi['tanggal'])); ?></p>
                <p class="mb-0 text-muted"><strong>Waktu:</strong> <?= date('H:i', strtotime($transaksi['tanggal'])); ?>
                    WIB</p>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="info-section">
            <!-- Penagihan / Pelanggan -->
            <div class="info-box">
                <h6>
                    <i class="fa-solid fa-user-tag me-1"></i>
                    Tagihan Kepada:
                </h6>

                <p class="fw-bold text-primary" style="font-size: 1.05rem;">
                    <?= esc($transaksi['nama_user'] ?? $transaksi['nama_pelanggan_master'] ?? '-'); ?>
                </p>

                <p class="text-muted">
                    <i class="fa-solid fa-phone fa-xs me-1"></i>
                    <?= esc($transaksi['no_hp_user'] ?? $transaksi['no_hp'] ?? '-'); ?>
                </p>

                <p class="text-muted mb-0">
                    <i class="fa-solid fa-location-dot fa-xs me-1"></i>
                    <?= esc($transaksi['alamat_user'] ?? $transaksi['alamat'] ?? '-'); ?>
                </p>
            </div>

            <!-- Detail Pembayaran -->
            <div class="info-box">
                <h6><i class="fa-solid fa-circle-info me-1"></i> Detail Pembayaran:</h6>
                <p><strong>Kasir:</strong> <?= esc($transaksi['nama_kasir'] ?? '-'); ?></p>
                <p><strong>Metode Pembayaran:</strong> <?= esc($transaksi['metode_pembayaran'] ?? '-'); ?></p>
                <p class="mb-0"><strong>Status:</strong>
                    <?php if (strtolower($transaksi['status']) == 'selesai' || strtolower($transaksi['status']) == 'sukses') : ?>
                    <span class="text-success fw-bold text-uppercase"><?= esc($transaksi['status']); ?></span>
                    <?php else: ?>
                    <span class="text-warning fw-bold text-uppercase"><?= esc($transaksi['status']); ?></span>
                    <?php endif; ?>
                </p>
            </div>
        </div>

        <!-- Table Rincian -->
        <table class="table table-borderless table-hover mt-4">
            <thead>
                <tr>
                    <th style="width: 50px;" class="text-center">No</th>
                    <th>Deskripsi Produk</th>
                    <th style="width: 100px;" class="text-center">Qty</th>
                    <th style="width: 150px;" class="text-end">Harga Satuan</th>
                    <th style="width: 180px;" class="text-end">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($items)): ?>
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Tidak ada detail item.</td>
                </tr>
                <?php else: ?>
                <?php $no = 1;
                    foreach ($items as $item): ?>
                <tr>
                    <td class="text-center text-muted"><?= $no++; ?></td>
                    <td class="fw-semibold"><?= esc($item['nama_produk']); ?></td>
                    <td class="text-center"><?= esc($item['qty']); ?></td>
                    <td class="text-end text-muted">Rp <?= number_format($item['harga_satuan'], 0, ',', '.'); ?></td>
                    <td class="text-end fw-semibold">Rp
                        <?= number_format($item['qty'] * $item['harga_satuan'], 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr class="table-total">
                    <th colspan="4" class="text-end text-uppercase" style="letter-spacing: 1px;">Grand Total</th>
                    <th class="text-end text-primary fs-5">Rp <?= number_format($transaksi['total'], 0, ',', '.'); ?>
                    </th>
                </tr>
            </tfoot>
        </table>

        <!-- Signatures -->
        <div class="signature-section">
            <div class="signature-box">
                <p class="text-muted mb-0">Hormat Kami,</p>
                <div class="signature-line"></div>
                <div class="signature-name">Tech Store / Kasir</div>
            </div>

            <div class="signature-box">
                <p class="text-muted mb-0">Penerima / Pelanggan,</p>
                <div class="signature-line"></div>
                <div class="signature-name">
                    <?= esc($transaksi['nama_pelanggan_master'] ?? $transaksi['nama_pelanggan'] ?? 'Pelanggan'); ?>
                </div>
            </div>
        </div>

        <!-- Footer Note -->
        <div class="invoice-footer">
            <strong>Terima kasih telah berbelanja di Tech Store!</strong><br>
            Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan, kecuali terdapat perjanjian tertulis/garansi
            resmi.
        </div>

    </div>

    <!-- Auto Print Script -->
    <script>
    window.onload = function() {
        // Optional: Uncomment baris di bawah jika ingin halaman langsung membuka dialog print secara otomatis saat dibuka
        // window.print();
    }
    </script>

</body>

</html>