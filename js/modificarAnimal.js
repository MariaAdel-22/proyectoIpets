$(document).ready(function(){
	
	
	$.ajax({
		
		url:"../PHP/datosDeAnimal.php",
		type:'POST',
		success:function(resp){
			
			$('#btG').before(resp);

			$('#imag').css('height','1.6vh');
			$('#imag').css('top','22vh');
			$('#imag').css('left','13.9vh');
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});
	
	$('.caja').on('click','.fa-edit',function(){
		
		
		$id=$(this).parent().attr('id');
		
		switch($id){
			
			case "1":
				$(this).parent().html("<h4>Identificador:</h4><input type='text' name='ident' id='ident' class='inpD'>");
			break;
			
			case "2":
				$(this).parent().html("<h4>Nombre:</h4><input type='text' name='nombre' id='nombre' class='inpD'>");
			break;
			
			case "3":
				$(this).parent().html("<h4>Especie:</h4><input type='text' name='esp' id='esp' class='inpD'>");
			break;
			
			case "4":
				$(this).parent().html("<h4>Edad:</h4><input type='number' name='edad' id='edad' class='inpD'>");
			break;
			
			case "5":
				$(this).parent().html("<h4>Género:</h4><input type='text' name='gen' id='gen' class='inpD'>");
			break;
			
			case "6":
				$(this).parent().html("<h4>Raza:</h4><input type='text' name='raza' id='raza' maxlength='2' class='inpD'>");
			break;
			
			case "7":
				$(this).parent().html("<h4>Fecha:</h4><input type='date' name='fecha' id='fecha' class='inpD'>");
			break;
			
			case "8":
				$(this).parent().html("<h4>Tiempo Inyección:</h4><input type='text' name='tiempI' id='tiempI' class='inpD'>");
			break;
			
			case "9":
				$(this).parent().html("<h4>Peso:</h4><input type='number' id='peso' name='peso' class='inpD'>");
			break;

		}
	});
	
	$('#guardar').click(function(){
		
		let formu=new FormData($('#formu')[0]);
	
		$.ajax({
						
			type:"POST",
			url:"../PHP/modificarDatosAnimal.php",
			data:formu,
			cache:false,
			processData:false,
			contentType:false,
			success:function(resp){
					
				window.history.back();
			}
		});
	});
	
	$('.caja').on('change','#imag',function(){
		
		let formu=new FormData($('#formu')[0]);
		
		$.ajax({
						
			type:"POST",
			url:"../PHP/modificarDatosAnimal.php",
			data:formu,
			cache:false,
			processData:false,
			contentType:false,
			success:function(resp){
				
				if(resp != "0"){
					
					$('#imagA').attr('src',resp);
					console.log($('#imagA'));
				}
			}
		});
		
	});
});