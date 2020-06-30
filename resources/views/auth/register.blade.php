@extends('layouts.app')
<link rel="stylesheet" href="{!! asset('css/registrar.css') !!}"> 
@section('content') 

<div class="body" style="background: #e2e2e2;height: 91%" >
                 
<div class="Registro" style=" position:relative;
  top:25px;
  left:20%;
  width:70%;
  border-radius:5px;
  overflow:hidden;
  z-index:1;" >

                    <form method="POST" action="{{ route('register') }}">
                         @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                @endif

                        @csrf

 
                                <input style="width: 90%" id="name" type="text" placeholder="Nombre(s)" autocomplete="off" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>                                
                                <input style="width: 90%" id="apellido_paterno" type="text" placeholder="Apellido Paterno" autocomplete="off" class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autofocus>

                                <input style="width: 90%" id="apellido_materno" type="text" placeholder="Apellido Materno" autocomplete="off" class="form-control{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}" name="apellido_materno" value="{{ old('apellido_materno') }}" required autofocus>

                                <input style="width: 90%" id="email" type="email" placeholder="Email ej.@ittg.edu.mx" autocomplete="off"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  pattern=".+@[iI][tT][tT][gG][.][eE][dD][uU][.][mM][xX]" title="Solo se permiten cuentas de @ittg.mx" required>

                          <div >
                                <input style="width: 90%" id="password" type="password" placeholder="Contraseña" autocomplete="off"class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" title="8 caracteres minimos" required>                     
                                <input id="password-confirm" type="password" placeholder="Confirmar contraseña" autocomplete="off" name="password_confirmation" required style="width: 90%; border-bottom: 2px solid #2c90c6; border-bottom-left-radius:10px;
                                    border-bottom-right-radius: 10px">
                          </div>            
                         <input type="submit" value="Registrar" style="text-align: center;width: 90%">                              
                    </form>               
            </div>   
      </div>

@endsection