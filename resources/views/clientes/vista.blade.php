<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>

<div class="container-fluid">
  <img src="img/header.jpg">
  <h3> Cotización:&nbsp;&nbsp;&nbsp; <strong>{{$producto->descripcion}}&nbsp;&nbsp;&nbsp;{{$producto->marca}}</strong> </h3>            
  
  <div class="container">
    <div class="row">
      <div class="col-sm-offset-2">
        <h4><strong>Clave:</strong>&nbsp;&nbsp;&nbsp;<dd>{{$producto->clave}}</dd></h4>
      </div>
       <div class="col-sm-offset-2">
        <h4><strong>Precio:</strong>&nbsp;&nbsp;&nbsp;<dd>${{number_format($producto->precio_lista,2)}}</dd></h4>
      </div>
       <div class="col-sm-offset-2">
        <h4><strong>Precio de Apertura:</strong>&nbsp;&nbsp;&nbsp;<dd>${{number_format($producto->apertura,2)}}</dd></h4>
      </div>
       <div class="col-sm-offset-2">
        <h4><strong>Pago Inicial:</strong>&nbsp;&nbsp;&nbsp;<dd>${{number_format($producto->inicial,2)}}</dd></h4>
      </div>
       <div class="col-sm-offset-2">
        <h4><strong>Mensualidad:</strong>&nbsp;&nbsp;&nbsp;<dd>
          @if($cliente->tipopersona=='Fisica')
          ${{number_format($producto->mensualidad_p_fisica,2)}}
          @else
          ${{number_format($producto->mensualidad_p_moral,2)}}
          @endif
        </dd>
        </h4>
      </div>
    </div>
  </div>
  
  
</div>



</body>
</html>
