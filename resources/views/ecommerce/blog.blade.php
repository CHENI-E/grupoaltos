@extends('layouts.ecommerce.app')

@section('styles')
<style>
    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    } */

    .articulos-seccion {
        padding: 40px 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .articulos-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .articulos-titulo {
        font-size: 32px;
        font-weight: 700;
        color: #1a1a1a;
    }

    .buscador-contenedor {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .input-buscar {
        padding: 12px 20px 12px 45px;
        border: 1px solid #e0e0e0;
        border-radius: 25px;
        width: 300px;
        font-size: 14px;
        transition: all 0.3s ease;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23999' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: 15px center;
    }

    .input-buscar:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .boton-buscar {
        padding: 12px 30px;
        background-color: #2563eb;
        color: white;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .boton-buscar:hover {
        background-color: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .articulos-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
    }

    .tarjeta-articulo {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.6s ease-out;
        animation-fill-mode: both;
    }

    .tarjeta-articulo:nth-child(1) { animation-delay: 0.1s; }
    .tarjeta-articulo:nth-child(2) { animation-delay: 0.2s; }
    .tarjeta-articulo:nth-child(3) { animation-delay: 0.3s; }
    .tarjeta-articulo:nth-child(4) { animation-delay: 0.4s; }
    .tarjeta-articulo:nth-child(5) { animation-delay: 0.5s; }
    .tarjeta-articulo:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .tarjeta-articulo:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .contenedor-imagen {
        position: relative;
        overflow: hidden;
        height: 220px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .imagen-articulo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .tarjeta-articulo:hover .imagen-articulo {
        transform: scale(1.1);
    }

    .etiqueta-categoria {
        position: absolute;
        top: 15px;
        left: 15px;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .etiqueta-curso {
        background-color: #ff6b35;
    }

    .etiqueta-noticia {
        background-color: #ff4757;
    }

    .contenido-tarjeta {
        padding: 25px;
    }

    .tiempo-lectura {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #ff6b35;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .icono-reloj {
        width: 16px;
        height: 16px;
        background-color: #ff6b35;
        border-radius: 50%;
        display: inline-block;
    }

    .titulo-articulo {
        font-size: 20px;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 12px;
        line-height: 1.4;
        transition: color 0.3s ease;
    }

    .tarjeta-articulo:hover .titulo-articulo {
        color: #2563eb;
    }

    .descripcion-articulo {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .footer-tarjeta {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid #f1f5f9;
    }

    .icono-autor {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 14px;
    }

    .nombre-autor {
        font-weight: 600;
        color: #1a1a1a;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .articulos-titulo {
            font-size: 24px;
        }

        .articulos-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .buscador-contenedor {
            width: 100%;
            flex-direction: column;
        }

        .input-buscar {
            width: 100%;
        }

        .boton-buscar {
            width: 100%;
        }

        .articulos-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
        .articulos-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection

@section('content')

    <!--start page content-->
<div class="page-content">


    {{-- <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0"> 
                <li class=""><a href="javascript:;">Grupo Altos / </a></li>
                <li class="breadcrumb-item active" aria-current=""> Blog</li>
            </ol>
            </nav>
        </div>
    </div> --}}


    <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            @forelse ($banners as $index => $banner)
                {{-- {{ dd($banner->imagen) }} --}}
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    @if ($banner->url_boton)
                        <a href="{{ $banner->url_boton }}" target="_blank">
                            <img 
                                data-desktop="{{ asset($banner->imagen) }}" 
                                data-mobile="{{ asset($banner->imagen_movil) }}" 
                                class="d-block w-100" 
                                alt="{{ $banner->titulo ?? 'Banner' }}" 
                                loading="lazy"
                            >
                        </a>
                    @else
                        <img 
                            data-desktop="{{ asset($banner->imagen) }}" 
                            data-mobile="{{ asset($banner->imagen_movil) }}" 
                            class="d-block w-100" 
                            alt="{{ $banner->titulo ?? 'Banner' }}"
                        >
                    @endif
                </div>
            @empty
                <div class="carousel-item active">
                    <img src="{{ asset('ecommerce/assets/images/portada-contactanos.png') }}" class="d-block w-100" alt="Banner predeterminado">
                </div>
            @endforelse
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

   <!--start product details-->
    <section class="section-padding">
        <div class="container">


            <div class="articulos-header">
                <h1 class="articulos-titulo">Artículos</h1>
                <form action="{{ route('ecommerce.blog') }}" method="GET" class="buscador-contenedor">
                    <input type="text" name="buscar" value="{{ request('buscar') }}" class="input-buscar" placeholder="¿Qué estás buscando...?">
                    <button type="submit" class="boton-buscar">Buscar</button>
                </form>

            </div>

            <div class="articulos-grid">

                @if ($blog->isEmpty())
                    <div></div>
                    <div class="text-center mt-5 mb-5">
                        <p>No hay publicaciones disponibles.</p>
                    </div>
                    <div></div>
                @else
                    @foreach ($blog as $item)
                    
                    <a href="{{ route('ecommerce.blog.detalle', $item->slug) }}" class="tarjeta-articulo">
                        <div class="contenedor-imagen">
                            <img src="{{ asset($item->imagen_portada) }}" alt="Capacitación" class="imagen-articulo">
                            <span class="etiqueta-categoria etiqueta-curso">{{ $item->autor }}</span>
                        </div>
                        <div class="contenido-tarjeta">
                            <div class="tiempo-lectura">
                                <span class="icono-reloj"></span>
                                <span>{{ \Carbon\Carbon::parse($item->fecha)->locale('es')->translatedFormat('d') }}
                                                {{ \Illuminate\Support\Str::ucfirst(\Carbon\Carbon::parse($item->fecha)->locale('es')->translatedFormat('F, Y')) }}</span>
                            </div>
                            <h3 class="titulo-articulo">{{ $item->nombre }}</h3>
                            <p class="descripcion-articulo">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->contenido), 100, '...') }}
                                {{-- @php
                                    echo \Illuminate\Support\Str::limit($item->contenido, 100, '...');
                                @endphp --}}
                            </p>
                            <div class="footer-tarjeta">
                                <div class="icono-autor">GA</div>
                                <span class="nombre-autor">Grupo Altos</span>
                            </div>
                        </div>
                    </a>

                    @endforeach
                @endif

            </div>



        
            {{-- <div class="row g-4">
                <div class="col-12 col-xl-8">
                    <div class="d-flex flex-column gap-4">

                        @if ($blog->isEmpty())
                            <div class="text-center mt-5 mb-5">
                                <p>No hay publicaciones disponibles.</p>
                            </div>
                        @else
                            @foreach ($blog as $item)
                                <div class="gap-3 rounded-0 d-flex flex-lg-row flex-column align-items-center" data-aos="fade-right">
                                    <div class="col-lg-4">
                                        <img src="{{ asset($item->imagen_portada) }}" class="card-img-top rounded-0 w-100" alt="...">
                                    </div>
                                    <div class="card-body col-lg-8">
                                        <div class="d-flex align-items-center gap-4">
                                            <div class="posted-by">
                                            <p class="mb-0"><i class="bi bi-person me-2"></i>{{ $item->autor }}</p>
                                            </div>
                                            <div class="posted-date">
                                                <p class="mb-0">
                                                <i class="bi bi-calendar me-2"></i>
                                                {{ \Carbon\Carbon::parse($item->fecha)->locale('es')->translatedFormat('d') }}
                                                {{ \Illuminate\Support\Str::ucfirst(\Carbon\Carbon::parse($item->fecha)->locale('es')->translatedFormat('F, Y')) }}
                                                </p>
                                            </div>
                                        </div>
                                        <h4 class="card-title fw-bold mt-3">{{ $item->nombre }}</h4>
                                        <p class="mb-0 texto-limitad">
                                            @php
                                                echo \Illuminate\Support\Str::limit($item->contenido, 100, '...');
                                            @endphp
                                        </p>
                                        <a href="{{ route('ecommerce.blog.detalle', $item->slug) }}" class="btn btn-dark btn-ecomm mt-3 animated-btn" style="background: #033c7e !important;">Leer Más</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="col-12 col-xl-4" data-aos="fade-left">
                    <div class="blog-left-sidebar border p-4">
                        <form>
                            <div class="blog-categories recent-post mb-4">
                                <h5 class="mb-4 fw-bold">Publicaciones Recientes</h5>
                                @if ($blog->isEmpty())
                                    <p>No hay publicaciones recientes disponibles.</p>
                                @else
                                    @foreach ($blogRecientes as $item)
                                        <div class="d-flex align-items-start">
                                            <img src="{{ asset($item->imagen_portada) }}" width="100" alt="">
                                                <div class="ms-3"> <a href="{{ route('ecommerce.blog.detalle', $item->slug) }}" class="fs-6 fw-bold text-content">{{ $item->nombre }}</a>
                                                <p class="mb-0">{{ \Carbon\Carbon::parse($item->fecha)->locale('es')->translatedFormat('F d, Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="my-3 border-bottom"></div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="blog-categories">
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        
        </div>
    </section>
   <!--start product details-->


 </div>
  <!--end page content-->

@endsection

@section('scripts')

<script>
  $(document).ready(function() {
      function updateBannerImages() {
          const isMobile = $(window).width() <= 768;

          $('#carouselExampleControls .carousel-item img').each(function() {
              const desktop = $(this).data('desktop');
              const mobile = $(this).data('mobile');
              $(this).attr('src', isMobile ? mobile : desktop);
          });
      }

      // Ejecutar al cargar
      updateBannerImages();

      // Ejecutar cada vez que redimensionas la ventana
      $(window).on('resize', function() {
          updateBannerImages();
      });
  });
</script>

@endsection