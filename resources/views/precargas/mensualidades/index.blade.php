@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{-- TABLA DE MENSUALIDADES DE MOTOS --}}
                    <div class="table-responsive">
                        <h4 class="text-center text-uppercase text-muted">MENSUALIDADES EN MOTOS</h4>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>MESES</th>
                                    <th>FACTOR DE ACTUALIZACIÓN</th>
                                    <th>MONTO MÍNIMO</th>
                                    <th>ACTUALIZAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mensualidadesMotos as $mensualidad)
                                <tr>
                                    <td>
                                        {{$mensualidad->meses}}
                                    </td>
                                    <td>
                                        {{$mensualidad->factor_actualizacion}}%
                                    </td>
                                    <td>
                                        ${{ number_format( $mensualidad->monto_minimo, 2,'.', ',' ) }}
                                    </td>
                                    <td>
                                        <a href="{{route('precargas.mensualidades.edit',['mensualidad'=>$mensualidad->id])}}"
                                            class="btn btn-warning btn-sm">
                                            editar
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- TABLA DE MENSUALIDADES DE CARROS --}}
                    <div class="table-responsive">
                        <h4 class="text-center text-uppercase text-muted">MENSUALIDADES EN CARROS</h4>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>MESES</th>
                                    <th>FACTOR DE ACTUALIZACIÓN</th>
                                    <th>MONTO MINIMO</th>
                                    <th>ACTUALIZAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mensualidadesCarros as $mensualidad)
                                <tr>
                                    <td>
                                        {{$mensualidad->meses}}
                                    </td>
                                    <td>
                                        {{$mensualidad->factor_actualizacion}}%
                                    </td>
                                    <td>
                                        ${{ number_format( $mensualidad->monto_minimo, 2,'.', ',' ) }}
                                    </td>
                                    <td>
                                        <a href="{{route('precargas.mensualidades.edit',['mensualidad'=>$mensualidad->id])}}"
                                            class="btn btn-warning btn-sm">
                                            editar
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection