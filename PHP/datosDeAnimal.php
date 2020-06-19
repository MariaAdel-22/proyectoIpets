<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	session_start();
	
	$id=$_SESSION['id'];
	$datos=array();
		
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");

	$consulta="SELECT ID,NOMBRE,ESPECIE,EDAD,GENERO,RAZA,FECHANACIMIENTO,TIEMPOINYECCION,PESO,IMAGEN FROM animal WHERE ID='$id'";

	$res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));

	while($fila=mysqli_fetch_row($res)){
		
		foreach($fila as $valor){
			
			array_push($datos,$valor);
		}
	}
	
	$consulta2="SHOW COLUMNS FROM animal";
	$res2=mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con));
	$fila2=mysqli_fetch_assoc($res2);
	
	echo "<div class='row d-flex align-self-center' id='fila'>";
		echo "<div class='col-lg-8 col-md-8 col-sm-8 col-8 pt-lg-3 pt-md-3 pt-sm-3 pt-3 offset-lg-1 offset-md-1 offset-sm-1 offset-1'>";
			echo "<div class='caja2 card d-flex align-items-center' id='animal'>";
			while($fila2){
				
				for($i=0;$i<sizeof($datos);$i++){
					
					$cab=$fila2['Field'];
					$fila2=mysqli_fetch_assoc($res2);
					
					if($cab == "IMAGEN"){
						
						$imag=$datos[$i];
										
						if($imag == ""){
							
							echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
			
								echo "<div class='im col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center rounded-circle'>";

									echo "<img class='noV p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-fluid d-flex align-self-center' src='../images/$imag' alt='Imagen Perfil' id='idIm'>";
									
									echo "<span class='archivo' id='arch'>";
										echo "<input type='file' id='imag1' name='dato'>";
									echo "</span>";

									echo "<label for='archivo'>";
									  echo "<span><i class='faa fas fa-plus-circle' id='$cab'></i></span>";
								   echo "</label>";
								echo "</div>";
							echo "</div>";
							
						}else{
							
													
							echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
			
								echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center'>";

									echo "<img class='ima p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-thumbnail img-responsive d-flex align-self-center' src='../images/$imag' alt='Imagen Perfil' id='idIm'>";

									echo "<span class='archivo' id='arch'>";
										echo "<input type='file' id='imag' name='dato'>";
									echo "</span>";

									echo "<label for='archivo'>";
									  echo "<span><i class='fas fa-plus-circle' id='$cab'></i></span>";
								   echo "</label>";
								echo "</div>";
							echo "</div>";
						}	
						
					}else{
						
						if($cab!="ID"){
							
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='$cab'><h4 id='$datos[$i]'>".$cab.": <i>".$datos[$i]."</i></h4></div><div id='$datos[$i]'></div><div><i class='fas fa-edit' id='$cab'></i></div>";
						}
					}
						
				}
			}
			echo "</div>";
		echo "</div>";
	echo "</div>";
	
	mysqli_close($con);

?>
