<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">hay<?= $user()->username; ?></h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Peninjauan Pengajuan</h2>

                <?php if (empty($pengajuanPerluDitinjau)) : ?>
                    <p>Tidak ada pengajuan yang perlu ditinjau.</p>
                <?php else : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Domain</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengajuanPerluDitinjau as $row) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nama_domain'] ?></td>
                                    <td><?= $row['deskripsi'] ?></td>
                                    <td>
                                        <a href="<?= base_url("user/review_pengajuan/{$row['id']}") ?>" class="btn btn-info btn-sm">Review</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>