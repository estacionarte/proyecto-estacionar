@extends('layouts.app')
@section('title') Resultados de búsqueda @endsection
@section('content')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
<div class="container">

  <div class="como-funciona">

    <section class="search-result">
        <h1>Resultados de búsqueda</h1>
      <div id="map">

      </div>
      <div class="mejores-espacios-container">

      @forelse ($espacios as $espacio)
        <article class="mejor-espacio-bloque">
          <img class="mejor-espacio" src="/storage/espacios/33-1.jpeg" alt="">
          <h3 <strong>{{ '$ ' . $espacio->precioAutosMinuto . ' el minuto'}}</strong> </h3>
          <h4 style="display:inline;">{{ $espacio->direccion }}</h4>
          <h4>{{ $espacio->tipoEspacio }}</h4>
          <img class="stars" src="/images/stars.png">
        </article>
      @empty
        <p>No hay espacios disponibles con estos criterios de búsqueda</p>
        <p>Intenta buscando en otra zona o en otros horarios</p>
      @endforelse

        <div class="clear">
        	{{ $espacios->links() }}
        </div>
      </div>
    </section>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/menu.js"></script>
<script type="text/javascript">
  var mymap = L.map('map').setView([-34.64, -58.38], 14);

  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoiam9hcGFub3MiLCJhIjoiY2pha2Z2eG1zMmlrNTMzcno2OHQ0b3VvYiJ9.jgj5HdcO2n9VZJpuSn4_wA'
  }).addTo(mymap);

  var marker = L.marker([-34.6211, -58.38151]).addTo(mymap);
  // var marker2 = L.marker([-34.6211, -58.38152]).addTo(mymap);
  // var marker3 = L.marker([-34.6211, -58.38151]).addTo(mymap);

  // var circle = L.circle([-34.61709, -58.38233], {
  //   color: 'red',
  //   fillColor: '#f03',
  //   fillOpacity: 0.5,
  //   radius: 150
  // }).addTo(mymap);

  // var polygon = L.polygon([
  //   [-34.6241, -58.38251],
  //   [-34.6291, -58.38291],
  //   [-34.63, -58.389]
  // ],
  // {
  //   color: 'green'
  // }).addTo(mymap);

  marker.bindPopup("<h5>$ 80.00 ARS x hora</h5>").openPopup();
  // marker2.bindPopup("<h5>$ 80.00 ARS x hora</h5>").openPopup();
  // circle.bindPopup("<b>Soy un popup en un circulo!</b>");
  // polygon.bindPopup("<b>Hello world!</b><br>Soy un polígono popup!");

  var popup = L.popup()
    .setLatLng([-34.6111, -58.38151])
    .setContent("I am a standalone popup.")
    .openOn(mymap);

  function onMapClick(event) {
    alert("Clickeaste el mapa en " + event.latlng);
  }
  mymap.on('click', onMapClick);
  mymap.off('click', onMapClick);

  var popup2 = L.popup()
  function onMapClick2(e) {
    popup2
      .setLatLng(e.latlng)
      .setContent("Clickeaste el mapa en " + e.latlng.toString())
      .openOn(mymap)
  }
  mymap.on('click', onMapClick2)

</script>
@endsection
