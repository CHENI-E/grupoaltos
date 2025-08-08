let offset = 0;
const limit = 20;

function obtenerFiltros() {
    // Captura múltiples categorías seleccionadas
    let categoriasSeleccionadas = [];
    $('.categoria-checkbox:checked').each(function () {
        categoriasSeleccionadas.push($(this).val());
    });

    return {
        offset,
        limit,
        nombre: $('#filtroNombre').val(),
        categorias: categoriasSeleccionadas,
        minPrecio: $('#minPrecio').val(),
        maxPrecio: $('#maxPrecio').val(),
        minDescuento: obtenerRangoDescuento()
    };
}

function obtenerRangoDescuento() {
    // Lee el radio seleccionado
    let radio = $('input[name="exampleRadios"]:checked').attr('id');
    switch (radio) {
        case 'chekDisc1': return 10;
        case 'chekDisc2': return 20;
        case 'chekDisc3': return 30;
        default: return null;
    }
}

function cargarProductos(reset = false) {
    if (reset) {
        offset = 0;
        $('#contenedor-productos').html('');
        $('#btn-cargar-mas').show();
        $('#sin-resultados').hide();
    }

    let filtros = obtenerFiltros();

    $.ajax({
        url: '/productos/lista',
        method: 'GET',
        data: filtros,
        beforeSend: function () {
            $('#spinner-carga').show();
        },
        success: function (data) {
            if (data.length === 0) {
                if (offset === 0) {
                    $('#sin-resultados').show(); // solo si es el primer resultado
                }
                $('#btn-cargar-mas').hide();
                return;
            }

            data.forEach(producto => {
                $('#contenedor-productos').append(`
                    <div class="col">
                        <div class="card border shadow-none">
                            <div class="position-relative overflow-hidden">
                                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                                    <a href="javascript:;"><i class="bi bi-heart"></i></a>
                                    <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                                    <a href="javascript:;"><i class="bi bi-zoom-in"></i></a>
                                </div>
                                <a href="/producto/${producto.slug}">
                                    <img src="${producto.imagen_portada}" class="card-img-top" alt="${producto.nombre}">
                                </a>
                            </div>
                            <div class="card-body border-top">
                                <h5 class="mb-0 fw-bold product-short-title">${producto.nombre}</h5>
                                <div class="product-price d-flex align-items-center gap-2 mt-2">
                                    ${
                                        producto.descuento != 0
                                            ? `<div class="h6 fw-bold">s/${producto.precio_oferta}</div>
                                               <div class="h6 fw-light text-muted text-decoration-line-through">s/${producto.precio}</div>
                                               <div class="h6 fw-bold text-danger">(${producto.descuento}%)</div>`
                                            : `<div class="h6 fw-bold">s/${producto.precio}</div>`
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            });

            offset += limit;
        },
        complete: function () {
            $('#spinner-carga').hide();
        },
        error: function () {
            $('#spinner-carga').hide();
            alert("Hubo un error al cargar los productos.");
        }
    });
}


// Inicializar
$(document).ready(function () {
    cargarProductos();
    let debounceTimer;

    $('#btn-cargar-mas').click(function () {
        cargarProductos();
    });

    // Cuando cambias un filtro
    $('.categoria-checkbox, input[name="exampleRadios"]').on('change keyup', function () {
        cargarProductos(true); // Reinicia
    });

    $('#filter_precio').on('click', function () {
        cargarProductos(true);
    });

    $('#filtroNombre').on('keyup', function () {
        clearTimeout(debounceTimer); // Limpiar si el usuario sigue escribiendo
        debounceTimer = setTimeout(function () {
            cargarProductos(true);
        }, 1000); // Espera 1000 ms (1 segundo)
    });
});
