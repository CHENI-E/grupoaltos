@extends('layouts.ecommerce.app')

@section('content')

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
            <div class="col-12 col-xl-7">
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
                    </div><!--end row-->
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
                                <a href="{{ asset($producto->pdf_ficha_tecnica) }}" target="_blank" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i class="bi bi-journal-text"></i> Ficha Técnica</a>
                            @endif
                            @if ($producto->catalogo)
                                <a href="{{ asset($producto->catalogo) }}" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i class="bi bi-journal-text"></i> Catálogo</a>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="cart-buttons mt-0">
                        <div class="buttons d-flex flex-column flex-lg-row gap-3 mt-4">
                            <a href="javascript:;" class="btn btn-lg btn-dark btn-ecomm px-5 py-3 col-lg-6"><i class="bi bi-basket2 me-2"></i>AÑADIR A CARRITO</a>
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
            <h3 class="mb-0 h3 fw-bold">Productos Similare</h3>
            <div class="line"></div>
        </div>
        <div class="similar-products">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">

                @foreach ($productoSimilares as $item)
                    <div class="col">
                        <a href="/producto/{{ $item->slug }}">
                        <div class="card rounded-0">
                        <img src="{{ asset($item->imagen_portada) }}" alt="" class="card-img-top rounded-0">
                        <div class="card-body border-top">
                            <h5 class="mb-0 fw-bold product-short-title">{{ $item->nombre }}</h5>
                            <div class="product-price d-flex align-items-center gap-3 mt-2">
                                @if ($item->descuento != 0)
                                    <div class="h6 fw-bold">s/{{ $item->precio_oferta }}</div>
                                    <div class="h6 fw-light text-muted text-decoration-line-through">s/{{ $item->precio }}</div>
                                    <div class="h6 fw-bold text-danger">({{ intval($item->descuento) }}% dscto)</div>
                                @else
                                    <div class="h6 fw-bold">s/{{ $item->precio }}</div>
                                @endif

                            </div>
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