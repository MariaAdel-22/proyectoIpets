<?php

	include 'pasoDatosDeUsuario.php';
	
	$nombreU=$_SESSION['nombre'];
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$consulta="SELECT NOMBRE,APELLIDOS,DNI,EDAD,LOCALIDAD,TRABAJO,DIRECCION,CODIGOPOSTAL,EMAIL,CONTRASENIA,IMAGEN FROM usuario WHERE NOMBRE='$nombreU' ORDER BY NOMBRE,DNI ASC";

	$res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	

	
	while($fila){
		
		$nom=$fila['NOMBRE'];
		
		while($fila && $nom==$fila['NOMBRE']){
			
			$dni=$fila['DNI'];
			$imag=$fila['IMAGEN'];
			$apellidos=$fila['APELLIDOS'];
			$edad=$fila['EDAD'];
			$local=$fila['LOCALIDAD'];
			$trab=$fila['TRABAJO'];
			$direc=$fila['DIRECCION'];
			$codP=$fila['CODIGOPOSTAL'];
			$email=$fila['EMAIL'];
			$contra=$fila['CONTRASENIA'];
		
			while($fila && $nom==$fila['NOMBRE'] && $dni==$fila['DNI']){
				
				$fila=mysqli_fetch_assoc($res);
				
				
				echo "<div class='row offset-lg-4 offset-md-4 offset-sm-4 offset-2 mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
		
					echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-self-center'>";

						echo "<img class='p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-thumbnail d-flex align-self-center' src='../$imag' alt='Imagen Perfil' id='imagP'>";

						echo "<span class='archivo' id='arch'>";
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
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='1'><h4>Nombre : <i>$nom</i></h4><i class='fas fa-edit'></i></div>";
				
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='2'><h4>Apellidos : <i>$apellidos</i></h4><i class='fas fa-edit'></i></div>";
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='3'><h4>DNI : <i>$dni</i></h4><i class='fas fa-edit'></i></div>";
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='4'><h4>Edad : <i>$edad</i></h4><i class='fas fa-edit'></i></div>";
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='5'><h4>Localidad : <i>$local</i></h4><i class='fas fa-edit'></i></div>";
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='6'><h4>Trabajo : <i>$trab</i></h4><i class='fas fa-edit'></i></div>";
						
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='7'><h4>Direccion : <i>$direc</i></h4><i class='fas fa-edit'></i></div>";
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='8'><h4>Código Postal : <i>$codP</i></h4><i class='fas fa-edit'></i></div>";
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='9'><h4>Email : <i>$email</i></h4><i class='fas fa-edit'></i></div>";
					
						echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3 mb-lg-3 mb-md-3 mb-sm-3 mb-3' id='10'><h4>Contraseña : <i>$contra</i></h4><i class='fas fa-edit'></i></div>";
					
				echo "</div>";
			echo "</div>";
			}
		}
	}
	
	mysqli_close($con);
?>