<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	 
	error_reporting(0);
	
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$datos=$_POST['datos'];
	$datos2=$_REQUEST['dat'];
	
	$cont=0;
	$imag=$_FILES["dato"];
	$nombre=$imag["name"];
	$ruta_prov=$imag["tmp_name"];
	$nom="";
	
	$tabla="";
	$esp="";
	$valAnt="";
	$cabecera="";
	$nomAnt="";
	
		foreach($datos as $clave => $valor){
			
			$tabla=$clave;
			
			foreach($valor as $clave1 => $valor1){
				$esp=$clave1;
				$cont++;
				foreach($valor1 as $clave2 => $valor2){
					
					$valAnt=$clave2;
					
					foreach($valor2 as $clave3 => $valor3){
						
						$cabecera=$clave3;
						
						foreach($valor3 as $clave4 => $valor4){
							
							$nomAnt=$clave4;
							
							foreach($valor4 as $clave5 => $valor5){
								

								if(!empty($valor5)){
									
									echo "UPDATE $tabla SET $esp='".mb_convert_encoding($valor5,'UTF-8')."' WHERE $cabecera = '$nomAnt'";
									
									if($esp == "CONTRASENIA"){
							
										$da=password_hash($valor5, PASSWORD_DEFAULT);
										
										$consulta="UPDATE $tabla SET $esp='$da' WHERE $cabecera = '$nomAnt''";
										mysqli_query($con,$consulta);
										
									}else{
										
										$consulta="UPDATE $tabla SET $esp='".mb_convert_encoding($valor5,'UTF-8')."' WHERE $cabecera = '$nomAnt'";
										mysqli_query($con,$consulta);
									}
									
									if(isset($imag)){
						
										$info = new SplFileInfo($nombre);
										switch (substr_compare($nombre, "PROTECTORA", 0, 9)){
											
											case "PROTECTORA": 
											
												$carpeta="../../../images/PROTECTORAS/";
						
												$src=$carpeta.$nombre;
												
												if($cont<=1){
													
													move_uploaded_file($ruta_prov,$src);
													
													$consulta="UPDATE $tabla SET IMAGEN = '".mb_convert_encoding($nombre,'UTF-8')."' WHERE $cabecera = '$nomAnt'";
													mysqli_query($con,$consulta);
													
													echo "../../images/PROTECTORAS/".$nombre;
												}
												
											break;
											
											default:
											
						
												$carpeta="../../../images/";
												$src=$carpeta.$nombre;
												
												if($cont<=1){
													
													move_uploaded_file($ruta_prov,$src);
													
													$consulta="UPDATE $tabla SET IMAGEN = '".mb_convert_encoding($nombre,'UTF-8')."' WHERE $cabecera = '$nomAnt'";
													mysqli_query($con,$consulta);
													echo "../../images/".$nombre;
												}
												
											break;
										}
									}
								}
								
							}
						}
					}
				}
			}
		}
		
	if(isset($datos2)){
		
		foreach($datos2 as $cla => $va){
			
			foreach ($va as $cla2 => $va2){
				
				foreach($va2 as $cla3 => $va3){
					
					foreach($va3 as $cla4 => $va4){
						
						foreach($va4 as $cla5 => $va5){
							
							$consulta="UPDATE $cla SET $cla2='$va5' WHERE $cla4 = '$cla5'";
							mysqli_query($con,$consulta);
						}
					}
				} 
			}
				
		}
	}
	mysqli_close($con);
?>
