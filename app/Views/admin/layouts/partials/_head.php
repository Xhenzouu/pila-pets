<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Admin Dashboard') ?> - Pet Adoption & Welfare Society</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --primary-green: #3FA37E;
            --primary-green-dark: #2e8b57;
            --light-bg: #f8f9fa;
        }
        body {
            background-color: var(--light-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background-color: var(--primary-green);
            padding-top: 20px;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar .logo {
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.9);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 5px 15px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            color: white;
        }
        .sidebar .nav-link i {
            width: 30px;
            text-align: center;
        }
        .main-content {
            margin-left: 280px;
            padding: 30px;
            min-height: 100vh;
            flex: 1;
        }
        .pet-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        .btn-primary:hover {
            background-color: var(--primary-green-dark);
            border-color: var(--primary-green-dark);
        }
        .badge.bg-primary { background-color: var(--primary-green) !important; }
        footer {
            margin-left: 280px;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
        }
        @media (max-width: 992px) {
            .sidebar { width: 80px; }
            .sidebar .logo, .sidebar .nav-link span { display: none; }
            .sidebar .nav-link { text-align: center; padding: 15px; }
            .main-content { margin-left: 80px; }
            footer { margin-left: 80px; }
        }
    </style>
</head>
<body>