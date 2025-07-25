document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('searchInput');
    const carouselInner = document.getElementById('carouselInner');
    const controls = document.getElementById('carouselControls');

    let debounceTimeout;
    let originalHTML = carouselInner.innerHTML;

    input.addEventListener('input', function () {
        const q = input.value.trim();
        clearTimeout(debounceTimeout);

        debounceTimeout = setTimeout(() => {
            if (q === '') {
                // Restaurar slides originais
                carouselInner.innerHTML = originalHTML;
                if (controls) controls.style.display = '';
                return;
            }

            // Esconde os controles de navegação
            if (controls) controls.style.display = 'none';

            fetch('/search?q=' + encodeURIComponent(q))
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        carouselInner.innerHTML = `
                            <div class="carousel-item active">
                                <div class="col-12">
                                    <div class="alert alert-warning text-center w-100">
                                        Nenhum post encontrado.
                                    </div>
                                </div>
                            </div>`;
                        return;
                    }

                    let html = '';
                    for (let i = 0; i < data.length; i++) {
                        if (i % 3 === 0) {
                            if (i > 0) html += '</div></div>';
                            html += `<div class="carousel-item ${i === 0 ? 'active' : ''}"><div class="row">`;
                        }

                        const post = data[i];
                        html += `
                            <div class="col-md-4">
                                <div class="card h-100 shadow-sm">
                                    ${post.image ? `<img src="/public/uploads/${post.image}" class="card-img-top" style="height:180px; object-fit:cover;">` : ''}
                                    <div class="card-body">
                                        <h5 class="card-title">${post.title}</h5>
                                        <a href="/blog/${post.slug}" class="btn btn-sm btn-primary">Ler mais</a>
                                    </div>
                                </div>
                            </div>`;
                    }

                    html += '</div></div>'; // Fechar última linha
                    carouselInner.innerHTML = html;
                })
                .catch(err => {
                    console.error('Erro na busca:', err);
                    carouselInner.innerHTML = `
                        <div class="carousel-item active">
                            <div class="col-12">
                                <div class="alert alert-danger text-center w-100">
                                    Erro ao buscar.
                                </div>
                            </div>
                        </div>`;
                });
        }, 500);
    });
});
