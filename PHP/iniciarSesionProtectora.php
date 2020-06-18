<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	
	include 'pasoDatosPag8_1';
	
	if(isset($_SESSION['protectora'])){
		
		unset($_SESSION['protectora']);
		$pro="";
	}
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd')or die('no se pudo conectar'.mysqli_error($con));
    $con->set_charset("utf8");
	
	session_start();
	
    $_SESSION['ident'] = $_POST['ident'];

    $identificador=$_POST['ident'];
    $contra=$_POST['pwd'];

    $consulta="SELECT IDENTIFICADOR,CONTRASENIA FROM protectora WHERE IDENTIFICADOR='$identificador'";

    $res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
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