<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <div class="hero-badge">OPEN REGISTRATION 2026</div>
                <h1 class="hero-title">
                    Join UKM <span>Public Speaking</span>
                </h1>
                <p class="hero-desc">
                    Kembangkan kepercayaan diri, kemampuan berbicara, debat, MC,
                    presentasi, dan komunikasi profesional bersama komunitas yang aktif.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <div class="mini-card">
                        <strong>🎤 Speech</strong>
                        <small>Latihan bicara publik</small>
                    </div>
                    <div class="mini-card">
                        <strong>⚡ Debate</strong>
                        <small>Asah argumentasi</small>
                    </div>
                    <div class="mini-card">
                        <strong>🚀 MC</strong>
                        <small>Skill event kampus</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="cyber-card">
                    <h3 class="form-title">Form Pendaftaran</h3>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/daftar') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control cyber-input"
                                   value="<?= old('nama_lengkap') ?>" placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>NIM</label>
                                <input type="text" name="nim" class="form-control cyber-input"
                                       value="<?= old('nim') ?>" placeholder="Contoh: 230101001">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Semester</label>
                                <input type="number" name="semester" class="form-control cyber-input"
                                       value="<?= old('semester') ?>" placeholder="Contoh: 2">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Program Studi</label>
                            <input type="text" name="prodi" class="form-control cyber-input"
                                   value="<?= old('prodi') ?>" placeholder="Contoh: Teknik Informatika">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>WhatsApp</label>
                                <input type="text" name="whatsapp" class="form-control cyber-input"
                                       value="<?= old('whatsapp') ?>" placeholder="08xxxxxxxxxx">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control cyber-input"
                                       value="<?= old('email') ?>" placeholder="email@gmail.com">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Pengalaman Public Speaking</label>
                            <textarea name="pengalaman" class="form-control cyber-input" rows="2"
                                      placeholder="Kosongkan jika belum ada"><?= old('pengalaman') ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Alasan Bergabung</label>
                            <textarea name="alasan" class="form-control cyber-input" rows="3"
                                      placeholder="Kenapa ingin ikut UKM Public Speaking?"><?= old('alasan') ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label>Jadwal Pilihan</label>
                            <select name="jadwal_pilihan" class="form-select cyber-input">
                                <option value="">-- Pilih Jadwal --</option>
                                <option value="Senin 15.00" <?= old('jadwal_pilihan') === 'Senin 15.00' ? 'selected' : '' ?>>Senin 15.00</option>
                                <option value="Rabu 15.00" <?= old('jadwal_pilihan') === 'Rabu 15.00' ? 'selected' : '' ?>>Rabu 15.00</option>
                                <option value="Jumat 15.00" <?= old('jadwal_pilihan') === 'Jumat 15.00' ? 'selected' : '' ?>>Jumat 15.00</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-neon w-100">
                            Kirim Pendaftaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>