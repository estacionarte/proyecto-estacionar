@extends('layouts.app')
@section('title') Signup @endsection
@section('content')

<div class="bodies-main-content">

  <div class="gral-main">

    {{-- <hr> --}}

    <h1>Crear Cuenta</h1>

    <section class="signup">

      {{-- @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
          <p style="color: #990606;"> {{ $error }} </p>
        @endforeach
      @endif --}}

      <form  action="{{ route('register') }}" method="post" class="col s10 offset-s1" enctype="multipart/form-data">

          {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="nombre" type="text" name="firstName" value="{{ old('firstName') }}" style="{{ $errors->has('firstName') ? ' border-bottom: solid 1px red' : '' }}">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                      <input id="apellido" type="text" name="lastName" value="{{ old('lastName') }}" style="{{ $errors->has('lastName') ? ' border-bottom: solid 1px red' : '' }}">
                      <label for="apellido">Apellido</label>
                </div>
                <div class="input-field col s4">
                      <input id="dia"  type="number" name="birthDay" min="1" max="31" value="{{ old('birthDay') }}" style="{{ $errors->has('birthDay') ? ' border-bottom: solid 1px red' : '' }}">
                      <label for="dia">Dia</label>
                </div>
                <div class="input-field col s4">
                      <input id="mes"  type="number" name="birthMonth" min="1" max="12" value="{{ old('birthMonth') }}" style="{{ $errors->has('birthMonth') ? ' border-bottom: solid 1px red' : '' }}">
                      <label for="mes">Mes</label>
                </div>
                <div class="input-field col s4">
                      <input id="anio"  type="number" name="birthYear" min="1900" max="2010" value="{{ old('birthYear') }}" style="{{ $errors->has('birthYear') ? ' border-bottom: solid 1px red' : '' }}">
                      <label for="anio">Año</label>
                </div>
                <div class="input-field col s12">
                      <input id="email"  type="text" name="email" value="{{ old('email') }}" style="{{ $errors->has('email') ? ' border-bottom: solid 1px red' : '' }}">
                      <label for="email">Email</label>
                </div>
                <div class="input-field col s12 m6">
                      <input id="password"  type="password" name="password" style="{{ $errors->has('password') ? ' border-bottom: solid 1px red' : '' }}">
                      <label for="password">Contraseña</label>
                </div>
                <div class="input-field col s12 m6">
                      <input id="password2"  type="password" name="password_confirmation" style="{{ $errors->has('password_confirmation') ? ' border-bottom: solid 1px red' : '' }}">
                      <label for="password2">Confirmar Contraseña</label>
                </div>
                {{-- <div class="input-field col s12">
                      <input type="file" name="profilePic" accept="image/*">
                </div> --}}
            </div>

            <div class="row" id="signupLoader">
                <img id="spinner" src="/images/spinner.gif" width="150">
            </div>
            <div class="row">
              <div class="col s12 boton">
                  <button id="enviar" class="btn waves-effect waves-light  pink darken-2" type="submit" name="boton-submit">CREAR CUENTA
                      <i class="material-icons right">send</i>
                  </button>
              </div>
          </div>
      </form>


      <p>Al hacer click en "Crear Cuenta", aceptas los términos y condiciones y la política de privacidad de Estacionados.</p>

      <a href="{{ route('login') }}">¿Ya estás registrado?</a>

      <div class="login-separador">
        <span>O</span>
      </div>

      <div class="signup-redes">
        <a href="#" class="facebook-login-button">Crear Cuenta con Facebook</a>
        <a href="#" class="google-login-button">Crear Cuenta con Google</a>
      </div>

    </div>

    </section>
  </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/signup.js"></script>

@endsection
