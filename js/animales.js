$(document).ready(function(){

		$('#op2').css('display','none');
		$('#op3').css('display','none');
			
        $.ajax({

            url:"../PHP/listado1.php",
            type:'POST',
            success:function(resp){

				$('#lis1').append(resp);
            },
            error:function(){
                
                console.log("Ha ocurrido un error");
            }
        });

	
	
	$("select[name=lis1]").change(function(){
            
        resp1=$(this).val();
		
		if(resp1 != "TODOS"){
			
			$('#op2').css('display','inline');
			
				$.ajax({
		
					url:"../PHP/listado2.php",
					type:'POST',
					data:"resp1="+resp1,
					success:function(resp){
		
						$('#lis2').append(resp);
					},
					error:function(){
						
						console.log("Ha ocurrido un error");
					}
				});
		
		
			$("select[name=lis2]").change(function(){
					
				resp2=$(this).val();
				
				if(resp2 != "TODOS"){
				
					$('#op3').css('display','inline');
					
					$.ajax({
			
						url:"../PHP/listado3.php",
						type:'POST',
						data:"resp2="+resp2,
						success:function(resp){
			
							$('#lis3').append(resp);
						},
						error:function(){
							
							console.log("Ha ocurrido un error");
						}
					});	
				}	
			});
		
		
			$("select[name=lis3]").change(function(){
					
				resp3=$(this).val();
				
			});
		}
		
	});
	
		
	
	$('#buscar').click(function(){
		
		if(($('select[name=lis1]').val()!="0")&&($('select[name=lis1]').val()=="TODOS")){
			
			let dat=$('#formul').serialize();
			
			$.ajax({
								
				url:"../PHP/pasoDatosPag4.php",
				type:'POST',
				data:dat,
				success:function(resp){

					location.href="../PHP/listaAnimales.php";
					window.location.href="../html/listadoAnimales.html";
					
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
					
			});
			
		}else if((($('select[name=lis1]').val()!="0")&&($('select[name=lis1]').val()!="TODOS"))&&(($('select[name=lis2]').val()!="0")&&($('select[name=lis2]').val()=="TODOS"))){
			
			let dat=$('#formul').serialize();
			
			$.ajax({
								
				url:"../PHP/pasoDatosPag4.php",
				type:'POST',
				data:dat,
				success:function(resp){

					location.href="../PHP/listaAnimales.php";
					window.location.href="../html/listadoAnimales.html";
					
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
					
			});
		}else if((($('select[name=lis1]').val()!="0")&&($('select[name=lis1]').val()!="TODOS"))&&(($('select[name=lis2]').val()!="0")&&($('select[name=lis2]').val()!="TODOS"))&&(($('select[name=lis3]').val()!="0")&&($('select[name=lis3]').val()=="TODOS"))){
			
			let dat=$('#formul').serialize();
			
			$.ajax({
								
				url:"../PHP/pasoDatosPag4.php",
				type:'POST',
				data:dat,
				success:function(resp){

					location.href="../PHP/listaAnimales.php";
					window.location.href="../html/listadoAnimales.html";
					
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
					
			});
			
		}else if((($('select[name=lis1]').val()!="0")&&($('select[name=lis1]').val()!="TODOS"))&&(($('select[name=lis2]').val()!="0")&&($('select[name=lis2]').val()!="TODOS"))&&(($('select[name=lis3]').val()!="0")&&($('select[name=lis3]').val()!="TODOS"))){
			
			let dat=$('#formul').serialize();
			
			$.ajax({
								
				url:"../PHP/pasoDatosPag4.php",
				type:'POST',
				data:dat,
				success:function(resp){

					location.href="../PHP/listaAnimales.php";
					window.location.href="../html/listadoAnimales.html";
					
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
					
			});
		}
		
		if ($('select[name=lis1]').val()=="0"){
			
			$('#error1').html('Por favor seleccione una de las opciones en el apartado Especie.');
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
