@extends('layouts.infopersonal')
	@section('personal')
	<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#">Dirección/Domicilio:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Datos Laborales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Referencias Personales:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">Datos de Beneficiarios:</a></li>
      <li class="active"><a href="" class="ui-tabs-anchor">Productos:</a></li>
      <li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="" class="ui-tabs-anchor">C.R.M.:</a></li>
    </ul>
    <div class="panel-default">
    	<div class="panel-heading">Productos del Cliente</div>
    	<div class="panel-body">
    		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51);border-collapse: collapse;margin-bottom: 0px;">
    			<thead>
    				<tr class="info">
    					<th>Productos</th>
    					<th>Meses</th>
    					<th>Costo</th>
    					<th>Operaciones</th>
    				</tr>
    			</thead>
    			
    				<tr class="active">
    					<td>Versa</td>
    					<td>12</td>
    					<td>$255,000.00</td>
    					<td>
    						<a class="btn btn-success btn-sm" href="">Ver</a>
							<a class="btn btn-info btn-sm" href="">Editar</a>
    					</td>
    				</tr>
    		</table>
    	</div>
    </div>			
	@endsection