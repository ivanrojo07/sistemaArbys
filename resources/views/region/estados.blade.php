<div class="panel-heading">
	<div class="row">
		<div class="col-sm-4">
			<h4>Estados de la Región: {{ $region->nombre}}</h4>
		</div>
	</div>
</div>
<div class="panel-body">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
				<tr class="info">
					<th class="col-sm-2">#</th>
					<th class="col-sm-10"">Estado</th>
				</tr>
				@foreach($region->estados as $estado)
				<tr>
					<td>{{ $estado->id }}</td>
					<td>{{ $estado->nombre }}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>