<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administración de Usuarios</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
</head>

<body>
<body oncontextmenu="return false;">
  <?php 
    require("menuPrivado.php"); 
    require_once("../datos/DAOUsuario.php");
  ?>
  <main>
    <div class="container pt-4">
      <?php
        if(isset($_POST["id"]) && is_numeric($_POST["id"])){
          //Se ha indicado que se debe eliminar un usuario
          $dao = new DAOUsuario();
          if($dao->eliminar($_POST["id"])){
            $_SESSION["msg"] = "alert-success--Usuario eliminado exitósamente";
          } else {
            $_SESSION["msg"] = "alert-danger--No se ha podido eliminar al usuario seleccionado debido a que tiene procesos relacionados";
          }
        }

        if(isset($_SESSION["msg"])){
          $msgInfo = explode("--", $_SESSION["msg"]);
          echo "<div class='alert $msgInfo[0]'>$msgInfo[1]</div>";
          unset($_SESSION["msg"]);
        }
      ?>
      <div>
        <a href="registroUsuarios.php" class="btn btn-primary">Agregar</a>
      </div>
      <table id="tblUsuarios" class="table table-striped">
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Género</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $generos = ["M" => "Masculino", "F" => "Femenino", "I" => "Indeterminado"];
            $lista = (new DAOUsuario())->obtenerTodos();
            if($lista){
              foreach($lista as $usuario){
                echo "<tr>
                  <td>{$usuario->apellido1} {$usuario->apellido2} {$usuario->nombre}</td>
                  <td>{$usuario->correo}</td>
                  <td>{$usuario->rol}</td>
                  <td>{$generos[$usuario->genero]}</td>
                  <td>
                    <a href='registroUsuarios.php?id={$usuario->id}' class='btn btn-primary'>Editar</a>
                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#mdlEliminar' 
                      value='{$usuario->id}' nombre='{$usuario->apellido1} {$usuario->apellido2} {$usuario->nombre}'>Eliminar</button>
                  </td>
                </tr>";
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  <div class="modal" tabindex="-1" id="mdlEliminar" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Confirmar eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Está a punto de eliminar al usuario <b id="UsuarioEliminar"></b>, ¿Desea continuar?
        </div>
        <div class="modal-footer">
          <form action="listaUsuarios.php" method="post">
            <button type="submit" class="btn btn-danger" id="btnEliminar" name="id">Eliminar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="footer bg-black small text-center text-white-50">
    <div class="container px-4 px-lg-5">Copyright &copy; Niko´s Burguer Sport 2024</div>
  </footer>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
  <script src="js/listaUsuarios.js"></script>
  <script src="js/block.js"></script> 
</body>

</html>
