@extends('layouts.admin.app')

@section('styles')
        <!-- quill css -->
        <link rel="stylesheet" href="{{ asset('admin/assets/libs/quill/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/libs/quill/quill.bubble.css') }}">

        <!-- Filepond CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/libs/filepond/filepond.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css') }}">
@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div>
            <nav>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Items</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0">Seccion de Items</h1>
        </div>
    </div>

    
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin.item.index') }}">Lista de Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.item.create') }}">Nuevo Item</a>
                        </li>
                    </ul>

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xl-12">
                            <form class="card custom-card" method="post" id="formulario_create_item" enctype="multipart/form-data">
                                <div class="card-body add-products">
                                    <div class="row gx-4 gy-3">
                                        <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">
                                                        <div class="col-xl-12">
                                                            <label for="product-name" class="form-label">Nombre del Articulo</label>
                                                            <input type="text" class="form-control" id="product-name" name="nombre" placeholder="Nombre del Articulo">
                                                            <label for="product-name-add" class="form-label mt-1 fs-12 fw-normal text-muted mb-0">*El nombre del producto no debe exceder los 30 caracteres</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label for="input_categoria" class="form-label">Categoria</label>
                                                            <select class="form-select" name="categoria" id="categoria">
                                                                <option value="" hidden>Seleccionar</option>
                                                                @foreach ($categoria as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <label for="product-actual-price" class="form-label">Precio</label>
                                                            <input type="text" class="form-control" id="product-actual-price" name="precio" placeholder="0.00">
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <label for="product-dealer-price" class="form-label">Descuento %</label>
                                                            <input type="text" class="form-control" id="product-dealer-price" name="descuento" placeholder="0%" value="0">
                                                        </div>
                                                        <div class="col-xl-2">
                                                            <label for="product-discount" class="form-label">Precio Oferta</label>
                                                            <input type="text" class="form-control" id="product-discount" name="oferta" placeholder="0.00">
                                                        </div>


                                                        <!-- INPUT IMAGEN PORTADA -->
                                                        <div class="col-xl-12 product-documents-container">
                                                            <p class="fw-medium mb-2 fs-14">Imagen Portada: <b class="text-danger">Recomendado (1024x1024)</b></p>
                                                            <input type="file" class="form-control imagen_portada" name="imagen_portada" accept=".png, .jpg, .jpeg" data-max-file-size="3MB" data-max-files="1">
                                                        </div>

                                                        <div id="preview-card-container" class="col-xl-12">
                                                            <div class="card shadow-sm border rounded">
                                                                <div style="height: 200px; overflow: hidden;" class="text-center">
                                                                    <img id="preview_imagen_portada"
                                                                        src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png"
                                                                        class="card-img-top"
                                                                        alt="Vista previa"
                                                                        style="width: 50%; height: 100%; object-fit: cover;">
                                                                </div>
                                                                <div class="card-body text-center">
                                                                    <button type="button" id="btn_remove_imagen_portada" class="btn btn-outline-danger btn-sm">
                                                                        Quitar Imagen
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <label class="form-label text-muted fw-normal fs-12 mt-0">
                                                            *Se debe cargar un mínimo de 1 imágenen, todas las imágenes deben mantener un ancho 
                                                            y alto uniformes según el contenedor.
                                                        </label>
                                                        {{-- ============================================================== --}}

                                                        <div class="col-xl-12 product-documents-container">
                                                            <p class="fw-medium mb-2 fs-14">Imagen Detalle 1 <b class="text-danger">Recomendado (1024x1024)( Opcional )</b> :</p>
                                                            <input type="file" class="form-control imagen_detalle_one" name="imagen_detalle_one" accept=".png, .jpg, .jpeg" data-max-file-size="3MB" data-max-files="1">
                                                        </div>

                                                        <div id="preview-card-container" class="col-xl-12">
                                                            <div class="card shadow-sm border rounded">
                                                                <div style="height: 200px; overflow: hidden;" class="text-center">
                                                                    <img id="preview_imagen_detalle_one"
                                                                        src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png"
                                                                        class="card-img-top"
                                                                        alt="Vista previa"
                                                                        style="width: 50%; height: 100%; object-fit: cover;">
                                                                </div>
                                                                <div class="card-body text-center">
                                                                    <button type="button" id="btn_remove_imagen_detalle_one" class="btn btn-outline-danger btn-sm">
                                                                        Quitar Imagen
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-xl-12 product-documents-container">
                                                            <p class="fw-medium mb-2 fs-14">Imagen Detalle 2 <b class="text-danger">Recomendado (1024x1024)( Opcional )</b> :</p>
                                                            <input type="file" class="form-control imagen_detalle_two" name="imagen_detalle_two" accept=".png, .jpg, .jpeg" data-max-file-size="3MB" data-max-files="1">
                                                        </div>

                                                        <div id="preview-card-container" class="col-xl-12">
                                                            <div class="card shadow-sm border rounded">
                                                                <div style="height: 200px; overflow: hidden;" class="text-center">
                                                                    <img id="preview_imagen_detalle_two"
                                                                        src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png"
                                                                        class="card-img-top"
                                                                        alt="Vista previa"
                                                                        style="width: 50%; height: 100%; object-fit: cover;">
                                                                </div>
                                                                <div class="card-body text-center">
                                                                    <button type="button" id="btn_remove_imagen_detalle_two" class="btn btn-outline-danger btn-sm">
                                                                        Quitar Imagen
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">

                                                        <div class="col-xl-12 product-documents-container">
                                                            <p class="fw-medium mb-2 fs-14">Imagen Detalle 3 <b class="text-danger">( Opcional )</b> :</p>
                                                            <input type="file" class="form-control imagen_detalle_tree" name="imagen_detalle_tree" accept=".png, .jpg, .jpeg" data-max-file-size="3MB" data-max-files="1">
                                                        </div>

                                                        <div id="preview-card-container" class="col-xl-12">
                                                            <div class="card shadow-sm border rounded">
                                                                <div style="height: 200px; overflow: hidden;" class="text-center">
                                                                    <img id="preview_imagen_detalle_tree"
                                                                        src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png"
                                                                        class="card-img-top"
                                                                        alt="Vista previa"
                                                                        style="width: 50%; height: 100%; object-fit: cover;">
                                                                </div>
                                                                <div class="card-body text-center">
                                                                    <button type="button" id="btn_remove_imagen_detalle_tree" class="btn btn-outline-danger btn-sm">
                                                                        Quitar Imagen
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 product-documents-container">
                                                            <p class="fw-medium mb-2 fs-14">Imagen Detalle 4 <b class="text-danger">( Opcional )</b> :</p>
                                                            <input type="file" class="form-control imagen_detalle_four" name="imagen_detalle_four" accept=".png, .jpg, .jpeg" data-max-file-size="3MB" data-max-files="1">
                                                        </div>

                                                        <div id="preview-card-container" class="col-xl-12">
                                                            <div class="card shadow-sm border rounded">
                                                                <div style="height: 200px; overflow: hidden;" class="text-center">
                                                                    <img id="preview_imagen_detalle_four"
                                                                        src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png"
                                                                        class="card-img-top"
                                                                        alt="Vista previa"
                                                                        style="width: 50%; height: 100%; object-fit: cover;">
                                                                </div>
                                                                <div class="card-body text-center">
                                                                    <button type="button" id="btn_remove_imagen_detalle_four" class="btn btn-outline-danger btn-sm">
                                                                        Quitar Imagen
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12">
                                                            <label class="form-label">Descripción del Item <b class="text-danger">(*)</b> :</label>
                                                            <div id="product-features"></div>
                                                        </div>
                                                        <div class="col-xl-12 product-documents-container">
                                                            <p class="fw-medium mb-2 fs-14">Ficha Técnica <b class="text-danger">( Solo formato PDF )</b> :</p>
                                                            <input type="file" class="product-documents" name="ficha_tecnica" accept=".pdf" data-max-file-size="3MB" data-max-files="1">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="product-status-add" class="form-label">Estado de Publicación</label>
                                                            <select class="form-select" name="estado" id="product-status-add">
                                                                <option value="" hidden>Seleccionar</option>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Guardar Item <i class="bi bi-download ms-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--End::row-1 -->

                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <!-- Quill Editor JS -->
    <script src="{{ asset('admin/assets/libs/quill/quill.js') }}"></script>

    <!-- Filepond JS -->
    <script src="{{ asset('admin/assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js') }}"></script>

    <!-- Internal Add Products JS -->
    <script src="{{ asset('admin/assets/js/item/create.js') }}?v={{ time() }}"></script>
@endsection