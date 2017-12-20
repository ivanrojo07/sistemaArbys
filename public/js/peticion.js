$(obtener_registros());
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function obtener_registros(busqueda)
{


	
	
	$.ajax({
		//url : "http://localhost/clientes",
		url : "buscarcliente",
		type : "GET",
		dataType : "html",
		data :{busqueda:busqueda},
		}).done(function(resultado){
		$("#datos").html(resultado);

	});
}

$(document).on('keyup', '#query', function()
{

	var valor=$(this).val();

	


	
	if (valor!="")
	{
		obtener_registros(valor);
	}
	else
		{
			obtener_registros();
			
		}
});