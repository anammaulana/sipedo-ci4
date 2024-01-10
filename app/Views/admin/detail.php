<!-- File: app/Views/admin/index.php -->
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php foreach ($domains as $domain) : ?>
        <div class="modal fade" id="detailModal<?= $domain['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Domain</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> <?= $domain['id'] ?></p>
                        <p><strong>Domain Name:</strong> <?= $domain['nama_domain'] ?></p>
                        <p><strong>OPD:</strong> <?= $domain['nama_opd'] ?></p>
                        <p><strong>Description:</strong> <?= $domain['deskripsi'] ?></p>
                        <p><strong>Programming Languages:</strong> <?= $domain['bahasa_programs'] ?></p>
                        <p><strong>Database Type:</strong> <?= $domain['jenis_database'] ?></p>
                        <p><strong>PHP Version:</strong> <?= $domain['versi_php'] ?></p>
                        <p><strong>Framework:</strong> <?= $domain['nama_framework'] ?: 'None' ?></p>
                        <p><strong>Uses Bootstrap Template:</strong> <?= $domain['template_bootstrap'] == 'Ya' ? 'Yes' : 'No' ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


</div>

<?= $this->endSection(); ?>