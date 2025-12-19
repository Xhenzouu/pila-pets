<?php 
    $uri = service('uri');
    $current = uri_string();
?>

<div class="sidebar">
    <!-- Logo Section -->
    <div class="logo d-flex flex-column align-items-center justify-content-center position-relative px-3 py-4">
        <i class="bi bi-paw text-white fs-1 mb-2"></i>
        <span class="fs-5 fw-bold text-white text-center">Pet Adoption & Welfare Society</span>
        <button class="btn btn-sm btn-light d-lg-none position-absolute top-0 end-0 m-2" id="sidebarClose">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <nav class="nav flex-column px-2 flex-grow-1">
        <!-- Dashboard -->
        <a class="nav-link <?= ($current === 'dashboard' || $current === '' || $current === 'admin') ? 'active' : '' ?>" 
           href="<?= base_url('dashboard') ?>">
            <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>
        
        <!-- Pets -->
        <a class="nav-link <?= ($current === 'pets' || str_starts_with($current, 'pets/')) ? 'active' : '' ?>" 
           href="<?= base_url('pets') ?>">
            <i class="bi bi-grid-3x3-gap-fill"></i> <span>Pets</span>
        </a>

        <!-- Residents - Only for admin -->
        <?php if (session('role') === 'admin'): ?>
            <a class="nav-link <?= ($current === 'admin/residents') ? 'active' : '' ?>" 
               href="<?= base_url('admin/residents') ?>">
                <i class="bi bi-people-fill"></i> <span>Residents</span>
            </a>
        <?php endif; ?>

        <hr class="border-light opacity-25 my-3 mx-3"> <!-- Reduced my-4 → my-3 -->

        <!-- Logout -->
        <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
        </a>
    </nav>

    <!-- Enhanced Credits at the bottom -->
    <div class="text-center text-white px-4 pb-4 mt-auto">
        <small class="d-block opacity-75">Built with care by</small>
        <strong class="d-block text-white">Henson Brix Arroyo</strong>
    </div>
</div>

<style>
    .sidebar {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .sidebar .nav-link {
        color: rgba(255,255,255,0.9);
        padding: 9px 15px; /* Reduced from 11px → 9px for tighter vertical spacing */
        border-radius: 8px;
        margin: 3px 8px; /* Reduced from 4px → 3px */
        transition: all 0.3s;
        display: flex;
        align-items: center;
    }

    .sidebar .nav-link i {
        width: 30px;
        text-align: center;
        font-size: 1.1rem;
    }

    .sidebar .nav-link span {
        font-size: 0.95rem;
        font-weight: 500;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background-color: rgba(255,255,255,0.2);
        color: white;
    }

    /* Make credits more visible */
    .sidebar .text-white strong {
        font-size: 1rem;
        opacity: 1;
    }

    @media (max-width: 992px) {
        .sidebar .nav-link {
            padding: 12px; /* Slightly larger tap area on mobile */
            margin: 3px 6px;
            justify-content: center;
        }
        .sidebar .nav-link span {
            display: none;
        }
        .sidebar .logo span {
            display: none;
        }
        .sidebar .logo {
            padding: 20px 0;
        }
        /* Credits still visible in icon-only mode */
        .sidebar .text-white small,
        .sidebar .text-white strong {
            font-size: 0.8rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar');
        const closeBtn = document.getElementById('sidebarClose');
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                sidebar.classList.toggle('d-none');
            });
        }
    });
</script>