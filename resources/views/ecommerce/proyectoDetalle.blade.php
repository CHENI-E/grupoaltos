@extends('layouts.ecommerce.app')

@section('styles')
  <link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.carousel.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('ecommerce/assets/css/owl.theme.default.min.css') }}"/>
<style>
  /* ===== DISEÑO PROFESIONAL DETALLE DE PROYECTO ===== */
  
  :root {
    --primary-blue: #042775;
    --secondary-blue: #064ba0;
    --accent-orange: #e75322;
    --dark-gray: #1a1a1a;
    --medium-gray: #64748b;
    --light-gray: #f5f7fa;
    --border-color: #e1e8ed;
    --success-green: #10b981;
  }

  /* Hero Banner Ultra Ligero */
  .hero-banner-detail {
    position: relative;
    height: 70vh;
    min-height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    overflow: hidden;
  }

  .hero-banner-detail video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
  }

  .hero-banner-detail::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(4, 39, 117, 0.88) 0%, rgba(6, 75, 160, 0.82) 50%, rgba(26, 26, 26, 0.75) 100%);
    z-index: 1;
  }

  .hero-content-detail {
    position: relative;
    z-index: 3;
    text-align: center;
    max-width: 800px;
    padding: 30px 20px;
  }

  .project-badge-hero {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(231, 83, 34, 0.15);
    backdrop-filter: blur(10px);
    padding: 8px 18px;
    border-radius: 20px;
    border: 1px solid rgba(231, 83, 34, 0.3);
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 24px;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .project-badge-hero i {
    font-size: 6px;
    color: var(--accent-orange);
  }

  .hero-content-detail h1 {
    font-size: 3.5rem;
    font-weight: 300;
    margin-bottom: 20px;
    text-shadow: 0 4px 30px rgba(0, 0, 0, 0.5), 0 2px 10px rgba(0, 0, 0, 0.3);
    line-height: 1.2;
    letter-spacing: -1px;
    color: #ffffff;
  }

  .hero-content-detail h1 strong {
    font-weight: 700;
    color: #ffffff;
  }

  .hero-description {
    font-size: 1.15rem;
    line-height: 1.7;
    margin-bottom: 35px;
    color: rgba(255, 255, 255, 0.95);
    font-weight: 400;
    max-width: 650px;
    margin-left: auto;
    margin-right: auto;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
  }

  .hero-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
  }

  .btn-hero-primary {
    padding: 13px 32px;
    font-size: 0.95rem;
    font-weight: 600;
    background: var(--accent-orange);
    color: white;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(231, 83, 34, 0.3);
  }

  .btn-hero-primary:hover {
    background: #ff6b3d;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(231, 83, 34, 0.5);
  }

  .btn-hero-secondary {
    padding: 13px 32px;
    font-size: 0.95rem;
    font-weight: 600;
    background: transparent;
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.4);
    border-radius: 8px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
  }

  .btn-hero-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
  }



  /* Breadcrumb Mejorado */
  .breadcrumb-modern {
    background: #fafafa;
    padding: 18px 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.08);
  }

  .breadcrumb-modern nav {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
  }

  .breadcrumb-modern a {
    color: #64748b;
    text-decoration: none;
    transition: color 0.2s ease;
    font-weight: 500;
  }

  .breadcrumb-modern a:hover {
    color: var(--accent-orange);
  }

  .breadcrumb-modern .active {
    color: var(--primary-blue);
    font-weight: 600;
  }

  .breadcrumb-modern span {
    color: #cbd5e1;
  }

  /* Contenido Principal Ligero */
  .project-detail-section {
    padding: 60px 0;
    background: white;
  }

  .content-wrapper {
    background: white;
    padding: 0;
  }

  .section-header {
    margin-bottom: 35px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  }

  .section-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .section-title i {
    color: var(--accent-orange);
    font-size: 1.5rem;
    opacity: 0.9;
  }

  .section-subtitle {
    font-size: 1rem;
    color: #64748b;
    line-height: 1.6;
    font-weight: 400;
  }

  /* Contenido Din\u00e1mico Ligero */
  .project-description {
    font-size: 1.05rem;
    line-height: 1.8;
    color: #374151;
    margin-bottom: 40px;
  }

  .project-description h1,
  .project-description h2,
  .project-description h3 {
    color: #1a1a1a;
    font-weight: 700;
    margin-top: 32px;
    margin-bottom: 18px;
  }

  .project-description h2 {
    font-size: 1.6rem;
    border-left: 4px solid var(--accent-orange);
    padding-left: 18px;
    color: var(--primary-blue);
  }

  .project-description h3 {
    font-size: 1.3rem;
    color: #1a1a1a;
  }

  .project-description p {
    margin-bottom: 18px;
    color: #4b5563;
  }

  .project-description ul,
  .project-description ol {
    margin: 20px 0;
    padding-left: 28px;
  }

  .project-description li {
    margin-bottom: 12px;
    color: #4b5563;
  }

  .project-description strong {
    color: #1a1a1a;
    font-weight: 600;
  }

  .project-description a {
    color: var(--accent-orange);
    text-decoration: underline;
    transition: color 0.2s ease;
  }

  .project-description a:hover {
    color: var(--primary-blue);
  }

  /* Galería Mejorada */
  .gallery-wrapper {
    margin: 45px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 16px;
    padding: 35px;
    border: 1px solid rgba(0, 0, 0, 0.05);
  }

  .gallery-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 28px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .gallery-title i {
    color: var(--accent-orange);
    font-size: 1.3rem;
  }

  .owl-carousel .item {
    border-radius: 12px;
    overflow: hidden;
    background: white;
    padding: 10px;
    border: 1px solid rgba(0, 0, 0, 0.06);
  }

  .owl-carousel .item img {
    border-radius: 8px;
    width: 100%;
    height: auto;
    max-height: 500px;
    object-fit: contain;
  }

  /* Botones del Carousel Mejorados */
  .owl-theme .owl-nav {
    margin-top: 30px;
  }

  .owl-theme .owl-nav button {
    width: 52px;
    height: 52px;
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue)) !important;
    border-radius: 50%;
    font-size: 24px;
    color: white !important;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(4, 39, 117, 0.3);
  }

  .owl-theme .owl-nav button:hover {
    background: linear-gradient(135deg, var(--accent-orange), #ff6b3d) !important;
    transform: scale(1.08);
    box-shadow: 0 6px 18px rgba(231, 83, 34, 0.4);
  }

  .owl-theme .owl-dots .owl-dot span {
    background: #cbd5e1;
    width: 12px;
    height: 12px;
    transition: all 0.3s ease;
  }

  .owl-theme .owl-dots .owl-dot.active span {
    background: var(--accent-orange);
    width: 32px;
    border-radius: 6px;
  }

  .owl-theme .owl-dots .owl-dot:hover span {
    background: #94a3b8;
  }

  /* Feature Boxes Mejoradas */
  .feature-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
  }

  .feature-box i {
    transition: transform 0.3s ease;
  }

  .feature-box:hover i {
    transform: scale(1.1);
  }

  /* Sidebar Mejorado */
  .sidebar-modern {
    position: sticky;
    top: 80px;
  }

  .sidebar-card {
    background: white;
    border-radius: 12px;
    padding: 28px;
    border: 1px solid rgba(0, 0, 0, 0.08);
    margin-bottom: 24px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
  }

  .sidebar-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 18px;
    border-bottom: 2px solid #f1f5f9;
  }

  .sidebar-icon {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-blue);
    font-size: 20px;
  }

  .sidebar-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1a1a1a;
    margin: 0;
  }

  /* Lista de Proyectos Similares Mejorada */
  .similar-projects-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .similar-project-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px;
    background: #f8fafc;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
  }

  .similar-project-item:hover {
    background: white;
    border-color: var(--accent-orange);
    transform: translateX(6px);
    box-shadow: 0 4px 12px rgba(231, 83, 34, 0.15);
  }

  .similar-project-icon {
    width: 42px;
    height: 42px;
    background: linear-gradient(135deg, var(--accent-orange), #ff6b3d);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
    flex-shrink: 0;
  }

  .similar-project-name {
    font-size: 14px;
    font-weight: 600;
    color: #1f2937;
    line-height: 1.4;
    flex: 1;
  }

  .similar-project-arrow {
    color: #94a3b8;
    font-size: 16px;
    transition: all 0.3s ease;
  }

  .similar-project-item:hover .similar-project-arrow {
    transform: translateX(4px);
    color: var(--accent-orange);
  }

  .similar-project-item:hover .similar-project-name {
    color: var(--primary-blue);
  }

  /* CTA Card Mejorado */
  .cta-card {
    background: linear-gradient(135deg, #042775 0%, #064ba0 100%);
    border-radius: 12px;
    padding: 34px;
    text-align: center;
    color: white;
    box-shadow: 0 4px 20px rgba(4, 39, 117, 0.2);
  }

  .cta-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    font-size: 28px;
  }

  .cta-title {
    font-size: 1.35rem;
    font-weight: 700;
    margin-bottom: 14px;
    color: #ffffff;
  }

  .cta-text {
    font-size: 0.95rem;
    margin-bottom: 24px;
    opacity: 0.95;
    line-height: 1.6;
    font-weight: 400;
    color: rgba(255, 255, 255, 0.95);
  }

  .btn-cta {
    padding: 12px 30px;
    background: var(--accent-orange);
    color: white;
    font-weight: 600;
    border-radius: 8px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    font-size: 0.95rem;
    box-shadow: 0 4px 12px rgba(231, 83, 34, 0.3);
  }

  .btn-cta:hover {
    background: #ff6b3d;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(231, 83, 34, 0.4);
  }

  /* Responsive */
  @media (max-width: 991px) {
    .hero-content-detail h1 {
      font-size: 3rem;
    }

    .content-wrapper {
      padding: 35px;
    }

    .sidebar-modern {
      position: relative;
      top: 0;
      margin-top: 40px;
    }
  }

  @media (max-width: 768px) {
    .hero-banner-detail {
      height: 75vh;
      min-height: 500px;
    }

    .hero-content-detail h1 {
      font-size: 2.2rem;
    }

    .hero-description {
      font-size: 1.1rem;
    }

    .hero-actions {
      flex-direction: column;
    }

    .btn-hero-primary,
    .btn-hero-secondary {
      width: 100%;
      justify-content: center;
    }

    .content-wrapper {
      padding: 25px;
      border-radius: 16px;
    }

    .section-title {
      font-size: 2rem;
    }

    .project-description {
      font-size: 1rem;
    }

    .gallery-wrapper {
      padding: 25px;
    }

    .sidebar-card {
      padding: 25px;
    }
  }

  @media (max-width: 576px) {
    .hero-content-detail h1 {
      font-size: 1.8rem;
    }

    .hero-description {
      font-size: 1rem;
    }

    .btn-hero-primary,
    .btn-hero-secondary {
      padding: 14px 30px;
      font-size: 1rem;
    }
  }
</style>
@endsection

@section('content')

{{-- Hero Banner con Video de Fondo Mejorado --}}
<section class="hero-banner-detail">
    <!-- Video de fondo -->
    <video autoplay muted loop playsinline>
      <source src="{{ asset('ecommerce/assets/webvideomontaje.mp4') }}" type="video/mp4">
      Tu navegador no soporta video HTML5.
    </video>

    <!-- Contenido del Hero -->
    <div class="hero-content-detail">
      <div class="project-badge-hero">
        <i class="bi bi-circle-fill"></i>
        <span>Proyecto</span>
      </div>
      
      <h1><strong>{{ $proyecto->nombre }}</strong></h1>
      
      <p class="hero-description">
        Solución profesional desarrollada con estándares de calidad y compromiso 
        para garantizar resultados que superan expectativas.
      </p>

      <div class="hero-actions">
        <a href="https://wa.me/51994119444?text=Hola,%20quiero%20más%20información%20sobre%20el%20proyecto%20{{ urlencode($proyecto->nombre) }}." 
           class="btn-hero-primary" 
           target="_blank">
          <i class="bi bi-whatsapp"></i>
          Contactar
        </a>
        <a href="#detalles" class="btn-hero-secondary">
          <i class="bi bi-arrow-down"></i>
          Ver más
        </a>
      </div>
    </div>
</section>

{{-- Breadcrumb Moderno --}}
<div class="breadcrumb-modern">
    <div class="container">
        <nav aria-label="breadcrumb">
            <a href="/">
                <i class="bi bi-house-door-fill"></i> Inicio
            </a>
            <span>/</span>
            <a href="/proyectos">Proyectos</a>
            <span>/</span>
            <span class="active">{{ $proyecto->nombre }}</span>
        </nav>
    </div>
</div>

<div class="page-content" style="background: #f8f9fa;">

   {{-- Sección de Detalles del Proyecto --}}
   <section class="project-detail-section" id="detalles">
    <div class="container">
       <div class="row g-4">
          
          {{-- Contenido Principal --}}
          <div class="col-12 col-xl-7">
            <div class="content-wrapper">
              
              {{-- Header de Sección --}}
              <div class="section-header">
                <h2 class="section-title">
                  <i class="bi bi-file-text-fill"></i>
                  Descripción del Proyecto
                </h2>
                <p class="section-subtitle">
                  Conoce todos los detalles, especificaciones y características 
                  que hacen de este proyecto una solución única y efectiva.
                </p>
              </div>

              {{-- Contenido Dinámico --}}
              <div class="project-description">
                @php
                    echo $proyecto->descripcion;
                @endphp
              </div>

              {{-- Galería de Imágenes --}}
              <div class="gallery-wrapper">
                <h3 class="gallery-title">
                  <i class="bi bi-images"></i>
                  Galería de Imágenes
                </h3>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{ asset($proyecto->imagen) }}" alt="{{ $proyecto->nombre }}">
                    </div>
                    @if ($proyecto->imagen_detalle)
                        <div class="item">
                            <img src="{{ asset($proyecto->imagen_detalle) }}" alt="{{ $proyecto->nombre }} - Detalle">
                        </div>
                    @endif
                </div>
              </div>

              {{-- Características Destacadas --}}
              <div class="features-grid mt-5">
                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="feature-box" style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); padding: 26px; border-radius: 12px; border-left: 4px solid var(--primary-blue); transition: all 0.3s ease; border: 1px solid rgba(4, 39, 117, 0.1);">
                      <i class="bi bi-shield-check" style="font-size: 36px; color: var(--primary-blue); margin-bottom: 14px; display: block;"></i>
                      <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 10px; font-size: 1.1rem;">Calidad Garantizada</h4>
                      <p style="color: #475569; margin: 0; font-size: 14px; line-height: 1.6;">Certificaciones internacionales y procesos estandarizados</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="feature-box" style="background: linear-gradient(135deg, #fff7ed 0%, #fed7aa 100%); padding: 26px; border-radius: 12px; border-left: 4px solid var(--accent-orange); transition: all 0.3s ease; border: 1px solid rgba(231, 83, 34, 0.1);">
                      <i class="bi bi-clock-history" style="font-size: 36px; color: var(--accent-orange); margin-bottom: 14px; display: block;"></i>
                      <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 10px; font-size: 1.1rem;">Entrega a Tiempo</h4>
                      <p style="color: #475569; margin: 0; font-size: 14px; line-height: 1.6;">Cumplimiento estricto de cronogramas establecidos</p>
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="feature-box" style="background: linear-gradient(135deg, #f0fdf4 0%, #bbf7d0 100%); padding: 26px; border-radius: 12px; border-left: 4px solid var(--success-green); transition: all 0.3s ease; border: 1px solid rgba(16, 185, 129, 0.1);">
                      <i class="bi bi-people-fill" style="font-size: 36px; color: var(--success-green); margin-bottom: 14px; display: block;"></i>
                      <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 10px; font-size: 1.1rem;">Equipo Profesional</h4>
                      <p style="color: #475569; margin: 0; font-size: 14px; line-height: 1.6;">Personal altamente capacitado y con experiencia</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="feature-box" style="background: linear-gradient(135deg, #faf5ff 0%, #e9d5ff 100%); padding: 26px; border-radius: 12px; border-left: 4px solid #8b5cf6; transition: all 0.3s ease; border: 1px solid rgba(139, 92, 246, 0.1);">
                      <i class="bi bi-headset" style="font-size: 36px; color: #8b5cf6; margin-bottom: 14px; display: block;"></i>
                      <h4 style="font-weight: 700; color: #1a1a1a; margin-bottom: 10px; font-size: 1.1rem;">Soporte 24/7</h4>
                      <p style="color: #475569; margin: 0; font-size: 14px; line-height: 1.6;">Atención continua durante todo el proyecto</p>
                    </div>
                  </div> -->
                </div>
              </div>

            </div>
          </div>

          {{-- Sidebar --}}
          <div class="col-12 col-xl-5">
            <div class="sidebar-modern">

              {{-- Card de CTA Principal --}}
              <div class="cta-card">
                <div class="cta-icon">
                  <i class="bi bi-chat-dots-fill"></i>
                </div>
                <h3 class="cta-title">¿Interesado en este proyecto?</h3>
                <p class="cta-text">
                  Contacta con nuestro equipo de expertos para obtener más información 
                  personalizada y una cotización sin compromiso.
                </p>
                <a href="https://wa.me/51994119444?text=Hola,%20me%20interesa%20el%20proyecto%20{{ urlencode($proyecto->nombre) }}." 
                   class="btn-cta" 
                   target="_blank">
                  <i class="bi bi-whatsapp"></i>
                  Escribir por WhatsApp
                </a>
              </div>

              {{-- Proyectos Similares --}}
              <div class="sidebar-card">
                <div class="sidebar-header">
                  <div class="sidebar-icon">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                  </div>
                  <h3 class="sidebar-title">Más Proyectos</h3>
                </div>

                @if ($proyectosSimilares->count())
                  <div class="similar-projects-list">
                    @foreach ($proyectosSimilares as $proyectoSimilar)
                      <a href="{{ route('ecommerce.proyectos.viewdetalle', $proyectoSimilar->slug) }}" 
                         class="similar-project-item">
                        <div class="similar-project-icon">
                          <i class="bi bi-folder-fill"></i>
                        </div>
                        <span class="similar-project-name">{{ $proyectoSimilar->nombre }}</span>
                        <i class="bi bi-arrow-right similar-project-arrow"></i>
                      </a>
                    @endforeach
                  </div>
                @else
                  <div style="text-align: center; padding: 32px 20px; background: #f8fafc; border-radius: 10px; border: 1px dashed #cbd5e1;">
                    <i class="bi bi-inbox" style="font-size: 52px; color: #94a3b8; display: block; margin-bottom: 16px;"></i>
                    <p style="margin: 0; font-weight: 600; color: #475569; font-size: 14px;">No hay más proyectos disponibles en este momento.</p>
                  </div>
                @endif

              </div>

              {{-- Card de Información Adicional --}}
              <div class="sidebar-card">
                <div class="sidebar-header">
                  <div class="sidebar-icon" style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);">
                    <i class="bi bi-info-circle-fill" style="color: var(--accent-orange);"></i>
                  </div>
                  <h3 class="sidebar-title">Información</h3>
                </div>

                <div style="display: flex; flex-direction: column; gap: 16px;">
                  <div style="display: flex; align-items: flex-start; gap: 14px; padding: 12px; background: #f8fafc; border-radius: 8px; border-left: 3px solid var(--primary-blue);">
                    <i class="bi bi-telephone-fill" style="color: var(--primary-blue); font-size: 22px; margin-top: 2px;"></i>
                    <div>
                      <p style="margin: 0; font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Teléfono</p>
                      <p style="margin: 4px 0 0 0; font-weight: 700; color: #1a1a1a; font-size: 15px;">+51 994 119 444</p>
                    </div>
                  </div>
                  
                  <div style="display: flex; align-items: flex-start; gap: 14px; padding: 12px; background: #f8fafc; border-radius: 8px; border-left: 3px solid var(--accent-orange);">
                    <i class="bi bi-envelope-fill" style="color: var(--accent-orange); font-size: 22px; margin-top: 2px;"></i>
                    <div>
                      <p style="margin: 0; font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Email</p>
                      <p style="margin: 4px 0 0 0; font-weight: 700; color: #1a1a1a; font-size: 15px;">ventas@grupoaltos.com.pe</p>
                    </div>
                  </div>
                  
                  <div style="display: flex; align-items: flex-start; gap: 14px; padding: 12px; background: #f8fafc; border-radius: 8px; border-left: 3px solid var(--success-green);">
                    <i class="bi bi-clock-fill" style="color: var(--success-green); font-size: 22px; margin-top: 2px;"></i>
                    <div>
                      <p style="margin: 0; font-size: 12px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Horario</p>
                      <p style="margin: 4px 0 0 0; font-weight: 700; color: #1a1a1a; font-size: 15px;">Lun - Vie: 8:00 - 18:00</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

       </div><!--end row-->
    </div>
   </section>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('ecommerce/assets/js/owl.carousel.min.js') }}"></script>
    <script>
    $(document).ready(function(){
        // ===== CONFIGURACIÓN DEL CAROUSEL MEJORADO =====
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            navText: [
                '<i class="bi bi-chevron-left"></i>',
                '<i class="bi bi-chevron-right"></i>'
            ],
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 800,
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    dots: true
                },
                600: {
                    items: 1,
                    nav: true,
                    dots: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    dots: true
                }
            }
        });

        // ===== SMOOTH SCROLL PARA EL BOTÓN "VER DETALLES" =====
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if(target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
            }
        });

        // ===== ANIMACIÓN DE ENTRADA PARA LAS FEATURE BOXES =====
        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function animateFeatures() {
            $('.feature-box').each(function(index) {
                var $this = $(this);
                if (isElementInViewport(this) && !$this.hasClass('animated')) {
                    setTimeout(function() {
                        $this.addClass('animated');
                        $this.css({
                            'animation': 'fadeInUp 0.6s ease-out forwards',
                            'opacity': '1'
                        });
                    }, index * 150);
                }
            });
        }

        // Inicializar opacidad de feature boxes
        $('.feature-box').css('opacity', '0');

        // Ejecutar animación al cargar y al hacer scroll
        $(window).on('scroll resize', animateFeatures);
        animateFeatures();

        // ===== EFECTO PARALLAX SUAVE EN EL VIDEO =====
        $(window).on('scroll', function() {
            var scrolled = $(window).scrollTop();
            $('.hero-banner-detail video').css('transform', 'translateY(' + (scrolled * 0.4) + 'px)');
        });

        // ===== LAZY LOADING MEJORADO PARA IMÁGENES =====
        $('img').each(function() {
            $(this).on('load', function() {
                $(this).css({
                    'animation': 'fadeIn 0.5s ease-out',
                    'opacity': '1'
                });
            });
        });

        // ===== TOOLTIP PARA BOTONES =====
        $('[data-bs-toggle="tooltip"]').tooltip();

        // ===== SEGUIMIENTO DE INTERACCIÓN DEL USUARIO =====
        var userInteracted = false;
        
        $('.btn-hero-primary, .btn-cta, .similar-project-item').on('click', function() {
            userInteracted = true;
        });

        // ===== ANIMACIÓN DE SCROLL INDICATOR =====
        $('.scroll-indicator').on('click', function() {
            $('html, body').animate({
                scrollTop: $('.breadcrumb-modern').offset().top
            }, 1000);
        });

        // Ocultar scroll indicator al hacer scroll
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 100) {
                $('.scroll-indicator').fadeOut();
            } else {
                $('.scroll-indicator').fadeIn();
            }
        });

        // ===== COPIAR EMAIL AL HACER CLIC =====
        $('p:contains("info@grupoaltos.com")').css('cursor', 'pointer').on('click', function() {
            var email = 'info@grupoaltos.com';
            
            // Crear elemento temporal
            var $temp = $('<input>');
            $('body').append($temp);
            $temp.val(email).select();
            document.execCommand('copy');
            $temp.remove();
            
            // Mostrar feedback visual
            var $this = $(this);
            var originalText = $this.text();
            $this.text('¡Email copiado!').css('color', 'var(--success-green)');
            
            setTimeout(function() {
                $this.text(originalText).css('color', 'var(--dark-gray)');
            }, 2000);
        });

        // ===== PRELOAD DE IMÁGENES DEL CAROUSEL =====
        $('.owl-carousel img').each(function() {
            var img = new Image();
            img.src = $(this).attr('src');
        });

        // ===== ANALYTICS DE INTERACCIÓN =====
        $('.btn-hero-primary, .btn-cta').on('click', function() {
            console.log('Usuario hizo clic en botón de contacto');
            // Aquí puedes agregar tu código de analytics
        });

        $('.similar-project-item').on('click', function() {
            console.log('Usuario navegó a proyecto similar');
            // Aquí puedes agregar tu código de analytics
        });
    });

    // ===== ANIMACIÓN CSS KEYFRAMES =====
    var style = document.createElement('style');
    style.innerHTML = `
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);
    </script>
@endsection