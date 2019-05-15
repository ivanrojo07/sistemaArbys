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
						<div class="form-group col-sm-3" id="region">
							<label class="control-label">✱Región:</label>
							<select id="regiones" class="form-control">
								<option value="">Seleccionar</option>
								@foreach($regiones as $region)
									<option value="{{ $region->id }}">{{ $region->nombre }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-3" id="estado" >
							<label class="control-label">✱Estado:</label>
							<select id="estados" class="form-control">
							</select>
						</div>
						<div class="form-group col-sm-3" id="oficina" >
							<label class="control-label">✱Oficina:</label>
							<select id="oficinas" class="form-control">
							</select>
						</div>
{{-- 						<ul class="nav nav-tabs nav-justified" id="opciones">
							<li class=""><a>Subgerentes:</a></li>
							<li><a href="{{ route('control.vendedores.grupos') }}">Grupos:</a></li>
							<li><a href="{{ route('control.vendedores.ven') }}">Vendedores:</a></li>		
						</ul> --}}
					</div>
					<div class="row" id="directores">
						<div class="form-group col-sm-3">
							<label class="control-label">Director Regional:</label>
							<span id="1"></span>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Director Estatal:</label>
							<span id="2"></span>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label">Gerente:</label>
							<span id="3"></span>
						</div>
					</div>
					<div class="row">
						<div>
						  	<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified" role="tablist">
								<li class="tab"><a href="#subgerente" aria-controls="subgerente" role="tab" data-toggle="tab" id="subgerentes">Subgerente</a></li>
								<li class="tab"><a href="#grupos-div" aria-controls="grupos-div" role="tab" data-toggle="tab" id="grupos-pestania">Grupos</a></li>
								<li class="tab"><a href="#vendedores-div" aria-controls="vendedores-div" role="tab" data-toggle="tab" id="vendedores-pestanias">Vendedores</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="subgerente"></div>
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


		});

		$('#oficina').change(function() {
			var region = $('#regiones').val();
			var id = $('#estados').val();
			var oficina = $('#oficinas').val();
			$.ajax({
				url: "{{ route('control.getDirectores') }}",
				type: "GET",
				data: {'region': region, 'estado': id, 'oficina': oficina},
				dataType: "json",
			}).done( function(res){
				console.log("success");
				console.log(res);
				$('directores').prop('style', '');
				console.log($('directores'));
				if (res.regional != null) 
					$('#directores #1').html(res.regional.nombre + '' + res.regional.appaterno + ' ' + res.regional.apmaterno);
				if (res.estatal != null)
					$('#directores #2').html(res.estatal.nombre + '' + res.estatal.appaterno + ' ' + res.estatal.apmaterno);
				if(res.oficina.responsable_adm != null)
					$('#directores #3').html(res.oficina.responsable_adm);
			}).fail( function (res){
				console.log(res);
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
				}).fail( function (){
					$('#subgerente').html('');
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
					url: "{{ route('control.vendedores.grupos') }}",
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
					url: "{{ route('control.vendedores.ven') }}",
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