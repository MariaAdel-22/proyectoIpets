<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(0);
	
	include 'pasoDatosProtectora.php';
	require 'conexion.php';

	$con->set_charset("utf8");
	$ident=$_SESSION['ident'];
	
	$consulta2="SELECT u.DNI,s.ANIMAL,u.IMAGEN 'imag_usu',a.IMAGEN 'imag_anim',a.NOMBRE FROM seleccionados s,usuario u,animal a,disponibles d WHERE s.USUARIO=u.NOMBRE AND s.ANIMAL=a.NOMBRE AND d.ANIMAL=a.NOMBRE AND d.PROTECTORA=(SELECT NOMBRE FROM protectora WHERE IDENTIFICADOR='$ident') ORDER BY s.ANIMAL,s.USUARIO ASC";
		
	$res=mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$id=$fila['ANIMAL'];
		$imag=$fila['imag_anim'];
		$usu=$fila['DNI'];
		
		echo "<div class='test col-lg-9 col-md-10 col-sm-11 col-11 media mt-2 mb-2 d-flex justify-content-center' id='$usu'>";
		
		while($fila && $id==$fila['ANIMAL']){
			
			$nombre=$fila['NOMBRE'];
			$imagUsu=$fila['imag_usu'];
						
			echo "<img src='../images/$imag' alt='Prueba' class='row col-lg-4 col-md-4 col-sm-4 col-5 tab2 img-rounded mr-3 mt-3 ml-lg-2 ml-sm-1 ml-md-1 ml-1 mb-3 img-fluid d-flex align-self-center' id='imag'>";
			
			while($fila && $id==$fila['ANIMAL'] && $usu==$fila['DNI']){
			
				$fila=mysqli_fetch_assoc($res);
				
				echo "<div class='media-body mt-lg-2 mt-md-2 mt-sm-2 mt-2 ml-sm-2 mb-2 d-flex align-self-center'>";
					
					echo "<div class='row d-flex justify-content-center'>";
						
						echo "<div class='col-lg-8 col-md-12 col-sm-12 col-12 mt-3'>";
							echo "<h4 class='nom'><i>$nombre</i></h4>";
						echo "</div>";
						
						echo "<div class='col-lg-6 offset-1 col-md-12 col-sm-12 col-12 d-flex justify-content-center mt-1'>";
							echo "<h4 class='nom'>Añadido por:</h4>";
						echo "</div>";
					
						echo "<img src='../images/$imagUsu' alt='Prueba' class='row col-lg-4 col-md-3 col-sm-3 col-4 rounded-circle mt-1 mb-1 img-fluid' id='imagU'>";
							
					echo "</div>";
				echo "</div>";
			
			}	
		}
				
		echo "</div>";
	}
	
	mysqli_close($con);
?>
