<?php
	
	include 'pasoDatosDeUsuario.php';
	
   $con=mysqli_connect('localhost','root','','ipetsbbdd')or die('No se pudo establecer conexion.'.mysqli_error($con));

	$nombreU=$_SESSION['nombre'];
    
	if (!empty($_POST['nombre'])&&!empty($_POST['apel'])&&!empty($_POST['dni'])&&!empty($_POST['edad'])&&!empty($_POST['local'])&&!empty($_POST['trab'])&&!empty($_POST['direc'])&&!empty($_POST['codP'])&&!empty($_POST['email'])&&!empty($_POST['contra'])&&!empty($_FILES['imag']['name'])) {
		
		//todo escrito
		$nombre=$_POST['nombre'];
		$apel=$_POST['apel'];
		$dni=$_POST['dni'];
		
		$edad=$_POST['edad'];
		$localidad=$_POST['local'];
		$trabajo=$_POST['trab'];
		
		$direccion=$_POST['direc'];
		$codigoPost=$_POST['codP'];
		$email=$_POST['email'];
		
		$contra=$_POST['contra'];
		
		$imag=$_FILES['imag']['name'];
		$src=$_FILES['imag']['tmp_name'];
		$ruta="../images/".$imag;
	
		if(move_uploaded_file($src,$ruta)){
			
			$consulta="UPDATE usuario SET NOMBRE='$nombre' AND APELLIDOS='$apel' AND DNI='$dni' AND EDAD='$edad' AND LOCALIDAD='$localidad' AND CODIGOPOSTAL='$codigoPost' AND EMAIL='$email' AND CONTRASENIA='$contra' AND IMAGEN='$imag' WHERE NOMBRE='$nombreU'";
			mysqli_query($con,$consulta);
			$_SESSION['nombre']=$_POST['nombre'];
			
			echo $ruta;
		}
		
	}
	
	if(!empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
			
		//solo nombre
		
		$nombre=$_POST['nombre'];
		$consulta="UPDATE usuario SET NOMBRE='$nombre' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		$_SESSION['nombre']=$_POST['nombre'];
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&!empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
		
		//solo apellido
		$apel=$_POST['apel'];
		$consulta="UPDATE usuario SET APELLIDOS='$apel' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&!empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
		
		//solo dni
		$dni=$_POST['dni'];
		$consulta="UPDATE usuario SET DNI='$dni' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&!empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
		
		//solo edad
		$edad=$_POST['edad'];
		$consulta="UPDATE usuario SET EDAD='$edad' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}

	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&!empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
		
		//solo localidad
		$localidad=$_POST['local'];
		$consulta="UPDATE usuario SET LOCALIDAD='$localidad' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&!empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
		
		//solo trabajo
		$trabajo=$_POST['trab'];
		$consulta="UPDATE usuario SET TRABAJO='$trabajo' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&!empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
	
		//solo direccion
		$direccion=$_POST['direc'];
		$consulta="UPDATE usuario SET DIRECCION='$direccion' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&!empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
		
		//solo codigo postal
		$codigoPost=$_POST['codP'];
		$consulta="UPDATE usuario SET CODIGOPOSTAL='$codigoPost' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&!empty($_POST['email'])&&empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
		
		//solo email
		$email=$_POST['email'];
		$consulta="UPDATE usuario SET EMAIL='$email' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&!empty($_POST['contra'])&&empty($_FILES['imag']['name'])){
		
		//solo contraseña
		$contra=$_POST['contra'];
		$consulta="UPDATE usuario SET CONTRASENIA='$contra' WHERE NOMBRE='$nombreU'";
		mysqli_query($con,$consulta);
		echo "0";
	}
	
	if(empty($_POST['nombre'])&&empty($_POST['apel'])&&empty($_POST['dni'])&&empty($_POST['edad'])&&empty($_POST['local'])&&empty($_POST['trab'])&&empty($_POST['direc'])&&empty($_POST['codP'])&&empty($_POST['email'])&&empty($_POST['contra'])&&!empty($_FILES['imag']['name'])){
		
		//solo imagen
		
		$imag=$_FILES['imag']['name'];
		$src=$_FILES['imag']['tmp_name'];
		$ruta="../images/".$imag;
		
		if(move_uploaded_file($src,$ruta)){
			
			$consulta="UPDATE usuario SET IMAGEN='images/$imag' WHERE NOMBRE='$nombreU'";
			mysqli_query($con,$consulta);
			//echo "<img class='p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-thumbnail d-flex align-self-center' src='$ruta' alt='Imagen Perfil' id='imagP'>";
			echo $ruta;
		}
	}
   
mysqli_close($con);
?>