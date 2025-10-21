@extends('layouts.ecommerce.app')

@section('content')

<style>
    .content_info_contactanos{
        background-color: #042775;
        padding: 40px;
        border-radius: 25px;
        color: white;
    }
    .btn-ecomm{
        background-color: #e75322;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 15px;
        font-weight: 950 !important;
    }
    .btn-ecomm:hover{
        background-color: #bf4319;
        color: white;
    }

    @media (max-width: 607px) {
      .div_title_encuentranos h1{
        font-size: 25px !important;
      }
      .div_title_encuentranos img{
        width: 37px;
      }
      .content_form_contactanos h1{
        font-size: 30px !important;
      }
    }
</style>

<!--start page content-->
<div class="page-content">

    <img src="{{ asset('ecommerce/assets/images/portada-contactanos.png') }}" width="100%" alt="">

    {{-- SECTION FORMULARIO --}}
    <section class="container py-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 py-3">
                <div class="content_info_contactanos">
                    <span style="background: #e75322; padding: 5px 10px; border-radius: 5px; font-family: 'Orbitron', sans-serif !important;">CONTÁCTANOS</span>
                    <h1 class="my-3" style="font-family: 'Orbitron', sans-serif !important; color:white;">¿NECESITAS MÁS INFORMACIÓN?</h1>
                    <p>
                        Contáctanos para soluciones seguras y confiables en trabajos en altura.
                        Estamos listos para impulsar tu proyecto
                    </p>
                    <div class="row">
                        <div class="col-lg-6 mt-4">
                            <p class="m-0"><b>Whatsapp</b></p>
                            <span>+51 994 119 444</span>
                        </div>
                        <div class="col-lg-6 mt-4">
                            <p class="m-0"><b>Correo</b></p>
                            <span>ventas@grupoaltos.com</span>
                        </div>
                        <div class="col-lg-6 mt-4">
                            <p class="m-0"><b>Horario de Atención</b></p>
                            <span>Lun - Vie <br> 8:00 AM - 6:00 PM</span>
                        </div>
                        <div class="col-lg-6 mt-4">
                            <p class="m-0"><b>Dirección</b></p>
                            <span>Av. Defensores del Morro</span><br>
                            <span>Mz.V, Lote. 7 Urb.</span><br>
                            <span>Los Huertos de Villa - Chorrillos, Lima</span>
                        </div>
                        <div class="col-lg-6 mt-4">
                            <p class="m-0"><b>Dirección</b></p>
                            <span>Av. Defensores del Morro</span><br>
                            <span>Mz.V, Lote. 7 Urb.</span><br>
                            <span>Los Huertos de Villa - Chorrillos, Lima</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 py-3">
                <div class="content_form_contactanos">
                    <span style="background: rgba(183, 183, 183, 0.651); color: rgb(85, 85, 85); padding: 5px 10px; border-radius: 5px; font-family: 'Orbitron', sans-serif !important;">Comunicate con Altos</span>
                    <h1 class="my-3" style="font-family: 'Orbitron', sans-serif !important; color: #103cad; font-size:60px; font-weight: 950;">Envíanos un Mensaje</h1>
                    <p style="color: black; font-weight: 950;">Por favor, complete el formulario con tus datos y mensaje, y nuestro equipo se pondrá en contacto contigo lo antes posible.</p>
                    <form method="POST" action="{{ route('ecommerce.emailcontactanos') }}">
                        @csrf
                        <div class="form-body row">
                            <div class="mb-3 col-lg-6">
                                <input type="text" class="form-control rounded-0" name="name" placeholder="Ingrese su Nombre">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6">
                                <input type="text" class="form-control rounded-0" name="email" placeholder="Ongrese su Correo">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <input type="text" class="form-control rounded-0" name="phone" placeholder="Ingrese su Número de Teléfono">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <textarea class="form-control rounded-0" rows="4" cols="4" name="message" placeholder="Ingrese su Mensaje"></textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @session('success')
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endsession
                            <div class="mb-0">
                                <button type="submit" class="btn-ecomm">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background: #e9e9e97a">
        <div class="div_title_encuentranos m-auto text-center d-flex align-items-center justify-content-center mb-3" style="gap: 10px;">
            <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-02.png') }}" width="60px" alt="">
            <h1 style="font-family: 'Orbitron', sans-serif !important; color: #042775; font-size:40px; font-weight: 950;">ENCUÉNTRANOS</h1>
            <img src="{{ asset('ecommerce/assets/images/ICONOS-WEB/ICONOS WEB-01.png') }}" width="60px" alt="">
        </div>
        <p class="text-center">Av. Defensores del Morro, Mz. V, Lote. 7 Urb. Los Huertos de Villa - Chorrillos, Lima</p>
    </section>

    <div class="w-100">
        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31197.87131065545!2d-76.99848100000001!3d-12.1985!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105b9e4f36df983%3A0xda7e0f448ae09c7!2sGRUPO%20ALTOS!5e0!3m2!1ses!2sus!4v1752100391336!5m2!1ses!2sus" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

   <!--start product details-->
    {{-- <section class="section-padding">
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
                    <form method="post" action="{{ route('ecommerce.emailcontactanos') }}">
                        @csrf
                        <div class="form-body">
                            <h4 class="mb-0 fw-bold">Envíenos un mensaje</h4>
                            <div class="my-3 border-bottom"></div>
                            <div class="mb-3">
                                <label class="form-label">Ingrese su nombre</label>
                                <input type="text" class="form-control rounded-0" name="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Introducir correo electrónico</label>
                                <input type="text" class="form-control rounded-0" name="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Número de teléfono</label>
                                <input type="text" class="form-control rounded-0" name="phone">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mensaje</label>
                                <textarea class="form-control rounded-0" rows="4" cols="4" name="message"></textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @session('success')
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endsession
                            <div class="mb-0">
                                <button type="submit" class="btn btn-dark btn-ecomm">Enviar mensaje</button>
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
    </section> --}}
   <!--start product details-->

 </div>
  <!--end page content-->

@endsection