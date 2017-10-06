<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Arbys</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="text/javascript" href="{{ URL::asset('assets/js/jquery.js') }}" />
<link rel="text/javascript" href="{{ URL::asset('assets/js/bootstrap.min.js') }}" />
<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    margin-top: 0;
    right: 0;
    left: auto;
}
</style>
    </head>
    <body>

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">{{config('app.name', 'Laravel')}}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login'))
                    <li>
                        @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                    </li>
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
                    </li>
                </ul>
            </div>
            @endif
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
    </body>
</html>
