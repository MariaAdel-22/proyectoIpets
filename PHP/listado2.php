<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	session_start();
	
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	
	$_SESSION['resp1']  = $_POST['resp1'];
	
	$resp=$_POST['resp1'];
	
	
	switch($resp){
		
		case "TODOS":
		
			$consulta="SELECT RAZA FROM animal ORDER BY RAZA ASC";
			$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
		
		break;
		
		default:
		
			$consulta="SELECT RAZA FROM animal WHERE ESPECIE='$resp' ORDER BY RAZA ASC";
			$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
		
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
