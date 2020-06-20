<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(E_ALL);
	
	include 'pasoDatosDeUsuario.php';
	include 'pasoDatosPag8_1.php';
	require 'conexion.php';

	$con->set_charset("utf8");

	$nombre=$_SESSION['nombre'];
	$id=$_SESSION['id2'];

	$consulta2="DELETE p1,p2,p3 FROM seleccionados p1,disponibles p2,animal p3 WHERE p1.USUARIO='$nombre' AND p3.ID='$id' AND p1.ANIMAL=p3.NOMBRE AND p2.ANIMAL=p3.NOMBRE";
	
	$res2=mysqli_query($con,$consulta2)or die('consulta fallida'.mysqli_error($con));
	
	
	mysqli_close($con);
?>
