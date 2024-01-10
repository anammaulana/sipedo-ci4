<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">hay<?= $user()->username; ?></h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Detail Pengajuan</h2>

                <?php if (empty($pengajuan)) : ?>
                    <p>Pengajuan tidak ditemukan.</p>
                <?php else : ?>
                    <dl>
                        <dt>ID</dt>
                        <dd><?= $pengajuan['id'] ?></dd>
                        <dt>Nama Domain</dt>
                        <dd><?= $pengajuan['nama_domain'] ?></dd>
                        <dt>Nama Pengaju</dt>
                        <dd><?= user()->username;  ?></dd>

                        <!-- Tambahkan informasi lain sesuai kebutuhan -->
                    </dl>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>