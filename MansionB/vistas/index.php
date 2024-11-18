<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Inicio</title>
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

  <!-- Custom CSS for text shadow -->
  <style>
    .carousel-caption h5,
    .carousel-caption p {
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }
  </style>
</head>

<body oncontextmenu="return false;">
  <?php require("menuPublico.php"); ?>

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
            <img src="imgs/MansionBurgerBanner.jpg" class="d-block w-100" alt="Banner de Niko's Burger">
            <div class="carousel-caption d-none d-md-block">
              <h5>Sugerencia 1</h5>
              <p>Descubre el sabor inigualable de nuestra Hamburguesa Clásica. Una jugosa y tierna carne de res a la parrilla, perfectamente sazonada y cocinada a la perfección. Coronada con una rebanada de queso cheddar derretido, crujiente lechuga, rodajas de tomate fresco y pepinillos. Todo esto servido en un pan suave y dorado, con nuestra salsa especial que añade el toque final perfecto. ¡Una verdadera joya que captura la esencia de lo clásico en cada mordida!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://img.freepik.com/psd-gratis/plantilla-portada-facebook-deliciosa-hamburguesa-comida_106176-742.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Sugerencia 2</h5>
              <p>Prepárate para una explosión de sabor con nuestra Deliciosa Hamburguesa. Esta obra maestra comienza con una jugosa carne de res a la parrilla, acompañada de una generosa porción de queso suizo derretido. Añadimos cebolla caramelizada, crujiente bacon ahumado y rodajas de aguacate fresco, todo ello envuelto en un pan brioche dorado y suave. Nuestra salsa especial de la casa le da el toque final perfecto. Cada mordida es una combinación irresistible de texturas y sabores que te dejará deseando más.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://img.freepik.com/vector-premium/promocion-comida-gratis-redes-sociales-plantilla-diseno-banner-menu-restaurante-gratis_115476-268.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Promo 3</h5>
              <p>Descubre la perfección en cada mordida con nuestra Súper Deliciosa Comida. Esta hamburguesa premium empieza con una carne de res a la parrilla, jugosa y perfectamente sazonada. Le añadimos queso cheddar derretido, crujiente bacon, lechuga fresca y tomate maduro. Pero eso no es todo: también lleva aros de cebolla crujientes y una cremosa salsa de mostaza y miel, todo envuelto en un pan brioche esponjoso. Una combinación explosiva de sabores y texturas que hacen de cada bocado una experiencia inolvidable. ¡Una auténtica delicia para los amantes de la buena comida!</p>
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

    <!-- About-->
    <section class="about-section text-center" id="about">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-lg-8">
            <h2 class="text-white mb-4">Abrimos nuestras puertas</h2>
            <p class="text-white-50">
              En Mansión Burger, te ofrecemos una experiencia culinaria única con ingredientes frescos y de alta calidad.
              Disfruta de nuestras jugosas hamburguesas, crujientes acompañamientos y deliciosos postres en un ambiente acogedor.
              Ya sea en familia, con amigos o solo, este es el lugar perfecto para saborear momentos inolvidables.
              ¡Ven y descubre los sabores que todos aman!
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
      <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
          <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="https://www.diariodesevilla.es/2021/12/13/sociedad/bebidas-dieteticas-adelgazar-engordan_1637846832_149028660_667x375.jpg" alt="..." /></div>
          <div class="col-xl-4 col-lg-5">
            <div class="featured-text text-center text-lg-left">
              <h4>Bebidas</h4>
              <p class="text-black-50 mb-0">En Mansión Burger, cada comida se complementa con nuestras bebidas refrescantes, desde limonadas caseras hasta refrescantes sodas artesanales.
                Disfruta de una amplia selección de opciones que satisfarán tu sed y realzarán tu experiencia gastronómica.</p>
            </div>
          </div>
        </div>
        <!-- Project One Row-->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
          <div class="col-lg-6"><img class="img-fluid" src="https://images.aws.nestle.recipes/resized/8689e8d974203563ddcc9bbff91323c2_MG_CHORIZOBURGER_Main-880x660_1080_850.png" alt="..." /></div>
          <div class="col-lg-6">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-left">
                  <h4 class="text-white">Hamburguesas</h4>
                  <p class="mb-0 text-white-50">Preparamos nuestras hamburguesas con carne de primera calidad y los ingredientes más frescos para ofrecerte una experiencia de sabor inigualable.
                    Cada hamburguesa es una obra maestra de la arqutectura del sabor, desde la clásica hasta la más innovadora, diseñada para satisfacer tus antojos más exigentes.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Project Two Row-->
        <div class="row gx-0 justify-content-center">
          <div class="col-lg-6"><img class="img-fluid" src="https://phantom-marca.unidadeditorial.es/813d16708dc72860fd3cf319c9a245b5/resize/828/f/jpg/assets/multimedia/imagenes/2023/08/04/16911461030527.jpg" alt="..." /></div>
          <div class="col-lg-6 order-lg-first">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-right">
                  <h4 class="text-white">Papas</h4>
                  <p class="mb-0 text-white-50">Nuestras papas fritas son el acompañamiento perfecto para nuestras hamburguesas, doradas por fuera y tiernas por dentro.
                    Preparadas con esmero y sazonadas con nuestras mezclas especiales, te garantizamos que cada bocado será una deliciosa experiencia que no podrás resistir.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About-->
    <section class="about-section text-center" id="about">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-lg-8">
            <h2 class="text-white mb-4">¡Contáctanos!</h2>
            <p class="text-white-50">
              ¿Listo para disfrutar de una experiencia culinaria inolvidable en Mansión Burger?
              ¡Estamos aquí para atenderte! Si tienes alguna pregunta, comentario o simplemente quieres hacer una reserva, no dudes en ponerte en contacto con nosotros.
              ¡Esperamos verte pronto en la mansión para disfrutar de una comida que te encantará!
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact-->
    <section class="contact-section bg-black">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Conoce Nuestra Sucursal</h4>
                <hr class="my-4 mx-auto" />
                <div class="small text-black-50">Hey, nos estamos renovando, espera nuestro nuevo domicilio</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Contacto / Dudas / Sugerencias</h4>
                <hr class="my-4 mx-auto" />
                <div class="small text-black-50"><a href="#!">mansionburger@gimail.com</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Telefono de Wsp</h4>
                <hr class="my-4 mx-auto" />
                <div class="small text-black-50">+52 1 445 458 2901</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Footer-->
  <footer class="footer bg-black small text-center text-white-50">
    <div class="container px-4 px-lg-5">Powered by &copy; DEVCO</div>
  </footer>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  <script src="js/block.js"></script>
</body>

</html>
