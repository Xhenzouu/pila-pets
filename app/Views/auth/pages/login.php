<?= $this->extend('auth/layouts/main') ?>

<?= $this->section('content') ?>

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

<?php if (isset($validation)): ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<?= form_open('auth/login') ?>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" value="<?= old('username') ?>" placeholder="Enter username" required autofocus>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Sign In</button>
<?= form_close() ?>

<div class="text-center mt-4">
    <a href="<?= base_url('auth/forgot-password') ?>" class="text-link">Forgot Password?</a>
</div>

<div class="text-center mt-3">
    <p>Don't have an account? <a href="<?= base_url('auth/register') ?>" class="text-link">Create one</a></p>
</div>

<?= $this->endSection() ?>