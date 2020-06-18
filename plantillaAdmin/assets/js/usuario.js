$(document).ready(function(){
	
	datos= new Array();
	let dat="";
	
	/*Cuando pulsa el botón de actualizar los cambios,comprueba si alguno de los inputs ha sido rellenado, si el caso es afirmativo, le añade el atributo required y un patrón
	dependiendo de su name, y se almacena el resultado en un array, con un contador contabiliza las veces que tiene true el array y si,el contador es igual a la longitud del array
	y son mayor a 0,entonces el formulario valida y se pasan los datos para terminar llevando a la página de tables, si no entonces no valida y se lo avisa al usuario.*/
	
	$('#actBtn').click(function(event){
		
		let val="";
		let cont2=0;
		let cant=new Array();
		let vaCa="";

		dat=$(this).parent().parent().children();
		
		for(dat2 of dat){
			
			if($(dat2).attr('id')){
				
				dat3=$(dat2).children();
				
				for(dat4 of dat3){
					
					if(!$(dat4).attr('id')){
						
						dat5=$(dat4).children();

						for(dat6 of dat5){
							
							dat7=$(dat6).children();
							
							for(dat8 of dat7){
								
								dat9=$(dat8).children();
								for(dat10 of dat9){
									
									if($(dat10).attr('id')){
										
										val=$(dat10).attr('id');
										
										switch(val){
											
											case "NOMBRE":
													
												vaCa=$(dat10).val();
												reg=/[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*/g;
												
												if(vaCa!=""){
													
													$(dat10).attr("pattern",true);
													$(dat10).attr("pattern","[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*");
													$(dat10).attr("required", true);
													
													if(reg.test(vaCa)){
															
													cant.push(true);
													}else{
														
														cant.push(false);
														$('#formu').submit(function(){
															return false;
														});
													}
							
												}else{
													
													$(dat10).removeAttr('required');
												}
												
											break;
											
											case "CONTRASENIA":
												
												vaCa=$(dat10).val();
												reg=/[A-Za-z0-9!?-]{8,12}/g;
												
												if(vaCa!=""){
													
													$(dat10).attr("pattern",true);
													$(dat10).attr("pattern","[A-Za-z0-9!?-]{8,12}");
													$(dat10).attr("required", true);
													
													if(reg.test(vaCa)){
																
														cant.push(true);
													}else{
														
														cant.push(false);
														$('#formu').submit(function(){
															return false;
														});
													}
													
												}else{
													
													$(dat10).removeAttr('required');
												}
												
											break;
											
											case "EMAIL":
												
												vaCa=$(dat10).val();
												reg=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/g;
												
												if(vaCa!=""){
													
													$(dat10).attr("pattern",true);
													$(dat10).attr("pattern","^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$");
													$(dat10).attr("required", true);
													
													if(reg.test(vaCa)){
																
														cant.push(true);
													}else{
														
														cant.push(false);
														$('#formu').submit(function(){
															return false;
														});
													}
												}
											
											break;
										}
									}
								}
								
							}
						}
					}
				}
			}
			
		}
		
		for(hii of cant){
				
			if(hii==true){
				cont2++;
			}
		}
		
		if((cont2 == cant.length) && (cant.length > 0) && (cont2 > 0)){
			
			let formu=new FormData($('#formu')[0]);
		
			$.ajax({
							
				type:"POST",
				url:"../assets/php/datosDeAdmin.php",
				data:formu,
				cache:false,
				processData:false,
				contentType:false,
				success:function(resp){
					
					location.href="../examples/tables.html";
				},
				error:function(){
					
					console.log("Error");
				}
			});
			
			
			event.preventDefault();
		}else{
			
			$('#formu').submit(function(){
				return false;
			});
		}
			

	});
});

