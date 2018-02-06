@extends('layouts.infoempleado')
@section('infoempleado')

	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class=""><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>

			<li role="presentation" class="active"><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
		</ul>
	</div>


	@if (count($datoslab) == 0)
			<h3>Aún no tienes historial laboral</h3>
		@endif
		@if (count($datoslab) !=0)
            
			
<div class="panel panel-default">
      <div class="panel-heading" align="center"><strong>Datos Laborales Actuales</strong></div>
      <div class="panel-body" >

      	<div class="col-md-12 offset-md-2 mt-3"> 

				<div class="form-group col-xs-3">
					<label class="control-label" for="fechacontratacion">Fecha de contratación:</label>
					
					<dd><strong> {{ $datoslab->fechacontratacion }}</strong></dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="contrato">Tipo de contrato:</label>
					@if($contrato==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $contrato->nombre }}</dd>
					@endif
				</div>

                <div class="form-group col-xs-3">
					<label class="control-label" for="area">Área:</label>
					@if($area==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $area->nombre }}</dd>
					@endif
					
				</div>
				
				<div class="form-group col-xs-3">
					<label class="control-label" for="puesto">Puesto:</label>
					@if($puesto==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $puesto->nombre }}</dd>
					@endif
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="sucursal">Sucursal:</label>
					@if($sucursal==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $sucursal->nombre }}</dd>
					@endif
				</div>
				
				<div class="form-group col-xs-3">
					<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
					<dd>{{ $datoslab->lugartrabajo }}</dd>
				</div>
				



			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="salarionom">Salario Nóminal:</label>
					<dd>{{ $datoslab->salarionom }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="salariodia">Salario Diario:</label>
					<dd>{{ $datoslab->salariodia }}</dd>
				</div>

				

				<div class="form-group col-xs-3">
					<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
					<dd>{{ $datoslab->periodopaga }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="prestaciones">Prestaciones:</label>
					<dd>{{ $datoslab->prestaciones }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="regimen">Régimen de Contratación:</label>
					<dd>{{ $datoslab->regimen }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hentrada">Hora de Entrada:</label>
					<dd>{{ $datoslab->hentrada }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hsalida">Hora de Salida:</label>
					<dd>{{ $datoslab->hsalida }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="hcomida">Tiempo de Comida:</label>
					<dd>{{ $datoslab->hcomida }}</dd>
				</div>
				
				<div class="form-group col-xs-3">
					<label class="control-label" for="banco">Banco:</label>
					
					@if($datoslab->banco==null)
					<dd>NO DEFINIDO</dd>
					@else
					<dd>{{ $datoslab->banco }}</dd>
					@endif
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="cuenta">Cuenta:</label>
					<dd>{{ $datoslab->cuenta }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="clabe">CLABE:</label>
					<dd>{{ $datoslab->clabe }}</dd>
				</div>
			</div>


        <div align="right">
      	<a class="btn btn-success btn-md" href="{{ route('empleados.datoslaborales.edit',['empleado'=>$empleado,'actual'=>$datoslab]) }}">
				<strong>Agregar</strong>
			</a></div>

      </div>
    </div>

<div class="well well-sm" align="center"><strong>Historial Laboral</strong></div>
    <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>
					<tr class="info">
						<th>Área</th>
						<th>Puesto</th>
						<th>Sucursal</th>
						
						<th>Salario Nominal</th>
						<th>Tipo de Contrato</th>
						<th>Fecha de Actualización</th>
					</tr>
				</thead>
                <tbody>
				@foreach ($datoslaborales as $dato)
					<tr  class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					data-toggle="modal" 
					data-target="#{{$dato->id}}">

 					@if($dato->area_id==null)
						<td>NO DEFINIDO</td>
						@else
						 <?php $a='';?>
							@foreach($areas as $area)
								@if($dato->area_id==$area->id)
								<?php $a=$area->nombre; ?>
								<td>{{$a}}</td>
								@endif
							@endforeach
						@endif


						@if($dato->puesto_id==null)
						<td>NO DEFINIDO</td>
						@else
						 <?php $p='';?>
							@foreach($puestos as $puesto)
								@if($dato->puesto_id==$puesto->id)
								<?php $p=$puesto->nombre; ?>
								<td>{{$p}}</td>
								@endif
							@endforeach
						@endif


 						@if($dato->sucursal_id==null)
						<td>NO DEFINIDO</td>
						@else
						 <?php $s='';?>
							@foreach($sucursales as $sucursal)
								@if($dato->sucursal_id==$sucursal->id)
								<?php $s=$sucursal->nombre; ?>
								<td>{{$s}}</td>
								@endif
							@endforeach
						@endif

						

						<td>{{$dato->salarionom}}</td>
						


							@if($dato->contrato_id==null)
						<td>NO DEFINIDO</td>
						@else
						 <?php $c='';?>
							@foreach($contratos as $contrato)
								@if($dato->contrato_id==$contrato->id)
								<?php $c=$contrato->nombre; ?>
								<td>{{$c}}</td>
								@endif
							@endforeach
						@endif

						<td>{{$dato->fechaactualizacion}}</td>  
						</tr>

					</tbody>
					{{-- MODAL --}}
					<div class="modal fade" id="{{$dato->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Detalles de Datos Laborales</strong>
								        </h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								        </button>
								      </div>


								      <div class="modal-body">
								        <div class="panel-default">
								        	<div class="panel-heading"><h5><strong>Fecha de Contratación:&nbsp;&nbsp;&nbsp;&nbsp;{{$dato->fechacontratacion}} </strong></h5></div>
								        	<div class="panel-body">

								        	<div class="col-md-12 offset-md-2 mt-3"> 
			<div class="form-group col-xs-3">
					<label class="control-label" for="fechaactualizacion">Fecha de Actualización:</label>
					
					<dd><strong> {{ $dato->fechaactualizacion }}</strong></dd>
				</div>
				
				<div class="form-group col-xs-3">
					<label class="control-label" for="contrato">Tipo de contrato:</label>

					@if($dato->contrato_id==null)
						<dd>NO DEFINIDO</dd>
						@else
						 <?php $c='';?>
							@foreach($contratos as $contrato)
								@if($dato->contrato_id==$contrato->id)
								<?php $c=$contrato->nombre; ?>
								<dd>{{$c}}</dd>
								@endif
							@endforeach
						@endif

				</div>

                <div class="form-group col-xs-3">
					<label class="control-label" for="area">Área:</label>

					@if($dato->area_id==null)
						<dd>NO DEFINIDO</dd>
						@else
						 <?php $a='';?>
							@foreach($areas as $area)
								@if($dato->area_id==$area->id)
								<?php $a=$area->nombre; ?>
								<dd>{{$a}}</dd>
								@endif
							@endforeach
						@endif
					
				</div>
				
				<div class="form-group col-xs-3">
					<label class="control-label" for="puesto">Puesto:</label>

					@if($dato->puesto_id==null)
						<dd>NO DEFINIDO</dd>
						@else
						 <?php $p='';?>
							@foreach($puestos as $puesto)
								@if($dato->puesto_id==$puesto->id)
								<?php $p=$puesto->nombre; ?>
								<dd>{{$p}}</dd>
								@endif
							@endforeach
						@endif

				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="sucursal">Sucursal:</label>

					@if($dato->sucursal_id==null)
						<dd>NO DEFINIDO</dd>
						@else
						 <?php $s='';?>
							@foreach($sucursales as $sucursal)
								@if($dato->sucursal_id==$sucursal->id)
								<?php $s=$sucursal->nombre; ?>
								<dd>{{$s}}</dd>
								@endif
							@endforeach
						@endif

				</div>
			
				



			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="salarionom">Salario Nóminal:</label>
					<dd>{{ $dato->salarionom }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="salariodia">Salario Diario:</label>
					<dd>{{ $dato->salariodia }}</dd>
				</div>

				

				<div class="form-group col-xs-3">
					<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
					<dd>{{ $dato->periodopaga }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="prestaciones">Prestaciones:</label>
					<dd>{{ $dato->prestaciones }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="regimen">Régimen de Contratación:</label>
					<dd>{{ $dato->regimen }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hentrada">Hora de Entrada:</label>
					<dd>{{ $dato->hentrada }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hsalida">Hora de Salida:</label>
					<dd>{{ $dato->hsalida }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="hcomida">Tiempo de Comida:</label>
					<dd>{{ $dato->hcomida }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
					<dd>{{ $dato->lugartrabajo }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="banco">Banco:</label>
					<dd>{{ $dato->banco }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="cuenta">Cuenta:</label>
					<dd>{{ $dato->cuenta }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="clabe">CLABE:</label>
					<dd>{{ $dato->clabe }}</dd>
				</div>
			</div>
								        	</div>
								        </div>
								      </div>


								      <div class="modal-footer">
								        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
								       
								      </div>
								    </div>
								  </div>
								</div>
					{{-- MODAL --}}
				@endforeach
			</table>
		@endif



@endsection