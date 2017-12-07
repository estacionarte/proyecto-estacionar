@extends('layouts.app')
@section('title') Mi Perfil - Editar Imagen @endsection
@section('content')

  <div class="container">
    <div class="bodies-main-content">
      <main class="main-profile-navv">
        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1">Mi perfil</label>
        <section id="content1">
          <div class="profile-image">
            <img src="storage/profilePic/{{Auth::user()->profilePic}}" alt="profile image"><br>
            <form class="" action="" method="post" enctype="multipart/form-data">
              <label for="">Actualizar imagen de perfil</label>
              <input type="file" name="profilePic" value="">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" name="" value="Subir" >
            </form>
          </div>
        </section>
      </main>
    </div>
  </div>

@endsection
