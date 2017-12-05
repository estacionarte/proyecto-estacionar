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

          <form action='{{ route('insert.upload.espacio.2', $espacio) }}' method="post" enctype="multipart/form-data" class="form-uploadEspacio">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            @include('upload-espacio._form-infogeneral')

            @foreach ($fotos as $foto)
              <div class="upload-div-foto">
                <img src="/storage/espacios/{{ $foto->photoname }}" alt="" class="upload-img-foto">
                <div class="upload-div-div-foto">
                  <label for="{{ $foto->id }}" class="upload-label-deletefoto">ELIMINAR</label>
                </div>
              </div>
            @endforeach

            <input type="submit" name="boton-submit" value="SIGUIENTE">
          </form>
          @foreach ($fotos as $foto)
            <form method="POST" action="{{ route('deletepic.upload.espacio', $foto->id) }}" method="post" onsubmit="return confirm('¿Está seguro de que quiere eliminar esta foto?')">
              {{ method_field('DELETE') }}
  					  {{ csrf_field() }}

  					  <button type="submit" id="{{ $foto->id }}" style="display:none;"></button>
            </form>
          @endforeach

        </div>

        <div class="upload-div-sideimage"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
