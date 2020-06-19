<?php

	include 'guardarDatosSesionAdmin.php';

	session_destroy();
	header('Status: 301 Moved Permanently', false, 301);
	header('Location: ../../../html/index.html');
	exit;
?>