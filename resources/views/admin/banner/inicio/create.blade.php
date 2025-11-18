@extends('layouts.admin.app')

@section('title', 'Grupos Altos - Banners de Inicio')

@section('styles')
<link rel="stylesheet" href="{{ asset('admin/assets/libs/quill/quill.snow.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/libs/quill/quill.bubble.css') }}">

<style>
    .image-preview-card {
    max-width: 100%;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
    }

    .image-preview-card img {
    width: 100%;
    height: auto;
    object-fit: cover;
    }

    .image-preview-card .card-body {
    padding: 0.75rem;
    text-align: center;
    }

    .remove-btn {
    margin-top: 0.5rem;
    }
</style>


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
        <h1 class="page-title fw-medium fs-18 mb-0">Banners Cabezeras de Pagínas</h1>
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
                        <div class="alert alert-info">
                            <strong>Medidas recomendadas:</strong>
                            <ul class="mb-0">
                                <li>Dimensiones para <b class="text-danger">Banner de Móvil</b>: 720x1280 px</li>
                                <li>Dimensiones para <b>Banner de Inicio</b>: 1920x1080 px</li>
                                <li>Dimensiones para <b>Banner de Servicios</b>: 1920x600 px</li>
                                <li>Dimensiones para <b>Banner de Nosotros</b>: 1920x600 px</li>
                                <li>Dimensiones para <b>Banner de Proyectos</b>: 1920x500 px</li>
                                <li>Dimensiones para <b>Banner de Productos</b>: 1920x500 px</li>
                                <li>Dimensiones para <b>Banner de Contactanos</b>: 1920x500 px</li>
                                <li>Dimensiones para <b>Banner de Blog</b>: 1920x500 px</li>
                                <li>Tamaño máximo: 2 MB</li>
                                <li>Formatos permitidos: JPG, PNG</li>
                            </ul>
                        </div>
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Corrige los siguientes errores:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group col-md-6">
                            <label for="tipo">Tipo de Banner</label>
                            <select name="tipo" id="tipo" class="form-select">
                                <option value="inicio">Inicio</option>
                                <option value="servicios">Servicios</option>
                                <option value="contactanos">Contactanos</option>
                                <option value="proyectos">Proyectos</option>
                                <option value="blog">Blog</option>
                                <option value="nosotros">Nosotros</option>
                                <option value="productos">Productos</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="url">URL Redirección</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Ingrese URL a redireccionar">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="primer_banner">BANNER</label><br>
                            <input type="file" id="primer_banner" accept="image/*" name="banner" class="form-control-file">
                            <div id="preview-primer_banner" class="image-preview-container mt-3"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="primer_banner_movil">BANNER (VERSION MOVIL)</label><br>
                            <input type="file" id="primer_banner_movil" accept="image/*" name="banner_movil" class="form-control-file">
                            <div id="preview-primer_banner_movil" class="image-preview-container mt-3"></div>
                        </div>

                        {{-- Error global del catch --}}
                        @if ($errors->has('error'))
                            <div class="alert alert-danger mt-3">{{ $errors->first('error') }}</div>
                        @endif

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
    <script src="{{ asset('admin/assets/js/banner/inicio_create.js') }}?v={{ time() }}"></script>
@endsection