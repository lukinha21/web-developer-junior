<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f4f8;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="form-container">
        <h2 class="mb-4">✍️ Novo Post</h2>
        <form action="<?= site_url('admin/posts/store') ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagem</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição (HTML)</label>
                <textarea name="description" rows="6" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">💾 Salvar</button>
            <a href="<?= site_url('admin/posts') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>
