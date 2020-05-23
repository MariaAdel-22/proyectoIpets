$(document).ready(function(){
	
	let cont=0;
	let b=new Array();
	
	function leerG(name){

		let nombre=name+"=";

		let listado=document.cookie.split(';');

		for(val of listado){

			let valor=val.indexOf(name);

			if(valor > -1){

				let vaF=val.substr(0,val.indexOf('='));
				
				return vaF.trim();
			}

		}
	}
					
	$.ajax({
		
		url:"../PHP/listaAnimales.php",
		type:'POST',
		success:function(resp){

			$('#lista').append(resp);
			
				$('#lista').ready(function(){
					
				
					let i= $('#lista').find('button');
					b.push(i);
					
					for(ba of b){
						
						let va2=ba.parent().parent().parent().parent();
						
						for(va3 of va2){
							
							let at=va3.getAttribute('id');
							
							if(leerG(at) == va3.getAttribute('id')){
								
								let va4=va3.childNodes;
								
								for(va5 of va4){
									
									let va6=va5.childNodes;
									
									for(va7 of va6){
										
										let va8=va7.childNodes;
										
										for(va9 of va8){
											
											if(va9.getAttribute('id')=='b'){
												
												let va10=va9.childNodes;
												
												for(va11 of va10){
													
													let val12=va11.childNodes;
													
													for(val13 of val12){
														
														val13.classList.toggle('far');
														val13.classList.toggle('fas');
													}
												}
											}
										}
									}
								}
							}
						}
					}
				
				});
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});

	$('#lista').on('click','#imag',function(){
		
		id=$(this).parent().attr('id');
		
		$.ajax({
			
			url:"../PHP/pasoDatosPag8_1.php",
			type:'POST',
			data:"id="+id,
			success:function(resp){

				location.href="../PHP/fichaAnimal.php";
				window.location.href="../html/fichaAnimal.html";
			},
			error:function(){
				
				console.log("Ha ocurrido un error");
			}
		});
	});
	
	
	$('#lista').on('click','.boton',function(e){
	
		cont++;
		let i = $(this).find('i');
	
		let ide=$(this).parent().parent().parent().parent().attr('id');
				
		function crearG(name,value,days=""){

			let galleta=name+"="+encodeURIComponent(value);

			if(days=="-1"){

				galleta+=";max-age=0";

			}else if(days!=""){

				let fecha=new Date();
				fecha.setDate(fecha.getDate()+parseInt(days));

				galleta+=";expires="+fecha.toUTCString();
			}
			document.cookie=galleta;
		}
		
	
		if(leerG(ide)!=ide){
			
			i.removeClass("far");
			i.addClass("fas");
			
			$.ajax({
		
				url:"../PHP/seleccionados.php",
				type:'POST',
				data:"id1="+ide,
				success:function(resp){
					
					console.log("Se ha añadido");
					crearG(ide,1,"1");
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
			});
		}
		
		if(leerG(ide)==ide){
			
			i.removeClass("fas");
			i.addClass("far");
			
			$.ajax({
		
				url:"../PHP/eliminados.php",
				type:'POST',
				data:"id1="+ide,
				success:function(resp){
					
					console.log("Se ha eliminado");
					crearG(ide," ","-1");
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
			});
		}
	});
	
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