<?php
 
	header('Content-Type: text/html; charset=UTF-8');
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	$consulta="SELECT ESPECIE FROM animal ORDER BY ESPECIE ASC";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	
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
