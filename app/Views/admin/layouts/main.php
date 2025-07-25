<!-- app/Views/admin/layouts/main.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?? 'Admin' ?></title>

    <!-- CoolAdmin CSS -->
    <link href="<?= base_url('assets/cooladmin/vendor/bootstrap-4.1/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/cooladmin/css/theme.css') ?>" rel="stylesheet">

    <!-- Font Awesome & etc -->
    <link href="<?= base_url('assets/cooladmin/vendor/font-awesome-4.7/css/font-awesome.min.css') ?>" rel="stylesheet">
</head>
<body class="animsition">

<div class="page-wrapper">

    <!-- Sidebar -->
    <?= view('admin/partials/sidebar') ?>

    <!-- Page Container -->
    <div class="page-container">

        <!-- Topbar -->
        <?= view('admin/partials/header') ?>

        <!-- Main Content -->
        <div class="main-content p-4">
            <?= $this->renderSection('content') ?>
        </div>

        <!-- Footer -->
        <?= view('admin/partials/footer') ?>

    </div>
</div>

<!-- Scripts -->
<script src="<?= base_url('assets/cooladmin/vendor/jquery-3.2.1.min.js') ?>"></script>
<script src="<?= base_url('assets/cooladmin/vendor/bootstrap-4.1/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/cooladmin/js/main.js') ?>"></script>

</body>
</html>
