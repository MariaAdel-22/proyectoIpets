$(document).ready(function(){
	
	
	$.ajax({
		
		url:"../PHP/datosDeCuenta.php",
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
				$(this).parent().html("<h4>Nombre:</h4><input type='text' name='nombre' id='nombre' class='inpD'>");
			break;
			
			case "2":
				$(this).parent().html("<h4>Apellidos:</h4><input type='text' name='apel' id='apel' class='inpD'>");
			break;
			
			case "3":
				$(this).parent().html("<h4>DNI:</h4><input type='text' name='dni' id='dni' class='inpD'>");
			break;
			
			case "4":
				$(this).parent().html("<h4>Edad:</h4><input type='number' name='edad' id='edad' class='inpD'>");
			break;
			
			case "5":
				$(this).parent().html("<h4>Localidad:</h4><input type='text' name='local' id='local' class='inpD'>");
			break;
			
			case "6":
				$(this).parent().html("<h4>Trabajo:</h4><input type='text' name='trab' id='trab' maxlength='2' class='inpD'>");
			break;
			
			case "7":
				$(this).parent().html("<h4>Direccion:</h4><input type='text' name='direc' id='direc' class='inpD'>");
			break;
			
			case "8":
				$(this).parent().html("<h4>Codigo Postal:</h4><input type='number' name='codP' id='codP' class='inpD'>");
			break;
			
			case "9":
				$(this).parent().html("<h4>Email:</h4><input type='email' id='email' name='email' class='inpD'>");
			break;
			
			case "10":
				$(this).parent().html("<h4>Contraseña:</h4><input type='text' name='contra' id='contra' class='inpD'>");
			break;
		}
	});
	
	$('#guardar').click(function(){
		
		let formu=new FormData($('#formu')[0]);
	
		$.ajax({
						
			type:"POST",
			url:"../PHP/modificarDatosCuenta.php",
			data:formu,
			cache:false,
			processData:false,
			contentType:false,
			success:function(resp){
				
				setTimeout("location.href='../html/index.html'", 3000);
				
			}
		});
							
			setTimeout("location.href='../html/index.html'", 1000);
		
	});
	
	$('.caja').on('change','#imag',function(){
		
		let formu=new FormData($('#formu')[0]);
	
		$.ajax({
						
			type:"POST",
			url:"../PHP/modificarDatosCuenta.php",
			data:formu,
			cache:false,
			processData:false,
			contentType:false,
			success:function(resp){
				
				if(resp != "0"){
					
					$('#imagP').attr('src',resp);
				}
			}
		});
	});
});