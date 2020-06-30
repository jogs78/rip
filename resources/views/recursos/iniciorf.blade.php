<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>

    <link rel="stylesheet" href="{{ url('/css/iniciorf.css') }}">
     <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>    


    <link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="stylesheet"/>


</head>
<body>


<img src="img/Logotec.png" width="16%" height="13%" style="padding: 20px" >
<img src="img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">
<div id="container">


    
    <nav>
        <ul>
        <li><a href="/iniciorf">Inicio</a></li>                            
        <li><a href="https://www.tuxtla.tecnm.mx/" target="_blank">ITTG</a></li>   
        <li><a href="http://www.dgesu.ses.sep.gob.mx/PRODEP.htm" target="_blank">PRODEP</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>         

         <li class="titulo"><a class="cuenta"  href="#">RECURSOS FINANCIEROS</a></li>
        </ul>

    </nav>
 
</div>

    <script>

$(document).ready(function(){

    $('input[type=checkbox]').click(function() {

        if($(this).is(":checked"))

        {

            // el checkbox esta marcado

            // movemos la columna a la tabla2

            var tr=$(this).parents("tr").appendTo("#tabla2 tbody");

        }else{

            // el checkbox esta desmarcado

            // movemos la columna a la tabla1

            var tr=$(this).parents("tr").appendTo("#tabla1 tbody");

        }

    });

});

</script>

<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

 <p class="tema" style="margin: 10px;">Envio de Notificaciones</p>
 


<div class="principal">


    <div class="container">
     @if(session('flash'))
      <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{session('flash')}}
</div> 
     @endif
 </div> 

 
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ">
  <div class="tabla-temporal">
<form method="POST" action="/enviarnoti" accept-charset="UTF-8" enctype="multipart/form-data">  
            {{ csrf_field() }} 
    

    <table id="tabla2">
      <thead>
    <tr>
      <th colspan="6">Seleccionados</th>
    </tr>
    <tr>
        <th colspan="1">Nombres</th>
        <th colspan="1">Apellido paterno</th>
        <th colspan="1">Apellido materno</th>           
        <th colspan="1">email</th>   
        <th colspan="1">Accion</th>
      </tr>
    </thead>


        <tbody>

        </tbody>

    </table>
    <input  type="text" id="mensaje" class="contenido-mensaje form-control{{ $errors->has('mensaje') ? ' is-invalid' : '' }}" name="mensaje" required placeholder="Escribe tu mensaje aquí..." >
                                                                      
    <input type="submit" value="Enviar" class="btnNoti" >
        </form>   
  </div>                        

  <div class="tabla-principal">
    <table id="tabla1"> 
      <thead>
    <tr>
      <th colspan="6">Beneficiarios</th>
    </tr>
    <tr>
        <th colspan="1">Nombres</th>
        <th colspan="1">Apellido paterno</th>
        <th colspan="1">Apellido materno</th>           
        <th colspan="1">email</th>   
        <th colspan="1">Accion</th>
      </tr>
  </thead>
         
        
        <tbody>
             @if (count($usuario))             
            @foreach($usuario as $us)
   
            <tr id="{{$us->id}}">

                <td>{{$us->name}}</td>
                <td>{{$us->apellido_paterno}}</td>
                <td>{{$us->apellido_materno}}</td>
                <td>{{$us->email}}</td>
                <td class="check"><input id="beneficiario" name="receptor[]" value="{{$us->id}}" type="checkbox"></td>
 
            </tr> 
                
                    @endforeach 
 @endif 
        </tbody>
        

    </table>    
    </div>

</body>
</html>

