 <title>Editar beneficiario</title>

<style type="text/css">  
body,button,input,select,textarea{font-family:Open Sans,sans-serif;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans,sans-serif;} 
nav {
    margin: 30px auto;
    background-color: #2175bc;      
  box-shadow: 0px 3px 20px 3px #162433;
}

nav ul {
   padding: 0;
    margin: 0 auto;
    list-style: none;
    position: relative;
    text-align: center;   
}
    
nav ul li {
    display:inline-block;
    background-color: #2175bc;
     font-size:18px;
    font-family:'Open Sans', sans-serif;
    }

nav a {
    top: -20;
    display:block;
    padding:0 20px; 
    color:#FFF;
    font-size:17px;
    line-height: 60px;
    text-decoration:none;  
}

nav a:hover { 
    background-color: #000000;  
}

/* Hide Dropdowns by Default */
nav ul ul {
    display: none;
    position: absolute; 
    top: 60px; /* the height of the main nav */   
}
    
/* Display Dropdowns on Hover */
nav ul li:hover > ul {
    display:inherit;
     font-family:'Open Sans', sans-serif;
}
    
/* Fisrt Tier Dropdown */
nav ul ul li {
    width:170px;
    float:none;
    display:list-item;
    position: relative;
     font-family:'Open Sans', sans-serif;
}

/* Second, Third and more Tiers */
nav ul ul ul li {
    position: relative;
    top:60px; 
    left:170px;
    font-family:'Open Sans', sans-serif;
}



.formulario span {
  height: 48px;
  line-height: 48px;
  position: absolute;
  text-align: center;

}

.formulario input {
  border: none;
  height: 48px;  /* ancho de campos */
  outline: none;  
  width: 50%;
}

.formulario input[type="text"] {
  background-color: #fff;
  border-top: 2px solid #2c90c6;
  border-right: 1px solid #000;
  border-left: 1px solid #000;
  border-radius: 5px 5px 0 0;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  -o-border-radius: 5px 5px 0 0;
  -ms-border-radius: 5px 5px 0 0;
  color: #363636;
  padding-left: 36px; 
  width: 50%; 

}

.formulario input[type="email"] {
  background-color: #fff;
  border-top: 2px solid #2c90c6;
  border-right: 1px solid #000;
  border-left: 1px solid #000;
  border-radius: 5px 5px 0 0;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  -o-border-radius: 5px 5px 0 0;
  -ms-border-radius: 5px 5px 0 0;
  color: #363636;
  padding-left: 36px; 
  width: 50%;
}

.formulario input[type="date"] {
 background-color: #fff;
  border-top: 2px solid #2c90c6;
  border-right: 1px solid #000;
  border-left: 1px solid #000;
  border-radius: 5px 5px 0 0;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  -o-border-radius: 5px 5px 0 0;
  -ms-border-radius: 5px 5px 0 0;
  color: #363636;
  padding-left: 36px;
  width: 50%;
}

.formulario input[type="submit"] {
  background-color: #3a9ba5;
  border: 1px solid #1d9667;
  border-radius: 15px;
  -moz-border-radius: 15px;
  -webkit-border-radius: 15px;
  -ms-border-radius: 15px;
  -o-border-radius: 15px;
  color: #fff;
  font-weight: bold;
  line-height: 48px;
  text-align: center;
  text-transform: uppercase;  
  margin-top: 10px;
}

.formulario select {
  margin:0px auto 0px auto; 
  border: 1px solid #1d9667;
   border-radius: 4px;
   -moz-border-radius: 4px;
  -webkit-border-radius:4px;
  -ms-border-radius: 4px;
  -o-border-radius: 4px;
   height:48px;
   width: 50%;
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

 <img src="/img/Logotec.png" width="18%" height="20%" style="padding:20px">
<img src="/img/prodep.jpg" width="18%" height="13%"style="margin-left:50%;">
<script type="text/javascript">
function cargarAreas() {
    var array = ["Ciencias Sociales y Administrativas", "Ingeniería y Tecnología", "Educación Humanidades y Arte"];
    array.sort();
    addOptions("area", array);
}

//Función para agregar opciones a un <select>.
function addOptions(domElement, array) {
    var selector = document.getElementsByName(domElement)[0];
    for (area in array) {
        var opcion = document.createElement("option");
        opcion.text = array[area];
        // Añadimos un value a los option para hacer mas facil escoger los pueblos
        opcion.value = array[area].toLowerCase()
        selector.add(opcion);
    }
}

function buscarDisciplinas() {
    // Objeto de provincias con pueblos
    var listaDisciplinas = {        
      ciencias sociales y administrativas: [],
     ingeniería y tecnología: [],
      educación humanidades y arte: []
    }

    var areas = document.getElementById('area')
    var disciplinas = document.getElementById('disciplina')
    var areaSeleccionada = areas.value
    
    // Se limpian los pueblos
    disciplinas.innerHTML = '<option value="">Seleccione disciplina...</option>'    
    if(areaSeleccionada !== ''){
      // Se seleccionan los pueblos y se ordenan
      areaSeleccionada = listaDisciplinas[areaSeleccionada]
      areaSeleccionada.sort()
      // Insertamos los pueblos
      areaSeleccionada.forEach(function(disciplina){
        let opcion = document.createElement('option')
        opcion.value = disciplina
        opcion.text = disciplina
        disciplinas.add(opcion)
      });
    }    
  }
 // Iniciar la carga de provincias solo para comprobar que funciona
cargarAreas();
</script>
<script type="text/javascript">
    window.addEventListener('load',function(){
document.getElementById('fecha_nacimiento').type= 'text';
document.getElementById('fecha_nacimiento').addEventListener('blur',function(){
document.getElementById('fecha_nacimiento').type= 'text';
});
document.getElementById('fecha_nacimiento').addEventListener('focus',function(){
document.getElementById('fecha_nacimiento').type= 'date';
});
});
</script>
<script type="text/javascript">
    window.addEventListener('load',function(){
document.getElementById('fecha_inscrpcion').type= 'text';
document.getElementById('fecha_inscrpcion').addEventListener('blur',function(){
document.getElementById('fecha_inscrpcion').type= 'text';
});
document.getElementById('fecha_inscrpcion').addEventListener('focus',function(){
document.getElementById('fecha_inscrpcion').type= 'date';
});
});
</script>
<script type="text/javascript">
    window.addEventListener('load',function(){
document.getElementById('fecha_contrato').type= 'text';
document.getElementById('fecha_contrato').addEventListener('blur',function(){
document.getElementById('fecha_contrato').type= 'text';
});

document.getElementById('fecha_contrato').addEventListener('focus',function(){
document.getElementById('fecha_contrato').type= 'date';
});
});
</script>
<script type="text/javascript">
    window.addEventListener('load',function(){
document.getElementById('fecha_titulo').type= 'text';
document.getElementById('fecha_titulo').addEventListener('blur',function(){
document.getElementById('fecha_titulo').type= 'text';
});
document.getElementById('fecha_titulo').addEventListener('focus',function(){
document.getElementById('fecha_titulo').type= 'date';
});
});
</script>
<p class="title" style="margin-top: 2%;text-align: center;color: #000;font-size:25px; font-family: Open sans">Editar información de {{$name->name}} {{$name->apellido_paterno}} {{$name->apellido_materno}}</p>
<div class="formulario" style="margin-left: 30%; margin-top:-2%;">  
  <form method="post" action="/beneficiario/{{$edit->user_id}}/edit"> 
    @csrf
    <input type="hidden" name="_method" value="PUT">   
   <select id="genero" type="text"  autocomplete="off" class="form-control{{ $errors->has('genero') ? ' is-invalid' : '' }}" name="genero" value="{{ old('genero') }}" style="text-align: center;width: 50%;" required autofocus >
                           
                             <option  value="{{$edit->genero}}">{{$edit->genero}}</option>
                             <option value="Masculino">Masculino</option>
                             <option value="Femenino">Femenino</option>                                                                    
                        </select>

                        <input id="rfc" type="text" placeholder="RFC" autocomplete="off" class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }}" name="rfc" value="{{$edit->rfc}}" required autofocus>

                        <select id="civil" autocomplete="off" class="form-control{{ $errors->has('civil') ? ' is-invalid' : '' }}" name="civil" value="{{ old('civil') }}" required autofocus style="text-align: center;width: 50%">
                           
                             <option  value="{{$edit->civil}}">{{$edit->civil}}</option>
                             <option value="Casado">Casado</option>
                             <option value="Soltero">Soltero</option>
                             <option value="Divorciado">Divorciado</option>
                             <option value="Uniónlibre">Unión libre</option>
                             <option value="Viudo">Viudo</option>                                   
                                  
                        </select>

                        <input id="nacionalidad" type="text" placeholder="Nacionalidad" autocomplete="off" class="form-control{{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}" name="nacionalidad" value="{{$edit->nacionalidad}}"required autofocus>

                        <input id="entidad" type="text" placeholder="Entidad de nacimiento" autocomplete="off" class="form-control{{ $errors->has('entidad') ? ' is-invalid' : '' }}" name="entidad" value="{{$edit->entidad}}"  required autofocus>

                        <input id="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" autocomplete="off"  class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" name="fecha_nacimiento" value="{{$edit->fecha_nacimiento}}" required>

                        <input id="telefono" type="text" placeholder="Telefono(casa)" autocomplete="off" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{$edit->telefono}}" required autofocus>

                        <input id="celular" type="text" placeholder="Celular" autocomplete="off" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{$edit->celular}}" required autofocus>

                        <input id="email_ins" type="email" placeholder="Email " autocomplete="off"  class="form-control{{ $errors->has('email_ins') ? ' is-invalid' : '' }}" name="email_ins" value="{{$edit->email_ins}}" required>

                        <input id="fecha_inscrpcion" type="date" placeholder="Fecha de inscripción" autocomplete="off"  class="form-control{{ $errors->has('fecha_inscrpcion') ? ' is-invalid' : '' }}" name="fecha_inscrpcion" value="{{$edit->fecha_inscrpcion}}" required>
                                                    
                        <select id="perfil" type="text" autocomplete="off" class="form-control{{ $errors->has('perfil') ? ' is-invalid' : '' }}" name="perfil"value="{{ old('perfil') }}" required autofocus style="text-align: center;width: 50%">

                            <option  value="{{$edit->perfil}}">{{$edit->perfil}}</option>
                             <option value="PTC">PTC</option>
                             <option value="PTC(PD)">PTC(Perfil deseable)</option>
                             <option value="CA">CA</option>      
                             <option value="CAEF">CAEF</option>                                     
                        </select>
                                 
                        <select name="area" onChange="agregarOpciones(this.form)" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" value="{{ old('area') }}" required="" style="width: 50%">

                        <option value="{{$edit->area}}">{{$edit->area}}</option>
                        <option value="Ciencias Sociales y Administrativas">Ciencias Sociales y Administrativas</option>
                        <option value="Ingeniería y Tecnología">Ingeniería y Tecnología</option>
                        <option value="Educación, Humanidades y Arte">Educación, Humanidades y Arte</option>                
                        </select>

 

<select name="disciplina"  class="form-control{{ $errors->has('disciplina') ? ' is-invalid' : '' }}" value="{{ old('disciplina')}}" required="" style="width: 50%">

<option value="{{$edit->disciplina}}">{{$edit->disciplina}}</option>

</select>

                        <input id="nombramiento" type="text" placeholder="nombramiento" autocomplete="off"  class="form-control{{ $errors->has('nombramiento') ? ' is-invalid' : '' }}" name="nombramiento" value="{{$edit->nombramiento }}" required>

                    <input id="tipo_nombramiento" type="text" placeholder="Tipo de nombramiento" autocomplete="off"  class="form-control{{ $errors->has('tipo_nombramiento') ? ' is-invalid' : '' }}" name="tipo_nombramiento" value="{{$edit->tipo_nombramiento}}" required>

                    <input id="dedicacion" type="text" placeholder="Dedicacion" autocomplete="off"  class="form-control{{ $errors->has('dedicacion') ? ' is-invalid' : '' }}" name="dedicacion" value="{{$edit->dedicacion}}" required>

                        <input id="unidad" type="text" placeholder="Unidad academica" autocomplete="off"  class="form-control{{ $errors->has('unidad') ? ' is-invalid' : '' }}" name="unidad" value="{{$edit->unidad}}" required>

                         <input id="fecha_contrato" type="date" placeholder="Fecha de contrato" autocomplete="off"  class="form-control{{ $errors->has('fecha_contrato') ? ' is-invalid' : '' }}" name="fecha_contrato" value="{{$edit->fecha_contrato}}" required>

                        <input id="nivel" type="text" placeholder="Nivel de estudios" autocomplete="off"  class="form-control{{ $errors->has('nivel') ? ' is-invalid' : '' }}" name="nivel" value="{{$edit->nivel}}" required>

                        <input id="siglas" type="text" placeholder="Siglas de los estudos" autocomplete="off"  class="form-control{{ $errors->has('siglas') ? ' is-invalid' : '' }}" name="siglas" value="{{$edit->siglas }}" required>

                        <input id="estudios" type="text" placeholder="Estudios en" autocomplete="off"  class="form-control{{ $errors->has('estudios') ? ' is-invalid' : '' }}" name="estudios" value="{{$edit->estudios }}" required>

                        <input id="pais" type="text" placeholder="País" autocomplete="off"  class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" value="{{$edit->pais}}" required>

                        <input id="institucion_otorgante" type="text" placeholder="Institución otorgante" autocomplete="off"  class="form-control{{ $errors->has('institucion_otorgante') ? ' is-invalid' : '' }}" name="institucion_otorgante" value="{{$edit->institucion_otorgante}}" required>

                         <input id="fecha_titulo" type="date" placeholder="Fecha de obtención de titulo" autocomplete="off"  class="form-control{{ $errors->has('fecha_titulo') ? ' is-invalid' : '' }}" name="fecha_titulo" value="{{$edit->fecha_titulo}}" required>

                         <input type="submit" value="Guardar" id="regis">                
        </form>    
</div>

<script language="javascript">
function agregarOpciones(form)
{
var selec = form.area.options;
var combo = form.disciplina.options;
combo.length = null;

    if (selec[0].selected == true)
    {
    var seleccionar = new Option("<-- esperando selección","","","");
    combo[0] = seleccionar;
    }

    if (selec[1].selected == true)
    {
    var cs1 = new Option("Administración","Administración","","");
    var cs2 = new Option("Administración (Otros)","Administración(Otros)","","");
    var cs3 = new Option("Administración de Empresas","AdministraciónEmpresas","","");
    var cs4 = new Option("Administración de Empresas Agropecuarias","EmpresasAgropecuarias","","");
    var cs5 = new Option("Administración de Empresas Pecuarias","EmpresasPecuarias","","");
    var cs6 = new Option("Administración de Hospitales y de la Atención Médica","AtenciónMédica","","");
    var cs7 = new Option("Administración de la Construcción","AdministraciónConstrucción","","");
    var cs8 = new Option("Administración de la Educación","AdministraciónEducación","","");
    var cs9 = new Option("Administración de la Producción","AdministraciónProducción","","");
    var cs10 = new Option("Administración de Obras","AdministraciónObras","","");
    var cs11 = new Option("Administración de Proyectos","AdministraciónProyectos","","");
    var cs12 = new Option("Administración de Recursos Humanos","RecursosHumanos","","");
    var cs13 = new Option("Administracion de Recursos Marinos","RecursosMarinos","","");
    var cs14 = new Option("Administración de Restaurantes y Gastronomía","RestaurantesGastronomía","","");
    var cs15 = new Option("Administración de Sistemas Educativos","SistemasEducativos","","");
    var cs16 = new Option("Administración del Desarrollo Urbano","DesarrolloUrbano","","");
    var cs17 = new Option("Administración Económica de México","EconómicadeMéxico","","");
    var cs18 = new Option("Administración Financiera y Finanzas","FinancierayFinanzas","","");
    var cs19 = new Option("Administración Industrial","AdministraciónIndustrial","","");
    var cs20 = new Option("Administración Laboral","AdministraciónLaboral","","");
    var cs21 = new Option("Administración Pecuaria","AdministraciónPecuaria","","");
    var cs22 = new Option("Administración Pública","AdministraciónPública","","");
    var cs23 = new Option("Administración Rural","AdministraciónRural","","");
    var cs24 = new Option("Administración Turística","AdministraciónTurística","","");
    var cs25 = new Option("Amparo","Amparo","","");
    var cs26 = new Option("Análisis Regional","AnálisisRegional","","");
    var cs27 = new Option("Antropología","Antropología","","");
    var cs28 = new Option("Antropología Cultural","AntropologíaCultural","","");
    var cs29 = new Option("Antropología Ecológica","AntropologíaEcológica","","");
    combo[0] = cs1;
    combo[1] = cs2;
    combo[2] = cs3;
    combo[3] = cs4;
    combo[4] = cs5;
    combo[5] = cs6;
    combo[6] = cs7;
    combo[7] = cs8;
    combo[8] = cs9;
    combo[9] = cs10;
    combo[10] = cs11;
    combo[11] = cs12;
    combo[12] = cs13;
    combo[13] = cs14;
    combo[14] = cs15;
    combo[15] = cs16;
    combo[16] = cs17;
    combo[17] = cs18;
    combo[18] = cs19;
    combo[19] = cs20;
    combo[20] = cs21;
    combo[21] = cs22;
    combo[22] = cs23;
    combo[23] = cs24;
    combo[24] = cs25;
    combo[25] = cs26;
    combo[26] = cs27;
    combo[27] = cs28;
    combo[28] = cs29;    
    }
    if (selec[2].selected == true)
    {
    var ing1 = new Option("Acabados Textiles","AcabadosTextiles","","");
    var ing2 = new Option("Aerodinámica","Aerodinámica","","");
    var ing3 = new Option("Aire Acondicionado y Refrigeración","AireAcondicionado","","");
    var ing4 = new Option("Algoritmos","Algoritmos","","");    
    var ing5 = new Option("Aparatos y Dispositivos Térmicos","AparatosDispositivos","","");    
    var ing6 = new Option("Arquitectura","Arquitectura","","");    
    var ing7 = new Option("Arquitectura (Otros)","Arquitectura(Otros)","","");    
    var ing8 = new Option("Arquitectura de Artes Plásticas","ArtesPlásticas","","");    
    var ing9 = new Option("Arquitectura de Bienes Muebles","BienesMuebles","","");    
    var ing10 = new Option("Arquitectura de Computadoras","ArquitecturadeComputadoras","","");    
    var ing11 = new Option("Arquitectura del Diseño","Arquitectura del Diseño","","");    
    var ing12 = new Option("Arquitectura del Paisaje","ArquitecturaPaisaje","","");    
    var ing13 = new Option("Automatización y Control","AutomatizaciónControl","","");    
    var ing14 = new Option("Bases de Datos","BasesDatos","","");    
    var ing15 = new Option("Básicas","Básicas","","");    
    var ing16 = new Option("Biorremedación","Biorremedación","","");    
    var ing17 = new Option("Biotecnología","Biotecnología","","");
    var ing18 = new Option("Biotecnología (Otros)","Biotecnología(Otros)","",""); 
    var ing19 = new Option("Biotecnología Agrícola","BiotecnologíaAgrícola","",""); 
    var ing20 = new Option("Biotecnología Ambiental","BiotecnologíaAmbiental","","");   
    var ing21 = new Option("Biotecnología de Alimentos","BiotecnologíaAlimentos","",""); 
    var ing22 = new Option("Biotecnología Marina","BiotecnologíaMarina","",""); 
    var ing23 = new Option("Biotecnología Vegetal","BiotecnologíaVegetal","",""); 
    var ing24 = new Option("Caracterización de Materiales","CaracterizaciónMateriales","",""); 
    var ing25 = new Option("Ciencia de Alimentos","CienciaAlimentos","",""); 
    var ing26 = new Option("Ciencia de la Carne","CienciaCarne","",""); 
    var ing27 = new Option("Ciencia del Pastizal","CienciaPastizal","",""); 
    var ing28 = new Option("Ciencia e Ingeniería de Materiales","IngenieríadeMateriales","",""); 
    var ing29 = new Option("Ciencia e Ingeniería de Materiales (Otros)","IngenieríadeMateriales(Otros)","","");     
    combo[0] = ing1;
    combo[1] = ing2;
    combo[2] = ing3;
    combo[3] = ing4;
    combo[4] = ing5;
    combo[5] = ing6;
    combo[6] = ing7;
    combo[7] = ing8;
    combo[8] = ing9;
    combo[9] = ing10;
    combo[10] = ing11;
    combo[11] = ing12;
    combo[12] = ing13;
    combo[13] = ing14;
    combo[14] = ing15;
    combo[15] = ing16;
    combo[16] = ing17;
    combo[17] = ing18;
    combo[18] = ing19;
    combo[19] = ing20;
    combo[20] = ing21;
    combo[21] = ing22;
    combo[22] = ing23;
    combo[23] = ing24;
    combo[24] = ing25;
    combo[25] = ing26;
    combo[26] = ing27;
    combo[27] = ing28;
    combo[28] = ing29;
    }

     if (selec[3].selected == true)
    {
    var ed1 = new Option("Acordeón","Acordeón","","");
    var ed2 = new Option("Alfabetización y Sistemas de Escritura","SistemasdeEscritura","","");
    var ed3 = new Option("Análisis del Discurso","AnálisisdelDiscurso","","");
    var ed4 = new Option("Arte Moderno y Contemporáneo","ArteModernoContemporáneo","","");
    var ed5 = new Option("Arte y Estética","ArteyEstética","","");
    var ed6 = new Option("Artes","Artes","","");
    var ed7 = new Option("Artes Escénicas","ArtesEscénicas","","");
    var ed8 = new Option("Artes Plásticas","ArtesPlásticas","","");
    var ed9 = new Option("Artes Visuales","ArtesVisuales","","");
    var ed10 = new Option("Asesoramiento y Orientación","AsesoramientoOrientación","","");
    var ed11 = new Option("Bellas Artes","BellasArtes","","");
    var ed12 = new Option("Cantante","Cantante","","");
    var ed13 = new Option("Cerámica","Cerámica","","");  
    var ed14 = new Option("Ciencias de la Educación","CienciasEducación","","");  
    var ed15 = new Option("Composición","Composición","","");  
    var ed16 = new Option("Compositor","Compositor","","");   
    var ed17 = new Option("Cosmetología","Cosmetología","","");  
    var ed18 = new Option("Creatividad Artística","CreatividadArtística","","");  
    var ed19 = new Option("Cultura y Educación","CulturaEducación","","");  
    var ed20 = new Option("Currículo","Currículo","","");  
    var ed21 = new Option("Danza","Danza","","");  
    var ed22 = new Option("Decoración","Decoración","","");  
    var ed23 = new Option("Dibujo","Dibujo","","");  
    var ed24 = new Option("Didáctica","Didáctica","","");  
    combo[0] = ed1;
    combo[1] = ed2;
    combo[2] = ed3;
    combo[3] = ed4;
    combo[4] = ed5;
    combo[5] = ed6;
    combo[6] = ed7;
    combo[7] = ed8;
    combo[8] = ed9;
    combo[9] = ed10;
    combo[10] = ed11;
    combo[11] = ed12;
    combo[12] = ed13;
    combo[13] = ed14;
    combo[14] = ed15;
    combo[15] = ed16;
    combo[16] = ed17;
    combo[17] = ed18;
    combo[18] = ed19;
    combo[19] = ed20;
    combo[20] = ed21;
    combo[21] = ed22;
    combo[22] = ed23;
    combo[23] = ed24;    
    }
}
</script>
