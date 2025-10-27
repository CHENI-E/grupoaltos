@extends('layouts.ecommerce.app')

@section('content')
<style>
  .animated-btn {
    transition: transform 0.3s ease;
  }
  .animated-btn:hover {
    transform: scale(1.01); 
    border: 1px solid #00d5fa;
  }
</style>

    <!--start page content-->
<div class="page-content">

    <div class="">
        <img src="{{ asset('ecommerce/assets/images/NUESTRO SERVICIOS.png') }}" class="w-100" alt="">
    </div>
    <div class="container m-auto">
        {{-- <img src="{{ asset('ecommerce/assets/web/banner_inicio/banner_servcios.png') }}" class="w-100" alt=""> --}}
        <img src="{{ asset('ecommerce/assets/images/servicios-20-años.png') }}" class="w-100" alt="">
    </div>

   <!--start product details-->
    <section class="section-padding">
        <div class="container">

            {{-- <div class="separator section-padding">
                <div class="line"></div>
                <h3 class="mb-0 h3 fw-bold">Nuestros Servicios</h3>
                <div class="line"></div>
            </div> --}}

            <div class="brands">
                <div class="row  row-cols-lg-5 g-4">

                    @if ($servicios->isEmpty())
                        <div class="col-12 text-center m-auto mt-3">
                            <p class="text-center">No hay servicios disponibles.</p>
                        </div>
                    @endif

                    @php
                        $duration = 1000;
                    @endphp

                    @foreach ($servicios as $item)
                        <div class="col-lg-3 col-sm-12 col-md-6" data-aos="fade-down" data-aos-duration="{{ $duration }}" data-aos-delay="200">
                            <div class="p-2 border rounded" style="background: #e0e0e08d">
                                <div class="d-flex align-items-center">
                                    <a href="/servicio/{{ $item->slug }}" class="w-100">
                                        <img src="{{ asset($item->imagen) }}" class="img-fluid" alt="{{ $item->nombre }}">
                                    </a>
                                </div>
                                <div class="text-center my-2">
                                    <span style="color: #042775; font-family: 'Orbitron', sans-serif !important; font-weight: 950; font-size: 15px;">{{ $item->nombre }}</span>
                                </div>
                                <div class="text-center mt-1 mb-2">
                                    <a href="/servicio/{{ $item->slug }}" class="btn btn-dark btn-ecomm animated-btn w-100" style="background: #e75322 !important; border:none; border-radius: 20px;">Ver Servicio</a>
                                </div>
                            </div>
                        </div>
                        @php
                            $duration += 500;
                        @endphp
                    @endforeach
                    
                </div>
            </div>

        </div>
    </section>
   <!--start product details-->

</div>
  <!--end page content-->

@endsection