<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(E_ALL);
	
	include 'pasoDatosDeUsuario.php';
	require 'conexion.php';

	$con->set_charset("utf8");
	$nombre=$_SESSION['nombre'];

	$_SESSION['id2']=$_POST['id2'];
	$id=$_POST['id2'];
	
	
	$fecha=date("d")."/".date("m")."/".date("Y")." a las ".date("H")." : ".date("i");
	
	$consulta2="SELECT u.DNI,a.ID,p.IDENTIFICADOR FROM usuario u, animal a, disponibles d,protectora p WHERE u.NOMBRE='$nombre' AND a.ID='$id' AND a.NOMBRE=d.ANIMAL AND p.NOMBRE=d.PROTECTORA ORDER BY DNI ASC";
	
	$res=mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$dni=$fila['DNI'];
		$prot=$fila['IDENTIFICADOR'];

		while($fila && $dni==$fila['DNI'] ){
			
			$ide=$fila['ID'];
			$consulta3="INSERT into adoptados (USUARIO,ANIMAL,PROTECTORA,HORA) values ('".$dni."','".$ide."','".$prot."','".$fecha."')";
			
			mysqli_query($con,$consulta3)or die('Segunda consulta fallida'.mysqli_error($con));
				
			mysqli_fetch_assoc($res);

		}
		
	}
	
	
	mysqli_close($con);
	
?>
