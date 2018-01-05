@extends('layouts.test')
@section('content1')

<div class="container" align="left">
	<form>
			 <div class="container-fluid well well">
			 	<h4> <strong>Puntualidad</strong></h4>
			 	 <br /><br />
			 	
			 	 <div class="col-sm-3">
	    			<h5><strong>Periodicidad
	    				<i class="fa fa-calendar" aria-hidden="true"></i>
	    			</strong></h5> <select name="region">
 							 <option value="region1"> Diaria </option>
  							 <option value="region2"> Semanal </option>
  							 <option value="region3"> Mensual </option>
  							 <option value="region4"> Trimestral </option>
  							 <option value="region4"> Anual </option>
							</select> 
	    		</div>

	    		 


	    	 	 <div class="col-sm-3">
	    			<h5><strong>Nùmero de Dìas
	    				<i class="fa fa-calculator" aria-hidden="true"></i>
	    			</strong></h5> <select name="region">

	    				<?php

	    				for($i=1;$i<31;$i++){

	    					echo"<option value='".$i."'>".$i."  Dias </option>";

	    				}
 							   
  							 
  							 ?>
							</select> 
	    		</div>


	    		<div class="col-sm-3">
	    			<h5>Monto
	    				<i class="fa fa-money" aria-hidden="true"></i>
	    			</h5>
	    			<input type="text" 
	    			       name="responsable" 
	    			       class="form-control" 
	    			       placeholder="$--"
	    				   pattern="[0-9]+"
	    				   autofocus>
	    	 	 </div><br/><br/>


	    	 	 <div class="col-sm-5">
	    			
               	<button type="submit" name="submit" value="Ingresar">
	    				<strong>
	    					Ingresar
	    					<i class="fa fa-reply" aria-hidden="true"></i>
	    				</strong>
	    				
	    					
	    			</button>
               
	    	 	 </div>



			 </div>
	</form>
</div>

@endsection