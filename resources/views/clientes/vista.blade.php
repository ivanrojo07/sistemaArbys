<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>

<div class="container">
  <img src="img/header.jpg">
  <h4> Cotización</h4>            
  
  <header>
    <div class="row">
      <div class="col-sm-2">
      	<h4><strong>Cliente:</strong></h4>
      	<label>{{$cliente->nombre}}&nbsp;&nbsp;&nbsp;{{$cliente->apellidopaterno}}&nbsp;&nbsp;&nbsp;{{$cliente->apellidomaterno}}</label>
      </div>
    </div>
  </header>
  <section>
  	<div class="row">
  		<div class="col-sm-4 col-sm-offset-6">
  			<h4>Productos Elegidos:</h4>
  		</div>
  	</div>
  	@foreach($cliente->transactions as $tr)
  	<div class="row">
  		<div class="col-sm-3">{{$tr->product->descripcion}}</div>
  	</div>
  	@endforeach
  </section>
  <section>
  	<table class="table">
  		<thead>
  			<tr>
  				<th>Clave</th>
  				<th>Marca</th>
  				<th>Descripción</th>
  				<th>Precio</th>
  				<th>Apertura</th>
  				<th>Pago Inicial</th>
  				<th>Mensualidad</th>
  			</tr>
  		</thead>
  		<tbody>
  		 @foreach($cliente->transactions as $tr)
  			<td>{{$tr->product->clave}}</td>
  			<td>{{$tr->product->marca}}</td>
  			<td>{{$tr->product->descripcion}}</td>
  			<td>{{$tr->product->precio}}</td>
  			<td>{{$tr->product->apertura}}</td>
  			<td>{{$tr->product->inicial}}</td>
  			@if($cliente->tipopersona=='Fisica')
  			<td>{{$tr->product->descripcion}}</td>
  			@else
  			<td>{{$tr->id}}</td>
  			@endif
  		@endforeach
  		</tbody>
  	</table>
  </section>
</div>



</body>
</html>
