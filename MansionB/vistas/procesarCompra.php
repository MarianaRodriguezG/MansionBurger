<?php
session_start();
require_once '../datos/DAOCarrito.php'; // Conexión al carrito
require_once '../modelos/Carrito.php'; // Modelo del carrito
require_once '../datos/Conexion.php'; // Conexión a la base de datos

$daoCarrito = new DAOCarrito();

// Valida si se recibe el formulario correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge datos del formulario
    $nombre = trim($_POST['nombre']);
    $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : null;
    $opcionEnvio = $_POST['opcionEnvio'];

    // Verifica que el carrito no esté vacío
    $productos = $daoCarrito->obtenerTodos();
    if (empty($productos)) {
        header('Location: carrito.php'); // Redirige de vuelta al carrito si está vacío
        exit();
    }

    try {
        // Inicia una conexión para guardar los datos del pedido
        $conexion = Conexion::conectar();

        // Inserta los detalles del pedido en la tabla `pedidos`
        foreach ($productos as $producto) {
            $sql = "INSERT INTO pedidos (producto_id, descripcion, cantidad, precio, cliente, direccion, tipo_envio, fecha)
                    VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                $producto->id,
                $producto->descripcion,
                $producto->cantidad,
                $producto->precio,
                $nombre,
                $direccion,
                $opcionEnvio
            ]);
        }

        // Guarda los datos de la compra en la sesión para mostrar en la página de confirmación
        $_SESSION['compra'] = [
            'nombre' => $nombre,
            'direccion' => $direccion,
            'opcionEnvio' => $opcionEnvio,
            'carrito' => array_map(function ($producto) {
                return [
                    'nombre' => $producto->descripcion,
                    'precio' => $producto->precio,
                    'cantidad' => $producto->cantidad
                ];
            }, $productos)
        ];

        // Vacía el carrito
        $daoCarrito->vaciarCarrito();

        // Redirige a la página de confirmación
        header('Location: confirmacionCompra.php');
        exit();
    } catch (Exception $e) {
        // Si hay un error, redirige al carrito con un mensaje de error
        header('Location: carrito.php?error=procesar');
        exit();
    }
}
?>
