@extends('layouts.app')
	@section('content')
		<div class="container">
			{{-- {{dd($beneficiario)}} --}}
			<form role="form" method="POST" action="{{ route('personals.datosbeneficiario.update',['personal'=>$personal, 'beneficiario'=>$beneficiario]) }}">
				<div class="panel-body">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="personal_id" value="{{ $personal->id}}">
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="nombreben">Nombre(s):</label>
  						<input type="text" class="form-control" id="nombreben" name="nombreben" value="{{ $beneficiario->nombreben }}">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apepatben">Apellido Paterno:</label>
  						<input type="text" class="form-control" id="apepatben" name="apepatben" value="{{ $beneficiario->apepatben }}">
  					</div>
  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  						<label class="control-label" for="apematben">Apellido Materno:</label>
  						<input type="text" class="form-control" id="apematben" name="apematben" value="{{ $beneficiario->apematben }}">
  					</div>
				</div>
				<div class="panel-body">
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="edadben">Edad:</label>
						<input type="number" class="form-control" id="edadben" name="edadben" value="{{ $beneficiario->edadben }}">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="parentescoben">Parentesco:</label>
						<input type="text" class="form-control" id="parentescoben" name="parentescoben" value="{{ $beneficiario->parentescoben }}">
					</div>
					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<label class="control-label" for="telefonoben">Telefono:</label>
						<input type="text" class="form-control" id="telefonoben" name="telefonoben" value="{{ $beneficiario->telefonoben }}">
					</div>
				</div>
  				<button type="submit" class="btn btn-default">Guardar</button>
				</div>
			</form>
		</div>
	@endsection