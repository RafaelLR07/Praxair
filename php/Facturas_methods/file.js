$(buscar_datos($('#fecha').val()));

function buscar_datos(consulta){
	$.ajax({
		url: 'Facturas_methods/busca.php' ,
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



$(document).on('keypress','#mes', function(){
	
});

function mes(){
	
		console.log($('#mes').val());

}


$(document).on('click','#buscar_fec', function(){
	var valor = $('#fecha').val();
	if (valor != "") {
		buscar_datos(valor);
	
	}else{
		buscar_datos();
		

	}
});



function conec(){
	document.getElementById("busca2").value = document.getElementById("caja_busueda").value;
}