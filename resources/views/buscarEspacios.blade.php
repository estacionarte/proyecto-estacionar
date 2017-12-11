
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <link rel="icon" href="../../../../favicon.ico"> --}}

  <title>Buscador de cocheras</title>

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Buscador de cocheras</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          {{-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Settings</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Profile</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">Help</a>
  </li> --}}
</ul>
<form class="form-inline mt-2 mt-md-0">
  <input class="form-control mr-sm-2" type="text" placeholder="Ubicación" aria-label="Search" id="pac-input">
  <input class="form-control mr-sm-2" type="text" placeholder="Distancia" aria-label="Search" name="distanciaMax" value="1500">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>
</div>
</nav>
</header>

<div class="container-fluid">
  {{-- <div class="container"> --}}
  {{-- <div class="row">
  <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
  <ul class="nav nav-pills flex-column">
  <li class="nav-item">
  <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Reports</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Analytics</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Export</a>
</li>
</ul>

<ul class="nav nav-pills flex-column">
<li class="nav-item">
<a class="nav-link" href="#">Nav item</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Nav item again</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">One more nav</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Another nav item</a>
</li>
</ul>

<ul class="nav nav-pills flex-column">
<li class="nav-item">
<a class="nav-link" href="#">Nav item again</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">One more nav</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Another nav item</a>
</li>
</ul>
</nav> --}}

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
  <h1>Mapa</h1>

  <section class="row text-center placeholders">
    {{-- <div class="col-6 col-sm-3 placeholder">
    <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
    <h4>Label</h4>
    <div class="text-muted">Something else</div>
  </div>
  <div class="col-6 col-sm-3 placeholder">
  <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
  <h4>Label</h4>
  <span class="text-muted">Something else</span>
</div>
<div class="col-6 col-sm-3 placeholder">
<img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
<h4>Label</h4>
<span class="text-muted">Something else</span>
</div>
<div class="col-6 col-sm-3 placeholder">
<img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
<h4>Label</h4>
<span class="text-muted">Something else</span>
</div> --}}
{{-- <div id="mapid" style="width: 600px; height: 400px;"></div> --}}
<div id="mapid" style="width: 100%; height: 400px;"></div>
</section>

<h2>Cocheras</h2>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Distancia (m)</th>
        <th>Dirección</th>
        {{-- <th>Header</th>
        <th>Header</th> --}}
      </tr>
    </thead>
    <tbody>
      {{-- <tr>
        <td>1,001</td>
        <td>Lorem</td>
        <td>dolor</td>
        <td>sit</td>
      </tr>
      <tr>
        <td>1,002</td>
        <td>amet</td>
        <td>adipiscing</td>
        <td>elit</td>
      </tr>
      <tr>
        <td>1,003</td>
        <td>Integer</td>
        <td>odio</td>
        <td>Praesent</td>
      </tr> --}}
    </tbody>
  </table>
</div>
</main>
</div>
</div>

{{-- <!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script> --}}

<script type="text/javascript">
function postLocation(place) {

  var token       = document.getElementsByName("csrf-token")[0].content,
      maxDistance = document.getElementsByName("distanciaMax")[0].value;

  $.ajaxSetup({
    headers: {'X-CSRF-TOKEN': token}
  });

  $.post('/locations', {
    name: place.name,
    lat: place.geometry.location.lat(),
    lng: place.geometry.location.lng(),
    maxDistance: maxDistance
  })
  .done(function(data) {
    mostrarEspaciosEnElMapa(window.map,window.place,data);
  })
  .fail(function() {
    alert( "error" );
  });
}

function initMap() {
  var input = document.getElementById('pac-input');
  var autocomplete = new google.maps.places.Autocomplete(input);

  autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();
    window.place = place;
    if (!place.geometry) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    } else {
      var location = place.geometry.location.lat() + ', ' + place.geometry.location.lng();
      postLocation(place);
    }
  })
}

function mostrarEspaciosEnElMapa (map, userLocation, espacios) {
  window.map.remove();

  var tbody = $('tbody');
  tbody.empty();

  var lat = userLocation.geometry.location.lat(),
  lng = userLocation.geometry.location.lng(),
  location = L.latLng(lat, lng),
  map = L.map('mapid').setView(location, 14);

  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    minZoom: 9,
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
    '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
    id: 'mapbox.streets'
  }).addTo(map);

  var myIcon = L.icon({
    iconUrl: '/images/black_map_marker_icon_you_are_here.png',
    iconSize: [40, 40],
    popupAnchor: [0, -10],
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
  });

  var marker = L.marker(location,{"icon":myIcon}).bindPopup(userLocation.name);
  marker.addTo(map).openPopup();

  for (var i = 0; i < espacios.length; i++) {
    var espacio  = espacios[i],
    location = espacio.location,
    lat      = location.split(",")[0],
    lng      = location.split(",")[1],
    latLng   = L.latLng(lat,lng);

    var marker = L.marker(latLng).bindPopup(espacio.domicilio + '<BR>' + espacio.barrio + '<BR>' + espacio.distance + 'm');
    marker.addTo(map);

    var tr = $('<tr>').append(
           $('<td>').text(espacio.distance),
           $('<td>').text(espacio.direccion));

    tbody.append(tr);
  }

  window.map = map;
}

window.onload = function () {
  var map = L.map('mapid').setView([-34.6033, -58.3816], 14);

  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    minZoom: 9,
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
    '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
    id: 'mapbox.streets'
  }).addTo(map);

  window.map = map;
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkfauiLSZEhmyR3Yti92BCrmMCFbqB0Y&libraries=places&callback=initMap" async defer></script>
</body>
</html>
