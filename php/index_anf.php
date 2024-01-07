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
                  <img src="../images/logo_blanco.png" style="height: 37px;"> RSVP Planner - Anfitrión
                </span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
              </button>
  
              <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                <!-- Left -->
                <ul class="navbar-nav mr-5 mt-n3">
                  
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
    <div class="container mt-4">
    <h3 class="text-dark">Bienvenido <?php echo $nombre ?></h3>
    </div>
    <div class="my-4">
        <a href="/php/crear_evento.php" class="btn btn-primary">Crear Evento Nuevo</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del Evento</th>
                    <th>Fecha</th>
                    <th>Ubicación</th>
                    <th>Detalles</th>
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
                                  <td>
                                      <!-- Botón para eliminar -->
                                      <a href="/php/eliminar_evento.php?id=<?php echo $rowEvento['id_evento']; ?>" class="btn btn-danger btn-sm">
                                          Eliminar
                                      </a>
                                      <!-- Botón para ver estadísticas -->
                                      <a href="/php/estadisticas_evento.php?id=<?php echo $rowEvento['id_evento']; ?>" class="btn btn-info btn-sm">
                                          Estadísticas
                                      </a>
                                      <!-- Botón para enviar invitaciones -->
                                      <a href="/php/invitar.php?id=<?php echo $rowEvento['id_evento']; ?>" class="btn btn-primary btn-sm">
                                          Invitar
                                      </a>
                                      <!-- Botón para editar invitaciones -->
                                      <a href="/php/personalizar.php?id=<?php echo $rowEvento['id_evento']; ?>" class="btn btn-primary btn-sm">
                                          Personalizar
                                      </a>
                                  </td>
                              </tr>
                      <?php }?>
                  </tbody>
              </table>
          </div>


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
  <?php
