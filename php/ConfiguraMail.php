<?php
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	function enviaCorreo($destino, $asunto, $correo){
		require('PHPMailer/Exception.php');
		require('PHPMailer/PHPMailer.php');
		require('PHPMailer/SMTP.php');

        $mail = new PHPMailer(true);

		try 
		{
		    //Server settings
		    $mail->SMTPDebug = 0;
		    $mail->isSMTP();
		    $mail->Host       = 'smtp.gmail.com';
		    $mail->SMTPAuth   = true;
		    $mail->Username   = 'rsvp.planner23@gmail.com';
		    $mail->Password   = 'ikxezvqiyakxoand';
		    $mail->SMTPSecure = 'tls';
		    $mail->Port       = 587;

		    //Recipients
		    $mail->setFrom('rsvp.planner23@gmail.com', 'RSVP Planner');
		    $mail->addAddress($destino);

		    // Content
		    $mail->isHTML(true);
		    $mail->Subject = $asunto;
		    $mail->Body    = $correo;

			/*$file = fopen("PHPMailer/correo.html", "r");
			$str = fread($file, filesize("PHPMailer/correo.html"));
			$str = trim($str);
			fclose($file);
			$mail->Body = $str;*/

		    $mail->send();
		    return true;
		} 
		catch (Exception $e) {
		    return false;
		}

	}
?>