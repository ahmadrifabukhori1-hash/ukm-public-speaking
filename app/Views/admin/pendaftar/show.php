<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-header">
            <div>
                <div class="hero-badge">DETAIL DATA</div>
                <h1 class="dashboard-title">Detail Pendaftar</h1>
                <p class="dashboard-subtitle">
                    Informasi lengkap calon anggota UKM Public Speaking.
                </p>
            </div>

            <a href="<?= base_url('/admin/pendaftar') ?>" class="btn btn-outline-neon">
                Kembali
            </a>
        </div>

        <div class="cyber-card">
            <div class="row g-4">
                <div class="col-md-6">
                    <label>Nama Lengkap</label>
                    <div class="detail-box"><?= esc($pendaftar['nama_lengkap']) ?></div>
                </div>

                <div class="col-md-6">
                    <label>NIM</label>
                    <div class="detail-box"><?= esc($pendaftar['nim']) ?></div>
                </div>

                <div class="col-md-6">
                    <label>Program Studi</label>
                    <div class="detail-box"><?= esc($pendaftar['prodi']) ?></div>
                </div>

                <div class="col-md-6">
                    <label>Semester</label>
                    <div class="detail-box"><?= esc($pendaftar['semester']) ?></div>
                </div>

                <div class="col-md-6">
                    <label>WhatsApp</label>
                    <div class="detail-box"><?= esc($pendaftar['whatsapp']) ?></div>
                </div>

                <div class="col-md-6">
                    <label>Email</label>
                    <div class="detail-box"><?= esc($pendaftar['email']) ?></div>
                </div>

                <div class="col-md-6">
                    <label>Jadwal Pilihan</label>
                    <div class="detail-box"><?= esc($pendaftar['jadwal_pilihan']) ?></div>
                </div>

                <div class="col-md-6">
                    <label>Status</label>
                    <div class="detail-box">
                        <span class="neon-badge-table">
                            <?= esc($pendaftar['status']) ?>
                        </span>
                    </div>
                </div>

                <div class="col-12">
                    <label>Pengalaman Public Speaking</label>
                    <div class="detail-box">
                        <?= esc($pendaftar['pengalaman'] ?: 'Belum ada pengalaman') ?>
                    </div>
                </div>

                <div class="col-12">
                    <label>Alasan Bergabung</label>
                    <div class="detail-box">
                        <?= esc($pendaftar['alasan']) ?>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <a href="<?= base_url('/admin/pendaftar/edit/' . $pendaftar['id']) ?>" class="btn btn-neon">
                    Edit Data
                </a>

                <a href="https://wa.me/<?= esc($pendaftar['whatsapp']) ?>" target="_blank" class="btn btn-outline-neon">
                    Hubungi WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>