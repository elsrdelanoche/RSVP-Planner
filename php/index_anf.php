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
                  <a class="nav-link" href="#" target="_self">Menú Anfitrión
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
    <h3 class="text-dark ml-4 mb-1 mt-4">Bienvenido <?php echo $nombre ?></h6>
    <div class="container p-4 m-0">
      <div class="mb-3">
          <a href="crear_evento.php" class="btn btn-primary">Crear Evento Nuevo</a>
      </div>
      <div class="table-responsive">
        <table id="dtHorizontalVerticalExample" class="table table-bordered table-sm">
          <thead>
            <tr style="font-size: 14px;">
              <th>Nombre del Evento</th>
              <th>Fecha</th>
              <th>Ubicación</th>
              <th>Detalles</th>
              <th>Eliminar</th>
              <th>Estadísticas</th>
              <th>Invitados</th>
              <th>Personalizar</th>
              <!-- Añade más columnas según sea necesario -->
            </tr>
          </thead>
            
          <tbody id="tablaEventos">
            <?php
              $queryEvento = "SELECT * FROM eventos WHERE id_anfitrion = ?";
              $stmt = $conexion->prepare($queryEvento);
              $stmt->bind_param("i", $id_anfitrion); // 'i' significa que el parámetro es un entero
              $stmt->execute();
                          
              $resultEvento = $stmt->get_result(); // Obtener el resultado de la consulta preparada
              while($rowEvento = $resultEvento->fetch_assoc()) { ?>
                <tr style="font-size: 13px;">
                  <td class="pt-2"><?php echo htmlspecialchars($rowEvento['nombre_evento']); ?></td>
                  <td class="pt-2"><?php echo htmlspecialchars($rowEvento['fecha_evento']); ?></td>
                  <td class="pt-2"><?php echo htmlspecialchars($rowEvento['ubicacion']); ?></td>
                  <td class="pt-2"><?php echo htmlspecialchars($rowEvento['detalles']); ?></td>
                  <td class="text-center"><a href="eliminar_evento.php?id=<?php echo $rowEvento['id_evento']; ?>"  class="btn btn-danger btn-sm" name="">
                    <i class="fa fa-trash" style="color: white;"></i></a>
                  </td>
                  <td class="text-center"><a href="estadisticas_evento.php?id=<?php echo $rowEvento['id_evento']; ?>"  class="btn btn-warning btn-sm" name="">
                    <i class="fa fa-pencil" style="color: white;"></i></a>
                  </td>
                  <td class="text-center"><a href="invitar.php?id=<?php echo $rowEvento['id_evento']; ?>"  class="btn btn-primary btn-sm" name="">
                    <i class="fa fa-pencil" style="color: white;"></i></a>
                  </td>
                  <td class="text-center"><a href="personalizar.php?id=<?php echo $rowEvento['id_evento']; ?>"  class="btn btn-info btn-sm" name="">
                    <i class="fa fa-pencil" style="color: white;"></i></a>
                  </td>
                </tr>
              <?php }?>
          </tbody>
        </table>
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
  <?php
