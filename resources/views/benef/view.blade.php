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
      <div class="panel-body">
            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="nombreben">Nombre(s):</label>
              <dd>{{$beneficiario->nombreben}}</dd>
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="apepatben">Apellido Paterno:</label>
              <dd>{{$beneficiario->apepatben}}</dd>
            </div>
            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="apematben">Apellido Materno:</label>
              <dd>{{$beneficiario->apematben}}</dd>
            </div>
        </div>
        <div class="panel-body">
          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <label class="control-label" for="edadben">Edad:</label>
            <dd>{{$beneficiario->edadben}}</dd>
          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <label class="control-label" for="parentescoben">Parentesco:</label>
            <dd>{{$beneficiario->parentescoben}}</dd>
          </div>
          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <label class="control-label" for="telefonoben">Telefono:</label>
            <dd>{{$beneficiario->telefonoben}}</dd>
          </div>
        </div>
        <a class="btn btn-info btn-md" href="{{ route('personals.datosbeneficiario.edit', [$personal,$beneficiario]) }}">Editar</a>
        </div>
  </div>
	@endsection