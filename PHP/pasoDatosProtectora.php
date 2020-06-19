<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	session_start();
	
	if(isset($_POST['protectora'])){
		
		$pro=$_POST['protectora'];
		
		$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
		$con->set_charset("utf8");
		
		$consulta="SELECT IDENTIFICADOR FROM protectora WHERE NOMBRE='$pro'";
		$res=mysqli_query($con,$consulta);
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
