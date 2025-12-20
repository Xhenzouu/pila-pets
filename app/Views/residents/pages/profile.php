<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <i class="bi bi-person-circle fs-1 text-primary"></i>
                <h2 class="mt-3"><?= esc(session('username')) ?></h2>
                <p class="text-muted">Resident of <?= esc(session('barangay') ?? 'Pila, Laguna') ?></p>
                <p class="text-muted">Member since <?= date('F Y', strtotime(session('created_at') ?? '2025-12-20')) ?></p>
                <a href="<?= base_url('resident/edit_profile') ?>" class="btn btn-outline-primary mt-3">
                    <i class="bi bi-pencil me-2"></i>Edit Profile
                </a>
            </div>

            <!-- Personal Information Card -->
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Full Name</strong>
                            <p class="mt-1"><?= esc(session('first_name') . ' ' . (session('middle_name') ? session('middle_name') . ' ' : '') . session('last_name')) ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Email Address</strong>
                            <p class="mt-1"><?= esc(session('email')) ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Contact Number</strong>
                            <p class="mt-1"><?= esc(session('contact_number') ?? 'Not provided') ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Barangay</strong>
                            <p class="mt-1"><?= esc(session('barangay') ?? 'Not set') ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Pets Section (Placeholder - you can loop real pets later) -->
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">My Pets</h5>
                </div>
                <div class="card-body">
                    <?php if (isset($pets) && count($pets) > 0): ?>
                        <div class="row">
                            <?php foreach ($pets as $pet): ?>
                                <div class="col-md-4 mb-3">
                                    <img src="<?= esc($pet['image']) ?>" class="img-fluid rounded mb-2" alt="<?= esc($pet['pet_name']) ?>" style="height: 180px; object-fit: cover;">
                                    <h6><?= esc($pet['pet_name']) ?></h6>
                                    <small class="text-muted"><?= esc($pet['breed']) ?> • <?= ucfirst(str_replace('_', ' ', $pet['status'])) ?></small>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted text-center">You haven't registered any pets yet.</p>
                        <div class="text-center">
                            <a href="<?= base_url('resident/register-pet') ?>" class="btn btn-sm btn-success">Register a Pet</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>