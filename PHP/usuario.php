<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	require 'conexion.php';
	$con->set_charset("utf8");
	 
	session_start();
	$_SESSION['nombre']  = $_POST['nombre'];


	$nombre=$_POST['nombre'];
	$contrasenia=$_POST['pwd'];
	
	$consulta1="SELECT NOMBRE,CONTRASENIA
			   FROM usuario WHERE NOMBRE='$nombre'";

	$res=mysqli_query($con,$consulta1)or die('Consulta fallida'.mysqli_error($con));
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
