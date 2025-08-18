console.log('esto es el create js');
function configurarPrevisualizadorImagen({
        inputSelector,
        previewImageSelector,
        removeButtonSelector,
        placeholderUrl
    })
{
    const fileInput = $(inputSelector);
    const previewImage = $(previewImageSelector);
    const removeBtn = $(removeButtonSelector);

    fileInput.on('change', function (event) {
        const file = event.target.files[0];

        if (!file) return;

        const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!validTypes.includes(file.type)) {
            alert('Por favor selecciona una imagen válida (.jpg, .jpeg, .png).');
            fileInput.val('');
            previewImage.attr('src', placeholderUrl);
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            previewImage.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    });

    removeBtn.on('click', function () {
        previewImage.attr('src', placeholderUrl);
        fileInput.val('');
    });
}

var quill;

(function () {

    "use strict";

    // Configuración del toolbar de Quill
    const toolbarOptions = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'font': [] }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'align': [] }],
        ['clean']
    ];

    // Inicializar Quill
    quill = new Quill('#input-contenido', {
        modules: { toolbar: toolbarOptions },
        theme: 'snow'
    });

})();

configurarPrevisualizadorImagen({
    inputSelector: '.imagen_portada',
    previewImageSelector: '#preview_imagen_portada',
    removeButtonSelector: '#btn_remove_imagen_portada',
    placeholderUrl: 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png'
});

configurarPrevisualizadorImagen({
    inputSelector: '.imagen_detalle_one',
    previewImageSelector: '#preview_imagen_detalle_one',
    removeButtonSelector: '#btn_remove_imagen_detalle_one',
    placeholderUrl: 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png'
});

configurarPrevisualizadorImagen({
    inputSelector: '.imagen_detalle_two',
    previewImageSelector: '#preview_imagen_detalle_two',
    removeButtonSelector: '#btn_remove_imagen_detalle_two',
    placeholderUrl: 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png'
});


$('#formulario_create_blog').on('submit', function (e) {
    e.preventDefault();

    const form = $(this)[0];
    const formData = new FormData(form);

    // ✏️ Agregar contenido de Quill al FormData
    const descripcion = quill.root.innerHTML;
    formData.append('descripcion', descripcion);


    // 🚀 Enviar vía AJAX
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            /* console.log(response);
            return */
            if (response.status === 200) {

                Swal.fire({
                    icon: 'success',
                    title: 'Bien',
                    html: response.message,
                    confirmButtonText: 'Vale'
                });

                // Limpiar el formulario (opcional)
                $('#formulario_create_blog')[0].reset();
                $('#btn_remove_imagen_detalle_one, #btn_remove_imagen_detalle_two, #btn_remove_imagen_portada').click();
                quill.root.innerHTML = '';

            }else{

                Swal.fire({
                    icon: 'error',
                    title: 'Hubo un error',
                    html: 'No se pudo guardar el item, intentelo más tarde',
                    confirmButtonText: 'Vale'
                });

            }

        },
        error: function (xhr) {
            if (xhr.status === 422) {
                const errores = xhr.responseJSON.errors;
                let mensaje = '';

                // Construir lista de errores
                Object.keys(errores).forEach(function (campo) {
                    errores[campo].forEach(function (error) {
                        mensaje += `• ${error}<br>`;
                    });
                });

                // Mostrar en SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Errores de validación',
                    html: mensaje,
                    confirmButtonText: 'Corregir'
                });
            } else {
                // Otro error (500, etc)
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al guardar el artículo.',
                    confirmButtonText: 'Cerrar'
                });
            }
        }
    });
});