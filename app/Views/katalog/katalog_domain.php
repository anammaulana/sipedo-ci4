<!-- File: app/Views/dashboard/katalog.php -->
<!--  -->
<?= $this->extend('katalog/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <h2>Domain Katalog</h2>
            <?php if (empty($domainsForKatalog)) : ?>
                <p>No domains available in the catalog.</p>
            <?php else : ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Domain Name</th>
                            <th>Status</th>
                            <th>Submission Time</th>
                            <th>Approval Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allDomains as $index => $domain) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $domain['id'] ?></td>
                                <td><?= $domain['nama_domain'] ?></td>
                                <td>
                                    <?php if ($domain['status'] == 'Approved') : ?>
                                        <button type="button" class="btn btn-success">Approved</button>
                                    <?php elseif ($domain['status'] == 'Pending') : ?>
                                        <button type="button" class="btn btn-warning">Pending</button>
                                    <?php elseif ($domain['status'] == 'Rejected') : ?>
                                        <button type="button" class="btn btn-danger">Rejected</button>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-secondary">Unknown</button>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= date('Y-m-d H:i:s', strtotime($domain['created_at'])) ?> (<?= date('l', strtotime($domain['created_at'])) ?>)
                                </td>
                                <td>
                                    <?php if ($domain['status'] == 'Pending') : ?>
                                        Pending Approval
                                    <?php elseif ($domain['status'] == 'Approved') : ?>
                                        Approved at <?= date('Y-m-d H:i:s', strtotime($domain['updated_at'])) ?> (<?= date('l', strtotime($domain['updated_at'])) ?>)
                                    <?php elseif ($domain['status'] == 'Rejected') : ?>
                                        Rejected at <?= date('Y-m-d H:i:s', strtotime($domain['updated_at'])) ?> (<?= date('l', strtotime($domain['updated_at'])) ?>)
                                    <?php else : ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#detailModal<?= $domain['id'] ?>">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <!-- Modal Detail untuk setiap domain -->
        <?php foreach ($domaindetail as $domain) : ?>
            <div class="modal fade" id="detailModal<?= $domain['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Domain: <?= $domain['nama_domain'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Bahasa Pemrograman:</strong> <?= $domain['bahasa_programs'] ?></p>
                            <p><strong>Jenis Database:</strong> <?= $domain['jenis_database'] ?></p>
                            <p><strong>Versi PHP:</strong> <?= $domain['versi_php'] ?></p>
                            <p><strong>Nama Framework:</strong> <?= $domain['nama_framework'] ?? 'N/A' ?></p>
                            <p><strong>Template Bootstrap:</strong> <?= $domain['template_bootstrap'] ?></p>
                            <p><strong>Deskripsi:</strong> <?= $domain['deskripsi'] ?></p>
                            <!-- Tambahkan informasi detail lainnya sesuai kebutuhan -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>