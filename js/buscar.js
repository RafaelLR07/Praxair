$(obtener_registros());

function obtener_registros(pacientes)
{
	$.ajax({
		url : '../php/Pacientes_methods/query.php',
		type : 'POST',
		dataType : 'html',
		data : { pacientes: pacientes},
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}


});
