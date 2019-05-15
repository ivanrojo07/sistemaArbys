<div class="container">
	<div class="panel panel-group">
		{{-- @include('vendedores.control.head')
		<ul class="nav nav-tabs nav-justified">
			<li><a href="{{ url('control_vendedores/subgerentes') }}">Subgerentes:</a></li>
			<li class="active"><a href="{{ route('control.vendedores.grupos') }}">Grupos:</a></li>
			<li><a href="{{ route('control.vendedores.ven') }}">Vendedores:</a></li>
				
		</ul> --}}
		<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-3 form-group">
							<div class="input-group">
								<input type="text" id="buscador" class="form-control" autofocus placeholder="Buscar...">
						        <span class="input-group-btn">
									<a class="btn btn-default" onclick="buscar()">
										<i class="fa fa-search"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<div id="vendedores">
						<div class="row">
							<div class="col-sm-12 text-center">
								<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
									<tr class="info">
										
										<th class="text-center">Grupo</th>
										<th class="text-center">Subgerente</th>
										<th class="text-center">Número de vendedores</th>						
										<th class="col-sm-1">Acciones</th>
									</tr>
									@foreach($grupos as $grupo)
										<tr>
											{{-- @if(isset($vendedor->grupo)) --}}
											
											<td>{{$grupo->nombre }}</td>
											{{-- @else --}}
												{{-- <td>No asignado</td>
												<td>No asignado</td> --}}
											{{-- @endif --}}
											<td>{{ $grupo->subgerente->empleado->nombre }} {{ $grupo->subgerente->empleado->appaterno }} {{ $grupo->subgerente->empleado->apmaterno }}</td>
											<td>
											{{$grupo->vendedores->count()}}
											</td>
											<td>
												<button class="btn btn-primary detallev-grupos">
													Detalles
												</button>
											</td>
											{{-- <td class="text-center">
												<input type="radio" name="vendedor_id" value="{{ $vendedor->id }}" required="">
											</td> --}}
										</tr>
									@endforeach
								</table>
								<br>
								<br>
								<br>
								<table class="table table-stripped table-bordered table-hover" style="margin: 3%;display: none;" id="vende-grupos"></table>
							</div>
						</div>
					</div>
				</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		var arreglo_vendedores = [
			@foreach($grupos as $grupo)
				@foreach($grupo->vendedores as $vendedor)
				{
					'nombre': "{{ $grupo->nombre }}",
					'vendedor': @json($vendedor->empleado),
					'clientes': @json($vendedor->contador->last()),
					'objetivo': @json($vendedor->objetivo->last()),
				},
				@endforeach
			@endforeach
		];
		$('.detallev-grupos').click( function(event) {
			var grupo = $(this).parent().parent().children().eq(0).html();
			var contenido = `<tr class="info">
								<th class="text-center">Vendedor</th>
								<th class="text-center">Objetivo</th>
								<th class="text-center">Clientes</th>
								<th class="text-center">Ventas</th>						
							</tr>`;
			$('#vende-grupos').empty();
			$('#vende-grupos').prop('style', 'margin-bottom: 0px;');
			$.each(arreglo_vendedores, function(index, elem) {
				if (elem.nombre == grupo) {
					contenido += `<tr>
									<td>${elem.vendedor.nombre} ${elem.vendedor.appaterno} ${elem.vendedor.apmaterno ? elem.vendedor.apmaterno : ' '}</td>
									<td>${elem.objetivo ? elem.objetivo.num_clientes : '--'}</td>
									<td>${elem.clientes ? elem.clientes.total_clientes : '--'}</td>
									<td>${elem.clientes ? elem.clientes.total_ventas : '--'}</td>
								  </tr>`;
				}
			});
			$('#vende-grupos').append(contenido);
			//console.log(arreglo_vendedores);
		});
	});

</script>
