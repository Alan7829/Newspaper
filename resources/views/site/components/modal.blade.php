{{-- tit --}}
@php
$_titulo = '';
$_descripción = 'No hay descripción';

$titulo = isset($titulo) ? $titulo : $_titulo;
$descripcion = isset($descripcion) ? $descripcion : $_descripcion;
@endphp

<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="modal-body text-center pb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Portfolio Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"> {{ $titulo }}</h2>
                            <!-- Portfolio Modal - Image-->
                            {{-- <img class="img-fluid rounded mb-5" src="assets/img/portfolio/cabin.png" alt="..." /> --}}
                            <!-- Portfolio Modal - Text-->
                            <p class="mb-4">{{ $descripcion }}</p>
                            <button class="btn btn-primary" href="#!" data-bs-dismiss="modal">
                                <i class="fas fa-times fa-fw"></i>
                                Close Window
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
