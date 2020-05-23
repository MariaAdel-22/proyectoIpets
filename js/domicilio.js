$(document).ready(function(){

	cont=0;
	val="";
	selec=false;
	
	check1=false;
	check2=false;
	check3=false;
	
	$.ajax({
		
		url: "../PHP/pagina6.php",
		type:"POST",
		success:function(resp){
			
			$('#opciones').append(resp);
		},
		error:function(){
			
			console.log("Nop");
		}
	});
	
	
   $("input[name='radio1']").click(function(){

       
        $("input[name='radio1']").each(function(){

            if($(this).is(':checked')){
        
                val= $(this).attr('value');     
            }
        });

        if(val == "Si"){

            $('#opNo').css('display','none');
			$('.caja').css('height','35vh');
        }else{
            
            $('#opNo').css('display','block');
			$('.caja').css('height','80vh');
			
			$('#calle').blur(function(){

				if($('#calle').val() == ""){

					$('#err2').css('display','block');
					return false;

				}else{

					$('#err2').css('display','none');
					check1=true;
				}
			});

			$('#num').blur(function(){

				if($('#num').val() == ""){

					$('#err3').css('display','block');
					return false;

				}else{

					$('#err3').css('display','none');
					check2=true;
				} 
			});

			$('#puerta').blur(function(){

				if($('#puerta').val() == ""){

					$('#err4').css('display','block');
					return false;

				}else{

					$('#err4').css('display','none');
					check3=true;            
				}
			});
        }
   }); 
   
   
   $('#opciones').on('click','.cajita',function(){
	   
	    cont++;
	   $(this).css('background','#27AE60');
   });
   
   $('#adoptar').click(function(){
	   
	  let clave=$('#opciones').children().children().attr('id');
	  
	  $("input[name='radio1']").each(function(){

            if($(this).is(':checked')){
        
               selec=true;   
            }
        });
		
		if(selec == true){

			 $('#err1').css('display','none');
			 
				if((val == "Si")&&(cont > 0)){
					
					console.log("validado");
					
					$.ajax({
			
						url:"../PHP/eliminados.php",
						type:"POST",
						data:"id1="+clave,
						success:function(){
							
							console.log("ha sido eliminado");
							window.location.href="../html/pagTrasAdoptar.html";
						},
						error:function(){
							
							console.log("ha ocurrido un error");
						}
					});
				}else if(val == "No"){
					
					if((check1 && check2 && check3)&&(cont > 0)){
				 
						$.ajax({
			
							url:"../PHP/eliminados.php",
							type:"POST",
							data:"id1="+clave,
							success:function(){
								
								console.log("ha sido eliminado");
								window.location.href="../html/pagTrasAdoptar.html";
							},
							error:function(){
								
								console.log("ha ocurrido un error");
							}
						});
					
					}else{
						console.log("NO validado");
					}
				}
		}else{
			
			$('#err1').css('display','block');
		}
	
		if(cont == 0){
			
			$('#err5').css('display','block');
		}else{
			$('#err5').css('display','none');
		}
		
   });
   
   $('#myModal').on('click','#eliminar',function(){
		
		$.ajax({
			
			url:"../PHP/eliminarUsuario.php",
			type:'POST',
			success:function(resp){
				
				location.href="../html/iniciarSesion.html";
			},
			error:function(){
				
				console.log("Hubo un fallo");
			}
		})
	});
	
});