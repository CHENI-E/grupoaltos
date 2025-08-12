@extends('layouts.ecommerce.app')

@section('content')

    <!--start page content-->
<div class="page-content">

    <div class="">
        <img src="{{ asset('ecommerce/assets/web/banner_inicio/banner_servcios.png') }}" class="w-100" alt="">
    </div>

   <!--start product details-->
    <section class="section-padding">
        <div class="container">

            <div class="separator section-padding">
                <div class="line"></div>
                <h3 class="mb-0 h3 fw-bold">Nuestros Servicios</h3>
                <div class="line"></div>
            </div>

            <div class="brands">
                <div class="row row-cols-2 row-cols-lg-5 g-4">

                    @if ($servicios->isEmpty())
                        <div class="col-12 text-center m-auto mt-3">
                            <p class="text-center">No hay servicios disponibles.</p>
                        </div>
                    @endif

                    @foreach ($servicios as $item)
                        <div class="col-lg-4 col">
                            <div class="p-3 border rounded brand-box">
                                <div class="d-flex align-items-center">
                                    <a href="javascript:;">
                                        <img src="{{ asset($item->imagen) }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>

        </div>
    </section>
   <!--start product details-->

</div>
  <!--end page content-->

@endsection