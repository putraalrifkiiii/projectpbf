<?= $this->extend(config('Auth')->viewLayout) ?>
<?= $this->section('main') ?>



<div class="container mt-5 pt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                    <h4 class="text-primary fw-bold">
                        <i class="bi bi-person-plus me-2"></i>Daftar Akun
                    </h4>
                    <p class="text-muted small">Buat akun baru untuk melanjutkan</p>
                </div>

                <div class="card-body p-4">

                    <?= view('App\Views\Auth\_message_block') ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="email" class="form-label"><?=lang('Auth.email')?></label>
                            <input type="email"
                                class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                name="email" placeholder="Contoh: user@email.com" value="<?= old('email') ?>">
                            <small class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label"><?=lang('Auth.username')?></label>
                            <input type="text"
                                class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                name="username" placeholder="Pilih username Anda" value="<?= old('username') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.username') ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"><?=lang('Auth.password')?></label>
                            <input type="password" name="password"
                                class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                placeholder="Masukkan password" autocomplete="off">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="pass_confirm" class="form-label"><?=lang('Auth.repeatPassword')?></label>
                            <input type="password" name="pass_confirm"
                                class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                placeholder="Ulangi password di atas" autocomplete="off">
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                <?=lang('Auth.register')?>
                            </button>
                        </div>
                    </form>

                </div>

                <div class="card-footer bg-white border-top-0 pb-4 text-center">
                    <p class="mb-0 small text-muted">
                        <?=lang('Auth.alreadyRegistered')?>
                        <a href="<?= url_to('login') ?>" class="text-decoration-none fw-bold">
                            <?=lang('Auth.signIn')?>
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>