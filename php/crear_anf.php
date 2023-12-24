<?php
   include("db.php");
   if (isset($_POST['crear'])) {
        $nombre = $_POST['nombre'];
        $apaterno = $_POST['apaterno'];
        $amaterno = $_POST['amaterno'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
  
        $query = "INSERT INTO anfitrion VALUES (NULL, '$nombre', '$apaterno', '$amaterno', '$email', '$pass')";
        $result = mysqli_query($conexion, $query);
        if (!$result) {
            die("Query fail");
            header("Location: ../register.html");
        }
        session_start();
        $_SESSION['message'] = 'Datos guardados correctamente';
        $_SESSION['type'] = 'success';
        header("Location: index_admin.php");
    }
?>