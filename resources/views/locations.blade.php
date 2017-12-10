<!DOCTYPE html>
<html>
<head>
  <title>Buscador de espacios</title>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkfauiLSZEhmyR3Yti92BCrmMCFbqB0Y&libraries=places&callback=initMap" async defer></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
  Para insertar 100 registrios en la tabla locations: <br><br>
  1) php artisan migrate:refresh --path=/database/migrations/selected/ <br>
  2) localhost/json_2_mysql.php <br> <br><hr>

  Para agregar columna de lat y long a tabla espacios: <br><br>
  1) cambiar campo update_at de tabla espacios para que permita nulos <br>
  2) php artisan migrate:refresh --path=/database/migrations/selected/ <br><hr>

  Distancia máxima (metros) <input type="number" name="distanciaMax" value="1500" size="80"> <br><br>

  <input type="text" name="busqueda" value="" id="pac-input" size="80"> <br><br>
  <div id="mapid" style="width: 600px; height: 400px;"></div>
  <hr>
  <p>Hacer enter con la dirección en azul como se ve en la imagen de abajo</p>

  <img src="/images/mapa.jpg" alt="">

  <script>

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
</body>
</html>
