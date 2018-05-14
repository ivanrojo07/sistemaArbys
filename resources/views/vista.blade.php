<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>

<div class="container">
  <h2>Rounded Corners</h2>
  <p>The .rounded class adds rounded corners to an image:</p>            
  
  <main>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-4"><h1>Docuemnto PDF </h1></div>
    </div>
  </main>
</div>

@foreach($clientes as $cliente)
{{$cliente->nombre}}<br>
@if($cliente->info!=null)
{{$cliente->info->ingreso}}<br><br>
@else
<br>
@endif
@endforeach

</body>
</html>
