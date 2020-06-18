<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	  
	error_reporting(0);
	session_start();
	
	$valorTabla=$_SESSION['valorA'];
	$datos=$_POST['datos'];
	
	$imag=$_FILES["dato"];
	$nombre=$imag["name"];
	$ruta_prov=$imag["tmp_name"];
	
	$ar1= array();
	$ar2=array();
	$cont=0;
	
	foreach($datos as $clave => $valor){
	
		foreach($valor as $valor2){
			
			if(!empty($valor2)){
				
				array_push($ar2,$clave);
				
				if($clave == "CONTRASENIA"){
					
					array_push($ar1,password_hash($valor2, PASSWORD_DEFAULT));
				}else{
					
					array_push($ar1,$valor2);
				}
			}
			
		}
		
	}
	
	if(isset($imag)){
		
		$info = new SplFileInfo($nombre);
		switch (substr_compare($nombre, "PROTECTORA", 0, 9)){
			
			case "PROTECTORA": 
			
				$carpeta="../../../images/PROTECTORAS/";
				$src=$carpeta.$nombre;
				
					move_uploaded_file($ruta_prov,$src);
					
					array_push($ar2,"IMAGEN");
					array_push($ar1,$nombre);
					
			break;
			
			default:
			
				$carpeta="../../../images/";
				$src=$carpeta.$nombre;
				
					move_uploaded_file($ruta_prov,$src);
					
					array_push($ar2,"IMAGEN");
					array_push($ar1,$nombre);
			break;
		}
	}
	
	$cabecera=implode(",",$ar2);
	$dat="'".implode("','", $ar1)."'";
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$consulta="INSERT INTO $valorTabla ($cabecera) VALUES (".mb_convert_encoding($dat,'UTF-8').")";

	mysqli_query($con,$consulta);
	
	mysqli_close($con);
	

?>