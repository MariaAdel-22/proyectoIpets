<?php

	
	session_start();

	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$id=$_SESSION['id'];
	
	$consulta="SELECT LOCALIDAD,IDENTIFICADOR,IMAGEN,NOMBRE,DIRECCION,CONTACTO FROM protectora  WHERE IDENTIFICADOR='$id' ORDER BY IDENTIFICADOR";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	
		while($fila){
			
		
			$ident=$fila['IDENTIFICADOR'];
			$imag=$fila['IMAGEN'];
			
			while($fila && $ident==$fila['IDENTIFICADOR']){
				
				
				$nombre=$fila['NOMBRE'];
				$local=$fila['LOCALIDAD'];
				$direc=$fila['DIRECCION'];
				$cont=$fila['CONTACTO'];
				
				echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 ml-2 d-flex justify-content-center'>";				
					echo "<img src='../$imag' class='imag mr-3 mt-3 img-fluid img-thumbnail'/>";
				echo "</div>";
				
				while($fila && $ident==$fila['IDENTIFICADOR'] && $nombre==$fila['NOMBRE']){
					
					$fila=mysqli_fetch_assoc($res);
					
					echo "<div class='datos col-lg-8 col-md-8 col-sm-10 col-9 mt-lg-3 mb-lg-3 mt-md-3 mb-md-3 mt-sm-3 mb-sm-3 mt-3 mb-3' id='$ident'>";
		
						echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='1'><h4>Identificador: <i>$ident</i></h4></div>";
						echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='2'><h4>Nombre: <i>$nombre</i></h4></div>";
						echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='3'><h4>Localidad: <i>$local</i></h4></div>";
						echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3 mb-lg-3 mb-md-3 mb-sm-3 mb-3' id='4'><h4>Dirección:<i>$direc</i></h4></div>";
				
					echo "</div>";
					
					echo "<div class='col-lg-4 col-md-4 col-sm-4 col-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 offset-lg-2 offset-md-2 offset-sm-1 offset-1 d-flex justify-content-start'>";
						echo "<button type='button' class='boton btn' id='btn'>Atrás</button>";
					echo "</div>";
				}
				
			}
			
		}
	
	mysqli_close($con);
?>