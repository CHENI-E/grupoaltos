console.log('esto es el index');

// 🔓 Declarar Quill como variable global para usarlo fuera del scope
var quill;
var file_imagenes_detalle;
var file_imagen_portada;
var file_pdf;
var placeholderUrl = 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png';

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
    quill = new Quill('#product-features', {
        modules: { toolbar: toolbarOptions },
        theme: 'snow'
    });


})();


$(document).ready(function() {

    $('#tabla_items').DataTable({
      ajax: {
        url: 'item/listItems',
        dataSrc: ''
      },
      columns: [
        { data: null, title: 'CREACÓN', render:function(data, type, row) {
            let date = new Date(data.created_at);
            let formattedDate = 
                ('0' + date.getDate()).slice(-2) + '/' + 
                ('0' + (date.getMonth() + 1)).slice(-2) + '/' + 
                date.getFullYear() + ' ' + 
                ('0' + date.getHours()).slice(-2) + ':' + 
                ('0' + date.getMinutes()).slice(-2) + ':' + 
                ('0' + date.getSeconds()).slice(-2);
            return formattedDate;
          }
        },
        { data: null, title: 'NOMBRE', render:function(data, type, row) {
            return `<span style="font-weight: bold;">${data.nombre}</span>`;
          }
        },
        { data: null, title: 'CATEGORIA', render:function(data, type, row) {
            return data.category.nombre;
          }
        },
        { data: 'estado', title: 'ESTADO', render: function(data, type, row) {
            return data == '1' ? '<span class="badge bg-success-transparent">Activo</span>' : '<span class="badge bg-danger-transparent">Inactivo</span>';
          }
        },
        { data: null, title: 'PRECIO', render: function(data, type, row) {
            return 'S/. '+data.precio;
          }
        },
        { data: null, title: 'DESCUENTO', render: function(data, type, row) {
            return parseInt(data.descuento)+' %';
          }
        },
        {
          data: null, title: 'ACCIONES', render: function(data, type, row) {
            return `<a class="text-primary mx-3 btn_editar_item" href="javascript:void(0)" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">
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



    let timer;

    function calcularOferta() {
        let precio = parseFloat($('#product-actual-price').val()) || 0;
        let descuentoTexto = $('#product-dealer-price').val().replace('%', '');
        let descuento = parseFloat(descuentoTexto) || 0;

        // Calcular precio con descuento
        let precioOferta = precio - (precio * (descuento / 100));
        // Redondear a dos decimales
        precioOferta = precioOferta.toFixed(2);

        $('#product-discount').val(precioOferta);
    }

    $('#product-actual-price, #product-dealer-price').on('input', function () {
        clearTimeout(timer); // Limpiar el temporizador anterior

        timer = setTimeout(function () {
            calcularOferta();
        }, 1000); // Esperar 1 segundo después del último input
    });


    $('#formulario_update_item').on('submit', function (e) {
        e.preventDefault();

        const form = $(this)[0];
        const formData = new FormData(form);

        // ✏️ Agregar contenido de Quill al FormData
        const descripcion = quill.root.innerHTML;
        formData.append('descripcion', descripcion);

        // 🚀 Enviar vía AJAX
        $.ajax({
            url: 'item/update', // ⚠️ Asegúrate que esta ruta sea correcta
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response);
                if (response.status === 200) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Bien',
                        html: response.message,
                        confirmButtonText: 'Vale'
                    });

                    $('#tabla_items').DataTable().ajax.reload();
                    $('.btn-close').click();

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


});


$(document).on('click', '.btn_eliminar', function() {
    const id = $(this).data('id');
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás recuperar esta Item!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `item/delete/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Eliminado!',
                            response.message,
                            'success'
                        ).then(() => {
                            $('#tabla_items').DataTable().ajax.reload();
                        });
                        return;
                    }

                    if (response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.error
                        });
                        return;
                    }

                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo eliminar la categoría.'
                    });
                }
            });
        }
    });
});


$(document).on('click', '.btn_editar_item', function() {
    const id = $(this).data('id');
    $.ajax({
        url: `item/mostrar_registro_item`,
        data: { id: id },
        type: 'GET',
        beforeSend: function() {
            /* $('#input-description').val('');
            $('#input-nombre').val('');
            $('#input-estado').val('');
            $('#input-orden').val(''); */
        },
        success: function(data) {
            $('#id_formulario').val(data.id)
            console.log('data : ', data);

            if (data.pdf_ficha_tecnica) {
                $('#pdf-preview-frame').attr('src', APP_URL + data.pdf_ficha_tecnica);
                $('#pdf-preview-card').removeClass('d-none');
            } else {
                $('#pdf-preview-frame').attr('src', '');
                $('#pdf-preview-card').addClass('d-none');
            }


            // Portada
            $('#preview_imagen_portada').attr('src', data.imagen_portada ? APP_URL + '/' + data.imagen_portada : placeholderUrl);

            // Detalle 1
            $('#preview_imagen_detalle_one').attr('src', data.imagen_one ? APP_URL + '/' + data.imagen_one : placeholderUrl);

            // Detalle 2
            $('#preview_imagen_detalle_two').attr('src', data.imagen_two ? APP_URL + '/' + data.imagen_two : placeholderUrl);

            // Detalle 3
            $('#preview_imagen_detalle_tree').attr('src', data.imagen_three ? APP_URL + '/' + data.imagen_three : placeholderUrl);

            // Detalle 4
            $('#preview_imagen_detalle_four').attr('src', data.imagen_four ? APP_URL + '/' + data.imagen_four : placeholderUrl);


            $('#product-name').val(data.nombre);
            $('#categoria').val(data.category_id);
            $('#product-actual-price').val(data.precio);
            $('#product-dealer-price').val(data.descuento);
            $('#product-discount').val(data.precio_oferta);
            $('#product-status-add').val(data.estado);
            quill.root.innerHTML = data.descripcion
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



$(document).ready(function () {

    configurarPrevisualizadorImagen({
        inputSelector: '.imagen_portada',
        previewImageSelector: '#preview_imagen_portada',
        removeButtonSelector: '#btn_remove_imagen_portada',
        placeholderUrl: placeholderUrl
    });

    configurarPrevisualizadorImagen({
        inputSelector: '.imagen_detalle_one',
        previewImageSelector: '#preview_imagen_detalle_one',
        removeButtonSelector: '#btn_remove_imagen_detalle_one',
        placeholderUrl: placeholderUrl
    });

    configurarPrevisualizadorImagen({
        inputSelector: '.imagen_detalle_two',
        previewImageSelector: '#preview_imagen_detalle_two',
        removeButtonSelector: '#btn_remove_imagen_detalle_two',
        placeholderUrl: placeholderUrl
    });

    configurarPrevisualizadorImagen({
        inputSelector: '.imagen_detalle_tree',
        previewImageSelector: '#preview_imagen_detalle_tree',
        removeButtonSelector: '#btn_remove_imagen_detalle_tree',
        placeholderUrl: placeholderUrl
    });

    configurarPrevisualizadorImagen({
        inputSelector: '.imagen_detalle_four',
        previewImageSelector: '#preview_imagen_detalle_four',
        removeButtonSelector: '#btn_remove_imagen_detalle_four',
        placeholderUrl: placeholderUrl
    });

    configurarPrevisualizadorPDF({
        inputSelector: '.product-documents',
        previewFrameSelector: '#pdf-preview-frame',
        previewCardSelector: '#pdf-preview-card',
        removeButtonSelector: '#btn_remove_pdf'
    });


});


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


function configurarPrevisualizadorPDF({ inputSelector, previewFrameSelector, previewCardSelector, removeButtonSelector }) {
    const fileInput = $(inputSelector);
    const previewFrame = $(previewFrameSelector);
    const previewCard = $(previewCardSelector);
    const removeBtn = $(removeButtonSelector);

    fileInput.on('change', function (event) {
        const file = event.target.files[0];

        if (!file) return;

        const validType = 'application/pdf';
        if (file.type !== validType) {
            alert('Por favor selecciona un archivo PDF válido.');
            fileInput.val('');
            previewCard.addClass('d-none');
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            previewFrame.attr('src', e.target.result);
            previewCard.removeClass('d-none');
        };
        reader.readAsDataURL(file);
    });

    removeBtn.on('click', function () {
        previewFrame.attr('src', '');
        previewCard.addClass('d-none');
        fileInput.val('');
    });
}

