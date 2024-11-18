<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/estilosInicioPres.css" rel="stylesheet" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png"
    type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body oncontextmenu="return false;">
    <?php require("menuPublico.php"); ?>
    <?php
    require_once "../datos/DAOUsuario.php";

    $error = false;
    $correo = $password = $form_validado = "";
    if (isset($_POST["txtEmail"]) && isset($_POST["txtPassword"])) {
        $correo = $_POST["txtEmail"];
        $password = $_POST["txtPassword"];
        if (filter_var($correo, FILTER_VALIDATE_EMAIL) !== false && strlen(trim($password)) > 0) {
            $dao = new DAOUsuario();
            $usuario = $dao->autenticar($correo, $password);
            if ($usuario != null) {
                session_start();
                if (isset($_SESSION["carrito"])) {
                    unset($_SESSION["carrito"]); // Limpiar el carrito
                }
                $_SESSION["id"] = $usuario->id;
                $_SESSION["rol"] = $usuario->rol;
                header("Location: home.php");
                exit();
            } else {
                $error = true;
            }
        } else {
            $form_validado = "validado";
        }
    }
    ?>

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-2">Iniciar Sesión</h3>

                            <div class="container my-4">

                                <div class="card-body">
                                    <form method="post" class="<?= $form_validado ?>">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="txtEmail" class="form-label">Correo electrónico</label>
                                                <input type="email" class="form-control" pattern="^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$"
                                                    required name="txtEmail" id="txtEmail" value="<?php echo htmlspecialchars($correo) ?>">
                                                <div>Ingresa el correo electrónico bajo un formato válido</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtPassword" class="form-label">Contraseña</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="txtPassword" maxlength="50" required
                                                        id="txtPassword" value="<?= htmlspecialchars($password) ?>">
                                                    <button class="input-group-text" type="button" id="btnMostrarOcultar">Ver</button>
                                                </div>
                                                <div>Ingresa la contraseña</div>
                                            </div>
                                            <?php if ($error): ?>
                                                <div class="alert alert-danger">
                                                    Usuario y/o contraseña incorrectos
                                                </div>
                                            <?php endif; ?>
                                            <div class="text-center">
                                                <button type="submit" id="btnAceptar" class="btn btn-pink"><i
                                                        class="fa-solid fa-circle-check"></i>
                                                    Acceder</button>
                                            </div>
                                            <div class="text-center mt-3">
                                                <a href="registro.php">¿No tienes cuenta? Regístrate aquí</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/login.js"></script>
    <script src="js/block.js"></script> 
</body>

</html>
