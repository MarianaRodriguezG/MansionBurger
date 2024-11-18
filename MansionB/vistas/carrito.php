<?php
session_start();
require_once '../datos/DAOCarrito.php';

$daoCarrito = new DAOCarrito();
$productos = $_SESSION['carrito'] ?? []; // Cargar productos desde la sesión
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php require("menuPrivado.php"); ?>

    <div class="container py-5">
        <h2 class="text-center mb-4">Carrito de Compras</h2>

        <?php if (!empty($productos)) : ?>
            <div class="row">
                <!-- Productos en el carrito -->
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php foreach ($productos as $id => $producto) : ?>
                                <?php 
                                    $subtotal = $producto['precio'] * $producto['cantidad'];
                                    $total += $subtotal;
                                ?>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-6">
                                        <h5><?php echo $producto['descripcion']; ?> x<?php echo $producto['cantidad']; ?></h5>
                                        <p class="text-muted">Precio unitario: $<?php echo number_format($producto['precio'], 2); ?> MXN</p>
                                    </div>
                                    <div class="col-md-3">
                                        <form method="POST" action="actualizarCarrito.php" class="d-flex">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button type="submit" name="accion" value="restar" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" class="form-control form-control-sm mx-2 text-center" style="width: 60px;" readonly>
                                            <button type="submit" name="accion" value="sumar" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <p class="fw-bold">Subtotal: $<?php echo number_format($subtotal, 2); ?> MXN</p>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <form method="POST" action="eliminarCarrito.php">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                            <h4 class="text-end fw-bold">Total: $<?php echo number_format($total, 2); ?> MXN</h4>
                        </div>
                    </div>
                </div>

                <!-- Resumen del Pedido -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resumen del Pedido</h5>
                            <hr>
                            <p class="d-flex justify-content-between">
                                <span>Total de artículos:</span>
                                <span><?php echo count($productos); ?></span>
                            </p>
                            <p class="d-flex justify-content-between">
                                <span>Subtotal:</span>
                                <span>$<?php echo number_format($total, 2); ?> MXN</span>
                            </p>
                            <p class="d-flex justify-content-between">
                                <span>Envío:</span>
                                <span>$50.00 MXN</span>
                            </p>
                            <hr>
                            <p class="d-flex justify-content-between fw-bold">
                                <span>Total:</span>
                                <span>$<?php echo number_format($total + 50, 2); ?> MXN</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario para finalizar compra -->
            <form id="formularioCompra" method="POST" action="procesarCompra.php">
                <h4 class="mt-4">Información de entrega</h4>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Tu nombre completo" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Calle, número, colonia" required>
                </div>
                <div class="mb-3">
                    <label>Opción de entrega:</label>
                    <div>
                        <input type="radio" id="envioDomicilio" name="opcionEnvio" value="domicilio" checked>
                        <label for="envioDomicilio">A domicilio</label>
                    </div>
                    <div>
                        <input type="radio" id="recogerSucursal" name="opcionEnvio" value="sucursal">
                        <label for="recogerSucursal">Recoger en sucursal</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Finalizar Compra</button>
            </form>
        <?php else : ?>
            <div class="alert alert-warning text-center">
                <p>El carrito está vacío. <a href="ordenaAqui.php" class="alert-link">Volver a la tienda</a></p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</body>

</html>
