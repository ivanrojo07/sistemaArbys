@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel panel-group">
		@include('vendedores.head')
		<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-3 form-group">
							<div class="input-group">
								<input type="text" id="buscador" class="form-control" autofocus placeholder="Buscar...">
						        <span class="input-group-btn">
									<a class="btn btn-default" onclick="buscar()">
										<i class="fa fa-search"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<div id="vendedores">
						<div class="row">
							<div class="col-sm-12 text-center">
								@if(1 > 0)
									<table class="table table-stripped table-bordered table-hover" style="margin-bottom: 0px;">
										<tr class="info">
											
											<th class="text-center">grupo</th>
											<th class="text-center"># de vendedores</th>						
											<th class="col-sm-1">Acciones</th>
										</tr>
										@foreach($grupos as $grupo)
											<tr>
												{{-- @if(isset($vendedor->grupo)) --}}
												
												<td>{{$grupo->nombre }}</td>
												{{-- @else --}}
													{{-- <td>No asignado</td>
													<td>No asignado</td> --}}
												{{-- @endif --}}
												
												<td>
												{{$grupo->vendedores->count()}}
												</td>
												<td></td>
												{{-- <td class="text-center">
													<input type="radio" name="vendedor_id" value="{{ $vendedor->id }}" required="">
												</td> --}}
											</tr>
										@endforeach
									</table>
								@else
									<h4>No hay vendedores disponibles.</h4>
								@endif
							</div>
						</div>
					</div>
				</div>
	</div>
</div>

@endsection