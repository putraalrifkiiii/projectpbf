<?= $this->extend('layout') ?> <?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold"><i class="bi bi-clock-history"></i> Riwayat Transaksi</h2>
            <p class="text-muted">Daftar seluruh pesanan yang pernah Anda lakukan.</p>
        </div>
        <div class="col-auto">
            <a href="<?= base_url('/') ?>" class="btn btn-outline-primary">
                <i class="bi bi-shop"></i> Lanjut Belanja
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-borderless align-middle mb-0">
                    <thead class="table-light border-bottom">
                        <tr>
                            <th class="py-3 px-4">ID Transaksi</th>
                            <th class="py-3">Tanggal Pesanan</th>
                            <th class="py-3">Total Belanja</th>
                            <th class="py-3 text-center px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($transaksi)): ?>
                        <?php foreach ($transaksi as $t): ?>
                        <tr class="border-bottom">
                            <td class="py-3 px-4 fw-bold text-primary">
                                #TRX-<?= str_pad($t['id'], 5, '0', STR_PAD_LEFT) ?>
                            </td>
                            <td class="py-3 text-muted">
                                <?= date('d M Y, H:i', strtotime($t['tanggal'])) ?> WIB
                            </td>
                            <td class="py-3 fw-bold">
                                Rp <?= number_format($t['total'], 0, ',', '.') ?>
                            </td>
                            <td class="py-3 text-center px-4">
                                <?php
                                            // Pewarnaan badge dinamis berdasarkan status
                                            $status = strtolower($t['status']);
                            $badgeClass = 'bg-secondary'; // Default

                            if ($status == 'sukses' || $status == 'berhasil' || $status == 'selesai') {
                                $badgeClass = 'bg-success';
                            } elseif ($status == 'pending' || $status == 'menunggu') {
                                $badgeClass = 'bg-warning text-dark';
                            } elseif ($status == 'batal' || $status == 'gagal') {
                                $badgeClass = 'bg-danger';
                            }
                            ?>
                                <span class="badge <?= $badgeClass ?> px-3 py-2 fs-6">
                                    <?= esc($t['status']) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <i class="bi bi-receipt display-4 text-muted mb-3 d-block"></i>
                                <h5 class="text-muted">Belum ada riwayat transaksi.</h5>
                                <p class="text-muted mb-4">Anda belum melakukan pesanan apapun.</p>
                                <a href="<?= base_url('/') ?>" class="btn btn-primary">Mulai Belanja Sekarang</a>
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