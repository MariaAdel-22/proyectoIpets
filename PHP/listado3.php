<?php

	header('Content-Type: text/html; charset=UTF-8');
	
	session_start();
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Error de conexion'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$_SESSION['resp1']  = $_POST['resp1'];
	$_SESSION['resp2']  = $_POST['resp2'];
	
	$resp1=$_POST['resp1'];
	$resp2=$_POST['resp2'];
	

	switch($resp2){
		
		case "TODOS":
		
			$consulta="SELECT EDAD FROM animal WHERE ESPECIE='$resp1' ORDER BY EDAD ASC";
			$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
			
		break;
		
		default:
		
			$consulta="SELECT EDAD FROM animal WHERE RAZA='$resp2' AND ESPECIE='$resp1' ORDER BY EDAD ASC";
			$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));

		break;
	}
	
	$fila=mysqli_fetch_assoc($res);
	
	echo "<option value='0'>--Selecciona una opción--</option>";
	echo "<option value='TODOS'>TODOS</option>";
	
	while($fila){
	
		$esp=$fila['EDAD'];
		
		echo '<option value="'.$fila['EDAD'].'">'.$fila['EDAD'].'</option>';
		
		while($fila && $esp==$fila['EDAD']){
			
			$fila=mysqli_fetch_assoc($res);
		}
	}
	
	mysqli_close($con);
?>