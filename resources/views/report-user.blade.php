@extends('layouts.app')
@section('title') Reportar usuario @endsection
@section('content')

  <div class="bodies-main-content">

    <div class="gral-main">

      <h1>¡Reportar un usuario!</h1>

      <section class="signin credits-form">
        <h4>Vas a reportar un usuario de forma totalmente anónima.</h4>
        <div class="form-generico">
          <form action="" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="input-field col s12">
                <select class="icons">
                  <option value="" selected>Este perfil no deberia estar en Estacionados</option>
                  <option value="" selected>Se me solicitó informacion personal</option>
                  <option value="">Contenido inadecuado o spam</option>
                </select>
              </div>
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label style="font-size: 13px" for="textarea1">Incluya una breve explicación, y si lo desea sus datos para que nos pongamos en contacto</label>
              </div>
            </div>
            <div class="row" id="" style="display:none">
                <img id="spinner" src="/images/spinner.gif" width="150">
            </div>
            <div class="col s12 boton">
                <button id="" class="btn waves-effect waves-light  red accent-4" type="submit" name="boton-submit">Reportar
                    <i class="material-icons right">send</i>
                </button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>

  <script>
      // SELECT DE FORMULARIO
        $(document).ready(function() {
          $('select').material_select();
        });
  </script>

@endsection
