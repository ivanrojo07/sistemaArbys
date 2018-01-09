$(obtener_registros());
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function obtener_registros(busqueda, etiqueta,cli,pro)
{


     // console.log(cli,pro);
     
	if (etiqueta == 'query') {
		 
		$.ajax({
			//url : "http://localhost/clientes",
			//poner if por cada etiqueta
			url : "buscarcliente",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}
	if (etiqueta == 'producto') {
		$.ajax({
			url : "producto",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}
	if (etiqueta == 'empleado') {
		$.ajax({
			url : "buscarempleado",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}
	if (etiqueta == 'provedor') {
		
		$.ajax({
			url : "buscarprovedor",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}

	if (etiqueta == 'personal') {
		
		$.ajax({
			url : "personal",
			type : "GET",
			dataType : "html",
			data :{busqueda:busqueda,
				   cli:cli,
				   pro:pro},
			}).done(function(resultado){
			$("#datos").html(resultado);

		});
	}
		

}

$(document).on('keyup', ':input', function()
{

	var valor=$(this).val();
	var etiqueta = $(this).attr('id');
	var cli=$('.intro').is(':checked'); 
	var pro=$('.ortni').is(':checked');

	
	if (valor!="")
	{
		obtener_registros(valor,etiqueta,cli,pro);
	}
	else
		{
			obtener_registros(' ',etiqueta,cli,pro);
			
		}
});


// .change(function () {
// 	var etiqueta = $(this).attr('id');
//     var cli=$('.intro').is(':checked'); 
// 	var pro=$('.ortni').is(':checked');
//     obtener_registros(' ',etiqueta,cli,pro);
//   })
//   .change()