<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	session_start();
		
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$nombreC=$_SESSION['valorA'];
	
	$consulta="SHOW COLUMNS FROM $nombreC";
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	echo "<div class='row d-flex align-self-center' id='fila'>";
		echo "<div class='col-lg-8 col-md-8 col-sm-8 col-8 pt-lg-3 pt-md-3 pt-sm-3 pt-3 offset-lg-1 offset-md-1 offset-sm-1 offset-1'>";
			echo "<div class='caja2 card d-flex align-items-center' id='da'>";
	
	
				while($fila){
				
					$cab=$fila['Field'];
					$fila=mysqli_fetch_assoc($res);
				
					if(($cab!="ID")&&($cab!="IDENTIFICADOR")){
						
						switch($cab){
						
							case "IMAGEN":
						
								echo "<div class='card-body mt-lg-3 mt-md-3 mt-sm-3 mt-3 mb-3 d-flex justify-content-center'><h4>".$cab.": <i><input type='file' name='dato' class='in2'/></i></h4></div>";
							
							break;
							
							case "ESPECIE":
										
									echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div>";
									echo "<div id='in'>";
									
										echo "<select name='datos[".$cab."][]' id='".$cab."' class='inpD' title='Por favor seleccione una de las opciones.' required>";
										
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
										
									echo"</div>";
							break;
							
							case "GENERO":
						
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div>";
									echo "<div id='in'>";
									
										echo "<select name='datos[".$cab."][]' id='".$cab."' class='inpD' title='Por favor seleccione una de las opciones.' required>";
										
												echo "<option value=''>--Selecciona una opción--</option>";
												echo "<option value='MACHO'>Macho</option>";
												echo "<option value='HEMBRA'>Hembra</option>";
												echo "<option value='HERMAFRODITA'>Hermafrodita</option>";
												
										echo "</select>";
										
									echo"</div>";
							break;
							
							case "RAZA":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='((COMÚN EUROPEO|COMUN EUROPEO|Común europeo|Comun europeo)|[A-ZÑa-z-ñ]{3,})' title='Introduce la raza Comun europeo o una que contenga más de 3 letras.' required/></div>";
									
							break;
							
							case "FECHANACIMIENTO":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='[0-9]{4}[-][0-9]{2}[-][0-9]{2}' title='Introduce el formato: aaaa-mm-dd.' required/></div>";
															
							break;
							
							case "TIEMPOINYECCION":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='[0-9]{1,2}\s(DIA|DIAS|Dia|Dias)' title='Introduce 1 o dos valores junto: dias o dia.' required/></div>";
			
							break;
							
							case "EDAD":
								
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='[0-9]{1,2}\s*(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)*' title='Introduce uno o dos valores junto a: AÑO,MES,DIA,AÑOS,MESES,DIAS o Año,Dia,Mes,Dias,Meses,Años.' required/></div>";
																							
							break;
							
							case "PESO":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='[0-9]{1,4}' required/></div>";
																							
							break;
							
							case "CONTRASENIA":
								
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>CONTRASEÑA</h4></div><div id='in'><input type=password' name='datos[".$cab."][]' id='CONTRASEÑA' class='inpD' pattern='[A-Za-z0-9!?-]{8,12}' title='Introduce una contraseña de entre 8 y 12 caracteres.' required/></div>";
															
							break;
							
							case "DIRECCION":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='((CALLE|Calle)).[A-Z-Á-É-Í-Ó-Ú][a-z]+[,]\s([0-9]{1,2}).[0-9][A-Z]' title='Introduce una direccion con el siguiente formato: Calle Menorca, 32 3A' required/></div>";
															
							break;
							
							case "CONTACTO":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='(([0-9]{3}[-][0-9]{3}[-][0-9]{3}))|((^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$))' title='Introduce un número de teléfono o un email.' required/></div>";
													
							break;
							
							case "LOCALIDAD":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='[A-Z-Ñ][a-z-ñ]{3,}' title='Introduce una localidad con más de 3 caracteres.' required/></div>";
														
							break;
							
							case "CODIGOPOSTAL":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='((0[1-9])|(5[0-2])|([1-4][0-9]))[0-9]{3}' title='Introduce 5 números entre 01000 y 52999.' required/></div>";
																							
							break;
							
							case "EMAIL":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$' title='Introduce un correo electrónico que contenga mayúsculas,minúsculas o números.' required/></div>";
														
							break;
							
							case "TRABAJO":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div>";
									echo "<div id='in'>";
									
										echo "<select  name='datos[".$cab."][]' id='".$cab."' class='inpD' title='Por favor seleccione una de las opciones.' required>";
												
											echo "<option value=''>--Selecciona una opción--</option>";
											echo "<option value='Si'>Si</option>";
											echo "<option value='No'>No</option>";
											
										echo "</select>";
								echo "</div>";
																							
							break;
							
							case "APELLIDOS":
								
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}[ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}' title='Introduce los apellidos: apellido1 apellido2.' required/></div>";
																
							break;
							
							case "NOMBRE":
								
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*' required/></div>";
								
							break;
							
							case "DNI":
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD' pattern='(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))' title='Introduce un DNI(8 números + 1 letra mayus) o NIE(7 números + 1 letra mayus)' required/></div>";
							
							break;
							
							default:
								
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cab."</h4></div><div id='in'><input type='text' name='datos[".$cab."][]' id='".$cab."' class='inpD'/></div>";
															
							break;
							
						}
					}
					
				}
		
			echo "</div>";
		echo "</div>";
	echo "</div>";
	
	mysqli_close($con);
	
?>