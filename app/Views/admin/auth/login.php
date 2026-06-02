<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | UKM Public Speaking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-md-5">
                <div class="cyber-card">
                    <div class="hero-badge">SECURE AREA</div>
                    <h1 class="form-title mb-2">Login Admin</h1>
                    <p class="dashboard-subtitle mb-4">
                        Masuk untuk mengelola data pendaftar UKM Public Speaking.
                    </p>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/admin/login') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control cyber-input"
                                   value="<?= old('username') ?>"
                                   placeholder="Masukkan username admin">
                        </div>

                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control cyber-input"
                                   placeholder="Masukkan password admin">
                        </div>

                        <button type="submit" class="btn btn-neon w-100">
                            Login Dashboard
                        </button>

                        <div class="text-center mt-4">
                            <a href="<?= base_url('/') ?>" class="text-decoration-none" style="color: var(--cyan);">
                                Kembali ke halaman pendaftaran
                            </a>
                        </div>
                    </form>
                </div>

                <p class="text-center mt-3 text-muted">
                    Default: admin / admin123
                </p>
            </div>
        </div>
    </div>
</section>

</body>
</html>