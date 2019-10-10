@component('mail::message')
# ¡Bienvenido a Arbys!

@if($transaction->cliente->tipo == 'Moral')
# Estimad@ {{$transaction->cliente->razon}}:

@else
# Estimad@ {{$transaction->cliente->nombre}} {{$transaction->cliente->apaterno}} {{$transaction->cliente->amaterno}}:
@endif

Se adjunta la cotización que usted solicito.


Saludos cordiales,

{{$transaction->cliente->vendedor->empleado->nombre." ".$transaction->cliente->vendedor->empleado->appaterno." ".$transaction->cliente->vendedor->empleado->apmaterno}}

Arbys
@endcomponent