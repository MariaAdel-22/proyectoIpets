<?php

	$con=mysqli_connect('localhost','root','','ipetsbbdd')or die('no se pudo conectar'.mysqli_error($con));
	
	session_start();
	$_SESSION['nombre']  = $_POST['nombre'];


	$nombre=$_POST['nombre'];
	$contrasenia=$_POST['pwd'];
	
	$consulta="SELECT NOMBRE,CONTRASENIA
			   FROM usuario WHERE NOMBRE='$nombre' AND CONTRASENIA='$contrasenia'
			   ORDER BY NOMBRE,CONTRASENIA";

	$res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$nom=$fila['NOMBRE'];
		
		while($fila && $nom == $fila['NOMBRE']){
			
			$contra=$fila['CONTRASENIA'];
			
			while($fila && $nom == $fila['NOMBRE'] && $contra == $fila['CONTRASENIA']){
				
				$fila=mysqli_fetch_assoc($res);
				
				echo $_POST['nombre'];
			}
			
		}
		
	}
	
	mysqli_close($con);
?>
