@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    MENSUALIDADES
                </div>
                <div class="panel-body">
                    <form action="{{route('precargas.mensualidades.update',['mensualidad'=>$mensualidad->id])}}" method="POST">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <input type="hidden" name="_method" value="put" />
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <label for="">Meses</label>
                                <input type="text" class="form-control" readonly value="{{$mensualidad->meses}}">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="">Factor de actualziación</label>
                                <input type="text" class="form-control" name="factor_actualizacion" required
                                    value="{{$mensualidad->factor_actualizacion}}">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="">Monto minimo</label>
                                <input type="text" name="monto_minimo" class="form-control" required value="{{$mensualidad->monto_minimo}}">
                            </div>
    
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-success">
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection