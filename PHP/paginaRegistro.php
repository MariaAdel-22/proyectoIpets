<?php
	
	error_reporting(0);
	
	session_start();
	
	$datoTabla=$_SESSION['datoT'];
	$_SESSION['dat']=$_POST['dat'];
	
	$datoT=$_SESSION['dat'];
	
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
	
	
	if(($datoTabla != "")&&($datoT=="")){
		
		unset($_SESSION['dat']);
		$datoT="";
		
		
		$consulta="SHOW COLUMNS FROM $datoTabla";
		$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
		
		$fila=mysqli_fetch_assoc($res);
	
		while($fila){
			
			$cabecera=$fila['Field'];
			$fila=mysqli_fetch_assoc($res);
			
			if($cabecera != "IDENTIFICADOR"){
				
				switch($cabecera){
				
					case "IMAGEN":
						
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='file' name='dato' id='".$cabecera."' class='inpD'/></div>";
						
					break;
					
					case "EMAIL":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$' title='Introduce un correo electrónico que contenga mayúsculas,minúsculas o números.' required/></div>";
						
					break;
					
					case "CONTRASENIA":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>CONTRASEÑA</h4></div><div id='in' class='d-flex justify-content-center'><input type='password' name='datos[".$datoTabla."][".$cabecera."][]' id='CONTRASEÑA' class='inpD' pattern='[A-Za-z0-9!?-]{8,12}' title='Introduce una contraseña de entre 8 y 12 caracteres.' required/></div>";
						
					break;
					
					case "TRABAJO":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div>";
							echo "<div id='in' class='d-flex justify-content-center'>";
								echo "<select  name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' title='Por favor seleccione una de las opciones.' required>";
											
									echo "<option value=''>--Selecciona una opción--</option>";
									echo "<option value='Si'>Si</option>";
									echo "<option value='No'>No</option>";
										
								echo "</select>";
							echo "</div>";
						echo "</div>";
						
					break;
					
					case "NOMBRE":
						
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*' required/></div>";
					
					break;
					
					case "APELLIDOS":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}[ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}' title='Introduce los apellidos: apellido1 apellido2.' required/></div>";
						
					break;
					
					case "EDAD":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[0-9]{1,2}\s*(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)*' title='Introduce uno o dos valores junto a: AÑO,MES,DIA,AÑOS,MESES,DIAS o Año,Dia,Mes,Dias,Meses,Años.' required/></div>";
						
					break;
					
					case "DIRECCION":
								
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='((CALLE|Calle)).[A-Z-Á-É-Í-Ó-Ú][a-z]+[,]\s([0-9]{1,2}).[0-9][A-Z]' title='Introduce una direccion con el siguiente formato: Calle Menorca, 32 3A' required/></div>";
						
					break;
					
					case "CONTACTO":
				
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='([0-9]{3}[-][0-9]{3}[-][0-9]{3})*(^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$)*' title='Introduce un número de teléfono o un email.' required/></div>";
						
					break;
					
					case "LOCALIDAD":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[A-Z-Ñ][a-z-ñ]{3,}' title='Introduce una localidad con más de 3 caracteres.' required/></div>";
					
					break;
					
					case "CODIGOPOSTAL":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='((0[1-9])|(5[0-2])|([1-4][0-9]))[0-9]{3}' title='Introduce 5 números entre 01000 y 52999.' required/></div>";
					
					break;
					
					case "DNI":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoTabla."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))' title='Introduce un DNI(8 números + 1 letra mayus) o NIE(7 números + 1 letra mayus).' required/></div>";
					
					break;
					
			
					
				}
			}
		}

	}else
	
	if($datoT!=""){
		
		
		unset($_SESSION['datoT']);
		$datoTabla="";
		
		$consulta="SHOW COLUMNS FROM $datoT";
		$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
		
		$fila=mysqli_fetch_assoc($res);
	
		while($fila){
			
			$cabecera=$fila['Field'];
			$fila=mysqli_fetch_assoc($res);
			
			if($cabecera != "ID"){
				
				switch($cabecera){
				
					case "IMAGEN":
						
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='file' name='dato' id='".$cabecera."' class='inpD'/></div>";
						
					break;
					
					case "NOMBRE":
						
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoT."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*' required/></div>";
					
					break;
				
					case "EDAD":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoT."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[0-9]{1,2}\s*(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)*' title='Introduce uno o dos valores junto a: AÑO,MES,DIA,AÑOS,MESES,DIAS o Año,Dia,Mes,Dias,Meses,Años.' required/></div>";
						
					break;
				
					case "ESPECIE":
				
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div>";
						echo "<div id='in' class='d-flex justify-content-center'>";
					
							echo "<select name='datos[".$datoT."][".$cabecera."][]' id='".$cabecera."' class='inpD' title='Por favor seleccione una de las opciones.' required>";
										
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
						
					break;
					
					case "GENERO":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div>";
						echo "<div id='in' class='d-flex justify-content-center'>";
					
							echo "<select name='datos[".$datoT."][".$cabecera."][]' id='".$cabecera."' class='inpD' title='Por favor seleccione una de las opciones.' required>";
										
								echo "<option value=''>--Selecciona una opción--</option>";
								echo "<option value='MACHO'>Macho</option>";
								echo "<option value='HEMBRA'>Hembra</option>";
								echo "<option value='HERMAFRODITA'>Hermafrodita</option>";
									
							echo "</select>";
						echo "</div>";
						
					break;
					
					case "RAZA":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoT."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='((COMÚN EUROPEO|COMUN EUROPEO|Común europeo|Comun europeo)|[A-ZÑa-z-ñ]{3,})' title='Introduce la raza Comun europeo o una que contenga más de 3 letras.' required/></div>";
					
					break;
					
					case "FECHANACIMIENTO":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoT."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[0-9]{4}[-][0-9]{2}[-][0-9]{2}' title='title='Introduce el formato: aaaa-mm-dd.' required/></div>";
					
					break;
					
					case "TIEMPOINYECCION":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoT."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[0-9]{1,2}\s(DIA|DIAS|Dia|Dias)' title='Introduce 1 o dos valores junto: dias o dia.' required/></div>";
					
					break;
					
					case "PESO":
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'><h4>".$cabecera."</h4></div><div id='in' class='d-flex justify-content-center'><input type='text' name='datos[".$datoT."][".$cabecera."][]' id='".$cabecera."' class='inpD' pattern='[0-9]{1,4}' required/></div>";
					
					break;
				}
			}
		}
	}

    mysqli_close($con);
	
?>
