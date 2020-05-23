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

			$('#nombre').blur(function(){

				if($('#nombre').val() == ""){

					$('#error1').html("Debes rellenar el campo Nombre.");
					return false;

				}else{

					$('#error1').html("");
					check1=true;
				}
			});

			$('#apel').blur(function(){

				if($('#apel').val() == ""){

					$('#error2').html("Debes rellenar el campo Apellidos.");
					return false;

				}else{

					$('#error2').html("");
					check2=true;
				} 
			});

			$('#dni').blur(function(){

				if($('#dni').val() == ""){

					$('#error3').html("Debes rellenar el campo DNI.");
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

			$('#local').blur(function(){

				if($('#local').val() == ""){
					
					$('#error5').html("Debes rellenar el campo Localidad.");
					return false;
				}else{

					$('#error5').html("");
					check5=true;
				}
			});
			
			$('#direc').blur(function(){

				if($('#direc').val() == ""){

					$('#error6').html("Debes rellenar el campo Dirección.");
					return false;
				}else{

					$('#error6').html("");
					check6=true;
				}
			});

			$('#codPost').blur(function(){

				if($('#codPost').val() == ""){

					$('#error7').html("Debes rellenar el campo Código postal.");
					return false;
				}else{

					$('#error7').html("");
					check7=true;
				}
			});

			$('#email').blur(function(){

				if($('#email').val() == ""){

					$('#error8').html("Debes rellenar el campo Email.");
					return false;
				}else{

					$('#error8').html("");
					check8=true;
				}
			});

			$('#contra').blur(function(){

				if($('#contra').val() == ""){

					$('#error9').html("Debes rellenar el campo Contraseña.");
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
						url:"../PHP/registro.php",
						data:formu,
						cache:false,
						processData:false,
						contentType:false,
						success:function(resp){
							
							if(resp == 1){
							
								console.log("exito absoluto");
								window.location.href="../html/iniciarSesion.html";
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