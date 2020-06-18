<?php

	header("Content-Type: application/json; charset=UTF-8");
		 
	 $con = mysqli_connect('localhost','root','','ipetsbbdd');

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