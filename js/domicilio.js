$(document).ready(function(){
	
	let va="";
	let daC="";
	let cont=0;
	let check1=false;
	let check2=false;
	let check3=false;
	
	
	//Con éste AJAX lo que hago es cargar todos los animales que han sido seleccionados por el usuario en el listado de animales, y si no hay muestro un mensaje avisando de ello.
	
   $.ajax({
		
		url: "../PHP/pagina6.php",
		type:"POST",
		success:function(resp){
			
			if((resp=="")&&(/^\s*$/.test(resp))){
				
				$('#opciones').append("<div class='co1 test col-lg-8 col-md-11 col-sm-11 col-11 media mt-2 mb-2 d-flex justify-content-center'>No has seleccionado ning&uacute;n animal como favorito.</div>");
			}else{
				$('#opciones').append(resp);
			}
		},
		error:function(){
			
			console.log("Nop");
		}
	});
	
	//Si cambia el valor del radio,mira su valor y si es No entonces haz que los inputs que muestra sean requeridos, si la opción es Si entonces quítales el requerido y ocúltalos.
	
	$("input[name=radio1]").change(function(){
		
		va=$(this).val();
		
		switch(va){
			
			case "Si":
				
				$('#calle').removeAttr("required");
				$('#num').removeAttr("required");
				$('#puerta').removeAttr("required");
				
				$('#opNo').removeClass('sS');
				$('#opNo').addClass('nS');
				
			break;
			
			case "No":
				
				$('#opNo').removeClass('nS');
				$('#opNo').addClass('sS');
				
				$('#calle').attr("required", true);
				$('#num').attr("required", true);
				$('#puerta').attr("required", true);
				
			break;
		}
		
	});
	
	//Cuando cada input pierde el foco,comprueba si cumple con el patrón establecido,si es true entonces el check se vuelve true, si no,entonces permanece false y no valida cuando pulsas el botón.
	
	$('#calle').blur(function(){
		
		reg=/[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,20}/g;
		val=$('#calle').val();
		
		if(reg.test(val)){
			
			check1=true;
			$('#err2').css('display','none');
			
		}else{
			$('#err2').css('display','block');	
		}
		
	});
	
	$('#num').blur(function(){
		
		reg=/[0-9]{1,2}/g;
		val=$('#num').val();
		
		if(reg.test(val)){
			
			check2=true;
			$('#err3').css('display','none');
			
		}else{
			$('#err3').css('display','block');
			
		}
		
	});
	
	$('#puerta').blur(function(){
		
		reg=/[0-9]{1,2}/g;
		val=$('#puerta').val();
		
		if(reg.test(val)){
			
			check3=true;
			$('#err4').css('display','none');
			
		}else{
			$('#err4').css('display','block');
			
		}
	});
	
	//Si pulsas el contenedor que almacena los datos del animal, comprueba de qué color es su background,cambiando su color y sumando el valor de contador o restando. Por ejemplo, por si se pulse más de uno o ninguno que no valide.
	
	$('#opciones').on('click','.test',function(){
	   
		daC=$(this).attr('id');
		
		if($(this).hasClass('co1')){
			
			$(this).removeClass('co1');
			$(this).addClass('co2');
			cont++;
			
		}else{
			
			$(this).removeClass('co2');
			$(this).addClass('co1');
			cont--;
		}
		
	   if(cont == 1){
		   
		   $('#err5').css('display','none');
	   }else{
		   $('#err5').css('display','block');
	    }
		
	});
	
	/*Comprueba que todos los valores cumplen los requisitos (de si el contador es 1,si los check están en true si la opción del radio es No). 
	Si valida entonces manda el id para añadirlo en la tabla de adoptados y mándame a la página tras la adopción, si no entonces avisa al usuario de ello.*/
	
	$('#adoptar').click(function(event){
		
		let valor="";
		let dat="";
		let clave=$(this).parent().parent().parent().children();
		 
		$("input[name=radio1]:checked").each(
			function() {
				
				valor=$(this).val();
			}
		);
			
		if(cont==1){
			for(cla1 of clave){
			 
				if($(cla1).attr('id')=="fila"){
					
					cla2=$(cla1).children();
					
					for(cla3 of cla2){
						
						if($(cla3).attr('id')=="card"){
							
							cla4=$(cla3).children();
							
							for(cla5 of cla4){
							
								if($(cla5).attr('id')=="opciones"){
									
									cla6=$(cla5).children();
									
									for(cla7 of cla6){
										
										dat=$(cla7).attr('id');
										
										if(dat == daC){
											
											switch(valor){
				
												case "Si":
													
													$.ajax({
													
														url:"../PHP/adoptados.php",
														type:"POST",
														data:"id2="+dat,
														success:function(resp){
															
															location.href="../PHP/pasoDatosPag8_1.php";
															window.location.href="../html/pagTrasAdoptar.html";
														},
														error:function(){
															
															console.log("ha ocurrido un error");
														}
													});
												
													event.preventDefault();
													
												break;
												
												case "No":
													
													if(check1 && check2 && check3){
														
														$.ajax({
													
															url:"../PHP/adoptados.php",
															type:"POST",
															data:"id2="+dat,
															success:function(resp){
																
																location.href="../PHP/pasoDatosPag8_1.php";
																window.location.href="../html/pagTrasAdoptar.html";
															},
															error:function(){
																
																console.log("ha ocurrido un error");
															}
														});
														
														event.preventDefault();
													}else{
														
														$('#formu').submit(function(){
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
				}
			}
		}else{
			
			$('#err5').css('display','block');
			$('#formu').submit(function(){
				return false;
			});
		}
		
	});
	
	
	//Botón eliminar del PopUp
     
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