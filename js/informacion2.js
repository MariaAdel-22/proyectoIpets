$(document).ready(function(){
	
	/*Con el primer AJAX carga el recuadro que se encuentra en la parte superior derecha de la página con el ¡Hola,[variable de sesión]! almacenada al iniciar sesión y
	el icono con las configuraciones*/
	
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
	
	//Botón de eliminar en el PopUp
	
	$('#myModal').on('click','#eliminar',function(){
		
		$.ajax({
			
			url:"../PHP/eliminarUsuario.php",
			type:'POST',
			success:function(resp){
				
				location.href="../html/index.html";
			},
			error:function(){
				
				console.log("Hubo un fallo");
			}
		})
		
	});
	
});
