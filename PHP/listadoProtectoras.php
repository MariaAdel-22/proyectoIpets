
<?php
		
	header('Content-Type: text/html; charset=UTF-8');
		
	error_reporting(0);
	
	include 'pasoDatosDeUsuario.php';
	require 'conexion.php';
	$con->set_charset("utf8");

	$nombreU=$_SESSION['nombre'];
	
	$consulta1="SELECT p.NOMBRE,p.IDENTIFICADOR,p.IMAGEN FROM protectora p,usuario u WHERE u.NOMBRE='$nombreU' AND u.LOCALIDAD=p.LOCALIDAD";

	$res=mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$id=$fila['IDENTIFICADOR'];
		
		while($fila && $id==$fila['IDENTIFICADOR']){
			
			$nombre=$fila['NOMBRE'];
			$imag=$fila['IMAGEN'];
			
			while($fila && $id==$fila['IDENTIFICADOR'] && $nombre ==$fila['NOMBRE']){
				
				$fila=mysqli_fetch_assoc($res);
				
				 echo "<div class='test col-lg-9 col-md-10 col-sm-11 col-12 media mt-2 mb-2 d-flex justify-content-center' id='$id'>";
				 
					if($imag != ""){
							
						echo "<img src='../images/PROTECTORAS/$imag' alt='Prueba' class='row col-lg-5 col-md-5 col-sm-4 col-4 tab2 img-rounded mr-3 mt-3 ml-lg-2 ml-sm-1 ml-md-1 ml-1 mb-3 img-fluid'>";
					}	
					echo "<div class='tab row media-body d-flex align-self-center ml-2 mr-2'>";
						
						echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center'>";
							echo "<h4 class='nom'>$nombre</h4>";
						echo "</div>";
					
					echo "</div>";

					
					
				echo "</div>";
			}
		}
		
	}

	mysqli_close($con);
?>
