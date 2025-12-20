<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    
    <!-- Search & Filter Bar (Right-aligned on desktop) -->
    <div class="row justify-content-end mb-4">
        <div class="col-lg-8 col-xl-7">
            <form method="get" action="<?= base_url('resident/browse') ?>" class="d-flex flex-column flex-md-row gap-3">
                <!-- Search Input -->
                <div class="flex-grow-1">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" 
                            name="search" 
                            class="form-control border-start-0 ps-0" 
                            placeholder="Search by name or breed..." 
                            value="<?= esc($currentSearch ?? '') ?>">
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="flex-shrink-1">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="registered" <?= ($currentStatus ?? '') === 'registered' ? 'selected' : '' ?>>Registered</option>
                        <option value="lost" <?= ($currentStatus ?? '') === 'lost' ? 'selected' : '' ?>>Lost</option>
                        <option value="for_adoption" <?= ($currentStatus ?? '') === 'for_adoption' ? 'selected' : '' ?>>For Adoption</option>
                    </select>
                </div>

                <!-- Submit Button + Clear Button -->
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-funnel me-1"></i> Filter
                    </button>
                    <?php if (!empty($currentSearch ?? '') || !empty($currentStatus ?? '')): ?>
                        <a href="<?= base_url('resident/browse') ?>" class="btn btn-outline-secondary ms-2">
                            <i class="bi bi-x-circle"></i> Clear
                        </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <?php if (empty($pets)): ?>
        <div class="text-center py-5">
            <i class="bi bi-emoji-frown fs-1 text-muted mb-3"></i>
            <h5>No pets match your search.</h5>
            <p class="text-muted">Try adjusting your filters or check back later!</p>
            <a href="<?= base_url('resident/browse') ?>" class="btn btn-outline-primary">Clear Filters</a>
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
                    <div class="card shadow h-100 hover-shadow transition">
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
                                <?php if (!empty($pet['breed'])): ?>
                                    <strong>Breed:</strong> <?= esc($pet['breed']) ?><br>
                                <?php endif; ?>
                                <strong>Status:</strong>
                                <span class="badge bg-<?= $pet['status'] === 'lost' ? 'danger' : ($pet['status'] === 'for_adoption' ? 'warning' : 'secondary') ?> fs-6">
                                    <?= ucfirst(str_replace('_', ' ', $pet['status'])) ?>
                                </span>
                            </p>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-geo-alt me-1"></i> <?= esc($pet['location'] ?? 'Pila, Laguna') ?>
                            </p>
                            <div class="mt-auto">
                                <button type="button" 
                                        class="btn btn-outline-primary w-100" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#viewPetModal<?= $pet['id'] ?>">
                                    <i class="bi bi-eye me-1"></i> View Details
                                </button>
                            </div>
                        </div>
                        <div class="card-footer text-muted small">
                            Posted by: <strong><?= esc($pet['owner_name'] ?? 'Anonymous Resident') ?></strong>
                        </div>
                    </div>
                </div>

                <!-- Reusable View Modal -->
                <?= view('residents/layouts/partials/view_pet_modal', ['pet' => $pet]) ?>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Hover effect CSS -->
<style>
    .hover-shadow {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
</style>
<?= $this->endSection() ?>