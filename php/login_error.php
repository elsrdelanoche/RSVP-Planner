<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="../images/logo_blanco.png" type="image/x-icon">

  <title>Iniciar sesion</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <!-- header section -->
    <div class="hero_area">
      <header class="header_section">
        <div class="header_bottom">
          <div class="container-fluid" style="background-color: #1C1C1C;">
            <nav class="navbar navbar-expand-lg custom_nav-container">
              <a class="navbar-brand" href="../index.html">
                <span>
                  <img src="../images/logo_blanco.png" style="height: 37px;"> RSVP Planner
                </span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
              </button>
  
              <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                <!-- Left -->
                <ul class="navbar-nav mr-5">
                  <li class="nav-item">
                    <a class="nav-link" href="../index.html"> Inicio <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../service.html"> Servicios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../plans.html"> Planes </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../contact.html"> Contacto </a>
                  </li>
                </ul>
                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons ml-5">
                  <li class="nav-item active">
                    <a class="nav-link" href="../login.html">Iniciar Sesión</a>
                  </li>
                  <li class="nav-item" style="background-color: #FFE000; color: black">
                    <a class="nav-link" href="../register.html">Registro</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </header>
      <!-- end header section -->
  </div>

  <!-- login section -->
  <section class="team_section layout_padding mb-3">
    <div class="container" id="services">
        <div class="heading_container heading_center mb-4">
          <h2 class="mt-3 mb-5">
            ERROR
          </h2>
          <h6>
            LO SENTIMOS<br>
            Los datos ingresados son incorrectos.
          </h6>
        </div>
        <div class="text-center">
          <a class="btn btn-dark mt-5 mb-3 pl-5 pr-5" href="../login.html" target="_self" role="button">Volver a Intentarlo
          <i class="fa fa-chevron-left ml-2"></i>
          </a>
        </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_logo">
            <a class="navbar-brand" href="../index.html">
              <span>
                RSVP Planner
              </span>
            </a>
            <p>
              Descubre hoy el futuro de los servicios y las nuevas tecnologías para la organización de tus eventos.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Eventos Sustentables
            </h5>
            <p>
              Las invitaciones en papel han quedado en el pasado, nosotros ofrecemos una alternativa sustentable amigable con el ambiente.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Contáctanos
            </h5>
          </div>
          <div class="info_contact">
            <a href="" class="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
              <span>
                @rsvpplanner
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                +52 55-10-81-00-77
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
              rsvp.planner23@gmail.com
              </span>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="#">
              <input type="email" placeholder="Ingresa tu email">
              <button id="sub">
                Subscribe
              </button>
              <script>
                document.getElementById("sub").addEventListener("click", function() {
                    alert("Gracias por suscribirte a nuestro Newsletter. Recibirás las últimas novedades y ofertas exclusivas de RSVP Planner.");
                  });
              </script>
            </form>
            <div class="social_box">
              <a href="https://www.facebook.com/">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="https://www.twitter.com/">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="https://www.youtube.com/">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
              <a href="https://www.instagram.com/">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <span id="currentYear"></span> All Rights Reserved. Design by
      <a href="https://html.design/">RSVP Planner</a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/custom.js"></script>
</body>

</html>