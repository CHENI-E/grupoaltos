@extends('layouts.ecommerce.app')

@section('content')

  <!--start page content-->
  <div class="page-content">

    <!--start carousel-->
    <section class="slider-section">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
          @foreach ($banners as $index => $banner)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
              class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"
              aria-label="Slide {{ $index + 1 }}"></button>
          @endforeach
        </div>

        <div class="carousel-inner">

          @foreach ($banners as $banner)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background: {{ $banner->fondo }};">
              <div class="row d-flex align-items-center">
                <div class="col d-none d-lg-flex justify-content-center">
                  <div class="">
                    @php echo $banner->contenido; @endphp
                    <div class="">
                      @if ($banner->texto_boton)
                        <a class="btn btn-dark btn-ecomm" href="{{ $banner->url_boton }}">{{ $banner->texto_boton }}</a>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col">
                  <img src="{{ asset($banner->imagen) }}" class="img-fluid" alt="...">
                </div>
              </div>
            </div>
          @endforeach

          {{-- <div class="carousel-item active" style="background: #064199;">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Calidad para tu Obra</h3>
                  <h1 class="h1 text-white fw-bold">Usa puntuales pro <br> de tubo Galvanizado</h1>
                  <ul class="text-white fw-bold">
                    <li>Graduales en Altura</li>
                    <li>Resistentes a la Corrosión</li>
                    <li>Gran cap. de carga</li>
                  </ul>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Más Información</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="{{ asset('ecommerce/assets/web/banner_inicio/img1_banner.png') }}" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-red">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Latest Trending</h3>
                  <h1 class="h1 text-white fw-bold">Fashion Wear</h1>
                  <p class="text-white fw-bold"><i>Last call for upto 35%</i></p>
                  <div class=""> <a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="ecommerce/assets/images/sliders/s_2.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-purple">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">New Trending</h3>
                  <h1 class="h1 text-white fw-bold">Kids Fashion</h1>
                  <p class="text-white fw-bold"><i>Last call for upto 15%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="ecommerce/assets/images/sliders/s_3.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-yellow">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-dark fw-bold">Latest Trending</h3>
                  <h1 class="h1 text-dark fw-bold">Electronics Items</h1>
                  <p class="text-dark fw-bold"><i>Last call for upto 45%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="ecommerce/assets/images/sliders/s_4.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div>
          <div class="carousel-item bg-green">
            <div class="row d-flex align-items-center">
              <div class="col d-none d-lg-flex justify-content-center">
                <div class="">
                  <h3 class="h3 fw-light text-white fw-bold">Super Deals</h3>
                  <h1 class="h1 text-white fw-bold">Home Furniture</h1>
                  <p class="text-white fw-bold"><i>Last call for upto 24%</i></p>
                  <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <img src="ecommerce/assets/images/sliders/s_5.webp" class="img-fluid" alt="...">
              </div>
            </div>
          </div> --}}
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
    <!--end carousel-->

    <!--start Featured Products slider-->
    <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Productos Destacados</h3>
          <p class="mb-0 text-capitalize">Calidad, seguridad y disponibilidad inmediata</p>
        </div>
        <div class="product-thumbs">
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/andamios-md48.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Andamios MD48</h5>
                  <h6 class="mb-0 product-number fw-bold">856 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/andamios-mf48.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Andamios MF48</h5>
                  <h6 class="mb-0 product-number fw-bold">169 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/e-bici.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">E-Bici</h5>
                  <h6 class="mb-0 product-number fw-bold">589 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/e-bike.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">E-Bike</h5>
                  <h6 class="mb-0 product-number fw-bold">278 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/estructuras-metalicas.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Estructuras Metálicas</h5>
                  <h6 class="mb-0 product-number fw-bold">985 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/graderias-multi-stark.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Graderías Multi Stark</h5>
                  <h6 class="mb-0 product-number fw-bold">489 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/puntuales-pro.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Puntuales Pro</h5>
                  <h6 class="mb-0 product-number fw-bold">985 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/sistema-proteccion-borde.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Sistema de Protección de Borde</h5>
                  <h6 class="mb-0 product-number fw-bold">489 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/productos_generales/vallas-seguridad.jpeg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Vallas de Seguridad</h5>
                  <h6 class="mb-0 product-number fw-bold">985 Productos</h6>
                </div>
              </div>
            </div>
          </a>

        </div>

      </div>
    </section>
    <!--end Featured Products slider-->

    <!--start features-->
    <section class="product-thumb-slider section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">{{ $identity->title ?? '' }}</h3>
          <p class="mb-0 text-capitalize">{{ $identity->subtitle ?? '' }}</p>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 g-4 justify-content-center">
          <div class="col d-flex">
            <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100">
              <div class="card-body text-center">
                <div class="h1 fw-bold my-2 text-primary">
                  {{-- <i class="bi bi-truck"></i> --}}
                  <i class="bi bi-bullseye"></i>
                </div>
                <h5 class="fw-bold">{{ $identity->title_card_one ?? '' }}</h5>
                <p class="mb-0" style="font-size: 13px;">
                  {{ $identity->content_card_one ?? '' }}
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
                <h5 class="fw-bold">{{ $identity->title_card_two ?? '' }}</h5>
                <p class="mb-0" style="font-size: 13px;">
                  {{ $identity->content_card_two ?? '' }}
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
                <h5 class="fw-bold">{{ $identity->title_card_three ?? '' }}</h5>
                <p class="mb-0" style="font-size: 13px;">{{ $identity->content_card_three ?? '' }}</p>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
      </div>
    </section>
    <!--end features-->


    <!--start special product-->
    <section class="section-padding bg-section-2">
      <div class="container">
        <div class="card border-0 rounded-0 p-3 depth">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <video width="640" height="360" controls>
                <source src="{{ asset('ecommerce/assets/web/video_contactanos/Montaje-MD.mp4') }}" type="video/mp4">
              </video>

              {{-- <img src="" class="img-fluid rounded-0" alt="..."> --}}
            </div>
            <div class="col-lg-6">
              <div class="card-body">
                <h3 class="fw-bold">{{ $aboutMe->title ?? '' }}</h3>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-transparent px-0">{{ $aboutMe->content ?? '' }}</li>
                </ul>
                @if ($aboutMe->boton_text && $aboutMe->boton_link)
                  <div class="buttons mt-4 d-flex flex-column flex-lg-row gap-3">
                    <a href="{{ $aboutMe->boton_link }}" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3">{{ $aboutMe->boton_text }}</a>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--start special product-->


    <!--start Brands-->
    <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Nuestros Clientes</h3>
          <p class="mb-0 text-capitalize">Construimos relaciones sólidas con quienes construyen el futuro.</p>
        </div>
        <div class="brands">
          <div class="row row-cols-2 row-cols-lg-5 g-4">

            <div class="col d-flex">
              <div class="p-3 border rounded brand-box w-100 h-100">
                <div class="d-flex align-items-center justify-content-center text-center h-100">
                  <a href="javascript:;" class="w-100">
                    <img src="{{ asset('ecommerce/assets/web/Clientes/Adp-sf.png') }}" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="col d-flex">
              <div class="p-3 border rounded brand-box w-100 h-100">
                <div class="d-flex align-items-center justify-content-center text-center h-100">
                  <a href="javascript:;" class="w-100">
                    <img src="{{ asset('ecommerce/assets/web/Clientes/deconst-sf.png') }}" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
            </div>

            <div class="col d-flex">
              <div class="p-3 border rounded brand-box w-100 h-100">
                <div class="d-flex align-items-center justify-content-center text-center h-100">
                  <a href="javascript:;" class="w-100">
                    <img src="{{ asset('ecommerce/assets/web/Clientes/indelat-sf.png') }}" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="col d-flex">
              <div class="p-3 border rounded brand-box w-100 h-100">
                <div class="d-flex align-items-center justify-content-center text-center h-100">
                  <a href="javascript:;" class="w-100">
                    <img src="{{ asset('ecommerce/assets/web/Clientes/Miyasato-sf.png') }}" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
            </div>

            <div class="col d-flex">
              <div class="p-3 border rounded brand-box w-100 h-100">
                <div class="d-flex align-items-center justify-content-center text-center h-100">
                  <a href="javascript:;" class="w-100">
                    <img src="{{ asset('ecommerce/assets/web/Clientes/pjdp-sf.png') }}" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
            </div>

          </div>
          <!--end row-->
        </div>
      </div>
    </section>
    <!--end Brands-->


    <!--start cartegory slider-->
    <section class="cartegory-slider section-padding bg-section-2">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="mb-0 h3 fw-bold">Nuestros Servicios</h3>
          <p class="mb-0 text-capitalize">Desde el suministro hasta el soporte: todo lo que necesitas en sistemas de trabajo en altura.</p>
        </div>
        <div class="cartegory-box">
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/servicio/servicio-1.jpg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Servicio 1</h5>
                  <h6 class="mb-0 product-number fw-bold">856 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/servicio/servicio-1.jpg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Servicio 2</h5>
                  <h6 class="mb-0 product-number fw-bold">169 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/servicio/servicio-1.jpg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Servicio 3</h5>
                  <h6 class="mb-0 product-number fw-bold">589 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/servicio/servicio-1.jpg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Servicio 4</h5>
                  <h6 class="mb-0 product-number fw-bold">278 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/servicio/servicio-1.jpg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Servicio 5</h5>
                  <h6 class="mb-0 product-number fw-bold">985 Productos</h6>
                </div>
              </div>
            </div>
          </a>
          <a href="shop-grid-type-4.html">
            <div class="card">
              <div class="card-body">
                <div class="overflow-hidden">
                  <img src="{{ asset('ecommerce/assets/web/servicio/servicio-1.jpg') }}" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="text-center">
                  <h5 class="mb-1 cartegory-name mt-3 fw-bold">Servicio 6</h5>
                  <h6 class="mb-0 product-number fw-bold">489 Productos</h6>
                </div>
              </div>
            </div>
          </a>

        </div>
      </div>
    </section>
    <!--end cartegory slider-->


    <!--subscribe banner-->
    <section class="product-thumb-slider subscribe-banner p-5">
      <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
          <div class="text-center">
            <h3 class="mb-0 fw-bold text-white">Trabaja con Nosotros <br> Únete al equipo de Grupo Altos</h3>
            <div class="mt-3">
              <input type="text" class="form-control form-control-lg bubscribe-control rounded-0 px-5 py-3" placeholder="Ingresa tu Correo Electrónico">
            </div>
            <div class="mt-3 d-grid">
              <button type="button" class="btn btn-lg btn-ecomm bubscribe-button px-5 py-3">Enviar Email</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--subscribe banner-->


    <!--start blog-->
    <section class="section-padding">
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
    </section>
    <!--end blog-->


  </div>
  <!--end page content-->

@endsection