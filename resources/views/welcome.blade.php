<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
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
        <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    </head>
    <body>
        <div id="contenedor_notificaciones" style="width: 300px; height:auto; margin:0; top:200px; right:0; position: absolute;">

        </div>

        </div>
        <!-- Navigation -->
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container topnav">
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
                                            <i class="fa fa-sign-out"></i>Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            {{-- SEGURIDAD --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                                @if($componente->nombre == "indice perfiles" || $componente->nombre == "indice usuarios")
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-lock"></i> Seguridad<span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach(Auth::user()->perfil->componentes as $c)
                                                @if($c->nombre == "indice perfiles")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ route('perfils.index')}}','Perfiles')">
                                                            <i class="fa fa-universal-access"></i> Perfiles
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice usuarios")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ route('usuarios.index')}}','Usuarios')">
                                                            <i class="fa fa-user-circle"></i> Usuarios
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
                                @if($componente->nombre == "indice crm")
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onclick="AgregarNuevoTab('{{url ('crm')}}','CRMs')">
                                            <i class="fa fa-calendar"></i> CRM
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                            {{-- CLIENTES --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                                @if($componente->nombre == "crear cliente" || $componente->nombre == "indice clientes" || $componente->nombre == "indice solicitantes")
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> Clientes<span class="caret"></span> </a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach(Auth::user()->perfil->componentes as $c)
                                                @if($c->nombre == "crear cliente")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes/create')}}','Agrega Cliente')">
                                                            <i class="fa fa-plus"></i> Alta
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice clientes")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes') }}','Buscar Cliente')">
                                                            <i class="fa fa-search"></i> Búsqueda
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice solicitantes")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/asignarClientes') }}', 'Asignar Clientes')">
                                                            <i class="fa fa-user-plus"></i> Asignar Clientes
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @break
                                @endif
                            @endforeach
                            {{-- RECURSOS HUMANOS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                                @if($componente->nombre == "indice empleados" || $componente->nombre == "crear empleado" || $componente->nombre == "indice grupos" || $componente->nombre == "crear grupo")
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-male"></i> Recursos Humanos <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach(Auth::user()->perfil->componentes as $c)
                                                @if($c->nombre == "crear empleado")
                                                    <li>
                                                        <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('empleados/create') }}','Alta Empleado')">
                                                            <i class="fa fa-plus"></i> Alta
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice empleados")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('empleados') }}','Buscar Empleado')">
                                                            <i class="fa fa-search"></i> Búsqueda
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice empleados")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('empleados/eliminados') }}','Empleados eliminados')">
                                                            <i class="fa fa-search"></i> Eliminados
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "crear grupo" || $c->nombre == "indice grupos")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ route('vendedor.asignar') }}','Asignar Vendedor')">
                                                            <i class="fa fa-user-plus"></i> Asignar Vendedor
                                                        </a>
                                                    </li>
                                                    @break
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @break
                                @endif
                            @endforeach
                            {{-- vendedores --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                                @if($componente->nombre == "indice empleados" || $componente->nombre == "crear empleado" || $componente->nombre == "indice grupos" || $componente->nombre == "crear grupo")
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-male"></i> Vendedores <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach(Auth::user()->perfil->componentes as $c)
                                                @if($c->nombre == "indice empleados")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/vendedors')}}','Buscar Vendedores')">
                                                            <i class="fa fa-search"></i> Búsqueda
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice empleados")
                                                    <li>
                                                        <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('control_vendedores')}}','Control Vendedores')">
                                                            <i class="fa fa-address-book"></i> Control
                                                        </a>
                                                    </li>
                                                @endif
                                               
                                            @endforeach
                                        </ul>
                                    </li>
                                    @break
                                @endif
                            @endforeach
                            {{-- PROVEEDORES --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                                @if($componente->nombre == "indice proveedores" || $componente->nombre == "crear proveedor" || $componente->nombre == "alta excel" || $componente->nombre == "indice productos")
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-truck"></i> Proveedores<span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach(Auth::user()->perfil->componentes as $c)
                                                @if($c->nombre == "crear proveedor")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/provedores/create')}}','Agrega Proveedor')">
                                                            <i class="fa fa-plus"></i> Alta
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice proveedores")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/provedores') }}','Buscar Proveedor')">
                                                            <i class="fa fa-search"></i> Búsqueda
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "alta excel" || $c->nombre == "indice productos")
                                                    <li class="dropdown-submenu">
                                                        <a tabindex="-1" href="#"> <i class="fa fa-shopping-cart"></i> Productos</a>
                                                        <ul class="dropdown-menu">
                                                            @foreach(Auth::user()->perfil->componentes as $k)
                                                                @if($k->nombre == "alta excel")
                                                                    <li>
                                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('import-export-csv-excel') }}','Importar Excel')">
                                                                            <i class="fa fa-file-excel-o"></i> Alta por excel
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                                @if($k->nombre == "indice productos")
                                                                    <li>
                                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('productos') }}','Buqueda de Productos')">
                                                                            <i class="fa fa-search"></i> Búsqueda
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                                @if($k->nombre == "indice tipo")
                                                                    <li>
                                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('provedores-agregar-tipo') }}','Agregar tipo')">
                                                                            <i class="fa fa-plus"></i> Agregar tipo
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                                @if($k->nombre == "indice categoria")
                                                                    <li>
                                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('provedores-agregar-categoria') }}','Agregar categoria')">
                                                                            <i class="fa fa-plus"></i> Agregar categoria
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @break
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @break
                                @endif
                            @endforeach
                            {{-- OFICINAS --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                                @if($componente->nombre == "indice regiones" || $componente->nombre == "indice estados" || $componente->nombre == "indice oficinas" || $componente->nombre == "indice puntos")
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-briefcase"></i> Oficinas<span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach(Auth::user()->perfil->componentes as $c)
                                                @if($c->nombre == "indice regiones")
                                                    <li>
                                                        <a style="display: none;" href="#" onclick="AgregarNuevoTab('{{ url('region')}}','Región')">
                                                            <i class="fa fa-globe"></i> Región
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice estados")
                                                    <li>
                                                        <a style="display: none;" href="#" onclick="AgregarNuevoTab('{{ url('estado') }}','Estado')">
                                                            <i class="fa fa-map"></i> Estado
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice oficinas")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ route('oficinas.index') }}','Oficina')">
                                                            <i class="fa fa-building"></i> Oficina
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "indice puntos")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('puntoDeVenta')}}','Punto de Venta')">
                                                            <i class="fa fa-building-o"></i> Punto de venta
                                                        </a>
                                                    </li>                     
                                                @endif
                                                @if($c->nombre == "indice grupos")
                                                    <li class="dropdown-submenu">
                                                        <a tabindex="-1" href="#"> <i class="fa fa-users"></i> Grupos</a>
                                                        <ul class="dropdown-menu">
                                                            @foreach(Auth::user()->perfil->componentes as $k)
                                                                @if($k->nombre == "crear grupo")
                                                                    <li>
                                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/grupos/create')}}','Crear Grupo')">
                                                                            <i class="fa fa-plus"></i> Alta
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                                @if($k->nombre == "indice grupos")
                                                                    <li>
                                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/grupos')}}','Buscar Grupos')">
                                                                            <i class="fa fa-search"></i> Búsqueda
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @break
                                @endif
                            @endforeach
                            {{-- PRECARGAs --}}
                            @foreach(Auth::user()->perfil->componentes as $componente)
                                @if($componente->modulo->nombre == "precargas")
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-refresh"></i> Precargas<span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach(Auth::user()->perfil->componentes as $c)
                                                @if($c->nombre == "canal de ventas")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/canalventas') }}','Canal de Ventas')">
                                                            <i class="fa fa-cart-plus"></i> Canal de Ventas
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "bancos")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/bancos') }}','Bancos')">
                                                            <i class="fa fa-money"></i> Bancos
                                                        </a>
                                                    </li>
                                                    @endif
                                                @if($c->nombre == "contratos")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/contratos') }}','Contratos')">
                                                            <i class="fa fa-file-text-o "></i> Contratos
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "puestos")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/puestos') }}','Puestos')">
                                                            <i class="fa fa-address-card"></i> Puestos
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "giros")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                                            <i class="fa fa-rotate-right"></i> Giros
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($c->nombre == "forma contacto")
                                                    <li>
                                                        <a href="#" onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                                            <i class="fa fa-phone"></i> Forma Contacto
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                            {{-- <li>
                                                <a href="#" onclick="AgregarNuevoTab('{{ route('precagas.carros.index') }}','Carros')">
                                                    <i class="fa fa-phone"></i> Carros
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="AgregarNuevoTab('{{ url('/precargas/motos') }}','Motos')">
                                                    <i class="fa fa-phone"></i> Motos
                                                </a>
                                            </li> --}}
                                        </ul>
                                    </li>
                                    @break
                                @endif
                            @endforeach
                        </ul> 
                    </div>
                    @endauth
                </div>
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
        $(document).ready(function () {
            $('.dropdown-submenu a.test').on("click", function (e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
            Pusher.logToConsole = false;

            var pusher = new Pusher('eb78253de16c261f78b7', {
                cluster: 'us2',
            encrypted: false,
            forceTLS: false
            });

            var channel = pusher.subscribe('prospectos');
            channel.bind('prospecto-creado', function(data) {
                let nombre = "";
                if(data){
                if(data.tipo == 'Moral'){
                    nombre = data.razon;
                }else{
                    nombre = data.nombre;
                }
                let noti = `
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Un nuevo cliente require aprobación! </strong> <dd onclick="AgregarNuevoTab('{{route('crmgeneral2')}} ','CRM')">${data.cliente.nombre ? data.cliente.nombre: data.cliente.razon}</dd>
                </div>
                `;
                $('#contenedor_notificaciones').append(noti);

                }
                
            //alert(JSON.stringify(data));
            });
        });
    </script>
</html>