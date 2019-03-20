$(buscar_datos());

//funcion aparece botton de reportes
function ap_boton() {
	$('#pdf_fecha').css("display", "block");
}


//funciones de los metodos

//funcion de exito
function exito(texto) {
	$('#header-search').before('<div class="alert alert-success">'+texto+'</div>' );
}

//funcion de error
function error(texto) {
	$('#header-search').before('<div class="alert alert-danger">'+texto+'</div>' );
}


//funcion de validacion de pdf
function val_for_local(){
	$('.alert').remove();
	let valor_select = $('#local').val();
	
	if(valor_select!=""&&valor_select!='elegir'){
		return true;
	}else{
		error("Selecciona un elemento valido de la lista");
		return false;
	}
}


//funcion de activacion de foraneos
function foraneos_form() {
	$('.alert').remove();
	let valor_select = $('#local').val();
	
	if(valor_select!=""&&valor_select!='elegir'){
		locales_fora(valor_select);
	}else{
		error("Selecciona un elemento valido de la lista");
		return false;
	}
}

function locales_fora(valor) {
	var parametros = {
		
		"valor" :valor
				
	};
	
	$.ajax({
		url: 'Pacientes_methods/busca_fecha.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: parametros,
	})
	.done(function(respuesta){
		
		$("#datos").html(respuesta);
		exito("Consulta realizada");

	})
	.fail(function(){
		console.log("error");
	});
}

//funcion para mostrar el div para generar reportes
function mostrar_repor(){
	
	$('#reportes').toggle(1500);
	
}

function buscar_datos(consulta){
	$.ajax({
		url: 'Pacientes_methods/busca.php' ,
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




//funcion para el reporte
function cap_rep_fechas() {
	$('.alert').remove();
	let fecha_inicial = $('#fecha_in').val()
	let fecha_final = $('#fecha_end').val()
	if(fecha_inicial!="" && fecha_final!=""){
		
		return true;
		
	}else{
		error("Debe seleccionar un rango de fecha");
		return false;
	}
}



//funciones para busqueda
function captura(){
	$('.alert').remove();

	let fec_inicial = $('#fec_inicial').val();
	let fec_final =  $('#fec_final').val();
	if(fec_inicial!="" && fec_final!=""){
		fechas_datos(fec_inicial,fec_final);
	}else{
		error("Debe seleccionar un rango de fecha");
	}

}

function fechas_datos(fec_inicial,fec_final){
	var parametros = {
		
		"fec_inicial" :fec_inicial,
		"fec_final" : fec_final
		
	};
	
	$.ajax({
		url: 'Pacientes_methods/busca_fecha.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: parametros,
	})
	.done(function(respuesta){
		
		$("#datos").html(respuesta);
		exito("Consulta realizada");

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