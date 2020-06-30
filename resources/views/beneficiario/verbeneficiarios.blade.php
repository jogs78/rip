
<link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">
<link rel="stylesheet" href="{{ url('/css/datos.css') }}">    

<title>Visualizar</title>

<!-- Begin Custom CSS -->
<style type="text/css" id="albinomouse-custom-css">
body,button,input,select,textarea{font-family:Open Sans; font-size:16px;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans; font-size:16px;}

 .letra{
    background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                font-size: 70px;
                text-align: center;
                height: 100vh;
                margin: 0;
 }

 .tema {
  color: #1431e5; 
  font-size: 40px; 
  margin-top: -75px;
  text-align: center;
  font: small-caps 200%/200% serif;  
  
}

.formapdf { 
  width:auto;
  height:55px;
  margin-left:15% auto;
  font-size: 15px; }


  .ver{   
    height:52px;
    margin-top: -4%;
  }
  .descarga{
    height:52px;
    margin-top: -4%;
  }
</style>
@extends('layouts.registro')

@section('content') 

<body>
  <img src="/img/Logotec.png" width="18%" height="20%" style="padding: 20px" >

<img src="/img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">




 <p class="tema" style="margin-top: 5px;">Ver y descargar documento</p>
 


  <style type="text/css">
    albinomouse-custom-css">
body,button,input,select,textarea{font-family:Open Sans; font-size:16px;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans; font-size:16px;}
    .boton{
      vertical-align: middle;
      margin-top: 10px;
      margin-left:10px;
    }
  </style> 
<body >
<table style="width: 80%">
  <thead>
    <tr>
      <th  colspan="4">Tramites</th>           
    </tr>
    <tr>
      <th colspan="1"></th>
      <th colspan="1">Nombre</th>      
      <th colspan="4">Acción</th>                                      
    </tr>


  </thead> 
  <tbody>
    @foreach($tramite as $tram)
    <tr>
      <div id="resultados">
        
          <td><img src="/img/formapdf.png" class="formapdf"></td>
          <td>{{$tram->documento}}</td>
          <td><a href="/descargar/<?= $tram->documento;   ?>"  ><input type="image" src="/img/descarga.png" class="descarga"></a></td>

        <td><a href="/uploadsb/<?= $tram->documento;   ?>"  target="_blank"><input type="image" src="/img/ver.png" class="ver"></a></td>                        
      </div>
    </tr>
    @endforeach

  </tbody>
</table>

</body>
@endsection
