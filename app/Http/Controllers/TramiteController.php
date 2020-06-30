<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Post;
use App\User;
use App\Tramites, App\Tipo_tramite, App\Notificaciones;
use DB; 

class TramiteController extends Controller
{
     protected function validator(array $data)
    {
        return Validator::make($data, [          
            'fecha' =>'string|date',
            'tipo_id' => 'required|string|max:255',                        
        
            
        ]); 
    }

    protected function create(array $data)
    {
        return tramites::create([    
        
            'fecha' => $data['fecha'],
            'tipo_id' => $data['tipo_id'],                       
         
        ]);
    }

     public function store(Request $request) 
    { 
 
      $beneficiario = $request->receptor; 
      if ($beneficiario != null) {
                 
      $tram=new Tramites;       
      
      $tram->fecha=request()->fecha;
      $tram->tipo_id=request()->tipo_id;                                                
      $tram->save(); 
// dd($request->all());        
       foreach($beneficiario as $id){     
       $tram
       ->users()
       ->attach(User::where('id', $id)->first());    
          }

          $name_tramite=Tipo_tramite::where('id',request()->tipo_id)->value('tipo');
          $id_tramite = $tram->id;
          return view('rip.subirEvidencia',compact('name_tramite', 'id_tramite'));
    }
    else {
            return back()->with('flash', 'Ningun receptor seleccionado');
        } 
      }
    public function index() 
    {  
      $tipos = Tipo_tramite::all();    
    //   $usuario =  $beneficiarios= DB::table('beneficiarios')
    //     ->join('users','users.id','=','beneficiarios.user_id')
    //     ->select('beneficiarios.user_id','beneficiarios.perfil','users.apellido_paterno','users.apellido_materno','users.name as name')
    // ->distinct()->get();
      $usuario = User::all();
      return view('rip.subirDoc', compact('tipos','usuario'));       
       // dd($usuarios);       
    }

    public function show()
    {
     $usuario =  $beneficiarios= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','users.apellido_paterno','users.apellido_materno','beneficiarios.perfil','users.name as name')
    ->distinct()->get();
    return view('rip.subirDoc')->with('usuario', $usuario);
      
    }

    public function Docsearch(Request $request)
    {
      $tipos = Tipo_tramite::all();   
    $dato  = $request->get('dato'); 
    $usuario = DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','users.apellido_paterno','beneficiarios.perfil','users.apellido_materno','users.name as name')
                ->where('name','like', $dato.'%')
                ->orWhere('apellido_paterno','like', $dato.'%')
                ->orWhere('apellido_materno','like', $dato.'%')
                ->orWhere('perfil','like', $dato.'%')
                ->distinct()->get();
    return view("rip.subirDoc", compact('usuario','tipos'));
    }

    public function showtramite( Request $id)
    {      
        $tramite = Tramites::where('users_id','=',Auth::id())
          ->get();
        //dd($tramite);                   
        //return view('beneficiario.verbeneficiarios',compact('tramite'));

    }
  public function lista()
    {
        //$tram=Tipo_tramite::get();

      $data = Notificaciones::where('receptor', '=', Auth::id())
 ->select('*')
 ->count();
      $tram= DB::table('users') 
            ->JOIN('tramites_user','users.id', '=', 'tramites_user.user_id')
            ->JOIN('tramites','tramites_user.tramites_id', '=', 'tramites.id')
            ->JOIN('tipo_tramites','tramites.tipo_id', '=', 'tipo_tramites.id')
            ->JOIN('evidencia_tramites','tramites.id', '=', 'evidencia_tramites.tramites_id')
            ->JOIN('evidencias','evidencia_tramites.evidencia_id', '=', 'evidencias.id')
            ->where('users.id','=',Auth::id())
        ->select('users.name','users.id','users.apellido_materno','tipo_tramites.tipo','tramites.tipo_id','tramites.fecha')->distinct()->get();   

      // $tram= DB::table('tramites')
      //   ->join('users','users.id','=','tramites.users_id')
      //   ->join('tipo_tramites','tipo_tramites.id','=','tramites.tipo_id')
      //   ->select('tramites.users_id','tramites.tipo_id','tramites.id',   'tipo_tramites.tipo','users.name as beneficiario')
      //   ->get();
      

      //dd($tram);
      return view('beneficiario.ListaTramites',compact('tram','data'));
      //return redirect()->route('rip.documento',compact('tr'));
    }
     
    public function tipo($tipos_id ,$fecha)
    {  
      
      $data = Notificaciones::where('receptor', '=', Auth::id())
 ->select('*')
 ->count();
     $tramite= DB::table('users') 
            ->JOIN('tramites_user','users.id', '=', 'tramites_user.user_id')
            ->JOIN('tramites','tramites_user.tramites_id', '=', 'tramites.id')
            ->JOIN('tipo_tramites','tramites.tipo_id', '=', 'tipo_tramites.id')
            ->JOIN('evidencia_tramites','tramites.id', '=', 'evidencia_tramites.tramites_id')
            ->JOIN('evidencias','evidencia_tramites.evidencia_id', '=', 'evidencias.id')
            ->where('users.id','=',Auth::id())
            ->where('tipo_tramites.id','=',$tipos_id)
            ->where('tramites.fecha','=',$fecha)
        ->select('users.name','users.id','users.apellido_materno','tipo_tramites.tipo','tramites.tipo_id','tramites.fecha','evidencias.documento')->distinct()->get(); 
        
      

      if($tramite=='0')
       {              
        dd($tramite);
        return view('beneficiario.verbeneficiarios',compact('tramite','data'));
       }      
       else{
         return view('beneficiario.verbeneficiarios',compact('tramite','data'));        

       }
    }

    public function descargar( $evidencia){
     
    $publ= Tramites::find($evidencia);      
    $public_path = storage_path();
    $url = $public_path.'/app/'.$publ.$evidencia;
    return response()->download($url);

     if (Storage::exists($evidencia))
     {
       return response()->download($url);
 
     }
     //si no se encuentra lanzamos un error 404.
     abort(404); 

    }

    public function descargarRip($evidencia){
      $publ= Tramites::find($evidencia);      
      $public_path = storage_path();
      $url = $public_path.'/app/'.$publ.$evidencia;
      return response()->download($url);

     if (Storage::exists($evidencia))
     {
       return response()->download($url);
 
     }
     //si no se encuentra lanzamos un error 404.
     abort(404); 

    }
public function authent(){
        
        //$userb = User::with('roles')->where('id', $user->id)->first();
        //$role= $userb->roles->first()->name;
  $role = DB::table('role_user')
  ->where('user_id', '=', Auth::id())
  ->value('role_id');
  

        if($role=='1'){
             return redirect()->route('rip.inicio');
        }if ($role=='2') {
             return redirect()->route('rf.inicio');
        }if ($role=='4') {
             return redirect()->route('beneficiario.inicio');
        }if ($role=='3') {            
             return redirect()->route('super.inicio');             
        }
        
    }
 
    
public function buscadoranio(Request $request){
       $dato  = $request->get('dato'); 
    $tramite =  DB::table('tramites')               
                ->whereYear('fecha','like', $dato.'%') 
                ->where('users_id','=',Auth::id())  
                ->join('users','users.id','=','tramites.users_id')
                 ->select('fecha','tipo_id','tramites.evidencia','users.name as beneficiario')            
                ->distinct()->get();
    return view("beneficiario.verbeneficiarios", compact("tramite"));                           
                       
    }
}
