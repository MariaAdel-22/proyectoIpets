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
	
	//El segundo AJAX me carga todas las protectoras registradas en la aplicación.
	
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
	
	//Cuando pulse el contenedor, cógeme su id que es el Identificador de la protectora y lo paso por AJAX a otra página para poder visualizar su ficha.
		
	$('#lista').on('click','.test',function(){
		
		idP=$(this).attr('id');
		
		$.ajax({
		
			url:"../PHP/pasoDatosProtectora.php",
			type:'POST',
			data:"idP="+idP,
			success:function(resp){

				location.href="../PHP/fichaParaUsuario.php";
				window.location.href="../html/fichaParaUsuario.html";
			},
			error:function(){
				
				console.log("Ha ocurrido un error");
			}
		});
		
	});
		

	//Botón de eliminar en el PopUp
	
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