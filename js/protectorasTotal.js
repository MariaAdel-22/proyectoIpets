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
		
		url:"../PHP/protectorasTotal.php",
		type:'POST',
		success:function(resp){

			$('#lista').append(resp);
			
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
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