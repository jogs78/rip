

<link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">
<title>Visualizar</title>

<img src="https://upload.wikimedia.org/wikipedia/commons/d/d4/Logo-TecNM-2017.png" width="200" height="120" style="padding: 20px" >

<img src="http://tesci.edomex.gob.mx/sites/tesci.edomex.gob.mx/files/images/prodep.jpg" width="200" height="100" style="margin-left: 50%;">

<style type="text/css" id="custom-background-css">
body.custom-background { background-color: #fafafa; }
</style>

<!-- Begin Custom CSS -->
<style type="text/css" id="albinomouse-custom-css">
body,button,input,select,textarea{font-family:Source Sans Pro;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Source Sans Pro;}

 .letra{
    background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                font-size: 70px;
                text-align: center;
                height: 100vh;
                margin: 0;
 }

 .tema {
  color: #1431e5; 
  font-size: 40px; 
  margin-top: -75px;
  text-align: center;
  font: small-caps 200%/200% serif;  
  
}

.formapdf { 
  list-style: url("img/formapdf.png") 
  square;
  padding-top: -15px;
  width:20px ; 
  margin-left:35%; }

  .ver{   
    margin-left: 60%;
    height:42px;
    margin-top: -6%;
  }
  .descarga{
    margin-left: 70%;    
    height:52px;
    margin-top: -6%;
  }s
</style>
 
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
        <li><a>Notificaciones <i class="down"></i></a>
             <!--Primer Menu Desplegable -->
            <ul>
                <li><a href="/notificaciones">Enviar</a></li>
                <li><a href="/verNoti">Ver</a></li>                
            </ul>        
            </li>    
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
        </ul>
    </nav>
 </div>

</head>
<label style="color:black;font-size:20px; margin-left: 50% ">Bienvenido</label>


<form action="" class="search">
    <input class="submit" value="" type="submit">
    <label for="submit" class="submit"></label>
    
    <!-- trigger button and input -->
    <a href="javascript: void(0)" class="icon"></a>
    <input type="search" name="Search" class="search" placeholder="Buscar">
</form>
 <p class="tema">Ver y descargar documento</p>
 
<body class="bodyblanco">

	<style type="text/css">
		.boton{

			vertical-align: middle;
			margin-top: 10px;
			margin-left:10px;
		}
	</style>
<!--<div>
<img src="/img/pdf.png" alt="" style="margin-top:-50px; margin-left:130px;">

  <img src="img/ver.png" alt="" width="32" height="32" style="margin-top: -270; margin-left: 800;">
  <img src="img/descarga.png" alt="" width="32" height="32" style="margin-top: -270;margin-left: 850;">

  <img src="img/ver.png" alt="" width="32" height="32" style="margin-top: -215; margin-left: 800;">
  <img src="img/descarga.png" alt="" width="32" height="32" style="margin-top: -215;margin-left: 850;">

  <img src="img/ver.png" alt="" width="32" height="32" style="margin-top: -160; margin-left: 800;">
  <img src="img/descarga.png" alt="" width="32" height="32" style="margin-top: -160;margin-left: 850;">

  <img src="img/ver.png" alt="" width="32" height="32" style="margin-top: -115; margin-left: 800;">
  <img src="img/descarga.png" alt="" width="32" height="32" style="margin-top: -115;margin-left: 850;">

 <img src="img/ver.png" alt="" width="32" height="32" style="margin-top:-75; margin-left: 800;">
  <img src="img/descarga.png" alt="" width="32" height="32" style="margin-top: -75;margin-left: 850;">

 
</div> -->
 
<div>
  
  <?php
  echo "<table class=formapdf>";
    $directory=storage_path() . '/app';
    $dirint = dir($directory);
     
    while (($archivo = $dirint->read()) !== false)
    { 
      //f (preg_match( '/\.(?:jpe?g|png|gif)$/i
        if (preg_match( '/\.(?:pdf)$/i', $archivo)) {
    echo "<li class=formapdf>$archivo</li><br>\n"; ?>

        <a href="storage/<?= $archivo;   ?>"  ><input type="image" src="img/descarga.png" class="descarga"></a>

        <a href="uploads/<?= $archivo;   ?>"  ><input type="image" src="img/ver.png" class="ver"></a>
    
<!-- 
    <img src=img/ver.png  class=ver>
    <img src=img/descarga.png class=descarga> -->
    <?php
              }
    }  
    $dirint->close();
    echo"</table>";
?> 
</div>
</body>
