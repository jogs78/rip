
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <script src=" https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 
    <link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">
<style type="text/css" id="albinomouse-custom-css">
body,button,input,select,textarea{font-family:Open Sans;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans;}
</style> 
    <style>

      .tabla-temporal{
        float: right;
        /*margin-left: 20%;*/
        width: 54%;                                  
        display: inline-block;
      }
          
      .tabla-principal{      
        width: 40%;
        margin-left: 2%;
        margin-top: 3%;
      }
      .contenido-mensaje{
       width: 500px;
       height: 50px;   
       border: 2px solid #28b463;      
       font-size: 15;
      }

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
        


    </style>
      
<div id="container">
    <nav>
        <ul>
           <li><a href="/inicioRip">Inicio</a></li>
            <li><a>Trámites <i class="down"></i></a>
             <!--Primer Menu Desplegable -->
            <ul>
                <li><a href="/subir">Subir</a></li>
                <li><a href="/documento">Dividir</a></li>                
            </ul>        
            </li>            
        <li><a href="/beneficiarios">Beneficiario</a></li>   
        <li><a  href="/notificaciones">Notificaciones</i></a></li>                  
        <!-- <li><a href="https://www.tuxtla.tecnm.mx/">ITTG</a></li>    -->
        <li><a href="http://www.dgesu.ses.sep.gob.mx/PRODEP.htm">PRODEP</a></li> 
        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>  
        </ul>
    </nav>
 </div>

 <img src="img/Logotec.png" width="18%" height="20%" style="padding: 20px" >

<img src="img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">



<div class="container">
     @if(session('flash'))
      <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{session('flash')}}
</div> 
     @endif
 </div>
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
       <label style="margin-top: -50px"><label style="width: 200px;height: 20px">Enviar notificaciones</label></label>
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
// function myFunction() {
//   // Declare variables
//   var input, filter, table, tr, td, i, checkbox, txtValue;
//   input = document.getElementById("myInput");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("tabla1");  
//   tr = table.getElementsByTagName("tr");
  

//   // Loop through all table rows, and hide those who don't match the search query
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[0];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";        
//       } else {
//         tr[i].style.display = "none";
//       }
//     }
//   }
// }
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