@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Estados:</h4>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-2">
						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
							<tr class="info">
								<th style="width: 30%;">#</th>
								<th style="width: 70%;">Estado</th>
							</tr>
							<tr>
								<td>1</td>
								<td>Durango</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Oaxaca</td>
							</tr>
							<tr>
								<td>n</td>
								<td>...</td>
							</tr>
						</table>
					</div>
							<div class="form-group col-sm-4">
								<label for="nombre" class="control-label">Estado:</label>
								<select class="form-control" name="nombre" id="nombre">
									<option>Seleccionar</option>
									<option selected="selected">Durango</option>
									<option>Chihuahua</option>
									<option>...</option>
								</select>
							</div>
							<div class="form-group col-sm-1">
								<label for="abreviatura" class="control-label">Abreviatura:</label>
								<input type="text" maxlength="2" class="form-control" id="abreviatura" value="DGO" readonly="">
							</div>
							<div class="form-group col-sm-4">
								<label for="region" class="control-label">Región:</label>
								<input type="text" maxlength="2" class="form-control" id="region" value="Noroeste" readonly="">
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection