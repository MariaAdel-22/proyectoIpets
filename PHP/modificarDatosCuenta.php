<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	
	include 'pasoDatosDeUsuario.php';
	include 'pasoDatosProtectora.php';

	$nombreU=$_SESSION['nombre'];
	$nombreP=$_SESSION['ident'];
	
	/*$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
	mysqli_select_db($con,"heroku_0c87bc892272e39")or die('No se pudo conectar a la base de datos');
	$con->set_charset("utf8");*/
	
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
						
					if($nombreU!=""){
						
						$nombreP="";
						
						if(!empty($valor4)){
							
							$cont++;
							$consulta="UPDATE $nombreT SET $clave2='".mb_convert_encoding($valor4,'UTF-8')."' WHERE $clave2='$clave3' AND NOMBRE='$nombreU'";
							mysqli_query($con,$consulta);
						}
						
					}
					
					if($nombreP!=""){
						
						$nombreU="";
						
						if(!empty($valor4)){
							
							$cont++;
							
							$consulta="UPDATE $nombreT SET $clave2='".mb_convert_encoding($valor4,'UTF-8')."' WHERE $clave2='$clave3' AND IDENTIFICADOR='$nombreP'";
							mysqli_query($con,$consulta);

						}

					}
				}
			}
		}
	}
	
	if($nombreU!=""){
		
		if(isset($imag)){
							
			$carpeta="../images/";

			$src=$carpeta.$nombre;
			
			move_uploaded_file($ruta_prov,$src);
			
			$consulta3="UPDATE usuario SET IMAGEN = '".mb_convert_encoding($nombre,'UTF-8')."' WHERE NOMBRE='$nombreU'";
			mysqli_query($con,$consulta3);
			echo $src;
		}
	}
	
	if($nombreP!=""){
		
		if(isset($imag)){
							
			$carpeta="../images/PROTECTORAS/";

			$src=$carpeta.$nombre;
			
			move_uploaded_file($ruta_prov,$src);
			
			$consulta3="UPDATE protectora SET IMAGEN = '".mb_convert_encoding($nombre,'UTF-8')."' WHERE IDENTIFICADOR='$nombreP'";
			mysqli_query($con,$consulta3);
			echo $src;
		}
	}
	
mysqli_close($con);

?>
