<!DOCTYPE html>
<html>
<head>
	<title>Datos</title>

		<link rel="stylesheet" href="{{ url('/css/datos.css') }}">    
    <link rel="stylesheet" href="{{ url('/css/adminbeneficiario.css') }}">    

   <link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="styleshee">




</head>
<body>


    <img src="https://upload.wikimedia.org/wikipedia/commons/d/d4/Logo-TecNM-2017.png" width="300" height="130" >
<img class="prodep" src="http://tesci.edomex.gob.mx/sites/tesci.edomex.gob.mx/files/images/prodep.jpg" width="300" height="130">


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


<div>
<table>
  <thead>
    <tr>
      <th  colspan="5">Tramites
      <a href="/subir/{{$tramites_id}}/evidencia" style="color: #000; margin-left: 70%; border-radius: 10;font-size: 14px;">Agregar Evidencia</a>
      <!-- <img src="/img/add.png" style="width: 6.5%;height: 6.5%;"> -->
      </th>        
    </tr>
    <tr>
      
      
      <th colspan="1">Evidencia</th>             
      <th colspan="1">Beneficiario</th>  
      <th colspan="3">Acción</th>                
    </tr>


  </thead>  
  <tbody>
     @foreach ($tramites as $tramite)          
    <tr>
      <div id="resultados">        
               
        <td>{{$tramite->documento}}</td> 
        <td>{{$tramite->name}} {{$tramite->apellido_paterno}} {{$tramite->apellido_materno}}</td>         
        
        <td><a href="/uploads/<?= $tramite->documento;   ?>" style="color: #000;">ver</a></td>
        <td><a href="/descargar/<?= $tramite->documento;   ?>" style="color: #000;" >descargar</a></td>
        <!-- 
        <td><i class="material-icons button edit">Ver</i></td>
        <td><i class="material-icons button edit">descargar</i></td> -->        
      </div>
    </tr>    
    @endforeach
  </tbody>
</table>
</div>
</body>
</html>