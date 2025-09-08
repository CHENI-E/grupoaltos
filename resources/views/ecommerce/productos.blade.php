@extends('layouts.ecommerce.app')

@section('content')

<style>
  .card-title-limit {
      display: -webkit-box;
      -webkit-line-clamp: 2; /* máximo 2 líneas */
      -webkit-box-orient: vertical;
      overflow: hidden;
  }
  .card:hover img {
    transform: scale(1.05);
  }

  /* Estilo de la etiqueta de descuento con punta */
  .badge-descuento {
    position: relative;
    background-color: #dc3545;
    color: #fff;
    font-size: 0.75rem;
    padding: 2px 8px 2px 8px;
    font-weight: bold;
    border-radius: 4px 0 0 4px; /* Bordes redondeados solo en la izquierda */
    display: inline-block;
  }

  .badge-descuento::after {
    content: "";
    position: absolute;
    right: -5px; /* Tamaño de la punta */
    top: 0;
    width: 0;
    height: 0;
    border-top: 12px solid transparent;
    border-bottom: 12px solid transparent;
    border-left: 6px solid #dc3545; /* Color igual que el fondo */
  }
  .bg-light{
    background: #0c529e !important;
    color: white  !important;
  }
</style>

<!--start page content-->
<div class="page-content">


    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0"> 
                <li class=""><a href="javascript:;">Grupo Altos / </a></li>
                <li class="breadcrumb-item active" aria-current=""> Productos</li>
            </ol>
            </nav>
        </div>
    </div>


   <!--start product grid-->
   <section class="py-4">
    <h5 class="mb-0 fw-bold d-none">Product Grid</h5>
    <div class="container">
      <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class="bi bi-funnel me-1"></i> Filtros</span></div>
       <div class="row">
          <div class="col-12 col-xl-3 filter-column">
              <nav class="navbar navbar-expand-xl flex-wrap p-0">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarFilter" aria-labelledby="offcanvasNavbarFilterLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title mb-0 fw-bold text-uppercase" id="offcanvasNavbarFilterLabel">Filtros</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <div class="filter-sidebar">
                      <div class="card rounded-0">
                        <div class="card-header d-none d-xl-block bg-transparent">
                            <h5 class="mb-0 fw-bold">Filtros</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="p-1 fw-bold bg-light">Categorías</h6>
                            <div class="categories">
                              <div class="categories-wrapper height-1 p-1">
                                {{-- <input type="text" id="categoriaSeleccionada" value="{{ request('categoria') ?? '' }}"> --}}
                                @php
                                    $categoriaSeleccionada = request('categoria'); 
                                    /* $categoriasSeleccionadas = request('categoria', []);
                                    if (!is_array($categoriasSeleccionadas)) {
                                        $categoriasSeleccionadas = [$categoriasSeleccionadas];
                                    } */
                                @endphp

                                @foreach ($category as $item)
                                  <div class="form-check">
                                    <input 
                                      class="form-check-input categoria-checkbox categoriaSeleccionada" 
                                      type="checkbox" 
                                      value="{{ $item->id }}" 
                                      id="categoriaSeleccionada{{ $item->id }}"
                                      {{ $categoriaSeleccionada == $item->id ? 'checked' : '' }}>
                                    
                                    <label class="form-check-label" for="categoriaSeleccionada{{ $item->id }}">
                                      <span>{{ $item->nombre }}</span>
                                      <span class="product-number">({{ $item->products_count }})</span>
                                    </label>
                                  </div>
                                @endforeach

                              </div>
                            </div>
                            <hr>
                            <div class="Price">
                              <h6 class="p-1 fw-bold bg-light">Precio</h6>
                              <div class="Price-wrapper p-1">
                                <div class="input-group">
                                  <input type="text" class="form-control rounded-0" placeholder="s/10" id="minPrecio">
                                  <span class="input-group-text bg-section-1 border-0">-</span>
                                  <input type="text" class="form-control rounded-0" placeholder="s/10000" id="maxPrecio">
                                  <button type="button" class="btn btn-outline-dark rounded-0 ms-2" id="filter_precio"><i class="bi bi-chevron-right"></i></button>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="discount">
                              <h6 class="p-1 fw-bold bg-light">Rango de Descuento</h6>
                              <div class="discount-wrapper p-1">
                                <div class="form-check">
                                  <input class="form-check-input" name="exampleRadios" type="radio" value="option1" id="chekDisc1">
                                  <label class="form-check-label" for="chekDisc1">
                                    10% y Más
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" name="exampleRadios" type="radio" value="option2" id="chekDisc2">
                                  <label class="form-check-label" for="chekDisc2">
                                    20% y Más
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" name="exampleRadios" type="radio" value="option3" id="chekDisc3">
                                  <label class="form-check-label" for="chekDisc3">
                                    30% y Más
                                  </label>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </nav>
          </div>

          <div class="col-12 col-xl-9">
            @if (session('error_found_producto'))
                <div class="alert alert-danger p-2">
                    {{ session('error_found_producto') }}
                </div>
            @endif
            <div class="shop-right-sidebar">

              <div class="card rounded-0">
                <div class="card-body p-2">
                  <div class="d-flex align-items-center justify-content-between bg-light p-2 w-100">
                    {{-- <div class="product-count">{{ count($product) }} artículos encontrados</div> --}}
                    <form class="w-100">
                      <div class="input-group">
                        {{-- <span class="input-group-text bg-transparent rounded-0 border-0">Buscar</span> --}}
                        <input type="input" class="form-control rounded-0" placeholder="Ingrese el nombre del Producto" id="filtroNombre">
                      </div>
                    </form> 
                  </div>
                </div>
              </div>

              <div class="product-grid mt-4">
                <!-- Spinner -->
                <div id="spinner-carga" class="text-center my-4" style="display: none;">
                  <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                  </div>
                </div>

                <!-- Sin resultados -->
                <div id="sin-resultados" class="text-center my-4 text-muted fw-bold" style="display: none;">
                  0 artículos encontrados
                </div>

                <!-- Productos -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="contenedor-productos"></div>

                <!-- Botón cargar más -->
                <div class="row mt-5">
                  <div class="col text-center">
                    <button id="btn-cargar-mas" class="btn btn-dark" style="background: #0c529e;">Cargar más</button>
                  </div>
                </div>
              </div>


            </div>
          </div>
       </div><!--end row-->
    </div>
  </section>
   <!--start product details-->


  
  
 </div>
  <!--end page content-->

@endsection

@section('scripts')
  <script src="{{ asset('ecommerce/assets/js/productos/index.js') }}?v={{ time() }}"></script>
@endsection