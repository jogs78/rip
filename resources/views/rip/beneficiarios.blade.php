 
@extends('layouts.menus')
@section('menurip')
    <title>Beneficiario</title>    
     <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <script src=" https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 
   
<style type="text/css" id="albinomouse-custom-css">
body,button,input,select,textarea{font-family:Open Sans;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans;}
</style> 
    <style>
      table {
        text-align: left;
        line-height: 35px;
        border-collapse: separate;  
        border: 2px solid #28b463;
        border-radius: .25rem;

      }

      thead tr:first-child {
      background: #82e0aa;
      color: #000;
      border: none;
      } 


      thead tr:last-child th {
      border-bottom: 3px solid #ddd;
      }

      tbody tr:hover {
        background-color: #f2f2f2;
        cursor: default;
      }

      #myInput{
        margin-left: 2%;
      }

        .form-control-sm
        {
          margin-left: 130px;

        }
        .dataTables_filter
        {
          margin-left: 20px;
        }
        .col-md-6
        {
          margin-left: -70px;
        }
        
        .dataTables_paginate
        {
          margin-right: -80px;
        }
        ..paging_simple_numbers
        {
          margin-right: -80px;
        }
       
       tabla1_paginate


    </style>

    <div >
   <label style="margin-top: -50px;"></label>
<table id="tabla1" style="width: 60%;margin-left: 20%"> 

         
        <thead>
    <tr>
      <th  colspan="5" style="text-align: center;">Beneficiarios</th>           
    </tr>
    <tr>
      
      <th colspan="1">Nombre</th>      
      <th colspan="1">Apellido Paterno</th> 
      <th colspan="1">Apellido materno</th>
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
      
<script type="text/javascript">
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla1').DataTable();
} );
</script>

@endsection