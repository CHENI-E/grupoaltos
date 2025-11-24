@extends('layouts.ecommerce.app')

@section('content')
<style>
  /* ===== DISEÑO PROFESIONAL PROYECTOS - ESTILO MODERNO ===== */
  
  :root {
    --primary-blue: #042775;
    --secondary-blue: #064ba0;
    --accent-orange: #e75322;
    --dark-gray: #1a1a1a;
    --medium-gray: #64748b;
    --light-gray: #f5f7fa;
    --border-color: #e1e8ed;
    --success-green: #10b981;
    --warning-yellow: #f59e0b;
  }

  body {
    background: #ffffff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* Sección de Proyectos con Fondo Sutil */
  .page-content {
    background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 50%, #ffffff 100%);
  }

  /* Hero Section Ultra Ligero */
  .projects-hero {
    background: #ffffff;
    padding: 100px 0 60px;
    position: relative;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  }

  .hero-content-projects {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: transparent;
    padding: 0;
    color: var(--accent-orange);
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .hero-badge i {
    font-size: 14px;
  }

  .hero-title-projects {
    font-size: 56px;
    font-weight: 300;
    color: var(--dark-gray);
    margin-bottom: 20px;
    line-height: 1.2;
    letter-spacing: -1.5px;
  }

  .hero-title-projects strong {
    font-weight: 700;
    color: var(--primary-blue);
  }

  .hero-subtitle-projects {
    font-size: 18px;
    color: var(--medium-gray);
    line-height: 1.6;
    margin-bottom: 45px;
    font-weight: 400;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
  }

  /* Buscador Ultra Ligero */
  .search-wrapper-projects {
    max-width: 650px;
    margin: 0 auto;
  }

  .search-box-projects {
    position: relative;
    background: #fafafa;
    border: 1px solid rgba(0, 0, 0, 0.08);
    border-radius: 50px;
    overflow: hidden;
    transition: all 0.3s ease;
  }

  .search-box-projects:focus-within {
    background: white;
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 3px rgba(4, 39, 117, 0.05);
  }

  .search-input-projects {
    width: 100%;
    border: none;
    padding: 16px 60px 16px 50px;
    font-size: 15px;
    outline: none;
    color: var(--dark-gray);
    background: transparent;
    font-weight: 400;
  }

  .search-input-projects::placeholder {
    color: #adb5bd;
    font-weight: 300;
  }

  .search-icon-left {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--medium-gray);
    font-size: 18px;
  }

  .search-clear-btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: none;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    color: var(--medium-gray);
  }

  .search-clear-btn:hover {
    background: rgba(0, 0, 0, 0.05);
    color: var(--dark-gray);
  }

  .search-clear-btn.active {
    display: flex;
  }

  /* Estadísticas Ultra Ligeras */
  .projects-stats {
    background: transparent;
    padding: 50px 0;
    margin: 0 auto;
    max-width: 900px;
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 50px;
  }

  .stat-item {
    text-align: center;
    padding: 0;
    position: relative;
  }

  .stat-item:not(:last-child)::after {
    content: "";
    position: absolute;
    right: -25px;
    top: 50%;
    transform: translateY(-50%);
    width: 1px;
    height: 40px;
    background: rgba(0, 0, 0, 0.08);
  }

  .stat-icon {
    width: 48px;
    height: 48px;
    background: transparent;
    border: 2px solid rgba(4, 39, 117, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 14px;
    color: var(--primary-blue);
    font-size: 20px;
    transition: all 0.3s ease;
  }

  .stat-item:hover .stat-icon {
    border-color: var(--primary-blue);
    transform: scale(1.1);
  }

  .stat-item:nth-child(2) .stat-icon {
    border-color: rgba(231, 83, 34, 0.1);
    color: var(--accent-orange);
  }

  .stat-item:nth-child(2):hover .stat-icon {
    border-color: var(--accent-orange);
  }

  .stat-item:nth-child(3) .stat-icon {
    border-color: rgba(16, 185, 129, 0.1);
    color: var(--success-green);
  }

  .stat-item:nth-child(3):hover .stat-icon {
    border-color: var(--success-green);
  }

  .stat-number {
    font-size: 32px;
    font-weight: 300;
    color: var(--dark-gray);
    margin-bottom: 6px;
    line-height: 1;
  }

  .stat-label {
    font-size: 12px;
    color: var(--medium-gray);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1.5px;
  }

  /* Sección de Proyectos */
  .projects-section {
    padding: 0 0 80px;
  }

  /* Cards Ultra Ligeras */
  .project-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(0, 0, 0, 0.06);
    position: relative;
  }

  .project-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
    border-color: rgba(4, 39, 117, 0.2);
  }

  /* Imagen Ultra Ligera */
  .project-image-wrapper {
    position: relative;
    height: 260px;
    overflow: hidden;
    background: #fafafa;
  }

  .project-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.6s ease, opacity 0.3s ease;
  }

  .project-card:hover .project-image-wrapper img {
    transform: scale(1.05);
    opacity: 0.95;
  }

  /* Badge Discreto */
  .project-status-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    padding: 4px 10px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    font-size: 9px;
    font-weight: 600;
    color: var(--success-green);
    text-transform: uppercase;
    letter-spacing: 1.2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    z-index: 2;
  }

  /* Contenido Ligero */
  .project-content {
    padding: 24px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  /* Título Ligero */
  .project-title {
    font-size: 17px;
    font-weight: 500;
    color: var(--dark-gray);
    margin-bottom: 16px;
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 51px;
    transition: color 0.3s ease;
  }

  .project-card:hover .project-title {
    color: var(--primary-blue);
  }

  /* Descripción (si la tienes en tu modelo) */
  .project-description {
    font-size: 14px;
    color: var(--medium-gray);
    line-height: 1.6;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    flex: 1;
  }

  /* Footer Ultra Ligero */
  .project-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
    margin-top: auto;
  }

  .project-meta {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .project-icon-badge {
    width: 36px;
    height: 36px;
    background: #fafafa;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-blue);
    font-size: 16px;
  }

  .project-company {
    display: flex;
    flex-direction: column;
  }

  .company-label {
    font-size: 10px;
    color: var(--medium-gray);
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
  }

  .company-name {
    font-size: 13px;
    color: var(--dark-gray);
    font-weight: 600;
  }

  /* Botón Ultra Ligero */
  .project-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    background: transparent;
    color: var(--primary-blue);
    text-decoration: none;
    border-radius: 6px;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.2s ease;
    border: 1px solid rgba(4, 39, 117, 0.15);
  }

  .project-btn:hover {
    background: var(--primary-blue);
    color: white;
    border-color: var(--primary-blue);
  }

  .project-btn i {
    font-size: 13px;
    transition: transform 0.2s ease;
  }

  .project-btn:hover i {
    transform: translateX(3px);
  }

  /* Estado Vacío Minimalista */
  .empty-state-projects {
    text-align: center;
    padding: 120px 20px;
  }

  .empty-icon {
    width: 100px;
    height: 100px;
    background: var(--light-gray);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
  }

  .empty-icon i {
    font-size: 48px;
    color: var(--medium-gray);
    opacity: 0.6;
  }

  .empty-state-projects h3 {
    font-size: 24px;
    font-weight: 800;
    color: var(--dark-gray);
    margin-bottom: 10px;
  }

  .empty-state-projects p {
    font-size: 15px;
    color: var(--medium-gray);
    max-width: 450px;
    margin: 0 auto;
    line-height: 1.6;
  }

  /* Animaciones Suaves y Profesionales */
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

  .project-item {
    animation: fadeInUp 0.5s ease-out;
    animation-fill-mode: both;
  }

  .project-item:nth-child(1) { animation-delay: 0.05s; }
  .project-item:nth-child(2) { animation-delay: 0.1s; }
  .project-item:nth-child(3) { animation-delay: 0.15s; }
  .project-item:nth-child(4) { animation-delay: 0.2s; }
  .project-item:nth-child(5) { animation-delay: 0.25s; }
  .project-item:nth-child(6) { animation-delay: 0.3s; }
  .project-item:nth-child(7) { animation-delay: 0.35s; }
  .project-item:nth-child(8) { animation-delay: 0.4s; }

  /* Transiciones Globales Suaves */
  * {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  /* Responsive Optimizado */
  @media (max-width: 1199px) {
    .hero-title-projects {
      font-size: 52px;
    }
    
    .stats-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media (max-width: 991px) {
    .projects-hero {
      padding: 90px 0 70px;
    }

    .hero-title-projects {
      font-size: 46px;
    }

    .project-image-wrapper {
      height: 240px;
    }
  }

  @media (max-width: 768px) {
    .projects-hero {
      padding: 70px 0 50px;
    }

    .hero-title-projects {
      font-size: 40px;
      letter-spacing: -1px;
    }

    .hero-subtitle-projects {
      font-size: 17px;
    }

    .projects-stats {
      margin: -35px 15px 50px;
      padding: 30px 25px;
    }

    .stats-grid {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .stat-item:not(:last-child)::after {
      display: none;
    }

    .stat-item {
      padding-bottom: 25px;
      border-bottom: 1px solid var(--border-color);
    }

    .stat-item:last-child {
      padding-bottom: 0;
      border-bottom: none;
    }

    .project-footer {
      flex-direction: column;
      gap: 15px;
      align-items: stretch;
    }

    .project-btn {
      width: 100%;
      justify-content: center;
    }
  }

  @media (max-width: 576px) {
    .hero-title-projects {
      font-size: 34px;
    }

    .hero-subtitle-projects {
      font-size: 16px;
    }

    .hero-badge {
      font-size: 11px;
      padding: 8px 18px;
    }

    .search-input-projects {
      padding: 16px 55px 16px 50px;
      font-size: 15px;
    }

    .projects-stats {
      padding: 25px 20px;
      margin: -30px 10px 40px;
    }

    .project-content {
      padding: 20px;
    }

    .project-title {
      font-size: 17px;
      min-height: 48px;
    }

    .stat-number {
      font-size: 32px;
    }
  }
</style>

    <!--start page content-->
<div class="page-content">

    {{-- Banner Carousel --}}
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @forelse ($banners as $index => $banner)
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
                    {{-- Fallback banner --}}
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

    {{-- Hero Section Ultra Ligero --}}
    <section class="projects-hero">
        <div class="container">
            <div class="hero-content-projects">
                <div class="hero-badge">
                    <i class="bi bi-circle-fill" style="font-size: 6px;"></i>
                    <span>Portfolio</span>
                </div>
                <h1 class="hero-title-projects">Nuestros <strong>Proyectos</strong></h1>
                <p class="hero-subtitle-projects">
                    Transformando ideas en resultados excepcionales
                </p>
                
                {{-- Buscador Profesional --}}
                <div class="search-wrapper-projects">
                    <div class="search-box-projects">
                        <i class="bi bi-search search-icon-left"></i>
                        <input 
                            type="text" 
                            class="search-input-projects" 
                            id="searchProjects" 
                            placeholder="Buscar proyectos por nombre..."
                            autocomplete="off"
                        >
                        <button class="search-clear-btn" id="clearSearch">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Estadísticas de Proyectos --}}
    <div class="container">
        <div class="projects-stats">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-folder-check"></i>
                    </div>
                    <div class="stat-number" id="totalProjects">{{ $proyectos->count() }}</div>
                    <div class="stat-label">Proyectos Totales</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <div class="stat-number" id="visibleProjects">{{ $proyectos->count() }}</div>
                    <div class="stat-label">Mostrando</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div class="stat-number">20+</div>
                    <div class="stat-label">Años Experiencia</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sección de Proyectos --}}
    <section class="projects-section">
        <div class="container">
            <div class="row g-4" id="projectsGrid">

                @if ($proyectos->isEmpty())
                    <div class="col-12">
                        <div class="empty-state-projects">
                            <div class="empty-icon">
                                <i class="bi bi-inbox"></i>
                            </div>
                            <h3>No hay proyectos disponibles</h3>
                            <p>En este momento no contamos con proyectos para mostrar. Vuelve pronto para ver nuestros últimos trabajos.</p>
                        </div>
                    </div>
                @else
                    @foreach ($proyectos as $index => $item)
                        <div class="col-lg-3 col-md-6 col-sm-12 project-item"
                             data-project-name="{{ strtolower($item->nombre) }}">
                            <div class="project-card">
                                {{-- Imagen del Proyecto --}}
                                <div class="project-image-wrapper">
                                    <img src="{{ asset($item->imagen) }}" alt="{{ $item->nombre }}" loading="lazy">
                                </div>

                                {{-- Contenido del Card --}}
                                <div class="project-content">
                                    <h3 class="project-title">{{ $item->nombre }}</h3>
                                    
                                    {{-- Footer --}}
                                    <div class="project-footer">
                                        <div class="project-meta">
                                            <div class="project-icon-badge">
                                                <i class="bi bi-folder2"></i>
                                            </div>
                                            <div class="project-company">
                                                <span class="company-label">Proyecto</span>
                                                <span class="company-name">Grupo Altos</span>
                                            </div>
                                        </div>
                                        <a href="/proyectos/{{ $item->slug }}" class="project-btn">
                                            Ver más
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                    
            </div>

            {{-- Mensaje cuando no hay resultados de búsqueda --}}
            <div class="col-12 d-none" id="noResults">
                <div class="empty-state-projects">
                    <div class="empty-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3>No se encontraron proyectos</h3>
                    <p>Intenta con otros términos de búsqueda o haz clic en el botón (×) para limpiar la búsqueda</p>
                </div>
            </div>

        </div>
    </section>

</div>
  <!--end page content-->

@endsection

@section('scripts')

<script>
  // ===== ACTUALIZACIÓN DE IMÁGENES DEL BANNER =====
  $(document).ready(function() {
      function updateBannerImages() {
          const isMobile = $(window).width() <= 768;

          $('#carouselExampleControls .carousel-item img').each(function() {
              const desktop = $(this).data('desktop');
              const mobile = $(this).data('mobile');
              $(this).attr('src', isMobile ? mobile : desktop);
          });
      }

      updateBannerImages();
      $(window).on('resize', function() {
          updateBannerImages();
      });
  });

  // ===== SISTEMA DE BÚSQUEDA DE PROYECTOS =====
  document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('searchProjects');
      const clearBtn = document.getElementById('clearSearch');
      const projectItems = document.querySelectorAll('.project-item');
      const noResults = document.getElementById('noResults');
      const visibleCounter = document.getElementById('visibleProjects');
      const totalCounter = document.getElementById('totalProjects');
      
      // Total de proyectos
      const totalProjects = projectItems.length;
      if (totalCounter) {
          totalCounter.textContent = totalProjects;
      }

      // Función de filtrado
      function filterProjects() {
          const searchTerm = searchInput.value.toLowerCase().trim();
          let visibleCount = 0;

          // Mostrar/ocultar botón de limpiar
          if (searchTerm === '') {
              clearBtn.classList.remove('active');
          } else {
              clearBtn.classList.add('active');
          }

          // Si no hay búsqueda, mostrar todos
          if (searchTerm === '') {
              projectItems.forEach(item => {
                  item.style.display = 'block';
              });
              if (visibleCounter) {
                  visibleCounter.textContent = totalProjects;
              }
              if (noResults) {
                  noResults.classList.add('d-none');
              }
              return;
          }

          // Filtrar proyectos
          projectItems.forEach(item => {
              const projectName = item.getAttribute('data-project-name');
              
              if (projectName.includes(searchTerm)) {
                  item.style.display = 'block';
                  visibleCount++;
              } else {
                  item.style.display = 'none';
              }
          });

          // Actualizar contador
          if (visibleCounter) {
              visibleCounter.textContent = visibleCount;
          }

          // Mostrar/ocultar mensaje de no resultados
          if (visibleCount === 0 && totalProjects > 0) {
              if (noResults) {
                  noResults.classList.remove('d-none');
              }
          } else {
              if (noResults) {
                  noResults.classList.add('d-none');
              }
          }
      }

      // Event listeners
      if (searchInput) {
          // Búsqueda en tiempo real
          searchInput.addEventListener('input', filterProjects);

          // Limpiar con tecla Escape
          searchInput.addEventListener('keydown', function(e) {
              if (e.key === 'Escape') {
                  this.value = '';
                  filterProjects();
                  this.blur();
              }
          });
      }

      // Botón de limpiar
      if (clearBtn) {
          clearBtn.addEventListener('click', function() {
              searchInput.value = '';
              filterProjects();
              searchInput.focus();
          });
      }
  });

  // ===== SMOOTH SCROLL PARA RESULTADOS =====
  document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('searchProjects');
      if (searchInput) {
          searchInput.addEventListener('focus', function() {
              setTimeout(() => {
                  const projectsSection = document.querySelector('.projects-section');
                  if (projectsSection) {
                      projectsSection.scrollIntoView({ 
                          behavior: 'smooth', 
                          block: 'start' 
                      });
                  }
              }, 300);
          });
      }
  });
</script>

@endsection