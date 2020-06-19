<?php
	
	header('Content-Type: text/html; charset=UTF-8');

	$con=mysqli_connect('us-cdbr-east-05.cleardb.net','be2cf74825313e','e459b73e','heroku_0c87bc892272e39') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	$consulta="SELECT IDENTIFICADOR,NOMBRE,LOCALIDAD,IMAGEN FROM protectora";
	
    $res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
    $fila=mysqli_fetch_assoc($res);
		
	while($fila){

        $id=$fila['IDENTIFICADOR'];

		echo "<div class='test col-lg-9 col-md-10 col-sm-11 col-12 media mt-2 mb-2 d-flex justify-content-center' id='$id'>";
		
        while($fila && $id==$fila['IDENTIFICADOR']){

            $nombre=$fila['NOMBRE'];
			$local=$fila['LOCALIDAD'];
            $imag=$fila['IMAGEN'];

		
			if($imag != ""){
					
				echo "<img src='../images/PROTECTORAS/$imag' alt='Prueba' class='row col-lg-5 col-md-5 col-sm-4 col-4 tab2 img-rounded mr-3 mt-3 ml-lg-2 ml-sm-1 ml-md-1 ml-1 mb-3 img-fluid'>";
			}
			
            while($fila && $id==$fila['IDENTIFICADOR'] && $nombre==$fila['NOMBRE']){

                $fila=mysqli_fetch_assoc($res);
			}
				
			echo "<div class='tab row media-body d-flex align-self-center ml-2 mr-2 mt-1 mb-1'>";
				
				echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12'>";
					echo "<h4 class='nom'>$nombre</h4>";
				echo "</div>";
				
				echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12'>";
					echo "<h4 class='nom'>$local</h4>";
				echo "</div>";
				
			echo "</div>";
			
        }
        echo "</div>";
    }

    mysqli_close($con);
?>
