<?php
session_start();
require_once '../modelos/Carrito.php';
require_once '../datos/DAOCarrito.php';

$daoCarrito = new DAOCarrito();

// Obtener productos del carrito desde la base de datos.
$productos = $daoCarrito->obtenerTodos();
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require("menuPrivado.php"); ?>

    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <!-- Carrito de compras -->
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0">Carrito de Compras</h1>
                                            <h6 class="mb-0 text-muted"><?php echo count($productos); ?> artículos</h6>
                                        </div>
                                        <hr class="my-4">

                                        <?php foreach ($productos as $producto): ?>
                                            <?php 
                                                $subtotal = $producto->precio * $producto->cantidad;
                                                $total += $subtotal;
                                            ?>
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="https://via.placeholder.com/100" class="img-fluid rounded-3" alt="<?php echo $producto->descripcion; ?>">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">Producto</h6>
                                                    <h6 class="mb-0"><?php echo $producto->descripcion; ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <form method="post" action="actualizarCarrito.php" class="d-flex">
                                                        <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                                                        <button type="submit" name="accion" value="restar" class="btn btn-link px-2">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="number" name="cantidad" value="<?php echo $producto->cantidad; ?>" class="form-control form-control-sm" min="1">
                                                        <button type="submit" name="accion" value="sumar" class="btn btn-link px-2">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">$<?php echo number_format($subtotal, 2); ?> MXN</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <form method="post" action="eliminarCarrito.php">
                                                        <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                                                        <button class="btn btn-link text-muted"><i class="fas fa-times"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        <?php endforeach; ?>

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="ordenaAqui.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Volver a la tienda</a></h6>
                                        </div>
                                    </div>
                                </div>

                                <!-- Resumen del pedido -->
                                <div class="col-lg-4 bg-body-tertiary">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Artículos <?php echo count($productos); ?></h5>
                                            <h5>$<?php echo number_format($total, 2); ?> MXN</h5>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Envío</h5>
                                        <div class="mb-4 pb-2">
                                            <select class="form-select">
                                                <option value="1">Envío estándar - $50.00 MXN</option>
                                                <option value="2">Entrega rápida - $100.00 MXN</option>
                                            </select>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Código de descuento</h5>
                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea2">Ingresa tu código</label>
                                            </div>
                                        </div>

                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total</h5>
                                            <h5>$<?php echo number_format($total + 50, 2); ?> MXN</h5>
                                        </div>

                                        <button type="button" class="btn btn-dark btn-block btn-lg">Finalizar compra</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
