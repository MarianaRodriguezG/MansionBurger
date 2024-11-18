<!doctype html>
<html lang="en">

<head>
<title>Niko´s Menú</title>
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

<body>
<body oncontextmenu="return false;">
  <?php require("menuPublico.php"); ?>
  <main>
<!-- About-->
<section class="about-section text-center" id="about">
  <div class="container px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-lg-8">
              <h2 class="text-white mb-4">NUESTRO MENÚ ES LA PUERTA AL SABOR</h2>
              <p class="text-white-50">
              Bienvenido a Mansión Burger, donde la autenticidad 
              es preparar para ti, las mejores hamburguesas.
              </p>
          </div>
      </div>
  </div>
</section>

    <div class="container my-4">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4 text-center">
          <img src="imgs/burger2.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140"
            role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
          </svg>
          <h2 class="fw-normal">Promoción 1</h2>
          <p>Hamburguesa doble con queso, papas fritas y bebida grande. ¡Perfecta para satisfacer tu hambre a solo $99.99!</p>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 text-center">
          <img src="imgs/nuggets.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
          </svg>
          <h2 class="fw-normal">Promoción 2</h2>
          <p>¡Martes de 2x1 en Nuggets! Ven con un amigo y disfruten de nuestros deliciosos nuggets de pollo crujientes por el precio de uno.          </p>
          <p><a class="btn btn-secondary" href="login.php">Inicia sesion para mas información &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 text-center">
          <img src="imgs/combo.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg"
            role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
          </svg>
          <h2 class="fw-normal">Promoción 3</h2>
          <p>Family Pack Especial: 4 hamburguesas clásicas, 4 papas fritas y 4 refrescos grandes por solo $244.99. ¡Ideal para compartir en familia!</p>
         
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">EL ZAGUÁN  <span
              class="text-body-secondary">Nuestra especialidad</span></h2>
          <p class="lead">
No está cerrada con tres candados, ni remachada. 
Carne jugosa a la parrilla, queso cheddar derretido, crujiente bacon y vegetales frescos, todo servido en un suave pan dorado. 
Cada mordida es una explosión de sabores que te hará volver por más.
          </p>
        </div>
        <div class="col-md-5">
          <img src="imgs/burger.jpg" class="rounded-circle" alt="">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row">
        <div class="col-md-7 order-md-2">
          <h2 class="fw-normal lh-1">LA PUERTA VERDE <span class="text-body-secondary">de la Casa:</span></h2>
          <p class="lead">
Refréscate con nuestra refrescante limonada. Hecha con limones frescos y un toque justo de dulzura,
 es la bebida perfecta para acompañar tu comida y mantenerte fresco durante todo el día.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img src="imgs/limonada.jpg" class="rounded-circle" alt="">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">Casita Café <span
              class="text-body-secondary">Helados:</span></h2>
          <p class="lead">Termina tu comida con algo dulce.
 Un brownie de chocolate, servido caliente y acompañado de una bola de helado de vainilla.
  El equilibrio perfecto entre lo cálido y lo frío, lo suave y lo crujiente.

</p>
        </div>
        <div class="col-md-5">
          <img src="imgs/helado.jpg"  class="rounded-circle"  alt="">
        </div>
      </div>

      <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

  </main>
   <!-- Footer-->
   <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Niko´s Burguer Sport 2024</div></footer>
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
    <script src="js/block.js"></script> 

</body>

</html>