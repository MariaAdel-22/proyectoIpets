<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	include 'guardarDatosSesionAdmin.php';
	
	$nombre=$_SESSION['nombre'];
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$dat=$_POST['nom'];
	
	foreach($dat as $clave => $valor){
		
		foreach($valor as $clave1 => $valor1){
			
			if(!empty($valor1)){
				

				$consulta="UPDATE administradores SET $clave='".mb_convert_encoding($valor1,'UTF-8')."' WHERE NOMBRE='$nombre'";
				mysqli_query($con,$consulta);
			}

		}
	}
	mysqli_close($con);
?>