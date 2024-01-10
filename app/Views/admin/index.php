<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Selamat Datang, Admin!, <?= user()->username; ?></h2>
                        <p class="card-text">
                            Anda memiliki peran penting dalam pengelolaan pengajuan domain. Berikut adalah beberapa fungsi utama Anda:
                        <ul>
                            <li>Menyetujui atau menolak pengajuan domain yang diajukan oleh pengguna.</li>
                            <li>Manajemen Organisasi Perangkat Daerah (OPD).</li>
                            <li>Manajemen Bahasa Pemrograman yang dapat dipilih oleh pengguna.</li>
                            <li>Melihat detail lengkap dari setiap domain yang diajukan.</li>
                            <li>Melihat log pengajuan dan statusnya.</li>
                            <li>Mengelola data master seperti OPD dan Bahasa Pemrograman.</li>
                        </ul>
                        Silakan gunakan fitur-fitur tersebut untuk memastikan pengelolaan domain berjalan lancar.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>