@extends('layouts.pagos')
@section('content1')

	<legend style="background-color:#730099;color: white;text-align: center;">
	<strong> Pagos </strong>&nbsp;&nbsp; &nbsp;&nbsp;Cliente:<strong> &nbsp;&nbsp;{{$cliente->nombre}}&nbsp;&nbsp;{{$cliente->apellidopaterno}}&nbsp;&nbsp;{{$cliente->apellidomaterno}}</strong> &nbsp;&nbsp; &nbsp;&nbsp; ID: &nbsp;&nbsp;<strong>{{$cliente->identificador}}</strong>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<strong>{{date('d-M-Y')}}</strong>
</legend>
<div class="container">
  <div class="row">	
  	<div class="col-sm-6">
  		<legend>&nbsp;&nbsp;Productos Elegídos:</legend>
  		<fieldset class="fset">
			
			@foreach($cliente->transactions as $tran)
		    <nav aria-label="breadcrumb">
			  <ol class="breadcrumb alert alert-info" id="{{$tran->product->descripcion}}">
			    <li class="breadcrumb-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top">{{$tran->product->descripcion}}</a></li>
			    <li class="breadcrumb-item"><a href="#">${{number_format($tran->product->precio_lista,2)}}</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><span class="label label-success btn" onclick="append('{{$tran->product->descripcion}}','${{number_format($tran->product->precio_lista,2)}}','{{$tran->product->id}}')" >Seleccionar</span></li>
			  </ol>
			</nav>
			@endforeach
		</fieldset>
  	</div>
	<div class="col-sm-6">
		<legend>&nbsp;&nbsp;Producto a Pagar:</legend>
  		<fieldset class="fset">
			<nav aria-label="breadcrumb" id="seleccionados">
			</nav>
		</fieldset>
  	</div>
  </div><br>
  <div class="row">
  	<div class="col-sm-3 col-sm-offset-2 form-group">
  		<label class="control-label"><strong>Tipo de Identificación</strong></label>
  		<select class="form-control">
  			<option>uno</option>
  		</select>
  	</div>
  </div>
</div>

@endsection