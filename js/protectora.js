$(document).ready(function(){
	
	$.ajax({
		
		url:'../PHP/listadoProtectoras.php',
		type:'POST',
		success:function(resp){
			
			$('#lista').append(resp);
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});
	
	$('#lista').on('click','.test',function(){
		
		id=$(this).attr('id');
	
		$.ajax({
			
			url:"../PHP/pasoDatosPag5.php",
			type:'POST',
			data:"id="+id,
			success:function(resp){

				location.href="../PHP/protectora.php";
				window.location.href="../html/fichaProtectora.html";
			},
			error:function(){
				
				console.log("Ha ocurrido un error");
			}
		});
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