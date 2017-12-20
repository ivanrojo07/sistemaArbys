@extends('layouts.blank')
@section('content')

<div class="container" align="left">
	<form>
			 <div class="container well well-lg">
			 	<h4> <strong>Gastos</strong></h4>
			 	 <br />

               <div class="col-sm-4">
			 		<h5>Descripciòn</h5>
			 		<input type="text" name="descripcion" class="form-control" placeholder="Breve descripciòn">
			 	
      			

			 	</div>

			 	<div class="col-sm-4">
	    		<h5>Monto</h5>
	    		<input type="text" name="monto" class="form-control" placeholder="$---">
	    	 </div>

               <div class="col-sm-2">
               	<button type="submit" name="submit" value="Ingresar">
	    				<strong>
	    					Ingresar
	    					<i class="fa fa-reply" aria-hidden="true"></i>
	    				</strong>
	    				
	    					
	    			</button>
               </div>


			 </div>
    </form>


<div class="container well well-lg">

	   	<div class="container-fluid">
  <strong><h4>Despliegue de datos <i class="fa fa-television" aria-hidden="true"></i></h4></strong>
  <br />

  		<table class="table">
    <thead>
      <tr>
        <th>Descripciòn 
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

    <button type="button" class="btn btn-info">Editar
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </button>

    <button type="button" class="btn btn-warning">Eliminar
<i class="fa fa-times" aria-hidden="true"></i>
    </button>

    </div>

        </td>
      </tr>

      <tr>
        <td>Otro</td>
        <td>$--</td>
        <td>
        	<div class="btn-group">

    <button type="button" class="btn btn-info">Editar
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </button>

    <button type="button" class="btn btn-warning">Eliminar
<i class="fa fa-times" aria-hidden="true"></i>
    </button>

    </div>
        </td>
      </tr>

      <tr>
        <td>Otro</td>
        <td>$--</td>
        <td>
        	<div class="btn-group">

    <button type="button" class="btn btn-info">Editar
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </button>

    <button type="button" class="btn btn-warning">Eliminar
<i class="fa fa-times" aria-hidden="true"></i>
    </button>

    </div>
        </td>
      </tr>
     
    </tbody>
  </table>



 </div>
  <div class="col-sm-4">
	    		<h5><strong>Total</strong></h5>
	    		<input type="text" name="total" class="form-control" placeholder="$--" disabled>
	    	 </div>

</div>


</div>

@endsection