<!-- Modal Tambah Produk -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 14px; overflow: hidden;">

            <!-- Header Modal -->
            <div class="modal-header bg-light border-bottom-0 px-4 py-3">
                <h5 class="modal-title fw-bold" id="modalTambahLabel" style="color: #0f172a;">
                    <i class="fa-solid fa-box-open me-2" style="color: var(--tech-primary);"></i>
                    Tambah Produk Baru
                </h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form -->
            <form action="<?= base_url('admin/produk/store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="modal-body px-4 py-4">
                    <!-- Nama Produk -->
                    <div class="mb-4">
                        <label class="form-label fw-medium text-secondary" style="font-size: 0.95rem;">
                            Nama Produk
                        </label>
                        <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk..."
                            required>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label class="form-label fw-medium text-secondary" style="font-size: 0.95rem;">
                            Pilih Kategori
                        </label>
                        <select name="id_kategori" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Kategori Produk --</option>

                            <!-- Looping otomatis jika variabel $kategori dikirim dari Controller -->
                            <?php if (isset($kategori) && is_array($kategori)): ?>
                            <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <!-- Fallback data manual jika belum ada query database -->
                            <option value="1">📱 Smartphone</option>
                            <option value="2">💻 Laptop</option>
                            <option value="3">🎧 Aksesoris</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Gambar Produk -->
                    <div class="mb-4">
                        <label class="form-label">Gambar Produk</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label class="form-label fw-medium text-secondary" style="font-size: 0.95rem;">
                            Harga Produk (Rp)
                        </label>
                        <input type="number" name="harga" class="form-control" placeholder="Contoh: 5000000" min="0"
                            required>
                    </div>

                    <!-- Stok -->
                    <div class="mb-2">
                        <label class="form-label fw-medium text-secondary" style="font-size: 0.95rem;">
                            Jumlah Stok
                        </label>
                        <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok awal..."
                            min="0" required>
                    </div>
                </div>

                <!-- Footer Modal -->
                <div class="modal-footer bg-light border-top-0 px-4 py-3 d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-light border text-secondary shadow-sm" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary shadow-sm">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Produk
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>