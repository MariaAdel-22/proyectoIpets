<?php
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(E_ALL);
	
	include 'pasoDatosDeUsuario.php';
	include 'pasoDatosProtectora.php';

	$nombreU=$_SESSION['nombre'];
	$nombreP=$_SESSION['ident'];
	
	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39');
	$con->set_charset("utf8");
	
	$dat=$_POST['datos'];

	//$consulta="GRANT SELECT, INSERT, DELETE ON heroku_0c87bc892272e39 TO username@'be2cf74825313e' IDENTIFIED BY 'e459b73e'";
	$consulta="GRANT ALL heroku_0c87bc892272e39 TO username@'be2cf74825313e' IDENTIFIED BY 'e459b73e'";
	mysqli_query($con,$consulta);
		
	/*$consulta2="SELECT DNI FROM usuario";
	$res=mysqli_query($con,$consulta2);
	$fila=mysqli_fetch_assoc($res);

	while($fila){
		$nom=$fila['DNI'];
		while($fila && $nom==$fila['DNI']){
			$fila=mysqli_fetch_assoc($res);
			echo $nom;
		}
	}*/
	/*$consulta2="UPDATE usuario SET DNI='23456789A' WHERE DNI='23456789P'";
	mysqli_query($con,$consulta2);
	echo "Paso por aqui";*/




	$cont=0;
	$nombeT="";
	
	/*$imag=$_FILES["dato"];
	$nombre=$imag["name"];
	$ruta_prov=$imag["tmp_name"];*/
	
	foreach($dat as $clave => $valor){
	
		foreach($valor as $clave2 => $valor2){
			
	
			foreach($valor2 as $clave3 => $valor3){
				
				$nombreT=$clave;
				
				foreach($valor3 as $clave4 => $valor4){
						
					if(!empty($valor4)){
						
						if($nombreU!=""){
							
							echo "UPDATE $nombreT SET $clave2='".$valor4."' WHERE $clave2='$clave3' AND NOMBRE='$nombreU'";
						}
					}
					
				}
			}
		}
	}
	
	
mysqli_close($con);

?>
