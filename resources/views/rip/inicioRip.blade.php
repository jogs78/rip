<link rel="stylesheet" href="{{ url('/css/paginacion.css') }}">

<script type="text/javascript">
$("#id_form").on("submit", function(e){
   //Code: Action (like ajax...)
   e.preventDefault();

   $.ajax({
            url         : '/beneficiario',
            type        : 'POST',
            data        : {val:inputs}, //Aquí tienes que enviar la información que necesita formula.html si no tiene nada puedes dejarlo así {}
            cache       : false,
            async       : false,
            dataType    : 'json',
            contentType : "application/json",
            success: function(response)
            {
               alert('datos guardados')
            },
            error : function(response)
            {
                alert('error al guardar los datos')
            }
   //return false;
 }) }
   </script><style type="text/css">
  .btn-success {
    color: #fff;
    background-color: 
#28a745;
border-color:
    #28a745;
}
.btn-danger {
    color: #fff;
    background-color: 
#28a745;
border-color:
    #28a745;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid 
    transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
#btn1, #btn2 {
    cursor: pointer;
    color: 
    aliceblue;
}
.pagination {
 display: inline-block;
 padding-left: 0;
 margin: 10px 0;
 border-radius: 4px;
 }
 .pagination > li {
 display: inline;
 }
 .pagination > li > a,
 .pagination > li > span {
 position: relative;
 float: left;
 padding: 6px 12px;
 margin-left: -1px;
 line-height: 1.428571429;
 color: #428bca;
 text-decoration: none;
 background-color: #fff;
 border: 1px solid #ddd;
 }
 .pagination > li:first-child > a,
 .pagination > li:first-child > span {
 margin-left: 0;
 border-top-left-radius: 4px;
 border-bottom-left-radius: 4px;
 }
 .pagination > li:last-child > a,
 .pagination > li:last-child > span {
 border-top-right-radius: 4px;
 border-bottom-right-radius: 4px;
 }
 .pagination > li > a:hover,
 .pagination > li > span:hover,
 .pagination > li > a:focus,
 .pagination > li > span:focus {
 color: #2a6496;
 background-color: #eee;
 border-color: #ddd;
 }
 .pagination > .active > a,
 .pagination > .active > span,
 .pagination > .active > a:hover,
 .pagination > .active > span:hover,
 .pagination > .active > a:focus,
 .pagination > .active > span:focus {
 z-index: 2;
 color: #fff;
 cursor: default;
 background-color: #428bca;
 border-color: #428bca;
 }
 .pagination > .disabled > span,
 .pagination > .disabled > span:hover,
 .pagination > .disabled > span:focus,
 .pagination > .disabled > a,
 .pagination > .disabled > a:hover,
 .pagination > .disabled > a:focus {
 color: #999;
 cursor: not-allowed;
 background-color: #fff;
 border-color: #ddd;
 }
</style>
<head>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"/>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    var table = $('#example');
 
    $('#example').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );
</script>
<link rel="stylesheet" href="{{ url('/css/datos.css') }}">    
<link rel="stylesheet" href="{{ url('/css/buscar.css') }}">    
<title>Inicio</title>

<meta name="csrf-token" content="{{ csrf_token() }}">
</style>
<style type="text/css" id="albinomouse-custom-css">
 .letra{
    background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                font-size: 20px;
                text-align: center;
                height: 10vh;
                margin: 0;
        }
  .ver{   
    height:52px;
    margin-top: -4%;
  }
  .descarga{
    
    height:43px;
    margin-top: -4%;
  }
</style>
 
@extends('layouts.menus')
@section('menurip') 
@csrf

<!-- <form id="id_form" action="/beneficiario">
         <input type="submit">Enviar</submit>
   </form> 
<a class="btn btn-danger" id="btn2">Ver el archivo que contiene adios</a>
<div id="div-results"></div> -->
 <div><input type="button" onclick="history.back()" name="volver atrás" value="volver atrás" style="background-color:#f1faf1"></div>

<label style="color:black;font-size:20px;margin-left: 45%">Bienvenido RIP</label>
    <div >   
      
    
        <form action="{{ url('/beneficiario')}}"  method="get" onclick="" >        
          <input type="text" class="search"  name="dato" id="dato" placeholder="Buscar beneficiario"> 
        </form>
     

    </div> 
    <div style="margin-left: 60%;margin-top: -6%;">
      <form action="{{ url('/anio')}}"  method="get" onclick="" >        
          <input type="text" class="search"  name="dato" id="dato" placeholder="Buscar año"> 
        </form> 
    </div>

<div class="pagination" style="margin-left: 15%;width: 70%">

{{$tramites->links()}}

</div>
<div>
<table style="width: 70%" id="example">  
  <thead>


    <tr style="text-align: center;">
      <th colspan="6">Trámites</th>
       
    </tr>    
    <tr>                
        <th colspan="1">Fecha</th>               
        <th colspan="1">Acción</th>
      </tr>
  </thead>
   @foreach($tramites as $tram)

  <tbody>
    <tr>
    <td>
    {{$tram->fecha}}</td>     
    <td>
      <a href="/documentosfep/{{$tram->fecha}}" class="material-icons button edit"  style="color:#000">Trámites</a> </td>      
    </tr> 
  
  </tbody>
  @endforeach
</table> 
</div>
<div class="pagination" style="margin-left: 15%;width: 70%">

{{$tramites->links()}}

</div>

<input type="button" id="mostrar" name="boton1" value="Mostrar elementos" style="margin-left: 35%;margin-top: 2%;height: 30px;background-color: #a8d3a4">
<input type="button" id="ocultar" name="boton2" value="Ocultar elementos" style="height: 30px;background-color: #a8d3a4">
<div id="division" class="division">

<table style=" margin-left: 5%; width: 90% ">
  <thead>
    <tr>
      <th align="center" colspan="5">Documentos divididos</th>           
    </tr>
    <tr>
      
      <th colspan="1">Nombre</th>                            
      <th colspan="3">Acción</th>                
    </tr>


  </thead>  
  <tbody>
     <?php
 
    $directory=storage_path() . '/app/pdf/';
    $dirint = dir($directory);
     
    while (($tramite = $dirint->read()) !== false) 
    { 
        if (preg_match( '/\.(?:pdf)$/i', $tramite)) {
        
    ?>

    <tr>
      <div id="resultados">
        <?php  echo "<td>$tramite</td>"; ?>
    <td><a href="storagedescarga/<?= $tramite;   ?>"  ><input type="image" src="img/descarga.png" class="descarga" target="_blank"></a></td>

    <td><a href="uploadstorage/<?= $tramite;   ?>"  ><input type="image" src="img/ver.png" class="ver"></a></td>
        
      </div>
    </tr>    
  <?php
              } 
    }  
    $dirint->close();
   
?> 

  </tbody>
</table>
</div>
<script type="text/javascript">
    $(document).ready(function(){
  $("#mostrar").click(function(){
    $('.division').show(3000,function() {
              
    });
  });
  $("#ocultar").click(function(){
    $('.division').hide(3000,function() {
              
    });
  });
});
</script>
<script type="text/javascript">
  
  $('.recargar').submit(function(e){
    e.preventDefault();
  });
</script>

<form action="{{ url('/buscartramite')}}" method="GET" id="my_form"></form>

@endsection            