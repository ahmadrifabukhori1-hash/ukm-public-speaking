<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-header">
            <div>
                <div class="hero-badge">ADMIN PANEL</div>
                <h1 class="dashboard-title">Dashboard Pendaftar</h1>
                <p class="dashboard-subtitle">
                    Kelola data calon anggota UKM Public Speaking.
                </p>
            </div>

            <a href="<?= base_url('/admin/pendaftar/create') ?>" class="btn btn-neon">
                + Tambah Data
            </a>
        </div>

        <div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="mini-card w-100">
            <strong>Total Pendaftar</strong>
            <h2><?= esc($total ?? 0) ?></h2>
            <small>Semua data masuk</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mini-card w-100">
            <strong>Menunggu</strong>
            <h2><?= esc($menunggu ?? 0) ?></h2>
            <small>Belum diputuskan</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mini-card w-100">
            <strong>Diterima</strong>
            <h2><?= esc($diterima ?? 0) ?></h2>
            <small>Lolos seleksi</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mini-card w-100">
            <strong>Ditolak</strong>
            <h2><?= esc($ditolak ?? 0) ?></h2>
            <small>Tidak lolos</small>
        </div>
    </div>
</div>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="cyber-card mb-4">
            <form action="<?= base_url('/admin/pendaftar') ?>" method="get" class="row g-2">
                <div class="col-md-10">
                    <input type="text" name="keyword" class="form-control cyber-input"
                           value="<?= esc($keyword ?? '') ?>"
                           placeholder="Cari nama, NIM, prodi, atau status...">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-neon w-100" type="submit">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <div class="cyber-card table-responsive">
            <table class="table cyber-table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>WA</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($pendaftar)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($pendaftar as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <strong><?= esc($row['nama_lengkap']) ?></strong><br>
                                    <small><?= esc($row['email']) ?></small>
                                </td>
                                <td><?= esc($row['nim']) ?></td>
                                <td><?= esc($row['prodi']) ?></td>
                                <td><?= esc($row['whatsapp']) ?></td>
                                <td><?= esc($row['jadwal_pilihan']) ?></td>
                                <td>
                                    <span class="neon-badge-table">
                                        <?= esc($row['status']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
    <a href="<?= base_url('/admin/pendaftar/show/' . $row['id']) ?>"
       class="btn btn-info btn-sm">
        Detail
    </a>

    <a href="<?= base_url('/admin/pendaftar/edit/' . $row['id']) ?>"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <form action="<?= base_url('/admin/pendaftar/delete/' . $row['id']) ?>"
          method="post"
          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-danger btn-sm">
            Hapus
        </button>
    </form>
</div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">
                                Belum ada data pendaftar.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>