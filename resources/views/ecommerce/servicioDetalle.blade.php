@extends('layouts.ecommerce.app')

@section('styles')
  <link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.carousel.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.theme.default.min.css') }}"/>
<style>
    /*VERSION IMAGEN DE FONDO*/
    /* .hero-banner {
      position: relative;
      background: url('https://www.andamiosfuerte.com/wp-content/uploads/2018/09/capacitacion-cabecera.jpg') center/cover no-repeat;
      height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }

    .hero-banner::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: linear-gradient(to right, rgba(0, 31, 77, 0.8), rgba(128, 0, 0, 0.8));
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      max-width: 700px;
      padding: 20px;
    }

    .hero-content h1 {
      font-size: 3rem;
      font-weight: 800;
    }

    .hero-content p {
      font-size: 1.2rem;
      margin: 15px 0;
    }

    .hero-content .btn {
      padding: 12px 30px;
      font-size: 1.1rem;
      font-weight: 600;
    }

    @media (max-width: 768px) {
      .hero-content h1 {
        font-size: 2rem;
      }
      .hero-content p {
        font-size: 1rem;
      }
    }
 */

 /*VERSION VIDEO DE FONDO*/
 .hero-banner {
      position: relative;
      height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      overflow: hidden;
    }

    .hero-banner video {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      object-fit: cover;
      z-index: 0;
    }

    .hero-banner::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: linear-gradient(to right, rgba(0, 31, 77, 0.7), rgba(128, 0, 0, 0.7));
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      max-width: 700px;
      padding: 20px;
    }

    .hero-content h1 {
      font-size: 3rem;
      font-weight: 800;
    }

    .hero-content p {
      font-size: 1.2rem;
      margin: 15px 0;
    }

    .hero-content .btn {
      padding: 12px 30px;
      font-size: 1.1rem;
      font-weight: 600;
    }

    @media (max-width: 768px) {
      .hero-content h1 {
        font-size: 2rem;
      }
      .hero-content p {
        font-size: 1rem;
      }
    }
</style>
@endsection

@section('content')

{{-- VERISON IMAGEN DE FONDO --}}
{{-- <section class="hero-banner">
    <div class="hero-content">
        <h1>OBRAS CIVILES</h1>
        <p>
        Comercialización de Andamios Convencionales tipo Acrow y Andamios Multidireccionales 
        Normados Europeos ideales para la realización de trabajos en altura y alto riesgo.
        </p>
        <a href="#contacto" class="btn btn-danger">Contactar a un asesor</a>
    </div>
</section> --}}

<section class="hero-banner">
    <!-- Video de fondo -->
    <video autoplay muted loop playsinline>
      <source src="{{ asset('ecommerce/assets/Video_web_m4.mp4') }}" type="video/mp4">
      {{-- <source src="https://www.andamiosperu.pe/wp-content/uploads/2025/02/portada_presentacion_ap-1.mp4" type="video/mp4"> --}}
      Tu navegador no soporta video HTML5.
    </video>

    <!-- Contenido -->
    <div class="hero-content">
      <h1 class="text-light" style="text-transform: uppercase !important;">{{ $servicio->nombre }}</h1>
      <p>
        Cada uno de nuestros servicios está respaldado por ingeniería especializada, pruebas técnicas certificadas y una filosofía de mejora continua, 
        para brindar soluciones confiables, seguras y adaptadas a las necesidades del mercado actual.
      </p>
      <a href="https://wa.me/51994119444?text=Hola,%20quiero%20más%20información%20sobre%20su%20servicio%20de%20{{ $servicio->nombre }}." class="btn btn-danger" target="_blank">Contactar a un asesor</a>
    </div>
  </section>

<div class="page-content">

  {{-- <div class="py-4 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0"> 
            <li class=""><a href="javascript:;">Grupo Altos / </a></li>
            <li class="breadcrumb-item active" aria-current=""> Nosotros</li>
        </ol>
        </nav>
    </div>
  </div> --}}


   <!--start product details-->
   <section class="section-padding">
    <div class="container">
       <div class="row g-4">
          <div class="col-12 col-xl-7">
            {{-- <h3 class="fw-bold">{{ $servicio->nombre }}</h3> --}}
            <div>
                @php
                    echo $servicio->descripcion;
                @endphp
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item m-auto text-center d-flex justify-content-center">
                    <img src="{{ asset($servicio->imagen) }}" class="img-fluid w-75 text-center" alt="">
                </div>
                @if ($servicio->imagen_detalle)
                    <div class="item m-auto text-center d-flex justify-content-center">
                        <img src="{{ asset($servicio->imagen_detalle) }}" class="img-fluid w-75" alt="">
                    </div>
                @endif
            </div>

          </div>

          <div class="col-12 col-xl-5">

            <div class="blog-left-sidebar border p-4">
                <div class="blog-categories mb-4">
                    <h5 class="mb-3 fw-bold">Más Servicios</h5>

                    @if ($serviciosSimilares->count())
                        <div class="list-group list-group-flush">
                            @foreach ($serviciosSimilares as $servicioSimilar)
                                <a href="{{ route('ecommerce.servicio.viewdetalle', $servicioSimilar->slug) }}" class="list-group-item list-group-item-action d-flex align-items-center border-0 py-3 rounded mb-2 shadow-sm">
                                    <i class="bi bi-bricks text-danger me-2 fs-5"></i>
                                    <span>{{ $servicioSimilar->nombre }}</span>
                                </a>
                                {{-- <a href="{{ route('ecommerce.servicio.viewdetalle', $servicioSimilar->slug) }}" class="list-group-item bg-transparent">
                                    <i class="bi bi-chevron-right me-1"></i> {{ $servicioSimilar->nombre }}
                                </a> --}}
                            @endforeach
                        </div>
                    @else
                        <p class="pt-3">No más servicios disponibles.</p>
                    @endif

                </div>
            </div>

          </div>

          {{-- <div class="col-12 col-xl-6 justify-content-center d-flex">
             <img src="{{ asset('ecommerce/assets/web/nosotros/nosotros.jpg') }}" class="img-fluid" style="max-height: 480px;" alt="">
          </div> --}}
       </div><!--end row-->

        <div class="separator section-padding">
            <div class="line"></div>
            <h3 class="mb-0 h3 fw-bold">Nuestro Propósito</h3>
            <div class="line"></div>
        </div>

        <div class="row row-cols-1 row-cols-lg-4 g-4 justify-content-center">
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-primary">
                  {{-- <i class="bi bi-truck"></i> --}}
                  <i class="bi bi-bullseye"></i>
                </div>
                <h5 class="fw-bold">MISIÓN</h5>
                <p class="mb-0" style="font-size: 13px;">
                  Servir y añadir más valor y seguridad a la vida de las personas que trabajan en altura
                </p>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-danger border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-danger">
                  <i class="bi bi-eye"></i>
                  {{-- <i class="bi bi-credit-card"></i> --}}
                </div>
                <h5 class="fw-bold">VISIÓN</h5>
                <p class="mb-0" style="font-size: 13px;">
                  Convertirnos en la compañía más grande y moderna en la fabricación y comercialización de sistemas de andamiajes, encofrados y equipos de seguridad. 
                  Generando puestos de trabajo a miles de familias.
                </p>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-success">
                  {{-- <i class="bi bi-minecart-loaded"></i> --}}
                  <i class="bi bi-stars"></i>
                </div>
                <h5 class="fw-bold">VALORES</h5>
                <p class="mb-0" style="font-size: 13px;">Trabajamos con altos estándares en materiales, diseño y servicio para ofrecer soluciones confiables y duraderas.</p>
              </div>
            </div>
          </div>
        </div>

        

    </div>
   </section>
   <!--start product details-->

</div>

@endsection

@section('scripts')
    <script src="{{ asset('ecommerce/assets/js/owl.carousel.min.js') }}"></script>
    <script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
        });
    });
    </script>
@endsection