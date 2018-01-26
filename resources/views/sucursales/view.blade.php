@extends('layouts.test')
@section('content1')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{-- scripts --}}
	<div class="container">
		

			<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Datos de la Sucursal:</h4>
					
					<a class="btn btn-info" href="{{ route('sucursales.index') }}"><strong>Ver Sucursales</strong></a>
					<a class="btn btn-success" href="{{ route('sucursales.create') }}"><strong>Nueva Sucursal</strong></a>
					<a class="btn btn-warning" href="{{ route('sucursales.edit',['sucursal'=>$sucursal->id]) }}">
								
								 <strong>Editar</strong>
							</a>
				</div>

				<div class="panel-body">
					<div class="col-xs-12 offset-md-2 mt-3">

						<div class="form-group col-xs-4">
							<label class="control-label" for="nombre"> Nombre:</label>
							<dd>{{ $sucursal->nombre }}</dd>
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="responsable"> Responsable :</label>
							<dd>{{ $sucursal->responsable }}</dd>
						</div>

						<div class="form-group col-xs-4">
							<label class="control-label" for="claveid"> Clave ID :</label>
							<dd>{{ $sucursal->claveid }}</dd>
						</div>


					</div>


					<div class="col-xs-12 offset-md-2 mt-3">
						<div class="form-group col-xs-4">
						<label class="control-label" for="region">Región:</label>
			    					<dd>{{ $sucursal->region }}</dd>
						</div>

						


					</div>
					
				   </div>


				</div>

			</div>



	<ul class="nav nav-pills ">
								<li class="active">
    				<a data-toggle="tab" 
    				   href="#dir" 
    				   class="btn-info">Dirección</a>
    							</li>
								<li>
    				<a data-toggle="tab" 
    	   				href="#gas" 
    	   				class="btn-info">Gastos
    		
    				</a>
								</li>

                                 <li>
    	           <a data-toggle="tab" 
    	              href="#emp" 
    	              class="btn-info">Empleados</a>
   									</li>
    
  					</ul>

  <div class="tab-content">
<div id="dir" class="tab-pane fade in active">
<div role="application" class="panel panel-group">
				<div class="panel-default">

					<div class="panel-heading"><h4>Direcciòn de Sucursal :
					
					 
				</h4></div>

                  
                   <div class="panel-body">
                   






                   
  
			
			 	
    	
      

      		<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="calle"> Calle:</label>
			    					<dd>{{ $sucursal->calle }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numext"> Numero exterior:</label>
			    					<dd>{{ $sucursal->numext }}</dd>
			  					</div>	

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="numint">Numero interior:</label>
			    					<dd>{{ $sucursal->numint }}</dd>
			  					</div>


			  				




							</div>

								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="colonia"> Colonia:</label>
			  						<dd>{{ $sucursal->colonia }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="delegacion"> Delegación o Municipio:</label>
			  						<dd>{{ $sucursal->delegacion }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="ciudad"> Ciudad:</label>
			  						<dd>
			  						{{ $sucursal->ciudad }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="estado"> Estado:</label>
			  						<dd>{{ $sucursal->estado }}</dd>
			  					</div>
							</div>


								<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle1">Entre calle:</label>
			  						<dd>{{ $sucursal->calle1 }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="calle2">Y calle:</label>
			  						<dd>{{ $sucursal->calle2 }}</dd>
			  					</div>

			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="referencia">Referencia:</label>
			  						<dd>{{ $sucursal->referencia }}</dd>
			  					</div>
			  					





 



  	
  </div>
             

                   </div>



					
				</div>
			</div>
		</div>


 <div id="gas" class="tab-pane fade ">
    	<iframe src="{{route ('gastos.create',['sucursal'=>$sucursal->id])}}"
    			height="500px" >
    		
    	</iframe>
    </div>


    <div id="emp" class="tab-pane fade ">
    	<iframe src="{{route ('sucursal.index',['sucursal'=>$sucursal])}}"
    			height="500px" >
    		
    	</iframe>
    </div>




       </div>



	  
	</div>
@endsection