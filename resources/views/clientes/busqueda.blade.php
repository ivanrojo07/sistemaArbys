<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px; margin-left: -45px;">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador', 'Identificador')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
					<th>@sortablelink('rfc', 'RFC')</th>
					<th>@sortablelink('folio', 'Folio')</th>
					<th>@sortablelink('calificacion', 'Calificaciòn') </th>
					<th>Operacion</th>
				</tr>
			</thead>
			<tbody>
			@foreach($clientes as $cliente)
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$cliente->id}}">
					<td>{{$cliente->identificador}}</td>
					<td>
						@if ($cliente->tipopersona == "Fisica")
						{{$cliente->nombre}} {{ $cliente->apellidopaterno }} {{ $cliente->apellidomaterno }}
						@else
						{{$cliente->razonsocial}}
						@endif
					</td>
					<td>{{ $cliente->tipopersona }}</td>
					<td>{{ strtoupper($cliente->rfc) }}</td>
					<td>{{ strtoupper($cliente->folio) }}</td>
					<td>{{$cliente->calificacion}}</td>
					<td>
						<div class="row">
							<div class="col-sm-4">
							<a class="btn btn-success btn-sm" href="{{ route('clientes.show',['cliente'=>$cliente]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i> 
								<strong>Ver
							</strong></a>
						</div>
						<div class="col-sm-4">
							<a class="btn btn-info btn-sm" href="{{ route('clientes.edit',['cliente'=>$cliente]) }}">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
						</div>
						<div class="col-sm-4">
								<a class="btn btn-warning btn-sm">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Pagos</strong>
							</a>
							</div>
					</div>
				
				</td>
				</tr>
				@endforeach
			</tbody>
			</table>
		<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>