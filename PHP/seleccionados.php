<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	include 'pasoDatosDeUsuario.php';
	require 'conexion.php';
	$con->set_charset("utf8");

	$nombre=$_SESSION['nombre'];
	$id=$_POST['id1'];
	 
	$consulta1="SELECT u.NOMBRE 'nom_u',a.NOMBRE 'nom_a',d.PROTECTORA FROM usuario u,animal a,disponibles d WHERE u.NOMBRE='$nombre' 
	AND a.NOMBRE=(SELECT NOMBRE FROM animal WHERE ID='$id') AND a.NOMBRE=d.ANIMAL";
	
	$res=mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$dni=$fila['nom_u'];
		$prot=$fila['PROTECTORA'];

		while($fila && $dni==$fila['nom_u'] ){
			
			$ide=$fila['nom_a'];
			$consulta2="INSERT into seleccionados (USUARIO,ANIMAL,PROTECTORA) values ('".mb_convert_encoding($dni,'UTF-8')."','".mb_convert_encoding($ide,'UTF-8')."','".mb_convert_encoding($prot,'UTF-8')."')";
			
			mysqli_query($con,$consulta2)or die('Segunda consulta fallida'.mysqli_error($con));

			$fila=mysqli_fetch_assoc($res);
		}
		
	}
	
	mysqli_close($con);
?>
