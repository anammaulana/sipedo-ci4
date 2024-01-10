<!-- File: app/Views/dashboard/reports.php -->

<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2>Dashboard Reports</h2>

            <div class="row">
                <!-- Daily Report -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Laporan Harian</h4>
                        </div>
                        <div class="card-body">
                            <p>Total domain yang diajukan hari ini (<?= date('Y-m-d') ?>): <?= $dailyReport['total'] ?? 0 ?></p>
                        </div>
                    </div>
                </div>

                <!-- Weekly Report -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Laporan Mingguan</h4>
                        </div>
                        <div class="card-body">
                            <p>Total domain yang diajukan minggu ini (<?= date('Y-m-d', strtotime('monday this week')) ?> - <?= date('Y-m-d', strtotime('sunday this week')) ?>): <?= $weeklyReport['total'] ?? 0 ?></p>
                        </div>
                    </div>
                </div>

                <!-- Monthly Report -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Laporan Bulanan</h4>
                        </div>
                        <div class="card-body">
                            <p>Total domain yang diajukan bulan ini (<?= date('Y-m-01') ?> - <?= date('Y-m-t') ?>): <?= $monthlyReport['total'] ?? 0 ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>