<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>hai sahabat <?php user()->username; ?></h1>
                <p>untuk mengakses dasboard admin anda harus menggunakan dulu email default pada aplikasi ini </p>
                <p>admin@gmail.com</p>
                <p>pass:210447</p>
                <P> nikmati fitur fitur admin setelah login pake akun ini terimakasih </P>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>