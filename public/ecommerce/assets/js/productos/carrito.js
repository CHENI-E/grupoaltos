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
        carrito[index].cantidad += producto.cantidad;
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
                    <p class="mb-0"><strong>${item.cantidad} X S/${item.precio}</strong>
                    </p>
                </div>
                <div class="ms-auto fs-5">
                    <a href="javascript:" class="link-dark" onclick="eliminarDelCarrito(${item.id})"><i class="bi bi-trash"></i></a>
                </div>
            </div>
            <hr>
        `;
    });

    $('#contenedorCarrito').html(html);

    let totalProductos = carrito.length;

    $('.title_carrito').text(`${totalProductos} artículo${totalProductos !== 1 ? 's' : ''} en el carrito`);

    if (totalProductos > 0) {
        $('.cart-badge').text(totalProductos).show(); // Muestra la cantidad
    } else {
        $('.cart-badge').hide(); // Oculta si no hay productos
    }
}

$(document).ready(() => {
    actualizarVistaCarrito();
});


$(document).on('click', '.btnAgregarCarrito', function() {
    let producto = {
        id: $(this).data('id'),
        nombre: $(this).data('nombre'),
        precio: $(this).data('precio'),
        imagen: $(this).data('imagen'),
        cantidad: 1
    };
    agregarAlCarrito(producto);
});

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

    let telefono = "51961790583";
    let url = `https://wa.me/${telefono}?text=${encodeURIComponent(mensaje)}`;
    window.open(url, '_blank');
}


$('#btnCotizar').on('click', enviarWhatsApp);
