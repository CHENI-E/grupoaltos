@extends('layouts.admin.app')

@section('title', 'Grupos Altos - Banners de Inicio')

@section('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/libs/quill/quill.snow.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/libs/quill/quill.bubble.css') }}">

@endsection

@section('content')

<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <div>
        <nav>
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Banners</li>
            </ol>
        </nav>
        <h1 class="page-title fw-medium fs-18 mb-0">Banners de Inicio</h1>
    </div>
</div>
<!-- Page Header Close -->

<!-- Start::row-1 -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('admin.bannerinicio.index') }}">Lista de Banners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.bannerinicio.create') }}">Nuevo Banner</a>
                    </li>
                </ul>

                <div class="row justify-content-center mt-4 mb-4">
                    <form action="{{ route('admin.bannerinicio.store') }}" method="post" class="col-lg-8 row g-3 mt-0" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="tipo" value="inicio" hidden>
                        <div class="col-md-6">
                            <label class="form-label">Titulo del Banner</label>
                            <input type="text" class="form-control form-control-sm" aria-label="First name" name="titulo" value="{{ old('titulo') }}">
                            @error('titulo')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Imagen del Banner <b class="text-danger">(Recomendado: 601 x 540)</b></label>
                            <input type="file" class="form-control form-control-sm" id="inputPassword4" name="imagen" value="{{ old('imagen') }}">
                            @error('imagen')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Estado</label>
                            <select id="inputState" class="form-select form-select-sm" name="estado" value="{{ old('estado') }}">
                                <option selected hidden>Elegir...</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('estado')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fondo de Banner</label>
                            <input type="color" class="form-control form-control-color border-0" id="exampleColorInput" value="#136ad0" title="Choose your color" name="fondo">
                            @error('fondo')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <p class="alert alert-warning mb-0">Si no desea agregar un boton no complete los siguientes campos:</p>
                        <div class="col-md-6">
                            <label for="texto_boton" class="form-label">Texto de Boton</label>
                            <input type="text" class="form-control form-control-sm border border-warning" id="texto_boton" name="texto_boton" value="{{ old('texto_boton') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="url_boton" class="form-label">URL de Boton</label>
                            <input type="text" class="form-control form-control-sm border border-warning" id="url_boton" name="url_boton" value="{{ old('url_boton') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Texto - Contenido del Banner</label>
                            <div class="card mb-0">
                                <textarea name="contenido" id="contenido" hidden></textarea>
                                <div id="editor"></div>
                            </div>
                            @error('contenido')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Guardar Banner</button>
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
    <script src="{{ asset('admin/assets/js/banner/inicio_create.js') }}"></script>
@endsection