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
                <?php 
                $imageSrc = !empty($pet['image']) && filter_var($pet['image'], FILTER_VALIDATE_URL) 
                    ? esc($pet['image']) 
                    : (!empty($pet['image']) ? base_url('uploads/pets/' . $pet['image']) : '');
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow h-100">
                        <?php if ($imageSrc): ?>
                            <img src="<?= $imageSrc ?>" class="card-img-top" alt="<?= esc($pet['pet_name']) ?>" style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image fs-1 text-muted"></i>
                            </div>
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= esc($pet['pet_name']) ?></h5>
                            <p class="card-text flex-grow-1">
                                <strong>Species:</strong> <?= esc(ucfirst($pet['species'])) ?><br>
                                <strong>Breed:</strong> <?= esc($pet['breed'] ?? 'Not specified') ?><br>
                                <strong>Status:</strong>
                                <span class="badge bg-<?= $pet['status'] === 'lost' ? 'danger' : ($pet['status'] === 'for_adoption' ? 'warning' : 'success') ?>">
                                    <?= ucfirst(str_replace('_', ' ', $pet['status'])) ?>
                                </span>
                            </p>
                            <div class="btn-group mt-auto" role="group">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewPetModal<?= $pet['id'] ?>">
                                    View
                                </button>
                                <a href="<?= base_url('resident/pet/edit/' . $pet['id']) ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deletePetModal"
                                        data-pet-id="<?= $pet['id'] ?>"
                                        data-pet-name="<?= esc($pet['pet_name']) ?>">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include View Modal -->
                <?= view('residents/layouts/partials/view_pet_modal', ['pet' => $pet]) ?>

            <?php endforeach; ?>
        </div>

        <!-- Include Shared Delete Modal (only once) -->
        <?= view('residents/layouts/partials/delete_pet_modal') ?>

    <?php endif; ?>
</div>
<?= $this->endSection() ?>