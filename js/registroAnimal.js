$(document).ready(function(){
			
			
			let check1=false;
			let check2=false;

			let check3=false;
			let check4=false;

			let check5=false;
			let check6=false;

			let check7=false;
			let check8=false;

			let check9=false;

			$('#id').blur(function(){

				if($('#id').val() == ""){

					$('#error1').html("Debes rellenar el campo ID.");
					return false;

				}else{

					$('#error1').html("");
					check1=true;
				}
			});

			$('#nombre').blur(function(){

				if($('#nombre').val() == ""){

					$('#error2').html("Debes rellenar el campo Nombre.");
					return false;

				}else{

					$('#error2').html("");
					check2=true;
				} 
			});

			$('#esp').blur(function(){

				if($('#esp').val() == ""){

					$('#error3').html("Debes rellenar el campo Especie.");
					return false;

				}else{

					$('#error3').html("");
					check3=true;            
				}
			});

			$('#edad').blur(function(){

				if($('#edad').val() == ""){

					$('#error4').html("Debes rellenar el campo Edad.");
					return false;

				}else{

					$('#error4').html("");
					check4=true;
				}
			});

			$('#gen').blur(function(){

				if($('#gen').val() == ""){
					
					$('#error5').html("Debes rellenar el campo Género.");
					return false;
				}else{

					$('#error5').html("");
					check5=true;
				}
			});
			
			$('#raza').blur(function(){

				if($('#raza').val() == ""){

					$('#error6').html("Debes rellenar el campo Raza.");
					return false;
				}else{

					$('#error6').html("");
					check6=true;
				}
			});

			$('#fechaN').blur(function(){

				if($('#fechaN').val() == ""){

					$('#error7').html("Debes rellenar el campo de Fecha de nacimiento.");
					return false;
				}else{

					$('#error7').html("");
					check7=true;
				}
			});

			$('#tiempI').blur(function(){

				if($('#tiempI').val() == ""){

					$('#error8').html("Debes rellenar el campo de Tiempo para la inyección.");
					return false;
				}else{

					$('#error8').html("");
					check8=true;
				}
			});

			$('#peso').blur(function(){

				if($('#peso').val() == ""){

					$('#error9').html("Debes rellenar el campo de Peso.");
					return false;
				}else{

					$('#error9').html("");
					check9=true;
				}
			});
	
			$('#reg').click(function(){
			
				if(check1 && check2 && check3 && check4 && check5 && check6 && check7 && check8 && check9){
				
					let formu=new FormData($('#formul')[0]);
				
					$.ajax({
						
						type:"POST",
						url:"../PHP/registroAnimal.php",
						data:formu,
						cache:false,
						processData:false,
						contentType:false,
						success:function(resp){
							
							if(resp == 1){
							
								console.log("exito absoluto");
								window.history.back();
								window.reload();
								
							}else{
							
								console.log("Nop");
							}
						}
					});
					
					return false;
				}else{
				
					console.log("No ha validado");
					return false;
				}
				
			});
		});