@extends('layouts.blank') 
@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="text-center text-uppercase">
                Editar categoria
            </h4>
        </div>
        <div class="panel-body">
            <form action="{{route('precargas.carros.update',['id'=>$categoriaCarro->id])}}" method="POST">
                {{ csrf_field()}}
                <input type="hidden" name="_method" value="put" />
                <div class="row">
                    <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <label for="">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="nombre" value="{{$categoriaCarro->nombre}}" required>
                </div>
                <div class="col-12 col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4"></div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-12 col-md-4"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection