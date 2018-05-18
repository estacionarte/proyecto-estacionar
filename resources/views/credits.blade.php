@extends('layouts.app')
@section('title') Conseguir Créditos @endsection
@section('content')

  <div class="bodies-main-content">

    <div class="gral-main">

      <h1>¡Ahorrá dinero invitando a amigos!</h1>

      <section class="signin credits-form">
        <h4>Invitá a un amigo y le descontaremos un 20% en su primer alquiler con Estacionados. Cuando finalice su estadia, obtendrás $50 de crédito para vos. ¡Solo para usuarios nuevos de Estacionados!</h4>
        <div class="form-generico">
          <form action="{{ route('showCreditsForm') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s12 l5 offset-l1">
                <input id="credit-name" type="text" name="name" value="{{ old('name') }}">
                <label for="credit-name">Nombre de tu amig@</label>
              </div>
              <div class="input-field col s12  l5">
                <input id="credit-email" type="text" name="email" value="{{ old('email') }}">
                <label for="credit-email">Email de tu amig@</label>
              </div>
            </div>
            <div class="row" id="" style="display:none">
                <img id="spinner" src="/images/spinner.gif" width="150">
            </div>
            <div class="col s12 boton">
                <button id="" class="btn waves-effect waves-light  pink darken-2" type="submit" name="boton-submit">Enviar invitación
                    <i class="material-icons right">send</i>
                </button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>

@endsection
