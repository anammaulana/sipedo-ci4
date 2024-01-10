<!-- File: app/Views/admin/opd.php -->
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <!-- File: app/Views/admin/bahasa_program.php -->

            <h2>Manage Programming Languages</h2>

            <!-- Tampilkan Flashdata jika ada -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Programming Language</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bahasaPrograms as $bahasaProgram) : ?>
                        <tr>
                            <td><?= $bahasaProgram['id'] ?></td>
                            <td><?= $bahasaProgram['nama_bahasa_program'] ?></td>
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editBahasaProgramModal<?= $bahasaProgram['id'] ?>">Edit</a>
                                <a href="<?= site_url("admin/deleteBahasaProgram/{$bahasaProgram['id']}") ?>" onclick="return confirm('Are you sure you want to delete this Programming Language?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                        <!-- Modal for Edit Bahasa Program -->
                        <div class="modal fade" id="editBahasaProgramModal<?= $bahasaProgram['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editBahasaProgramModalLabel<?= $bahasaProgram['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editBahasaProgramModalLabel<?= $bahasaProgram['id'] ?>">Edit Programming Language</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= form_open("admin/updateBahasaProgram/{$bahasaProgram['id']}", ['class' => 'form-horizontal']) ?>
                                        <div class="form-group">
                                            <label for="nama_bahasa_program" class="col-sm-3 control-label">Programming Language:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_bahasa_program" name="nama_bahasa_program" value="<?= $bahasaProgram['nama_bahasa_program'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary">Update Programming Language</button>
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

            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addBahasaProgramModal">Add Programming Language</a>

            <!-- Modal for Add Bahasa Program -->
            <div class="modal fade" id="addBahasaProgramModal" tabindex="-1" role="dialog" aria-labelledby="addBahasaProgramModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBahasaProgramModalLabel">Add Programming Language</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= form_open('admin/storeBahasaProgram', ['class' => 'form-horizontal']) ?>
                            <div class="form-group">
                                <label for="nama_bahasa_program" class="col-sm-3 control-label">Programming Language:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_bahasa_program" name="nama_bahasa_program" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary">Add Programming Language</button>
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