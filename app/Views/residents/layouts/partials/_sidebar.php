<?php 
    $uri = service('uri');
    $current = uri_string();
?>

<div class="sidebar">
    <!-- Logo & User Info -->
    <div class="logo d-flex flex-column align-items-center">
        <i class="bi bi-paw text-white fs-1 mb-3"></i>
        <span>Pet Adoption & Welfare Society</span>
    </div>

    <div class="user-info">
        <p class="mb-1"><i class="bi bi-person-fill"></i> <?= esc(session('username')) ?></p>
        <small>Pila, Laguna Resident</small>
    </div>

    <nav class="nav flex-column px-3">
        <a class="nav-link <?= $current === 'resident/home' || $current === '' ? 'active' : '' ?>"
           href="<?= base_url('resident/home') ?>">
            <i class="bi bi-house-door"></i> <span>Home</span>
        </a>

        <a class="nav-link <?= $current === 'resident/browse' ? 'active' : '' ?>"
           href="<?= base_url('resident/browse') ?>">
            <i class="bi bi-search"></i> <span>Browse Pets</span>
        </a>

        <a class="nav-link <?= $current === 'resident/my-pets' ? 'active' : '' ?>"
           href="<?= base_url('resident/my-pets') ?>">
            <i class="bi bi-heart"></i> <span>My Pets</span>
        </a>

        <a class="nav-link <?= $current === 'resident/profile' ? 'active' : '' ?>"
           href="<?= base_url('resident/profile') ?>">
            <i class="bi bi-person-circle"></i> <span>Profile</span>
        </a>

        <hr class="border-light opacity-25 my-4">

        <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
        </a>
    </nav>

    <div class="text-center text-white-50 small px-3 mt-auto mb-4">
        <small>Built by Henson Brix Arroyo</small>
    </div>
</div>