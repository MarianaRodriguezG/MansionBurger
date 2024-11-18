<?php
session_start();
require_once '../datos/DAOCarrito.php';

$daoCarrito = new DAOCarrito();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $daoCarrito->eliminar($id);

    header('Location: carrito.php');
    exit();
}
?>
