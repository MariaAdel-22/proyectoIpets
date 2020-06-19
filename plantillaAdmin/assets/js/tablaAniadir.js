$(document).ready(function(){
		
	$.ajax({
				
		url: "../assets/php/crearTabla.php",
		type: 'POST',
		success:function(resp){

			$('#btG').before(resp);
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});

	/*Si pulsa el botón, entonces a través del DOM accede hasta recoger su id y,con un switch va comprobando si cada columna va cumpliendo los patrones y guarda el resultado
	en un array y con un contador va contabilizando la cantidad de true, si el contador tiene la misma cantidad que la longitud del array y son mayores a 0 entonces valida
	el formulario y le lleva a la página de tables,si no entonces no valida y se lo hace saber al usuario.*/
	
	$('#caja').on('click','#btn',function(event){
		
		pa1=$(this).parent().parent().children();
		
		let idd="";
		let vaCa="";
		let cont2=0;
		cant=new Array();
		
		for(pa2 of pa1){
			
			if($(pa2).attr('id')=='fila'){
				
				pa3=$(pa2).children();
				
				for(pa4 of pa3){
					
					pa5=$(pa4).children();
					
					for(pa6 of pa5){
						
						pa7=$(pa6).children();
						
						for(pa8 of pa7){
							
							if($(pa8).attr('id')== "in"){
								
								pa9=$(pa8).children();
								
								idd=$(pa9).attr('id');
								
							
								switch(idd){
									
									case "NOMBRE":
										
										vaCa=$(pa9).val();
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
									
									case "CONTRASEÑA":
									
									vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).find(":selected").val();
													
										if(vaCa != ""){
											
											cant.push(true);
											
										}else{
											
											cant.push(false);
											$('#formu').submit(function(){
												return false;
											});
										}
									
									break;
									
									case "EMAIL":
									
										vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).val();
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
										
										vaCa=$(pa9).val();
									
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
									
										vaCa=$(pa9).val();
									
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
									
										vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).val();
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
										
										vaCa=$(pa9).val();
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
										
										vaCa=$(pa9).val();
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
									
										vaCa=$(pa9).val();
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
			}
		}
		
		for(hij of cant){
				
			if(hij==true){
				cont2++;
			}
		}
		
		if((cont2 == cant.length) && (cant.length > 0) && (cont2 > 0)){
				
			let formu=new FormData($('#formu')[0]);
		
			$.ajax({
							
				type:"POST",
				url:"../assets/php/aniadirDatosFila.php",
				data:formu,
				cache:false,
				processData:false,
				contentType:false,
				success:function(resp){

					window.location.href="../examples/tables.html";

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