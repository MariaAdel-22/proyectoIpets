<?php

	include 'pasoDatosProtectora.php';

	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$ident=$_SESSION['ident'];
	
	$consulta="DELETE disponibles.*,animal.* FROM disponibles,animal WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID=disponibles.ID";
	
	if(mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con))){
		
		$consulta2="DELETE FROM protectora WHERE IDENTIFICADOR='$ident'";
		
		$res=mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con))
			
	}
	
	mysqli_close($con);
?>