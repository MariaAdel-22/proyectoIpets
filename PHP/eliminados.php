<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	
	include 'pasoDatosDeUsuario.php';
	include 'pasoDatosPag8_1.php';
	
	$nombre=$_SESSION['nombre'];
	
	$id=$_SESSION['id2'];

	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$consulta2="DELETE p1,p2,p3 FROM seleccionados p1,disponibles p2,animal p3 WHERE p1.USUARIO='$nombre' AND p3.ID='$id' AND p1.ANIMAL=p3.NOMBRE AND p2.ANIMAL=p3.NOMBRE";
	
	$res2=mysqli_query($con,$consulta2)or die('consulta fallida'.mysqli_error($con));
	
	
	mysqli_close($con);
?>
