<?php
	
	session_start();
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$id=$_SESSION['id'];
	
	$consulta="SELECT NOMBRE,ESPECIE,EDAD,GENERO,RAZA,FECHANACIMIENTO,TIEMPOINYECCION,PESO,ID,IMAGEN FROM animal WHERE ID='$id'";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$ide=$fila['ID'];
		
		$imag=$fila['IMAGEN'];
		
		echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 ml-2 d-flex justify-content-center'>";				
			echo "<img src='../images/$imag' class='imag mr-3 mt-3 img-fluid img-thumbnail'/>";
        echo "</div>";
		
		while($fila && $ide==$fila['ID']){
			
			
			$nombre=$fila['NOMBRE'];
			$especie=$fila['ESPECIE'];
			$edad=$fila['EDAD'];
			$genero=$fila['GENERO'];
			$raza=$fila['RAZA'];
			$fecha=$fila['FECHANACIMIENTO'];
			$tiempoI=$fila['TIEMPOINYECCION'];
			$peso=$fila['PESO'];
			$fila=mysqli_fetch_assoc($res);
			
			echo "<div class='datos col-lg-5 col-md-5 col-sm-10 col-9  mt-lg-3 mb-lg-3 mt-md-3 mb-md-3 mt-sm-3 mb-sm-3 mt-3 mb-3 ml-5 ml-md-4' id='$ide'>";
		
				echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='1'><h4>ID: <i>$ide</i></h4></div>";
				echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='2'><h4>Nombre: <i>$nombre</i></h4></div>";
				echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='3'><h4>Edad: <i>$edad</i></h4></div>";
				echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3 mb-lg-3 mb-md-3 mb-sm-3 mb-3' id='4'><h4>Género: <i>$genero</i></h4></div>";
				
			echo "</div>";
			
			echo "<div class='datos col-lg-5 col-md-5 col-sm-10 col-9  mt-lg-3 mb-lg-3 mt-md-3 mb-md-3 mt-sm-3 mb-sm-3 mt-3 mb-3 ml-5 ml-md-5'>";
		
				echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='5'><h4>Raza: <i>$raza</i></h4></div>";
				echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='6'><h4>Nacimiento: <i>$fecha</i></h4></div>";
				echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='7'><h4>Tiempo Inyección: <i>$tiempoI</i></h4></div>";
				echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3 mb-lg-3 mb-md-3 mb-sm-3 mb-3' id='8'><h4>Peso: <i>$peso</i>kg</h4></div>";
				
			echo "</div>";
			
			echo "<div class='col-lg-4 offset-lg-1 col-md-2 col-sm-2 offset-sm-3 col-2 offset-3 mb-lg-3'>";
                echo "<button type='button' class='boton btn' id='btn'>Atrás</button>";
			echo "</div>";
			
			echo "<div class='col-lg-4 offset-lg-3 col-md-1 offset-md-4 col-sm-2 offset-sm-1 col-2 offset-1 mb-lg-3'>";
                echo "<button type='button' class='boton btn d-flex justify-content-center' id='adop'><i data-original='far fa-heart' class='far fa-heart' id='icon'></i></button>";
			echo "</div>";
		}
		
		
	}

 mysqli_close($con);
?>