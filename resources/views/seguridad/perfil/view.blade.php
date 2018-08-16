<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('bootstrap-toggle/css/bootstrap-toggle.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
        {{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
        <!-- Optional theme -->
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <!-- Latest compiled and minified JavaScript -->
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
        {{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
         <!-- Custom Fonts -->
        <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
         {{-- <link rel="stylesheet" href="{{ asset('css/main.js') }}"> --}}
         <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <script src="{{ asset('js/peticion.js') }}"></script>
         <script src="{{ asset('js/cliente.js') }}"></script>
    </head>
	<body>
		<div class="container">
			<div class="panel panel-group">
				<div class="panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-4">
								<h4>Datos del Perfil:</h4>
							</div>
                            <div class="col-sm-4 text-center">
                                <a href="{{ route('perfil.index') }}"><button class="btn btn-primary"><strong><i class="fa fa-eye" aria-hidden="true"></i> Ver Perfiles</strong></button></a>
                            </div>
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
                                <label class="control-label">Modulos:</label>
                                <?php $i = 1; ?>
                                @foreach($modulos as $modulo)
                                <div class="row">
                                    <div class="col-sm-4 text-right">
                                        {{ $modulo->nombre }}
                                    </div>
                                    <div class="col-sm-4 text-left">
                                        <input type="checkbox" name="modulo_id[]" value="{{ $modulo->id }}"
                                        <?php
                                            foreach($perfil->modulos as $mod)
                                                if($modulo->id == $mod->id)
                                                    echo "checked";
                                        ?>
                                        disabled="">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4 text-center">
                                <a href="{{ route('perfil.edit', ['id' => $perfil->id]) }}"><button class="btn btn-warning"><i class="fa fa-check-pencil" aria-hidden="true"></i> Editar</button></a>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</body>
</html>