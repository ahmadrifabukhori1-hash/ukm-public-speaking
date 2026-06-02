<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'UKM Public Speaking') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg cyber-navbar">
   <div class="d-flex gap-2 align-items-center">
    <a href="<?= base_url('/') ?>" class="btn btn-neon-sm">Daftar</a>

    <?php if (session()->get('admin_logged_in')) : ?>
        <a href="<?= base_url('/admin/pendaftar') ?>" class="btn btn-outline-neon-sm">
            Dashboard
        </a>

        <a href="<?= base_url('/admin/logout') ?>" class="btn btn-danger btn-sm rounded-pill">
            Logout
        </a>
    <?php else : ?>
        <a href="<?= base_url('/admin/login') ?>" class="btn btn-outline-neon-sm">
            Login Admin
        </a>
    <?php endif; ?>
</div>
</nav>

<main>
    <?= $this->renderSection('content') ?>
</main>

<footer class="cyber-footer">
    <p>© <?= date('Y') ?> UKM Public Speaking | Speak Loud, Shine Bright</p>
</footer>

</body>
</html>