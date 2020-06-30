<title>Editar archivo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
      <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>  

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<meta charset="UTF-8" />
   <meta charset="iso-8859-1" />
<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="{!! asset('css/estilos.css') !!}"> 

 <link rel="stylesheet" type="text/css" href="estilosUploadFile.css" />
  </head>               
    

<body class="bodyblanco" >        

<div id="container">
  <nav>
        <ul>
           <li><a href="/inicioRip">Inicio</a></li>
            <li><a style="">Trámites <i class="down"></i></a>
             <!--Primer Menu Desplegable -->
            <ul>
                <li><a href="/subir">Subir</a></li>
                <li><a href="/documento">Dividir</a></li>                
            </ul>        
            </li>            
        <li><a href="/beneficiarios">Beneficiario</a></li>   
        <li><a  href="/notificaciones">Notificaciones</i></a></li>                  
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
 <!-- <label style="color:black;font-size:20px; margin-left: 40% margin-top:5%">Bienvenido {{ Auth::user()->name }}</label> -->

<p class="tema">Editar tramite</p>

<form method="post" class="form-center" style="background-color: #76a07c;"   action="/updating/{{$edit->id}}/tramite" accept-charset="UTF-8" enctype="multipart/form-data" > 
    @csrf
    <input type="hidden" name="_method" value="PUT">   

         {{ csrf_field() }}   


   
    
        
<div>
        <label >convocatoria</label>
    <select type="text" id="tipo_id" class="form-control{{ $errors->has('tipo_id') ? ' is-invalid' : '' }}" name="tipo_id" value="{{ old('tipo_id') }}" required autofocus>    
        <option value="{{ $id_tramite}}" > {{$name_tramite}} </option>             
             @foreach($tipos as $tipo) 
    
           <option value="{{ $tipo->id}}"> {{ $tipo->tipo}} </option>
         @endforeach

                                @if ($errors->has('tipo_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_id') }}</strong>
                                    </span>
                                @endif

    </select> 
       
    </div>  
     <div>

<label> Fecha</label>
<input type="date" id="fecha" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ $edit->fecha}}" required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
</div>

    <div class="drag-drop" style="visibility: hidden;">
            <input type="file" id="evidencia" name="evidencia" class="rm-input{{ $errors->has('evidencia') ? ' is-invalid' : '' }}" value="/storage/app/    {{$edit->evidencia}}" onchange="selectedFile();" disabled></li>            
            <span class="fa-stack fa-2x">
                <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                <i class="fa fa-circle fa-stack-1x top medium"></i>
                <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
            </span>
            <span class="desc">Pulse aquí para añadir archivos</span>

             @if ($errors->has('evidencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('evidencia') }}</strong>
                                    </span>
                                @endif
    </div>

    <input type="text" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" value="Documento: {{$edit->evidencia}}" readonly="readonly" style="margin-bottom: 2%; text-align: center;margin-top: -20%;">


    <input type="text" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" value="Beneficiario: {{ $name->name}} {{ $name->apellido_paterno}} {{ $name->apellido_materno}}" readonly="readonly" style="margin-bottom: 4%; text-align: center;">

    <input type="button" id="mostrar" name="boton1" value="Mostrar beneficiarios" style="margin-top: 2%;height: 30px;background-color: #fff; margin-bottom: 3%;">
    <input type="button" id="ocultar" name="boton2" value="Ocultar elementos" style="height: 30px;background-color: #fff;margin-bottom: 3%;margin-top: 2%">

      <div id="division" class="division" style="display: none;">
        <input  ftype="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar usuario " style="margin-left:50%; margin-bottom: 2%;">
<table >
  <thead>
    <tr>
      <th colspan="8">Nuevo beneficiario:
           </th>      
      
      
    </tr>
    <tr>
        <th colspan="1"></th>
        <th colspan="1"> Nombre(s)</th>        
        <th colspan="1"> Apellido Paterno</th>
        <th colspan="1"> Apellido Materno</th>         
        

      </tr>
  </thead>

</table>        
<table id="tabla">  
  <tbody>


        @foreach($usuario as $us)
    <tr>
    <td class="check"><input type="radio" id="users_id" class="form-control{{ $errors->has('users_id') ? ' is-invalid' : '' }}" name="users_id" value="{{$us->id}}" autofocus>
              


                                @if ($errors->has('users_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('users_id') }}</strong>
                                    </span>
                                @endif </td>
    
    <td>{{$us->name}}</td>  
    <td>{{$us->apellido_paterno}}</td>        
    <td>{{$us->apellido_materno}}</td>                     

    </tr> 
  </tbody>
 
  @endforeach
</table>
    </div>

<input type="submit" value="Subir">
  </form>

            <script type="text/javascript">
     
                  function selectedFile() {

                    var archivoSeleccionado = document.getElementById("myfile");
                    var file = archivoSeleccionado.files[0];
                    if (file) {
                        var fileSize = 0;
                        if (file.size > 1048576)
                            fileSize = (Math.round(file.size * 100 / 1048576) / 100).toString() + ' MB';
                        else
                            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + ' Kb';
     
                        var divfileSize = document.getElementById('fileSize');
                        var divfileType = document.getElementById('fileType');
                        divfileSize.innerHTML = 'Tamaño: ' + fileSize;
                        divfileType.innerHTML = 'Tipo: ' + file.type;
     
                    }
                  }    
     
                function uploadFile(){
                    //var url = "http://localhost/ReadMoveWebServices/WSUploadFile.asmx?op=UploadFile";
                    var url = "/ReadMoveWebServices/WSUploadFile.asmx/UploadFile";
                    var archivoSeleccionado = document.getElementById("myfile");
                    var file = archivoSeleccionado.files[0];
                    var fd = new FormData();
                    fd.append("archivo", file);
                    var xmlHTTP= new XMLHttpRequest();
                    //xmlHTTP.upload.addEventListener("loadstart", loadStartFunction, false);
                    xmlHTTP.upload.addEventListener("progress", progressFunction, false);
                    xmlHTTP.addEventListener("load", transferCompleteFunction, false);
                    xmlHTTP.addEventListener("error", uploadFailed, false);
                    xmlHTTP.addEventListener("abort", uploadCanceled, false);
                    xmlHTTP.open("POST", url, true);
                    //xmlHTTP.setRequestHeader('book_id','10');
                    xmlHTTP.send(fd);
                }       
     
                function progressFunction(evt){
                    var progressBar = document.getElementById("progressBar");
                    var percentageDiv = document.getElementById("percentageCalc");
                    if (evt.lengthComputable) {
                        progressBar.max = evt.total;
                        progressBar.value = evt.loaded;
                        percentageDiv.innerHTML = Math.round(evt.loaded / evt.total * 100) + "%";
                    }
                }
     
                function loadStartFunction(evt){
                    alert('Comenzando a subir el archivo');
                }
                function transferCompleteFunction(evt){
                    alert('Archivo exitoso');
                    var progressBar = document.getElementById("progressBar");
                    var percentageDiv = document.getElementById("percentageCalc");
                    progressBar.value = 100;
                    percentageDiv.innerHTML = "100%";
                }   
     
                function uploadFailed(evt) {
                    alert("Hubo un error al subir el archivo.");
                }
     
                function uploadCanceled(evt) {
                    alert("La operación se canceló o la conexión fue interrumpida.");
                }
     
            </script>
      

    <script type="text/javascript">
    $(document).ready(function(){
  $("#mostrar").click(function(){
    $('.division').show(800,function() {
              
    });
  });
  $("#ocultar").click(function(){
    $('.division').hide(800,function() {
              
    });
  });
});
</script>

<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  
<form action="{{ url('/Docsearch')}}" method="GET" id="my_form" style="position: fixed;"></form>
