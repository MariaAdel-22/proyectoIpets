<?php
		
		$con=mysqli_connect("localhost","root","") or die('No se pudo conectar'.mysqli_error($con));
		mysqli_select_db($con,"ipetsbbdd")or die('No se pudo conectar a la base de datos');
		
		$consulta="SELECT IDENTIFICADOR,ID 
				   FROM disponibles
				   ORDER BY IDENTIFICADOR,ID";
				   
		$res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
		$fila=mysqli_fetch_assoc($res);
		
		$contador=0;
		$total_animales=0;
		while($fila){
			
			$nombre=$fila['IDENTIFICADOR'];
			$contador++;
			
			while($fila && $nombre==$fila['IDENTIFICADOR']){
			
				$cont_animales=0;
				$animal=$fila['ID'];
				
				while($fila && $nombre==$fila['IDENTIFICADOR'] && $animal==$fila['ID']){
					
					$cont_animales++;
					$fila=mysqli_fetch_assoc($res);
				}
				$total_animales+=$cont_animales;
			}
		}
		echo "Animales en adopción: ".$total_animales." y "."protectoras que colaboran: ".$contador;
		mysqli_close($con);
	?>
