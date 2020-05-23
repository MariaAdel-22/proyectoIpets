<?php

	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Error de conexion'.mysqli_error($con));
	
	session_start();
	
	$_SESSION['resp1']  = $_POST['resp1'];
	
	$resp=$_POST['resp1'];
	
	
	if($resp == "TODOS"){
		
		$consulta="SELECT RAZA FROM animal ORDER BY RAZA ASC";
	}else{
		$consulta="SELECT RAZA FROM animal WHERE ESPECIE='$resp' ORDER BY RAZA ASC";
	}
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	
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
	
	mysqli_close($con);
	
?>