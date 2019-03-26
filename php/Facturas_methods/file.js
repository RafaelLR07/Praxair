$(buscar_datos(
	$('#fecha_ini').val(),
	$('#fecha_end').val()	
	));

function buscar_datos(fecha_ini, fecha_end){
	var parametros = {
		
		"fec_inicial" :fecha_ini,
		"fec_final" : fecha_end
		
	};
	$.ajax({

		url: 'Facturas_methods/busca.php' ,
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



$(document).on('keypress','#mes', function(){
	
});

function mes(){
	
		console.log($('#mes').val());

}


$(document).on('click','#buscar_fec', function(){
	var valor1 = $('#fecha_ini').val();
	var valor2 = $('#fecha_end').val();
	if (valor1 != "" && valor2!="") {
		buscar_datos(valor1,valor2);
	
	}else{
		buscar_datos();
		

	}
});



function conec(){
	document.getElementById("busca2").value = document.getElementById("caja_busueda").value;
}