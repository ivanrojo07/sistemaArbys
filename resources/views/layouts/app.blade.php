<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Arbys') }}
                    </a>
                </div>


                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clientes<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/personals/create')}}">Alta</a>
                                <a href="{{ url('/personals') }}">Busqueda</a>
                                <a href="#">Seguimiento</a>    
                            </li>                     
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Oficinas <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">Alta</a>
                                <a href="#">Busqueda</a>  
                            </li>                     
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Recursos Humanos <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">Alta</a>
                                <a href="#">Busqueda</a>    
                            </li>                     
                        </ul>
                    </li>
                    
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown-submenu">
                        <a class="test" href="#">Vehiculos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Alta</a></li>
                          <li><a href="#">Busqueda</a></li>
                        </ul>
                        <a class="test" href="#">Motocicletas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Alta</a></li>
                          <li><a href="#">Busqueda</a></li>
                        </ul>
                         <a class="test" href="#">Casas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Alta</a></li>
                          <li><a href="#">Busqueda</a></li>
                        </ul>
                      </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        function formulario(elemento){
            if (elemento.value == "Prospecto") {
                document.getElementById('cliente').style.display='none';
                document.getElementById('cliente1').style.display='none';
                document.getElementById('cliente2').style.display='none';
            }
            if (elemento.value == "Cliente") {
                document.getElementById('cliente').style.display='inline';
                document.getElementById('cliente1').style.display='inline';
                document.getElementById('cliente2').style.display='inline';
            }
        }
        function persona(elemento){
            if(elemento.value == "Fisica"){
                document.getElementById('perfisica').style.display='inline';
                document.getElementById('permoral').style.display='none';
            }
            if(elemento.value =="Moral"){
                document.getElementById('perfisica').style.display='none';
                document.getElementById('permoral').style.display='inline';
            }
        }
    </script>
</body>
</html>
