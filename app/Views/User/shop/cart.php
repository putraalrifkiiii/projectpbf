<?= $this->extend('layout') ?> <?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold"><i class="bi bi-cart3"></i> Keranjang Belanja</h2>
        </div>
        <div class="col-auto">
            <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">
                Lanjut Belanja
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i><?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i><?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-borderless align-middle mb-0">
                    <thead class="table-light border-bottom">
                        <tr>
                            <th class="py-3 px-4">Nama Produk</th>
                            <th class="py-3">Harga Satuan</th>
                            <th class="py-3 text-center">Kuantitas</th>
                            <th class="py-3 text-end">Subtotal</th>
                            <th class="py-3 text-center px-4">Aksi</th>
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
                        <tr class="border-bottom">
                            <td class="py-3 px-4 fw-medium">
                                <?= esc($item['nama']) ?>
                            </td>
                            <td class="py-3 text-muted">
                                Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                            </td>
                            <td class="py-3 text-center">
                                <span class="badge bg-secondary px-3 py-2 fs-6">
                                    <?= esc($item['qty']) ?>
                                </span>
                            </td>
                            <td class="py-3 text-end fw-bold">
                                Rp <?= number_format($subtotal, 0, ',', '.') ?>
                            </td>
                            <td class="py-3 text-center px-4">
                                <a href="<?= base_url('cart/remove/' . $item['id_produk']) ?>"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus produk ini dari keranjang?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php
    endforeach;
else:
    ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <h5 class="text-muted mb-3">Keranjang Anda masih kosong</h5>
                                <a href="<?= base_url('/') ?>" class="btn btn-primary">Mulai Belanja</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                    <?php if (!empty($cart)): ?>
                    <tfoot class="bg-light">
                        <tr>
                            <td colspan="3" class="text-end py-4 fw-bold fs-5">Total Pembayaran:</td>
                            <td class="text-end py-4 fw-bold fs-4 text-danger">
                                Rp <?= number_format($total, 0, ',', '.') ?>
                            </td>
                            <td class="text-center py-4 px-4">
                                <form action="<?= base_url('checkout') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin memproses pesanan ini?')">
                                        Checkout <i class="bi bi-arrow-right-circle ms-1"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>