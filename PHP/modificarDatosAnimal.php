<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd')or die('No se pudo establecer conexion.'.mysqli_error($con));
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
						
						$consulta="UPDATE $nombreT SET $clave2='".mb_convert_encoding($valor4,'UTF-8')."' WHERE $clave2='$clave3' AND ID='$id'";
						mysqli_query($con,$consulta);
					}
						
				}
			}
		}
	}
	
	if(isset($imag)){
							
		$carpeta="../images/";

		$src=$carpeta.$nombre;
		
		move_uploaded_file($ruta_prov,$src);
		
		$consulta3="UPDATE animal SET IMAGEN = '".mb_convert_encoding($nombre,'UTF-8')."' WHERE ID='$id'";
		mysqli_query($con,$consulta3);
		
		echo $src;
	}
	
	mysqli_close($con);
?>