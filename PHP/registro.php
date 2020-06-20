<?php
 
 header('Content-Type: text/html; charset=UTF-8');
  
 error_reporting(0);
 $dat=$_POST['datos'];
 
 $tabla="";
 
 $imag=$_FILES["dato"];
 $nombre=$imag["name"];
 $ruta_prov=$imag["tmp_name"];
	
	$ar1= array();
	$ar2=array();
	
	foreach($dat as $clave => $valor){
		
		$tabla=$clave;
		
		foreach($valor as $clave2 => $valor2){
			
			foreach($valor2 as $clave3 => $valor3){
				
				if(!empty($valor3)){
					
					
					if($clave2 == "CONTRASENIA"){
						
						array_push($ar2,$clave2);
						array_push($ar1,password_hash($valor3, PASSWORD_DEFAULT));
					
					}else{
						array_push($ar2,$clave2);
						array_push($ar1,$valor3);
					}
				}
			}
		}
	}
	
	if(isset($imag)){
		
		$info = new SplFileInfo($nombre);
		switch (substr_compare($nombre, "PROTECTORA", 0, 9)){
			
			case "PROTECTORA": 
			
				$carpeta="../images/PROTECTORAS/";
				$src=$carpeta.$nombre;
				
					move_uploaded_file($ruta_prov,$src);
					
					array_push($ar2,"IMAGEN");
					array_push($ar1,$nombre);
					
			break;
			
			default:
			
				$carpeta="../images/";
				$src=$carpeta.$nombre;
				
				move_uploaded_file($ruta_prov,$src);
					
					array_push($ar2,"IMAGEN");
					array_push($ar1,$nombre);
					
			break;
		}
	}
	
	$cabecera=implode(",",$ar2);
	$dato="'".implode("','", $ar1)."'";
	
	require 'conexion.php';
	$con->set_charset("utf8");

	$consulta0="INSERT INTO $tabla ($cabecera) VALUES (".$dato.")";
	mysqli_query($con,$consulta0);
	
	if($tabla == "animal"){
		
		/*include 'pasoDatosProtectora.php';
		
		$id=$_SESSION['ident'];
		
		$consulta1="SELECT NOMBRE FROM protectora WHERE IDENTIFICADOR='$id'";
		$res=mysqli_query($con,$consulta1);
		$fila=mysqli_fetch_assoc($res);
		
		
		while($fila){
			
			$protec=$fila['NOMBRE'];
			
			while($fila && $protec == $fila['NOMBRE']){
				
				$animal=$ar1[0];
				$fila=mysqli_fetch_assoc($res);
				
				$consulta2="INSERT INTO disponibles (ANIMAL,PROTECTORA) VALUES ('".mb_convert_encoding($animal,'UTF-8')."','".mb_convert_encoding($protec,'UTF-8')."')";
				mysqli_query($con,$consulta2);

			}
		}*/
		echo "Paso por aqui";
		
	}
	
	mysqli_close($con);
?>
