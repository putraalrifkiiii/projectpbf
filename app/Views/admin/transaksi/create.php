<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content"
            style="background: rgba(15, 23, 42, 0.95); border: 1px solid rgba(0,255,255,0.3); backdrop-filter: blur(15px); border-radius: 20px;">

            <form action="<?= base_url('admin/transaksi/store') ?>" method="post">

                <?= csrf_field() ?>

                <div class="modal-header" style="border-bottom: 1px solid rgba(0,255,255,0.2);">
                    <h5 class="modal-title" id="modalTambahLabel"
                        style="font-family: 'Orbitron', sans-serif; color: #00ffff; text-shadow: 0 0 10px #00ffff;">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Transaksi
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 py-4">

                    <div class="mb-3">
                        <label class="form-label" style="color: #00ffff; font-size: 0.9rem;">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control"
                            style="background: rgba(0,0,0,0.5); border: 1px solid rgba(0,255,255,0.2); color: white;"
                            placeholder="Masukkan nama..." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="color: #00ffff; font-size: 0.9rem;">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" class="form-control"
                            style="background: rgba(0,0,0,0.5); border: 1px solid rgba(0,255,255,0.2); color: white; color-scheme: dark;"
                            value="<?= date('Y-m-d') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="color: #00ffff; font-size: 0.9rem;">Total Harga (Rp)</label>
                        <input type="number" name="total" class="form-control"
                            style="background: rgba(0,0,0,0.5); border: 1px solid rgba(0,255,255,0.2); color: white;"
                            placeholder="0" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="color: #00ffff; font-size: 0.9rem;">Status</label>
                        <select name="status" class="form-select"
                            style="background: rgba(0,0,0,0.5); border: 1px solid rgba(0,255,255,0.2); color: white;"
                            required>
                            <option value="Selesai" style="background: #0f172a; color: white;">Selesai</option>
                            <option value="Pending" style="background: #0f172a; color: white;">Pending</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer" style="border-top: 1px solid rgba(0,255,255,0.2);">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal"
                        style="border-radius: 10px;">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-cyber px-4 py-2">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>