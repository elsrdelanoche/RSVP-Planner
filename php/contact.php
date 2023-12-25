<?php
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    $destino ="rsvp.planner23@gmail.com";
    $subject = "Mensaje nuevo de RSVP Planner";
    $correo = '
    <html>
        <head><title>Nuevo Mensaje</title></head>
        <body>
        <div style="height: 10%; background-color: #1C1C1C; margin-bottom: 5%;">
            <p style="padding: 3%; color: #FFFFFF; font-size: 23px; font-family: \'Poppins\', sans-serif; font-weight: bold;">RSVP Planner</p>
        </div>
        <div style="padding-left: 7%; padding-right: 7%; color: black; font-size: 17px; font-family: \'Poppins\', sans-serif;">
            <p style="text-align: center; font-size: 21px;">Nuevo Mensaje</p>
            <p>Has recibido un nuevo mensaje a través del formulario de contacto de RSVP Planner. Aquí están los detalles:</p>
            <div style="margin-left: 5%;">
            <p>Nombre: <span style="font-weight: bold;">'.htmlspecialchars($nombre).'</span></p>
            <p>Correo electrónico: '.htmlspecialchars($email).'</p>
            <p>Asunto: '.htmlspecialchars($asunto).'</p>
            <p>Mensaje:</p>
            <p style="margin-left: 8%;">'.nl2br(htmlspecialchars($mensaje)).'</p>
            </div>
            <p>Es importante responder a este mensaje lo antes posible para mantener una buena comunicación con los usuarios de nuestra página.</p><br>
            <p>Equipo de RSVP Planner</p>
        </div>
        </body>
    </html>
    ';
    
    require("ConfiguraMail.php");
    if (enviaCorreo($destino, $subject, $correo)) {
        header("Location: ../contact.html");
    }
    else{
        header("Location: ../index.html");
    }
?>