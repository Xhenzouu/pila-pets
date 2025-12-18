<?= $this->extend('pets/layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-5 fw-bold text-center">Welcome to Pila Pets Admin Dashboard</h2>

<!-- Stats Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card text-white bg-primary shadow">
            <div class="card-body text-center">
                <i class="bi bi-grid-3x3-gap-fill fs-1 mb-3"></i>
                <h4>Total Pets</h4>
                <h2 class="display-5 fw-bold"><?= $totalPets ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white" style="background-color: #3FA37E;">
            <div class="card-body text-center">
                <i class="bi bi-check-circle-fill fs-1 mb-3"></i>
                <h4>Registered</h4>
                <h2 class="display-5 fw-bold"><?= $registered ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger shadow">
            <div class="card-body text-center">
                <i class="bi bi-exclamation-triangle-fill fs-1 mb-3"></i>
                <h4>Lost Pets</h4>
                <h2 class="display-5 fw-bold"><?= $lost ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success shadow">
            <div class="card-body text-center">
                <i class="bi bi-heart-fill fs-1 mb-3"></i>
                <h4>For Adoption</h4>
                <h2 class="display-5 fw-bold"><?= $forAdoption ?></h2>
            </div>
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Pet Status Distribution</h5>
            </div>
            <div class="card-body">
                <canvas id="statusChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Registered', 'Lost', 'For Adoption'],
                datasets: [{
                    data: [<?= $registered ?>, <?= $lost ?>, <?= $forAdoption ?>],
                    backgroundColor: [
                        '#3FA37E',  // Green for registered
                        '#dc3545',  // Red for lost
                        '#28a745'   // Success green for adoption
                    ],
                    borderColor: '#fff',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { font: { size: 14 } }
                    }
                }
            }
        });
    });
</script>

<?= $this->endSection() ?>