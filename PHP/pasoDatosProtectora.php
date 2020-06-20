<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	session_start();
	
	if(isset($_POST['protectora'])){
		
		require 'conexion.php';
		$con->set_charset("utf8");
		
		$pro=$_POST['protectora'];
		
		$consulta1="SELECT IDENTIFICADOR FROM protectora WHERE NOMBRE='$pro'";
		$res=mysqli_query($con,$consulta1);
		$fila=mysqli_fetch_assoc($res);
		
		while($fila){
			
			$ident=$fila['IDENTIFICADOR'];
			
			while($fila && $ident==$fila['IDENTIFICADOR']){
				
				$fila=mysqli_fetch_assoc($res);
				$_SESSION['protectora']=$ident;
			}
		}
		echo $_SESSION['protectora'];
	}
	
	$_SESSION['ident'];

	$_SESSION['idP']=$_POST['idP'];

?>
