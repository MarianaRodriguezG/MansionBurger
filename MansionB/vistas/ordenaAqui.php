<?php
require_once '../datos/DAOProducto.php';
require_once '../modelos/Carrito.php';
session_start();
if(isset($_POST['agregarbtn'])&&isset($_POST['nombre'])&&isset($_POST['precio'])){
    if(!isset($_SESSION ['carrito']))
        $_SESSION ['carrito']=[];
    if(isset($_SESSION ['carrito'][$_POST['agregarbtn']])){
        $_SESSION ['carrito'][$_POST['agregarbtn']]["cantidad"]++;
    }else{
        $_SESSION ['carrito'][$_POST['agregarbtn']]= array("descripcion"=>$_POST['nombre'],"precio"=>$_POST['precio'],"cantidad"=>1) ;
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
    <title>Ordena aquí Nikos´s</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/estilosInicioPres.css" rel="stylesheet" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require("menuPrivado.php"); ?>

    <main>
        <header>
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
                                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary" onclick="ordenarAhora(<?php echo $producto->id; ?>, '<?php echo $producto->nombre; ?>', <?php echo $producto->precio; ?>)">Ordenar</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="agregarAlCarrito(<?php echo $producto->id; ?>, '<?php echo $producto->nombre; ?>', <?php echo $producto->precio; ?>)">Agregar Carrito</button> -->
                                                
                                                <input type="hidden" name="nombre" value="<?=$producto->nombre; ?>">
                                                <button type="submit" name="agregarbtn" class="btn btn-sm btn-outline-secondary" value="<?php echo $producto->id; ?>">Agregar Carrito</button>
                                                <input type="hidden" name="precio" value="<?=$producto->precio; ?>">
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

            <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¡Se agregó un producto!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            El producto se agregó al carrito correctamente.
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Niko's Burguer Sport 2024</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scriptAgregar.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    
</body>

</html>