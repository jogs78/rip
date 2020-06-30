@extends('layouts.menus')
@section('menurip')
<link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">
<!-- <link rel="stylesheet" href="{{ url('/css/Beneficiario.css') }}"> -->

<title>Notificaciones</title>



<!-- Begin Custom CSS -->
<style type="text/css" id="albinomouse-custom-css">
body,button,input,select,textarea{font-family:Source Sans Pro;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Source Sans Pro;}

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



</style>
<body >


@foreach($notificacion as $noti) 
 <div class="caja">    
   <a href="/borrarNoti/{{$noti->id}}" class="cerrarNoti">x</a>
    <p class="mensaje">{{$noti->mensaje}}</p>
 </div>
 @endforeach
</div>
 

</body>
@endsection