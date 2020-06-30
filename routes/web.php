<?php 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'beneficiarioController@Contadorbeneficiarios');

Auth::routes();
Route::middleware(['web', 'auth'])->get('/role', 'TramiteController@authent')
->name('iniciorol');

// Route::get('/home', 'HomeController@index')->name('home');

/* Inicio de rutas para administrador*/
Route::middleware(['web', 'auth'])->get('/datos',function(){
    return view('/rip/datosbeneficiario');
});



Route::middleware(['web', 'auth'])->get('/inicioRip', 'ListaController@VerdocRip')->name('rip.inicio');

Route::middleware(['web', 'auth'])->get('/subir', 'TramiteController@index')
        ->name('rip.documento');

Route::middleware(['web', 'auth'])->get('/update/{id}/tramite', 'TramiteController@editarTramite');
Route::middleware(['web', 'auth'])->put('/updating/{id}/tramite','TramiteController@updateTramite');

// Route::middleware(['web', 'auth'])->get('/subird','TramiteController@show');
        
Route::middleware(['web', 'auth'])->post('/subirdoc','TramiteController@store');
    

Route::middleware(['web', 'auth'])->get('/dividir', function () {
    return view('/rip/zdividir');
});

Route::middleware(['web', 'auth'])->get('/listaBeneficiarios', function () { 
    return view('/rip/beneficiarios');
});
Route::middleware(['web', 'auth'])->get('/notificaciones', function () {
    return view('/rip/notificaciones');
});

Route::middleware(['web', 'auth'])->get('/documento','StorageController@div')->name('rip.dividir');
Route::post('/dividirdocumento','StorageController@guardardiv'); 
//Route::post('/documento/dividido', 'StorageController@dividir');
Route::middleware(['web', 'auth'])->get('/beneficiarios', [
    'uses' => 'ListaController@index',]);

Route::middleware(['web', 'auth'])->get('/tramite','ListaController@tramites');
Route::middleware(['web', 'auth'])->get('/editarB/{id}','ListaController@editar');
Route::middleware(['web', 'auth'])->put('/beneficiario/{id}/edit','ListaController@update');

Route::get('/datosB/{users_id}', 'ListaController@tramitesBe'); 
Route::get('/datosBen/{users_id}/{tipo_id}', 'ListaController@Documentosbeneficiarios');



Route::middleware(['web', 'auth'])->post('/enviarDatos', 'NotificacionController@get');

Route::middleware(['web', 'auth'])->get('/verNoti','NotificacionController@showNotiRip')->name('rip.vernoticaciones');
Route::middleware(['web', 'auth'])->get('/notificaciones','NotificacionController@index')->name('rip.notificaciones');
Route::middleware(['web', 'auth'])->post('/enviarnoti', 'NotificacionController@save');
Route::middleware(['web', 'auth'])->get('/ordenarNom', 'NotificacionController@ordenarNom');
Route::middleware(['web', 'auth'])->get('/ordenarPater', 'NotificacionController@ordenarPater');
Route::middleware(['web', 'auth'])->get('/ordenarMater', 'NotificacionController@ordenarMater');
Route::middleware(['web', 'auth'])->get('/ordenarEmail', 'NotificacionController@ordenarEmail');
Route::middleware(['web', 'auth'])->get('/ordenarPerfil', 'NotificacionController@ordenarPerfil');
Route::middleware(['web', 'auth'])->get('/search', 'NotificacionController@search');

Route::middleware(['web', 'auth'])->get('/enviarDatos', 'NotificacionController@mail');
Route::middleware(['web', 'auth'])->get('/enviarCorreo', 'NotificacionController@send')->name('correo');;
Route::middleware(['web', 'auth'])->post('/subirEvi', 'EvidenciaController@store');

Route::get('/documentosfep/{fecha}', 'ListaController@Tramitefecha');
Route::middleware(['web', 'auth'])->get('/subir/{id}/evidencia', 'EvidenciaController@subirEvidencia');

 
/* Hasta aca termina*/
// -----------------s--- INICIA RUTAS P/BENEFICIARIOS-------------
// Route::middleware(['web', 'auth'])->get('/inicioB','TramiteController@showtramite')->name('beneficiario.inicio');

Route::middleware(['web', 'auth'])->get('/inicioB','beneficiarioController@show')->name('beneficiario.inicio');

Route::middleware(['web', 'auth'])->get('/ediCuenta','beneficiarioController@editar');
Route::middleware(['web', 'auth'])->put('/cuenta/{id}/editar','beneficiarioController@update');

Route::middleware(['web', 'auth'])->get('/ediPerfil','beneficiarioController@editarPerfil');
Route::middleware(['web', 'auth'])->put('/perfil/{id}/editar','beneficiarioController@updatePerfil');

Route::middleware(['web', 'auth'])->get('/ver&desc', function () {
    return view('/beneficiario/verbeneficiarios');
});
Route::middleware(['web', 'auth'])->get('/ver&desc','TramiteController@showtramite');
// Route::middleware(['web', 'auth'])->get('/ver&desc', function () {
//     return view('/beneficiario/verbeneficiarios');
// });
Route::middleware(['web', 'auth'])->get('/notificacionesben','NotificacionController@showNoti')->name('beneficiario.notificaciones');

Route::middleware(['web', 'auth'])->get('/borrarNoti/{id}','NotificacionController@deleteNotifi');

Route::middleware(['web', 'auth'])->get('/datosben', function () {
    return view('/beneficiario/datosbeneficiario');
});

Route::middleware(['web', 'auth'])->post('beneficiario/perfil', 'beneficiarioController@save');
Route::middleware(['web', 'auth'])->get('/listar','TramiteController@lista');
Route::middleware(['web', 'auth'])->get('/listarTramite/{tipos_id}/{fecha}','TramiteController@tipo'); 
//Route::get('/datosB/{users_id}', 'ListaController@tramitesBe'); 
//ver y descargar beneficiario
Route::get('listarTramite/descargar/{evidencia}','TramiteController@descargar'); 
// Route::get('ver/{evidencia}','TramiteController@visualizar');

Route::get('listarTramite/uploads/{evidencia}', function ($evidencia) {
    //$pathtoFile = storage_path().'/app/'.$file;   
    //return($pathtoFile);
    //return response()->($pathtoFile);      

// $filename = storage_path().'/app/'.$file; 

// return Response::make(file_get_contents($filename), 200, [
//     'Content-Type' => 'application/pdf',
//     'Content-Disposition' => 'inline; filename="'.$filename.'"'
// ]);

      //$publ= Tramites::find($evidencia);      
      $public_path = storage_path();
      $url = $public_path.'/app/'.$evidencia;

      //$filename = storage_path().'/app/'.$file; 
      return Response::make(file_get_contents($url), 200, [
      'Content-Type' => 'application/pdf',
      'Content-Disposition' => 'inline; filename="'.$url.'"'
]);
    
});


Route::get('storage/{archivo}', function ($archivo) {     
     $public_path = storage_path();
     $url = $public_path.'/app/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
 
     }
     //si no se encuentra lanzamos un error 404.
     abort(404); 
});

Route::get('/uploadsb/{evidencia}', function ($evidencia) {
  
      $public_path = storage_path();
      $url = $public_path.'/app/'.$evidencia;
      return Response::make(file_get_contents($url), 200, [
      'Content-Type' => 'application/pdf',
      'Content-Disposition' => 'inline; filename="'.$url.'"'
]);
    
});


//ver y descargar rip y otros
Route::get('/descargar/{evidencia}','TramiteController@descargar'); 

Route::get('datosB/uploads/{evidencia}', function ($evidencia) {
  
      $public_path = storage_path();
      $url = $public_path.'/app/'.$evidencia;
      return Response::make(file_get_contents($url), 200, [
      'Content-Type' => 'application/pdf',
      'Content-Disposition' => 'inline; filename="'.$url.'"'
]);
    
});

Route::get('uploads/{evidencia}', function ($evidencia) {
  
      $public_path = storage_path();
      $url = $public_path.'/app/'.$evidencia;
      return Response::make(file_get_contents($url), 200, [
      'Content-Type' => 'application/pdf',
      'Content-Disposition' => 'inline; filename="'.$url.'"'
]);
    
});

Route::get('uploadstorage/{evidencia}', function ($evidencia) {
  
      $public_path = storage_path();
      $url = $public_path.'/app/pdf/'.$evidencia;
      return Response::make(file_get_contents($url), 200, [
      'Content-Type' => 'application/pdf',
      'Content-Disposition' => 'inline; filename="'.$url.'"'
]);
    
});


Route::get('storagedescarga/{archivo}', function ($archivo) {     
      
    $public_path = storage_path();
    $url = $public_path.'/app/pdf/'.$archivo;
    return response()->download($url);

     if (Storage::exists($archivo))
     {
       return response()->download($url);
 
     }
     //si no se encuentra lanzamos un error 404.
     abort(404); 

});

//=================RF===========================
Route::middleware(['web', 'auth'])->get('/iniciorf','NotificacionController@indexrf')->name('rf.inicio');

Route::middleware(['web', 'auth'])->get('/ordenarNomRf', 'NotificacionController@ordenarNomRf');
Route::middleware(['web', 'auth'])->get('/ordenarPaterRf', 'NotificacionController@ordenarPaterRf');
Route::middleware(['web', 'auth'])->get('/ordenarMaterRf', 'NotificacionController@ordenarMaterRf');
Route::middleware(['web', 'auth'])->get('/ordenarEmailRf', 'NotificacionController@ordenarEmailRf');
Route::middleware(['web', 'auth'])->get('/ordenarPerfilRf', 'NotificacionController@ordenarPerfilRf');
Route::middleware(['web', 'auth'])->get('/searchRf', 'NotificacionController@searchRf');


//======================Rutas supervisor
Route::middleware(['web', 'auth'])->get('/iniciosuper','ListaController@Verdoc')->name('super.inicio');

// Route::middleware(['web', 'auth'])->get('/notificacionsuper', function () {
//     return view('supervisor/vernotificaciones');
// });
Route::get('/documentos/{tipos_id}', 'ListaController@tramitesuper');
// Route::get('/documentosRip/{fecha}/{tipos_id}/{nombre}', 'ListaController@tramiterip');      
Route::get('/documentosRip/{id}', 'ListaController@tramiterip');    
// Route::get('/documentosfep/{fecha}', 'ListaController@fecha');       
Route::get('/docimentos/uploads/{evidencia}', function ($evidencia) {
  
      $public_path = storage_path();
      $url = $public_path.'/app/'.$evidencia;
      return Response::make(file_get_contents($url), 200, [
      'Content-Type' => 'application/pdf',
      'Content-Disposition' => 'inline; filename="'.$url.'"'
]);
    
});

Route::middleware(['web', 'auth'])->get('/notificacionsuper','NotificacionController@showNotiSuper')->name('super.vernoticaciones');


Route::middleware(['web', 'auth'])->get('/buscartramite/{fecha}','ListaController@buscartramite');    
Route::middleware(['web', 'auth'])->get('/beneficiario', 'ListaController@buscador');
Route::middleware(['web', 'auth'])->get('/VDoc', 'StorageController@VDoc'); 
Route::middleware(['web', 'auth'])->get('/Docsearch', 'TramiteController@Docsearch');
Route::middleware(['web', 'auth'])->get('/ordenarNombre', 'beneficiarioController@ordenarNombre'); 
Route::middleware(['web', 'auth'])->get('/ordenarPaterno', 'beneficiarioController@ordenarPaterno');
Route::middleware(['web', 'auth'])->get('/ordenarMaterno', 'beneficiarioController@ordenarMaterno');
Route::get('/live_search/{id}', 'ListaController@tramitesBe');  
Route::get('/anio','ListaController@buscadoranio');
Route::get('/aniobe','TramiteController@buscadoranio');