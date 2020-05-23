<?php
	
	include 'pasoDatosProtectora.php';
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$id=$_POST['id'];
	$ident=$_SESSION['ident'];

	
	$consulta2="DELETE FROM disponibles WHERE ID='$id' AND IDENTIFICADOR='$ident'";
	
	
	if(mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con))){
		
		$consulta="DELETE FROM animal WHERE ID='$id'";
	
		$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	}
	
	
	mysqli_close($con);
	
?>