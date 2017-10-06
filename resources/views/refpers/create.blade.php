@extends('layouts.app')
	@section('content')
		<div class="row-8">
			<form role="form" method="POST" action="{{-- {{ route('personals.store') }} --}}" class="prs">
				<div class="panel-body">
					{{ csrf_field() }}
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="nombre">Nombre(s):</label>
  						<input type="text" class="form-control" id="nombre" name="nombre">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
  					</div>
				</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefonofijo">Número de Telefono:</label>
						<input type="text" class="form-control" id="telefonofijo" name="telefonofijo">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefonocel">Número Celular:</label>
						<input type="text" class="form-control" id="telefonocel" name="telefonocel">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="estadocivil">Parentesco:</label>
						<select type="select" class="form-control" id="estadocivil" name="estadocivil">
    						<option value="Compañero">Compañero</option>
    						<option value="Amigos">Amigos</option>
    						<option value="Familiar">Familiar</option>
    						<option value="Otros">Otros</option>
    					</select>
					</div>
				</div>
  				<button type="submit" class="btn btn-default">Guardar</button>
			</form>
		</div>
	@endsection