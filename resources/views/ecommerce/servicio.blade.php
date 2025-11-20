@extends('layouts.ecommerce.app')

@section('content')
<style>
  /* ===== DISEÑO VIBRANTE Y COLORIDO - ESTILO BLOG ===== */
  
  :root {
    --primary-blue: #042775;
    --secondary-blue: #064ba0;
    --accent-orange: #e75322;
    --vibrant-purple: #764ba2;
    --vibrant-pink: #ff6b35;
    --light-gray: #f5f7fa;
    --border-color: #e1e8ed;
    --text-primary: #1a1a1a;
    --text-secondary: #64748b;
  }

  body {
    background: #f8f9fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  /* Hero Section Corporativo */
  .services-hero-vibrant {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    padding: 80px 0 60px;
    position: relative;
    overflow: hidden;
  }

  .services-hero-vibrant::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  }

  .hero-content-vibrant {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 1;
  }

  .hero-title-vibrant {
    font-size: 52px;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  }

  .hero-subtitle-vibrant {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.95);
    line-height: 1.6;
    margin-bottom: 40px;
    font-weight: 400;
  }

  /* Barra de Búsqueda Profesional */
  .search-container-vibrant {
    max-width: 600px;
    margin: 0 auto;
  }

  .search-box-vibrant {
    position: relative;
    background: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    transition: all 0.3s ease;
  }

  .search-box-vibrant:focus-within {
    border-color: white;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
  }

  .search-input-vibrant {
    width: 100%;
    border: none;
    padding: 16px 60px 16px 50px;
    font-size: 15px;
    outline: none;
    color: var(--text-primary);
    background: transparent;
  }

  .search-input-vibrant::placeholder {
    color: #adb5bd;
  }

  .search-icon-vibrant {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #adb5bd;
    font-size: 20px;
  }

  /* Contador Vibrant */
  .services-counter-vibrant {
    text-align: center;
    padding: 40px 0 20px;
    color: var(--text-secondary);
    font-size: 16px;
    font-weight: 600;
  }

  .services-counter-vibrant strong {
    color: var(--accent-orange);
    font-size: 20px;
  }

  /* Sección de Servicios */
  .services-section-vibrant {
    padding: 40px 0 80px;
  }

  /* Cards Estilo Blog - Vibrantes */
  .service-card-vibrant {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
  }

  .service-card-vibrant:nth-child(1) { animation-delay: 0.1s; }
  .service-card-vibrant:nth-child(2) { animation-delay: 0.2s; }
  .service-card-vibrant:nth-child(3) { animation-delay: 0.3s; }
  .service-card-vibrant:nth-child(4) { animation-delay: 0.4s; }
  .service-card-vibrant:nth-child(5) { animation-delay: 0.5s; }
  .service-card-vibrant:nth-child(6) { animation-delay: 0.6s; }
  .service-card-vibrant:nth-child(7) { animation-delay: 0.7s; }
  .service-card-vibrant:nth-child(8) { animation-delay: 0.8s; }

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

  .service-card-vibrant:hover {
    transform: translateY(-12px);
    box-shadow: 0 16px 32px rgba(0, 0, 0, 0.15);
  }

  /* Contenedor de Imagen con Colores Corporativos */
  .service-image-vibrant {
    position: relative;
    height: 240px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 30px;
  }

  .service-item:nth-child(8n+1) .service-image-vibrant {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
  }

  .service-item:nth-child(8n+2) .service-image-vibrant {
    background: linear-gradient(135deg, #4facfe 0%, #00a8ff 100%);
  }

  .service-item:nth-child(8n+3) .service-image-vibrant {
    background: linear-gradient(135deg, var(--accent-orange) 0%, #ff6b3d 100%);
  }

  .service-item:nth-child(8n+4) .service-image-vibrant {
    background: linear-gradient(135deg, #064ba0 0%, #4facfe 100%);
  }

  .service-item:nth-child(8n+5) .service-image-vibrant {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
  }

  .service-item:nth-child(8n+6) .service-image-vibrant {
    background: linear-gradient(135deg, #4facfe 0%, #00a8ff 100%);
  }

  .service-item:nth-child(8n+7) .service-image-vibrant {
    background: linear-gradient(135deg, var(--accent-orange) 0%, #ff6b3d 100%);
  }

  .service-item:nth-child(8n+8) .service-image-vibrant {
    background: linear-gradient(135deg, #064ba0 0%, #4facfe 100%);
  }

  .service-image-vibrant img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.5s ease;
    filter: brightness(1.1) drop-shadow(0 5px 15px rgba(0,0,0,0.2));
  }

  .service-card-vibrant:hover .service-image-vibrant img {
    transform: scale(1.15) rotate(2deg);
  }

  /* Badge Destacado */
  .service-badge-vibrant {
    position: absolute;
    top: 15px;
    left: 15px;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    color: white;
    background: var(--accent-orange);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    box-shadow: 0 2px 8px rgba(231, 83, 34, 0.4);
    z-index: 2;
  }

  /* Contenido del Card */
  .service-content-vibrant {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  /* Icono Destacado */
  .service-icon-highlight {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--primary-blue);
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
  }

  .service-icon-highlight i {
    font-size: 14px;
    color: var(--accent-orange);
  }

  .service-title-vibrant {
    font-size: 20px;
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 15px;
    line-height: 1.4;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 56px;
  }

  .service-card-vibrant:hover .service-title-vibrant {
    color: #2563eb;
  }

  /* Footer del Card */
  .service-footer-vibrant {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 15px;
    border-top: 1px solid #f1f5f9;
    margin-top: auto;
  }

  .service-author-group {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .service-author-icon {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 14px;
    font-weight: 700;
  }

  .service-author-label {
    font-weight: 600;
    color: #1a1a1a;
    font-size: 14px;
  }

  .service-btn-vibrant {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 18px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    color: white;
    text-decoration: none;
    border-radius: 20px;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(4, 39, 117, 0.2);
  }

  .service-btn-vibrant:hover {
    background: linear-gradient(135deg, var(--accent-orange) 0%, #ff6b3d 100%);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(231, 83, 34, 0.3);
  }

  .service-btn-vibrant i {
    font-size: 14px;
  }

  /* Estado Vacío */
  .empty-state-vibrant {
    text-align: center;
    padding: 80px 20px;
  }

  .empty-state-vibrant i {
    font-size: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
  }

  .empty-state-vibrant h3 {
    font-size: 28px;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 12px;
  }

  .empty-state-vibrant p {
    font-size: 16px;
    color: var(--text-secondary);
  }

  /* Paginación Moderna y Profesional */
  .pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 50px;
  }

  .pagination {
    display: flex;
    gap: 8px;
    list-style: none;
    padding: 0;
    margin: 0;
    flex-wrap: wrap;
    align-items: center;
  }

  .pagination .page-item {
    display: inline-block;
  }

  .pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 42px;
    height: 42px;
    padding: 0;
    background: white;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    color: var(--text-primary);
    font-weight: 700;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    line-height: 1;
  }

  /* Estilos especiales para flechas */
  .pagination .page-link svg,
  .pagination .page-link i {
    font-size: 16px;
    line-height: 1;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .pagination .page-link:hover {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    color: white;
    border-color: var(--primary-blue);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(4, 39, 117, 0.3);
  }

  .pagination .page-item.active .page-link {
    background: linear-gradient(135deg, var(--accent-orange) 0%, #ff6b3d 100%);
    color: white;
    border-color: var(--accent-orange);
    box-shadow: 0 4px 12px rgba(231, 83, 34, 0.3);
  }

  .pagination .page-item.disabled .page-link {
    opacity: 0.4;
    cursor: not-allowed;
    transform: none;
    background: #f8f9fa;
  }

  .pagination .page-item.disabled .page-link:hover {
    background: #f8f9fa;
    color: var(--text-primary);
    border-color: #e0e0e0;
    transform: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
  }

  /* Asegurar que las flechas de Laravel estén centradas */
  .pagination .page-link span {
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .hero-title-vibrant {
      font-size: 36px;
    }

    .hero-subtitle-vibrant {
      font-size: 16px;
    }

    .services-hero-vibrant {
      padding: 60px 0 40px;
    }

    .service-image-vibrant {
      height: 220px;
      padding: 25px;
    }

    .service-footer-vibrant {
      flex-direction: column;
      gap: 12px;
      align-items: flex-start;
    }
  }

  @media (max-width: 576px) {
    .hero-title-vibrant {
      font-size: 32px;
    }

    .service-content-vibrant {
      padding: 20px;
    }

    .service-title-vibrant {
      font-size: 18px;
      min-height: 50px;
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

    {{-- Banner de 20 años --}}
    <div class="container m-auto my-4">
        <img src="{{ asset('ecommerce/assets/images/servicios-20-años.png') }}" class="w-100" alt="20 años de servicios">
    </div>

    {{-- Hero Section Colorido --}}
    <section class="services-hero-vibrant">
        <div class="container">
            <div class="hero-content-vibrant">
                <h1 class="hero-title-vibrant">Nuestros Servicios</h1>
                <p class="hero-subtitle-vibrant">
                    Soluciones empresariales respaldadas por 20 años de experiencia, 
                    innovación y compromiso con la excelencia
                </p>
                
                {{-- Buscador Colorido --}}
                <div class="search-container-vibrant">
                    <div class="search-box-vibrant">
                        <input 
                            type="text" 
                            class="search-input-vibrant" 
                            id="searchServices" 
                            placeholder="¿Qué servicio estás buscando...?"
                            autocomplete="off"
                        >
                        <i class="bi bi-search search-icon-vibrant"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contador de Servicios --}}
    <div class="services-counter-vibrant">
        Mostrando <strong id="servicesCount">{{ $servicios->count() }}</strong> de <strong id="totalServices">{{ $servicios->total() }}</strong> servicios
    </div>

    {{-- Sección de Servicios --}}
    <section class="services-section-vibrant">
        <div class="container">
            <div class="row g-4" id="servicesGrid">

                @if ($servicios->isEmpty())
                    <div class="col-12">
                        <div class="empty-state-vibrant">
                            <i class="bi bi-inbox d-block"></i>
                            <h3>No hay servicios disponibles</h3>
                            <p>En este momento no contamos con servicios para mostrar.</p>
                        </div>
                    </div>
                @else
                    @foreach ($servicios as $index => $item)
                        <div class="col-lg-3 col-md-6 col-sm-12 service-item"
                             data-service-name="{{ strtolower($item->nombre) }}">
                            <div class="service-card-vibrant">
                                {{-- Imagen con Gradiente --}}
                                <div class="service-image-vibrant">
                                    <span class="service-badge-vibrant">Servicio</span>
                                    <img src="{{ asset($item->imagen) }}" alt="{{ $item->nombre }}">
                                </div>

                                {{-- Contenido --}}
                                <div class="service-content-vibrant">
                                    <div class="service-icon-highlight">
                                        <i class="bi bi-star-fill"></i>
                                        <span>Destacado</span>
                                    </div>
                                    <h3 class="service-title-vibrant">{{ $item->nombre }}</h3>
                                    
                                    <div class="service-footer-vibrant">
                                        <div class="service-author-group">
                                            <div class="service-author-icon">GA</div>
                                            <span class="service-author-label">Grupo Altos</span>
                                        </div>
                                        <a href="/servicio/{{ $item->slug }}" class="service-btn-vibrant">
                                            Ver Más
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
                <div class="empty-state-vibrant">
                    <i class="bi bi-search d-block"></i>
                    <h3>No se encontraron servicios</h3>
                    <p>Intenta con otros términos de búsqueda o presiona ESC para limpiar</p>
                </div>
            </div>

            {{-- Paginación --}}
            @if($servicios->hasPages())
                <div class="pagination-container" id="paginationContainer">
                    {{ $servicios->links() }}
                </div>
            @endif
        </div>
    </section>

</div>
<!--end page content-->

@endsection

@section('scripts')

<script>
  // Actualización de imágenes del banner según dispositivo
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

  // Sistema de Búsqueda Mejorado
  function filterServices() {
      const searchTerm = document.getElementById('searchServices').value.toLowerCase().trim();
      const serviceItems = document.querySelectorAll('.service-item');
      const noResults = document.getElementById('noResults');
      const paginationContainer = document.getElementById('paginationContainer');
      let visibleCount = 0;

      // Si no hay búsqueda, mostrar todos y paginación
      if (searchTerm === '') {
          serviceItems.forEach(item => {
              item.style.display = 'block';
          });
          document.getElementById('servicesCount').textContent = serviceItems.length;
          noResults.classList.add('d-none');
          if (paginationContainer) {
              paginationContainer.style.display = 'flex';
          }
          return;
      }

      // Ocultar paginación durante búsqueda
      if (paginationContainer) {
          paginationContainer.style.display = 'none';
      }

      // Filtrar servicios
      serviceItems.forEach(item => {
          const serviceName = item.getAttribute('data-service-name');
          
          if (serviceName.includes(searchTerm)) {
              item.style.display = 'block';
              visibleCount++;
          } else {
              item.style.display = 'none';
          }
      });

      // Actualizar contador
      document.getElementById('servicesCount').textContent = visibleCount;

      // Mostrar/ocultar mensaje de no resultados
      if (visibleCount === 0 && serviceItems.length > 0) {
          noResults.classList.remove('d-none');
      } else {
          noResults.classList.add('d-none');
      }
  }

  // Búsqueda en tiempo real
  document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('searchServices');
      
      if (searchInput) {
          searchInput.addEventListener('input', function() {
              filterServices();
          });

          // Limpiar búsqueda con tecla Escape
          searchInput.addEventListener('keydown', function(e) {
              if (e.key === 'Escape') {
                  this.value = '';
                  filterServices();
              }
          });
      }
  });
</script>

@endsection
