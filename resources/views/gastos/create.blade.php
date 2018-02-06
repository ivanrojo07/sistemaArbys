@extends('layouts.test')
@section('content1')
	
		
		
		<form role="form" 
		      method="POST" 
		      action="{{ route('gastos.store',['gasto'=>$gasto]) }}">
			{{ csrf_field() }}
			<div role="application" class="panel panel-group">
				<div class="panel-default">



					<div class="panel-heading"><h4>Datos de Gastos:
					&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-asterisk" aria-hidden="true"></i>
					Campos Requeridos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</h4></div>

					

				<div class="panel-body">
					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
							<label class="control-label" for="descripcion"><i class="fa fa-asterisk" aria-hidden="true"></i> Descripcion:</label>
							<input type="text" class="form-control" id="descripcion" name="descripcion" required="required" value="{{ $gasto->descripcion }}" placeholder="Breve Descripcion">
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="monto"><i class="fa fa-asterisk" aria-hidden="true"></i> Monto :</label>
							<input type="text" class="form-control" id="monto" name="monto" required="required" value="{{ $gasto->monto }}" placeholder="$---">
						</div>

@if ($tipo == false)
{{-- true expr --}}
							<input type="hidden" class="form-control" id="sucursal_id" name="sucursal_id"  value="{{ $sucursal->id }}">
@else
{{-- false expr --}}
              <input type="hidden" class="form-control" id="almacen_id" name="almacen_id"  value="{{ $almacen->id }}">

@endif
						<div class="form-group col-xs-4" align="right">
							<button type="submit" 
									        class="btn btn-success">
									 <strong>Agregar</strong>
								</button>
						</div>
						
						</div>
					</div>



				</div>

			</div>
	
			
		</form>











		
       


      <table class="table">
    <thead>
      <tr>
        <th>Descripción 
          <i class="fa fa-file-text-o" aria-hidden="true"></i></th>
        <th>Monto  
        <i class="fa fa-money" aria-hidden="true"></i></th>
        <th>Opciones
          <i class="fa fa-list-ul" aria-hidden="true"></i>
        </th>
      </tr>
    </thead>
    <tbody>
    
      <tr class="warning">
        <td>Salarios</td>
        <td>$--</td>
        <td>
          <div class="btn-group">

    

    

    </div>

        </td>

      </tr>

@if(isset($gastos))

@foreach($gastos as $gasto)

      <tr>
        <td>{{$gasto->descripcion}}</td>
        <td>${{$gasto->monto}}</td>
        <td>
          <div class="btn-group">

    

  

<form role="form" id="{{ $gasto->id }}" method="PUT" action="{{ route('gastos.edit',['gasto'=>$gasto]) }}">
              {{ csrf_field() }}

             
              <input type="submit" name="submit" value="Eliminar" class="btn btn-warning btn-sm">
            
            </form>
   
    

    </div>
        </td>
      </tr>
@endforeach
@else
<tr>
        <td>descripcion</td>
        <td>monto</td>
        <td>
          <div class="btn-group">



    <button type="button" class="btn btn-warning">Eliminar
<i class="fa fa-times" aria-hidden="true"></i>
    </button> 

    </div>
        </td>
      </tr>
      @endif
     

     
    </tbody>
  </table>



 
 
  <div class="col-sm-4">
          <h5><strong>Total</strong></h5>
@if(isset($total))
          <input type="text" name="total" class="form-control" value="${{$total}}" readonly>
@else
          <input type="text" name="total" class="form-control" placeholder="$--" readonly>
          @endif
         </div>




 </div>
	
	@endsection