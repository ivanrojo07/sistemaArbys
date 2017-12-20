@extends('layouts.blank')
@section('content')



<div class="container" align="left">
	
		
	 

		<form>
			 <div class="container well well-lg">
			 	<h4> <strong>Sucursales</strong></h4>
			 	 <br /><br />
			   <div class="col-sm-4">
			 		<h5>Nombre Sucursal</h5>
			 		<input type="text" name="nombre" class="form-control" placeholder="Nombre de la Sucursal">
			 	
      			

			 	</div>
	    		
	    	 <div class="col-sm-4">
	    		<h5>Responsable</h5>
	    		<input type="text" name="responsable" class="form-control" placeholder="Nombre del Responsable">
	    	 </div>

	    		<div class="col-sm-4">
	    			<h5>ID Sucursal</h5><input type="text" name="id_sucursal" class="form-control" placeholder="Clave ID">
	    		</div>	<br /><br /><br /><br />

	    		<div class="col-sm-4">
	    			<h5><strong>Región</strong></h5> <select name="region">
 							 <option value="region1"> Región 1 zona </option>
  							 <option value="region2"> Región 2 zona </option>
  							 <option value="region3"> Región 3 zona </option>
  							 <option value="region4"> Región 4 zona </option>
  							 <option value="region4"> Región 5 zona </option>
							</select> 
	    		</div><br /><br />

	    		<div class="col-sm-4">
	    			<div class="input-group">
	    			<button type="submit" name="submit" value="Ingresar">
	    				<strong>
	    					Buscar
	    					<i class="fa fa-search" aria-hidden="true"></i>
	    				</strong>
	    				
	    					
	    			</button>
	    			
	    			 </div>
	    		</div>	
	    	
	    	
	    	
	    </div>

		</form>
	   
	   <div class="container well well-lg">

	   	<div class="container">
  <strong><h4>Resultado de la Consulta <i class="fa fa-television" aria-hidden="true"></i></h4></strong>
  <br />
  <ul class="nav nav-tabs">

    <li class="active">
    	<a data-toggle="tab" href="#dir">Direcciòn 
    		<i class="fa fa-map-signs" aria-hidden="true"></i>
    	</a>
    </li>

    <li>
    	<a data-toggle="tab" href="#gas">Gastos
    		<i class="fa fa-money" aria-hidden="true"></i>
    	</a>

    </li>

    <li><a data-toggle="tab" href="#emp">Empleados
    	<i class="fa fa-address-card-o" aria-hidden="true"></i>
       </a>
   </li>
    
  </ul>

  <div class="tab-content">
    <div id="dir" class="tab-pane fade in active">
      <h3>Direcciòn</h3>
      <p>Datos direcciòn.</p>
    </div>
    <div id="gas" class="tab-pane fade">
      <h3>Gastos</h3>
      <p>Datos de los gastos.</p>
    </div>
    <div id="emp" class="tab-pane fade">
      <h3>Empleados</h3>
      <p>Datos de empleados.</p>
    </div>
    
    </div>
   </div>
  </div>
	
	
</div>

@endsection