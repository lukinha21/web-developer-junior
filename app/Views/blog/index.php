<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Blog Interativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/blog-style.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
</head>
<body class="blog-body">

<!-- NAVBAR -->
<nav class="navbar navbar-light blog-navbar" style="background-color: #e6eff9;">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand blog-logo" href="<?= site_url('/') ?>">📚 PixelBlog</a>
        <a href="<?= site_url('admin/login') ?>" class="btn btn-dark">Acesse</a>
    </div>
</nav>

<!-- HERO -->
<header class="blog-hero text-center">
    <h1>Tudo em <strong>um</strong> só lugar 🚀</h1>
    <p>Leia os últimos artigos postados no nosso blog!</p>
    <div class="search-wrapper mt-4">
        <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Buscar posts...">
    </div>
</header>

<!-- TODOS OS POSTS -->
<!-- dentro de blog/index.php -->
...
<div class="container mt-5 d-flex justify-content-end">
    <a href="<?= site_url('blog/todos') ?>" class="btn btn-outline-primary">📂 Ver todos os posts</a>
</div>

<!-- POSTS EM DESTAQUE (Carrossel) -->
<div class="container mt-3">
    <h4 class="mb-3">Artigos em Destaque</h4>
    <div id="postCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner" id="carouselInner">
            <?php
            $chunks = $posts->chunk(3);
            foreach ($chunks as $i => $group):
            ?>
            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                <div class="row">
                    <?php foreach ($group as $post): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <?php if ($post->image): ?>
                                <img src="<?= base_url('public/uploads/' . $post->image) ?>" class="card-img-top" style="height:180px; object-fit:cover;">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($post->title) ?></h5>
                                <p class="card-text text-muted">
                                    Publicado: <?= date('d/m/Y H:i', strtotime($post->created_at)) ?><br>
                                    Atualizado: <?= date('d/m/Y H:i', strtotime($post->updated_at)) ?>
                                </p>
                                <a href="<?= site_url('blog/' . $post->slug) ?>" class="btn btn-sm btn-primary">Ler mais</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($posts->count() > 3): ?>
        <div id="carouselControls">
            <button class="carousel-control-prev" type="button" data-bs-target="#postCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#postCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- RESULTADO DA BUSCA -->
<div class="container mt-4">
    <div class="row" id="loadingSpinner" style="display: none;">
        <div class="col-12 text-center">
            <div class="spinner-border text-primary" role="status"></div>
        </div>
    </div>
    <div class="row" id="resultsArea"></div>
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
        <p class="text-center">&copy; 2025 PixelBlog. Todos os direitos reservados.</p>
    </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('js/blog-search.js') ?>"></script>
<style>
    .carousel-control-prev,
.carousel-control-next {
    width: 60px;
    height: 60px;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5); /* fundo escuro com transparência */
    border-radius: 50%;
    z-index: 2;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 30px;
    height: 30px;
    background-size: 100% 100%;
    filter: brightness(0) invert(1); /* deixa o ícone branco */
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

</style>
</body>
</html>
