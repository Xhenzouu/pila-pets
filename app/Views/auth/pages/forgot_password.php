<?= $this->extend('auth/layouts/main') ?>

<?= $this->section('content') ?>
<h4 class="text-center mb-4">Forgot Password</h4>

<p class="text-muted text-center mb-4">Enter your email and we'll send you a reset link.</p>

<?php if (isset($success)): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<?= form_open('auth/forgot-password') ?>
    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Your email address" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
<?= form_close() ?>

<div class="text-center mt-4">
    <a href="<?= base_url('auth/login') ?>" class="text-link">Back to Login</a>
</div>
<?= $this->endSection() ?>