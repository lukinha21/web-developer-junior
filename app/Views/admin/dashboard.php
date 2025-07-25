<?= view('admin/partials/header') ?>
<?= view('admin/partials/sidebar') ?>
<?= view('admin/partials/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Título -->
    <h1 class="h3 mb-4 text-gray-800">📊 Painel de Visão Geral</h1>

    <!-- Cards -->
    <div class="row">

        <!-- Usuários -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuários</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalUsers ?></div>
                </div>
            </div>
        </div>

        <!-- Total de Posts -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Posts</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPosts ?></div>
                </div>
            </div>
        </div>

        <!-- Posts esta semana -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Novos esta semana</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $postsThisWeek ?></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Earnings Overview & Revenue Sources -->
    <div class="row">

        <!-- Earnings Overview (Line Chart) -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Visualizações</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Sources (Pie Chart) -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dispositivos</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2"><i class="fas fa-circle text-primary"></i> Android</span>
                        <span class="mr-2"><i class="fas fa-circle text-success"></i> PCs/notebooks</span>
                        <span class="mr-2"><i class="fas fa-circle text-info"></i> IOS</span>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Posts Recentes -->
    <div class="row">
        <div class="col-12">
            <h4 class="mb-3">📰 Posts Recentes</h4>
        </div>

        <?php foreach ($recentPosts as $post): ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <?php if ($post->image): ?>
                        <img src="<?= base_url('public/uploads/' . $post->image) ?>" class="card-img-top" style="height: 160px; object-fit: cover;" alt="<?= esc($post->title) ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-primary">Notícia</h6>
                        <h5 class="card-title"><?= esc($post->title) ?></h5>
                        <p class="card-text small text-muted"><?= date('d/m/Y', strtotime($post->created_at)) ?></p>
                        <a href="<?= site_url('admin/posts/show/' . $post->id) ?>" class="btn btn-sm btn-outline-primary">Ver</a>
                        <a href="<?= site_url('admin/posts/edit/' . $post->id) ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                        <a href="<?= site_url('admin/posts/delete/' . $post->id) ?>" onclick="return confirm('Deseja deletar?')" class="btn btn-sm btn-outline-danger">Excluir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->

<?= view('admin/partials/footer') ?>
