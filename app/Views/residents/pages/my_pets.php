<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-heart me-2"></i> My Pets</h2>
        <a href="<?= base_url('resident/register-pet') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Register New Pet
        </a>
    </div>

    <?php if (empty($pets)): ?>
        <div class="text-center py-5">
            <i class="bi bi-emoji-frown fs-1 text-muted mb-3"></i>
            <p class="text-muted">You haven't registered any pets yet.</p>
            <a href="<?= base_url('resident/register-pet') ?>" class="btn btn-primary">Register Your First Pet</a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($pets as $pet): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow h-100">
                        <?php if ($pet['image']): ?>
                            <?php $imageSrc = preg_match('/^https?:\/\//', $pet['image']) ? $pet['image'] : base_url('uploads/pets/' . $pet['image']); ?>
                            <img src="<?= esc($imageSrc) ?>" class="card-img-top" alt="<?= esc($pet['pet_name']) ?>" style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image fs-1 text-muted"></i>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($pet['pet_name']) ?></h5>
                            <p class="card-text">
                                <strong>Species:</strong> <?= esc(ucfirst($pet['species'])) ?><br>
                                <strong>Status:</strong>
                                <span class="badge bg-<?= $pet['status'] === 'lost' ? 'danger' : ($pet['status'] === 'for_adoption' ? 'warning' : 'success') ?>">
                                    <?= ucfirst(str_replace('_', ' ', $pet['status'])) ?>
                                </span>
                            </p>
                            <div class="btn-group w-100">
                                <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                                <a href="#" class="btn btn-sm btn-outline-warning">Edit</a>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>