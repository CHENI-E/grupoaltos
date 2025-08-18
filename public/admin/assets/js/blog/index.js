console.log('esto es el index de blog');

$(document).ready(function() {
    $('#tabla_blog').DataTable({
      ajax: {
        url: 'blog/listBlog',
        dataSrc: ''
      },
      columns: [
        { data: null, title: 'NOMBRE', render:function(data, type, row) {
            return `<span style="font-weight: bold;">${data.nombre}</span>`;
          }
        },
        { data: 'autor', title: 'AUTOR' },
        { data: 'estado', title: 'ESTADO', render: function(data, type, row) {
            return data == '1' ? '<span class="badge bg-success-transparent">Activo</span>' : '<span class="badge bg-danger-transparent">Inactivo</span>';
          }
        },
        {
          data: null, title: 'ACCIONES', render: function(data, type, row) {
            return `<a class="text-primary mx-3 btn_editar" href="javascript:void(0)" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display: none;">
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

$(document).on('click', '.btn_eliminar', function() {
    const id = $(this).data('id');
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás recuperar este Blog!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `blog/delete/${id}`,
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
                            $('#tabla_blog').DataTable().ajax.reload();
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
                        text: 'No se pudo eliminar la categoría.'
                    });
                }
            });
        }
    });
});