@extends('layouts.app')

@section('content') 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<style type="text/css" media="screen">
#sidebar,#menu{display:none;}
#page{width:99%;}
#content{width:99%;}
</style>
<link rel="stylesheet" media="screen" href="{!! asset('css/style.css') !!}">
<div class="body">


<center>
<img src="img/PRODEP.png" width="230px" height="120">
<img src="img/ittg.png" width="100px" height="100" >
</center>

<div class="login">

  <h2>Inicio de Sesión</h2>
  
  <form method="POST" action="{{ route('login') }}">       
     @csrf
              <div>
                   <input id="email" type="text" placeholder="E-Mail" class="email{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus >

                     @if ($errors->has('email'))
                     <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
              



    <br/>    
               <input id="password" type="password" placeholder="Contraseña" class="pwd{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
          @if ($errors->has('password'))
                         <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                          </span>
          @endif  
</div>

         <div style="margin-left: 30%" >
                <div>  <input style="  
  width: 15px;
  height: 15px;
  margin-left: -5%;
  cursor: pointer;" class="form-check-input" type="checkbox" name="remember" id="remember" value=" {{ old('remember') ? 'checked' : '' }}"> 
          @if ($errors->has('password'))
                         <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                          </span>
          @endif  
</div>
                      <label class="form-check-label" for="remember" style="margin-left: 10%">
                           {{ __('Recordar') }}
                      </label>
        </div>  
        <button type="submit"  >
    {{ __('Entrar') }}
  </button>


  </form>
  
  <br/>
  
  <div class="reg"></div>
  <div class="sig"></div>
  
</div>
</div>


@endsection
