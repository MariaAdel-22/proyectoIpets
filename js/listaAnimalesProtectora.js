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
	
	//El segundo AJAX carga todos los animales que la propia protectora ha registrado en la aplicación, y si no hay le avisa con un mensaje de ello.
	
	$.ajax({
		
		url:"../PHP/animalesProtectora.php",
		type:'POST',
		success:function(resp){

			if(( /^\s*$/.test(resp))||(resp=="")){
				
				$('#lista').html("<div class='col-12 d-flex justify-content-center'>No tienes a&ntilde;adido ning&uacute;n animal.</div>");
			}else{
				$('#lista').append(resp);
			}
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});
	
	//Si pulsas el botón de edit, entonces ve al contenedor que almacena los datos del animal y cógeme su id para pasarlo a otro php, guardarlo como variable de sesión y modificarlo en otra página.

	$('#lista').on('click','.fa-edit',function(){
		
		id=$(this).parent().parent().parent().attr("id");
		
		$.ajax({
			
		
			url:"../PHP/pasoDatosPag8_1.php",
			type:'POST',
			data:"id="+id,
			success:function(resp){

				location.href="../PHP/modificarDatosAnimal.php";
				location.href="../PHP/datosDeAnimal.php";
				window.location.href="../html/modificarAnimal.html";
			},
			error:function(){
				
				console.log("Ha ocurrido un error");
			}
		});
		
	});
	
	//Al pulsar el botón de eliminar, vuelve a ir al id del contenedor y que es el ID del animal y lo pasa a un php para eliminarlo.
	
	$('#lista').on('click','.fa-minus-circle',function(){
		
		id2=$(this).parent().parent().parent().attr("id");
		
		$.ajax({
			
			url:"../PHP/eliminarUsuario.php",
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
	
	//Si pulsa el botón de añadir,lleva a la página de registro.
	
	$('.fa-plus').click(function(){
		
		window.location.href="../html/registroAnimal.html";
	});
	
	//Botón de eliminar del PopUp
	
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