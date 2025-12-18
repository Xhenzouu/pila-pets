<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Pila Pets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 420px;
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 2rem 1rem;
        }
        .card-header h3 {
            margin: 0;
            font-weight: 600;
        }
        .card-header p {
            margin: 8px 0 0;
            opacity: 0.9;
        }
        .card-body {
            padding: 2.5rem;
            background-color: white;
        }
        .btn-login {
            background-color: #343a40;
            border: none;
            padding: 12px;
            font-weight: 500;
        }
        .btn-login:hover {
            background-color: #23272b;
        }
        .form-control:focus {
            border-color: #343a40;
            box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.25);
        }
        .hint-text {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="card-header">
            <h3><i class="bi bi-shield-lock me-2"></i>Pila Pets</h3>
            <p>Sign in to manage pets</p>
        </div>

        <div class="card-body">
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= session('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <?= form_open('auth/login') ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" 
                           name="username" 
                           id="username"
                           class="form-control" 
                           value="<?= old('username') ?>" 
                           placeholder="Enter your username" 
                           required 
                           autofocus>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           name="password" 
                           id="password"
                           class="form-control" 
                           placeholder="Enter your password" 
                           required>
                </div>

                <button type="submit" class="btn btn-dark btn-login w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </button>
            <?= form_close() ?>

        </div>
    </div>

</body>
</html>