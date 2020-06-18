$(document).ready(function(){
	
	//Al hacer una consulta a la base de datos, retorna un objeto JSON y lo muestra en la tabla.
	
	$.ajax({
		
	  url: '../assets/php/registrosParaJSON.php',
	  dataType: 'json',
	  success: function (resp) {
		
		dat=resp.postr;
		
		for(d2 of dat){
			
			$('#cuerpo').append("<tr><td>"+d2.USUARIO+"</td><td>"+d2.ANIMAL+"</td>"+"<td>"+d2.PROTECTORA+"</td>"+"<td>"+d2.HORA+"</td>"+"</tr>");
		}
	  },
	  error:function(){
		  
		 console.log("Hubo algún fallo");
	  }
	});

});