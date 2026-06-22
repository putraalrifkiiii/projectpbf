```php
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800&display=swap');

body{
    font-family:'Orbitron',sans-serif !important;
    background:
    radial-gradient(circle at top left,#5a5a5a 0%,#353535 35%,#1a1a1a 100%);
    min-height:100vh;
    color:#fff;
}

/* Judul */
.profile-title{
    color:#fff;
    font-weight:800;
    letter-spacing:2px;
    text-transform:uppercase;
    text-shadow:
    0 0 15px rgba(255,0,0,.3);
}

.profile-icon{
    color:#ff2d2d !important;
    text-shadow:
    0 0 15px rgba(255,0,0,.5);
}

/* Card MSI */
.msi-card{
    background:rgba(25,25,25,.95);
    border:1px solid rgba(255,255,255,.08);
    border-radius:25px;
    overflow:hidden;
    backdrop-filter:blur(15px);

    box-shadow:
    0 0 30px rgba(0,0,0,.5),
    0 0 60px rgba(255,0,0,.08);
}

/* Label */
.form-label{
    color:#ffffff;
    font-weight:600;
    letter-spacing:.5px;
}

/* Input */
.form-control{
    background:#2b2b2b !important;
    border:1px solid rgba(255,255,255,.08);
    color:white !important;
    border-radius:12px;
    padding:12px;
}

.form-control:focus{
    background:#2b2b2b !important;
    color:white !important;
    border-color:#ff0000;
    box-shadow:
    0 0 15px rgba(255,0,0,.25);
}

.form-control::placeholder{
    color:#9f9f9f;
}

/* Disabled */
.form-control:disabled{
    background:#1d1d1d !important;
    color:#bdbdbd !important;
}

/* Input Group */
.input-group-text{
    background:#2b2b2b;
    border:1px solid rgba(255,255,255,.08);
    color:#ff3b3b;
}

/* Alert */
.alert-success{
    background:rgba(0,255,120,.12);
    border:none;
    color:#7cffb1;
}

.alert-danger{
    background:rgba(255,0,0,.12);
    border:none;
    color:#ff9c9c;
}

/* Divider */
hr{
    border-color:rgba(255,255,255,.08);
}

/* Tombol MSI */
.btn-msi{
    background:
    linear-gradient(
        135deg,
        #ff0000,
        #9c0000
    );

    border:none;
    color:white;
    border-radius:12px;
    font-weight:700;
    transition:.3s;
}

.btn-msi:hover{
    color:white;
    transform:translateY(-2px);

    box-shadow:
    0 0 20px rgba(255,0,0,.5);
}

/* Tombol Kembali */
.btn-outline-msi{
    background:rgba(255,255,255,.04);
    border:1px solid rgba(255,255,255,.12);
    color:white;
    border-radius:12px;
    transition:.3s;
}

.btn-outline-msi:hover{
    background:#ff0000;
    border-color:#ff0000;
    color:white;
}

/* Small Text */
.text-muted{
    color:#c5c5c5 !important;
}

/* Responsive */
@media(max-width:768px){

    .profile-title{
        font-size:1.4rem;
    }

}
</style>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="d-flex align-items-center mb-4">

                <i class="bi bi-person-circle fs-1 me-3 profile-icon"></i>

                <h2 class="profile-title mb-0">
                    Profil Saya
                </h2>

            </div>

            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">

                <i class="bi bi-check-circle-fill me-2"></i>

                <?= esc(session()->getFlashdata('success')) ?>

                <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="alert"></button>

            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">

                <i class="bi bi-exclamation-triangle-fill me-2"></i>

                <?= esc(session()->getFlashdata('error')) ?>

                <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="alert"></button>

            </div>
            <?php endif; ?>

            <div class="card msi-card">

                <div class="card-body p-4 p-md-5">

                    <form action="<?= base_url('profil/update') ?>" method="POST">

                        <?= csrf_field() ?>

                        <div class="row mb-4">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Email Asli (Tidak Bisa Diubah)
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    value="<?= esc(user()->email) ?>"
                                    disabled>

                            </div>

                            <div class="col-md-6 mt-3 mt-md-0">

                                <label class="form-label">
                                    Username
                                </label>

                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    value="<?= esc(old('username', user()->username)) ?>"
                                    required>

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Nomor WhatsApp / HP
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>

                                <input
                                    type="text"
                                    name="no_hp"
                                    class="form-control"
                                    value="<?= esc(old('no_hp', user()->no_hp ?? '')) ?>"
                                    placeholder="Contoh: 081234567890">

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Alamat Lengkap Pengiriman
                            </label>

                            <textarea
                                name="alamat"
                                class="form-control"
                                rows="5"
                                placeholder="Masukkan nama jalan, RT/RW, kelurahan, kecamatan, kota, dan patokan rumah..."><?= esc(old('alamat', user()->alamat ?? '')) ?></textarea>

                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between align-items-center">

                            <a href="<?= base_url('/') ?>"
                               class="btn btn-outline-msi">

                                <i class="bi bi-arrow-left"></i>
                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-msi px-4">

                                Simpan Perubahan
                                <i class="bi bi-save ms-1"></i>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
```
