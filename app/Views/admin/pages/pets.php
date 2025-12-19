<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-4 text-center fw-bold">All Registered Pets</h2>

<?php if (session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= session('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (empty($pets)): ?>
    <div class="text-center py-5">
        <i class="bi bi-emoji-frown fs-1 text-muted"></i>
        <h4 class="mt-3 text-muted">No pets registered yet</h4>
        <a href="<?= base_url('pets/create') ?>" class="btn btn-primary mt-3">Register Your First Pet</a>
    </div>
<?php else: ?>
    <div class="row g-4">
        <?php foreach ($pets as $pet): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card pet-card h-100 shadow-sm border-0">
                    <?php if ($pet['image']): ?>
                        <img src="<?= esc($pet['image']) ?>" class="card-img-top" alt="<?= esc($pet['pet_name']) ?>" style="height: 280px; object-fit: cover;">
                    <?php else: ?>
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 280px;">
                            <i class="bi bi-camera fs-1 text-muted"></i>
                        </div>
                    <?php endif; ?>

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0"><?= esc($pet['pet_name']) ?></h5>
                            <span class="badge <?= 
                                $pet['status'] === 'lost' ? 'bg-danger' : 
                                ($pet['status'] === 'for_adoption' ? 'bg-success' : 'bg-primary')
                            ?> status-badge">
                                <?= esc(ucfirst(str_replace('_', ' ', $pet['status']))) ?>
                            </span>
                        </div>

                        <p class="text-muted small mb-2">
                            <strong>Species:</strong> <?= esc(ucfirst($pet['species'])) ?>
                            <?php if ($pet['breed']): ?>
                                <br><strong>Breed:</strong> <?= esc($pet['breed']) ?>
                            <?php endif; ?>
                        </p>

                        <p class="card-text flex-grow-1"><?= esc($pet['description']) ?></p>

                        <?php if ($pet['location']): ?>
                            <p class="text-muted small mb-2">
                                <i class="bi bi-geo-alt me-1"></i> <?= esc($pet['location']) ?>
                            </p>
                        <?php endif; ?>

                        <div class="mt-auto">
                            <?php if ($pet['contact_number']): ?>
                                <a href="tel:<?= esc($pet['contact_number']) ?>" class="btn btn-outline-primary btn-sm w-100">
                                    <i class="bi bi-telephone me-1"></i> Contact Owner
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>