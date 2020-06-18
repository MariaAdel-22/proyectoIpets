<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$cab=$_POST['cabecera'];
	$dat=$_POST['datos'];
	$tab=$_POST['tabla'];
	
	
	switch($tab){
		
		case "animal":
			
			$consulta0="DELETE FROM disponibles WHERE ANIMAL=(SELECT NOMBRE FROM animal WHERE ID=$dat)";
			$consulta1="DELETE FROM seleccionados WHERE ANIMAL=$dat";
			$consulta="DELETE FROM $tab WHERE $cab=$dat";
			
			mysqli_query($con,$consulta0) or die('Consulta fallida'.mysqli_error($con));
			mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
			mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
			
		break;
		
		case "protectora":
		
			$consulta0="DELETE FROM seleccionados WHERE PROTECTORA='$dat'";
			$consulta1="DELETE d1,d2 FROM disponibles d1, animal d2 WHERE d1.PROTECTORA='$dat' and d2.NOMBRE=d1.ANIMAL";
			$consulta="DELETE FROM $tab WHERE $cab='$dat'";
			
			$result=mysqli_query($con,$consulta0) or die('Consulta fallida'.mysqli_error($con));
			$result=mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
			$result=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	
		break;
		
		default:
			
			$consulta="DELETE FROM $tab WHERE $cab='$dat'";
			$result=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
			
		break;
	}
	
	mysqli_close($con);
?>