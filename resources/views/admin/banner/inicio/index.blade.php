@extends('layouts.admin.app')

@section('title', 'Grupos Altos - Banners de Inicio')

@section('styles')
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
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.bannerinicio.index') }}">Lista de Banners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.bannerinicio.create') }}">Nuevo Banner</a>
                    </li>
                </ul>

                <div class="row justify-content-center mt-4 mb-4">
                    
                    <table class="table" id="table_banners_inicio"></table>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        var APP_URL = "{{ env('APP_URL') }}";
    </script>
    <script src="{{ asset('admin/assets/js/banner/inicio_index.js') }}"></script>
@endsection