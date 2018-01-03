<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
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

			@foreach($provedores as $provedore)
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$provedore->id}}">
					<td>{{$provedore->id}}</td>
					<td>
						@if ($provedore->tipopersona == "Fisica")
						{{$provedore->nombre}} {{ $provedore->apellidopaterno }} {{ $provedore->apellidomaterno }}
						@else
						{{$provedore->razonsocial}}
						@endif
					</td>
					<td>{{ $provedore->tipopersona }}</td>
					<td>{{ $provedore->alias }}</td>
					<td>{{ strtoupper($provedore->rfc) }}</td>
					<td>{{$provedore->vendedor}}</td>
					<td>
							<a class="btn btn-success btn-sm" href="{{ route('provedores.show',['provedor'=>$provedore]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i> 
								<strong>Ver
							</strong></a>

							<a class="btn btn-info btn-sm" href="{{ route('provedores.edit',['provedor'=>$provedore]) }}">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
				</tr>
				</td>
			</tbody>
		</div>
			@endforeach
		</table>
		<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>