<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	session_start();
	require 'conexion.php';
	$con->set_charset("utf8");
	
	$_SESSION['resp1']  = $_POST['resp1'];
	
	$resp=$_POST['resp1'];
	
	
	switch($resp){
		
		case "TODOS":
		
			$consulta1="SELECT RAZA FROM animal ORDER BY RAZA ASC";
			$res=mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
		
		break;
		
		default:
		
			$consulta2="SELECT RAZA FROM animal WHERE ESPECIE='$resp' ORDER BY RAZA ASC";
			$res=mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con));
		
		break;
		
	}
	
	$fila=mysqli_fetch_assoc($res);
	

	echo "<option value='0'>--Selecciona una opción--</option>";
	
	echo "<option value='TODOS'>TODOS</option>";
	
	while($fila){
	
		$esp=$fila['RAZA'];
		
		echo '<option value="'.$fila['RAZA'].'">'.$fila['RAZA'].'</option>';
		
		while($fila && $esp==$fila['RAZA']){
			
			$fila=mysqli_fetch_assoc($res);
		}
		
	}
	echo $resp;
	mysqli_close($con);
	
?>
