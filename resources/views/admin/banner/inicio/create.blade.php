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

                        <div class="form-group col-md-6">
                            <label for="primer_banner">PRIMER BANNER</label>
                            <input type="file" id="primer_banner" accept="image/*" class="form-control-file">
                            <div id="preview-primer_banner" class="image-preview-container mt-3"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="primer_banner_movil">PRIMER BANNER (VERSION MOVIL)</label>
                            <input type="file" id="primer_banner_movil" accept="image/*" class="form-control-file">
                            <div id="preview-primer_banner_movil" class="image-preview-container mt-3"></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="segundo_banner">SEGUNDO BANNER</label>
                            <input type="file" id="segundo_banner" accept="image/*" class="form-control-file">
                            <div id="preview-segundo_banner" class="image-preview-container mt-3"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="segundo_banner_movil">SEGUNDO BANNER (VERSION MOVIL)</label>
                            <input type="file" id="segundo_banner_movil" accept="image/*" class="form-control-file">
                            <div id="preview-segundo_banner_movil" class="image-preview-container mt-3"></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tercer_banner">TERCER BANNER</label>
                            <input type="file" id="tercer_banner" accept="image/*" class="form-control-file">
                            <div id="preview-tercer_banner" class="image-preview-container mt-3"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tercer_banner_movil">TERCER BANNER (VERSION MOVIL)</label>
                            <input type="file" id="tercer_banner_movil" accept="image/*" class="form-control-file">
                            <div id="preview-tercer_banner_movil" class="image-preview-container mt-3"></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cuarto_banner">CUARTO BANNER</label>
                            <input type="file" id="cuarto_banner" accept="image/*" class="form-control-file">
                            <div id="preview-cuarto_banner" class="image-preview-container mt-3"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cuarto_banner_movil">CUARTO BANNER (VERSION MOVIL)</label>
                            <input type="file" id="cuarto_banner_movil" accept="image/*" class="form-control-file">
                            <div id="preview-cuarto_banner_movil" class="image-preview-container mt-3"></div>
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
    <script src="{{ asset('admin/assets/js/banner/inicio_create.js') }}?v={{ time() }}"></script>
@endsection