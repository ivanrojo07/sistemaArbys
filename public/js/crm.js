$(document).ready(function(){
                        $('tr.tupla').click(function(){
                          var a = $(this).children("td").toArray();
                            
                            var b = 0;

                            a.forEach(function(e){
                                a[b++] = e.innerHTML;
                                //alert(a[b-1]);
                            });
                                //alert($(this).find( "input[name$='nombre']").val());

                            $('#id_cliente').val($(this).find( "input[name$='id_cliente']").val());
                            $('#nombre').val($(this).find( "input[name$='nombre']").val());
                            $('#ap').val($(this).find( "input[name$='ap']").val());
                            $('#am').val($(this).find( "input[name$='am']").val());
                            $('#correo').val($(this).find( "input[name$='correo']").val());
                            $('#telefono').val($(this).find( "input[name$='telefono']").val());
                            $('#celular').val($(this).find( "input[name$='celular']").val());
                            $('#fecha_cont').val($(this).find( "input[name$='fecha_cont']").val());
                            $('#fecha_aviso').val($(this).find( "input[name$='fecha_aviso']").val());
                            $('#hora').val($(this).find( "input[name$='hora']").val());
                            $('#tipo_cont').val($(this).find( "input[name$='tipo_cont']").val());
                            $('#status').val($(this).find( "input[name$='status']").val());
                            $('#acuerdos').val($(this).find( "input[name$='acuerdos']").val());
                            $('#comentarios').val($(this).find( "input[name$='comentarios']").val());
                            $('#observaciones').val($(this).find( "input[name$='observaciones']").val());
                            $('#vinculo').attr('href',"{{ route('clientes.show',['id'=>"+$(this).find( "input[name$='id_cliente']").val()+"]) }}");
                        });

                            $('#fechafrom').change(function(){
                                
                            var aviso = $('#fechafrom').val();
                            $('#fechato').val('');
                            $('#fechato').attr("min",aviso);
                             $('#fechato').prop('disabled',false);

                                 });
//-------------------------------------------------------------------------------------
	$('#fecha_uno').change(function(){
                    
                    var aviso = $('#fecha_uno').val();
                    $('#fecha_dos').attr("min",aviso);
                                        
                    $('#fecha_dos').prop('disabled',false);
                });
//-------------------------------------------------------------------------------------
});
                       