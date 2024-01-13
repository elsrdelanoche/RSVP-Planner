<?php
   include("db.php");

   if (isset($_GET['id_invitado'])){
      $id_invitado = $_GET['id_invitado'];
      $id_evento = $_GET['id_evento'];
      
      $query = "DELETE FROM invitado WHERE id_invitado = $id_invitado";
      $result = mysqli_query($conexion, $query);
        if (!$result) {
            die("Query fail");
            header("Location: index_admin.php");
        }
      
        session_start();
        $_SESSION['message'] = 'Invitado eliminado correctamente';
        $_SESSION['type'] = 'danger';
        header("Location: invitar.php?id_evento=" . $id_evento);
   }
?>