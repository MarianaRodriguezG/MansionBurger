<?php
session_start();

if (!isset($_SESSION['compra'])) {
    echo "<p>No hay compra reciente.</p>";
    exit;
}

$compra = $_SESSION['compra'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Compra</title>
</head>
<body>
    <div id="confirmacion">
        <p>Gracias por tu compra, <?php echo htmlspecialchars($compra['nombre']); ?>!</p>
        <p>Tu pedido será <?php echo htmlspecialchars($compra['opcionEnvio'] === 'sucursal' ? 'recogido en la sucursal' : 'enviado a: ' . $compra['direccion']); ?></p>
        <h2>Productos:</h2>
        <?php
        $total = 0;
        foreach ($compra['carrito'] as $item) {
            echo "<div>
                    <h3>{$item['nombre']}</h3>
                    <p>Precio: \${$item['precio']} MXN</p>
                    <p>Cantidad: {$item['cantidad']}</p>
                  </div>";
            $total += $item['precio'] * $item['cantidad'];
        }
        echo "<div><h3>Total: \${$total} MXN</h3></div>";
        ?>
    </div>
</body>
</html>
