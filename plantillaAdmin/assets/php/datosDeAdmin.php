<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	include 'guardarDatosSesionAdmin.php';
	require '../../../PHP/conexion.php';
	$con->set_charset("utf8");

	$nombre=$_SESSION['nombre'];
	
	$dat=$_POST['nom'];
	
	foreach($dat as $clave => $valor){
		
		foreach($valor as $clave1 => $valor1){
			
			if(!empty($valor1)){
				

				$consulta1="UPDATE administradores SET $clave='".mb_convert_encoding($valor1,'UTF-8')."' WHERE NOMBRE='$nombre'";
				mysqli_query($con,$consulta1);
			}

		}
	}
	mysqli_close($con);
?>
