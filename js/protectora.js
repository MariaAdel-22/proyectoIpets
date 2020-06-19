$(document).ready(function(){
	
	//Me carga el listado de todas las protectoras que están en la misma localidad que el usuario, y si no hay entonces sácame ese mensaje por pantalla avisando de ello.
	
	$.ajax({
		
		url:'../PHP/listadoProtectoras.php',
		type:'POST',
		success:function(resp){
			
			if( /^\s*$/.test(resp)){
			
				$('#lista').html("<div class='col-12 d-flex justify-content-center'>No hay una protectora que coincida con su localidad.</div>");
				
			}else{
				
				$('#lista').append(resp);
			}
			
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});
	
	//Si pulsa en el contenedor que tiene la protectora,entonces guárdame su Identificador y lo paso a un php para leerlo en la otra página.
	
	$('#lista').on('click','.test',function(){
		
		id=$(this).attr('id');
	
		$.ajax({
			
			url:"../PHP/pasoDatosProtectora.php",
			type:'POST',
			data:"idP="+id,
			success:function(resp){

				location.href="../PHP/fichaParaUsuario.php";
				window.location.href="../html/fichaParaUsuario.html";
			},
			error:function(){
				
				console.log("Ha ocurrido un error");
			}
		});

	});
	
	//Botón de eliminar el PopUp
	
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