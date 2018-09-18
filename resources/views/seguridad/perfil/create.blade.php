@extends('layouts.blank')
@section('content')

<div class="container">
    <div class="panel panel-group">
        <div class="panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-4">
                        <h4>Datos del Perfil:</h4>
                    </div>
                    @foreach(Auth::user()->perfil->componentes as $componente)
                    @if($componente->nombre == 'indice perfiles')
                    <div class="col-sm-4 text-center">
                        <a href="{{ route('perfil.index') }}"><button class="btn btn-primary"><strong><i class="fa fa-eye" aria-hidden="true"></i> Ver Perfiles</strong></button></a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <form action="{{ route('perfil.store') }}" method="post">    
            {{ csrf_field() }}
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php $j = 0 ?>
                            @foreach($modulos as $modulo)
                                <?php if($j % 3 == 0) { ?>
                                    <div class="row">
                                <?php } ?>
                                <?php $j++; ?>
                                <div class="col-sm-4">
                                    <label class="control-label">{{ $modulo->nombre}}</label>
                                    <input type="checkbox" id="mod{{ $j }}">
                                    <?php $i = 0; ?>
                                    @foreach($modulo->componentes as $componente)
                                        <div class="col-sm-12">
                                            <div class="col-sm-offset-2 col-sm-7">{{ $componente->nombre}}</div>
                                            <input class="col-sm-1" type="checkbox" id="cmp{{ ++$i }}mod{{ $j }}" name="componente_id[]" value="{{ $componente->id }}">
                                        </div>
                                    @endforeach
                                </div>
                                <?php if($j % 3 == 0) { ?>
                                    </div>
                                <?php } ?>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 text-center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        <?php $j = 0; ?>
        @foreach($modulos as $modulo)
            <?php $j++; ?>
            <?php $i = 0; ?>
            $('#mod{{ $j }}').change(function() {
                if($('#mod{{ $j }}').prop('checked')) {
                    <?php $i = 0; ?>
                    @foreach($modulo->componentes as $componente)
                        $('#cmp{{ ++$i }}mod{{ $j }}').prop('checked', true);
                        console.log('cmp{{ $i }}');
                    @endforeach
                } else {
                    <?php $i = 0; ?>    
                    @foreach($modulo->componentes as $componente)
                        $('#cmp{{ ++$i }}mod{{ $j }}').prop('checked', false);
                        console.log('cmp{{ $i }}');
                    @endforeach
                }
            });
        @endforeach

        <?php $j = 0; ?>
        @foreach($modulos as $modulo)
            <?php $j++; ?>
            <?php $i = 0; ?>
            @foreach($modulo->componentes as $componente)
                $('#cmp{{ ++$i }}mod{{ $j }}').change(function() {
                    if($('#cmp1mod{{ $j }}').prop('checked')
                    <?php $k = 0; ?>
                    @foreach($modulo->componentes as $componente)
                        @if($k == 0)
                            <?php $k++; ?>
                        @else
                            && $('#cmp{{ ++$k }}mod{{ $j }}').prop('checked')
                        @endif
                    @endforeach
                    ) {
                        $('#mod{{ $j }}').prop('checked', true);
                    } else {
                        $('#mod{{ $j }}').prop('checked', false);
                    }
                });
            @endforeach
        @endforeach
    });
</script>

@endsection