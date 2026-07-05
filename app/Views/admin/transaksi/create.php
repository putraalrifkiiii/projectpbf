<?php
/**
 * @var array $pelanggan
 * @var array $produk
 */
?>

<!-- Modal Tambah Transaksi -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content border-0 shadow-lg" style="border-radius: 14px; overflow: hidden;">

            <form action="<?= base_url('admin/transaksi/store') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Header Modal -->
                <div class="modal-header bg-light border-bottom-0 px-4 py-3">
                    <h5 class="modal-title fw-bold" id="modalTambahLabel" style="color: #0f172a;">
                        <i class="fa-solid fa-cart-plus me-2" style="color: #2563eb;"></i>
                        Point of Sales - Transaksi Baru
                    </h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 py-4">

                    <!-- Data Utama Transaksi -->
                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-medium text-secondary" style="font-size: 0.95rem;">
                                <i class="fa-solid fa-user me-1"></i> Pelanggan
                            </label>
                            <select name="id_pelanggan" class="form-select shadow-sm" style="border-radius: 8px;"
                                required>
                                <option value="" disabled selected>-- Pilih Pelanggan --</option>
                                <?php foreach ($pelanggan as $plg) : ?>
                                <option value="<?= $plg['id_pelanggan']; ?>">
                                    <?= esc($plg['nama_pelanggan']); ?> - <?= esc($plg['no_hp']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-medium text-secondary" style="font-size: 0.95rem;">
                                <i class="fa-solid fa-calendar-day me-1"></i> Tanggal Transaksi
                            </label>
                            <input type="date" name="tanggal" class="form-control shadow-sm" style="border-radius: 8px;"
                                value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-medium text-secondary" style="font-size: 0.95rem;">
                                <i class="fa-solid fa-bell-concierge me-1"></i> Status
                            </label>
                            <select name="status" class="form-select shadow-sm" style="border-radius: 8px;" required>
                                <option value="Selesai" selected>Selesai</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-medium text-secondary" style="font-size: 0.95rem;">
                                <i class="fa-solid fa-wallet me-1"></i> Pembayaran
                            </label>
                            <select name="metode_pembayaran" class="form-select shadow-sm" style="border-radius: 8px;"
                                required>
                                <option value="" disabled selected>-- Metode --</option>
                                <option value="Cash">Cash / Tunai</option>
                                <option value="Debit">Kartu Debit</option>
                                <option value="QRIS">QRIS</option>
                                <option value="Transfer">Transfer Bank</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="tipe_transaksi" value="Offline">

                    <!-- Keranjang Belanja -->
                    <div class="card border border-light shadow-sm" style="border-radius: 12px; overflow: hidden;">
                        <div
                            class="card-header bg-light border-bottom-0 px-4 py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw-bold" style="color: #0f172a;">
                                <i class="fa-solid fa-boxes-stacked me-2" style="color: #2563eb;"></i>
                                Daftar Keranjang Produk
                            </h6>
                            <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm"
                                id="btnTambahRow">
                                <i class="fa-solid fa-plus me-1"></i> Tambah Baris
                            </button>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle border-bottom mb-0" id="tabelKeranjang">
                                    <thead class="bg-light text-secondary" style="font-size: 0.9rem;">
                                        <tr>
                                            <th class="ps-4">Item Produk</th>
                                            <th style="width: 200px;">Harga Satuan</th>
                                            <th style="width: 120px;">Qty</th>
                                            <th style="width: 220px;">Subtotal</th>
                                            <th style="width: 80px;" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="ps-4 py-3">
                                                <select name="id_produk[]"
                                                    class="form-select form-select-sm produk-select"
                                                    style="border-radius: 6px;" required>
                                                    <option value="" disabled selected>-- Pilih Perangkat --</option>
                                                    <?php foreach ($produk as $prd) : ?>
                                                    <option value="<?= $prd['id_produk']; ?>"
                                                        data-harga="<?= $prd['harga']; ?>"
                                                        data-stok="<?= $prd['stok']; ?>">
                                                        <?= esc($prd['nama_produk']); ?> (Sisa:
                                                        <?= esc($prd['stok']); ?>)
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <td class="py-3">
                                                <div class="input-group input-group-sm">
                                                    <span
                                                        class="input-group-text bg-light text-secondary border-end-0">Rp</span>
                                                    <input type="number" name="harga_satuan[]"
                                                        class="form-control harga border-start-0 bg-white" value="0"
                                                        readonly>
                                                </div>
                                            </td>

                                            <td class="py-3">
                                                <input type="number" name="qty[]"
                                                    class="form-control form-control-sm qty text-center" value="1"
                                                    min="1" style="border-radius: 6px;" required>
                                            </td>

                                            <td class="py-3">
                                                <div class="input-group input-group-sm">
                                                    <span
                                                        class="input-group-text bg-light text-secondary border-end-0">Rp</span>
                                                    <input type="number" name="subtotal[]"
                                                        class="form-control subtotal border-start-0 bg-white fw-bold text-success"
                                                        value="0" readonly>
                                                </div>
                                            </td>

                                            <td class="text-center py-3">
                                                <button type="button" class="btn btn-danger btn-sm btn-hapus-row"
                                                    style="border-radius: 6px;" title="Hapus Baris">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Total Keseluruhan -->
                    <div class="row justify-content-end mt-4">
                        <div class="col-md-5 col-lg-4">
                            <div class="p-3 rounded-3" style="background-color: #f8fafc; border: 1px dashed #cbd5e1;">
                                <label class="form-label fw-bold text-secondary text-uppercase"
                                    style="font-size: 0.85rem; letter-spacing: 0.5px;">Grand Total Pembayaran</label>
                                <div class="input-group input-group-lg shadow-sm">
                                    <span class="input-group-text bg-primary text-white border-primary">Rp</span>
                                    <input type="number" name="total" id="total"
                                        class="form-control fw-bold text-end bg-white" value="0" readonly
                                        style="font-size: 1.5rem; color: #0f172a !important;">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer Modal -->
                <div class="modal-footer bg-light border-top-0 px-4 py-3 d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-light border text-secondary shadow-sm" data-bs-dismiss="modal"
                        style="border-radius: 8px;">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary shadow-sm" style="border-radius: 8px;">
                        <i class="fa-solid fa-cash-register me-1"></i> Proses Transaksi
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
// Fungsi Kalkulasi Subtotal & Validasi Stok
function hitungSubtotal(row) {
    const produk = row.querySelector('.produk-select');
    const hargaInput = row.querySelector('.harga');
    const qtyInput = row.querySelector('.qty');
    const subtotalInput = row.querySelector('.subtotal');

    // Jika belum memilih produk, hentikan kalkulasi
    if (!produk.value) return;

    const selectedOption = produk.options[produk.selectedIndex];
    const harga = parseInt(selectedOption.getAttribute('data-harga')) || 0;
    const stok = parseInt(selectedOption.getAttribute('data-stok')) || 0;
    const qty = parseInt(qtyInput.value) || 0;

    // Validasi Qty vs Stok
    if (stok > 0 && qty > stok) {
        alert('Maaf, kuantitas melebihi stok produk yang tersedia (' + stok + ' unit).');
        qtyInput.value = stok;
    }

    const qtyFinal = parseInt(qtyInput.value) || 0;
    const subtotal = harga * qtyFinal;

    hargaInput.value = harga;
    subtotalInput.value = subtotal;

    hitungTotal();
}

// Fungsi Kalkulasi Grand Total
function hitungTotal() {
    let total = 0;

    document.querySelectorAll('.subtotal').forEach(function(input) {
        total += parseInt(input.value) || 0;
    });

    document.getElementById('total').value = total;
}

// Event Listener: Perubahan Pilihan Produk
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('produk-select')) {
        const row = e.target.closest('tr');
        hitungSubtotal(row);
    }
});

// Event Listener: Input Qty berubah
document.addEventListener('input', function(e) {
    if (e.target.classList.contains('qty')) {
        const row = e.target.closest('tr');
        hitungSubtotal(row);
    }
});

// Event Listener: Tambah Baris Keranjang
document.getElementById('btnTambahRow').addEventListener('click', function() {
    const tbody = document.querySelector('#tabelKeranjang tbody');
    const firstRow = tbody.querySelector('tr');

    // Clone baris pertama
    const newRow = firstRow.cloneNode(true);

    // Reset isi inputan pada baris baru
    newRow.querySelector('.produk-select').value = '';
    newRow.querySelector('.harga').value = 0;
    newRow.querySelector('.qty').value = 1;
    newRow.querySelector('.subtotal').value = 0;

    tbody.appendChild(newRow);

    hitungTotal();
});

// Event Listener: Hapus Baris Keranjang
document.addEventListener('click', function(e) {
    if (e.target.closest('.btn-hapus-row')) {
        const tbody = document.querySelector('#tabelKeranjang tbody');
        const rows = tbody.querySelectorAll('tr');

        if (rows.length > 1) {
            e.target.closest('tr').remove();
            hitungTotal();
        } else {
            alert('Minimal harus ada satu produk di dalam keranjang transaksi.');
        }
    }
});
</script>