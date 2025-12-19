<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Pet Adoption & Welfare Society' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --brand-color: #3FA37E;
            --brand-color-dark: #2f7c61;
        }

        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .navbar {
            background-color: var(--brand-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar .nav-link,
        .navbar .navbar-brand {
            color: #f8f9fa;
        }

        .navbar .nav-link.active {
            font-weight: 700;
        }

        /* Hide brand text on mobile */
        @media (max-width: 991.98px) {
            .navbar-brand {
                display: none;
            }
        }

        .navbar-center-absolute {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        @media (max-width: 991.98px) {
            .navbar-center-absolute {
                position: static;
                transform: none;
            }
        }

        /* ===== MOBILE SIDEBAR ===== */
        .offcanvas-start {
            width: 75vw;
            background-color: var(--brand-color);
            color: #fff;
        }

        .offcanvas .nav-link {
            color: #ffffff;
            font-size: 1.1rem;
            padding: 8px 0; /* reduced vertical gap */
        }

        .offcanvas .nav-link.active {
            font-weight: 700;
            text-decoration: underline;
        }

        .sidebar-footer {
            font-size: 0.85rem;
            opacity: 0.85;
            text-align: center;
        }

        .sidebar-footer hr {
            border-color: rgba(255,255,255,0.85);
            border-width: 2px; /* heavier line */
            margin-bottom: 0.5rem;
        }

        .sidebar-footer small {
            display: block;
        }

        .offcanvas-header {
            padding-bottom: 0.25rem;
        }

        .offcanvas-title {
            margin-bottom: 0;
        }

        /* Horizontal line between title and links */
        .sidebar-title-hr {
            border-color: rgba(255,255,255,0.9);
            border-width: 2px;
            margin: 0.5rem 0 0.75rem 0;
        }

        /* Make dropdown float above navbar on mobile */
        .navbar-nav .dropdown-menu {
            position: absolute !important;
            top: 100% !important;
            right: 0;
            left: auto;
            z-index: 1100;
            background-color: #fff !important; 
            color: #000;
            border: 1px solid rgba(0,0,0,0.15);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .navbar-nav .dropdown-item {
            color: #000 !important;
        }

        .navbar-nav .dropdown-item:hover,
        .navbar-nav .dropdown-item:focus {
            background-color: #f8f9fa !important;
            color: #000 !important;
        }

        .main-content {
            padding-top: 80px;
        }

        footer {
            margin-top: auto;
            background-color: var(--brand-color);
            color: #ffffff;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid position-relative">

        <!-- BRAND (DESKTOP ONLY) -->
        <a class="navbar-brand fw-bold d-none d-lg-block"
           href="<?= base_url('resident/dashboard') ?>">
            <i class="bi bi-paw me-2"></i> Pet Adoption &amp; Welfare Society
        </a>

        <!-- MOBILE TOGGLER -->
        <button class="navbar-toggler d-lg-none" type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- DESKTOP CENTER LINKS -->
        <ul class="navbar-nav navbar-center-absolute d-none d-lg-flex">
            <li class="nav-item">
                <a class="nav-link <?= uri_string() === 'resident/dashboard' ? 'active' : '' ?>"
                   href="<?= base_url('resident/dashboard') ?>">
                    <i class="bi bi-house-door me-1"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= uri_string() === 'resident/browse' ? 'active' : '' ?>"
                   href="<?= base_url('resident/browse') ?>">
                    <i class="bi bi-search me-1"></i> Browse Pets
                </a>
            </li>
        </ul>

        <!-- RIGHT: USER DROPDOWN -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                   data-bs-toggle="dropdown">
                    <i class="bi bi-person-fill me-1"></i> <?= esc(session('username')) ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="<?= base_url('resident/my-pets') ?>">
                            <i class="bi bi-heart me-2"></i> My Pets
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= base_url('resident/profile') ?>">
                            <i class="bi bi-person-circle me-2"></i> Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <button class="dropdown-item text-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#logoutModal">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

<!-- ================= MOBILE SIDEBAR ================= -->
<div class="offcanvas offcanvas-start d-flex flex-column" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header pb-1">
        <h5 class="offcanvas-title fw-bold mb-1">
            <i class="bi bi-paw me-2"></i> Pet Adoption & Welfare Society
        </h5>
    </div>

    <hr class="sidebar-title-hr">

    <div class="offcanvas-body d-flex flex-column p-2">
        <ul class="navbar-nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link <?= uri_string() === 'resident/dashboard' ? 'active' : '' ?>"
                   href="<?= base_url('resident/dashboard') ?>">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= uri_string() === 'resident/browse' ? 'active' : '' ?>"
                   href="<?= base_url('resident/browse') ?>">
                    Browse Pets
                </a>
            </li>
        </ul>

        <!-- SIDEBAR FOOTER -->
        <div class="sidebar-footer mt-auto pt-3">
            <hr>
            <small>• Henson Brix Arroyo • Pila, Laguna</small>
        </div>
    </div>
</div>

<!-- ================= MAIN CONTENT ================= -->
<main class="container-fluid main-content flex-grow-1">
    <?= $this->renderSection('content') ?>
</main>

<!-- ================= FOOTER ================= -->
<footer class="text-center py-3 mt-auto">
    <p class="mb-0">Pet Adoption &amp; Welfare Society | Pila, Laguna</p>
    <p class="mb-0 small">Design &amp; build by Henson Brix Arroyo</p>
</footer>

<!-- ================= LOGOUT MODAL ================= -->
<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-box-arrow-right text-danger me-2"></i> Confirm Logout
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <p>Are you sure you want to log out?</p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">
                    Yes, Log Out
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
