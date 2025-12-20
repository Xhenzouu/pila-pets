<?= $this->extend('residents/layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Banner Section -->
<?= view('residents/layouts/partials/home_hero') ?>

<!-- About Section -->
<?= view('residents/layouts/partials/home_about') ?>

<!-- Personalized Welcome + Stats Section -->
<?= view('residents/layouts/partials/home_welcome', [
    'myPets'        => $myPets ?? [],
    'totalPets'     => $totalPets ?? 0,
    'lostCount'     => $lostCount ?? 0,
    'adoptionCount' => $adoptionCount ?? 0
]) ?>

<!-- Success Stories Section -->
<?= view('residents/layouts/partials/home_stories') ?>

<?= $this->endSection() ?>