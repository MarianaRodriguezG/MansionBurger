<?php
require_once '../datos/DAOCarrito.php';
$daoCarrito = new DAOCarrito();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Eliminar el producto del carrito.
    $daoCarrito->eliminar($id);
}

// Redirigir al carrito después de la acción.
header('Location: carrito.php');
exit();
