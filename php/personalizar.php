<?php 
  include("db.php");
  session_start();
	if(isset($_SESSION["email"])){
		$nombre = $_SESSION["nombre"];
	
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
    <section class="service_section layout_padding" style="background-color: white;" id="plans">
    <div class="container">
      <div class="heading_container heading_center mt-lg-n5">
        <h2 style="color: black;">
          ¿Todo listo para conectar con tus invitados?
        </h2>
        <p style="color: black;">
            En RSVP nos preocupamos por que cada pixel de tu invitación sea como lo imaginas, es por ello que dejamos el diseño en tus manos
        </p>
      </div>
      <div class="row mt-lg-n2">
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="../images/ImportImage.png" class="w-25">
            </div>
            <div class="detail-box">
              <p>
                Sube el diseño que quieras compartir con tus invitados.<br>
              </p>
              <a href="">
                Importar
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box ">
            <div class="img-box">
              <img src="../images/DiseñoPaleta.png" class="w-25">
            </div>
            <div class="detail-box">
              <p>
                Comienza a crear un diseño con nosotros.
              </p>
              <a href="../personalization.html">
                Diseñar
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end plans section -->
  <?php
}
	else{
        header("Location: ../login.html");
	}
    ?>