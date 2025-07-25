<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="form-container">
        <h2 class="mb-4">🛠️ Editar Post</h2>
        <form action="<?= site_url('admin/posts/update/' . $post->id) ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control" value="<?= esc($post->title) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagem Atual</label><br>
                <?php if ($post->image): ?>
                    <img src="<?= base_url('public/uploads/' . $post->image) ?>" class="rounded" width="150">
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nova Imagem (opcional)</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição (HTML)</label>
                <textarea name="description" rows="6" class="form-control"><?= esc($post->description) ?></textarea>
            </div>
            <button type="submit" class="btn btn-warning">💾 Atualizar</button>
            <a href="<?= site_url('admin/posts') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>
