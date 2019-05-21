<thead>
	<tr class="info">
		<th class="text-center">Mes</th>
		<th class="text-center">Objetivo Clientes</th>
		<th class="text-center">Objetivo Ventas</th>
		<th class="text-center">Clientes</th>
		<th class="text-center">Ventas</th>					
	</tr>
</thead>
<tbody>
	@foreach($historiales as $hist)
		@php
		$mes = substr($hist->fecha_inicio, 0, 7);
		@endphp
		<tr>
			<td >
				@php
				setlocale (LC_TIME, "es_MX.UTF-8");
				echo strftime("%B", strtotime($hist->fecha_inicio));				
				@endphp
			</td>
			@if(isset($objetivos[$mes]) )
				<td>
					{{ $objetivos[$mes]->num_clientes}}
				</td>
				<td>
					{{ $objetivos[$mes]->ventas}}
				</td>
			@else
				<td>Sin objetivo</td>
				<td>Sin objetivo</td>
			@endif
			<td>{{ $hist->total_clientes }}</td>
			<td>{{ $hist->total_ventas }}</td>
		</tr>
	@endforeach
</tbody>