<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container"> <!-- Begin Page Content -->
    <div class="row">
        <div class="col-4">
            <!-- Chart Card -->
            <div class="card">
                <div class="card-header">
                    Domain Approval Statistics
                </div>
                <div class="card-body">
                    <canvas id="domainChart" width="100px" height="50px"></canvas>
                </div>
            </div>

            <!-- Chart Script -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx = document.getElementById('domainChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Pending', 'Approved', 'Rejected'],
                            datasets: [{
                                data: [<?= $statistik['pending'] ?>, <?= $statistik['approved'] ?>, <?= $statistik['rejected'] ?>],
                                backgroundColor: [
                                    'rgba(0, 123, 255, 0.8)',
                                    'rgba(40, 167, 69, 0.8)',
                                    'rgba(255, 65, 105, 0.8)',
                                ],
                                hoverOffset: 8,
                            }],
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false,
                                },
                                title: {
                                    display: true,
                                    text: 'Domain Approval Statistics',
                                },
                            },
                            animation: {
                                animateRotate: true,
                                animateScale: true,
                            },
                            layout: {
                                padding: {
                                    left: 20,
                                    right: 20,
                                    top: 20,
                                    bottom: 20,
                                },
                            },
                            tooltips: {
                                enabled: true,
                                intersect: true,
                            },
                            hover: {
                                mode: 'index',
                            },
                        },
                    });
                });
            </script>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>