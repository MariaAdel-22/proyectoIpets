<?php

    include 'pasoDatosProtectora.php';

    $con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));

    $ident=$_SESSION['ident'];

    $consulta="SELECT a.ID,a.NOMBRE,a.EDAD,a.IMAGEN FROM disponibles d,animal a WHERE d.ID=a.ID AND d.IDENTIFICADOR='$ident' ORDER BY a.ID,a.NOMBRE ASC";

    $res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
    $fila=mysqli_fetch_assoc($res);

    while($fila){

        $id=$fila['ID'];

        echo "<div class='test media p-3 mt-lg-2 mb-lg-2 mt-md-2 mt-sm-2 mt-2 mb-md-2 mb-sm-2 mb-2' id=$id>";
        while($fila && $id==$fila['ID']){

            $nombre=$fila['NOMBRE'];
			$edad=$fila['EDAD'];
            $imag=$fila['IMAGEN'];

            echo "<img src='../images/$imag' alt='Imagen Animal' class='color mr-3 mt-3 img-fluid'>";
        
            while($fila && $id==$fila['ID'] && $nombre==$fila['NOMBRE']){

                $fila=mysqli_fetch_assoc($res);
			}
				
			echo "<div class='media-body mt-lg-5 mt-md-5 mt-sm-5 mt-5'>";
				
				echo "<div class='row d-flex justify-content-center'>";
					
					echo "<div class='col-lg-5 col-md-5 col-sm-12 col-12'>";
						echo "<h4 class='nom'>$nombre</h4>";
					echo "</div>";
					
					echo "<div class='col-lg-4 col-md-4 col-sm-12 col-12'>";
						echo "<h4 class='nom'>$edad</h4>";
					echo "</div>";
					
					echo "<div class='col-lg-3 col-md-3 col-sm-3 col-3'>";
						echo "<i class='fas fa-edit'></i>";
						echo "<i class='fas fa-minus-circle'></i>";
					echo "</div>";
					
				echo "</div>";
			echo "</div>";
        }
        echo "</div>";
    }

    mysqli_close($con);
?>