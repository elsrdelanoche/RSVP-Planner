<?php
include("./phpMailer/class.phpmailer.php");
include("./phpMailer/class.smtp.php");
 
$email_user = "";
$email_password = "";
$the_subject = "";
$address_to = "";
$from_name = "";
$phpmailer = new PHPMailer();
 
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password;
 
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
 
$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email
 
$phpmailer->Subject = $the_subject;
$phpmailer->Body .="<h1 style='color:#3498db;'>Hola esto es una invitacion RSVP</h1>";
$phpmailer->Body .= "<p>Esta es una prueba del envío de correo :)</p>";
$phpmailer->Body .= "<p>Fecha: ".date("d-m-Y")."</p>";
$phpmailer->IsHTML(true);
 
$phpmailer->Send();
?>

