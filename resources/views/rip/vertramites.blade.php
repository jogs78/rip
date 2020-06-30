<link rel="stylesheet" href="{{ url('/css/datos.css') }}">    
<link rel="stylesheet" href="{{ url('/css/adminbeneficiario.css') }}">    
<link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="styleshee">

<div id="container" style="margin-top: -1.5%">
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
        <!-- <li><a href="https://www.tuxtla.tecnm.mx/">ITTG</a></li>    -->
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

 <img src="/img/Logotec.png" width="18%" height="20%" style="padding: 20px" >

<img src="/img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">

<title>Inicio</title>    
<style type="text/css">
  .formapdf { 
  list-style: url("/img/formapdf.png") 
  square;
  padding-top: 30px;
  width:20px ; 
  margin-left:35%;
  font-size: 15px; }
  .ver{   
    
    height:52px;
    margin-top: -4%;
  }
  .descarga{    
    height:40px;
    margin-top: -4%;
  }
</style>
<body>
<div>
<table>
  <thead>
    <tr>
      <th  colspan="5">Tramites</th>            
    </tr>
    <tr>
      
      
      <th colspan="1">Convocatoria</th>             
      <th colspan="1">Beneficiario</th>  
      <th colspan="3">Acción</th>                
    </tr>


  </thead>  
  <tbody>
     @foreach ($tramites as $tramite)          
    <tr>
      <div id="resultados">        
               
        <td>{{$tramite->tipo}}</td> 
        <td>{{$tramite->name}} {{$tramite->apellido_paterno}} {{$tramite->apellido_materno}}</td>         
        
        <td><a href="/documentosRip/{{$tramite->tramites_id}}" style="color: #000;">Documentos</a></td>
        <td><a href="/subir/{{$tramite->tramites_id}}/evidencia" style="color: #000;">Subir</a></td>
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
