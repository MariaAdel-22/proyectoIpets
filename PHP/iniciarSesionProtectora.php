<?php

    $con=mysqli_connect('localhost','root','','ipetsbbdd')or die('no se pudo conectar'.mysqli_error($con));
        
    session_start();
    $_SESSION['ident'] = $_POST['ident'];

    $identificador=$_POST['ident'];
    $contra=$_POST['pwd'];

    $consulta="SELECT IDENTIFICADOR,CONTRASENIA
               FROM protectora WHERE IDENTIFICADOR='$identificador' AND CONTRASENIA='$contra'
               ORDER BY IDENTIFICADOR,CONTRASENIA";

    $res=mysqli_query($con,$consulta)or die('Consulta fallida'.mysqli_error($con));
    $fila=mysqli_fetch_assoc($res);

    while($fila){
        
        $id=$fila['IDENTIFICADOR'];
        
        while($fila && $id == $fila['IDENTIFICADOR']){
            
            $contrasenia=$fila['CONTRASENIA'];
            
            while($fila && $id == $fila['IDENTIFICADOR'] && $contrasenia == $fila['CONTRASENIA']){
                
                $fila=mysqli_fetch_assoc($res);
			
				echo $_SESSION['ident'];
            }
            
        }
        
    }
	
	

    mysqli_close($con);
?>