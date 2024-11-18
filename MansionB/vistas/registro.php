<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<body oncontextmenu="return false;">
  <?php 
  require("menuPublico.php");
  require_once ("../datos/DAOUsuario.php");
  
  $usuario = new Usuario();
  $error = false;
  $errorCorreoDuplicado = false; // Nueva variable para error de correo duplicado
  $validado = "";

  if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
      // Cuando se recibe el id entonces hay que obtener los datos del usuario
      $usuario = (new DAOUsuario())->obtenerUno((int) $_GET["id"]);
      if ($usuario == null) {
          $_SESSION["msg"] = "alert-warning--Usuario no encontrado";
          header("Location: listaUsuarios.php");
          exit;
      }
  } elseif (count($_POST) > 0) {
      // Verificar si llegaron datos por POST es porque se está agregando o editando
      $usuario->id = $_POST["txtId"];
      $usuario->nombre = $_POST["txtNombre"];
      $usuario->apellido1 = $_POST["txtApellido1"];
      $usuario->apellido2 = $_POST["txtApellido2"];
      $usuario->correo = $_POST["txtEmail"];
      if ($usuario->id == 0) {
          $usuario->contrasenia = $_POST["txtPassword"];
          $usuario->contrasenia = $_POST["txtConfirmarPassword"];
      }
      $usuario->genero = $_POST["rbtGenero"];
      $usuario->rol = $_POST["cboRol"];
      $usuario->telefono = $_POST["txtTelefono"];

      // Validar los datos
      if (
          strlen($usuario->nombre) >= 2 && strlen($usuario->nombre) <= 30 &&
          strlen($usuario->apellido1) >= 2 && strlen($usuario->apellido1) <= 30 &&
          (strlen($usuario->apellido2) == 0 || strlen($usuario->apellido2) >= 2 && strlen($usuario->apellido2) <= 30) &&
          (strlen($usuario->telefono) == 0 || preg_match("/^[0-9]{10}$/", $usuario->telefono)) &&
          filter_var($usuario->correo, FILTER_VALIDATE_EMAIL) != false &&
          ($usuario->rol == 'admin' || $usuario->rol == 'empleado' || $usuario->rol == 'cliente') &&
          ($usuario->genero == 'M' || $usuario->genero == 'F' || $usuario->genero == 'I')
      ) {
          $dao = new DAOUsuario();
          if ($usuario->id == 0) {
              // Revisar la contraseña
              if (strlen($usuario->contrasenia) >= 6 && strlen($usuario->contrasenia) <= 20) {
                  try {
                      if ($dao->agregar($usuario) > 0) {
                          $_SESSION["msg"] = "alert-success--Usuario almacenado correctamente";
                          header("Location: login.php");
                          exit;
                      } else {
                          $error = true;
                      }
                  } catch (Exception $e) {
                      if (strpos($e->getMessage(), 'correo duplicado') !== false) {
                          $errorCorreoDuplicado = true;
                      } else {
                          $error = true;
                      }
                  }
              } else {
                  $validado = "validado";
              }
          } else {
              if ($dao->editar($usuario)) {
                  $_SESSION["msg"] = "alert-success--Usuario almacenado correctamente";
                  header("Location: listaUsuarios.php");
                  exit;
              } else {
                  $error = true;
              }
          }
      } else {
          $validado = "validado";
      }
  }
  ?>

  <main>
  <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                        
                        <h3 class="mb-2">Registrate</h3>


    <div class="container pt-4">
      <form id="frmRegistro" novalidate method="post" action="registro.php" class="<?=$validado?>">
        <div class="row">
          <input type="hidden" id="txtId" name="txtId" value="<?=htmlspecialchars($usuario->id ?? '')?>">
          
          <div class="mb-2 col-4">
            <label for="txtNombre">Nombre(s)</label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" required minlength="2" maxlength="30"
            value="<?=htmlspecialchars($usuario->nombre ?? '')?>">
            <div>El nombre es obligatorio (entre 2 y 30 caracteres)</div>
          </div>
          <div class="mb-2 col-4">
            <label for="txtApellido1">Primer apellido</label>
            <input type="text" class="form-control" id="txtApellido1" name="txtApellido1" required minlength="2" maxlength="30"
            value="<?=htmlspecialchars($usuario->apellido1 ?? '')?>">
            <div>El primer apellido es obligatorio (entre 2 y 30 caracteres)</div>
          </div>
          <div class="mb-2 col-4">
            <label for="txtApellido2">Segundo apellido</label>
            <input type="text" class="form-control" id="txtApellido2" name="txtApellido2" minlength="2" maxlength="30"
            value="<?=htmlspecialchars($usuario->apellido2 ?? '')?>">
            <div>El segundo apellido debe tener entre 2 y 30 caracteres</div>
          </div>
          
          <div class="mb-2 col-12">
            <label for="txtEmail">Correo</label>
            <input type="email" class="form-control" id="txtEmail" name="txtEmail" required
            value="<?=htmlspecialchars($usuario->correo ?? '')?>">
            <div>El email es obligatorio y debe tener un formato válido</div>
          </div>
          <?php 
          if($usuario->id == 0){
          ?>
          <div class="mb-2 col-6">
            <label for="txtPassword">Contraseña</label>
            <input type="password" class="form-control" id="txtPassword" name="txtPassword" minlength="6" maxlength="20" required
            value="<?=htmlspecialchars($usuario->contrasenia ?? '')?>">
            <div>La contraseña es obligatoria (entre 6 y 20 caracteres)</div>
          </div>
          <div class="mb-2 col-6">
            <label for="txtConfirmarPassword">Confirmar contraseña</label>
            <input type="password" class="form-control" id="txtConfirmarPassword" name="txtConfirmarPassword" minlength="6" maxlength="20" required
            value="<?=htmlspecialchars($usuario->contrasenia ?? '')?>">
            <div>La contraseña es obligatoria y deben coincidir</div>
          </div>
          <?php
          }
          ?>
          <div class="mb-2 col-6">
            <label for="txtTelefono">Teléfono</label>
            <input type="tel" class="form-control" id="txtTelefono" name="txtTelefono" minlength="10" maxlength="10"
            value="<?=htmlspecialchars($usuario->telefono ?? '')?>">
            <div>El teléfono debe tener 10 dígitos</div>
          </div>
          <div class="mb-2 col-6">
            <label for="cboRol">Rol</label>
            <select name="cboRol" id="cboRol" class="form-select" required>
              <option value="">Seleccione el rol</option>
              <option value="cliente" <?= $usuario->rol == 'cliente' ? 'selected' : '' ?>>Cliente</option>
            </select>
            <div>Se debe indicar un rol para el usuario</div>
          </div>
          <fieldset class="col-12 border rounded p-3 mb-2">
            <legend>Género</legend>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rbtGenero" id="rbtMasculino" value="M" <?= $usuario->genero == 'M' ? 'checked' : '' ?>>
              <label class="form-check-label" for="rbtMasculino">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rbtGenero" id="rbtFemenino" value="F" <?= $usuario->genero == 'F' ? 'checked' : '' ?>>
              <label class="form-check-label" for="rbtFemenino">Femenino</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rbtGenero" id="rbtIndeterminado" value="I" <?= $usuario->genero == 'I' ? 'checked' : '' ?>>
              <label class="form-check-label" for="rbtIndeterminado">Indeterminado</label>
            </div>
          </fieldset>
        </div>
      </form>
      <?php
      if ($error) {
      ?>
        <div class="alert alert-danger alert-dismissible fade show">
          El usuario no se ha podido almacenar, use un correo diferente 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      } elseif ($errorCorreoDuplicado) {
      ?>
        <div class="alert alert-warning alert-dismissible fade show">
          El correo ya está en uso, por favor use un correo diferente 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>
      <div class="my-3">
        <button type="submit" class="btn btn-primary" id="btnAceptar" form="frmRegistro">Aceptar</button>
        <a href="login.php" class="btn btn-secondary">Volver</a>
      </div>
    </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
  
  <!-- Footer-->
  <footer class="footer bg-black small text-center text-white-50">
    <div class="container px-4 px-lg-5">Copyright &copy; Niko´s Burguer Sport 2024</div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/registroUsuarios.js"></script>
  <script src="js/block.js"></script> 
</body>

</html>


