
<?php
//use setasign\fpdi\fpdi;
use setasign \ Fpdi \ Fpdi ;
function split_pdf($filename, $dir = false) {

   // require_once('path/to/src/autoload.php'); require_once ('ruta / a / src / autoload.php'); 
   // @include('path/public/leerpdf2/ficheros/autoload.php'); 
   // @include ('public/leerpdf2/ficheros/ autoload.php'); 
  @include"vendor/autoload.php";
    @include('fpdf.php');
   
   
    @include('fpdi.php');
    		
    $dir = $dir ? $dir : '';
    $filename = $dir.$filename;
    $pdf = new FPDI();
    $pagecount = $pdf->setSourceFile($dir.$filename);    
	
    // Split each page into a new PDF
    for ($i = 1; $i <= $pagecount; $i++) {
       $new_pdf = new FPDI();
       $new_pdf->AddPage();
       $new_pdf->setSourceFile($filename);
    


       $new_pdf->useTemplate($new_pdf->importPage($i));		
       try {
          $new_filename = $dir.str_replace('.pdf','', $filename).'_'.$i.".pdf";
          $new_pdf->Output($new_filename, "F");
          echo "Page ".$i." split into ".$new_filename."<br />\n";

       } catch (Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), "\n";
       }
    }
}

//split_pdf(app_path().'\leerpdf2\ficheros\constancias.pdf');
split_pdf(storage_path().'/app/angel.pdf');

?>








