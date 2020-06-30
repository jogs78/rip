<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function authenticated($request , $user){
  
        $userb = User::with('roles')->where('id', $user->id)->first();

        $role= $userb->roles->first()->name;

        if($role=='rip'){
             return redirect()->route('rip.inicio');
        }if ($role=='recursos') {
             return redirect()->route('rf.inicio');
        }if ($role=='beneficiario') {
             return redirect()->route('beneficiario.inicio');
        }if ($role=='supervisor') {            
             return redirect()->route('super.inicio');             
        }
        return view('welcome',compact('role'));
    }


}
