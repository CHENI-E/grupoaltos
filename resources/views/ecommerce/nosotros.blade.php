@extends('layouts.ecommerce.app')

@section('styles')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.carousel.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.theme.default.min.css') }}"/>

<style>

    @media (max-width: 576px) {
      .product-thumbs h5 {
        font-size: 0.9rem !important; /* más pequeño en celular */
        height: 40px !important;      /* menos alto en móvil */
      }
      .product-thumbs h6 {
        font-size: 0.8rem !important;
      }
      .product-thumbs img {
        height: 180px !important; /* imágenes más compactas en móvil */
      }
    }

    /* Efecto hover */
    .product-thumbs .card:hover {
      transform: translateY(-5px);
    }
    .product-thumbs .card:hover img {
      transform: scale(1.05);
    }

    /* Hover sobre la card */
    .owl-carousel .card:hover {
      /* transform: translateY(-6px) scale(1.02);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15); */
    }

    /* Zoom suave a la imagen */
    .owl-carousel .card:hover img {
      transform: scale(1.03);
    }

    /* Cambio de color de texto y fondo */
    .owl-carousel .card:hover .card-body {
      background: linear-gradient(174deg,rgba(11, 136, 202, 1) 43%, rgba(6, 75, 146, 1) 100%);
    }
    .owl-carousel .card:hover h5 {
      color: #073769;
    }
    .owl-carousel .card:hover h6 {
      color: #555;
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
        --bs-btn-color: #fff !important;
        --bs-btn-bg: #002daa !important;
        --bs-btn-border-color: #002daa !important;
        --bs-btn-hover-color: #fff !important;
        --bs-btn-hover-bg: #0b5ed7 !important;
        --bs-btn-hover-border-color: #0a58ca !important;
        --bs-btn-focus-shadow-rgb: 49, 132, 253 !important;
        --bs-btn-active-color: #fff !important;
        --bs-btn-active-bg: #0a58ca !important;
        --bs-btn-active-border-color: #0a53be !important;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125) !important;
        --bs-btn-disabled-color: #fff !important;
        --bs-btn-disabled-bg: #002daa !important;
        --bs-btn-disabled-border-color: #002daa !important;
    }

    /* Animaciones hover */
    .mission-card:hover, .vision-card:hover {
        transform: translateY(-10px) !important;
        background: rgba(0,0,0,0.95) !important;
        box-shadow: 0 15px 35px rgba(0,0,0,0.5) !important;
    }

    /* Animación de entrada para los cards */
    .mission-card, .vision-card {
        animation: slideInUp 0.6s ease-out;
    }

    @keyframes slideInUp {
        from {
            transform: translateY(100px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Animación del título */
    .card-body h3 {
        transition: all 0.3s ease;
    }

    .card:hover h3 {
        color: #fff;
        text-shadow: 0 0 10px rgba(255,255,255,0.5);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .position-relative {
            height: 280px !important;
        }
        .card-body {
            padding: 1rem !important;
        }
        .card-body h3 {
            font-size: 16px !important;
        }
        .card-text {
            font-size: 13px !important;
        }
    }
</style>

@endsection

@section('content')


<div class="page-content">

  <div class="py-4 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0"> 
            <li class=""><a href="javascript:;">Grupo Altos / </a></li>
            <li class="breadcrumb-item active" aria-current=""> Nosotros</li>
        </ol>
        </nav>
    </div>
  </div>

   <!--start product details-->
   <section class="section-padding">
    <div class="container">
       <div class="row g-4">
          <div class="col-12 col-xl-6" data-aos="fade-up-right">
            <h3 class="fw-bold">¿QUIÉNES SOMOS?</h3>
            <p style="text-align: justify;">
                En Grupo Altos, somos una empresa peruana especializada en la fabricación y comercialización de sistemas de andamiaje de alta calidad, 
                diseñados específicamente para cumplir con las exigentes normativas de seguridad vigentes en el Perú. Nos enorgullece ofrecer soluciones 
                integrales para trabajos en altura, adaptadas a las necesidades reales de las obras de construcción, infraestructura e industria en general.
            </p>
            <p style="text-align: justify;">
                Contamos con una línea completa de andamios multifuncionales y multidireccionales, reconocidos por su versatilidad, resistencia y facilidad de montaje. 
                Estos sistemas han sido rigurosamente desarrollados y adaptados conforme a los estándares técnicos nacionales e internacionales, garantizando un alto 
                nivel de seguridad y eficiencia en obra.
            </p>
            <p style="text-align: justify;">
                En Grupo Altos, nuestro compromiso va más allá de la venta de productos. Nos enfocamos en proporcionar soluciones técnicas que optimicen los procesos constructivos, 
                mejoren la productividad y sobre todo, protejan la vida de los trabajadores. Creemos en el desarrollo sostenible de la industria, apostando por la innovación, 
                la mejora continua y el cumplimiento estricto de los estándares de seguridad.
            </p>
          </div>
          <div class="col-12 col-xl-6 justify-content-center d-flex" data-aos="fade-up-left">
             <img src="{{ asset('ecommerce/assets/web/nosotros/nosotros.jpg') }}" class="img-fluid" style="max-height: 480px;" alt="">
          </div>
       </div><!--end row-->

        <div class="separator section-padding">
            <div class="line"></div>
            <h3 class="mb-0 h3 fw-bold">Nuestro Propósito</h3>
            <div class="line"></div>
        </div>

        <div class="row row-cols-1 row-cols-lg-4 g-4 justify-content-center">

          <!-- Misión -->
          <div class="col-lg-6 col-md-12 mb-4 animate__animated animate__fadeInLeft">
              <div class="position-relative overflow-hidden m-auto" style="height: 350px; background: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover; border-radius: 8px;">
                  <!-- Overlay -->
                  <div class="position-absolute w-100 h-100" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6));"></div>
                  
                  <!-- Card flotante -->
                  <div class="position-absolute d-flex align-items-end pb-4 pl-4 pr-4 justify-content-center m-auto" style="bottom: 0; left: 0; right: 0; width: 90%;">
                      <div class="card border-0 shadow-lg mission-card" style="background: rgba(0,0,0,0.52); backdrop-filter: blur(10px); transform: translateY(0); transition: all 0.3s ease;">
                          <div class="card-body text-white p-4">
                              <div class="d-inline-block mb-3" style="background: rgba(0, 0, 0, 0.515); padding: 8px 16px; border: 1px solid rgba(255,255,255,0.3);">
                                  <h3 class="mb-0 font-weight-bold text-uppercase" style="font-size: 18px; letter-spacing: 2px;">{{ $identities->title_card_one ?? '' }}</h3>
                              </div>
                              <p class="card-text mb-0" style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.95);">
                                  {{ $identities->content_card_one ?? '' }}
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Visión -->
          <div class="col-lg-6 col-md-12 mb-4 animate__animated animate__fadeInRight">
              <div class="position-relative overflow-hidden m-auto" style="height: 350px; background: url('https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover; border-radius: 8px;">
                  <!-- Overlay -->
                  <div class="position-absolute w-100 h-100" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6));"></div>
                  
                  <!-- Card flotante -->
                  <div class="position-absolute d-flex align-items-end pb-4 pl-4 pr-4 justify-content-center m-auto" style="bottom: 0; left: 0; right: 0; width: 90%;">
                      <div class="card border-0 shadow-lg vision-card" style="background: rgba(0, 0, 0, 0.52); backdrop-filter: blur(10px); transform: translateY(0); transition: all 0.3s ease;">
                          <div class="card-body text-white p-4">
                              <div class="d-inline-block mb-3" style="background: rgba(0,0,0,0.9); padding: 8px 16px; border: 1px solid rgba(255,255,255,0.3);">
                                  <h3 class="mb-0 font-weight-bold text-uppercase" style="font-size: 18px; letter-spacing: 2px;">{{ $identities->title_card_two ?? '' }}</h3>
                              </div>
                              <p class="card-text mb-0" style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.95);">
                                  {{ $identities->content_card_two ?? '' }}
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>



          {{-- <div class="col d-flex" data-aos="fade-up-right">
            <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-primary">
                  <i class="bi bi-bullseye"></i>
                </div>
                <h5 class="fw-bold">MISIÓN</h5>
                <p class="mb-0" style="font-size: 13px;">
                  Servir y añadir más valor y seguridad a la vida de las personas que trabajan en altura
                </p>
              </div>
            </div>
          </div>

          <div class="col d-flex" data-aos="fade-up">
            <div class="card depth border-0 rounded-0 border-bottom border-danger border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-danger">
                  <i class="bi bi-eye"></i>
                </div>
                <h5 class="fw-bold">VISIÓN</h5>
                <p class="mb-0" style="font-size: 13px;">
                  Convertirnos en la compañía más grande y moderna en la fabricación y comercialización de sistemas de andamiajes, encofrados y equipos de seguridad. 
                  Generando puestos de trabajo a miles de familias.
                </p>
              </div>
            </div>
          </div>

          <div class="col d-flex" data-aos="fade-up-left">
            <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-success">
                  <i class="bi bi-stars"></i>
                </div>
                <h5 class="fw-bold">VALORES</h5>
                <p class="mb-0" style="font-size: 13px;">Trabajamos con altos estándares en materiales, diseño y servicio para ofrecer soluciones confiables y duraderas.</p>
              </div>
            </div>
          </div> --}}

        </div>

        <div class="separator section-padding" data-aos="fade-up">
            <div class="line"></div>
            <h3 class="mb-0 h3 fw-bold">Nuestros Clientes</h3>
            <div class="line"></div>
        </div>

        <div class="brands">
          <div class="row row-cols-2 row-cols-lg-5 g-4">
            <div class="owl-carousel owl-theme">
              @foreach ($customers->clientImages as $item)
                <div class="col d-flex align-items-center justify-content-center">
                  <div class="d-flex align-items-center p-3 rounded brand-box w-100 h-100">
                    <div class="d-flex align-items-center justify-content-center text-center h-100">
                      <a href="javascript:;" class="w-100">
                        <img src="{{ asset($item->image_path) }}" class="img-fluid" alt="">
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
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
        margin:15,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        responsive:{
            0:{ items:1, center:true },
            576:{ items:2, center:true },
            768:{ items:3 },
            992:{ items:4 }
        }
    });
  });
</script>
@endsection