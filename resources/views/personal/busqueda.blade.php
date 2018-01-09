<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id','#')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('prioridad', 'Prioridad')</th>
					<th>@sortablelink('tipo', 'Tipo de cliente')</th>
					<th>@sortablelink('calificacion', 'Calificación')</th>
					<th>@sortablelink('mail', 'Correo')</th>
					<th>@sortablelink('created_at','Fecha de alta')</th>
					<th>@sortablelink('producto','Producto')
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($personals as $personal)
				<tr class="active">
					<td>{{$personal->id}}</td>
					<td>
						@if ($personal->tipopersona == "Fisica")
						{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}
						@else
						{{$personal->razonsocial}}
						@endif
					</td>
					<td>{{ $personal->prioridad }}</td>
					<td>{{ $personal->tipo }}</td>
					<td>{{ strtoupper($personal->calificacion) }}</td>
					<td>{{$personal->mail}}</td>
					<td>{{$personal->created_at}}</td>
					<td></td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('personals.show',$personal) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
						<a class="btn btn-info btn-sm" href="{{ route('personals.edit', $personal) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>