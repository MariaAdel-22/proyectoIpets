<?php

	include 'pasoDatosProtectora.php';
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd')or die('No se pudo establecer conexion.'.mysqli_error($con));
	
	$ident=$_SESSION['ident'];
	
	$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	$esp=$_POST['esp'];
	
	$edad=$_POST['edad'];
	$gen=$_POST['gen'];
	$raza=$_POST['raza'];
	
	$fechaN=$_POST['fechaN'];
	$tiempI=$_POST['tiempI'];
	$peso=$_POST['peso'];
	
	$imag=$_FILES['imag']['name'];
	$src=$_FILES['imag']['tmp_name'];
	$ruta="../images/".$imag;
	
	if(move_uploaded_file($src,$ruta)){
		
		$consulta="INSERT into animal (ID,NOMBRE,ESPECIE,EDAD,GENERO,RAZA,FECHANACIMIENTO,TIEMPOINYECCION,PESO,IMAGEN)
                values ('$id','$nombre','$esp','$edad','$gen','$raza','$fechaN','$tiempI','$peso','$imag')";
				
		$consulta2="INSERT into disponibles (IDENTIFICADOR,ID) values ('$ident','$id')";
		mysqli_query($con,$consulta);
		echo mysqli_query($con,$consulta2);
    }
   
 mysqli_close($con);
?>