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
		
		url:"../PHP/animalesFavoritos.php",
		type:'POST',
		success:function(resp){

			$('#lista').append(resp);
			
			if(resp == ""){
				
				$('#lista').append("Todavía no se ha seleccionado ningún animal tuyo como favorito.");
				$('#lista').css("margin-left","3vw");
			}
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});

	$('#lista').on('click','.test',function(){
		
		id=$(this).attr("id");
		
		$.ajax({
		
			url:"../PHP/pasoDNI.php",
			type:'POST',
			data:"dni="+id,
			success:function(resp){
				
				location.href="../PHP/fichaParaUsuario.php";
				window.location.href="../html/fichaParaUsuario.html";
			},
			error:function(){
				
				console.log("Algo ha fallado");
			}
		});
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