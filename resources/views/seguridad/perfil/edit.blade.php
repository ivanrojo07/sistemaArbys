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
            <form action="{{ route('perfil.update', ['id' => $perfil->id]) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label class="control-label">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $perfil->nombre }}" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <tr class="info">
                                    <th colspan="3">
                                        <label class="control-label">Modulos:</label>
                                    </th>
                                </tr>
                                @php($size = 0)
                                @foreach($modulos as $modulo)
                                @if(count($modulo->componentes) > $size)
                                @php($size = count($modulo->componentes))
                                @endif
                                @endforeach
                                @php($j = 0)
                                @foreach($modulos as $modulo)
                                @if($j % 3 == 0)
                                <tr>
                                @endif
                                    @php($j++)
                                    @if(Auth::user()->perfil->id != 1 && $modulo->nombre == 'seguridad')
                                    @else
                                    <td class="col-sm-4" style="border: none; padding: 0px;">
                                        <table class="table table-hover table-bordered" style="margin-bottom: 0px; background: #fff;">
                                            <tr style="background: #f4f4f4;">
                                                <th class="col-sm-10">
                                                    <label class="control-label">{{ $modulo->nombre}}</label>
                                                </th>
                                                <td class="col-sm-2 text-center">
                                                    <input type="checkbox" id="mod{{ $j }}">
                                                </td>
                                            </tr>
                                            @php($i = 0)
                                            @foreach($modulo->componentes as $componente)
                                            <tr>
                                                <td class="col-sm-10">{{ $componente->nombre }}</td>
                                                <td class="col-sm-2 text-center">
                                                    <input type="checkbox" id="cmp{{ ++$i }}mod{{ $j }}" name="componente_id[]" value="{{ $componente->id }}"
                                                    <?php
                                                        foreach($perfil->componentes as $cmp)
                                                            if($componente->id == $cmp->id)
                                                                echo "checked";
                                                    ?>
                                                    >
                                                </td>
                                            </tr>
                                            @endforeach
                                            @if($size > count($modulo->componentes))
                                            <tr>
                                                <td colspan="2" style="height: {{ 40*($size - count($modulo->componentes)) }}px; opacity: 1.0; box-shadow: none;">
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    </td>
                                    @endif
                                 @if($j % 3 == 0)
                                </tr>
                                @endif
                                @endforeach
                            </table>
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
            @foreach($modulo->componentes as $componente)
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
            @endforeach
        @endforeach

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