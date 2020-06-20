<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	
	include 'pasoDatosPag8_1';
	require 'conexion.php';

	$con->set_charset("utf8");
	
	if(isset($_SESSION['protectora'])){
		
		unset($_SESSION['protectora']);
		$pro="";
	}
	
	session_start();
	
    $_SESSION['ident'] = $_POST['ident'];

    $identificador=$_POST['ident'];
    $contra=$_POST['pwd'];

    $consulta1="SELECT IDENTIFICADOR,CONTRASENIA FROM protectora WHERE IDENTIFICADOR='$identificador'";

    $res=mysqli_query($con,$consulta1)or die('Consulta fallida'.mysqli_error($con));
    $fila=mysqli_fetch_assoc($res);

    while($fila){
		
		$id=$fila['IDENTIFICADOR'];
		
		while($fila && $id == $fila['IDENTIFICADOR']){
			
			$contrasenia=$fila['CONTRASENIA'];
			
			while($fila && $id == $fila['IDENTIFICADOR'] && $contrasenia == $fila['CONTRASENIA']){
				
			
				if(password_verify($contra,$contrasenia)){
					
					echo $_SESSION['ident'];
				}
				
				$fila=mysqli_fetch_assoc($res);
			}
		}
		
	}
	
    mysqli_close($con);
	
?>
