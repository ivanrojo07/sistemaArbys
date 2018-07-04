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

}

function quitar(g){
	$('#'+g.toString()).remove();
	$("span.label-success").show();
	
}