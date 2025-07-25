<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ver Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e3eaf1);
        }
        .post-card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <a href="<?= site_url('admin/posts') ?>" class="btn btn-secondary mb-3">← Voltar</a>

    <div class="card post-card p-4">
        <h2><?= esc($post->title) ?></h2>
        <?php if ($post->image): ?>
            <img src="<?= base_url('public/uploads/' . $post->image) ?>" class="img-fluid rounded mb-4" style="max-height: 300px; object-fit: cover;">
        <?php endif; ?>
        <div>
           <?= nl2br(esc($post->description)) ?>
        </div>
    </div>
</div>
</body>
</html>
