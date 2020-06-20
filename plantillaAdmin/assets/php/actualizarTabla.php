<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	 
	error_reporting(E_ALL);
	
	require '../../../PHP/conexion.php';
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
									
									if($esp == "CONTRASENIA"){
							
										$da=password_hash($valor5, PASSWORD_DEFAULT);
										
										$consulta1="UPDATE $tabla SET $esp='$da' WHERE $cabecera = '$nomAnt''";
										mysqli_query($con,$consulta1);
										
									}else{
										
										$consulta2="UPDATE $tabla SET $esp='".$valor5."' WHERE $cabecera = '$nomAnt'";
										mysqli_query($con,$consulta2);
									}
									
									if(isset($imag)){
						
										$info = new SplFileInfo($nombre);
										switch (substr_compare($nombre, "PROTECTORA", 0, 9)){
											
											case "PROTECTORA": 
											
												$carpeta="../../../images/PROTECTORAS/";
						
												$src=$carpeta.$nombre;
												
												if($cont<=1){
													
													move_uploaded_file($ruta_prov,$src);
													
													$consulta3="UPDATE $tabla SET IMAGEN = '".$nombre."' WHERE $cabecera = '$nomAnt'";
													mysqli_query($con,$consulta3);
													
													echo "../../images/PROTECTORAS/".$nombre;
												}
												
											break;
											
											default:
											
						
												$carpeta="../../../images/";
												$src=$carpeta.$nombre;
												
												if($cont<=1){
													
													move_uploaded_file($ruta_prov,$src);
													
													$consulta4="UPDATE $tabla SET IMAGEN = '".$nombre."' WHERE $cabecera = '$nomAnt'";
													mysqli_query($con,$consulta4);
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
							
							$consulta5="UPDATE $cla SET $cla2='$va5' WHERE $cla4 = '$cla5'";
							mysqli_query($con,$consulta5);
						}
					}
				} 
			}
				
		}
	}
	mysqli_close($con);
?>
