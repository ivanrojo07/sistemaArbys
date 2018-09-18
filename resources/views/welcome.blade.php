<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    @auth
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            {{-- LOGOUT --}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            {{-- SEGURIDAD --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "seguridad")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-lock" aria-hidden="true"></i> Seguridad<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                    @if($c->nombre == "indice perfiles")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{url ('perfil')}}','Perfiles')">
                                            <i class="fa fa-universal-access" aria-hidden="true"></i> Perfiles
                                        </a>
                                    </li>
                                    @endif
                                    @if($c->nombre == "indice usuarios")
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{url ('usuario')}}','Usuarios')">
                                            <i class="fa fa-user-circle" aria-hidden="true"></i> Usuarios
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach
                            {{-- CRM --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "crm")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> CRM<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{url ('crm')}}','CRMs')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Búsqueda
                                        </a>
                                    </li>                 
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            {{-- CLIENTES --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "clientes")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> Clientes<span class="caret"></span> </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes/create')}}','Agrega Cliente')">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Alta
                                        </a>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes') }}','Buscar Cliente')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Búsqueda
                                        </a>
                                         <li class="dropdown-submenu">
                                            <a tabindex="-1" href="#">
                                                <i class="fa fa-refresh" aria-hidden="true"></i> Precargas:
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="AgregarNuevoTab('{{ url('/canalventas') }}','Canal de Ventas')">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i> Canal de Ventas
                                                    </a>
                                                </li>
                                                {{--<li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                                            <i class="fa fa-refresh" aria-hidden="true"></i> Giros
                                                        </a>
                                                    </li> --}}
                                                {{--<li>
                                                    <a href="#" onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>Forma Contactos
                                                    </a>
                                                </li>--}}
                                            </ul>
                                        </li>
                                    </li>                     
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            {{-- SOLICITANTES --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "solicitantes")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-users" aria-hidden="true"></i> Solicitantes<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        {{-- <a href="#" onclick="AgregarNuevoTab('{{ url('/solicitantes/create')}}','Agrega Solicitante')">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Alta
                                        </a> --}}
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/solicitantes') }}','Buscar Solicitante')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Búsqueda
                                        </a>

                                        <!--  <a href="#" onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')"><i class="fa fa-refresh" aria-hidden="true"></i>

                                         Precargas Giros</a>

                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Forma de contactos</a> -->

                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="#">
                                                <i class="fa fa-refresh" aria-hidden="true"></i> Precargas:
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="AgregarNuevoTab('{{ url('/canalventas') }}','Canal de Ventas')">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i> Canal de Ventas
                                                    </a>
                                                </li>
                                                {{--<li>
                                                    <a href="#" onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i> Giros
                                                    </a>
                                                </li>--}}
                                                {{--<li>
                                                    <a href="#" onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>Forma Contactos
                                                    </a>
                                                </li>--}}
                                            </ul>
                                        </li>
                                    </li>                     
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            {{-- PRODUCTOS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "productos")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Productos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('import-export-csv-excel') }}','Importar Excel')">
                                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Alta por excel
                                        </a>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('productos') }}','Buqueda de Productos')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Búsqueda
                                        </a>  
                                    </li>                     
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            {{-- RECURSOS HUMANOS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "rh")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-male" aria-hidden="true"></i> Recursos Humanos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('empleados/create') }}','Empleado')">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Alta
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('empleados') }}','Empleado')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Búsqueda
                                        </a>
                                    </li>
                                    <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/sucursales')}}','Sucursales')">
                                            <i class="fa fa-university" aria-hidden="true"></i> Sucursales
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/bonos')}}','Bonos')">
                                            <i class="fa fa-gift" aria-hidden="true"></i> Bonos
                                        </a>
                                    </li>
                                    <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/comision')}}','Comisiones')">
                                            <i class="fa fa-money" aria-hidden="true"></i> Comisiones
                                        </a>
                                    </li>      
                                </ul>
                            </li>
                            @break
                            @endif
                            @endforeach
                            {{-- PROVEEDORES --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "proveedores")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-truck" aria-hidden="true"></i> Proveedores<span class="caret"></span> </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/provedores/create')}}','Agrega Proveedor')"><i class="fa fa-user-plus" aria-hidden="true"></i> Alta</a>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/provedores') }}','Buscar Proveedor')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Búsqueda
                                        </a>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="#"> <i class="fa fa-refresh" aria-hidden="true"></i> Precargas:</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#" onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i> 
                                                        Giros
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>Forma Contactos
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </li>                     
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            {{-- OFICINAS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "oficinas")
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i> Oficinas<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('region')}}','Región')">
                                            <i class="fa fa-globe" aria-hidden="true"></i> Región
                                        </a>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('estado') }}','Estado')">
                                            <i class="fa fa-map" aria-hidden="true"></i> Estado
                                        </a>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('oficina') }}','Oficina')">
                                            <i class="fa fa-building" aria-hidden="true"></i> Oficina
                                        </a>
                                        <a href="#" onclick="AgregarNuevoTab('{{ url('puntoDeVenta')}}','Punto de Venta')">
                                            <i class="fa fa-building-o" aria-hidden="true"></i> Punto de venta
                                        </a>
                                    </li>                     
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul> 
                    </div>
                    @endauth
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>
            <div class="container-fluid">
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
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
</html>