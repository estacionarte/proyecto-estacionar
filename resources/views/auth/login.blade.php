@extends('layouts.app')
@section('title') Signin @endsection
@section('content')

  <div class="bodies-main-content">

    <div class="gral-main">

      <h1>Iniciar Sesión</h1>

      <section class="signin">

        <div class="form-generico">

          <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}

            <div class="row">
              <div class="input-field col s12">
                <input id="login-email" type="text" name="email" value="{{ old('email') }}">
                <label for="email">Email</label>
              </div>
              <div class="input-field col s12">
                <input id="login-pass" type="password" name="password" value="{{ old('password') }}">
                <label for="password">Contraseña</label>
              </div>
              <div class="switch">
                 <label>
                   <input type="checkbox"  name="recordarme" value="{{ old('recordarme') ? 'checked' : '' }}">
                   <span class="lever"></span>
                   Recordarme
                 </label>
              </div>
            </div>
            <div class="row" id="signinLoader">
                <img id="spinner" src="/images/spinner.gif" width="150">
            </div>
            <div class="col s12 boton">
                <button id="login-enviar" class="btn waves-effect waves-light  pink darken-2" type="submit" name="boton-submit">INICIAR SESIÓN
                    <i class="material-icons right">send</i>
                </button>
            </div>
          </form>

        </div>

        <a href="{{ route('password.request') }}">¿Olvidaste tu e-mail o contraseña?</a>
        <a href="{{ route('register') }}">¿Aún no estás registrado?</a>

        <div class="login-separador">
          <span>O</span>
        </div>

        <div class="signup-redes">
          <a href="login/facebook" class="facebook-login-button">Iniciar sesión con Facebook</a>
          <a href="login/google" class="google-login-button">Iniciar sesión con Google</a>
        </div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/signin.js"></script>
@endsection
