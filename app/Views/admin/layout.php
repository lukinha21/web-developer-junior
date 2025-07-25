<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>

    <!-- CSS do SB Admin, Bootstrap, FontAwesome -->
    <link href="<?= base_url('assets/sb-admin2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/admin/css/style.css') ?>" rel="stylesheet">
</head>
<body id="page-top">

<div id="wrapper">

    <!-- SIDEBAR -->
    <?= $this->include('admin/partials/sidebar') ?>

    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- TOPBAR -->
            <?= $this->include('admin/partials/topbar') ?>

            <!-- CONTEÚDO INJETADO AQUI -->
            <?= $this->renderSection('content') ?>
        </div>

        <!-- FOOTER -->
        <?= $this->include('admin/partials/footer') ?>
    </div>
</div>

<!-- JS do Bootstrap e SB Admin -->
<script src="<?= base_url('assets/sb-admin2/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin2/js/sb-admin-2.min.js') ?>"></script>
<!-- Bootstrap JS com suporte a carousel (obrigatório!) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
