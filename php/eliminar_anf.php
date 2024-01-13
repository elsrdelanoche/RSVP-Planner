<?php
   include("db.php");

   if (isset($_GET['id_anfitrion'])){
      $id_anfitrion = $_GET['id_anfitrion'];
      $query = "DELETE FROM eventos WHERE id_anfitrion = $id_anfitrion";
      $result = mysqli_query($conexion, $query);
        if (!$result) {
            die("Query fail");
            header("Location: index_admin.php");
        }
      $query = "DELETE FROM anfitrion WHERE id_anfitrion = $id_anfitrion";
      $result = mysqli_query($conexion, $query);
        if (!$result) {
            die("Query fail");
            header("Location: index_admin.php");
        }
        session_start();
        $_SESSION['message'] = 'Datos eliminados correctamente';
        $_SESSION['type'] = 'danger';
        header("Location: index_admin.php"); 
   }
?>
