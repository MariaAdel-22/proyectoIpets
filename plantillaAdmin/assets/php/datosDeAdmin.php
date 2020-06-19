<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	include 'guardarDatosSesionAdmin.php';
	
	$nombre=$_SESSION['nombre'];
	
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
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
