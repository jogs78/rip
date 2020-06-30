<link rel="stylesheet" href="{{ url('/css/datos.css') }}">    
<link rel="stylesheet" href="{{ url('/css/adminbeneficiario.css') }}">    
<link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="styleshee">
@extends('layouts.menusuper') 
@section('menusup')
	<title>Inicio</title>	
<body>    
  <table style="width: 70%">
  <thead>
    <tr style="text-align: center;">
      <th colspan="6">Tramites</th>
    </tr>
    <tr>                
        <th colspan="1">Tramite</th>               
        <th colspan="1">Accion</th>
      </tr>
  </thead>
  @foreach($tramites as $tram)
  <tbody>
    <tr>
    <td>{{$tram->tipo}}</td>     
    <td>
      <a href="/documentos/{{$tram->tipo_id}}" class="material-icons button edit">Documentos</a> </td>      
    </tr> 
    <!-- <?php
//$dias = $_GET["fecha_inscrpcion"];
    // $fecha = $_GET['fecha_inscrpcion('d/m/Y')'];
    // $nuevafecha = strtotime ( '+2 year +350 days' , strtotime ( $fecha ) ) ;
    // $nuevafecha = date ( 'd/m/Y' , $nuevafecha );
    // echo 'la fecha de vencimiento es ',
    //  $nuevafecha;
    ?> -->
  </tbody>
  @endforeach
</table> 
</body>
@endsection