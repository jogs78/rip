<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evidencia;
use DB;
use App\Tipo_tramite;
use App\Tramites;

class EvidenciaController extends Controller
{
      protected function validator(array $data)
    {
        return Validator::make($data, [          
            
            'documento' => 'string|max:255', 
            'descripcion' => 'required|string|max:255',            
           
            
        ]);
    }

    protected function create(array $data)
    {
        return tramites::create([                        
            'documento' => $data['documento'],
            'descripcion' => $data['descripcion'],
        ]);
    }

    public function storaStore(){

    }

     public function store(Request $request)
    { 		
		
      $destinationPath = storage_path().'/app/';
      $fileName = request('evidencia');
      $request->file('evidencia')->move($destinationPath, $fileName->getClientOriginalName());
      $evi=new Evidencia;          
      
      $evi->documento=request()->evidencia;
      $evi->descripcion=request()->descripcion;
      $evi->documento = $fileName->getClientOriginalName();                                                
      $evi->save(); 

      $id_tramite=request()->tramiteId;
      
      

       $evi
        ->tramites()
        ->attach(Tramites::where('id',$id_tramite)->first());    
      
         
          return redirect()->route('rip.inicio');
         

    
}


public function subirEvidencia($id){

  // $tramite = DB::table('tramites')
  // ->join('tipo_tramites', 'tipo_tramites.id', '=', 'tramites.tipo_id')
  // ->where('tramites.id', $id)->get();

  $id_tramite=$id;

  $tramite = Tramites::where('id',$id_tramite)->value('tipo_id');
   $name_tramite = tipo_tramite::where('id',$tramite)->value('tipo');

  // dd($id_tramite, $name_tramite);

  return view('rip.subirEvidencia',compact('name_tramite', 'id_tramite'));


}

}
