<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administración de Productos</title>
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
    require_once("../datos/DAOProducto.php");
  ?>
  <main>
    <div class="container pt-4">
      <?php
        if(isset($_POST["id"]) && is_numeric($_POST["id"])){
          //Se ha indicado que se debe eliminar un producto
          $dao = new DAOProducto();
          if($dao->eliminar($_POST["id"])){
            $_SESSION["msg"] = "alert-success--Producto eliminado exitósamente";
          } else {
            $_SESSION["msg"] = "alert-danger--No se ha podido eliminar el producto seleccionado debido a que está en uso";
          }
        }

        if(isset($_SESSION["msg"])){
          $msgInfo = explode("--", $_SESSION["msg"]);
          echo "<div class='alert $msgInfo[0]'>$msgInfo[1]</div>";
          unset($_SESSION["msg"]);
        }
      ?>
      <div>
        <a href="registroProductos.php" class="btn btn-primary">Agregar Producto</a>
      </div>  
      <table id="tblProductos" class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>descripcion</th>
            <th>Precio</th>
            <th>imagen</th>
            <th>Stock</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $lista = (new DAOProducto())->obtenerTodos();
            if($lista){
              foreach($lista as $producto){
                echo "<tr>
                  <td>{$producto->nombre}</td>
                  <td>{$producto->descripcion}</td>
                  <td>{$producto->precio}</td>
                  <td>{$producto->imagen}</td>
                  <td>{$producto->stock}</td>
                  <td>
                    <a href='registroProductos.php?id={$producto->id}' class='btn btn-primary'>Editar</a>
                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#mdlEliminar' 
                      value='{$producto->id}' nombre='{$producto->nombre}'>Eliminar</button>
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
          Está a punto de eliminar al producto <b id="ProductoEliminar"></b>, ¿Desea continuar?
        </div>
        <div class="modal-footer">
          <form action="listaProductos.php" method="post">
            <button type="submit" class="btn btn-danger" id="btnEliminar" name="id">Eliminar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
   <!-- Footer-->
   <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Niko´s Burguer Sport 2024</div></footer>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
        <script src="js/listaProductos.js"></script>
        <script src="js/block.js"></script> 
</body>
</html>
