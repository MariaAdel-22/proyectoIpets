<?php
 
	header('Content-Type: text/html; charset=UTF-8');
	require 'conexion.php';
	$con->set_charset("utf8");

	$consulta1="SELECT ESPECIE FROM animal ORDER BY ESPECIE ASC";
	
	$res=mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
	
	$fila=mysqli_fetch_assoc($res);
	

	echo "<option value='0'>--Selecciona una opción--</option>";
	
	echo "<option value='TODOS'>TODOS</option>";
	
	while($fila){
	
		$esp=$fila['ESPECIE'];
		echo '<option value="'.$fila['ESPECIE'].'">'.$fila['ESPECIE'].'</option>';
		
		while($fila && $esp==$fila['ESPECIE']){
			
			$fila=mysqli_fetch_assoc($res);
		}
		
	}
	
	mysqli_close($con);	
?>
