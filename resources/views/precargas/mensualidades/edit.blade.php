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
                    <form action="{{route('precargas.mensualidades.update',['mensualidad'=>$mensualidad->id])}}"
                        method="POST">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <input type="hidden" name="_method" value="put" />
                        <div class="row">

                            {{--  --}}
                            <div class="col-xs-12 col-md-6">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="">Meses</label>
                                        <input type="text" class="form-control" readonly
                                            value="{{$mensualidad->meses}}">
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="">Monto minimo</label>
                                        <input type="text" name="monto_minimo" class="form-control" required
                                            value="{{$mensualidad->monto_minimo}}">
                                    </div>
                                </div>
                            </div>

                            {{--  --}}
                            <div class="col-xs-12 col-md-6">
                                <div class="row">
                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <label for="">Aportación</label>
                                        <input type="number" step="0.01" value="{{$mensualidad->aportacion}}" min="0.00"
                                            class="form-control inputParaCalcularFactorActualizacion" name="aportacion"
                                            required>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <label for="">Gastos de administracion</label>
                                        <input type="number" step="0.01" value="{{$mensualidad->gastos_administracion}}"
                                            min="0.00" class="form-control inputParaCalcularFactorActualizacion"
                                            name="gastos_administracion" required>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <label for="">IVA GDA</label>
                                        <input type="number" step="0.01" value="{{$mensualidad->iva_gda}}" min="0.00"
                                            class="form-control inputParaCalcularFactorActualizacion" name="iva_gda"
                                            required>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <label for="">Seguro de vida</label>
                                        <input type="number" step="0.01" value="{{$mensualidad->seguro_vida}}"
                                            min="0.00" class="form-control inputParaCalcularFactorActualizacion"
                                            name="seguro_vida" required>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <label for="">% Compensatorio</label>
                                        <input type="number" step="0.01" value="{{$mensualidad->porcentaje_compensatorio}}" min="0.00"
                                            class="form-control inputParaCalcularFactorActualizacion" 
                                            name="porcentaje_compensatorio" required>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 1em;">
                                        <label for="">Factor de actualziación</label>
                                        <input id="inputFactorActualizacion" type="number" step="0.01"
                                            class="form-control" name="factor_actualizacion" readonly
                                            value="{{$mensualidad->factor_actualizacion}}">
                                    </div>
                                </div>
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

<script>
    class FactorActualizacion{

    static calcular(){
        return $('.inputParaCalcularFactorActualizacion').map( 
            function(idx, element){
                const valor = parseFloat( $(element).val() )
                return isNaN( valor ) ? 0 : valor;
            } )
        .get()
        .reduce( ( a, b ) => a + b, 0 );
    }

    static actualizar(){
        $('#inputFactorActualizacion').val( this.calcular() )
    }

}

$(document).on('change', '.inputParaCalcularFactorActualizacion', function(){

    elements = FactorActualizacion.actualizar()
})

</script>

@endsection