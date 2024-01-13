<?php 
  include("db.php");

  if (isset($_POST['crear'])) {
    $evento = $_POST['evento'];
    $fecha = $_POST['fecha'];
    $ubicacion = $_POST['ubicacion'];
    $detalles = $_POST['detalles'];
    $id_anfitrion = $_GET['id_anfitrion'];

    $query = "INSERT INTO eventos VALUES (NULL, $id_anfitrion, '$evento', '$fecha', '$ubicacion', '$detalles')";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
      die("Query fail");
      header("Location: ../index.html");
    }
    header("Location: index_anf.php");
  }
?>

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

  <title>Anfitrion</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />
    <style>
      html, body, header {
        height: 100%;
        width: 100%;
      }
      main{
        height: 100%;
      }
    </style>
</head>
<body class="sub_page">
    <!-- header section -->
    <div class="hero_area">
      <header class="header_section">
        <div class="header_bottom">
          <!-- NAVEGADOR -->
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
                <ul class="navbar-nav mr-5 mt-n3">
                  <li class="nav-item">
                  <a class="nav-link" href="index_anf.php" target="_self">Menú Anfitrión
                    <span class="sr-only">(current)</span>
                  </a>
                  </li>
                </ul>
                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons m-1">
                  <li class="nav-item active">
                  <a href="logout.php?cerrar=yes" class="nav-link border border-light rounded pt-2 pb-2">
                    <i class="fa fa-chevron-left mr-2"></i> Cerrar sesión&nbsp;&nbsp;
                  </a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </header>
      <!-- end header section -->
      </div> 
    <main>
    <h5 class="text-center mt-5">Crear Evento Nuevo</h5>
    <div class="row m-0">
      <div class="col-lg-4 col-md-3"></div>
        <div class="col-lg-4 col-md-6 mt-4 mb-5">
          <div class="card card-body mb-5">
            <form action="crear_evento.php?id_anfitrion=<?php echo $_GET['id_anfitrion'];?>" method="post" class="registration_form">
              <div class="form-group">
                  <label for="evento">Nombre del Evento:</label>
                  <input type="text" class="form-control" id="evento" name="evento" required>
              </div>
              <div class="form-group">
                  <label for="fecha">Fecha:</label>
                  <input type="date" class="form-control" id="fecha" name="fecha" required>
              </div>
              <div class="form-group">
                  <label for="ubicacion">Ubicación:</label>
                  <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
              </div>
              <div class="form-group">
                  <label for="detalles">Detalles:</label>
                  <textarea class="form-control" id="detalles" name="detalles" rows="3"></textarea>
              </div>
              <div class="text-center">
                <button type="submit" name="crear" id="crear" style="font-size: 14px;" class="btn btn-success btn-block">Crear Evento</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-4 col-md-3"></div>
      </div>
    </main>

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