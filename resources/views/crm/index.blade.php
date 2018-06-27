@extends('layouts.blank')
@section('content')

                    @if ($crms->count()==0)
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="alert alert-warning">
                        <strong> No hay C.R.M.'s Registrados con ese Rango de Fechas.</strong>
                    </div>
                </div>
                <div class="col">
                    <div class="alert alert-info">
                        <strong> O bien No hay C.R.M.'s Registrados Aún.</strong>
                   </div>
                </div>
                <div class="col-sm-4 col-sm-offset-5">
                    <a  href="{{route('crm.index')}}" class="btn btn-warning">
                        <strong> Regresar</strong>
                   </a>
                </div>
            </div>
        </div>
					@endif
					@if ($crms->count()!=0)

                    <div class="panel-default">
                        <div class="panel-heading" style="background-color: lightgray !important;">
                            <div class="row">
                                <br>
                                <div class="col-sm-6 col-md-offset-2">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        Desde
                                        </div>
                                        <div class="col-sm-1">
                                        
                                        </div>
                                        <div class="col-sm-4">
                                        Hasta
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="fechaD" type="date" form="filtrado" class="form-control" id="fechafrom" required>
                                        </div>
                                        <div class="col-sm-1">
                                            <strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                                        </div>
                                        <div class="col-sm-4">
                                            <input name="fechaH" type="date" form="filtrado" class="form-control" id="fechato" required disabled>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-sm-4 ">
                                    <br>
                                    <form role="form" id="filtrado" method="GET" action="{{ route('fecha')}}" name="form">
                                    {{ csrf_field()}}
                                    
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal-crm">Crear</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                                    







<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header" style="background-color:#660066;color: white;  ">
<button type="button" class="badge" data-dismiss="modal">&times;cerrar</button>
<h4 class="modal-title">Modal Header</h4>
</div>
<div class="modal-body">
<form role="form" id="enviadordecrm" method="POST" action="{{ route('crmstore')}}">{{ csrf_field() }}</form>
                                <div class="col-sm-12">
                                <input type="hidden" name=id_cliente"" id="id_cliente" form="enviadordecrm" class="form-control" disabled>
                                    <div class="form-group col-sm-4">
                                        <label for="nombre" class="control-label">Nombre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="text" name=nombre"" id="nombre" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="ap" class="control-label">Apellido paterno:</label>
                                        <input type="text" name="ap" id="ap" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="am" class="control-label">Apellido materno:</label>
                                        <input type="text" name="am" id="am" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tipo_cont" class="control-label">Forma de contacto:</label><br>
                                        <select type="select" name="tipo_cont" form="enviadordecrm" id="tipo_cont" class="form-control" disabled>
                                            <option id="Mail" value="Mail">Email/Correo Electronico</option>
                                            <option id="Telefono" value="Telefono">Telefono</option>
                                            <option id="Cita" value="Cita">Cita</option>
                                            <option id="Whatsapp" value="Whatsapp">Whatsapp</option>
                                            <option id="Otro" value="Otro" selected="selected">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="status" class="control-label">Estado:</label><br>
                                        <select type="select" name="status" form="enviadordecrm" id="status" class="form-control" disabled>
                                            <option id="Pendiente" value="Pendiente">Pendiente</option>
                                            <option id="Cotizando" value="Cotizando">En Cotización</option>
                                            <option id="Cancelado" value="Cancelado">Cancelado</option>
                                            <option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
                                            <option id="Espera" value="Espera">En espera</option>
                                            <option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
                                            <option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
                                            <option id="Entrega" value="Entrega">Para entrega</option>
                                            <option id="Otro" value="Otro" selected="selected">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="correo" class="control-label">Correo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="email" name="correo" id="correo" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="telefono" class="control-label">Teléfono:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="number" name="telefono" id="telefono" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="celular" class="control-label">Celular:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="number" name="celular" id="celular" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_cont" class="control-label">Fecha Contacto:</label>
                                        <input type="date" name="fecha_cont" id="fecha_cont" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_aviso" class="control-label">Fecha aviso:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="date" name=fecha_aviso"" id="fecha_aviso" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="hora" class="control-label">Hora:</label><br>
                                        <input type="text" name=hora"" id="hora" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-12 offset-md-2 mt-3">
                                        <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                            <label for="acuerdos" class="control-label">Acuerdos: </label>
                                            <textarea rows="5" id="acuerdos" name="acuerdos" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                            <label for="comentarios" class="control-label">Comentarios: </label>
                                            <textarea rows="5" id="comentarios" name="comentarios" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                            <label for="observaciones" class="control-label">Observaciones:</label>
                                            <textarea rows="5" id="observaciones" name="observaciones" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                        </div>
                                        <input type="hidden" id="cliente_id" name="cliente_id">
                                    </div>
                                    
                                </div>
</div>
<div class="modal-footer">
<div class="row">
    <div class="col-sm-6 col-md-offset-3">
        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cerrar</button>
        
    </div>
    
    
</div>
</div>
</div>
</div>
</div>























                                    
                                    </form >
                                </div>
                                

                                
                            </div>  
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- <div class="col-md-10 col-sm-offset-1"> -->
                                    <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse;margin-bottom: 0px">
                                        <thead>
                                            <tr class="info">
                                                <th>Fecha contacto</th>
                                                <th>Fecha aviso</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                                <th>Forma de contacto</th>
                                                <th>Comentarios</th>
                                                <th>Acuerdos</th>
                                                <th>Observaciones</th>
                                                
                                            </tr>
                                        </thead>

                                        @foreach($crms as $crm)
                                            {{-- expr --}}
                                            <tr title="Has Click Aquì para ver o modificar"
                                            style="cursor: pointer" data-toggle="modal" data-target="#myModal" class="active tupla">
                                            
                                                <td>{{$crm->fecha_cont}}</td>
                                                <td>{{$crm->fecha_aviso}}</td>
                                                <td>{{$crm->hora}}</td>
                                                <td>{{$crm->status}}</td>
                                                <td>{{$crm->tipo_cont}}</td>
                                                <td>{{substr($crm->comentarios,0,50)}}...</td>
                                                <td>{{substr($crm->acuerdos,0,50)}}...</td>
                                                <td>{{substr($crm->observaciones,0,50)}}...</td>
                                                
                                                
                                                <input type="hidden" name="id_cliente" value="{{$crm->clientes->id}}">
                                                <input type="hidden" name="nombre" value="{{$crm->clientes->nombre}}">
                                                <input type="hidden" name="ap" value="{{$crm->clientes->apellidopaterno}}">
                                                <input type="hidden" name="am" value="{{$crm->clientes->apellidomaterno}}">
                                                <input type="hidden" name="correo" value="{{$crm->clientes->mail}}">
                                                <input type="hidden" name="telefono" value="{{$crm->clientes->telefono}}">
                                                <input type="hidden" name="celular" value="{{$crm->clientes->telefonocel}}">

                                                <input type="hidden" name="fecha_cont" value="{{$crm->fecha_cont}}">
                                                <input type="hidden" name="fecha_aviso" value="{{$crm->fecha_aviso}}">
                                                <input type="hidden" name="hora" value="{{$crm->hora}}">
                                                <input type="hidden" name="status" value="{{$crm->status}}">
                                                <input type="hidden" name="tipo_cont" value="{{$crm->tipo_cont}}">
                                                <input type="hidden" name="comentarios" value="{{substr($crm->comentarios,0,50)}}...">
                                                <input type="hidden" name="acuerdos" value="{{substr($crm->acuerdos,0,50)}}...">
                                                <input type="hidden" name="observaciones" value="{{substr($crm->observaciones,0,50)}}...">

                                                






                                            </tr>
                                        @endforeach
                                    </table>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                        




{{-- Modal Nuevo CRM --}}
<div class="modal fade" id="Modal-crm" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header" style="background-color:#ff9900;color: white;  ">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><strong></strong></h4>
    </div>
<div class="modal-body">
<form role="form" id="enviadordecrm" method="POST" action="{{ route('crmstore')}}">{{ csrf_field() }}</form>
                                <div class="col-sm-12">
                                <input type="hidden" name=id_cliente"" id="id_cliente" form="enviadordecrm" class="form-control" disabled>
                                    <div class="form-group col-sm-4">
                                        <label for="nombre" class="control-label">Nombre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="text" name=nombre"" id="nombre" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="ap" class="control-label">Apellido paterno:</label>
                                        <input type="text" name="ap" id="ap" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="am" class="control-label">Apellido materno:</label>
                                        <input type="text" name="am" id="am" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="tipo_cont" class="control-label">Forma de contacto:</label><br>
                                        <select type="select" name="tipo_cont" form="enviadordecrm" id="tipo_cont" class="form-control" disabled>
                                            <option id="Mail" value="Mail">Email/Correo Electronico</option>
                                            <option id="Telefono" value="Telefono">Telefono</option>
                                            <option id="Cita" value="Cita">Cita</option>
                                            <option id="Whatsapp" value="Whatsapp">Whatsapp</option>
                                            <option id="Otro" value="Otro" selected="selected">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="status" class="control-label">Estado:</label><br>
                                        <select type="select" name="status" form="enviadordecrm" id="status" class="form-control" disabled>
                                            <option id="Pendiente" value="Pendiente">Pendiente</option>
                                            <option id="Cotizando" value="Cotizando">En Cotización</option>
                                            <option id="Cancelado" value="Cancelado">Cancelado</option>
                                            <option id="Toma_decision" value="Toma_decision">Tomando decisión</option>
                                            <option id="Espera" value="Espera">En espera</option>
                                            <option id="Revisa_doc" value="Revisa_doc">Revisando documento</option>
                                            <option id="Proceso_aceptar" value="Proceso_aceptar">Proceso de Aceptación</option>
                                            <option id="Entrega" value="Entrega">Para entrega</option>
                                            <option id="Otro" value="Otro" selected="selected">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="correo" class="control-label">Correo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="email" name="correo" id="correo" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="telefono" class="control-label">Teléfono:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="number" name="telefono" id="telefono" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="celular" class="control-label">Celular:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="number" name="celular" id="celular" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_cont" class="control-label">Fecha Contacto:</label>
                                        <input type="date" name="fecha_cont" id="fecha_cont" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_aviso" class="control-label">Fecha aviso:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="date" name=fecha_aviso"" id="fecha_aviso" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="hora" class="control-label">Hora:</label><br>
                                        <input type="text" name=hora"" id="hora" form="enviadordecrm" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-12 offset-md-2 mt-3">
                                        <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                            <label for="acuerdos" class="control-label">Acuerdos: </label>
                                            <textarea rows="5" id="acuerdos" name="acuerdos" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                            <label for="comentarios" class="control-label">Comentarios: </label>
                                            <textarea rows="5" id="comentarios" name="comentarios" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                            <label for="observaciones" class="control-label">Observaciones:</label>
                                            <textarea rows="5" id="observaciones" name="observaciones" maxlength="500" class="form-control" form="enviadordecrm" disabled></textarea>
                                        </div>
                                        <input type="hidden" id="cliente_id" name="cliente_id">
                                    </div>
                                    
                                </div>
</div>
<div class="modal-footer">
<div class="row">
    <div class="col-sm-6 col-md-offset-3">
        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Cerrar</button>
        
    </div>
    
    
</div>
</div>
</div>
</div>
</div>
{{-- Modal NUevo CRM --}}




                        
                    <script>
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
                        });

                            $('#fechafrom').change(function(){
                                
                            var aviso = $('#fechafrom').val();
                            $('#fechato').attr("min",aviso);
                                                
                            $('#fechato').prop('disabled',false);
                                 });
                    });
                       
                    </script>
                            




						
					@endif	

@endsection