@extends('layouts.ecommerce.app')

@section('styles')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.carousel.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.theme.default.min.css') }}"/>

<style>
    .pd-titulo {
      font-family: 'Orbitron', sans-serif !important;
      font-size: 40px !important;
      color: #002366 !important;
      margin-bottom: 5px !important;
      text-transform: uppercase !important;
    }

    .custom-col {
      display: flex !important;
      align-items: flex-start !important;
      justify-content: center !important;
    }

    .middle-col {
      align-items: flex-end !important;
    }

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
    /* @media (max-width: 768px) {
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
 */
    @media (min-width: 768px) {
      .middle-lower {
        margin-top: 50px; /* Ajusta según necesites */
      }
    }




    /* ESTILOS DE VALORES */
    .valo_contenedor {
        width: 100%;
        max-width: 1100px;
        margin: auto
    }

    .valo_titulo {
        text-align: center;
        color: white;
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 50px;
        letter-spacing: 4px;
        text-transform: uppercase;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .valo_grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        padding: 0 10px;
    }

    .valo_card {
        background: linear-gradient(135deg, rgba(30, 55, 105, 0.7) 0%, rgba(20, 40, 80, 0.8) 100%);
        border: 1px solid rgba(90, 130, 190, 0.4);
        border-radius: 12px;
        padding: 35px 25px 30px 25px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(8px);
        min-height: 200px;
    }

    .valo_card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(120, 170, 230, 0.08);
        transition: left 0.5s ease;
        z-index: 0;
    }

    .valo_card:hover::before {
        left: 100%;
    }

    .valo_card:hover {
        background: linear-gradient(135deg, rgba(40, 70, 130, 0.9) 0%, rgba(30, 55, 100, 0.9) 100%);
        border-color: rgba(130, 170, 230, 0.6);
        transform: translateY(-10px);
        box-shadow: 0 18px 50px rgba(60, 120, 200, 0.35);
    }

    .valo_icono_contenedor {
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .valo_icono {
        width: 75px;
        height: 75px;
        background: linear-gradient(135deg, #ff8c42 0%, #ff7a35 100%);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 40px;
        font-weight: bold;
        color: white;
        box-shadow: 0 10px 30px rgba(255, 140, 66, 0.5);
        transition: all 0.4s ease;
        border: 3px solid rgba(255, 200, 120, 0.25);
    }

    .valo_card:hover .valo_icono {
        transform: scale(1.15);
        box-shadow: 0 15px 45px rgba(255, 140, 66, 0.65);
    }

    .valo_contenido {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .valo_nombre {
        color: white;
        font-size: 1.05rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        transition: color 0.4s ease;
        line-height: 1.3;
    }

    .valo_card:hover .valo_nombre {
        color: #ffb870;
    }

    .valo_descripcion {
        color: rgba(210, 225, 255, 0.8);
        font-size: 0.9rem;
        line-height: 1.5;
        transition: color 0.4s ease;
    }

    .valo_card:hover .valo_descripcion {
        color: rgba(240, 250, 255, 0.95);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .valo_grid {
            gap: 25px;
        }

        .valo_card {
            padding: 30px 20px 25px 20px;
            min-height: 190px;
        }
    }

    @media (max-width: 768px) {
        .valo_titulo {
            font-size: 2.2rem;
            margin-bottom: 35px;
        }

        .valo_grid {
            grid-template-columns: 1fr;
            gap: 20px;
            padding: 0;
        }

        .valo_card {
            padding: 25px 20px;
            min-height: 180px;
        }

        .valo_icono {
            width: 65px;
            height: 65px;
            font-size: 36px;
        }

        .valo_nombre {
            font-size: 1rem;
        }

        .valo_descripcion {
            font-size: 0.87rem;
        }
    }

    @media (max-width: 480px) {
        .valo_titulo {
            font-size: 1.6rem;
            margin-bottom: 25px;
        }

        .valo_card {
            padding: 20px 15px;
            min-height: 160px;
        }

        .valo_icono {
            width: 55px;
            height: 55px;
            font-size: 30px;
            margin-bottom: 15px;
        }

        .valo_nombre {
            font-size: 0.95rem;
        }

        .valo_descripcion {
            font-size: 0.82rem;
        }
    }

    .title_banner_nosotros{
      position: absolute;
      top: 10%;
    }
    .conten_banner_nosotros{
      position: absolute;
      bottom: 7%;
      width: 50%;
      left: 25%;
      text-align: center;
      background: #103cad;
      color: white;
      padding: 20px;
      border-radius: 10px;
    }

    @media (max-width: 990px) {
      .title_banner_nosotros{
        position: absolute;
        top: 15%;
      }
      .conten_banner_nosotros{
        position: absolute;
        bottom: 7%;
        width: 70%;
        left: 15%;
        text-align: center;
        background: #103cad;
        color: white;
        padding: 20px;
        border-radius: 10px;
      }
    }

    @media (max-width: 638px) {
      .content_banner_nosotros{
        height: 650px !important;
      }
      .title_banner_nosotros{
        position: absolute;
        top: 15%;
      }
      .title_banner_nosotros h1{
        font-size: 35px !important;
      }

      .title_banner_nosotros p{
        font-size: 15px !important;
      }

      .conten_banner_nosotros{
        position: absolute;
        bottom: 2%;
        width: 96%;
        left: 2%;
        padding: 20px;
      }
      .conten_banner_nosotros p{
        font-size: 12px;
      }
      .title_clientes{
        font-size: 30px !important;
      }
      .title_proposito{
        font-size: 30px !important;
      }
    }
</style>

@endsection

@section('content')


<div class="page-content">

  <section class="content_banner_nosotros" style="width: 100%;
    position: relative;
    height: 900px;
    background-image: 
      linear-gradient(rgba(255, 255, 255, 0.757), rgba(255, 255, 255, 0.836)),
      url({{ asset('ecommerce/assets/images/2149343697.jpg') }});
    background-size: cover;
    background-position: center;">
    <div class="text-center d-flex align-items-center justify-content-center h-100">
      <div class="title_banner_nosotros">
        <h1 style="color: #042775; font-family: 'Orbitron', sans-serif !important; font-weight: 950; font-size: 50px;">NOSOTROS</h1>
        <p style="color: #e75322; font-weight: 800;">Nuestro compromiso, calidad y seguridad en cada obra</p>
      </div>
      <div class="conten_banner_nosotros">
        <p>Grupo Altos, empresa peruana líder en andamiaje seguro y versátil. Ofrecemos soluciones que optimizan procesos, impulsan la productividad y protegen a los trabajadores.</p>
      </div>
      <img src="{{ asset('ecommerce/assets/images/nosotros.png') }}" width="100%" alt="">
    </div>
  </section>

  {{-- SECTION NUESTRO PROPOSITO --}}
  <section class="container pt-5 pb-5">
  <h1 class="pd-titulo text-center title_proposito">NUESTRO PROPÓSITO</h1>
  <div class="row mt-4 justify-content-between">
    <div class="col-lg-6 px-4">
      <div style="text-align:right;">
        <h1 style="font-family: 'Orbitron', sans-serif !important; color:#e75322;">MISIÓN</h1>
        <p>Añadir más valor y seguridad a la vida de las personas que trabajan en altura.</p>
      </div>
    </div>
    <div class="col-lg-6 px-4s">
      <div style="text-align:left;">
        <h1 style="font-family: 'Orbitron', sans-serif !important; color:#e75322;">VISIÓN</h1>
        <p>Convertirnos en la compañía más grande y moderna en la fabricación y 
          comercialización de sistemas de andamiajes, encofrados y equipos de seguridad. Generando puestos de trabajo a miles de familias.</p>
      </div>
    </div>
  </div>
  <div class="row text-center py-5">

    <div class="col-12 col-md-4 custom-col">
      <img src="{{ asset('ecommerce/assets/images/RECURSOS/recursos-11.png') }}" class="w-100 pb-1" style="height: auto;" alt="Imagen 1">
    </div>

    <!-- Segunda imagen (abajo, al medio) -->
    <div class="col-12 col-md-4 middle-lower">
      <img src="{{ asset('ecommerce/assets/images/RECURSOS/recursos-12.png') }}" class="w-100 pb-1" style="height: auto;" alt="Imagen 2">
    </div>

    <!-- Tercera imagen (arriba) -->
    <div class="col-12 col-md-4 custom-col">
      <img src="{{ asset('ecommerce/assets/images/RECURSOS/recursos-13.png') }}" class="w-100 pb-1" style="height: auto;" alt="Imagen 3">
    </div>

  </div>
  </section>

  {{-- SECTION VALORES --}}
  <section style="background: #042775" class="pt-5 pb-5">
    <div class="container">
      <h1 class="text-center pb-5" style="color: white; font-family: 'Orbitron', sans-serif !important;">VALORES</h1>
      
      <div class="valo_contenedor">
        
        <div class="valo_grid">
            <!-- Card 1 -->
            <div class="valo_card">
                <div class="valo_icono_contenedor">
                    <img src="{{ asset('ecommerce/assets/images/RECURSOS/ICONOS WEB-10.png') }}" width="50px" alt="">
                </div>
                <div class="valo_contenido">
                    <h3 class="valo_nombre">Seguridad primera</h3>
                    <p class="valo_descripcion">Garantizamos que cada solución proteja la vida de quienes trabajan en altura.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="valo_card">
                <div class="valo_icono_contenedor">
                    <img src="{{ asset('ecommerce/assets/images/RECURSOS/ICONOS WEB-15.png') }}" width="50px" alt="">
                </div>
                <div class="valo_contenido">
                    <h3 class="valo_nombre">Innovación constante</h3>
                    <p class="valo_descripcion">Buscamos mejorar y crear nuevas soluciones que optimicen los procesos acordados.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="valo_card">
                <div class="valo_icono_contenedor">
                    <img src="{{ asset('ecommerce/assets/images/RECURSOS/ICONOS WEB-14.png') }}" width="50px" alt="">
                </div>
                <div class="valo_contenido">
                    <h3 class="valo_nombre">Calidad y Excelencia</h3>
                    <p class="valo_descripcion">Nos esforzamos en ofrecer servicios con versatilidad y productos a otros cotizables.</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="valo_card">
                <div class="valo_icono_contenedor">
                    <img src="{{ asset('ecommerce/assets/images/RECURSOS/ICONOS WEB-12.png') }}" width="50px" alt="">
                </div>
                <div class="valo_contenido">
                    <h3 class="valo_nombre">Compromiso con el cliente</h3>
                    <p class="valo_descripcion">Asumimos responsabilidades de forma íntegra y duradera a fin de mantener.</p>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="valo_card">
                <div class="valo_icono_contenedor">
                    <img src="{{ asset('ecommerce/assets/images/RECURSOS/ICONOS WEB-13.png') }}" width="50px" alt="">
                </div>
                <div class="valo_contenido">
                    <h3 class="valo_nombre">Trabajo en equipo</h3>
                    <p class="valo_descripcion">Integramos la colaboración cada uno para el trabajo conjunto.</p>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="valo_card">
                <div class="valo_icono_contenedor">
                    <img src="{{ asset('ecommerce/assets/images/RECURSOS/ICONOS WEB-11.png') }}" width="50px" alt="">
                </div>
                <div class="valo_contenido">
                    <h3 class="valo_nombre">Confianza y Transparencia</h3>
                    <p class="valo_descripcion">Demostramos valor y actitud presente en cualquier momento de la jornada.</p>
                </div>
            </div>
        </div>
        
      </div>

    </div>
  </section>

  {{-- NUESTROS CLIENTES --}}
  <section class="pt-5 pb-5">
    <div class="container pt-5 pb-5">
      <div class="text-center pb-3">
        <div class="text-center d-flex align-items-center justify-content-center mb-2">
          <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-02.png') }}" style="width: 60px;" alt="">
          <h3 class="mb-0 h3 text-uppercase text-center pd-title_clientes title_clientes" style="color: #042775; font-size:45px; font-family: 'Orbitron', sans-serif; font-weight: 900 !important;">{{ $customers->titulo ?? '' }}</h3>
          <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-01.png') }}" style="width: 60px;" alt="">
        </div>
        <p class="mb-0 text-capitalize" style="color: white">{{ $customers->subtitulo ?? '' }}</p>
      </div>

      <div class="brands">
        <div class="row row-cols-2 row-cols-lg-5 g-4">
          <div class="owl-carousel owl-theme">
            @foreach ($customers->clientImages as $item)
              <div class="col d-flex align-items-center justify-content-center m-auto">
                <div class="d-flex align-items-center p-3 rounded brand-box w-100 h-100 justify-content-center m-auto">
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