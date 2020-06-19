<?php
  
  header('Content-Type: text/html; charset=UTF-8');
  
  session_start();
  $con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
  $con->set_charset("utf8");
  
   $especie=$_SESSION['lis1'];
   $raza=$_SESSION['lis2'];
   $edad=$_SESSION['lis3'];
  
	switch($especie){
	 
		case "TODOS":
			
			$consulta1="SELECT a.ID,a.NOMBRE,a.IMAGEN FROM animal a,disponibles d WHERE a.NOMBRE=d.ANIMAL";
			$res=mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
			
		break;
		 
		default:
	 
			switch($raza){
				
				case "TODOS":
				
					$consulta2="SELECT a.ID,a.NOMBRE,a.IMAGEN FROM animal a,disponibles d WHERE a.ESPECIE='$especie' AND a.NOMBRE=d.ANIMAL ORDER BY NOMBRE ASC";
					$res=mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con));
				
				break;
				
				default:
				
					switch($edad){
						
						case "TODOS":
							
							$consulta3="SELECT a.ID,a.NOMBRE,a.IMAGEN FROM animal a, disponibles d WHERE a.ESPECIE='$especie' AND RAZA='$raza' AND a.NOMBRE=d.ANIMAL ORDER BY NOMBRE ASC";  
							$res=mysqli_query($con,$consulta3) or die('Consulta fallida'.mysqli_error($con));
							
						break;
						
						default:
						
							$consulta4="SELECT a.ID,a.NOMBRE,a.IMAGEN FROM animal a,disponibles d WHERE a.ESPECIE='$especie' AND a.RAZA='$raza' AND a.EDAD='$edad' AND a.NOMBRE=d.ANIMAL ORDER BY NOMBRE ASC";    
							$res=mysqli_query($con,$consulta4) or die('Consulta fallida'.mysqli_error($con));
								
						break;
					}
				
				break;

			}
		break;
		
	}
 	
 $fila=mysqli_fetch_assoc($res);

	while($fila){
	
	$id=$fila['ID'];
	
	echo "<div class='test col-lg-9 col-md-10 col-sm-11 col-12 media mt-2 mb-2 d-flex justify-content-center align-items-center' id='$id'>";
	
	$nombre=$fila['NOMBRE'];
	
	while($fila && $nombre==$fila['NOMBRE']){
		
		$imag=$fila['IMAGEN'];
				
		if($imag != ""){
					
			echo "<img src='../images/$imag' alt='Prueba' class='row col-lg-5 col-md-5 col-sm-4 col-4 tab2 img-rounded mr-3 mt-3 ml-lg-2 ml-sm-1 ml-md-1 ml-1 mb-3 img-fluid' id='imag'>";
		}
		while($fila && $nombre == $fila['NOMBRE'] && $imag==$fila['IMAGEN']){
			
			 $fila=mysqli_fetch_assoc($res);
		}

		echo "<div class='media-body'>";
				
			echo "<div class='row d-flex justify-content-center'>";
				
				echo "<div class='col-lg-8 col-md-5 col-sm-12 col-12 d-flex align-self-center justify-content-center'>";
					echo "<h4 class='nom ml-lg-3'>Nombre: <i>$nombre</i></h4>";
				echo "</div>";
				
				echo "<div class='col-lg-3 offset-lg-1 col-md-4 col-sm-12 col-12 d-flex align-self-center justify-content-center' id='b'>";
					echo "<button type='button' class='boton d-flex justify-content-center' id='add'><i data-original='far fa-heart' class='far fa-heart'></i></button>";
				echo "</div>";
					
			echo "</div>";
		echo "</div>";
	}
	echo "</div>";
  }
  
  mysqli_close($con);
?>
