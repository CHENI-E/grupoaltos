@extends('layouts.ecommerce.app')

@section('styles')
  <link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.carousel.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.theme.default.min.css') }}"/>
<style>
    /* ===== DISEÑO PROFESIONAL ENRIQUECIDO - DETALLE DE SERVICIO ===== */

    :root {
        --primary-blue: #042775;
        --secondary-blue: #064ba0;
        --accent-orange: #e75322;
        --vibrant-purple: #764ba2;
        --success-green: #43e97b;
        --light-gray: #f5f7fa;
        --border-color: #e1e8ed;
        --text-primary: #1a1a1a;
        --text-secondary: #6c757d;
    }

    body {
        background: #f8f9fa;
    }

    /* Hero Banner Premium con Video */
    .hero-banner-premium {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        overflow: hidden;
    }

    .hero-banner-premium video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
        opacity: 0.4;
    }

    .hero-banner-premium::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(4, 39, 117, 0.92) 0%, rgba(6, 75, 160, 0.88) 100%);
        z-index: 1;
    }

    .hero-content-premium {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 900px;
        padding: 40px 20px;
    }

    .hero-badge {
        display: inline-block;
        padding: 8px 20px;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 30px;
        color: white;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
        backdrop-filter: blur(10px);
    }

    .hero-content-premium h1 {
        font-family: 'Orbitron', sans-serif;
        font-size: 52px;
        font-weight: 700;
        color: white;
        margin-bottom: 24px;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .hero-btn-group {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .hero-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 16px 36px;
        background: var(--accent-orange);
        color: white;
        font-size: 16px;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 8px 24px rgba(231, 83, 34, 0.4);
    }

    .hero-btn-primary:hover {
        background: #ff6b3d;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(231, 83, 34, 0.5);
    }

    .hero-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 16px 36px;
        background: rgba(255, 255, 255, 0.15);
        color: white;
        font-size: 16px;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        border: 2px solid rgba(255, 255, 255, 0.4);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .hero-btn-secondary:hover {
        background: white;
        color: var(--primary-blue);
        border-color: white;
        transform: translateY(-3px);
    }

    /* Breadcrumb Mejorado */
    .breadcrumb-premium {
        background: white;
        padding: 20px 0;
        border-bottom: 1px solid var(--border-color);
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }

    .breadcrumb-premium .breadcrumb {
        margin-bottom: 0;
        background: transparent;
        padding: 0;
    }

    .breadcrumb-premium .breadcrumb-item a {
        color: var(--text-secondary);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .breadcrumb-premium .breadcrumb-item a:hover {
        color: var(--primary-blue);
    }

    .breadcrumb-premium .breadcrumb-item.active {
        color: var(--text-primary);
        font-weight: 700;
    }

    .breadcrumb-premium .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: var(--text-secondary);
        font-weight: bold;
    }

    /* Contenido Principal */
    .service-detail-premium {
        padding: 60px 0 80px;
    }

    /* Card Base */
    .card-premium {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 40px;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }

    .card-premium:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .card-premium h3 {
        font-family: 'Orbitron', sans-serif;
        font-size: 26px;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 3px solid var(--accent-orange);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-premium h3 i {
        font-size: 28px;
        color: var(--accent-orange);
    }

    /* Tarjetas de Estadísticas */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        border-radius: 16px;
        padding: 28px 24px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M0 40L40 0H20L0 20M40 40V20L20 40'/%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .stat-card:nth-child(2) {
        background: linear-gradient(135deg, #4facfe 0%, #00a8ff 100%);
    }

    .stat-card:nth-child(3) {
        background: linear-gradient(135deg, var(--accent-orange) 0%, #ff6b3d 100%);
    }

    .stat-card:nth-child(4) {
        background: linear-gradient(135deg, #064ba0 0%, #4facfe 100%);
    }

    .stat-card i {
        font-size: 36px;
        margin-bottom: 12px;
        display: block;
        position: relative;
        z-index: 1;
    }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 6px;
        position: relative;
        z-index: 1;
    }

    .stat-label {
        font-size: 14px;
        opacity: 0.95;
        font-weight: 600;
        position: relative;
        z-index: 1;
    }

    /* Lista de Beneficios */
    .benefits-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .benefit-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 20px;
        background: var(--light-gray);
        border-radius: 12px;
        border-left: 4px solid var(--accent-orange);
        transition: all 0.3s ease;
    }

    .benefit-item:hover {
        background: white;
        border-left-color: #4facfe;
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .benefit-icon {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        flex-shrink: 0;
    }

    .benefit-content h4 {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 6px;
    }

    .benefit-content p {
        font-size: 14px;
        color: var(--text-secondary);
        margin: 0;
        line-height: 1.6;
    }

    /* Proceso de Trabajo */
    .process-timeline {
        position: relative;
        padding-left: 30px;
    }

    .process-timeline::before {
        content: "";
        position: absolute;
        left: 21px;
        top: 30px;
        bottom: 30px;
        width: 3px;
        background: linear-gradient(180deg, var(--accent-orange) 0%, var(--primary-blue) 100%);
    }

    .process-step {
        position: relative;
        padding-left: 40px;
        margin-bottom: 32px;
    }

    .process-step::before {
        content: "";
        position: absolute;
        left: 0;
        top: 6px;
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--accent-orange) 0%, #ff6b3d 100%);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(231, 83, 34, 0.3);
        z-index: 1;
    }

    .process-step:nth-child(even)::before {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        box-shadow: 0 4px 12px rgba(4, 39, 117, 0.3);
    }

    .process-number {
        position: absolute;
        left: 14px;
        top: 16px;
        color: white;
        font-weight: 700;
        font-size: 18px;
        z-index: 2;
    }

    .process-content {
        background: white;
        padding: 20px 24px;
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .process-content h4 {
        font-size: 18px;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 8px;
    }

    .process-content p {
        font-size: 14px;
        color: var(--text-secondary);
        margin: 0;
        line-height: 1.6;
    }

    /* Galería Mejorada */
    .gallery-premium .owl-carousel .item {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .gallery-premium .owl-carousel .item img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.4s ease;
    }

    .gallery-premium .owl-carousel .item:hover img {
        transform: scale(1.05);
    }

    /* Carousel Navigation Mejorado */
    .owl-carousel .owl-nav button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: white !important;
        color: var(--primary-blue) !important;
        width: 50px;
        height: 50px;
        border-radius: 12px;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .owl-carousel .owl-nav button:hover {
        background: var(--accent-orange) !important;
        color: white !important;
        box-shadow: 0 6px 16px rgba(231, 83, 34, 0.3);
    }

    .owl-carousel .owl-nav .owl-prev {
        left: -25px;
    }

    .owl-carousel .owl-nav .owl-next {
        right: -25px;
    }

    /* Sidebar Premium */
    .sidebar-premium {
        position: sticky;
        top: 100px;
    }

    /* Servicios Relacionados Mejorados */
    .related-services-premium {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 32px 28px;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .related-services-premium h5 {
        font-family: 'Orbitron', sans-serif;
        font-size: 22px;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 3px solid var(--accent-orange);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .related-services-premium h5 i {
        color: var(--accent-orange);
    }

    .service-link-premium {
        display: flex;
        align-items: center;
        padding: 16px;
        margin-bottom: 12px;
        background: var(--light-gray);
        border: 1px solid transparent;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .service-link-premium::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--accent-orange);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }

    .service-link-premium:hover::before {
        transform: scaleY(1);
    }

    .service-link-premium:hover {
        background: white;
        border-color: var(--primary-blue);
        transform: translateX(6px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .service-link-premium i {
        font-size: 22px;
        color: var(--accent-orange);
        margin-right: 14px;
        transition: transform 0.3s ease;
    }

    .service-link-premium:hover i {
        transform: rotate(20deg);
    }

    .service-link-premium span {
        color: var(--text-primary);
        font-weight: 700;
        font-size: 15px;
        flex: 1;
    }

    .service-link-premium:hover span {
        color: var(--primary-blue);
    }

    /* CTA Card Principal */
    .cta-card-info {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        border-radius: 16px;
        padding: 36px 28px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-card-info::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .cta-card-info i {
        font-size: 56px;
        color: white;
        margin-bottom: 16px;
        position: relative;
        z-index: 1;
    }

    .cta-card-info h4 {
        color: white;
        font-family: 'Orbitron', sans-serif;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 12px;
        position: relative;
        z-index: 1;
    }

    .cta-card-info p {
        color: rgba(255, 255, 255, 0.95);
        font-size: 15px;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .cta-card-info .btn {
        background: var(--accent-orange);
        color: white;
        border: none;
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
        box-shadow: 0 4px 12px rgba(231, 83, 34, 0.3);
    }

    .cta-card-info .btn:hover {
        background: #ff6b3d;
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(231, 83, 34, 0.4);
    }

    /* Estado Vacío */
    .no-services-premium {
        text-align: center;
        padding: 40px;
        color: var(--text-secondary);
    }

    .no-services-premium i {
        font-size: 48px;
        color: var(--border-color);
        margin-bottom: 12px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .sidebar-premium {
            position: relative;
            top: 0;
            margin-top: 40px;
        }

        .hero-content-premium h1 {
            font-size: 40px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero-banner-premium {
            height: 400px;
        }

        .hero-content-premium h1 {
            font-size: 36px;
        }

        .service-detail-premium {
            padding: 40px 0 60px;
        }

        .card-premium {
            padding: 28px 20px;
        }

        .card-premium h3 {
            font-size: 22px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .benefits-list {
            grid-template-columns: 1fr;
        }

        .hero-btn-group {
            flex-direction: column;
        }

        .hero-btn-primary,
        .hero-btn-secondary {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .hero-content-premium h1 {
            font-size: 32px;
        }

        .hero-btn-primary,
        .hero-btn-secondary {
            padding: 14px 28px;
            font-size: 14px;
        }
    }
</style>
@endsection

@section('content')

{{-- Hero Banner Premium --}}
<section class="hero-banner-premium">
    <video autoplay muted loop playsinline>
        <source src="{{ asset('ecommerce/assets/webvideomontaje.mp4') }}" type="video/mp4">
        Tu navegador no soporta video HTML5.
    </video>

    <div class="hero-content-premium">
        <span class="hero-badge">Servicio Profesional</span>
        <h1>{{ $servicio->nombre }}</h1>
        <p class="hero-subtitle">Soluciones empresariales de alta calidad respaldadas por 20 años de experiencia</p>
        <div class="hero-btn-group">
            <a href="https://wa.me/51994119444?text=Hola,%20quiero%20más%20información%20sobre%20su%20servicio%20de%20{{ urlencode($servicio->nombre) }}." 
               class="hero-btn-primary" 
               target="_blank">
                <i class="bi bi-whatsapp"></i>
                Contactar Ahora
            </a>
        </div>
    </div>
</section>

{{-- Breadcrumb --}}
<div class="breadcrumb-premium">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('ecommerce.inicio') }}">
                        <i class="bi bi-house-door"></i> Inicio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('ecommerce.servicio') }}">Servicios</a>
                </li>
                <li class="breadcrumb-item active">{{ $servicio->nombre }}</li>
            </ol>
        </nav>
    </div>
</div>

{{-- Contenido Principal --}}
<section class="service-detail-premium" id="detalles">
    <div class="container">
        <div class="row g-4">
            {{-- Columna Principal --}}
            <div class="col-12 col-xl-8">
                
                {{-- Estadísticas Rápidas --}}
                <div class="stats-grid" data-aos="fade-up">
                    <div class="stat-card">
                        <i class="bi bi-award"></i>
                        <div class="stat-number">20+</div>
                        <div class="stat-label">Años de Experiencia</div>
                    </div>
                    <div class="stat-card">
                        <i class="bi bi-people"></i>
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Clientes Satisfechos</div>
                    </div>
                    <div class="stat-card">
                        <i class="bi bi-star-fill"></i>
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                    <div class="stat-card">
                        <i class="bi bi-clock-history"></i>
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Soporte</div>
                    </div>
                </div>

                {{-- Descripción --}}
                <div class="card-premium" data-aos="fade-up">
                    <h3>
                        <i class="bi bi-file-text"></i>
                        Descripción del Servicio
                    </h3>
                    <div>
                        @php
                            echo $servicio->descripcion;
                        @endphp
                    </div>
                </div>


                {{-- Galería --}}
                <div class="card-premium gallery-premium" data-aos="fade-up" data-aos-delay="300">
                    <h3>
                        <i class="bi bi-images"></i>
                        Galería de Imágenes
                    </h3>
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset($servicio->imagen) }}" class="img-fluid" alt="{{ $servicio->nombre }}">
                        </div>
                        @if ($servicio->imagen_detalle)
                            <div class="item">
                                <img src="{{ asset($servicio->imagen_detalle) }}" class="img-fluid" alt="{{ $servicio->nombre }} - Detalle">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-12 col-xl-4">
                <div class="sidebar-premium">
                    
                    {{-- Servicios Relacionados --}}
                    <div class="related-services-premium" >
                        <h5>
                            <i class="bi bi-grid"></i>
                            Más Servicios
                        </h5>

                        @if ($serviciosSimilares->count())
                            @foreach ($serviciosSimilares->take(5) as $servicioSimilar)
                                <a href="{{ route('ecommerce.servicio.viewdetalle', $servicioSimilar->slug) }}" 
                                   class="service-link-premium">
                                    <i class="bi bi-gear-fill"></i>
                                    <span>{{ $servicioSimilar->nombre }}</span>
                                </a>
                            @endforeach
                        @else
                            <div class="no-services-premium">
                                <i class="bi bi-inbox d-block"></i>
                                <p>No hay más servicios disponibles.</p>
                            </div>
                        @endif
                    </div>

                    {{-- CTA Información --}}
                    <div class="cta-card-info">
                        <i class="bi bi-file-earmark-text d-block"></i>
                        <h4>Solicita una Cotización</h4>
                        <p>Recibe una propuesta personalizada sin compromiso</p>
                        <a href="https://wa.me/51994119444?text=Hola,%20quiero%20solicitar%20una%20cotización%20para%20el%20servicio%20de%20{{ urlencode($servicio->nombre) }}." 
                           class="btn" 
                           target="_blank">
                            Solicitar Ahora
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('ecommerce/assets/js/owl.carousel.min.js') }}"></script>
    <script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
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

        // Smooth scroll para el botón "Ver Detalles"
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
            }
        });
    });
    </script>
@endsection
