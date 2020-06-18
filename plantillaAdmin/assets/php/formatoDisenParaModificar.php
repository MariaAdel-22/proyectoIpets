<?php
	
	error_reporting(0);
		
	session_start();
		
	$nombreT=$_SESSION['tabla'];
	$datos=$_SESSION['datos'];
	$cab=$_SESSION['cabecera'];
	$nom="";
	$c="";
	
	echo "<div class='row d-flex align-self-center' id='fila'>";
		echo "<div class='col-lg-8 col-md-8 col-sm-8 col-8 pt-lg-3 pt-md-3 pt-sm-3 pt-3 offset-lg-1 offset-md-1 offset-sm-1 offset-1'>";
			echo "<div class='caja2 card d-flex align-items-center' id='$nombreT'>";
	
			for($i=0;$i<sizeof($cab);$i++){
				
				if(($cab[$i]!="ID")&&($cab[$i]!="IDENTIFICADOR")){
					
					$ca=$cab[$i];
					$dat=$datos[$i];
					
					if(($cab[$i] == "NOMBRE") || ($cab[$i] == "PROTECTORA") || ($cab[$i] == "ANIMAL") || ($cab[$i] == "USUARIO")){
						
						$c=$cab[$i];
						$nom=$datos[$i];
					}
				
					$info = new SplFileInfo($dat);
					
					if(substr_compare($dat, "PROTECTORA", 0, 9)){
										
						if($ca=="IMAGEN"){
							
							$imag=$datos[$i];
							
							if($imag == ""){
							
								echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
				
									echo "<div class='im col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center rounded-circle'>";

										echo "<img class='noV p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-fluid d-flex align-self-center' src='../../images/$imag' alt='Imagen Perfil' id='idIm'>";
										
										echo "<span class='archivo' id='arch'>";
											echo "<input type='file' id='imag1' name='dato'>";
										echo "</span>";

										echo "<label for='archivo'>";
										  echo "<span><i class='faa fas fa-plus-circle' id='$ca'></i></span>";
									   echo "</label>";
									echo "</div>";
								echo "</div>";
								
							}else{
								
														
								echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
				
									echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center'>";

										echo "<img class='ima p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-thumbnail img-responsive d-flex align-self-center' src='../../images/$imag' alt='Imagen Perfil' id='idIm'>";

										echo "<span class='archivo' id='arch'>";
											echo "<input type='file' id='imag' name='dato'>";
										echo "</span>";

										echo "<label for='archivo'>";
										  echo "<span><i class='fas fa-plus-circle' id='$ca'></i></span>";
									   echo "</label>";
									echo "</div>";
								echo "</div>";
							}	
								
						}
						
						
						if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
							
							
							switch($ca){
								
								case "ESPECIE":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div>";
									echo "<div id='in'>";
										echo "<select id='$dat' name='dat[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."]' class='inpD noV' title='Por favor seleccione una de las opciones.'>";
										
												echo "<option value=''>--Selecciona una opción--</option>";
												echo "<option value='PERRO'>Perro</option>";
												echo "<option value='GATO'>Gato</option>";
												echo "<option value='CONEJO'>Conejo</option>";
												echo "<option value='ROEDOR'>Roedor</option>";
												echo "<option value='EQUINO'>Equino</option>";
												echo "<option value='REPTIL'>Reptil</option>";
												echo "<option value='CERDO'>Cerdo</option>";
												echo "<option value='AVE'>Ave</option>";
												echo "<option value='PEZ'>Pez</option>";
												
										echo "</select>";
									echo "</div>";
									echo "<div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
								break;
								
								case "GENERO":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div>";
									echo "<div id='in'>";
										echo "<select id='$dat' name='dat[".$nombreT."][".$ca."][".$dat."][]' class='inpD noV' title='Por favor seleccione una de las opciones.'>";
										
												echo "<option value=''>--Selecciona una opción--</option>";
												echo "<option value='MACHO'>Macho</option>";
												echo "<option value='HEMBRA'>Hembra</option>";
												echo "<option value='HERMAFRODITA'>Hermafrodita</option>";
												
										echo "</select>";
									echo "</div>";
									echo "<div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "RAZA":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='((COMÚN EUROPEO|COMUN EUROPEO|Común europeo|Comun europeo)|[A-ZÑa-z-ñ]{3,})' title='Introduce la raza Comun europeo o una que contenga más de 3 letras.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "FECHANACIMIENTO":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' class='inpD noV' pattern='[0-9]{4}[-][0-9]{2}[-][0-9]{2}' title='Introduce el formato: aaaa-mm-dd.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "TIEMPOINYECCION":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='[0-9]{1,2}\s(DIA|DIAS|Dia|Dias)' title='Introduce 1 o dos valores junto: dias o dia.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "EDAD":
									
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='[0-9]{1,2}\s*(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)*' title='Introduce uno o dos valores junto a: AÑO,MES,DIA,AÑOS,MESES,DIAS o Año,Dia,Mes,Dias,Meses,Años.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "PESO":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='[0-9]{1,4}'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
								
								break;
								
								case "CONTRASENIA":
									
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>CONTRASEÑA</h4></div><div id='in'><input type='password' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='[A-Za-z0-9!?-]{8,12}' title='Introduce una contraseña de entre 8 y 12 caracteres.'/></div><div id='CONTRASEÑA'><i class='fas fa-edit' id='$ca'></i></div>";
								
								break;
								
								case "DIRECCION":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='((CALLE|Calle)).[A-Z-Á-É-Í-Ó-Ú][a-z]+[,]\s([0-9]{1,2}).[0-9][A-Z]' title='Introduce una direccion con el siguiente formato: Calle Menorca, 32 3A'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
								
								break;
								
								case "CONTACTO":
									
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='(([0-9]{3}[-][0-9]{3}[-][0-9]{3}))|((^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$))' title='Introduce un número de teléfono o un email.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "LOCALIDAD":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='[A-Z-Ñ][a-z-ñ]{3,}' title='Introduce una localidad con más de 3 caracteres.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
								
								break;
								
								case "CODIGOPOSTAL":
									
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='((0[1-9])|(5[0-2])|([1-4][0-9]))[0-9]{3}' title='Introduce 5 números entre 01000 y 52999.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "EMAIL":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$' title='Introduce un correo electrónico que contenga mayúsculas,minúsculas o números.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
								break;
								
								case "TRABAJO":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='(SI|NO|Si|No)' title='Introduzca los valores: Si o No.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "NOMBRE":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*' title='Introduce un nombre de 2 a 25 caracteres.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
								
								break;
								
								case "APELLIDOS":
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='[[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}[ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}' title='Introduce los apellidos: apellido1 apellido2.'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
								case "DNI":
							
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV' pattern='(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))' title='Introduce un DNI(8 números + 1 letra mayus) o NIE(7 números + 1 letra mayus)'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
																
								break;
								
								default:
								
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4 id='".$dat."'>".$ca.": <i>".$dat."</i></h4></div><div id='in'><input type='text' name='datos[".$nombreT."][".$ca."][".$dat."][".$c."][".$nom."][]' id='".$dat."' class='inpD noV'/></div><div id='$ca'><i class='fas fa-edit' id='$ca'></i></div>";
									
								break;
								
							}
						}
						
					}else{
						
						
						if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
							
								
							if($ca=="IMAGEN"){
							
								$imag=$datos[$i];
								
								if($imag == ""){
								
									echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
					
										echo "<div class='im col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center rounded-circle'>";

											echo "<img class='noV p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-fluid d-flex align-self-center' src='../../images/PROTECTORAS/$imag' alt='Imagen Perfil' id='idIm'>";
											
											echo "<span class='archivo' id='arch'>";
												echo "<input type='file' id='imag1' name='dato'>";
											echo "</span>";

											echo "<label for='archivo'>";
											  echo "<span><i class='faa fas fa-plus-circle' id='$ca'></i></span>";
										   echo "</label>";
										echo "</div>";
									echo "</div>";
									
								}else{
															
									echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
					
										echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center'>";

											echo "<img class='ima p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-thumbnail img-responsive d-flex align-self-center' src='../../images/PROTECTORAS/$imag' alt='Imagen Perfil' id='idIm'>";

											echo "<span class='archivo' id='arch'>";
												echo "<input type='file' id='imag' name='dato'>";
											echo "</span>";

											echo "<label for='archivo'>";
											  echo "<span><i class='fas fa-plus-circle' id='$cab'></i></span>";
										   echo "</label>";
										echo "</div>";
									echo "</div>";
								}	
								
							}	
						}					
					}
				}
			}
			echo "</div>";
		echo "</div>";
	echo "</div>";

?>