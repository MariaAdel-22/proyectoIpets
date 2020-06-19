<?php

	header("Content-Type: application/json; charset=UTF-8");
		 
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));

	$con->query("SET NAMES 'utf8'");
						                
	if ($con->connect_error) {
		
		die('Error en la Conexión a la Base de Datos : ('. $con->connect_errno .') '. $con->connect_error);
	 
	}
	 
	$results = $con->query("SELECT * FROM adoptados");

	$rows['postr']= array();

	while($r = $results->fetch_object()) {
		
		array_push($rows['postr'], $r);
	
	}

	print(json_encode($rows));
	

?>
