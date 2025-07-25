<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login - Admin</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/login-style.css') ?>">


  <style>

  </style>
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">

    <a href="<?= site_url('/') ?>" class="btn btn-outline-secondary" style="position: absolute; top: 10px; left: 10px; padding: 5px 10px;">← Voltar para o Blog</a>

    <!-- Títulos -->
    <h2 class="active">Login</h2>
    <h2 class="inactive underlineHover"><a href="<?= site_url('admin/register') ?>">Registrar</a></h2>

    <!-- Ícone -->
    <div class="fadeIn first">
      <img src="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjNTZjY2YyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1MCIgaGVpZ2h0PSI1MCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMTIgMTJDMTUuMzMgMTIgMTggOS4zMyAxOCA2QzE4IDIuNjcgMTUuMzMgMCAxMiAwQzguNjcgMCA2IDIuNjcgNiA2QzYgOS4zMyA4LjY3IDEyIDEyIDEyWk0xMiAxNUM3LjU5IDE1IDIgMTcuMjUgMiAyMVYyM0gyMlYyMUMyMiAxNy4yNSAxNi40MSAxNSAxMiAxNVoiLz48L3N2Zz4=" alt="User Icon" />
    </div>

    <!-- Mensagens de erro ou sucesso -->
    <?php if (!empty($error)) : ?>
      <div class="alert alert-danger"><?= esc($error) ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- Formulário -->
    <form method="POST" action="<?= site_url('admin/login') ?>">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Usuário" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Senha" required>
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

  </div>
</div>

</body>
</html>
