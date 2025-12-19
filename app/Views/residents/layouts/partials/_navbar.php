<?php $current = uri_string(); ?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid position-relative">

        <!-- Brand (Desktop only) -->
        <a class="navbar-brand fw-bold d-none d-lg-block" href="<?= base_url('resident/home') ?>">
            <i class="bi bi-paw me-2"></i> Pet Adoption & Welfare Society
        </a>

        <!-- Mobile Menu Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#residentSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Desktop Centered Links -->
        <ul class="navbar-nav navbar-center-absolute d-none d-lg-flex">
            <li class="nav-item">
                <a class="nav-link <?= $current === 'resident/home' || $current === '' ? 'active' : '' ?>"
                   href="<?= base_url('resident/home') ?>">
                    <i class="bi bi-house-door me-1"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $current === 'resident/browse' ? 'active' : '' ?>"
                   href="<?= base_url('resident/browse') ?>">
                    <i class="bi bi-search me-1"></i> Browse Pets
                </a>
            </li>
        </ul>

        <!-- User Dropdown (Right) -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-fill me-1"></i> <?= esc(session('username')) ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?= base_url('resident/my-pets') ?>"><i class="bi bi-heart me-2"></i> My Pets</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('resident/profile') ?>"><i class="bi bi-person-circle me-2"></i> Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Mobile Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="residentSidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title fw-bold">
            <i class="bi bi-paw me-2"></i> Pet Adoption & Welfare Society
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <ul class="navbar-nav mb-auto">
            <li class="nav-item">
                <a class="nav-link <?= $current === 'resident/home' || $current === '' ? 'active' : '' ?>"
                   href="<?= base_url('resident/home') ?>" data-bs-dismiss="offcanvas">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $current === 'resident/browse' ? 'active' : '' ?>"
                   href="<?= base_url('resident/browse') ?>" data-bs-dismiss="offcanvas">Browse Pets</a>
            </li>
        </ul>

        <div class="sidebar-footer mt-auto">
            <hr>
            <small>Pila, Laguna • Resident Portal</small>
            <small class="d-block mt-2">Built by Henson Brix Arroyo</small>
        </div>
    </div>
</div>