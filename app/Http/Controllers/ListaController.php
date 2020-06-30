<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Tramites, App\Tipo_tramite;
use App\Beneficiario;
use App\Notificaciones;
use Illuminate\Support\Facades\Auth;
class ListaController extends Controller
{
    //

    public function index(Request $request)
    {
          $data=DB::table('users')->select('*')
          ->orderBy('apellido_paterno', 'asc')->get();
        //dd($beneficiarios);
     
        return view('rip.beneficiarios', compact('data'));      
    	 
    }

     public function Tramitefecha($fecha){

    
        $tramites= DB::table('users') 
        ->JOIN('tramites_user','users.id', '=', 'tramites_user.user_id')
        ->JOIN('tramites','tramites_user.tramites_id', '=', 'tramites.id')
        ->JOIN('tipo_tramites','tramites.tipo_id', '=', 'tipo_tramites.id')
        ->where('tramites.fecha','=',$fecha)
        ->get();
        // dd($trami)        

        

        return view('rip.vertramites',compact('tramites'));

    }



    

       public function editar($id){

        $name = User::where('id', '=', $id)->first();
            $edit = Beneficiario::where('user_id', '=', $id)->first();
        // $edit = findOrFail($id);
        return view('rip.editar', compact('edit', 'name'));
        // dd($edit);
    }

    public function update(Request $request, $id){
    
        $edit = Beneficiario::where('user_id', '=', $id)->first();
        $edit->update($request->all());

        return redirect('/beneficiarios');
    }

     public function buscador( Request $request)
    {
     
       $dato  = $request->get('dato'); 
    $data =  DB::table('users')        
        ->select('*')
                ->where('name','like', $dato.'%')
                ->orWhere('apellido_paterno','like', $dato.'%')
                ->orWhere('apellido_materno','like', $dato.'%')
                ->orWhere('email','like', $dato.'%')
                ->distinct()->paginate(10);
    return view("rip.beneficiarios", compact("data"));                           
    }
    
     public function buscartramite(Request $request, $fecha)
    {
    $dato  = $request->get('dato'); 
    $tramites = Tramites::where('fecha',$fecha)
        ->join('tipo_tramites','tipo_tramites.id','=','tramites.tipo_id')
        ->select('tramites.tipo_id','tipo_tramites.tipo','tramites.fecha')    
                ->where('tipo','like', $dato.'%')
                ->distinct()->first(10);                                                
    if($tramites==null)
       {      $tramites = Tramites::where('fecha',$fecha)
        ->join('tipo_tramites','tipo_tramites.id','=','tramites.tipo_id')
        ->select('tramites.tipo_id','tipo_tramites.tipo','tramites.fecha')    
                ->where('tipo','like', $dato.'%')
        ->distinct()->first(10);
        $tram=$tramites;
        dd($tram); return view('rip.fechas', compact('tramites'));  
       }      
       else{$tramites = Tramites::where('fecha',$fecha)
        ->join('tipo_tramites','tipo_tramites.id','=','tramites.tipo_id')
        ->select('tramites.tipo_id','tipo_tramites.tipo','tramites.fecha')    
                ->where('tipo','like', $dato.'%')
             ->distinct()->get();
         return view('rip.fechas', compact('tramites'));         

       }
    }

	public function tramites()
	{ 
		$tramite = DB::table('tramites')->select('id')->get();
		return $tramite;
		//dd($tramite);
        
        //dd($tramite);                   
        return view('rip.tramites',compact('tramite'));
	}

    public function show(Request $id){           
    
       // $usuarios = DB::table('beneficiarios')->select('user_id')->get();
       //   dd($usuarios);
     $trami = Tramites::find($id); 
         dd($trami);        
      
       return view('rip.tramites')->with('trami', $trami);
    }

     public function tramitesBe($id){   
            $tramites= DB::table('users') 
            ->JOIN('tramites_user','users.id', '=', 'tramites_user.user_id')
            ->JOIN('tramites','tramites_user.tramites_id', '=', 'tramites.id')
            ->JOIN('tipo_tramites','tramites.tipo_id', '=', 'tipo_tramites.id')
            ->JOIN('evidencia_tramites','tramites.id', '=', 'evidencia_tramites.tramites_id')
            ->JOIN('evidencias','evidencia_tramites.evidencia_id', '=', 'evidencias.id')
            ->where('users.id','=',$id)
        ->select('users.name','users.id','users.apellido_materno','tipo_tramites.tipo','tramites.tipo_id')->distinct()->get();       
        return view('rip.datosbeneficiario')->with('tramites',$tramites);

        }

         public function Verdoc(Request $request)
    { 

        $tramites= DB::table('tramites')        
        ->join('tipo_tramites','tipo_tramites.id','=','tramites.tipo_id')
        ->select('tramites.tipo_id','tipo_tramites.tipo')
        ->distinct()->get();

        //dd($beneficiarios);
        return view('supervisor.verdocumentos', compact('tramites'));                 
    }

         public function VerdocRip(Request $request)
    { $tramites= DB::table('tramites')                  
        ->select('fecha')
        ->orderBy('fecha','asc')
        ->distinct()->simplePaginate(5);
//      $anio = strtotime($tramites);
// //$fecha_d_m_y = $fecha->format('d/m/Y');
// $fecha=date("Y",$anio);
// echo $anio;

        return view('rip.inicioRip', compact('tramites','anio'));
    }

    public function tramitesuper($tipos_id){  
        $tramites= DB::table('users') 
            ->JOIN('tramites_user','users.id', '=', 'tramites_user.user_id')
            ->JOIN('tramites','tramites_user.tramites_id', '=', 'tramites.id')
            ->JOIN('tipo_tramites','tramites.tipo_id', '=', 'tipo_tramites.id')
            ->JOIN('evidencia_tramites','tramites.id', '=', 'evidencia_tramites.tramites_id')
            ->JOIN('evidencias','evidencia_tramites.evidencia_id', '=', 'evidencias.id')
            ->where('tramites.tipo_id','=',$tipos_id)
        ->select('users.name','users.id','users.apellido_materno','tipo_tramites.tipo','tramites.tipo_id','evidencias.documento','tramites.fecha')->distinct()->get();
        //dd($tramites);
        return view('supervisor.documentos')->with('tramites',$tramites);
        }       
        


    public function tramiterip($id){  
        

        $tramites= DB::table('users') 
        ->JOIN('tramites_user','users.id', '=', 'tramites_user.user_id')
        ->JOIN('tramites','tramites_user.tramites_id', '=', 'tramites.id')
        ->JOIN('tipo_tramites','tramites.tipo_id', '=', 'tipo_tramites.id')
        ->JOIN('evidencia_tramites','tramites.id', '=', 'evidencia_tramites.tramites_id')
        ->JOIN('evidencias','evidencia_tramites.evidencia_id', '=', 'evidencias.id')
        ->where('tramites.id','=',$id)
        ->get();

        $tramites_id=$id;

        // dd($tramites_id);
        // return view('rip.tramites')->with('tramites',$tramites);
        return view('rip.tramites',compact('tramites','tramites_id'));


        }
        public function Documentosbeneficiarios($users_id, $tipo_id){  
       $tramites= DB::table('users') 
            ->JOIN('tramites_user','users.id', '=', 'tramites_user.user_id')
            ->JOIN('tramites','tramites_user.tramites_id', '=', 'tramites.id')
            ->JOIN('tipo_tramites','tramites.tipo_id', '=', 'tipo_tramites.id')
            ->JOIN('evidencia_tramites','tramites.id', '=', 'evidencia_tramites.tramites_id')
            ->JOIN('evidencias','evidencia_tramites.evidencia_id', '=', 'evidencias.id')
            ->where('users.id','=',$users_id)
            ->where('tipo_tramites.id','=',$tipo_id)
        ->select('users.name','users.id','evidencias.documento','evidencias.descripcion','tipo_tramites.tipo','tramites.tipo_id')->distinct()->get();
        return view('rip.convocatorias')->with('tramites',$tramites);

        }


        public function fecha($fecha){  
        $tramites= Tramites::where('fecha',$fecha)
         ->join('tipo_tramites','tipo_tramites.id','=','tramites.tipo_id')
           ->join('users','users.id','=','tramites.users_id')
        ->select('tramites.tipo_id','tramites.fecha','tipo_tramites.tipo','users.name')    
        ->distinct()->get();
        $fechaEntera = strtotime($tramites);
        $anio=date("Y",$fechaEntera);
        //dd($anio);
        //return view('rip.fechas')->with('tramites',$tramites);
        return view('rip.fechas', compact('tramites','anio'));
         
        }


        public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('apellido_paterno', 'like', '%'.$query.'%')
         ->orWhere('apellido_materno', 'like', '%'.$query.'%')
          
         ->orderBy('id', 'desc')->get();
         
         
      }
      else
      {
       $data = DB::table('users')
         ->orderBy('id', 'desc')
         ->get();
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {

        //  $resultado = self::dividir($filename, $dir = false);       
        // return redirect()->route('rip.dividir');
        $output .= '
        <tr > 

         <td>'.$row->name.'</td>
         <td>'.$row->apellido_paterno.'</td>
         <td>'.$row->apellido_materno.'</td>       
         <td>   
      <a href="/datosB/'.$row->id.'" class="material-icons button edit">Tramites</a>

        <a href="/editarB/'.$row->id.' " class="material-icons button edit">editar</a>
     </td> 

       
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
public function buscadoranio(Request $request){
       $dato  = $request->get('dato'); 
    $tramites =  DB::table('tramites')        
        ->select('fecha')
                ->whereYear('fecha','like', $dato.'%')             
                ->distinct()->simplePaginate(5);
    return view("rip.inicioRip", compact("tramites"));                           
                       
    }
   
}
