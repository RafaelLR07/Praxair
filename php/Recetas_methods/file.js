

$(buscar_datos());


$(document).ready(function(){
	$('#filtro').hide();
});



function buscar_datos(consul,valor2){
	var parametros = {
		"consul" : consul,
		"valor2" : $('#filtro').val()
		
	};
	$.ajax({
		url: 'Recetas_methods/busca.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: parametros,
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}




$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});



function conec(){
	document.getElementById("busca2").value = document.getElementById("caja_busueda").value;
}


