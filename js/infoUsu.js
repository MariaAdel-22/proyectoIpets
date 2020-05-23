$(document).ready(function(){
	
	$.ajax({
		
		url:"../PHP/nombreUsuarioPag2.php",
		type:'GET',
		success:function(resp){
			
			$("#usuario").html(resp);
		},
		error:function(){
			
			$("#usuario").html("No se puede mostrar el nombre del usuario por el momento");
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




