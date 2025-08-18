@extends('layouts.ecommerce.app')

@section('styles')

@endsection

@section('content')

    <!--start page content-->
<div class="page-content">


    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0"> 
                <li class=""><a href="javascript:;">Grupo Altos / </a></li>
                <li class="breadcrumb-item active" aria-current=""> Blog / {{ $blog->nombre }}</li>
            </ol>
            </nav>
        </div>
    </div>


   <!--start product details-->
   <section class="section-padding">
    <div class="container">
      
        <div class="row g-4">
          <div class="col-12 col-xl-8">
            <div class="d-flex flex-column gap-4">
              <div class="card rounded-0 border">

                {{-- <img src="{{ asset($blog->imagen_portada) }}" class="card-img-top rounded-0 mb-3" alt="..."> --}}
                <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset($blog->imagen_portada) }}" class="d-block w-100" alt="...">
                    </div>
                    @if ($blog->imagen_detalle_one)
                    <div class="carousel-item">
                    <img src="{{ asset($blog->imagen_detalle_one) }}" class="d-block w-100" alt="...">
                    </div>
                    @endif
                    @if ($blog->imagen_detalle_two)
                    <div class="carousel-item">
                    <img src="{{ asset($blog->imagen_detalle_two) }}" class="d-block w-100" alt="...">
                    </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>



                <div class="card-body">
                  <div class="d-flex align-items-center gap-4">
                    <div class="posted-by">
                      <p class="mb-0"><i class="bi bi-person me-2"></i>{{ $blog->autor }}</p>
                    </div>
                    <div class="posted-date">
                      <p class="mb-0"><i class="bi bi-calendar me-2"></i>{{ \Carbon\Carbon::parse($blog->fecha)->locale('es')->translatedFormat('d') }} {{ \Illuminate\Support\Str::ucfirst(\Carbon\Carbon::parse($blog->fecha)->locale('es')->translatedFormat('F, Y')) }}</p>
                     </div>
                  </div>
                  <h4 class="card-title fw-bold mt-3">{{ $blog->nombre }}</h4>

                  <p class="mb-0">
                    @php
                        echo $blog->contenido;
                    @endphp
                  </p>

                  <div class="d-flex align-items-center gap-3 py-3 border-top border-bottom">
                    <div class="">
                      <h5 class="mb-0 fw-bold">Comparte esta publicación</h5>
                    </div>

                    <div class="footer-widget-9">
                       <div class="social-link d-flex flex-wrap align-items-center gap-2">
                         <a href="javascript:;"><i class="bi bi-facebook"></i></a>
                         <a href="javascript:;"><i class="bi bi-twitter"></i></a>
                         <a href="javascript:;"><i class="bi bi-linkedin"></i></a>
                         <a href="javascript:;"><i class="bi bi-youtube"></i></a>
                         <a href="javascript:;"><i class="bi bi-instagram"></i></a>
                       </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-4">
            <div class="blog-left-sidebar border p-4">
              <form>
                {{-- <div class="position-relative mb-4">
                  <input type="text" class="form-control form-control-lg ps-5 rounded-0" placeholder="Search Product...">
                  <span class="position-absolute top-50 product-show translate-middle-y"><i class="bi bi-search ms-3"></i></span>
                </div> --}}
                <div class="blog-categories recent-post mb-4">
                    <h5 class="mb-4 fw-bold">Publicaciones Recientes</h5>
                    @foreach ($blogRecientes as $item)
                    <div class="d-flex align-items-start">
                        <img src="{{ asset($item->imagen_portada) }}" width="100" alt="">
                            <div class="ms-3"> <a href="{{ route('ecommerce.blog.detalle', $item->slug) }}" class="fs-6 fw-bold text-content">{{ $item->nombre }}</a>
                            <p class="mb-0">{{ \Carbon\Carbon::parse($item->fecha)->locale('es')->translatedFormat('F d, Y') }}</p>
                        </div>
                    </div>
                    <div class="my-3 border-bottom"></div>
                    @endforeach
                </div>
              </form>
            </div>
          </div>
        </div><!--end row-->
       
    </div>
  </section>
   <!--start product details-->


 </div>
  <!--end page content-->

@endsection

@section('scripts')

@endsection