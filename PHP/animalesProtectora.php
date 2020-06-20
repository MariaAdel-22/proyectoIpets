<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	error_reporting(E_ALL);
		
	include 'pasoDatosProtectora.php';
	require 'conexion.php';

	$ident=$_SESSION['ident'];
	
	$con->set_charset("utf8");
	 
	$consulta2="SELECT a.ID,a.NOMBRE,a.EDAD,a.IMAGEN FROM disponibles d,animal a WHERE d.ANIMAL=a.NOMBRE AND d.PROTECTORA=(SELECT NOMBRE FROM protectora WHERE IDENTIFICADOR='$ident') ORDER BY a.ID,a.NOMBRE ASC";

    $res=mysqli_query($con,$consulta2)or die('Consulta fallida'.mysqli_error($con));
    $fila=mysqli_fetch_assoc($res);

    while($fila){

        $id=$fila['ID'];
		
		echo "<div class='test col-lg-9 col-md-10 col-sm-11 col-12 media mt-2 mb-2 d-flex justify-content-center' id='$id'>";
		
        while($fila && $id==$fila['ID']){

            $nombre=$fila['NOMBRE'];
			$edad=$fila['EDAD'];
            $imag=$fila['IMAGEN'];
  
			echo "<img src='../images/$imag' alt='Prueba' class='row col-lg-4 col-md-4 col-sm-3 col-4 tab2 img-rounded mr-3 mt-3 ml-lg-2 ml-sm-1 ml-md-1 ml-1 mb-3 img-fluid' id='imag'>";
            while($fila && $id==$fila['ID'] && $nombre==$fila['NOMBRE']){

                $fila=mysqli_fetch_assoc($res);
			}
				
			echo "<div class='media-body row col-lg-8 col-md-9 col-sm-8 col-9 d-flex align-self-center justify-content-center ml-lg-2 ml-md-2 ml-sm-2 ml-1 mr-md-2 mr-1'>";
									
					echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12'>";
						echo "<h4 class='nom'><i>$nombre</i></h4>";
					echo "</div>";
					
					echo "<div class='col-lg-10 col-md-10 col-sm-12 col-12 d-flex align-self-center justify-content-center mt-1'>";
						echo "<h4 class='nom'>$edad</h4>";
					echo "</div>";
					
					echo "<div class='col-lg-5 offset-lg-1 col-md-4 col-sm-5 col-6' id='b'>";
						echo "<i class='fas fa-edit'></i>";
					echo "</div>";
					
					echo "<div class='col-lg-5 col-md-4 col-sm-5 col-6' id='c'>";
						echo "<i class='fas fa-minus-circle'></i>";
					echo "</div>";
						
			echo "</div>";
		
        }
        echo "</div>";
    }

    mysqli_close($con);
?>
