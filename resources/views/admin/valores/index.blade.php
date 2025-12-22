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
                    <li class="breadcrumb-item active" aria-current="page">Valores</li>
                </ol>
            </nav>
            <h1 class="page-title fw-medium fs-18 mb-0">Sección de Valores</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body row">
                    <form action="{{ route('admin.valores.store') }}" class="col-lg-12 d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="">Valores de la Empresa</h4>
                        
                        <!-- TÍTULO PRINCIPAL -->
                        <div class="form-group mb-4 col-lg-6 col-12">
                            <label for="titulo_principal" class="form-label fw-bold">
                                <i class="bi bi-card-heading"></i> Título Principal
                            </label>
                            <input type="text" class="form-control" id="titulo_principal" name="titulo_principal" value="{{ $mainInfo->texto1 ?? '' }}" placeholder="Ej: Nuestros Valores">
                            @error('titulo_principal')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- MOSTRAR ITEMS GUARDADOS -->
                        @if($items->count() > 0)
                        <div class="col-12 mb-4">
                            <hr>
                            <h5 class="text-center mb-3">💎 Items Guardados</h5>
                            <div class="row">
                                @foreach($items as $item)
                                <div class="col-md-4 mb-3">
                                    <div class="card shadow-sm">
                                        <img src="{{ asset($item->imagen) }}" class="card-img-top" alt="{{ $item->texto1 }}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6 class="card-title mb-2 fw-bold">{{ $item->texto1 }}</h6>
                                            @if($item->texto2)
                                            <p class="card-text small text-muted mb-2">{{ Str::limit($item->texto2, 80) }}</p>
                                            @endif
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
                            <i class="bi bi-plus-circle"></i> Agregar item
                        </button>

                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-save"></i> Guardar Cambios
                        </button>


                        <script type="text/template" id="template-dynamic">
                            <div class="card mb-3 dynamic-item shadow-sm border-primary">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-file-earmark-plus"></i> Nuevo Valor #__INDEX__</span>
                                    <button type="button" class="btn btn-sm btn-danger remove-item">
                                        <i class="bi bi-x-circle"></i> Eliminar
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <!-- INPUT IMAGEN -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="bi bi-image"></i> Imagen *
                                            </label>
                                            <input type="file" name="items[__INDEX__][imagen]" 
                                                class="form-control form-control-sm image-input" 
                                                accept="image/jpeg,image/png,image/jpg,image/webp"
                                                required>
                                            <small class="text-muted">Formatos: JPG, PNG, WEBP. Max: 2MB</small>
                                        </div>

                                        <!-- PREVIEW -->
                                        <div class="col-12 mb-3 text-center">
                                            <img src="" class="img-preview img-thumbnail" style="max-width: 250px; max-height: 250px; display:none;">
                                        </div>

                                        <!-- INPUT TEXTO1 (TÍTULO) -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="bi bi-card-text"></i> Título (texto1) *
                                            </label>
                                            <input type="text" name="items[__INDEX__][texto1]" 
                                                class="form-control" 
                                                placeholder="Ej: Integridad"
                                                required>
                                        </div>

                                        <!-- INPUT TEXTO2 (DESCRIPCIÓN) -->
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label fw-bold">
                                                <i class="bi bi-text-paragraph"></i> Descripción (texto2)
                                            </label>
                                            <textarea name="items[__INDEX__][texto2]" 
                                                class="form-control" 
                                                rows="4"
                                                placeholder="Descripción del valor (opcional)"></textarea>
                                            <small class="text-muted">Opcional. Máximo 1000 caracteres.</small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </script>

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

@endsection

@section('scripts')

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
