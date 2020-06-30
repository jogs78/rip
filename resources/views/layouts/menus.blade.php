<link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">
<style type="text/css" id="albinomouse-custom-css">
body,button,input,select,textarea{font-family:Open Sans;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans;}
</style>
<div id=rip>
<div id="container">
    <nav>
        <ul>
           <li><a href="/inicioRip">Inicio</a></li>
            <li><a>Trámites <i class="down"></i></a>
             <!--Primer Menu Desplegable -->
            <ul>
                <li><a href="/subir">Subir</a></li>
                <li><a href="/documento">Dividir</a></li>                
            </ul>        
            </li>            
        <li><a href="/beneficiarios">Beneficiario</a></li>   
        <li><a  href="/notificaciones">Notificaciones</i></a></li>                  
        <!-- <li><a href="https://www.tuxtla.tecnm.mx/">ITTG</a></li>    -->
        <li><a href="http://www.dgesu.ses.sep.gob.mx/PRODEP.htm" target="_blank">PRODEP</a></li> 
        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>  
        </ul>
    </nav>
 </div>

 <img src="img/Logotec.png" width="18%" height="20%" style="padding: 20px" >

<img src="img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">

		<main >
            @yield('menurip')
        </main>
</div>



