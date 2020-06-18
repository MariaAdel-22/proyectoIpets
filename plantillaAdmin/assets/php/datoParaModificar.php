<?php

	session_start();
	
	$_SESSION['tabla']=$_POST['tabla'];
	$_SESSION['datos']=$_POST['datos'];
	$_SESSION['cabecera']=$_POST['cabecera'];
?>