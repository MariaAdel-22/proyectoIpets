<?php

	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Error de conexion'.mysqli_error($con));
	
	session_start();
	
	$_SESSION['resp2']  = $_POST['resp2'];
	$resp2=$_POST['resp2'];
	
	if($resp2 == "TODOS"){
		
		$consulta="SELECT EDAD FROM animal ORDER BY EDAD ASC";
	}else{
		
		$consulta="SELECT EDAD FROM animal WHERE RAZA='$resp2' ORDER BY EDAD ASC";
	}
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	
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