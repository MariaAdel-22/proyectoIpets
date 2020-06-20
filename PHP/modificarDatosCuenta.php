<?php
	header('Content-Type: text/html; charset=UTF-8');
	
	//error_reporting(0);
	
	include 'pasoDatosDeUsuario.php';
	include 'pasoDatosProtectora.php';

	$nombreU=$_SESSION['nombre'];
	$nombreP=$_SESSION['ident'];
	
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39');
	//$con->set_charset("utf8");
	
	$dat=$_POST['datos'];

	$consulta="GRANT SELECT, INSERT, DELETE ON heroku_0c87bc892272e39 TO username@'be2cf74825313e' IDENTIFIED BY 'e459b73e'";
	//$consulta="GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP  ON heroku_0c87bc892272e39.* TO 'be2cf74825313e'@'us-cdbr-east-05.cleardb.net';
	mysqli_query($con,$consulta);
		
	$consulta2="SELECT DNI FROM usuario";
	$res=mysqli_query($con,$consulta2);
	$fila=mysqli_fetch_assoc($res);

	while($fila){
		$nom=$fila['DNI'];
		while($fila && $nom==$fila['DNI']){
			$fila=mysqli_fetch_assoc($res);
			echo $nom;
		}
	}
	
	
mysqli_close($con);

?>
