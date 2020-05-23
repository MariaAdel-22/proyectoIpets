<?php

	session_start();
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$id=$_SESSION['id'];
	
	$consulta="SELECT * FROM animal WHERE ID='$id'";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$ide=$fila['ID'];
				
		while($fila && $ide==$fila['ID']){
			
			
			$nombre=$fila['NOMBRE'];
			$imag=$fila['IMAGEN'];
			$especie=$fila['ESPECIE'];
			$edad=$fila['EDAD'];
			$genero=$fila['GENERO'];
			$raza=$fila['RAZA'];
			$fecha=$fila['FECHANACIMIENTO'];
			$tiempoI=$fila['TIEMPOINYECCION'];
			$peso=$fila['PESO'];
			$fila=mysqli_fetch_assoc($res);
			
			echo "<div class='row offset-lg-4 offset-md-4 offset-sm-4 offset-2 mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
        
				echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-self-center'>";

					echo "<img class='p-lg-1 p-md-2 p-sm-2 p-2 rounded-circle img-fluid d-flex align-self-center' src='../images/$imag' alt='Imagen Perfil' id='imagA'>";

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
							
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='2'><h4>Nombre : <i>$nombre</i></h4><i class='fas fa-edit'></i></div>";
					
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='3'><h4>Especie : <i>$especie</i></h4><i class='fas fa-edit'></i></div>";
						
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='4'><h4>Edad : <i>$edad</i></h4><i class='fas fa-edit'></i></div>";
						
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='5'><h4>Género : <i>$genero</i></h4><i class='fas fa-edit'></i></div>";
						
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='6'><h4>Raza : <i>$raza</i></h4><i class='fas fa-edit'></i></div>";
						
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='7'><h4>Fecha : <i>$fecha</i></h4><i class='fas fa-edit'></i></div>";
							
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='8'><h4>Tiempo Inyección : <i>$tiempoI</i></h4><i class='fas fa-edit'></i></div>";
						
							echo "<div class='card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3 mb-3' id='9'><h4>Peso : <i>$peso kg</i></h4><i class='fas fa-edit'></i></div>";
						echo "</div>";
					echo "</div>";
			echo "</div>";
		}
		
		
	}

 mysqli_close($con);


?>