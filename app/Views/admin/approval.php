<!-- File: app/Views/admin/approval.php -->

<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h2>Domain Approval</h2>
    <?php if (empty($domains)) : ?>
        <p>No domains are currently pending approval.</p>
    <?php else : ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Domain Name</th>
                        <th>OPD</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($domains as $i => $domain) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $domain['id'] ?></td>
                            <td><?= $domain['nama_domain'] ?></td>
                            <td><?= $domain['nama_opd'] ?></td>
                            <td><?= $domain['deskripsi'] ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#detailModal<?= $domain['id'] ?>" class="btn btn-warning btn-sm mr-2">Detail</a>
                                <a href="<?= site_url("admin/approve/{$domain['id']}") ?>" class="btn btn-success btn-sm mr-2">Approve</a>
                                <a href="<?= site_url("admin/reject/{$domain['id']}") ?>" class="btn btn-danger btn-sm">Reject</a>
                            </td>
                        </tr>
                        <!-- Modal Detail untuk setiap domain -->
                        <div class="modal fade" id="<?= "detailModal{$domain['id']}" ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">Domain Detail</h5>
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
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>