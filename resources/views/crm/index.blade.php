@extends('layouts.blank')
@section('content')

                    @if ($crms->count()==0)
						<p>Aun no tienes C.R.M.'s</p>
					@endif
					@if (count($crms)!=0)

                    <div class="panel-default">
                        <div class="panel-heading" style="background-color: lightgray !important;">
                            <div class="row">
                                <br>
                                <div class="col-sm-4 col-md-offset-2">
                                    <div class="row">
                                        <div class="col-sm-5">
                                        Desde
                                        </div>
                                        <div class="col-sm-1">
                                        
                                        </div>
                                        <div class="col-sm-5">
                                        Hasta
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="fechaD" type="date" form="filtrado" class="form-control" id="fechafrom" required>
                                        </div>
                                        <div class="col-sm-1">
                                            <strong>a</strong>
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="fechaH" type="date" form="filtrado" class="form-control" id="fechato" required>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-sm-2 ">
                                    <br>
                                    <form role="form" id="filtrado" method="GET" action="{{ route('fecha')}}" name="form">
                                    {{ csrf_field()}}
                                    
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    </form >
                                </div>
                                

                                
                            </div>  
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse;margin-bottom: 0px">
                                        <thead>
                                            <tr class="info">
                                                <th>Fecha contacto</th>
                                                <th>Fecha aviso</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                                <th>Forma de contacto</th>
                                                <th>Acuerdos</th>
                                                <th>Observaciones</th>
                                                
                                            </tr>
                                        </thead>

                                        @foreach($crms as $crm)
                                            {{-- expr --}}
                                            <tr title="Has Click Aquì para ver o modificar"
                                            style="cursor: pointer" href="#{{$crm->id}}" class="active tupla">
                                            
                                                <td>{{$crm->fecha_cont}}</td>
                                                <td>{{$crm->fecha_aviso}}</td>
                                                <td>{{$crm->hora}}</td>
                                                <td>{{$crm->status}}</td>
                                                <td>{{$crm->tipo_cont}}</td>
                                                <td>{{substr($crm->acuerdos,0,50)}}...</td>
                                                <td>{{substr($crm->observaciones,0,50)}}...</td>
                                                
                                                <input type="hidden" name="nombre" value="{{$crm->clientes->nombre}}">
                                                <input type="hidden" name="ap" value="{{$crm->clientes->apellidopaterno}}">
                                                <input type="hidden" name="am" value="{{$crm->clientes->apellidomaterno}}">
                                                <input type="hidden" name="correo" value="{{$crm->clientes->mail}}">
                                                <input type="hidden" name="telefono" value="{{$crm->clientes->telefono}}">
                                                <input type="hidden" name="celular" value="{{$crm->clientes->telefonocel}}">
                                                <input type="hidden" name="fecha_cont" value="{{$crm->fecha_cont}}">
                                                <input type="hidden" name="fecha_aviso" value="{{$crm->fecha_aviso}}">






                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        

                    <div id="normal" class="panel-default">
                        <div class="panel-heading" style="background-color: lightgray !important;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>CRM Específico</h4>
                                </div>
                                <div class="col-md-4 col-md-offset-4">
                                    <br>
                                    <button id="limpiar" type="submit" class="btn btn-warning"><strong>Limpiar</strong></button>
                                    <button id="submit" type="submit" class="btn btn-success"><strong>Guardar</strong></button>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-8 col-md-offset-2">
                                    <div class="form-group col-sm-4">
                                        <label for="nombre" class="control-label">Nombre:</label>
                                        <dd id="nombre">---</dd>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="ap" class="control-label">Apellido paterno:</label>
                                        <dd id="ap">---</dd>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="am" class="control-label">Apellido materno:</label>
                                        <dd id="am">---</dd>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="correo" class="control-label">Correo:</label>
                                        <dd id="correo">---</dd>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="telefono" class="control-label">Teléfono:</label>
                                        <dd id="telefono">---</dd>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="celular" class="control-label">Celular:</label>
                                        <dd id="celular">---</dd>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_cont" class="control-label">Fecha actual:</label>
                                        <dd id="fecha_cont">---</dd>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_aviso" class="control-label">Fecha:</label>
                                        <dd id="fecha_aviso">---</dd>
                                    </div>
                                </div>
                            </div>
                                    
                        </div>
                    </div>




                    <div id="editor" class="panel-default" style="display:none;">
                        <div class="panel-heading" style="background-color: lightgray !important;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4>CRM Específico</h4>
                                </div>
                                <div class="col-md-4 col-md-offset-4">
                                    <br>
                                    <button id="submit" type="submit" class="btn btn-warning"><strong>Limpiar</strong></button>
                                    <button id="submit" type="submit" class="btn btn-success"><strong>Guardar</strong></button>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" >
                            <div class="row">
                                <div class="col-sm-8 col-md-offset-2">
                                    <div class="form-group col-sm-4">
                                        <label for="nombre" class="control-label">Nombre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="text" name=nombre"" id="nombre">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="ap" class="control-label">Apellido paterno:</label>
                                        <input type="text" name="ap" id="ap">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="am" class="control-label">Apellido materno:</label>
                                        <input type="text" name="am" id="am">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="correo" class="control-label">Correo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="email" name="correo" id="correo">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="telefono" class="control-label">Teléfono:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="number" name="telefono" id="telefono">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="celular" class="control-label">Celular:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="number" name="celular" id="celular">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_cont" class="control-label">Fecha actual:</label>
                                        <input type="date" name="fecha_cont" id="fecha_cont">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="fecha_aviso" class="control-label">Fecha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="date" name=fecha_aviso"" id="fecha_aviso">
                                    </div>
                                    <div class="col-md-12 offset-md-2 mt-3"><div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12"><label for="acuerdos" class="control-label">Acuerdos: </label> <textarea rows="5" id="acuerdos" name="acuerdos" maxlength="500" class="form-control"></textarea></div> <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12"><label for="comentarios" class="control-label">Comentarios: </label> <textarea rows="5" id="comentarios" name="comentarios" maxlength="500" class="form-control"></textarea></div> <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12"><label for="observaciones" class="control-label">Observaciones: </label> <textarea rows="5" id="observaciones" name="observaciones" maxlength="500" class="form-control"></textarea></div></div>
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-success btn-block">Crear</button>
                                    </div>
                                </div>
                            </div> 
                        </div>




                       

                    </div>


<br>
                       <br>
                       <br>
                       <br>
                       <br>
                       <br>
                       <br>
                       <br>
                       <br>


                        
                    <script>
                    $(document).ready(function(){
                        $('tr.tupla').click(function(){

                          var a = $(this).children("td").toArray();
                            
                            var b = 0;

                            a.forEach(function(e){
                                a[b++] = e.innerHTML;
                                //alert(a[b-1]);
                            });
                               // alert($(this).find( "input[name$='fecha_cont']").val());

                            $('#nombre').text($(this).find( "input[name$='nombre']").val());
                            $('#ap').text($(this).find( "input[name$='ap']").val());
                            $('#am').text($(this).find( "input[name$='am']").val());
                            $('#correo').text($(this).find( "input[name$='correo']").val());
                            $('#telefono').text($(this).find( "input[name$='telefono']").val());
                            $('#celular').text($(this).find( "input[name$='celular']").val());
                            $('#fecha_cont').text($(this).find( "input[name$='fecha_cont']").val());
                            $('#fecha_aviso').text($(this).find( "input[name$='fecha_aviso']").val());
                            
                            
                        });

                        $('#limpiar').click(function(){

                            $('#editor').show();
                            $('#normal').hide();
                        });
                    });
                       
                    </script>
                            




						
					@endif	

@endsection