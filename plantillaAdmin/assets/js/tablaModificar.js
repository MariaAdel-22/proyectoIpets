$(document).ready(function(){
	
	let cont=0;
	let cad="";
	let cad2="";
	
	//El primer AJAX carga todos los datos de la fila a modificar.
	
	$.ajax({
						
		url:"../assets/php/formatoDisenParaModificar.php",
		type:'POST',
		success:function(resp){

			$('#btG').before(resp);
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});
	
	/*Si la lista se ha cargado,entonces muestra la funcionalidad de los siguientes botones:
	
		-Si pulsa modificar, entonces a través del DOM accede al input que tenga el mismo id que el icono de editar cambia la clase que tenga (siV o noV con el required añadido
		o eliminado dependiendo de si lo quiere modificar o no).
		-Si pulsa guardar, entonces por el DOM accede al name del input en una cadena tomando el nombre de la columna a modificar. Con un array va guardando si valida o no con el
		patrón añadido y con un contador contabiliza los true, si el contador es igual a la longitud del array y son mayores a 0,entonces valida y me lleva de nuevo a la página de tables
		cuando muestre un mensaje avisando de que se ha actualizado,si no le muestra que no ha validado.*/
	
	$('#caja').ready(function(){
		
		$('#caja').on('click','.fa-edit',function(){
			
			
			dato=$(this).attr('id');
			cab=$(this).parent().attr('id');
			valo1=$(this).parent().parent().children();
			
			for(valo2 of valo1){
				
				switch($(valo2).attr('id')){
					
					case "in" :
						
						valo3=$(valo2).children();
						for(valo4 of valo3){
							
							if(valo4.tagName == "INPUT"){
								
								nameId=$(valo4).attr('name');
								cad=nameId.substr(nameId.indexOf(']')+1);
								cad2=cad.substr(1,cad.indexOf(']')-1);

								if(cad2 == dato){
									
						
									if($(valo4).hasClass('noV')){
										
										cont++;
										$(valo4).removeClass('noV');
										$(valo4).addClass('siV');
										$(valo4).attr("required", true);
										
									}else{
										
										$(valo4).removeClass('siV');
										$(valo4).addClass('noV');
										$(valo4).removeAttr("required");
									}
								}
								
							
								
							}
							
							if(valo4.tagName == "SELECT"){
								
								nameId=$(valo4).attr('name');
								cad=nameId.substr(nameId.indexOf(']')+1);
								cad2=cad.substr(1,cad.indexOf(']')-1);

								if(cad2 == dato){
									
						
									if($(valo4).hasClass('noV')){
										
										cont++;
										$(valo4).removeClass('noV');
										$(valo4).addClass('siV');
										$(valo4).attr("required", true);
										
									}else{
										
										$(valo4).removeClass('siV');
										$(valo4).addClass('noV');
										$(valo4).removeAttr("required");
									}

								}
							}
						}
						
						
					break;
					
					case "fil" :
					
						valo5=$(valo2).children();
						
						for(valo6 of valo5){
							
							valo7=$(valo6).attr('id');
							
							if(valo7 == "in"){
								
								valo8=$(valo6).children();
								
								for(valo9 of valo8){
									
									nameiD=$(valo9).attr('id');
									
									if(nameiD == dato){
										
										cabecera.push(cab);
										datosA.push(dato);
									
										cont++;
										if(cont > 0){
											
											$(valo9).css('display','inline');
										}
									}
								}
							}
						}
						
					break;
				}
			}
							
		});
		
		
		$('#guardar').click(function(event){
			
			let vaCa="";
			let reg="";
		
			let inp1="";
			let inp="";
			
			let cont2=0;
			cant=new Array();
			
			in1=$(this).parent().parent().children();
			
			for(in2 of in1){
				
				if($(in2).attr('id') == 'fila'){
					
					in3=$(in2).children();
					
					for(in4 of in3){
					
					
						inp1=$(in4).children();
					
					}
				}
			}
			
			inp=$(inp1).children();
			
			for(hij of inp){
				
			
				if($(hij).attr('id')== 'in'){
					
					inp2=$(hij).children();
					
					for(inp3 of inp2){
						
						if($(inp3).hasClass('siV')){
							
							inp4=$(inp3).attr('name');
														
							cad=inp4.split('][');
							cad2=cad[1];
							
							switch(cad2){
							
								case "NOMBRE":
									
									vaCa=$(inp3).val();
									reg=/[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
									
								break;
								
								case "CONTRASENIA":
								
								vaCa=$(inp3).val();
								reg=/[A-Za-z0-9!?-]{8,12}/g;
								
								if(reg.test(vaCa)){
											
									cant.push(true);
								}else{
									
									cant.push(false);
									$('#formu').submit(function(){
										return false;
									});
								}
								
								break;
								
								case "LOCALIDAD":
								
									vaCa=$(inp3).val();
									reg=/[A-Z-Ñ][a-z-ñ]{3,}/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
								
								break;
								
								case "DIRECCION":
								
									vaCa=$(inp3).val();
									reg=/((CALLE|Calle)).[A-Z-Á-É-Í-Ó-Ú][a-z]+[,]\s([0-9]{1,2}).[0-9][A-Z]/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
								
								break;
								
								case "CONTACTO":
								
									vaCa=$(inp3).val();
									reg=/(([0-9]{3}[-][0-9]{3}[-][0-9]{3}))|((^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$))/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
									
								break;
								
								case "DNI":
								
									vaCa=$(inp3).val();
									reg=/(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
								
								break;
								
								case "TRABAJO":
								
									vaCa=$(inp3).val();
									reg=/(SI|NO|Si|No)/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
								
								break;
								
								case "EMAIL":
								
									vaCa=$(inp3).val();
									reg=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
								
								break;
								
								case "CODIGOPOSTAL":
								
									vaCa=$(inp3).val();
									reg=/((0[1-9])|(5[0-2])|([1-4][0-9]))[0-9]{3}/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
									
								break;
								
								case "EDAD":
								
									vaCa=$(inp3).val();
									reg=/[0-9]{1,2}\s*(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)*/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
								
								break;
								
								case "ESPECIE":
									
									vaCa=$(inp3).val();
									
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
								
									vaCa=$(inp3).val();
									
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
								
									vaCa=$(inp3).val();
									reg=/((COMÚN EUROPEO|COMUN EUROPEO|Común europeo|Comun europeo)|[A-ZÑa-z-ñ]{3,})/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
									
								break;
								
								case "FECHANACIMIENTO":
								
									vaCa=$(inp3).val();
									reg=/[0-9]{4}[-][0-9]{2}[-][0-9]{2}/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
									
								break;
								
								case "TIEMPOINYECCION":
									
									vaCa=$(inp3).val();
									reg=/[0-9]{1,2}\s(DIA|DIAS|Dia|Dias)/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
									
								break;
								
								case "PESO":
									
									vaCa=$(inp3).val();
									reg=/[0-9]{1,4}/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
									
								break;
								
								case "APELLIDOS":
								
									vaCa=$(inp3).val();
									reg=/[[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}[ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}/g;
									
									if(reg.test(vaCa)){
											
										cant.push(true);
									}else{
										
										cant.push(false);
										$('#formu').submit(function(){
											return false;
										});
									}
									
								break;
								
								default:
								
									cant.push(true);
								break;
							
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
					url:"../assets/php/actualizarTabla.php",
					data:formu,
					cache:false,
					processData:false,
					contentType:false,
					success:function(resp){

						$('#fila').html("<div class='col-lg-8 col-md-8 col-sm-8 col-8 pt-lg-3 pt-md-3 pt-sm-3 pt-3 offset-lg-1 offset-md-1 offset-sm-1 offset-1'><div class='caja2 card d-flex align-items-center inpD'>Los datos se han actualizado exitosamente.</div></div>");
						$('#atras').css('display','none');
						$('#guardar').css('display','none');
						setTimeout('window.location="../examples/tables.html"',3000);
						
					},
					error:function(){
						
						console.log("Error");
					}
				});
				event.preventDefault();
				
			}
			
		});
		
			//Si no tenía imagen con anterioridad,entonces cambia la clase de la imagen para que sea visible cuando le añade la ruta de la nueva imagen.
		
		$('.caja').on('change','#imag1',function(){
		
			let formu=new FormData($('#formu')[0]);
			
			$.ajax({
							
				type:"POST",
				url:"../assets/php/actualizarTabla.php",
				data:formu,
				cache:false,
				processData:false,
				contentType:false,
				success:function(resp){
					
					src=resp.substr(resp.indexOf("../"));
					
					if($('#idIm').hasClass('noV')){
						
						$('#idIm').removeClass('noV');
						$('#idIm').addClass('siV');
						$('#idIm').addClass('ima1');
						$('#idIm').attr('src',src);
						
					}

				}
			});
		
		});
		
		//Si tenía imagen pero se la cambia,entonces la guarda en la base de datos y muestra la nueva imagen con la ruta pasada por AJAX.
		
		$('.caja').on('change','#imag',function(){
		
			let formu=new FormData($('#formu')[0]);
			
			$.ajax({
							
				type:"POST",
				url:"../PHP/../assets/php/actualizarTabla.php",
				data:formu,
				cache:false,
				processData:false,
				contentType:false,
				success:function(resp){
					
					src=resp.substr(resp.indexOf("../"));
					
					$('#idIm').attr('src',src);
					
				}
			});
		
		});
		
		//Al pulsar éste botón te retorna a la página anterior.
		
		$('#atras').click(function(){
		
			window.history.back();
		});
		
	});
});