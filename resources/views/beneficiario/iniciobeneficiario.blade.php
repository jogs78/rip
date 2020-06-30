<link rel='stylesheet' id='albinomouse_fonts-css'  href='//fonts.googleapis.com/css?family=Source+Sans+Pro%3Aregular%2Citalic%2C700%26subset%3Dlatin%2C' type='text/css' media='screen' />
<head></head>
<link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">
<link rel="stylesheet" href="{{ url('/css/beneficiario.css') }}">
<title>Inicio</title>
<style type="text/css" id="albinomouse-custom-css">
body,button,input,select,textarea{font-family:Open Sans; font-size:16px;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans; font-size:16px;}
</style>

</head>
<body>


<!-- Begin Custom CSS -->
@extends('layouts.registro')

@section('content') 
<img src="/img/Logotec.png" width="18%" height="20%" style="padding: 20px" >
<img src="/img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">
<div class="fecha" style="height: auto;">
   <label class="titulo">Su fecha de expiracion de perfil es:</label>
   <span class="info" id="span_nombre"><?php
$dias = $usuarios->fecha_inscrpcion;
echo date("Y-m-d",strtotime($dias."+ 3 year")); 
?></span> 

</div>

        <div class="grupo">
            <label class="titulo">Genero:</label>
            <span class="info" id="span_nombre">{{$usuarios->genero}}</span> 
         </div> 
         <div class="grupo">
            <label class="titulo">RFC:</label>
            <span class="info" id="span_nombre">{{$usuarios->rfc}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Estado civil:</label>
            <span class="info" id="span_nombre">{{$usuarios->civil}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Nacionalidad:</label>
            <span class="info" id="span_nombre">{{$usuarios->nacionalidad}}</span>
         </div>
        <div class="grupo">
            <label class="titulo">Entidad:</label>
            <span class="info" id="span_nombre">{{$usuarios->entidad}}</span>
         </div>
        <div class="grupo">
            <label class="titulo">Fecha de nacimiento:</label>
            <span class="info" id="span_nombre">{{$usuarios->fecha_nacimiento}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Telefono:</label>
            <span class="info" id="span_nombre">{{$usuarios->telefono}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Celular:</label>
            <span class="info" id="span_nombre">{{$usuarios->celular}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Email :</label>
            <span class="info" id="span_nombre">{{$usuarios->email_ins}}</span>
         </div>           
        <div class="grupo">
            <label class="titulo">Fecha de inscripción:</label>
            <span class="info" id="span_nombre">{{$usuarios->fecha_inscrpcion}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Perfil:</label>
            <span class="info" id="span_nombre">{{$usuarios->perfil}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Área:</label>
            <span class="info" id="span_nombre">{{$usuarios->area}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Disciplina:</label>
            <span class="info" id="span_nombre">{{$usuarios->disciplina}}</span>
         </div>
        <div class="grupo">
            <label class="titulo">Nombramiento:</label>
            <span class="info" id="span_nombre">{{$usuarios->nombramiento}}</span>
         </div>
        <div class="grupo">
            <label class="titulo">Tipo de nombramiento:</label>
            <span class="info" id="span_nombre">{{$usuarios->tipo_nombramiento}} </span>
         </div>
         <div class="grupo">
            <label class="titulo">Dedicación:</label>
            <span class="info" id="span_nombre"> {{$usuarios->dedicacion}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Unidad academica:</label>
            <span class="info" id="span_nombre">{{$usuarios->unidad}} </span>
         </div>
        <div class="grupo">
            <label class="titulo">Fecha de contrato:</label>
            <span class="info" id="span_nombre"> {{$usuarios->fecha_contrato}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Nivel de estudios:</label>
            <span class="info" id="span_nombre">{{$usuarios->nivel}}</span>
         </div>         
         <div class="grupo">
            <label class="titulo">Estudios en:</label>
            <span class="info" id="span_nombre">{{$usuarios->estudios}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">País:</label>
            <span class="info" id="span_nombre">{{$usuarios->pais}}</span>
         </div>
        <div class="grupo">
            <label class="titulo">Institución otorgante:</label>
            <span class="info" id="span_nombre">{{$usuarios->institucion_otorgante}}</span>
         </div>
         <div class="grupo">
            <label class="titulo">Fecha de obtención de titulo:</label>
            <span class="info" id="span_nombre">{{$usuarios->fecha_titulo}}</span>
         </div>
</body>
@endsection


