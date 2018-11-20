@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Préstamo:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.show', ['cliente' => $cliente]) }}" class="btn btn-primary">
							<i class="fa fa-undo"></i><strong> Volver</strong>
						</a>
					</div>
				</div>
			</div>
			<form action="{{ route('clientes.prestamos.store', ['cliente' => $cliente]) }}" method="post" id="form">
				{{ csrf_field() }}
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 form-group">
							<label class="control-label">✱Monto:</label>
							<input type="text" name="monto" id="monto" class="form-control" max="600000" required="">
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">✱Meses:</label>
							<select name="meses" id="meses" class="form-control" required="">
								<option value="">Seleccionar</option>
								<option value="12">12 Meses</option>
								<option value="24">24 Meses</option>
								<option value="36">36 Meses</option>
								<option value="48">48 Meses</option>
							</select>
						</div>
						<div class="col-sm-4 form-group">
							<label class="control-label">✱Garantía:</label>
							<div class="row">
								<div class="col-sm-6 text-center">
									<input type="radio" name="garantia" value="Sí" required="">
									<label class="control-label">Sí</label>
								</div>
								<div class="col-sm-6 text-center">
									<input type="radio" name="garantia" value="No" required="">
									<label class="control-label">No</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-stripped table-hover table-bordered" style="margin-bottom: 0px;" id="tabla">
							</table>
						</div>
					</div>
				</div>
				<div class="panel-footer" id="end" style="display: none;">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
							<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	var f1 = f2 = f3 = false;

	$(document).ready(function() {

		$('#monto').change(function() {
			var val = $('#monto').val();
			if($('#monto').val() > 600000) {
				alert('El monto no puede se mayor a $600,000.00')
				$('#monto').val(600000);
			}
			if(val !== '')
				f1 = true;
			else
				f1 = false;
			table();
		});

		$('#meses').change(function() {
			var val = $('#meses').val();
			if(val !== '')
				f2 = true;
			else
				f2 = false;
			table();
		});

		$('[name="garantia"]').change(function() {
			var val = $('#garantia').val();
			if(val !== '')
				f3 = true;
			else
				f3 = false;
			table();
		});

	});

	function table() {

		if(f1 && f2 && f3) {
			document.getElementById('end').style.display = 'block';
			var monto = $('#monto').val();
			var meses = $('#meses').val();;
			var garantia = $('#garantia').val();
			var aux = '<tr class="info"><th>Mes</th><th>Pago Inicial</th><th>Mensualidad</th></tr>';
			for(i = 1; i <= meses; i++)
				aux += '<tr><td class="text-center">' + i + '</td><td>$' + (i == 1 ? (monto*0.1).toFixed(2) : 0.00) + '</td><td>$' + (monto/12).toFixed(2) + '</td></tr>';
			$('#tabla').html(aux);
		} else {
			$('#tabla').html('');
			document.getElementById('end').style.display = 'none';
		}

	}

</script>

@endsection