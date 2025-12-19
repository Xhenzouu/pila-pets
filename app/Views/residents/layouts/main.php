<?= $this->include('residents/layouts/partials/_head') ?>

<?= $this->include('residents/layouts/partials/_navbar') ?>

<main class="container-fluid main-content">
    <?= $this->renderSection('content') ?>
</main>

<?= $this->include('residents/layouts/partials/_footer') ?>

<?= $this->include('residents/layouts/partials/_logout_modal') ?>

</body>
</html>