$(document).ready(function(){
	
	//El primer AJAX muestra la caja que aparece en el lateral derecho del Index con la frase ¡Hola,[variable de sesión obtenida por el php que se pasó en inicioSesionU.js]! y el icono de configuración.
	
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
	
	//Es el botón del PopUp que aparece al pulsar la opción de eliminar la cuenta, te redirige al inicio de sesión eliminando la sesión.
	
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




