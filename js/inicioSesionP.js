$(document).ready(function(){

    let check1=false;
    let check2=false;

    $('#ident').blur(function(){

        if($('#ident').val() == ""){

            $('#error1').html("Introduce un identificador.");
            return false;
        }else{

            $('#error1').html("");
            check1=true;
        }
    });

    $('#pwd').blur(function(){

        if($('#pwd').val() == ""){

            $('#error2').html("Introduce una contraseña.");
            return false;
        }else{

            $('#error2').html("");
            check2=true;
        }
    });

    $('#iniciar').click(function(){
        
		if(check1 && check2){
        
			let dat=$('#formul').serialize();
					
			$.ajax({
				
				type:"POST",
				url:"../PHP/iniciarSesionProtectora.php",
				data:dat,
				success:function(resp){
					
					if(resp == ""){
						
						$('#error3').html("El identificador o la contraseña no son correctos.");
						return false;
					}else{
						
						$('#error3').html("");
						
						location.href="../PHP/datosIdentProtectora.php,../PHP/pasoDatosProtectora.php";
                        window.location.href="../html/indexProtectora.html";
					}
				
				},
				error:function(){
					
					console.log("fallo");
				}
			});
			
		}else{
            console.log("NO validado");
        }
    });
	
	$('#reg').click(function(){
		
		window.location.href='../html/registro.html';
	});
});