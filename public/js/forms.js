function formulario(elemento){
    if (elemento.value == "Prospecto") {
        document.getElementById('cliente').style.display='none';
        document.getElementById('cliente1').style.display='none';
        document.getElementById('cliente2').style.display='none';
        document.getElementById('clienteli1').style.display='none';
        document.getElementById('clienteli2').style.display='none';
        document.getElementById('clienteli3').style.display='none';
    }
    if (elemento.value == "Cliente") {
        document.getElementById('cliente').style.display='inline';
        document.getElementById('cliente1').style.display='inline';
        document.getElementById('cliente2').style.display='inline';
        document.getElementById('clienteli1').style.display='';
        document.getElementById('clienteli2').style.display='';
        document.getElementById('clienteli3').style.display='';
    }
}
function persona(elemento){
    if(elemento.value == "Fisica"){
        document.getElementById('perfisica').style.display='inline';
        document.getElementById('permoral').style.display='none';
    }
    if(elemento.value =="Moral"){
        document.getElementById('perfisica').style.display='none';
        document.getElementById('permoral').style.display='inline';
    }
}

// $(function() {
//    $("#tab").tabs();

// });

$(function(){
              $('.dropdown-submenu a.test').on("click", function(e){
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
              });
            });

$(function() {
   $("li").click(function() {
      // remove classes from all
      $("li").removeClass("active");
      // add class to the one we clicked
      $(this).addClass("active");
   });
});

$('li a').click(function(){
    $(this.getAttribute('class')).addClass("active");
    $('.pestana').hide();
    $(this.getAttribute('href')).show();
});
