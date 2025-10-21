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
  /* .bg-light{
    background: #0c529e !important;
    color: white  !important;
  } */
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


    

    <section class="container my-3">


      <div style="margin: 0; font-family: 'Arial', sans-serif; display: flex; justify-content: flex-end; align-items: center;">

        <div style="width: 100%; max-width: 500px; display: flex; align-items: center; background-color: #ffffff; border-radius: 25px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); overflow: hidden; transition: all 0.3s ease; border: 2px solid transparent;" 
            onmouseover="this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.15)'; this.style.borderColor='#1E5A9E';" 
            onmouseout="this.style.boxShadow='0 2px 10px rgba(0, 0, 0, 0.1)'; this.style.borderColor='transparent';">
            
            <!-- Ícono de búsqueda -->
            <div style="padding-left: 20px; display: flex; align-items: center; color: #999999;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
            </div>

            <!-- Input de búsqueda -->
            <input 
                type="text" 
                placeholder="¿Qué estás buscando hoy?" 
                id="filtroNombre"
                style="flex: 1; border: none; outline: none; padding: 14px 15px; font-size: 14px; color: #333333; background-color: transparent; font-family: 'Arial', sans-serif;"
                onfocus="this.parentElement.style.borderColor='#1E5A9E'; this.parentElement.style.boxShadow='0 4px 20px rgba(30, 90, 158, 0.2)';"
                onblur="this.parentElement.style.borderColor='transparent'; this.parentElement.style.boxShadow='0 2px 10px rgba(0, 0, 0, 0.1)';"
            >

            <!-- Botón de búsqueda -->
            <button 
                onclick="cargarProductos(true)"
                style="background-color: #042775; color: #ffffff; border: none; padding: 12px 25px; font-size: 14px; font-weight: bold; cursor: pointer; transition: all 0.3s ease; border-radius: 0; margin: 0; font-family: 'Arial', sans-serif; letter-spacing: 0.5px;"
                onmouseover="this.style.backgroundColor='#164a85'; this.style.transform='scale(1.05)';"
                onmouseout="this.style.backgroundColor='#1E5A9E'; this.style.transform='scale(1)';"
                onmousedown="this.style.transform='scale(0.95)';"
                onmouseup="this.style.transform='scale(1.05)';"
            >
                Buscar
            </button>
        </div>

        <script>

            // Permitir buscar con Enter
            document.getElementById('filtroNombre').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    cargarProductos(true);
                }
            });

            // Animación de shake
            const style = document.createElement('style');
            style.textContent = `
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                    20%, 40%, 60%, 80% { transform: translateX(5px); }
                }

                /* Responsive */
                @media (max-width: 768px) {
                    body {
                        justify-content: center !important;
                        padding: 15px !important;
                    }
                }

                @media (max-width: 480px) {
                    div[style*="max-width: 500px"] {
                        max-width: 100% !important;
                    }
                    
                    button {
                        padding: 12px 20px !important;
                        font-size: 13px !important;
                    }
                    
                    input {
                        font-size: 13px !important;
                        padding: 12px 10px !important;
                    }
                }
            `;
            document.head.appendChild(style);
        </script>

    </div>





      {{-- <div class="d-flex align-items-center justify-content-between bg-light p-2 w-100">
        <form class="w-100">
          <div class="input-group">
            <input type="input" class="form-control rounded-0" placeholder="Ingrese el nombre del Producto" id="filtroNombre">
          </div>
        </form> 
      </div> --}}
    </section>

   <!--start product grid-->
   <section class="pb-4">
    <h5 class="mb-0 fw-bold d-none">Product Grid</h5>
    <div class="container">
      <div class="btn btn-primary btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class="bi bi-funnel me-1"></i> Filtros</span></div>
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
                            <div class="d-flex align-items-center" style="background: rgba(216, 216, 216, 0.705); border-radius: 5px; padding: 5px 10px; margin-bottom: 10px;">
                              <img src="{{ asset('ecommerce/assets/images/ICONOS-TIENDA/ICONOS-06.png') }}" width="30px" alt="">
                              <span style="color: #0c529e; font-weight: 950;">Categorías</span>
                            </div>
                            {{-- <h6 class="p-1 fw-bold bg-light">Categorías</h6> --}}
                            <div class="categories">
                              <div class="categories-wrapper height-1 p-1">
                                @php
                                    $categoriaSeleccionada = request('categoria'); 
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
                              <div class="d-flex align-items-center" style="background: rgba(216, 216, 216, 0.705); border-radius: 5px; padding: 5px 10px; margin-bottom: 10px;">
                                <img src="{{ asset('ecommerce/assets/images/ICONOS-TIENDA/ICONOS-07.png') }}" width="30px" alt="">
                                <span style="color: #0c529e; font-weight: 950;">Precio</span>
                              </div>
                              {{-- <h6 class="p-1 fw-bold bg-light">Precio</h6> --}}
                              <div class="Price-wrapper p-1">
                                <div class="input-group">
                                  <input type="text" class="form-control rounded-0" placeholder="s/10" id="minPrecio">
                                  <span class="input-group-text bg-section-1 border-0">-</span>
                                  <input type="text" class="form-control rounded-0" placeholder="s/10000" id="maxPrecio">
                                  <button type="button" class="btn btn-outline-primary rounded-0 ms-2" id="filter_precio"><i class="bi bi-chevron-right"></i></button>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="discount">
                              <div class="d-flex align-items-center" style="background: rgba(216, 216, 216, 0.705); border-radius: 5px; padding: 5px 10px; margin-bottom: 10px;">
                                <img src="{{ asset('ecommerce/assets/images/ICONOS-TIENDA/ICONOS-05.png') }}" width="30px" alt="">
                                <span style="color: #0c529e; font-weight: 950;">Rango de Descuento</span>
                              </div>
                              {{-- <h6 class="p-1 fw-bold bg-light">Rango de Descuento</h6> --}}
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
                    <button id="btn-cargar-mas" class="btn btn-dark" style="background: #042775;">Cargar más</button>
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