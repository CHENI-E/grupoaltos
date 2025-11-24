let inputIndex = 0;

function createFileInput() {
    return `
    <div class="col-md-3 mb-3 file-input-wrapper" data-index="${inputIndex}">
        <div class="card">
            <img class="card-img-top preview-img" id="preview-${inputIndex}" src="../../../../ecommerce/assets/default_image.jpg" alt="Preview">
            <div class="card-body text-center">
                <input type="file" name="images[]" class="form-control mb-2 image-input" data-index="${inputIndex}" accept="image/*">
                <button type="button" class="btn btn-danger btn-sm removeInput">Eliminar</button>
            </div>
        </div>
    </div>`;
}


let inputIndexImageValues = 200;

function createFileInputImageValues() {
    return `
    <div class="col-md-3 mb-3 file-input-wrapperImageValues" data-index="${inputIndexImageValues}">
        <div class="card">
            <img class="card-img-top preview-img" id="preview-${inputIndexImageValues}" src="../../../../ecommerce/assets/default_image.jpg" alt="Preview" style="height: 200px; object-fit: cover;">
            <div class="card-body text-center">
                <input type="file" name="images[]" class="form-control mb-2 image-inputImageValues" data-index="${inputIndexImageValues}" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                <button type="button" class="btn btn-danger btn-sm removeInputImageValues">Eliminar</button>
            </div>
        </div>
    </div>`;
}

// Función para crear card de imagen existente
function createExistingImageCard(imageId, imagePath, index) {
    return `
    <div class="col-md-3 mb-3 existing-image-card" data-image-id="${imageId}">
        <div class="card">
            <div class="position-relative">
                <img class="card-img-top preview-img" src="/${imagePath}" alt="Imagen existente" style="height: 200px; object-fit: cover;">
                <span class="badge bg-success position-absolute top-0 end-0 m-2">Guardada</span>
            </div>
            <div class="card-body text-center">
                <button type="button" class="btn btn-danger btn-sm deleteExistingImage" data-image-id="${imageId}">
                    <i class="bi bi-trash"></i> Eliminar
                </button>
            </div>
        </div>
    </div>`;
}


$(document).ready(function () {
    $('#addInput').click(function () {
        $('#fileInputs').append(createFileInput());
        inputIndex++;
    });

    $(document).on('click', '.removeInput', function () {
        $(this).closest('.file-input-wrapper').remove();
    });

    // Preview de imagen
    $(document).on('change', '.image-input', function (e) {
        let index = $(this).data('index');
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(`#preview-${index}`).attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(function () {
    // Agregar nueva imagen (input file dinámico)
    $('#addInputImageValues').click(function () {
        $('#fileInputsImageValues').append(createFileInputImageValues());
        inputIndexImageValues++;
    });

    // Remover input de nueva imagen (antes de enviar el formulario)
    $(document).on('click', '.removeInputImageValues', function () {
        $(this).closest('.file-input-wrapperImageValues').remove();
    });

    // Eliminar imagen existente (marcar para eliminar)
    $(document).on('click', '.deleteExistingImage', function () {
        let imageId = $(this).data('image-id');
        let card = $(this).closest('.existing-image-card');
        
        // Confirmar eliminación
        if (confirm('¿Estás seguro de eliminar esta imagen?')) {
            // Agregar input hidden para marcar eliminación
            if ($(`input[name="delete_images[]"][value="${imageId}"]`).length === 0) {
                $('#deleteImagesContainer').append(`<input type="hidden" name="delete_images[]" value="${imageId}">`);
            }
            
            // Marcar visualmente como eliminada
            card.addClass('opacity-50 border-danger');
            card.find('img').css('filter', 'grayscale(100%)');
            card.find('.badge').removeClass('bg-success').addClass('bg-danger').text('Será eliminada');
            
            // Cambiar botón a "Cancelar"
            $(this).removeClass('btn-danger deleteExistingImage')
                   .addClass('btn-warning cancelDeleteImage')
                   .html('<i class="bi bi-arrow-counterclockwise"></i> Cancelar');
        }
    });

    // Cancelar eliminación de imagen existente
    $(document).on('click', '.cancelDeleteImage', function () {
        let imageId = $(this).data('image-id');
        let card = $(this).closest('.existing-image-card');
        
        // Remover input hidden de eliminación
        $(`input[name="delete_images[]"][value="${imageId}"]`).remove();
        
        // Restaurar estilo visual
        card.removeClass('opacity-50 border-danger');
        card.find('img').css('filter', 'none');
        card.find('.badge').removeClass('bg-danger').addClass('bg-success').text('Guardada');
        
        // Cambiar botón a "Eliminar"
        $(this).removeClass('btn-warning cancelDeleteImage')
               .addClass('btn-danger deleteExistingImage')
               .html('<i class="bi bi-trash"></i> Eliminar');
    });

    // Preview de imagen nueva
    $(document).on('change', '.image-inputImageValues', function (e) {
        let index = $(this).data('index');
        let file = this.files[0];
        
        if (file) {
            // Validar tamaño (5MB máximo)
            if (file.size > 5242880) {
                alert('La imagen no debe superar los 5MB');
                $(this).val('');
                return;
            }
            
            // Validar tipo
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                alert('Formato de imagen no válido. Usa: JPEG, PNG, JPG, GIF o WEBP');
                $(this).val('');
                return;
            }
            
            // Mostrar preview
            let reader = new FileReader();
            reader.onload = function (e) {
                $(`#preview-${index}`).attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
}); 