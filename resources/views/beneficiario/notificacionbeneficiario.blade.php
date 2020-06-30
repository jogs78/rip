<link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">
<link rel="stylesheet" href="{{ url('/css/beneficiario.css') }}">
<title>Notificaciones</title>
 
<!-- Begin Custom CSS -->
<style type="text/css" id="albinomouse-custom-css">
button,input,select,textarea{font-family:Open Sans; font-size:16px;}h1,h2,h3,h4,h5,h6,.navbar-brand{font-family:Open Sans; font-size:16px;}

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
@extends('layouts.registro')
@section('content') 
<img src="img/Logotec.png" width="18%" height="20%" style="padding: 20px" >
<img src="img/prodep.jpg" width="18%" height="13%" style="margin-left: 50%;">
<body >
 <p class="tema" style="margin: 10px;">Notificaciones</p>

 <div>

  <div class="container">
     @if(session('flash'))
      <div class="alert">
       <p class="mensaje">{{session('flash')}}</p>
  
</div> 
     @endif
 </div>

@foreach($notificacion as $noti) 
 <div class="caja">    
   <a href="/borrarNoti/{{$noti->id}}" class="cerrarNoti">x</a>
    <p class="mensaje">{{$noti->mensaje}}</p>
 </div>
 @endforeach

 

</body>
@endsection
