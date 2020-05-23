<?php
  
  session_start();
  
  $con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Error de conexión'.mysqli_error($con));
  
   $especie=$_SESSION['lis1'];
   $raza=$_SESSION['lis2'];
   $edad=$_SESSION['lis3'];
  
  if($especie == "TODOS"){
	
	$consulta="SELECT ID,NOMBRE,IMAGEN FROM animal";
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	
  }else if($raza == "TODOS"){
	
	$consulta="SELECT ID,NOMBRE,IMAGEN FROM animal WHERE ESPECIE='$especie' ORDER BY NOMBRE ASC";
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	
  }else if($edad == "TODOS"){
	  
	$consulta="SELECT ID,NOMBRE,IMAGEN FROM animal WHERE ESPECIE='$especie' AND RAZA='$raza' ORDER BY NOMBRE ASC";  
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	
  }else{
	  
	$consulta="SELECT ID,NOMBRE,IMAGEN FROM animal WHERE ESPECIE='$especie' AND RAZA='$raza' AND EDAD='$edad' ORDER BY NOMBRE ASC";    
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
  }
 	
  $fila=mysqli_fetch_assoc($res);

  while($fila){
	
	$id=$fila['ID'];
	
	echo "<div class='test media p-3 mt-lg-2 mb-lg-2' id=$id>";
	
	$nombre=$fila['NOMBRE'];
	
	while($fila && $nombre==$fila['NOMBRE']){
		
		$imag=$fila['IMAGEN'];
		echo "<img src='../images/$imag' alt='Prueba' class='color mr-3 mt-3 rounded img-fluid' id='imag'>";		
		while($fila && $nombre == $fila['NOMBRE'] && $imag==$fila['IMAGEN']){
			
			 $fila=mysqli_fetch_assoc($res);
		}

		echo "<div class='media-body mt-lg-5 mt-md-5 mt-sm-5 mt-5'>";
				
			echo "<div class='row d-flex justify-content-center'>";
				
				echo "<div class='col-lg-8 col-md-5 col-sm-12 col-12 d-flex align-self-center'>";
					echo "<h4 class='nom ml-lg-3'>Nombre: <i>$nombre</i></h4>";
				echo "</div>";
				
				echo "<div class='col-lg-3 offset-lg-1 col-md-4 col-sm-12 col-12 d-flex align-self-center' id='b'>";
					echo "<button type='button' class='boton' id='add'><i data-original='far fa-heart' class='far fa-heart'></i></button>";
				echo "</div>";
					
			echo "</div>";
		echo "</div>";
	}
	echo "</div>";
  }
  
  mysqli_close($con);
?>