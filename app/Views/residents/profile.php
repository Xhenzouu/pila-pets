<?= $this->extend('layouts/resident_main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2 class="mb-4 text-center"><i class="bi bi-person-circle me-2"></i> My Profile</h2>

            <div class="card shadow">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="bi bi-person-circle fs-1 text-muted"></i>
                        <h4 class="mt-3"><?= esc(session('username')) ?></h4>
                        <p class="text-muted">Member since 2025</p>
                    </div>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" value="<?= esc(session('username')) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Not set">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Change Password</label>
                            <input type="password" class="form-control" placeholder="Leave blank to keep current">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>