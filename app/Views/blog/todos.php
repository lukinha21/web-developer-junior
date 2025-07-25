<?= $this->extend('blog/layout/blog_layout') ?>
<?= $this->section('content') ?>

<!-- NAVBAR -->
<nav class="navbar navbar-light blog-navbar"style="background-color: #e6eff9;">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand blog-logo" href="<?= site_url('/') ?>">📚 PixelBlog</a>
        <a href="<?= site_url('admin/login') ?>" class="btn btn-dark">Acesse</a>
    </div>
</nav>

<!-- TÍTULO -->
<div class="container mt-5">
    <h2 class="mb-4 text-center">📚 Todos os Posts</h2>
</div>

<!-- LISTA DE POSTS -->
<div class="container mb-5">
    <div class="row">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if ($post->image): ?>
                            <img src="<?= base_url('public/uploads/' . $post->image) ?>" class="card-img-top" style="height:180px; object-fit:cover;">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($post->title) ?></h5>
                            <p class="text-muted small">
                                Publicado: <?= date('d/m/Y H:i', strtotime($post->created_at)) ?><br>
                                Atualizado: <?= date('d/m/Y H:i', strtotime($post->updated_at)) ?>
                            </p>
                                <a href="<?= site_url('blog/' . $post->slug) ?>" class="btn btn-sm btn-primary">Ler mais</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted text-center">Nenhum post disponível.</p>
        <?php endif; ?>
    </div>
</div>

<!-- FOOTER -->
<footer class="site-footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h6>PixelBlog</h6>
                <p class="text-justify">Aqui você aprende de tudo. Pensou, achou!</p>
            </div>
            <div class="col-md-3">
                <h6>Categorias</h6>
                <ul class="footer-links">
                    <li><a href="#">Política</a></li>
                    <li><a href="#">Aplicações</a></li>
                    <li><a href="#">Tecnologia</a></li>
                    <li><a href="#">Games</a></li>
                </ul>
            </div>
            <div class="col-md-3 text-end">
                <h6>Redes</h6>
                <ul class="social-icons list-unstyled d-flex gap-3 justify-content-end">
                    <li><a href="#"><i class="fab fa-facebook fa-lg"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin fa-lg"></i></a></li>
                    <li><a href="#"><i class="fab fa-github fa-lg"></i></a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
</footer>
<?= $this->endSection() ?>
