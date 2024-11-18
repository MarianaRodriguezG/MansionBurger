function agregarAlCarrito(producto_id, producto_nombre, producto_precio) {
    $.ajax({
        url: 'agregar_al_carrito.php',
        method: 'POST',
        dataType: 'json',
        data: {
            producto_id: producto_id,
            producto_nombre: producto_nombre,
            producto_precio: producto_precio
        },
        success: function(response) {
            if (response.success) {
                alert('Producto agregado al carrito correctamente');
                // Aquí podrías redirigir al usuario a la página del carrito o realizar otras acciones necesarias
            } else {
                alert('Error al agregar el producto al carrito');
            }
        },
        error: function() {
            alert('Error de conexión al agregar el producto al carrito');
        }
    });
}
