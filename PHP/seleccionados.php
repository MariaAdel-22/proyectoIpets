<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	include 'pasoDatosDeUsuario.php';
	require 'conexion.php';
	$con->set_charset("utf8");

	$nombre=$_SESSION['nombre'];
	$id=$_POST['id1'];
	 
	$consulta1="SELECT u.NOMBRE 'nom_u',u.DNI,a.NOMBRE 'nom_a',a.ID,d.PROTECTORA,d.IDENTIFICADOR FROM usuario u,animal a,disponibles d WHERE u.NOMBRE='$nombre' 
	AND a.NOMBRE=(SELECT NOMBRE FROM animal WHERE ID='$id') AND a.NOMBRE=d.ANIMAL";
	
	$res=mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	/*while($fila){
		
		$dni=$fila['nom_u'];
		$prot=$fila['PROTECTORA'];

		while($fila && $dni==$fila['nom_u'] ){
			
			$ide=$fila['nom_a'];
			$consulta2="INSERT into seleccionados (USUARIO,ANIMAL,PROTECTORA) values ('".$dni."','".$ide."','".$prot."')";
			
			mysqli_query($con,$consulta2)or die('Segunda consulta fallida'.mysqli_error($con));

			$fila=mysqli_fetch_assoc($res);
		}
		
	}*/

	while($fila){
		
		$nom=$fila['nom_u'];
		$dni=$fila['DNI'];
		
		while($fila && $dni==$fila['DNI'] ){
			
			$nom2=$fila['nom_a'];
			$ide=$fila['ID'];
			
			while($fila && $dni==$fila['DNI'] && $ide==$fila['ID']){
				
				$nom3=$fila['PROTECTORA'];
				$ident=$fila['IDENTIFICADOR'];
				
				while($fila && $dni==$fila['DNI'] && $ide==$fila['ID'] && $ident==$fila['IDENTIFICADOR']){
					
				$consulta2="INSERT into seleccionados (ID,ANIMAL,DNI,USUARIO,IDENTIFICADOR,PROTECTORA) values ('".$nom."','".$dni."','".$nom2."','".$ide."','".$nom3."','".$ident."')";
					mysqli_query($con,$consulta2)or die('Segunda consulta fallida'.mysqli_error($con));
					
					//echo "INSERT into seleccionados (ID,ANIMAL,DNI,USUARIO,IDENTIFICADOR,PROTECTORA) values ('".$nom."','".$dni."','".$nom2."','".$ide."','".$nom3."','".$ident."')";
					$fila=mysqli_fetch_assoc($res);
				}
			}
		}
		
	}
	
	mysqli_close($con);
?>
