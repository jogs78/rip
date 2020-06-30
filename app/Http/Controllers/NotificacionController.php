<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Redirect;
use App\User;
use App\Notificaciones;
use DB;

class NotificacionController extends Controller
{	
	 protected function validator(array $data)
    {
        return Validator::make($data, [                    
            'emisor' => 'required|string|max:255',            
            'receptor' => 'required|string|max:255',
            'mensaje' => 'required|string|max:255',                                    
        ]);
    }

    protected function create(array $data)
    {
        return notificaciones::create([    
        
            'emisor' => $data['emisor'],
            'receptor' => $data['receptor'],            
            'mensaje' => $data['mensaje'], 
        ]);
    } 


    public function get(Request $request){
        
        $data = $request->receptor;
        $mensaje = $request->mensaje;
         if ($data != null) {
        $this->save($data, $mensaje);
        $this->send($data, $mensaje);

        return back()->with('flash', 'El mensaje ha sido enviado');
        } else {
            return back()->with('flash', 'Ningun receptor seleccionado');
        }        

        
    }


    function save($data, $mensaje)
    {
        
        // $receptores=$request->receptor;        
       
            
            foreach($data as $id){
            $noti=new Notificaciones;
            $noti->emisor=Auth::id();   
            $noti->receptor=$id;
            $noti->mensaje=$mensaje;          
            $noti->save();    
            }
            // return redirect()->action('NotificacionController@send');           
             // return back()->with('flash', 'El mensaje se ha enviado');
    
    
    }


    public function send($data, $mensaje){
      
            // $receptores=$request->receptor;

            foreach($data as $id){

            $email = DB::table('users')->where('id', $id)->value('email');
            Mail::to($email)->send(new SendMail($mensaje));
            }            
        
    }

    public function mail(Request $request){

        $data = $request->input('mensaje');     
        // $email = $request->input('email');

        return view('rip.email', compact('data'));    
    }




	public function index(){

        $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('*')
        ->distinct()->get();  

        //dd($beneficiarios);
        return view('rip.notificaciones', compact('usuario'));  

	}    



   public function showNoti(){
         $data = Notificaciones::where('receptor', '=', Auth::id())
         ->select('*')
         ->count();
         //dd($data);
            $notificacion = Notificaciones::where('receptor', '=', Auth::id())->get();
               // dd($usuarios);              
       
       return view('beneficiario.notificacionbeneficiario', compact('notificacion','data'));
       return view('beneficiario.iniciobeneficiario', compact('data'));              
    }

    public function showNotiRip(){
                 
       $notificacion = Notificaciones::where('receptor', '=', Auth::id())->get();
       // dd($usuarios);              
       
       return view('rip.vernotificacion', compact('notificacion'));
       
        }

    public function deleteNotifi($id){
    
        $noti = Notificaciones::find($id);
        $noti->delete();

        return redirect()->route('beneficiario.notificaciones'); 
    }


    public function ordenarNom(Request $request){

      
        $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.perfil','users.apellido_paterno', 'users.apellido_materno', 'users.email','users.email','users.name as beneficiario')
        ->orderBy('name', 'asc')
        ->distinct()->get();

        //dd($beneficiarios);
       return view('rip.notificaciones', compact('usuario'));  
    }

    public function ordenarPater(){
      
      $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.rfc','beneficiarios.perfil','users.apellido_paterno', 'apellido_materno','users.email','users.name as beneficiario')
        ->orderBy('apellido_paterno', 'asc')
        ->distinct()->get();

        return view('rip.notificaciones', compact('usuario'));  
    }

    public function ordenarMater(){
      
      $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.rfc','beneficiarios.perfil','users.apellido_paterno', 'apellido_materno','users.email','users.name as beneficiario')
        ->orderBy('apellido_materno', 'asc')
        ->distinct()->get();

        return view('rip.notificaciones', compact('usuario'));  
    }

        public function ordenarEmail(){
      
      $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.rfc','beneficiarios.perfil','users.apellido_paterno', 'apellido_materno','users.email','users.name as beneficiario')
        ->orderBy('email', 'asc')
        ->distinct()->get();

        return view('rip.notificaciones', compact('usuario'));  
    }

    public function ordenarPerfil(){
      
      $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.rfc','beneficiarios.perfil','users.apellido_paterno', 'apellido_materno','users.email','users.name as beneficiario')
        ->orderBy('perfil', 'asc')
        ->distinct()->get();

        return view('rip.notificaciones', compact('usuario'));  
    }

     public function search(Request $request)
    {
    $dato  = $request->get('dato'); 
    $usuario =  $beneficiarios= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.rfc','users.apellido_paterno','beneficiarios.perfil','users.apellido_materno','users.name as beneficiario')
                ->where('name','like', $dato.'%')
                ->orWhere('apellido_paterno','like', $dato.'%')
                ->orWhere('apellido_materno','like', $dato.'%')
                ->orWhere('perfil','like', $dato.'%')
                ->distinct()->get();
    return view("rip.notificaciones", compact("usuario"));
    }

    // ========FUNCIONES PARA RECURSOS FINANCIEROS==========

    public function indexrf(){

       $usuario=DB::table('users')->select('*')->get();

        //dd($beneficiarios);
        return view('recursos.iniciorf', compact('usuario'));  

    }
     public function ordenarNomRf(){

     $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.perfil','users.apellido_paterno', 'users.apellido_materno', 'users.email','users.name as beneficiario')
        ->orderBy('name', 'asc')
        ->distinct()->get();

        return view('recursos.iniciorf', compact('usuario'));  
    }

    public function ordenarPaterRf(){
      
      $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.perfil','users.apellido_paterno', 'users.apellido_materno', 'users.email','users.name as beneficiario')
        ->orderBy('apellido_paterno', 'asc')
        ->distinct()->get();

        return view('recursos.iniciorf', compact('usuario'));  
    }

    public function ordenarMaterRf(){
      
      $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.perfil','users.apellido_paterno', 'users.apellido_materno', 'users.email','users.name as beneficiario')
        ->orderBy('apellido_materno', 'asc')
        ->distinct()->get();

        return view('recursos.iniciorf', compact('usuario'));  
    }

     public function ordenarEmailRf(){
      
      $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.rfc','beneficiarios.perfil','users.apellido_paterno', 'apellido_materno','users.email','users.name as beneficiario')
        ->orderBy('email', 'asc')
        ->distinct()->get();

        return view('recursos.iniciorf', compact('usuario'));  
    }

    public function ordenarPerfilRf(){
      
      $usuario= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.perfil','users.apellido_paterno', 'users.apellido_materno', 'users.email','users.name as beneficiario')
        ->orderBy('perfil', 'asc')
        ->distinct()->get();

        return view('recursos.iniciorf', compact('usuario'));  
    }

     public function searchRf(Request $request)
    {
    $dato  = $request->get('dato'); 
    $usuario =  $beneficiarios= DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.user_id','beneficiarios.perfil','users.apellido_paterno', 'users.apellido_materno', 'users.email','users.name as beneficiario')
                ->where('name','like', $dato.'%')
                ->orWhere('apellido_paterno','like', $dato.'%')
                ->orWhere('apellido_materno','like', $dato.'%')
                ->orWhere('email','like', $dato.'%')
                ->orWhere('perfil','like', $dato.'%')
                ->distinct()->get();
    return view('recursos.iniciorf', compact('usuario'));
    }
       
   public function showNotiSuper(){
                 
       $notificacion = Notificaciones::where('receptor', '=', Auth::id())->get();
       // dd($usuarios);              
       
       return view('supervisor.vernotificaciones', compact('notificacion'));
       
        }

     
}
