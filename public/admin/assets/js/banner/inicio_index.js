console.log('Banner Inicio JS Loaded');

$(document).ready(function() {
    $('#table_banners_inicio').DataTable({
      ajax: {
        url: 'bannerinicio/getdata',
        dataSrc: ''
      },
      columns: [
        { data: 'id', title: 'ID' },
        { data: 'titulo', title: 'Título' },
        { data: 'imagen', title: 'Imagen', render: function(data, type, row) {
            return `<img src="${APP_URL}${data}" alt="${row.titulo}" style="width: 100px; height: auto;">`;
          }
        },
        { data: null, title: 'Estado', render: function(data, type, row) {
            if(data.estado == '1'){
                return '<span class="badge bg-success-transparent">Activo</span>'
            }else{
                return '<span class="badge bg-danger-transparent">inactivo</span>'
            }
          }
        },
        {
          data: null, title: 'Acciones', render: function(data, type, row) {
            return `<a class="text-primary mx-3" href="javascript:void(0)" onclick="window.location.href='bannerinicio/edit/${row.id}'">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a class="text-danger mx-3" href="javascript:void(0)" onclick="deleteBanner(${row.id})">
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

function deleteBanner(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: '¡Este banner se eliminará permanentemente!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `bannerinicio/delete/${id}`,
                type: 'POST',
                data: {
                    _method: 'DELETE'
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        $('#table_banners_inicio').DataTable().ajax.reload();
                        Swal.fire(
                            '¡Eliminado!',
                            'El banner ha sido eliminado exitosamente.',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Error',
                            'Hubo un problema al eliminar el banner.',
                            'error'
                        );
                    }
                },
                error: function() {
                    Swal.fire(
                        'Error',
                        'No se pudo procesar la solicitud.',
                        'error'
                    );
                }
            });
        }
    });
}

