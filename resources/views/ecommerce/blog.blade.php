@extends('layouts.ecommerce.app')

@section('content')

    <!--start page content-->
<div class="page-content">


    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0"> 
                <li class=""><a href="javascript:;">Grupo Altos / </a></li>
                <li class="breadcrumb-item active" aria-current=""> Blog</li>
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

                        <div class="gap-3 rounded-0 d-flex flex-lg-row flex-column align-items-center">
                            <div class="col-lg-4">
                                <img src="{{ asset('ecommerce/assets/images/blog/01.webp') }}" class="card-img-top rounded-0 w-100" alt="...">
                            </div>
                            <div class="card-body col-lg-8">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="posted-by">
                                    <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                                    </div>
                                    <div class="posted-by">
                                    <p class="mb-0"><i class="bi bi-chat me-2"></i>18 Comentarios</p>
                                    </div>
                                    <div class="posted-date">
                                    <p class="mb-0"><i class="bi bi-calendar me-2"></i>17 Mayo, 2021</p>
                                    </div>
                                </div>
                                <h4 class="card-title fw-bold mt-3">Se inician trabajos de restauración de impresionante mural Wiesse de la Vía Expresa en Miraflores</h4>
                                <p class="mb-0">Se reiniciaron los trabajos de restauración del emblemático mural del artista Ricardo Wiesse, ubicado en el tramo comprendido entre los</p>
                                <a href="blog-read.html" class="btn btn-dark btn-ecomm mt-3">Leer Más</a>
                            </div>
                        </div>

                        <div class="gap-3 rounded-0 d-flex flex-lg-row flex-column align-items-center">
                            <div class="col-lg-4">
                                <img src="{{ asset('ecommerce/assets/images/blog/01.webp') }}" class="card-img-top rounded-0 w-100" alt="...">
                            </div>
                            <div class="card-body col-lg-8">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="posted-by">
                                    <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                                    </div>
                                    <div class="posted-by">
                                    <p class="mb-0"><i class="bi bi-chat me-2"></i>18 Comentarios</p>
                                    </div>
                                    <div class="posted-date">
                                    <p class="mb-0"><i class="bi bi-calendar me-2"></i>17 Mayo, 2021</p>
                                    </div>
                                </div>
                                <h4 class="card-title fw-bold mt-3">Los pilares de la construcción 5.0: IoT y robótica</h4>
                                <p class="mb-0">El Internet de las cosas ( IoT ) se refiere a una red de objetos físicos integrados con sensores, software y varias</p>
                                <a href="blog-read.html" class="btn btn-dark btn-ecomm mt-3">Leer Más</a>
                            </div>
                        </div>

                        <div class="gap-3 rounded-0 d-flex flex-lg-row flex-column align-items-center">
                            <div class="col-lg-4">
                                <img src="{{ asset('ecommerce/assets/images/blog/01.webp') }}" class="card-img-top rounded-0 w-100" alt="...">
                            </div>
                            <div class="card-body col-lg-8">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="posted-by">
                                    <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                                    </div>
                                    <div class="posted-by">
                                    <p class="mb-0"><i class="bi bi-chat me-2"></i>18 Comentarios</p>
                                    </div>
                                    <div class="posted-date">
                                    <p class="mb-0"><i class="bi bi-calendar me-2"></i>17 Mayo, 2021</p>
                                    </div>
                                </div>
                                <h4 class="card-title fw-bold mt-3">Se inician trabajos de restauración de impresionante mural Wiesse de la Vía Expresa en Miraflores</h4>
                                <p class="mb-0">Se reiniciaron los trabajos de restauración del emblemático mural del artista Ricardo Wiesse, ubicado en el tramo comprendido entre los</p>
                                <a href="blog-read.html" class="btn btn-dark btn-ecomm mt-3">Leer Más</a>
                            </div>
                        </div>

                        <div class="gap-3 rounded-0 d-flex flex-lg-row flex-column align-items-center">
                            <div class="col-lg-4">
                                <img src="{{ asset('ecommerce/assets/images/blog/01.webp') }}" class="card-img-top rounded-0 w-100" alt="...">
                            </div>
                            <div class="card-body col-lg-8">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="posted-by">
                                    <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                                    </div>
                                    <div class="posted-by">
                                    <p class="mb-0"><i class="bi bi-chat me-2"></i>18 Comentarios</p>
                                    </div>
                                    <div class="posted-date">
                                    <p class="mb-0"><i class="bi bi-calendar me-2"></i>17 Mayo, 2021</p>
                                    </div>
                                </div>
                                <h4 class="card-title fw-bold mt-3">Se inician trabajos de restauración de impresionante mural Wiesse de la Vía Expresa en Miraflores</h4>
                                <p class="mb-0">Se reiniciaron los trabajos de restauración del emblemático mural del artista Ricardo Wiesse, ubicado en el tramo comprendido entre los</p>
                                <a href="blog-read.html" class="btn btn-dark btn-ecomm mt-3">Leer Más</a>
                            </div>
                        </div>

                        {{-- <div class="card rounded-0">
                            <img src="{{ asset('ecommerce/assets/images/blog/01.webp') }}" class="card-img-top rounded-0" alt="...">
                            <div class="card-body">
                            <div class="d-flex align-items-center gap-4">
                                <div class="posted-by">
                                <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                                </div>
                                <div class="posted-by">
                                <p class="mb-0"><i class="bi bi-chat me-2"></i>18 Comentarios</p>
                                </div>
                                <div class="posted-date">
                                <p class="mb-0"><i class="bi bi-calendar me-2"></i>17 Mayo, 2021</p>
                                </div>
                            </div>
                            <h4 class="card-title fw-bold mt-3">Se inician trabajos de restauración de impresionante mural Wiesse de la Vía Expresa en Miraflores</h4>
                            <p class="mb-0">Se reiniciaron los trabajos de restauración del emblemático mural del artista Ricardo Wiesse, ubicado en el tramo comprendido entre los</p>
                            <a href="blog-read.html" class="btn btn-dark btn-ecomm mt-3">Leer Más</a>
                            </div>
                        </div> --}}

                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="blog-left-sidebar border p-4">
                        <form>
                            <div class="position-relative mb-4">
                            <input type="text" class="form-control form-control-lg ps-5 rounded-0" placeholder="Buscar en el blog">
                            <span class="position-absolute top-50 product-show translate-middle-y"><i class="bi bi-search ms-3"></i></span>
                            </div>
                            {{-- <div class="blog-categories mb-4">
                                <h5 class="mb-3 fw-bold">Blog Categories</h5>
                                <div class="list-group list-group-flush"> <a href="javascript:;" class="list-group-item bg-transparent"><i class="bi bi-chevron-right me-1"></i> Fashion</a>
                                    <a href="javascript:;" class="list-group-item bg-transparent"><i class="bi bi-chevron-right me-1"></i> Electronis</a>
                                    <a href="javascript:;" class="list-group-item bg-transparent"><i class="bi bi-chevron-right me-1"></i> Accessories</a>
                                    <a href="javascript:;" class="list-group-item bg-transparent"><i class="bi bi-chevron-right me-1"></i> Kitchen &amp; Table</a>
                                    <a href="javascript:;" class="list-group-item bg-transparent"><i class="bi bi-chevron-right me-1"></i> Furniture</a>
                                </div>
                            </div> --}}
                            <div class="blog-categories recent-post mb-4">
                            <h5 class="mb-4 fw-bold">Publicaciones Recientes</h5>
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('ecommerce/assets/images/blog/01.webp') }}" width="100" alt="">
                                <div class="ms-3"> <a href="javascript:;" class="fs-6 fw-bold text-content">Conferencia: Tecnología e Innovación en Andamio Normado</a>
                                <p class="mb-0">Mayo 14, 2021</p>
                                </div>
                            </div>
                            <div class="my-3 border-bottom"></div>
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('ecommerce/assets/images/blog/01.webp') }}" width="100" alt="">
                                <div class="ms-3"> <a href="javascript:;" class="fs-6 fw-bold text-content">PRECIO DEL ACERO AUMENTA A NIVEL INTERNACIONAL</a>
                                <p class="mb-0">Mayo 17, 2021</p>
                                </div>
                            </div>
                            <div class="my-3 border-bottom"></div>
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('ecommerce/assets/images/blog/01.webp') }}" width="100" alt="">
                                <div class="ms-3"> <a href="javascript:;" class="fs-6 fw-bold text-content">Se inician trabajos de restauración de impresionante mural Wiesse de la Vía Expresa en Miraflores</a>
                                <p class="mb-0">Mayo 17, 2021</p>
                                </div>
                            </div>
                            </div>
                            <div class="blog-categories">
                            <h5 class="mb-4 fw-bold">Etiquetas</h5>
                            <div class="tags-box d-flex flex-wrap gap-3">
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Cloths</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Electronis</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Furniture</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Laptops</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Men Wear</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Shoes</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Topwear</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Formal Shirts</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Headphones</a>
                                </div>
                                <div>
                                <a href="javascript:;" class="btn btn-outline-dark rounded-0 btn-ecomm">Bottom Wear</a>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
        </div>
    </section>
   <!--start product details-->


 </div>
  <!--end page content-->

@endsection