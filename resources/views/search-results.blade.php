@extends('layouts.app')
@section('title') Resultados de búsqueda @endsection
@section('body')

<div class="container">

  <div class="bodies-main-content">

    <h1>Resultados de búsqueda</h1>

    <section class="search-results">

      <div id="map">

      </div>

      @forelse ($espacios as $espacio)
        <article class="search-results-espacio">
          <img src="../images/garage.jpg" alt="">
          <h3>{{ $espacio->direccion }}</h3>
          <p>{{ $espacio->tipoEspacio }}</p>
          <p>{{ $espacio->precioAutosMinuto}}</p>
        </article>
      @empty
        <h3>No hay espacios disponibles con estos criterios de búsqueda</h3>
        <p>Intenta buscando en otra zona o en otros horarios</p>
      @endforelse

      <div>
      	{{ $espacios->links() }}
      </div>

    </section>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/menu.js"></script>

@endsection
