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
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.usuario.index') }}">Lista de Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.usuario.create') }}">Nuevo Usuario</a>
                    </li>
                </ul>

                <div class="mt-4 mb-4 table-responsive">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nombre </th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Correo Electronico</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Perfil</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            {{ $usuario->nombre }}
                                        </div>
                                    </th>
                                    <td>{{ $usuario->usuario }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    @if ($usuario->estado == 1)
                                        <td><span class="badge bg-success-transparent">Activo</span></td>
                                    @else
                                        <td><span class="badge bg-danger-transparent">Inactivo</span></td>
                                    @endif
                                    <td>{{ $usuario->perfil }}</td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a href="javascript:void(0);" class="text-info fs-14 lh-1 btn_modificar_usuario" data-id="{{ $usuario->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i
                                                    class="ri-edit-line"></i></a>
                                            <a href="javascript:void(0);" class="text-danger fs-14 lh-1 btn_delete_usuario" data-id="{{ $usuario->id }}"><i
                                                    class="ri-delete-bin-5-line"></i></a>
                                        </div>
                                        {{-- <a href="{{ route('admin.usuario.edit', $usuario) }}">Editar</a>
                                            <form action="{{ route('admin.usuario.destroy', $usuario) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Eliminar</button>
                                            </form> --}}
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_modificar_usuario" action="{{ route('admin.usuario.update', 0) }}">
                    @csrf
                    @method('PUT') {{-- Laravel necesita este método para Update --}}
                    
                    <input type="hidden" id="input_id" name="input_id" value="{{ $usuario->id }}">

                    <div class="mb-3">
                        <label for="input_nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="input_nombre" name="input_nombre" value="{{ $usuario->nombre }}">
                    </div>

                    <div class="mb-3">
                        <label for="input_email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="input_email" name="input_email" value="{{ $usuario->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="input_estado" class="col-form-label">Estado</label>
                        <select name="input_estado" id="input_estado" class="form-select">
                            <option value="1" {{ $usuario->estado == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $usuario->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="input_perfil" class="col-form-label">Perfil:</label>
                        <select name="input_perfil" id="input_perfil" class="form-select">
                            <option value="1" {{ $usuario->perfil == 1 ? 'selected' : '' }}>Administrador</option>
                            <option value="2" {{ $usuario->perfil == 2 ? 'selected' : '' }}>Usuario</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: '¡Hola!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Vale'
            });
        });
    </script>
@endif

@endsection

@section('scripts')
    <script src="{{ asset('admin/assets/js/usuario/index.js') }}?v={{ time() }}"></script>
@endsection