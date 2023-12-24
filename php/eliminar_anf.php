<?php
   include("db.php");

   if (isset($_GET['folio'])){
      $folio = $_GET['folio'];
      $query = "DELETE FROM anfitrion WHERE folio = $folio";
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
