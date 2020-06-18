$(document).ready(function(){
					
		dato="animal";
		
		$.ajax({
			
			method:"POST",
			url:"../PHP/paginaRegistro.php",
			data:"dat="+dato,
			success:function(resp){
				
				$('#col').append(resp);
			},
			error:function(){
				
				console.log("He fallado");
			}
		});
		
		/*Si pulsa el botón, entonces a través del DOM accede hasta recoger su id y,con un switch va comprobando si cada columna va cumpliendo los patrones y guarda el resultado
		en un array y con un contador va contabilizando la cantidad de true, si el contador tiene la misma cantidad que la longitud del array y son mayores a 0 entonces valida
		el formulario y le lleva a la página de tables,si no entonces no valida y se lo hace saber a la protectora.*/
		
		$('#reg').click(function(event){
			
			let vaCa="";
			let reg="";
			let cont2=0;
			cant=new Array();
			
			pad=$(this).parent().parent().parent().children();
			
			for(pad1 of pad){
				
				if(!$(pad1).attr('id')){
					
					pad2=$(pad1).children();
					
					if($(pad2).attr('id') == "col"){
						
						pad3=$(pad2).children();
						
						for(pad4 of pad3){
							
							if($(pad4).attr('id')=="in"){
								
								pad5=$(pad4).children();
								
								for(pad6 of pad5){
									
									if(pad6.tagName == "INPUT"){
										
										idd=$(pad6).attr('id');
									}
									
									if(pad6.tagName=="SELECT"){
										
									
										idd=$(pad6).attr('id');
										
									}
									
									switch(idd){
								
										case "NOMBRE":
										
											vaCa=$(pad5).val();
											reg=/[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*/g;
											
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
										
										case "ESPECIE":
											
											vaCa=(pad5).find(":selected").val();
											
											if(vaCa != ""){
												
												cant.push(true);
												
											}else{
												
												cant.push(false);
												$('#formu').submit(function(){
													return false;
												});
											}
											
										break;
										
										case "GENERO":
										
											vaCa=(pad5).find(":selected").val();
										
											if(vaCa != ""){
												
												cant.push(true);
												
											}else{
												
												cant.push(false);
												$('#formu').submit(function(){
													return false;
												});
											}
									
										break;
										
										case "RAZA":
										
											vaCa=$(pad5).val();
											reg=/((COMÚN EUROPEO|COMUN EUROPEO|Común europeo|Comun europeo)|[A-ZÑa-z-ñ]{3,})/g;
											
											if(reg.test(vaCa)){
												
												cant.push(true);
											}else{
												
												cant.push(false);
												$('#formul').submit(function(){
													return false;
												});
											}
											
										break;
										
										case "FECHANACIMIENTO":
										
											vaCa=$(pad5).val();
											reg=/[0-9]{4}[-][0-9]{2}[-][0-9]{2}/g;
											
											if(reg.test(vaCa)){
												
												cant.push(true);
											}else{
												
												cant.push(false);
												$('#formul').submit(function(){
													return false;
												});
											}
											
										break;
										
										case "TIEMPOINYECCION":
											
											vaCa=$(pad5).val();
											reg=/[0-9]{1,2}\s(DIA|DIAS|Dia|Dias)/g;
											
											if(reg.test(vaCa)){
												
												cant.push(true);
											}else{
												
												cant.push(false);
												$('#formul').submit(function(){
													return false;
												});
											}
											
										break;
										
										case "PESO":
											
											vaCa=$(pad5).val();
											reg=/[0-9]{1,4}/g;
											
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
						
						window.history.back();

					},
					error:function(){
						
						console.log("Error");
					}
				});

				event.preventDefault();
				
			}else{

				$('#formul').submit(function(){
					return false;
				});
			}
			
		});
		
		//Éste botón retorna a una página anterior.
		$('#atras').click(function(){
			
			window.history.back();
		});
	});