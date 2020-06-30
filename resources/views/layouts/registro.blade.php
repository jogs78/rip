<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PRODEP-ITTG') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div id="container" style="margin-top: 2%">
    <nav>
         <ul>
           <li><a href="/inicioB">Inicio</a></li>                                          
                <li><a href="/listar">Trámites</a></li>
                           
        <li><a href="/notificacionesben">Notificaciones <label style="background-color:#f9892c;width: 45px;height: 45px;
     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border-radius: 50%;padding-top: -60px">{{$data}}</label></a></li> 
        <!-- <li><a href="/datosben">Perfil</a></li>   -->
        <li><a href="http://www.dgesu.ses.sep.gob.mx/PRODEP.htm">PRODEP</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>           
                <li><a> Bienvenido {{ Auth::user()->name }} <i class="down"></i></a>
                    <ul>
                
                <li><a href="/ediCuenta">Editar cuenta</a></li>                
                <li><a href="/ediPerfil">Editar perfil</a></li>                
            </ul>        
            </li>    
        </ul>
    </nav>
 </div>
</head><style type="text/css" id="albinomouse-custom-css">
body,button,input,select,textarea{font-family:Open Sans; font-size:16px;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans; font-size:16px;}
</style>
 

<body>
    <div>
       
        <main >
            @yield('content')
        </main>
    </div>
</script>
</body>
</html>
