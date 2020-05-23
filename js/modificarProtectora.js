$(document).ready(function(){
	
	$.ajax({
		
		url:"../PHP/datosDeProtectora.php",
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
				$(this).parent().html("<h4>Identificador:</h4><input type='number' name='ident' id='ident' class='inpD'>");
			break;
			
			case "2":
				$(this).parent().html("<h4>Nombre:</h4><input type='text' name='nombre' id='nombre' class='inpD'>");
			break;
			
			case "3":
				$(this).parent().html("<h4>Contraseña:</h4><input type='text' name='contra' id='contra' class='inpD'>");
			break;
			
			case "4":
				$(this).parent().html("<h4>Localidad:</h4><input type='text' name='local' id='local' class='inpD'>");
			break;
			
			case "5":
				$(this).parent().html("<h4>Dirección:</h4><input type='text' name='direc' id='direc' class='inpD'>");
			break;
			
			case "6":
				$(this).parent().html("<h4>Contacto:</h4><input type='text' name='contact' id='contact' class='inpD'>");
			break;
			
		}
	});
	
	$('#guardar').click(function(){
		
		let formu=new FormData($('#formu')[0]);
	
		$.ajax({
						
			type:"POST",
			url:"../PHP/modificarDatosProtectora.php",
			data:formu,
			cache:false,
			processData:false,
			contentType:false,
			success:function(resp){
					
				setTimeout("location.href='../html/indexProtectora.html'", 3000);
			}
		});
	});
	
	$('.caja').on('change','#imag',function(){
		
		let formu=new FormData($('#formu')[0]);
	
		$.ajax({
						
			type:"POST",
			url:"../PHP/modificarDatosProtectora.php",
			data:formu,
			cache:false,
			processData:false,
			contentType:false,
			success:function(resp){
				
				if(resp != "0"){
					
					$('#imagPr').attr('src',resp);
				}
			}
		});
	});
});