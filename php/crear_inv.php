<?php
   include("db.php");
   if (isset($_POST['crear'])) {
        $nombre = $_POST['nombre'];
        $apaterno = $_POST['apaterno'];
        $amaterno = $_POST['amaterno'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $estado = "Sin Confirmar";
        $id_evento = $_GET['id_evento'];
  
        $query = "INSERT INTO invitado VALUES (NULL, $id_evento, '$nombre', '$apaterno', '$amaterno', '$email', '$pass', '$estado')";
        $result = mysqli_query($conexion, $query);
        if (!$result) {
            die("Query fail");
            header("Location: index_anf.php");
        }
        session_start();
        $_SESSION['message'] = 'Invitado agregado correctamente';
        $_SESSION['type'] = 'success';
        header("Location: invitar.php?id_evento=" . $id_evento);
    }
?>