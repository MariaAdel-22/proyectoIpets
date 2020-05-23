<?php

	include 'pasoDatosProtectora.php';
	include 'IDAnimal.php';
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd')or die('No se pudo establecer conexion.'.mysqli_error($con));

	$ident=$_SESSION['ident'];
	
	if(!empty($_POST['ident']) && !empty($_POST['nombre']) && !empty($_POST['esp']) && !empty($_POST['edad']) && !empty($_POST['gen']) && !empty($_POST['raza']) && !empty($_POST['fecha']) && !empty($_POST['tiempI']) && !empty($_POST['peso'])&& !empty($_FILES['imag']['name'])){
		
		$ide=$_POST['ident'];
		$nombre=$_POST['nombre'];
		$especie=$_POST['esp'];
		
		$edad=$_POST['edad'];
		$genero=$_POST['gen'];
		$raza=$_POST['raza'];
		
		$fecha=$_POST['fecha'];
		$tiempI=$_POST['tiempI'];
		$peso=$_POST['peso'];
		
		$imag=$_FILES['imag']['name'];
		$src=$_FILES['imag']['tmp_name'];
		$ruta="../images/".$imag;
		
		if(move_uploaded_file($src,$ruta)){
		
			$consulta="UPDATE animal,disponibles SET animal.ID='$ide' AND animal.NOMBRE='$nombre' AND animal.ESPECIE='$especie' AND animal.EDAD='$edad' AND animal.GENERO='$genero' AND animal.RAZA='$raza' AND animal.FECHANACIMIENTO='$fecha' AND animal.TIEMPOINYECCION='$tiempI' AND animal.PESO='$peso' AND animal.IMAGEN='$imag' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
			mysqli_query($con,$consulta);
			echo $ruta;
		}
	}
	
	if(!empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['esp']) && empty($_POST['edad']) && empty($_POST['gen']) && empty($_POST['raza']) && empty($_POST['fecha']) && empty($_POST['tiempI']) && empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
		
		$ide=$_POST['ident'];
		
		$consulta="UPDATE animal,disponibles SET animal.ID='$ide' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
		
	}
	
	if(empty($_POST['ident']) && !empty($_POST['nombre']) && empty($_POST['esp']) && empty($_POST['edad']) && empty($_POST['gen']) && empty($_POST['raza']) && empty($_POST['fecha']) && empty($_POST['tiempI']) && empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
		
		$nombre=$_POST['nombre'];
		
		$consulta="UPDATE animal,disponibles SET animal.NOMBRE='$nombre' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
		
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && !empty($_POST['esp']) && empty($_POST['edad']) && empty($_POST['gen']) && empty($_POST['raza']) && empty($_POST['fecha']) && empty($_POST['tiempI']) && empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
		
		$especie=$_POST['esp'];
		
		$consulta="UPDATE animal,disponibles SET animal.ESPECIE='$especie' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
		
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['esp']) && !empty($_POST['edad']) && empty($_POST['gen']) && empty($_POST['raza']) && empty($_POST['fecha']) && empty($_POST['tiempI']) && empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
		
		$edad=$_POST['edad'];
		
		$consulta="UPDATE animal,disponibles SET animal.EDAD='$edad' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['esp']) && empty($_POST['edad']) && !empty($_POST['gen']) && empty($_POST['raza']) && empty($_POST['fecha']) && empty($_POST['tiempI']) && empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
	
		$genero=$_POST['gen'];
		
		$consulta="UPDATE animal,disponibles SET animal.GENERO='$gen' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['esp']) && empty($_POST['edad']) && empty($_POST['gen']) && !empty($_POST['raza']) && empty($_POST['fecha']) && empty($_POST['tiempI']) && empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
		
		$raza=$_POST['raza'];
		
		$consulta="UPDATE animal,disponibles SET animal.RAZA='$raza' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['esp']) && empty($_POST['edad']) && empty($_POST['gen']) && empty($_POST['raza']) && !empty($_POST['fecha']) && empty($_POST['tiempI']) && empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
		
		$fecha=$_POST['fecha'];
		
		$consulta="UPDATE animal,disponibles SET animal.FECHANACIMIENTO='$fecha' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['esp']) && empty($_POST['edad']) && empty($_POST['gen']) && empty($_POST['raza']) && empty($_POST['fecha']) && !empty($_POST['tiempI']) && empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
		
		$tiempI=$_POST['tiempI'];
		
		$consulta="UPDATE animal,disponibles SET animal.TIEMPOINYECCION='$tiempI' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['esp']) && empty($_POST['edad']) && empty($_POST['gen']) && empty($_POST['raza']) && empty($_POST['fecha']) && empty($_POST['tiempI']) && !empty($_POST['peso'])&& empty($_FILES['imag']['name'])){
		
		$peso=$_POST['peso'];
		
		$consulta="UPDATE animal,disponibles SET animal.PESO='$peso' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
		mysqli_query($con,$consulta);
	}
	
	if(empty($_POST['ident']) && empty($_POST['nombre']) && empty($_POST['esp']) && empty($_POST['edad']) && empty($_POST['gen']) && empty($_POST['raza']) && empty($_POST['fecha']) && empty($_POST['tiempI']) && empty($_POST['peso'])&& !empty($_FILES['imag']['name'])){
		
		$imag=$_FILES['imag']['name'];
		$src=$_FILES['imag']['tmp_name'];
		$ruta="../images/".$imag;
		
		if(move_uploaded_file($src,$ruta)){
		
			$consulta="UPDATE animal,disponibles SET animal.IMAGEN='$imag' WHERE disponibles.IDENTIFICADOR='$ident' AND animal.ID='$id'";
			mysqli_query($con,$consulta);
			echo $ruta;
		}
	}
	
	mysqli_close($con);
?>