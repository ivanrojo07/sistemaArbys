function append(e,f,g){
 

$("#seleccionados").append(
"<ol class='breadcrumb alert alert-success' id='"+g+"'>"+
  "<li class='breadcrumb-item'>"+
    "<a href='#' data-toggle='tooltip' data-placement='top' title='Tooltip on top'>"+
        e+
    "</a>"+
   "</li>"+
   "<li class='breadcrumb-item'>"+
     "<a href='#'>"+
       f+
     "</a>"+
    "</li>"+
    "<li class='breadcrumb-item active' aria-current='page'>"+
      "<span class='label label-danger btn' onclick='quitar("+g+")'>Quitar</span>"+
      "</li>"+
 "</ol>");

$("span.label-success").hide();
    
    $("#product_id").prop('value',g);
}

function quitar(g){
	$('#'+g.toString()).remove();
	$("span.label-success").show();
	$("#product_id").prop('value','0');
}

$(document).ready(function(){

    $("#forma_pago").change(function(){
     
      var options=$("#forma_pago").val();

      switch(options) {

          case "Efectivo":
              $("#cheque,#tarjeta,#thabiente,#deposito").hide();
              $("#numero_cheque,#numero_deposito,#numero_tarjeta,#nombre_tarjetaHabiente").prop('required',false);
              break;

          case "Cheque":
              $("#cheque").show();
              $("#tarjeta,#thabiente,#deposito").hide();
              $("#numero_deposito,#numero_tarjeta,#nombre_tarjetaHabiente").prop('required',false);
              $("#numero_cheque").prop('required',true);
              break;

          case "Tarjeta de Crédito":
              $("#tarjeta,#thabiente").show();
              $("#cheque,#deposito").hide();
              $("#numero_cheque,#numero_deposito").prop('required',false);
              $("#numero_tarjeta,#nombre_tarjetaHabiente").prop('required',true);
              break;

          case "Tarjeta de Débito":
              $("#tarjeta,#thabiente").show();
              $("#cheque,#deposito").hide();
              $("#numero_cheque,#numero_deposito").prop('required',false);
              $("#numero_tarjeta,#nombre_tarjetaHabiente").prop('required',true);
              break;

          case "Depósito":
             $("#deposito").show();
             $("#cheque,#tarjeta,#thabiente").hide();
             $("#numero_cheque,#numero_tarjeta,#nombre_tarjetaHabiente").prop('required',false);
             $("#numero_deposito").prop('required',true);
              break;

          default:
             $("#cheque,#tarjeta,#thabiente,#deposito").hide();
             $("#numero_cheque,#numero_deposito,#numero_tarjeta,#nombre_tarjetaHabiente").prop('required',false);
            }
      
    });

});



function check(){

      

          if($("#product_id").prop('value')=='0'){

        alert('Debe seleccionar un <Producto a Pagar> para poder Registar el Pago');
        
        
          }else{
             
            
           }
}