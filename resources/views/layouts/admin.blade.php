<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @if(auth()->check())
        @if (auth()->user()->authorizeRoles('admin'))
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Gestor CEDE</title>
        <!-- CSS  -->
        <!-- Custom fonts-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('css/g/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="{{ asset('css/g/styles-main.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="{{ asset('css/g/datatables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="{{ asset('css/g/autoFill.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
        <link rel="shortcut icon" href="https://www.uniandes.edu.co/sites/default/files/favicon.ico" type="image/ico">
        @yield('head')
    </head>
    <body>
        <div class="tamaño">
            <div class="navbar-fixed">
                <nav>
                    <div class="nav-wrapper light-blue darken-4">
                        <a href="#!" class="brand-logo">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" height="55" class="imgEspeDMG">
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a class="dropdown-trigger white-text itemUser" href="http://192.168.1.145:8126/admin/metadata/2/edit#!" data-target="dropdown1">
                                    <img src="{{ asset('img/user.jpg') }}" alt="Logo" class="imgUser">Administrador
                                    <i class="material-icons right">arrow_drop_down</i>
                                </a>
                                <ul id="dropdown1" class="dropdown-content " tabindex="0">
                                    <li tabindex="0"><a href="#" class="black-text">Logout</a></li>
                                    <li tabindex="0"><a href="#" class="black-text">Cambio de Contraseña</a></li>
                                    <li class="divider" tabindex="0"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
        @include('admin.include.sidebar')
        
        <div class="col s12 m9">
        @yield('contenido')
        </div>
        </div>
        <!--  Scripts-->
        <script src="{{ asset('js/g/jquery.min.js') }}"></script>
        
        
        @yield('javascript')
        <script src="{{ asset('js/g/materialize.js') }}"></script>
        <script src="{{ asset('js/g/init.js') }}"></script>
    </body>
   @endif
    @endif 
</html>