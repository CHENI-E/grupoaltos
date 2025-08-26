// Guardar carrito
function guardarCarrito(carrito) {
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

// Obtener carrito
function obtenerCarrito() {
    return JSON.parse(localStorage.getItem('carrito')) || [];
}

// Agregar producto
function agregarAlCarrito(producto) {
    let carrito = obtenerCarrito();
    let index = carrito.findIndex(item => item.id === producto.id);

    if (index >= 0) {
        carrito[index].cantidad += producto.cantidad; // sumamos la cantidad elegida
    } else {
        carrito.push(producto);
    }

    guardarCarrito(carrito);
    actualizarVistaCarrito();
}

// Eliminar producto
function eliminarDelCarrito(id) {
    let carrito = obtenerCarrito().filter(item => item.id !== id);
    guardarCarrito(carrito);
    actualizarVistaCarrito();
}

function actualizarVistaCarrito() {
    let carrito = obtenerCarrito();
    let html = '';

    carrito.forEach(item => {
        html += `
            <div class="d-flex align-items-center gap-3">
                <div class="bottom-product-img">
                    <a href="product-details.html">
                        <img src="${item.imagen}" width="60" alt="">
                    </a>
                </div>
                <div class="">
                    <h6 class="mb-0 fw-light mb-1">${item.nombre}</h6>
                    <p class="mb-0"><strong>${item.cantidad} X S/${item.precio}</strong></p>
                </div>
                <div class="ms-auto fs-5">
                    <a href="javascript:" class="link-dark" onclick="eliminarDelCarrito(${item.id})"><i class="bi bi-trash"></i></a>
                </div>
            </div>
            <hr>
        `;
    });

    $('#contenedorCarrito').html(html);

    // 🔹 Aquí contamos productos distintos (no cantidades)
    let productosDistintos = carrito.length;

    $('.title_carrito').text(`${productosDistintos} producto${productosDistintos !== 1 ? 's' : ''} en el carrito`);

    if (productosDistintos > 0) {
        $('.cart-badge').text(productosDistintos).show(); // solo productos distintos
    } else {
        $('.cart-badge').hide();
    }
}


$(document).ready(() => {
    actualizarVistaCarrito();
});

// Capturar producto con cantidad seleccionada
/* $(document).on('click', '.btnAgregarCarrito', function() {
    let cantidad = parseInt($('.qty-input').val()) || 1; // lee la cantidad del input

    let producto = {
        id: $(this).data('id'),
        nombre: $(this).data('nombre'),
        precio: $(this).data('precio'),
        imagen: $(this).data('imagen'),
        cantidad: cantidad
    };

    agregarAlCarrito(producto);
});
 */
$(document).on('click', '.btnAgregarCarrito', function() {
    let cantidad = parseInt($('.qty-input').val()) || 1; 

    let producto = {
        id: $(this).data('id'),
        nombre: $(this).data('nombre'),
        precio: $(this).data('precio'),
        imagen: $(this).data('imagen'),
        cantidad: cantidad
    };

    agregarAlCarrito(producto);

    // 🔹 Resetear cantidad a 1
    $('.qty-input').val(1);

    // 🔹 Cambiar botón a "Añadido" en verde
    let $btn = $(this);
    let originalText = $btn.html(); // guardamos el texto original

    $btn.removeClass('btn-primary').addClass('btn-success-cart')
        .html('<i class="bi bi-check2-circle me-2"></i>AÑADIDO');

    // 🔹 Después de 2 segundos, regresar al estado original
    setTimeout(() => {
        $btn.removeClass('btn-success-cart').addClass('btn-primary')
            .html(originalText);
    }, 2000);
});



// Enviar WhatsApp
function enviarWhatsApp() {
    let carrito = obtenerCarrito();
    if (carrito.length === 0) return alert('Tu carrito está vacío');

    let fecha = new Date().toLocaleDateString('es-PE');

    let mensaje = `*📄 PROFORMA / COTIZACIÓN*\n`;
    mensaje += `Fecha: ${fecha}\n\n`;

    let total = 0;
    carrito.forEach(item => {
        let precio = parseFloat(item.precio);
        let subtotal = precio * item.cantidad;
        total += subtotal;

        mensaje += `🛒 *${item.nombre}*\n`;
        mensaje += `   Cant: ${item.cantidad}\n`;
        mensaje += `   P.Unit: S/${precio.toFixed(2)}\n`;
        mensaje += `   Subtotal: S/${subtotal.toFixed(2)}\n\n`;
    });

    mensaje += `--------------------------------\n`;
    mensaje += `*TOTAL:* S/${total.toFixed(2)}\n\n`;
    mensaje += `Por favor, confirmar disponibilidad y formas de pago.\nGracias. 🙌`;

    let telefono = "51994119444";
    let url = `https://wa.me/${telefono}?text=${encodeURIComponent(mensaje)}`;
    window.open(url, '_blank');
}

$('#btnCotizar').on('click', enviarWhatsApp);