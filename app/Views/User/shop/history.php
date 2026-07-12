<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800&display=swap');

body {
    font-family: 'Orbitron', sans-serif !important;
    background:
        radial-gradient(circle at top left,
            #5f5f5f 0%,
            #3f3f3f 30%,
            #232323 70%,
            #111111 100%);
    min-height: 100vh;
}

.transaction-wrapper {
    padding: 20px;
}

.page-header {
    background: linear-gradient(135deg, #1b1b1b, #2f2f2f, #4a4a4a);
    border: 1px solid rgba(255, 255, 255, .1);
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 0 25px rgba(255, 0, 0, .15);
    margin-bottom: 25px;
}

.page-title {
    color: #fff;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.page-subtitle {
    color: #d0d0d0;
    margin-bottom: 0;
}

.btn-msi {
    background: linear-gradient(135deg, #ff0000, #c40000);
    color: #fff;
    border: none;
    border-radius: 12px;
    padding: 12px 20px;
    font-weight: 700;
    transition: .3s;
    box-shadow: 0 0 15px rgba(255, 0, 0, .3);
}

.btn-msi:hover {
    transform: translateY(-2px);
    color: #fff;
    box-shadow: 0 0 25px rgba(255, 0, 0, .5);
}

.transaction-card {
    background: rgba(255, 255, 255, .92);
    border: none;
    border-radius: 20px;
    overflow: hidden;
    backdrop-filter: blur(8px);
    box-shadow:
        0 10px 30px rgba(0, 0, 0, .35),
        0 0 30px rgba(255, 0, 0, .08);
}

.table {
    margin-bottom: 0;
}

.table thead {
    background: linear-gradient(90deg, #ff0000, #c40000);
}

.table thead th {
    color: #000 !important;
    font-weight: 800;
    letter-spacing: 1px;
    border: none;
    text-transform: uppercase;
    background: transparent !important;
    white-space: nowrap;
}

.table tbody tr {
    transition: .3s;
}

.table tbody tr:hover {
    background: #f5f5f5;
}

.table tbody td {
    color: #000 !important;
    font-weight: 600;
    border-color: #e5e5e5;
    vertical-align: middle;
}

.trx-id,
.trx-total {
    color: #000 !important;
    font-weight: 800;
}

.trx-date {
    color: #000 !important;
}

.status-badge {
    font-size: 13px;
    font-weight: 700;
    padding: 10px 16px;
    border-radius: 50px;
    min-width: 120px;
    display: inline-block;
    text-transform: uppercase;
}

.alert-success {
    border: none;
    border-radius: 15px;
    background: linear-gradient(135deg, #00c853, #00e676);
    color: #000;
    font-weight: 700;
}

.alert-danger {
    border: none;
    border-radius: 15px;
    font-weight: 700;
}

.empty-state {
    padding: 70px 20px;
}

.empty-icon {
    font-size: 80px;
    color: #ff0000;
    text-shadow: 0 0 20px rgba(255, 0, 0, .3);
}

.empty-title {
    color: #000;
    font-weight: 700;
    margin-top: 15px;
}

.empty-text {
    color: #555;
}

@media (max-width: 768px) {
    .page-title {
        font-size: 22px;
    }

    .table {
        min-width: 700px;
    }
}
</style>

<div class="container mt-5 transaction-wrapper">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="page-title">
                    <i class="bi bi-clock-history"></i>
                    Riwayat Transaksi
                </h2>

                <p class="page-subtitle">
                    Seluruh pesanan yang pernah Anda lakukan tersimpan di sini.
                </p>
            </div>

            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="<?= base_url('/') ?>" class="btn btn-msi">
                    <i class="bi bi-shop"></i>
                    Lanjut Belanja
                </a>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>

        <?= esc(session()->getFlashdata('success')) ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?php if (!empty($errorDb)): ?>
    <div class="alert alert-danger shadow-sm mb-4" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <?= esc($errorDb) ?>
    </div>
    <?php endif; ?>

    <div class="card transaction-card">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th class="py-4 px-4">ID Transaksi</th>
                            <th class="py-4">Tanggal Pesanan</th>
                            <th class="py-4">Total Belanja</th>
                            <th class="py-4 text-center">Status</th>
                            <th class="py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($transaksi) && is_array($transaksi)): ?>

                        <?php foreach ($transaksi as $t): ?>

                        <?php
                            $idTransaksi =
                                $t['id']
                                ?? $t['id_transaksi']
                                ?? 0;

                            $tanggal =
                                $t['tanggal']
                                ?? $t['created_at']
                                ?? null;

                            $total =
                                $t['total']
                                ?? $t['total_harga']
                                ?? $t['total_belanja']
                                ?? 0;

                            $statusAsli =
                                $t['status']
                                ?? 'Tidak diketahui';

                            $status = strtolower(trim((string) $statusAsli));

                            $badgeClass = 'bg-secondary text-white';

                            if (in_array(
                                $status,
                                ['sukses', 'berhasil', 'selesai'],
                                true
                            )) {
                                $badgeClass = 'bg-success text-white';
                            } elseif (in_array(
                                $status,
                                ['pending', 'menunggu'],
                                true
                            )) {
                                $badgeClass = 'bg-warning text-dark';
                            } elseif (in_array(
                                $status,
                                ['batal', 'gagal'],
                                true
                            )) {
                                $badgeClass = 'bg-danger text-white';
                            }
                            ?>

                        <tr>
                            <td class="py-4 px-4 trx-id">
                                #TRX-<?= str_pad(
                                    (string) $idTransaksi,
                                    5,
                                    '0',
                                    STR_PAD_LEFT
                                ) ?>
                            </td>

                            <td class="py-4 trx-date">
                                <?php if (!empty($tanggal)): ?>
                                <?= esc(
                                    date(
                                        'd M Y, H:i',
                                        strtotime($tanggal)
                                    )
                                ) ?> WIB
                                <?php else: ?>
                                -
                                <?php endif; ?>
                            </td>

                            <td class="py-4 trx-total">
                                Rp <?= number_format(
                                    (float) $total,
                                    0,
                                    ',',
                                    '.'
                                ) ?>
                            </td>

                            <td class="py-4 text-center">
                                <span class="badge status-badge <?= $badgeClass ?>">
                                    <?= esc($statusAsli) ?>
                                </span>
                            </td>

                            <td class="text-center">
                                <a href="<?= base_url('user/transaksi/invoice/' . $t['id']); ?>" target="_blank"
                                    class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-file-invoice me-1"></i>
                                    Invoice
                                </a>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                        <?php else: ?>

                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="empty-state">

                                    <i class="bi bi-receipt empty-icon"></i>

                                    <h4 class="empty-title">
                                        Belum Ada Riwayat Transaksi
                                    </h4>

                                    <p class="empty-text">
                                        Anda belum melakukan pesanan apa pun.
                                    </p>

                                    <a href="<?= base_url('/') ?>" class="btn btn-msi mt-2">
                                        Mulai Belanja
                                    </a>

                                </div>
                            </td>
                        </tr>

                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>