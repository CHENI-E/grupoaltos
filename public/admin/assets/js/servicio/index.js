console.log('index de servicio');

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
            $('#input-description').val(data.descripcion);
            $('#input-estado').val(data.estado);
            $('#previewImage').attr('src', data.imagen ? `${APP_URL}${data.imagen}` : '#').fadeIn();
            $('#id_servicio').val(data.id);
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


$(document).on('submit', '#form_update_servicio', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
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