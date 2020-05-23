<?php

	session_start();
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$dni=$_SESSION['dni'];
	
	$consulta="SELECT NOMBRE,LOCALIDAD,EMAIL,IMAGEN FROM usuario WHERE DNI='$dni'";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$nombre=$fila['NOMBRE'];
		$local=$fila['LOCALIDAD'];
		$email=$fila['EMAIL'];
		$imag=$fila['IMAGEN'];
		
		echo "<div class='col-lg-4 col-md-4 col-sm-12 col-12 ml-2'>";				
			echo "<img src='../$imag' class='imag mr-3 mt-3 img-fluid img-thumbnail'/>";
        echo "</div>";
						
		while($fila && $nombre==$fila['NOMBRE']){
			
			$fila=mysqli_fetch_assoc($res);
		}
		
		echo "<div class='datos col-lg-6 col-md-6 col-sm-10 col-9 offset-lg-1 offset-md-1 offset-sm-1 offset-1 mt-lg-3 mb-lg-3 mt-md-3 mb-md-3 mt-sm-3 mb-sm-3 mt-3 mb-3 ml-5'>";

			echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='1'><h4>Nombre: <i>$nombre</i></div>";
			echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='2'><h4>Localidad: <i>$local</i></div>";
			echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3 mb-lg-3 mb-md-3 mb-sm-3 mb-3' id='3'><h4>Email: <i>$email</i></div>";
        echo "</div>";

		echo "<div class='col-lg-2 offset-lg-1 col-md-2 offset-md-1 col-sm-9 offset-sm-1 col-10 offset-1'>";
                echo "<button type='button' class='btn boton2' id='btn'>Atrás</button>";
        echo "</div>";
	}
	mysqli_close($con);
?>