@extends('layouts.blank')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="text-center text-uppercase">
                NUEVA CATEGORIA    
            </h4>    
        </div>
        <div class="panel-body">
            <form action="{{route('precargas.motos.store')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12">
                            {{ csrf_field()}}
                            <div class="col-12 col-md-4"></div>
                            <div class="col-12 col-md-4">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="col-12 col-md-4"></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-4"></div>
                    <div class="col-12 col-md-4">
                            <button type="submit" class="btn btn-succes">GUARDAR</button>
                    </div>
                    <div class="col-12 col-md-4"></div>
                </div>
                
            </form>
        </div>  
    </div>    
@endsection