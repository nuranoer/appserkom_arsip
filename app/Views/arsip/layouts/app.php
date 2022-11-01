<?= $this->include('arsip/layouts/header.php'); ?>
<?= $this->include('arsip/layouts/navbar.php'); ?>
<?= $this->include('arsip/layouts/sidebar.php'); ?>
<?= $this->renderSection('content'); ?>
<?= $this->include('layouts/footer.php'); ?>
<?= $this->renderSection('js'); ?>