<title>Datos</title>
<head>
		<link rel="stylesheet" href="{{ url('/css/datos.css') }}">           
<link rel="stylesheet" href="{!! asset('css/registrar.css') !!}">
   <link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="styleshee">
</head>

@extends('layouts.registro')
@section('content') 
<img src="img/Logotec.png" width="18%" height="20%" style="padding: 20px" >
<img src="img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">
<body >

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
      ciencias sociales y administrativas: ["Laredo", "Gama", "Solares", "Castillo", "Santander"],
     ingeniería y tecnología: ["Langreo", "Villaviciosa", "Oviedo", "Gijon", "Covadonga"],
      educación humanidades y arte: ["Tui", "Cambados", "Redondella", "Porriño", "Ogrove"]
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
<p class="title">Es necesario completar su información</p>

<div class="formulario">                
                    <form method="POST" action="beneficiario/perfil"> 
                        @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error}}</p><br>
            @endforeach
                        @csrf

 
                              

                                <select id="genero" type="text"  autocomplete="off" class="form-control{{ $errors->has('genero') ? ' is-invalid' : '' }}" name="genero" value="{{ old('genero') }}" required autofocus style="text-align: center;">
                           
                             <option disabled selected="">Seleccione un genero</option>
                             <option value="Masculino">Masculino</option>
                             <option value="Femenino">Femenino</optio>                                   

                              @if ($errors->has('genero'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('genero') }}</strong>        
                                    </span>
                                @endif                                    
                        </select>

                        <input id="rfc" type="text" placeholder="RFC" autocomplete="off" class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }}" name="rfc" value="{{ old('rfc') }}" required autofocus>

                                @if ($errors->has('rfc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rfc') }}</strong>
                                    </span>
                                @endif


                        <select id="civil" autocomplete="off" class="form-control{{ $errors->has('civil') ? ' is-invalid' : '' }}" name="civil" value="{{ old('civil') }}" required autofocus style="text-align: center;">
                           
                             <option disabled selected>Estado civil</option>
                             <option value="Casado">Casado</option>
                             <option value="Soltero">Soltero</optio>
                             <option value="Divorciado">Divorciado</option>
                             <option value="Uniónlibre">Unión libre</option>
                             <option value="Viudo">Viudo</option>                                   

                              @if ($errors->has('civil'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('civil') }}</strong>        
                                    </span>
                                @endif                                    
                        </select>

                        <input id="nacionalidad" type="text" placeholder="Nacionalidad" autocomplete="off" class="form-control{{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}" name="nacionalidad" value="{{ old('nacionalidad') }}" required autofocus>

                                @if ($errors->has('nacionalidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nacionalidad') }}</strong>
                                    </span>
                                @endif

                        <input id="entidad" type="text" placeholder="Entidad de nacimiento" autocomplete="off" class="form-control{{ $errors->has('entidad') ? ' is-invalid' : '' }}" name="entidad" value="{{ old('entidad') }}" required autofocus>

                                @if ($errors->has('entidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('entidad') }}</strong>
                                    </span>
                                @endif

                        <input id="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" autocomplete="off"  class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>

                                @if ($errors->has('fecha_nacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                @endif

                        <input id="telefono" type="tel" placeholder="Telefono(casa)" autocomplete="off" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif

                        <input id="celular" type="tel" placeholder="Celular" autocomplete="off" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required autofocus>

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif





                              <!--  genero
                                RFC
                                estado civil
                                nacionalidad
                                entidad de nacimiento
                                fecha de nacimiento
                                telefono(casa)
                                celular
                                correo electronico institucional -->

                        <input id="email_ins" type="email" placeholder="Email " autocomplete="off"  class="form-control{{ $errors->has('email_ins') ? ' is-invalid' : '' }}" name="email_ins" value="{{ old('email_ins') }}" required>

                                @if ($errors->has('email_ins'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email_ins') }}</strong>
                                    </span>
                                @endif 


                                 <input id="fecha_inscrpcion" type="date" placeholder="Fecha de inscripción" autocomplete="off"  class="form-control{{ $errors->has('fecha_inscrpcion') ? ' is-invalid' : '' }}" name="fecha_inscrpcion" value="{{ old('fecha_inscrpcion') }}" required>

                                @if ($errors->has('fecha_inscrpcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_inscrpcion') }}</strong>
                                    </span>
                                @endif                                    
                                                              
                        <select id="perfil" type="text" autocomplete="off" class="form-control{{ $errors->has('perfil') ? ' is-invalid' : '' }}" name="perfil" value="{{ old('perfil') }}" required autofocus style="text-align: center;">

                            <option disabled selected>Perfil</option>
                             <option value="PTC">PTC</option>
                             <option value="PTC(PD)">PTC(Perfil deseable)</option>
                             <option value="CA">CA</option>      
                             <option value="CAEF">CAEF</option> 

                              @if ($errors->has('perfil'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('perfil') }}</strong>
              
                                    </span>
                                @endif                                    
                        </select>

                        <select name="area" onChange="agregarOpciones(this.form)" class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}" value="{{ old('area')}}" required="">

<option value="">[seleccione una area]</option>
<option value="Ciencias Sociales y Administrativas">Ciencias Sociales y Administrativas</option>
<option value="Ingeniería y Tecnología">Ingeniería y Tecnología</option>
<option value="Educación, Humanidades y Arte">Educación, Humanidades y Arte</option>

  @if ($errors->has('area'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif                     

</select>

 

<select name="disciplina"  class="form-control{{ $errors->has('disciplina') ? ' is-invalid' : '' }}" value="{{ old('disciplina')}}" required="">

<option value="">Seleccione una disciplina[Esperando...]</option>
 @if ($errors->has('disciplina'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('disciplina') }}</strong>
                                    </span>
                                @endif

</select>




                        <input id="nombramiento" type="text" placeholder="nombramiento" autocomplete="off"  class="form-control{{ $errors->has('nombramiento') ? ' is-invalid' : '' }}" name="nombramiento" value="{{ old('nombramiento') }}" required>

                                @if ($errors->has('nombramiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombramiento') }}</strong>
                                    </span>
                                @endif 

                    <input id="tipo_nombramiento" type="text" placeholder="Tipo de nombramiento" autocomplete="off"  class="form-control{{ $errors->has('tipo_nombramiento') ? ' is-invalid' : '' }}" name="tipo_nombramiento" value="{{ old('tipo_nombramiento') }}" required>

                                @if ($errors->has('tipo_nombramiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_nombramiento') }}</strong>
                                    </span>
                                @endif 

                    <input id="dedicacion" type="text" placeholder="Dedicacion" autocomplete="off"  class="form-control{{ $errors->has('dedicacion') ? ' is-invalid' : '' }}" name="dedicacion" value="{{ old('dedicacion') }}" required>

                                @if ($errors->has('dedicacion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dedicacion') }}</strong>
                                    </span>
                                @endif 

                        <input id="unidad" type="text" placeholder="Unidad academica" autocomplete="off"  class="form-control{{ $errors->has('unidad') ? ' is-invalid' : '' }}" name="unidad" value="{{ old('unidad') }}" required>

                                @if ($errors->has('unidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unidad') }}</strong>
                                    </span>
                                @endif 

                         <input id="fecha_contrato" type="date" placeholder="Fecha de contrato" autocomplete="off"  class="form-control{{ $errors->has('fecha_contrato') ? ' is-invalid' : '' }}" name="fecha_contrato" value="{{ old('fecha_contrato') }}" required>

                                @if ($errors->has('fecha_contrato'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_contrato') }}</strong>
                                    </span>
                                @endif  

                        <input id="nivel" type="text" placeholder="Nivel de estudios" autocomplete="off"  class="form-control{{ $errors->has('nivel') ? ' is-invalid' : '' }}" name="nivel" value="{{ old('nivel') }}" required>

                                @if ($errors->has('nivel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nivel') }}</strong>
                                    </span>
                                @endif


                        <input id="siglas" type="text" placeholder="Siglas de los estudos" autocomplete="off"  class="form-control{{ $errors->has('siglas') ? ' is-invalid' : '' }}" name="siglas" value="{{ old('siglas') }}" required>

                                @if ($errors->has('siglas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('siglas') }}</strong>
                                    </span>
                                @endif

                        <input id="estudios" type="text" placeholder="Estudios en" autocomplete="off"  class="form-control{{ $errors->has('estudios') ? ' is-invalid' : '' }}" name="estudios" value="{{ old('estudios') }}" required>

                                @if ($errors->has('estudios'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estudios') }}</strong>
                                    </span>
                                @endif

                        <input id="pais" type="text" placeholder="País" autocomplete="off"  class="form-control{{ $errors->has('pais') ? ' is-invalid' : '' }}" name="pais" value="{{ old('pais') }}" required>

                                @if ($errors->has('pais'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pais') }}</strong>
                                    </span>
                                @endif

                        <input id="institucion_otorgante" type="text" placeholder="Institución otorgante" autocomplete="off"  class="form-control{{ $errors->has('institucion_otorgante') ? ' is-invalid' : '' }}" name="institucion_otorgante" value="{{ old('institucion_otorgante') }}" required>

                                @if ($errors->has('institucion_otorgante'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('institucion_otorgante') }}</strong>
                                    </span>
                                @endif

                         <input id="fecha_titulo" type="date" placeholder="Fecha de obtención de titulo" autocomplete="off"  class="form-control{{ $errors->has('fecha_titulo') ? ' is-invalid' : '' }}" name="fecha_titulo" value="{{ old('fecha_titulo') }}" required>

                                @if ($errors->has('fecha_titulo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_titulo') }}</strong>
                                    </span>
                                @endif


                         <input type="submit" value="Guardar" id="regis">
                               <!-- <button type="submit" >
                                    {{ __('Registrar') }}
                                </button> --->
   
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


</body>
@endsection
