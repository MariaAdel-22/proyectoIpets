<?php

	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Error de conexion'.mysqli_error($con));
	
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




                      
                    