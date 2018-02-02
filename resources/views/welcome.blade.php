<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <script href="{{ asset('js/jquery-3.2.1.min.js') }}"></script> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

     <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link href="{{asset('font-awesome5.0.1/css/fontawesome.min.css')}}" rel="stylesheet" type="text/css"> --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/peticion.js') }}"></script>
    </head>
    <body>

<!-- Navigation -->
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- <img src="{{ asset('img/logo.jpeg') }}" height="32" width="70"> --}}
                        {{-- {{ config('app.name', 'Arbys') }} --}}
                    </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

               <!--  @if (Route::has('login'))
                    <li>
                        @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}"><i class="fa fa-clipboard" aria-hidden="true"></i> Register</a>
                    @endif
                    </li> -->




                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> Clientes<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes/create')}}','Agrega Cliente')"><i class="fa fa-user-plus" aria-hidden="true"></i> Alta</a>
                                <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes') }}','Buscar Cliente')"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>


                               <!--  <a href="#" onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')"><i class="fa fa-refresh" aria-hidden="true"></i>

                                 Precargas Giros</a>

                                <a href="#" onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Forma de contactos</a> -->

                                 <li class="dropdown-submenu">
                                <a tabindex="-1" 
                                   href="#">
                                   <i class="fa fa-refresh" 
                                      aria-hidden="true"></i> 
                                  Precargas:</a>
                                    <ul class="dropdown-menu">
                                      <li>
                                        <a href="#" 
                                           onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                           <i class="fa fa-refresh" aria-hidden="true"></i> 
                                       Giros</a></li>

                                      <li><a href="#" 
                                             onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                             <i class="fa fa-refresh" aria-hidden="true"></i>Forma Contactos</a></li>
                                    </ul>
                                  </li>



                            </li>                     
                        </ul>
                    </li>




                    
                    
                   <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Productos <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('import-export-csv-excel') }}','Importar Excel')"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Alta por excel</a>

                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('productos') }}','Buqueda de Productos')">
                                   <i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>  

                            </li>                     
                        </ul>
                    </li>


                    

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-briefcase" aria-hidden="true"></i> Recursos Humanos <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#" onclick="AgregarNuevoTab('{{url('empleados/create')}}','Nuevo Empleado')"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a>
                                <a href="#" onclick="AgregarNuevoTab('{{ url('empleados') }}','Buscar Empleado')"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>

                               

                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/sucursales')}}','Sucursales')">
                            <i class="fa fa-university" aria-hidden="true"></i> Sucursales
                                </a>

                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/bonos')}}','Bonos')">
                            <i class="fa fa-gift" aria-hidden="true"></i> Bonos
                                </a>

                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/comision')}}','Comisiones')">
                            <i class="fa fa-money" aria-hidden="true"></i> Comisiones
                                </a>  

                                 

                                <li class="dropdown-submenu">
                                <a tabindex="-1" href="#"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas:</a>
                                    <ul class="dropdown-menu">
                                      <li><a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('bajas') }}','Bajas')"><i class="fa fa-level-down" aria-hidden="true"></i> Bajas</a></li>
                                      <li><a href="#" onclick="AgregarNuevoTab('{{ url('contratos') }}','Contratos')"><i class="fa fa-file-text-o" aria-hidden="true"></i> Contratos</a></li>
                                      <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/areas') }}','Areas')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Areas</a>
                                        </li>
                                        <li>
                                          <a href="#" onclick="AgregarNuevoTab('{{ url('/puestos') }}','Puestos')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Puestos</a>
                                        </li>
                                         <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/bancos') }}','Bancos')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Bancos</a>
                                        </li>
                                    </ul>
                                  </li>
                            </li>                     
                        </ul>
                    </li>

                   
                    
                     <!-- <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Productos <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown-submenu">
                        <a class="test" href="#"><i class="fa fa-car" aria-hidden="true"></i> Vehiculos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a></li>
                          <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a></li>
                        </ul>
                        <a class="test" href="#"><i class="fa fa-motorcycle" aria-hidden="true"></i> Motocicletas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a></li>
                          <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a></li>
                        </ul>
                         <a class="test" href="#"><i class="fa fa-home" aria-hidden="true"></i>Casas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a></li>
                          <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a></li>
                        </ul>
                      </li>
                    </li> -->


                         <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> Proveedores<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#" onclick="AgregarNuevoTab('{{ url('/provedores/create')}}','Agrega Proveedor')"><i class="fa fa-user-plus" aria-hidden="true"></i> Alta</a>

                                <a href="#" 
                                onclick="AgregarNuevoTab('{{ url('/provedores') }}','Buscar Proveedor')">
                                <i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>


                            <li class="dropdown-submenu">
                                <a tabindex="-1" 
                                   href="#">
                                   <i class="fa fa-refresh" 
                                      aria-hidden="true"></i> 
                                  Precargas:</a>
                                    <ul class="dropdown-menu">
                                      <li>
                                        <a href="#" 
                                           onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                           <i class="fa fa-refresh" aria-hidden="true"></i> 
                                       Giros</a></li>

                                      <li><a href="#" 
                                             onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                             <i class="fa fa-refresh" aria-hidden="true"></i>Forma Contactos</a></li>
                                    </ul>
                                  </li>



                            </li>                     
                        </ul>
                    </li>

                    




                </ul> 
            </div>
            @endif
        </ul>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container" style="width: 100%; height: 100%;">
        <ul id="tabsApp" class="nav nav-tabs"></ul>
        <div id="contenedortab" class="tab-content"></div>
    </div>
</div>
    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pestanas.js') }}"></script>
    <script src="{{ asset('js/forms.js') }}"></script>
    <script>
    $(document).ready(function(){
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
    </script>
</html>