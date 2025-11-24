/**
 * ==========================================
 * SISTEMA DE CARRITO DE COMPRAS MEJORADO
 * Grupo Altos - Sistema de Cotización v2.0
 * ==========================================
 * 
 * Características implementadas:
 * - ✅ Persistencia con localStorage
 * - ✅ Control de cantidad por producto
 * - ✅ Notificaciones toast con vista previa
 * - ✅ Modal de confirmación profesional
 * - ✅ Mensaje de WhatsApp estructurado
 * - ✅ Animaciones y transiciones suaves
 * - ✅ Diseño responsive y accesible
 * - ✅ Cálculo automático de totales
 * - ✅ Validación de datos del cliente
 * 
 * Mejoras futuras sugeridas:
 * - ⭕ Integración con backend (guardar cotizaciones)
 * - ⭕ Sistema de descuentos por volumen
 * - ⭕ Historial de cotizaciones
 * - ⭕ Comparador de productos
 * - ⭕ Lista de deseos
 * - ⭕ Envío de cotización por email
 * ==========================================
 */

// Guardar carrito en localStorage
function guardarCarrito(carrito) {
    localStorage.setItem('carrito', JSON.stringify(carrito));
    localStorage.setItem('carrito_timestamp', new Date().getTime());
}

// Obtener carrito desde localStorage
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
    mostrarNotificacion('Producto agregado al carrito', 'success', producto);
}

// Eliminar producto
function eliminarDelCarrito(id) {
    let carrito = obtenerCarrito().filter(item => item.id !== id);
    guardarCarrito(carrito);
    actualizarVistaCarrito();
    mostrarNotificacion('Producto eliminado del carrito', 'info');
}

// Actualizar cantidad de producto
function actualizarCantidad(id, nuevaCantidad) {
    let carrito = obtenerCarrito();
    let index = carrito.findIndex(item => item.id === id);
    
    if (index >= 0) {
        if (nuevaCantidad > 0) {
            carrito[index].cantidad = nuevaCantidad;
            guardarCarrito(carrito);
            actualizarVistaCarrito();
        } else {
            eliminarDelCarrito(id);
        }
    }
}

// Calcular total del carrito
function calcularTotal() {
    let carrito = obtenerCarrito();
    let total = 0;
    carrito.forEach(item => {
        total += parseFloat(item.precio) * item.cantidad;
    });
    return total;
}

// Mostrar notificación toast mejorada
function mostrarNotificacion(mensaje, tipo = 'success', producto = null) {
    const iconos = {
        success: '<i class="bi bi-check-circle-fill me-2"></i>',
        error: '<i class="bi bi-x-circle-fill me-2"></i>',
        info: '<i class="bi bi-info-circle-fill me-2"></i>'
    };
    
    const colores = {
        success: '#28a745',
        error: '#dc3545',
        info: '#17a2b8'
    };
    
    let contenido = `
        <div class="d-flex align-items-center">
            <span style="color: ${colores[tipo]}; font-size: 20px;">${iconos[tipo]}</span>
            <span style="color: #333; font-weight: 500;">${mensaje}</span>
        </div>
    `;
    
    // Si hay información del producto, mostrar vista previa
    if (producto && tipo === 'success') {
        contenido += `
            <div class="d-flex align-items-center gap-2 mt-2 pt-2 border-top">
                <img src="${producto.imagen}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;">
                <div style="flex: 1;">
                    <small style="display: block; font-weight: 600; color: #333; font-size: 11px; line-height: 1.2;">${producto.nombre}</small>
                    <small style="color: #666; font-size: 10px;">${producto.cantidad} x S/${producto.precio}</small>
                </div>
            </div>
            <div class="mt-2">
                <button onclick="$('#offcanvasRight').offcanvas('show')" style="
                    width: 100%;
                    background: #042775;
                    color: white;
                    border: none;
                    padding: 6px 12px;
                    border-radius: 4px;
                    font-size: 11px;
                    font-weight: 600;
                    cursor: pointer;
                ">Ver Carrito</button>
            </div>
        `;
    }
    
    const $toast = $(`
        <div class="toast-notificacion" style="
            position: fixed;
            top: 80px;
            right: 20px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            z-index: 9999;
            border-left: 4px solid ${colores[tipo]};
            animation: slideInRight 0.3s ease-out;
            max-width: 320px;
            min-width: 280px;
        ">
            ${contenido}
        </div>
    `);
    
    $('body').append($toast);
    
    const duracion = producto ? 4000 : 3000;
    
    setTimeout(() => {
        $toast.fadeOut(300, function() {
            $(this).remove();
        });
    }, duracion);
}

function actualizarVistaCarrito() {
    let carrito = obtenerCarrito();
    let html = '';

    if (carrito.length === 0) {
        html = `
            <div class="carrito-vacio text-center py-5">
                <i class="bi bi-basket2" style="font-size: 4rem; color: #ddd;"></i>
                <p class="text-muted mt-3">Tu carrito está vacío</p>
                <a href="/productos" class="btn btn-primary btn-sm mt-2">Explorar productos</a>
            </div>
        `;
        $('#contenedorCarrito').html(html);
        $('.title_carrito').text('Carrito vacío');
        $('.cart-badge').hide();
        $('.cart-badge-minimal').removeClass('active');
        $('.offcanvas-footer').hide();
        return;
    }

    carrito.forEach(item => {
        const subtotal = (parseFloat(item.precio) * item.cantidad).toFixed(2);
        html += `
            <div class="cart-item-mejorado mb-3" data-id="${item.id}">
                <div class="d-flex gap-3 align-items-start">
                    <div class="cart-item-imagen" style="flex-shrink: 0;">
                        <img src="${item.imagen}" alt="${item.nombre}" style="width: 90px; height: 90px; object-fit: cover; border-radius: 8px; border: 1px solid #eee;">
                    </div>
                    <div class="cart-item-info flex-grow-1">
                        <h6 class="mb-1" style="font-size: 14px; font-weight: 600; color: #333; line-height: 1.3;">${item.nombre}</h6>
                        <p class="mb-2" style="font-size: 13px; color: #666;">Precio: S/${parseFloat(item.precio).toFixed(2)}</p>
                        
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="cantidad-control d-flex align-items-center gap-2" style="background: #f5f5f5; border-radius: 6px; padding: 4px 8px;">
                                <button class="btn-cantidad-minus btn btn-sm" onclick="actualizarCantidad(${item.id}, ${item.cantidad - 1})" style="border: none; background: transparent; color: #666; padding: 0; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span style="font-weight: 600; font-size: 14px; min-width: 25px; text-align: center;">${item.cantidad}</span>
                                <button class="btn-cantidad-plus btn btn-sm" onclick="actualizarCantidad(${item.id}, ${item.cantidad + 1})" style="border: none; background: transparent; color: #666; padding: 0; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            
                            <div class="d-flex align-items-center gap-2">
                                <span style="font-weight: 700; font-size: 15px; color: #042775;">S/${subtotal}</span>
                                <button class="btn btn-sm" onclick="eliminarDelCarrito(${item.id})" style="border: none; background: transparent; color: #dc3545; padding: 4px 8px;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="margin: 12px 0; border-top: 1px solid #eee;">
        `;
    });

    // Agregar resumen del total
    const total = calcularTotal();
    html += `
        <div class="carrito-resumen mt-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
            <div class="d-flex justify-content-between mb-2">
                <span style="color: #666;">Subtotal:</span>
                <span style="font-weight: 600;">S/${total.toFixed(2)}</span>
            </div>
            <div class="d-flex justify-content-between" style="padding-top: 10px; border-top: 2px solid #dee2e6;">
                <span style="font-weight: 700; font-size: 16px;">Total:</span>
                <span style="font-weight: 700; font-size: 18px; color: #042775;">S/${total.toFixed(2)}</span>
            </div>
        </div>
    `;

    $('#contenedorCarrito').html(html);

    // Actualizar contador
    let totalProductos = carrito.reduce((sum, item) => sum + item.cantidad, 0);
    $('.title_carrito').text(`Mi Carrito (${carrito.length} producto${carrito.length !== 1 ? 's' : ''})`);
    
    // Actualizar badge del navbar
    if (totalProductos > 0) {
        $('.cart-badge').text(totalProductos).show();
        $('.cart-badge-minimal').text(totalProductos).addClass('active');
    } else {
        $('.cart-badge').hide();
        $('.cart-badge-minimal').removeClass('active');
    }
    
    $('.offcanvas-footer').show();
}


// Vaciar todo el carrito
function vaciarCarrito() {
    if (confirm('¿Estás seguro de que deseas vaciar el carrito?')) {
        localStorage.removeItem('carrito');
        actualizarVistaCarrito();
        mostrarNotificacion('Carrito vaciado', 'info');
    }
}

// Añadir CSS para las animaciones al DOM
function agregarEstilosAnimacion() {
    if (!document.getElementById('carrito-animations')) {
        const style = document.createElement('style');
        style.id = 'carrito-animations';
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes fadeOut {
                from {
                    opacity: 1;
                    transform: scale(1);
                }
                to {
                    opacity: 0;
                    transform: scale(0.8);
                }
            }
            
            .cart-item-mejorado {
                animation: fadeIn 0.3s ease;
            }
            
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        `;
        document.head.appendChild(style);
    }
}

// Verificar carrito abandonado
function verificarCarritoAbandonado() {
    const timestamp = localStorage.getItem('carrito_timestamp');
    const carrito = obtenerCarrito();
    
    if (carrito.length > 0 && timestamp) {
        const tiempoTranscurrido = new Date().getTime() - parseInt(timestamp);
        const horasTranscurridas = tiempoTranscurrido / (1000 * 60 * 60);
        
        // Si han pasado más de 24 horas, mostrar recordatorio
        if (horasTranscurridas > 24) {
            setTimeout(() => {
                const recordar = confirm(
                    `Tienes ${carrito.length} producto(s) en tu carrito desde hace más de un día.\n\n` +
                    '¿Deseas continuar con tu cotización?'
                );
                
                if (recordar) {
                    $('#offcanvasRight').offcanvas('show');
                } else {
                    const vaciar = confirm('¿Deseas vaciar el carrito?');
                    if (vaciar) {
                        localStorage.removeItem('carrito');
                        localStorage.removeItem('carrito_timestamp');
                        actualizarVistaCarrito();
                    }
                }
            }, 2000);
        }
    }
}

// Nota: Se eliminó el beforeunload para mejorar la experiencia del usuario
// El carrito se guarda automáticamente en localStorage

// Función para animar el botón del carrito del navbar
function animarBotonCarrito() {
    const $btnCarrito = $('.btn-carrito-minimal');
    $btnCarrito.addClass('bounce');
    setTimeout(() => {
        $btnCarrito.removeClass('bounce');
    }, 400);
}

$(document).ready(() => {
    actualizarVistaCarrito();
    agregarEstilosAnimacion();
    verificarCarritoAbandonado();
    
    // Log de información para debugging (solo en desarrollo)
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        console.log('%c🛒 Sistema de Carrito v2.2 - Diseño Minimalista', 'color: #042775; font-weight: bold; font-size: 14px;');
        console.log('Productos en carrito:', obtenerCarrito().length);
    }
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

    // 🔹 Cambiar botón a "Añadido" en verde con animación mejorada
    let $btn = $(this);
    let originalText = $btn.html();
    let originalClasses = $btn.attr('class');

    $btn.removeClass('btn-primary')
        .addClass('btn-success-cart')
        .html('<i class="bi bi-check2-circle me-2"></i>AÑADIDO AL CARRITO')
        .css({
            'transform': 'scale(1.05)',
            'box-shadow': '0 6px 20px rgba(40, 167, 69, 0.4)'
        });

    // Animar el badge del carrito y el botón del navbar
    $('.cart-badge').addClass('animate-badge');
    $('.btn-carrito-minimal').addClass('bounce');
    
    setTimeout(() => {
        $('.btn-carrito-minimal').removeClass('bounce');
    }, 400);

    // 🔹 Después de 2.5 segundos, regresar al estado original
    setTimeout(() => {
        $btn.removeClass('btn-success-cart')
            .attr('class', originalClasses)
            .html(originalText)
            .css({
                'transform': 'scale(1)',
                'box-shadow': ''
            });
        $('.cart-badge').removeClass('animate-badge');
    }, 2500);
});



// Abrir modal de confirmación antes de enviar
function abrirModalCotizacion() {
    let carrito = obtenerCarrito();
    if (carrito.length === 0) {
        mostrarNotificacion('Tu carrito está vacío', 'error');
        return;
    }
    
    // Generar resumen de productos
    let htmlProductos = '';
    let total = calcularTotal();
    
    carrito.forEach(item => {
        const subtotal = (parseFloat(item.precio) * item.cantidad).toFixed(2);
        htmlProductos += `
            <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                <img src="${item.imagen}" alt="${item.nombre}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                <div class="flex-grow-1">
                    <h6 class="mb-1" style="font-size: 13px;">${item.nombre}</h6>
                    <small class="text-muted">${item.cantidad} x S/${parseFloat(item.precio).toFixed(2)}</small>
                </div>
                <div>
                    <strong style="color: #042775;">S/${subtotal}</strong>
                </div>
            </div>
        `;
    });
    
    $('#resumenProductosModal').html(htmlProductos);
    $('#totalModal').text(`S/${total.toFixed(2)}`);
    
    // Mostrar modal
    const modal = new bootstrap.Modal(document.getElementById('modalCotizacion'));
    modal.show();
}

// Enviar WhatsApp con datos del formulario
function enviarWhatsApp() {
    let carrito = obtenerCarrito();
    if (carrito.length === 0) {
        mostrarNotificacion('Tu carrito está vacío', 'error');
        return;
    }

    // Obtener datos del formulario
    const nombreCliente = $('#nombreCliente').val().trim();
    const empresaCliente = $('#empresaCliente').val().trim();
    const mensajeAdicional = $('#mensajeAdicional').val().trim();

    if (!nombreCliente) {
        mostrarNotificacion('Por favor ingresa tu nombre', 'error');
        return;
    }

    let fecha = new Date().toLocaleDateString('es-PE', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    });
    let hora = new Date().toLocaleTimeString('es-PE', { 
        hour: '2-digit', 
        minute: '2-digit' 
    });

    let mensaje = `*╔═══════════════════════╗*\n`;
    mensaje += `*║  📋 SOLICITUD DE COTIZACIÓN  ║*\n`;
    mensaje += `*╚═══════════════════════╝*\n\n`;
    
    mensaje += `*┌─ DATOS DEL CLIENTE ─────────┐*\n`;
    mensaje += `│ 👤 *Nombre:* ${nombreCliente}\n`;
    if (empresaCliente) {
        mensaje += `│ 🏢 *Empresa:* ${empresaCliente}\n`;
    }
    mensaje += `│ 📅 *Fecha:* ${fecha}\n`;
    mensaje += `│ 🕐 *Hora:* ${hora}\n`;
    mensaje += `*└────────────────────────────┘*\n\n`;
    
    mensaje += `*┌─ DETALLE DE PRODUCTOS ──────┐*\n\n`;

    let total = 0;
    carrito.forEach((item, index) => {
        let precio = parseFloat(item.precio);
        let subtotal = precio * item.cantidad;
        total += subtotal;

        mensaje += `*${index + 1}. ${item.nombre}*\n`;
        mensaje += `├ 📦 Cantidad: *${item.cantidad} unidad(es)*\n`;
        mensaje += `├ 💰 Precio Unit.: *S/ ${precio.toFixed(2)}*\n`;
        mensaje += `└ 💵 Subtotal: *S/ ${subtotal.toFixed(2)}*\n\n`;
    });

    mensaje += `*┌─ RESUMEN ───────────────────┐*\n`;
    mensaje += `│ 🔢 Total de productos: *${carrito.length}*\n`;
    mensaje += `│ 📦 Unidades totales: *${carrito.reduce((sum, item) => sum + item.cantidad, 0)}*\n`;
    mensaje += `│\n`;
    mensaje += `│ *💰 TOTAL ESTIMADO:*\n`;
    mensaje += `│ *S/ ${total.toFixed(2)}*\n`;
    mensaje += `*└────────────────────────────┘*\n\n`;
    
    if (mensajeAdicional) {
        mensaje += `*┌─ MENSAJE ADICIONAL ─────────┐*\n`;
        mensaje += `${mensajeAdicional}\n`;
        mensaje += `*└────────────────────────────┘*\n\n`;
    }
    
    mensaje += `━━━━━━━━━━━━━━━━━━━━━━━━\n\n`;
    mensaje += `Por favor, confirme:\n`;
    mensaje += `✅ Disponibilidad de productos\n`;
    mensaje += `✅ Formas de pago disponibles\n`;
    mensaje += `✅ Tiempo de entrega estimado\n`;
    mensaje += `✅ Precio final con IGV incluido\n\n`;
    mensaje += `_Quedamos atentos a su respuesta._\n`;
    mensaje += `*¡Gracias por su atención! 🙌*`;

    let telefono = "51994119444";
    let url = `https://wa.me/${telefono}?text=${encodeURIComponent(mensaje)}`;
    
    // Cerrar modal y abrir WhatsApp
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalCotizacion'));
    modal.hide();
    
    window.open(url, '_blank');
    
    // Opcional: Limpiar carrito después de enviar
    // localStorage.removeItem('carrito');
    // actualizarVistaCarrito();
}

// Event listeners
$('#btnCotizar').on('click', abrirModalCotizacion);
$('#btnEnviarCotizacion').on('click', enviarWhatsApp);

// Limpiar formulario al cerrar modal
$('#modalCotizacion').on('hidden.bs.modal', function () {
    $('#nombreCliente').val('');
    $('#empresaCliente').val('');
    $('#mensajeAdicional').val('');
});