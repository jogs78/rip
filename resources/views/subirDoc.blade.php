<title>Subir archivo</title>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<style type="text/css">
       .tabla-temporal{
        float: right;
        margin-left: 46%;
        width: 40%;                  
        position: relative;
        margin-top: -1.8%;
      }
          
      .tabla-principal{      
        width: 40%;
        margin-left: 2%;
        margin-top: 3%;
      }
</style>
      <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<meta charset="UTF-8" />
   <meta charset="iso-8859-1" />
<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="{!! asset('css/estilos.css') !!}"> 

 <link rel="stylesheet" type="text/css" href="estilosUploadFile.css" />
  </head>               
    <script type="text/javascript">
  function marcar(source) 
    {
        checkboxes=document.getElementsByTagName('input');
        for(i=0;i<checkboxes.length;i++) 
        {
            if(checkboxes[i].type == "checkbox") 
            {
                checkboxes[i].checked=source.checked;
            }
        }
    }
</script>

<body class="bodyblanco" >        

<div id="container">
  <nav style="width: auto;">
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
 <!-- <label style="color:black;font-size:20px; margin-left: 40% margin-top:5%">Bienvenido {{ Auth::user()->name }}</label> -->

<p class="tema">Subir documento</p>
    <div>
    <div style="margin-left: 5%;margin-top: -1%;">
    <label>Dirigido a:<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" ></label>
</div>



    <div  style="width: 60%; margin-right: 5%; margin-left: 5%;">
  
 <table id="tabla1" class="tabla1"> 
      <thead>
    <tr>
      <th colspan="6">Beneficiarios</th>
    </tr>
    <tr>
        <th colspan="1">Nombres</th>
        <th colspan="1">Apellido paterno</th>
        <th colspan="1">Apellido materno</th>           
        <th colspan="1">email</th>   
        <th colspan="1">Accion</th>
      </tr>
  </thead>
         
        
        <tbody>
                      
            @foreach($usuario as $us)
   
            <tr id="{{$us->id}}">

                <td>{{$us->name}}</td>
                <td>{{$us->apellido_paterno}}</td>
                <td>{{$us->apellido_materno}}</td>
                <td>{{$us->email}}</td>
                <td class="check"><input id="beneficiario" name="receptor[]" value="{{$us->id}}" type="checkbox"></td>
 
            </tr> 
                
                    @endforeach 
  
        </tbody>
        

    </table>    
    </div>

 <form class="form-center" style="background-color: #76a07c;margin-left: 5%;width: 80%" method="POST" action="/subirdoc" accept-charset="UTF-8" enctype="multipart/form-data" > 
         {{ csrf_field() }} 



          <div>
        
        <table id="tabla2" style="width: 100%; ">
      <thead>
    <tr>
      <th colspan="6">Seleccionados</th>
    </tr>
    <tr>
        <th colspan="1">Nombres</th>
        <th colspan="1">Apellido paterno</th>
        <th colspan="1">Apellido materno</th>           
        <th colspan="1">email</th>   
        <th colspan="1">Accion</th>
      </tr>
    </thead>


        <tbody>

        </tbody>

    </table>
    </div>  

         
        <label >convocatoria</label>
    <select type="text" id="tipo_id" class="form-control{{ $errors->has('tipo_id') ? ' is-invalid' : '' }}" name="tipo_id" value="{{ old('tipo_id') }}" required autofocus>    
             @foreach($tipos as $tipo) 
   <option value="{{ $tipo->id}}"> {{ $tipo->tipo}} </option>
 @endforeach

                                @if ($errors->has('tipo_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_id') }}</strong>
                                    </span>
                                @endif

    </select> 





   


<div>

<label> Fecha</label>
<input type="date" id="fecha" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="<?php echo date("Y-m-d");?>{{ old('fecha') }}" required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
</div>



  
    <input type="submit" value="Subir">


</form>
</div>





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


  
<form action="{{ url('/Docsearch')}}" method="GET" id="my_form" style="position: fixed; width: 2px;height: 2px;margin-top: 800px;"></form>


 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> 


<script>

$(document).ready(function(){

    $('input[type=checkbox]').click(function() {

        if($(this).is(":checked"))

        {

            // el checkbox esta marcado

            // movemos la columna a la tabla2

            var tr=$(this).parents("tr").appendTo("#tabla2 tbody");

        }else{

            // el checkbox esta desmarcado

            // movemos la columna a la tabla1

            var tr=$(this).parents("tr").appendTo("#tabla1 tbody");

        }

    });

});

</script>