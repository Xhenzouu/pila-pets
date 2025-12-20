<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="mb-4"><i class="bi bi-pencil me-2"></i> Edit Pet - <?= esc($pet['pet_name']) ?></h2>

            <?php if (session()->has('success')): ?>
                <div class="alert alert-success"><?= session('success') ?></div>
            <?php endif; ?>
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif; ?>

            <div class="card shadow">
                <div class="card-body p-5">
                    <form method="post" action="<?= base_url('resident/pet/update/' . $pet['id']) ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- Same fields as register_pet.php -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Pet Name <span class="text-danger">*</span></label>
                                <input type="text" name="pet_name" class="form-control" value="<?= esc($pet['pet_name']) ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Species <span class="text-danger">*</span></label>
                                <select name="species" class="form-select" required>
                                    <option value="dog" <?= $pet['species'] === 'dog' ? 'selected' : '' ?>>Dog</option>
                                    <option value="cat" <?= $pet['species'] === 'cat' ? 'selected' : '' ?>>Cat</option>
                                    <option value="rabbit" <?= $pet['species'] === 'rabbit' ? 'selected' : '' ?>>Rabbit</option>
                                    <option value="bird" <?= $pet['species'] === 'bird' ? 'selected' : '' ?>>Bird</option>
                                    <option value="other" <?= $pet['species'] === 'other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Breed (optional)</label>
                                <input type="text" name="breed" class="form-control" value="<?= esc($pet['breed'] ?? '') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select" required>
                                    <option value="registered" <?= $pet['status'] === 'registered' ? 'selected' : '' ?>>Registered</option>
                                    <option value="lost" <?= $pet['status'] === 'lost' ? 'selected' : '' ?>>Lost</option>
                                    <option value="for_adoption" <?= $pet['status'] === 'for_adoption' ? 'selected' : '' ?>>For Adoption</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="4" required><?= esc($pet['description']) ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Location <span class="text-danger">*</span></label>
                                <input type="text" name="location" class="form-control" value="<?= esc($pet['location']) ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                <input type="text" name="contact_number" class="form-control" value="<?= esc($pet['contact_number']) ?>" required>
                            </div>

                            <!-- Current Image Preview -->
                            <?php if (!empty($pet['image'])): ?>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Current Photo</label>
                                    <div class="text-center">
                                        <img src="<?= esc($pet['image']) ?>" class="img-fluid rounded shadow" style="max-height: 300px;" alt="Current pet photo">
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Update Photo URL -->
                            <div class="col-12">
                                <label class="form-label">Update Pet Photo URL (optional)</label>
                                <input type="url" name="image" class="form-control" value="<?= esc($pet['image'] ?? '') ?>" 
                                    placeholder="https://i.pinimg.com/736x/.../new-photo.jpg">
                                <small class="text-muted">
                                    Paste a new direct image link. Leave blank to keep current photo.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <a href="<?= base_url('resident/my-pets') ?>" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[name="image_source"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const isUrl = this.value === 'url';
            document.getElementById('fileInputEdit').style.display = isUrl ? 'none' : 'block';
            document.getElementById('urlInputEdit').style.display = isUrl ? 'block' : 'none';
        });
    });
</script>
<?= $this->endSection() ?>