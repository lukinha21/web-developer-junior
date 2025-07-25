<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= esc($post->title) ?> - PixelBlog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilo customizado -->
    <style>
        body.blog-body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
            line-height: 1.7;
        }

        .blog-navbar {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 0;
        }

        .blog-logo {
            font-weight: bold;
            font-size: 1.3rem;
            color: #0d6efd;
            text-decoration: none;
        }

        .blog-logo:hover {
            text-decoration: underline;
        }

        .post-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .post-container h1,
        .post-container h2,
        .post-container h3 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .post-container p {
            margin-bottom: 1.25rem;
            font-size: 1.1rem;
            color: #333;
        }

        .post-container ul, .post-container ol {
            margin-left: 20px;
        }

        .post-container img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border-radius: 8px;
        }

        .btn-outline-secondary {
            font-size: 0.95rem;
        }
    </style>
</head>
<body class="blog-body">

<!-- NAVBAR -->
<nav class="navbar navbar-light blog-navbar"style="background-color: #e6eff9;">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand blog-logo" href="<?= site_url('/') ?>">📚 PixelBlog</a>
        <a href="<?= site_url('admin/login') ?>" class="btn btn-dark">Logar</a>
    </div>
</nav>

<!-- CONTEÚDO -->
<div class="container mt-5">
    <a href="<?= site_url('/') ?>" class="btn btn-outline-secondary mb-4">← Voltar para o Blog</a>

    <h2 class="mb-3"><?= esc($post->title) ?></h2>

    <?php if ($post->image): ?>
        <img src="<?= base_url('public/uploads/' . $post->image) ?>" class="img-fluid rounded shadow-sm mb-4" style="max-height: 400px; object-fit: cover;">
    <?php endif; ?>

    <div class="post-container">
        <?= nl2br(esc($post->description)) ?>
    </div>

</div>

</body>
</html>
