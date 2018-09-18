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
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label class="control-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $perfil->nombre }}" readonly="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <table class="table table-bordered">
                            <tr>
                                <th class="info" colspan="2">
                                    <label class="control-label">Modulos:</label>
                                </th>
                            </tr>
                            <?php $j = 0 ?>
                            @foreach($modulos as $modulo)
                                <?php $j++; ?>
                                @if(Auth::user()->perfil->id != 1 && $modulo->nombre == 'seguridad')
                                @else
                                    <tr style="background: #f4f4f4;">
                                        <td>
                                            {{ $modulo->nombre}}
                                        </td>
                                        <td>
                                            <input type="checkbox" id="mod{{ $j }}" disabled="">
                                        </td>
                                    </tr>
                                    <?php $i = 0; ?>
                                    @foreach($modulo->componentes as $componente)
                                        <tr>
                                            <td>
                                                {{ $componente->nombre}}
                                            </td>
                                            <td>
                                                <input type="checkbox" id="cmp{{ ++$i }}mod{{ $j }}" name="componente_id[]" value="{{ $componente->id }}"
                                                <?php
                                                    foreach($perfil->componentes as $cmp)
                                                        if($componente->id == $cmp->id)
                                                            echo "checked";
                                                ?>
                                                 disabled="">
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                @foreach(Auth::user()->perfil->componentes as $componente)
                @if($componente->nombre == 'editar perfil')
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 text-center">
                        <a href="{{ route('perfil.edit', ['id' => $perfil->id]) }}"><button class="btn btn-warning"><i class="fa fa-check-pencil" aria-hidden="true"></i> Editar</button></a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
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
    });
</script>
    
@endsection