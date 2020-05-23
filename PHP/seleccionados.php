<?php
	
	include 'pasoDatosDeUsuario.php';
	
	$nombre=$_SESSION['nombre'];
	$id=$_POST['id1'];
	
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));

	$consulta="SELECT u.DNI,a.ID FROM usuario u, animal a WHERE u.NOMBRE='$nombre' AND a.ID='$id' ORDER BY DNI ASC";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){
		
		$dni=$fila['DNI'];
	
		while($fila && $dni==$fila['DNI'] ){
			
			$ide=$fila['ID'];
			$consulta2="INSERT into seleccionados (USUARIO,ANIMAL) values ('$dni','$ide')";
			$res2=mysqli_query($con,$consulta2)or die('Segunda consulta fallida'.mysqli_error($con));
			$fila=mysqli_fetch_assoc($res);
		}
		
	}
	
	mysqli_close($con);
?>