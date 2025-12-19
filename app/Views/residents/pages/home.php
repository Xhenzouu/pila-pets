<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-9 text-center">
            <h1 class="display-4 mb-4 text-primary">
                <i class="bi bi-paw"></i> Welcome to Pila Pets, <?= esc(session('username')) ?>!
            </h1>
            <p class="lead text-muted">
                Help lost pets find their way home or match with new families across the Pila community.
            </p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-primary shadow h-100 text-center p-4">
                <i class="bi bi-plus-circle fs-1 text-primary mb-3"></i>
                <h4>Register a Pet</h4>
                <p class="text-muted">Add your pet — registered, lost, or for adoption.</p>
                <a href="<?= base_url('resident/register-pet') ?>" class="btn btn-primary w-100">Register Now</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success shadow h-100 text-center p-4">
                <i class="bi bi-search fs-1 text-success mb-3"></i>
                <h4>Browse Pets</h4>
                <p class="text-muted">See all pets in the community.</p>
                <a href="<?= base_url('resident/browse') ?>" class="btn btn-success w-100">Browse Pets</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-info shadow h-100 text-center p-4">
                <i class="bi bi-chat-dots fs-1 text-info mb-3"></i>
                <h4>Safety Tips</h4>
                <p class="text-muted">Learn how to safely meet pet owners and adopters.</p>
                <a href="#safety" class="btn btn-outline-info w-100">View Tips</a>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-activity me-2 text-primary"></i>Community Activity</h5>
                    <p class="text-muted mb-4">Quick snapshot of what's happening. Replace with live stats later.</p>
                    <div class="row text-center g-3">
                        <div class="col-4">
                            <div class="fw-bold fs-4 text-primary">12</div>
                            <div class="text-muted small">New pets this week</div>
                        </div>
                        <div class="col-4">
                            <div class="fw-bold fs-4 text-success">5</div>
                            <div class="text-muted small">Adoptions pending</div>
                        </div>
                        <div class="col-4">
                            <div class="fw-bold fs-4 text-warning">3</div>
                            <div class="text-muted small">Reported lost</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" id="safety">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-shield-check me-2 text-success"></i>Safety Tips</h5>
                    <ul class="list-unstyled mb-0 text-muted">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Meet in public spaces for exchanges.</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Verify pet details before adoption.</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Keep contact info updated.</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Report suspicious activity to admins.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-info-circle me-2 text-secondary"></i>How It Works</h5>
                    <ol class="text-muted mb-0">
                        <li class="mb-2">Register your pet with clear details and a photo.</li>
                        <li class="mb-2">Browse and connect with owners or adopters.</li>
                        <li class="mb-2">Coordinate safe meetups and finalize adoption.</li>
                        <li>Update the pet's status when reunited or adopted.</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-lightbulb me-2 text-warning"></i>Coming Soon</h5>
                    <ul class="text-muted mb-0">
                        <li class="mb-2">In-app messaging between owners and adopters.</li>
                        <li class="mb-2">Geo-tagging for lost and found sightings.</li>
                        <li class="mb-2">Verification badges for trusted users.</li>
                        <li>Adoption progress tracker and reminders.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>