<?php

	include 'pasoDatosDeUsuario.php';
	
	$nombreU=$_SESSION['nombre'];
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$consulta="SELECT a.NOMBRE,a.IMAGEN,a.ID FROM animal a,usuario u,seleccionados se WHERE u.NOMBRE='$nombreU' AND a.ID=se.ANIMAL AND u.DNI=se.USUARIO ORDER BY a.ID,a.NOMBRE ASC";

	$res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$id=$fila['ID'];
		
		echo "<div class='col-lg-5 col-md-7 col-sm-7 col-12 d-flex justify-content-center'>";
		while($fila && $id==$fila['ID']){
			
			$nombre=$fila['NOMBRE'];
			
			echo "<div class='cajita card p-lg-2 p-md-2 p-sm-2 p-2 m-1 d-flex justify-content-center' id='$id'>";
			
			while($fila && $id==$fila['ID'] && $nombre==$fila['NOMBRE']){
				
				$imag=$fila['IMAGEN'];
				
				echo "<img class='imag card-img-top mb-lg-2 mb-md-2 mb-sm-2 mb-2 d-flex align-self-center' src='../images/$imag' alt='imagen adoptado'>";
				
				echo "<div class='card-body'>";
				
					echo "<p class='nombre'>$nombre</p>";  
                echo "</div>";
				
				$fila=mysqli_fetch_assoc($res);
			}
			
			echo "</div>";
		}
		echo "</div>";
	}
	
	mysqli_close($con);
?>