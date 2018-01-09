<table class="table table-striped table-bordered table-hover" 
		       style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id', 'Identificador')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
					<th>@sortablelink('alias', 'Alias')</th>
					<th>@sortablelink('rfc', 'RFC')</th>
					<th>@sortablelink('vendedor', 'Vendedor') </th>
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($personals as $personal)

				<tr class="active"{{--  onclick="vistarapida({{$personal->id}})" --}} href="#{{$personal->id}}">
					<td><a rel="#{{$personal->id}}"> {{$personal->id}}</a></td>

					<td>
						@if ($personal->tipopersona == "Fisica")
						{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}
						@else
						{{$personal->razonsocial}}
						@endif
					</td>
					<td>{{ $personal->tipopersona }}</td>
					<td>{{ $personal->alias }}</td>
					<td>{{ strtoupper($personal->rfc) }}</td>
					<td>{{$personal->vendedor}}</td>
					<td>

							<a class="btn btn-success btn-sm" href="{{ route('clientes.show',['cliente'=>$personal]) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>

							<a class="btn btn-info btn-sm" href="{{ route('clientes.edit',['cliente'=>$personal]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
				</tr>
				</td>
			</tbody>
		</div>
			@endforeach
		</table>