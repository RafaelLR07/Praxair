// /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/ ni caracteres ni numeros
// /^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/       no caracteres
/*
var uno = '((?:[a-z] [a-z]+))';
var dos = '(\\d+)';
var tres = '(.)';
var cuatro = '(\\d+)';

var todo = uno+dos+tres+cuatro;*/


function valor() {
	let valor3 = $('#tipo').val();
	let valor4 = $('#precio').val();
	console.log(valor3);
	console.log(valor4);
}
function valida_oxi2(){
	$('.alert').remove();
	let valor3 = $('#tipo').val();
	let valor4 = $('#precio').val();
	console.log(valor3);
	console.log(valor4);
	let expression = /^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;
	
		if(!expression.test(valor3)){
			cambiaCol('precio');
			alerta("No se pueden ingresar caracteres especiales o numeros");
			return false;
		}else{
			return true;
		}

	



}

function valida_oxi(){
	$('.alert').remove();
	let valor1 = $('#nombre').val();
	let valor2 = $('#costo').val();
	console.log(valor1);
	console.log(valor2);
	let expression = /^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;
	
		if(!expression.test(valor1)){
			cambiaCol('nombre');
			alerta("No se pueden ingresar caracteres especiales");
			return false;
		}else{
			return true;
		}

	



}

$('#nombre').focus(function(argument) {
	$('.alert').remove();
	defaultCol('nombre')
});

$('#costo').focus(function(argument) {
	$('.alert').remove();
	defaultCol('costo')
});

function cambiaCol(dato){
	$('#'+dato).css({
		border : "1px solid #dd5144"
	});
}


function defaultCol(dato){
	$('#'+dato).css({
		border : "1px solid #999"
	});
}

function alerta(arg) {
	$('#costo').before('<div class="alert alert-danger"> ' +arg+ ' </div>');
}


$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'Oxigenos_methods/busca.php' ,
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



//funcion de error
function error_bus(texto) {
	$('#datos').before('<div class="alert alert-danger">'+texto+'</div>' );
}

$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	let expresion = /^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;
	if(!expresion.test(valor)){
		$('.alert').remove();
		error_bus("Solo puede ingresar texto");
		return false;
	}else{
		$('.alert').remove();
		if (valor != "") {
			buscar_datos(valor);
		}else{
			buscar_datos();
		}
	}		
});



function conec(){
	document.getElementById("busca2").value = document.getElementById("caja_busueda").value;
}