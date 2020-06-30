 
@extends('layouts.menus')
@section('menurip')
    <title>Beneficiario</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ url('/css/adminbeneficiario.css') }}">
  <link rel="stylesheet" href="{{ url('/css/buscar.css') }}">    
  <link rel="stylesheet" href="{{ url('/css/paginacion.css') }}">
 
<body>  
    <div>
        <div>
           <form action="{{ url('/beneficiario')}}"  method="get" onclick="" >        
          <input type="text" class="search"  name="dato" id="dato" placeholder="Buscar beneficiario"> 
        </form>
          </div> 
                 
    
<div >
<table id="tabla1" style="width: 40%">                        
         
        <thead>
    <tr>
      <th  colspan="4">Beneficiarios</th>           
    </tr>
    <tr>
      
      <th colspan="1"><a href="/ordenarNombre" style="color: #000">Nombre</th>      
      <th colspan="1"><a href="/ordenarPaterno" style="color: #000">Apellido Paterno</th> 
      <th colspan="1"><a href="/ordenarMaterno" style="color: #000">Apellido materno</th>
      <th colspan="1">Email</th>
      <th colspan="1">Acción</th>
    </tr>


  </thead>
        <tbody>
             @if (count($data))             
            @foreach($data as $us)
   
            <tr>

                <td>{{$us->name}}</td>
                <td>{{$us->apellido_paterno}}</td>
                <td>{{$us->apellido_materno}}</td>
                <td>{{$us->email}}</td>  
                 <td><a style="width: 290px;"href="/live_search/{{$us->id}}" class="material-icons button edit">Tramites</a> <a href="/editarB/{{$us->id}}" class="material-icons button edit">editar</a> </td>              
            </tr> 
                
                    @endforeach 
 @endif 
        </tbody>
        

    </table>    
   
</div>
</div>
<div class="pagination" style="margin-left: 15%;width: 70%">

{{ $data->links() }} 

</div>
<script type="text/javascript">
  
  $('.recargar').submit(function(e){
    e.preventDefault();
  });
</script>
<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
@endsection