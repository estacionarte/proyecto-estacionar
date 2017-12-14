@extends('layouts.app')

@section('signin')
  <!-- Bootstrap core CSS -->
  {{-- <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

  <!-- Custom styles for this template -->
  {{-- <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet"> --}}

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}

  <div class="container-fluid">
    <hr>
    {{-- <hr>
    <form class="form-inline mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Ubicación" aria-label="Search" id="pac-input">
      <input class="form-control mr-sm-2" type="text" placeholder="Distancia" aria-label="Search" name="distanciaMax" value="1500">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <hr> --}}

    <div class="row">

      <div class="col-sm-6">
        <div  id="mapid" style="width: 100%; height: 400px;"></div>
      </div>

      <div class="col-sm-6">


        {{-- <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Distancia (m)
          <span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">500</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">1000</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">1500</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2000</a></li>
          </ul>
        </div> --}}
        <input class="form-control mr-sm-2" type="number" placeholder="Distancia máxima" aria-label="Search" name="distanciaMax">

        <h2>Cocheras</h2>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Distancia (m)</th>
                <th>Dirección</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function postLocation(place) {
debugger;
    var token       = document.getElementsByName("csrf-token")[0].content,

    maxDistance = document.getElementsByName("distanciaMax")[0].value;
    maxDistance = Number(maxDistance);

    // if ( maxDistance == 0 ) {
    //   maxDistance = 2500;
    // }

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

    var buscar = document.getElementById('buscar-submit');
    buscar.addEventListener("click", function(event){
       event.preventDefault();
       postLocation(window.place);
    });

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
        // postLocation(place);
      }
    })

    cargarMapa();
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

    for (var i = 0; i < espacios.length ; i++) {
      var espacio  = espacios[i],
      location = espacio.location,
      lat      = location.split(",")[0],
      lng      = location.split(",")[1],
      latLng   = L.latLng(lat,lng);

      var marker = L.marker(latLng).bindPopup(espacio.direccion + '<BR>' + espacio.tipoEspacio + '<BR>' + espacio.distance + 'm');
      marker.addTo(map);

      if (i < 6) {
        var tr = $('<tr>').append(
          $('<td>').text(espacio.distance),
          $('<td>').text(espacio.direccion));

          tbody.append(tr);
        }        
      }

      window.map = map;
    }

    function cargarMapa () {

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
  @endsection
