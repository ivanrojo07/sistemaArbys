<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('identificador', 'ID de Cliente')</th>
					<th>@sortablelink('solicitante->folio', 'Folio de Solicitante')</th>
					<th>@sortablelink('nombre', 'Nombre')</th>
					<th>@sortablelink('rfc', 'RFC')</th>
					<th>@sortablelink('solicitante->numgrupo', 'Nùmero de Grupo')</th>
					<th>@sortablelink('solicitante->integrante', 'Integrante') </th>
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
					<td>{{$cliente->solicitante->folio }}</td>
					<td>
						
						{{$cliente->nombre}} {{ $cliente->apellidopaterno }} {{ $cliente->apellidomaterno }}
						
					</td>
					<td>{{ strtoupper($cliente->rfc) }}</td>
					<td>{{ $cliente->solicitante->numgrupo}}</td>
					<td>{{ $cliente->solicitante->integrante}}</td>
					
					<td>
						<div class="row">
							<div class="col-sm-4">
							<a class="btn btn-success btn-sm" href="{{ route('solicitantes.show',['id'=>$cliente->id]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i> 
								<strong>Ver
							</strong></a>
						</div>
						<div class="col-sm-4">
							<a class="btn btn-info btn-sm" href="{{ route('solicitantes.edit',['id'=>$cliente->id]) }}">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
						</div>
						</div>
				
				</td>
				</tr>
				@endforeach
			 </tbody> 
			</table>
		<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>