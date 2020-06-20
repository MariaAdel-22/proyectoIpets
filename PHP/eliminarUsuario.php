<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	
	include 'pasoDatosDeUsuario.php';
	include 'pasoDatosProtectora.php';
	require 'conexion.php';

	$con->set_charset("utf8");
	
	$nom=$_SESSION['nombre'];
	$ident=$_SESSION['ident'];
	$id=$_POST['id'];
	
	if($nom!=""){
		
		$ident="";
		$id="";

		$consulta0="DELETE FROM usuario WHERE NOMBRE='$nom'";
		$consulta1="DELETE FROM seleccionados WHERE USUARIO=$nom";
		mysqli_query($con,$consulta0) or die('Consulta fallida'.mysqli_error($con));
		mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
		unset($_SESSION['nombre']);
	}
	
	if($id!=""){
		
		if(isset($ident)){
			
			$consulta2="DELETE FROM disponibles WHERE ANIMAL=(SELECT NOMBRE FROM animal WHERE ID='$id') AND PROTECTORA=(SELECT NOMBRE FROM protectora WHERE IDENTIFICADOR='$ident')";
			mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con));
			
			$consulta3="DELETE FROM animal WHERE ID='$id'";
			mysqli_query($con,$consulta3) or die('Consulta fallida'.mysqli_error($con));
			
			$consulta4="DELETE FROM seleccionados WHERE PROTECTORA=(SELECT NOMBRE FROM protectora WHERE IDENTIFICADOR='$ident') AND ANIMAL=(SELECT NOMBRE FROM animal WHERE ID='$id')";
			mysqli_query($con,$consulta4) or die('Consulta fallida'.mysqli_error($con));

		}
	}
	
	if(($ident!="")&&($id=="")){
		
		$consulta5="DELETE FROM disponibles WHERE PROTECTORA=(SELECT NOMBRE FROM protectora WHERE IDENTIFICADOR='$ident')";
		$consulta6="DELETE FROM seleccionados WHERE PROTECTORA=(SELECT NOMBRE FROM protectora WHERE IDENTIFICADOR='$ident')";
		$consulta7="DELETE FROM protectora WHERE IDENTIFICADOR=$ident";
		
		mysqli_query($con,$consulta5) or die('Consulta fallida'.mysqli_error($con));
		mysqli_query($con,$consulta6) or die('Consulta fallida'.mysqli_error($con));
		mysqli_query($con,$consulta7) or die('Consulta fallida'.mysqli_error($con));
		unset($_SESSION['ident']);
	}
	mysqli_close($con);
?>
