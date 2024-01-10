<!-- File: app/Views/admin/index.php -->
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- File: app/Views/admin/all_domains.php -->

    <h2>All Domain Applications</h2>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('success') ?>
        </div>
    <?php elseif (session()->has('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Domain Name</th>
                    <th>OPD</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($domains as $domain) : ?>
                    <tr>
                        <td><?= $domain['id'] ?></td>
                        <td><?= $domain['nama_domain'] ?></td>
                        <td><?= $domain['nama_opd'] ?></td>
                        <td><?= $domain['deskripsi'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#detailModal<?= $domain['id'] ?>" class="btn btn-warning btn-sm mr-2">Detail</a>
                        </td>
                    </tr>
                    <!-- Modal Detail untuk setiap domain -->
                    <?php
                    echo view('admin/detail', ['domain' => $domain]);
                    ?>
                <?php endforeach; ?>
                <a href="<?= site_url("admin/approval") ?>" class="btn btn-primary btn-sm">Domain Approval</a>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection(); ?>