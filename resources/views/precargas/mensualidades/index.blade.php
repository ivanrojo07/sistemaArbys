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
                    {{-- TABLA DE MENSUALIDADES DE CASAS --}}
                    <div class="table-responsive">
                        <h4 class="text-center text-uppercase text-muted">MENSUALIDADES EN CASAS</h4>
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
                                @foreach ($mensualidadesCasas as $mensualidad)
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
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"># MOV.</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historialMensualidades as $historial)
                            <tr>
                                <th scope="row">{{$historial->id}}</th>
                                <td>{{$historial->user->empleado->nombre_completo}}</td>
                                <td>{{$historial->descripcion}}</td>
                                <td>{{$historial->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection