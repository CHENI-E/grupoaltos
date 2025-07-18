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

                @if(session('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif

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
                                            <a href="javascript:void(0);" class="text-info fs-14 lh-1"><i
                                                    class="ri-edit-line"></i></a>
                                            <a href="javascript:void(0);" class="text-danger fs-14 lh-1"><i
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

@endsection

@section('scripts')
@endsection