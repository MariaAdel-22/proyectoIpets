$(document).ready(function(){
	
	let atIcon="";	
	
	//Con el AJAX carga los datos del usuario/protectora.
	
	$.ajax({
		
		url:"../PHP/datosDeCuenta.php",
		type:'POST',
		success:function(resp){
			
			$('#btG').before(resp);

		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});
	
	/* Cuando se haya cargado la ficha con todos los datos, entonces hazme las siguientes opciones:
	
		-Si pulsa el icono de editar, a través del DOM busca a al div que contenga el mismo id que el que tiene el icono,entonces en ese comprueba si tiene la clase siV
		 o noV (por si es visible o no,además de añadirle el atributo required) y dependiendo de cuál sea me muestras el input o no
		 
		-Si pulsa el icono de guardar, con el DOM busca el name del input (que contiene en un array multidimensional el nombre de la tabla,la columna,el valor anterior
		y el valor actual recolectados por el DOM) y de esa cadena coge solamente el nombre de la columna, comprobando si cumple con el patrón o no con un array (ya que
		añade tanto true como false). Con un contador cuéntame cuantos true hay, si el cont tiene el mismo número que la longitud del array y son mayor que 0 entonces valida,
		si no, avisa al usuario con mensajes de no validación.*/
		
		 
	$('#fila').ready(function(){
		
		$('.caja').on('click','.fa-edit',function(){
			
			let dat="";
			let tabla=$(this).parent().parent().attr('id');
			
			atIcon=$(this).attr('id');
			
			pad=$(this).parent().parent().children();

			for(hij of pad){
				
				if($(hij).attr('id') == atIcon){
					
					hij2=$(hij).children();
					
					for(hij3 of hij2){
						
						dat=$(hij3).attr('id');
					}
				}
				if($(hij).attr('id')==dat){
					
					if($(hij).hasClass('siV')){
										
						$(hij).removeClass('siV');
						$(hij).addClass('noV');
						$(hij).attr("required", true);
						
					}else{
						
						$(hij).removeClass('noV');
						$(hij).addClass('siV');
						$(hij).removeAttr("required");
					}
				
					
			
					switch(atIcon){
										
						case "NOMBRE":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*' title='Introduce un nombre de 2 a 25 caracteres.'/>");
							
						break;
						
							case "CONTRASENIA":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='[A-Za-z0-9!?-]{8,12}' title='Introduce una contraseña de entre 8 y 12 caracteres.'/>");
							
						break;
						
						case "LOCALIDAD":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='[A-Z-Ñ][a-z-ñ]{3,}' title='Introduce una localidad con más de 3 caracteres.'/>");
							
						break;
						
						case "DIRECCION":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV'  pattern='((CALLE|Calle)).[A-Z-Á-É-Í-Ó-Ú][a-z]+[,]\s([0-9]{1,2}).[0-9][A-Z]' title='Introduce una direccion con el siguiente formato: Calle Menorca, 32 3A'/>");
							
						break;
						
						case "CONTACTO":
							
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='(([0-9]{3}[-][0-9]{3}[-][0-9]{3}))|((^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$))' title='Introduce un número de teléfono o un email.'/>");
							
						break;
						
						case "DNI":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='(([X-Z]{1})([-]?)([0-9]{7})([-]?)([A-Z]{1}))|(([0-9]{8})([-]?)([A-Z]{1}))' title='Introduce un DNI(8 números + 1 letra mayus) o NIE(7 números + 1 letra mayus)'/>");
							
						break;
						
						case "TRABAJO":
						
							$(hij).html("<select name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' title='Por favor seleccione una de las opciones.' required><option value=''>--Selecciona una opción--</option><option value='Si'>Si</option><option value='No'>No</option></select>");
						
						break;
						
						case "EMAIL":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$' title='Introduce un correo electrónico que contenga mayúsculas,minúsculas o números.'/>");
							
						break;
						
						case "CODIGOPOSTAL":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='((0[1-9])|(5[0-2])|([1-4][0-9]))[0-9]{3}' title='Introduce 5 números entre 01000 y 52999.'/>");
							
						break;
						
						case "EDAD":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='[0-9]{1,2}\s*(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)*' title='Introduce uno o dos valores junto a: AÑO,MES,DIA,AÑOS,MESES,DIAS o Año,Dia,Mes,Dias,Meses,Años.'/>");
							
						break;
						
						case "APELLIDOS":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='[[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}[ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}' title='Introduce los apellidos: apellido1 apellido2.'/>");
						
						break;
						
						default:
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV'/>");
							
						break;
							
					}

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
				
				if($(in2).attr('id')=="fila"){
					
					in3=$(in2).children();
					
					for(in4 of in3){
						
						in5=$(in3).children();
						
						for(in6 of in5){
							
							if($(in6).attr('id')){
								
								in7=$(in6).children();
							
								for(in9 of in7){
									
									in10=$(in9).children();
									
									for(in11 of in10){
										
										if(in11.tagName=="SELECT"){
											
											cad=$(in11).attr('name');
											
											cad2=cad.split(']');
											cad3=cad2[1];
											cad4=cad3.substr(cad3.indexOf('[')+1);
											
											if(cad4 == "TRABAJO"){
												
												vaCa=$(in11).find(":selected").val();
													
												if(vaCa != ""){
													
													cant.push(true);
													
												}else{
													
													cant.push(false);
													$('#formu').submit(function(){
														return false;
													});
												}
											}
										}
										
										if(in11.tagName == "INPUT"){
											
											cad=$(in11).attr('name');
											
											cad2=cad.split(']');
											cad3=cad2[1];
											cad4=cad3.substr(cad3.indexOf('[')+1);
											
											switch(cad4){
							
												case "NOMBRE":
													
													vaCa=$(in11).val();
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
													
													vaCa=$(in11).val();
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
												
													vaCa=$(in11).val();
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
												
													vaCa=$(in11).val();
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
												
													vaCa=$(in11).val();
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
												
													vaCa=$(in11).val();
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
												
												case "EMAIL":
												
													vaCa=$(in11).val();
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
												
													vaCa=$(in11).val();
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
												
													vaCa=$(in11).val();
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
												
												case "APELLIDOS":
													
													vaCa=$(in11).val();
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
					url:"../PHP/modificarDatosCuenta.php",
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
				
				$('#formu').submit(function(){
					return false;
				});
			}

		});
		
		//Si sólo selecciona al botón de + para añadir una imagen,entonces guárdamelo en la base de datos el cambio y muestra en ese espacio de imagen la nueva imagen con el enlace pasado en AJAX.
		$('.caja').on('change','#imag1',function(){
		
			let formu=new FormData($('#formu')[0]);
			
			$.ajax({
							
				type:"POST",
				url:"../PHP/modificarDatosCuenta.php",
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
		
		//Si sólo selecciona al botón de + para cambiar una imagen,entonces guárdamelo en la base de datos el cambio y muestra en ese espacio de imagen la nueva imagen con el enlace pasado en AJAX.
		
		$('.caja').on('change','#imag',function(){
		
			let formu=new FormData($('#formu')[0]);
			
			$.ajax({
							
				type:"POST",
				url:"../PHP/modificarDatosCuenta.php",
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
	});
	
	//Si pulsas éste botón entonces retorna hacia atrás.
	
	$('#atras').click(function(){
		
		window.history.back();
	});
});