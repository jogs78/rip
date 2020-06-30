<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Beneficiario;
use App\Notificaciones;
use App\User;
use DB;

class beneficiarioController extends Controller
{
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id'=>'required|bigIncrements',
        	'rfc'=>'required|string|max:255',
            'genero'=>'required|string|max:255',            
            'civil'=>'required|string|max:255',
            'nacionalidad'=>'required|string|max:255',
            'entidad'=>'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'telefono'=>'required|string|max:12',
            'celular'=>'required|string|max:12',
            'email_ins' => 'required|string|email|max:255',
            'fecha_inscrpcion' => 'required|date',
            'perfil' =>'required|string|max:255',
            'area' =>'required|string|max:255',
            'disciplina' =>'required|string|max:255',
            'nombramiento' =>'required|string|max:255',
            'tipo_nombramiento' =>'required|string|max:255',
            'dedicacion' =>'required|string|max:255',
            'unidad' =>'required|string|max:255',
            'fecha_contrato' => 'required|date',
            'nivel' =>'required|string|max:255',
            'siglas' =>'required|string|max:255',
            'estudios' =>'required|string|max:255',
            'pais' =>'required|string|max:255',
            'institucion_otorgante' =>'required|string|max:255',
            'fecha_titulo' => 'required|date',
            
        ]);
    }
     protected function create(array $data)
    { 
        return informacion::create([ 
            'user_id'=>$data['user_id'],
         'genero' => $data['genero'],
            'rfc' => $data['rfc'],
            'civil' => $data['civil'],
            'nacionalidad' => $data['nacionalidad'],
            'entidad' => $data['entidad'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],
            'email_ins' => $data['email_ins'],
            'fecha_inscrpcion' => $data['fecha_inscrpcion'],
            'perfil' => $data['perfil'],
            'area' => $data['area'],
            'disciplina' => $data['disciplina'],
            'nombramiento' => $data['nombramiento'],
            'tipo_nombramiento' => $data['tipo_nombramiento'],
            'dedicacion' => $data['dedicacion'],
            'unidad' => $data['unidad'],
            'fecha_contrato' => $data['fecha_contrato'],
            'nivel' => $data['nivel'],
            'siglas' => $data['siglas'],
            'estudios' => $data['estudios'],
            'pais' => $data['pais'],
            'institucion_otorgante' => $data['institucion_otorgante'],
            'fecha_titulo' => $data['fecha_titulo'],        
                     
        ]);
    }

    function save(Request $request)
    {
    $usuarios=new Beneficiario;
    $usuarios->user_id=Auth::id();   
    $usuarios->rfc=request()->rfc;
    $usuarios->genero=request()->genero;
    $usuarios->civil=request()->civil;
    $usuarios->nacionalidad=request()->nacionalidad;
    $usuarios->entidad=request()->entidad;            
    $usuarios->fecha_nacimiento=request()->fecha_nacimiento;
    $usuarios->telefono=request()->telefono;
    $usuarios->celular=request()->celular;     
    $usuarios->email_ins=request()->email_ins;     
    $usuarios->fecha_inscrpcion=request()->fecha_inscrpcion; 
    $usuarios->perfil=request()->perfil;     
    $usuarios->area=request()->area;     
    $usuarios->disciplina=request()->disciplina;     
    $usuarios->nombramiento=request()->nombramiento;     
    $usuarios->tipo_nombramiento=request()->tipo_nombramiento; 
    $usuarios->dedicacion=request()->dedicacion;     
    $usuarios->unidad=request()->unidad;     
    $usuarios->fecha_contrato=request()->fecha_contrato;     
    $usuarios->nivel=request()->nivel;     
    $usuarios->siglas=request()->siglas;     
    $usuarios->estudios=request()->estudios;
    $usuarios->pais=request()->pais;     
    $usuarios->institucion_otorgante=request()->institucion_otorgante;     
    $usuarios->fecha_titulo=request()->fecha_titulo;     
    $usuarios->save(); 
    $data = Notificaciones::where('receptor', '=', Auth::id())
             ->select('*')
             ->count();
   return view('beneficiario.iniciobeneficiario',compact('usuarios','data'));   
    
    }

  public function show(){
    $data = Notificaciones::where('receptor', '=', Auth::id())
     ->select('*')
     ->count();
              
       $usuarios = Beneficiario::where('user_id',Auth::id())
       ->first();

       if($usuarios==null)
       {        
        return view('beneficiario.datosbeneficiario',compact('data'));

       }      
       else{
 
       return view('beneficiario.iniciobeneficiario',compact('usuarios','data'));         
       }
    }


    public function Contadorbeneficiarios(){
 $contador =  DB::table('beneficiarios')  
 ->select('*')
 ->count();

 $contadorptc =  Beneficiario::where('perfil', '=', 'ptc')
 ->select('*') 
 ->count();
  $contadordeseable =  Beneficiario::where('perfil', '=', 'PTC(PD)')
 ->select('*') 
 ->count();
 $contadorCAs =  Beneficiario::where('perfil', '=', 'CA')
 ->select('*') 
 ->count();
 $contadorCAef =  Beneficiario::where('perfil', '=', 'CAEF')
 ->select('*') 
 ->count();
 $contadorCA=$contadorCAs+$contadorCAef;
 //dd($actualizar);
  $actualizar = Beneficiario::where('updated_at', '>', 'created_at')
 ->select('updated_at')
 ->latest()->first();
       return view('welcome', compact('contador','contadorptc','contadordeseable','contadorCA','actualizar'));              
    }

    public function ordenarNombre(){
      
      $data= DB::table('users')
       
        ->select('*')
        ->orderBy('name', 'asc')
        ->distinct()->paginate(10);    

        return view('rip.beneficiarios', compact('data'));  
    }
    public function ordenarMaterno(){
      
      $data= DB::table('users')
       
        ->select('*')
        ->orderBy('apellido_materno', 'asc')
        ->distinct()->paginate(10);    

        return view('rip.beneficiarios', compact('data'));  
    }
    public function ordenarPaterno(){
      
      $data= DB::table('users')
       
        ->select('*')
        ->orderBy('apellido_paterno', 'asc')
        ->distinct()->paginate(10);    

        return view('rip.beneficiarios', compact('data'));  
    }


      public function editar(){

        $edit = User::where('id', '=', Auth::id())->first();
         $data = Notificaciones::where('receptor', '=', Auth::id())
             ->select('*')
             ->count();   
        return view('beneficiario.EdiCuenta', compact('edit', 'data'));
        // dd($edit);
    }

    public function update(Request $request, $id){
    
        $edit = User::where('id', '=', $id)->first();
        $edit->update($request->all());

        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [            
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('inicioB')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('inicioB')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('/ediCuenta')->with('message', 'Credenciales incorrectas');
            }
        }

        // return redirect('/inicioB');
    }

    public function editarPerfil(){


            $edit = Beneficiario::where('user_id', '=', Auth::id())->first();    
         $data = Notificaciones::where('receptor', '=', Auth::id())
             ->select('*')
             ->count();   
        return view('beneficiario.editar', compact('edit', 'data'));
        // dd($edit);
    }

    public function updatePerfil(Request $request, $id){
    
         $edit = Beneficiario::where('user_id', '=', Auth::id())->first();    
        $edit->update($request->all());

       
        return redirect('/inicioB');
    }
}