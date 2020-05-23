<?php

    $con=mysqli_connect('localhost','root','','ipetsbbdd')or die('No se pudo establecer conexion.'.mysqli_error($con));
 
    $nombre=$_POST['nombre'];
    $apel=$_POST['apel'];
    $dni=$_POST['dni'];
	
    $edad=$_POST['edad'];
    $localidad=$_POST['local'];
    $trabajo=$_POST['trab'];
	
    $direccion=$_POST['direc'];
    $codigoPost=$_POST['codPost'];
    $email=$_POST['email'];
	
    $contra=$_POST['contra'];
	
	$imag=$_FILES['imag']['name'];
	$src=$_FILES['imag']['tmp_name'];
	$ruta="../images/".$imag;
	
	if(move_uploaded_file($src,$ruta)){
		
		$consulta="INSERT into usuario (NOMBRE,APELLIDOS,DNI,EDAD,LOCALIDAD,TRABAJO,DIRECCION,CODIGOPOSTAL,EMAIL,CONTRASENIA,IMAGEN)
                values ('$nombre','$apel','$dni','$edad','$localidad','$trabajo','$direccion','$codigoPost','$email','$contra','$imag')";
    
		echo mysqli_query($con,$consulta);
    }
   
 mysqli_close($con);
?>