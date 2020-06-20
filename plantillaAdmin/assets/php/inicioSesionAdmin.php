<?php

	header('Content-Type: text/html; charset=UTF-8');
	
       require '../../../PHP/conexion.php';
	$con->set_charset("utf8");
	
	session_start();
	
	$_SESSION['nombre']=$_POST['admin'];
	
	$nombre=$_POST['admin'];
	$contrasenia=$_POST['pwd'];
	
	$consulta1="SELECT * FROM administradores WHERE NOMBRE='$nombre'";
	$res=mysqli_query($con,$consulta1)or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	
	while($fila){
		
		$nom=$fila['NOMBRE'];
		
		while($fila && $nom == $fila['NOMBRE']){
			
			$contra=$fila['CONTRASENIA'];
			
			while($fila && $nom == $fila['NOMBRE'] && $contra == $fila['CONTRASENIA']){
				
				$fila=mysqli_fetch_assoc($res);
				
				if(password_verify($contrasenia,$contra)){
					
					echo $_SESSION['nombre'];
				}	
			}
	
		}
	}
		
	mysqli_close($con);	
?>
