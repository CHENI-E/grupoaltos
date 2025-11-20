@extends('layouts.ecommerce.app')

@section('content')
<style>
  /* ===== DISEÑO CORPORATIVO PROFESIONAL - SERVICIOS ===== */
  
  :root {
    --primary-blue: #042775;
    --secondary-blue: #064ba0;
    --accent-orange: #e75322;
    --light-gray: #f5f7fa;
    --border-color: #e1e8ed;
    --text-primary: #1a1a1a;
    --text-secondary: #6c757d;
  }

  /* Header Hero Limpio y Profesional */
  .services-hero-clean {
    background: white;
    padding: 80px 0 60px;
    border-bottom: 1px solid var(--border-color);
  }

  .hero-content-clean {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
  }

  .hero-title-clean {
    font-family: 'Orbitron', sans-serif;
    font-size: 48px;
    font-weight: 700;
    color: var(--primary-blue);
    margin-bottom: 16px;
    letter-spacing: -0.5px;
  }

  .hero-subtitle-clean {
    font-size: 18px;
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 40px;
    font-weight: 400;
  }

  /* Barra de Búsqueda Minimalista */
  .search-container-clean {
    max-width: 600px;
    margin: 0 auto;
  }

  .search-box-clean {
    position: relative;
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 8px;
    padding: 4px;
    transition: all 0.3s ease;
  }

  .search-box-clean:focus-within {
    border-color: var(--primary-blue);
    box-shadow: 0 4px 12px rgba(4, 39, 117, 0.1);
  }

  .search-input-clean {
    width: 100%;
    border: none;
    padding: 14px 20px;
    font-size: 15px;
    outline: none;
    color: var(--text-primary);
  }

  .search-input-clean::placeholder {
    color: #adb5bd;
  }

  .search-icon-clean {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    font-size: 18px;
  }

  /* Contador Simple */
  .services-counter {
    text-align: center;
    padding: 40px 0 30px;
    color: var(--text-secondary);
    font-size: 15px;
  }

  .services-counter strong {
    color: var(--primary-blue);
    font-weight: 600;
  }

  /* Sección de Servicios */
  .services-section-clean {
    background: var(--light-gray);
    padding: 60px 0 80px;
  }

  /* Tarjeta Minimalista y Profesional */
  .service-card-clean {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .service-card-clean:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    border-color: var(--primary-blue);
  }

  /* Imagen Optimizada */
  .service-image-clean {
    position: relative;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 20px;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-bottom: 1px solid var(--border-color);
  }

  .service-image-clean img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
  }

  .service-card-clean:hover .service-image-clean img {
    transform: scale(1.05);
  }

  /* Contenido de Tarjeta */
  .service-content-clean {
    padding: 24px 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .service-title-clean {
    font-family: 'Orbitron', sans-serif;
    font-size: 17px;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 20px;
    line-height: 1.4;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
  }

  /* Botón Profesional */
  .service-btn-clean {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 24px;
    background: var(--primary-blue);
    color: white;
    font-size: 14px;
    font-weight: 600;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    margin-top: auto;
    justify-content: center;
  }

  .service-btn-clean:hover {
    background: var(--accent-orange);
    color: white;
    transform: translateX(2px);
  }

  .service-btn-clean i {
    font-size: 14px;
    transition: transform 0.3s ease;
  }

  .service-btn-clean:hover i {
    transform: translateX(3px);
  }

  /* Estado Vacío Limpio */
  .empty-state-clean {
    text-align: center;
    padding: 80px 20px;
  }

  .empty-state-clean i {
    font-size: 64px;
    color: var(--border-color);
    margin-bottom: 20px;
  }

  .empty-state-clean h3 {
    font-size: 24px;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 12px;
  }

  .empty-state-clean p {
    font-size: 16px;
    color: var(--text-secondary);
  }

  /* Paginación Profesional */
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
  }

  .pagination .page-item {
    display: inline-block;
  }

  .pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 8px 12px;
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .pagination .page-link:hover {
    background: var(--primary-blue);
    color: white;
    border-color: var(--primary-blue);
  }

  .pagination .page-item.active .page-link {
    background: var(--primary-blue);
    color: white;
    border-color: var(--primary-blue);
  }

  .pagination .page-item.disabled .page-link {
    background: var(--light-gray);
    color: var(--text-secondary);
    cursor: not-allowed;
    opacity: 0.6;
  }

  .pagination .page-item.disabled .page-link:hover {
    background: var(--light-gray);
    color: var(--text-secondary);
    border-color: var(--border-color);
  }

  /* Responsive */
  @media (max-width: 768px) {
    .hero-title-clean {
      font-size: 36px;
    }

    .hero-subtitle-clean {
      font-size: 16px;
    }

    .services-hero-clean {
      padding: 60px 0 40px;
    }

    .service-image-clean {
      height: 200px;
      padding: 30px 20px;
    }
  }

  @media (max-width: 576px) {
    .hero-title-clean {
      font-size: 32px;
    }

    .service-content-clean {
      padding: 20px 18px;
    }

    .service-title-clean {
      font-size: 16px;
      min-height: auto;
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

    {{-- Hero Section Profesional --}}
    <section class="services-hero-clean">
        <div class="container">
            <div class="hero-content-clean">
                <h1 class="hero-title-clean">Nuestros Servicios</h1>
                <p class="hero-subtitle-clean">
                    Soluciones empresariales respaldadas por 20 años de experiencia, 
                    innovación y compromiso con la excelencia
                </p>
                
                {{-- Buscador Minimalista --}}
                <div class="search-container-clean">
                    <div class="search-box-clean">
                        <input 
                            type="text" 
                            class="search-input-clean" 
                            id="searchServices" 
                            placeholder="Buscar servicios..."
                            autocomplete="off"
                        >
                        <i class="bi bi-search search-icon-clean"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contador de Servicios --}}
    <div class="services-counter">
        Mostrando <strong id="servicesCount">{{ $servicios->count() }}</strong> de <strong id="totalServices">{{ $servicios->total() }}</strong> servicios
    </div>

    {{-- Sección de Servicios --}}
    <section class="services-section-clean">
        <div class="container">
            <div class="row g-4" id="servicesGrid">

                @if ($servicios->isEmpty())
                    <div class="col-12">
                        <div class="empty-state-clean">
                            <i class="bi bi-inbox"></i>
                            <h3>No hay servicios disponibles</h3>
                            <p>En este momento no contamos con servicios para mostrar.</p>
                        </div>
                    </div>
                @else
                    @foreach ($servicios as $index => $item)
                        <div class="col-lg-3 col-md-6 col-sm-12 service-item" 
                             data-aos="fade-up" 
                             data-aos-duration="500" 
                             data-aos-delay="{{ $index * 80 }}"
                             data-service-name="{{ strtolower($item->nombre) }}">
                            <div class="service-card-clean">
                                {{-- Imagen --}}
                                <div class="service-image-clean">
                                    <img src="{{ asset($item->imagen) }}" alt="{{ $item->nombre }}">
                                </div>

                                {{-- Contenido --}}
                                <div class="service-content-clean">
                                    <h3 class="service-title-clean">{{ $item->nombre }}</h3>
                                    <a href="/servicio/{{ $item->slug }}" class="service-btn-clean">
                                        Ver Detalles
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                    
            </div>

            {{-- Mensaje cuando no hay resultados de búsqueda --}}
            <div class="col-12 d-none" id="noResults">
                <div class="empty-state-clean">
                    <i class="bi bi-search"></i>
                    <h3>No se encontraron servicios</h3>
                    <p>Intenta con otros términos de búsqueda.</p>
                </div>
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
      const totalServices = document.getElementById('totalServices').textContent;

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
