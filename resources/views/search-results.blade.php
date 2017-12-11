@extends('layouts.app')
@section('title') Resultados de búsqueda @endsection
@section('body')

<div class="container">

  <div class="bodies-main-content">

    <h1>Resultados de búsqueda</h1>

    <section class="search-results">

      <div id="map">

      </div>

      <article class="search-results-espacio">
        <img src="../images/garage.jpg" alt="">
        <h3>Dirección</h3>
        <p>Tipo Espacio</p>
        <p>Precio</p>
      </article>

    </section>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/menu.js"></script>

@endsection
