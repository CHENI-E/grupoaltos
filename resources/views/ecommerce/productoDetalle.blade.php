@extends('layouts.ecommerce.app')

@section('content')

<style>

    /* Miniaturas */
    .product-thumbnails img {
        width: 70px;
        height: 90px;
        object-fit: cover;
        cursor: pointer;
        border: 2px solid transparent;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    .product-thumbnails img.active {
        border-color: #002daa; /* Como tu ejemplo */
    }

     /* Contenedor principal de la imagen */
    .product-main {
        position: relative;
        width: 100%;
        overflow: hidden; /* Evita que la imagen se salga del cuadro */
        border-radius: 8px; /* opcional */
    }

    /* Imagen principal */
    .product-main img {
        width: 100%;     /* siempre ocupa todo el ancho */
        height: auto;    /* mantiene la proporción */
        transition: transform 0.2s ease, transform-origin 0.2s ease;
        cursor: zoom-in;
        display: block;
    }

    /* En móvil: miniaturas en fila centrada debajo */
    @media (max-width: 768px) {
        .product-thumbnails {
            flex-direction: row !important;
            justify-content: center;
            flex-wrap: wrap;
        }
        .product-thumbnails img {
            width: 60px;
            height: 70px;
        }
    }


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
    .btn-outline-primary {
        --bs-btn-color: #002daa;
        --bs-btn-border-color: #002daa;
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: #002daa;
        --bs-btn-hover-border-color: #002daa;
        --bs-btn-focus-shadow-rgb: 13, 110, 253;
        --bs-btn-active-color: #fff;
        --bs-btn-active-bg: #002daa;
        --bs-btn-active-border-color: #002daa;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        --bs-btn-disabled-color: #002daa;
        --bs-btn-disabled-bg: transparent;
        --bs-btn-disabled-border-color: #002daa;
        --bs-gradient: none;
    }
    .btn-primary {
        --bs-btn-color: #fff;
        --bs-btn-bg: #002daa;
        --bs-btn-border-color: #002daa;
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: #0b5ed7;
        --bs-btn-hover-border-color: #0a58ca;
        --bs-btn-focus-shadow-rgb: 49, 132, 253;
        --bs-btn-active-color: #fff;
        --bs-btn-active-bg: #0a58ca;
        --bs-btn-active-border-color: #0a53be;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        --bs-btn-disabled-color: #fff;
        --bs-btn-disabled-bg: #002daa;
        --bs-btn-disabled-border-color: #002daa;
    }
</style>

<!--start page content-->
<div class="page-content">


    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0"> 
                <li class=""><a href="javascript:;">Grupo Altos / </a></li>
                <li class="breadcrumb-item active" aria-current=""> Producto / {{ $producto->nombre }}</li>
            </ol>
            </nav>
        </div>
    </div>


    <!--start product details-->
    <section class="py-4">
        <div class="container">
        <div class="row g-4">
            {{-- <div class="col-12 col-xl-7">
                <div class="product-images">
                    <div class="product-zoom-images">
                        <div class="row row-cols-2 g-3">
                            <div class="col">
                                <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="{{ asset($producto->imagen_portada) }}">
                                    <img src="{{ asset($producto->imagen_portada) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="{{ asset($producto->imagen_one) }}">
                                    <img src="{{ asset($producto->imagen_one) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="{{ asset($producto->imagen_two) }}">
                                    <img src="{{ asset($producto->imagen_two) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="{{ asset($producto->imagen_three) }}">
                                    <img src="{{ asset($producto->imagen_three) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="{{ asset($producto->imagen_four) }}">
                                    <img src="{{ asset($producto->imagen_four) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-12 col-xl-7">
                <div class="product-gallery row g-3 align-items-start">
                    
                    <!-- Miniaturas (lado izquierdo en desktop, debajo en mobile) -->
                    <div class="col-12 col-md-2 order-2 order-md-1 text-center">
                        <div class="product-thumbnails d-flex d-md-block justify-content-center gap-2">
                            @php
                                $imagenes = [
                                    $producto->imagen_portada,
                                    $producto->imagen_one,
                                    $producto->imagen_two,
                                    $producto->imagen_three,
                                    $producto->imagen_four,
                                ];
                            @endphp

                            @foreach($imagenes as $index => $img)
                                @if(!empty($img))
                                    <img src="{{ asset($img) }}" class="thumbnail-img {{ $loop->first ? 'active' : '' }}" data-index="{{ $index }}">
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Imagen principal -->
                    <div class="col-12 col-md-10 order-1 order-md-2">
                        <div class="product-main">
                            <img id="mainImage" 
                                src="{{ asset($producto->imagen_portada) }}" 
                                alt="{{ $producto->nombre }}">
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12 col-xl-5">
                <div class="product-info">
                    <h4 class="product-title fw-bold mb-1">{{ $producto->nombre }}</h4>
                    {{-- <p class="mb-0">Women Pink & Off-White Printed Kurta with Palazzos</p> --}}
                    <div class="product-rating">
                        <div class="hstack gap-2 border p-1 mt-3 width-content">
                        <div><span class="rating-number">4.8</span><i class="bi bi-star-fill ms-1 text-warning"></i></div>
                        <div class="vr"></div>
                        <div>162 Calificaciones</div>
                        </div>
                    </div>
                    <hr>
                    <div class="product-price d-flex align-items-center gap-3">
                        @if ($producto->descuento != 0)
                            <div class="h4 fw-bold">s/{{ $producto->precio_oferta }}</div>
                            <div class="h5 fw-light text-muted text-decoration-line-through">s/{{ $producto->precio }}</div>
                            <div class="h4 fw-bold text-danger">({{ intval($producto->descuento) }}% dscto)</div>
                        @else
                            <div class="h4 fw-bold">s/{{ $producto->precio }}</div>
                        @endif

                    </div>
                    <p class="fw-bold mb-0 mt-1 text-success">incluidos todos los impuestos</p>

                    <div class="size-chart mt-4">
                        <h6 class="fw-bold mb-3">Información Adicional</h6>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            @if ($producto->pdf_ficha_tecnica)
                                <a href="{{ asset($producto->pdf_ficha_tecnica) }}" target="_blank" class="btn btn-lg btn-outline-primary btn-ecomm px-5 py-3"><i class="bi bi-journal-text"></i> Ficha Técnica</a>
                            @endif
                            @if ($producto->catalogo)
                                <a href="{{ asset($producto->catalogo) }}" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i class="bi bi-journal-text"></i> Catálogo</a>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="cart-buttons mt-0">
                        <div class="buttons d-flex flex-column flex-lg-row gap-3 mt-4">
                            <a href="javascript:;" class="btn btn-lg btn-primary btn-ecomm px-5 py-3 col-lg-6 btnAgregarCarrito" data-id="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}" data-precio="{{ $producto->descuento != 0 ? $producto->precio_oferta : $producto->precio }}" data-imagen="{{ asset($producto->imagen_portada) }}"><i class="bi bi-basket2 me-2"></i>AÑADIR A CARRITO</a>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="product-info">
                        <h6 class="fw-bold mb-3">Detalles del producto</h6>
                        @php
                            echo $producto->descripcion;
                        @endphp
                        {{-- @php
                        $producto->descripcion = str_replace("\n", "<br>", $producto->descripcion);
                        @endphp
                        <p class="mb-1">{!! $producto->descripcion !!}</p> --}}
                    </div>
                    <hr class="my-3">
                </div>
            </div>
        </div><!--end row-->
        </div>
    </section>
    <!--start product details-->


    <!--start product details-->
    <section class="section-padding">
        <div class="container">
        <div class="separator pb-3">
            <div class="line"></div>
            <h3 class="mb-0 h3 fw-bold">Productos Similares</h3>
            <div class="line"></div>
        </div>
        <div class="similar-products">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">

                @if ($productoSimilares->isEmpty())
                    <div class="col-lg-12 text-center m-auto w-100 mt-5">
                        <p class="text-center">No hay productos similares disponibles.</p>
                    </div>
                @endif

                @foreach ($productoSimilares as $item)
                    <div class="col">
                        <a href="/producto/{{ $item->slug }}">
                            <div class="card rounded-0">
                                <img src="{{ asset($item->imagen_portada) }}" alt="" class="card-img-top rounded-0">
                                <div class="card-body border-top">
                                    <h5 class="mb-0 product-short-title" style="color: #6c757d; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; font-size: 1rem;">{{ $item->nombre }}</h5>


                                    <div style="color: #6c757d; font-size: 13px; margin-bottom: 6px;"> Vendido por Grupo Altos</div>

                                    <div class="d-flex justify-content-between align-items-center" style="font-size: 13px; color: #6c757d;">
                                        @if ($item->descuento != 0)
                                            <span>Antes</span>
                                            <span style="text-decoration: line-through;">S/ {{ $item->precio }}</span>
                                        @endif
                                    </div>


                                    <div class="d-flex justify-content-between align-items-center mt-1">
                                        <span style="font-weight: bold;" class="text-dark">Precio</span>
                                        <div class="d-flex align-items-center">
                                            @if ($item->descuento != 0)
                                                <span style="font-weight: bold; font-size: 1.0rem; margin-right: 6px; color: #6c757d;">S/ {{ $item->precio_oferta }}</span>
                                                <span class="badge-descuento">-{{ intval($item->descuento) }}%</span>
                                            @else
                                                <span style="font-weight: bold; font-size: 1.0rem; margin-right: 6px; color: #6c757d;">S/ {{ $item->precio }}</span>
                                            @endif
                                            
                                            
                                        </div>
                                    </div>

                                    {{-- <div class="product-price d-flex align-items-center gap-3 mt-2">
                                        @if ($item->descuento != 0)
                                            <div class="h6 fw-bold">s/{{ $item->precio_oferta }}</div>
                                            <div class="h6 fw-light text-muted text-decoration-line-through">s/{{ $item->precio }}</div>
                                            <div class="h6 fw-bold text-danger">({{ intval($item->descuento) }}% dscto)</div>
                                        @else
                                            <div class="h6 fw-bold">s/{{ $item->precio }}</div>
                                        @endif

                                    </div> --}}


                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
        </div>
    </section>
    <!--end product details-->

  
 </div>
  <!--end page content-->

@endsection

@section('scripts')

<script>

    $(document).ready(function () {
        const $mainImage = $("#mainImage");
        const $thumbnails = $(".thumbnail-img");

        // Cambiar imagen al hacer clic en miniatura
        $thumbnails.on("click", function () {
            const newSrc = $(this).attr("src");
            $mainImage.attr("src", newSrc);
            $thumbnails.removeClass("active");
            $(this).addClass("active");
        });

        // Zoom dinámico solo en desktop
        const $productMain = $(".product-main");
        $productMain.on("mousemove", function (e) {
            if (window.innerWidth < 768) return; // desactivar en mobile
            const offset = $(this).offset();
            const x = ((e.pageX - offset.left) / $(this).width()) * 100;
            const y = ((e.pageY - offset.top) / $(this).height()) * 100;

            $mainImage.css({
                "transform-origin": `${x}% ${y}%`,
                "transform": "scale(2)"
            });
        });

        $productMain.on("mouseleave", function () {
            $mainImage.css({
                "transform-origin": "center center",
                "transform": "scale(1)"
            });
        });
    });

</script>

@endsection