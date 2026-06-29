<?= $this->extend(config('Auth')->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 text-center">
                    <h4 class="text-primary fw-bold">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </h4>
                    <p class="text-muted small">Silakan masuk ke akun Anda</p>
                </div>

                <div class="card-body p-4">

                    <?= view('App\Views\Auth\_message_block') ?>

                    <form action="<?= url_to('login') ?>" method="post">
                        <?= csrf_field() ?>

                        <?php if (config('Auth')->validFields === ['email']): ?>
                        <div class="mb-3">
                            <label for="login" class="form-label"><?=lang('Auth.email')?></label>
                            <input type="email"
                                class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" placeholder="Contoh: admin@toko.com">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="mb-3">
                            <label for="login" class="form-label"><?=lang('Auth.emailOrUsername')?></label>
                            <input type="text"
                                class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" placeholder="Email atau Username">
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="password" class="form-label"><?=lang('Auth.password')?></label>
                            <input type="password" name="password"
                                class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                placeholder="Masukkan Password">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <?php if (config('Auth')->allowRemembering): ?>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="rememberMe"
                                <?php if (old('remember')) : ?> checked <?php endif ?>>
                            <label class="form-check-label text-muted" for="rememberMe">
                                <?=lang('Auth.rememberMe')?>
                            </label>
                        </div>
                        <?php endif; ?>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                <?=lang('Auth.loginAction')?>
                            </button>
                        </div>
                    </form>

                </div>

                <div class="card-footer bg-white border-top-0 pb-4 text-center">
                    <?php if (config('Auth')->allowRegistration) : ?>
                    <p class="mb-1 small">
                        <a href="<?= url_to('register') ?>"
                            class="text-decoration-none"><?=lang('Auth.needAnAccount')?></a>
                    </p>
                    <?php endif; ?>

                    <?php if (config('Auth')->activeResetter): ?>
                    <p class="mb-0 small">
                        <a href="<?= url_to('forgot') ?>"
                            class="text-decoration-none text-danger"><?=lang('Auth.forgotYourPassword')?></a>
                    </p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>