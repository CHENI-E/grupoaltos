@extends('layouts.ecommerce.app')

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
          <div class="col-12 col-xl-6">
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
          <div class="col-12 col-xl-6 justify-content-center d-flex">
             <img src="{{ asset('ecommerce/assets/web/nosotros/nosotros.jpg') }}" class="img-fluid" style="max-height: 480px;" alt="">
          </div>
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

        <div class="separator section-padding">
            <div class="line"></div>
            <h3 class="mb-0 h3 fw-bold">Nuestros Clientes</h3>
            <div class="line"></div>
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
   <!--start product details-->

</div>

@endsection