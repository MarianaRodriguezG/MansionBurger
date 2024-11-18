<?php
require_once '../datos/DAOProducto.php';
require_once '../modelos/Carrito.php';
session_start();

if (isset($_POST['agregarbtn']) && isset($_POST['nombre']) && isset($_POST['precio'])) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    if (isset($_SESSION['carrito'][$_POST['agregarbtn']])) {
        $_SESSION['carrito'][$_POST['agregarbtn']]["cantidad"]++;
    } else {
        $_SESSION['carrito'][$_POST['agregarbtn']] = array(
            "descripcion" => $_POST['nombre'],
            "precio" => $_POST['precio'],
            "cantidad" => 1
        );
    }
}

$daoProducto = new DAOProducto();
$productos = $daoProducto->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ordena aquí Nikos</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-K9+P9uNZqAwqEwxUl0DF1N1hddNgNkErn9pKmwn/mTT5M1+RJmG4MeD1R+fPSu3SYQlwvJ9ZCDJ8T5I2wGHTQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/estilosInicioPres.css" rel="stylesheet" />
</head>

<body>
    <?php require("menuPrivado.php"); ?>

    <main>
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Ordena aquí</h2>
                        <p class="text-white-50">
                            ¿Listo para ordenar?
                            ¡Estamos aquí para atenderte!
                            Si tienes alguna pregunta, comentario o simplemente quieres hacer una reserva, no dudes en ponerte en contacto con nosotros.
                            ¡Esperamos verte pronto en Nikos para disfrutar de una comida que te encantará!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($productos as $producto) : ?>
                        <div class="col">
                            <form method="POST">
                                <div class="card shadow-sm">
                                    <img width="100%" height="225" src="<?php echo $producto->imagen; ?>" alt="<?php echo $producto->nombre; ?>">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo $producto->nombre; ?>:<br>
                                            <?php echo $producto->descripcion; ?>
                                            <br>
                                            Precio: $<?php echo number_format($producto->precio, 2); ?> MXN
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <input type="hidden" name="nombre" value="<?= $producto->nombre; ?>">
                                                <button type="submit" name="agregarbtn" class="btn btn-sm btn-outline-secondary" value="<?php echo $producto->id; ?>">
                                                    <i class="fas fa-cart-plus"></i> Agregar Carrito
                                                </button>
                                                <input type="hidden" name="precio" value="<?= $producto->precio; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Niko's Burguer Sport 2024</div>
    </footer>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
