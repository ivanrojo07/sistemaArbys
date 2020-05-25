@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{-- TABLA DE APERTURAS DE MOTOS --}}
                    <div class="table-responsive">
                        <h4 class="text-center text-uppercase text-muted">APERTURAS DE MOTOS</h4>
                        <button type="button" class="btn btn-primary botonAnadirApertura" data-toggle="modal"
                            data-target="#exampleModal" style="margin-bottom: 1em" categoria="motos"
                            siguiente_cuota="{{$aperturasMotos->count() ? $aperturasMotos->last()->cuota_final + 1 : '0.00'}}">
                            AÑADIR
                        </button>
                        @if ($aperturasMotos->count())
                        <table class="table table-striped table-bordered table-hover" id="tablaAperturaMotos">
                            <thead class="thead-dark">
                                <tr>
                                    <th>CUOTA INICIAL</th>
                                    <th>CUOTA FINAL</th>
                                    <th>PRECIO APERTURA</th>
                                    <th>ACTUALIZAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aperturasMotos as $apertura)
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
                                    <td class="text-center">
                                        <button class="btn btn-warning botonActualizarApertura" categoria="motos"
                                            precio-apertura="{{$apertura->precio_apertura}}"
                                            cuota-inicial="{{$apertura->cuota_inicial}}"
                                            cuota-final="{{$apertura->cuota_final}}" apertura-id="{{$apertura->id}}"
                                            data-toggle="modal" data-target="#modalEditarApertura">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>

                    {{-- TABLA DE APERTURAS DE CARROS --}}
                    <div class="table-responsive">
                        <h4 class="text-center text-uppercase text-muted">APERTURAS DE CARROS</h4>
                        <button type="button" class="btn btn-primary botonAnadirApertura" data-toggle="modal"
                            data-target="#exampleModal" style="margin-bottom: 1em" categoria="carros"
                            siguiente_cuota="{{$aperturasCarros->count() ? $aperturasCarros->last()->cuota_final + 1 : '0.00'}}">
                            AÑADIR
                        </button>
                        @if ($aperturasCarros->count())
                        <table class="table table-striped table-bordered table-hover" id="tablaAperturaCarros">
                            <thead class="thead-dark">
                                <tr>
                                    <th>CUOTA INICIAL</th>
                                    <th>CUOTA FINAL</th>
                                    <th>PRECIO APERTURA</th>
                                    <th>ACTUALIZAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aperturasCarros as $apertura)
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
                                        <button class="btn btn-warning botonActualizarApertura" categoria="carros"
                                            precio-apertura="{{$apertura->precio_apertura}}"
                                            cuota-inicial="{{$apertura->cuota_inicial}}"
                                            cuota-final="{{$apertura->cuota_final}}" apertura-id="{{$apertura->id}}"
                                            data-toggle="modal" data-target="#modalEditarApertura">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>

                    {{-- TABLA DE APERTURAS DE CASAS --}}
                    <div class="table-responsive">
                        <h4 class="text-center text-uppercase text-muted">APERTURAS DE CASAS</h4>
                        <button type="button" class="btn btn-primary botonAnadirApertura" data-toggle="modal"
                            data-target="#exampleModal" style="margin-bottom: 1em" categoria="casas"
                            siguiente_cuota="{{$aperturasCasas->count() ? $aperturasCasas->last()->cuota_final + 1 : '0.00'}}">
                            AÑADIR
                        </button>
                        @if ($aperturasCasas->count())
                        <table class="table table-striped table-bordered table-hover" id="tablaAperturaCasas">
                            <thead class="thead-dark">
                                <tr>
                                    <th>CUOTA INICIAL</th>
                                    <th>CUOTA FINAL</th>
                                    <th>PRECIO APERTURA</th>
                                    <th>ACTUALIZAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aperturasCasas as $apertura)
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
                                        <button class="btn btn-warning botonActualizarApertura" categoria="casas"
                                            precio-apertura="{{$apertura->precio_apertura}}"
                                            cuota-inicial="{{$apertura->cuota_inicial}}"
                                            cuota-final="{{$apertura->cuota_final}}" apertura-id="{{$apertura->id}}"
                                            data-toggle="modal" data-target="#modalEditarApertura">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
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

<!-- MODAL CREAR APERTURA -->
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
                        {{-- INPUT CATEGORIA --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">CATEGORIA</label>
                            <input type="text" name="categoria" required class="form-control inputCategoria" readonly>
                        </div>
                        {{-- INPUT CUOTA INICIAL --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">CUOTA INICIAL</label>
                            <input type="number" step="0.01" name="cuota_inicial" required
                                class="form-control inputCuotaInicial" value="" readonly>
                        </div>
                        {{-- INPUT CUOTA FINAL --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">CUOTA FINAL</label>
                            <input type="number" step="0.01" name="cuota_final" required
                                class="form-control inputCuotaFinal" value="0.00">
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

<!-- MODAL EDITAR APERTURA -->
<div class="modal fade" id="modalEditarApertura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR APERTURA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('precargas.aperturas.update')}}" method="POST">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input name="_method" type="hidden" value="PUT">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control inputAperturaId" name="apertura_id">
                        {{-- INPUT CATEGORIA --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">CATEGORIA</label>
                            <input type="text" name="categoria" required class="form-control inputEditarCategoria"
                                readonly>
                        </div>
                        {{-- INPUT CUOTA INICIAL --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">CUOTA INICIAL</label>
                            <input type="number" step="0.01" name="cuota_inicial" required
                                class="form-control inputEditarCuotaInicial" readonly>
                        </div>
                        {{-- INPUT CUOTA FINAL --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">CUOTA FINAL</label>
                            <input type="number" step="0.01" name="cuota_final" required
                                class="form-control inputEditarCuotaFinal">
                        </div>
                        {{-- APERTURA --}}
                        <div class="col-xs-12" style="margin-top:1em">
                            <label for="">PRECIO APERTURA</label>
                            <input type="number" step="0.01" name="precio_apertura" required
                                class="form-control inputEditarPrecioApertura">
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

@section('scripts')

<script>
    $(document).on('click', '.botonAnadirApertura', function(){
        const categoria = $(this).attr('categoria');
        const siguiente_cuota = $(this).attr('siguiente_cuota');

        $('.inputCategoria').val( categoria );
        $('.inputCuotaInicial').val( siguiente_cuota );
    });

    $(document).on('click','.botonActualizarApertura', function(){
        const categoria = $(this).attr('categoria');
        const cuotaInicial = $(this).attr('cuota-inicial');
        const cuotaFinal = $(this).attr('cuota-final');
        const precioApertura = $(this).attr('precio-apertura');
        const aperturaId = $(this).attr('apertura-id');

        $('.inputAperturaId').val( aperturaId );
        $('.inputEditarCategoria').val( categoria );
        $('.inputEditarCuotaInicial').val( cuotaInicial );
        $('.inputEditarCuotaFinal').val( cuotaFinal );
        $('.inputEditarPrecioApertura').val( precioApertura );
    });
    
</script>

<script>
    $(document).ready( function () {
	    $('#tablaAperturaMotos').DataTable({
            pageLength: 5,
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
        });
	} );

    $(document).ready( function () {
	    $('#tablaAperturaCasas').DataTable({
            pageLength: 5,
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
        });
	} );

    $(document).ready( function () {
	    $('#tablaAperturaCarros').DataTable({
            pageLength: 5,
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
        });
	} );
</script>
@endsection