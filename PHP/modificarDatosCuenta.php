<?php
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(E_ALL);
	
	include 'pasoDatosDeUsuario.php';
	include 'pasoDatosProtectora.php';
	require 'conexion.php';

	$con->set_charset("utf8");

	$nombreU=$_SESSION['nombre'];
	$nombreP=$_SESSION['ident'];
	
	$dat=$_POST['datos'];

	$cont=0;
	$nombeT="";
	
	$imag=$_FILES["dato"];
	$nombre=$imag["name"];
	$ruta_prov=$imag["tmp_name"];
	
	foreach($dat as $clave => $valor){
	
		foreach($valor as $clave2 => $valor2){
			
			foreach($valor2 as $clave3 => $valor3){
				
				$nombreT=$clave;
				
				foreach($valor3 as $clave4 => $valor4){
						
					if(!empty($valor4)){
						
						if(($nombreU!="")&&($nombreP=="")){
							
						  $nombreP="";
						  $consulta2="UPDATE $nombreT SET $clave2='".$valor4."' WHERE $clave2='$clave3' AND NOMBRE='$nombreU'";
						  mysqli_query($con,$consulta2);
						}else 
							
						  if(($nombreP!="")&&($nombreU=="")){
							  
						 	 $nombreU="";
						         $consulta3="UPDATE $nombreT SET $clave2='".$valor4."' WHERE $clave2='$clave3' AND IDENTIFICADOR='$nombreP'";
						  	mysqli_query($con,$consulta3);  
						  }
					}
					
				}
			}
		}
	}
	
if($nombreU!=""){
		
	if($nombre!=""){

		$carpeta="../images/";

		$src=$carpeta.$nombre;

		move_uploaded_file($ruta_prov,$src);

		$consulta4="UPDATE usuario SET IMAGEN = '".$nombre."' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta4);
		echo $src;
	}
}

if($nombreP!=""){

	if($nombre!=""){

		$carpeta="../images/PROTECTORAS/";

		$src=$carpeta.$nombre;

		move_uploaded_file($ruta_prov,$src);

		$consulta5="UPDATE protectora SET IMAGEN = '".$nombre."' WHERE IDENTIFICADOR='$nombreP'";
		mysqli_query($con,$consulta5);
		echo $src;
	}
}

mysqli_close($con);

?>
