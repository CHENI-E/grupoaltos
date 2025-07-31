console.log('esto es el index');

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
    quill = new Quill('#product-features', {
        modules: { toolbar: toolbarOptions },
        theme: 'snow'
    });

    // FilePond - Imagen detalle (múltiples imágenes)
    FilePond.create(document.querySelector('.product-Images'), {
        allowMultiple: true,
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        maxFiles: 4,
        labelFileTypeNotAllowed: 'Solo se permiten imágenes PNG o JPG',
        fileValidateTypeLabelExpectedTypes: 'Se espera una imagen en formato .png o .jpg'
    });

    // FilePond - Imagen portada (solo 1 archivo)
    FilePond.create(document.querySelector('.product_imagen_portada'), {
        allowMultiple: false,
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        maxFiles: 1,
        labelFileTypeNotAllowed: 'Solo se permite una imagen PNG o JPG',
        fileValidateTypeLabelExpectedTypes: 'Se espera una imagen en formato .png o .jpg'
    });

    // FilePond - Ficha técnica (solo 1 archivo PDF)
    FilePond.create(document.querySelector('.product-documents'), {
        allowMultiple: false,
        acceptedFileTypes: ['application/pdf'],
        maxFiles: 1,
        labelFileTypeNotAllowed: 'Solo se permite un archivo PDF',
        fileValidateTypeLabelExpectedTypes: 'Se espera un archivo en formato .pdf'
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
            console.log('data : ', data);
            $('#product-name').val(data.nombre);
            $('#categoria').val(data.category_id);
            $('#product-actual-price').val(data.precio);
            $('#product-dealer-price').val(data.descuento);
            $('#product-discount').val(data.precio_oferta);
            $('#product-status-add').val(data.estado);
            /* $('#').val(data.);
            $('#').val(data.);
            $('#').val(data.);
            $('#').val(data.);
            $('#').val(data.); */
            return;
            $('#input-nombre').val(data.nombre);
            $('#input-description').val(data.descripcion);
            $('#input-estado').val(data.estado);
            $('#input-orden').val(data.orden);
            $('#previewImage').attr('src', data.imagen ? `${APP_URL}${data.imagen}` : '#').fadeIn();
            $('#id_categoria').val(data.id);
            $('#imagen_defecto').val(data.imagen);
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