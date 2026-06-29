<?= $this->extend('layout') ?>

<?php
/**
 * @var array $cart
 * @var int $transaksi_id
 * @var string $snap_token
 */
?>

<?= $this->section('content') ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800&display=swap');

body {
    font-family: 'Orbitron', sans-serif !important;
    background: radial-gradient(circle at top left, #5f5f5f 0%, #434343 30%, #252525 65%, #111111 100%);
    min-height: 100vh;
}

.cart-header {
    background: linear-gradient(135deg, #1b1b1b, #2d2d2d, #474747);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 25px;
    border: 1px solid rgba(255, 255, 255, .08);
    box-shadow: 0 10px 30px rgba(0, 0, 0, .4), 0 0 25px rgba(255, 0, 0, .15);
}

.cart-title {
    color: #fff;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.btn-msi {
    background: linear-gradient(135deg, #ff0000, #c40000);
    border: none;
    color: #fff;
    font-weight: 700;
    border-radius: 12px;
    padding: 12px 20px;
    transition: .3s;
    box-shadow: 0 0 20px rgba(255, 0, 0, .3);
}

.btn-msi:hover {
    transform: translateY(-2px);
    color: #fff;
    box-shadow: 0 0 30px rgba(255, 0, 0, .6);
}

.cart-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    background: rgba(255, 255, 255, .95);
    box-shadow: 0 15px 35px rgba(0, 0, 0, .35), 0 0 30px rgba(255, 0, 0, .08);
}

.table thead {
    background: linear-gradient(90deg, #ff0000, #c40000);
}

.table thead th {
    background: transparent !important;
    color: #000 !important;
    font-weight: 800;
    letter-spacing: 1px;
    border: none;
    text-transform: uppercase;
}

.table tbody tr {
    transition: .3s;
}

.table tbody tr:hover {
    background: #f7f7f7;
    transform: scale(1.002);
}

.table tbody td {
    color: #000 !important;
    font-weight: 600;
    border-color: #e8e8e8;
}

.nama-produk,
.harga-satuan,
.kuantitas,
.subtotal,
.aksi {
    color: #000 !important;
}

.qty-badge {
    background: linear-gradient(135deg, #2196f3, #42a5f5);
    color: #fff;
    font-weight: 700;
    font-size: 15px;
    padding: 10px 18px;
    border-radius: 50px;
    box-shadow: 0 0 15px rgba(33, 150, 243, .3);
}

tfoot {
    background: #f3f3f3;
}

.total-label {
    color: #000;
    font-weight: 800;
    font-size: 22px;
}

.total-price {
    color: #ff0000 !important;
    font-weight: 800;
    font-size: 28px;
    text-shadow: 0 0 10px rgba(255, 0, 0, .15);
}

.btn-remove {
    background: linear-gradient(135deg, #ff5252, #d50000);
    border: none;
    color: #fff;
    font-weight: 700;
    border-radius: 10px;
    transition: .3s;
}

.btn-remove:hover {
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 0 20px rgba(255, 0, 0, .4);
}

.btn-checkout {
    background: linear-gradient(135deg, #2962ff, #0039cb);
    border: none;
    color: #fff;
    font-weight: 800;
    letter-spacing: 1px;
    border-radius: 14px;
    padding: 14px;
    box-shadow: 0 0 20px rgba(41, 98, 255, .3);
}

.btn-checkout:hover {
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 0 30px rgba(41, 98, 255, .5);
}

.btn-pay {
    background: linear-gradient(135deg, #00c853, #00e676);
    border: none;
    color: #000;
    font-weight: 800;
    letter-spacing: 1px;
    border-radius: 14px;
    padding: 14px;
    box-shadow: 0 0 20px rgba(0, 200, 83, .3);
}

.btn-pay:hover {
    color: #000;
    transform: translateY(-2px);
    box-shadow: 0 0 30px rgba(0, 200, 83, .5);
}

.alert-success {
    background: linear-gradient(135deg, #00c853, #00e676);
    border: none;
    color: #000;
    font-weight: 700;
}

.alert-danger {
    background: linear-gradient(135deg, #ff5252, #ff1744);
    border: none;
    color: #fff;
    font-weight: 700;
}

.empty-box {
    padding: 80px 20px;
}

.empty-icon {
    font-size: 80px;
    color: #ff0000;
    text-shadow: 0 0 20px rgba(255, 0, 0, .4);
}

.empty-title {
    color: #000;
    font-weight: 700;
}

.empty-text {
    color: #555;
}

@media(max-width:768px) {
    .table {
        min-width: 900px;
    }

    .cart-title {
        font-size: 22px;
    }
}
</style>

<div class="container mt-5">

    <div class="cart-header">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="cart-title">
                    <i class="bi bi-cart3"></i>
                    KERANJANG BELANJA
                </h2>
            </div>

            <div class="col-auto">
                <a href="<?= base_url('/') ?>" class="btn btn-msi">
                    <i class="bi bi-shop"></i>
                    LANJUT BELANJA
                </a>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill me-2"></i>
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <div class="card cart-card">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table align-middle mb-0">

                    <thead>
                        <tr>
                            <th class="py-4 px-4">Nama Produk</th>
                            <th class="py-4">Harga Satuan</th>
                            <th class="py-4 text-center">Kuantitas</th>
                            <th class="py-4 text-end">Subtotal</th>
                            <th class="py-4 text-center px-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $total = 0;

if (!empty($cart)):
    foreach ($cart as $item):
        $subtotal = $item['harga'] * $item['qty'];
        $total += $subtotal;
        ?>

                        <tr>
                            <td class="py-4 px-4 nama-produk fw-bold">
                                <?= esc($item['nama']) ?>
                            </td>

                            <td class="py-4 harga-satuan">
                                Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                            </td>

                            <td class="py-4 text-center kuantitas">
                                <span class="qty-badge">
                                    <?= esc($item['qty']) ?>
                                </span>
                            </td>

                            <td class="py-4 text-end subtotal fw-bold">
                                Rp <?= number_format($subtotal, 0, ',', '.') ?>
                            </td>

                            <td class="py-4 text-center aksi">
                                <a href="<?= base_url('cart/remove/' . $item['id_produk']) ?>"
                                    class="btn btn-remove btn-sm"
                                    onclick="return confirm('Hapus produk ini dari keranjang?')">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>

                        <?php
    endforeach;
else:
    ?>

                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="empty-box">
                                    <i class="bi bi-cart-x empty-icon"></i>

                                    <h4 class="empty-title mt-3">
                                        KERANJANG MASIH KOSONG
                                    </h4>

                                    <p class="empty-text">
                                        Silakan pilih produk favorit Anda terlebih dahulu.
                                    </p>

                                    <a href="<?= base_url('/') ?>" class="btn btn-msi mt-2">
                                        MULAI BELANJA
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <?php endif; ?>
                    </tbody>

                    <?php if (!empty($cart)): ?>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end py-4 total-label">
                                TOTAL PEMBAYARAN :
                            </td>

                            <td class="text-end py-4 total-price">
                                Rp <?= number_format($total, 0, ',', '.') ?>
                            </td>

                            <td class="text-center py-4 px-4">

                                <?php if (isset($snap_token) && isset($transaksi_id)): ?>

                                <button id="pay-button" class="btn btn-pay btn-lg w-100">
                                    BAYAR SEKARANG
                                    <i class="bi bi-wallet2 ms-1"></i>
                                </button>

                                <?php else: ?>

                                <form action="<?= base_url('cart/checkout') ?>" method="POST">
                                    <?= csrf_field() ?>

                                    <button type="submit" class="btn btn-checkout btn-lg w-100">
                                        PROSES CHECKOUT
                                        <i class="bi bi-arrow-right-circle ms-1"></i>
                                    </button>
                                </form>

                                <?php endif; ?>

                            </td>
                        </tr>
                    </tfoot>
                    <?php endif; ?>

                </table>
            </div>

        </div>
    </div>

</div>

<?php if (isset($snap_token) && isset($transaksi_id)): ?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= esc(config('Midtrans')->clientKey) ?>">
</script>

<script>
function openSnapPayment() {
    window.snap.pay('<?= esc($snap_token) ?>', {
        onSuccess: function(result) {
            window.location.href = "<?= base_url('cart/success/' . $transaksi_id) ?>";
        },
        onPending: function(result) {
            alert("Menunggu pembayaran!");
            window.location.href = "<?= base_url('riwayat') ?>";
        },
        onError: function(result) {
            alert("Pembayaran gagal!");
            window.location.href = "<?= base_url('cart') ?>";
        },
        onClose: function() {
            alert("Popup pembayaran ditutup. Transaksi masih Pending.");
        }
    });
}

document.getElementById('pay-button').onclick = openSnapPayment;
</script>
<?php endif; ?>

<?= $this->endSection() ?>