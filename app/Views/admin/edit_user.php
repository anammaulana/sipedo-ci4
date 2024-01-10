<!-- admin/edit_user.php -->
<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <form action="<?= base_url('admin/update_user/' . $user->user_id) ?>" method="post">
                <h2 class="mb-4">Edit Role</h2>
                <table class="table">
                    <tr>
                        <td>Username</td>
                        <td>
                            <?= $user->username ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?= $user->email ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Name Role</td>
                        <td>
                            <?= $user->name ?>

                        </td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>
                            <div class="form-group">
                                <select name="group_id" class="form-control">
                                    <?php foreach ($groups as $group) : ?>
                                        <option value="<?= $group->id ?>" <?= ($group->id == $user->group_id) ? 'selected' : '' ?>>
                                            <?= $group->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <!-- ... (tambahkan baris tabel lainnya sesuai kebutuhan) ... -->
                </table>
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Update User</button>
                <!-- Tombol Back menggunakan Bootstrap -->
                <a href="<?= base_url('admin/datausers'); ?>" class="btn btn-secondary mt-2">Back to Users</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>