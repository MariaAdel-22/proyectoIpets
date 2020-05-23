<?php

	include 'pasoDatosDeUsuario.php';
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$nom=$_SESSION['nombre'];
	
	$consulta="DELETE seleccionados.*, usuario.* FROM seleccionados,usuario WHERE usuario.NOMBRE='$nom' AND usuario.DNI=seleccionados.USUARIO";
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	
	mysqli_close($con);
?>