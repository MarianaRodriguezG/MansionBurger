<?php
// session_start();
// if (!isset($_SESSION["id"])) {
//   header('Location: index.html');
// }
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
?>

<header>
  <nav class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container-fluid justify-content-center justify-content-md-between">
      <div class="d-flex my-2 my-sm-0">
        <a class="navbar-brand me-2 mb-1 d-flex justify-content-center" href="indexPriv.php">
          <img src="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" height="30" alt="Logo" loading="lazy" />
        </a>
        <!-- Barra de búsqueda -->
        <form class="d-flex input-group w-auto my-auto">
          <input autocomplete="off" type="search" class="form-control rounded" placeholder="Buscar"
            style="min-width: 125px" />
          <span class="input-group-text border-0 d-none d-md-flex"><i class="fas fa-search"></i></span>
        </form>
      </div>

      <ul class="navbar-nav flex-row">
        <?php if ($_SESSION["rol"] != 'admin') { ?>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="menuVistaPriv.php"><i class="fas fa-utensils"></i> Ver Menu</a>
          </li>
        <?php } ?>
        <?php if ($_SESSION["rol"] == 'cliente') { ?>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="ordenaAqui.php"><i class="fas fa-shopping-bag"></i> Ordene aquí</a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="carrito.php"><i class="fas fa-shopping-cart"></i> Carrito</a>
          </li>
        <?php } ?>
        <?php if ($_SESSION["rol"] == 'admin' || $_SESSION["rol"] == 'empleado') { ?>
          <li class="nav-item dropdown me-3 me-lg-0">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-tools"></i> Gestión
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="listaProductos.php">Productos</a></li>
              <?php if ($_SESSION["rol"] == 'admin') { ?>
                <li><a class="dropdown-item" href="listaUsuarios.php">Usuarios</a></li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
      </ul>

      <!-- Botón de cierre de sesión -->
      <form class="d-flex col-4" action="cerrarSesion.php">
        <span class="navbar-text me-3"><?php echo $_SESSION["rol"]; ?></span> <!-- Mostrar el rol del usuario -->
        <button class="btn btn-light" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Salir</button>
      </form>
    </div>
  </nav>
</header>