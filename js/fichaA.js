$(document).ready(function(){
	
	function leerG(cname) {
		
		let name = cname + "=";
		let ca = document.cookie.split(';');
		
		for(let i = 0; i <ca.length; i++) {
			
			let c = ca[i];
			
			while (c.charAt(0)==' ') {
				
				c = c.substring(1);
			}
			
			if (c.indexOf(name) == 0) {
				
				return c.substring(name.length,c.length);
			}
		}
		return "";
	}
				
	$.ajax({
		
		url:"../PHP/fichaAnimal.php",
		type:'POST',
		success:function(resp){
			
			$('#caja').html(resp);
			
			$('#caja').ready(function(){
				
				let id=$('.datos').attr('id');
				

				let caj=$('#caja').children();
				
				for(va2 of caj){
					
					let idd=va2.getAttribute('id');
					
					if(idd!=null){
						
						if(leerG(va2.getAttribute('id'))==idd){
						
							let i2=$('#adop').find('i');
							i2.removeClass("far");
							i2.addClass("fas");
							
						}else{
							
							let i2=$('#adop').find('i');
							i2.removeClass("fas");
							i2.addClass("far");
						}
					}
				
				}
			});
		},
		error:function(){
			
			console.log("Ha ocurrido un error");
		}
	});
			
	$('#caja').on('click','#adop',function(){
		
		let i = $(this).find('i');
		let id1=$('.datos').attr('id');
		
		function crearG(name,value,days=""){

			let galleta=name+"="+encodeURIComponent(value);

			if(days=="-1"){

				galleta+=";max-age=0";

			}else if(days!=""){

				let fecha=new Date();
				fecha.setDate(fecha.getDate()+parseInt(days));

				galleta+=";expires="+fecha.toUTCString();
			}
			document.cookie=galleta;
		}
		
		if(leerG(id1)!=id1){
			
			i.removeClass("far");
			i.addClass("fas");
			
			$.ajax({
		
				url:"../PHP/seleccionados.php",
				type:'POST',
				data:"id1="+id1,
				success:function(resp){
					
					console.log("Se ha añadido");
					
					crearG(id1,1,"1");
	
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
			});
		}
			
		if(leerG(id1)==id1){
			
			i.removeClass("fas");
			i.addClass("far");
			
			$.ajax({
		
				url:"../PHP/eliminados.php",
				type:'POST',
				data:"id1="+id1,
				success:function(resp){
					
					console.log("Se ha eliminado");
					crearG(id1," ","-1");
				},
				error:function(){
					
					console.log("Ha ocurrido un error");
				}
			});
		}
	});
	
	$('#caja').on('click','#btn',function(){
		
		window.history.back();
	});
	
});