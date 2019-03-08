@component('mail::message')
# Bienvenido a {{ config('app.name') }}

@if($transaction->cliente->tipo == 'Moral')
# Estimad@ {{$transaction->cliente->nombre}} {{$transaction->cliente->apaterno}} {{$transaction->cliente->amaterno}}:

@else
@endif

Se adjunta la cotización que usted solicito.


Saludos cordiales,

{{$transaction->cliente->vendedor->empleado->nombre." ".$transaction->cliente->vendedor->empleado->apaterno." ".$transaction->cliente->vendedor->empleado->amaterno}}

{{ config('app.name') }}
@endcomponent