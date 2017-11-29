$(function limpiarBusqueda(){
    console.log('limpiar');
});
function formulario(elemento){
    if (elemento.value == "Prospecto") {
        document.getElementById('cliente').style.display='none';
        document.getElementById('cliente1').style.display='none';
        document.getElementById('cliente2').style.display='none';
        document.getElementById('clienteli1').style.display='none';
        document.getElementById('clienteli2').style.display='none';
        document.getElementById('clienteli3').style.display='none';
        document.getElementById('calle').required=false;
        document.getElementById('numext').required=false;
        document.getElementById('cp').required=true;
        document.getElementById('colonia').required=false;
        document.getElementById('municipio').required=false;
        document.getElementById('ciudad').required=false;
        document.getElementById('estado').required=false;
    }
    if (elemento.value == "Cliente") {
        document.getElementById('cliente').style.display='inline';
        document.getElementById('cliente1').style.display='inline';
        document.getElementById('cliente2').style.display='inline';
        document.getElementById('clienteli1').style.display='';
        document.getElementById('clienteli2').style.display='';
        document.getElementById('clienteli3').style.display='';
        document.getElementById('calle').required=true;
        document.getElementById('numext').required=true;
        document.getElementById('cp').required=false;
        document.getElementById('colonia').required=true;
        document.getElementById('municipio').required=true;
        document.getElementById('ciudad').required=true;
        document.getElementById('estado').required=true;
        document.getElementById('lbl_numext').value='*numero exterior';
    }
}
function persona(elemento){
            if(elemento.value == "Fisica"){
                document.getElementById('perfisica').style.display='inline';
                document.getElementById('permoral').style.display='none';
                document.getElementById('varrfc').pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}";
                document.getElementById('varrfc').placeholder="Ingrese 13 caracteres";
                document.getElementById('varrfc').title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres";
                document.getElementById('razonsocial').required=false;
                document.getElementById('idnombre').required=true;
                document.getElementById('apellidopaterno').required=true;
            }
            if(elemento.value =="Moral"){
                document.getElementById('perfisica').style.display='none';
                document.getElementById('permoral').style.display='inline';
                document.getElementById('varrfc').pattern="^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}";
                document.getElementById('varrfc').placeholder="Ingrese 12 caracteres";
                document.getElementById('varrfc').title="Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres";
                document.getElementById('razonsocial').required=true;
                document.getElementById('idnombre').required=false;
                document.getElementById('apellidopaterno').required=false;
            }
        }

$("#tipopersona").change(function (){
  tipopersona = $('#tipopersona').val();
    if(tipopersona == "Fisica"){
        document.getElementById('perfisica').style.display='inline';
        document.getElementById('permoral').style.display='none';
        document.getElementById('varrfc').pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}";
        document.getElementById('varrfc').placeholder="Ingrese 13 caracteres";
        document.getElementById('varrfc').title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres";
        document.getElementById('razonsocial').required=false;
        document.getElementById('idnombre').required=true;
        document.getElementById('apellidopaterno').required=true;
    }
    if(tipopersona =="Moral"){
        document.getElementById('perfisica').style.display='none';
        document.getElementById('permoral').style.display='inline';
        document.getElementById('varrfc').pattern="^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}";
        document.getElementById('varrfc').placeholder="Ingrese 12 caracteres";
        document.getElementById('varrfc').title="Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres";
        document.getElementById('razonsocial').required=true;
        document.getElementById('idnombre').required=false;
        document.getElementById('apellidopaterno').required=false;
    }
});
$("#tipo").change(function (){
    tipo = $('#tipo').val();
    if (tipo == "Prospecto") {
        document.getElementById('cliente').style.display='none';
        document.getElementById('cliente1').style.display='none';
        document.getElementById('cliente2').style.display='none';
        document.getElementById('clienteli1').style.display='none';
        document.getElementById('clienteli2').style.display='none';
        document.getElementById('clienteli3').style.display='none';
        document.getElementById('calle').required=false;
        document.getElementById('numext').required=false;
        document.getElementById('cp').required=true;
        document.getElementById('colonia').required=false;
        document.getElementById('municipio').required=false;
        document.getElementById('ciudad').required=false;
        document.getElementById('estado').required=false;
        $('#lbl_numext').text('Número Exterior:');
        $('#lbl_calle').text('Calle:');
        $('#lbl_cp').text('* Código Postal:');
        $('#lbl_colonia').text('Colonia:');
        $('#lbl_municipio').text('Municipio/Delegación:');
        $('#lbl_ciudad').text('Ciudad:');
        $('#lbl_estado').text('Estado:');


    }
    if (tipo == "Cliente") {
        document.getElementById('cliente').style.display='inline';
        document.getElementById('cliente1').style.display='inline';
        document.getElementById('cliente2').style.display='inline';
        document.getElementById('clienteli1').style.display='';
        document.getElementById('clienteli2').style.display='';
        document.getElementById('clienteli3').style.display='';
        document.getElementById('calle').required=true;
        document.getElementById('numext').required=true;
        document.getElementById('cp').required=false;
        document.getElementById('colonia').required=true;
        document.getElementById('municipio').required=true;
        document.getElementById('ciudad').required=true;
        document.getElementById('estado').required=true;
        $('#lbl_numext').text('* Número Exterior:');
        $('#lbl_calle').text('* Calle:');
        $('#lbl_cp').text('Código Postal:');
        $('#lbl_colonia').text('* Colonia:');
        $('#lbl_municipio').text('* Municipio/Delegación:');
        $('#lbl_ciudad').text('* Ciudad:');
        $('#lbl_estado').text('* Estado:');
    }
});
// $(function() {
//   $("li").click(function() {
//   // remove classes from all
//   $("li").removeClass("active");
//   // add class to the one we clicked
//   $(this).addClass("active");
//  });
// });
  
$('li a').click(function(){
  $(this.getAttribute('class')).addClass("active");
  $('.pestana').hide();
  $(this.getAttribute('href')).show();
}); 
$(function(){
              $('.dropdown-submenu a.test').on("click", function(e){
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
              });
            });

// $(function() {
//    $("div.panel div ul li").click(function() {
//       // remove classes from all
//       $("li").removeClass("active");
//       // add class to the one we clicked
//       $(this).addClass("active");
//    });
// });