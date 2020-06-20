<?php

	$cont=$_POST['cont'];
	$val1=$_POST['valor1'];
	$val2=$_POST['valor2'];

	require '../../../PHP/conexion.php';
	$con->set_charset("utf8");
	
	switch($cont){
		
		case ($cont%2!=0):
			
				$consulta1="SELECT * FROM $val1 ORDER BY $val2 DESC";
				$res=mysqli_query($con,$consulta1) or die('Consulta fallida'.mysqli_error($con));
				
				switch($val1){
					
					case "disponibles":
					
						while($fila=mysqli_fetch_row($res)){
							echo "<tr id='fila'>";
							
							foreach($fila as $valor){
								
								$info = new SplFileInfo($valor);
						
								if(substr_compare($valor, "PROTECTORA", 0, 9)){
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}else{
									
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}
							}
							
								echo "<td><i class='fas fa-edit'></i></td>";
								echo "<td><i class='fas fa-minus-circle'></i></td>";
							echo "</tr>";
						}
					break;
					
					case "administradores":
					
						while($fila=mysqli_fetch_row($res)){
							echo "<tr id='fila'>";
							
							foreach($fila as $valor){
								
								$info = new SplFileInfo($valor);
						
								if(substr_compare($valor, "PROTECTORA", 0, 9)){
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}else{
									
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}
							}
							
								echo "<td><i class='fas fa-edit'></i></td>";
								echo "<td><i class='fas fa-minus-circle'></i></td>";
							echo "</tr>";
						}
					
					break;
					
					case "seleccionados":
					
						while($fila=mysqli_fetch_row($res)){
							echo "<tr id='fila'>";
							
							foreach($fila as $valor){
								
								$info = new SplFileInfo($valor);
						
								if(substr_compare($valor, "PROTECTORA", 0, 9)){
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}else{
									
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}
							}
							
								echo "<td><i class='fas fa-edit'></i></td>";
								echo "<td><i class='fas fa-minus-circle'></i></td>";
							echo "</tr>";
						}
					
					break;
					
					default:
					
						while($fila=mysqli_fetch_row($res)){
							echo "<tr id='fila'>";
							echo "<td><i class='fas fa-edit'></i></td>";
							echo "<td><i class='fas fa-minus-circle'></i></td>";
								
							foreach($fila as $valor){
								
								$info = new SplFileInfo($valor);
						
								if(substr_compare($valor, "PROTECTORA", 0, 9)){
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}else{
									
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}
							}
						
							echo "</tr>";
						}
					
					break;
				
				}			
			
		break;
		
		case ($cont%2==0):
		
				$consulta2="SELECT * FROM $val1 ORDER BY $val2 ASC";
				$res=mysqli_query($con,$consulta2) or die('Consulta fallida'.mysqli_error($con));
				
				switch($val1){
					
					case "disponibles":
					
						while($fila=mysqli_fetch_row($res)){
							echo "<tr id='fila'>";
							
							foreach($fila as $valor){
								
								$info = new SplFileInfo($valor);
						
								if(substr_compare($valor, "PROTECTORA", 0, 9)){
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}else{
									
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}
							}
							
								echo "<td><i class='fas fa-edit'></i></td>";
								echo "<td><i class='fas fa-minus-circle'></i></td>";
							echo "</tr>";
						}
					break;
					
					case "administradores":
					
						while($fila=mysqli_fetch_row($res)){
							echo "<tr id='fila'>";
							
							foreach($fila as $valor){
								
								$info = new SplFileInfo($valor);
						
								if(substr_compare($valor, "PROTECTORA", 0, 9)){
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}else{
									
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}
							}
							
								echo "<td><i class='fas fa-edit'></i></td>";
								echo "<td><i class='fas fa-minus-circle'></i></td>";
							echo "</tr>";
						}
					
					break;
					
					case "seleccionados":
					
						while($fila=mysqli_fetch_row($res)){
							echo "<tr id='fila'>";
							
							foreach($fila as $valor){
								
								$info = new SplFileInfo($valor);
						
								if(substr_compare($valor, "PROTECTORA", 0, 9)){
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}else{
									
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}
							}
							
								echo "<td><i class='fas fa-edit'></i></td>";
								echo "<td><i class='fas fa-minus-circle'></i></td>";
							echo "</tr>";
						}
					
					break;
					
					default:
					
						while($fila=mysqli_fetch_row($res)){
							echo "<tr id='fila'>";
							echo "<td><i class='fas fa-edit'></i></td>";
							echo "<td><i class='fas fa-minus-circle'></i></td>";
								
							foreach($fila as $valor){
								
								$info = new SplFileInfo($valor);
						
								if(substr_compare($valor, "PROTECTORA", 0, 9)){
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}else{
									
									
									
									if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
										
										echo "<td id='$valor' colspan='2'>".$valor."</td>";
										
									}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
										
										echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
									}
									
								}
							}
						
							echo "</tr>";
						}
					
					break;
				
				}		
				
		break;
	}
	
		mysqli_close($con);
?>
