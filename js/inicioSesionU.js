$(document).ready(function(){

    let check1=false;
    let check2=false;

    $('#nombre').blur(function(){

        if($('#nombre').val() == ""){

            $('#error1').html("Introduce un nombre de usuario.");
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
				url:"../PHP/usuario.php",
				data:dat,
				success:function(resp){
					
					if(resp == ""){
						
						$('#error3').html("El usuario o la contraseña no son correctos.");
						return false;
						
					}else{
						
						$('#error3').html("");
						location.href="../PHP/nombreUsuarioPag2.php,../PHP/pasoDatosDeUsuario.php";
						window.location.href="../html/index.html";
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