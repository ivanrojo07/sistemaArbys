	@extends('layouts.test')
@section('content1')

	
				<div role="application" class="panel panel-group">
				<div class="panel-default">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>

					<tr class="info">
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Area</th>
						<th>Puesto</th>
						
						
						
					</tr>

				</thead>
				<tbody>


					@foreach($empleados as $empleado)
					 @foreach($empleado as $emplead)
					
                   <tr>
						<td>{{$emplead->identificador}}</td>
						<td>{{$emplead->nombre}}</td>
						<td>{{$emplead->appaterno}}</td>
						<td>{{$emplead->apmaterno}}</td>

							<?php $act;?>
							@foreach($emplead->datosLaborales as $datos)
							<?php $act=$datos;?>
							@endforeach

                         @foreach($areas as $area)
                         @if($act->area_id==$area->id)
						<td>{{$area->nombre}}</td>
							
						@endif
							@endforeach
							@if($act->area_id==null)
							<td>No Definido</td>
							@endif


						@foreach($puestos as $puesto)
						@if($act->puesto_id==$puesto->id)
						
						<td>{{$puesto->nombre}}</td>
						
						
						@endif
						@endforeach
						@if($act->puesto_id==null)
							<td>No Definido</td>
							@endif



					</tr>	
					 @endforeach
					@endforeach



				</tbody>

			</table>
		</div></div>
	
@endsection
