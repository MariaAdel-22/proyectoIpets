<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

	require 'conexion.php';
	$con->set_charset("utf8");

	$id=$_SESSION['id'];
	
	$dat=$_POST['datos'];

	$cont=0;
	$nombeT="";
	
	$imag=$_FILES["dato"];
	$nombre=$imag["name"];
	$ruta_prov=$imag["tmp_name"];
	
	
	foreach($dat as $clave => $valor){
		$cont++;
		foreach($valor as $clave2 => $valor2){
			
			foreach($valor2 as $clave3 => $valor3){
				
				$nombreT=$clave;
				
				foreach($valor3 as $clave4 => $valor4){
					
					if(!empty($valor4)){
						
						$consulta1="UPDATE $nombreT SET $clave2='".$valor4."' WHERE $clave2='$clave3' AND ID='$id'";
						mysqli_query($con,$consulta1);
					}
						
				}
			}
		}
	}
	
	/*if($imag!=""){
							
		$carpeta="../images/";

		$src=$carpeta.$nombre;
		
		move_uploaded_file($ruta_prov,$src);
		
		$consulta2="UPDATE animal SET IMAGEN = '".$nombre."' WHERE ID='$id'";
		mysqli_query($con,$consulta2);
		
		echo $src;
	}*/
	
	if($nombre!=""){
							
		$carpeta="../images/";

		$src=$carpeta.$nombre;
		
		move_uploaded_file($ruta_prov,$src);
		
		$consulta2="UPDATE animal SET IMAGEN = '".$nombre."' WHERE ID='$id'";
		mysqli_query($con,$consulta2);
		
		echo $src;
	}
	
	mysqli_close($con);
?>
