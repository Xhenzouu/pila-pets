<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Resident Portal') ?> - Pet Adoption & Welfare Society</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --brand-color: #3FA37E;
            --brand-color-dark: #2f7c61;
            --light-bg: #f8f9fa;
        }

        body {
            background-color: var(--light-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--brand-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar .nav-link,
        .navbar .navbar-brand,
        .navbar .dropdown-toggle {
            color: #f8f9fa !important;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: white !important;
            font-weight: 700;
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
            .navbar-brand.d-none.d-lg-block {
                display: none !important;
            }
        }

        /* Mobile Offcanvas Sidebar */
        .offcanvas-start {
            width: 75vw;
            background-color: var(--brand-color);
            color: white;
        }

        .offcanvas .nav-link {
            color: white;
            font-size: 1.1rem;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 5px 10px;
        }

        .offcanvas .nav-link:hover,
        .offcanvas .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            font-weight: 700;
        }

        .sidebar-footer {
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .sidebar-footer hr {
            border-color: rgba(255,255,255,0.3);
            margin: 15px 0;
        }

        .main-content {
            padding-top: 90px;
            flex: 1;
        }

        footer {
            background-color: var(--brand-color);
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }

        .dropdown-menu {
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        /* === FIX: Profile dropdown on mobile/small screens === */
        @media (max-width: 991.98px) {
            .navbar-nav .dropdown-menu {
                position: absolute !important;
                top: 100%;
                right: 10px; /* Slight offset from edge */
                left: auto;
                z-index: 1100; /* Above navbar and content */
                min-width: 200px;
                background-color: white;
                border: 1px solid rgba(0,0,0,0.15);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }

            .navbar-nav .dropdown-item {
                color: #000 !important;
            }

            .navbar-nav .dropdown-item:hover,
            .navbar-nav .dropdown-item:focus {
                background-color: #f8f9fa !important;
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">