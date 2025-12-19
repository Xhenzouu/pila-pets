<?= $this->include('admin/layouts/partials/_head') ?>

<?= $this->include('admin/layouts/partials/_sidebar') ?>

<!-- Main Content Area -->
<div class="main-content">
    <?= $this->renderSection('content') ?>
</div>

<?= $this->include('admin/layouts/partials/_logout_modal') ?>

</body>
</html>