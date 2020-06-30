<link rel="stylesheet" href="{{ url('/css/datos.css') }}">    
<link rel="stylesheet" href="{{ url('/css/adminbeneficiario.css') }}">  




 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

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
        <li><a href="/notificaciones">Notificaciones </a></li>                       
                       
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
  <div class="container">
     @if(session('flash'))
      <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{session('flash')}}
</div> 
     @endif
 </div>
<div>
<table name="initialServers" id="initialServers">
  <thead>
    <tr>
     
     <!--  <input type="text" class="srch" id="filtro" style="width: 70%" placeholder="buscar usuario"> -->

     <!--  <th  colspan="5">Tramites<input  form="my_form" id="dato" name="dato" type="text" placeholder="Buscar trámite " style="margin-left:10%"></th -->   
    </tr>
    <tr>
      
      <th colspan="1">Nombre</th>            
      <th colspan="3">Acción</th>                
    </tr>

  </thead>  
  <tbody>
    
     @foreach ($tramites as $tramites)          
    <tr>
      <div id="resultados">        
        <td>{{$tramites->tipo}} de {{$tramites->name}}</td>
     
        <td> <a href="/documentosRip/{{$tramites->fecha}}/{{$tramites->tipo_id}}/{{$tramites->name}}" class="material-icons button edit"  style="color:#000">Documentos</a> </td> 
        <!-- 
        <td><i class="material-icons button edit">Ver</i></td>
        <td><i class="material-icons button edit">descargar</i></td> -->        
      </div>
    </tr>    
    @endforeach
  
  </tbody>
</table>

<form action="/buscartramite/{{$tramites->fecha}}" method="GET" id="my_form"></form>
</div>
</body>

 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $('.add').click(function() { return !$('#initialServers option:selected').clone().remove().appendTo('#receptor'); });  
        $('.remove').click(function() { return !$('#receptor option:selected').remove().appendTo('#initialServers'); });
        //$('.submit').click(function() { $('#actualServers option').prop('selected', 'selected'); });
        
        $('.submit').click(function() { 
          var serversVal = "";
          var serversText = "";
          $('#receptor option').each(function(){
            serversVal = serversVal + $(this).val() + "--";
            serversText = serversText + $(this).text() + "--";
          });
          alert(serversVal);
          alert(serversText);
        });

    
      $("#filtro").on("input",function(){
        $('#initialServers table').each(function(){
            if($(this).text().indexOf($("#filtro").val()) == -1){
                $(this).prop("table", false);
                $(this).fadeOut();
              }else{
                $(this).prop("table", false);
              $(this).fadeIn();
                }
          });
        });
            
    });
</script>

<!--  -->