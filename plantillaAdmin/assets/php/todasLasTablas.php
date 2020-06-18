<?php
		
	error_reporting(0);
	header('Content-Type: text/html; charset=UTF-8');
	
	$con=mysqli_connect('localhost','root','','ipetsbbdd') or die('Conexion fallida'.mysqli_error($con));
	$con->set_charset("utf8");
	$sql= "SHOW TABLES FROM ipetsbbdd WHERE Tables_in_ipetsbbdd<>'adoptados'";
	$resultado = mysqli_query($con,$sql);
	while ($fila = mysqli_fetch_row($resultado)) {
		$tab=$fila[0];
		
		
		switch($tab){
			
			
				case "animal":
				
					echo "<div class='card card-plain'>";
					echo "<div class='card-header card-header-primary d-flex justify-content-center'>";
						echo"<h4 class='card-title mt-0'>$tab</h4><i class='fas fa-plus'></i>";
					echo "</div>";
					echo "<div class='card-body'>";
					  echo "<div class='table-responsive'>";
						echo "<table class='table table-striped' id='tabla'>";
						  
							 echo "<tbody id='$tab'>";
								
								$resul="SHOW COLUMNS FROM $tab";
								$r=mysqli_query($con,$resul) or die('Consulta fallida'.mysqli_error($con));
								$fi=mysqli_fetch_assoc($r);
								
								echo "<tr>";
								echo "<th id='edicion' colspan='2'>EDICION</th>";
								while($fi){
									
								
									$cabecera=$fi['Field'];
									
									 echo  "<th>".$fi['Field']."</th>";
									 echo "<th id='$cabecera'><i class='fas fa-sort'></i></th>";
									 
									$fi=mysqli_fetch_assoc($r);
								}
		
								echo "</tr>";
								
								$resul2="SELECT * FROM $tab";
								$r2=mysqli_query($con,$resul2) or die('Consulta fallida'.mysqli_error($con));

									$result3 = $con->query("SHOW COLUMNS FROM $tab");
									if ($result3->num_rows > 0) {
										
										while ($row2 = $result3->fetch_assoc()) {                
											
											$cab=$row2['Field'];
																	
											while($fi2=mysqli_fetch_row($r2)){
												echo "<tr id='fila'>";
												
												echo "<td><i class='fas fa-edit'></i></td>";
												echo "<td><i class='fas fa-minus-circle'></i></td>";
												
												foreach($fi2 as $valor){
																									
													$info = new SplFileInfo($valor);
				
													if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
														
														echo "<td id='$valor' colspan='2'>".$valor."</td>";
														
													}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
														
														echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-fluid img-thumbnail'></td>";
													}			
												}
												
												echo "</tr>";
											}
										
										}
									}		
							echo "</tbody>";
						 echo "</table>";
					   echo "</div>";
					echo "</div>";
				echo "</div>";
			
			break;
			
			
			case "usuario":
			
				echo "<div class='card card-plain'>";
					echo "<div class='card-header card-header-primary d-flex justify-content-center'>";
						echo"<h4 class='card-title mt-0'>$tab</h4><i class='fas fa-plus'></i>";
					echo "</div>";
					echo "<div class='card-body'>";
					  echo "<div class='table-responsive'>";
						echo "<table class='table table-striped' id='tabla'>";
						  
							 echo "<tbody id='$tab'>";
								
								$resul="SHOW COLUMNS FROM $tab";
								$r=mysqli_query($con,$resul) or die('Consulta fallida'.mysqli_error($con));
								$fi=mysqli_fetch_assoc($r);
								
								echo "<tr>";
								echo "<th id='edicion' colspan='2'>EDICION</th>";
								while($fi){
									
								
									$cabecera=$fi['Field'];
									
									 echo  "<th>".$fi['Field']."</th>";
									 echo "<th id='$cabecera'><i class='fas fa-sort'></i></th>";
									 
									$fi=mysqli_fetch_assoc($r);
								}
		
								echo "</tr>";
								
								$resul2="SELECT * FROM $tab";
								$r2=mysqli_query($con,$resul2) or die('Consulta fallida'.mysqli_error($con));

									$result3 = $con->query("SHOW COLUMNS FROM $tab");
									if ($result3->num_rows > 0) {
										
										while ($row2 = $result3->fetch_assoc()) {                
											
											$cab=$row2['Field'];
																	
											while($fi2=mysqli_fetch_row($r2)){
												echo "<tr id='fila'>";
												
												echo "<td><i class='fas fa-edit'></i></td>";
												echo "<td><i class='fas fa-minus-circle'></i></td>";
												
												foreach($fi2 as $valor){
																									
													$info = new SplFileInfo($valor);
				
													if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
														
														echo "<td id='$valor' colspan='2'>".$valor."</td>";
														
													}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
														
														echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-fluid img-thumbnail'></td>";
													}			
												}
												
												echo "</tr>";
											}
										
										}
									}		
							echo "</tbody>";
						 echo "</table>";
					   echo "</div>";
					echo "</div>";
				echo "</div>";
			
			break;
			
			case "protectora":
			
				echo "<div class='card card-plain'>";
					echo "<div class='card-header card-header-primary d-flex justify-content-center'>";
						echo"<h4 class='card-title mt-0'>$tab</h4><i class='fas fa-plus'></i>";
					echo "</div>";
					echo "<div class='card-body'>";
					  echo "<div class='table-responsive'>";
						echo "<table class='table table-striped' id='tabla'>";
						  
							 echo "<tbody id='$tab'>";
								
								$resul="SHOW COLUMNS FROM $tab";
								$r=mysqli_query($con,$resul) or die('Consulta fallida'.mysqli_error($con));
								$fi=mysqli_fetch_assoc($r);
								
								echo "<tr>";
								echo "<th id='edicion' colspan='2'>EDICION</th>";
								while($fi){
									
								
									$cabecera=$fi['Field'];
									
									 echo  "<th>".$fi['Field']."</th>";
									
									 echo "<th id='$cabecera'><i class='fas fa-sort'></i></th>";
									 
									$fi=mysqli_fetch_assoc($r);
								}
		
								echo "</tr>";
								
								$resul2="SELECT * FROM $tab";
								$r2=mysqli_query($con,$resul2) or die('Consulta fallida'.mysqli_error($con));

									$result3 = $con->query("SHOW COLUMNS FROM $tab");
									if ($result3->num_rows > 0) {
										
										while ($row2 = $result3->fetch_assoc()) {                
											
											$cab=$row2['Field'];
																	
											while($fi2=mysqli_fetch_row($r2)){
												echo "<tr id='fila'>";
												
												echo "<td><i class='fas fa-edit'></i></td>";
												echo "<td><i class='fas fa-minus-circle'></i></td>";
												
												foreach($fi2 as $valor){
																									
													$info = new SplFileInfo($valor);
			
													if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
														
														echo "<td id='$valor' colspan='2'>".$valor."</td>";
														
													}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
														
														//echo "<td id='$valor' class='colum' colspan='6'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-responsive img-fluid img-thumbnail'></td>";
													
														echo "<td id='$valor' colspan='4'>";
														
															echo "<div class='row'>";
																
																echo "<div class='col-12'>";
																	
																	echo "<img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='rounded img-fluid img-thumbnail'>";
																	
																echo "</div>";
																
															echo "</div>";
														
														echo "</td>";
													
													}
												
												}
												
												echo "</tr>";
											}
					
										}
									}		
							echo "</tbody>";
						 echo "</table>";
					   echo "</div>";
					echo "</div>";
				echo "</div>";
			
			break;
			
			default:
			
				echo "<div class='card card-plain'>";
					echo "<div class='card-header card-header-primary d-flex justify-content-center'>";
						echo"<h4 class='card-title mt-0'>$tab</h4><i class='fas fa-plus'></i>";
					echo "</div>";
					echo "<div class='card-body'>";
					  echo "<div class='table-responsive'>";
						echo "<table class='table table-striped' id='tabla'>";
						  
							 echo "<tbody id='$tab'>";
								
								$resul="SHOW COLUMNS FROM $tab";
								$r=mysqli_query($con,$resul) or die('Consulta fallida'.mysqli_error($con));
								$fi=mysqli_fetch_assoc($r);
								
								echo "<tr>";
								while($fi){
									
									$cabecera=$fi['Field'];
									
									 echo  "<th>".$fi['Field']."</th>";
									 echo "<th id='$cabecera'><i class='fas fa-sort'></i></th>";
									 
									$fi=mysqli_fetch_assoc($r);
								}
								echo "<th id='edicion' colspan='2'>EDICION</th>";
								echo "</tr>";
								
								$resul2="SELECT * FROM $tab";
								$r2=mysqli_query($con,$resul2) or die('Consulta fallida'.mysqli_error($con));

									$result3 = $con->query("SHOW COLUMNS FROM $tab");
									if ($result3->num_rows > 0) {
										
										while ($row2 = $result3->fetch_assoc()) {                
											
											$cab=$row2['Field'];
																	
											while($fi2=mysqli_fetch_row($r2)){
												echo "<tr id='fila'>";
												foreach($fi2 as $valor){
																									
													$info = new SplFileInfo($valor);
					
													if(substr_compare($valor, "PROTECTORA", 0, 9)){
														
														
														if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
															
															echo "<td id='$valor' colspan='2'>".$valor."</td>";
															
														}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
															
															echo "<td id='$valor' class='colum2' colspan='3'><img src='../../images/$valor' alt='Prueba' class='ima2 mr-3 mt-3 rounded img-fluid img-thumbnail'></td>";
														}
														
													}else{
														
														
														
														if((!($info->getExtension() == "jpg")) && (!($info->getExtension() == "jpeg")) && (!($info->getExtension() == "png")) && (!($info->getExtension() == "PNG")) && (!($info->getExtension() == "JPG"))){
															
															echo "<td id='$valor' colspan='2'>".$valor."</td>";
															
														}else if(($info->getExtension() == "jpg")||($info->getExtension() == "jpeg")||($info->getExtension() == "png")||($info->getExtension() == "PNG") || ($info->getExtension() == "JPG")){
															
															echo "<td id='$valor' class='colum' colspan='4'><img src='../../images/PROTECTORAS/$valor' alt='Prueba' class='ima mr-3 mt-3 rounded img-fluid img-thumbnail'></td>";
														}
														
													}
													
													
																
												}
												echo "<td><i class='fas fa-edit'></i></td>";
												echo "<td><i class='fas fa-minus-circle'></i></td>";
												echo "</tr>";
											}
												
											
										}
									}		
							echo "</tbody>";
						 echo "</table>";
					   echo "</div>";
					echo "</div>";
				echo "</div>";
			break;
		}
	}

	mysqli_close($con);
	
?>