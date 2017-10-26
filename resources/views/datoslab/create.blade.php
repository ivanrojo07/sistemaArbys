@extends('layouts.app')
	@section('content')
	<div class="container">
    <h2>Datos Laborales de {{ $personal->nombre }} {{$personal->apellidopaterno}} {{$personal->apellidomaterno}}</h2>
			<form role="form" method="POST" action="{{ route('personals.datoslaborales.store',$personal) }}" class="prs">
				<div class="panel-body">
					{{ csrf_field() }}
          <input type="hidden" name="personal_id" value="{{$personal->id}}">
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="nombreempresa">Nombre de la empresa:</label>
  						<input type="text" class="form-control" id="nombreempresa" name="nombreempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="calleempresa">Calle:</label>
  						<input type="text" class="form-control" id="calleempresa" name="calleempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="numextempresa">Número Exterior:</label>
  						<input type="text" class="form-control" id="numextempresa" name="numextempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="numinterempresa">Número interior:</label>
  						<input type="text" class="form-control" id="numinterempresa" name="numinterempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="cpempresa">Código Postal:</label>
  						<input type="text" class="form-control" id="cpempresa" name="cpempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="coloniaempresa">Colonia:</label>
  						<input type="text" class="form-control" id="coloniaempresa" name="coloniaempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="municipioempresa">Municipio:</label>
  						<input type="text" class="form-control" id="municipioempresa" name="municipioempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="ciudadempresa">Ciudad:</label>
  						<input type="text" class="form-control" id="ciudadempresa" name="ciudadempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="estadoempresa">Estado:</label>
  						<input type="text" class="form-control" id="estadoempresa" name="estadoempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="giroempresa">Giro de la empresa:</label>
  						<input type="text" class="form-control" id="giroempresa" name="giroempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="puestoempresa">Tu puesto en la empresa:</label>
  						<input type="text" class="form-control" id="puestoempresa" name="puestoempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="antiguedadempresa">Tu antiguedad en la empresa:</label>
  						<input type="text" class="form-control" id="antiguedadempresa" name="antiguedadempresa">
  					</div>

  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="telefonoempresa">Número de telefono de la empresa:</label>
  						<input type="text" class="form-control" id="telefonoempresa" name="telefonoempresa">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="ingresosmesempresa">Ingresos al mes de la empresa:</label>
  						<input type="text" class="form-control" id="ingresosmesempresa" name="ingresosmesempresa">
  					</div>
				</div>
  				<button type="submit" class="btn btn-default">Guardar</button>
			</form>
		</div>
	@endsection