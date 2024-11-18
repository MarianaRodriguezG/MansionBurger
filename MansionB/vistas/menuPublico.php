<header>
  <nav class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container-fluid justify-content-center justify-content-md-between">
      <div class="d-flex my-2 my-sm-0">
        <a class="navbar-brand me-2 mb-1 d-flex justify-content-center" href="#">
          <img src="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" height="30" alt="Logo" loading="lazy" />
        </a>

        <!-- Search form -->
        <form class="d-flex input-group w-auto my-auto">
          <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search"
            style="min-width: 125px" />
          <span class="input-group-text border-0 d-none d-md-flex"><i class="fas fa-search"></i></span>
        </form>
      </div>

      <ul class="navbar-nav flex-row">
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="menuVista.php">
            <i class="fas fa-utensils"></i> Ver Menu
          </a>
        </li>
        <!-- Badge -->
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="#">
            <span><i class="fas fa-shopping-cart"></i></span>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
        </li>
        <!-- Notification dropdown -->
        <li class="nav-item dropdown me-3 me-lg-0">
          <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Some news</a></li>
            <li><a class="dropdown-item" href="#">Another news</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <!-- Avatar -->
        <li class="nav-item">
          <form class="d-flex" action="login.php">
            <button class="btn btn-pink ms-auto" type="submit">
              <i class="fa-solid fa-circle-user"></i> Iniciar Sesión
            </button>
          </form>
        </li>
      </ul>
    </div>
  </nav>
</header>
