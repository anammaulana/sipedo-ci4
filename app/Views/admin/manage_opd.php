<!-- File: app/Views/admin/opd.php -->
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <!-- File: app/Views/admin/opd.php -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
 
            <h2>Manage OPD</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama OPD</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($opds as $opd) : ?>
                        <tr>
                            <td><?= $opd['id'] ?></td>
                            <td><?= $opd['nama_opd'] ?></td>
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editOpdModal<?= $opd['id'] ?>">Edit</a>
                                <a href="<?= site_url("admin/deleteOpd/{$opd['id']}") ?>" onclick="return confirm('Are you sure you want to delete this OPD?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                        <!-- Modal for Edit OPD -->
                        <div class="modal fade" id="editOpdModal<?= $opd['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editOpdModalLabel<?= $opd['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editOpdModalLabel<?= $opd['id'] ?>">Edit OPD</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= form_open("admin/updateOpd/{$opd['id']}", ['class' => 'form-horizontal']) ?>
                                        <div class="form-group">
                                            <label for="nama_opd" class="col-sm-3 control-label">Nama OPD:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_opd" name="nama_opd" value="<?= $opd['nama_opd'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary">Update OPD</button>
                                            </div>
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addOpdModal">Add OPD</a>

            <!-- Modal for Add OPD -->
            <div class="modal fade" id="addOpdModal" tabindex="-1" role="dialog" aria-labelledby="addOpdModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addOpdModalLabel">Add OPD</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= form_open('admin/storeOpd', ['class' => 'form-horizontal']) ?>
                            <div class="form-group">
                                <label for="nama_opd" class="col-sm-3 control-label">Nama OPD:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_opd" name="nama_opd" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary">Add OPD</button>
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