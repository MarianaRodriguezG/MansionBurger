<?php
session_start();
require_once '../datos/DAOCarrito.php';

$daoCarrito = new DAOCarrito();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $accion = $_POST['accion'];

    $producto = $daoCarrito->obtenerUno($id);

    if ($producto) {
        if ($accion === 'sumar') {
            $producto->cantidad++;
        } elseif ($accion === 'restar' && $producto->cantidad > 1) {
            $producto->cantidad--;
        }
        $daoCarrito->editar($producto);
    }

    header('Location: carrito.php');
    exit();
}
?>
