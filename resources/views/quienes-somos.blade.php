@extends('layouts.app')
@section('title') Nosotros @endsection
@section('content')

<div class="nosotros-container">
    <div class="nosotros-titulo">
      <h1>Acerca de nosotros</h1>
      <p>Más del 50% de las personas pierden a diario entre 15 a 30 minutos para estacionar.</p>
      <p>Y más del 90% valora su auto y busca un lugar seguro donde dejar su vehiculo.</p>
      <p>Estacionapp es una comunidad que nace para facilitar los problemas de estacionamiento y acercar a las personas que puedan y quieran ofrecer su espacio y obtener grandes beneficios con las personas que a diario pierden tiempo buscando donde dejar su vehículo</p>
      <p>Nosotros facilitamos el estacionamiento a los conductores, al tiempo que ayudamos a los propietarios y operadores de estacionamiento a obtener grandes beneficios.</p>
    </div>
  <div class="nosotros-foto-contanier">
    <article class="nosotros-foto joaquin">
      <img src="/images/nosotros/joaquin.png">
      <h4>CO-FOUNDER</h4>
      <h2>Joaquín Paños</h2>
      <p>proyectoestacionar@gmail.com</p>
      <a href="https://www.linkedin.com/in/joapanos/" target="_blank">in</a>
    </article>
    <article class="nosotros-foto trufa">
      <img src="/images/nosotros/mariano.png">
      <h4>CO-FOUNDER</h4>
      <h2>Mariano Alvarez Hayes</h2>
      <p>proyectoestacionar@gmail.com</p>
      <a href="https://www.linkedin.com/in/mariano-alvarez-developer/" target="_blank">in</a>
    </article>
  </div>
</div>

@endsection
