<?php
    include("db.php");
    $id_anfitrion = "";
    $nombre = "";
    $apaterno = "";
    $amaterno = "";
    $email = "";
    $pass = "";

    if (isset($_GET['id_anfitrion'])){
        $id_anfitrion = $_GET['id_anfitrion'];
        $query = "SELECT * FROM anfitrion WHERE id_anfitrion = $id_anfitrion";
        $result = mysqli_query($conexion, $query);
        if (!$result) {
            die("Query fail");
            header("Location: index_admin.php");
        }
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $apaterno = $row['apaterno'];
            $amaterno = $row['amaterno'];
            $email = $row['email'];
            $pass = $row['password'];
        }
    }

    if(isset($_POST['actualizar'])){
        $id_anfitrion = $_GET['id_anfitrion'];
        $nombre = $_POST['nombre'];
        $apaterno = $_POST['apaterno'];
        $amaterno = $_POST['amaterno'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
  
        $query = "UPDATE anfitrion set id_anfitrion = '$id_anfitrion', nombre = '$nombre', apaterno = '$apaterno', amaterno = '$amaterno', email = '$email', password = '$pass' WHERE id_anfitrion = '$id_anfitrion'";
        $result = mysqli_query($conexion, $query);
        if (!$result) {
            die("Error en query");
            header("Location: ../register.html");
        }
            session_start();
        $_SESSION['message'] = 'Datos actualizados correctamente';
        $_SESSION['type'] = 'warning';
        header("Location: index_admin.php");
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

  <title>Administrador</title>

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
                  <a class="nav-link" href="index_anf.php" target="_self">Menú Administrador
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
    <h5 class="text-center mt-5">Actualizar datos</h5>
    <div class="row m-0">
        <div class="col-lg-4 col-md-3"></div>
        <div class="col-lg-4 col-md-6 mt-4 mb-5">
            <div class="card card-body mb-5">
                <form action="editar_anf.php?id_anfitrion=<?php echo $_GET['id_anfitrion'];?>" method="post" class="registration_form">
                    <div class="form-group">
                        <input type="text" class="form-control" style="font-size: 14px;" name="nombre" id="nombre" value=<?php echo $nombre; ?> placeholder="Nombre" required>
                        <input type="text" class="form-control mt-3" style="font-size: 14px;" name="apaterno" id="apaterno" value=<?php echo $apaterno; ?> placeholder="Apellido Paterno" required>
                        <input type="text" class="form-control mt-3" style="font-size: 14px;" name="amaterno" id="amaterno" value=<?php echo $amaterno; ?> placeholder="Apellido Materno" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" style="font-size: 14px;" name="email" id="email" value=<?php echo $email; ?> placeholder="Correo Electrónico" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" style="font-size: 14px;" name="password" id="password" value=<?php echo $pass; ?> placeholder="Contraseña" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="actualizar" id="actualizar" style="font-size: 14px;" class="btn btn-success btn-block">Actualizar</button>
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