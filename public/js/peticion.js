$(obtener_registros());
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function obtener_registros(busqueda)
{


	
	
<<<<<<< HEAD
	// $.ajax({
	// 	//url : "http://localhost/clientes",
	// 	url : "buscarcliente",
	// 	type : "GET",
	// 	dataType : "html",
	// 	data :{busqueda:busqueda},
	// 	}).done(function(resultado){
	// 	$("#datos").html(resultado);

	// });
=======
	$.ajax({
		//url : "http://localhost/clientes",
		url : "buscarcliente",
		type : "GET",
		dataType : "html",
		data :{busqueda:busqueda},
		}).done(function(resultado){
		$("#datos").html(resultado);

	});
>>>>>>> f5eda1cf75c3786972366f0e998e124cf26c9969
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