
<?php
	
	include 'pasoDatosDeUsuario.php';
	
	$nombreU=$_SESSION['nombre'];
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	
	$consulta="SELECT u.LOCALIDAD 'local_usu',p.LOCALIDAD 'local_pro',p.IDENTIFICADOR,p.IMAGEN,p.NOMBRE FROM usuario u,protectora p WHERE u.NOMBRE='$nombreU' AND u.LOCALIDAD=p.LOCALIDAD ORDER BY p.LOCALIDAD,p.NOMBRE ASC";
	
	$res=mysqli_query($con,$consulta) or die('Consulta fallida'.mysqli_error($con));
	$fila=mysqli_fetch_assoc($res);
	
	while($fila){

        $id=$fila['IDENTIFICADOR'];
		$localidadP=$fila['local_pro'];
	
        
        while($fila && $localidadP==$fila['local_pro']){
		echo "<div class='test media p-3 mt-lg-2 mb-lg-2 mt-md-2 mt-sm-2 mt-2 mb-md-2 mb-sm-2 mb-2' id=$id>";
            $nombre=$fila['NOMBRE'];
            $imag=$fila['IMAGEN'];

            echo "<img src='../$imag' alt='Prueba' class='color mr-3 mt-3 img-fluid'>";
        
            while($fila && $localidadP==$fila['local_pro'] && $nombre==$fila['NOMBRE']){

                $fila=mysqli_fetch_assoc($res);
				
				echo "<div class='media-body mt-lg-5 mt-md-5 mt-sm-5 mt-5'>";
				
				echo "<div class='row d-flex justify-content-center'>";
					
					echo "<div class='col-lg-4 col-md-5 col-sm-12 col-12'>";
						echo "<h4 class='nom'>Nombre:</h4>";
					echo "</div>";
					
					echo "<div class='col-lg-8 col-md-4 col-sm-12 col-12'>";
						echo "<h4 class='nom'>$nombre</h4>";
					echo "</div>";
						
				echo "</div>";
			echo "</div>";
			}
				
			 echo "</div>";
        }
       
    }

	mysqli_close($con);
?>