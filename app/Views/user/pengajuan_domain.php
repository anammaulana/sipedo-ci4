<!-- File: app/Views/domains/add.php -->
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Pengajuan Domain</h6>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                         <!-- Tampilkan pesan validasi -->
                         <?= \Config\Services::validation()->listErrors(); ?>
                         
                        <form method="post" action="<?= base_url('user/store_pengajuan_domain'); ?>">
                            <div class="form-group">
                                <label for="nama_domain">Nama Domain:</label>
                                <input type="text" class="form-control" id="nama_domain" name="nama_domain" required|is_unique[domains.nama_domain]>
                            </div>

                            <!-- Field OPD -->
                            <div class="form-group">
                                <label for="opd">OPD:</label>
                                <select class="form-control" id="opd" name="opd" required>
                                    <!-- Populate dengan data OPD dari database -->
                                    <?php foreach ($opds as $opd) : ?>
                                        <option value="<?= $opd['id'] ?>"><?= $opd['nama_opd'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Field Bahasa Pemrograman -->
                            <div class="form-group">
                                <label for="bahasa_program">Bahasa Pemrograman:</label>
                                <!-- Checkbox dengan data dari database -->
                                <?php foreach ($bahasa_programs as $bahasa_program) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="bahasa_program[]" value="<?= $bahasa_program['id'] ?>">
                                        <label class="form-check-label"><?= $bahasa_program['nama_bahasa_program'] ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Field Jenis Database -->
                            <div class="form-group">
                                <label for="jenis_database">Jenis Database:</label>
                                <select class="form-control" id="jenis_database" name="jenis_database" required>
                                    <option value="MySQL">MySQL</option>
                                    <option value="PostgreSQL">PostgreSQL</option>
                                    <option value="MongoDB">MongoDB</option>
                                </select>
                            </div>

                            <!-- Field Versi PHP -->
                            <div class="form-group">
                                <label for="versi_php">Versi PHP:</label>
                                <select class="form-control" id="versi_php" name="versi_php" required>
                                    <option value="5">Versi 5</option>
                                    <option value="7">Versi 7</option>
                                    <option value="8">Versi 8</option>
                                </select>
                            </div>

                            <!-- Field Nama Framework -->
                            <div class="form-group">
                                <label for="nama_framework">Nama Framework:</label>
                                <input type="text" class="form-control" id="nama_framework" name="nama_framework" requierd>
                            </div>

                            <!-- Field Template Bootstrap -->
                            <div class="form-group">
                                <label for="template_bootstrap">Template Bootstrap:</label>
                                <select class="form-control" id="template_bootstrap" name="template_bootstrap" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Field Deskripsi -->
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                            </div>

                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-primary">Ajukan Domain</button>
                            <!-- Contoh tautan ke halaman peninjauan -->
                            <a class="btn btn-secondary" href="<?= site_url("review_pengajuan/{$userId}") ?>">Review Pengajuan</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<?= $this->endSection(); ?>