<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(E_ALL);
	include 'pasoDatosDeUsuario.php';
	require 'conexion.php';
	$con->set_charset("utf8");

	$nombreU=$_SESSION['nombre'];

	$consulta1="SELECT a.NOMBRE,a.IMAGEN,a.ID FROM animal a,usuario u,seleccionados s WHERE u.NOMBRE='$nombreU' AND u.NOMBRE=s.USUARIO AND a.NOMBRE=s.ANIMAL";
	
	$res=mysqli_query($con,$consulta1)or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$id=$fila['ID'];
		
		echo "<div class='co1 test col-lg-8 col-md-11 col-sm-11 col-11 media mt-2 mb-2 d-flex justify-content-center' id='$id'>";
		
		while($fila && $id==$fila['ID']){
			
			$nombre=$fila['NOMBRE'];
			
			
			while($fila && $id==$fila['ID'] && $nombre==$fila['NOMBRE']){
				
				$imag=$fila['IMAGEN'];
				
				if($imag != ""){
					
					echo "<img src='../images/$imag' alt='Prueba' class='imag row col-lg-4 col-md-4 col-sm-4 col-5 img-rounded mr-3 mt-3 ml-lg-2 ml-sm-1 ml-md-1 ml-1 mb-3 img-fluid' id='$id'>";
				}
					
				echo "<div class='media-body row col-lg-9 col-md-10 col-sm-10 col-9 d-flex align-self-center justify-content-center ml-lg-2 ml-md-2 ml-sm-2 ml-1 mr-md-2 mr-1'>";
				
					echo "<div class='col-lg-10 col-md-12 col-sm-12 col-12 d-flex align-self-center justify-content-center mt-1'>";
						echo "<h4 class='nom'>$nombre</h4>";
					echo "</div>";
				echo "</div>";
				
				$fila=mysqli_fetch_assoc($res);
			}
			
		}
		echo "</div>";
		
	}
		
	
	mysqli_close($con);
?>
