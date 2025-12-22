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
                    <li class="breadcrumb-item active" aria-current="page">Informacion Extra</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0">Seccion de Información Extra</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body row">
                    <form action="{{ route('admin.informationExtra.storeInicioMapa') }}" class="col-lg-12 d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="">Inicio - Mapa de Ubicación</h4>
                        <div class="form-group mb-3 col-lg-4 col-12">
                            <label for="title_extra1" class="form-label">Titulo Etiqueta</label>
                            <input type="text" class="form-control form-control-sm" id="title_extra1" name="title_extra1" value="{{ $mainInfo->texto1 ?? '' }}">
                            @error('title_extra1')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-lg-6 col-12">
                            <label for="title2_extra1" class="form-label">Titulo Principal</label>
                            <input type="text" class="form-control form-control-sm" id="title2_extra1" name="title2_extra1" value="{{ $mainInfo->texto2 ?? '' }}">
                            @error('title2_extra1')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- MOSTRAR ITEMS GUARDADOS -->
                        @if($items->count() > 0)
                        <div class="col-12 mb-4">
                            <hr>
                            <h5 class="text-center mb-3">📍 Items Guardados</h5>
                            <div class="row">
                                @foreach($items as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="card shadow-sm">
                                        <img src="{{ asset($item->imagen) }}" class="card-img-top" alt="{{ $item->texto1 }}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6 class="card-title mb-2">{{ $item->texto1 }}</h6>
                                            <small class="text-muted d-block mb-3">
                                                <i class="bi bi-calendar"></i> {{ $item->created_at->format('d/m/Y H:i') }}
                                            </small>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="delete_items[]" value="{{ $item->id }}" id="delete_{{ $item->id }}">
                                                <label class="form-check-label text-danger" for="delete_{{ $item->id }}">
                                                    <i class="bi bi-trash"></i> Marcar para eliminar
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="alert alert-info text-center" role="alert">
                                <i class="bi bi-info-circle"></i> 
                                <strong>Importante:</strong> Marca los items que deseas eliminar y haz clic en "Guardar Cambios" para confirmar la eliminación.
                            </div>
                            <hr>
                        </div>
                        @endif

                        <!-- CONTENEDOR DE INPUTS DINÁMICOS -->
                        <div class="col-12 mb-3">
                            <h5 class="text-center mb-2">➕ Agregar Nuevos Items</h5>
                            <p class="text-center text-muted small mb-3">Los nuevos items se agregarán a los existentes (no los reemplazarán)</p>
                        </div>
                        <div id="dynamic-container"></div>

                        <button type="button" id="add-input" class="btn btn-primary btn-sm mb-4">
                            <i class="bi bi-plus-circle"></i> Agregar bloque
                        </button>

                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-save"></i> Guardar Cambios
                        </button>


                        <script type="text/template" id="template-dynamic">
                            <div class="card mb-3 dynamic-item shadow-sm border-primary">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-file-earmark-plus"></i> Nuevo Item #__INDEX__</span>
                                    <button type="button" class="btn btn-sm btn-danger remove-item">
                                        <i class="bi bi-x-circle"></i> Eliminar
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <!-- INPUT TEXTO -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="bi bi-card-text"></i> Título *
                                            </label>
                                            <input type="text" name="items[__INDEX__][title]" 
                                                class="form-control form-control-sm" 
                                                placeholder="Ingrese el título del item"
                                                required>
                                        </div>

                                        <!-- INPUT FILE -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="bi bi-image"></i> Imagen *
                                            </label>
                                            <input type="file" name="items[__INDEX__][image]" 
                                                class="form-control form-control-sm image-input" 
                                                accept="image/jpeg,image/png,image/jpg,image/webp"
                                                required>
                                            <small class="text-muted">Formatos: JPG, PNG, WEBP. Max: 2MB</small>
                                        </div>

                                        <!-- PREVIEW -->
                                        <div class="col-12 mb-2 text-center">
                                            <img src="" class="img-preview img-thumbnail" style="max-width: 200px; max-height: 200px; display:none;">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </script>



                    </form>

                    {{-- <form action="{{ route('admin.seccion.identities.store') }}" class="col-lg-12 d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3 col-lg-4 col-12">
                            <label for="" class="form-label">Titulo</label>
                            <input type="text" class="form-control form-control-sm" id="" name="title" value="{{ $identity->title ?? '' }}">
                            @error('title')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-lg-6 col-12" hidden>
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
                            <div class="col-lg-3 card pt-1" hidden>
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
                        <br>
                        <hr>

                        
                        <div class="row mb-4 text-center col-lg-12">
                            <p><b>Imágenes guardadas</b></p>
                            @forelse($imagesValue as $imageValue)
                                <div class="col-md-3 mb-3 image-card" data-id="{{ $imageValue->id }}">
                                    <div class="card">
                                        <img src="{{ asset($imageValue->images) }}" class="card-img-top" alt="Imagen">
                                        <div class="card-body text-center">
                                            <input type="checkbox" name="delete_images[]" value="{{ $imageValue->id }}">
                                            <label>Eliminar</label>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p style="color: #919191; font-size: 0.7rem;">No hay imágenes guardadas.</p>
                            @endforelse
                        </div>

                        <p><b>Agregar nuevas imágenes</b></p>
                        <div id="fileInputsImageValues" class="row col-lg-12"></div>
                        <button type="button" class="btn btn-outline-primary mb-3 btn-sm" id="addInputImageValues">+ Agregar imagen</button>
                        <hr>
                        <br>


                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>

                    </form> --}}

                </div>
            </div>
        </div>
    </div>


    {{-- <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body row">

                    <form action="{{ route('admin.seccion.about_me.store') }}" class="col-lg-12 d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12 d-flex align-items-center">
                            <div class="col-lg-6">
                                <div class="form-group mb-3 col-lg-10">
                                    <label for="sect1_imagen" class="form-label">Video</label>
                                    <input type="text" class="form-control form-control-sm" id="sect1_imagen" name="image" value="{{ $aboutMe->image ?? '' }}" placeholder="Ingrese la url del Video">
                                    @error('image')
                                        <div style="color:red;">{{ $message }}</div>
                                    @enderror
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
    </div> --}}


    {{-- <div class="row">
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
    </div> --}}


    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

    @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let errores = '';
                @foreach($errors->all() as $error)
                    errores += '• {{ $error }}\n';
                @endforeach
                
                Swal.fire({
                    icon: 'warning',
                    title: 'Errores de validación',
                    text: errores,
                    confirmButtonColor: '#f0ad4e',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

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
    {{-- <script src="{{ asset('admin/assets/js/seccion/inicio.js') }}?v={{ time() }}"></script> --}}

    <script>
    $(document).ready(function () {

        let index = 0;

        // Agregar bloque
        $('#add-input').click(function () {
            index++;
            let template = $('#template-dynamic').html();
            template = template.replace(/__INDEX__/g, index);
            $('#dynamic-container').append(template);
        });

        // Eliminar bloque
        $(document).on('click', '.remove-item', function () {
            if (confirm('¿Estás seguro de eliminar este item sin guardar?')) {
                $(this).closest('.dynamic-item').remove();
            }
        });

        // Preview de imagen
        $(document).on('change', '.image-input', function (e) {
            let input = this;
            let preview = $(this).closest('.dynamic-item').find('.img-preview');

            if (input.files && input.files[0]) {
                // Validar tamaño
                if (input.files[0].size > 2048000) { // 2MB
                    alert('La imagen no debe superar 2MB');
                    $(this).val('');
                    preview.hide();
                    return;
                }

                let reader = new FileReader();
                reader.onload = function (e) {
                    preview.attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.hide();
            }
        });

        // Validación antes de enviar
        $('form').on('submit', function(e) {
            let deleteChecked = $('input[name="delete_items[]"]:checked').length;
            let newItems = $('.dynamic-item').length;

            if (deleteChecked > 0) {
                let confirmMsg = `Se eliminarán ${deleteChecked} item(s). ¿Continuar?`;
                if (!confirm(confirmMsg)) {
                    e.preventDefault();
                    return false;
                }
            }
        });

    });
    </script>

@endsection