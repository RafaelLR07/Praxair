$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'Inactivos_methods/busca.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
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