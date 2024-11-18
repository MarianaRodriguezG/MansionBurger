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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>¡Gracias por tu compra, <?php echo htmlspecialchars($compra['nombre']); ?>!</h2>
            </div>
            <div class="card-body">
                <p class="text-center">
                    Tu pedido será 
                    <?php echo htmlspecialchars($compra['opcionEnvio'] === 'sucursal' ? 'recogido en la sucursal' : 'enviado a: ' . $compra['direccion']); ?>
                </p>
                <h3 class="mt-4">Productos:</h3>
                <?php
                $total = 0;
                foreach ($compra['carrito'] as $item) {
                    echo "<div class='mb-3'>
                            <h5>{$item['nombre']}</h5>
                            <p>Precio: \${$item['precio']} MXN</p>
                            <p>Cantidad: {$item['cantidad']}</p>
                          </div>";
                    $total += $item['precio'] * $item['cantidad'];
                }
                ?>
                <hr>
                <h4>Total: <strong>$<?php echo number_format($total, 2); ?> MXN</strong></h4>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="ordenaAqui.php" class="btn btn-primary">Volver a la Tienda</a>
        </div>
    </div>
</body>
</html>
