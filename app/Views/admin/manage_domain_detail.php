<!-- File: app/Views/admin/opd.php -->
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <!-- File: app/Views/admin/domain_details.php -->

            <h2>Manage Domain Details</h2>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Domain Name</th>
                        <th>Jenis Database</th>
                        <th>Versi PHP</th>
                        <th>Nama Framework</th>
                        <th>Template Bootstrap</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($domainDetails as $domainDetail) : ?>
                        <tr>
                            <td><?= $domainDetail['id'] ?></td>
                            <td><?= $domainDetail['domain_id'] ?></td>
                            <td><?= $domainDetail['jenis_database'] ?></td>
                            <td><?= $domainDetail['versi_php'] ?></td>
                            <td><?= $domainDetail['nama_framework'] ?></td>
                            <td><?= $domainDetail['template_bootstrap'] ?></td>
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editDomainDetailModal<?= $domainDetail['id'] ?>">Edit</a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteDomainDetailModal<?= $domainDetail['id'] ?>">Delete</a>
                            </td>
                        </tr>

                        <!-- Modal for Edit Domain Detail -->
                        <div class="modal fade" id="editDomainDetailModal<?= $domainDetail['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editDomainDetailModalLabel<?= $domainDetail['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- ... (Isi modal edit_domain_detail.php) ... -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editDomainDetailModalLabel<?= $domainDetail['id'] ?>">Edit Domain Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= form_open("admin/updateDomainDetail/{$domainDetail['id']}", ['class' => 'form-horizontal']) ?>
                                        <div class="form-group">
                                            <label for="domain_id" class="col-sm-3 control-label">Domain:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="domain_id" name="domain_id" required>
                                                    <?php foreach ($domains as $domain) : ?>
                                                        <option value="<?= $domain['id'] ?>" <?= ($domain['id'] == $domainDetail['domain_id']) ? 'selected' : '' ?>><?= $domain['nama_domain'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_database" class="col-sm-3 control-label">Jenis Database:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="jenis_database" name="jenis_database" value="<?= $domainDetail['jenis_database'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="versi_php" class="col-sm-3 control-label">Versi PHP:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="versi_php" name="versi_php" value="<?= $domainDetail['versi_php'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_framework" class="col-sm-3 control-label">Nama Framework:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_framework" name="nama_framework" value="<?= $domainDetail['nama_framework'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="template_bootstrap" class="col-sm-3 control-label">Template Bootstrap:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="template_bootstrap" name="template_bootstrap" value="<?= $domainDetail['template_bootstrap'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary">Update Domain Detail</button>
                                            </div>
                                        </div>
                                        <?= form_close() ?>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Modal for Delete Domain Detail -->
                        <div class="modal fade" id="deleteDomainDetailModal<?= $domainDetail['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteDomainDetailModalLabel<?= $domainDetail['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- ... (Isi modal delete_domain_detail.php) ... -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteDomainDetailModalLabel<?= $domainDetail['id'] ?>">Delete Domain Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this domain detail?</p>
                                        <a href="<?= site_url("admin/deleteDomainDetail/{$domainDetail['id']}") ?>" class="btn btn-danger">Delete</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addDomainDetailModal">Add Domain Detail</a>

            <!-- Modal for Add Domain Detail -->
            <div class="modal fade" id="addDomainDetailModal" tabindex="-1" role="dialog" aria-labelledby="addDomainDetailModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- ... (Isi modal add_domain_detail.php) ... -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDomainDetailModalLabel">Add Domain Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= form_open('admin/storeDomainDetail', ['class' => 'form-horizontal']) ?>
                            <div class="form-group">
                                <label for="domain_id" class="col-sm-3 control-label">Domain:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="domain_id" name="domain_id" required>
                                        <?php foreach ($domains as $domain) : ?>
                                            <option value="<?= $domain['id'] ?>"><?= $domain['nama_domain'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_database" class="col-sm-3 control-label">Jenis Database:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jenis_database" name="jenis_database" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="versi_php" class="col-sm-3 control-label">Versi PHP:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="versi_php" name="versi_php" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_framework" class="col-sm-3 control-label">Nama Framework:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_framework" name="nama_framework">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="template_bootstrap" class="col-sm-3 control-label">Template Bootstrap:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="template_bootstrap" name="template_bootstrap" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary">Add Domain Detail</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?= $this->endSection(); ?>