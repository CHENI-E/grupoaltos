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
                    <div class="col-md-4 col-sm-6 mb-4 d-flex">
                        <div class="card border shadow-none flex-fill d-flex flex-column" style="border-radius: 12px; overflow: hidden;">
                            <div class="position-relative overflow-hidden">
                                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                                    
                                    <a href="javascript:;" class="btnAgregarCarrito" data-id="${producto.id}" data-nombre="${producto.nombre}" data-precio="${ producto.descuento != 0 ? producto.precio_oferta : producto.precio}" data-imagen="${APP_URL}${producto.imagen_portada}"><i class="bi bi-basket3"></i></a>
                                    
                                </div>
                                <a href="/producto/${producto.slug}">
                                    <img src="${producto.imagen_portada}" class="card-img-top" alt="${producto.nombre}">
                                </a>
                            </div>
                            <div class="card-body border-top d-flex flex-column justify-content-between">
                                <!-- Nombre con máximo 2 líneas -->
                                <h5 class="mb-2  card-title-limit" style="color: #6c757d; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; font-size: 1.1rem;">${producto.nombre}</h5>



                                
                        
                                <div style="color: #6c757d; font-size: 13px; margin-bottom: 6px;">
                                Vendido por Grupo Altos
                                </div>

                                <div class="d-flex justify-content-between align-items-center" style="font-size: 13px; color: #6c757d;">
                                ${
                                    producto.descuento != 0
                                        ? `<span>Antes</span>
                                        <span style="text-decoration: line-through;">S/ ${producto.precio}</span>`
                                        : ''
                                }
                                </div>


                                <div class="d-flex justify-content-between align-items-center mt-1">
                                <span style="font-weight: bold;">Precio</span>
                                <div class="d-flex align-items-center">
                                    ${
                                        producto.descuento != 0
                                            ? `<span style="font-weight: bold; font-size: 1.0rem; margin-right: 6px;">S/ ${producto.precio_oferta}</span>
                                                <span class="badge-descuento">-${parseInt(producto.descuento)}%</span>`
                                            : `<span style="font-weight: bold; font-size: 1.0rem; margin-right: 6px;">S/ ${producto.precio}</span>`
                                    }
                                </div>
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
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(function () {
            cargarProductos(true);
        }, 1000); 
    });
});
