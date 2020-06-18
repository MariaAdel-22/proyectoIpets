<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	
	include 'pasoDatosDeUsuario.php';

	$nombre=$_SESSION['nombre'];
	
	$id=$_POST['id1'];

	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$consulta2="DELETE FROM seleccionados WHERE USUARIO='$nombre' AND ANIMAL=(SELECT NOMBRE FROM animal WHERE ID='$id')";
	
	$res2=mysqli_query($con,$consulta2)or die('consulta fallida'.mysqli_error($con));
	
	mysqli_close($con);
?>