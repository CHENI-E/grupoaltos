
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
// 🔓 Declarar Quill como variable global para usarlo fuera del scope
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
    quill = new Quill('#input-description', {
        modules: { toolbar: toolbarOptions },
        theme: 'snow'
    });

    // FilePond - Ficha técnica (solo 1 archivo PDF)
    /* FilePond.create(document.querySelector('.product-documents'), {
        allowMultiple: false,
        acceptedFileTypes: ['application/pdf'],
        maxFiles: 1,
        labelFileTypeNotAllowed: 'Solo se permite un archivo PDF',
        fileValidateTypeLabelExpectedTypes: 'Se espera un archivo en formato .pdf'
    }); */

})();

$(document).ready(function () {
    $('#imagenInput').change(function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result).fadeIn();
                $('#resetImage').fadeIn();
            };
            reader.readAsDataURL(file);
        } else {
            $('#previewImage').fadeOut().attr('src', '#');
            $('#resetImage').fadeOut();
        }
    });

    $('#resetImage').click(function () {
        $('#imagenInput').val('');
        $('#previewImage').fadeOut().attr('src', '#');
        $(this).fadeOut();
    });
});

$(document).ready(function() {
    $('#tabla_servicio').DataTable({
      ajax: {
        url: 'servicio/listService',
        dataSrc: ''
      },
      columns: [
        { data: null, title: 'NOMBRE', render:function(data, type, row) {
            return `<span style="font-weight: bold;">${data.nombre}</span>`;
          }
        },
        { data: 'descripcion', title: 'DESCRIPCIÓN' },
        { data: 'estado', title: 'ESTADO', render: function(data, type, row) {
            return data == '1' ? '<span class="badge bg-success-transparent">Activo</span>' : '<span class="badge bg-danger-transparent">Inactivo</span>';
          }
        },
        {
          data: null, title: 'ACCIONES', render: function(data, type, row) {
            return `<a class="text-primary mx-3 btn_editar" href="javascript:void(0)" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a class="text-danger mx-3 btn_eliminar" href="javascript:void(0)" data-id="${row.id}">
                        <i class="bi bi-trash3"></i>
                    </a>`;
          }
        }
      ],
      language: {
        url: '/admin/assets/libs/datatables.net-bs5/es-MX.json'
      }
    });

    configurarPrevisualizadorImagen({
        inputSelector: '.banner_principal',
        previewImageSelector: '#preview_banner_principal',
        removeButtonSelector: '#btn_remove_banner_principal',
        placeholderUrl: 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png'
    });

    configurarPrevisualizadorImagen({
        inputSelector: '.imagen_detalle',
        previewImageSelector: '#preview_imagen_detalle',
        removeButtonSelector: '#btn_remove_imagen_detalle',
        placeholderUrl: 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png'
    });

});

$(document).on('click', '.btn_editar', function() {
    const id = $(this).data('id');
    $.ajax({
        url: `servicio/mostrar_registro`,
        data: { id: id },
        type: 'GET',
        beforeSend: function() {
            $('#input-description').val('');
            $('#input-nombre').val('');
            $('#input-estado').val('');
        },
        success: function(data) {
            $('#input-nombre').val(data.nombre);
            quill.root.innerHTML = data.descripcion;
            $('#input-estado').val(data.estado);
            $('#previewImage').attr('src', data.imagen ? `${APP_URL}${data.imagen}` : '#').fadeIn();
            $('#preview_banner_principal').attr('src', data.banner_principal ? APP_URL + '/' + data.banner_principal : 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png');
            $('#preview_imagen_detalle').attr('src', data.imagen_detalle ? APP_URL + '/' + data.imagen_detalle : 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png');
            $('#id_servicio').val(data.id);
            $('#imagen_defecto').val(data.imagen);
            $('#banner_principal_defecto').val(data.banner_principal);
            $('#imagen_defecto_detalle').val(data.imagen_detalle);
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudieron cargar los datos de la categoría.'
            });
        }
    });

});


$(document).on('submit', '#form_update_servicio', function(e) {

    e.preventDefault();
    const form = $(this)[0];
    const formData = new FormData(form);

    // ✏️ Agregar contenido de Quill al FormData
    const descripcion = quill.root.innerHTML;
    formData.append('descripcion', descripcion);

    $.ajax({
        url: `servicio/update`,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.errors) {
                const mensajes = [];
                for (const campo in response.errors) {
                    if (Array.isArray(response.errors[campo])) {
                        mensajes.push(...response.errors[campo]);
                    }
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: mensajes.join(', ')
                });
                return;
            }

            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: response.message
                }).then(() => {
                    $('#tabla_servicio').DataTable().ajax.reload();
                    $('#exampleModal').modal('hide');
                });
            }

        }
    });
});

$(document).on('click', '.btn_eliminar', function() {
    const id = $(this).data('id');
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás recuperar este servicio!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `servicio/delete/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Eliminado!',
                            response.message,
                            'success'
                        ).then(() => {
                            $('#tabla_servicio').DataTable().ajax.reload();
                        });
                        return;
                    }

                    if (response.errors) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.errors
                        });
                        return;
                    }

                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo eliminar el servicio.'
                    });
                }
            });
        }
    });
});