@extends('layouts.blank')
@section('content')


<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4 col-4">
						<h4>Datos del Punto de Venta:</h4>
					</div>
					<div class="col-sm-4 col-4 text-center">
						<button class="btn btn-info reponsive">Ver Puntos</button>
						<button class="btn btn-primary">Agregar Nuevo</button>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="nombre" class="control-label">Nombre:</label>
								<input type="text" name="nombre" class="form-control" id="nombre">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-3">
								<label for="abreviatura" class="control-label">Abreviatura:</label>
								<input type="text" name="abreviatura" maxlength="3" class="form-control" id="abreviatura">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="responsable" class="control-label">Responsable:</label>
								<input type="text" name="responsable" maxlength="" class="form-control" id="responsable">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="estado" class="control-label">Oficina a la que pertenece:</label>
								<select class="form-control" name="estado" id="estado">
									<option selected="selected">Seleccionar</option>
									<option>Oficina 1</option>
									<option>Oficina 2</option>
									<option>Oficina 3</option>
									<?php 
										echo "<option>QUERY</option>";
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row" style="height: auto;">
							<div class="form-group col-sm-12">
								<label for="descripcion" class="control-label">Descripción:</label>
								<textarea class="form-control" maxlength="500" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-1 col-sm-offset-8">
				        <input type="radio" name="tipo" value="oficina" id="tipo1">
						<label for="tipo1" class="control-label"> Oficina</label>
					</div>
					<div class="form-group col-sm-1">
		        		<input type="radio" name="tipo" value="kiosko" id="tipo2">
						<label for="tipo2" class="control-label">Kiosko</label>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<h4>Dirección:</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="calle" class="control-label">Calle:</label>
						<input type="text" class="form-control" id="calle">
					</div>
					<div class="form-group col-sm-4">
						<label for="interior" class="control-label">Número Interior:</label>
						<input type="text" class="form-control" id="interior">
					</div>
					<div class="form-group col-sm-4">
						<label for="exterior" class="control-label">Número Exterior:</label>
						<input type="text" class="form-control" id="exterior">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="colonia" class="control-label">Colonia:</label>
						<input type="text" class="form-control" id="colonia">
					</div>
					<div class="form-group col-sm-4">
						<label for="abreviatura" class="control-label">CP:</label>
						<input type="text" class="form-control" id="abreviatura">
					</div>
					<div class="form-group col-sm-4">
						<label for="ciudad" class="control-label">Ciudad:</label>
						<input type="text" class="form-control" id="ciudad">
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<h4>Plaza Comercial:</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="nombre" class="control-label">Nombre de la Plaza:</label>
								<input type="text" name="nombre" class="form-control" id="nombre">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="inicio" class="control-label">Fecha de inicio:</label>
								<input type="date" name="inicio" class="form-control" id="inicio">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="responsable" class="control-label">Número de Stand:</label>
								<input type="text" name="responsable" maxlength="" class="form-control" id="responsable">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="fin" class="control-label">Fecha de fin:</label>
								<input type="date" name="fin" class="form-control" id="fin">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="row" style="height: auto;">
							<div class="form-group col-sm-12">
								<label for="descripcion" class="control-label">Ubicación en la Plaza:</label>
								<textarea class="form-control" maxlength="500" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 text-center">
						<button class="btn btn-success">Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection