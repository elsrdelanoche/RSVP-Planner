<?php
   include("db.php");

   if (isset($_GET['id_evento'])){
      $id_evento = $_GET['id_evento'];
      $query = "DELETE FROM eventos WHERE id_evento = $id_evento";
      $result = mysqli_query($conexion, $query);
        if (!$result) {
            die("Query fail");
            header("Location: index_admin.php");
        }
        header("Location: index_anf.php"); 
   }
?>