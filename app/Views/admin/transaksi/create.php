<?php
/**
 * @var array $pelanggan
 * @var array $produk
 */
?>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <form action="<?= base_url('admin/transaksi/store') ?>" method="post">
                <?= csrf_field() ?>

                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">
                        <i class="fa-solid fa-cart-plus me-2 text-primary"></i>
                        Tambah Transaksi
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row g-3 mb-4">

                        <div class="col-md-4">
                            <label class="form-label">Pelanggan</label>
                            <select name="id_pelanggan" class="form-select" required>
                                <option value="">-- Pilih Pelanggan --</option>

                                <?php foreach ($pelanggan as $plg) : ?>
                                <option value="<?= $plg['id_pelanggan']; ?>">
                                    <?= esc($plg['nama_pelanggan']); ?> - <?= esc($plg['no_hp']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Tanggal Transaksi</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"
                                required>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="Selesai">Selesai</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Metode Pembayaran</label>
                            <select name="metode_pembayaran" class="form-select" required>
                                <option value="">-- Pilih Metode --</option>
                                <option value="Cash">Cash</option>
                                <option value="Debit">Debit</option>
                                <option value="QRIS">QRIS</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>

                    </div>

                    <input type="hidden" name="tipe_transaksi" value="Offline">

                    <div class="card">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 fw-semibold">
                                <i class="fa-solid fa-boxes-stacked me-2 text-primary"></i>
                                Keranjang Produk
                            </h6>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered align-middle" id="tabelKeranjang">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Produk</th>
                                            <th style="width: 150px;">Harga</th>
                                            <th style="width: 120px;">Qty</th>
                                            <th style="width: 170px;">Subtotal</th>
                                            <th style="width: 80px;">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="id_produk[]" class="form-select produk-select" required>
                                                    <option value="">-- Pilih Produk --</option>

                                                    <?php foreach ($produk as $prd) : ?>
                                                    <option value="<?= $prd['id_produk']; ?>"
                                                        data-harga="<?= $prd['harga']; ?>"
                                                        data-stok="<?= $prd['stok']; ?>">
                                                        <?= esc($prd['nama_produk']); ?>
                                                        - Stok: <?= esc($prd['stok']); ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <td>
                                                <input type="number" name="harga_satuan[]" class="form-control harga"
                                                    value="0" readonly>
                                            </td>

                                            <td>
                                                <input type="number" name="qty[]" class="form-control qty" value="1"
                                                    min="1" required>
                                            </td>

                                            <td>
                                                <input type="number" name="subtotal[]" class="form-control subtotal"
                                                    value="0" readonly>
                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger btn-sm btn-hapus-row">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <button type="button" class="btn btn-success btn-sm" id="btnTambahRow">
                                <i class="fa-solid fa-plus me-1"></i>
                                Tambah Produk
                            </button>

                        </div>
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Total Keseluruhan</label>
                            <input type="number" name="total" id="total" class="form-control form-control-lg fw-bold"
                                value="0" readonly>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i>
                        Batal
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i>
                        Simpan Transaksi
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
function hitungSubtotal(row) {
    const produk = row.querySelector('.produk-select');
    const hargaInput = row.querySelector('.harga');
    const qtyInput = row.querySelector('.qty');
    const subtotalInput = row.querySelector('.subtotal');

    const selectedOption = produk.options[produk.selectedIndex];
    const harga = parseInt(selectedOption.getAttribute('data-harga')) || 0;
    const stok = parseInt(selectedOption.getAttribute('data-stok')) || 0;
    const qty = parseInt(qtyInput.value) || 0;

    if (stok > 0 && qty > stok) {
        alert('Qty melebihi stok produk yang tersedia.');
        qtyInput.value = stok;
    }

    const qtyFinal = parseInt(qtyInput.value) || 0;
    const subtotal = harga * qtyFinal;

    hargaInput.value = harga;
    subtotalInput.value = subtotal;

    hitungTotal();
}

function hitungTotal() {
    let total = 0;

    document.querySelectorAll('.subtotal').forEach(function(input) {
        total += parseInt(input.value) || 0;
    });

    document.getElementById('total').value = total;
}

document.addEventListener('change', function(e) {
    if (e.target.classList.contains('produk-select')) {
        const row = e.target.closest('tr');
        hitungSubtotal(row);
    }
});

document.addEventListener('input', function(e) {
    if (e.target.classList.contains('qty')) {
        const row = e.target.closest('tr');
        hitungSubtotal(row);
    }
});

document.getElementById('btnTambahRow').addEventListener('click', function() {
    const tbody = document.querySelector('#tabelKeranjang tbody');
    const firstRow = tbody.querySelector('tr');
    const newRow = firstRow.cloneNode(true);

    newRow.querySelector('.produk-select').value = '';
    newRow.querySelector('.harga').value = 0;
    newRow.querySelector('.qty').value = 1;
    newRow.querySelector('.subtotal').value = 0;

    tbody.appendChild(newRow);

    hitungTotal();
});

document.addEventListener('click', function(e) {
    if (e.target.closest('.btn-hapus-row')) {
        const tbody = document.querySelector('#tabelKeranjang tbody');
        const rows = tbody.querySelectorAll('tr');

        if (rows.length > 1) {
            e.target.closest('tr').remove();
            hitungTotal();
        } else {
            alert('Minimal harus ada satu produk dalam transaksi.');
        }
    }
});
</script>