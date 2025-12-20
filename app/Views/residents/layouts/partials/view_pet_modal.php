<?php 
$imageSrc = !empty($pet['image']) && filter_var($pet['image'], FILTER_VALIDATE_URL) 
    ? esc($pet['image']) 
    : (!empty($pet['image']) ? base_url('uploads/pets/' . $pet['image']) : '');
?>
<div class="modal fade" id="viewPetModal<?= $pet['id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-paw me-2"></i><?= esc($pet['pet_name']) ?> - Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-md-5">
                        <?php if ($imageSrc): ?>
                            <img src="<?= $imageSrc ?>" class="img-fluid rounded shadow" alt="<?= esc($pet['pet_name']) ?>">
                        <?php else: ?>
                            <div class="bg-light border d-flex align-items-center justify-content-center rounded shadow" style="height: 320px;">
                                <i class="bi bi-image fs-1 text-muted"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7">
                        <table class="table table-borderless">
                            <tr><th>Owner</th><td><?= esc(session('first_name') . ' ' . session('middle_name') . ' ' . session('last_name')) ?></td></tr>
                            <tr><th>Species</th><td><?= esc(ucfirst($pet['species'])) ?></td></tr>
                            <tr><th>Breed</th><td><?= esc($pet['breed'] ?? 'Not specified') ?></td></tr>
                            <tr><th>Status</th><td>
                                <span class="badge bg-<?= $pet['status'] === 'lost' ? 'danger' : ($pet['status'] === 'for_adoption' ? 'warning' : 'success') ?>">
                                    <?= ucfirst(str_replace('_', ' ', $pet['status'])) ?>
                                </span>
                            </td></tr>
                            <tr><th>Location</th><td><?= esc($pet['location']) ?></td></tr>
                            <tr><th>Contact</th><td><?= esc($pet['contact_number']) ?></td></tr>
                        </table>
                        <hr>
                        <p><strong>Description:</strong></p>
                        <p class="text-muted"><?= nl2br(esc($pet['description'])) ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>