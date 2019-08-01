@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Control de vendedores:</h4>
					</div>					
				</div>
			</div>
		</div>
		
			<div class="panel-default">
				<div class="panel-body">
					<div class="row">
						@if(Auth::user()->empleado->laborales->last()->puesto->id < 3)
						<div class="form-group col-sm-3" id="region">
							<label class="control-label">✱Región:</label>
							<select id="regiones" class="form-control">
								<option value="">Seleccionar</option>
								@foreach($regiones as $region)
									<option value="{{ $region->id }}">{{ $region->nombre }}</option>
								@endforeach
							</select>
						</div>
						@elseif(Auth::user()->empleado->laborales->last()->puesto->id == 3)
						<div class="form-group col-sm-3" id="region">
							<label class="control-label">✱Región:</label>
							<select id="regiones" class="form-control">
								<option value="">Seleccionar</option>
								<option value="{{ Auth::user()->empleado->laborales->last()->region->id }}">{{ Auth::user()->empleado->laborales->last()->region->nombre }}</option>
							</select>
						</div>
						@endif
						@if(Auth::user()->empleado->laborales->last()->puesto->id < 4)
						<div class="form-group col-sm-3" id="estado" >
							<label class="control-label">✱Estado:</label>
							<select id="estados" class="form-control">
							</select>
						</div>
						@elseif(Auth::user()->empleado->laborales->last()->puesto->id == 4)
						<div class="form-group col-sm-3" id="estado" >
							<label class="control-label">✱Estado:</label>
							<select id="estados" class="form-control">
								<option value="">Seleccionar</option>
								<option value="{{ Auth::user()->empleado->laborales->last()->estado->id }}">{{ Auth::user()->empleado->laborales->last()->estado->nombre }}</option>
							</select>
						</div>
						@endif
						@if(Auth::user()->empleado->laborales->last()->puesto->id <= 4)
						<div class="form-group col-sm-3" id="oficina" >
							<label class="control-label">✱Oficina:</label>
							<select id="oficinas" class="form-control">
							</select>
						</div>
						@endif
						@if(Auth::user()->empleado->laborales->last()->puesto->id == 5 || Auth::user()->empleado->laborales->last()->puesto->id == 6)
							<div class="form-group col-sm-3" id="oficina" >
								<label class="control-label">✱Oficina:</label>
								<select id="oficinas" class="form-control">
									<option value="{{ Auth::user()->empleado->laborales->last()->oficina->id }}">{{ Auth::user()->empleado->laborales->last()->oficina->nombre }}</option>
								</select>
							</div>
						@endif
{{-- 						<ul class="nav nav-tabs nav-justified" id="opciones">
							<li class=""><a>Subgerentes:</a></li>
							<li><a href="{{ route('control.vendedores.grupos') }}">Grupos:</a></li>
							<li><a href="{{ route('control.vendedores.ven') }}">Vendedores:</a></li>		
						</ul> --}}
					</div>
					<div class="row" id="directores">
						<div class="form-group col-sm-3">
							<label class="control-label">Director Regional:</label>
							<span id="director-regional"></span>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Director Estatal:</label>
							<span id="director-estatal"></span>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Gerente:</label>
							<span id="gerente"></span>
						</div>
					</div>
					<div class="row">
						<div>
						  	<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified" role="tablist">
								@if(Auth::user()->empleado->laborales->last()->puesto->id < 6)
								<li class="tab"><a href="#subgerente" aria-controls="subgerente" role="tab" data-toggle="tab" id="subgerentes">Subgerente</a></li>
								@endif
								<li class="tab"><a href="#grupos-div" aria-controls="grupos-div" role="tab" data-toggle="tab" id="grupos-pestania">Grupos</a></li>
								<li class="tab"><a href="#vendedores-div" aria-controls="vendedores-div" role="tab" data-toggle="tab" id="vendedores-pestanias">Vendedores</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								@if(Auth::user()->empleado->laborales->last()->puesto->id < 6)
								<div role="tabpanel" class="tab-pane active" id="subgerente"></div>
								@endif
								<div role="tabpanel" class="tab-pane active" id="grupos-div"></div>
								<div role="tabpanel" class="tab-pane active" id="vendedores-div"></div>
							</div>

						</div>
					</div>
				</div>
			</div>			
		</div>
	</form>
</div>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
		$('.tab a').click(function (e) {
		  	e.preventDefault();
		  	var div_id = $(this).attr('href');
		  	var divs = $('.tab-content:eq(0)').children();
		  	for (var i = 0; i < divs.length; i++) {
		  		$(divs[i]).prop('class', 'tab-pane');
		  		$(divs[i]).prop('style', '');
		  	}
		  	$('.tab-content:eq(0)').children(div_id).prop('class', 'tab-pane active');
		});

		$("#oficinas").prop('name', 'oficina_id');
		$("#estados").prop('name', 'estado_id');
		$("#estados").prop('required', true);
		$("#regiones").prop('required', true);
		$("#regiones").prop('name', 'region_id');
		$("#oficinas").prop('required', true);

		$('#regiones').change(function() {
			var id = $('#regiones').val();
			$.ajax({
				url: "{{ url('/region2') }}/"+id,
				type: "GET",
				dataType: "html",
				success: function(res){
					$('#estados').html(res);
				},
				error: function (){
					$('#estados').html('');
				}
			});
		});

		$('#estados').change(function() {
			var id = $('#estados').val();

			// obtenemos las oficinas
			$.ajax({
				url: "{{ url('/estado2') }}/"+id,
				type: "GET",
				dataType: "html",
				success: function(res){
					$('#oficinas').html(res);
				},
				error: function (){
					$('#oficinas').html('');
				}
			});

			$('#director-regional').html('');
			$('#director-estatal').html('');
			$('#gerente').html('');


		});

		$('#oficina').change(function() {
			var region = $('#regiones').val();
			var estado_id = $('#estados').val();
			var oficina = $('#oficinas').val();

			console.log('region: ',region,' estados: ',estado_id, 'oficinas: ', oficina);

			$.ajax({
				url: "{{ route('control.getDirectores') }}",
				type: "GET",
				data: {'region': region, 'estado': estado_id, 'oficina': oficina},
				dataType: "json",
			}).done( function(res){
				$('directores').prop('style', '');
				if (res.regional != null){
					$('#director-regional').html(res.regional.nombre + " " + res.regional.appaterno + " " + res.regional.apmaterno);
				}else{
					$('#director-regional').html('N/E');
				}
				if (res.estatal != null){
					$('#director-estatal').html(res.estatal.nombre + " " + res.estatal.appaterno + " " + res.estatal.apmaterno);
				}else{
					$('#director-estatal').html('N/E');
				}if(res.gerente != null){
					$('#gerente').html(res.gerente.nombre + " " + res.gerente.appaterno + " " + res.gerente.apmaterno);
				}else{
					$('#gerente').html('N/E');
				}
					
			}).fail( function (res){
				console.log('No funciona');
			});
		});


		$('#subgerentes').on('click', function(e) {
			var id = $('#oficinas').val();
			if (id == null || id == '') {
				swal("Error", "No haz seleccionado una oficina", "error");
				return;
			}
			else{
				$.ajax({
					url: "{{ url('subgerentes') }}/"+id,
					type: "GET",
					dataType: "html",
				}).done( function(res){
					$('#subgerente').html(res);
				}).fail( function (res){
					$('#subgerente').html('');
					console.log(res);
				});
			}
			
		});

		$('#grupos-pestania').click(function(event) {
			var id = $('#oficinas').val();
			if (id == null || id == '') {
				swal("Error", "No haz seleccionado una oficina", "error");
				return;
			}
			else{
				$.ajax({
					url: "{{ url('control_vendedores/grupos') }}/"+ id,
					type: "GET",
					dataType: "html",
				}).done(function(res){
					$('#grupos-div').html(res);
				}).fail(function (res){
					console.log(res);
					$('#grupos-div').html('error');
				});
			}
		});

		$('#vendedores-pestanias').click(function(event) {
			var id = $('#oficinas').val();
			if (id == null || id == '') {
				swal("Error", "No haz seleccionado una oficina", "error");
				return;
			}
			else{
				$.ajax({
					url: "{{ url('control_vendedores/vendedores') }}/"+id,
					type: "GET",
					dataType: "html",
				}).done( function(res){
					$('#vendedores-div').html(res);
				}).fail( function (res){
						console.log(res);
					$('#vendedores-div').html('error');
				});
			}
		});

    	

    });
</script>

@endsection