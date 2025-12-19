<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <h2 class="mb-4 text-center"><i class="bi bi-search me-2"></i> Browse All Pets</h2>

    <?php if (empty($pets)): ?>
        <div class="text-center py-5">
            <i class="bi bi-emoji-frown fs-1 text-muted mb-3"></i>
            <p class="text-muted">No pets available at the moment.</p>
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
                                <span class="badge bg-<?= $pet['status'] === 'lost' ? 'danger' : ($pet['status'] === 'for_adoption' ? 'warning' : 'secondary') ?>">
                                    <?= ucfirst(str_replace('_', ' ', $pet['status'])) ?>
                                </span><br>
                                <strong>Location:</strong> <?= esc($pet['location'] ?? 'Not specified') ?>
                            </p>
                        </div>
                        <div class="card-footer text-muted small">
                            Posted by: <?= esc($pet['owner_name'] ?? 'Unknown') ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>