<?php
	
	include 'pasoDatosDeUsuario.php';
	include 'datosDeProtectora.php';
	
	session_destroy();
	header('Status: 301 Moved Permanently', false, 301);
	header('Location: ../html/iniciarSesion.html');
	exit;
?>

