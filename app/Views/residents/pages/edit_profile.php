<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2 class="mb-4 text-center"><i class="bi bi-pencil-square me-2"></i> Edit Profile</h2>

            <!-- Success/Error Messages (optional - if you use session flashdata) -->
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success"><?= session('success') ?></div>
            <?php endif; ?>
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif; ?>

            <div class="card shadow">
                <div class="card-body p-5">
                    <form method="post" action="<?= base_url('resident/update_profile') ?>">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="first_name" value="<?= esc(session('first_name')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="<?= esc(session('middle_name')) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="last_name" value="<?= esc(session('last_name')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= esc(session('email')) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" value="<?= esc(session('contact_number')) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Barangay</label>
                            <input type="text" class="form-control" name="barangay" value="<?= esc(session('barangay')) ?>">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current password">
                            <small class="text-muted">Only fill if you want to change your password</small>
                        </div>

                        <div class="d-grid d-md-flex justify-content-md-end gap-2">
                            <a href="<?= base_url('resident/profile') ?>" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>