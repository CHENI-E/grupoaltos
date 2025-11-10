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
                    <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0">Seccion de Proyectos</h1>
        </div>
    </div>

    
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.proyecto.index') }}">Lista de Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.proyecto.create') }}">Nuevo Proyecto</a>
                        </li>
                    </ul>

                    <div class="row justify-content-center mt-4 mb-4">
                        <table class="table" id="tabla_proyecto"></table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal Actualizar categoria -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Servicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row col-lg-12">
                        <form class="card custom-card" method="POST" action="" enctype="multipart/form-data" id="form_update_proyecto">
                            <input type="text" id="id_servicio" name="id_servicio" hidden>
                            <div class="card-body">
                                <div class="row gy-3 justify-content-between">
                                    <div class="col-xxl-6 col-xl-12">

                                        <div class="card shadow-sm">
                                            <div class="card-body text-center">
                                                <label for="imagenInput" class="form-label fw-bold">Imagen Portada <b class="text-danger">(Medida recomendada: 1200x1200)</b></label>
                                                <div id="previewContainer" class="mb-3">
                                                    <img id="previewImage" src="#" alt="Vista previa" class="img-fluid rounded border" style="display: none; max-height: 250px;" />
                                                </div>
                                                <input type="file" name="imagen" id="imagenInput" class="form-control" accept="image/*"/>
                                                <input type="text" id="imagen_defecto" name="imagen_defecto" hidden>
                                                <button type="button" id="resetImage" class="btn btn-outline-secondary btn-sm mt-2 btn-sm" style="display: none;">
                                                    Quitar imagen
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 product-documents-container">
                                            <p class="fw-medium mb-2 fs-14">Imagen Detalle  <b class="text-danger">( Opcional )</b> :</p>
                                            <input type="file" class="form-control imagen_detalle" name="imagen_detalle" accept=".png, .jpg, .jpeg" data-max-file-size="3MB" data-max-files="1">
                                            <input type="text" id="imagen_defecto_detalle" name="imagen_defecto_detalle" hidden>
                                        </div>

                                        <div id="preview-card-container" class="col-xl-12">
                                            <div class="card shadow-sm border rounded">
                                                <div style="height: 200px; overflow: hidden;" class="text-center">
                                                    <img id="preview_imagen_detalle"
                                                        src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png"
                                                        class="card-img-top"
                                                        alt="Vista previa"
                                                        style="width: 50%; height: 100%; object-fit: cover;">
                                                </div>
                                                <div class="card-body text-center">
                                                    <button type="button" id="btn_remove_imagen_detalle" class="btn btn-outline-danger btn-sm">
                                                        Quitar Imagen
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xxl-6 col-xl-12">
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <label for="input-nombre" class="form-label">Nombre del Servicio</label>
                                                <input type="text" class="form-control form-control-sm" id="input-nombre" name="nombre">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="input-estado" class="form-label">Estado</label>
                                                <select name="estado" id="input-estado" class="form-select form-select-sm">
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="input-description" class="form-label">Descripción</label>
                                                <div id="input-description"></div>
                                                {{-- <textarea class="form-control form-control-sm" id="input-description" rows="6" name="descripcion"></textarea> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary btn-sm btn-wave waves-effect waves-light">Guardar Servicio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
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

    <script src="{{ asset('admin/assets/js/proyecto/index.js') }}?v={{ time() }}"></script>
@endsection