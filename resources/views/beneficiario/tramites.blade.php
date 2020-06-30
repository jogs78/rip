<!DOCTYPE html>
<html>
<head>
	<title>ver tramites </title>
</head>
<body>

	 @foreach($tramite as $tram) 
  <li class="formapdf">{{$tram->evidencia}}</li>
   <!-- <img src="img/formapdf.png" style="
  // width:80px ; 
  // margin-left:30%;
  // margin-top: 5px;">   -->

        <a href="descargar/<?= $tram->evidencia;   ?>"  ><input type="image" src="img/descarga.png" class="descarga"></a>

        <a href="uploads/<?= $tram->evidencia;   ?>"  ><input type="image" src="img/ver.png" class="ver"></a>
    @endforeach    

</body>
</html>