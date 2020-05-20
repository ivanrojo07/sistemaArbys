@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{-- TABLA DE APERTURAS --}}
                    <div class="table-responsive">
                        <h4 class="text-center text-uppercase text-muted">APERTURAS</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            style="margin-bottom: 1em">
                            AÑADIR
                        </button>
                        @if ($aperturas->count())
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>CUOTA INICIAL</th>
                                    <th>CUOTA FINAL</th>
                                    <th>PRECIO APERTURA</th>
                                    <th>ACTUALIZAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aperturas as $apertura)
                                <tr>
                                    <td>
                                        {{$apertura->cuota_inicial}}
                                    </td>
                                    <td>
                                        {{$apertura->cuota_final}}
                                    </td>
                                    <td>
                                        {{$apertura->precio_apertura}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CREAR APERTURA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('precargas.aperturas.store')}}" method="POST">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="modal-body">
                    <div class="row">
                        {{-- INPUT CUOTA INICIAL --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">CUOTA INICIAL</label>
                            <input type="number" step="0.01" name="cuota_inicial" required class="form-control"
                                value="{{$aperturas->count() ? $aperturas->last()->cuota_final + 1 : '0.00'}}"
                                readonly>
                        </div>
                        {{-- INPUT CUOTA FINAL --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">CUOTA FINAL</label>
                            <input type="number" step="0.01" name="cuota_final" required class="form-control"
                                value="0.00" min="{{$aperturas->count() ? $aperturas->last()->cuota_final + 1 : 0}}">
                        </div>
                        {{-- APERTURA --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">PRECIO APERTURA</label>
                            <input type="number" step="0.01" name="precio_apertura" required class="form-control"
                                value="0.00">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">GUARDAR</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection