<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign \ Fpdi \ Fpdi ;
use Alert;
use Session;
use App\Notificaciones;

class StorageController extends Controller
{
    public function div()
  {
    return \View::make('rip.zleer');
  } 

  public function guardar(Request $request)
  {
    $doc = request('archivo'); 
       //obtenemos el nombre del archivo
       $nombre = $doc->getClientOriginalName();
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($doc));
       $filename=false;
       $dir=false;
        $resultado = self::dividir($filename, $dir = false);       
        return redirect()->route('rip.dividir');
        echo "<li class=formapdf>$tramite</li>";       
  }
 public function guardardiv(Request $request)
  {
    $doc = request('archivo'); 
       //obtenemos el nombre del archivo
       $nombre = $doc->getClientOriginalName();
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('divididos')->put($nombre,  \File::get($doc));
       $filename=false;
       $dir=false;
        $resultado = self::dividir($filename, $dir = false);       
        return redirect()->route('rip.dividir');
        echo "<li class=formapdf>$tramite</li>";       
  }
       public function dividir($filename, $dir = false)
{
        @include('fpdf.php');
    @include('fpdi.php');

    $doc =request('archivo');
 
       //obtenemos el nombre del archivo
    $nombre = $doc->getClientOriginalName();
    $dir   =storage_path().'/app/pdf/'.$nombre;
    $filename= $dir.$filename;
    $pdf = new FPDI();
    
$pagecount = $pdf->setSourceFile(storage_path().'/app/pdf/'.$nombre); 
for ($cont = 1; $cont <= $pagecount; $cont++)
      {

    $new_pdf=new FPDI();
    $new_pdf->AddPage();
   $gf= $new_pdf->setSourceFile(storage_path().'/app/pdf/'.$nombre);
$new_pdf->useTemplate($new_pdf->importPage($cont), 3, 30, 200);
try {
          $nom = $dir.str_replace('.pdf','', $nombre).'_'.$cont.".pdf";
          $new_pdf->Output($nom, "F");
            // alert()->message('WarningAlert','Lorem ipsum dolor sit amet.');
           Session::flash('flash_message','se guardaron '.$cont.'PDF '.'con el mismo nombre y número de hoja por ejemplo:'.$nom);
          //echo "Page ".$cont." split into ".$nom."<br />\n";
       } catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
       }

    }         
  }


  public function VDoc(Request $request)
    {
    $usuario =DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.perfil','users.apellido_paterno','users.apellido_materno','users.name as name')
    ->distinct()->get();
    return view('rip.subirDoc')->with('usuario', $usuario);
    }
  
}
