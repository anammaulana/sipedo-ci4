<!-- File: app/Views/admin/opd.php -->
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2>Manage Domains</h2>

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
                            <td><?= $domain['opd_id'] ?></td>
                            <td><?= $domain['deskripsi'] ?></td>
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editDomainModal<?= $domain['id'] ?>">Edit</a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteDomainModal<?= $domain['id'] ?>">Delete</a>
                            </td>
                        </tr>

                        <!-- Modal for Edit Domain -->
                        <div class="modal fade" id="editDomainModal<?= $domain['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editDomainModalLabel<?= $domain['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- ... (Isi modal edit_domain.php) ... -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editDomainModalLabel<?= $domain['id'] ?>">Edit Domain</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= form_open("admin/updateDomain/{$domain['id']}", ['class' => 'form-horizontal']) ?>
                                        <div class="form-group">
                                            <label for="nama_domain" class="col-sm-3 control-label">Domain Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_domain" name="nama_domain" value="<?= $domain['nama_domain'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="opd_id" class="col-sm-3 control-label">OPD:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="opd_id" name="opd_id" required>
                                                    <?php foreach ($opds as $opd) : ?>
                                                        <option value="<?= $opd['id'] ?>" <?= ($opd['id'] == $domain['opd_id']) ? 'selected' : '' ?>><?= $opd['nama_opd'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi" class="col-sm-3 control-label">Description:</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $domain['deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary">Update Domain</button>
                                            </div>
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Delete Domain -->
                        <div class="modal fade" id="deleteDomainModal<?= $domain['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteDomainModalLabel<?= $domain['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- ... (Isi modal delete_domain.php) ... -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteDomainModalLabel<?= $domain['id'] ?>">Delete Domain</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this domain?</p>
                                        <a href="<?= site_url("admin/deleteDomain/{$domain['id']}") ?>" class="btn btn-danger">Delete</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addDomainModal">Add Domain</a>

            <!-- Modal for Add Domain -->
            <div class="modal fade" id="addDomainModal" tabindex="-1" role="dialog" aria-labelledby="addDomainModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- ... (Isi modal add_domain.php) ... -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDomainModalLabel">Add Domain</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= form_open('admin/storeDomain', ['class' => 'form-horizontal']) ?>
                            <div class="form-group">
                                <label for="nama_domain" class="col-sm-3 control-label">Domain Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_domain" name="nama_domain" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="opd_id" class="col-sm-3 control-label">OPD:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="opd_id" name="opd_id" required>
                                        <?php foreach ($opds as $opd) : ?>
                                            <option value="<?= $opd['id'] ?>"><?= $opd['nama_opd'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="col-sm-3 control-label">Description:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary">Add Domain</button>
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