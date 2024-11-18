<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <script src="js/scriptAgregar.js" defer></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <style>
        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
    <link href="css/estilosInicioPres.css" rel="stylesheet" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body oncontextmenu="return false;">
    <?php require("menuPrivado.php");
    require_once '../modelos/Carrito.php'; ?>

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-2">Carrito de compras</h3>
                            <div class="container-md">

                                <div id="carrito">

                                <?php
                                 if(!isset($_SESSION ['carrito']))
                                 $_SESSION ['carrito']=[];
                                foreach ($_SESSION ['carrito'] as $key => $value) {
                               
                                       echo "<div>".$value['descripcion']."</div>
                                        <div>".$value['precio']."</div>
                                        <div>".$value['cantidad']."</div>";

                                }

                                echo "Gracias por su paciencia, tiempo y pasión por enseñarnos... Lo apreciamos demasiado."
                                ?>

                                </div>

                                <form id="formularioCompra" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <p>
                                    <h3>Información de entrega</h3>
                                    </p>

                                    <p><label for="opcionEnvio">Opción de entrega:</label></p>
                                    <div>
                                        <p><input type="radio" id="envioDomicilio" name="opcionEnvio" value="domicilio" checked>
                                            <label for="envioDomicilio">A domicilio</label>
                                        </p>
                                        <p><input type="radio" id="recogerSucursal" name="opcionEnvio" value="sucursal">
                                            <label for="recogerSucursal">Recoger en sucursal</label>
                                        </p>
                                    </div>

                                    <label for="nombre">Nombre:</label>
                                    <p><input type="text" id="nombre" name="nombre" placeholder="Nombre apellido" required></p>
                                    <div id="nombre-error" class="error-message"></div>

                                    <div id="direccionDiv">
                                        <label for="direccion">Dirección:</label>
                                        <p><input type="text" id="direccion" name="direccion" placeholder="Calle, 1, Colonia" require></p>
                                        <div id="direccion-error" class="error-message"></div>
                                    </div>

                                    <p><button class="btn btn-primary" type="submit">Finalizar Compra</button></p>
                                </form>
                                <p><a class="btn btn-secondary" href="ordenaAqui.php">Volver a la tienda</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; DEVCO 2024</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="js/block.js"></script>
</body>

</html>