<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?php
function word_limiter($string, $limit = 20, $end = '...') {
    $words = explode(' ', strip_tags($string));
    return count($words) <= $limit ? $string : implode(' ', array_slice($words, 0, $limit)) . $end;
}
?>

<div class="container-fluid mt-4">
    <!-- Top Info -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5>Total de Posts: <strong id="totalPosts"><?= $totalPosts ?></strong></h5>
            <small class="text-muted">Última atualização: <?= date('d/m/Y H:i') ?></small>
        </div>
        <a href="<?= site_url('admin/posts/create') ?>" class="btn btn-primary">➕ Novo Post</a>
    </div>

    <!-- Barra de Filtros -->
    <form method="get" action="<?= site_url('admin/posts') ?>" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" id="searchInput" name="search" class="form-control" placeholder="Buscar posts..." value="<?= esc($searchTerm ?? '') ?>">
        </div>
        <div class="col-md-3">
            <input type="date" name="start_date" class="form-control" value="<?= esc($startDate ?? '') ?>">
        </div>
        <div class="col-md-3">
            <input type="date" name="end_date" class="form-control" value="<?= esc($endDate ?? '') ?>">
        </div>
        <div class="col-md-2">
            <button class="btn btn-outline-secondary w-100" type="submit">🔍 Buscar</button>
        </div>
    </form>

    <?php if (!empty($posts)): ?>
    <!-- Carrossel de Posts -->
    <div id="postCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">

            <?php $chunks = array_chunk($posts->all(), 3); ?>
            <?php foreach ($chunks as $index => $group): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="row">
                        <?php foreach ($group as $post): ?>
                            <div class="col-md-4">
                                <div class="post-card card shadow h-100">
                                    <img src="<?= base_url('public/uploads/' . $post->image) ?>" class="card-img-top" style="height:180px; object-fit:cover;" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= esc($post->title) ?></h5>
                                        <p class="card-text"><?= esc(word_limiter($post->content, 20)) ?></p>
                                        <small class="text-muted d-block">
                                            Publicado: <?= date('d/m/Y H:i', strtotime($post->created_at)) ?><br>
                                            Atualizado: <?= date('d/m/Y H:i', strtotime($post->updated_at)) ?>
                                        </small>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <a href="<?= site_url('admin/posts/show/' . $post->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="<?= site_url('admin/posts/edit/' . $post->id) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="<?= site_url('admin/posts/delete/' . $post->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#postCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#postCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <?php else: ?>
        <p>Nenhum post encontrado.</p>
    <?php endif; ?>
</div>

<script>
document.getElementById('searchInput').addEventListener('input', function () {
    const search = this.value.toLowerCase();
    const allCards = Array.from(document.querySelectorAll('.post-card'));

    const filtered = allCards.filter(card => {
        const title = card.querySelector('.card-title').textContent.toLowerCase();
        return title.includes(search);
    });

    document.getElementById('totalPosts').innerText = filtered.length;

    const carouselInner = document.querySelector('.carousel-inner');
    carouselInner.innerHTML = '';

    for (let i = 0; i < filtered.length; i += 3) {
        const slide = document.createElement('div');
        slide.className = 'carousel-item' + (i === 0 ? ' active' : '');

        const row = document.createElement('div');
        row.className = 'row';

        filtered.slice(i, i + 3).forEach(card => {
            const col = card.closest('.col-md-4');
            if (col) {
                row.appendChild(col.cloneNode(true));
            }
        });

        slide.appendChild(row);
        carouselInner.appendChild(slide);
    }

    // Mostrar aviso caso nenhum post visível
    if (filtered.length === 0) {
        const noSlide = document.createElement('div');
        noSlide.className = 'carousel-item active';
        noSlide.innerHTML = '<div class="text-center text-muted p-4">Nenhum post encontrado.</div>';
        carouselInner.appendChild(noSlide);
    }

    // Ocultar setas se necessário
    document.querySelector('.carousel-control-prev').style.display = filtered.length > 3 ? 'block' : 'none';
    document.querySelector('.carousel-control-next').style.display = filtered.length > 3 ? 'block' : 'none';
});
</script>

<style>
.carousel-item {
    padding: 10px;
    transition: transform 0.7s ease-in-out !important;
}

.card-title {
    font-size: 1.1rem;
    font-weight: bold;
}

.carousel-control-prev,
.carousel-control-next {
    width: 40px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.7;
    z-index: 2;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: #343a40;
    background-size: 20px 20px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid #fff;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    opacity: 1;
}
</style>

<?= $this->endSection() ?>
