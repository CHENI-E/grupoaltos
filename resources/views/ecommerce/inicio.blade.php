@extends('layouts.ecommerce.app')

@section('styles')
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




    /* ESTILOS DE PRODUCTOS DESTACADOS */

    .body-pd-destacados {
      margin: 0;
      font-family: 'Open Sans', sans-serif !important;
      background-color: #ffffff;
      color: #000;
    }

    /* Sección principal */
    .pd-destacados {
      text-align: center;
      padding: 40px 20px;
    }

    /* Título principal */
    .pd-titulo {
      font-family: 'Orbitron', sans-serif !important;
      font-size: 40px !important;
      color: #002366 !important;
      margin-bottom: 5px !important;
      text-transform: uppercase !important;
    }

    /* Subtítulo */
    .pd-subtitulo {
      font-style: italic;
      color: #888;
      margin-bottom: 40px;
    }

    /* Contenedor de productos */
    .pd-productos {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    /* Tarjeta de producto */
    .pd-card {
      max-width: 100%;
      margin: 0 auto;
      background: #f2f2f2;
      border-radius: 25px;
      padding: 20px;
      /* width: 280px; */
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .pd-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    /* Imagen del producto */
    .pd-img {
      width: 100%;
      border-radius: 10px;
      background-color: #002366;
      padding: 10px;
      height: 180px;
      object-fit: contain;
    }

    /* Título de la tarjeta */
    .pd-card-titulo {
      font-family: 'Orbitron', sans-serif;
      font-size: 18px;
      color: #002366;
      margin: 15px 0 10px;
    }

    /* Botón personalizado */
    .pd-btn {
      display: inline-block;
      background-color: #f15a29;
      color: white;
      font-weight: bold;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 25px;
      transition: background-color 0.3s ease;
    }

    .pd-btn:hover {
      background-color: #d94e22;
    }

    @media (max-width: 444px) {
      .pd-titulo {
        font-size: 30px !important;
      }
      
      .pd-titulo_mapa{
        font-size: 30px !important;
      }

      .pd-title_clientes{
        font-size: 25px !important;
      }

    }

  </style>

@endsection

@section('content')

  <!--start page content-->
  <div class="page-content">


    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('ecommerce/assets/images/portada_solicitada.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('ecommerce/assets/images/portada_solicitada.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('ecommerce/assets/images/portada_solicitada.png') }}" class="d-block w-100" alt="...">
        </div>
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


    
    <section class="slider-section" hidden>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
          @foreach ($banners as $index => $banner)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
              class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"
              aria-label="Slide {{ $index + 1 }}"></button>
          @endforeach
        </div>

        <div class="carousel-inner">

          <div class="carousel-item active" style="background: #064199;">
            <img src="{{ asset('ecommerce/assets/images/portada_solicitada.png') }}" alt="">
          </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>


    @if (count($category) > 0)

    <section class="container mt-5">

      <section class="body-pd-destacados">

        <section class="pd-destacados">
          <h1 class="pd-titulo">PRODUCTOS DESTACADOS</h1>
          <p class="pd-subtitulo">Calidad, Seguridad y Disponibilidad Inmediata</p>
          
          <div id="splide" class="splide">
            <div class="splide__track">
              <ul class="splide__list">
                @foreach ($category as $item)
                  <li class="splide__slide">
                    <div class="pd-card">
                      <img src="{{ asset($item->imagen) }}" alt="{{ $item->nombre }}" class="pd-img" />
                      <h2 class="pd-card-titulo">{{ $item->nombre }}</h2>
                      <a href="{{ url('/productos?categoria=' . $item->id) }}" class="pd-btn">Ver productos</a>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>

        </section>

      </section>

    </section>

    @endif
    
    <!--start special product-->
    <section class="section-padding bg-section-2 mt-5" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500"
      style="background-image: linear-gradient(rgba(4, 40, 117, 0.858), rgba(4, 39, 117, 0.858)), url('https://i.ytimg.com/vi/k3mXTx09fmE/maxresdefault.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100%;">
      <div class="container py-5">
        
          <div class="row align-items-center justify-content-between">

            <div class="col-lg-6">
              <div class="card-body">
                <div class="" style="background: white; padding: 10px 30px; border-radius: 15px; width: fit-content; margin: auto;">
                  <h3 class="mb-0" style="color: #042775; font-family: 'Orbitron', sans-serif !important; text-transform: uppercase; font-weight: 900 !important;">{{ $aboutMe->title ?? '' }}</h3>
                </div>
                <div class="text-center w-100">
                  <img src="{{ asset('ecommerce/assets/images/20-años-altos.png') }}" class="w-100" alt="">
                </div>

                <div class="text-center mt-2">
                  <p class="px-0 tex-center" style="color: white;">{{ $aboutMe->content ?? '' }}</p>
                </div>
                
                @if ($aboutMe->boton_text && $aboutMe->boton_link)
                  <div class="buttons mt-2 d-flex flex-column flex-lg-row justify-content-center text-center">
                    <a href="{{ $aboutMe->boton_link }}" class="btn btn-lg btn-primary btn-ecomm px-5 py-3" style="background: #09509d; color: #fff;">{{ $aboutMe->boton_text }}</a>
                  </div>
                @endif
              </div>
            </div>

            <div class="col-lg-5 text-center">
              <iframe width="100%" height="350"
                src="{{ $aboutMe->image ?? '' }}" 
                title="Vicente Fernández - Un Millón de Primaveras (Letra / Lyrics)" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
              </iframe>
            </div>

          </div>
        
      </div>
    </section>
    <!--start special product-->

    {{-- section mapa --}}
    <section class="pt-5 pb-5" style="background: #f2f2f2;">
      <div class="container py-5">
        <div class="row align-items-center justify-content-between">

          <div class="col-lg-6">
            <img src="{{ asset('ecommerce/assets/images/MAPA.png') }}" class="w-100" alt="">
          </div>

          <div class="col-lg-6">

            <span style="background: #002366; padding: 10px 20px; border-radius: 10px; color: white; text-transform: uppercase; font-family: 'Orbitron', sans-serif; font-weight: 900 !important; ">REALIZAMOS</span>
            <div class="mt-3">
              <p class="pd-titulo_mapa" style="color: #103cad; font-size:55px; font-family: 'Orbitron', sans-serif; font-weight: 900 !important;">ENVIOS A TODO EL PERÚ</p>
            </div>

            <div class="d-flex align-items-center gap-3 mb-3 justify-content-start">
              <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-02.png') }}" style="width: 30px;" alt="">
              <span style="color: #888888ad; font-family: 'Orbitron', sans-serif;">Llevamos nuestros productos a cada región</span>
            </div>

            <div class="row">

              <div class="col-lg-12 d-flex align-items-center justify-content-start" 
                style="background: white; padding: 10px 20px; border-radius: 40px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 15px;">
                <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-03.png') }}" class="mx-1" style="width: 60px;" alt="">
                <div class="content_texto_caja mx-1">
                  <span style="color: #103cad; font-family: 'Arial'; font-weight: 700 !important;">Cantidad de ciudades o regiones a las que llegan <b style="font-weight: 950 !important;">(+24 regiones del Perú)</b></span>
                </div>
              </div>

              <div class="col-lg-12 d-flex align-items-center justify-content-start" 
                style="background: white; padding: 10px 20px; border-radius: 40px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 15px;">
                <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-06.png') }}" class="mx-1" style="width: 60px;" alt="">
                <div class="content_texto_caja mx-1">
                  <span style="color: #103cad; font-family: 'Arial'; font-weight: 700 !important;">Tiempo de Entrega <b style="font-weight: 950 !important;">(Despachos en 48/72 horas)</b></span>
                </div>
              </div>

              <div class="col-lg-12 d-flex align-items-center justify-content-start" 
                style="background: white; padding: 10px 20px; border-radius: 40px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 15px;">
                <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-07.png') }}" class="mx-1" style="width: 60px;" alt="">
                <div class="content_texto_caja mx-1">
                  <span style="color: #103cad; font-family: 'Arial'; font-weight: 700 !important;">Aliados logísticos <b style="font-weight: 950 !important;">(Con los principales operadores logísticos del país)</b></span>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </section>

    <!--start Brands-->
    <section class="section-padding" data-aos="fade-up" style="background: #042775">
      <div class="container pt-5 pb-5">
        <div class="text-center pb-3">
          <div class="text-center d-flex align-items-center justify-content-center mb-2">
            <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-02.png') }}" style="width: 60px;" alt="">
            <h3 class="mb-0 h3 text-uppercase text-center pd-title_clientes" style="color: white; font-size:45px; font-family: 'Orbitron', sans-serif; font-weight: 900 !important;">{{ $customers->titulo ?? '' }}</h3>
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
    <!--end Brands-->


    <!--subscribe banner-->
    <section class="product-thumb-slider subscribe-banner py-5" style="background: #ffffff" data-aos="fade-up">
      <div class="container">

        <div class="row align-items-center justify-content-between">

          <div class="col-lg-6">
            <span style="background: #002366; padding: 10px 20px; border-radius: 10px; color: white; text-transform: uppercase; font-family: 'Orbitron', sans-serif; font-weight: 900 !important; ">
              TRABAJA CON NOSOTROS</span>
            <div class="mt-3">
              <p class="pd-titulo_mapa" style="color: #103cad; font-size:55px; font-family: 'Orbitron', sans-serif; font-weight: 900 !important;">ÚNETE A NUESTRO EQUIPO</p>
            </div>
            <form method="post" action="{{ route('ecommerce.emailempleabilidad') }}" class="d-flex flex-column">
              @csrf
              <label class="mb-2" style="font-size: 22px; color: #b1b1b1; font-weight: 900 !important; font-style: italic;">Envíanos un Correo</label>
              <input type="text" name="email" placeholder="Escribe tu email..." class="form-control form-control-lg rounded-0 px-3 py-3 mb-2"/>
              @error('email')
                  <div class="mt-2 alert alert-danger">{{ $message }}</div>
              @enderror
              @if (session('success'))
                  <div class="alert alert-success mt-2">
                      {{ session('success') }}
                  </div>
              @endif
              <button
                class="mt-3"
                type="submit"
                style="color: white; background: #e75322; padding: 10px 20px; border-radius: 12px; border: none; font-weight: 900; transition: all 0.3s ease; cursor: pointer;"
                onmouseover="this.style.background='#f06b45'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.2)';"
                onmouseout="this.style.background='#e75322'; this.style.boxShadow='none';">
                Enviar
              </button>


            </form>
          </div>

          <div class="col-lg-6 mx-auto">
            <img src="{{ asset('ecommerce/assets/images/ingeniero-altos.png') }}" class="w-100" alt="">
            {{-- <form method="post" class="text-center" action="{{ route('ecommerce.emailempleabilidad') }}">
              @csrf
              <h3 class="mb-0 fw-bold text-white">Trabaja con Nosotros <br> Únete al equipo de Grupo Altos</h3>
              <div class="mt-3">
                <input type="text" class="form-control form-control-lg bubscribe-control rounded-0 px-5 py-3" name="email" placeholder="Ingresa tu Correo Electrónico">
              </div>
              @error('email')
                  <div class="mt-2 alert alert-danger">{{ $message }}</div>
              @enderror
              @if (session('success'))
                  <div class="alert alert-success mt-2">
                      {{ session('success') }}
                  </div>
              @endif
              <div class="mt-3 d-grid">
                <button type="submit" class="btn btn-lg btn-primary bubscribe-button px-5 py-3" style="background: #1558a2; color: #fff;">Enviar Email</button>
              </div>
            </form> --}}
          </div>
        </div>

      </div>
    </section>
    <!--subscribe banner-->


    <!--start blog-->
    {{-- <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 fw-bold">Último blog</h3>
          <p class="mb-0 text-capitalize">Consulta nuestras últimas noticias</p>
        </div>
        <div class="blog-cards">
          <div class="row row-cols-1 row-cols-lg-3 g-4">
            <div class="col">
              <div class="card">
                <img src="ecommerce/assets/images/blog/01.webp" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">Blog title here</h5>
                  <p class="mb-0">Some quick example text to build on the card title and make.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="ecommerce/assets/images/blog/02.webp" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">Blog title here</h5>
                  <p class="mb-0">Some quick example text to build on the card title and make.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="ecommerce/assets/images/blog/03.webp" class="card-img-top rounded-0" alt="...">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                    </div>
                  </div>
                  <h5 class="card-title fw-bold mt-3">Blog title here</h5>
                  <p class="mb-0">Some quick example text to build on the card title and make.</p>
                  <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                </div>
              </div>
            </div>

          </div>
          <!--end row-->
        </div>
      </div>
    </section> --}}
    <!--end blog-->


  </div>
  <!--end page content-->

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
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Splide('#splide', {
      type   : 'loop',
      perPage: 4,
      gap    : '1rem',
      breakpoints: {
        1200: {
          perPage: 3,
        },
        1024: {
          perPage: 2,
        },
        701: {
          perPage: 1,
        },
      }
    }).mount();
  });
</script>

@endsection