<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39')or die('no se pudo conectar'.mysqli_error($con));
	$con->set_charset("utf8");
	 
	session_start();
	$_SESSION['nombre']  = $_POST['nombre'];


	$nombre=$_POST['nombre'];
	$contrasenia=$_POST['pwd'];
	
	$consulta="SELECT NOMBRE,CONTRASENIA
			   FROM usuario WHERE NOMBRE='$nombre'";

	$res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$nom=$fila['NOMBRE'];
		
		while($fila && $nom == $fila['NOMBRE']){
			
			$contra=$fila['CONTRASENIA'];
			
			while($fila && $nom == $fila['NOMBRE'] && $contra == $fila['CONTRASENIA']){
				
				
				if(password_verify($contrasenia,$contra)){
					
					echo $_SESSION['nombre'];
				}
			
				$fila=mysqli_fetch_assoc($res);
			}
		}
		
	}
	
	
	mysqli_close($con);
	
?>
