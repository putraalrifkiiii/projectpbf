<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="d-flex align-items-center mb-4">
                <i class="bi bi-person-circle fs-1 me-3 text-primary"></i>
                <h2 class="fw-bold mb-0">Profil Saya</h2>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?= esc(session()->getFlashdata('success')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= esc(session()->getFlashdata('error')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <form action="<?= base_url('profil/update') ?>" method="POST">
                        <?= csrf_field() ?>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted fw-bold">Email Asli (Tidak bisa diubah)</label>
                                <input type="email" class="form-control bg-light" value="<?= esc(user()->email) ?>"
                                    disabled>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label class="form-label fw-bold">Username</label>
                                <input type="text" name="username" class="form-control"
                                    value="<?= esc(old('username', user()->username)) ?>" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Nomor WhatsApp / HP</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-telephone"></i></span>
                                <input type="text" name="no_hp" class="form-control"
                                    value="<?= esc(old('no_hp', user()->no_hp ?? '')) ?>"
                                    placeholder="Contoh: 081234567890">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Alamat Lengkap Pengiriman</label>
                            <textarea name="alamat" class="form-control" rows="4"
                                placeholder="Masukkan nama jalan, RT/RW, kelurahan, dan patokan rumah agar mudah dikirim..."><?= esc(old('alamat', user()->alamat ?? '')) ?></textarea>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Simpan Perubahan <i class="bi bi-save ms-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>