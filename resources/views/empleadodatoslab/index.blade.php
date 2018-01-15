@extends('layouts.infoempleado')
@section('infoempleado')



	@if (count($datoslaborales) == 0)
			<h3>Aún no tienes historial laboral</h3>
		@endif
		@if (count($datoslaborales) !=0)
            {{$fecha=''}}
		     @foreach ($datoslaborales as $dato)
		     <?php $fecha=$dato->fechacontratacion ?>
		     @endforeach
			

			<div class="panel panel-primary">
      <div class="panel-heading" align="center"><strong>Historial Laboral</strong></div>
      <div class="panel-body" ><strong>Fecha de Contratación: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$dato->fechacontratacion}}</strong>
        <div align="right">
      	<a class="btn btn-info btn-md" href="{{ route('empleados.datoslaborales.edit',['empleado'=>$empleado,'datoslaborale'=>$dato]) }}">
				<strong>Agregar</strong>
			</a></div>

      </div>
    </div><table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>
					<tr class="info">
						<th>Área</th>
						<th>Puesto</th>
						<th>Salario Nominal</th>
						<th>Fecha de Actualización</th>
						<th>Lugar de Trabajo</th>


						<th>Operaciones</th>
					</tr>
				</thead>
                <tbody>
				@foreach ($datoslaborales as $dato)
					<tr class="active">
@if($areas==null)
<td>NO DEFINIDO</td>
@else
@foreach ($areas as $area)
								{{-- expr --}}

								 @if ($dato->area_id == $area->id)
								 <td>{{ $area->nombre }}</td>
									{{-- expr --}}

									
								@endif
							@endforeach
						@endif
@if($puestos==null)
<td>NO DEFINIDO</td>
@else
@foreach ($puestos as $puesto)
								{{-- expr --}}

								 @if ($dato->puesto_id == $puesto->id)
								 <td>{{ $puesto->nombre }}</td>
									{{-- expr --}}

									
								@endif
							@endforeach
						@endif



						<td>{{$dato->salarionom}}</td>
						<td>{{$dato->fechaactualizacion}}</td>
						<td>{{$dato->lugartrabajo}}</td>


						<td>

							<a class="btn btn-success btn-sm" href="{{ route('empleados.datoslaborales.show',['empleado'=>$empleado,'datoslaborale'=>$dato]) }}">
						<strong>Ver</strong>	</a>

							

					</tr>
						</td>


					</tbody>
				@endforeach
			</table>
		@endif



@endsection