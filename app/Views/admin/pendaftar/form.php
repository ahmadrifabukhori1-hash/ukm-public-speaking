<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
    $isEdit = ! empty($pendaftar);
    $action = $isEdit
        ? base_url('/admin/pendaftar/update/' . $pendaftar['id'])
        : base_url('/admin/pendaftar/store');
?>

<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-header">
            <div>
                <div class="hero-badge"><?= $isEdit ? 'EDIT MODE' : 'CREATE MODE' ?></div>
                <h1 class="dashboard-title"><?= esc($title) ?></h1>
                <p class="dashboard-subtitle">
                    Isi data calon anggota UKM Public Speaking.
                </p>
            </div>

            <a href="<?= base_url('/admin/pendaftar') ?>" class="btn btn-outline-neon">
                Kembali
            </a>
        </div>

        <div class="cyber-card">
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= $action ?>" method="post">
                <?= csrf_field() ?>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control cyber-input"
                               value="<?= old('nama_lengkap', $pendaftar['nama_lengkap'] ?? '') ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control cyber-input"
                               value="<?= old('nim', $pendaftar['nim'] ?? '') ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label>Program Studi</label>
                        <input type="text" name="prodi" class="form-control cyber-input"
                               value="<?= old('prodi', $pendaftar['prodi'] ?? '') ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Semester</label>
                        <input type="number" name="semester" class="form-control cyber-input"
                               value="<?= old('semester', $pendaftar['semester'] ?? '') ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>WhatsApp</label>
                        <input type="text" name="whatsapp" class="form-control cyber-input"
                               value="<?= old('whatsapp', $pendaftar['whatsapp'] ?? '') ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control cyber-input"
                               value="<?= old('email', $pendaftar['email'] ?? '') ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Pengalaman Public Speaking</label>
                    <textarea name="pengalaman" class="form-control cyber-input" rows="2"><?= old('pengalaman', $pendaftar['pengalaman'] ?? '') ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Alasan Bergabung</label>
                    <textarea name="alasan" class="form-control cyber-input" rows="3"><?= old('alasan', $pendaftar['alasan'] ?? '') ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label>Jadwal Pilihan</label>
                        <?php $jadwal = old('jadwal_pilihan', $pendaftar['jadwal_pilihan'] ?? '') ?>
                        <select name="jadwal_pilihan" class="form-select cyber-input">
                            <option value="">-- Pilih Jadwal --</option>
                            <option value="Senin 15.00" <?= $jadwal === 'Senin 15.00' ? 'selected' : '' ?>>Senin 15.00</option>
                            <option value="Rabu 15.00" <?= $jadwal === 'Rabu 15.00' ? 'selected' : '' ?>>Rabu 15.00</option>
                            <option value="Jumat 15.00" <?= $jadwal === 'Jumat 15.00' ? 'selected' : '' ?>>Jumat 15.00</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label>Status</label>
                        <?php $status = old('status', $pendaftar['status'] ?? 'Menunggu Seleksi') ?>
                        <select name="status" class="form-select cyber-input">
                            <option value="Menunggu Seleksi" <?= $status === 'Menunggu Seleksi' ? 'selected' : '' ?>>Menunggu Seleksi</option>
                            <option value="Diterima" <?= $status === 'Diterima' ? 'selected' : '' ?>>Diterima</option>
                            <option value="Cadangan" <?= $status === 'Cadangan' ? 'selected' : '' ?>>Cadangan</option>
                            <option value="Ditolak" <?= $status === 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-neon">
                    <?= $isEdit ? 'Update Data' : 'Simpan Data' ?>
                </button>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>