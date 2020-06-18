$(document).ready(function(){
	
	//El primer AJAX muestra la ficha del animal.
	
	$.ajax({
		
		url:"../PHP/datosDeAnimal.php",
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
		patrón añadido y con un contador contabiliza los true, si el contador es igual a la longitud del array y son mayores a 0,entonces valida,si no le muestra el error al usuario.*/
	
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
						$(hij).removeAttr("required");
						
					}else{
						
						$(hij).removeClass('noV');
						$(hij).addClass('siV');
						$(hij).attr("required", true);
					}
					
					switch(atIcon){
									
						case "NOMBRE":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25}([ ]{1}[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,25})*' required title='Un nombre que sea entre 2 y 25 letras.'/>");
							
						break;
						
						case "ESPECIE":
								
							$(hij).html("<select name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' title='Por favor seleccione una de las opciones.' required><option value=''>--Selecciona una opción--</option><option value='PERRO'>Perro</option><option value='GATO'>Gato</option><option value='CONEJO'>Conejo</option><option value='ROEDOR'>Roedor</option><option value='EQUINO'>Equino</option><option value='REPTIL'>Reptil</option><option value='CERDO'>Cerdo</option><option value='AVE'>Ave</option><option value='PEZ'>Pez</option></select>");
								
						break;
						
						case "GENERO":
							
							$(hij).html("<select name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' title='Por favor seleccione una de las opciones.' required><option value=''>--Selecciona una opción--</option><option value='MACHO'>Macho</option><option value='HEMBRA'>Hembra</option><option value='HERMAFRODITA'>Hermafrodita</option></select>");
							
						break;
						
						case "RAZA":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='((COMÚN EUROPEO|COMUN EUROPEO|Común europeo|Comun europeo)|[A-ZÑa-z-ñ]{3,})' title='Introduce la raza Comun europeo o una que contenga más de 3 letras.' required/>");
						
						break;
						
						case "FECHANACIMIENTO":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='[0-9]{4}[-][0-9]{2}[-][0-9]{2}' title='Introduce el formato: aaaa-mm-dd.' required/>");
						
						break;
						
						case "TIEMPOINYECCION":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='([0-9]{1,2}).(DIA|DIAS|Dia|Dias)' title='Introduce 1 o dos valores junto: dias o dia.' required/>");
						
						break;
						
						case "PESO":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='[0-9]{1,4}' required/>");
						
						break;
						
						case "EDAD":
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV' pattern='([0-9]{1,2}).(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)' title='Introduce uno o dos valores junto a: AÑO,MES,DIA,AÑOS,MESES,DIAS o Año,Dia,Mes,Dias,Meses,Años.' required/>");
							
						break;
						
						default:
						
							$(hij).html("<input type='text' name='datos["+tabla+"]["+atIcon+"]["+dat+"][]' class='inpD siV'/>");
							
						break;
					}
				}
			}
		});
		
		//Si el animal no tenía imagen con anterioridad,entonces cambia la clase de la imagen para que sea visible cuando le añade la ruta de la nueva imagen.
		
		$('.caja').on('change','#imag1',function(){
		
			let formu=new FormData($('#formu')[0]);
			
			$.ajax({
							
				type:"POST",
				url:"../PHP/modificarDatosAnimal.php",
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
		
		//Si el animal tenía imagen pero se la cambia,entonces la guarda en la base de datos y muestra la nueva imagen con la ruta pasada por AJAX.
		
		$('.caja').on('change','#imag',function(){
		
			let formu=new FormData($('#formu')[0]);
			
			$.ajax({
							
				type:"POST",
				url:"../PHP/modificarDatosAnimal.php",
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
		
		$('#guardar').click(function(event){
			
	
			let va="";
			let vaCa="";
			let reg="";
			let valido=false;
			let cont2=0;
			cant=new Array();
			
			
			inp=$('#animal').children();
			
			inp=$('#animal').children();
			
			for(hij of inp){
				
				if($(hij).attr('id')){
					
					inp2=$(hij).children();
					
					if($(inp2).attr('id')!=undefined){
						
						va=$(inp2).attr('id');
					}
					
				}
				
				if($(hij).attr('id')==va){
						
			
					if(hij.childElementCount > 0){
						
						inp4=$(hij).children();
						
						ca=$(inp4).attr('name');
						
						cad=ca.split(']');
						cad2=cad[1];
						cad3=cad2.substr(cad2.indexOf('[')+1);
						
						switch(cad3){
							
							case "NOMBRE":
								
								vaCa=$(inp4).val();
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
							
							case "ESPECIE":
								
								vaCa=$(inp4).find(":selected").val();
									
								if(vaCa != ""){
									
									cant.push(true);
									
								}else{
									
									cant.push(false);
									$('#formu').submit(function(){
										return false;
									});
								}
								
							break;
							
							case "EDAD":
							
								vaCa=$(inp4).val();
								reg=/[0-9]{1,2}\s(AÑO|MES|DIA|AÑOS|MESES|DIAS|Año|Dia|Mes|Dias|Meses|Años)/g;
								
								if(reg.test(vaCa)){
											
									cant.push(true);
								}else{
									
									cant.push(false);
									$('#formu').submit(function(){
										return false;
									});
								}
								
							break;
							
							case "GENERO":
							
								vaCa=$(inp4).find(":selected").val();
									
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
							
								vaCa=$(inp4).val();
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
							
								vaCa=$(inp4).val();
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
								
								vaCa=$(inp4).val();
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
								
								vaCa=$(inp4).val();
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
					url:"../PHP/modificarDatosAnimal.php",
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
			}
			
		});
			
	});
	
	//Al pulsar éste botón te retorna a la página anterior.
	
	$('#atras').click(function(){
		
		window.history.back();
	});
});