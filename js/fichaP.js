$(document).ready(function(){
	
	$.ajax({
		
		url:"../PHP/protectora.php",
		type:'POST',
		success:function(resp){
			
			$('#caja').html(resp);
			
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});
	
	$('#caja').on('click','#btn',function(){
		
		window.history.back();
	});
});