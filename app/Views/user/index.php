<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800">Dashboard Users</h2>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>hai sahabat <?= user()->username; ?></h1>
                <p>untuk mengakses dasboard admin anda harus Login dulu menggunakan email default pada aplikasi ini </p>
                <p>admin@gmail.com</p>
                <p>pass:210447</p>
                <P> nikmati fitur fitur admin setelah login pake akun ini terimakasih </P>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>