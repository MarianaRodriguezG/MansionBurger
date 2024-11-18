<?php
session_start();
require_once '../datos/DAOCarrito.php';
require_once '../modelos/Carrito.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $daoCarrito = new DAOCarrito();
    $producto = new Carrito();

    // Obtén los datos enviados por el formulario
    $producto->descripcion = $_POST['descripcion'];
    $producto->precio = $_POST['precio'];
    $producto->cantidad = $_POST['cantidad'];

    // Agrega el producto a la base de datos
    $resultado = $daoCarrito->agregar($producto);

    if ($resultado) {
        header('Location: carrito.php');
    } else {
        echo "Error al agregar el producto al carrito.";
    }
    exit();
}
