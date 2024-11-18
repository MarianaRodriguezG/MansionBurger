<!doctype html>
<html lang="en">

<head>
    <title>Inventario de Productos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

<body oncontextmenu="return false;">
    <?php require("menuPrivado.php"); ?>

    <?php
    require_once("../datos/DAOProducto.php");

    $dao = new DAOProducto();
    $producto = null;

    $errors = [];

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $producto = $dao->obtenerUno($_GET['id']);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        // Validación
        if (empty($nombre)) {
            $errors[] = "El nombre es obligatorio.";
        } else if (preg_match('/^[\d\s!@#\$%\^\&*\)\(+=._-]/', $nombre[0])) {
            $errors[] = "El nombre no tiene un formato valido.";
        }

        if (empty($precio)) {
            $errors[] = "El precio es obligatorio.";
        } else if ($precio < 0) {
            $errors[] = "El precio no puede ser negativo.";
        }

        if (empty($stock)) {
            $errors[] = "El stock es obligatorio.";
        } else if ($stock < 0) {
            $errors[] = "El stock no puede ser negativo.";
        }

        if (empty($errors)) {
            if ($id) {
                $producto = new Producto(0, '', '', 0, '', 0);
                $producto->id = $id;
                $producto->nombre = $nombre;
                $producto->precio = $precio;
                $producto->stock = $stock;

                if ($dao->editar($producto)) {
                    $_SESSION['msg'] = "alert-success--Producto editado exitósamente";
                } else {
                    $_SESSION['msg'] = "alert-danger--No se ha podido editar el producto";
                }
            } else {
                $producto = new Producto(0, '', '', 0, '', 0);
                $producto->nombre = $nombre;
                $producto->precio = $precio;
                $producto->stock = $stock;
                // var_dump($producto);
                if ($dao->agregar($producto)) {
                    $_SESSION['msg'] = "alert-success--Producto agregado exitósamente";
                } else {
                    $_SESSION['msg'] = "alert-danger--No se ha podido agregar el producto";
                }
            }

            // header("Location: listaProductos.php");
            exit;
        }
    }
    ?>

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="container mt-2">
                                <h2><?php echo isset($producto) || isset($_POST['id']) ? 'Editar Producto' : 'Agregar Producto'; ?></h2>
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <form method="POST" action="registroProductos.php">
                                    <?php if (isset($producto) || isset($_POST['id'])) { ?>
                                        <input type="hidden" name="id" value="<?php echo isset($_POST['id']) ? htmlspecialchars($_POST['id']) : $producto->id; ?>">
                                    <?php } ?>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : (isset($producto) ? $producto->nombre : ''); ?>" required>
                                        <div id="nombreError" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : (isset($producto) ? $producto->nombre : ''); ?>" required>
                                        <div id="nombreError" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input type="number" min="1" class="form-control" id="precio" name="precio" value="<?php echo isset($_POST['precio']) ? htmlspecialchars($_POST['precio']) : (isset($producto) ? $producto->precio : ''); ?>" required>
                                        <div id="precioError" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : (isset($producto) ? $producto->nombre : ''); ?>" required>
                                        <div id="nombreError" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" min="1" class="form-control" id="stock" name="stock" value="<?php echo isset($_POST['stock']) ? htmlspecialchars($_POST['stock']) : (isset($producto) ? $producto->stock : ''); ?>" required>
                                        <div id="stockError" class="invalid-feedback"></div>
                                    </div>
                                    <div class="my-3">
                                        <p><button type="submit" class="btn btn-primary"><?php echo isset($producto) || isset($_POST['id']) ? 'Guardar Cambios' : 'Agregar Producto'; ?></button></p>
                                        <a href="listaProductos.php" class="btn btn-secondary">Volver</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Niko´s Burguer Sport 2024</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/validacionesProductos.js"></script>
    <script src="js/block.js"></script>
</body>

</html>