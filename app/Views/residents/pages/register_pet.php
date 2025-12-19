<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="mb-4 text-center"><i class="bi bi-plus-circle me-2"></i> Register a Pet</h2>

            <div class="card shadow">
                <div class="card-body p-5">
                    <?= form_open_multipart('resident/register-pet') ?>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Pet Name <span class="text-danger">*</span></label>
                            <input type="text" name="pet_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Species <span class="text-danger">*</span></label>
                            <select name="species" class="form-select" required>
                                <option value="">Choose...</option>
                                <option>Dog</option>
                                <option>Cat</option>
                                <option>Rabbit</option>
                                <option>Bird</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Breed (optional)</label>
                            <input type="text" name="breed" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select" required>
                                <option value="registered">Registered (my pet)</option>
                                <option value="lost">Lost</option>
                                <option value="for_adoption">For Adoption</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Location (Barangay, Pila, Laguna)</label>
                            <input type="text" name="location" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact_number" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Pet Photo</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Register Pet</button>
                        <a href="<?= base_url('resident/dashboard') ?>" class="btn btn-secondary btn-lg px-5 ms-3">Cancel</a>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>