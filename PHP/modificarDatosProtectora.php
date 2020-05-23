<?php

	include 'pasoDatosProtectora.php';

	$id=$_SESSION['ident'];
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd')or die('No se pudo establecer conexion.'.mysqli_error($con));
	
	if(!empty($_POST['ident']) && !empty($_POST['nombre']) && !empty($_POST['contra']) && !empty($_POST['local']) && !empty($_POST['direc']) && !empty($_POST['contact']) && !empty($_FILES['imag']['name'])){
		
		$ide=$_POST['ident'];
		$nom=$_POST['nombre'];
		$contra=$_POST['contra'];
		
		$local=$_POST['local'];
		$direc=$_POST['direc'];
		$contact=$_POST['contact'];
		
		$imag=$_FILES['imag']['name'];
		$src=$_FILES['imag']['tmp_name'];
		$ruta="../images/".$imag;
		
		if(move_uploaded_file($src,$ruta)){
				
			$consulta="UPDATE protectora SET IDENTIFICADOR='$ide' AND NOMBRE='$nom' AND CONTRASENIA='$contra' AND LOCALIDAD='$local' AND DIRECCION='$direc' AND CONTACTO='$contact' AND IMAGEN='$imag' WHERE IDENTIFICADOR='$id'";
			mysqli_query($con,$consulta);
			echo $ruta;
		}
	}
	
	if(!empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['contra']) && empty($_POST['local']) && empty($_POST['direc']) && empty($_POST['contact']) && empty($_FILES['imag']['name'])){
		
		$ide=$_POST['ident'];
		
		$consulta="UPDATE protectora SET IDENTIFICADOR='$ide' WHERE IDENTIFICADOR='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && !empty($_POST['nombre']) && empty($_POST['contra']) && empty($_POST['local']) && empty($_POST['direc']) && empty($_POST['contact']) && empty($_FILES['imag']['name'])){
		
		$nom=$_POST['nombre'];
		
		$consulta="UPDATE protectora SET NOMBRE='$nom' WHERE IDENTIFICADOR='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && !empty($_POST['contra']) && empty($_POST['local']) && empty($_POST['direc']) && empty($_POST['contact']) && empty($_FILES['imag']['name'])){
		
		$contra=$_POST['contra'];
		
		$consulta="UPDATE protectora SET CONTRASENIA='$contra' WHERE IDENTIFICADOR='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['contra']) && !empty($_POST['local']) && empty($_POST['direc']) && empty($_POST['contact']) && empty($_FILES['imag']['name'])){
		
		$local=$_POST['local'];
		
		$consulta="UPDATE protectora SET LOCALIDAD='$local' WHERE IDENTIFICADOR='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['contra']) && empty($_POST['local']) && !empty($_POST['direc']) && empty($_POST['contact']) && empty($_FILES['imag']['name'])){
		
		$direc=$_POST['direc'];
		
		$consulta="UPDATE protectora SET DIRECCION='$direc' WHERE IDENTIFICADOR='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['contra']) && empty($_POST['local']) && empty($_POST['direc']) && !empty($_POST['contact']) && empty($_FILES['imag']['name'])){
		
		$contact=$_POST['contact'];
		
		$consulta="UPDATE protectora SET CONTACTO='$contact' WHERE IDENTIFICADOR='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['contra']) && empty($_POST['local']) && empty($_POST['direc']) && empty($_POST['contact']) && !empty($_FILES['imag']['name'])){
	
		$imag=$_FILES['imag']['name'];
		$src=$_FILES['imag']['tmp_name'];
		$ruta="../images/".$imag;
		
		if(move_uploaded_file($src,$ruta)){
		
			$consulta="UPDATE protectora SET IMAGEN='$imag' WHERE IDENTIFICADOR='$id'";
			mysqli_query($con,$consulta);
			echo $ruta;
		}
	}
	
	mysqli_close($con);
?>