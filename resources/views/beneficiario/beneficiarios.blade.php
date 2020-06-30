<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@extends('layouts.menus')
@section('menurip')
	<title>Beneficiario</title>

	<link rel="stylesheet" href="{{ url('/css/adminbeneficiario.css') }}">
  <link rel="stylesheet" href="{{ url('/css/buscar.css') }}">    
<body>

        <div >         
          <form action="{{ url('/beneficiario') }}" method="get" onclick="" >                        
              <input type="text" class="search"  name="dato" id="dato" placeholder="Buscar beneficiario"> 
                <!--  <button class="btbuscar recargar" type="submit" >Buscar!</button> -->                                       
          </form>                    
        </div>   

<table>
  <thead>
    <tr>
      <th colspan="6">Beneficiarios</th>
    </tr>
    <tr>
        <th colspan="1">Nombres</th>
        <th colspan="1">E-mail</th>
        <th colspan="1">RFC</th>   
        <th colspan="1">Fecha Inscripcion</th>        
        <th colspan="1">Perfil</th>   
        <th colspan="1">Accion</th>
      </tr>
  </thead>
  @foreach($beneficiarios as $ben)
  <tbody>
    <tr>
    <td>{{$ben->beneficiario}}</td>
    <td>{{$ben->email}}</td>
    <td>{{$ben->rfc}}</td>    
    <td>{{$ben->fecha_inscrpcion}}</td>
    <td>{{$ben->perfil}}</td>
      

    <td>
      <a href="/datosB/{{$ben->user_id}}" class="material-icons button edit">Tramites</a> </td> 
     <!--  <a  class="material-icons button edit">Tramites</a> </td>  -->  
    </tr>    
  </tbody>
  @endforeach
</table> 

<script type="text/javascript">
  
  $('.recargar').submit(function(e){
    e.preventDefault();
  });
</script>
</body>
@endsection