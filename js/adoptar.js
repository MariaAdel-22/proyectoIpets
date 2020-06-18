$(document).ready(function(){

	//Si he llegado a ésta página por adoptar correctamente,entonces elimina al animal de la base de datos y me redirige a la página de index a los 3 segundos.

	$.ajax({
			
		url:"../PHP/eliminados.php",
		type:"POST",
		success:function(resp){
			
			setTimeout('window.location="../html/index.html"',3000); 
		},
		error:function(){
			
			console.log("ha ocurrido un error");
		}
	});
});