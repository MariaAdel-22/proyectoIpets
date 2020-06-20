<?php
		
		require 'conexion.php';

		$con->set_charset("utf8");
		
		$consulta1="SELECT IDENTIFICADOR FROM protectora";
				   
		$res1=mysqli_query($con,$consulta1)or die('Consulta fallida'.mysqli_error($con));
		$fila1=mysqli_fetch_assoc($res1);
		
		$consulta2="SELECT ID FROM animal";
		$res2=mysqli_query($con,$consulta2)or die('Consulta fallida'.mysqli_error($con));
		$fila2=mysqli_fetch_assoc($res2);
		
		$contador=0;
		$total_animales=0;
		
		while($fila1){
			
			$nombre=$fila1['IDENTIFICADOR'];
			
			while($fila1 && $nombre==$fila1['IDENTIFICADOR']){
				
				$contador++;
				$fila1=mysqli_fetch_assoc($res1);
			}
		}
		
		while($fila2){
			
			$animal=$fila2['ID'];
			
			while($fila2 && $animal==$fila2['ID']){
				
				$total_animales++;
				$fila2=mysqli_fetch_assoc($res2);
			}
		}
		
		echo "Animales en adopción: ".$total_animales." y "."protectoras que colaboran: ".$contador;
		mysqli_close($con);
	?>
