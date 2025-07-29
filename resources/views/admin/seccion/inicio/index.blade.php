@extends('layouts.admin.app')

<style>
    .image-card img {
        object-fit: cover;
        height: 200px;
        width: 100%;
    }
    .preview-img {
        height: 200px;
        object-fit: cover;
    }
</style>

@section('content')

    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
        <div>
            <nav>
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Seccion</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0">Seccion de Inicio</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body row">

                    <form action="{{ route('admin.seccion.identities.store') }}" class="col-lg-12 d-flex flex-column align-items-center" method="POST">
                        @csrf
                        <div class="form-group mb-3 col-lg-4 col-12">
                            <label for="" class="form-label">Titulo</label>
                            <input type="text" class="form-control form-control-sm" id="" name="title" value="{{ $identity->title ?? '' }}">
                            @error('title')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-lg-6 col-12">
                            <label for="" class="form-label">SubTitulo</label>
                            <input type="text" class="form-control form-control-sm" id="" name="subtitle" value="{{ $identity->subtitle ?? '' }}">
                            @error('subtitle')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row col-lg-12 gap-1 d-flex justify-content-center">
                            <div class="col-lg-3 card pt-1">
                                <div class="form-group mb-3 col-lg-12">
                                    <label for="" class="form-label">Titulo</label>
                                    <input type="text" class="form-control form-control-sm" id="" name="title_card_one" value="{{ $identity->title_card_one ?? '' }}">
                                    @error('title_card_one')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-lg-12">
                                    <label for="" class="form-label">Contenido</label>
                                    <textarea class="form-control form-control-sm" id="" name="content_card_one" rows="8">{{ $identity->content_card_one ?? '' }}</textarea>
                                    @error('content_card_one')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 card pt-1">
                                <div class="form-group mb-3 col-lg-12">
                                    <label for="title_card_two" class="form-label">Titulo</label>
                                    <input type="text" class="form-control form-control-sm" id="title_card_two" name="title_card_two" value="{{ $identity->title_card_two ?? '' }}">
                                    @error('title_card_two')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-lg-12">
                                    <label for="content_card_two" class="form-label">Contenido</label>
                                    <textarea class="form-control form-control-sm" id="content_card_two" name="content_card_two" rows="8">{{ $identity->content_card_two ?? '' }}</textarea>
                                    @error('content_card_two')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 card pt-1">
                                <div class="form-group mb-3 col-lg-12">
                                    <label for="" class="form-label">Titulo</label>
                                    <input type="text" class="form-control form-control-sm" id="" name="title_card_three" value="{{ $identity->title_card_three ?? '' }}">
                                    @error('title_card_three')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-lg-12">
                                    <label for="" class="form-label">Contenido</label>
                                    <textarea class="form-control form-control-sm" id="" name="content_card_three" rows="8">{{ $identity->content_card_three ?? '' }}</textarea>
                                    @error('content_card_three')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror   
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body row">

                    <form action="{{ route('admin.seccion.about_me.store') }}" class="col-lg-12 d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12 d-flex align-items-center">
                            <div class="col-lg-6">
                                <input type="file" class="form-control form-control-sm mb-3 w-75" id="sect1_imagen" name="image">
                                <div class="w-75 card">
                                    <img src="{{ asset('assets/images/placeholder.png') }}" alt="Imagen de la seccion" class="img-fluid" id="sect1_imagen_preview">
                                    <div class="card-body">
                                        <p class="card-text">Vista previa de la imagen</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3 col-lg-12">
                                    <label for="sect1_titulo" class="form-label">Titulo</label>
                                    <input type="text" class="form-control form-control-sm" id="sect1_titulo" name="title" value="{{ $aboutMe->title ?? '' }}">
                                    @error('title')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 col-lg-12">
                                    <label for="sect1_contenido" class="form-label">Contenido</label>
                                    <textarea class="form-control form-control-sm" name="content" id="sect1_contenido" cols="30" rows="10">{{ $aboutMe->content ?? '' }}</textarea>
                                    @error('content')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 col-lg-12">
                                    <label for="sect1_boton_texto" class="form-label">Botón Texto</label>
                                    <input type="text" class="form-control form-control-sm" id="sect1_boton_texto" name="boton_text" value="{{ $aboutMe->boton_text ?? '' }}">
                                </div>

                                <div class="form-group mb-3 col-lg-12">
                                    <label for="sect1_boton_url" class="form-label">URL Botón</label>
                                    <input type="text" class="form-control form-control-sm" id="sect1_boton_url" name="boton_link" value="{{ $aboutMe->boton_link ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm text-center">Guardar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body row">

                    <form action="{{ route('admin.seccion.clientes.store') }}" class="col-lg-12 d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3 col-lg-4 col-12">
                            <label for="" class="form-label">Titulo</label>
                            <input type="text" class="form-control form-control-sm" id="" name="title_two" value="{{ $customer->titulo ?? '' }}">
                            @error('title_two')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-lg-6 col-12">
                            <label for="" class="form-label">SubTitulo</label>
                            <input type="text" class="form-control form-control-sm" id="" name="subtitle_two" value="{{ $customer->subtitulo ?? '' }}">
                            @error('subtitle_two')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <p><b>Agregar nuevas imágenes</b></p>
                        <div id="fileInputs" class="row col-lg-12"></div>

                        <button type="button" class="btn btn-outline-primary mb-3 btn-sm" id="addInput">+ Agregar imagen</button>
                        <br>

                        <div class="row mb-4 text-center col-lg-12">
                            <p><b>Imágenes guardadas</b></p>
                            @forelse($clientImages as $image)
                                <div class="col-md-3 mb-3 image-card" data-id="{{ $image->id }}">
                                    <div class="card">
                                        <img src="{{ asset($image->image_path) }}" class="card-img-top" alt="Imagen">
                                        <div class="card-body text-center">
                                            <input type="checkbox" name="delete_images[]" value="{{ $image->id }}">
                                            <label>Eliminar</label>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p style="color: #919191; font-size: 0.7rem;">No hay imágenes guardadas.</p>
                            @endforelse
                        </div>


                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>


    @if(session('success_identities'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success_identities') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

    @if(session('success_about_me'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success_about_me') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

    @if(session('success_clients'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success_clients') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

@endsection

@section('scripts')
    <script src="{{ asset('admin/assets/js/seccion/inicio.js') }}"></script>
@endsection