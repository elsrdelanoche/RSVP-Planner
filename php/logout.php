<?php
	session_start();
	if(isset($_GET["cerrar"]))
	{
		$_SESSION["nombre"]=NULL;
		$_SESSION["email"]=NULL;
		$_SESSION["tipo_user"]=NULL;

		unset($_SESSION["nombre"]);
		unset($_SESSION["email"]);
		unset($_SESSION["tipo_user"]);
		session_unset();

		if (ini_get("sesion.use_cookies")){
			$params=session.get_cookie_params();
			setcokie(session_name(),'',time()-42000, $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
		}
		session_destroy();
		header("Location: ../index.html");
	}
?>