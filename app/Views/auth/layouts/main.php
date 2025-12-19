<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Pet Adoption & Welfare Society - Authentication' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }
        .auth-container {
            flex: 1;
            display: flex;
            min-height: 100vh;
        }
        .left-side, .right-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem;
            background-color: #f8f9fa; /* Both sides now have consistent grey background */
        }
        .right-side {
            align-items: center;
        }
        .paw-logo {
            font-size: 8rem;
            color: #3FA37E;
            opacity: 0.8;
        }
        .welcome-text {
            text-align: left;
            max-width: 500px;
        }
        .welcome-text h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2c3e50;
        }
        .welcome-text p {
            font-size: 1.2rem;
            color: #555;
        }
        .auth-card {
            max-width: 460px;
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
            background-color: white; /* Card stays white for contrast */
        }
        .card-header {
            background-color: #3FA37E;
            color: white;
            text-align: center;
            padding: 2.5rem 1rem;
        }
        .card-header h3 {
            margin: 0;
            font-weight: 700;
            font-size: 1.9rem;
        }
        .card-header p {
            margin: 10px 0 0;
            opacity: 0.95;
        }
        .card-body {
            padding: 2.5rem;
            background-color: white;
        }
        .btn-primary {
            background-color: #3FA37E;
            border: none;
            padding: 12px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #2f7c61;
        }
        .form-control:focus {
            border-color: #3FA37E;
            box-shadow: 0 0 0 0.25rem rgba(63, 163, 126, 0.25);
        }
        .text-link {
            color: #3FA37E;
            font-weight: 500;
        }
        .text-link:hover {
            color: #2f7c61;
        }
        .credits {
            margin-top: 3rem;
            color: #6c757d;
            font-size: 0.9rem;
            text-align: center;
        }
        @media (max-width: 992px) {
            .auth-container {
                flex-direction: column;
            }
            .left-side {
                justify-content: flex-start;
                padding-top: 4rem;
            }
            .right-side {
                padding: 2rem;
            }
            .credits {
                margin-top: 2rem;
            }
            .welcome-text {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid auth-container g-0">
    <div class="row g-0 flex-fill">
        <!-- Left Side: Logo + Welcome Text -->
        <div class="col-lg-6 left-side">
            <div class="text-center">
                <div class="paw-logo mb-4">
                    <i class="bi bi-paw"></i>
                </div>
                <div class="welcome-text mx-auto">
                    <h1>Pet Adoption & Welfare Society</h1>
                    <p class="lead">
                        A community platform based in Pila, Laguna dedicated to pet registration, reuniting lost pets, and facilitating adoptions.
                    </p>
                    <p>
                        Together, we ensure every pet in our community is safe, loved, and has a forever home.
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side: Auth Card + Credits -->
        <div class="col-lg-6 right-side">
            <div class="auth-card">
                <div class="card-header">
                    <h3><i class="bi bi-paw me-2"></i>Pet Adoption & Welfare Society</h3>
                    <p>Pila, Laguna • Pet Registry &amp; Adoption Platform</p>
                </div>
                <div class="card-body">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>

            <div class="credits">
                <p class="mb-0">© 2025 Pet Adoption & Welfare Society • Pila, Laguna</p>
                <p class="mb-0 small">Built with care by Henson Brix Arroyo</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>