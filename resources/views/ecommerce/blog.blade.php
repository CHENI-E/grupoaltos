@extends('layouts.ecommerce.app')

@section('styles')
<style>
    .texto-limitado {
        display: -webkit-box;
        -webkit-line-clamp: 3 !important; /* número de líneas máximo */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
  .animated-btn {
        transition: transform 0.3s ease;
    }
    .animated-btn:hover {
        transform: scale(1.05); 
        border: 1px solid #f9f9f9;
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
        
            <div class="row g-4">
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
            </div>
        
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