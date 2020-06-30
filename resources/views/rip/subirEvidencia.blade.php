





    <title>Subir archivo</title>

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
 <img src="/img/Logotec.png" width="18%" height="20%" style="padding: 20px" >

<img src="/img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">
 <!-- <label style="color:black;font-size:20px; margin-left: 40% margin-top:5%">Bienvenido {{ Auth::user()->name }}</label> -->

<p class="tema">Subir Evidencia</p>    
 <form class="form-center" style="background-color: #76a07c;width: 30%" method="POST" action="/subirEvi" accept-charset="UTF-8" enctype="multipart/form-data" > 
         {{ csrf_field() }}  
  
     <div>

<label> Tipo de Tramite</label>
<input type="text" value="{{$name_tramite}}" disabled>                            
</div>
<input type="text" id="tramiteId"  class="form-control{{ $errors->has('tramiteId') ? ' is-invalid' : '' }}" name="tramiteId" value="{{$id_tramite}}" style="display: none;">  

<!-- <label> Beneficiario(s)</label>
<select type="text" id="beneficiarios" class="form-control{{ $errors->has('beneficiarios') ? ' is-invalid' : '' }}" name="beneficiarios" value="{{ old('beneficiarios') }}" required autofocus>    
 
    </select> -->

<div>
<label>Descripción</label>
<input type="Text" name="descripcion">
</div>


  <div class="drag-drop">
            <input type="file" id="evidencia" name="evidencia" class="rm-input{{ $errors->has('evidencia') ? ' is-invalid' : '' }}" value="{{ old('evidencia') }}" onchange="selectedFile();" required accept="application/pdf"></li>            
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

  
    <input type="submit" value="Subir">
</form></div>



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
              </script>