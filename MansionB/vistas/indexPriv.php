<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Niko´s Inicio</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-K9+P9uNZqAwqEwxUl0DF1N1hddNgNkErn9pKmwn/mTT5M1+RJmG4MeD1R+fPSu3SYQlwvJ9ZCDJ8T5I2wGHTQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link href="css/estilosInicioPres.css" rel="stylesheet" />
  <style>
    .carousel-caption h5,
    .carousel-caption p {
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
  </style>
</head>

<body oncontextmenu="return false;">
  <?php require("menuPrivado.php"); ?>

  <main>
    <header class="masthead">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="imgs/NikosBanner.jpg" class="d-block w-100" alt="Banner de Niko's Burger">
            <div class="carousel-caption d-none d-md-block">
              <h5>Sugerencia 1</h5>
              <p>Descubre el sabor inigualable de nuestra Hamburguesa Clásica. Una verdadera joya que captura la esencia de lo clásico en cada mordida.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/burger-promo-postcard-design-template-eeb0fcb526202a3a80b741664a709eff_screen.jpg?ts=1625090515" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Sugerencia 2</h5>
              <p>Prepárate para una explosión de sabor con nuestra Deliciosa Hamburguesa.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://img.freepik.com/vector-premium/promocion-comida-gratis-redes-sociales-plantilla-diseno-banner-menu-restaurante-gratis_115476-268.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Promo 3</h5>
              <p>Descubre la perfección en cada mordida con nuestra Súper Deliciosa Comida.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </header>

    <!-- About Section -->
    <section class="about-section text-center" id="about">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-lg-8">
            <h2 class="text-white mb-4">Bienvenidos a Nikos</h2>
            <p class="text-white-50">
              En Nikos, te ofrecemos una experiencia culinaria única con ingredientes frescos y de alta calidad.
              ¡Ven y descubre los sabores que todos aman!
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Projects Section -->
    <section class="projects-section bg-light" id="projects">
      <div class="container px-4 px-lg-5">
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
          <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="https://www.diariodesevilla.es/2021/12/13/sociedad/bebidas-dieteticas-adelgazar-engordan_1637846832_149028660_667x375.jpg" alt="..." /></div>
          <div class="col-xl-4 col-lg-5">
            <div class="featured-text text-center text-lg-left">
              <h4>Bebidas</h4>
              <p class="text-black-50 mb-0">En Nikos, disfruta de nuestras bebidas refrescantes.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-black">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Conoce Nuestra Sucursal</h4>
                <hr class="my-4 mx-auto" />
                <div class="small text-black-50">Av. Puebla #772, El Progreso, Moroleón, Gto.</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Contacto / Dudas / Sugerencias</h4>
                <hr class="my-4 mx-auto" />
                <div class="small text-black-50"><a href="#!">nikos@gimail.com</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Teléfono</h4>
                <hr class="my-4 mx-auto" />
                <div class="small text-black-50">+52 1 445 458 2901</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer bg-black small text-center text-white-50">
    <div class="container px-4 px-lg-5">Copyright &copy; Niko´s Burguer Sport 2024</div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Font Awesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
