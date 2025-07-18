@extends('layouts.admin.app')

@section('title', 'Grupos Altos - Usuario')

@section('styles')
@endsection

@section('content')

<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <div>
        <nav>
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuario</li>
            </ol>
        </nav>
        <h1 class="page-title fw-medium fs-18 mb-0">Usuarios</h1>
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
                        <a class="nav-link" aria-current="page" href="{{ route('admin.usuario.index') }}">Lista de Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.usuario.create') }}">Nuevo Usuario</a>
                    </li>
                </ul>

                <div class="mt-4 mb-4 row justify-content-center">

                    <form action="{{ route('admin.usuario.store') }}" method="post" class="col-lg-6 row g-3 mt-0">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Nombre Completo" aria-label="Nombre Completo" name="nombre">
                            @error('nombre')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Correo Electronico</label>
                            <input type="email" class="form-control form-control-sm" id="inputEmail4" name="email">
                            @error('email')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Contraseña</label>
                            <input type="password" class="form-control form-control-sm" id="inputPassword4" name="password">
                            @error('password')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Usuario</label>
                            <input type="text" class="form-control form-control-sm" id="inputAddress" placeholder="Nombre de Usuario" name="usuario">
                            @error('usuario')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Perfil</label>
                            <select id="inputState" class="form-select form-select-sm" name="perfil">
                                <option selected hidden>Elegir...</option>
                                <option value="1">Administrador</option>
                                <option value="2">Invitado</option>
                            </select>
                            @error('perfil')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Estado</label>
                            <select id="inputState" class="form-select form-select-sm" name="estado">
                                <option selected hidden>Elegir...</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('estado')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 btn-sm">Guardar</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection