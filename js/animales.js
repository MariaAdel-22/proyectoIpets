$(document).ready(function(){

	let dat="";
	let dat1="";
	let dat2="";
	let dat3="";
	
	//El primer AJAX es quién lee el primer select que aparece con todas las especies de la aplicación.
	
	$.ajax({
		
		url:"../PHP/listado1.php",
		type:'POST',
		success:function(resp){
			
			$('#lis1').append(resp);
		},
		error:function(){
			
			console.log("Hubo un fallo");
		}
	});
	
	//Con el evento change lo que controlo es el valor que tiene, si es TODOS hazme ésto, si es 0 sácame el mensaje de erroc y si es cualquier otra entonces cárgame el listado 2 y muéstralo por pantalla.
	
	$('select[name=lis1]').change(function(){
		
		dat1=$('select[name=lis1]').val();
	
		switch(dat1){
			
			case "TODOS":
			
				$('#op2').css('display','none');
				$('#err1').html("");
			break;
			
			case "0":
				
				$('#err1').html("Seleccione una especie o todas.");
				
			break;
			
			default:
				
				$('#err1').html("");
				$('#op2').css('display','block');
				
				$.ajax({
					
					url:"../PHP/listado2.php",
					type:'POST',
					data:"resp1="+dat1,
					success:function(resp){
						
						$('#lis2').append(resp);
					},
					error:function(){
						
						console.log("Hubo un fallo");
					}
				});
			break;
			
		}
		
	});
	
	//Si el valor del listado 2 cambia,entonces contrólame cuál es su valor, cargándome el listado3 y mostrándolo por pantalla si es diferente al de por defecto u TODOS.
	
	
	$('select[name=lis2]').change(function(){
		
		dat2=$('select[name=lis2]').val();
	
		switch(dat2){
			
			case "TODOS":
			
				$('#op3').css('display','none');
				$('#err2').html("");
			break;
			
			case "0":
				
				$('#err2').html("Seleccione una raza o todas.");
				
			break;
			
			default:
				
				$('#err2').html("");
				$('#op3').css('display','block');
				
				$.ajax({
					
					url:"../PHP/listado3.php",
					type:'POST',
					data:{"resp1":dat1,
					    "resp2":dat2},
					success:function(resp){
						
						$('#lis3').append(resp);
					},
					error:function(){
						
						console.log("Hubo un fallo");
					}
				});
			break;
			
		}
		
	});
	
	//Lo único que controlo con éste es saber si es el valor por defecto para saltar el mensaje de error.
	
	$('select[name=lis3]').change(function(){
		
		dat3=$('select[name=lis3]').val();
		
		switch(dat3){
			
			case "TODOS":
			
				$('#err3').html("");
			break;
			
			case "0":
				
				$('#err3').html("Seleccione una edad o todas.");
				
			break;
			
			default:
				
				$('#err3').html("");
				
			break;
			
		}
	});
	
	/*Cuando pulse al botón, cógeme el valor de los 3 listados y empieza a la condición de las anteriores,pero ésta vez pasando el valor o los valores 
	por AJAX. Ejemplo: si la lista 1 es TODOS entonces manda por AJAX y muéstrame el listado de animales con esa especificación,
	sucediendo lo mismo si están los 3 valores o sólo 2.*/
	
	$('#buscar').click(function(){
		
		dat1=$('select[name=lis1]').find(":selected").val();
		dat2=$('select[name=lis2]').find(":selected").val();
		dat3=$('select[name=lis3]').find(":selected").val();
		
		switch(dat1){
			
			case "0":
				
				$('#err1').html("Seleccione una especie o todas.");
				
			break;
			
			case "TODOS":
				
				$('#err1').html("");
				dat=$('#formul').serialize();
			
				$.ajax({
									
					url:"../PHP/pasoDatosPag4.php",
					type:'POST',
					data:dat,
					success:function(resp){

						location.href="../PHP/listaAnimales.php";
						window.location.href="../html/listadoAnimales.html";
						
					},
					error:function(){
						
						console.log("Ha ocurrido un error");
					}
						
				});
				
			break;
			
			default:
				
				$('#err1').html("");
				if(dat2!=""){
					
					switch(dat2){
						
						case "0":
						
							$('#err2').html("Seleccione una raza o todas.");
						break;
						
						case "TODOS":
							
							$('#err2').html("");
							dat=$('#formul').serialize();
				
							$.ajax({
												
								url:"../PHP/pasoDatosPag4.php",
								type:'POST',
								data:dat,
								success:function(resp){

									location.href="../PHP/listaAnimales.php";
									window.location.href="../html/listadoAnimales.html";
									
								},
								error:function(){
									
									console.log("Ha ocurrido un error");
								}
									
							});
							
						break;
						
						default:
							
							$('#err2').html("");
							if(dat3!=""){
								
								switch(dat3){
									
									case "0":
									
										$('#err3').html("Seleccione una edad o todas.");
									
									break;
									
									case "TODOS":
									
										$('#err3').html("");
										
										dat=$('#formul').serialize();
					
										$.ajax({
															
											url:"../PHP/pasoDatosPag4.php",
											type:'POST',
											data:dat,
											success:function(resp){

												location.href="../PHP/listaAnimales.php";
												window.location.href="../html/listadoAnimales.html";
												
											},
											error:function(){
												
												console.log("Ha ocurrido un error");
											}
												
										});
									
									break;
									
									default:
										
										$('#err3').html("");
										dat=$('#formul').serialize();
					
										$.ajax({
															
											url:"../PHP/pasoDatosPag4.php",
											type:'POST',
											data:dat,
											success:function(resp){

												location.href="../PHP/listaAnimales.php";
												window.location.href="../html/listadoAnimales.html";
											},
											error:function(){
												
												console.log("Ha ocurrido un error");
											}
												
										});
									
									break;
								}
							}
							
						break;
					}
				}
			
			break;
		}
		
	});
	
	//Botón de eliminar del PopUp
	
	$('#myModal').on('click','#eliminar',function(){
		
		$.ajax({
			
			url:"../PHP/eliminarUsuario.php",
			type:'POST',
			success:function(resp){
				
				location.href="../html/iniciarSesion.html";
			},
			error:function(){
				
				console.log("Hubo un fallo");
			}
		})
	});
	
});
