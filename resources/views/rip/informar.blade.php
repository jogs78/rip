<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
   <meta charset="iso-8859-1" />
<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="{!! asset('css/estilos.css') !!}">     
 <link rel="stylesheet" type="text/css" href="estilosUploadFile.css" />

        <style>

            form {
            width: 25em;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: .5em;
            margin: 1em;
            box-shadow: .25em .25em 0 #ccc;
        }
     </style>
  </head>
         <title>Informar resultados</title>


<img src="https://upload.wikimedia.org/wikipedia/commons/d/d4/Logo-TecNM-2017.png" width="200" height="120" style="padding: 20px" >
<img src="http://tesci.edomex.gob.mx/sites/tesci.edomex.gob.mx/files/images/prodep.jpg" width="200" height="100" style="margin-left: 50%;">
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



         <p class="tema">Informar resultados</p>

 <form class="form-center" style="background:#89b7c6">
<div class="drag-drop">
	<input type="file" id="myfile" name="myfile" class="rm-input" onchange="selectedFile();"/></li>
            
            <span class="fa-stack fa-2x">
                <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                <i class="fa fa-circle fa-stack-1x top medium"></i>
                <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
            </span>
            <span class="desc">Pulse aquí para añadir los resultados</span>
        </div>

<div>
<label for="name"  >Nombre de archivo</label>
<input type="text" id="name" />
</div>
<div>
<label for="Fecha">Fecha</label>
<input type="date" class="form-control" id="Fecha" />
</div>
<div>
<label for="Clave">Clave</label>
<input type="text" class="form-control" id="clave" />
</div>
<div>
<label for="Convocatoria">convocatoria</label>
<select name="convocatoria" class="opciones">
        <option value=" "></option>
        <option> Reconocimiento a PTC con perfil deseable.</option>
        <option> Apoyo a PTC con perfil deseable.</option>
        <option>Apoyo a la reincorporación de ex becarios de PROMEP.</option>
        <option>Apoyo a la incorporación de nuevos PTC.</option>
        <option>Apoyo para estudios de posgrados de alta calidad.</option>
        <option>Apoyo para tesis Apoyos para redacción de tesis de doctorado y de maestría.</option>
        <option>Apoyo para el fortalecimiento de los CA, la integración de redes temáticas de colaboración de cuerpos académicos.</option>
        <option>Apoyo para gastos de publicación</option>
        <option>Apoyo para registros de patentes.</option>
        <option>Estudios posdoctorales.</option>
        <option>Estancias cortas de investigación.</option>
    </select>
</div>
<div>
<label>Dictamen    </label>
    <select name="Dictamen" class="opciones">
        <option value=" "></option>
        <option value="ACEPTADO">Aceptado</option>
        <option value="RECHAZADO">Rechazado</option>
    </select>
</div>

<div>
<label">Dirigido a:</label>
    <select name="Dirigido" class="opciones">
        <option value=" "></option>
        <option value="D1">Jorge Lopez Perez</option>
        <option value="D2">Juan Pablo Villalobos Mesa</option>
        <option value="D3">Maria Patricia Sanchez Hernandez</option>      
    </select>
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
                    alert('Transferencia completa');
                    var progressBar = document.getElementById("progressBar");
                    var percentageDiv = document.getElementById("percentageCalc");
                    progressBar.value = 100;
                    percentageDiv.innerHTML = "100%";
                }   
     
                function uploadFailed(evt) {
                    alert("Hubo un error al subir el archivo.");
                }
     
                function uploadCanceled(evt) {
                    alert("La operación se canceló o la conexión fue interrunpida.");
                }
     
            </script>

      
        <body>
            <div id="wrap">
                <div class="field">
                    <ul class="options">
                        
                            <input type="file" id="myfile" name="myfile" class="rm-input" onchange="selectedFile();"/>
                        
                        
                            <div id="fileSize"></div>
                        
                            <div id="fileType"></div>
                     
                        
                            <input type="button" style="background: #3a9ba5; margin-top:10px" value="Aceptar" onClick="uploadFile()" class="rm-button" />
                      
                      
                    </ul>
                </div>
            </div>
            <div>
                <progress  id="progressBar" value="0" max="100" class="rm-progress" style="margin-top: 20px"></progress>
                <div id="percentageCalc"></div>        
            </div>
        </body>

    </form>

    </html>