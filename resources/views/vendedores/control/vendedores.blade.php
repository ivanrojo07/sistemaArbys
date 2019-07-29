<div class="container">
	<div class="panel panel-group">
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
								<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;" id="principal">
									<tr class="info">
										<th class="text-center">Nombre</th>
										<th class="text-center">Grupo</th>
										<th class="text-center">Subgerente</th>						
										<th class="text-center">Clientes</th>
										<th class="text-center">Ventas</th>
										<th class="col-sm-1">Acción</th>
									</tr>
									@foreach($vendedores as $vendedor)
										<tr>
											<td>
												{{ $vendedor->empleado->nombre}} {{ $vendedor->empleado->appaterno }} {{ $vendedor->empleado->apmaterno }}
												<input type="hidden" name="vendedor-id" value="{{ $vendedor->id }}">
											</td>
											@if($vendedor->grupo != null)
											<td>{{ $vendedor->grupo->nombre}}</td>
											<td>{{ $vendedor->grupo->subgerente->empleado->nombre }} {{ $vendedor->grupo->subgerente->empleado->appaterno }} {{ $vendedor->grupo->subgerente->empleado->apmaterno }}</td>
											@else
											<td>--</td>
											<td>--</td>
											@endif
											@if($vendedor->contador->count() != 0)
											<td>{{ $vendedor->contador->last()->total_clientes }}</td>
											<td>

													@php
													$total_ventas = 0;
													foreach ($vendedor->clientes()->get() as $cliente) {
														foreach ($cliente->transactions()->get() as $transaction) {
															if($transaction->status == 'pagando' || $transaction->status == 'finalizado'){
																$total_ventas += 1;
															}
														}
													}
														
												@endphp
												{{$total_ventas}}
											</td>
											@else
											<td>0</td>
											<td>0</td>
											@endif
											<td>
												<button class="btn btn-primary detallev">
													Detalles
												</button>
											</td>
										</tr>
									@endforeach
								</table>
								<br>
								<br>
								<div class="col-sm-8 col-sm-offset-4">
									<table class="table table-stripped table-bordered table-hover">
										<tr>
											<td>Total clientes</td>
											<td>Total ventas</td>
										</tr>
										<tr>	
											<td id="total_clientes">--</td>
											<td id="total_ventas">--</td>											
										</tr>
									</table>
								</div>
								<br>
								<br>
								<br>
								<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;display: none;" id="detalle">
								</table>
								<br>
								<br>
								<br>
							</div>
						</div>
					</div>
				</div>
	</div>
</div>

<script>
	var arreglo_vendedores = [
			@foreach($vendedores as $vendedor)
			{
				'nombre': "{{ $vendedor->empleado->nombre}} {{ $vendedor->empleado->appaterno }} {{ $vendedor->empleado->apmaterno }}",
				'vendedor': @json($vendedor->empleado),
				'contador': @json($vendedor->contador),
				'clientes': {{ $vendedor->clientes->count() }},
				'objetivo': @json($vendedor->objetivo->last()),
			},
			@endforeach
		];

	$(document).ready(function() {
		// //console.log($('#principal tr:gt(0)'));
		// var filas = $('#principal tr:gt(0)');
		// var clientes = 0;
		// // var ventas = 0;
		// $.each(filas, function(index, el) {
		// 	//console.log($(el).children('td').eq(4).html().replace("$", '').replace(",", ''));
		// 	clientes += parseInt($(el).children('td').eq(3).html());
		// 	// ventas += parseFloat($(el).children('td').eq(4).html().replace("$", '').replace(",", ''));
		// });
		// $('#total_clientes').text(clientes.toString());
		// // $('#total_ventas').text('$' + ventas.toString());


		$('.detallev').click( function(event) {
			//var vendedor = $(this).parent().parent().children().eq(0).html();
			var vendedor = $(this).parent().parent().children().eq(0);
			vendedor = $(vendedor).children('input').val();
			//console.log(vendedor);
			$.ajax({
				url: "{{ url('/control_vendedores/getHistorial') }}",
				type: "GET",
				data: {'vendedor': vendedor},
				dataType: "html",
				success: function(res){
					console.log("success");
					$('#detalle').empty();
					$('#detalle').prop('style', 'margin-bottom: 0px;');
					$('#detalle').append(res);
				},
				error: function (data){
					console.log(data);
				}
			});
			
			console.log(arreglo_vendedores);
			
		});

	});

</script>
