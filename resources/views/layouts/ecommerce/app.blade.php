<!doctype html>
<html lang="en" class="light-theme">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <link rel="icon" href="{{ asset('ecommerce/assets/web/logo/LOGO-EDITABLE-PNG-BLANCO.png') }}" type="image/webp" />

  <!-- CSS files -->
  <link href="{{ asset('ecommerce/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&amp;display=swap" rel="stylesheet">
  {{-- <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css"> --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <!-- Plugins -->
  <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/assets/plugins/slick/slick.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/assets/plugins/slick/slick-theme.css') }}" />

  <link href="{{ asset('ecommerce/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('ecommerce/assets/css/dark-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('ecommerce/assets/css/carrito-mejorado.css') }}?v={{ time() }}" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 {{--  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Open+Sans:ital,wght@0,400;1,400&display=swap" rel="stylesheet"> --}}
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Open+Sans:ital,wght@0,400;1,400&display=swap" rel="stylesheet">




  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

  @yield('styles')
  <script>
      const APP_URL = "{{ config('app.url') }}";
  </script>
  <style>

    .color-blue1 {
        color: #103cad !important;
    }
    .color-blue2 {
        color: #042775 !important;
    }

    .color-orange1{
        color: #e75322 !important;
    }

    .top-header .primary-menu .navbar-nav a.nav-link{
      height: 0px !important;
    }

    .border-orange-button{
      border-bottom: 2px solid #e75322 !important;
    }
    .btn-outline-primary {
        --bs-btn-color: #042775;
        --bs-btn-border-color: #042775;
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: #042775;
        --bs-btn-hover-border-color: #042775;
        --bs-btn-focus-shadow-rgb: 13, 110, 253;
        --bs-btn-active-color: #fff;
        --bs-btn-active-bg: #042775;
        --bs-btn-active-border-color: #042775;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        --bs-btn-disabled-color: #042775;
        --bs-btn-disabled-bg: transparent;
        --bs-btn-disabled-border-color: #042775;
        --bs-gradient: none;
    }
    .btn-primary {
        --bs-btn-color: #fff !important;
        --bs-btn-bg: #042775 !important;
        --bs-btn-border-color: #042775 !important;
        --bs-btn-hover-color: #fff !important;
        --bs-btn-hover-bg: #103cad !important;
        --bs-btn-hover-border-color: #103cad !important;
        --bs-btn-focus-shadow-rgb: 49, 132, 253 !important;
        --bs-btn-active-color: #fff !important;
        --bs-btn-active-bg: #103cad !important;
        --bs-btn-active-border-color: #103cad !important;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125) !important;
        --bs-btn-disabled-color: #fff !important;
        --bs-btn-disabled-bg: #042775 !important;
        --bs-btn-disabled-border-color: #042775 !important;
    }

    /* ==================== ESTILOS DEL CARRITO MEJORADO ==================== */
    
    /* Offcanvas del carrito */
    .carrito-offcanvas {
      width: 420px !important;
    }
    
    @media (max-width: 576px) {
      .carrito-offcanvas {
        width: 100% !important;
      }
    }
    
    /* Body del carrito con scroll personalizado */
    .carrito-body {
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: #042775 #f1f1f1;
    }
    
    .carrito-body::-webkit-scrollbar {
      width: 8px;
    }
    
    .carrito-body::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }
    
    .carrito-body::-webkit-scrollbar-thumb {
      background: #042775;
      border-radius: 10px;
    }
    
    .carrito-body::-webkit-scrollbar-thumb:hover {
      background: #103cad;
    }
    
    /* Items del carrito */
    .cart-item-mejorado {
      transition: all 0.3s ease;
      position: relative;
    }
    
    .cart-item-mejorado:hover {
      background: #f8f9fa;
      border-radius: 8px;
      padding: 8px;
      margin: 0 -8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    
    /* Botones de cantidad */
    .btn-cantidad-minus,
    .btn-cantidad-plus {
      transition: all 0.2s ease;
    }
    
    .btn-cantidad-minus:hover,
    .btn-cantidad-plus:hover {
      background: #042775 !important;
      color: white !important;
      border-radius: 4px;
      transform: scale(1.1);
    }
    
    /* Badge del contador */
    .cart-badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background: #dc3545;
      color: white;
      border-radius: 50%;
      padding: 2px 6px;
      font-size: 11px;
      font-weight: bold;
      min-width: 20px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1);
      }
    }
    
    /* Animación de entrada para notificaciones */
    @keyframes slideInRight {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    /* Botón de cotizar */
    #btnCotizar {
      position: relative;
      overflow: hidden;
    }
    
    #btnCotizar:hover {
      background: #20c05c !important;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(37, 211, 102, 0.4);
    }
    
    #btnCotizar:active {
      transform: translateY(0);
    }
    
    /* Botón del modal */
    #btnEnviarCotizacion {
      position: relative;
      overflow: hidden;
    }
    
    #btnEnviarCotizacion:hover {
      background: #20c05c !important;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
    }
    
    /* Inputs del modal */
    .modal-content input,
    .modal-content textarea {
      transition: all 0.3s ease;
    }
    
    .modal-content input:focus,
    .modal-content textarea:focus {
      border-color: #042775 !important;
      box-shadow: 0 0 0 0.2rem rgba(4, 39, 117, 0.15) !important;
      transform: translateY(-1px);
    }
    
    /* Carrito vacío */
    .carrito-vacio {
      animation: fadeIn 0.5s ease;
    }
    
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    /* Efecto ripple en botones */
    .btn-ecomm::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.3);
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
    }
    
    .btn-ecomm:active::after {
      width: 300px;
      height: 300px;
    }

    /* ==================== BOTÓN DEL CARRITO MINIMALISTA ==================== */
    .btn-carrito-minimal {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 44px;
      height: 44px;
      background: transparent;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
      color: #042775;
    }

    .btn-carrito-minimal:hover {
      background: rgba(4, 39, 117, 0.08);
    }

    .btn-carrito-minimal i {
      font-size: 24px;
      transition: transform 0.2s ease;
    }

    .btn-carrito-minimal:hover i {
      transform: scale(1.1);
    }

    .cart-badge-minimal {
      position: absolute;
      top: 6px;
      right: 6px;
      background: #e75322;
      color: white;
      border-radius: 10px;
      min-width: 18px;
      height: 18px;
      display: none;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      font-weight: 600;
      padding: 0 5px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.15);
    }

    .cart-badge-minimal.active {
      display: flex;
    }

    /* Animación sutil al agregar producto */
    @keyframes cartBounce {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    .btn-carrito-minimal.bounce i {
      animation: cartBounce 0.4s ease;
    }

    /* Responsive */
    @media (max-width: 576px) {
      .btn-carrito-minimal {
        width: 40px;
        height: 40px;
      }
      
      .btn-carrito-minimal i {
        font-size: 22px;
      }

      .cart-badge-minimal {
        top: 4px;
        right: 4px;
        min-width: 16px;
        height: 16px;
        font-size: 9px;
      }
    }

    .whatsapp-float {
      position: fixed;
      right: 20px;
      bottom: 20px;
      width: 64px;
      height: 64px;
      display: inline-grid;
      place-items: center;
      border-radius: 50%;
      box-shadow: 0 10px 25px rgba(0,0,0,.25);
      text-decoration: none;
      z-index: 9999;
      isolation: isolate; /* para que el ::after no salga del stacking context */
      animation: wf-bob 3s ease-in-out infinite;
      transition: transform .2s ease, box-shadow .2s ease;
      /* fondo degrade para resaltar */
      background: radial-gradient(circle at 30% 30%, #2fe06e, #25d366 60%, #1ebe57);
    }

    .whatsapp-float svg {
      width: 34px;
      height: 34px;
      filter: drop-shadow(0 1px 0 rgba(0,0,0,.15));
    }

    /* Aro de pulso */
    .whatsapp-float::after {
      content: "";
      position: absolute;
      inset: 0;
      border-radius: 50%;
      box-shadow: 0 0 0 0 rgba(37, 211, 102, .55);
      animation: wf-pulse 2.2s ease-out infinite;
      z-index: -1;
    }

    /* Efecto hover */
    .whatsapp-float:hover {
      transform: translateY(-2px) scale(1.03);
      box-shadow: 0 14px 28px rgba(0,0,0,.3);
    }

    /* Animaciones */
    @keyframes wf-bob {
      0%, 100% { transform: translateY(0); }
      50%      { transform: translateY(-6px); }
    }

    @keyframes wf-pulse {
      0%   { box-shadow: 0 0 0 0 rgba(37, 211, 102, .55); }
      70%  { box-shadow: 0 0 0 18px rgba(37, 211, 102, 0); }
      100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
    }

    /* Accesibilidad: respeta reduce motion */
    @media (prefers-reduced-motion: reduce) {
      .whatsapp-float,
      .whatsapp-float::after {
        animation: none !important;
      }
    }

    /* Ajuste móvil: separa del borde y reduce tamaño si el viewport es pequeño */
    @media (max-width: 420px) {
      .whatsapp-float {
        right: 14px;
        bottom: 14px;
        width: 56px;
        height: 56px;
      }
      .whatsapp-float svg {
        width: 30px;
        height: 30px;
      }
    }

</style>


  <title>Grupos Altos - Fabricamos y Comercializamos Andamios</title>

</head>

<body>


     <!--page loader-->
     <div class="loader-wrapper">
      <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
        <div class="spinner-border text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>
   <!--end loader-->

  <!--start top header-->
  <header class="top-header" style="border-radius: 0 0 30px 30px !important; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.608);">
    <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
      <a class="navbar-brand d-none d-xl-inline" href="{{ route('ecommerce.inicio') }}"><img src="{{ asset('ecommerce/assets/web/logo/LOGO-ALTOS-COLOR.png') }}" class="logo-img" alt=""></a>
      <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar">
        <i class="bi bi-list"></i>
      </a>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
          <div class="offcanvas-logo"><img src="{{ asset('ecommerce/assets/web/logo/LOGO-ALTOS-COLOR.png') }}" class="logo-img" alt="">
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body primary-menu">
          <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item">
              <a class="nav-link color-blue2 {{ request()->routeIs('ecommerce.inicio') ? 'border-orange-button' : '' }}" href="{{ route('ecommerce.inicio') }}">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link color-blue2 {{ request()->routeIs('ecommerce.nosotros') ? 'border-orange-button' : '' }}" href="{{ route('ecommerce.nosotros') }}">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link color-blue2 {{ request()->routeIs('ecommerce.productos') ? 'border-orange-button' : '' }}" href="{{ route('ecommerce.productos') }}">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link color-blue2 {{ request()->routeIs('ecommerce.servicio') ? 'border-orange-button' : '' }}" href="{{ route('ecommerce.servicio') }}">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link color-blue2 {{ request()->routeIs('ecommerce.proyectos') ? 'border-orange-button' : '' }}" href="{{ route('ecommerce.proyectos') }}">Proyectos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link color-blue2 {{ request()->routeIs('ecommerce.blog') ? 'border-orange-button' : '' }}" href="{{ route('ecommerce.blog') }}">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link color-blue2 {{ request()->routeIs('ecommerce.contactanos') ? 'border-orange-button' : '' }}" href="{{ route('ecommerce.contactanos') }}">Contáctanos</a>
            </li>
          </ul>
        </div>
      </div>
      <ul class="navbar-nav secondary-menu flex-row align-items-center gap-3">
        
        <!-- Botón del Carrito Minimalista -->
        <li class="nav-item">
          <button class="btn-carrito-minimal" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-label="Ver carrito de compras">
            <i class="bi bi-bag"></i>
            <span class="cart-badge-minimal"></span>
          </button>
        </li>

      </ul>
    </nav>
  </header>
  <!--end top header-->


  @yield('content')




  <!--start footer-->
  <section class="footer-section bg-section-2 section-padding pb-0" style="background: #042775">
    <div class="container">
       <div class="row row-cols-1 row-cols-lg-4 g-4">
        <div class="col">
          <div class="footer-widget-6">
            <img src="{{ asset('ecommerce/assets/web/logo/LOGO-EDITABLE-PNG-BLANCO.png') }}" class="logo-img mb-3" style="width: 200px" alt="">
            {{-- <h5 class="mb-3 fw-bold">Sobre Nosotros</h5>
              <p class="mb-2">
                Fabricamos y comercializamos andamios multifuncionales y multidireccionales, estos han sido adaptados bajos las normativas peruanas y cumpliendo con todas 
                las exigencias y seguridad en obra para trabajos en altura. También contamos con andamios de fachadas y torres móviles.
              </p> --}}
          </div>
        </div>
        <div class="col">
        </div>
        <div class="col">
          <div class="footer-widget-8">
            <h6 class="mb-3 fw-bold" style="color: #e75322; font-family: 'Orbitron', sans-serif !important;">Buscar</h6>
             <ul class="widget-link list-unstyled">
               <li><a href="{{ route('ecommerce.inicio') }}" style="color: white">Inicio</a></li>
               <li><a href="{{ route('ecommerce.nosotros') }}" style="color: white">Nosotros</a></li>
               <li><a href="{{ route('ecommerce.servicio') }}" style="color: white">Servicios</a></li>
               <li><a href="javascript:;" style="color: white">Proyectos</a></li>
               <li><a href="{{ route('ecommerce.blog') }}" style="color: white">Blog</a></li>
               <li><a href="{{ route('ecommerce.contactanos') }}" style="color: white">Contáctanos</a></li>
             </ul>
          </div>
        </div>
        <div class="col">
          <div class="footer-widget-9">
            <h6 class="mb-3 fw-bold" style="color: #e75322; font-family: 'Orbitron', sans-serif !important;">Redes Sociales</h6>
             <div class="social-link d-flex align-items-center gap-2">
               <a href="https://www.facebook.com/andamiosaltos" target="_blank" style="background: white;"><i class="bi bi-facebook" style="color: #042775;"></i></a>
               <a href="https://www.linkedin.com/in/andamios-altos/" target="_blank" style="background: white;"><i class="bi bi-linkedin" style="color: #042775;"></i></a>
               <a href="https://www.youtube.com/@grupoaltos" target="_blank" style="background: white;"><i class="bi bi-youtube" style="color: #042775;"></i></a>
               <a href="https://www.instagram.com/grupoaltos/" target="_blank" style="background: white;"><i class="bi bi-instagram" style="color: #042775;"></i></a>
               <a href="https://www.tiktok.com/@grupoaltos" target="_blank" style="background: white;"><i class="bi bi-tiktok" style="color: #042775;"></i></a>
             </div>
             <div class="mb-3 mt-3">
              <h6 class="mb-0 fw-bold" style="color: #e75322; font-family: 'Orbitron', sans-serif !important;">Ayuda</h6>
              <p class="mb-0 text-muted" style="color: white !important;">ventas@grupoaltos.com.pe</p>
             </div>
             <div class="">
              <h6 class="mb-0 fw-bold" style="color: #e75322; font-family: 'Orbitron', sans-serif !important;">Télefono</h6>
              <p class="mb-0 text-muted" style="color: white !important;">994 119 444</p>
             </div>
          </div>
        </div>
       </div><!--end row-->
       <div class="my-5"></div>

    </div>
  </section>
  <!--end footer-->

  <footer class="footer-strip text-center py-3 bg-section-2 border-top positon-absolute bottom-0" style="background: #042775">
    <p class="mb-0 text-muted" style="color: white !important;">©{{ date('Y') }} Grupo Altos | Todos los derechos reservados.</p>
  </footer>


  <!--start cart-->
  <div class="offcanvas offcanvas-end carrito-offcanvas" data-bs-scroll="true" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header" style="background: linear-gradient(135deg, #042775 0%, #103cad 100%); color: white; padding: 20px;">
      <div>
        <h5 class="mb-0 fw-bold title_carrito" id="offcanvasRightLabel" style="font-size: 18px; color: white;"></h5>
        <small style="opacity: 0.9;">Revisa tus productos</small>
      </div>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body carrito-body" style="padding: 20px;">

      <div class="cart-list" id="contenedorCarrito">
      </div>

    </div>
    <div class="offcanvas-footer p-3 border-top" style="background: #f8f9fa;">
      <div class="d-flex justify-content-between mb-2">
        <button type="button" class="btn btn-sm btn-outline-danger" onclick="vaciarCarrito()" style="border-radius: 6px;">
          <i class="bi bi-trash me-1"></i>Vaciar carrito
        </button>
        <a href="/productos" class="btn btn-sm btn-outline-primary" style="border-radius: 6px;">
          <i class="bi bi-plus-circle me-1"></i>Seguir comprando
        </a>
      </div>
      <div class="d-grid gap-2">
        <button type="button" class="btn btn-lg btn-ecomm" id="btnCotizar" style="background: #25D366; border: none; color: white; padding: 14px; font-weight: 600; border-radius: 8px; transition: all 0.3s;">
          <i class="bi bi-whatsapp me-2"></i>SOLICITAR COTIZACIÓN
        </button>
        <small class="text-center text-muted" style="font-size: 11px;">
          <i class="bi bi-shield-check me-1"></i>Cotización sin compromiso
        </small>
      </div>
    </div>

  </div>
  <!--end cart-->

  <!-- Modal de confirmación de cotización -->
  <div class="modal fade" id="modalCotizacion" tabindex="-1" aria-labelledby="modalCotizacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.15);">
        <div class="modal-header" style="background: linear-gradient(135deg, #042775 0%, #103cad 100%); color: white; border-radius: 12px 12px 0 0; padding: 24px;">
          <div>
            <h5 class="modal-title fw-bold" id="modalCotizacionLabel" style="color: white;">
              <i class="bi bi-clipboard-check me-2"></i>Confirmar Cotización
            </h5>
            <small style="opacity: 0.9;">Completa tus datos para recibir la cotización</small>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding: 30px;">
          <!-- Formulario de datos del cliente -->
          <div class="mb-4">
            <h6 class="fw-bold mb-3" style="color: #042775;">
              <i class="bi bi-person-circle me-2"></i>Tus Datos
            </h6>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nombreCliente" class="form-label" style="font-weight: 500; color: #555;">Nombre completo <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="nombreCliente" placeholder="Ej: Juan Pérez" required style="border-radius: 8px; padding: 12px; border: 2px solid #e0e0e0;">
              </div>
              <div class="col-md-6">
                <label for="empresaCliente" class="form-label" style="font-weight: 500; color: #555;">Empresa (opcional)</label>
                <input type="text" class="form-control" id="empresaCliente" placeholder="Ej: Constructora ABC" style="border-radius: 8px; padding: 12px; border: 2px solid #e0e0e0;">
              </div>
              <div class="col-12">
                <label for="mensajeAdicional" class="form-label" style="font-weight: 500; color: #555;">Mensaje adicional (opcional)</label>
                <textarea class="form-control" id="mensajeAdicional" rows="2" placeholder="Información adicional que desees agregar..." style="border-radius: 8px; padding: 12px; border: 2px solid #e0e0e0;"></textarea>
              </div>
            </div>
          </div>

          <!-- Resumen de productos -->
          <div class="mb-3">
            <h6 class="fw-bold mb-3" style="color: #042775;">
              <i class="bi bi-basket2 me-2"></i>Resumen de Productos
            </h6>
            <div style="max-height: 300px; overflow-y: auto; background: #f8f9fa; padding: 15px; border-radius: 8px;">
              <div id="resumenProductosModal"></div>
            </div>
          </div>

          <!-- Total -->
          <div class="d-flex justify-content-between align-items-center p-3" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-radius: 8px; border-left: 4px solid #042775;">
            <span style="font-size: 18px; font-weight: 700; color: #333;">TOTAL ESTIMADO:</span>
            <span style="font-size: 24px; font-weight: 700; color: #042775;" id="totalModal">S/0.00</span>
          </div>

          <div class="alert alert-info mt-3 d-flex align-items-start" style="border-radius: 8px; border-left: 4px solid #17a2b8; background: #e7f5ff;">
            <i class="bi bi-info-circle-fill me-2 mt-1" style="font-size: 18px;"></i>
            <small>Al hacer clic en "Enviar Cotización", serás redirigido a WhatsApp con un mensaje prellenado. El precio final puede variar según disponibilidad.</small>
          </div>
        </div>
        <div class="modal-footer" style="padding: 20px; border-top: 2px solid #e9ecef;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 8px; padding: 10px 24px;">
            <i class="bi bi-x-circle me-2"></i>Cancelar
          </button>
          <button type="button" class="btn" id="btnEnviarCotizacion" style="background: #25D366; color: white; border: none; border-radius: 8px; padding: 10px 24px; font-weight: 600;">
            <i class="bi bi-whatsapp me-2"></i>Enviar Cotización
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--end modal-->


  <!--start quick view-->

  <!-- Modal -->
  <div class="modal fade" id="QuickViewModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content rounded-0">

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12 col-xl-6">

              <div class="wrap-modal-slider">

                {{-- <div class="slider-for">
                  <div>
                    <img src="{{ asset('ecommerce/assets/images/product-images/01.jpg') }}" alt="" class="img-fluid">
                  </div>
                  <div>
                    <img src="{{ asset('ecommerce/assets/images/product-images/02.jpg') }}" alt="" class="img-fluid">
                  </div>
                  <div>
                    <img src="{{ asset('ecommerce/assets/images/product-images/03.jpg') }}" alt="" class="img-fluid">
                  </div>
                  <div>
                    <img src="{{ asset('ecommerce/assets/images/product-images/04.jpg') }}" alt="" class="img-fluid">
                  </div>
                </div>

                <div class="slider-nav mt-3">
                  <div>
                    <img src="{{ asset('ecommerce/assets/images/product-images/01.jpg') }}" alt="" class="img-fluid">
                  </div>
                  <div>
                    <img src="{{ asset('ecommerce/assets/images/product-images/02.jpg') }}" alt="" class="img-fluid">
                  </div>
                  <div>
                    <img src="{{ asset('ecommerce/assets/images/product-images/03.jpg') }}" alt="" class="img-fluid">
                  </div>
                  <div>
                    <img src="{{ asset('ecommerce/assets/images/product-images/04.jpg') }}" alt="" class="img-fluid">
                  </div>
                </div> --}}

              </div>

            </div>
            <div class="col-12 col-xl-6">
              <div class="product-info">
                <h4 class="product-title fw-bold mb-1">Check Pink Kurta</h4>
                <p class="mb-0">Women Pink & Off-White Printed Kurta with Palazzos</p>
                <div class="product-rating">
                  <div class="hstack gap-2 border p-1 mt-3 width-content">
                    <div><span class="rating-number">4.8</span><i class="bi bi-star-fill ms-1 text-success"></i></div>
                    <div class="vr"></div>
                    <div>162 Ratings</div>
                  </div>
                </div>
                <hr>
                <div class="product-price d-flex align-items-center gap-3">
                  <div class="h4 fw-bold">$458</div>
                  <div class="h5 fw-light text-muted text-decoration-line-through">$2089</div>
                  <div class="h4 fw-bold text-danger">(70% off)</div>
                </div>
                <p class="fw-bold mb-0 mt-1 text-success">inclusive of all taxes</p>

                <div class="more-colors mt-3">
                  <h6 class="fw-bold mb-3">More Colors</h6>
                  <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="color-box bg-red"></div>
                    <div class="color-box bg-primary"></div>
                    <div class="color-box bg-yellow"></div>
                    <div class="color-box bg-purple"></div>
                    <div class="color-box bg-green"></div>
                  </div>
                </div>

                <div class="size-chart mt-3">
                  <h6 class="fw-bold mb-3">Select Size</h6>
                  <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="">
                      <button type="button" class="rounded-0">XS</button>
                    </div>
                    <div class="">
                      <button type="button" class="rounded-0">S</button>
                    </div>
                    <div class="">
                      <button type="button" class="rounded-0">M</button>
                    </div>
                    <div class="">
                      <button type="button" class="rounded-0">L</button>
                    </div>
                    <div class="">
                      <button type="button" class="rounded-0">XL</button>
                    </div>
                    <div class="">
                      <button type="button" class="rounded-0">XXL</button>
                    </div>
                  </div>
                </div>
                <div class="cart-buttons mt-3">
                  <div class="buttons d-flex flex-column gap-3 mt-4">
                    <a href="javascript:;" class="btn btn-lg btn-dark btn-ecomm px-5 py-3 flex-grow-1"><i
                        class="bi bi-basket2 me-2"></i>Add to Bag</a>
                    <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i
                        class="bi bi-suit-heart me-2"></i>Wishlist</a>
                  </div>
                </div>
                <hr class="my-3">
                <div class="product-share">
                  <h6 class="fw-bold mb-3">Share This Product</h6>
                  <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="">
                      <button type="button" class="btn-social bg-twitter"><i class="bi bi-twitter"></i></button>
                    </div>
                    <div class="">
                      <button type="button" class="btn-social bg-facebook"><i class="bi bi-facebook"></i></button>
                    </div>
                    <div class="">
                      <button type="button" class="btn-social bg-linkden"><i class="bi bi-linkedin"></i></button>
                    </div>
                    <div class="">
                      <button type="button" class="btn-social bg-youtube"><i class="bi bi-youtube"></i></button>
                    </div>
                    <div class="">
                      <button type="button" class="btn-social bg-pinterest"><i class="bi bi-pinterest"></i></button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!--end row-->
        </div>

      </div>
    </div>
  </div>
  <!--end quick view-->


  <!--Start Back To Top Button-->
 {{--  <a href="javaScript:;" class="back-to-top" hidden><i class="bi bi-arrow-up"></i></a> --}}
  <!--End Back To Top Button-->

  <!-- Botón flotante de WhatsApp -->
  <a href="https://wa.me/51994119444?text=Hola%20quiero%20más%20información"
    class="whatsapp-float"
    target="_blank"
    rel="noopener"
    aria-label="Chatear por WhatsApp">
    <!-- Ícono SVG de WhatsApp (sin dependencias) -->
    {{-- <svg viewBox="0 0 32 32" aria-hidden="true">
      <path fill="#25D366" d="M16 3C9.37 3 4 8.37 4 15c0 2.54.77 4.9 2.09 6.84L5 29l7.33-1.93C13.96 27.66 14.97 28 16 28c6.63 0 12-5.37 12-12S22.63 3 16 3z"/>
      <path fill="#fff" d="M23.19 19.38c-.34-.17-2.02-.99-2.33-1.1-.31-.11-.54-.17-.77.17-.23.34-.89 1.1-1.09 1.33-.2.23-.4.26-.74.09-.34-.17-1.45-.53-2.77-1.69-1.02-.91-1.71-2.04-1.91-2.38-.2-.34-.02-.52.15-.69.16-.16.34-.4.51-.6.17-.2.23-.34.34-.57.11-.23.06-.43-.03-.6-.09-.17-.77-1.85-1.06-2.53-.28-.68-.56-.59-.77-.6l-.66-.01c-.23 0-.6.09-.91.43-.31.34-1.2 1.17-1.2 2.86 0 1.69 1.23 3.33 1.4 3.56.17.23 2.42 3.7 5.86 5.18.82.35 1.46.56 1.96.72.82.26 1.56.22 2.15.13.66-.1 2.02-.83 2.31-1.63.28-.8.28-1.49.2-1.63-.09-.14-.31-.23-.65-.4z"/>
    </svg> --}}
    <img src="{{ asset('uploads/WhatsApp.png') }}" width="80%" alt="">
  </a>

  <!-- JavaScript files -->
  <script src="{{ asset('ecommerce/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('ecommerce/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('ecommerce/assets/plugins/slick/slick.min.js') }}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="{{ asset('ecommerce/assets/js/main.js') }}"></script>
  <script src="{{ asset('ecommerce/assets/js/index.js') }}"></script>
  <script src="{{ asset('ecommerce/assets/js/loader.js') }}"></script>
  <script>
    AOS.init();
  </script>
  @yield('scripts')
  <script src="{{ asset('ecommerce/assets/js/productos/carrito.js') }}?v={{ time() }}"></script>
</body>



</html>