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

$(document).ready(function () {

    $('#formulario_create_item').on('submit', function (e) {
        e.preventDefault();

        const form = $(this)[0];
        const formData = new FormData(form);

        // ✏️ Agregar contenido de Quill al FormData
        const descripcion = quill.root.innerHTML;
        formData.append('descripcion', descripcion);

        // 📷 Imagen de portada (solo una)
        const portadaFiles = FilePond.find(document.querySelector('.product_imagen_portada')).getFiles();
        if (portadaFiles.length > 0) {
            formData.append('imagen_portada', portadaFiles[0].file);
        }

        // 🖼️ Imágenes de detalle (múltiples)
        const detalleFiles = FilePond.find(document.querySelector('.product-Images')).getFiles();
        detalleFiles.forEach(file => {
            formData.append('imagen_detalle[]', file.file);
        });

        // 📄 Ficha técnica PDF (solo una)
        const fichaFiles = FilePond.find(document.querySelector('.product-documents')).getFiles();
        if (fichaFiles.length > 0) {
            formData.append('ficha_tecnica', fichaFiles[0].file);
        }

        // 🚀 Enviar vía AJAX
        $.ajax({
            url: 'store', // ⚠️ Asegúrate que esta ruta sea correcta
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

                    // Limpiar el formulario (opcional)
                    $('#formulario_create_item')[0].reset();
                    quill.root.innerHTML = '';
                    FilePond.find(document.querySelector('.product_imagen_portada')).removeFiles();
                    FilePond.find(document.querySelector('.product-Images')).removeFiles();
                    FilePond.find(document.querySelector('.product-documents')).removeFiles();

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
