<?= $this->extend('pets/layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-4 fw-bold">Register a New Pet</h2>

<div class="card shadow">
    <div class="card-body">
        <form action="<?= base_url('pets/store') ?>" method="post">
            <?= csrf_field() ?>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Pet Name</label>
                    <input type="text" name="pet_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Species</label>
                    <select name="species" class="form-select" required>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Bird">Bird</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Breed (optional)</label>
                    <input type="text" name="breed" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="registered">Registered</option>
                        <option value="lost">Lost</option>
                        <option value="for_adoption">For Adoption</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Image URL (for now)</label>
                    <input type="url" name="image" class="form-control" placeholder="https://example.com/pet.jpg">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Location (Barangay, Pila, Laguna)</label>
                    <input type="text" name="location" class="form-control" placeholder="e.g., Linga, Pila, Laguna" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-save me-2"></i> Register Pet
                    </button>
                    <a href="<?= base_url('pets') ?>" class="btn btn-secondary btn-lg ms-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>