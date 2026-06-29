<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800&display=swap');

body{
    font-family:'Orbitron',sans-serif !important;
    background:
        radial-gradient(circle at top left,#5f5f5f 0%,#3f3f3f 30%,#232323 70%,#111111 100%);
    min-height:100vh;
}

/* Container */
.transaction-wrapper{
    padding:20px;
}

/* Header */
.page-header{
    background:linear-gradient(135deg,#1b1b1b,#2f2f2f,#4a4a4a);
    border:1px solid rgba(255,255,255,.1);
    border-radius:20px;
    padding:25px;
    box-shadow:0 0 25px rgba(255,0,0,.15);
    margin-bottom:25px;
}

.page-title{
    color:#ffffff;
    font-weight:800;
    letter-spacing:2px;
    text-transform:uppercase;
}

.page-subtitle{
    color:#d0d0d0;
    margin-bottom:0;
}

/* Button */
.btn-msi{
    background:linear-gradient(135deg,#ff0000,#c40000);
    color:#fff;
    border:none;
    border-radius:12px;
    padding:12px 20px;
    font-weight:700;
    transition:.3s;
    box-shadow:0 0 15px rgba(255,0,0,.3);
}

.btn-msi:hover{
    transform:translateY(-2px);
    color:#fff;
    box-shadow:0 0 25px rgba(255,0,0,.5);
}

/* Card */
.transaction-card{
    background:rgba(255,255,255,.92);
    border:none;
    border-radius:20px;
    overflow:hidden;
    backdrop-filter:blur(8px);
    box-shadow:
        0 10px 30px rgba(0,0,0,.35),
        0 0 30px rgba(255,0,0,.08);
}

/* Table */
.table{
    margin-bottom:0;
}

.table thead{
    background:linear-gradient(90deg,#ff0000,#c40000);
}

.table thead th{
    color:#000 !important;
    font-weight:800;
    letter-spacing:1px;
    border:none;
    text-transform:uppercase;
    background:transparent !important;
}

.table tbody tr{
    transition:.3s;
}

.table tbody tr:hover{
    background:#f5f5f5;
    transform:scale(1.002);
}

.table tbody td{
    color:#000 !important;
    font-weight:600;
    border-color:#e5e5e5;
}

/* Transaction ID */
.trx-id{
    color:#000 !important;
    font-weight:800;
}

/* Date */
.trx-date{
    color:#000 !important;
}

/* Total */
.trx-total{
    color:#000 !important;
    font-weight:800;
}

/* Status */
.status-badge{
    font-size:13px;
    font-weight:700;
    padding:10px 16px;
    border-radius:50px;
    min-width:120px;
    display:inline-block;
    color:#000 !important;
    text-transform:uppercase;
}

/* Alert */
.alert-success{
    border:none;
    border-radius:15px;
    background:linear-gradient(135deg,#00c853,#00e676);
    color:#000;
    font-weight:700;
}

/* Empty State */
.empty-state{
    padding:70px 20px;
}

.empty-icon{
    font-size:80px;
    color:#ff0000;
    text-shadow:0 0 20px rgba(255,0,0,.3);
}

.empty-title{
    color:#000;
    font-weight:700;
    margin-top:15px;
}

.empty-text{
    color:#555;
}

@media(max-width:768px){
    .page-title{
        font-size:22px;
    }

    .table{
        min-width:700px;
    }
}
</style>

<div class="container mt-5 transaction-wrapper">

    <!-- Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="page-title">
                    <i class="bi bi-clock-history"></i>
                    RIWAYAT TRANSAKSI
                </h2>
                <p class="page-subtitle">
                    Seluruh pesanan yang pernah Anda lakukan tersimpan di sini.
                </p>
            </div>

            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="<?= base_url('/') ?>" class="btn btn-msi">
                    <i class="bi bi-shop"></i>
                    LANJUT BELANJA
                </a>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <!-- Table Card -->
    <div class="card transaction-card">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th class="py-4 px-4">ID TRANSAKSI</th>
                            <th class="py-4">TGL PESANAN</th>
                            <th class="py-4">TOTAL BELANJA</th>
                            <th class="py-4 text-center">STATUS</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($transaksi)): ?>
                        <?php foreach ($transaksi as $t): ?>

                        <tr>
                            <td class="py-4 px-4 trx-id">
                                #TRX-<?= str_pad($t['id'], 5, '0', STR_PAD_LEFT) ?>
                            </td>

                            <td class="py-4 trx-date">
                                <?= date('d M Y, H:i', strtotime($t['tanggal'])) ?> WIB
                            </td>

                            <td class="py-4 trx-total">
                                Rp <?= number_format($t['total'], 0, ',', '.') ?>
                            </td>

                            <td class="py-4 text-center">

                                <?php
                                $status = strtolower($t['status']);
                                $badgeClass = 'bg-secondary';

                                if ($status == 'sukses' || $status == 'berhasil' || $status == 'selesai') {
                                    $badgeClass = 'bg-success';
                                } elseif ($status == 'pending' || $status == 'menunggu') {
                                    $badgeClass = 'bg-warning';
                                } elseif ($status == 'batal' || $status == 'gagal') {
                                    $badgeClass = 'bg-danger';
                                }
                                ?>

                                <span class="badge status-badge <?= $badgeClass ?>">
                                    <?= esc($t['status']) ?>
                                </span>

                            </td>
                        </tr>

                        <?php endforeach; ?>

                        <?php else: ?>

                        <tr>
                            <td colspan="4" class="text-center">

                                <div class="empty-state">

                                    <i class="bi bi-receipt empty-icon"></i>

                                    <h4 class="empty-title">
                                        BELUM ADA RIWAYAT TRANSAKSI
                                    </h4>

                                    <p class="empty-text">
                                        Anda belum melakukan pesanan apa pun.
                                    </p>

                                    <a href="<?= base_url('/') ?>" class="btn btn-msi mt-2">
                                        MULAI BELANJA
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