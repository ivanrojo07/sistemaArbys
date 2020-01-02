@extends('layouts.blank')
@section('content')
<style>
	.zoom:hover {
		-ms-transform: scale(1.5);
		/* IE 9 */
		-webkit-transform: scale(1.5);
		/* Safari 3-8 */
		transform: scale(1.5);
	}
</style>
<div class="container">
	@if($cliente->integrante)
	<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
		<tr class="info">
			<th class="col-sm-1">#</th>
			<th class="col-sm-1">Identificación</th>
			<th class="col-sm-1">Domicilio</th>
			<th class="col-sm-1">Solicitud</th>
			<th class="col-sm-1">Pago</th>
		</tr>
		<tr>
			<td>{{$cliente->integrante->id}}</td>
			<td><img width="200px" src="{{asset('storage/'.''.$cliente->integrante->archivo_identificacion)}}" alt="">
			</td>
			<td><img width="200px" src="{{asset('storage/'.''.$cliente->integrante->archivo_comprobante)}}" alt=""></td>
			<td><img width="200px" src="{{asset('storage/'.''.$cliente->integrante->archivo_solicitud)}}" alt=""></td>
			<td><img width="200px" src="{{asset('storage/'.''.$cliente->integrante->archivo_pago)}}" alt=""></td>
		</tr>
	</table>

	@endif
	@empty($cliente->integrante)
	<form role="form" method="POST" action="{{ route('clientes.integrante.store', ['cliente'=>$cliente]) }}"
		enctype="multipart/form-data">
		<input type="hidden" name="cliente_id" value="{{$cliente->id}}">
		{{ csrf_field() }}
		<div class="page-header">
			<h1>Requisitos Integrante <small></small></h1>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">Complete los campos y añada los archivos</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label">Identificación:</label>
						<select name="identificacion" class="form-control" required="">
							<option value=""> --- </option>
							<option value="ine">INE</option>
							<option value="ife">IFE</option>
							<option value="pasaporte">Pasaporte</option>
							<option value="cédula profesional">Cédula Profesional</option>
							<option value="cartilla">Cartilla</option>
						</select>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Número identificación</label>
						<input required="" type="text" name="num_identificacion" class="form-control">
					</div>
					<div class="col-sm-4 form-group">
						<div class="row">
							<label for="archivo_identificacion"
								style="font-size: 10px;font-weight: 600;color: #fff;border-radius: 5px;background-color: #1464dc;display: inline-block;transition: all .5s;cursor: pointer;margin-top: 15px;padding: 15px 40px !important;text-transform: uppercase;width: fit-content;text-align: center"><span>Subir
									Archivo</span></label>
							<span><input required="" class="inputfile" type="file" name="archivo_identificacion"
									id="archivo_identificacion"
									style="width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden; position: absolute;z-index: -1"></span>
						</div>
						<div class="row" id="archivo_identificacion_div">
							<img onClick="swipe();" style="max-width: 300px;" src="#" data-lightbox="image-1"
								alt="Tú imagen" id="archivo_identificacion_img">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label">Comprobante de Domicilio:</label>
						<select name="comprobante_domicilio" class="form-control" required="">
							<option value=""> --- </option>
							<option value="luz">Luz</option>
							<option value="agua">Agua</option>
							<option value="telefono">Teléfono</option>
							<option value="predial">Predial</option>
						</select>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">A nombre de:</label>
						<input type="text" name="nombre_comp_domc" class="form-control" required="">
					</div>
					<div class="col-sm-4 form-group">
						<div class="row">
							<label for="archivo_comprobante"
								style="font-size: 10px;font-weight: 600;color: #fff;border-radius: 5px;background-color: #1464dc;display: inline-block;transition: all .5s;cursor: pointer;margin-top: 15px;padding: 15px 40px !important;text-transform: uppercase;width: fit-content;text-align: center"><span>Subir
									Archivo</span></label>
							<span><input required="" class="inputfile" type="file" name="archivo_comprobante"
									id="archivo_comprobante"
									style="width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden; position: absolute;z-index: -1"></span>
						</div>
						<div class="row" id="archivo_comprobante_div">
							<img onClick="swipe();" style="max-width: 300px;" src="#" data-lightbox="image-1"
								alt="Tú imagen" id="archivo_comprobante_img">
						</div>
					</div>
					<div class="col-sm-4 form-group">
						<label class="control-label">Dirección:</label>
						<textarea required="" name="direccion" id="" rows="4" class="form-control"
							style="resize: none;"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label">Solicitud Firmada:</label>
					</div>
					<div class="col-sm-4 form-group">
						<div class="row">
							<label for="archivo_solicitud"
								style="font-size: 10px;font-weight: 600;color: #fff;border-radius: 5px;background-color: #1464dc;display: inline-block;transition: all .5s;cursor: pointer;margin-top: 15px;padding: 15px 40px !important;text-transform: uppercase;width: fit-content;text-align: center"><span>Subir
									Archivo</span></label>
							<span><input required="" class="inputfile" type="file" name="archivo_solicitud"
									id="archivo_solicitud"
									style="width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden; position: absolute;z-index: -1"></span>
						</div>
						<div class="row" id="archivo_solicitud_div">
							<img onClick="swipe();" style="max-width: 300px;" src="#" data-lightbox="image-1"
								alt="Tú imagen" id="archivo_solicitud_img">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label class="control-label">Comprovante de Pago:</label>
					</div>
					<div class="col-sm-4 form-group">
						<div class="row">
							<label for="archivo_pago"
								style="font-size: 10px;font-weight: 600;color: #fff;border-radius: 5px;background-color: #1464dc;display: inline-block;transition: all .5s;cursor: pointer;margin-top: 15px;padding: 15px 40px !important;text-transform: uppercase;width: fit-content;text-align: center"><span>Subir
									Archivo</span></label>
							<span><input required="" class="inputfile" type="file" name="archivo_pago" id="archivo_pago"
									style="width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden; position: absolute;z-index: -1"></span>
						</div>
						<div class="row" id="archivo_pago_div">
							<img onClick="swipe();" style="max-width: 300px;" src="#" data-lightbox="image-1"
								alt="Tú imagen" id="archivo_pago_img">
						</div>
					</div>

				</div>

				<!-- <a href="https://cdn.shopify.com/s/files/1/2018/8867/files/matteo-paganelli-39971_530x.jpg" data-lightbox="image-1" data-title="My caption">Image #1</a> -->


				<div class="row">
					<div class="col-sm-4 col-sm-offset-4 text-center">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Guardar
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	@endempty
</div>

@endsection
@section('scripts')
<script type="application/javascript">
	function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#' + id).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(document).ready(() => {

		$(".inputfile").change(function () {
			readURL(this, $(this).attr('id') + '_img');
		});
		$(document).ready(function () {
			$('.image-link').magnificPopup({ type: 'image' });
		});

	});
	function swipe() {
		var largeImage = document.getElementById('largeImage');
		largeImage.style.display = 'block';
		largeImage.style.width = 200 + "px";
		largeImage.style.height = 200 + "px";
		var url = largeImage.getAttribute('src');
		window.open(url, 'Image', 'width=largeImage.stylewidth,height=largeImage.style.height,resizable=1');
	}

</script>
<script src="magnific-popup/jquery.magnific-popup.js"></script>
@endsection