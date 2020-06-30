<link rel="stylesheet" href="{{ url('/css/inicioadmin.css') }}">
<link href="//cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css" rel="styleshee">
@extends('layouts.menusuper')
@section('menusup')
	<title>Inicio</title>
<body>
<div>
    <p style="color: #1431e5; 
  font-size: 40px; 
  margin: -5px auto;
  text-align: center;
  font: small-caps 200%/200% serif;  
  text-shadow: 1px 2px 1px  rgba(0,0,0,.5);
  padding-top: -10px;">Notificaciones</p>
 <div>

@foreach($notificacion as $noti) 
 <div class="caja">    
   <a href="/borrarNoti/{{$noti->id}}" class="cerrarNoti">x</a>
    <p class="mensaje">{{$noti->mensaje}}</p>
 </div>
 @endforeach

</div>
 
</body>
</html>

@endsection