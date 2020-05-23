$(document).ready(function(){
	
	$.ajax({
		
		url:"../PHP/datosIdentProtectora.php",
		type:'POST',
		success:function(resp){
			
			$("#prote").html(resp);
		},
		error:function(){
			
			$("#prote").html("No se puede mostrar el nombre de la protectora por el momento");
		}
	});
	
	$.ajax({
		
		url:"../PHP/animalesProtectora.php",
		type:'POST',
		success:function(resp){

			$('#lista').append(resp);
			
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});

	$('#lista').on('click','.fa-edit',function(){
		
		id=$(this).parent().parent().parent().parent().attr("id");
		
		$.ajax({
			
		
			url:"../PHP/pasoDatosPag8_1.php",
			type:'POST',
			data:"id="+id,
			success:function(resp){

				location.href="../PHP/datosDeAnimal.php";
				window.location.href="../html/modificarAnimal.html";
			},
			error:function(){
				
				console.log("Ha ocurrido un error");
			}
		});
	
		
	});
	
	
	$('#lista').on('click','.fa-minus-circle',function(){
		
		id2=$(this).parent().parent().parent().parent().attr("id");
		
		$.ajax({
			
			url:"../PHP/eliminarAnimal.php",
			type:"POST",
			data:"id="+id2,
			success:function(resp){
				
				location.reload();
			},
			error:function(){
				
				console.log("Ha ocurrido un error");
			}
		});
		
	});
	
	
	$('.fa-plus').click(function(){
		
		window.location.href="../html/registroAnimal.html";
	});
	
	$('#myModal').on('click','#eliminar',function(){
		
		$.ajax({
			
			url:"../PHP/eliminarProtectora.php",
			type:'POST',
			success:function(resp){
				
				location.href="../html/iniciarSesion2.html";
			},
			error:function(){
				
				console.log("Hubo un fallo");
			}
		})
	});
	
});