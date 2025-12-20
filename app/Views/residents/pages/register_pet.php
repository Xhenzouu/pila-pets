<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="mb-4 text-center"><i class="bi bi-plus-circle me-2"></i> Register a Pet</h2>

            <?php if (session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?= session('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->has('validation')): ?>
                <div class="alert alert-danger">
                    <?= session('validation')->listErrors() ?>
                </div>
            <?php endif; ?>

            <div class="card shadow">
                <div class="card-body p-5">
                    <?= form_open_multipart('resident/register-pet') ?>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Pet Name <span class="text-danger">*</span></label>
                            <input type="text" name="pet_name" class="form-control" value="<?= old('pet_name') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Species <span class="text-danger">*</span></label>
                            <select name="species" class="form-select" required>
                                <option value="">Choose...</option>
                                <option value="dog" <?= old('species') === 'dog' ? 'selected' : '' ?>>Dog</option>
                                <option value="cat" <?= old('species') === 'cat' ? 'selected' : '' ?>>Cat</option>
                                <option value="rabbit" <?= old('species') === 'rabbit' ? 'selected' : '' ?>>Rabbit</option>
                                <option value="bird" <?= old('species') === 'bird' ? 'selected' : '' ?>>Bird</option>
                                <option value="other" <?= old('species') === 'other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Breed (optional)</label>
                            <input type="text" name="breed" class="form-control" value="<?= old('breed') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select" required>
                                <option value="registered" <?= old('status') === 'registered' ? 'selected' : '' ?>>Registered (my pet)</option>
                                <option value="lost" <?= old('status') === 'lost' ? 'selected' : '' ?>>Lost</option>
                                <option value="for_adoption" <?= old('status') === 'for_adoption' ? 'selected' : '' ?>>For Adoption</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="4" required><?= old('description') ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Location (Barangay, Pila, Laguna) <span class="text-danger">*</span></label>
                            <input type="text" name="location" class="form-control" value="<?= old('location') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="text" name="contact_number" class="form-control" value="<?= old('contact_number') ?? session('contact_number') ?>" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Pet Photo URL (optional)</label>
                            <input type="url" name="image" class="form-control" value="<?= old('image') ?>" 
                                placeholder="https://i.pinimg.com/736x/.../cute-dog.jpg">
                            <small class="text-muted">
                                Paste a direct link to a photo (e.g., from Pinterest, Imgur, or Facebook). 
                                Right-click image → "Copy image address".
                            </small>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Register Pet</button>
                        <a href="<?= base_url('resident/my-pets') ?>" class="btn btn-secondary btn-lg px-5 ms-3">Cancel</a>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[name="image_source"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.getElementById('fileInput').style.display = this.value === 'upload' ? 'block' : 'none';
            document.getElementById('urlInput').style.display = this.value === 'url' ? 'block' : 'none';
        });
    });
</script>
<?= $this->endSection() ?>