@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class=""><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>

			<li role="presentation" class="active"><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
		</ul>
	</div>
	<div class="panel-default">
		<div class="panel-heading"><h5>Estudios:
		&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></div>
		<div class="panel-body">
			@if ($edit == true)
				{{-- expr --}}
				<form role="form" method="POST" action="{{ route('empleados.estudios.update',['estudios'=>$estudios,'empleado'=>$empleado]) }}">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT">
			@else
				<form role="form" method="POST" action="{{ route('empleados.estudios.store',['empleado'=>$empleado]) }}">
					{{ csrf_field() }}
					<input type="hidden" name="empleado_id" value="{{$empleado->id}}">  
			@endif
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="escolaridad1" id="lbl_escolaridad1"><i class="fa fa-asterisk" aria-hidden="true"></i>Escolaridad 1:</label>
						<select type="select" name="escolaridad1" class="form-control" id="escolaridad1">
							<option id="1" value="Primaria" @if ($estudios->escolaridad1 == "Primaria")
								{{-- expr --}}
								selected="selected" 
							@endif>Primaria</option>
							<option id="2" value="Secundaria" @if ($estudios->escolaridad1 == "Secundaria")
								{{-- expr --}}
								selected="selected" 
							@endif>Secundaria</option>
	    					<option id="3" value="Preparatoria" @if ($estudios->escolaridad1 == "Preparatoria")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Preparatoria</option>
	    					<option id="4" value="Carrera" @if ($estudios->escolaridad1 == "Carrera")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Carrera</option>
							<option id="5" value="Maestría" @if ($estudios->escolaridad1 == "Maestría")
								{{-- expr --}}
								selected="selected" 
							@endif>Maestría</option>
	    					<option id="6" value="Doctorado" @if ($estudios->escolaridad1 == "Doctorado")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Doctorado</option>
	    					<option id="7" value="Diplomado" @if ($estudios->escolaridad1 == "Diplomado")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Diplomado</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="institucion1" id="lbl_inst1">Institución:</label>
						<input type="text" class="form-control" id="institucion1" name="institucion1" value="{{ $estudios->institucion1 }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="cedula1" id="lbl_cedula"><i class="fa fa-asterisk" aria-hidden="true"></i>Número de Cédula:</label>
						<input type="text" class="form-control" id="cedula1" name="cedula1" value="{{ $estudios->cedula1 }}">
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="escolaridad2" id="lbl_escolaridad2"><i class="fa fa-asterisk" aria-hidden="true"></i>Escolaridad 2:</label>
						<select type="select" name="escolaridad2" class="form-control" id="escolaridad2">
							<option id="1" value="Primaria" @if ($estudios->escolaridad1 == "Primaria")
								{{-- expr --}}
								selected="selected" 
							@endif>Primaria</option>
							<option id="2" value="Secundaria" @if ($estudios->escolaridad1 == "Secundaria")
								{{-- expr --}}
								selected="selected" 
							@endif>Secundaria</option>
	    					<option id="3" value="Preparatoria" @if ($estudios->escolaridad1 == "Preparatoria")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Preparatoria</option>
	    					<option id="4" value="Carrera" @if ($estudios->escolaridad1 == "Carrera")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Carrera</option>
							<option id="5" value="Maestría" @if ($estudios->escolaridad1 == "Maestría")
								{{-- expr --}}
								selected="selected" 
							@endif>Maestría</option>
	    					<option id="6" value="Doctorado" @if ($estudios->escolaridad1 == "Doctorado")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Doctorado</option>
	    					<option id="7" value="Diplomado" @if ($estudios->escolaridad1 == "Diplomado")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Diplomado</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="institucion2" id="lbl_inst2">Institución:</label>
						<input type="text" class="form-control" id="institucion2" name="institucion2" value="{{ $estudios->institucion2 }}">
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="cedula2" id="lbl_cedula2"><i class="fa fa-asterisk" aria-hidden="true"></i>Número de Cédula:</label>
						<input type="text" class="form-control" id="cedula2" name="cedula2" value="{{ $estudios->cedula2 }}">
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="idioma1" id="lbl_idioma">Idioma:</label>
						<select type="select" name="idioma1" class="form-control" id="idioma1">
							<option id="1" value="Inglés" @if ($estudios->idioma1 == "Inglés")
								{{-- expr --}}
								selected="selected" 
							@endif>Inglés</option>
							<option id="2" value="Frances" @if ($estudios->idioma1 == "Frances")
								{{-- expr --}}
								selected="selected" 
							@endif>Frances</option>
	    					<option id="3" value="Portugues" @if ($estudios->idioma1 == "Portugues")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Portugues</option>
	    					<option id="4" value="Aleman" @if ($estudios->idioma1 == "Aleman")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Aleman</option>
							<option id="5" value="Italiano" @if ($estudios->idioma1 == "Italiano")
								{{-- expr --}}
								selected="selected" 
							@endif>Italiano</option>
	    					<option id="6" value="Chino" @if ($estudios->idioma1 == "Chino")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Chino</option>
	    					<option id="7" value="Japones" @if ($estudios->idioma1 == "Japones")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Japones</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="nivel1" id="lbl_nivel">Nivel:</label>
						<select type="select" name="nivel1" class="form-control" id="nivel1">
							<option id="1" value="Básico" @if ($estudios->nivel1 == "Básico")
								{{-- expr --}}
								selected="selected" 
							@endif>Básico</option>
							<option id="2" value="Medio" @if ($estudios->nivel1 == "Medio")
								{{-- expr --}}
								selected="selected" 
							@endif>Medio</option>
	    					<option id="3" value="Alto" @if ($estudios->nivel1 == "Alto")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Alto</option>
						</select>
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="idioma2" id="lbl_idioma">Idioma:</label>
						<select type="select" name="idioma2" class="form-control" id="idioma2">
							<option id="1" value="Inglés" @if ($estudios->idioma2 == "Inglés")
								{{-- expr --}}
								selected="selected" 
							@endif>Inglés</option>
							<option id="2" value="Frances" @if ($estudios->idioma2 == "Frances")
								{{-- expr --}}
								selected="selected" 
							@endif>Frances</option>
	    					<option id="3" value="Portugues" @if ($estudios->idioma2 == "Portugues")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Portugues</option>
	    					<option id="4" value="Aleman" @if ($estudios->idioma2 == "Aleman")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Aleman</option>
							<option id="5" value="Italiano" @if ($estudios->idioma2 == "Italiano")
								{{-- expr --}}
								selected="selected" 
							@endif>Italiano</option>
	    					<option id="6" value="Chino" @if ($estudios->idioma2 == "Chino")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Chino</option>
	    					<option id="7" value="Japones" @if ($estudios->idioma2 == "Japones")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Japones</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="nivel2" id="lbl_nivel">Nivel:</label>
						<select type="select" name="nivel2" class="form-control" id="nivel2">
							<option id="1" value="Básico" @if ($estudios->nivel2 == "Básico")
								{{-- expr --}}
								selected="selected" 
							@endif>Básico</option>
							<option id="2" value="Medio" @if ($estudios->nivel2 == "Medio")
								{{-- expr --}}
								selected="selected" 
							@endif>Medio</option>
	    					<option id="3" value="Alto" @if ($estudios->nivel2 == "Alto")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Alto</option>
						</select>
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-3">
						<label class="control-label" for="idioma3" id="lbl_idioma">Idioma:</label>
						<select type="select" name="idioma3" class="form-control" id="idioma3">
							<option id="1" value="Inglés" @if ($estudios->idioma3 == "Inglés")
								{{-- expr --}}
								selected="selected" 
							@endif>Inglés</option>
							<option id="2" value="Frances" @if ($estudios->idioma3 == "Frances")
								{{-- expr --}}
								selected="selected" 
							@endif>Frances</option>
	    					<option id="3" value="Portugues" @if ($estudios->idioma3 == "Portugues")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Portugues</option>
	    					<option id="4" value="Aleman" @if ($estudios->idioma3 == "Aleman")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Aleman</option>
							<option id="5" value="Italiano" @if ($estudios->idioma3 == "Italiano")
								{{-- expr --}}
								selected="selected" 
							@endif>Italiano</option>
	    					<option id="6" value="Chino" @if ($estudios->idioma3 == "Chino")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Chino</option>
	    					<option id="7" value="Japones" @if ($estudios->idioma3 == "Japones")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Japones</option>
						</select>
					</div>
					<div class="form-group col-xs-3">
						<label class="control-label" for="nivel3" id="lbl_nivel">Nivel:</label>
						<select type="select" name="nivel3" class="form-control" id="nivel3">
							<option id="1" value="Básico" @if ($estudios->nivel3 == "Básico")
								{{-- expr --}}
								selected="selected" 
							@endif>Básico</option>
							<option id="2" value="Medio" @if ($estudios->nivel3 == "Medio")
								{{-- expr --}}
								selected="selected" 
							@endif>Medio</option>
	    					<option id="3" value="Alto" @if ($estudios->nivel3 == "Alto")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>Alto</option>
						</select>
					</div>
				</div>
				<div class="col-md-12 offset-md-2 mt-3">
					<div class="form-group col-xs-4">
						<label class="control-label" for="curso1" id="lbl_curso"><i class="fa fa-asterisk" aria-hidden="true"></i>Curso:</label>
						<input type="text" class="form-control" id="id_curso1" name="curso1" value="{{ $estudios->curso1 }}">
						<div class="boton checkbox-disabled">
							<label>
						<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="certificado1" @if ($estudios->certificado1 == 1)
							{{-- expr --}}
							checked="checked"
						@endif> ¿Certificación?
						</label>
					</div>
				</div>
				<div class="form-group col-xs-4">
						<label class="control-label" for="curso2" id="lbl_curso">Curso 2:</label>
						<input type="text" class="form-control" id="id_curso2" name="curso2" value="{{ $estudios->curso2 }}">
						<div class="boton checkbox-disabled">
							<label>
						<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="certificado2" @if ($estudios->certificado2 == 1)
							{{-- expr --}}
							checked="checked"
						@endif> ¿Certificación?
						</label>
					</div>
				</div>
				<div class="form-group col-xs-4">
						<label class="control-label" for="curso3" id="lbl_curso">Curso 3:</label>
						<input type="text" class="form-control" id="id_curso3" name="curso3" value="{{ $estudios->curso3 }}">
						<div class="boton checkbox-disabled">
							<label>
						<input id="boton-toggle" type="checkbox" data-toggle="toggle" data-on="Sí" data-off="No" data-style="ios" name="certificado3" @if ($estudios->certificado3 == 1)
							{{-- expr --}}
							checked="checked"
						@endif>
						¿Certificación?
						</label>
					</div>
				</div>
				<button type="submit" class="btn btn-success">Guardar</button>
				
				</form>
		</div>
	</div>
@endsection