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

   $("#status").prop('value','Guardado');   

          if($("#product_id").prop('value')=='0'){
 
            verificado();
       
        }else{
             }
}
//-------------------------------------------------------------------
function alertD() {

          $("#status").prop('value','Aprobado');
        if($("#product_id").prop('value')=='0'){
       
                  verificado();
             
              }else{
                   
                    //var form = event.target.form; // storing the form
      swal({
        title: "¿Estas seguro de generar un Solicitante?",
        text: "Favor de verificar la información.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "SI",
        cancelButtonText: "¡NO!",
        closeOnConfirm: false,
        closeOnCancel: false
      },function(isConfirm){
        if (!isConfirm) {
          
          swal("Cancelado", "", "error");

        } else {
          
          
                   
              }
      });
                 }
}
//-----------------------------------------------------------------------------
function verificado() {


swal({
  title: "Debe elegir un prodcuto a Pagar",
  text: "Favor de verificar toda la información.",
  type: "warning",
  
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "OK",
  //cancelButtonText: "¡NO!",
  closeOnConfirm: true
  //closeOnCancel: false
},function(isConfirm){
  

});
}
//------------------------------------------------------------------------------------
function checkDos(){

    if($("#product_id").prop('value')=='0'){
 
            verificado();
       
        }else{
                  alertD();
             }
}
//------------------------------------------------------------------------------------
function checkTres(){

  $("#status").prop('value','No Aprobado');
  if($("#product_id").prop('value')=='0'){
 
            verificado();
       
        }else{
             
              var form = event.target.form; // storing the form
swal({
  title: "¿Estas seguro de Rechazar el Pago?",
  text: "Favor de verificar la información.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "SI",
  cancelButtonText: "¡NO!",
  closeOnConfirm: false,
  closeOnCancel: false
},function(isConfirm){
  if (!isConfirm) {
    
    swal("Cancelado", "", "error");

  } else {
    
    
             
        }
});
           }

}