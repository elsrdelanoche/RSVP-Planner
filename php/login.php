<?php
  include("db.php");
  session_start();
  if(isset($_SESSION["email"])){
    $tipo_user = $_SESSION["tipo_user"];

    if($tipo_user == "Anfitrion")
        header("location: index_anf.php?".SID);
    elseif($tipo_user == "Invitado")
        header("location: index_inv.php?".SID);
    else
        header("location: index_admin.php?".SID); 
	}
  else if(isset($_POST['iniciar']) and !isset($_SESSION["email"])){
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $tipo_user = $_POST["tipo_user"];

    if($tipo_user == "Anfitrion")
      $query = sprintf("SELECT * FROM anfitrion WHERE email LIKE '%s' AND password LIKE '%s'", $email, $pass);
    elseif($tipo_user == "Invitado")
      $query = sprintf("SELECT * FROM invitado WHERE email LIKE '%s' AND password LIKE '%s'", $email, $pass);
    elseif($tipo_user == "Administrador")
      $query = sprintf("SELECT * FROM administrador WHERE email LIKE '%s' AND password LIKE '%s'", $email, $pass);
    else
      header("location: login_error.php"); 

    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1){
      $_SESSION["nombre"] = $row["nombre"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["tipo_user"] = $tipo_user;
      header("location: login.php"); 
    }
    else{
          header("location: login_error.php");    
    }	
  }

  else if(!isset($_SESSION["email"])){
    header("Location: ../login.html");
	}
	

  
?>