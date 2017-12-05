@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('signin')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEspacio-progressBar">
        <div class="uploadEspacio-progressBar-progress1"></div>
      </div>

      <h1>Cargar Espacio - Información General</h1>

      <section class="uploadEspacio">

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

        <div class="form-generico">

          <form action='{{ route('create.espacio.upload.espacio.2') }}' method="post" enctype="multipart/form-data" class="form-uploadEspacio">
            {{ csrf_field() }}

            @include('upload-espacio._form-infogeneral')

            <input type="submit" name="boton-submit" value="SIGUIENTE">
          </form>

        </div>

        <div class="upload-div-sideimage"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
