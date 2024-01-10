<?= $this->extend('katalog/index'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Katalog Aplikasi</h1>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Domain</th>
                        <th>OPD</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($domains as $index => $domain) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $domain['nama_domain'] ?></td>
                            <td><?= $domain['nama_opd'] ?></td>
                            <td><?= $domain['deskripsi'] ?></td>
                            <td>
                                <button type="button" class="btn <?= getStatusButtonClass($domain['status']) ?>">
                                    <?= $domain['status'] ?>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php
function getStatusButtonClass($status)
{
    switch ($status) {
        case 'Pending':
            return 'btn-warning'; // Warna kuning untuk Pending
        case 'Approved':
            return 'btn-success'; // Warna hijau untuk Approved
        case 'Rejected':
            return 'btn-danger'; // Warna merah untuk Rejected
        default:
            return 'btn-secondary'; // Warna default untuk status lainnya
    }
}
?>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>