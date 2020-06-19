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
	
	//Con el segundo AJAX cargo los datos actualizados de los animales y protectoras que hay registrados en la aplicación.
	
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