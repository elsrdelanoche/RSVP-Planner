<?php 
  include("db.php");
  session_start();
if (isset($_SESSION['email'])) {
    $nombre = $_SESSION['nombre'];
    $nombre = mysqli_real_escape_string($conexion, $nombre); // Evitar inyección SQL
    $queryAnfitrion = "SELECT id_anfitrion FROM anfitrion WHERE nombre = '$nombre'";
    $resultado = mysqli_query($conexion, $queryAnfitrion);
    $fila = mysqli_fetch_assoc($resultado);

    $id_anfitrion = $fila['id_anfitrion'];
    
} else {
  header("Location: ../login.html");
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
    <h5 class="text-center mt-5">Agregar Nuevo Invitado</h5>
    <div class="container p-4 m-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['type'];?> alert-dismissible fade show mb-3" role="alert" style="font-size: 14px;">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($_SESSION['message']); 
                        unset($_SESSION['type']); } ?>
                <div class="card card-body m-0">
                    <form action="crear_inv.php?id_evento=<?php echo $_GET['id_evento'];?>" method="post" class="registration_form">
                        <div class="form-group">
                            <input type="text" class="form-control" style="font-size: 14px;" name="nombre" id="nombre" placeholder="Nombre(s)" required>
                            <input type="text" class="form-control mt-3" style="font-size: 14px;" name="apaterno" id="apaterno" placeholder="Apellido Paterno" required>
                            <input type="text" class="form-control mt-3" style="font-size: 14px;" name="amaterno" id="amaterno" placeholder="Apellido Materno" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" style="font-size: 14px;" name="email" id="email" placeholder="Correo Electrónico" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" style="font-size: 14px;" name="password" id="password" placeholder="Contraseña" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="crear" id="crear" style="font-size: 14px;" class="btn btn-success btn-block">Agregar Invitado</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <table id="dtHorizontalVerticalExample" class="table table-bordered table-sm">
                    <thead>
                        <tr style="font-size: 14px;">
                            <th>Nombre(s)</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Estado</th>
                            <th>Eliminar</th>
                            <th>Invitar</th>
                        </tr>
                    </thead>
                    <tbody id="tabla">
                        <?php
                            $query = "SELECT * FROM invitado";
                            $result = mysqli_query($conexion, $query);
                            
                            while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr style="font-size: 13px;">
                                    <td class="pt-2"><?php echo $row['nombre'] ?></td>
                                    <td class="pt-2"><?php echo $row['apaterno'] ?></td>
                                    <td class="pt-2"><?php echo $row['amaterno'] ?></td>
                                    <td class="pt-2"><?php echo $row['email'] ?></td>
                                    <td class="pt-2"><?php echo $row['password'] ?></td>
                                    <td class="pt-2"><?php echo $row['estado'] ?></td>
                                    <td class="text-center"><a href="eliminar_inv.php?id_invitado=<?php echo $row['id_invitado']?>&id_evento=<?php echo $_GET['id_evento'];?>"  class="btn btn-danger btn-sm" name="">
                                        <i class="fa fa-trash" style="color: white;"></i>
                                        </a>
                                    </td>
                                    <td class="text-center"><a href="invitar.php?id_invitado=<?php echo $row['id_invitado'] ?>"  class="btn btn-info btn-sm" name="">
                                        <i class="fa fa-paper-plane" style="color: white;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
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
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <?php
