<?= $this->extend('auth/layouts/main') ?>

<?= $this->section('content') ?>
<h4 class="text-center mb-4">Create Your Account</h4>

<?php if (session()->has('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<?= form_open('auth/register') ?>
    <div class="row g-3">
        <div class="col-md-6">
            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
        </div>
        <div class="col-md-6">
            <input type="text" name="middle_name" class="form-control" placeholder="Middle Name (optional)">
        </div>
        <div class="col-12">
            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="col-12">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="col-12">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-12">
            <input type="text" name="barangay" class="form-control" placeholder="Barangay" required>
        </div>
        <div class="col-12">
            <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" required>
        </div>
        <div class="col-12">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="col-12">
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Create Account</button>
        </div>
    </div>
<?= form_close() ?>

<div class="text-center mt-4">
    <p>Already have an account? <a href="<?= base_url('auth/login') ?>" class="text-link">Sign In</a></p>
</div>
<?= $this->endSection() ?>