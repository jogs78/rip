
<!DOCTYPE html>
<html>
<head>

      <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<meta charset="UTF-8" />
   <meta charset="iso-8859-1" />
<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="{!! asset('css/estilos.css') !!}"/>     
 <link rel="stylesheet" type="text/css" href="estilosUploadFile.css" />
  </head>   
  <style type="text/css">
    body,button,input,select,textarea{font-family:Source Sans Pro;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Source Sans Pro;}
  </style>                
<body>
         <title>Dividir</title>


<body class="bodyblanco" >        

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
        
                <li><a href="/notificaciones">Notificaciones</a></li>                    
        
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
 <label style="color:black;font-size:20px; margin-left: 50% ">Bienvenido {{ Auth::user()->name }}</label>

<p class="tema">Dividir</p>

<?php
  function accion(){
    echo "accion";
  }
  function acciondos(){
    echo 19;
  }
?>
 <form class="form-center" style="background-color: #76a07c; width:50%; "accept-charset="UTF-8" enctype="multipart/form-data" method="POST" action="/dividirdocumento" /> 
         @csrf
    <div class="drag-drop">
            <input type="file" id="archivo" name="archivo"/></li>            
            <span class="fa-stack fa-2x">
                <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                <i class="fa fa-circle fa-stack-1x top medium"></i>
                <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
            </span>
            <span class="desc">Seleccione su archivo</span>
    </div>

  
<div>

<input type="submit" value="Dividir" name="cargar" /> </div> 
<!-- <input type="submit" name="dividir" value="dividir" onclick="div();" /> -->



    </form>
@if(Session::has('flash_message'))
{{Session::get('flash_message')}}
@endif
 </body>
</html>

</script> 
  </form>
    </body>
    </html>


