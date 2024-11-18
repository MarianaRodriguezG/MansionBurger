<?php
require_once '../datos/DAOCarrito.php';
$daoCarrito = new DAOCarrito();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $accion = $_POST['accion'];

    // Obtener el producto actual.
    $producto = $daoCarrito->obtenerUno($id);

    if ($producto) {
        if ($accion === 'sumar') {
            $producto->cantidad += 1; // Incrementar cantidad
        } elseif ($accion === 'restar' && $producto->cantidad > 1) {
            $producto->cantidad -= 1; // Decrementar cantidad (mínimo 1)
        }

        // Actualizar en la base de datos.
        $daoCarrito->editar($producto);
    }
}

// Redirigir al carrito después de la acción.
header('Location: carrito.php');
exit();
