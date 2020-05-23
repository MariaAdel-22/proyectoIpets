$(document).ready(function(){
	
	$.ajax({
		
		url:"../PHP/fichaParaUsuario.php",
		type:'POST',
		success:function(resp){
			
			$("#caja").html(resp);
		},
		error:function(){
			
			console.log("ha ocurrido algo");
		}
	});
	
	$('#caja').on('click','#btn',function(){
		
		window.history.back();
	});
});