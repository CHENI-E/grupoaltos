@extends('layouts.ecommerce.app')

@section('content')

    <!--start page content-->
    <div class="page-content">


   <!--start breadcrumb-->
   <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0"> 
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
          <li class="breadcrumb-item active" aria-current="page">Shop With Grid</li>
        </ol>
      </nav>
    </div>
   </div>
   <!--end breadcrumb-->


   <!--start product grid-->
   <section class="py-4">
    <h5 class="mb-0 fw-bold d-none">Product Grid</h5>
    <div class="container">
      <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class="bi bi-funnel me-1"></i> Filters</span></div>
       <div class="row">
          <div class="col-12 col-xl-3 filter-column">
              <nav class="navbar navbar-expand-xl flex-wrap p-0">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarFilter" aria-labelledby="offcanvasNavbarFilterLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title mb-0 fw-bold text-uppercase" id="offcanvasNavbarFilterLabel">Filtros</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <div class="filter-sidebar">
                        <div class="card rounded-0">
                            <div class="card-header d-none d-xl-block bg-transparent">
                                <h5 class="mb-0 fw-bold">Filtros</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="p-1 fw-bold bg-light">Categorias</h6>
                                <div class="categories">
                                    <div class="categories-wrapper height-1 p-1">
                                        @foreach ($category as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="chekCate{{ $loop->iteration }}">
                                                <label class="form-check-label" for="chekCate{{ $loop->iteration }}">
                                                <span>{{ $item->nombre }}</span><span class="product-number">({{ $item->products_count }})</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </nav>
          </div>
          <div class="col-12 col-xl-9">
            <div class="shop-right-sidebar">
              <div class="card rounded-0">
                <div class="card-body p-2">
                  <div class="d-flex align-items-center justify-content-between bg-light p-2">
                        <div class="product-count">{{ count($product) }}</div>
                        <div class="view-type hstack gap-2 d-none d-xl-flex"></div>
                     <form>
                      <div class="input-group">
                        <span class="input-group-text bg-transparent rounded-0 border-0">Buscar</span>
                        <input type="text" class="form-control rounded-0" placeholder="Ingrege el Producto">
                      </div>
                    </form> 
                  </div>
                </div>
              </div>

                <div class="product-grid mt-4">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                        @foreach ($product as $item)
                            <div class="col">
                                <div class="card border shadow-none">
                                <div class="position-relative overflow-hidden">
                                    <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                                    <a href="javascript:;"><i class="bi bi-heart"></i></a>
                                    <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                                    <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                                    </div>
                                    <a href="javascript:;">
                                    <img src="{{ asset($item->imagen_portada) }}" class="card-img-top" alt="...">
                                    </a>
                                </div>
                                <div class="card-body border-top">
                                    <h5 class="mb-0 fw-bold product-short-title">{{ $item->nombre }}</h5>
                                    <p class="mb-0 product-short-name">Color Printed Kurta</p>
                                    <div class="product-price d-flex align-items-center gap-2 mt-2">
                                    <div class="h6 fw-bold">s/{{$item->precio}}</div>
                                    <div class="h6 fw-light text-muted text-decoration-line-through">$2089</div>
                                    <div class="h6 fw-bold text-danger">(70% off)</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach

                    </div><!--end row-->
                </div>

            </div>
          </div>
       </div><!--end row-->
    </div>
  </section>
   <!--start product details-->


  
  
 </div>
  <!--end page content-->

@endsection