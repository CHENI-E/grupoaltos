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
