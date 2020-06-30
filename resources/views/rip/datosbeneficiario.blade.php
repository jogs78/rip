
  <title>Datos</title>

    <link rel="stylesheet" href="{{ url('/css/datos.css') }}">    
    <link rel="stylesheet" href="{{ url('/css/adminbeneficiario.css') }}">    

   <link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="styleshee">

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

<div id="container" style="margin-top: 1%">
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

<div><input type="button" onclick="history.back()" name="volver atrás" value="volver atrás" style="background-color:#f1faf1"></div>
<div>
<table>
  <thead>
    <tr>
      <th  colspan="5">Tramites</th>           
    </tr>
    <tr>
      <th colspan="1">convocatoria</th>                     
      <th colspan="3">Acción</th>                
    </tr>


  </thead>  
  <tbody>
    
      @foreach ($tramites as $tramites)          
    <tr>
      <div id="resultados">
              
        <td>{{$tramites->tipo}}</td> 
                                   
        <td><a style="color:#000; text-align: center;" href="/datosBen/{{$tramites->id}}/{{$tramites->tipo_id}}">
           Documentos</a></td>

        
      </div>
    </tr>    
    @endforeach



  </tbody>
</table>
<!-- <form action="{{ url('/buscatramite')}}" method="GET" id="my_form"></form> -->
</div>
</body>
</html>