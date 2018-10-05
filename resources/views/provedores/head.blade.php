<div class="panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4">
				<h4>Datos del Proveedor:</h4>
			</div>
			@foreach(Auth::user()->perfil->componentes as $cmp)
			@if($cmp->nombre == "crear proveedor")
			<div class="col-sm-4 text-center">
				<a class="btn btn-success" href="{{ route('provedores.create') }}">
					<strong>Agregar Proveedor</strong>
				</a>
			</div>
			@endif
			@if($cmp->nombre == "indice proveedores")
			<div class="col-sm-4 text-center">
				<a href="{{ route('provedores.index') }}" class="btn btn-primary">
					<strong>Lista de Proveedores</strong>
				</a>
			</div>
			@endif
			@endforeach
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="form-group col-sm-3">
				<label class="control-label" for="tipopersona">Tipo de Persona:</label>
				<dd>{{ $provedore->tipopersona }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="alias">Alias:</label>
				<dd>{{ $provedore->alias }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="rfc">RFC:</label>
				<dd>{{ $provedore->rfc }}</dd>
			</div>
			<div class="form-group col-sm-3">
				<label class="control-label" for="vendedor">Vendedor:</label>
				<dd>{{ $provedore->vendedor }}</dd>
			</div>
		</div>
		@if ($provedore->tipopersona == "Fisica")
		<div class="row" id="perfisica">
			<div class="col-sm-3">
				<label class="control-label" for="nombre">Nombre(s):</label>
				<dd>{{ $provedore->nombre }}</dd>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
				<dd>{{ $provedore->apellidopaterno }}</dd>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
				<dd>{{ $provedore->apellidomaterno }}</dd>
			</div>
		</div>
		@else
		<div class="row" id="permoral">
			<div class="col-sm-3">
				<label class="control-label" for="razonsocial">Razon Social:</label>
				<dd>{{ $provedore->razonsocial }}</dd>
			</div>
		</div>
		@endif
	</div>
</div>