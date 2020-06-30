<link rel="stylesheet" href="{{ url('/css/datos.css') }}">    
<link rel="stylesheet" href="{{ url('/css/adminbeneficiario.css') }}">    
<link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="styleshee">
@extends('layouts.menusuper')
@section('menusup')
<title>Inicio</title>    
<style type="text/css">
  .formapdf { 
  list-style: url("/img/formapdf.png") 
  square;
  padding-top: 30px;
  width:20px ; 
  margin-left:35%;
  font-size: 15px; }
  .ver{    
    
    height:52px;
    margin-top: -4%;
  }
  .descarga{    
    height:40px;
    margin-top: -4%;
  }
</style>
<body>
<div>
<table>
  <thead>
    <tr>
      <th  colspan="5">Tramites</th>           
    </tr>
    <tr>
      
      <th colspan="1">Nombre</th>      
      <th colspan="1">Convocatoria</th> 
      <th colspan="1">Beneficiario</th> 
      <th colspan="1">Fecha</th>  
      <th colspan="3">Acción</th>                
    </tr>


  </thead>  
  <tbody>
     @foreach ($tramites as $tramites)          
    <tr>
      <div id="resultados">
        <td>{{$tramites->documento}}</td>
        <td>{{$tramites->tipo}}</td>
        <td>{{$tramites->name}}</td>                          
        <td>{{$tramites->fecha}}</td>  
        <td><a href="/uploads/<?= $tramites->documento;   ?>"  ><input type="image" src="/img/ver.png" class="ver"></a></td>
        <!-- 
        <td><i class="material-icons button edit">Ver</i></td>
        <td><i class="material-icons button edit">descargar</i></td> -->        
      </div>
    </tr>    
    @endforeach
  </tbody>
</table>
</div>
</body>
@endsection