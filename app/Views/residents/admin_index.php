<?= $this->extend('pets/layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-4 fw-bold">Residents</h2>

<!-- Metrics Cards -->
<div class="row mb-4 g-3">
    <div class="col-md-3 col-sm-6">
        <div class="card text-white" style="background-color: #3FA37E;">
            <div class="card-body text-center py-4">
                <i class="bi bi-people-fill fs-3 mb-2"></i>
                <h5 class="mb-1">Total Residents</h5>
                <h3 class="display-6 fw-bold mb-0"><?= number_format($totalResidents) ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card text-white bg-info">
            <div class="card-body text-center py-4">
                <i class="bi bi-geo-alt-fill fs-3 mb-2"></i>
                <h5 class="mb-1">Unique Barangays</h5>
                <h3 class="display-6 fw-bold mb-0"><?= $barangayCount ?></h3>
            </div>
        </div>
    </div>
</div>

<!-- Alerts -->
<?php if (session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= session('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (session()->has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <?= session('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<!-- Residents Table -->
<div class="card shadow">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="background-color: var(--primary-green) !important; color: white !important;">#</th>
                        <th style="background-color: var(--primary-green) !important; color: white !important;">Full Name</th>
                        <th style="background-color: var(--primary-green) !important; color: white !important;">Barangay</th>
                        <th style="background-color: var(--primary-green) !important; color: white !important;">Contact</th>
                        <th style="background-color: var(--primary-green) !important; color: white !important;">Email</th>
                        <th style="background-color: var(--primary-green) !important; color: white !important;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($residents)): ?>
                        <?php $no = ($pager->getCurrentPage() - 1) * $pager->getPerPage() + 1; ?>
                        <?php foreach ($residents as $resident): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= esc($resident['full_name']) ?></strong></td>
                                <td><?= esc($resident['barangay']) ?></td>
                                <td><?= esc($resident['contact_number']) ?></td>
                                <td><?= esc($resident['email']) ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('residents/delete/' . $resident['id']) ?>"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Delete <?= esc($resident['full_name'], 'js') ?>?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">No residents found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination - Always Visible -->
<div class="mt-4 d-flex justify-content-center">
    <?= $pager->links('default', 'bootstrap_pagination') ?>
</div>

<?= $this->endSection() ?>