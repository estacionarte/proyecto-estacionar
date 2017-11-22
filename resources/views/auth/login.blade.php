@extends('layouts.app')
@section('title') Signin @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <h1>Iniciar Sesión</h1>

      <section class="signin">

        <div class="form-generico">

          <form action="" method="post">
            {{ csrf_field() }}

            @if ($errors->has('email'))
                    <p style='color:#990606'>{{ $errors->first('email') }}</p>
            @endif
            <input type="email" name="email" placeholder="E-Mail" style="{{ $errors->has('email') ? ' border: solid 2px #990606' : '' }}" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('password'))
                    <p style='color:#990606'>{{ $errors->first('password') }}</p>
            @endif
            <input type="password" name="password" placeholder="Contraseña" style="{{ $errors->has('password') ? ' border: solid 2px #990606' : '' }}" value="{{ old('password') }}" required>

            <input type="checkbox" name="recordarme" value="recordarme" {{ old('recordarme') ? 'checked' : '' }}>
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
