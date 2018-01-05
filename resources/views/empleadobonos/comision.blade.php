@extends('layouts.test')
@section('content1')
<div class="container" align="left">
	<form>
			 <div class="container well well-lg">
			 <!--<div class="panel-heading"></div>-->	<h4> <strong>Comisión</strong></h4>
			 	 <br /><br />

			 	 <div class="col-sm-4">

			 		<h5>Nombre Bono
			 			<i class="fa fa-sticky-note" aria-hidden="true"></i>
			 		</h5>
			 		
			 		<input type="text" 
			 		       name="nombre" 
			 		       class="form-control" 
			 		       placeholder="Nombre del Bono" 
			 		       pattern="[A-Za-z]+"
			 		       autofocus="on">
			 	
      			

			 	</div>


			 	<div class="col-sm-4">
	    			<h5><strong>Peiodicidad</strong>
	    				<i class="fa fa-calendar" aria-hidden="true"></i>
	    			</h5> <select name="region">
 							 <option value="region1"> Resultado 1  </option>
  							 <option value="region2"> Resultado 2  </option>
  							 <option value="region3"> Resultado 3  </option>
  							 <option value="region4"> Resultado 4  </option>
  							 <option value="region4"> Resultado 5  </option>
							</select> 
	    		</div><br><br><br><br />


	    		<div class="col-sm-4">

			 		<h5>Monto Máximo Mensual
			 			<i class="fa fa-money" aria-hidden="true"></i>
			 		</h5>
			 		
			 		<input type="text" name="nombre" class="form-control" placeholder="$---" pattern="[0-9]+">
			 	
      			

			 	</div>


			 	<div class="col-sm-4">

			 		<h5>Monto Mínimo Mensual
			 			<i class="fa fa-money" aria-hidden="true"></i>
			 		</h5>
			 		
			 		<input type="text" name="nombre" class="form-control" placeholder="$---" pattern="[0-9]+">
			 	
      			

			 	</div><br><br><br><br />

			 	<div class="col-sm-4">

			 		<h5>Porcentaje Máximo
			 			<i class="fa fa-percent" aria-hidden="true"></i>
			 		</h5>
			 		
			 		<input type="text" name="nombre" class="form-control" placeholder="%---" pattern="[0-9]+">
			 	
      			

			 	</div>


			 	<div class="col-sm-4">

			 		<h5>Porcentaje Mínimo
			 			<i class="fa fa-percent" aria-hidden="true"></i>
			 		</h5>
			 		
			 		<input type="text" name="nombre" class="form-control" placeholder="%---" pattern="[0-9]+">




			 </div><br><br><br><br />

			 <div class="col-sm-4">
	    			<h5><strong>Tipo del Empleado</strong>
	    				<i class="fa fa-id-card" aria-hidden="true"></i>
	    			</h5> <select name="region">
 							 <option value="region1"> Resultado 1  </option>
  							 <option value="region2"> Resultado 2  </option>
  							 <option value="region3"> Resultado 3  </option>
  							 <option value="region4"> Resultado 4  </option>
  							 <option value="region4"> Resultado 5  </option>
							</select> 
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
        <th>Nombre 
        	<i class="fa fa-user" aria-hidden="true"></i>
        <th>Puesto  
    		<i class="fa fa-address-card" aria-hidden="true"></i>
        <th>Opciones
        	<i class="fa fa-list-ul" aria-hidden="true"></i>
        </th>
      </tr>
    </thead>
    <tbody>
    <?php

    for($i=0;$i<8;$i++){

    echo"	<tr class='info'>
        <td>Nombre ".$i."</td>
        <td>Puesto</td>
        <td>
        	<div class='btn-group'>

    <button type='button' class='btn btn-info'>Editar
<i class='fa fa-pencil-square-o' aria-hidden='true'></i>
    </button>

    <button type='button' class='btn btn-warning'>Eliminar
<i class='fa fa-times' aria-hidden='true'></i>
    </button>

    </div>

        </td>
      </tr>";
    }
      

     ?>

     
    </tbody>
  </table>



 </div>
 </div>

	   	


</div>


@endsection
