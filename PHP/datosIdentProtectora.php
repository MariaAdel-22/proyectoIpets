<?php

   session_start();
    
    echo "<div class='col-lg-8 col-md-8 col-sm-9 col-10 d-flex align-self-center'>";
                        
        echo "Hola,".$_SESSION['ident']."!<br/>";
    echo "</div>";

    echo "<div class='col-lg-4 col-md-4 col-sm-5 col-5 d-flex align-self-center'>";
                        
        echo "<div class='dropdown'>";
        
            echo "<button type='button' class='btn dropdown-toggle dropdown-toggle-split pr-sm-5 pr-5' data-toggle='dropdown'>";
                echo "<i class='fas fa-user-cog'></i>";
            echo "</button>";
            
            echo "<div class='dropdown-menu dropdown-menu-right'>";
            
                echo "<a class='dropdown-item border-bottom d-flex justify-content-center' href='../html/modificarUsuario.html'>Modificar Cuenta</a>";
                echo "<a class='dropdown-item border-bottom d-flex justify-content-center' href='#' target='_self' data-toggle='modal' data-target='#myModal'>Eliminar Cuenta</a>";
				echo "<a class='dropdown-item d-flex justify-content-center' href='../PHP/cerrarSesion.php'>Cerrar Sesion</a>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
	


?>