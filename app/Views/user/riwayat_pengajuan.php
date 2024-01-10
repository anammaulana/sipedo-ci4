<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<h2>Riwayat Pengajuan</h2>
<?php if (empty($riwayat_pengajuan)) : ?>
    <p>Tidak ada riwayat pengajuan.</p>
<?php else : ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Domain</th>
                <th>Status</th>
                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($riwayat_pengajuan as $pengajuan) : ?>
                <tr>
                    <td><?= $pengajuan['id'] ?></td>
                    <td><?= $pengajuan['nama_domain'] ?></td>
                    <td><?= $pengajuan['status'] ?></td>
                    <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?= $this->endSection(); ?>