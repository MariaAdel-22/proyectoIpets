$(document).ready(function(){
	
	let cont=0;
	let cont1=0;
	
	let valorAnt=new Array();
	let hijoTd=new Array();
	let ca=new Array();
	
	let cabecera="";
	let datos="";
	
	//Con éste AJAX muestra todas las tablas íntegras que almacena la base de datos de la aplicación.
	
	$.ajax({
			
		url:"../assets/php/todasLasTablas.php",
		type:'POST',
		success:function(resp){
			
			$('#columnaTablas').append(resp);
			
		},
		error:function(){
			
			console.log("Hubo un fallo");
		}
	});

	/*Si está cargada la lista,entonces muestra las siguientes funciones:
	
		-Si pulsas el botón de ordenar,a través de DOM recoge el id de las columnas de las tablas y las almacena en un array para comprobar si se pulsa la misma columna o 
		una distinta (ya que si pulsas una dependiendo de si es par o impar se ordena de una forma u otra,por eso el control de saber quién le estaba pulsando). Pasando finalmente
		por AJAX el nombre de la tabla,la columna y el contador.
		
		-Si pulsas el botón de eliminar, recorre por el DOM todos los td hasta encontrar el que ha sido seleccionado,recoger su id y pasarlo por php para eliminarlo, siempre y cuando
		sea diferente de la columna edicion.
		
		-Si pulsas el botón de editar,recoge a través de DOM la tabla, los datos anteriores y las columnas en dos arrays y una variable antes de pasarlos por un AJAX a otra página.
		
		-Si pulsas el botón de añadir, recoge el valor de la cabecera de la tabla y lo pasa por AJAX, ya que sabiendo el nombre de la tabla ya se cargan todas las columnas.*/
		
	$('.card-plain').ready(function(){
		
		$('#columnaTablas').on('click','.fa-sort',function(){
				
			let valorI=$(this).parent().parent().parent().attr('id');
			let valorIntegro=$(this).parent().attr('id');

			valorBody=$(this).parent().parent().parent();
			valoresTr=valorBody.children();
			
			valortr=$(this).parent().parent();
			valorTh=valortr.children();
			
			valorThId=$(this).parent().attr('id');
			
			valorAnt.push(valorThId);
			
			
			for(valor of valorAnt){
			
				valorComprobar=valorAnt.length-1;
				
				if(valorAnt.length-2 >= 0){
					valorComprobar=valorAnt.length-2;
				}
			}
			
				if(valorThId == valorAnt[valorComprobar]){
					
					cont++;
				}else{
					
					cont=1;
				}

			$.ajax({
			
				url: "../assets/php/ordenarTabla.php",
				type: 'POST',
				data:{"valor1":valorI,
					  "valor2": valorIntegro,
					  "cont":cont},
				success:function(resp){

					for(valor1 of valoresTr){
						
						if($(valor1).attr('id')){
							
							$(valor1).remove();
							
						}
					}
					$(valorBody).append(resp);
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
			});

						
		});
		
		$('#columnaTablas').on('click','.fa-minus-circle',function(){
			
			v=$(this).parent().parent().parent();
			
			tablaN=$(v).attr('id');
			
			v1=$(this).parent().parent();
			
			for(v2 of v1){
				
	
				v3=$(v2).children();
			
				for(v4 of v3){
					
					if($(v4).attr('id')){
						cont++;
					
						if(cont <= 1){
							
							v5=$(v4).attr('id');

							datos=v5;
						}
					}
					
				}
			}
			
			for(v3 of v){
				
				v4=$(v3).children();
				
				for(v5 of v4){
					
					if(!$(v5).attr('id')){
						
						v6=$(v5).children();
						
						for(v7 of v6){
							
							if($(v7).attr('id')){
								
								v8=$(v7).attr('id');
								
								if(v8 != "edicion"){
									cont1++;
									
									if(cont1<= 1){
										
										cabecera=v8;
									}
									
								}
								
							}
						}
					}
				}
			}
			
			$.ajax({
				
				type:"POST",
				url:"../assets/php/eliminarFila.php",
				data:{"cabecera":cabecera,
				      "datos":datos,
					  "tabla":tablaN},
				success:function(resp){

					location.reload();
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
				
			});
			
			
		});
		
		
		$('#columnaTablas').on('click','.fa-edit',function(){
			
			
			padre=$(this).parent().parent();
			hijos=padre.children();
			tabla=$(this).parent().parent().parent().attr('id');
			padre2=$(this).parent().parent().parent().children();
			
			for(hijo1 of padre2){
				
				hijo2=$(hijo1).children();
				
				for(hijo3 of hijo2){
					
					let va="";
					if(hijo3.tagName == "TH"){
						
						if((hijo3.getAttribute('id') != "edicion") && ($(hijo3).attr('id'))){
							
							ca.push($(hijo3).attr('id'));
						}
					}
				}
			}
			
			for(hijo4 of hijos){
				
				if(hijo4.getAttribute('id')){
										
					hijoTd.push(hijo4.getAttribute('id'));
					
				}
			}
			
			
			$.ajax({
			
				url: "../assets/php/datoParaModificar.php",
				type: 'POST',
				data:{"tabla":tabla,
					  "datos": hijoTd,
					  "cabecera":ca},
				success:function(resp){

					location.href="../assets/php/formatoDisenParaModificar.php";
					window.location.href="../examples/paginaParaModificar.html";
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
			});
		});
		
		$('#columnaTablas').on('click','.fa-plus',function(){
			
			valorCabecera=$(this).parent().children();
			
			for(valorC2 of valorCabecera){
				
				if(valorC2.tagName == "H4"){
					
					cabecera=valorC2.innerText;
				}
			}
			
			$.ajax({
				
				type:"POST",
				url:"../assets/php/datoParaCrear.php",
				data:"valorA="+cabecera,
				success:function(resp){
					
					location.href="../assets/php/crearTabla.php";
					location.href="../assets/php/aniadirDatosFila.php";
					window.location.href="../examples/tablaAniadir.html";
				},
				error:function(){
					console.log("Ha ocurrido un error");
				}
			});
		});
	});
	
});
