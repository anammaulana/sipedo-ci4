<?= $this->extend('katalog/components/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Selamat Datang, Pengguna! </h2>
                        <p class="card-text">
                            Aplikasi ini memberikan kemudahan bagi Anda untuk mengajukan domain baru sesuai kebutuhan. Berikut adalah beberapa fungsi utama yang dapat Anda lakukan:
                        <ul>
                            <li>Mengajukan domain baru dengan mengisi formulir pengajuan.</li>
                            <li>Melihat status pengajuan domain Anda, apakah dalam proses persetujuan, disetujui, atau ditolak oleh admin.</li>
                            <li>Melihat detail lengkap dari setiap domain yang Anda ajukan.</li>
                            <li>Memperbarui informasi pengajuan domain jika diperlukan.</li>
                            <li>Menavigasi katalog aplikasi untuk melihat domain yang telah disetujui oleh admin.</li>
                        </ul>
                        Gunakan fitur-fitur tersebut dengan bijak untuk memaksimalkan pengalaman Anda dalam menggunakan aplikasi ini, Ayo registrasi untuk mulai fitur fitur lain nya
                        </p>
                        <a href="<?= base_url('register'); ?>" class="btn btn-primary">Mulai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>