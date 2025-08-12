@extends('layouts.admin.app')

@section('content')

    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div>
            <nav>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Servicio</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0">Seccion de Servicios</h1>
        </div>
    </div>

    
    <!-- Start::row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.servicio.index') }}">Lista de Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.servicio.create') }}">Nuevo Servicio</a>
                        </li>
                    </ul>

                    <div class="row justify-content-center mt-4 mb-4">
                        <table class="table" id="tabla_servicio"></table>
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
                        <form class="card custom-card" method="POST" action="" enctype="multipart/form-data" id="form_update_servicio">
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
                                    </div>

                                    <div class="col-xxl-6 col-xl-12">
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <label for="input-nombre" class="form-label">Nombre del Servicio</label>
                                                <input type="text" class="form-control form-control-sm" id="input-nombre" name="nombre">
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="input-description" class="form-label">Descripción</label>
                                                <textarea class="form-control form-control-sm" id="input-description" rows="6" name="descripcion"></textarea>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="input-estado" class="form-label">Estado</label>
                                                <select name="estado" id="input-estado" class="form-select form-select-sm">
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
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
    <script src="{{ asset('admin/assets/js/servicio/index.js') }}?v={{ time() }}"></script>
@endsection