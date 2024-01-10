<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2>Review Pengajuan</h2>

            <?php if (empty($pengajuanPerluDitinjau)) : ?>
                <p>Tidak ada pengajuan yang perlu ditinjau.</p>
            <?php else : ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Pengajuan</th>
                            <th>Nama Domain</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengajuanPerluDitinjau as $pengajuan) : ?>
                            <tr>
                                <td><?= $pengajuan['id'] ?></td>
                                <td><?= $pengajuan['nama_domain'] ?></td>
                                <td><?= $pengajuan['deskripsi'] ?></td>
                                <td>
                                    <a href="<?= site_url("user/detail_pengajuan/{$pengajuan['id']}") ?>" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>