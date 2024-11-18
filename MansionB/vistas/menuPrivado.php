<?php
session_start();
if (!isset($_SESSION["id"])) {
  header('Location: index.html');
}
?>
<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand col-2" href="#">
        <img src="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      </a>
      <a class="navbar-brand" href="indexPriv.php">Mansion Burger</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if($_SESSION["rol"] == 'admin' || $_SESSION["rol"] == 'empleado') { ?>
          <?php } ?>
          <?php if($_SESSION["rol"] != 'admin') { ?>
            <li class="nav-item">
              <a class="nav-link" href="menuVistaPriv.php">Ver Menu</a>
            </li>
          <?php } ?>
          <?php if($_SESSION["rol"] == 'cliente') { ?>
            <li class="nav-item">
              <a class="nav-link" href="ordenaAqui.php">Ordene aquí</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" target="_blank" href="carrito.php">Carrito</a>
            </li>
          <?php } ?>
          <?php if($_SESSION["rol"] == 'admin' || $_SESSION["rol"] == 'empleado') { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Gestión
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="listaProductos.php">Productos</a></li>
                <?php if($_SESSION["rol"] == 'admin') { ?>
                  <li><a class="dropdown-item" href="listaUsuarios.php">Usuarios</a></li>
                <?php } ?>
              </ul>
            </li>
          <?php } ?>
        </ul>
        <form class="d-flex col-4" action="cerrarSesion.php">
          <span class="navbar-text me-3"><?php echo $_SESSION["rol"]; ?></span> <!-- Mostrar el rol del usuario -->
          <button class="btn btn-light" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Salir</button>
        </form>
      </div>
    </div>
  </nav>
</header>
