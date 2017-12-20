@extends('layouts.infopersonal')
	@section('personal')
	<ul role="tablist" class="nav nav-tabs">
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.show',['personal'=>$personal]) }}" class="">Dirección/Domicilio:</a></li>
      @if ($personal->tipo == 'Cliente')
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="">Datos Laborales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="">Referencias Personales:</a></li>
      <li class="active"><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="">Datos de Beneficiarios:</a></li>
      @endif
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="">Productos:</a></li>
      <li class=""><a href="{{ route('personals.product.index',['personal'=>$personal]) }}" class="">Productos seleccionados:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="">C.R.M.:</a></li>
  </ul>
    <div class="panel-default">
    	<div class="panel-heading">Datos de Beneficiarios</div>
    	<div class="panel-body">
    		<form role="form" method="POST" action="{{ route('personals.datosbeneficiario.update',['personal'=>$personal, 'beneficiario'=>$beneficiario]) }}">
				<div class="panel-body">
					{{ csrf_field() }}
          <div class="col-xs-2 col-xs-offset-10">
              <button type="submit" class="btn btn-success">Guardar</button>
              <p><strong><i class="fa fa-asterisk" aria-hidden="true"></i>Campo requerido</strong></p>
          </div>
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
				</div>
			</form>
    	</div>
    </div>
	@endsection