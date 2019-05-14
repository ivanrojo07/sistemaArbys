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
						<ul class="nav nav-tabs nav-justified" id="opciones">
							<li class=""><a id="subgerentes">Subgerentes:</a></li>
							<li><a href="{{ route('control.vendedores.grupos') }}">Grupos:</a></li>
							<li><a href="{{ route('control.vendedores.ven') }}">Vendedores:</a></li>		
						</ul>
						{{-- <div>
						  	<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="active tab"><a href="#subgerente" aria-controls="subgerente" role="tab" data-toggle="tab">Subgerente</a></li>
								<li class="tab"><a href="#grupos-div" aria-controls="grupos-div" role="tab" data-toggle="tab">Grupos</a></li>
								<li class="tab"><a href="#vendedores-div" aria-controls="vendedores-div" role="tab" data-toggle="tab">Vendedores</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="subgerente"></div>
								<div role="tabpanel" class="tab-pane" id="grupos-div">profile</div>
								<div role="tabpanel" class="tab-pane" id="vendedores-div">messages</div>
							</div>

						</div> --}}
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
		  	console.log("Hla");
		});
    	// document.getElementById('region').style.display = 'none';
     //  	document.getElementById('estado').style.display = 'none';
     //  	document.getElementById('oficina').style.display = 'none';
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

		$('#oficinas').change(function() {
			var id = $('#oficinas').val();
			if(id){
				document.getElementById('opciones').style.display = 'block';
			}
			else{
				document.getElementById('opciones').style.display = 'none';
			}
			$.ajax({
				url: "{{ url('/oficina2') }}/"+id,
				type: "GET",
				dataType: "html",
				success: function(res){
					$('#grupos').html(res);
				},
				error: function (){
					$('#grupos').html('');
				}
			});		
		});


		$('#subgerentes').click(function() {			
			var id = $('#oficinas').val();
			location.href="{{ url('subgerentes') }}/"+id;
			
		});


    	

    });
</script>

@endsection