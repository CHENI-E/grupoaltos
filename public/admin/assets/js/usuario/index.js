console.log('admin usuario index.js');

$('.btn_delete_usuario').on('click', function() {
    const id = $(this).attr('data-id');
    console.log('Eliminar usuario con ID:', id);
    
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás deshacer esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/usuario/' + id, // ⚠️ Ruta RESTful generada por resource
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // asegúrate de tener esto en tu HTML
                },
                success: function(result) {
                    Swal.fire(
                        '¡Eliminado!',
                        'El usuario ha sido eliminado.',
                        'success'
                    );
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        '¡Error!',
                        'No se pudo eliminar el usuario.',
                        'error'
                    );
                }
            });
        }
    });
});

$('.btn_modificar_usuario').on('click', function() {
    const id = $(this).attr('data-id');
    console.log('Modificar usuario con ID:', id);

    $.ajax({
        url: '/admin/usuario/findUser/' + id, // ⚠️ Ruta RESTful generada por resource
        type: 'GET',
        beforeSend: function() {
            $('#input_id').val('');
            $('#input_nombre').val('');
            $('#input_email').val('');
            $('#input_estado').val('');
            $('#input_perfil').val('');
        },
        success: function(usuario) {  
            console.log(usuario);
            $('#input_id').val(usuario.id);
            $('#input_nombre').val(usuario.nombre);
            $('#input_email').val(usuario.email);
            $('#input_estado').val(usuario.estado);
            $('#input_perfil').val(usuario.perfil);
        },
        error: function(xhr, status, error) {
            Swal.fire(
                '¡Error!',
                'No se pudo cargar la información del usuario.',
                'error'
            );
        }
    });
});

$('#form_modificar_usuario').on('submit', function(e) {
    e.preventDefault(); // Evita que se envíe el formulario normalmente

    const id = $('#input_id').val(); // obtenemos el ID del usuario
    const formData = $(this).serialize(); // obtiene todos los campos

    $.ajax({
        url: '/admin/usuario/' + id, // la ruta de update usa /usuario/{id}
        type: 'POST', // usaremos POST pero indicamos PUT con _method
        data: formData,
        beforeSend: function() {
            // Puedes mostrar un loader o deshabilitar el botón
            $('.btn-primary').prop('disabled', true).text('Guardando...');
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Usuario actualizado correctamente.'
            }).then(() => {
                // Redireccionamos al listado o actualizamos vista
                window.location.href = '/admin/usuario';
            });
        },
        error: function(xhr) {
            let errores = xhr.responseJSON?.errors;
            let mensaje = 'Ocurrió un error al actualizar el usuario.';

            if (errores) {
                mensaje = Object.values(errores).join('\n');
            }

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: mensaje
            });
        },
        complete: function() {
            // Rehabilita el botón
            $('.btn-primary').prop('disabled', false).text('Guardar Cambios');
        }
    });
});


