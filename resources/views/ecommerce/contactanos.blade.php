@extends('layouts.ecommerce.app')

@section('content')

    <!--start page content-->
<div class="page-content">


    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0"> 
                <li class=""><a href="javascript:;">Grupo Altos / </a></li>
                <li class="breadcrumb-item active" aria-current=""> Contáctanos</li>
            </ol>
            </nav>
        </div>
    </div>


   <!--start product details-->
    <section class="section-padding">
        <div class="container">

            <div class="separator mb-3">
                <div class="line"></div>
                <h3 class="mb-0 h3 fw-bold">Encuéntranos</h3>
                <div class="line"></div>
            </div>

            <div class="border p-3">
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31197.87131065545!2d-76.99848100000001!3d-12.1985!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105b9e4f36df983%3A0xda7e0f448ae09c7!2sGRUPO%20ALTOS!5e0!3m2!1ses!2sus!4v1752100391336!5m2!1ses!2sus" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="separator my-3">
                <div class="line"></div>
                <h3 class="mb-0 h3 fw-bold">¿Por qué elegirnos?</h3>
                <div class="line"></div>
            </div>

            <div class="row g-4">
                <div class="col-xl-8">
                <div class="p-4 border">
                    <form>
                    <div class="form-body">
                        <h4 class="mb-0 fw-bold">Envíenos un mensaje</h4>
                        <div class="my-3 border-bottom"></div>
                        <div class="mb-3">
                        <label class="form-label">Ingrese su nombre</label>
                        <input type="text" class="form-control rounded-0">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Introducir correo electrónico</label>
                        <input type="text" class="form-control rounded-0">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Número de teléfono</label>
                        <input type="text" class="form-control rounded-0">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Mensaje</label>
                        <textarea class="form-control rounded-0" rows="4" cols="4"></textarea>
                        </div>
                        <div class="mb-0">
                        <a href="thank-you.html" class="btn btn-dark btn-ecomm">Enviar mensaje</a>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <div class="col-xl-4">
                <div class="p-3 border">
                    <div class="address mb-3">
                    <h5 class="mb-0 fw-bold">DIRECCIÓN</h5>
                    <p class="mb-0 font-12">Av. Defensores del Morro, Mz. V, Lote. 7 Urb. Los Huertos de Villa – Chorrillo, Lima</p>
                    </div>
                    <hr>
                    <div class="phone mb-3">
                    <h5 class="mb-0 fw-bold">Teléfono</h5>
                    <p class="mb-0 font-13">Móvil : +51-994 119 444</p>
                    </div>
                    <hr>
                    <div class="email mb-3">
                    <h5 class="mb-0 fw-bold">Correo electrónico</h5>
                    <p class="mb-0 font-13">ventas@grupoaltos.com.pe</p>
                    </div>
                    <hr>
                    <div class="working-days mb-0">
                    <h5 class="mb-0 fw-bold">Días laborables</h5>
                    <p class="mb-0 font-13">Lun - Vie / 9:30 AM - 6:30 PM</p>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </section>
   <!--start product details-->

 </div>
  <!--end page content-->

@endsection