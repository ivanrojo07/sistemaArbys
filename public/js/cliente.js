
		function sub(){
			a=document.getElementById("ingresos").value;
			b=document.getElementById("canalventa").value;
			b=b.toUpperCase(b);
			a=a.toUpperCase(a);
			document.getElementById("id_auto").value=a;
			
		}
//----------------------------------------------------------------
	$(document).ready(function(){

    $("input").keyup(function(){
    	
    	var pat=document.getElementById("apellidopaterno").value;
    	var mat=document.getElementById("apellidomaterno").value;
    	var nom=document.getElementById("idnombre").value;
    	var fecha=document.getElementById("fecha_nacimiento").value;

    	var año=fecha.slice(2,4);
    	var mes=fecha.slice(5,7);
    	var dia=fecha.slice(8,10);

    	var plp=pat.slice(0,1);
    	var plm=mat.slice(0,1); if(plm==''){plm='X'}
    	var pln=nom.slice(0,1);

    	
    	var low=pat.toLowerCase();
    	
		var a=low.search('a');
		var e=low.search('e');
		var i=low.search('i');
		var o=low.search('o');
		var u=low.search('u');

		var array=[a,e,i,o,u];
		var int=10;
		var voc='';
		var array_voc=['a','e','i','o','u'];

		for(i = 0; i < array.length; i++){

			

			if (array[i]!=-1 && array[i]!=0 && array[i]<int){

				int=array[i];
				
				voc=array_voc[i];
			}
			
		}
		
    	//alert(voc);
    	var rfc=plp+voc+plm+pln+año+mes+dia;
    	document.getElementById("rfc").value=rfc.toUpperCase();
   		
    });
//-----------------------------------------
$("#fecha_nacimiento").change(function(){
    	
    	var pat=document.getElementById("apellidopaterno").value;
    	var mat=document.getElementById("apellidomaterno").value;
    	var nom=document.getElementById("idnombre").value;
    	var fecha=document.getElementById("fecha_nacimiento").value;

    	var año=fecha.slice(2,4);
    	var mes=fecha.slice(5,7);
    	var dia=fecha.slice(8,10);

    	var plp=pat.slice(0,1);
    	var plm=mat.slice(0,1); if(plm==''){plm='X'}
    	var pln=nom.slice(0,1);

    	
    	var low=pat.toLowerCase();
    	
		var a=low.search('a');
		var e=low.search('e');
		var i=low.search('i');
		var o=low.search('o');
		var u=low.search('u');

		var array=[a,e,i,o,u];
		var int=10;
		var voc='';
		var array_voc=['a','e','i','o','u'];

		for(i = 0; i < array.length; i++){

			

			if (array[i]!=-1 && array[i]!=0 && array[i]<int){

				int=array[i];
				
				voc=array_voc[i];
			}
			
		}
		
    	//alert(voc);
    	var rfc=plp+voc+plm+pln+año+mes+dia;
    	document.getElementById("rfc").value=rfc.toUpperCase();
   		
    });

//******************************************   
});
//--------------------------------------------------------------
function getCanales(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getcanales') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#canal_ventas").html(resultado);
			});
		}
//---------------------------------------------------------------