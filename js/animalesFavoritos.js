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
	
	//El segundo AJAX muestra todos los animales que tiene la protectora que hayan sido seleccionados como favorito,y si no hay con un mensaje lo avisa a la protectora.
	
	$.ajax({
		
		url:"../PHP/animalesFavoritos.php",
		type:'POST',
		success:function(resp){

			$('#lista').append(resp);
			
			if(resp == ""){
				
				$('#lista').append("Todavía no se ha seleccionado ningún animal tuyo como favorito.");
			}
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});

	//Si al cargar la lista pulsa la imagen del usuario que lo ha añadido como favorito,recoge el id del contenedor que es el dni y lo pasa por php con una variable de sesión a la ficha para ver los datos.
	
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