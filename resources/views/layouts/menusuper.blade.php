
<div id=menusuper>
<div id="container">    
   <nav>
        <ul>
        <li><a href="/iniciosuper">Ver tramites</a></li>                      
        <li><a href="/notificacionsuper">Notificaciones</a></li>   
        <li><a href="https://www.tuxtla.tecnm.mx/">ITTG</a></li>   
        <li><a href="http://www.dgesu.ses.sep.gob.mx/PRODEP.htm">PRODEP</a></li> 
        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li> 
                                    <li> Bienvenido {{ Auth::user()->name }}</li>    
        </ul>
    </nav>
</div>
	<img src="/img/Logotec.png" width="18%" height="20%" style="padding: 20px" >
<img src="/img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">	


	<main class="menusuper">
            @yield('menusup')
        </main>
	
</div>
