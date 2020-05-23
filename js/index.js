$(document).ready(function(){
	
	$.ajax({
		
		url:"../PHP/nombreUsuarioPag2.php",
		type:'POST',
		success:function(resp){
			
			$("#usu").html(resp);
		},
		error:function(){
			
			$("#usu").html("No se puede mostrar el nombre del usuario por el momento");
		}
	});
	
	$.ajax({
		
		url:"../PHP/datosPag2.php",
		type:'GET',
		success:function(resp){
			
			$("#resul").html(resp);
		},
		error:function(){
			
			$("#resul").html("No se puede mostrar los datos por el momento");
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




