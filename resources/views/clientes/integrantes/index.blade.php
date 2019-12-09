@extends('layouts.blank')
@section('content')

{{-- {{dd($integrante)}} --}}
<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            Integrante
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <label for="identificacion">identificación</label>
                    <input type="text" class="form-control" value="{{$integrante->identificacion}}">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <label for="num_identificacion">Núm. identificación</label>
                    <input type="text" class="form-control" value="{{$integrante->num_identificacion}}">
                </div>
            </div>
        </div>
    </div>

</div>

@endsection