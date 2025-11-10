@extends('layouts.ecommerce.app')

@section('content')
<style>
  .animated-btn {
    transition: transform 0.3s ease;
  }
  .animated-btn:hover {
    transform: scale(1.01); 
    border: 1px solid #00d5fa;
  }
</style>

    <!--start page content-->
<div class="page-content">

    {{-- <div class="">
        <img src="{{ asset('ecommerce/assets/images/NUESTRO SERVICIOS.png') }}" class="w-100" alt="">
    </div> --}}
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
                    {{-- <img src="{{ asset('ecommerce/assets/images/NUESTRO SERVICIOS.png') }}" class="d-block w-100" alt="Banner predeterminado"> --}}
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

            {{-- <div class="separator section-padding">
                <div class="line"></div>
                <h3 class="mb-0 h3 fw-bold">Nuestros Servicios</h3>
                <div class="line"></div>
            </div> --}}

            <div class="brands">
                <div class="row  row-cols-lg-5 g-4">

                    @if ($proyectos->isEmpty())
                        <div class="col-12 text-center m-auto mt-3">
                            <p class="text-center">No hay Proyectos disponibles.</p>
                        </div>
                    @endif

                    @php
                        $duration = 1000;
                    @endphp

                    @foreach ($proyectos as $item)
                        <div class="col-lg-3 col-sm-12 col-md-6" data-aos="fade-down" data-aos-duration="{{ $duration }}" data-aos-delay="200">
                            <div class="p-2 border rounded" style="background: #e0e0e08d">
                                <div class="d-flex align-items-center">
                                    <a href="/servicio/{{ $item->slug }}" class="w-100">
                                        <img src="{{ asset($item->imagen) }}" class="img-fluid" alt="{{ $item->nombre }}">
                                    </a>
                                </div>
                                <div class="text-center my-2">
                                    <span style="color: #042775; font-family: 'Orbitron', sans-serif !important; font-weight: 950; font-size: 15px;">{{ $item->nombre }}</span>
                                </div>
                                <div class="text-center mt-1 mb-2">
                                    <a href="/proyectos/{{ $item->slug }}" class="btn btn-dark btn-ecomm animated-btn w-100" style="background: #e75322 !important; border:none; border-radius: 20px;">Ver Proyecto</a>
                                </div>
                            </div>
                        </div>
                        @php
                            $duration += 500;
                        @endphp
                    @endforeach
                    
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