@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class=""><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>

			<li role="presentation" class="active"><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
		</ul>
	</div>
	<div class="panel-default">
		<div class="panel-heading"><h5>Administrativo:
		&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></div>
		<div class="panel-body">
			<form role="for" method="POST" action="{{ route('empleados.faltas.store',['empleado'=>$empleado]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="empleado_id" value="{{$empleado->id}}">
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-4">
						<label class="control-label" for="fecha" id="lbl_fecha"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha:</label>
						<input type="date" class="form-control" id="id_fecha" name="fecha">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="comentarios" id="lbl_comen">Comentarios:</label>
						<textarea class="form-control" id="id_coment" name="comentarios" maxlength="500"></textarea>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="problema" id="lbl_problema"><i class="fa fa-asterisk" aria-hidden="true"></i>Problema:</label>
						<textarea class="form-control" id="id_problema" name="problema" maxlength="500"></textarea>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="tipofalta" id="lbl_falta"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de falta:</label>
						<select type="select" name="tipofalta" class="form-control" id="id_falta">
							<option id="1" value="Falta 1">falta 1</option>
							<option id="2" value="Falta 2">falta 2</option>
	    					<option id="3" value="Falta 3">falta 3</option>
	    					<option id="4" value="Falta 4">falta 4</option>
							<option id="5" value="Falta 5">falta 5</option>
	    					<option id="6" value="Falta 6">falta 6</option>
	    					<option id="7" value="Falta 7">falta 7</option>
							<option id="8" value="Falta 8">falta 8</option>
	    					<option id="9" value="Falta 9">falta 9</option>
						</select>
					</div>
				</div>
				<div class="col-xs-12 offset-md-2 mt-3">
					<div class="form-group col-xs-4">
	    					<label class="control-label" for="reporto">Quién lo reportó:</label>
	    					<input type="text" class="form-control" id="reporto" name="reporto">
	  				</div>
	  			</div>
	  			<button type="submit" class="btn btn-success">Guardar</button>
				
			</form>
			
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
						<thead>
							<tr class="info">
								<th>@sortablelink('fecha','Fecha:')</th> 
								<th>@sortablelink('tipofalta','Tipo:')</th>
								<th>@sortablelink('reporto','Quién Reporto:')</th>
								<th>@sortablelink('problema','Problema:')</th>
							</tr>
						</thead>
						@foreach ($faltas as $falta)
							{{-- expr --}}
							<tr class="active">
								<td>{{$falta->fecha}}</td>
								<td>{{$falta->tipofalta}}</td>
								<td>{{$falta->reporto}}</td>
								<td>{{$falta->problema}}</td>
							</tr>
						@endforeach
			</table>
			</div>
				
@endsection