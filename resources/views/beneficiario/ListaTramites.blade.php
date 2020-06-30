
@extends('layouts.registro')
@section('content') 
 <title>Datos</title>

    <link rel="stylesheet" href="{{ url('/css/datos.css') }}">    
    <link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">  

   <link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="styleshee">

   <img src="img/Logotec.png" width="18%" height="20%" style="padding: 20px" >
<img src="img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">

<body>
  <div> <form action="{{ url('/aniobe')}}"  method="get" onclick="" >        
          <input type="text" class="search"  name="dato" id="dato" placeholder="Buscar año"> 
        </form>  </div>
<table style="width: 80%">
  <thead>
    <tr>
      <th  colspan="5">Tramites</th>           
    </tr>
    <tr>
      
      <th colspan="1">Nombre</th>      
      <th colspan="1">Fecha</th>
      <th colspan="4">Acción</th>                                      
    </tr>


  </thead> 
  <tbody>
    @foreach ($tram as $tramite)          
    <tr>
      <div id="resultados">
        <td>{{$tramite->tipo}}</td>
        <td>{{$tramite->fecha}}</td>
          <td><a href="/listarTramite/{{$tramite->tipo_id}}/{{$tramite->fecha}}"  style="color:  #0e5a26">Ver documentos</a></td>                    
      </div>
    </tr>
    @endforeach

  </tbody>
</table>


</body>
@endsection
