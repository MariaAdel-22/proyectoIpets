$(document).ready(function(){

	let cont=0;
	let cont1=0;
	let cont2=0;
	let dat="";
	
	//Con los eventos compruebo si los input tienen valor vacío para saltar el mensaje de error o no.
	
   $('#nombre').blur(function(){

        if($('#nombre').val() == ""){

            $('#err1').html("No deje el campo vac&iacute;o.");
            return false;
        }else{

            $('#err1').html("");
        }
    });

    $('#pwd').blur(function(){

        if($('#pwd').val() == ""){

            $('#err2').html("Introduce una contrase&ntilde;a.");
            return false;
        }else{

            $('#err2').html("");
        }
    });

	/*Dependiendo a qué botón se pulse, cambia el nombre del input (ya que a través del DOM lee el name que tenga el imput nombre, mandándolo a un inicio de sesión u otro)
	 el nombre del botón registro por lo mismo y el botón de la protectora tiene algo añadido y es que lee el ID de la protectora que se registra para que sea su ID en el
	 primer inicio de sesión.
	*/
	
	$('#usu').click(function(){
		
		cont++;
		
		if(cont%2!=0){
			
			$('#fila').removeClass('noV');
			$('#fila').addClass('siV');
			$('#nomTit').html("Nombre de usuario");
			
			$('#nombre').attr('type','text');
			$('#nombre').attr('name','nombre');
			
			$('#reg').attr("name","regis");	
		}
		
		if(cont%2==0){
			
			$('#fila').removeClass('siV');
			$('#fila').addClass('noV');
		}
	});
	
	$('#pro').click(function(){
		
		cont1++;
		
		if(cont1%2!=0){
			
			$('#fila').removeClass('noV');
			$('#fila').addClass('siV');
			$('#nomTit').html("ID de protectora");
			
			$('#nombre').attr('type','number');
			$('#nombre').attr('name','ident');
			
			$('#reg').attr("name","regP");
			
			$.ajax({
										
				type:"POST",
				url:"../PHP/pasoDatosPag8_1.php",
				success:function(resp){

					$('#nombre').attr('value',resp);
				},
				error:function(){
					
					console.log("No funciona");
				}
				
			});
		}
		
		if(cont1%2==0){
			
			$('#fila').removeClass('siV');
			$('#fila').addClass('noV');
		}
		
	});

	$('#ad').click(function(){
		
		cont2++;
		
		if(cont2%2!=0){
			
			$('#fila').removeClass('noV');
			$('#fila').addClass('siV');
			$('#nomTit').html('nombre de administrador');
			
			$('#nombre').attr('type','text');
			$('#nombre').attr('name','admin');
			$('#reg').attr('name','regAdmin');
			
		}
		
		if(cont2%2==0){
			
			$('#fila').removeClass('siV');
			$('#fila').addClass('noV');
		}
	});
	
	//Al darle enter con el teclado hace la misma función que el evento de pulsar click, ya que va buscando a través de DOM el name de nombre y con un switch dirige a un lugar u otro para el inicio de sesión.
	
	$('#pwd').keypress(function(e){
		
		pad=$(this).parent().parent().parent().children();
		
		for(hij1 of pad){
			
			hij2=$(hij1).children();
			
			for(hij3 of hij2){
				
				if($(hij3).attr('id')=="nom"){
					
					hij4=$(hij3).children();
					
					for(hij5 of hij4){
						
						hij6=$(hij5).attr('name');
						
						if(e.key=="Enter"){
							
							switch(hij6){
								
								case "nombre":
								
									da=$('#formul').serialize();
						
									$.ajax({
										
										type:"POST",
										url:"../PHP/usuario.php",
										data:da,
										success:function(resp){
											
											if((resp == "")&&(/^\s*$/.test(resp))){
												
												$('#err3').html("El usuario o la contrase&ntilde;a no son correctos.");

											}else{
												
												$('#err3').html("");
												location.href="../PHP/nombreUsuarioPag2.php,../PHP/pasoDatosDeUsuario.php";
												window.location.href="../html/index.html";
											}
										},
										error:function(){
											
											console.log("fallo");
										}
									});
									
								break;
								
								case "ident":
								
									da=$('#formul').serialize();
							
									$.ajax({
										
										type:"POST",
										url:"../PHP/iniciarSesionProtectora.php",
										data:da,
										success:function(resp){
																		
											if((resp == "")&&(/^\s*$/.test(resp))){
												
												$('#err3').html("El identificador o la contrase&ntilde;a no son correctos.");

											}else{
												
												$('#err3').html("");
												
												location.href="../PHP/datosIdentProtectora.php,../PHP/pasoDatosProtectora.php";
												window.location.href="../html/indexProtectora.html";
											}
										},
										error:function(){
											
											console.log("fallo");
										}
									});
									
								break;
								
								case "admin":
								
									da=$('#formul').serialize();
					
									$.ajax({
											
										type:"POST",
										url:"../plantillaAdmin/assets/php/inicioSesionAdmin.php",
										data:da,
										success:function(resp){
											
											if((resp == "")&&(/^\s*$/.test(resp))){

												$('#err3').html("El usuario o la contrase&ntilde;a no son correctos");
											}else{
												
												$('#err3').html("");
												location.href="../plantillaAdmin/assets/php/guardarDatosSesionAdmin.php";
												window.location.href="../plantillaAdmin/examples/inicio.html";
											}
										},
										error:function(){
											
											console.log("fallo");
										}
									});
								break;
							}
						}
					}
				}
			}
		}
	});
	
	$('#iniciar').click(function(){
		
		pad=$(this).parent().parent().parent().children();
		
		for(hij of pad){
			
			if($(hij).attr('id')=="nom"){
				
				hij1=$(hij).children();
				
				for(hij2 of hij1){
					
					nombreInp=$(hij2).attr('name');
					
					switch(nombreInp){
						
						case "nombre":
						
							da=$('#formul').serialize();
				
							$.ajax({
								
								type:"POST",
								url:"../PHP/usuario.php",
								data:da,
								success:function(resp){
									
									if((resp == "")&&(/^\s*$/.test(resp))){
										
										$('#err3').html("El usuario o la contrase&ntilde;a no son correctos.");

									}else{
										
										$('#err3').html("");
										location.href="../PHP/nombreUsuarioPag2.php,../PHP/pasoDatosDeUsuario.php";
										window.location.href="../html/index.html";
									};
								},
								error:function(){
									
									console.log("fallo");
								}
							});
							
						break;
						
						case "ident":
						
							da=$('#formul').serialize();
					
							$.ajax({
								
								type:"POST",
								url:"../PHP/iniciarSesionProtectora.php",
								data:da,
								success:function(resp){
																
									if((resp == "")&&(/^\s*$/.test(resp))){
										
										$('#err3').html("El identificador o la contrase&ntilde;a no son correctos.");

									}else{
										
										$('#err3').html("");
										location.href="../PHP/datosIdentProtectora.php,../PHP/pasoDatosProtectora.php";
										window.location.href="../html/indexProtectora.html";
									
									}
								},
								error:function(){
									
									console.log("fallo");
								}
							});
						break;
						
						case "admin":
						
							da=$('#formul').serialize();
			
							$.ajax({
									
								type:"POST",
								url:"../plantillaAdmin/assets/php/inicioSesionAdmin.php",
								data:da,
								success:function(resp){
									
									if((resp == "")&&(/^\s*$/.test(resp))){

										$('#err3').html("El usuario o la contrase&ntilde;a no son correctos");
									}else{
										
										$('#err3').html("");
										location.href="../plantillaAdmin/assets/php/guardarDatosSesionAdmin.php";
										window.location.href="../plantillaAdmin/examples/inicio.html";
									}
								},
								error:function(){
									
									console.log("fallo");
								}
							});
						break;
					}
				}
			}
		}
	});
	
	//Al pulsar el botón de registro, éste lee su name y dependiendo de cuál sea,envía por AJAX el nombre de la tabla para después añadirlo en el registro junto con los valores.
	
	$('#reg').click(function(){
		
		nomReg=$(this).attr('name');
			
		switch(nomReg){
			
			case "regis":
			
				dat="usuario";
				
				$.ajax({
					
					type:"POST",
					url:"../PHP/pasoDatosDeUsuario.php",
					data:"datoT="+dat,
					success:function(resp){
						
						location.href="../PHP/paginaRegistro.php";
						window.location.href="../html/registro.html";
				
					},
					error:function(){
						
						console.log("fallo");
					}
				});
				
			break;
			
			case "regP":
			
				dat="protectora";
		
				$.ajax({
					
					type:"POST",
					url:"../PHP/pasoDatosDeUsuario.php",
					data:"datoT="+dat,
					success:function(resp){
						
						location.href="../PHP/paginaRegistro.php";
						window.location.href="../html/registro.html";
				
					},
					error:function(){
						
						console.log("fallo");
					}
				});
				
			break;
			
			case "regAdmin":
			
				dat="administradores";
		
				$.ajax({
					
					type:"POST",
					url:"../PHP/pasoDatosDeUsuario.php",
					data:"datoT="+dat,
					success:function(resp){
						
						location.href="../PHP/paginaRegistro.php";
						window.location.href="../html/registro.html";
				
					},
					error:function(){
						
						console.log("fallo");
					}
				});
			break;
		}
	});
});