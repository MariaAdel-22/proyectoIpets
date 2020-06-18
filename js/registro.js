$(document).ready(function(){
			
		$.ajax({
			
			type:"POST",
			url:"../PHP/paginaRegistro.php",
			success:function(resp){
				
				$('#col').append(resp);

			},
			error:function(){
				
				console.log("fallo");
			}
		});
		
		/*Si pulsa el botón, entonces a través del DOM accede hasta recoger su id y,con un switch va comprobando si cada columna va cumpliendo los patrones y guarda el resultado
		en un array y con un contador va contabilizando la cantidad de true, si el contador tiene la misma cantidad que la longitud del array y son mayores a 0 entonces valida
		el formulario y le lleva a la página de tables,si no entonces no valida y se lo hace saber al usuario/protectora.*/
			
		$('#reg').click(function(event){
			

			let vaCa="";
			let reg="";
			let cont2=0;
			let ca4="";
			let protectora=""
			cant=new Array();
			datosIdent="";
			
			pad=$(this).parent().parent().parent().children();
			
			for(pad1 of pad){
				
				if(!$(pad1).attr('id')){
					
					pad2=$(pad1).children();
					
					if($(pad2).attr('id') == "col"){
						
						pad3=$(pad2).children();
						
						for(pad4 of pad3){
							
							if($(pad4).attr('id')=="in"){
								
								pad5=$(pad4).children();
								idd=$(pad5).attr('id');
								
								switch(idd){
								
									case "NOMBRE":
									
										vaCa=$(pad5).val();
										reg=/[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*/g;
										
										if(reg.test(vaCa)){
											
											cant.push(true);
											
											ca=$(pad5).attr('name');
											ca2=ca.split('][');
											ca3=ca2[0];
											ca4=ca3.substr(ca3.indexOf('[')+1);
											
											if(ca4 == "protectora"){
												
												protectora=ca4;
												datosIdent=$(pad5).val();
											}
											
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
										
									break;
									
									case "CONTRASENIA":
								
										vaCa=$(pad5).val();
										reg=/[A-Za-z0-9!?-]{8,12}/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
										
									break;
									
									case "LOCALIDAD":
									
										vaCa=$(pad5).val();
										reg=/[A-Z-Ñ][a-z-ñ]{3,}/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
									
									break;
									
									case "DIRECCION":
									
										vaCa=$(pad5).val();
										reg=/((CALLE|Calle)).[A-Z-Á-É-Í-Ó-Ú][a-z]+[,]\s([0-9]{1,2}).[0-9][A-Z]/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
									
									break;
									
									case "CONTACTO":
									
										vaCa=$(pad5).val();
										reg=/(([0-9]{3}[-][0-9]{3}[-][0-9]{3}))|((^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$))/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
										
									break;
									
									case "DNI":
									
										vaCa=$(pad5).val();
										reg=/(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
									
									break;
									
									case "TRABAJO":
									
										vaCa=$(pad5).val();
										reg=/(SI|NO|Si|No)/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
									
									break;
									
									case "EMAIL":
									
										vaCa=$(pad5).val();
										reg=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
									
									break;
									
									case "CODIGOPOSTAL":
									
										vaCa=$(pad5).val();
										reg=/((0[1-9])|(5[0-2])|([1-4][0-9]))[0-9]{3}/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
									
									break;
									
									case "EDAD":
									
										vaCa=$(pad5).val();
										reg=/[0-9]{1,2}\s*(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)*/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
									
									break;
									
									case "APELLIDOS":
										
										vaCa=$(pad5).val();
										reg=/[[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}[ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}/g;
										
										if(reg.test(vaCa)){
													
											cant.push(true);
										}else{
											
											cant.push(false);
											$('#formul').submit(function(){
												return false;
											});
										}
										
									break;
								
								}
							}
						}
					}
				}
			}
			
			for(hij of cant){
				
				if(hij==true){
					cont2++;
				}
			}
			
		
			if((cont2 == cant.length) && (cant.length > 0) && (cont2 > 0)){
				
				let formu=new FormData($('#formul')[0]);
			
				$.ajax({
								
					type:"POST",
					url:"../PHP/registro.php",
					data:formu,
					cache:false,
					processData:false,
					contentType:false,
					success:function(resp){
						
						if(protectora == "protectora"){
							
							$.ajax({
								
								type:"POST",
								url:"../PHP/pasoDatosProtectora.php",
								data:"protectora="+datosIdent,
								success:function(resp){
									
									window.location.href="../html/iniciarSesion.html";
									
								},
								error:function(){
									
									console.log("Algo ha fallado.");
								}
							});

						}else{
							window.location.href="../html/iniciarSesion.html";
						}
						
					},
					error:function(){
						
						console.log("Error");
					}
				});
				event.preventDefault();
					
			}
			
		});
				
		//Éste botón retorna a una página anterior.
		$('#atras').click(function(){
			
			window.history.back();
		});
	});
