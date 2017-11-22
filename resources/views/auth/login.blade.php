@extends('layouts.app')
@section('title') Iniciar Sesión @endsection
@section('content')

<div class="container">

  <div class="bodies-main-content">

    <hr>

    <h1>Iniciar Sesión</h1>

    <section class="signin">

      <div class="form-generico">

        <form action="{{ route('login') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input type="email" name="email" placeholder="E-Mail" id="email" value="{{ old('email') }}" required autofocus>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="password" name="password" placeholder="Contraseña" required>
          </div>

          <input type="checkbox" name="recordarme"  id="recordarme" {{ old('remember') ? 'checked' : '' }}>
          <label for="recordarme">Recordarme</label>

          <input type="submit" name="" value="INICIAR SESIÓN">
        </form>

      </div>

      <a href="{{ route('password.request') }}">¿Olvidaste tu e-mail o contraseña?</a>
      <a href="{{ route('register') }}">¿Aún no estás registrado?</a>

      <div class="login-separador">
        <span>O</span>
      </div>

      <a href="#" class="facebook-login-button">Iniciar sesión con Facebook</a>
      <a href="#" class="google-login-button">Iniciar sesión con Google</a>

    </section>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/menu.js"></script>

@endsection
