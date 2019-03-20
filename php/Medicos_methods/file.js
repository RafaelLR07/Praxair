$(function(argument) {
	 $("#paterno").keydown(function(event){
        let numero = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>* El campo solo acepta numeros</div>';
        if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !==190  && event.keyCode !==110 && event.keyCode !==8 && event.keyCode !==9  ){
            $('#especialidad').after('<div class="alert alert-danger"> ' +arg+ ' </div>');
            return false;
        }
    });
})

function valida_med(){
	$('.alert').remove();
	let valor1 = $('#paterno').val();
	let valor2 = $('#materno').val();
	let valor3 = $('#nombre').val();
	console.log(valor1);
	console.log(valor2);
	console.log(valor3);
	let expression = /^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;
	
		if(!expression.test(valor1)||!expression.test(valor2)||!expression.test(valor3)){
			alerta("No se pueden ingresar caracteres especiales");
			return false;
		}


		else{
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
	$('#especialidad').after('<div class="alert alert-danger"> ' +arg+ ' </div>');
}




$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'Medicos_methods/busca.php' ,
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
	let expresion = /^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/   ;
	if(!expresion.test(valor)){
		$('.alert').remove();
		error_bus("Solo puede ingresar caracteres especiales");
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