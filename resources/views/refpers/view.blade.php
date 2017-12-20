@extends('layouts.infopersonal')
	@section('personal')
    <ul role="tablist" class="nav nav-tabs">
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.show',['personal'=>$personal]) }}" class="">Dirección/Domicilio:</a></li>
      @if ($personal->tipo == 'Cliente')
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datoslaborales.index',['personal'=>$personal]) }}" class="">Datos Laborales:</a></li>
      <li class="active"><a href="{{ route('personals.referenciapersonales.index',['personal'=>$personal]) }}" class="">Referencias Personales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datosbeneficiario.index',['personal'=>$personal]) }}" class="">Datos de Beneficiarios:</a></li>
      @endif
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.producto.index',['personal'=>$personal]) }}" class="">Productos:</a></li>
      <li class=""><a href="{{ route('personals.product.index',['personal'=>$personal]) }}" class="">Productos seleccionados:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.crm.index',['personal'=>$personal]) }}" class="">C.R.M.:</a></li>
  </ul>
    <div class="panel-default">
      <div class="panel-heading">Referencia Personales</div>
      <div class="panel-body">
        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="tipo">Nombre:</label>
              <dd>{{ $refpersonal->nombre}}</dd>
        </div>
        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="tipo">Apellido Paterno:</label>
              <dd>{{ $refpersonal->apepat}}</dd>
        </div>
        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="tipo">Apellido Materno:</label>
              <dd>{{ $refpersonal->apemat}}</dd>
        </div>
        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <label class="control-label" for="tipo">Telefonos:</label>
              <dd>#1: {{ $refpersonal->telefono1}}</dd>
              @if ($refpersonal->telefono2 != null)
                <dd>#2: {{$refpersonal->telefono2}}</dd>
              @endif
              @if ($refpersonal->telefono3 != null)
                <dd>#3: {{$refpersonal->telefono3}}</dd>
              @endif
          </div>
          <a class="btn btn-info btn-md" href="{{ route('personals.referenciapersonales.edit', [$personal,$refpersonal]) }}">Editar</a>
      </div>
    </div>
	@endsection