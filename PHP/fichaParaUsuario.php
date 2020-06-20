<?php
	
	header('Content-Type: text/html; charset=UTF-8');
	
	session_start();
	error_reporting(E_ALL);
	
	require 'conexion.php';
	$con->set_charset("utf8");

	$datoP=$_SESSION['idP'];
	$dni=$_SESSION['dni'];
	$id1=$_SESSION['id1'];
	
	if($datoP != ""){
	
		unset($_SESSION['idP']);
		unset($_SESSION['dni']);
		$id="";
		$dni="";
		
		$datos=array();
		
		$consulta1="SELECT * FROM protectora WHERE IDENTIFICADOR='$datoP'";

		$res=mysqli_query($con,$consulta1)or die('Consulta fallida'.mysqli_error($con));
	
		while($fila=mysqli_fetch_row($res)){
			
			foreach($fila as $valor){
				
				array_push($datos,$valor);
			}
		}
		
		$consulta2="SHOW COLUMNS FROM protectora";
		$res2=mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con));
		$fila2=mysqli_fetch_assoc($res2);
		
		echo "<div class='datos col-lg-8 col-md-9 col-sm-10 col-11 mt-lg-3 mb-lg-3 mt-md-3 mb-md-3 mt-sm-3 mb-sm-3 mt-3 mb-3' id='protectora'>";
				while($fila2){
					
					for($i=0;$i<sizeof($datos);$i++){
						
						$cab=$fila2['Field'];
						$fila2=mysqli_fetch_assoc($res2);
						
						if($cab == "IMAGEN"){
							
							$imag=$datos[$i];
							$info = new SplFileInfo($dat);
							
							if(substr_compare($dat, "PROTECTORA", 0, 9)){
								
		
								echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
				
									echo "<div class='col-lg-6 col-md-7 col-sm-8 col-9 d-flex justify-content-center mb-3'>";

										echo "<img class='imag p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-thumbnail img-responsive d-flex align-self-center' src='../images/PROTECTORAS/$imag' alt='Imagen Perfil'>";

									echo "</div>";
								echo "</div>";
							}
						}else{
							
							if(($cab !="CONTRASENIA")&&($cab!="IDENTIFICADOR")){
								
								echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='$datos[$i]'><h4 id='$cab'>$cab: <i>$datos[$i]</i></h4></div>";
							}
						}
							
					}
				}
				
			echo "<div class='row d-flex justify-content-center mt-2 mb-2'>";
			
				echo "<div class='col-lg-2 col-md-2 col-sm-9 col-10 d-flex justify-content-center'>";
					echo "<button type='button' class='btn boton2' id='btn'>Atrás</button>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	}else
	

	if($id1 != ""){
	
		unset($_SESSION['idP']);
		unset($_SESSION['dni']);
		$datoP="";
		$dni="";
		
		$datos=array();
		
		$consulta3="SELECT * FROM animal WHERE ID='$id1'";

		$res=mysqli_query($con,$consulta3)or die('Consulta fallida'.mysqli_error($con));
	
		while($fila=mysqli_fetch_row($res)){
			
			foreach($fila as $valor){
				
				array_push($datos,$valor);
			}
		}
		
		$consulta4="SHOW COLUMNS FROM animal";
		$res2=mysqli_query($con,$consulta4) or die('Consulta fallida'.mysqli_error($con));
		$fila2=mysqli_fetch_assoc($res2);
		
		echo "<div class='datos col-lg-8 col-md-9 col-sm-10 col-11 mt-lg-3 mb-lg-3 mt-md-3 mb-md-3 mt-sm-3 mb-sm-3 mt-3 mb-3' id='animal'>";
				while($fila2){
					
					for($i=0;$i<sizeof($datos);$i++){
						
						$cab=$fila2['Field'];
						$fila2=mysqli_fetch_assoc($res2);
						
						if($cab == "IMAGEN"){
							
							$imag=$datos[$i];
							$info = new SplFileInfo($dat);
							
							echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
			
								echo "<div class='col-lg-6 col-md-7 col-sm-8 col-9 d-flex justify-content-center mb-3'>";

									echo "<img class='imag p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-thumbnail img-fluid d-flex align-self-center' src='../images/$imag' alt='Imagen Perfil'>";

								echo "</div>";
							echo "</div>";
							
						}else if($cab != "ID"){
							
							echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='$datos[$i]'><h4 id='$cab'>$cab: <i>$datos[$i]</i></h4></div>";
							
						}
							
					}
				}
				
			echo "<div class='row d-flex justify-content-center mt-2 mb-2'>";
			
				echo "<div class='col-lg-2 col-md-2 col-sm-9 col-10 d-flex justify-content-center'>";
					echo "<button type='button' class='btn boton2' id='btn'>Atrás</button>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		
	}else
		
	if($dni!=""){
			
		unset($_SESSION['idP']);
		unset($_SESSION['id1']);
		$datoP="";
		$id1="";
		
		
		$datos=array();
	
		$consulta5="SELECT * FROM usuario WHERE DNI='$dni'";

		$res=mysqli_query($con,$consulta5)or die('Consulta fallida'.mysqli_error($con));
	
		while($fila=mysqli_fetch_row($res)){
			
			foreach($fila as $valor){
				
				array_push($datos,$valor);
			}
		}
		
		$consulta6="SHOW COLUMNS FROM usuario";
		$res2=mysqli_query($con,$consulta6) or die('Consulta fallida'.mysqli_error($con));
		$fila2=mysqli_fetch_assoc($res2);
		
		echo "<div class='datos col-lg-8 col-md-9 col-sm-10 col-11 mt-lg-3 mb-lg-3 mt-md-3 mb-md-3 mt-sm-3 mb-sm-3 mt-3 mb-3' id='usuario'>";
				while($fila2){
					
					for($i=0;$i<sizeof($datos);$i++){
						
						$cab=$fila2['Field'];
						$fila2=mysqli_fetch_assoc($res2);
						
						if($cab == "IMAGEN"){
							
							$imag=$datos[$i];
							$info = new SplFileInfo($dat);
							
							if(substr_compare($dat, "PROTECTORA", 0, 9)){
								
		
								echo "<div class='row d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3'>";
				
									echo "<div class='col-lg-6 col-md-7 col-sm-8 col-9 d-flex justify-content-center mb-3'>";

										echo "<img class='imag p-lg-2 p-md-2 p-sm-2 p-2 rounded-circle img-thumbnail img-responsive d-flex align-self-center' src='../images/$imag' alt='Imagen Perfil'>";

									echo "</div>";
								echo "</div>";
							}
						}else{
							
							if($cab !="CONTRASENIA"){
								echo "<div class='dato card-body d-flex justify-content-center mt-lg-3 mt-md-3 mt-sm-3 mt-3' id='$datos[$i]'><h4 id='$cab'>$cab: <i>$datos[$i]</i></h4></div>";
							}
						}
							
					}
				}
				
			echo "<div class='row d-flex justify-content-center mt-2 mb-2'>";
			
				echo "<div class='col-lg-2 col-md-2 col-sm-9 col-10 d-flex justify-content-center'>";
					echo "<button type='button' class='btn boton2' id='btn'>Atrás</button>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		
	}
	
	mysqli_close($con);

?>
