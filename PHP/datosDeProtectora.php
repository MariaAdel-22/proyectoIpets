<?php

	include 'pasoDatosProtectora.php';

	$con=mysqli_connect('localhost','root','','ipetsbbdd')or die('No se pudo establecer conexion.'.mysqli_error($con));
	
	$id=$_SESSION['ident'];

	$consulta="SELECT * FROM protectora WHERE IDENTIFICADOR='$id' ORDER BY IDENTIFICADOR,NOMBRE ASC";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$ide=$fila['IDENTIFICADOR'];
		
		while($fila && $ide==$fila['IDENTIFICADOR']){
		
			$nom=$fila['NOMBRE'];
			$contra=$fila['CONTRASENIA'];
			$local=$fila['LOCALIDAD'];
			$direc=$fila['DIRECCION'];
			$contact=$fila['CONTACTO'];
			$imag=$fila['IMAGEN'];	
			
			while($fila && $ide==$fila['IDENTIFICADOR'] && $nom==$fila['NOMBRE']){
				
				$fila=mysqli_fetch_assoc($res);
			
				echo "<div class='row offset-lg-4 offset-md-4 offset-sm-4 offset-2 mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
			
					echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-self-center'>";

						echo "<img class='p-lg-1 p-md-2 p-sm-2 p-2 rounded-circle img-fluid d-flex align-self-center' src='../$imag' alt='Imagen Perfil' id='imagPr'>";

						echo "<span class='archivo'>";
							echo "<input type='file' id='imag' name='imag' class='im'>";
						echo "</span>";

						echo "<label for='archivo'>";
						  echo "<span><i class='fas fa-plus-circle'></i></span>";
					   echo "</label>";
					echo "</div>";
				echo "</div>";
					
				echo "<div class='row d-flex align-self-center'>";
						echo "<div class='col-lg-8 col-md-8 col-sm-8 col-8 pt-lg-3 pt-md-3 pt-sm-3 pt-3 offset-lg-1 offset-md-1 offset-sm-1 offset-1'>";

							echo "<div class='caja2 card d-flex align-items-center'>";
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='1'><h4>Identificador : <i>$ide</i></h4><i class='fas fa-edit'></i></div>";
								
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='2'><h4>Nombre : <i>$nom</i></h4><i class='fas fa-edit'></i></div>";
						
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='3'><h4>Contraseña : <i>$contra</i></h4><i class='fas fa-edit'></i></div>";
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='4'><h4>Localidad : <i>$local</i></h4><i class='fas fa-edit'></i></div>";
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='5'><h4>Dirección : <i>$direc</i></h4><i class='fas fa-edit'></i></div>";
							
								echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='6'><h4>Contacto : <i>$contact</i></h4><i class='fas fa-edit'></i></div>";
							
								echo "</div>";
						echo "</div>";
				echo "</div>";
			}
		}
	
	}
?>