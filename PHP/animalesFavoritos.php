<?php
	
	include 'pasoDatosProtectora.php';

	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$ident=$_SESSION['ident'];
	
	$consulta="SELECT s.USUARIO,s.ANIMAL,u.IMAGEN 'imag_usu',a.IMAGEN 'imag_anim',a.NOMBRE FROM seleccionados s,usuario u,animal a,disponibles d WHERE s.USUARIO=u.DNI AND s.ANIMAL=a.ID AND d.ID=a.ID AND d.IDENTIFICADOR='$ident' ORDER BY s.ANIMAL,s.USUARIO ASC";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	
	
	while($fila){
		
		$id=$fila['ANIMAL'];
		$imag=$fila['imag_anim'];
		$usu=$fila['USUARIO'];
		
		echo "<div class='test media p-3 mt-lg-2 mb-lg-2 mt-md-2 mt-sm-2 mt-2 mb-md-2 mb-sm-2 mb-2' id='$usu'>"; 
		
		while($fila && $id==$fila['ANIMAL']){
			
			$nombre=$fila['NOMBRE'];
			$imagUsu=$fila['imag_usu'];
			
			echo "<img src='../images/$imag' alt='Imagen Animal' class='color mr-3 mt-3 img-fluid'>";	
			
			while($fila && $id==$fila['ANIMAL'] && $usu==$fila['USUARIO']){
			
				$fila=mysqli_fetch_assoc($res);
				
				echo "<div class='media-body mt-lg-5 mt-md-5 mt-sm-5 mt-5'>";
				
					echo "<div class='row d-flex justify-content-center'>";
						
						echo "<div class='col-lg-4 col-md-5 col-sm-12 col-12 d-flex align-self-center d-flex justify-content-center'>";
							echo "<h4 class='nom ml-lg-1 ml-md-1 ml-sm-1 ml-1'>$nombre</h4>";
						echo "</div>";
						
						echo "<div class='col-lg-6 col-md-5 col-sm-3 col-3 d-flex align-self-center d-flex justify-content-center'>";
							echo "<h4 class='nom'>Añadido por: </h4>";
						echo "</div>";
						
						echo "<div class='col-lg-2 col-md-3 col-sm-12 col-12 d-flex align-self-center d-flex justify-content-center'>";
							echo "<img src='../$imagUsu' alt='Imagen Usuario' class='color2 mr-3 mt-3 mb-2 img-fluid rounded-circle'>";
						echo "</div>";
						
					echo "</div>";
			echo "</div>";
			}	
		}
				
		echo "</div>";
	}
	
	mysqli_close($con);
?>